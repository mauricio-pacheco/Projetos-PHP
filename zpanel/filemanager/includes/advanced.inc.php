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

function advanced($state2, $directory, $formresult) {

// --------------
// This function allows to execute advanced functions
// --------------

	$show_beta = getSetting("show_beta");

	switch ($state2) {
		case "main":
			printAdvancedFunctions($directory);	
		break;
		case "troubleshoot_webserver":
			troubleshoot_webserver($directory, $formresult);
		break;
		case "troubleshoot_ftpserver":
			troubleshoot_ftpserver($directory, $formresult);
		break;
		case "site":
			if ($show_beta == yes) { sendsitecommand($directory, $command, $formresult); }
			else                   { $resultArray['message'] = "The site command functions are not available on this webserver."; printErrorMessage($resultArray, "exit", ""); }
		break;
		case "apache":
			if ($show_beta == yes) { apache($directory, $command, $formresult); }
			else                   { $resultArray['message'] = "The Apache functions are not available on this webserver."; printErrorMessage($resultArray, "exit", ""); }
		break;
		case "mysql":
			if ($show_beta == yes) { mysqlfunctions($directory, $formresult); }
			else                   { $resultArray['message'] = "The MySQL functions are not available on this webserver."; printErrorMessage($resultArray, "exit", ""); }
		break;
		default:
			$resultArray['message'] = "Unexpected state2 string. Exiting."; 
  			printErrorMessage($resultArray, "exit", "");
  		break;

	} // End switch

} // End function advanced

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printAdvancedFunctions($directory) {

// --------------
// This function prints the advanced options screen
// --------------

	$show_beta           = getSetting("show_beta");

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

	printTitle("Advanced functions");

	echo "<form name=\"AdvancedOptionsForm\" id=\"AdvancedOptionsForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"advanced\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"main\" />\n";
	echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
	printBackInForm($directory, "AdvancedOptionsForm");
	echo "<br /><br />\n";

	echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.AdvancedOptionsForm.state2.value='troubleshoot_webserver'; document.AdvancedOptionsForm.submit();\" /> Troubleshoot net2ftp on this webserver<br /><br />\n";
	echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.AdvancedOptionsForm.state2.value='troubleshoot_ftpserver';  document.AdvancedOptionsForm.submit();\" /> Troubleshoot an FTP server<br /><br />\n";
	if ($show_beta == "yes") {
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.AdvancedOptionsForm.state2.value='site';   document.AdvancedOptionsForm.submit();\" /> Send a site command to the FTP server<br /><br />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.AdvancedOptionsForm.state2.value='apache'; document.AdvancedOptionsForm.submit();\" /> Apache: password-protect a directory, create custom error pages<br /><br />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.AdvancedOptionsForm.state2.value='mysql';  document.AdvancedOptionsForm.submit();\" /> MySQL: execute an SQL query<br /><br />\n";
	}
	echo "</form>\n";

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";


} // End function printAdvancedFunctions

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function troubleshoot_webserver($directory, $formresult) {

// --------------
// This function tests the net2ftp installation
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $application_tempdir;

	printTitle("Troubleshoot your net2ftp installation");

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

// FORM BELOW IS NOT USED, BUT I LEFT THE CODE HERE JUST IN CASE WE'RE GOING
// TO USE IT IN THE FUTURE.
// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------
//	if ($formresult != "result") {
//		echo "<form name=\"TroubleshootWebserverForm\" id=\"TroubleshootWebserverForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
//		echo "<input type=\"hidden\" name=\"state\" value=\"troubleshoot\" />\n";
//		echo "<input type=\"hidden\" name=\"state2\" value=\"webserver\" />\n";
//		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
//		printBackInForm($directory, "TroubleshootWebserverForm");
//		echo "</form>\n";
//	}
// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------
//	elseif ($formresult == "result") {
//		printBack($directory);
//	} // End if elseif (form or result)


	printBack($directory);

	echo "<ul>\n";

// Check if the FTP functions are availabe
	echo "<li>Checking if the FTP module of PHP is installed: ";
	if (function_exists("ftp_connect") == true) { echo "<span style=\"color: green; font-weight: bold;\">yes</span>\n"; }
	else                                        { echo "<span style=\"color: red; font-weight: bold;\">no - please install it!</span>\n"; }
	echo "</li><br /> &nbsp; \n";
	flush();

// Check if the /net2ftp/temp folder has been chmodded to 777
	echo "<li>Checking the permissions of the directory on the web server: a small file will be written to the /temp folder and then deleted.</li>";
	echo "<ul>";
	echo "<li>Creating filename: ";
	$tempfilename = @tempnam($application_tempdir, "net2ftp-test") . ".txt";
	if ($tempfilename == true)  { echo "<span style=\"color: green; font-weight: bold;\">OK. Filename: $tempfilename</span>\n"; }
	else                        { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
	echo "</li>\n";

	echo "<li>Opening the file in write mode: ";
	$handle = @fopen($tempfilename, "wb");
	if ($handle == true)  { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
	else                  { echo "<span style=\"color: red; font-weight: bold;\">not OK. Check the permissions of the $application_tempdir directory</span>\n"; }
	echo "</li>\n";

	$string = "This is a test file generated net2ftp, which should have been deleted automatically. The function responsible for this is troubleshoot_webserver(). You can safely delete this file.";
	echo "<li>Writing some text to the file: ";
	$success1 = @fwrite($handle, $string);	
	if ($success1 == true)  { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
	else                    { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
	echo "</li>\n";

	echo "<li>Closing the file: ";
	$success2 = @fclose($handle);
	if ($success2 == true)  { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
	else                    { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
	echo "</li>\n";

	echo "<li>Deleting the file: ";
	$success3 = @unlink($tempfilename);
	if ($success3 == true) { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; } 
	else                   { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
	echo "</li>\n";

	echo "</ul><br /> &nbsp; \n";
	flush();

// Try to connect to an FTP server

// Try to upload a file

	echo "</ul>\n";
	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function troubleshoot_webserver

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function troubleshoot_ftpserver($directory, $formresult) {

// --------------
// This function tests a connection to an FTP server
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $troubleshoot_ftpserver, $troubleshoot_ftpserverport, $troubleshoot_username, $troubleshoot_password;
	global $troubleshoot_language, $troubleshoot_skin, $troubleshoot_directory, $troubleshoot_passivemode;
	global $net2ftp_ftpserver, $net2ftp_username, $net2ftp_language, $net2ftp_skin;

	printTitle("Troubleshoot an FTP server");

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";


// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {
		echo "<form name=\"TroubleshootFtpserverForm\" id=\"TroubleshootFtpserverForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"advanced\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"troubleshoot_ftpserver\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		printBackInForm($directory, "TroubleshootFtpserverForm");
		printForwardInForm("TroubleshootFtpserverForm");

		echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" style=\"margin-left: 20px;\">\n";
		echo "<tr><td>FTP server:</td><td><input type=\"text\" class=\"input\" name=\"troubleshoot_ftpserver\" value=\"$net2ftp_ftpserver\" /></td></tr>\n";
		echo "<tr><td>FTP server port:</td><td><input type=\"text\" class=\"input\" size=\"3\" maxlength=\"5\" name=\"troubleshoot_ftpserverport\" value=\"21\" /></td></tr>\n";
		echo "<tr><td>Username:</td><td><input type=\"text\" class=\"input\" name=\"troubleshoot_username\" value=\"$net2ftp_username\" /></td></tr>\n";
		echo "<tr><td>Password:</td><td><input type=\"password\" class=\"input\" name=\"troubleshoot_password\" /></td></tr>\n";
		echo "<tr><td>Passive mode:</td><td><input type=\"checkbox\" class=\"input\" name=\"troubleshoot_passivemode\" value=\"yes\"></td></tr>\n";
		echo "<tr><td>Directory:</td><td><input type=\"text\" class=\"input\" name=\"troubleshoot_directory\" value=\"$directory\"></td></tr>\n";

		echo "<input type=\"hidden\" name=\"troubleshoot_language\" value=\"$net2ftp_language\" />\n";
		echo "<input type=\"hidden\" name=\"troubleshoot_skin\" value=\"$net2ftp_skin\" />\n";

		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printBack($directory);

// Initial checks
		if ($troubleshoot_passivemode != "yes") { $troubleshoot_passivemode = "no"; }

// Print out connection settings
		echo "<u>Connection settings:</u><br />";
		echo "FTP server: $troubleshoot_ftpserver <br />\n";
		echo "FTP server port: $troubleshoot_ftpserverport <br />\n";
		echo "Username: $troubleshoot_username <br />\n";
		echo "Password length: " . strlen($troubleshoot_password) . "<br />\n";
		echo "Passive mode: $troubleshoot_passivemode <br />\n";
		echo "Directory: $troubleshoot_directory <br />\n";
		echo "Language number: $troubleshoot_language <br />\n";
		echo "Skin number: $troubleshoot_skin <br />\n";

		echo "<br /><br />\n";


		echo "<u>Connecting to the FTP server:</u>\n";
		echo "<ul>\n";

// Connect
		echo "<li>Connecting to the FTP server: ";
		$conn_id = @ftp_connect("$troubleshoot_ftpserver", $troubleshoot_ftpserverport);
		if ($conn_id == true) { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
		else                  { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
		echo "</li><br /> &nbsp; \n";
		flush();

// Login with username and password
		echo "<li>Logging into the FTP server: ";
		$login_result = @ftp_login($conn_id, $troubleshoot_username, $troubleshoot_password);
		if ($login_result == true) { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
		else                       { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
		echo "</li><br /> &nbsp; \n";
		flush();

// Passive mode
		if ($troubleshoot_passivemode == "yes") {
			echo "<li>Setting the passive mode: ";
			$success = @ftp_pasv($conn_id, TRUE);
			if ($success == true) { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
			else                  { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
			echo "</li><br /> &nbsp; \n";
			flush();
		}


// Change the directory
		echo "<li>Changing to the directory $troubleshoot_directory: ";
		$result1 = @ftp_chdir($conn_id, $troubleshoot_directory);
		if ($result1 == true) { echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; }
		else                  { echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n"; }
		echo "</li><br /> &nbsp; \n";
		flush();

// Get the current directory from the FTP server
		$directory_ftp = @ftp_pwd($conn_id);
		echo "<li>The directory from the FTP server is: $directory_ftp \n";
		echo "</li><br /> &nbsp; \n";
		flush();

// Try to get a raw list
		echo "<li>Getting the raw list of directories and files: ";
		$rawlist = @ftp_rawlist($conn_id, "-a");
		if (sizeof($rawlist) > 1) { 
			echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; 
			echo "</li><br /> &nbsp; \n";
		}
		else { 
			echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n";
			echo "</li>\n";
			echo "<li>Trying a second time to get the raw list of directories and files: ";
			$rawlist = @ftp_rawlist($conn_id, ""); 
			if (sizeof($rawlist) > 1) {
				echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; 
				echo "</li><br /> &nbsp; \n";
			}
			else { 
				echo "<span style=\"color: red; font-weight: bold;\">not OK</span>\n";
				echo "</li><br /> &nbsp; \n";
			}
		}
		flush();

// Quiting; ftp_quit doesn't return a value
		echo "<li>Closing the connection: ";
		@ftp_quit($conn_id);
		echo "<span style=\"color: green; font-weight: bold;\">OK</span>\n"; 
		echo "</li><br /> &nbsp; \n";

		echo "</ul>\n";

// Print the raw list
		echo "<br /><u>Raw list of directories and files:</u><br />\n";
		print_r($rawlist);
		flush();

// Print the parsed list
		echo "<br /><br /><u>Parsed list of directories and files:</u><br />\n";
		for($i=0; $i<count($rawlist); $i++) {
			echo " &nbsp; <u>Line $i</u> \n";
			$templist[$i] = ftp_scanline($rawlist[$i]);
			print_r($templist[$i]);
			echo "<br />";
		} // End for
		flush();

	} // End if elseif (form or result)

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function troubleshoot_ftpserver

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function sendsitecommand($directory, $command, $formresult) {

// --------------
// This function allows to send a site command to the FTP server
// --------------


	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

	printTitle("Send site command");

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

		echo "<form name=\"SiteCommandForm\" id=\"SiteCommandForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"site\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";

		printBackInForm($directory, "SiteCommandForm");
		printForwardInForm("SiteCommandForm");

		echo "<input type=\"text\" class=\"input\" name=\"command\" value=\"\" /> Enter the site command <br /><br />\n";

		echo "<div style=\"font-size: 80%;\">The commands you can use depends on your FTP server. These commands are not standard and vary a lot from one server to the other.</div><br />\n";
		echo "<div style=\"font-size: 80%;\">Note that net2ftp cannot display the output of the FTP server, it can only tell if the command returned TRUE or FALSE. This is not a limitation of net2ftp but of PHP, the language in which net2ftp is written.</div><br />\n";

		echo "</form>\n";

	} // end if


// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	else {

		printBack($directory);

// Open connection
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false) { printErrorMessage($resultArray, "exit", ""); }

// Send site command
		$resultArray = ftp_mysite($conn_id, $command);
		$success = getResult($resultArray);
		if ($success == false) { printErrorMessage($resultArray, "", ""); }
		else { echo "The command <b>$command</b> was executed successfully.<br />"; }

// Close connection
		ftp_closeconnection($conn_id);

	} // end else

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function sendsitecommand

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function apache($directory, $formresult) {

// --------------
// This function allows to perform Apache specific actions
// --------------

	if (strlen($directory) > 0) { $printdirectory = $directory; }
	else                        { $printdirectory = "/"; }

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

// Password protection
		printTitle("Password protect a directory");

		echo "<form name=\"ApachePasswordForm\" id=\"ApachePasswordForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"advanced\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"apache\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";

		printBackInForm($directory, "ApachePasswordForm");
		printForwardInForm("ApachePasswordForm");

		echo "Protect directory: <input type=\"text\" class=\"longinput\" name=\"directory1\" value=\"$printdirectory\" />\n";
		printDirectoryTreeLink($directory, "ApachePasswordForm.directory1");

		echo "<br /><br />\n";

		for ($i=1; $i<=5; $i=$i+1) {
			echo "Username $i: <input type=\"text\" class=\"input\" name=\"apache_username$i\" value=\"\" />  Password $i: <input type=\"password\" class=\"input\" name=\"apache_password$i\" value=\"\" /><br />\n";
		} // end for

		echo "</form>\n";

		echo "<br /><br />\n\n";

// Custom error page
		printTitle("Create custom error messages");

		echo "<form name=\"ApacheProtectForm\" id=\"ApacheProtectForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"advanced\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"apache\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";

		printBackInForm($directory, "ApacheProtectForm");
		printForwardInForm("ApacheProtectForm");

		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_1\" value=\"400\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_1\" value=\"400.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_2\" value=\"401\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_2\" value=\"401.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_3\" value=\"404\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_3\" value=\"404.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_4\" value=\"500\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_4\" value=\"500.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_5\" value=\"501\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_5\" value=\"501.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_6\" value=\"502\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_6\" value=\"502.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_7\" value=\"503\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_7\" value=\"503.html\" /><br />\n";
		echo "Error <input type=\"text\" class=\"input\" name=\"apache_error_8\" value=\"505\" /> is redirected to page <input type=\"text\" class=\"input\" name=\"apache_page_8\" value=\"505.html\" /><br />\n";

		echo "</form>\n";

	} // end if


// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	else {

		printBack($directory);

// Do something
		echo "Join the development team! ;-)\n";

	} // end else

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function apache

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function mysqlfunctions($directory, $formresult) {

// --------------
// This function allows to perform MySQL specific actions
// --------------

	if (strlen($directory) > 0) { $printdirectory = $directory; }
	else                        { $printdirectory = "/"; }

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

	printTitle("MySQL");

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

// Password protection
		echo "<form name=\"MySQLForm\" id=\"MySQLForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"advanced\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"mysql\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";

		printBackInForm($directory, "MySQLForm");
		printForwardInForm("MySQLForm");

		echo "UNDER CONSTRUCTION...\n";

		echo "</form>\n";

	} // end if


// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	else {

		printBack($directory);

		echo "Join the development team! ;-)\n";

	} // end else

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function mysqlfunctions

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




?>