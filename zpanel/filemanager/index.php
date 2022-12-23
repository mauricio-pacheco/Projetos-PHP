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
//  | This program is distributed in the hope that it will be useful,               |
//  | but WITHOUT ANY WARRANTY; without even the implied warranty of                |
//  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                 |
//  | GNU General Public License for more details.                                  |
//  |                                                                               |
//  | You should have received a copy of the GNU General Public License             |
//  | along with this program; if not, write to the Free Software                   |
//  | Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA     |
//  |                                                                               |
//   -------------------------------------------------------------------------------


// -------------------------------------------------------------------------
// Basic settings
// -------------------------------------------------------------------------

// Run the script to the end, even if the user hits the stop button
ignore_user_abort();

// Execute function shutdown() if the script reaches the maximum execution time (usually 30 seconds)
register_shutdown_function("shutdown");

// Get settings file
require_once("settings.inc.php");
require_once("settings_authorizations.inc.php");
$settings = getSetting("ALL");

// The root directory cannot be determined from an include file (PHP bug),
// so this is the workaround
$application_rootdir = dirname(__FILE__);
$application_includesdir = $application_rootdir . "/includes";
$application_tempdir     = $application_rootdir . "/temp";
$application_tempzipdir  = $application_rootdir . "/temp";
$application_localedir   = $application_rootdir . "/locale";

// Set the error reporting level
if ($settings['error_reporting'] == "ALL")  { error_reporting(E_ALL); }
if ($settings['error_reporting'] == "NONE") { error_reporting(0); }
else                                        { error_reporting(E_ERROR | E_WARNING | E_PARSE); }


// Timer: start
$starttime = microtime();

// -------------------------------------------------------------------------
// Function libraries which are always needed
// Those not always needed are included below, depending on certain variables
// -------------------------------------------------------------------------
require_once("./includes/net2ftp_loginform.inc.php");
require_once("./includes/advanced.inc.php");
require_once("./includes/authorizations.inc.php");
require_once("./includes/bookmark.inc.php");
require_once("./includes/browse.inc.php");
require_once("./includes/database.inc.php");
require_once("./includes/errorhandling.inc.php");
require_once("./includes/filesystem.inc.php");
require_once("./includes/html.inc.php");
require_once("./includes/homepage.inc.php");
require_once("./includes/languages.inc.php");
require_once("./includes/manage.inc.php");
require_once("./includes/skins.inc.php");
require_once("./includes/zip.lib.php");
includeLanguageFile();

// -------------------------------------------------------------------------
// Register global variables (POST, GET, GLOBAL, ...)
// -------------------------------------------------------------------------
require_once("./includes/registerglobals.inc.php");

// -------------------------------------------------------------------------
// Function libraries which are NOT always needed
// -------------------------------------------------------------------------
if ($state == "manage" && $state2 == "uploadfile") {
	require_once("./includes/pclerror.lib.php");
	require_once("./includes/pcltrace.lib.php");
	require_once("./includes/pcltar.lib.php");
	require_once("./includes/pclzip.lib.php");
}

// -------------------------------------------------------------------------
// Check authorizations
// -------------------------------------------------------------------------
$check_authorization = getAuthorization("check_authorization");
if ($check_authorization == "yes" && $net2ftp_ftpserver != "") {
	$resultArray = checkAuthorization($net2ftp_ftpserver, $net2ftp_ftpserverport, $directory, $net2ftp_username);
	$result = getResult($resultArray);
	if ($result == false) { printErrorMessage($resultArray, "exit", "headerfooter"); }
}


// -------------------------------------------------------------------------
// Send HTTP headers
// -------------------------------------------------------------------------
require_once("./includes/httpheaders.inc.php");


// -------------------------------------------------------------------------
// Begin HTML output
// -------------------------------------------------------------------------
HtmlBegin("net2ftp", $state, $state2, $screen, $directory, $entry, $settings['companyname']);


// ------------------------------------------------------------------------
// Main switch; functions are in include files "functions_somename.inc.php"
// -------------------------------------------------------------------------

switch ($state) {
	case "homepage":
		homepage($state2);
	break;
	case "browse":
		browse($state2, $directory, $FormAndFieldName, $sort, $sortorder);
	break;
	case "manage":
		manage($state2, $directory, $entry, $list, $newNames, $formresult, $screen, $targetDirectories, $copymovedelete, $text, $wysiwyg, $uploadedFilesArray, $uploadedArchivesArray, $use_folder_names, $command, $to, $message, $zipactions, $searchoptions, $comparison);
	break;
	case "bookmark":
		bookmark($directory, $url, $text);
	break;
	case "advanced":
		advanced($state2, $directory, $formresult);
	break;
	case "logout":
		homepage_logout($state2);
	break;
	case "feedback":
		printFeedbackForm($formresult);
	break;
	default:
		$resultArray['message'] = "Unexpected state string. Exiting."; 
		printErrorMessage($resultArray, "exit", "");
	break;
}


// -------------------------------------------------------------------------
// End HTML output
// -------------------------------------------------------------------------

// Timer: stop
$endtime = microtime();

HtmlEnd($state, $state2, $screen);

?>