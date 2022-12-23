<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "headers" . DIRECTORY_SEPARATOR . "server.php");

class ACCOUNTING_QUICKBOOKS_SERVER extends SoapServer
{
	public function __construct($wsdl)
	{
		parent::__construct($wsdl);

		$this->setClass("ACCOUNTING_QUICKBOOKS_HANDLERS");
	}

	public function handle()
	{
		if (!array_key_exists("HTTP_RAW_POST_DATA", $GLOBALS)) {
			$data = file_get_contents("php://input");
		} else {
			$data = $GLOBALS["HTTP_RAW_POST_DATA"];
		}

		@parent::handle($data);
	}
}

?>
