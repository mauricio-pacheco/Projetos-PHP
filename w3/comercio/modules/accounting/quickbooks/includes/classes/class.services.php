<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "headers" . DIRECTORY_SEPARATOR . "services.php");

class ACCOUNTING_QUICKBOOKS_SERVICES extends ISC_SERVICEHANDLER_HANDLER
{
	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct()
	{
		$filePath	= ___MODULE_QB_SERVICES___;
		$filePrefix	= "service.";
		$classPrefix	= __CLASS__ . "_";

		parent::__construct($filePath, $filePrefix, $classPrefix);
	}
}

?>
