<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "headers" . DIRECTORY_SEPARATOR . "entities.php");

class ACCOUNTING_QUICKBOOKS_ENTITIES extends ISC_SERVICEHANDLER_HANDLER
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
		$filePath	= ___MODULE_QB_ENTITIES___;
		$filePrefix	= "entity.";
		$classPrefix	= __CLASS__ . "_";

		parent::__construct($filePath, $filePrefix, $classPrefix);
	}
}

?>
