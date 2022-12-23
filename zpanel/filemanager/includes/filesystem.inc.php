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
function ftp_openconnection() {

// --------------
// This function opens an ftp connection
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $net2ftp_ftpserver, $net2ftp_ftpserverport, $net2ftp_username, $net2ftp_password_encrypted, $net2ftp_passivemode, $net2ftp_sslconnect;


// Check if the FTP module of PHP is installed
	if (function_exists("ftp_connect") == false) { return putResult(false, "", "function_exists", "ftp_openconnection > function_exists > ftp_connect: FTP module of PHP", "The <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this FTP module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">php.net</a><br />"); }

// Decrypt password
	$net2ftp_password = decryptPassword($net2ftp_password_encrypted);

// Check if port nr is filled in
	if ($net2ftp_ftpserverport < 1 || $net2ftp_ftpserverport > 65535 || $net2ftp_ftpserverport == "") { $net2ftp_ftpserverport = 21; }

// Set up basic connection
	$ftp_connect = "ftp_connect";
	if ($net2ftp_sslconnect == "yes" && function_exists("ftp_ssl_connect")) { $ftp_connect = "ftp_ssl_connect"; }
	$conn_id = $ftp_connect("$net2ftp_ftpserver", $net2ftp_ftpserverport);
	if ($conn_id == false) { return putResult(false, "", "$ftp_connect", "ftp_openconnection > $ftp_connect: net2ftp_ftpserver=$net2ftp_ftpserver.", "Unable to connect to FTP server <b>$net2ftp_ftpserver</b> on port <b>$net2ftp_ftpserverport</b>.<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Login with username and password
	$login_result = ftp_login($conn_id, $net2ftp_username, $net2ftp_password);
	if ($login_result == false) { return putResult(false, "", "ftp_login", "ftp_openconnection > ftp_login: conn_id=$conn_id; net2ftp_username=$net2ftp_username.", "Unable to login to FTP server <b>$net2ftp_ftpserver</b> with username <b>$net2ftp_username</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Set passive mode
	if ($net2ftp_passivemode == "yes") { 
		$success = ftp_pasv($conn_id, TRUE); 
		if ($success == false) { return putResult(false, "", "ftp_pasv", "ftp_openconnection > ftp_pasv: conn_id=$conn_id;", "Unable to switch to the passive mode on FTP server <b>$net2ftp_ftpserver</b>.<br />"); }
	}

// Get the system type
//	$net2ftp_systype = ftp_systype($conn_id);

// Return true if everything went fine
	return putResult(true, $conn_id, "", "", "");


} // End function ftp_openconnection

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************











// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function ftp_openconnection2() {

// --------------
// This function opens an ftp connection to the secondary FTP server, to which
// files can be copied or moved.
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $input_ftpserver2, $input_ftpserverport2, $input_username2, $input_password2, $net2ftp_passivemode;


// Check if the FTP module of PHP is installed
	if (function_exists("ftp_connect") == false) { return putResult(false, "", "function_exists", "ftp_openconnection2 > function_exists > ftp_connect: FTP module of PHP", "The FTP module of PHP is not installed. Please install this FTP module.<br />"); }

// Clean the values that have been filled in 
	$input_ftpserver2 = cleanFtpserver($input_ftpserver2);
	$input_ftpserverport2 = trim($input_ftpserverport2);
	$input_username2 = trim($input_username2);
	$input_password2 = trim($input_password2);

// Check if port nr is correct
	if ($input_ftpserverport2 < 1 || $input_ftpserverport2 > 65535 || $input_ftpserverport2 == "") { $input_ftpserverport2 = 21; }

// Set up basic connection
	$conn_id = ftp_connect("$input_ftpserver2", $input_ftpserverport2);
	if ($conn_id == false) { return putResult(false, "", "ftp_connect", "ftp_openconnection2 > ftp_connect: input_ftpserver2=$input_ftpserver2.", "Unable to connect to the second (target) FTP server <b>$input_ftpserver2</b> on port <b>$input_ftpserverport2</b>.<br /><br />Are you sure this is the address of the second (target) FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Login with username and password
	$login_result = ftp_login($conn_id, $input_username2, $input_password2);
	if ($login_result == false) { return putResult(false, "", "ftp_login", "ftp_openconnection2 > ftp_login: conn_id=$conn_id; input_username2=$input_username2.", "Unable to login to the second (target) FTP server <b>$input_ftpserver2</b> with username <b>$input_username2</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Set passive mode
	if ($net2ftp_passivemode == "yes") { 
		$success = ftp_pasv($conn_id, TRUE); 
		if ($success == false) { return putResult(false, "", "ftp_pasv", "ftp_openconnection2 > ftp_pasv: conn_id=$conn_id;", "Unable to switch to the passive mode on FTP server <b>$input_ftpserver2</b>.<br />"); }
	}

// Get the system type
//	$net2ftp_systype = ftp_systype($conn_id);


	return putResult(true, $conn_id, "", "", "");

} // End function ftp_openconnection2

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function ftp_openconnection_ssl() {

// --------------
// This function opens an SSL FTP connection
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $net2ftp_ftpserver, $net2ftp_ftpserverport, $net2ftp_username, $net2ftp_password_encrypted, $net2ftp_passivemode;


// Check if the FTP module of PHP is installed
	if (function_exists("ftp_login") == false) { return putResult(false, "", "function_exists", "ftp_openconnection > function_exists > ftp_login: FTP module of PHP", "The FTP module of PHP is not installed. Please install this FTP module.<br />"); }
	if (function_exists("ftp_ssl_connect") == false) { return putResult(false, "", "function_exists", "ftp_openconnection_ssl > function_exists > ftp_ssl_connect", "The OpenSSL module of PHP is not installed. If you want to use SSL connections, this module is needed.<br />"); }

// Decrypt password
	$net2ftp_password = decryptPassword($net2ftp_password_encrypted);

// Check if port nr is filled in
	if ($net2ftp_ftpserverport < 1 || $net2ftp_ftpserverport > 65535 || $net2ftp_ftpserverport == "") { $net2ftp_ftpserverport = 21; }

// Set up basic connection WITH SSL
	$conn_id = ftp_ssl_connect("$net2ftp_ftpserver", $net2ftp_ftpserverport);
	if ($conn_id == false) { return putResult(false, "", "ftp_connect", "ftp_openconnection > ftp_connect: net2ftp_ftpserver=$net2ftp_ftpserver.", "Unable to connect to FTP server <b>$net2ftp_ftpserver</b> on port <b>$net2ftp_ftpserverport</b>.<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Login with username and password
	$login_result = ftp_login($conn_id, $net2ftp_username, $net2ftp_password);
	if ($login_result == false) { return putResult(false, "", "ftp_login", "ftp_openconnection > ftp_login: conn_id=$conn_id; net2ftp_username=$net2ftp_username.", "Unable to login to FTP server <b>$net2ftp_ftpserver</b> with username <b>$net2ftp_username</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br /><br />"); }

// Set passive mode
	if ($net2ftp_passivemode == "yes") { 
		$success = ftp_pasv($conn_id, TRUE); 
		if ($success == false) { return putResult(false, "", "ftp_pasv", "ftp_openconnection_ssl > ftp_pasv: conn_id=$conn_id;", "Unable to switch to the passive mode on FTP server <b>$net2ftp_ftpserver</b>.<br />"); }
	}

// Get the system type
//	$net2ftp_systype = ftp_systype($conn_id);

// Return true if everything went fine
	return putResult(true, $conn_id, "", "", "");

} // End function ftp_openconnection_ssl

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_closeconnection($conn_id) {

// --------------
// This function closes an ftp connection
// --------------

	ftp_quit($conn_id);

// In PHP 4.2.3, ftp_quit does not return anything any more

	return putResult(true, true, "", "", "");

} // End function ftp_closeconnection

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_myrename($conn_id, $directory, $entry, $newName) {

// --------------
// This function renames a directory
// --------------

	$old = glueDirectories($directory, $entry);
	$new = glueDirectories($directory, $newName);

	$success1 = ftp_rename($conn_id, $old, $new);
	if ($success1 == false) { return putResult(false, "", "ftp_rename", "ftp_myrename > ftp_rename: conn_id=$conn_id; old=$old; new=$new.", "Unable to rename directory or file <b>$old</b> into <b>$new</b><br />"); }

	return putResult(true, true, "", "", "");

} // End function ftp_myrename

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_mychmod($conn_id, $directory, $list, $divelevel) {

// --------------
// This function chmods a directory or file
//
// $list[$i]['dirorfile'] contains d or - which indicates if the entry is a directory or a file
// $list[$i]['dirfilename'] contains the name of the entry
// $list[$i]['chmodoctal'] contains the 3-digit nr 
//
// If the entry is a directory, $list[$i]['chmod_subdirectories'] and $list[$i]['chmod_subfiles'] are "yes" if 
// the subdirectories and files within the chmodded directory should also be chmodded
// --------------

// -------------------------------------------------------------------------
// Separate the directories from the files
// -------------------------------------------------------------------------
	$counter_directories = 1;
	$counter_files = 1;
	for ($i=1; $i<=count($list); $i=$i+1) {
		if     ($list[$i]['dirorfile'] == "d") { $list_directories[$counter_directories] = $list[$i]; $counter_directories = $counter_directories + 1; }
		elseif ($list[$i]['dirorfile'] == "-") { $list_files[$counter_files] = $list[$i];             $counter_files = $counter_files + 1; }
	}

// -------------------------------------------------------------------------
// For all directories
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_directories); $i=$i+1) {

		$currentdirectory = glueDirectories($directory, $list_directories[$i]['dirfilename']);

// ------------------------------------
// Chmod the directory
// If the $divelevel == 0 then chmod it in any case as it is the top directory
// If the $divelevel > 0  then chmod it only if chmod_subdirectories == "yes"
// ------------------------------------
		if ($list_directories[$i]['chmod_subdirectories'] == "yes" || $divelevel == 0) {
			$sitecommand = "chmod 0" . $list_directories[$i]['chmodoctal'] . " $currentdirectory";
			$success1 = ftp_site($conn_id, $sitecommand);
			if ($success1 == false) { return putResult(false, "", "ftp_site", "ftp_mychmod > ftp_site: conn_id=$conn_id; directory=$directory; sitecommand=$sitecommand.", "Unable to execute site command <b>$sitecommand</b>. Note that the CHMOD command is only available on Unix FTP servers, not on Windows FTP servers."); }
			elseif ($success1 == true)  { echo "Directory <b>$currentdirectory</b> successfully chmodded to <b>" . $list_directories[$i]['chmodoctal'] . "</b>.<br />"; }
		}

// ------------------------------------
// If the subdirectories and files within the current directory also have to be chmodded...
// ------------------------------------
		if ($list_directories[$i]['chmod_subdirectories'] == "yes" || $list_directories[$i]['chmod_subfiles'] == "yes") {

// Get a new list
			$resultArray = ftp_getlist($conn_id, $currentdirectory);
			$nicelist_warnings_directory = getResult($resultArray);
			if ($nicelist_warnings_directory == false) { printErrorMessage($resultArray, "exit", ""); }
			$newlist = $nicelist_warnings_directory[1];

// Add information to the list
			for ($j=1; $j<count($newlist); $j++) {
				$newlist[$j]['chmodoctal'] = $list_directories[$i]['chmodoctal'];
				$newlist[$j]['chmod_subdirectories'] = $list_directories[$i]['chmod_subdirectories'];
				$newlist[$j]['chmod_subfiles'] = $list_directories[$i]['chmod_subfiles'];
			}

// Call the function recursively
			$newdivelevel = $divelevel + 1;
			ftp_mychmod($conn_id, $currentdirectory, $newlist, $newdivelevel);

		} // end if subdirectories and files

	} // end for list_directories

// -------------------------------------------------------------------------
// Process the files
// -------------------------------------------------------------------------

	for ($i=1; $i<=count($list_files); $i=$i+1) {

		$currentfile = glueDirectories($directory, $list_files[$i]['dirfilename']);

// Chmod the files
// If the $divelevel == 0 then chmod them in any case as they are the top files
// If the $divelevel > 0  then chmod them only if chmod_subfiles == "yes"

		if ($list_files[$i]['chmod_subfiles'] == "yes" || $divelevel == 0) {
			$sitecommand = "chmod 0" . $list_files[$i]['chmodoctal'] . " $currentfile";
			$success1 = ftp_site($conn_id, $sitecommand);
			if ($success1 == false) { return putResult(false, "", "ftp_site", "ftp_mychmod > ftp_site: conn_id=$conn_id; directory=$directory; sitecommand=$sitecommand.", "Unable to execute site command <b>$sitecommand</b>. Note that the CHMOD command is only available on Unix FTP servers, not on Windows FTP servers."); }
			elseif ($success1 == true)  { echo "File <b>$currentfile</b> was chmodded successfully to <b>" . $list_files[$i]['chmodoctal'] . "</b>.<br />"; }
		}

	} // end for list_files

// Print message
	if ($divelevel == 0) { echo "<br /><br />All the selected directories and files have been processed.<br /><br />"; }

} // End function ftp_mychmod

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_myrmdir($conn_id, $directory) {

// --------------
// This function deletes a directory
// --------------

// Replace \' by \\' to be able to delete directories with names containing \'
	$directory = str_replace("\'", "\\\'", $directory);

// Delete directory
	$success1 = ftp_rmdir($conn_id, $directory);
	if ($success1 == false) { return putResult(false, "", "ftp_rmdir", "ftp_myrmdir > ftp_rmdir: conn_id=$conn_id; directory=$directory.", "Unable to delete the directory <b>$directory</b><br />"); }

	return putResult(true, true, "", "", "");

} // End function ftp_myrmdir

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_newdirectory($conn_id, $directory) {

// --------------
// This function creates a new remote directory
// --------------

	$success1 = ftp_mkdir($conn_id, $directory);
	if ($success1 == false) { return putResult(false, "", "ftp_newdirectory", "ftp_newdirectory > ftp_mkdir: conn_id=$conn_id; directory=$directory.", "Unable to create the directory <b>$directory</b><br />"); }

	return putResult(true, true, "", "", "");

} // End function ftp_newdirectory

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_readfile($conn_id, $directory, $file) {

// --------------
// This function opens a remote text file and it returns a string
// It can be used stand-alone (with conn_id = "") and then a new connection is opened
// Else it can also be used in a loop (with conn_id != false) and then the existing connection is opened
// --------------


// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;

	$source = glueDirectories($directory, $file);


// --------------------
// Step 1/4: Create a temporary filename
	$tempfilename = tempnam($application_tempdir, "read__");
	if ($tempfilename == false)  { @unlink($tempfilename); return putResult(false, "", "tempnam", "ftp_readfile > tempnam: application_tempdir=$application_tempdir.", "Unable to create the temporary file<br />"); }
	registerTempfile("register", $tempfilename);


// --------------------
// Step 2/4: Copy remote file to the temporary file
// Open connection if needed
	if ($conn_id == "") {
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false)  { @unlink($tempfilename); return putResult(false, "", "ftp_openconnection", "ftp_readfile > " . $resultArray['drilldown'], $resultArray['message']); }
		$leave_conn_open = "no";
	}

// Get file
	$ftpmode = ftpAsciiBinary($source);

	$success1 = ftp_get($conn_id, "$tempfilename", "$source", $ftpmode);
	if ($success1 == false) { @unlink($tempfilename); return putResult(false, "", "ftp_get", "ftp_readfile > ftp_get: conn_id=$conn_id; tempfilename=$tempfilename, source=$source, ftpmode=$ftpmode.", "Unable to get the file <b>$source</b> from the FTP server and to save it as temporary file <b>$tempfilename</b>.<br />Check the permissions of the $application_tempdir directory.<br />"); }

// Close connection
	if ($leave_conn_open == "no") {
		$resultArray = ftp_closeconnection($conn_id);
		$success2 = getResult($resultArray);
	}

// --------------------
// Step 3/4: Read temporary file

// From the PHP manual:
// Note:  The mode may contain the letter 'b'. 
// This is useful only on systems which differentiate between binary and text 
// files (i.e. Windows. It's useless on Unix). If not needed, this will be 
// ignored. You are encouraged to include the 'b' flag in order to make your scripts 
// more portable.
// Thanks to Malte for bringing this to my attention !

	$handle = fopen($tempfilename, "rb"); // Open the file for reading only
	if ($handle == false) { @unlink($tempfilename); return putResult(false, "", "fopen", "ftp_readfile > fopen: tempfilename=$tempfilename.", "Unable to open the temporary file. Check the permissions of the net2ftp /temp directory.<br />"); }

	clearstatcache(); // for filesize

	$string = fread($handle, filesize($tempfilename));
	if ($string == false && filesize($tempfilename)>0) { @unlink($tempfilename); return putResult(false, "", "fread", "ftp_readfile > fread: handle=$handle; tempfilename=$tempfilename.", "Unable to read the temporary file<br />"); }

	$success3 = fclose($handle);
	if ($success3 == false) { @unlink($tempfilename); return putResult(false, "", "fclose", "ftp_readfile > fclose: handle=$handle", "Unable to close the handle of the temporary file<br />"); }


// --------------------
// Step 4/4: Delete temporary file
	$success4 = @unlink($tempfilename);
	if ($success4 == false) { return putResult(false, "", "unlink", "ftp_readfile > unlink: tempfilename=$tempfilename.", "Unable to delete the temporary file<br />"); } 
	registerTempfile("unregister", $tempfilename);

	return putResult(true, $string, "", "", "");

} // End function ftp_readfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_writefile($conn_id, $directory, $file, $string) {

// --------------
// This function writes a string to a remote text file.
// If it already existed, it will be overwritten without asking for a confirmation.
// It can be used stand-alone (with conn_id = "") and then a new connection is opened
// Else it can also be used in a loop (with conn_id != false) and then the existing connection is opened
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;

	$target = glueDirectories($directory, $file);


// Step 0/4: Check if the string is empty; in that case, do nothing and return true
	if (strlen($string) < 1) { return putResult(true, true, "", "", ""); }

// Step 1/4: Create a temporary filename
	$tempfilename = tempnam($application_tempdir, "write__");
	if ($tempfilename == false)  { @unlink($tempfilename); return putResult(false, "", "tempnam", "ftp_writefile > tempnam: application_tempdir=$application_tempdir.", "Unable to create the temporary file. Check the permissions of the net2ftp /temp directory.<br />"); }
	registerTempfile("register", $tempfilename);

// Step 2/4: Write the string to the temporary file
	$handle = fopen($tempfilename, "wb");
	if ($handle == false) { @unlink($tempfilename); return putResult(false, "", "fopen", "ftp_writefile > fopen: tempfilename=$tempfilename.", "Unable to open the temporary file<br />"); }

	$success1 = fwrite($handle, $string);
	if ($success1 == false && strlen($string)>0) { @unlink($tempfilename); return putResult(false, "", "fwrite", "ftp_writefile > fwrite: handle=$handle; string=$string.", "Unable to write the string to the temporary file <b>$tempfilename</b>.<br />Check the permissions of the $application_tempdir directory.<br />"); }

	$success2 = fclose($handle);
	if ($success2 == false) { @unlink($tempfilename); return putResult(false, "", "fclose", "ftp_writefile > fclose: handle=$handle.", "Unable to close the handle of the temporary file<br />"); }

// Step 3/4: Copy temporary file to remote file
// Open connection if needed
	if ($conn_id == "") {
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false)  { 
			@unlink($tempfilename);
			return putResult(false, "", "ftp_openconnection", "ftp_writefile > " . $resultArray['drilldown'], $resultArray['message']); 
			}
		$leave_conn_open = "no";
	}

// Put file
	$ftpmode = ftpAsciiBinary($target);

	$success3 = ftp_put($conn_id, $target, $tempfilename, $ftpmode);
	if ($success3 == false) { @unlink($tempfilename); return putResult(false, "", "ftp_put", "ftp_writefile > ftp_put: conn_id=$conn_id; target=$target; tempfilename=$tempfilename, ftpmode=$ftpmode.", "Unable to put the file <b>$target</b> on the FTP server.<br />You may not have write permissions on the directory.<br />"); }

// Close connection
	if ($leave_conn_open == "no") {
		$resultArray = ftp_closeconnection($conn_id);
		$success2 = getResult($resultArray);
	}

// Step 4/4: Delete temporary file
	$success5 = @unlink($tempfilename);
	if ($success5 == false) { return putResult(false, "", "unlink", "ftp_writefile > unlink: tempfilename=$tempfilename.", "Unable to delete the temporary file<br />"); } 
	registerTempfile("unregister", $tempfilename);

	return putResult(true, true, "", "", "");

} // End function ftp_writefile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_copymovedelete($conn_id_source, $conn_id_target, $list, $copymovedelete, $divelevel) {

// --------------
// This function copies/moves/deletes many directories and files
//
// $list[$i]['dirorfile'] contains d or - which indicates if its a directory or a file
// $list[$i]['dirfilename'] contains the entry name
// $list[$i]['sourcedirectory'] contains the source directory
// $list[$i]['targetdirectory'] contains the target directory
// $list[$i]['newname'] contains the new name if divelevel = 0; for deeper levels the newname is the entry name itself
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;

// -------------------------------------------------------------------------
// Separate the directories from the files
// -------------------------------------------------------------------------
	$counter_directories = 1;
	$counter_files = 1;
	for ($i=1; $i<=count($list); $i=$i+1) {
		if     ($list[$i]['dirorfile'] == "d") { $list_directories[$counter_directories] = $list[$i]; $counter_directories = $counter_directories + 1; }
		elseif ($list[$i]['dirorfile'] == "-") { $list_files[$counter_files] = $list[$i];             $counter_files = $counter_files + 1; }
	}

	if ($divelevel == 0) { echo "<ul>\n"; }

// -------------------------------------------------------------------------
// For all directories
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_directories); $i=$i+1) {

// Print starting message
		$source = glueDirectories($list_directories[$i]['sourcedirectory'], $list_directories[$i]['dirfilename']);

		echo "<li> Processing directory <b>$source</b> </li>\n";
		echo "<ul>\n";

		if ($divelevel > 0) { $target = glueDirectories($list_directories[$i]['targetdirectory'], $list_directories[$i]['dirfilename']); }
		else                { $target = glueDirectories($list_directories[$i]['targetdirectory'], $list_directories[$i]['newname']); }

// Check that the targetdirectory is not a subdirectory of the sourcedirectory
		if (($conn_id_source == $conn_id_target) && (strstr($target, $source) != false)) { 
			$resultArray['message'] = "<li >The destination directory <b>$target</b> is a subdirectory of the source directory <b>$source</b></li>"; 
			printErrorMessage($resultArray, "exit", "");
		}

// Create the targetdirectory
		if ($copymovedelete == "copy" || $copymovedelete == "move") {
			$success1 = ftp_mkdir($conn_id_target, $target);
			if ($success1 == false) { printWarningMessage("<li> Unable to create the subdirectory <b>$target</b>. It may already exist. Continuing the copy/move process...</li>"); }
			else                    { echo "<li> Created target subdirectory <b>$target</b> </li>"; }
		}

// Get a new list
		$resultArray = ftp_getlist($conn_id_source, $source);
		$nicelist_warnings_directory = getResult($resultArray);
		if ($nicelist_warnings_directory == false) { printErrorMessage($resultArray, "exit", ""); }
		$newlist = $nicelist_warnings_directory[1];

// Add information to the list
		for ($j=0; $j<count($newlist); $j++) {
			$newlist[$j]['sourcedirectory'] = $source;
			$newlist[$j]['targetdirectory'] = $target;
		}

// Call the function recursively
		$newdivelevel = $divelevel + 1;
		ftp_copymovedelete($conn_id_source, $conn_id_target, $newlist, $copymovedelete, $newdivelevel);

// Delete the source directory
		if ($copymovedelete == "move" || $copymovedelete == "delete") { 
			$resultArray = ftp_myrmdir($conn_id_source, $source);
			$success4 = getResult($resultArray);
			if ($success4 == false) { printWarningMessage ("<li> Unable to delete the subdirectory <b>$source</b> - it may not be empty</li>"); }
			else                    { echo "<li> Deleted subdirectory <b>$source</b></li>"; }
		}

// Print ending message
		echo "<li> Processing of directory <b>$source</b> completed</li>\n";
		echo "</ul>\n";

	flush();

	} // end for list_directories

// -------------------------------------------------------------------------
// Process the files
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_files); $i=$i+1) {

// ------------------------------------
// Copy and move
// ------------------------------------
		if ($copymovedelete == "copy" || $copymovedelete == "move") {

// Get file from remote sourcedirectory to local temp directory
// Don't delete the source file yet
			$localtargetdir = $application_tempdir;
			$localtargetfile = $list_files[$i]['dirfilename'] . ".txt";
			$remotesourcedir = $list_files[$i]['sourcedirectory'];
			$remotesourcefile = $list_files[$i]['dirfilename'];
			$ftpmode = ftpAsciiBinary($list_files[$i]['dirfilename']);
			$copymove = "copy";
	
			$resultArray = ftp_getfile($conn_id_source, $localtargetdir, $localtargetfile, $remotesourcedir, $remotesourcefile, $ftpmode, $copymove);
			$success1 = getResult($resultArray);

// Put file from local temp directory to remote targetdirectory
// Delete the temporary file
			$localsourcedir = $application_tempdir;
			$localsourcefile =  $list_files[$i]['dirfilename'] . ".txt";
			$remotetargetdir = $list_files[$i]['targetdirectory'];
			if (isset($list_files[$i]['newname'])) { $remotetargetfile  = $list_files[$i]['newname']; }
			else                                   { $remotetargetfile  = $list_files[$i]['dirfilename']; }
			$copymove = "move";

			$resultArray = ftp_putfile($conn_id_target, $localsourcedir, $localsourcefile, $remotetargetdir, $remotetargetfile, $ftpmode, $copymove);
			$success2 = getResult($resultArray);
			if ($success2 == false && $copymovedelete == "copy")    { printWarningMessage("<li> Unable to copy the file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"); }
			elseif ($success2 == true && $copymovedelete == "copy") { echo "<li> Copied file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"; }


// Move: only if the operation is successful, delete the source file
			if ($copymovedelete == "move" && $success2 == true) { 
				$remotesource = glueDirectories($list_files[$i]['sourcedirectory'], $list_files[$i]['dirfilename']);

				$success3 = ftp_delete($conn_id_source, $remotesource);
				if ($success3 == false)                                                        { printWarningMessage("<li> Unable to move the file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"); }
				elseif ($copymovedelete == "move" && $success2 == true && $success3 == true)   { echo "<li> Moved file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"; }
			}

		} // end copy or move

// ------------------------------------
// Delete
// ------------------------------------
		elseif ($copymovedelete == "delete") {
			$remotesource = glueDirectories($list_files[$i]['sourcedirectory'], $list_files[$i]['dirfilename']);

			$success4 = ftp_delete($conn_id_source, $remotesource);
			if ($success4 == false)                                   { printWarningMessage("<li> Unable to delete the file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"); }
			elseif ($copymovedelete == "delete" && $success4 == true) { echo "<li> Deleted file <b>" . $list_files[$i]['dirfilename'] . "</b></li>"; }

		} // end delete

		flush();

	} // end for list_files

	if ($divelevel == 0) { echo "</ul>\n"; }

// Print message
	if ($divelevel == 0) { echo "<br /><span style=\"font-weight: bold;\">All the selected directories and files have been processed.</span><br /><br />"; }

} // End function ftp_copymovedelete

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_processfiles($dowhat, $conn_id, $directory, $list, $options, $result, $divelevel) {

// --------------
// This function does something with files (get size, find string, ...)
// The $list contains both directories and files. The files are simply processed; the 
// directories are parsed recursively.
//
// $list[$i]['dirorfile'] contains d or - which indicates if the entry is a directory or a file
// $list[$i]['dirfilename'] contains the name of the entry
// $list[$i]['size'] contains the size of the entry
// 
// OPTIONS:
// if ($dowhat == "calculatesize") then
// 	$options = array()						doesn't contain anything
// if ($dowhat == "findstring") then
// 	$options['string'] 						a string
//	$options['case_sensitive'] 					blank or yes
//	$options['filename'] 						a filename with possible wildcard character * (it should match this preg_match regular expression: "/^[a-zA-Z0-9_ *-]*$/")
//	$options['size_from'], $options['size_to'] 		a number (in Bytes)
//	$options['modified_from'], $options['modified_to']	unix timestamps of the modification dates
//
// RESULT:
// if ($dowhat == "calculatesize") then
// 	$result['size']
//	$result['skipped']
// if ($dowhat == "findstring") then
// 	$result[$k]['directory'] contains the directory
// 	$result[$k]['dirfilename'] contains the filename
// 	$result[$k]['line'] contains the line nr 
//
// --------------

// -------------------------------------------------------------------------
// Separate the directories from the files
// -------------------------------------------------------------------------
	$counter_directories = 1;
	$counter_files = 1;
	for ($i=1; $i<=count($list); $i=$i+1) {
		if     ($list[$i]['dirorfile'] == "d") { $list_directories[$counter_directories] = $list[$i]; $counter_directories = $counter_directories + 1; }
		elseif ($list[$i]['dirorfile'] == "-") { $list_files[$counter_files] = $list[$i];             $counter_files = $counter_files + 1; }
	}

// -------------------------------------------------------------------------
// For all directories
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_directories); $i=$i+1) {
		$currentdirectory = glueDirectories($directory, $list_directories[$i]['dirfilename']);

// Get a new list
		$resultArray = ftp_getlist($conn_id, $currentdirectory);
		$nicelist_warnings_directory = getResult($resultArray);
		if ($nicelist_warnings_directory == false) { printErrorMessage($resultArray, "exit", ""); }
		$newlist = $nicelist_warnings_directory[1];

// Call the function recursively
		$newdivelevel = $divelevel + 1;
		$result = ftp_processfiles($dowhat, $conn_id, $currentdirectory, $newlist, $options, $result, $newdivelevel);

	} // end for list_directories

// -------------------------------------------------------------------------
// Process the files
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_files); $i=$i+1) {

// -------------------------------
// Calculate size
// -------------------------------
		if ($dowhat == "calculatesize") {
// Check if the size information is entered
// Check also if the size is numeric
			if (isset($list_files[$i]['size']) && preg_match("/^[0-9]+$/", $list_files[$i]['size'])) { $result['size']    = $result['size'] + $list_files[$i]['size']; }
			else                                                                                     { $result['skipped'] = $result['skipped'] + 1; }
		} // end if calculatesize

// -------------------------------
// Find string
// -------------------------------
		elseif ($dowhat == "findstring") {

// Check file size
			if ($list_files[$i]['size'] < $options['size_from'] || $list_files[$i]['size'] > $options['size_to'])   { continue; }

// Check modification date (if that data is returned by the FTP server in the correct format)

			$mtime_file = strtotime($list_files[$i]['mtime']);
			// If strtotime cannot interprete the data returned by the FTP server it returns -1
			if (($mtime_file != -1) && (($mtime_file < $options['modified_from']) || ($mtime_file > $options['modified_to']))) { continue; }

// Check the filename
			$pattern = "/^" . $options['filename'] . "$/i"; // i at the end is for a case-insensitive match
			if (preg_match($pattern, $list_files[$i]['dirfilename']) == 0) { continue; }

// Read the file
			$resultArray = ftp_readfile("", $directory, $list_files[$i]['dirfilename']);
			$text = getResult($resultArray);

			// If the file could not be read correctly, continue to the next one
			if ($text == false)   { continue; }

// Split the file in an array, each element of the array containing one line of the file
			$text_lines = explode("\n", $text);
			// If the $text does not contain the separator string, then explode returns an array with the $text itself
			// ==> Try with another separator string
			if ($text_lines[0] == $text) { $text_lines = explode("\r\n", $text); }

// For each line, check if the string occurs
			for ($line=0; $line<count($text_lines); $line++) {

// STRSTR AND STRISTR
				if ($options['case_sensitive'] == "yes") { $found = strstr($text_lines[$line], $options['string']); }
				else                                     { $found = stristr($text_lines[$line], $options['string']); }

				if ($found != false) {
					$tempresult['directory'] = $directory;
					$tempresult['dirfilename'] = $list_files[$i]['dirfilename'];
					$tempresult['line']        = $line+1; // $text_lines[0] contains the line 1, etc...
					array_push($result, $tempresult);
				}

			} // end for 

		} // end if findstring

	} // end for list_files

	return $result;

} // End function ftp_processfiles

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************











// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_getfile($conn_id, $localtargetdir, $localtargetfile, $remotesourcedir, $remotesourcefile, $ftpmode, $copymove) {

// --------------
// This function copies or moves a remote file to a local file
// $ftpmode is used to specify whether the file is to be transferred in ASCII or BINARY mode
// $copymove is used to specify whether to delete (move) or not (copy) the local source
//
// True or false is returned
//
// The opposite function is ftp_putfile
// --------------

	if ($ftpmode == FTP_ASCII) { $printftpmode = "FTP_ASCII"; }
	elseif ($ftpmode == FTP_BINARY) { $printftpmode = "FTP_BINARY"; }

	$remotesource = glueDirectories($remotesourcedir, $remotesourcefile);
	$localtarget  = glueDirectories($localtargetdir, $localtargetfile);

// Get file
	$success1 = ftp_get($conn_id, $localtarget, $remotesource, $ftpmode);
	if ($success1 == false) { return putResult(false, "", "ftp_get", "ftp_getfile > ftp_get: conn_id=$conn_id; localtarget=$localtarget; remotesource=$remotesource.", "Unable to copy the remote file <b>$remotesource</b> to the local file using FTP mode <b>$printftpmode</b><br />"); }
	else { registerTempfile("register", $localtarget); }

// Copy ==> do nothing
// Move ==> delete remote source file
	if ($copymove != "copy") {
		$success2 = ftp_delete($conn_id, $remotesource);
		if ($success2 == false) { return putResult(false, "", "ftp_delete", "ftp_getfile > ftp_delete: conn_id=$conn_id; remotesource=$remotesource.", "Unable to delete file <b>$remotesource</b><br />"); }
	}

	return putResult(true, true, "", "", "");

} // End function ftp_getfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_putfile($conn_id, $localsourcedir, $localsourcefile, $remotetargetdir, $remotetargetfile, $ftpmode, $copymove) {

// --------------
// This function copies or moves a local file to a remote file
// $ftpmode is used to specify whether the file is to be transferred in ASCII or BINARY mode
// $copymove is used to specify whether to delete (move) or not (copy) the local source
//
// True or false is returned
//
// The opposite function is ftp_getfile
// --------------

	$localsource  = glueDirectories($localsourcedir, $localsourcefile);
	$remotetarget = glueDirectories($remotetargetdir, $remotetargetfile);

// In the function ftp_put, use FTP_BINARY without the double quotes, otherwhise ftp_put assumes FTP_ASCII
// DO NOT REMOVE THIS OR THE BINARY FILES WILL BE CORRUPTED (when copying, moving, uploading,...)
	if ($ftpmode == "FTP_BINARY") { $ftpmode = FTP_BINARY; } 

	if ($ftpmode == FTP_ASCII) { $printftpmode = "FTP_ASCII"; }
	elseif ($ftpmode == FTP_BINARY) { $printftpmode = "FTP_BINARY"; }

// Put local file to remote file
// int ftp_put (int ftp_stream, string remote_file, string local_file, int mode)
	$success1 = ftp_put($conn_id, $remotetarget, $localsource, $ftpmode);
	if ($success1 == false) { return putResult(false, "", "ftp_put", "ftp_putfile > ftp_put: conn_id=$conn_id; remotetarget=$remotetarget; localsource=$localsource.", "Unable to copy the local file to the remote file <b>$remotetarget</b> using FTP mode <b>$printftpmode</b><br />"); }
// If ftp_put fails, this function returns an error message and does not delete the temporary file.
// In case the file was copied, a copy exists in the source directory.
// In case the file was moved, the only copy is in the temporary directory, and so this has to be moved back to the source directory.

// Copy ==> do nothing
// Move ==> delete local source file
	if ($copymove != "copy") {
		$success2 = unlink($localsource);
		if ($success2 == false) { return putResult(false, "", "unlink", "ftp_putfile > unlink: localsource=$localsource.", "Unable to delete the local file<br />"); }
		else { registerTempfile("unregister", $localsource); }
	}

	return putResult(true, true, "", "", "");

} // End function ftp_putfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_downloadfile($directory, $entry) {


// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;

// -------------------------------------------------------------------------
// Get the file from the FTP server to the web server
// -------------------------------------------------------------------------

// Open connection
	$resultArray = ftp_openconnection();
	$conn_id = getResult($resultArray);
	if ($conn_id == false)  { printErrorMessage($resultArray, "exit", ""); }

// FTP mode
	$ftpmode = ftpAsciiBinary($entry);

// Temporary filename
	$tempfilename = glueDirectories($application_tempdir, "$entry.txt");

// Get the file
//                         ftp_getfile($conn_id, $localtargetdir, $localtargetfile, $remotesourcedir, $remotesourcefile, $ftpmode, $copymove)
		$resultArray = ftp_getfile($conn_id, $application_tempdir, "$entry.txt", $directory, $entry, $ftpmode, "copy");
		$success1 = getResult($resultArray);
		if ($success1 == false)  { @unlink($tempfilename); return putResult(false, "", "ftp_getfile", "ftp_downloadfile > " . $resultArray['drilldown'], $resultArray['message']); }
// Close connection
	$resultArray = ftp_closeconnection($conn_id);
	$success2 = getResult($resultArray);

// -------------------------------------------------------------------------
// Transfer temp file to browser
// -------------------------------------------------------------------------

	$fileType = getFileType($entry);
	$filename = trim(htmlentities($entry));
	$tempfilename = glueDirectories($application_tempdir, "$entry.txt");

// --------------------
// Cache-control headers
// --------------------
//	if ($HTTPS != "on") {
// From php.net user notes
// arabold AT nero DOT com (15-May-2003 10:11)
// We need to set the following headers to make downloads work using IE in HTTPS mode.
//		header("Pragma: ");
//		header("Cache-Control: ");
//		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//		header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
//		header("Cache-Control: post-check=0, pre-check=0", false);
//	}
//	else {
//		header("Cache-control: private");
//	}

// --------------------
// Content-type, for a complete list, see http://www.isi.edu/in-notes/iana/assignments/media-types/media-types
// Content-disposition: attachment. See http://www.w3.org/Protocols/HTTP/Issues/content-disposition.txt
// --------------------

// Default values
	$content_disposition = "attachment";
	$content_type = "application/octet-stream";

// Exceptions
	if ($fileType == "TEXT")                                             { $content_type = "text/plain"; }
	elseif ($fileType == "IMAGE") {
		if (ereg("(.*).jpg", $entry, $regs) == true)     { $content_type = "image/jpeg"; }
		elseif (ereg("(.*).png", $entry, $regs) == true) { $content_type = "image/png";  }
		elseif (ereg("(.*).gif", $entry, $regs) == true) { $content_type = "image/gif";  }
	}
	elseif ($fileType == "ARCHIVE") {
		if (ereg("(.*).zip", $entry, $regs) == true)     { $content_disposition = "inline"; $content_type = "application/zip"; }
		else                                                           { $content_type = "application/octet-stream"; }
	}
	elseif ($fileType == "OFFICE") {
		if (ereg("(.*).doc", $entry, $regs) == true)     { $content_type = "application/msword"; }
		elseif (ereg("(.*).xls", $entry, $regs) == true) { $content_type = "application/vnd.ms-excel"; }
		elseif (ereg("(.*).ppt", $entry, $regs) == true) { $content_type = "application/vnd.ms-powerpoint"; }
		elseif (ereg("(.*).mpp", $entry, $regs) == true) { $content_type = "application/vnd.ms-project"; }
		else                                                           { $content_type = "application/octet-stream"; }
	}

	header("Content-Type: $content_type");
	header("Content-Disposition: $content_disposition; filename=\"$filename\""); 
	header("Content-Description: $filename");
	header("Content-Length: " . filesize($tempfilename)); 
	header("Connection: close");

// --------------------
// Open file
// --------------------
// From the PHP manual:
// Note:  The mode may contain the letter 'b'. 
// This is useful only on systems which differentiate between binary and text 
// files (i.e. Windows. It's useless on Unix). If not needed, this will be 
// ignored. You are encouraged to include the 'b' flag in order to make your scripts 
// more portable.
// Thanks to Malte for bringing this to my attention !
	registerTempfile("register", $tempfilename);
	$handle = fopen($tempfilename , "rb"); 

// --------------------
// Send file to browser
// --------------------
	fpassthru($handle);

// --------------------
// Close file
// --------------------
	$success2 = @fclose($handle);
// Don't check on this error.
// When using IE6 and when downloading several times the same file without refreshing the page, this 
// error is returned.
//	if ($success2 == false) { @unlink($tempfilename); return putResult(false, "", "fclose", "ftp_downloadfile > fclose: handle=$handle.", "Unable to close the handle of the temporary file<br />"); }

// --------------------
// Delete the temporary file
// --------------------
	$success3 = @unlink($tempfilename);
//	if ($success3 == false) { return putResult(false, "", "unlink", "ftp_downloadfile > unlink: application_tempdir=$application_tempdir; entry=$entry.", "Unable to delete the temporary file<br />"); } 
	registerTempfile("unregister", $tempfilename);

} // End function ftp_downloadfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_zip($conn_id, $directory, $list, $zipactions, $zipdir, $divelevel) {

// --------------
// This function allows to download/save/email a zipfile which contains the selected directories and files
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $zipfile;
	global $application_tempzipdir;
	$email_feedback = getSetting("email_feedback");


// -------------------------------------------------------------------------
// Initialization
// -------------------------------------------------------------------------

// If $zipactions['download'] == "yes" and an error occurs, print the HTML header and footer
// In other cases, the header and footer are printed outside of this function
	if ($zipactions['download'] == "yes") { $printheaderfooter = "headerfooter"; }

	if ($divelevel == 0) {
// Create the zipfile
		$list = getSelectedEntries($list);
		$zipfile = new zipfile();
		$timenow = time();
		$zipdir = "";

// Open the connection
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false)  { printErrorMessage($resultArray, "exit", "$printheaderfooter"); }
	}

// -------------------------------------------------------------------------
// Separate the directories from the files
// -------------------------------------------------------------------------
	$counter_directories = 1;
	$counter_files = 1;
	for ($i=1; $i<=count($list); $i=$i+1) {
		if     ($list[$i]['dirorfile'] == "d") { $list_directories[$counter_directories] = $list[$i]; $counter_directories = $counter_directories + 1; }
		elseif ($list[$i]['dirorfile'] == "-") { $list_files[$counter_files] = $list[$i];             $counter_files = $counter_files + 1; }
	}

// -------------------------------------------------------------------------
// For all directories...
// -------------------------------------------------------------------------
	for ($i=1; $i<=count($list_directories); $i++) {
		$newdir = glueDirectories($directory, $list_directories[$i]['dirfilename']);
		$newzipdir = glueDirectories($zipdir, $list_directories[$i]['dirfilename']);
		$newdivelevel = $divelevel + 1;

		$resultArray = ftp_getlist($conn_id, $newdir);
		$nicelist_warnings_directory = getResult($resultArray);
		if ($nicelist_warnings_directory == false) { printErrorMessage($resultArray, "exit", "$printheaderfooter"); }
		$newlist = $nicelist_warnings_directory[1];

		ftp_zip($conn_id, $newdir, $newlist, $zipactions, $newzipdir, $newdivelevel);

	} // end for directories

// -------------------------------------------------------------------------
// For all files...
// -------------------------------------------------------------------------

	for ($i=1; $i<=count($list_files); $i++) {
		$resultArray = ftp_readfile($conn_id, $directory, $list_files[$i]['dirfilename']);
		$text = getResult($resultArray);

		$filename = glueDirectories($zipdir, $list_files[$i]['dirfilename']);
		if ($text == false && $text != "") { printErrorMessage($resultArray, "exit", "$printheaderfooter"); }
		else { $zipfile->addFile($text, $filename); }
	} // end for files

// -------------------------------------------------------------------------
// End
// -------------------------------------------------------------------------
	if ($divelevel == 0) {

// ------------------------
// Send the zipfile to the browser
// ------------------------
		if ($zipactions['download'] == "yes") {
			$timenow = time();

			header("Content-Type: application/zip");
			header("Content-Disposition: inline; filename=\"net2ftp-" . $timenow . ".zip\""); 
			header("Content-Description: net2ftp-" . $timenow . ".zip");
			header("Content-Length: ". strlen($zipfile->file()));
			echo $zipfile->file();
			flush();
			header("Connection: close");
		}

// ------------------------
// Save the zipfile string to a file
// ------------------------
		if ($zipactions['save'] == "yes" || $zipactions['email'] == "yes") {
			$string = $zipfile->file();

			$tempfilename = tempnam($application_tempzipdir, "zip__");
			if ($tempfilename == false) { @unlink($tempfilename); return putResult(false, "", "tempnam", "ftp_zip > tempnam: application_tempdir=$application_tempdir.", "Unable to create the temporary file<br />"); }
			registerTempfile("register", $tempfilename);

			$handle = fopen($tempfilename, "wb");
			if ($handle == false) { @unlink($tempfilename); return putResult(false, "", "fopen", "ftp_zip > fopen: tempfilename=$tempfilename.", "Unable to open the temporary file<br />"); }

			$success1 = fwrite($handle, $string);
			if ($success1 == false) { @unlink($tempfilename); return putResult(false, "", "fwrite", "ftp_zip > fwrite: handle=$handle; string=$string.", "Unable to write the string to the temporary file <b>$tempfilename</b>.<br />Check the permissions of the $application_tempdir directory.<br />"); }

			$success2 = fclose($handle);
			if ($success2 == false) { @unlink($tempfilename); return putResult(false, "", "fclose", "ftp_zip > fclose: handle=$handle.", "Unable to close the handle of the temporary file<br />"); }
		}

// ------------------------
// Save the zip file to the FTP server
// ------------------------
		if ($zipactions['save'] == "yes") {
			$success3 = ftp_putfile($conn_id, "", $tempfilename, $directory, $zipactions['save_filename'], FTP_BINARY, "copy");
			if ($success3 == false) { @unlink($tempfilename); return putResult(false, "", "ftp_put", "ftp_zip > ftp_put: conn_id=$conn_id; target=$target; tempfilename=$tempfilename, ftpmode=FTP_BINARY.", "Unable to put the file <b>" . $zipactions['save_filename'] . "</b> on the FTP server.<br />You may not have write permissions on the directory.<br />"); }
			else { echo "The zip file has been saved on the FTP server as <b>" . $zipactions['save_filename'] . "</b><br /><br />\n"; }
		}		

// ------------------------
// Close the connection
// ------------------------
		ftp_closeconnection($conn_id);

// ------------------------
// Email
// ------------------------
		if ($zipactions['email'] == "yes") {

			$FromName = "net2ftp";
			$From = $email_feedback;

			$ToName = "";
			$To = $zipactions['email_to'];

			$Subject = "Requested files";

			$Text =  "Dear, \n\n";
			$Text .= "Someone has requested the files in attachment to be sent to this email account ($To).\n";
			$Text .= "If you know nothing about this or if you don't trust that person, please delete this email without opening the Zip file in attachment.\n";
			$Text .= "Note that if you don't open the Zip file, the files inside cannot harm your computer.\n";
			$Text .= "\n\n---------------------------------------\n";
			$Text .= "Information about the sender:\n";
			$Text .= "IP address: $REMOTE_ADDR\n";
			$Text .= "Time of sending: " . mytime() . "\n";
			$Text .= "Sent via the net2ftp application installed on this website: $HTTP_REFERER \n";
			$Text .= "Webmaster's email: $From\n";
			$Text .= "\n\n---------------------------------------\n";
			$Text .= "Message of the sender:\n";
			$Text .= $message . "\n";
			$Text .= "\n\n---------------------------------------\n";
			$Text .= "net2ftp is free software, released under the GNU/GPL license. For more information, go to http://www.net2ftp.com\n\n\n";

			$AttmFiles = array($tempfilename);

			$resultArray = SendMail($From, $FromName, $To, $ToName, $Subject, $Text, $Html, $AttmFiles);
			$success = getResult($resultArray);
			if ($success == false) { @unlink($tempfilename); printErrorMessage($resultArray, "exit", ""); }
			if ($success == true) { echo "The zip file has been sent to <b>$To</b>.<br /><br />"; }
		}

// ------------------------
// Delete the temporary zipfile
// ------------------------
		if ($zipactions['save'] == "yes" || $zipactions['email'] == "yes") {
			$success4 = @unlink($tempfilename);
			if ($success4 == false) { 
				$resultArray = putResult(false, "", "unlink", "ftp_zip > unlink: tempfilename=$tempfilename.", "Unable to delete the temporary zipfile $tempfilename.<br />");
				printErrorMessage($resultArray, "", "");
			}
			registerTempfile("unregister", $tempfilename);
		}

	}

} // End function ftp_zip

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function acceptFiles($uploadedFilesArray, $application_tempdir) {

// --------------
// This PHP function takes files that were just uploaded with HTTP POST, 
// verifies if the size is smaller than a certain value, and moves them 
// using move_uploaded_file() from the server's temporary directory to 
// net2ftp's temporary directory
//
// $uploadedFilesArray[number]["name"] and $acceptedFilesArray[number]["name"] contain the real name of the file
// $uploadedFilesArray[number]["tmp_name"] contains the temporary name of the file in the *webserver's* temporary directory (eg C:\temp)
// $acceptedFilesArray[number]["tmp_name"] contains the temporary name of the file in *net2ftp's* temporary directory (eg C:\web\net2ftp\temp)
//
// Note 1 - $acceptedFilesArray[number]["tmp_name"] may not be the same as $uploadedFilesArray[number]["tmp_name"] because 
//          $acceptedFilesArray[number]["tmp_name"] should be unique at the moment the file is transferred to the new directory.
// Note 2 - $acceptedFilesArray[number]["tmp_name"] 
//            - starts with upload (or upl on Windows, because on that platform only the first 3 letters are kept)
//            - has the same filename extension as the real filename 
//            - ends with .txt
//     The filename extension is needed by the PCL TAR library, which needs to determine if the archive is tar, tgz or gz.
//     The additional .txt is to ensure that no temporary file would be executed on the web server, which could compromise it.
//
// For example: script.php is uploaded to the web server's temporary directory C:\temp\f9skpqri
//              Then it is moved to net2ftp's temporary directory C:\web\net2ftp\temp\upload9oeic.php.txt
//              And finally it is transferred to the FTP server as script.php in functions ftp_transferfiles() and ftp_unziptransferfiles() -- see below
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$max_upload_size = getSetting("max_upload_size");
	global $state2, $application_tempdir; 

	printFunctionTags("acceptFiles", "begin");

	$too_big = 0;     // Index of the files which are too big
	$moved_ok = 0;    // Index of the files that have been treated successfully
	$moved_notok = 0; // Index of the files that have been treated unsuccessfully

	for ($i=1; $i<=sizeof($uploadedFilesArray); $i++) {

// Flush the buffer to the browser, so that intermediate results would be immediately shown on screen
		flush(); 

// -------------------------------------------------------------------------
// 1 -- Get the data from the filesArray (for each file, its location, name, size, ftpmode
// -------------------------------------------------------------------------
		$file_name     = $uploadedFilesArray["$i"]["name"];
		$file_tmp_name = $uploadedFilesArray["$i"]["tmp_name"];
		$file_size     = $uploadedFilesArray["$i"]["size"];

		if (($file_name != "" && $file_tmp_name == "") || $file_size > $max_upload_size) {
// The case ($file_name != "" && $file_tmp_name == "") occurs when the file is bigger than the directives set in php.ini
// In that case, only $uploadedFilesArray["$i"]["name"] is filled in.
			echo "<li> File <b>$file_name</b> is too big. This file will not be uploaded.</li>"; 
			$too_big = $too_big + 1;
			@unlink($file_tmp_name); 
			@unlink("$application_tempdir/$file_name.txt");
			continue;
		}

// -------------------------------------------------------------------------
// 3 -- upload and copy the file; if a file with the same name already exists, it is overwritten with the new file
// -------------------------------------------------------------------------
		$extension = get_filename_extension($file_name);
		if (substr($file_name, -6) == "tar.gz") { $extension = "tar.gz"; }

		$tempfilename = mytempnam($application_tempdir, "upload__", "." . $extension . ".txt");
		if ($tempfilename == false) { @unlink($tempfilename); return putResult(false, "", "mytempnam", "acceptFiles > mytempnam", "Could not generate a temporary file."); }

		$success2 = move_uploaded_file($file_tmp_name, $tempfilename);
		if ($success2 == false) { 
			echo "<li> File <b>$file_name</b> could not be moved </li>\n"; 
			@unlink($file_tmp_name); 
			@unlink($tempfilename);
			$moved_notok = $moved_notok + 1;
		}

// -------------------------------------------------------------------------
// 4 -- if everything went fine, put file in acceptedFilesArray
// -------------------------------------------------------------------------
		else {
// When uploading files, print some output
// When updating files, do not print anything
			registerTempfile("register", $tempfilename);
			if ($state2 == "uploadfile") { echo "<li> File <b>$file_name</b> is OK </li>\n"; }
			$moved_ok = $moved_ok + 1;
			$acceptedFilesArray[$moved_ok]["name"] = $file_name;
			$acceptedFilesArray[$moved_ok]["tmp_name"] = $tempfilename;
		}

	} // End for

	printFunctionTags("acceptFiles", "end");

	if     ($moved_notok > 0)                { return putResult(false, "", "acceptFiles", "acceptFiles > move_uploaded_file.", "Unable to move the uploaded file to the temp directory.<br /><br />The administrator of this website has to <b>chmod 777</b> the /temp directory of net2ftp."); }
	elseif ($moved_ok == 0 && $too_big == 0) { return putResult(false, "", "acceptFiles", "acceptFiles", "You did not provide any file to upload."); }
	elseif ($moved_ok == 0 && $too_big > 0)  { return putResult(true, "all_uploaded_files_are_too_big", "", "", ""); }
	else                                     { return putResult(true, $acceptedFilesArray, "", "", ""); }

} // End function acceptFiles

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_transferfiles($filesArray, $application_tempdir, $targetDir) {

// --------------
// This PHP function takes a file that was uploaded from a client computer via a browser to the web server, 
// and puts it on another FTP server
// --------------

	printFunctionTags("ftp_transferfiles", "begin");

// ------------------------------
// Open connection
// ------------------------------
	$resultArray = ftp_openconnection();
	$conn_id = getResult($resultArray);
	if ($conn_id == false) { 
		for ($i=1; $i<=sizeof($filesArray); $i++) { @unlink($filesArray[$i]["tmp_name"]); }
		return putResult(false, "", "ftp_openconnection", "ftp_uploadfiles > " . $resultArray['drilldown'], $resultArray['message']); 
	}

// ------------------------------
// For loop
// ------------------------------
	for ($i=1; $i<=sizeof($filesArray); $i++) {

// Determine which FTP mode should be used
		$ftpmode = ftpAsciiBinary($filesArray[$i]["name"]);

// Flush the buffer to the browser, so that intermediate results would be immediately shown on screen
		flush(); 

		if ($ftpmode == FTP_ASCII) { $printftpmode = "FTP_ASCII"; }
		elseif ($ftpmode == FTP_BINARY) { $printftpmode = "FTP_BINARY"; }

// ------------------------------
// Put files
// ------------------------------
		$resultArray = ftp_putfile($conn_id, "", $filesArray[$i]["tmp_name"], $targetDir, $filesArray[$i]["name"], $ftpmode, "move");
		$success2 = getResult($resultArray);
		if ($success2 == false) { @unlink($filesArray[$i]["tmp_name"]); echo "<li> File <b>" . $filesArray[$i]["name"] . "</b> could not be transferred to the FTP server\n";}
		if ($success2 == true)  { echo "<li> File <b>" . $filesArray[$i]["name"] . "</b> has been transferred to the FTP server using FTP mode <b>$printftpmode</b>\n"; }

	} // End for

// ------------------------------
// Close connection
// ------------------------------
	$resultArray = ftp_closeconnection($conn_id);
	$success2 = getResult($resultArray);

	printFunctionTags("ftp_transferfiles", "end");

	return putResult(true, true, "", "", "");

} // End function ftp_transferfiles

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_unziptransferfiles($archivesArray, $use_folder_names, $application_tempdir, $directory) {

// --------------
// Decompress the archives and transfer the files to the FTP server
// If $use_folder_names == "yes" then create subdirectories
// If it is set to no, then transfer everything in the archive to the directory
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;
	global $zip_entry_tmp_name; // To export this variable to the pclzip and pcltar libraries

	printFunctionTags("ftp_unziptransferfiles", "begin");

// -------------------------------------------------------------------------
// Open connection
// -------------------------------------------------------------------------
	$resultArray = ftp_openconnection();
	$conn_id = getResult($resultArray);
	if ($conn_id == false) { 
		for ($archive_nr=1; $archive_nr<=sizeof($archivesArray); $archive_nr++) { @unlink($archivesArray[$archive_nr]["tmp_name"]); }
		return putResult(false, "", "ftp_openconnection", "ftp_uploadfiles > " . $resultArray['drilldown'], $resultArray['message']); 
	}


	for ($archive_nr=1; $archive_nr<=sizeof($archivesArray); $archive_nr++) {

// -------------------------------------------------------------------------
// Determine the type of archive depending on the filename extension
// -------------------------------------------------------------------------
		$archive_name = $archivesArray[$archive_nr]["name"];
		$archive_file = $archivesArray[$archive_nr]["tmp_name"];
		$archivename_without_dottext = substr($archivesArray[$archive_nr]["tmp_name"], 0, strlen($archive)-4);
		$archive_type = get_filename_extension($archivename_without_dottext);

// -------------------------------------------------------------------------
// Print message
// -------------------------------------------------------------------------
		echo "<li>Processing archive nr $archive_nr: <b>$archive_name</b></li>\n";
		echo "<ul>\n";
		flush();

// -------------------------------------------------------------------------
// Zip archive unzipped with the PHP Zip module
// -------------------------------------------------------------------------
		if ($archive_type == "zip" && function_exists("zip_open") == true) {

// ------------------------------
// Open the archive
// ------------------------------
			$zip = zip_open($archive_file);
			if ($zip == false) { return putResult(false, "", "zip_open", "ftp_unziptransferfiles > zip_open: filename=$archive_file.", "Unable to open the archive <b>$archive_name</b> (file $archive_file)"); }

			while ($zip_entry = zip_read($zip)) { 

				$zip_entry_name = zip_entry_name($zip_entry); 
				$zip_entry_filesize = zip_entry_filesize($zip_entry); 
				$zip_entry_compressedsize = zip_entry_compressedsize($zip_entry); 
				$zip_entry_compressionmethod = zip_entry_compressionmethod($zip_entry); 

// ------------------------------
// Go to the next entry if the filesize is zero
// ------------------------------
				if ($zip_entry_filesize == 0) { continue; }

// ------------------------------
// From the zip_entry_name, determine the path and the real filename
// For example:
// 	zip_entry_name = subdir1/subdir2/file.txt
//	==> 	directory where the file has to be put = directory/subdir1/subdir2
//		filename = file.txt
// ------------------------------
// Remove leading and trailing "/"
				$zip_entry_name = stripDirectory($zip_entry_name);

// Split down into parts
// parts[0] contains the first part, parts[1] the second,...
				$zip_entry_name_subdirectories = explode("/", $zip_entry_name);
				$zip_entry_name_filename = array_pop($zip_entry_name_subdirectories);

// ------------------------------
// Create the subdirectory if needed
// ------------------------------
				if ($use_folder_names == "yes") {

					$targetdirectory = $directory;

					for ($j=0; $j<sizeof($zip_entry_name_subdirectories); $j=$j+1) {

// Create the targetdirectory string
						$targetdirectory = glueDirectories($targetdirectory, $zip_entry_name_subdirectories[$j]);

// Check if the subdirectories exist
						$result = @ftp_chdir($conn_id, $targetdirectory);
						if ($result == false) {
							$resultArray = ftp_newdirectory($conn_id, $targetdirectory);
							$success = getResult($resultArray);
							if ($success == false)  { echo "<li> Could not create directory <b>$targetdirectory</b></li>\n"; }
							else { echo "<li> Created directory <b>$targetdirectory</b></li>\n"; }
						} // end if

					} // end for

				} // end if 

// ------------------------------
// Read the zip file entry content
// ------------------------------
				if (zip_entry_open($zip, $zip_entry, "r")) { 
//					echo "File Contents:<br /><br />\n"; 
					$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)); 
//					echo $buf;

// ------------------------------
// Write content to a file
// ------------------------------
					if ($use_folder_names == "yes") {
						$resultArray = ftp_writefile($conn_id, $targetdirectory, $zip_entry_name_filename, $buf); 
						$result = getResult($resultArray); 
						if ($result == false)  { echo "<li> Could not put the file <b>$zip_entry_name_filename</b> to the directory <b>$targetdirectory</b></li>"; }
						else { echo "<li> Transferred file <b>$zip_entry_name_filename</b> to directory <b>$targetdirectory</b></li>\n"; }
					}
					else {
						$resultArray = ftp_writefile($conn_id, $directory, $zip_entry_name_filename, $buf); 
						$result = getResult($resultArray); 
						if ($result == false)  { echo "<li> Could not put the file <b>$zip_entry_name_filename</b> to the directory <b>$directory</b></li>\n"; }
						else { echo "<li> Transferred file <b>$zip_entry_name_filename</b> to directory <b>$directory</b></li>\n"; }
					}

// ------------------------------
// Close zip file entry
// ------------------------------
					zip_entry_close($zip_entry); 
					echo "\n"; 

				}  // end if

			} // end while

// ------------------------------
// Close the archive
// ------------------------------
			zip_close($zip);

// ------------------------------
// Delete the uploaded archive
// ------------------------------
			$success2 = @unlink($archive_file);
			if ($success2 == false) { return putResult(false, "", "unlink", "ftp_unziptransferfiles > unlink: archive=$archive_file.", "Unable to delete the archive <b>$archive_name</b> (file $archive_file)"); }
			else { registerTempfile("unregister", "$archive_file"); }

		} // end if


// -------------------------------------------------------------------------
// Archives decompressed the PCL libraries (see the files /includes/pclzip.lib.php and /includes/pcltar.lib.php)
// -------------------------------------------------------------------------
		elseif (($archive_type == "zip" && function_exists("zip_open") == false) || $archive_type == "tar" || $archive_type == "tgz" || $archive_type == "gz") {

// ------------------------------
// Open the archive
// ------------------------------
			if ($archive_type == "zip") {
				$zip = new PclZip($archive_file);
				$list = $zip->listContent();
				if ($list == 0) { return putResult(false, "", "zip->listContent()", "ftp_unziptransferfiles > zip->listContent(): archive=$archive_file.", "Unable to get the list of the contents of the archive. Error code: " . $zip->errorInfo(true) . "<br />"); }
			}
			elseif ($archive_type == "tar" || $archive_type == "tgz" || $archive_type == "gz") { 
				$list = PclTarList($archive_file);
				if ($list == 0) { return putResult(false, "", "PclTarList()", "ftp_unziptransferfiles > PclTarList(): archive=$archive_file.", "Unable to get the list of the contents of the archive."); }

					// ---------------------------------------------
					// Link between net2ftp and the PCL Tar library:
					// ---------------------------------------------
					// PclTarList calls 
					// PclTarHandleExtension to get the extension and PclTarHandleExtract to get the list
			}

// ------------------------------
// For each entry...
// ------------------------------
			for ($i=0; $i<sizeof($list); $i++) {

				if ($archive_type == "zip") {
					$zip_entry_name = $list[$i]['stored_filename']; 
					$zip_entry_filesize = $list[$i]['size'];
					$zip_entry_compressedsize = $list[$i]['compressed_size'];
					// $zip_entry_compressionmethod = "";
				}
				elseif ($archive_type == "tar" || $archive_type == "tgz" || $archive_type == "gz") { 
					$zip_entry_name = $list[$i]['filename']; 
					$zip_entry_filesize = $list[$i]['size'];
				}

// ------------------------------
// Go to the next entry if the filesize is zero
// ------------------------------
				if ($zip_entry_filesize == 0) { continue; }

// ------------------------------
// From the zip_entry_name, determine the path and the real filename
// For example:
// 	zip_entry_name = subdir1/subdir2/file.txt
//	==> 	directory where the file has to be put = directory/subdir1/subdir2
//		filename = file.txt
// ------------------------------
// Remove leading and trailing "/"
				$zip_entry_name = stripDirectory($zip_entry_name);

// Split down into parts
// parts[0] contains the first part, parts[1] the second,...
				$zip_entry_name_subdirectories = explode("/", $zip_entry_name);
				$zip_entry_name_filename = array_pop($zip_entry_name_subdirectories);

// ------------------------------
// Create the subdirectory if needed
// ------------------------------
				if ($use_folder_names == "yes") {

					$targetdirectory = $directory;

					for ($j=0; $j<sizeof($zip_entry_name_subdirectories); $j=$j+1) {

// Create the targetdirectory string
						$targetdirectory = glueDirectories($targetdirectory, $zip_entry_name_subdirectories[$j]);

// Check if the subdirectories exist
						$result = @ftp_chdir($conn_id, $targetdirectory);
						if ($result == false) {
							$resultArray = ftp_newdirectory($conn_id, $targetdirectory);
							$success = getResult($resultArray);
							if ($success == false)  { echo "<li> Could not create directory <b>$targetdirectory</b></li>\n"; }
							else { echo "<li> Created directory <b>$targetdirectory</b></li>\n"; }
						} // end if

					} // end for

				} // end if 

// ------------------------------
// Read the zip file entry content and write content to a file
// ------------------------------
				if ($archive_type == "zip") { 
					$zip_entry_tmp_name = tempnam($application_tempdir, "unzip__");
					if ($zip_entry_tmp_name == false)  { @unlink($zip_entry_tmp_name); return putResult(false, "", "tempnam", "ftp_unziptransferfiles > tempnam: application_tempdir=$application_tempdir.", "Unable to create the temporary file"); }
					registerTempfile("register", $zip_entry_tmp_name);

					$zip->extractByIndex($i, "temp");

					// ---------------------------------------------
					// Link between net2ftp and the PCL Zip library:
					// ---------------------------------------------
					// extractByIndex calls
					// privExtractByRule calls
					// privExtractFile extracts using the filename $zip_entry_tmp_name

				}
				elseif ($archive_type == "tar" || $archive_type == "tgz" || $archive_type == "gz") { 
					$zip_entry_tmp_name = tempnam($application_tempdir, "untar__");
					if ($zip_entry_tmp_name == false)  { @unlink($zip_entry_tmp_name); return putResult(false, "", "tempnam", "ftp_unziptransferfiles > tempnam: application_tempdir=$application_tempdir.", "Unable to create the temporary file"); }
					registerTempfile("register", $zip_entry_tmp_name);

					$result = PclTarExtractIndex($archive_file, $i, "temp");
//					if ($result == 0) { return putResult(false, "", "PclTarExtractIndex()", "ftp_unziptransferfiles > PclTarExtractIndex(): archive=$archive_file; i=$i.", "Unable to extract file nr $i from the archive."); }

					// ---------------------------------------------
					// Link between net2ftp and the PCL Tar library:
					// ---------------------------------------------
					// PclTarExtractIndex calls 
					// PclTarHandleExtractByIndexList calls
					// PclTarHandleExtractByIndex calls
					// PclTarHandleExtractFile extracts using the filename $zip_entry_tmp_name

				}

				$ftpmode = ftpAsciiBinary($zip_entry_name_filename);

				if ($use_folder_names == "yes") { $remotetargetdirectory = $targetdirectory; }
				else { $remotetargetdirectory = $directory; }

				$resultArray = ftp_putfile($conn_id, "", $zip_entry_tmp_name, $remotetargetdirectory, $zip_entry_name_filename, $ftpmode, "move");
				$result = getResult($resultArray);
				if ($result == false)  { echo "<li> Could not put file <b>$zip_entry_name_filename</b> to directory <b>$remotetargetdirectory</b></li>"; }
				else { echo "<li> Transferred file <b>$zip_entry_name_filename</b> to directory <b>$remotetargetdirectory</b></li>\n"; }

			} // end for

// ------------------------------
// Delete the uploaded archive
// ------------------------------
			$success2 = @unlink($archive_file);
			if ($success2 == false) { 
				$message = "Unable to delete the temporary file <b>$archive_file</b>.<br />";
				printWarningMessage($message);
			}
			else {
				registerTempfile("unregister", "$archive_file");
			}

		} // end elseif tar tgz gz

// -------------------------------------------------------------------------
// Other filename extensions
// -------------------------------------------------------------------------
		else {
			echo "<li> Archive <b>$archive_name</b> was not processed because its filename extension was not recognized. Only zip, tar, tgz and gz archives are supported at the moment.\n";
		} // end else

		echo "</ul>\n";

	} // End for

// -------------------------------------------------------------------------
// Close connection
// -------------------------------------------------------------------------
	$resultArray = ftp_closeconnection($conn_id);
	$success3 = getResult($resultArray);

	printFunctionTags("ftp_unziptransferfiles", "end");

	return putResult(true, true, "", "", "");

} // End function ftp_unziptransferfiles

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_mysite($conn_id, $command) {

// --------------
// This function sends a site command to the FTP server
// Note:
//    - These commands vary a lot depending on the FTP server type
//    - PHP does not return any result other than TRUE or FALSE
// --------------

	$success1 = ftp_site($conn_id, $command);
	if ($success1 == false) { return putResult(false, "", "ftp_site", "ftp_mysite > ftp_site: conn_id=$conn_id; command=$command.", "Unable to execute site command <b>$command</b>.<br />"); }

	return putResult(true, true, "", "", "");

} // End function ftp_mysite

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function upDir($directory) {

// --------------
// This function takes a directory string and returns the parent directory string
// --------------
// directory = /david/cv
// parts = Array ( [0] => [1] => david [2] => cv ) 
// count($parts) = 3

	$parts = explode("/", $directory);

	$parentdirectory = "";
	for ($i=1; $i<count($parts)-1; $i++) {
		$parentdirectory = $parentdirectory . "/" . $parts[$i];
	}

	if ($parentdirectory == "") { $parentdirectory = "/"; }

	return $parentdirectory;

} // End function upDir

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function stripDirectory($directory) {

// --------------
// Removes a leading and trailing / or \ if there is one
// --------------

	$directory = trim($directory);

	$firstchar = substr($directory, 0, 1);
	$lastchar  = substr($directory, strlen($directory)-1, 1);

// Remove a / in front if needed
	if ($firstchar == "/" || $firstchar == "\\") { $directory = substr($directory, 1, strlen($directory)-1); }
// Remove a / at the end if needed
	if ($lastchar  == "/" || $lastchar == "\\")  { $directory = substr($directory, 0, strlen($directory)-1); }

	return $directory;

} // end stripDirectory

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function glueDirectories($part1, $part2) {

// --------------
// Returns the 2 dirs glued together in the format /home/dh1234/test (leading /, NO trailing /)
// --------------

// Strip leading and trailing / and \
	$part1 = stripDirectory($part1);
	$part2 = stripDirectory($part2);

// Check if Unix or Windows style directories are used
	if     ((strlen($part1) > 1) && (ereg("[a-zA-Z]{1}[:]{1}(.*)", $part1, $regs) == true)) { $system = "windows"; }
	elseif ((strlen($part2) > 1) && (ereg("[a-zA-Z]{1}[:]{1}(.*)", $part2, $regs) == true)) { $system = "windows"; }
	else 														    { $system = "unix"; }

// Glue the 2 parts together
	if (strlen($part1)>0 && strlen($part2)>0) {
		if ($system == "windows") { return $part1 . "\\" . $part2; }
		else                      { return "/" . $part1 . "/" . $part2; }
	}

	elseif ((strlen($part1)<1 || $part1 == "/" || $part1 == "\\") && (strlen($part2)>0)) {
		if ($system == "windows") { return $part2; }
		else                      { return "/" . $part2; }
	}
	elseif ((strlen($part2)<1 || $part2 == "/" || $part2 == "\\") && (strlen($part1)>0)) {
		if ($system == "windows") { return $part1; }
		else                      { return "/" . $part1; }
	}
	else {
		return "";
	}

} // end glueDirectories

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function get_filename_extension($filename) {

// --------------
// This function returns the extension of a filename:
// 	name.ext1.ext2.ext3 --> ext3
// 	name --> name
// 	.name --> name
//	.name.ext --> ext
// It also converts the result to lower case:
// 	name.ext1.EXT2 --> ext2
// --------------

	$lastdotposition = strrpos($filename,".");

	if ($lastdotposition === 0)      { $extension = substr($filename, 1); }
	elseif ($lastdotposition == "")  { $extension = $filename; }
	else                             { $extension = substr($filename, $lastdotposition + 1); }

	return strtolower($extension);

} // End get_filename_extension

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function get_filename_name($filename) {

// --------------
// This function returns the name part of a filename:
// 	name.ext1.ext2.ext3 --> name
// 	name --> name
// 	.name --> name
//	.name.ext --> name.ext
// It also converts the result to lower case:
// 	NAME.ext --> name
// --------------

	$firstdotposition = strpos($filename,".");

	if ($firstdotposition === 0)      { $name = substr($filename, 1); }
	elseif ($firstdotposition == "")  { $name = $filename; }
	else                              { $name = substr($filename, 0, $firstdotposition); }

	return strtolower($name);

} // End get_filename_name

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftpAsciiBinary($filename) {

// --------------
// Checks the first character of a file and its extension to see if it should be 
// transferred in ASCII or Binary mode
//
//	Default: FTP_BINARY
//	Exceptions: FTP_ASCII (files which start with a dot, and a list of exceptions)
//	A file with more than 1 dot: the last extension is taken into account
//
// --------------

// -------------------------------------------------------------------------
// If the first character is a dot, return FTP_ASCII
// -------------------------------------------------------------------------
	$firstcharacter = substr($filename, 0, 1);

	if ($firstcharacter == ".") { 
		$ftpmode = FTP_ASCII; 
		return $ftpmode;
	}

// -------------------------------------------------------------------------
// If the first character is not a dot, check the extension
// -------------------------------------------------------------------------
	$last = get_filename_extension($filename);

	if (
		$last == "asp"  		||
		$last == "bas"  		||
		$last == "c"  		||
		$last == "cfg"  		||
		$last == "cfm"  		||
		$last == "cgi"  		||
		$last == "cpp"  		||
		$last == "css"  		||
		$last == "file"  		||
		$last == "h"  		||
		$last == "ini"  		||
		$last == "js"  		||
		$last == "jsp"  		||
		$last == "msg" 		||
		$last == "old" 		||
		$last == "pas" 		||
		$last == "perl" 		||
		$last == "php" 		||
		$last == "pl" 		||
		$last == "pm" 		||
		$last == "readme"		||
		$last == "setup" 		||
		$last == "sh" 		|| 
		$last == "style" 		|| 
		$last == "tex"		|| 
		$last == "threads"	|| 
		$last == "tmpl"  		||
		$last == "txt"  		|| 
		$last == "ubb"  		||
		$last == "xml"  		||
		$last == "conf"		||
		strstr($last, "htm")
							)	{ $ftpmode = FTP_ASCII; }
	else 							{ $ftpmode = FTP_BINARY; }

	return $ftpmode;

} // end ftpAsciiBinary

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getFileType($filename) {

// --------------
// Checks the extension of a file to determine what should be done with it in the View and Edit functions
// Default: TEXT
// Exceptions (see list below): IMAGE, EXECUTABLE, OFFICE, ARCHIVE
// --------------

	$last = get_filename_extension($filename);

	if (	$last == "png"  || 
		$last == "jpg"  || 
		$last == "jpeg" || 
		$last == "gif"  ||
		$last == "bmp"  ||
		$last == "tif"  ||
		$last == "tiff"     ) { return "IMAGE"; }

	elseif ($last == "exe"  || 
		$last == "com"      ) { return "EXECUTABLE"; }

	elseif ($last == "doc"  || 
		$last == "xls"  || 
		$last == "ppt"  || 
		$last == "mdb"  || 
		$last == "vsd"  || 
		$last == "mpp"      ) { return "OFFICE"; }

	elseif ($last == "zip"  || 
		$last == "tar"  || 
		$last == "gz"   || 
		$last == "arj"  || 
		$last == "arc"      ) { return "ARCHIVE"; }

	elseif ($last == "bin"  || 
		$last == "jar"  || 

		$last == "mov"  || 
		$last == "mpg"  || 
		$last == "mpg"  ||
		$last == "ram"  ||
		$last == "rm"   ||
		$last == "qt"   ||

		$last == "swf"  ||
		$last == "fla"  ||

		$last == "pdf"  ||
		$last == "ps"   ||

		$last == "wav"       ){ return "OTHER"; }

	else 			     	    { return "TEXT"; }


} // end getFileType

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function cleanFtpserver($ftpserver) {

// --------------
// Input: " ftp://something.domainname.com:123/directory/file "
// Output: "something.domainname.com"
// --------------

// Remove invisible characters in the beginning and at the end
	$cleaned = trim($ftpserver);

// Remove possible "ftp://"
	if (ereg("[ftpFTP]{2,4}[:]{1}[/\\]{1,2}(.*)", $cleaned, $regs) == true) {
		$cleaned = "$regs[1]";
	}

// Remove a possible port nr ":123"
	if (ereg("(.*)[:]{1}[0-9]+", $cleaned, $regs) == true) {
		$cleaned = "$regs[1]";
	}

// Remove a possible trailing / or \ 
// Remove a possible directory and file "/directory/file"
	if (ereg("([^/^\\]*)[/\\]{1,}.*", $cleaned, $regs) == true) {
		// Any characters except / and except \
		// Followed by at least one / or \
		// Followed by any characters
		$cleaned = "$regs[1]";
	}

	return $cleaned;

} // end cleanFTPserver

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function cleanDirectory($directory) {

// --------------
// Input: "/dir1/dir2/dir3/../../dir4/dir5"
// Output: "/dir1/dir4/dir5"
// --------------

// Nothing to do if the directory is the root directory
	if (strlen($directory) < 1) { return ""; }

// Remove leading and trailing "/"
	$directory = stripDirectory($directory);

// Split down into parts
// directoryparts[0] contains the first part, directoryparts[1] the second,...
	$directoryparts = explode("/", $directory);

// Start from the end
// If you encounter N times a "..", do not take into account the next N parts which are not ".."
// Example: "/dir1/dir2/dir3/../../dir4/dir5"  ---->  "/dir1/dir4/dir5"
	$dubbledotcounter = 0;
	$newdirectory = "";
	for ($i=sizeof($directoryparts)-1; $i>=0; $i = $i - 1) {
		if ($directoryparts[$i] == "..") { $doubledotcounter = $doubledotcounter + 1; }
		else {  
			if ($doubledotcounter == 0) { $newdirectory = $directoryparts[$i] . "/" . $newdirectory; }    // Add the new part in front
			elseif ($doubledotcounter > 0) { $doubledotcounter = $doubledotcounter - 1; }                 // Don't add the part, and reduce the counter by 1
		}
	}

	$newdirectory = "/" . stripDirectory($newdirectory);
	return $newdirectory;

} // end cleanDirectory

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function checkEmailAddress($email) {

// --------------
// Returns true for valid email addresses, false for non-valid email addresses
// --------------

	if (eregi( "^" .
	           "[a-z0-9]+([_\.-][a-z0-9]+)*" .    //user
	           "@" .
	           "([a-z0-9]+([\.-][a-z0-9]+)*)+" .   //domain
	           "\\.[a-z]{2,}" .                    //sld, tld 
	           "$", $email, $regs)) { return true;	}
	else { return false; }

} // end checkEmailAddress

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function checkFilename($filename) {

// --------------
// Returns true for valid filename
// --------------

	if (preg_match("/^[a-zA-Z0-9_ \.-]*$/", $filename) == 0) { return false; }
	else { return true; }

} // end checkFilename

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function javascriptEncode($string) {

// --------------
// Encode string characters which cause problems in Javascript
// Replace \' by \\'
//         '  by '
// --------------

	$newstring = $string;
	$newstring = str_replace("\'", "\\\'", $newstring);
	$newstring = str_replace("'", "\'", $newstring);

	return $newstring;

} // end javascriptEncode

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function registerTempfile($dowhat, $filename) {

// --------------
// This function registers and unregisters temporary files which are created and deleted
// If the script is halted, all the registered temporary files are deleted by the shutdown() function
//
// $dowhat can be either "register" or "unregister"
// $filename is the absolute filename (/web/net2ftp/temp/file.txt)
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftp_tempfiles;

// -------------------------------------------------------------------------
// Initialize $net2ftp_tempfiles if needed
// -------------------------------------------------------------------------
	if (isset($net2ftp_tempfiles) == false) { $net2ftp_tempfiles = array(); }

// -------------------------------------------------------------------------
// Add or remove the current file to/from the $net2ftp_tempfiles array
// -------------------------------------------------------------------------

// REGISTER
	if ($dowhat == "register") { 
		@array_push($net2ftp_tempfiles, $filename); 
	} // end if register

// UNREGISTER
	elseif ($dowhat == "unregister") {
		$newindex = 0;
		for ($i=0; $i<=count($net2ftp_tempfiles); $i++) {
			if ($net2ftp_tempfiles[$i] != $filename) { 
				$net2ftp_tempfiles_new[$newindex] = $net2ftp_tempfiles[$i]; 
				$newindex = $newindex + 1;
			}
		} // end for
		unset($net2ftp_tempfiles);
		$net2ftp_tempfiles = $net2ftp_tempfiles_new;
	} // end if unregister

	return true;

} // end registerTempfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function shutdown() {

// --------------
// This function is registered through register_shutdown_function, so that it would be
// executed when the script reaches the maximum execution time.
//
// The function displays a warning message, and deletes temporary files.
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $state, $net2ftp_tempfiles;

	printFunctionTags("shutdown", "begin");

// -------------------------------------------------------------------------
// Delete the temporary files which were not deleted automatically
// -------------------------------------------------------------------------
	for ($i=0; $i<sizeof($net2ftp_tempfiles); $i++) { @unlink($net2ftp_tempfiles[$i]); }

// -------------------------------------------------------------------------
// Print a message to tell the user that the script was halted
// -------------------------------------------------------------------------
	$time_taken = timer();
	$max_execution_time = ini_get("max_execution_time");

// Check the time taken versus the maximum execution time, because on Windows + Apache
// servers, the shutdown function is always called, even if the maximum execution time
// was not reached.
	if ($time_taken > $max_execution_time - 1) {
		if ($state == "browse" || $state == "manage" || $state == "bookmark" || $state == "advanced") {
			setStatus_php("Script halted"); 
		}
		$text =  "<b>Your task was stopped</b><br /><br />";
		$text .= "The task you wanted to perform with net2ftp took more time than the allowed $max_execution_time seconds, and therefor that task was stopped.<br />";
		$text .= "This time limit guarantees the fair use of the web server for everyone.<br /><br />";
		$text .= "Try to split your task in smaller tasks: restrict your selection of files, and omit the biggest files.<br /><br />";
		$text .= "If you really need net2ftp to be able to handle big tasks which take a long time, consider installing net2ftp on your own server.";
		echo "<div class=\"warning-box\"><div class=\"warning-text\">$text</div></div>\n\n";
	}

	printFunctionTags("shutdown", "end");

} // end shutdown

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function SendMail($From, $FromName, $To, $ToName, $Subject, $Text, $Html, $AttmFiles) {

// --------------
// This function taken from www.PHP.net.
// It was written by alex@bartl.net (29-Nov-2002 06:25)
// Alex was inspired by the function of kieran.huggins@rogers.com (06-Nov-2002 04:52)

// Note: it has been changed slightly to fit into the net2ftp application.
// (Mainly the way error handling is done.)
// --------------

/* Alex's comments:
This might be some useful stuff to send out emails in either text
or html or multipart version, and attach one or more files or even
none to it. Inspired by Kieran's msg above, I thought it might be 
useful to have a complete function for doing this, so it can be used 
wherever it's needed. Anyway I am not too sure how this script will
behave under Windows.
{br} represent the HTML-tag for line break and should be replaced,
but I did not know how to not get the original tag  parsed here.
function SendMail($From, $FromName, $To, $ToName, $Subject, $Text, $Html, $AttmFiles)
$From      ... sender mail address like "my@address.com"
$FromName  ... sender name like "My Name"
$To        ... recipient mail address like "your@address.com"
$ToName    ... recipients name like "Your Name"
$Subject   ... subject of the mail like "This is my first testmail"
$Text      ... text version of the mail
$Html      ... html version of the mail
$AttmFiles ... array containing the filenames to attach like array("file1","file2")
*/



// Initial tests
//	$Html = $Html?$Html:preg_replace("/\n/","{br}",$Text) or die("neither text nor html part present.");
//	$Text = $Text?$Text:"Sorry, but you need an html mailer to read this mail.";
//	$From or die("sender address missing");
//	$To or die("recipient address missing");

	if ((strlen($Html) < 1) && (strlen($Text) < 1)) { return putResult(false, "", "SendMail", "SendMail > variables: Text=$Text; Html=$Html.", "You did not provide any text to send by email!<br />"); }
	if (strlen($From) < 1)                          { return putResult(false, "", "SendMail", "SendMail > variables: From=$From.", "You did not supply a From address.<br />"); }
	if (strlen($To) < 1)                            { return putResult(false, "", "SendMail", "SendMail > variables: To=$To.", "You did not supply a To address.<br />"); }
	if (strlen($Html) < 1)                          { $Html = preg_replace("/\n/","<br>",$Text); }

// Check if the To email address is valid
	if (!eregi( "^" .
	           "[a-z0-9]+([_\\.-][a-z0-9]+)*" .    //user
	           "@" .
	           "([a-z0-9]+([\.-][a-z0-9]+)*)+" .   //domain
	           "\\.[a-z]{2,}" .                    //sld, tld 
	           "$", $To, $regs))                    { return putResult(false, "", "SendMail", "SendMail > variables: To=$To.", "The email address you have entered <b>$To</b> does not seem to be valid.<br />Please enter an address in the format <b>username@domain.com</b><br />"); }

// Definition of some variables
	$OB = "----=_OuterBoundary_000";
	$IB = "----=_InnerBoundery_001";

// Headers
	$headers ="MIME-Version: 1.0\r\n"; 
	$headers.="From: ".$FromName." <".$From.">\n"; 
	$headers.="To: ".$ToName." <".$To.">\n"; 
	$headers.="Reply-To: ".$FromName." <".$From.">\n"; 
	$headers.="X-Priority: 1\n"; 
	$headers.="X-MSMail-Priority: High\n"; 
	$headers.="X-Mailer: My PHP Mailer\n"; 
	$headers.="Content-Type: multipart/mixed;\n\tboundary=\"".$OB."\"\n";

// Messages start with text/html alternatives in OB
	$Msg ="This is a multi-part message in MIME format.\n";
	$Msg.="\n--".$OB."\n";
	$Msg.="Content-Type: multipart/alternative;\n\tboundary=\"".$IB."\"\n\n";

// Plaintext section 
	$Msg.="\n--".$IB."\n";
	$Msg.="Content-Type: text/plain;\n\tcharset=\"iso-8859-1\"\n";
	$Msg.="Content-Transfer-Encoding: quoted-printable\n\n";

// Plaintext goes here
	$Msg.=$Text."\n\n";

// Html section 
	$Msg.="\n--".$IB."\n";
	$Msg.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
	$Msg.="Content-Transfer-Encoding: base64\n\n";

// Html goes here 
	$Msg.=chunk_split(base64_encode($Html))."\n\n";

// End of IB
	$Msg.="\n--".$IB."--\n";

// Attachments
	if($AttmFiles){
		foreach($AttmFiles as $AttmFile){
//			$patharray = explode ("/", $AttmFile); 
//			$FileName=$patharray[count($patharray)-1];
			$FileName = "RequestedFile.zip";

			$Msg.= "\n--".$OB."\n";
			$Msg.="Content-Type: application/octet-stream;\n\tname=\"".$FileName."\"\n";
			$Msg.="Content-Transfer-Encoding: base64\n";
			$Msg.="Content-Disposition: attachment;\n\tfilename=\"".$FileName."\"\n\n";

// File goes here
			$fd = fopen ($AttmFile, "rb");
			if ($fd == false) { return putResult(false, "", "fopen", "SendMail > fopen: AttmFile=$AttmFile.", "Unable to open the attachment file $AttmFile.<br />"); }

			$FileContent = fread($fd,filesize($AttmFile));
			if ($FileContent == false) { return putResult(false, "", "fread", "SendMail > fread: fd=$fd; AttmFile=$AttmFile.", "Unable to read the attachment file $AttmFile.<br />"); }

			$success1 = fclose($fd);
			if ($success1 == false) { return putResult(false, "", "fclose", "SendMail > fclose: handle=$handle", "Unable to close the handle of the attachment file $AttmFile.<br />"); }

			$FileContent = chunk_split(base64_encode($FileContent));
			$Msg.=$FileContent;
			$Msg.="\n\n";
		} // end for
	} // end if

// Message ends
	$Msg.="\n--".$OB."--\n";

// Send mail
	$success2 = mail($To, $Subject, $Msg, $headers); 
	if ($success2 == false) { return putResult(false, "", "mail", "SendMail > mail: To=$To; Subject=$Subject; Msg=$Msg; headers=$headers.", "Due to technical problems the email to <b>$To</b> could not be sent.<br />"); }

// Logging
	//syslog(LOG_INFO,"Mail: Message sent to $ToName <$To>");

// Return true if everything went fine
	return putResult(true, true, "", "", "");

} // end function SendMail

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printDirFileProperties($number, $entry, $checkbox_hidden, $onClick) {

// --------------
// Prints a checkbox and some hidden fields
// $onClick should be like "onClick=\"do_something_javascript();\""
// --------------

// Replace ' by &#039; to avoid errors when using this variable in an HTML value tag
//	$dirfilename_html = htmlspecialchars($dirfilename, ENT_QUOTES);

// Print checkbox or hidden field
	if ($checkbox_hidden == "checkbox") {
		echo "<input type=\"checkbox\" name=\"list[$number][dirfilename]\" id=\"list[$number][dirfilename]\" value=\"" . $entry['dirfilename'] . "\" $onClick/>\n";
	}
	else {
		echo "<input type=\"hidden\"   name=\"list[$number][dirfilename]\" value=\"" . $entry['dirfilename'] . "\" />\n";
	}

// Print hidden fields
	echo "<input type=\"hidden\"   name=\"list[$number][dirorfile]\"   value=\"" . $entry['dirorfile'] . "\" />\n";
	echo "<input type=\"hidden\"   name=\"list[$number][size]\"        value=\"" . $entry['size'] . "\" />\n";
	echo "<input type=\"hidden\"   name=\"list[$number][permissions]\" value=\"" . $entry['permissions'] . "\" />\n";
	echo "<input type=\"hidden\"   name=\"list[$number][mtime]\"       value=\"" . $entry['mtime'] . "\" />\n";

} // end printDirFileProperties

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getSelectedEntries($list) {

// --------------
// Input = array where dirfilename is set if the entry was selected, not set if not selected:
//   [1] => Array ( [dirfilename] => dir1 [dirorfile] => d [size] => 0 [permissions] => ---rw-rw- )   <-- selected
//   [2] => Array ( [dirfilename] => dir2 [dirorfile] => d [size] => 0 [permissions] => ---rw-rw- )   <-- selected 
//   [3] => Array ( [dirorfile] => d [size] => 0 [permissions] => ---rw-rw- )                         <-- not selected
//
// Output = array with only the selected entries:
//   [1] => Array ( [dirfilename] => dir1 [dirorfile] => d [size] => 0 [permissions] => ---rw-rw- ) 
//   [2] => Array ( [dirfilename] => dir2 [dirorfile] => d [size] => 0 [permissions] => ---rw-rw- ) 
// --------------

	$newlist = array();
	$counter = 1;

	for ($i=1; $i<=sizeof($list); $i=$i+1) {
		if (array_key_exists("dirfilename", $list[$i])) { $newlist[$counter] = $list[$i]; $counter = $counter + 1; }
	} // end for

	return $newlist;

} // end getSelectedEntries

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function formatFilesize($filesize) {

// --------------
// From php.net, code snippet submitted by sponger (10-Jun-2002 05:28)
// Edited for use in net2ftp.
//
// This may come in handy for someone.
// Returns the size of the passed file in the appropriate measurement format.
// --------------

// Setup some common file size measurements.
	$kb = 1024;         // Kilobyte
	$mb = 1048576;      // Megabyte
	$gb = 1073741824;   // Gigabyte
	$tb = 1099511627776;// Terabyte

// If it's less than a kb we just return the size, otherwise we keep going until
//   the size is in the appropriate measurement range.
	if($filesize< $kb) {
		return $filesize." B";
	}
	elseif($filesize< $mb) {
		return round($filesize/$kb,2) . " kB";
	}
	elseif($filesize< $gb) {
		return round($filesize/$mb,2) . " MB";
	}
	elseif($filesize< $tb) {
		return round($filesize/$gb,2) . " GB";
	}
	else {
		return round($filesize/$tb,2) . " TB";
	}

} // end formatFilesize

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printFunctionTags($function, $beginend) {

// --------------
// This function prints out hidden HTML tags at the beginning and end of functions
// --------------

	$print_function_tags = getSetting("print_function_tags");

	if ($print_function_tags == "yes" && $beginend == "begin") { 
		echo "\n\n\n<!-- Output generated by function $function() BEGIN -->\n"; 
	}

	if ($print_function_tags == "yes" && $beginend == "end") { 
		echo "\n<!-- Output generated by function $function() END -->\n\n\n"; 
	}

} // end printFunctionTags

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function mytempnam($dir, $prefix, $postfix) {

// --------------
// Contributed by anonymous on http://www.php.net on 23-Jul-2003 04:56
// The tempnam() function will not let you specify a postfix to the filename created. 
// Here is a function that will create a new filename with pre and post fix'es. 
// It returns false if it can't create in the dir specified. (The function tempnam, on the contrary, creates the file in the systems temp dir.)
// --------------

	if ($dir[strlen($dir) - 1] == '/') { $trailing_slash = ""; }
	else { $trailing_slash = "/"; }
 
// Check if the $dir is a directory
	if (!is_dir($dir) || filetype($dir) != "dir") { return false; }

// Check if the directory is writeable
	if (!is_writable($dir)){ return false; }

// Create the temporary filename
	do { 
		$seed = substr(md5(microtime()), 0, 8);
		$filename = $dir . $trailing_slash . $prefix . $seed . $postfix;
	} while (file_exists($filename));


	$fp = fopen($filename, "w");
	fclose($fp);
	return $filename;

} // end mytempnam

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



?>