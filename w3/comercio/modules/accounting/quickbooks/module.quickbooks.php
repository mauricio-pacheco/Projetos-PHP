<?php

class ACCOUNTING_QUICKBOOKS extends ISC_ACCOUNTING
{
	private $_ownerid;
	private $_appname;
	private $_appdesc;
	private $_appurl;
	private $_appsupporturl;
	private $_qbtype;
	private $_password;
	private $_username;
	private $_fileid;
	private $_initdata;

	protected $_permissionset;

	public $_id;
	public $_name;
	public $_description;
	public $_help;
	public $_url;
	public $_enabled;
	public $_file;
	public $_supporturl;

	public function __construct()
	{
		// Setup the required variables for the module
		parent::__construct();

		$this->_id				= 'accounting_quickbooks';
		$this->_name			= GetLang('QuickBooksName');
		$this->_description		= GetLang('QuickBooksDesc');
		$this->_help			= GetLang('QuickBooksHelp');
		$this->_url				= 'http://www.quicken.com.au';
		$this->_enabled			= $this->_checkenabled();
		$this->_file			= basename(__FILE__);

		// Details for the QBWC file
		$this->getSetupVariable($password, 'password');
		$this->getSetupVariable($username, 'username');
		$this->getSetupVariable($fileid, 'fileid');
		$this->_appname			= GetLang('QuickBooksApplicationName');
		$this->_appdesc			= GetLang('QuickBooksApplicationDescription');
		$this->_appurl			= GetConfig('ShopPathSSL') . '/accountinggateway.php?accounting=' . $this->getid();
		$this->_appsupporturl	= GetConfig('ShopPathSSL') . '/accountinggateway.php?action=ShowSupport&accounting=' . $this->getid();
		$this->_supporturl		= 'http://www.anonym.to/http://www.viewkb.com/categories/Shopping+Cart/Support+and+Technical+Questions/Shopping+Cart/Accounting+Settings/Intuit+QuickBooks/';
		$this->_ownerid			= '0749cafc-62f5-102b-83a8-001a4d0000c0';
		$this->_qbtype			= 'QBFS';
		$this->_password		= $password;
		$this->_username		= $username;
		$this->_fileid			= $fileid . substr($this->_ownerid, 8);

		$this->_permissionset	= array(
								'customer'	=> array(
													'create'	=> 1,
													'edit'		=> 2,
													'delete'	=> 4
													),
								'product'	=> array(
													'create'	=> 8,
													'edit'		=> 16,
													'delete'	=> 32
													),
								'order'		=> array(
													'create'	=> 64,
													'edit'		=> 128,
													'delete'	=> 256
													)
								);

		$this->_initdata		= array(
									array(
											'service'	=> 'accountadd',
											'data'		=> array(
															'name' => GetLang('QuickBooksIncomeAccountName'),
															'type' => 'Income'
															)
										),
									array(
											'service'	=> 'accountadd',
											'data'		=> array(
															'name' => GetLang('QuickBooksCOGSAccountName'),
															'type' => 'CostOfGoodsSold'
															)
										),
									array(
											'service'	=> 'accountadd',
											'data'		=> array(
															'name' => GetLang('QuickBooksAssetAccountName'),
															'type' => 'FixedAsset'
															)
										),
								);

		// Setup the custom variables
		$this->setCustomVars();

		// Load saved variables from the database
		$this->loadAccountingVars();
	}

	/**
	* Custom variables for the checkout module. Custom variables are stored in the following format:
	* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
	* variable_type types are: text,number,password,radio,dropdown
	* variable_options is used when the variable type is radio or dropdown and is a name/value array.
	*/
	public function setCustomVars()
	{
		$this->_variables['scheduler'] = array(
				'name'		=> GetLang('QuickBooksScheduler'),
				'type'		=> 'dropdown',
				'help'		=> GetLang('QuickBooksSchedulerHelp'),
				'default'	=> 'never',
				'savedvalue'	=> array(),
				'required'	=> true,
				'options'	=> array(
								GetLang('QuickBooksScheduler5min')		=> '5',
								GetLang('QuickBooksScheduler10min')		=> '10',
								GetLang('QuickBooksScheduler15min')		=> '15',
								GetLang('QuickBooksScheduler30min')		=> '30',
								GetLang('QuickBooksScheduler1hour')		=> '60',
								GetLang('QuickBooksScheduler2hour')		=> '120',
								GetLang('QuickBooksScheduler6hour')		=> '360',
								GetLang('QuickBooksScheduler12hour')	=> '720',
								GetLang('QuickBooksScheduler1day')		=> '1440',
								GetLang('QuickBooksScheduler2day')		=> '2880',
								GetLang('QuickBooksScheduler1week')		=> '10080'
				),
				'multiselect' => false
			);

		$this->_variables['permission'] = array(
				'name' => GetLang('QuickBooksShowPermissionList'),
				'type' => 'custom',
				'callback' => 'showPermissionList',
				'javascript' => $this->showPermissionListJS(),
				'help' => GetLang('QuickBooksShowPermissionListHelp'),
			);

		$GLOBALS['AccountExtraJS'] = '';

		if (ModuleIsConfigured($this->getid())) {
			$this->_variables['sync'] = array(
				'heading' => GetLang('QuickBooksShowSyncHeading'),
				'name' => GetLang('QuickBooksShowSync'),
				'type' => 'custom',
				'callback' => 'showSyncList',
				'help' => GetLang('QuickBooksShowSyncHelp')
			);

			$this->_variables['spool'] = array(
				'name' => GetLang('QuickBooksShowSpoolList'),
				'type' => 'custom',
				'callback' => 'showSpoolList',
				'javascript' => '',
				'help' => GetLang('QuickBooksShowSpoolListHelp'),
				'notemplate' => true,
			);

			$GLOBALS['AccountExtraJS'] = '$("#qb-help-box-password").html("' . $this->_password . '"); $("#qb-help-box").show();';
		}

		$GLOBALS['AccountExtraJS'] .= '; $("#accounting_quickbooks_scheduler").css("width", "305px");';
	}

	/**
	 * Check to see if QuickBooks can run or not
	 *
	 * Method will check to see if this module has all the included functions to work
	 *
	 * @access public
	 * @return bool TRUE if the module is supported, FALSE if not
	 */
	function IsSupported()
	{
		if (!class_exists('SoapServer')) {
			$this->SetError(GetLang('QuickBooksSOAPNotAvailable'));
			return false;
		}

		if (!function_exists('simplexml_load_string') || !class_exists('SimpleXMLElement')) {
			$this->SetError(GetLang('QuickBooksXMLNotAvailable'));
			return false;
		}

		return true;
	}

	/**
	 * Show the permission list HTML
	 *
	 * Method will build and return the permission list HTML. The permission list basically let the user decide what will
	 * be synced with QuickBooks
	 *
	 * @access public
	 * @return string The permission list HTML
	 */
	public function showPermissionList()
	{
		return parent::showPermissionList($this->getid());
	}

	/**
	 * The permission list callback JavaScript
	 *
	 * Method will return the javascript callback for the permission list
	 *
	 * @access public
	 * @return string The permission list callback javascript
	 */
	public function showPermissionListJS()
	{
		return parent::showPermissionListJS($this->getid());
	}

	/**
	 * Show the sync option list
	 *
	 * Method will return the HTML for the sync list options. Basically options to sync customers, products and orders
	 *
	 * @access public
	 * @return string The sync list HTML
	 */
	public function showSyncList()
	{
		return parent::showSyncList($this->getid());
	}

	public function importSync($type, $nodeid)
	{
		return parent::importSync($this->getid(), $type, $nodeid);
	}

	/**
	 * Display the spool list
	 *
	 * Method will build and return the spool list HTML
	 *
	 * @access public
	 * @return string The spool list HTML
	 */
	public function showSpoolList()
	{
		// Fetch any results, place them in the data grid
		$GLOBALS['QuickBooksSpoolListGrid'] = $this->showSpoolListGrid();

		// Was this an ajax based sort? Return the table now
		if (array_key_exists('ajax', $_REQUEST) && $_REQUEST['ajax'] == 1) {
			$this->ParseTemplate("module.quickbooks.spoollist");
			exit;
		} else if ($GLOBALS['QuickBooksSpoolListGrid'] !== '') {
			$GLOBALS['PropertyBox'] = $this->ParseTemplate("module.quickbooks.spoollist", true);
			return $this->ParseTemplate("module.quickbooks.spooladmin", true);
		}

		return '';
	}

	/**
	 * Display the spool list grid
	 *
	 * Method will build and return the spool list grid HTML
	 *
	 * @access public
	 * @return string The spool list HTML
	 */
	public function showSpoolListGrid()
	{
		$total = $this->getJobListCount();

		/**
		 * If we have no jobs then display nothing
		 */
		if ($total == 0) {
			return '';
		}

		// Show a list of products in a table
		$page = 0;
		$start = 0;
		$numPages = 0;
		$GLOBALS['Nav'] = "";

		if (isset($_GET['page'])) {
			$page = (int)$_GET['page'];
		} else {
			$page = 1;
		}

		// Limit the number of orders returned
		if ($page < 1) {
			$page = 1;
		}

		$start		= ($page-1) * ISC_ACCOUNTING_SPOOLS_PER_PAGE;
		$numPages	= ceil($total / ISC_ACCOUNTING_SPOOLS_PER_PAGE);

		$this->getJobSpoolData($list, $start, ISC_ACCOUNTING_SPOOLS_PER_PAGE);

		// Add the "(Page x of n)" label
		if($total > ISC_ACCOUNTING_SPOOLS_PER_PAGE) {
			$GLOBALS['Nav'] = sprintf("(%s %d of %d) &nbsp;&nbsp;&nbsp;", GetLang('Page'), $page, $numPages);

			$GLOBALS['Nav'] .= BuildPagination($total, ISC_ACCOUNTING_SPOOLS_PER_PAGE, $page, 'index.php?ToDo=getJobAccountingSettingsSpoolList&module=' . $this->getid());
		}
		else {
			$GLOBALS['Nav'] = "";
		}

		$GLOBALS['Nav'] = rtrim($GLOBALS['Nav'], ' |');

		$grid = '';
		$GLOBALS['QuickBooksModuleID'] = $this->getid();

		foreach ($list as $jobname => $desc) {

			/**
			 * If this spool is the accountadd then continue as these spools are required and we don't want them to disable/delete it
			 */

			/**
			 * Show the rest
			 */
			$links = '';

			if (strtolower($desc['type']) == 'account') {
				$GLOBALS['JobDisabled']	= 'disabled="1"';
				$GLOBALS['JobURL']		= isc_html_escape($desc['desc']);
				$status					= GetLang('Pending');
			} else {
				$GLOBALS['JobDisabled']	= '';
				$GLOBALS['JobURL']		= '<a href="' . $desc['url'] . '" target="_blank">' . isc_html_escape($desc['desc']) . '</a>';
				if ($desc['disabled']) {
					if ($desc['executed']) {
						$status = GetLang('Failed');
						if ($desc['errmsg']) {
							$status .= '<br />' . htmlentities($desc['errmsg']);
						}
					} else {
						$status = GetLang('Disabled');
						$links .= ' <a href="#" onclick="reenableQBCheckboxes(\'' . $jobname . '\'); return false;">' . GetLang('Reenable') . '</a>';
					}
				} else {
					$status = GetLang('Pending');
					$links .= ' <a href="#" onclick="disableQBCheckboxes(\'' . $jobname . '\'); return false;">' . GetLang('Disable') . '</a>';
				}

				$links .= ' &nbsp;<a href="#" onclick="deleteQBCheckboxes(\'' . $jobname . '\'); return false;">' . GetLang('Delete') . '</a>';
			}

			$GLOBALS['JobName']		= $jobname;
			$GLOBALS['JobType']		= $desc['type'];
			$GLOBALS['JobStatus']	= $status;
			$GLOBALS['JobLinks']	= $links;

			$grid .= $this->ParseTemplate("module.quickbooks.spoollistitem", true);
		}

		return $grid;
	}

	/**
	 * Initialise the module
	 *
	 * Method will run the necessary operations for initialising the module. Each accounting module will have this module
	 *
	 * @access protected
	 * @return bool true if is the initialising was asuccessful, FALSE otherwise
	 */
	protected function initModule()
	{
		/**
		 * Create and save our auth details if we haven't already
		 */
		if (!$this->getSetupVariable($ref, 'password')) {
			$this->setSetupVariable('password', substr(md5(uniqid(mt_rand(), true)), 0, 12));
			$this->setSetupVariable('username', GetConfig('AdminEmail'));
			$this->setSetupVariable('fileid', substr(md5(GetConfig('AdminEmail')), 0, 8));
		}

		/**
		 * Now generate our needed spool files
		 */
		foreach ($this->_initdata as $data) {
			$this->createServiceRequest($data['service'], (object)$data['data']);
		}
	}

	/**
	 * Get the number of spooled jobs
	 *
	 * Method will return the amount of spooled jobs
	 *
	 * @access public
	 * @param bool $availableOnly TRUE to only count the available jobs (jobs not set to disabled), FALSE for all jobs. Default is FALSE
	 * @return int The amount of spooled jobs
	 */
	public function getJobListCount($availableOnly=false)
	{
		return parent::getJobListCount($this->getid(), $availableOnly);
	}

	/**
	 * Get the spool list
	 *
	 * Method will get the current spool list of pending jobs
	 *
	 * @access public
	 * @param array &$list The referenced array to store all the pending jobs in
	 * @return int The amount of pending jobs in to list
	 */
	public function getJobList(&$list)
	{
		require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class.spool.php');

		$spool = new ACCOUNTING_QUICKBOOKS_SPOOL();
		$spool->getJobList($list);

		return count($list);
	}

	/**
	 * Get a setup variable
	 *
	 * Method will return a setup variable that is stored in the database
	 *
	 * @access public
	 * @param mixed &$ref The referenced value to store the setup value in
	 * @param string $name The setup variable name
	 * @return bool TRUE if the setup varaible was found, FALSE otherwise
	 */
	public function getSetupVariable(&$ref, $name)
	{
		return parent::getSetupVariable($ref, $this->getid(), $name);
	}

	/**
	 * Set a setup variable
	 *
	 * Method will set a setup variable that is stored in the database
	 *
	 * @access protected
	 * @param string $name The setup variable name
	 * @param string $val The value to store as the setup variable
	 * @return bool TRUE if the setup varaible was set successfully, FALSE otherwise
	 */
	public function setSetupVariable($name, $value)
	{
		return parent::setSetupVariable($this->getid(), $name, $value);
	}

	/**
	 * Check to see if the lock file entry exists
	 *
	 * Method will checkt to see aif a lock file entry exists. If the first argument is TRUE, then remove the lock file if it is
	 * stale first before checking to see if it exists or not
	 *
	 * @access public
	 * @param bool $clean TRUE to remove the stale lock first, FALSE not to. Default is FALSE
	 * @return bool TRUE if the lock file entry exists and is still valid, FALSE otherwise
	 */
	public function checkLockFile($clean=true)
	{
		return parent::checkLockFile($this->getid(), $clean);
	}

	/**
	 * Set a lock file entry
	 *
	 * Function will create a lock file entry. If an entry already exists then function will return FALSE without modifying the
	 * lock cache file. The second argument $expire is a timestamp of the expiry date. The default expiry timestame is 6 hours
	 *
	 * @access public
	 * @param int $expire The default expire timestamp. Default is 6 hours
	 * @return bool TRUE if the lock was created, FALSE otherwise
	 */
	public function setLockFile($expire=null)
	{
		return parent::setLockFile($this->getid(), $expire);
	}

	/**
	 * Unset a lock file entry
	 *
	 * Function will unset a lock file entry
	 *
	 * @access public
	 * @return bool TRUE if the lock exists and was unset successfully, FALSE othewise
	 */
	public function unsetLockFile()
	{
		return parent::unsetLockFile($this->getid());
	}

	/**
	 * Get a spool job's ata
	 *
	 * Method will get a spool job dataset
	 *
	 * @access public
	 * @param array &$reference The referenced array variable to store the spool data in
	 * @param mixed $jobid The job ID or an array of job IDs or the starting position within the spool directory listing
	 * @param int $limit The optional length of the starting position if one is given
	 * @return bool TRUE if the job spool was found, FALSE otherwise
	 */
	public function getJobSpoolData(&$reference, $jobid, $limit=null)
	{
		return parent::getJobSpoolData($reference, $this->getid(), $jobid, $limit);
	}

	/**
	 * Set a spool job's data
	 *
	 * Method will set a spool job dataset
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @param array $data The data array for the job spool
	 * @param bool $merge TRUE to merge in the $data array with the existing data, FALSE to overwrite. Default is FALSE
	 * @return bool TRUE if the data was successfully written, FASLE othereise
	 */
	public function setJobSpoolData($jobid, $data, $merge=false)
	{
		return parent::setJobSpoolData($this->getid(), $jobid, $data, $merge);
	}

	/**
	 * Unset a spool job
	 *
	 * Method will unset a spool job dataset
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @return bool TRUE if the job was successfully removed, FASLE othereise
	 */
	public function unsetJobSpoolData($jobid)
	{
		return parent::unsetJobSpoolData($this->getid(), $jobid);
	}

	/**
	 * Generate the QBWC file
	 *
	 * Method will generate and return the QBWC file string
	 *
	 * @access private
	 * @return string The QBWC file
	 */
	private function generateQBWC()
	{
		$GLOBALS['AppID']			= '';
		$GLOBALS['AppName']			= htmlentities($this->_appname);
		$GLOBALS['AppURL']			= htmlentities($this->_appurl);
		$GLOBALS['AppDescription']	= htmlentities($this->_appdesc);
		$GLOBALS['AppSupportURL']	= htmlentities($this->_appsupporturl);
		$GLOBALS['CertURL']			= htmlentities(GetConfig('ShopPathSSL'));
		$GLOBALS['Username']		= htmlentities($this->_username);
		$GLOBALS['OwnerID']			= '{' . $this->_ownerid . '}';
		$GLOBALS['FileID']			= '{' . $this->_fileid . '}';
		$GLOBALS['QBType']			= $this->_qbtype;
		$GLOBALS['IsReadOnly']		= 'false';
		$GLOBALS['Scheduler']		= '';

		$scheduler = $this->GetValue('scheduler');

		if (strtolower($scheduler) !== 'never') {
			$GLOBALS["Scheduler" ] = '<Scheduler>
			<RunEveryNMinutes>' . $scheduler . '</RunEveryNMinutes>
		</Scheduler>';
		}

		return $this->ParseTemplate('module.quickbooks.qbwc', true);
	}

	/**
	 * Output the QBWC to the browser
	 *
	 * Method will generate and output the QBWC file to the browser
	 *
	 * @access public
	 */
	public function downloadQBWC()
	{
		$xml = $this->generateQBWC();

		header('Content-Type: application/x-download');
		header('Content-Disposition: attachment; filename=shoppingcart.qwc');
		header('Content-Length: ' . strlen($xml));
		print $xml;
		exit;
	}

	/**
	 * Handle the SOAP gateway requests
	 *
	 * Method will setup the SOAP server and handle the SOAP request
	 *
	 * @access public
	 */
	public function handleGateway()
	{
		require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'headers' . DIRECTORY_SEPARATOR . 'gateway.php');

		$server = new ACCOUNTING_QUICKBOOKS_SERVER(___MODULE_QB_WSDL___);
		$server->handle();
		exit;
	}

	/**
	 * Create a service request (spool job file)
	 *
	 * Method will generate the spool job file based on the service $request using the data in $data
	 *
	 * @access public
	 * @param string $request The type of service to generate the spool file
	 * @param object $data The data used to generate the spool file with
	 * @return string The spool job name on success, FALSE otherwise
	 */
	public function createServiceRequest($request, $data)
	{
		require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class.services.php');

		$service = new ACCOUNTING_QUICKBOOKS_SERVICES();

		$data = array(
			'info' => $data
		);

		$service->exec($output, $request, 'request', $data);

		return $output;
	}

	/**
	 * Modify a pending job status
	 *
	 * Method will modify a pending job status. Status are 'reenable', 'disable' and 'delete'
	 *
	 * @access public
	 * @param string $status The new job status
	 * @param array $jobs The aray conatining all the job names to modify
	 * @return bool TRUE if the jobs were successfully canged, FASLE otherwise
	 */
	public function modifyJobStatus($status, $jobs)
	{
		require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class.spool.php');

		if (!count($jobs = array_filter($jobs))) {
			return false;
		}

		switch (strtolower($status))
		{
			case 'reenable':
			{
				$func	= 'setJobDisabled';
				$arg	= false;
				break;
			}
			case 'disable':
			{
				$func	= 'setJobDisabled';
				$arg	= true;
				break;
			}
			case 'delete':
			{
				$func	= 'removeJobSpool';
				$arg	= null;
				break;
			}
			default:
			{
				return false;
				break;
			}
		}

		$spool = new ACCOUNTING_QUICKBOOKS_SPOOL();

		foreach ($jobs as $job) {
			$spool->$func($job, $arg);
		}

		return true;
	}

	/**
	 * Get an accounting reference item
	 *
	 * Method will return an accounting reference record
	 *
	 * @access public
	 * @param mixed &$reference The referenced value to store the reference data
	 * @param mixed $nodeid The ID of the referenced item (customer id, order id, etc) OR the search criteria array for the reference data
	 * @param string $type The node type (customer, product or order)
	 * @return bool true if the reference value was found, FALSE otherwise
	 */
	public function getAccountingReference(&$reference, $nodeid, $type)
	{
		return parent::getAccountingReference($reference, $this->getid(), $nodeid, $type);
	}

	/**
	 * Set an accounting reference item
	 *
	 * Method will set an accounting reference record
	 *
	 * @access public
	 * @param mixed $nodeid The ID of the referenced item (customer id, order id, etc) OR the search criteria array for the reference data
	 * @param string $type The node type (customer, product or order)
	 * @param mixed $reference The reference value to store
	 * @return int The accountref record ID if the record is unique and was inserted, false otherwise
	 */
	public function setAccountingReference($nodeid, $type, $reference)
	{
		return parent::setAccountingReference($this->getid(), $nodeid, $type, $reference);
	}

	/**
	 * Unset an accounting reference item
	 *
	 * Method will unset an accounting reference record
	 *
	 * @access public
	 * @param mixed $nodeid The ID of the referenced item (customer id, order id, etc) OR the search criteria array for the reference data
	 * @param string $type The node type (customer, product or order)
	 * @return bool true if the accountingref record was unset (deleted), FALSE otherwise
	 */
	public function unsetAccountingReference($nodeid, $type)
	{
		return parent::unsetAccountingReference($this->getid(), $nodeid, $type);
	}

	/**
	 * Get the permission mask
	 *
	 * Method will return the permission mask. The permission mask is a bitmask of the current permission set
	 *
	 * @access protected
	 * @return int The current permission bitmask set
	 */
	protected function getPermissionMask()
	{
		return $this->GetValue('permission');
	}
}

?>
