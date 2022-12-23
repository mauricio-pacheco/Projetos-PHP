<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_SERVERVERSION extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('ticket');

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the serverVersion handling
	 *
	 * @access protected
	 * @return object The serverVersionResultSOAPOut object containing the clientVersion result
	 */
	protected function handle()
	{
		/**
		 * Do our authenticity check
		 */
		if (!$this->check()) {
			return new serverVersionResultSOAPOut('');
		}

		return new serverVersionResultSOAPOut('v6.9');
	}
}

/**
 * The SOAP output object
 *
 * Class is the serverVersion SOAP output object
 */
class serverVersionResultSOAPOut
{
	public $serverVersionResult;

	public function __construct($msg='')
	{
		$this->serverVersionResult = $msg;
	}
}

?>