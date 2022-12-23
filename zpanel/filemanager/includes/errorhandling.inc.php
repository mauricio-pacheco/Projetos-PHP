<?php

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |              Copyright (c) 2003-2004 by David Gartner                         |
//  |                                                                               |
//  | This program is free software; you can redistribute it and/or                 |
//  | modify it under the terms of the GNU General Public License                   |
//  | as published by the Free Software Foundation; either version 2                |
//  | of the License, or (at your option) any later version.                        |
//  |                                                                               |
//   -------------------------------------------------------------------------------



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function putResult($success, $true_value, $false_cause, $false_drilldown, $false_message) {

// --------------
// Returns the resultArray:
//   success contains true or false
//
//   if success == true,  true_value contains the variable that the function returns
//
//   if success == false, false_cause contains a string (one word) describing the reason why the function returned false
//
//   if success == false, false_drilldown contains a string (multiple words) that lists the consecutive function calls and value of the parameters in the final function
//
//   if success == false, false_message contains a string with an error message
// --------------

	$resultArray = array(   'success'   => $success, 
                              'value'     => $true_value, 
                              'cause'     => $false_cause, 
                              'drilldown' => $false_drilldown, 
                              'message'   => $false_message);

//echo "<br />\n";
//echo "<br />\n";
//print_r($resultArray);
//echo "<br />\n";
//echo "<br />\n";

	return $resultArray;

} // end putResult

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getResult($resultArray) {

// --------------
// Interpretes the resultArray:
//   success contains true or false
//
//   value contains the value returned
//
//   if success == false, cause contains the reason, in one word, of the failure
//
//   if success == false, cause contains the reason, more detailed
// --------------

	if (is_array($resultArray) && sizeof($resultArray) == 5) {
		if ($resultArray['success'] == true) { return $resultArray['value']; }
		elseif ($resultArray['success'] == false) { return false; }
	}
	elseif ($resultArray == "") {
		return true;
	}
	else { return $resultArray; }

} // end getResult

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printErrorMessage($resultArray, $exit, $headerfooter) {

// --------------
// Prints an error message
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$logErrors = getSetting("logErrors");


// -------------------------------------------------------------------------
// Get the contents of the output buffer, and then clean it to print a nice error message
// -------------------------------------------------------------------------
//$output_buffer = ob_get_contents();
//ob_end_clean();


// -------------------------------------------------------------------------
// Log the error
// -------------------------------------------------------------------------
	$resultArray2 = logError($resultArray['message'], $resultArray['cause'], $resultArray['drilldown'], "", "", "", "", "");
	$success = getResult($resultArray2);


// -------------------------------------------------------------------------
// Print the errormessage
// -------------------------------------------------------------------------

	if ($headerfooter == "headerfooter") { HtmlBegin("net2ftp", "error", "", "", "", ""); }

	echo "<br /><br />\n";
	echo "<table class=\"error-table\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	echo "<tr><td class=\"error-header\">An error has occured:</td></tr>\n";
	echo "<tr><td class=\"error-text\">\n";

	echo $resultArray['message'] . "<br /><br />";

// Handy to debug:
	echo "Drilldown: " . $resultArray['drilldown'] . "<br /><br />";

	if ($logErrors == "yes" && $success == true) { echo "<div style=\"font-size: 75%\">In order to improve the service of this website, a concise error report has been saved. This error report will be analysed by the developers in a confidential way to track and eliminate bugs.</div><br /><br />\n"; }

	echo "<a href=\"javascript:top.history.back()\" style=\"font-size: 130%; font-weight: bold;\">Go back</a> or \n";
	echo "<a href=\"" . printPHP_SELF("no") . "\"   style=\"font-size: 130%; font-weight: bold;\">Go to the login page</a>\n";

	echo "</td></tr>\n";
	echo "</table><br /><br />\n";

	if ($exit == "exit") { 
		exit();     //  <----------------- this is the only exit() in the application ---------------------
	}
	if ($headerfooter == "headerfooter") { 
		HtmlEnd("error", "", "");
	}

} // end printErrorMessage

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printWarningMessage($message) {

// --------------
// Prints a warning message
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$logErrors = getSetting("logErrors");


// -------------------------------------------------------------------------
// Handle string as well as array
// -------------------------------------------------------------------------
	if (is_array($message)) { 
		$message = $message['message'];
	}

// -------------------------------------------------------------------------
// Log the error
// -------------------------------------------------------------------------
	if ($logErrors == "yes") {
		$resultArray2 = logError($message, "warning", "warning", "", "", "", "", "");
		$success = getResult($resultArray2);
	}

// -------------------------------------------------------------------------
// Print the warning message
// -------------------------------------------------------------------------
	echo "<br /><div style=\"color: red;\">$message</div><br />\n";


} // end printWarningMessage

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



?>