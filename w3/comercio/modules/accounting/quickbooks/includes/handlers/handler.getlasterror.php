<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_GETLASTERROR extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('ticket');

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the clientVersion handling
	 *
	 * @access protected
	 * @return object The clientVersionResultSOAPOut object containing the clientVersion result
	 */
	protected function handle()
	{
		/**
		 * Do our authenticity check
		 */
		if (!$this->check()) {
			return new getLastErrorResultSOAPOut();
		} else if ($this->session->getQBSession('LAST_ERROR', $msg) && $msg !== '') {
			return new getLastErrorResultSOAPOut($msg);
		}

		return new getLastErrorResultSOAPOut();
	}
}

/**
 * The SOAP output object
 *
 * Class is the clientVersion SOAP output object
 */
class getLastErrorResultSOAPOut
{
	public $getLastErrorResult;

	public function __construct($msg='')
	{
		$this->getLastErrorResult = $msg;
	}
}

?>