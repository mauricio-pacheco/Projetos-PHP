<?php

function getAuthorization($setting) {

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
// Check the authorizations?
// Set to yes or no.
// ----------------------------------------------------------------------------------
$settings['check_authorization'] = "yes";


// ----------------------------------------------------------------------------------
// Allowed FTP servers
// Either set it to ALL, or else provide a list of allowed servers
// This will automatically change the layout of the login page:
//    - if ALL is entered, then the FTP server input field will be free text
//    - if only 1 entry is entered, then the FTP server input field will not be shown
//    - if more than 1 entry is entered, then the FTP server will have to be chosen from a drop-down list
// ----------------------------------------------------------------------------------

$settings['net2ftp_allowed_ftpservers'][1] = $row_Config['ftpserver'];
//$settings['net2ftp_allowed_ftpservers'][1] = "ftp.your-server.com";
//$settings['net2ftp_allowed_ftpservers'][2] = "192.168.1.1";
//$settings['net2ftp_allowed_ftpservers'][3] = "ftp.mydomain2.org";


// ----------------------------------------------------------------------------------
// Banned FTP servers
// Modify this entry, and add other entries if needed, but there should be at least one!
// ----------------------------------------------------------------------------------

$settings['net2ftp_banned_ftpservers'][1] = "ftp.download-music-for-free.com";


// ----------------------------------------------------------------------------------
// Banned IP addresses
// Modify this entry, and add other entries if needed, but there should be at least one!
// ----------------------------------------------------------------------------------

$settings['net2ftp_banned_addresses'][1] = "10.0.0.1";


// ----------------------------------------------------------------------------------
// Allowed FTP server port
// Set it either to ALL, or to a fixed number
// ----------------------------------------------------------------------------------
$settings['net2ftp_allowed_ftpserverport'] = "ALL";
//$settings['net2ftp_allowed_ftpserverport'] = "21";


// ----------------------------------------------------------------------------------
// Login directory = directory shown when the users log in for the first time
// This is not restrictive: users can get out of this directory
// ----------------------------------------------------------------------------------

$settings['logindirectory']   = "";                       // "" is the home directory (can be set differently for each user on the *FTP* server)
//$settings['logindirectory'] = "/";                      // "/" is the root directory
//$settings['logindirectory'] = "/pub/linux";             // you can also set another directory

// ----------------------------------------------------------------------------------
// Root directory = base directory out of which users cannot go
// This is restrictive and can be set per username
// Note: This applies for all FTP servers at the moment
//       Future enhancements of net2ftp will allow to set this per FTP server
// ----------------------------------------------------------------------------------

$settings['rootdirectory']['default'] = "/";                // default root directory. Set to "/" if all directories are allowed.
$settings['rootdirectory']['david']   = "/";                // David's root directory
$settings['rootdirectory']['john']    = "/webdocs/john";    // John's root directory


// ----------------------------------------------------------------------------------
// DO NOT CHANGE ANYTHING BELOW THIS LINE
// ----------------------------------------------------------------------------------

if ($setting == "ALL")                                              { return $settings; }
elseif ($setting != "ALL" && array_key_exists($setting, $settings)) { return $settings[$setting]; }
else                                                                { return "Setting $setting does not exist"; }

} // end function getAuthorization
?>