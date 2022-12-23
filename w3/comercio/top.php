<?php

	/**
	* Show a blank top template, which can be used to integrate the store's design into
	* other applications, specifically Interspire Knowledge Manager
	*/

	require_once(dirname(__FILE__)."/init.php");
	$GLOBALS["ISC_CLASS_TEMPLATE"]->SetTemplate("top");
	$GLOBALS["ISC_CLASS_TEMPLATE"]->ParseTemplate();

?>
