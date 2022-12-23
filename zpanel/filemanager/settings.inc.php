<?php

function getSetting($setting) {

$down_one = "yes";
include("../database/db.php");

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |              Copyright (c) 2003-2004 by David Gartner                         |
//  |                                                                               |
//   -------------------------------------------------------------------------------
//  |                                                                               |
//  |  Enter your settings and preferences below.                                   |
//  |                                                                               |
//  |  The structure of each line is like this:                                     |
//  |     $variable_name = "setting_value";                                         |
//  |                                                                               |
//  |  Note that the variable starts with a dollar sign $, that the value is        |
//  |  enclosed in double quotes " and that the line ends with a semi-colon ;       |
//  |                                                                               |
//  |  BE CAREFUL WHEN EDITING THE FILE: DO NOT ERASE THOSE SPECIAL CHARACTERS.     |
//  |                                                                               |
//   -------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------
// Version checking settings
// ----------------------------------------------------------------------------------

// Set to yes if you want net2ftp to check for the latest version
$settings['version_checking'] = "no";

// ----------------------------------------------------------------------------------
// Network settings
// ----------------------------------------------------------------------------------

// Enter your email address
$settings['email_feedback'] = $row_Config['support_email'];

// Your Company's Name
$settings['companyname'] = $row_Config['company'];


// ----------------------------------------------------------------------------------
// Upload settings
// ----------------------------------------------------------------------------------

// Maximum upload filesize allowed **by net2ftp**. Default: 50000 kB.
//$settings['max_upload_size'] = "5000000000"; // in Bytes

// IF YOU WANT TO ALLOW LARGE FILE UPLOADS, YOU MAY HAVE TO ADJUST
// THE FOLLOWING PARAMETERS:
// 1 - in the file php.ini: upload_max_filesize, post_max_size,
//     max_execution_time, memory_limit
// 2 - in the file php.conf: LimitRequestBody

// Nr of files and archives that can be uploaded per page
//$settings['nr_upload_files'] = "10";
//$settings['nr_upload_archives'] = "10";


// ----------------------------------------------------------------------------------
// PHP error reporting
// Set to "ALL" or "standard" while you are testing net2ftp
// Set to "NONE" once the testing is done
// ----------------------------------------------------------------------------------
//$settings['error_reporting'] = "ALL";
$settings['error_reporting'] = "NONE";
//$settings['error_reporting'] = "standard";


// ----------------------------------------------------------------------------------
// Optional: log the actions of the users (MySQL database required)
// ----------------------------------------------------------------------------------

// Set to "yes" if you want to activate logging, otherwise set to "no"
$settings['use_database'] = "no";

// Switch different types of logs on or off
$settings['log_access'] = "yes";
$settings['log_login'] = "yes";
$settings['log_error'] = "yes";

// Enter your MySQL settings
$settings['dbusername'] = "";
$settings['dbpassword'] = "";
$settings['dbname']     = "";
$settings['dbserver']   = "localhost";   // on many configurations, this is "localhost"


// ----------------------------------------------------------------------------------
// Layout
// ----------------------------------------------------------------------------------

// ---------------------------------
// Settings for the Edit screen
// ---------------------------------
// Size of the textarea in which the files are edited
$settings['edit_nrofcolumns'] = "118";
$settings['edit_nrofrows'] = "33";
$settings['edit_nrofcolumns_wysiwyg'] = "110";
$settings['edit_nrofrows_wysiwyg'] = "28";

// Show mime type icons on the browse screen
$settings['show_icons'] = "yes";

// ----------------------------------------------------------------------------------
// Developer settings
// ----------------------------------------------------------------------------------

// Use this to see from which net2ftp function some HTML output is coming.
// Hidden HTML tags are added to indicate when a function's output starts and ends.
// For example, when you look at the HTML source of the Browse Screen:
// <!-- Code generated by function browse() BEGIN -->
// [HTML code generated by browse()]
// <!-- Code generated by function browse() END -->
$settings['print_function_tags'] = "no";

// Show the beta functions which are not yet totally finished/stable
// USE ONLY IN TEST ENVIRONMENTS, NOT IN PRODUCTION ENVIRONMENTS
$settings['show_beta'] = "no";

// Allow the troubleshooting functions
$settings['troubleshoot'] = "no";


// ----------------------------------------------------------------------------------
// DO NOT CHANGE ANYTHING BELOW THIS LINE
// ----------------------------------------------------------------------------------

$settings['application_version'] = "0.80";

// Is this net2ftp.com, or a net2ftp installation elsewhere
$settings['net2ftpdotcom'] = "no";

if ($setting == "ALL")                                              { return $settings; }
elseif ($setting != "ALL" && array_key_exists($setting, $settings)) { return $settings[$setting]; }
else                                                                { return "Setting $setting does not exist"; }

} // end function getSetting
?>