<?php

abstract class ACCOUNTING_QUICKBOOKS_HANDLERS_BASE extends ISC_SERVICEHANDLER_SERVICES
{
	protected $session;
	protected $spool;
	protected $service;
	protected $quickbooks;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 * @param string $op The operation to preform
	 * @param array &$data The referenced data array
	 * @param array &$parent The referenced handler parent object
	 */
	public function __construct($op, &$data, &$parent)
	{
		parent::__construct($op, $data, $parent);

		$this->session	= new ACCOUNTING_QUICKBOOKS_SESSION();
		$this->spool	= new ACCOUNTING_QUICKBOOKS_SPOOL();
		$this->service	= new ACCOUNTING_QUICKBOOKS_SERVICES();

		GetModuleById('accounting', $this->quickbooks, 'accounting_quickbooks');
	}

	/**
	 * Check user's authentication
	 *
	 * Method will compared the supplied uuid $this->data->ticket to the user's sessions stored uuid
	 *
	 * @access protected
	 * @return bool true if the uuids match, FALSE if they do not
	 */
	protected function checkAuthenticity()
	{
		$this->session->getQBSession('UUID', $val);

		if (property_exists($this->data, 'ticket') && $val == $this->data->ticket) {
			return true;
		}

		return false;
	}

	/**
	 * Check input fields
	 *
	 * Method will check to see if the required imnput fields are present in the $this->data variable
	 *
	 * @access protected
	 * @return bool true if all fields are present, FALSE if not
	 */
	protected function checkInput()
	{
		if (!property_exists($this, 'inputVars') || !is_array($this->inputVars)) {
			return true;
		}

		foreach ($this->inputVars as $field) {
			if (!property_exists($this->data, $field)) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Run full sanity check on authenticity and input fields
	 *
	 * Method will run an authenticity and input fields check. Return false on any failure
	 *
	 * @access protected
	 * @return bool true if all the checking is successful, FALSE if anything failured
	 */
	protected function check()
	{
		if ($this->checkInput() && $this->checkAuthenticity()) {
			return true;
		}

		return false;
	}

	/**
	 * Get the last error in the spool handler
	 *
	 * Method will return the last error within the spool handler
	 *
	 * @access protected
	 * @return strng The last spool error message
	 */
	protected function getSpoolError()
	{
		return $this->service->getLastError();
	}

	/**
	 * Get the current spooled job
	 *
	 * Method will return the current spooled job
	 *
	 * @access protected
	 * @return string The current spooled job if one is available, false if not
	 */
	protected function getCurrentJob()
	{
		return $this->session->getCurrentJob();
	}

	/**
	 * Get the current spooled job
	 *
	 * Method will return the current spooled job
	 *
	 * @access protected
	 * @param string $job The job to set as the current job
	 * @return bool true if the job was set, FLSE otherwsie
	 */
	protected function setCurrentJob($job)
	{
		return $this->session->setCurrentJob($job);
	}

	/**
	 * Sets a job as executed
	 *
	 * Method will set a job as executed
	 *
	 * @access protected
	 * @param string $job The job to set as executed
	 */
	protected function setJobAsExecuted($job)
	{
		return ($this->spool->setJobExecuted($job, true) && $this->session->setJobAsDone($job));
	}

	/**
	 * Set the current job as done and sets the next job
	 *
	 * Method will set the current job as done and if we have any, set the next job as the current job
	 *
	 * @access protected
	 * @param string $originalJob The original current job when the receiveResponseXML handler was executed
	 */
	protected function assignNextService($originalJob)
	{
		/**
		 * Only go looking for a new job if we do not have a current job
		 */
		if (!$this->getCurrentJob() && ($nextjob = $this->session->getNextJob($originalJob))) {
			$this->setCurrentJob($nextjob);
		}
	}

	abstract protected function handle();
}

?>
