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

// -------------------------------------------------------------------------
// The purpose of this file is to register all global variables explicitely.
// This way, register_global can be set to off, which is safer.
// (Note: register_global can also be set to on.)
// -------------------------------------------------------------------------

// -------------------------------------------------------------------------
// When a variable is submitted, quotes ' are replaced by backslash-quotes \'
// This function removes the extra backslash that is added
// -------------------------------------------------------------------------
remove_magic_quotes(&$HTTP_GET_VARS);
remove_magic_quotes(&$HTTP_POST_VARS);
// remove_magic_quotes(&$HTTP_COOKIE_VARS); // done in the net2ftp_loginform() function

// Do not add remove_magic_quotes for $GLOBALS because this would call the same
// function a second time, replacing \' by ' and \" by "


// -------------------------------------------------------------------------
// POST variables (from forms)
// -------------------------------------------------------------------------
// From the login form
$input_ftpserver =             $HTTP_POST_VARS['input_ftpserver'];
$input_ftpserverport =         $HTTP_POST_VARS['input_ftpserverport'];
$input_username =              $HTTP_POST_VARS['input_username'];
$input_password =              $HTTP_POST_VARS['input_password'];
$input_language =              $HTTP_POST_VARS['input_language'];
$input_skin =                  $HTTP_POST_VARS['input_skin'];
$input_directory =             $HTTP_POST_VARS['input_directory'];
$input_passivemode =           $HTTP_POST_VARS['input_passivemode'];
$input_sslconnect =            $HTTP_POST_VARS['input_sslconnect'];

// From the copy/move screen
$input_ftpserver2 =            $HTTP_POST_VARS['input_ftpserver2'];
$input_ftpserverport2 =        $HTTP_POST_VARS['input_ftpserverport2'];
$input_username2 =             $HTTP_POST_VARS['input_username2'];
$input_password2 =             $HTTP_POST_VARS['input_password2'];
$input_passivemode2 =          $HTTP_POST_VARS['input_passivemode2'];
$input_sslconnect2 =           $HTTP_POST_VARS['input_sslconnect2'];

// From the troubleshoot screen
$troubleshoot_ftpserver =             $HTTP_POST_VARS['troubleshoot_ftpserver'];
$troubleshoot_ftpserverport =         $HTTP_POST_VARS['troubleshoot_ftpserverport'];
$troubleshoot_username =              $HTTP_POST_VARS['troubleshoot_username'];
$troubleshoot_password =              $HTTP_POST_VARS['troubleshoot_password'];
$troubleshoot_language =              $HTTP_POST_VARS['troubleshoot_language'];
$troubleshoot_skin =                  $HTTP_POST_VARS['troubleshoot_skin'];
$troubleshoot_directory =             $HTTP_POST_VARS['troubleshoot_directory'];
$troubleshoot_passivemode =           $HTTP_POST_VARS['troubleshoot_passivemode'];
$troubleshoot_sslconnect =            $HTTP_POST_VARS['troubleshoot_sslconnect'];

// From all the forms
$net2ftp_ftpserver =           $HTTP_POST_VARS['net2ftp_ftpserver'];
$net2ftp_ftpserverport =       $HTTP_POST_VARS['net2ftp_ftpserverport'];
$net2ftp_username =            $HTTP_POST_VARS['net2ftp_username'];
$net2ftp_password_encrypted =  $HTTP_POST_VARS['net2ftp_password_encrypted'];
$net2ftp_language =            $HTTP_POST_VARS['net2ftp_language'];
$net2ftp_skin =                $HTTP_POST_VARS['net2ftp_skin'];
$net2ftp_passivemode =         $HTTP_POST_VARS['net2ftp_passivemode'];
$net2ftp_sslconnect =          $HTTP_POST_VARS['net2ftp_sslconnect'];
$net2ftp_viewmode =            $HTTP_POST_VARS['net2ftp_viewmode'];
$net2ftp_sort =                $HTTP_POST_VARS['net2ftp_sort'];
$net2ftp_sortorder =           $HTTP_POST_VARS['net2ftp_sortorder'];

// Different state variables
$state =             $HTTP_POST_VARS['state'];
$state2 =            $HTTP_POST_VARS['state2'];
$directory =         $HTTP_POST_VARS['directory'];
$cookiesetonlogin =  $HTTP_POST_VARS['cookiesetonlogin'];
$entry =             $HTTP_POST_VARS['entry'];
$list =              $HTTP_POST_VARS['list'];
$newNames =          $HTTP_POST_VARS['newNames'];
$formresult =        $HTTP_POST_VARS['formresult'];
$screen =            $HTTP_POST_VARS['screen'];
$targetDirectories = $HTTP_POST_VARS['targetDirectories'];
$copymovedelete =    $HTTP_POST_VARS['copymovedelete'];
$url =               $HTTP_POST_VARS['url'];
$text =              $HTTP_POST_VARS['text'];
$wysiwyg =           $HTTP_POST_VARS['wysiwyg'];
$FormAndFieldName =  $HTTP_POST_VARS['FormAndFieldName'];
$use_folder_names =  $HTTP_POST_VARS['use_folder_names'];
$command =           $HTTP_POST_VARS['command'];
$to =                $HTTP_POST_VARS['to'];
$message =           $HTTP_POST_VARS['message'];
$zipactions =        $HTTP_POST_VARS['zipactions'];
$searchoptions =     $HTTP_POST_VARS['searchoptions'];
$comparison =        $HTTP_POST_VARS['comparison'];

// Used in function printFeedbackForm(), file authorizations.inc.php
$name =              $HTTP_POST_VARS['name'];
$subject =           $HTTP_POST_VARS['subject'];
$email =             $HTTP_POST_VARS['email'];
$messagebody =       $HTTP_POST_VARS['messagebody'];


// -------------------------------------------------------------------------
// Move content of HTTP_POST_FILES to uploadedFilesArray and uploadedArchivesArray
// -------------------------------------------------------------------------
$file_counter = 0;
$archive_counter = 0;

$nr_upload_files    = getSetting("nr_upload_files");
$nr_upload_archives = getSetting("nr_upload_archives");

for ($i=1; $i<=$nr_upload_files; $i=$i+1) {
	if ($HTTP_POST_FILES["file$i"]["name"] != "") {
		$file_counter = $file_counter + 1;
		$uploadedFilesArray["$file_counter"]["name"]           = $HTTP_POST_FILES["file$i"]["name"];
		$uploadedFilesArray["$file_counter"]["tmp_name"]       = $HTTP_POST_FILES["file$i"]["tmp_name"];
		$uploadedFilesArray["$file_counter"]["size"]           = $HTTP_POST_FILES["file$i"]["size"];
	} // end if
} // end for

for ($i=1; $i<=$nr_upload_archives; $i=$i+1) {
	if ($HTTP_POST_FILES["archive$i"]["name"] != "") {
		$archive_counter = $archive_counter + 1;
		$uploadedArchivesArray["$archive_counter"]["name"]     = $HTTP_POST_FILES["archive$i"]["name"];
		$uploadedArchivesArray["$archive_counter"]["tmp_name"] = $HTTP_POST_FILES["archive$i"]["tmp_name"];
		$uploadedArchivesArray["$archive_counter"]["size"]     = $HTTP_POST_FILES["archive$i"]["size"];
	} // end if
} // end for

// -------------------------------------------------------------------------
// GET variables (from URL)
// -------------------------------------------------------------------------

$get_ftpserver =          $HTTP_GET_VARS['ftpserver'];
$get_ftpserverport =      $HTTP_GET_VARS['ftpserverport'];
$get_username =           $HTTP_GET_VARS['username'];
$get_language =           $HTTP_GET_VARS['language'];
$get_skin =               $HTTP_GET_VARS['skin'];
$get_passivemode =        $HTTP_GET_VARS['passivemode'];
$get_sslconnect =         $HTTP_GET_VARS['sslconnect'];
$get_viewmode =           $HTTP_GET_VARS['viewmode'];

$get_state =              $HTTP_GET_VARS['state'];
$get_state2 =             $HTTP_GET_VARS['state2'];
$get_directory =          $HTTP_GET_VARS['directory'];
$get_entry =              $HTTP_GET_VARS['entry'];


// -------------------------------------------------------------------------
// COOKIE variabes
// They are declared in the net2ftp_loginform() function in the net2ftp_loginform.inc.php file
// -------------------------------------------------------------------------


// -------------------------------------------------------------------------
// SERVER variabes
// -------------------------------------------------------------------------

$PHP_SELF =        $HTTP_SERVER_VARS['PHP_SELF'];
$HTTP_REFERER =    $HTTP_SERVER_VARS['HTTP_REFERER'];
$HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
$REMOTE_ADDR =     $HTTP_SERVER_VARS['REMOTE_ADDR'];
$REMOTE_PORT =     $HTTP_SERVER_VARS['REMOTE_PORT'];

$PHP_AUTH_USER = $HTTP_SERVER_VARS['PHP_AUTH_USER'];
$PHP_AUTH_PW = $HTTP_SERVER_VARS['PHP_AUTH_PW'];



// -------------------------------------------------------------------------
// User logs in using the form:
//   1. clean the input
//   2. set the directory to the one from the cookie
//   3. log the login (Note: The logging can be activated or not activated,
//      depending on a setting in the settings.inc.php file)
// -------------------------------------------------------------------------
if (strlen($input_ftpserver) > 1 && strlen($input_username) > 1) {
	$net2ftp_ftpserver          = cleanFtpserver($input_ftpserver);
	$net2ftp_ftpserverport      = trim($input_ftpserverport);
	$net2ftp_username           = trim($input_username);
	$net2ftp_password_encrypted = encryptPassword(trim($input_password));
	$net2ftp_language           = trim($input_language);
	$net2ftp_skin               = trim($input_skin);
	$net2ftp_passivemode        = trim($input_passivemode);
	$net2ftp_sslconnect         = trim($input_sslconnect);

// If the current directory is within the rootdirectory, then it is OK; if not, redirect to the rootdirectory
	if (isAuthorizedDirectory(trim($input_directory)) == true) { $directory = trim($input_directory); }
	else                                                       { $directory = $rootdirectory_current; }


	$resultArray = logLogin($input_ftpserver, $input_username);
	$result = getResult($resultArray);
	if ($result == false) { printErrorMessage($resultArray, "exit", "headerfooter"); }
}


// -------------------------------------------------------------------------
// User logs in using a bookmark
// -------------------------------------------------------------------------
elseif (strlen($get_ftpserver) > 1 && strlen($get_username) > 1 && strlen($net2ftp_ftpserver) < 1) {

	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header("WWW-Authenticate: Basic realm=\"Please enter your username and password for FTP server " . $get_ftpserver . "\"");
		header("HTTP/1.0 401 Unauthorized");
		$resultArray['message'] = "You did not fill in your login information in the popup window.<br />Click on \"Go to the login page\" below.\n";
		$resultArray['drilldown'] = "registerglobals > initial check\n";
		printErrorMessage($resultArray, "exit", "headerfooter");
		exit;
	}

	$net2ftp_ftpserver = cleanFtpserver($get_ftpserver);
	$net2ftp_ftpserverport = trim($get_ftpserverport);
	$net2ftp_username = trim($PHP_AUTH_USER);
	$net2ftp_password_encrypted = encryptPassword(trim($PHP_AUTH_PW));
	$net2ftp_language = trim($get_language);
	$net2ftp_skin = trim($get_skin);
	$net2ftp_passivemode = trim($get_passivemode);
	$net2ftp_sslconnect = trim($get_sslconnect);
	$state = trim($get_state);
	$state2 = trim($get_state2);
	$directory = trim($get_directory);
	$entry = trim($get_entry);

	$resultArray = logLogin($get_ftpserver, $get_username);
	$result = getResult($resultArray);
	if ($result == false) { printErrorMessage($resultArray, "exit", "headerfooter"); }
}


// -------------------------------------------------------------------------
// Only the state and state2 can be set
// For the screenshots, details, HTTP error pages
// -------------------------------------------------------------------------
elseif(strlen($get_state) > 1) {
	$state = trim($get_state);
	$state2 = trim($get_state2);
}

// -------------------------------------------------------------------------
// Clean and verify the input
// -------------------------------------------------------------------------
$directory = cleanDirectory($directory);
if (strlen($state) < 1) { $state = "homepage"; $state2 = "login"; }


// -------------------------------------------------------------------------
// Get information about the browser and protocol
// -------------------------------------------------------------------------
$browser_agent = getBrowser("agent");
$browser_version = getBrowser("version");
$browser_platform = getBrowser("platform");

?>