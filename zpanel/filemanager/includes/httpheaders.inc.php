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
// Don't cache any page
// -------------------------------------------------------------------------
if ($state == "manage" && ($state2 == "downloadfile" || $state2 == "download") && $browser_agent == "IE") {
	header("Pragma: public");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-cache");
	header("Cache-Control: post-check=0,pre-check=0");
	header("Cache-Control: max-age=0");
}
else {
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-cache");
	header("Cache-Control: post-check=0,pre-check=0");
	header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
}


// -------------------------------------------------------------------------
// Set cookie with login information and last directory used
// See index.php, printLoginForm and browse
// -------------------------------------------------------------------------
if ($cookiesetonlogin == "yes") {
	setcookie ("net2ftpcookie_ftpserver", $input_ftpserver, time()+60*60*24*30);
	setcookie ("net2ftpcookie_username", $input_username, time()+60*60*24*30);
	setcookie ("net2ftpcookie_language", $input_language, time()+60*60*24*30);
	setcookie ("net2ftpcookie_skin", $input_skin, time()+60*60*24*30);
	setcookie ("net2ftpcookie_passivemode", $input_passivemode, time()+60*60*24*30);
	setcookie ("net2ftpcookie_sslconnect", $input_sslconnect, time()+60*60*24*30);
}
elseif ($cookiesetonlogin == "clear") {
	setcookie ("net2ftpcookie_ftpserver", "", 0);
	setcookie ("net2ftpcookie_ftpserverport", "", 0);
	setcookie ("net2ftpcookie_username", "", 0);
	setcookie ("net2ftpcookie_directory", "", 0);
	setcookie ("net2ftpcookie_language", "", 0);
	setcookie ("net2ftpcookie_skin", "", 0);
	setcookie ("net2ftpcookie_passivemode", "", 0);
	setcookie ("net2ftpcookie_sslconnect", "", 0);
	setcookie ("net2ftpcookie_viewmode", "", 0);
	header("Location:index.php");
	exit();
}

if ($state == "browse" || ($state == "login" && $directory != "")) {
// This if condition is needed, otherwise the directory is set to ""
// when logging out (the directory is "" at that point)
	setcookie ("net2ftpcookie_directory", $directory, time()+60*60*24*30);
}


// -------------------------------------------------------------------------
// Delete cookie with login information; see printLogoutForm()
// -------------------------------------------------------------------------
//if ($cookiedeleteonlogout == "yes") {
//	setcookie ("net2ftpcookie_password", "", time()+60*60*24*30);
//}


// -------------------------------------------------------------------------
// If user wants to download a file then nothing may be written because headers are sent
// -------------------------------------------------------------------------
if ($state == "manage" && $state2 == "downloadfile") {
	$resultArray = ftp_downloadfile($directory, $entry);
	$success = getResult($resultArray);
	if ($success == false) { printErrorMessage($resultArray, "exit", "headerfooter"); }
	exit();
}
elseif ($state == "manage" && $state2 == "download") {

// Filter the list entries which were selected from the ones that were not selected
	$list = getSelectedEntries($list);

// Check that at least one entry was selected
	if (sizeof($list) < 1) {
		$resultArray['message'] = "Please select at least one directory or file !";
		$resultArray['drilldown'] = "httpheaders > initial check";
		printErrorMessage($resultArray, "exit", "headerfooter");
	}

	$zipactions['download'] = "yes";
	$zipactions['email'] = "no";
	$zipactions['save'] = "no";
	ftp_zip($conn_id, $directory, $list, $zipactions, $zipdir, 0);
	exit();
}

?>