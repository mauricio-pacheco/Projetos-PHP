<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_SENDREQUESTXML extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('ticket', 'strHCPResponse', 'strCompanyFileName', 'qbXMLCountry', 'qbXMLMajorVers', 'qbXMLMinorVers');

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
	}

	/**
	 * Initial setup for services
	 *
	 * Method will initialise all the service handler. This must be called the first and only time that this class is used
	 *
	 * @access private
	 */
	private function initSpoolJobs()
	{
		$this->session->setQBSession('COMPANY_DATA', $this->data->strHCPResponse);

		/**
		 * Remove any jobs that were executed. This is a fallback just in case we didn't exit out cleanly last time
		 */
		$this->spool->removeExecutedJobs();

		/**
		 * Also get a list of all available jobs that need to be executed and set the first job as the current job to kick it off, if we have any
		 */
		$jobs = $this->spool->getJobListIDs(true);
		$this->session->setSpoolJobs($jobs);

		/**
		 * Now we have to kick it off by setting the first job as the current job, if we have any
		 */
		if (!empty($jobs)) {
			$this->setCurrentJob($jobs[0]);
		}
	}

	/**
	 * Executed a spooled job
	 *
	 * Method will execute a spooled job and return the output
	 *
	 * @access private
	 * @param string $job The spooled job to execute
	 * @param mixed &$output The referenced variable to store the output
	 * @return bool true if the spooled job was executed successfully, FALSE otherwise
	 */
	private function execSpoolJob($job, &$output)
	{
		if (!$this->spool->getJobData($ref, $job) || !array_key_exists('service', $ref) || $ref['service'] == '') {
			return false;
		}

		if ($this->service->exec($output, $ref['service'], 'run', array('job' => $job))) {
			return true;
		}

		return false;
	}

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the sendRequestXML handling
	 *
	 * @access protected
	 * @return object The sendRequestXMLResultSOAPOut object containing the clientVersion result
	 */
	protected function handle()
	{
		/**
		 * Do our authenticity check
		 */
		if (!$this->check()) {
			return new sendRequestXMLResultSOAPOut();
		}

		/**
		 * If this is the first time that this handler is executed within this session, then we will be given an XML string containing the
		 * company data
		 */
		if ($this->data->strHCPResponse !== '') {
			$this->initSpoolJobs();
		}

		/**
		 * Ok, now we check to see if we have a spool job that we can send back. If we have one but failed to generate the XML then call NoOp as
		 * the error should already be stored
		 */
		if ($job = $this->getCurrentJob()) {
			if ($this->execSpoolJob($job, $xml)) {
				$this->session->getSpoolJob($sess, $this->getCurrentJob(), false);
				return new sendRequestXMLResultSOAPOut($xml);
			} else {
				$this->session->setQBSession('LAST_ERROR', $this->getSpoolError());
				return new sendRequestXMLResultSOAPOut();
			}
		}

		return new sendRequestXMLResultSOAPOut();
	}
}

/**
 * The SOAP output object
 *
 * Class is the serverVersion SOAP output object
 */
class sendRequestXMLResultSOAPOut
{
	public $sendRequestXMLResult;

	public function __construct($msg='')
	{
		$this->sendRequestXMLResult = $msg;
	}
}

?>
