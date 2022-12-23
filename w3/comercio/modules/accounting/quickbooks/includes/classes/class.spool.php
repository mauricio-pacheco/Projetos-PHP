<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'headers' . DIRECTORY_SEPARATOR . 'spool.php');

class ACCOUNTING_QUICKBOOKS_SPOOL
{
	private $entity;
	private $quickbooks;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->entity = new ACCOUNTING_QUICKBOOKS_ENTITIES();

		GetModuleById('accounting', $this->quickbooks, 'accounting_quickbooks');
	}

	/**
	 * Create a job
	 *
	 * Method will create a job file
	 *
	 * @access public
	 * @param array $data The data for this spooled job
	 * @return int The job ID on success, false if the job file was not created
	 */
	public function createJobSpool($data)
	{
		/**
		 * Loop and find the highest jobid and add one
		 */
		$jobid = 0;
		$start = 0;

		while ($this->quickbooks->getJobSpoolData($list, $start, ISC_ACCOUNTING_SPOOLS_PER_PAGE) && !empty($list)) {
			krsort($list);
			reset($list);
			$jobid = (int)key($list);
			$start += (ISC_ACCOUNTING_SPOOLS_PER_PAGE+1);
		}

		$jobid++;

		/**
		 * Add in some needed fields
		 */
		$data['disabled']	= false;
		$data['executed']	= false;
		$data['errmsg']		= '';
		$data['errno']		= '';

		if ($this->quickbooks->setJobSpoolData($jobid, $data)) {
			return $jobid;
		}

		return false;
	}

	/**
	 * Remove a job
	 *
	 * Method will remove (unlink) a spooled job file
	 *
	 * @access public
	 * @param string $jobid The ID of the job to remove
	 * @return bool true if the job was found and successfully deleted, FALSE otherwise
	 */
	public function removeJobSpool($jobid)
	{
		return $this->quickbooks->unsetJobSpoolData($jobid);
	}

	/**
	 * Remove all executed jobs
	 *
	 * Method will remove all executed jobs
	 *
	 * @access public
	 * @return int The amount of executed jobs, false otherwise
	 */
	public function removeExecutedJobs()
	{
		$start	= 0;
		$delete	= array();

		while ($this->quickbooks->getJobSpoolData($list, $start, ISC_ACCOUNTING_SPOOLS_PER_PAGE) && !empty($list)) {

			/**
			 * Only delete jobs that have been executed and NOT disabled. If this job is both then an error occured during the execution process
			 */
			foreach ($list as $jobid => $desc) {
				if ($desc['executed'] && !$desc['disabled']) {
					$delete[] = $jobid;
				}
			}

			$start += (ISC_ACCOUNTING_SPOOLS_PER_PAGE+1);
		}

		/**
		 * Delete all the jobs within our $delete array
		 */
		foreach ($delete as $jobid) {
			$this->removeJobSpool($jobid);
		}

		return count($delete);
	}

	/**
	 * Get available spooled job IDs
	 *
	 * Method will return an array of all the spooled job IDs. If $availableOnly is TRUE then only the available spooled job IDs will be returned,
	 * else return all the spooled job IDs
	 *
	 * @access public
	 * @param bool $availableOnly true to only retrieve the available jobs (jobs not set to disabled), FALSE for all jobs. Default is FALSE
	 * @return array The array of spooled job IDs
	 */
	public function getJobListIDs($availableOnly=false)
	{
		$idx	= array();
		$start	= 0;

		while ($this->quickbooks->getJobSpoolData($list, $start, ISC_ACCOUNTING_SPOOLS_PER_PAGE) && !empty($list)) {
			if ($availableOnly) {
				foreach ($list as $jobid => $data) {
					if (!$data['disabled']) {
						$idx[] = $jobid;
					}
				}
			} else {
				$idx += array_keys($list);
			}

			$start += (ISC_ACCOUNTING_SPOOLS_PER_PAGE+1);
		}

		return $idx;
	}

	/**
	 * Get a spooled job data
	 *
	 * Method will return a spooled job data
	 *
	 * @access public
	 * @param array &$reference The referenced array to store all the data in
	 * @param string $jobid The spooled job ID to search for
	 * @return bool TRUE if the job is available and the data was retrieved, FASLE othewise
	 */
	public function getJobData(&$reference, $jobid)
	{
		if (!isId($jobid) || !$this->quickbooks->getJobSpoolData($reference, $jobid)) {
			return false;
		}

		return true;
	}

	/**
	 * Get a spooled job property data
	 *
	 * Method will return a spooled job property data
	 *
	 * @access public
	 * @param array &$reference The referenced array to store all the data in
	 * @param string $jobid The spooled job ID to search for
	 * @param string $property The property of the spooled job data array
	 * @return bool TRUE if the job is available and the property data was retrieved, FASLE othewise
	 */
	public function getJobDataProperty(&$reference, $jobid, $property)
	{
		if ($property == '' || !$this->getJobData($ref, $jobid) || !array_key_exists($property, $ref)) {
			return false;
		}

		$reference = $ref[$property];
		return true;
	}

	/**
	 * Get the job spool XML string
	 *
	 * Method will get the XM of the spooled job
	 *
	 * @access public
	 * @param string &$xml The referenced string variable to store the XML string in
	 * @param string $job The spooled job ID to search for
	 * @return bool TRUE if the job is available and that the XML string was successfully retrieved, FALSE otherwise
	 */
	public function getJobXML(&$xml, $jobid)
	{
		if (!$this->getJobDataProperty($xml, $jobid, 'xml')) {
			return false;
		}

		$xml = trim($xml);
		return true;
	}

	/**
	 * Set a spooled job data
	 *
	 * Method will set a spooled job data
	 *
	 * @access public
	 * @param string $jobid The spooled job ID
	 * @param array $data The spooled job data to set
	 * @return bool TRUE if the job was set, FASLE othewise
	 */
	public function setJobData($jobid, $data)
	{
		if (!isId($jobid) || !$this->quickbooks->setJobSpoolData($jobid, $data)) {
			return false;
		}

		return true;
	}

	/**
	 * Set a spooled job property data
	 *
	 * Method will set a spooled job property data
	 *
	 * @access public
	 * @param string $jobid The spooled job ID to search for
	 * @param string $property The property of the spooled job data array to set
	 * @param mixed $value The value of the property
	 * @return bool TRUE if the job is available and the property data was set, FASLE othewise
	 */
	public function setJobDataProperty($jobid, $property, $value)
	{
		if ($property == '' || !$this->getJobData($ref, $jobid)) {
			return false;
		}

		$ref[$property] = $value;

		return $this->setJobData($jobid, $ref);
	}

	/**
	 * Disable a job
	 *
	 * Method will change the disabled status of a job
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @param bool $disabled The new disabled status set of the job
	 * @return bool true if the job disabled status was changed successfully, FALSE otherwise
	 */
	public function setJobDisabled($jobid, $disabled)
	{
		return $this->setJobDataProperty($jobid, 'disabled', (bool)$disabled);
	}

	/**
	 * Set the error message of a job
	 *
	 * Method will change the error message of a job
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @param int $errno The new error numnber/code of the job
	 * @param bool $errmsg The new error message of the job
	 * @return bool true if the job error message was changed successfully, FALSE otherwise
	 */
	public function setJobError($jobid, $errno, $errmsg)
	{
		return ($this->setJobDataProperty($jobid, 'errmsg', $errmsg) && $this->setJobDataProperty($jobid, 'errno', $errno));
	}

	/**
	 * Set the executed status of a job
	 *
	 * Method will change the executed status of a job
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @param bool $executed true to set the job as executed, FALSE otherwise
	 * @return bool true if the job executed status was changed successfully, FALSE otherwise
	 */
	public function setJobExecuted($jobid, $executed)
	{
		return $this->setJobDataProperty($jobid, 'executed', (bool)$executed);
	}

	/**
	 * Set job as failed
	 *
	 * Method will mark the job as failed
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @param int $errno The error number/code
	 * @param bool $errmsg The new error message of the job
	 * @return bool true if the job was successfully set as failed, FALSE otherwise
	 */
	public function setJobFailed($jobid, $errno, $errmsg)
	{
		return ($this->setJobDisabled($jobid, true) && $this->setJobExecuted($jobid, true) && $this->setJobError($jobid, $errno, $errmsg));
	}

	/**
	 * Reset the job as cleanly executed
	 *
	 * Method will remak the job as cleanly executed
	 *
	 * @access public
	 * @param string $jobid The ID of the job spool
	 * @return bool true if the job was successfully set as executed, FALSE otherwise
	 */
	public function setJobCleanExecuted($jobid)
	{
		return ($this->setJobDisabled($jobid, false) && $this->setJobExecuted($jobid, true) && $this->setJobError($jobid, '', ''));
	}
}

?>
