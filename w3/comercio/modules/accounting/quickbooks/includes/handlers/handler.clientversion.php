<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_CLIENTVERSION extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('strVersion');

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
		if (!$this->checkInput()) {
			return $this->errorClientVersion('Missing fields');
		} else if ($this->data->strVersion == '') {
			return $this->errorClientVersion('Wrong!!!');
		/*
		} else if ($this->data->strVersion < GetConfig('QuickBooksClientSupportedVersion')) {
			return $this->errorClientVersion('Unsupported');
		} else if ($this->data->strVersion >= GetConfig('QuickBooksClientSupportedVersion') && $this->data->strVersion < GetConfig('QuickBooksClientRecommendedVersion')) {
			return $this->warnClientVersion('Would like ' . GetConfig('QuickBooksClientRecommendedVersion') . ' but ' . $this->data->strVersion . ' will do for now');
		} else if ($this->data->strVersion >= GetConfig('QuickBooksClientRecommendedVersion') && $this->data->strVersion < GetConfig('QuickBooksClientLatestVersion')) {
				return $this->okClientVersion();
		*/
		} else {
			return $this->passClientVersion();
		}
	}

	/**
	 * Error return SOAP object
	 *
	 * Method will return the error SOAP object
	 *
	 * @access private
	 * @param string $msg The message to put in the error message
	 * @return object The error clientVersionResultSOAPOut object
	 */
	private function errorClientVersion($msg)
	{
		return new clientVersionResultSOAPOut('E:' . $msg);
	}

	/**
	 * Warn return SOAP object
	 *
	 * Method will return the warning SOAP object
	 *
	 * @access private
	 * @param string $msg The message to put in the warning message
	 * @return object The warn clientVersionResultSOAPOut object
	 */
	private function warnClientVersion($msg)
	{
		return new clientVersionResultSOAPOut('W:' . $msg);
	}

	/**
	 * OK return SOAP object
	 *
	 * Method will return the OK SOAP object
	 *
	 * @access private
	 * @return object The OK clientVersionResultSOAPOut object
	 */
	private function okClientVersion()
	{
		return new clientVersionResultSOAPOut('O:' . GetConfig('QuickBooksClientLatestVersion'));
	}

	/**
	 * Pass return SOAP object
	 *
	 * Method will return the pass SOAP object
	 *
	 * @access private
	 * @return object The pass clientVersionResultSOAPOut object
	 */
	private function passClientVersion()
	{
		return new clientVersionResultSOAPOut();
	}
}

/**
 * The SOAP output object
 *
 * Class is the clientVersion SOAP output object
 */
class clientVersionResultSOAPOut
{
	public $clientVersionResult;

	public function __construct($msg='')
	{
		$this->clientVersionResult = $msg;
	}
}

?>