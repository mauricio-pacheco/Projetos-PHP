<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "headers" . DIRECTORY_SEPARATOR . "session.php");

class ACCOUNTING_QUICKBOOKS_SESSION
{
	public function __construct()
	{
		$this->setQBSessSession();
	}

	/**
	 * Set the transaction session
	 *
	 * Method will set the transaction session if the session is not already set
	 *
	 * @access public
	 */
	function setQBSessSession()
	{
		if (!array_key_exists('ACCOUNTING_QUICKBOOKS', $_SESSION)) {
			$_SESSION['ACCOUNTING_QUICKBOOKS'] = array(
						'UUID'			=> '',
						'LAST_ERROR'	=> '',
						'COMPANY_DATA'	=> null,
						'SPOOLED_JOBS'	=> array(),
			);
		}
	}

	/**
	 * Get the stored session array value
	 *
	 * Method will returned the stored session array value
	 *
	 * @access public
	 * @param string $key The key corresponding to the stored value
	 * @param mixed &$val The reference variable to store the value
	 * @return bool true if the key matched, FALSE otherwise
	 */
	public function getQBSession($key, &$val)
	{
		if (array_key_exists($key, $_SESSION['ACCOUNTING_QUICKBOOKS'])) {
			$val = $_SESSION['ACCOUNTING_QUICKBOOKS'][$key];
			return true;
		}

		return false;
	}

	/**
	 * Set the stored session array value
	 *
	 * Method will set the stored session array value corresponding to the key $key
	 *
	 * @access public
	 * @param string $key The key corresponding to store the value in
	 * @param mixed $val The value to store
	 * @return bool true if the key already exists and was set, FALSE if the key did not exist
	 */
	public function setQBSession($key, $val)
	{
		if (!array_key_exists($key, $_SESSION['ACCOUNTING_QUICKBOOKS'])) {
			return false;
		}

		$_SESSION['ACCOUNTING_QUICKBOOKS'][$key] = $val;

		return true;
	}

	/**
	 * Unset the transaction session
	 *
	 * Method will unset the transaction session
	 *
	 * @access public
	 */
	public function unsetQBSession()
	{
		$_SESSION['ACCOUNTING_QUICKBOOKS'] = null;
		unset($_SESSION['ACCOUNTING_QUICKBOOKS']);
	}

	/**
	 * Check to see if the job is in the job spool
	 *
	 * Method will return the job key if the job is in the spool
	 *
	 * @access public
	 * @param string $job The job name to search for
	 * @param bool $flushCache true to flush the cache. Default is FALSE
	 * @return int The job key if the job is in the spool, false otherwise
	 */
	public function jobInSpool($job, $flushCache=false)
	{
		static $_cache = array();
		
		if (array_key_exists($job, $_cache)) {
			return $_cache[$job];
		}
		
		$this->getQBSession('SPOOLED_JOBS', $spools);
		
		foreach ($spools as $key => $spool) {
			if ($spool['NAME'] == $job) {
				$_cache[$job] == $key;
				return $key;
			}
		}
		
		return false;
	}

	/**
	 * Does the job have a child spool?
	 *
	 * Method will return true/FALSE depending if the job has a child spool
	 *
	 * @access public
	 * @param string $job The job to checks to see if it has a child spool
	 * @return bool true if the job has children, FALSE otherwise
	 */
	public function hasSpoolJob($job)
	{
		if ($job == '' || ($key = $this->jobInSpool($job)) === false) {
			return false;
		}

		$this->getQBSession('SPOOLED_JOBS', $list);

		foreach ($list as $spool) {
			if ($spool['PARENT'] == $list[$key]['NAME']) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get a spooled job
	 *
	 * Method will get a store a spooled job within the referenced variable &$output
	 *
	 * @access public
	 * @param array &$output The referenced variable to store the job array in
	 * @param string $job The name of the job to retrieve
	 * @param bool $isParent true to specify that the job $job is the parent and so retrieve all the child spools. Default is FALSE
	 * @return bool true if the job was stored, FALSE otherwise
	 */
	public function getSpoolJob(&$output, $job, $isParent=false)
	{
		if ($job == '' || ($key = $this->jobInSpool($job)) === false) {
			return false;
		}
		
		$this->getQBSession('SPOOLED_JOBS', $list);

		if (!$isParent) {
			$output = $list[$key];
		} else {
			foreach ($list as $spool) {
				if ($spool['PARENT'] == $job) {
					$output[] = $spool;
				}
			}
		}

		return true;
	}

	/**
	 * Insert job(s) into the job spool array
	 *
	 * Method will insert the job(s) into the spool array
	 *
	 * @access public
	 * @param mixed $jobs The job(s) string/array
	 * @param string $parent The optional parent to associate these job(s) with plus insert these job(s) ahead of the parent
	 * @return bool true if the job(s) were inserted, FALSE otherwise
	 */
	public function setSpoolJobs($jobs, $parent=null)
	{
		if (is_string($jobs)) {
			return $this->setSpoolJob($jobs, $parent);
		}

		if (!is_array($jobs)) {
			return false;
		}

		if (!is_null($parent) && $this->jobInSpool($parent) === false) {
			return false;
		}

		/**
		 * If these are child spools then reverse order them so the last spool inserted will be the first child of the parent and will
		 * therefore get executed next
		 */
		if (!is_null($parent)) {
			$jobs = array_reverse($jobs);
		}

		foreach ($jobs as $job) {
			$this->setSpoolJob($job, $parent);
		}

		return true;
	}
	
	/**
	 * Insert job into the job spool array
	 *
	 * Method will insert the job into the spool array
	 *
	 * @access public
	 * @param string $jobs The job string
	 * @param string $parent The optional parent to associate these job with plus insert these job ahead of the parent
	 * @return bool true if the job was inserted, FALSE otherwise
	 */
	public function setSpoolJob($job, $parent=null)
	{
		if ($job == '' || (!is_null($parent) && ($key = $this->jobInSpool($parent)) === false)) {
			return false;
		}

		$this->getQBSession('SPOOLED_JOBS', $list);

		/**
		 * If this is a child spool then it must be straight after the parent spool
		 */
		if (!is_null($parent)) {
			for ($i=(count($list)-1); $i > $key; $i--) {
				$list[$i+1] = $list[$i];
			}
			$i++;
		} else {
			$i = count($list);
		}

		$list[$i] = array(
					'NAME'		=> $job,
					'PARENT'	=> $parent,
					'STATUS'	=> true,
					'DELETE'	=> false,
					'SAVEDATA'	=> ''
					);
		
		$this->setQBSession('SPOOLED_JOBS', $list);

		return true;
	}

	/**
	 * Get all the pending jobs
	 *
	 * Method will get all the pending jobs
	 *
	 * @access public
	 * @param array &$jobs The referenced array to store all the pending job structures
	 * @return int The amount of pending job
	 */
	public function getPendingJobs(&$jobs)
	{
		$jobs = array();
		$this->getQBSession('SPOOLED_JOBS', $list);

		foreach ($list as $key => $spool) {
			if ($spool['STATUS'] == true) {
				$jobs[$key] = $spool;
			}
		}

		return count($jobs);
	}

	/**
	 * Get the stored spool session array value
	 *
	 * Method will returned the stored spool session array value
	 *
	 * @access public
	 * @param string $job The job name to associated with this data
	 * @param mixed &$val The reference variable to store the value
	 * @return bool true if the key matched, FALSE otherwise
	 */
	public function getSpoolJobData($job, &$val)
	{
		if (!$this->getSpoolJob($output, $job, false)) {
			return false;
		}
		
		$val = simplexml_load_string($output['SAVEDATA']);
		return true;
	}

	/**
	 * Set the stored spool session array value
	 *
	 * Method will set the stored spool session array value corresponding to the key $key
	 *
	 * @access public
	 * @param string $job The job name to associated with this data
	 * @param mixed $val The value to store
	 * @return bool true if the key already exists and was set, FALSE if the key did not exist
	 */
	public function setSpoolJobData($job, $val)
	{
		if ($job == '' || ($key = $this->jobInSpool($job)) === false) {
			return false;
		}
		
		$this->getQBSession('SPOOLED_JOBS', $list);

		if (is_string($val)) {
			$list[$key]['SAVEDATA'] = $val;
		} else {
			$list[$key]['SAVEDATA'] = $val->asXML();
		}

		$this->setQBSession('SPOOLED_JOBS', $list);
		
		return true;
	}

	/**
	 * Get the current working job
	 *
	 * Method will get the current working job name
	 *
	 * @access public
	 * @return string The current working job name on success, false if there is no more available jobs
	 */
	public function getCurrentJob()
	{
		$this->getQBSession('SPOOLED_JOBS', $list);

		foreach ($list as $spool) {
			if (is_null($spool['STATUS'])) {
				return $spool['NAME'];
			}
		}

		return false;
	}

	/**
	 * Set the current working job
	 *
	 * Method will set the current working job
	 *
	 * @access public
	 * @param string $job The job name to mark as current
	 * @return bool true if the job was set as the current job, FALSE otherwise
	 */
	public function setCurrentJob($job)
	{
		return $this->setJobAsCurr($job, true);
	}

	/**
	 * Get the next job in the spool
	 *
	 * Method will return either the next available sibling spool, the parent if there is one, or false for no other jobs
	 *
	 * @access public
	 * @param string $job The optional current job to work with. Default is the current job
	 * @return string The next job if there is one, false otherwise
	 */
	public function getNextJob($job=null)
	{
		if (is_null($job)) {
			$job = $this->getCurrentJob();
		}

		if ($job == '' || ($key = $this->jobInSpool($job)) === false) {
			return false;
		}

		$this->getQBSession('SPOOLED_JOBS', $list);

		/**
		 * Firstly we'll see if there are any available sibling jobs left
		 */
		foreach ($list as $sibkey => $sibling) {
			if ($sibkey == $key) {
				continue;
			}

			if ($list[$key]['PARENT'] == $sibling['PARENT'] && $sibling['STATUS'] == true) {
				return $sibling['NAME'];
			}
		}

		/**
		 * Ok, no available siblings left. Return the parent if we have any
		 */
		if ($list[$key]['PARENT'] !== '' && !is_null($list[$key]['PARENT'])) {
			return $list[$key]['PARENT'];
		}

		/**
		 * Right, there is nothing more we can do in this level. Best to return false so we can cascade into another level
		 */
		return false;
	}

	/**
	 * Manually set a job as done
	 *
	 * Method will manually set the job $job as done
	 *
	 * @access public
	 * @param stirng $job The job to manually set as done
	 * @return bool true if the job was set, FALSE otherwise
	 */
	public function setJobAsDone($job)
	{
		return $this->setJobStatus($job, false);
	}

	/**
	 * Manually set a job as current
	 *
	 * Method will manually set the job $job as current
	 *
	 * @access public
	 * @param stirng $job The job to manually set as current
	 * @param bool $full true to mark the current job as done, FALSE to do it yourself. Default is TRUE
	 * @return bool true if the job was set, FALSE otherwise
	 */
	public function setJobAsCurr($job, $full=true)
	{
		if ($this->setJobStatus($job, null)) {
			$this->getQBSession('SPOOLED_JOBS', $list);

			foreach (array_keys($list) as $key) {
				if ($list[$key]['NAME'] !== $job && is_null($list[$key]['STATUS'])) {
					$list[$key]['STATUS'] = false;
				}
			}
			$this->setQBSession('SPOOLED_JOBS', $list);
		}

		return false;
	}

	/**
	 * Manually set a job as available
	 *
	 * Method will manually set the job $job as available
	 *
	 * @access public
	 * @param stirng $job The job to manually set as available
	 * @return bool true if the job was set, FALSE otherwise
	 */
	public function setJobAsAvailable($job)
	{
		return $this->setJobStatus($job, true);
	}

	/**
	 * Manually set a job status
	 *
	 * Method will manually set the job $job status
	 *
	 * @access public
	 * @param stirng $job The job to manually status
	 * @return bool true if the job status was set, FALSE otherwise
	 */
	private function setJobStatus($job, $status)
	{
		if ($job == '' || ($key = $this->jobInSpool($job)) === false || (!is_bool($status) && !is_null($status))) {
			return false;
		}

		$this->getQBSession('SPOOLED_JOBS', $list);
		$list[$key]['STATUS'] = $status;
		
		return $this->setQBSession('SPOOLED_JOBS', $list);
	}
}

?>
