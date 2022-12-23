<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_CLOSECONNECTION extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('ticket');

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the closeConnection handling
	 *
	 * @access protected
	 * @return object The serverVersionResultSOAPOut object containing the closeConnection result
	 */
	protected function handle()
	{
		/**
		 * If we're not logged in then there is nothing to close
		 */
		if (!$this->check()) {
			$msg = "";
		} else {
			$this->session->unsetQBSession();
			$msg = "Interspire Shopping Cart connection closed successfully";
		}

		/**
		 * Delete all our successfully executed jobs
		 */
		$this->spool->removeExecutedJobs();

		/**
		 * Unset our lock file
		 */
		$this->quickbooks->unsetLockFile();

		return new closeConnectionResultSOAPOut($msg);
	}
}

/**
 * The SOAP output object
 *
 * Class is the serverVersion SOAP output object
 */
class closeConnectionResultSOAPOut
{
	public $closeConnectionResult;

	public function __construct($msg='')
	{
		$this->closeConnectionResult = $msg;
	}
}

?>
