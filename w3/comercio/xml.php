<?php

	// Include the application initialization files
	include_once(dirname(__FILE__) . "/admin/init.php");

	// Include the API classes
	include_once(dirname(__FILE__) . "/includes/classes/class.api.php");

	// Get the XML request data
	if(isset($_REQUEST["xml"])) {
		$request = $_REQUEST["xml"];
	}
	else {
		$request = file_get_contents('php://input');
	}

	// Instantiate the API which also takes care of validation
	$api = new API($request);

	// Run the request
	$api->RunRequest();


?>