<?php

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |                Copyright (c) 2003 by David Gartner                            |
//  |                                                                               |
//  | This program is free software; you can redistribute it and/or                 |
//  | modify it under the terms of the GNU General Public License                   |
//  | as published by the Free Software Foundation; either version 2                |
//  | of the License, or (at your option) any later version.                        |
//  |                                                                               |
//   -------------------------------------------------------------------------------


// -------------------------------------------------------------------------
// Settings
// -------------------------------------------------------------------------

require_once("../settings.inc.php");

// Run the script to the end, even if the user hits the stop button
ignore_user_abort();

// Set the error reporting level
if ($error_reporting == "ALL")  { error_reporting(E_ALL); }
if ($error_reporting == "NONE") { error_reporting(0); }
else                            { error_reporting(E_ERROR | E_WARNING | E_PARSE); }


// -------------------------------------------------------------------------
// Includes
// -------------------------------------------------------------------------

// Functions
require_once($application_rootdir . "/includes/authorizations.inc.php");
require_once($application_rootdir . "/includes/bookmark.inc.php");
require_once($application_rootdir . "/includes/browse.inc.php");
require_once($application_rootdir . "/includes/database.inc.php");
require_once($application_rootdir . "/includes/errorhandling.inc.php");
require_once($application_rootdir . "/includes/filesystem.inc.php");
require_once($application_rootdir . "/includes/html.inc.php");
require_once($application_rootdir . "/includes/manage.inc.php");
require_once($application_rootdir . "/includes/zip.lib.php");


// Register global variables
require_once($application_rootdir . "/includes/registerglobals.inc.php");
$state    =          $HTTP_POST_VARS['state'];
$formresult =        $HTTP_POST_VARS['formresult'];

$datefrom =          $HTTP_POST_VARS['datefrom'];
$dateto =            $HTTP_POST_VARS['dateto'];

$dbusername2 =        $HTTP_POST_VARS['dbusername2'];
$dbpassword2 =        $HTTP_POST_VARS['dbpassword2'];
$dbname2 =            $HTTP_POST_VARS['dbname2'];
$dbserver2 =          $HTTP_POST_VARS['dbserver2'];
$sqlquerystring =     str_replace("\'", "'", $HTTP_POST_VARS['sqlquerystring']);

// Send HTTP headers
require_once($application_rootdir . "/includes/httpheaders.inc.php");


// -------------------------------------------------------------------------
// Block the output to the browser
// If no errors occur, the page will be shown as usually, otherwise it will be replaced by a nice error message
// This way, no functions have to be called with a @ in front, and debugging is made easier
// -------------------------------------------------------------------------
if ($compress_output == "yes") { ob_start("ob_gzhandler"); }
else { ob_start(); }


// -------------------------------------------------------------------------
// Begin HTML output
// -------------------------------------------------------------------------
HtmlBegin("net2ftp Admin", $state, "", "", "");


// -------------------------------------------------------------------------
// Set default state and directory if needed
// -------------------------------------------------------------------------
if (strlen($state) < 1) { $state= "printIntroduction"; }


switch ($state) {
	case "printIntroduction":
		printIntroduction();
	break;
	case "checkRequirements":
		checkRequirements($formresult);
	break;
	case "createTables":
		createTables($formresult, $dbusername2, $dbpassword2, $dbname2, $dbserver2, $sqlquerystring);
	break;
	case "editSettings":
		editSettings($formresult);
	break;
	case "viewLogs":
		viewLogs($formresult, $datefrom, $dateto);
	break;
	case "emptyLogs":
		emptyLogs($formresult, $datefrom, $dateto);
	break;
	default:
		$resultArray['message'] = "Unexpected state string. Exiting."; 
		printErrorMessage($resultArray, "exit");
	break;
} // End switch


// -------------------------------------------------------------------------
// End HTML output
// -------------------------------------------------------------------------
HtmlEnd();

// -------------------------------------------------------------------------
// Send the output to the browser
// Note: in case there is an error and the script is exited, the ob_flush function is called by the error handler
// -------------------------------------------------------------------------
ob_end_flush();


// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function printIntroduction() {

// --------------
// This function prints some text
// --------------

	printTitle("Installation and settings");
	echo "<form name=\"InstallForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"state\" value=\"\">\n";
	echo "</form>\n";

	echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.InstallForm.state.value='checkRequirements'; document.InstallForm.submit();\" />  Check the requirements of net2ftp<br /><br />\n";
	echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.InstallForm.state.value='createTables';      document.InstallForm.submit();\" />  Create the MySQL tables (needed for logging only)<br /><br />\n";
	echo "<input type=\"button\" class=\"smallbutton\" value=\"Go\" onClick=\"document.InstallForm.state.value='editSettings';      document.InstallForm.submit();\" />  Edit the new settings.inc.php file<br /><br />\n";

	printTitle("Logs");
	viewLogs("form", "", "");
	deleteLogs("form", "", "");

} // End printIntroduction

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function viewLogs($formresult, $datefrom, $dateto) {

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

		echo "<table style=\"margin-right: auto;\">\n";
		echo "<tr>\n";
		echo "<td>\n";

		echo "Select the criteria to <b>view the logs</b>:<br><br>\n";
		echo "<form name=\"ViewForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\">\n";
		echo "<input type=\"hidden\" name=\"state\" value=\"viewLogs\">\n";

// Date
		$today = date("Y-m-d");
		$oneweekago = date("Y-m-d", time() - 3600*24*7);
		echo "Date from: <input type=\"text\" name=\"datefrom\" value=\"$oneweekago\">  to: <input type=\"text\" name=\"dateto\" value=\"$today\"> &nbsp; &nbsp;";
		echo "<input type=\"submit\" class=\"button\" value=\"View\">\n";
		echo "</form>\n";

		echo "<br><br>\n";

		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";


	} // End if

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------
	elseif ($formresult == "result") {

		$resultArray = connect2db();
		$mydb = getResult($resultArray);
		if ($mydb == false)  { printErrorMessage($resultArray); exit(); }

		$fields_net2ftp_logAccess = mysql_list_fields($dbname, "net2ftp_logAccess", $mydb);
		$columns_net2ftp_logAccess = mysql_num_fields($fields_net2ftp_logAccess);

		$fields_net2ftp_logLogin = mysql_list_fields($dbname, "net2ftp_logLogin", $mydb);
		$columns_net2ftp_logLogin = mysql_num_fields($fields_net2ftp_logLogin);

		$fields_net2ftp_logError= mysql_list_fields($dbname, "net2ftp_logError", $mydb);
		$columns_net2ftp_logError = mysql_num_fields($fields_net2ftp_logError);

// Query 1
		$sqlquery1 = "SELECT * FROM net2ftp_logAccess WHERE date BETWEEN '$datefrom' AND '$dateto' ORDER BY date DESC, time DESC;";
		$result1 = mysql_query("$sqlquery1") or die("Unable to execute SQL SELECT query (stats1) <br> $sqlquery1");
		$nrofrows1 = mysql_num_rows($result1);

// Query 2
		$sqlquery2 = "SELECT * FROM net2ftp_logLogin WHERE date BETWEEN '$datefrom' AND '$dateto' ORDER BY date DESC, time DESC;";
		$result2 = mysql_query("$sqlquery2") or die("Unable to execute SQL SELECT query (stats2) <br> $sqlquery2");
		$nrofrows2 = mysql_num_rows($result2);

// Query 3
		$sqlquery3 = "SELECT * FROM net2ftp_logError WHERE date BETWEEN '$datefrom' AND '$dateto' ORDER BY date DESC, time DESC;";
		$result3 = mysql_query("$sqlquery3") or die("Unable to execute SQL SELECT query (stats3) <br> $sqlquery3");
		$nrofrows3 = mysql_num_rows($result3);

		printLogs($columns_net2ftp_logAccess, $nrofrows1, $sqlquery1, $fields_net2ftp_logAccess, $result1);
		printLogs($columns_net2ftp_logLogin, $nrofrows2, $sqlquery2, $fields_net2ftp_logLogin, $result2);
		printLogs($columns_net2ftp_logError, $nrofrows3, $sqlquery3, $fields_net2ftp_logError, $result3);

	} // End elseif result

} // End viewLogs

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function deleteLogs($formresult, $datefrom, $dateto) {


// -------------------------------------------------------------------------
// Form to empty the logs
// -------------------------------------------------------------------------

	if ($formresult != "result") {

		echo "<table style=\"margin-right: auto;\">\n";
		echo "<tr>\n";
		echo "<td>\n";

		echo "Select the criteria to <b>empty the logs</b>:<br><br>\n";
		echo "<form name=\"EmptyForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\">\n";
		echo "<input type=\"hidden\" name=\"state\" value=\"emptyLogs\">\n";

// Date
		$today = date("Y-m-d");
		$oneweekago = date("Y-m-d", time() - 3600*24*7);
		echo "Date from: <input type=\"text\" name=\"datefrom\" value=\"$oneweekago\">  to: <input type=\"text\" name=\"dateto\" value=\"$today\"> &nbsp; &nbsp;";
		echo "<input type=\"submit\" class=\"button\" value=\"Empty\">\n";
		echo "</form>\n";

		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";


	} // End if

// -----------------------------------------------------
// Result
// -----------------------------------------------------
	elseif ($formresult == "result" && $manage == "emptylogs") {

		$resultArray = connect2db();
		$mydb = getResult($resultArray);
		if ($mydb == false)  { printErrorMessage($resultArray); exit(); }

		$tables[1] = "net2ftp_logAccess";
		$tables[2] = "net2ftp_logLogin";
		$tables[3] = "net2ftp_logError";

		for ($i=1; $i<=3; $i++) {
			$sqlquery_empty = "DELETE FROM $tables[$i] WHERE date BETWEEN '$datefrom' AND '$dateto';";
			$result_empty = mysql_query("$sqlquery_empty") or die("Unable to execute SQL SELECT query (empty) <br> $sqlquery_empty");
			if ($result_empty == true) { echo "The table <b>$tables[$i]</b> was emptied successfully.<br>\n"; }
			else                       { echo "The table <b>$tables[$i]</b> could not be emptied.<br>\n"; }
			echo "<br>\n";
		}

	} // End elseif result

} // End deleteLogs

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









// ************************************************************************************** 
// ************************************************************************************** 
// **                                                                                  ** 
// **                                                                                  ** 

function printLogs($nrofcolumns, $nrofrows, $sqlquery, $fields, $result) {

// Call the function like this:
//    printLogs($columns_net2ftp_ftpserversBanned, $nrofrows5, $sqlquery5, $fields_net2ftp_ftpserversBanned, $result3)

$nrofcolumns_withindex = $nrofcolumns + 1;

	echo "<table border=\"1\">\n";
// ------------------------------------------------------------------------- 
// First row: title
// ------------------------------------------------------------------------- 
	echo "<tr><td colspan=\"$nrofcolumns_withindex\" id=\"#tdheader1\" style=\"font-size: 120%;\">$sqlquery</td></tr>\n";
// ------------------------------------------------------------------------- 
// Second row: header
// ------------------------------------------------------------------------- 
	if ($nrofrows != 0) {
		echo "<tr>\n";
		echo "<td id=\"tdheader1\"><b>Index</b></td>\n";
		for ($i = 0; $i < $nrofcolumns; $i=$i+1) {
			$resultparametername = mysql_field_name($fields, $i);
			$resultparametervalue = mysql_result($result, 0, $resultparametername);
			echo "<td id=\"tdheader1\"><b>$resultparametername</b></td>\n";
		} // End for (row, loop on columns)
		echo "</tr>\n";
	}
// ------------------------------------------------------------------------- 
// Other rows: data
// ------------------------------------------------------------------------- 

// If there is data
	if ($nrofrows != 0) {
		for($j=0; $j<$nrofrows; $j=$j+1) {
			echo "<tr>\n";
			echo "<td id=\"tditem1\">$j</td>\n";
			for ($i = 0; $i < $nrofcolumns; $i=$i+1) {
				$resultparametername = mysql_field_name($fields, $i);
				$resultparametervalue = mysql_result($result, $j, $resultparametername);
				echo "<td id=\"tditem1\">$resultparametervalue</td>\n";
			} // End for (row, loop on columns)
			echo "</tr>\n";
		} // End for (show results, loop on rows)
	}

// If there is no data
	else { echo "<tr><td colspan=\"$nrofcolumns_withindex\">No data</td></tr>"; }

	echo "</table>\n";

	echo "<p> &nbsp; </p>\n\n\n";

} // End printLogs

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function checkRequirements() {

// --------------
// This function checks the requirements and prints the result
// --------------

// -------------------------------------------------------------------------
// Global variables (declared as global in functions)
// -------------------------------------------------------------------------

global $application_tempdir;

	echo "<form name=\"BackForm\" id=\"BackForm\" method=\"post\" action=\"" . printPHP_SELF("no") . "\">\n";
	echo "<input type=\"hidden\" name=\"state\" value=\"printIntroduction\" />\n";
	echo "<input type=\"submit\" class=\"button\" value=\"Back\">";
	echo "</form>\n";


// ------------------------------------------------------------------------- 
// 1 - FTP module of PHP
// ------------------------------------------------------------------------- 

	$result11 = function_exists("ftp_connect");
	$result12 = function_exists("ftp_login");
	$result13 = function_exists("ftp_rawlist");
	$result1 = $result11 && $result12 && $result13;

	printTitle("FTP module of PHP");

	if ($result1 == true) { echo "<div style=\"color: green;\">The FTP module of PHP is installed.</div><br /><br />\n"; }
	else {
		echo "<div style=\"color: red;  \">The FTP module of PHP is not installed.<br /><br />\n"; 
		echo "<div style=\"font-size: 80%;\">You should install the FTP module of PHP, otherwise net2ftp will not work.</div>";
		echo "</div>";
	}
	echo "<br />";


// ------------------------------------------------------------------------- 
// 2 - Permissions of the /temp directory
// ------------------------------------------------------------------------- 

	$string = "This file was created to test the authorizations of the net2ftp temporary directory $application_tempdir.\n You may delete it safely.\n";
	$filename = $application_tempdir . "/testfile.txt";

	$resultmessage = "";

	$handle  = @fopen($filename, "wb");
	if ($handle == "") { $resultmessage = $resultmessage . "File handle $handle could not be opened (function fopen)<br />"; }

	$result21 = @fwrite($handle, $string);
	if ($result21 == false) { $resultmessage = $resultmessage . "File $filename could not be written (function fwrite)<br />"; }

	$result22 = @fclose($handle);
	if ($result21 == false) { $resultmessage = $resultmessage . "File handle $handle could not be closed (function fclose)<br />"; }

	$result23 = @unlink($filename);
	if ($result21 == false) { $resultmessage = $resultmessage . "File $filename could not be deleted (function unlink)<br />"; }

	$result2 = $result21 && $result22 && $result23;

	printTitle("Permissions of the temp directory");

	if ($result2 == true) { echo "<div style=\"color: green;\">The permissions of the directory $application_tempdir are OK</div><br /><br />\n"; }
	else {			echo "<div style=\"color: red;\"  >The permissions of the directory $application_tempdir are not OK<br /><br />\n"; 
					echo "<div style=\"font-size: 80%;\">";
//					echo $resultmessage . "<br />\n";
					echo "If you use Unix/Linux/BSD, then chmod 777 the directory $application_tempdir<br />\n"; 
					echo "If you use Windows, then change the Security properties of the folder $application_tempdir: right-click on the folder name, choose Properties, select the Security tab, and give Full Control to the user that under which the webserver runs.<br />\n";
					echo "</div>\n";
					echo "</div>\n";
	}

} // End checkRequirements

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function createTables($formresult, $dbusername2, $dbpassword2, $dbname2, $dbserver2, $sqlquerystring) {

// --------------
// This function creates MySQL tables
// --------------

	printTitle("Create tables");

// -------------------------------------------------------------------------
// Read the SQL file
// -------------------------------------------------------------------------
	$application_rootdir = dirname(__FILE__);
	$filename = $application_rootdir . "/create_tables.sql";
	$handle = fopen($filename, "rb"); // Open the file for reading only
	if ($handle == false) { echo "The handle of file $filename could not be opened<br />\n"; }

	clearstatcache(); // for filesize

	$sqlquerystring = fread($handle, filesize($filename));
	if ($sqlquerystring == false) { echo "The file $filename could not be opened<br />\n"; }

	$result1 = fclose($handle);
	if ($result1 == false) { echo "The handle of file $filename could not be closed<br />\n"; }


// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------
	if ($formresult != "result") {

		echo "<form name=\"CreateTablesForm\" id=\"CreateTablesForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"state\" value=\"createTables\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";

		echo "<table>";
		echo "<tr><td>MySQL username </td><td> <input type=\"text\" name=\"dbusername2\" /></td></tr>\n";
		echo "<tr><td>MySQL password </td><td> <input type=\"password\" name=\"dbpassword2\" /></td></tr>\n";
		echo "<tr><td>MySQL database </td><td> <input type=\"text\" name=\"dbname2\" />    </td></tr>\n";
		echo "<tr><td>MySQL server   </td><td> <input type=\"text\" name=\"dbserver2\" value=\"localhost\" /></td></tr>\n";
		echo "</table><br /><br />";

		echo "This SQL query is going to be executed:<br /><br />\n";
		echo "<textarea name=\"text\" class=\"edit\" rows=\"15\" cols=\"65\" wrap=\"off\">\n";
		echo "$sqlquerystring\n";
		echo "</textarea><br /><br />\n";

		echo "<div style=\"text-align: center;\"><input type=\"submit\" class=\"button\" value=\"Execute\" /></div>\n";
		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------
	elseif ($formresult == "result") {

		echo "Settings used:<br />\n";
		echo "MySQL username: $dbusername2<br />\n";
		echo "MySQL database: $dbname2<br />\n";
		echo "MySQL server: $dbserver2<br /><br />\n";

		$mydb = mysql_connect($dbserver2, $dbusername2, $dbpassword2);
		if ($mydb == false) { echo "The connection to the database could not be set up.<br />\n"; }

		$result1 = mysql_select_db($dbname2);

		$result2 = mysql_query($sqlquerystring);
		if ($result2 == false) { echo "<b>This SQL query could not be executed:</b><br /> $sqlquerystring<br />\n"; }
		else { echo "The tables were created successfully.<br />\n"; }

	} // end if

} // End createTables

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function editSettings($formresult) {

// --------------
// This function changes the settings file
// --------------

	printTitle("Edit settings");

// -------------------------------------------------------------------------
// 1 - Form
// -------------------------------------------------------------------------
	if ($formresult != "result") {

// -------------------------------------------------------------------------
// 1.1 - Prepare the text for the authorization textarea
// -------------------------------------------------------------------------

// Allowed FTP servers
		$text_net2ftp_allowed_ftpservers = "";
		if (is_array($net2ftp_allowed_ftpservers) == true) {
			for ($i=1; $i<sizeof($net2ftp_allowed_ftpservers); $i=$i+1) {
				$text_net2ftp_allowed_ftpservers = $text_net2ftp_allowed_ftpservers . "\$net2ftp_allowed_ftpservers[\$i] = " . $net2ftp_allowed_ftpservers[$i] . ";\n";
			}
		}
		else {
			$text_net2ftp_allowed_ftpservers = "\$net2ftp_allowed_ftpservers[1] = \"ALL\";\n";
			$text_net2ftp_allowed_ftpservers = $text_net2ftp_allowed_ftpservers . "//\$net2ftp_allowed_ftpservers[1] = \"ftp.your-server.com\";";
			$text_net2ftp_allowed_ftpservers = $text_net2ftp_allowed_ftpservers . "//$net2ftp_allowed_ftpservers[2] = \"192.168.1.1\";\n";
			$text_net2ftp_allowed_ftpservers = $text_net2ftp_allowed_ftpservers . "//$net2ftp_allowed_ftpservers[3] = \"ftp.mydomain2.org\";\n";
		}

// Banned FTP servers
		$text_net2ftp_banned_ftpservers = "";
		if (is_array($net2ftp_banned_ftpservers) == true) {
			for ($i=1; $i<sizeof($net2ftp_banned_ftpservers); $i=$i+1) {
				$text_net2ftp_banned_ftpservers = $text_net2ftp_banned_ftpservers . "\$net2ftp_banned_ftpservers[\$i] = " . $net2ftp_banned_ftpservers[$i] . ";\n";
			}
		}
		else {
			$text_net2ftp_allowed_ftpservers = "\$net2ftp_banned_ftpservers[1] = \"ftp.download-music-for-free.com\";\n";
		}

// Banned IP addresses
		$text_net2ftp_banned_addresses = "";
		if (is_array($net2ftp_banned_addresses) == true) {
			for ($i=1; $i<sizeof($net2ftp_banned_addresses); $i=$i+1) {
				$text_net2ftp_banned_addresses = $text_net2ftp_banned_addresses . "\$net2ftp_banned_addresses[\$i] = " . $net2ftp_banned_addresses[$i] . ";\n";
			}
		}
		else {
			$text_net2ftp_allowed_ftpservers = "\$net2ftp_banned_addresses[1] = \"10.0.0.1\";\n";
		}

// -------------------------------------------------------------------------
// 1.2 - Print form
//       Values come from the settings.inc.php file that is require_onced
// -------------------------------------------------------------------------

		echo "<form name=\"CreateTablesForm\" id=\"CreateTablesForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"createTables\" />\n";

		echo "<div class=\"header31\">General</div>\n";
		echo "<input type=\"text\" name=\"form_mydomain\"            value=\"$mydomain\"        /> If you have your own Domain Name, enter it here (for example mydomain.com)<br />\n";
		echo "<input type=\"text\" name=\"form_email_feedback\"      value=\"$email_feedback\"  /> Enter an email address where users can reach a webmaster<br />\n";
		echo "<input type=\"text\" name=\"form_max_upload_size\"     value=\"$max_upload_size\" /> Maximum filesize that can be uploaded (in Bytes)<br />\n";

		echo "<div class=\"header31\">Layout</div>\n";
		echo "<input type=\"text\" name=\"form_client_css\"          value=\"$client_css\"      /> Skin (have a look which .css files are available in the net2ftp root directory)<br />\n";
		echo "<input type=\"text\" name=\"form_edit_nrofcolumns\"    value=\"$edit_nrofcolumns\"/> Nr of columns of the textbox when editing files<br />\n";
		echo "<input type=\"text\" name=\"form_edit_nrofrows\"       value=\"$edit_nrofrows\"   /> Nr of rows of the textbox when editing files<br />\n";

		echo "<div class=\"header31\">Database</div>\n";
		echo "<input type=\"text\" name=\"form_use_database\"        value=\"$use_database\"    /> Use the MySQL database or not (only for logging purposes)<br />\n";
		echo "<input type=\"text\" name=\"form_dbusername\"          value=\"$dbusername\"      /> Enter the MySQL database username<br />\n";
		echo "<input type=\"text\" name=\"form_dbpassword\"          value=\"$dbpassword\"      /> Enter the MySQL password<br />\n";
		echo "<input type=\"text\" name=\"form_dbname\"              value=\"$dbname\"          /> Enter the MySQL database name<br />\n";
		echo "<input type=\"text\" name=\"form_dbserver\"            value=\"$dbserver\"        /> Enter the MySQL server<br />\n";

		echo "<div class=\"header31\">Logging</div>\n";
		echo "Note: the database settings must be configured for logging to work! See above.<br />\n";
		echo "<input type=\"text\" name=\"form_log_access\"          value=\"$log_access\"      /> Log all page accesses<br />\n";
		echo "<input type=\"text\" name=\"form_log_login\"           value=\"$log_login\"       /> Log the FTP logins<br />\n";
		echo "<input type=\"text\" name=\"form_log_error\"           value=\"$log_error\"       /> Log the error messages<br />\n";

		echo "<div class=\"header31\">Authorizations</div>\n";
		echo "<input type=\"text\" name=\"form_check_authorization\" value=\"$check_authorization\" /> Check the authorizations (allowed/banned FTP servers and banned IP addresses)<br />\n";
		echo "Enter the list of allowed/banned FTP servers and banned IP addresses:<br />\n";
		echo "<textarea name=\"form_authorizationtext\" class=\"edit\" rows=\"15\" cols=\"65\" wrap=\"off\">\n";
		echo "$text_net2ftp_allowed_ftpservers";
		echo "$text_net2ftp_banned_ftpservers";
		echo "$text_net2ftp_banned_addresses";
		echo "</textarea><br /><br />\n";

		echo "<div style=\"text-align: center;\"><input type=\"submit\" class=\"button\" value=\"Save\" /></div>\n";
		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------
	elseif ($formresult == "result") {

// -------------------------------------------------------------------------
// 2.1 - Prepare the string that has to be written to file
// -------------------------------------------------------------------------

		$string = "";
		$string = $string . "

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |                Copyright (c) 2003 by David Gartner                            |
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

";

		$string = $string . "\n\n// General";
		$string = $string . "\$mydomain = " . $form_mydomain . ";\n";
		$string = $string . "\$email_feedback = " . $form_email_feedback . ";\n";
		$string = $string . "\$max_upload_size = " . $form_max_upload_size . ";\n";

		$string = $string . "\n\n// Layout";
		$string = $string . "\$client_css = " . $form_client_css . ";\n";
		$string = $string . "\$edit_nrofcolumns = " . $form_edit_nrofcolumns . ";\n";
		$string = $string . "\$edit_nrofrows = " . $form_edit_nrofrows . ";\n";

		$string = $string . "\n\n// Database";
		$string = $string . "\$use_database = " . $form_use_database . ";\n";
		$string = $string . "\$dbusername = " . $form_dbusername . ";\n";
		$string = $string . "\$dbpassword = " . $form_dbpassword . ";\n";
		$string = $string . "\$dbname = " . $form_dbname . ";\n";
		$string = $string . "\$dbserver = " . $form_dbserver . ";\n";

		$string = $string . "\n\n// Logging";
		$string = $string . "\$log_access = " . $form_log_access . ";\n";
		$string = $string . "\$log_login = " . $form_log_login . ";\n";
		$string = $string . "\$log_error = " . $form_log_error . ";\n";

		$string = $string . "\n\n// Authorizations";
		$string = $string . $form_authorizationtext;

// -------------------------------------------------------------------------
// 2.2 - Write the string to the settings.inc.php file
// -------------------------------------------------------------------------

		$application_rootdir = dirname(__FILE__);
		$filename = $application_rootdir . "settings.inc.php";

		$handle  = @fopen($filename, "wb");
		if ($handle == "") { $resultmessage = $resultmessage . "File handle $handle could not be opened (function fopen)<br />"; }

		$result21 = @fwrite($handle, $string);
		if ($result21 == false) { $resultmessage = $resultmessage . "File $filename could not be written (function fwrite)<br />"; }

		$result22 = @fclose($handle);
		if ($result21 == false) { $resultmessage = $resultmessage . "File handle $handle could not be closed (function fclose)<br />"; }

	} // end if

} // End editSettings

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



?>