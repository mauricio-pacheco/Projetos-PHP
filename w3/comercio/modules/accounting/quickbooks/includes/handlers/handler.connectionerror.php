<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_CONNECTIONERROR extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('ticket', 'hresult', 'message');

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the connectionError handling
	 *
	 * @access protected
	 * @return object The connectionErrorResultSOAPOut object containing the connectionError result
	 */
	protected function handle()
	{
		/**
		 * Remove our session
		 */
		$this->session->unsetQBSession();

		/**
		 * Unset our lock file
		 */
		$this->quickbooks->unsetLockFile();

		return new connectionErrorResultSOAPOut($msg);
	}
}

/**
 * The SOAP output object
 *
 * Class is the serverVersion SOAP output object
 */
class connectionErrorResultSOAPOut
{
	public $connectionErrorResult;

	public function __construct($msg='')
	{
		$this->connectionErrorResult = $msg;
	}
}

?>