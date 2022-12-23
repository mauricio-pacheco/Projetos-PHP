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

function homepage($state2) {

// --------------
// This function prints the various net2ftp website pages
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $application_rootdir;
	$net2ftpdotcom = getSetting("net2ftpdotcom");


// -------------------------------------------------------------------------
// Normal login page
// -------------------------------------------------------------------------
	if ($net2ftpdotcom == "no") {

		echo "<table align=\"center\">\n";

		echo "<tr>\n";
		echo "<td colspan=\"3\">\n";
		echo "<div class=\"header21\">Login!</div>";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td valign=\"top\">\n";
		net2ftp_loginform($application_rootdir, "index.php");
		echo "</td>\n";
		echo "<td style=\"width: 30px;\">\n";
		echo "</td>\n";
		echo "<td valign=\"top\">\n";
		echo "Once you are logged in, you will be able to: \n";
		echo "<ul>\n";
		echo "<li> navigate the FTP server</li>\n";
		echo "<li> upload download</li>\n";
		echo "<li> copy move delete rename chmod</li>\n";
		echo "<li> copy/move to a 2nd FTP server</li>\n";
		echo "<li> view code with syntax highlighting</li>\n";
		echo "<li> edit text files</li>\n";
		echo "<li> edit HTML in a WYSIWYG form</li>\n";
		echo "<li> zip files to download, email or save <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
		echo "<li> upload-and-unzip <span style=\"font-size: 80%; color: red;\">new: works also with tar archives</span></li>\n";
		echo "<li> search for words or phrases <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
		echo "<li> calculate the size of directories and files <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}


// -------------------------------------------------------------------------
// net2ftp.com homepage
// -------------------------------------------------------------------------
	elseif ($net2ftpdotcom == "yes") {

		echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 100%; margin: 0px; padding: 0px;\">\n";
		echo "	<tr>\n";

// Left column
		echo "		<td valign=\"top\" style=\"width: 260px;\">\n";
		printMenu($state2);
		echo "		</td>\n\n";

// Middle column
		echo "		<td valign=\"top\" style=\"width: 50px;\"></td>";

// Right column
		echo "		<td valign=\"top\">\n";

		switch ($state2) {
			case "login":
				homepage_login($application_rootdir, "index.php");	
			break;
			case "screenshots":
				homepage_screenshots();
			break;
			case "features":
				homepage_features();
			break;
			case "download":
				homepage_download();
			break;
			case "help_install":
				homepage_install();
			break;
			default:
				$resultArray['message'] = "Unexpected state2 string. Exiting."; 
	  			printErrorMessage($resultArray, "exit", "");
	  		break;
		} // End switch

		echo "		</td>\n\n";
		echo "	</tr>\n\n";
		echo "</table>\n\n";

		if ($state2 == "login") { 
// Voting buttons
//			echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 100%; margin: 0px; padding: 0px;\">\n";
//			echo "<tr><td>\n";
//			printVotingButton("hotscripts");
//			echo "</td><td>\n";
//			printVotingButton("scriptsearch");
//			echo "</td></tr></table>";
//			echo "<br />\n";

// Terms of use
			printTermsOfUse(); 
		}

	}

} // End function homepage

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_login($net2ftp_directory, $net2ftp_url) {

// --------------
// This function prints the menu
// --------------

		// Login
		echo "<div class=\"header21\">Login!</div>\n";
		net2ftp_loginform($net2ftp_directory, $net2ftp_url);

		// Announcements
		echo "<div class=\"header21\">Announcements</div>\n";
		printAnnouncements();

} // End function homepage_login

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_screenshots() {

// --------------
// This function prints net2ftp screenshots
// --------------

	$client_imagesdir = "images/screenshots";
	$screenshots[1]['image'] = "browse";
	$screenshots[2]['image'] = "view";
	$screenshots[3]['image'] = "edit";
	$screenshots[4]['image'] = "htmlarea";
	$screenshots[5]['image'] = "copy";
	$screenshots[6]['image'] = "chmod";
	$screenshots[7]['image'] = "upload";
	$screenshots[8]['image'] = "email";
	$screenshots[9]['image'] = "bookmark";
	$screenshots[10]['image'] = "help";

	$screenshots[1]['description'] = "Browse the FTP server";
	$screenshots[2]['description'] = "View a code with syntax highlighting";
	$screenshots[3]['description'] = "Edit text";
	$screenshots[4]['description'] = "Edit HTML in a WYSIWYG form";
	$screenshots[5]['description'] = "Copy files";
	$screenshots[6]['description'] = "Chmod files";
	$screenshots[7]['description'] = "Upload files";
	$screenshots[8]['description'] = "Email files in a Zip attachment";
	$screenshots[9]['description'] = "Bookmark any page";
	$screenshots[10]['description'] = "Help guide";

	echo "<div class=\"header21\">Screenshots</div>\n";

	echo "Click on any image to enlarge it.<br /><br />\n";

	echo "<table cellspacing=\"10\" style=\"padding: 10px;\">\n";

	for ($i=1; $i<=sizeof($screenshots); $i=$i+2) {
		$j = $i+1;
		echo "<tr>\n";
		echo "<td valign=\"top\"><a href=\"" . $client_imagesdir . "/" . $screenshots[$i]['image'] . ".jpg\" target=\"_blank\" alt=\"Screenshot\" title=\"Click to view a larger picture in a new window\"><img src=\"" . $client_imagesdir . "/" . $screenshots[$i]['image'] . "-mini.jpg\" border=\"2\"></a><br />" . $screenshots[$i]['description'] . "</td>\n";
		echo "<td valign=\"top\"><a href=\"" . $client_imagesdir . "/" . $screenshots[$j]['image'] . ".jpg\" target=\"_blank\" alt=\"Screenshot\" title=\"Click to view a larger picture in a new window\"><img src=\"" . $client_imagesdir . "/" . $screenshots[$j]['image'] . "-mini.jpg\" border=\"2\"></a><br />" . $screenshots[$j]['description'] . "</td>\n";
		echo "</tr>\n";
	}

	echo "</table>\n";

} // End function homepage_screenshots

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_features() {

// --------------
// This function prints screenshots
// --------------

	echo "<div class=\"header21\">User features</div>\n";
	echo "<ul>\n";
	echo "<li> Navigate the FTP server. Once you have logged in, you can browse from directory to directory and see all the subdirectories and files.</li>\n";
	echo "<li> Upload files. The files are copied from your computer to the FTP server.</li>\n";
	echo "<li> Download files. Click on a filename in the list of files, and a window will pop up to ask you where you want to save it on your computer.</li>\n";
	echo "<li> Upload-and-unzip archives (zip, tar, tgz and gz). This feature is great to upload many files at once (for example if you want to install an application on your web server). This is how it works: specify a Zip file on your computer; the Zip file is transferred to the web server where it is unzipped; the files it contains are transferred to the FTP server.</li>\n";
	echo "<li> Zip files and directories. You can download the zip, email it, or save it on the FTP server.</li>\n";
	echo "<li> Copy, move and delete directories and files. Directories are handled recursively, meaning that their content (subdirectories and files) will also be copied, moved or deleted.</li>\n";
	echo "<li> Copy or move directories and files directly to a second FTP server.</li>\n";
	echo "<li> Rename and chmod directories and files.</li>\n";
	echo "<li> View code with syntax highlighting. PHP functions are linked to the documentation on php.net.</li>\n";
	echo "<li> Edit text right from your browser. Every time you save the changes the new file is transferred to the FTP server.</li>\n";
	echo "<li> Edit HTML in a WYSIWYG form. This form was developed by Interactivetools under the BSD license. View a <a href=\"http://www.interactivetools.com/products/htmlarea/index.html#demo\" target=\"_blank\">demo</a> here. For the moment, this form can only be used with Internet Explorer 5.5 or 6, but the next version also supports Mozilla based browsers.</li>\n";
	echo "<li> Search for words or phrases in selected directories and files; filter out files based on the filename, last modification time and filesize. <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
	echo "<li> Calculate the space used by directories and files. <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
	echo "</ul>\n";
	echo "\n";
	echo "<br />\n";
	echo "\n";
	echo "<div class=\"header21\">Administrator features</div>\n";
	echo "<ul>\n";
	echo "<li> net2ftp works under safemode.</li>\n";
	echo "<li> A database(MySQL) is optional; it is only required for logging.</li>\n";
	echo "<li> Security. Allow the users to connect to all FTP servers, or to only a predefined list of FTP servers. The input box on the login page will change accordingly.</li>\n";
	echo "<li> Logging. Activate or deactivate 3 kinds of logging: pages requested, logins and errors.</li>\n";
	echo "<li> Skins. The layout can easily be changed.</li>\n";

} // End function homepage_features

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_install() {

// --------------
// This function prints screenshots
// --------------

	echo "<div class=\"header21\">Installation instructions</div>\n";
	echo "\n";
	echo "<div class=\"header31\">Requirements</div>\n";
	echo "<ul>\n";
	echo "<li> Web server: any web server which can run PHP. The most popular one is <a href=\"http://httpd.apache.org\" target=\"_blank\">Apache</a>.</li>\n";
	echo "<li> <a href=\"http://www.php.net\" target=\"_blank\">PHP</a>: at least version 4.2.3. net2ftp works under <a href=\"http://www.php.net/manual/en/features.safe-mode.php\" target=\"_blank\">Safe Mode</a>.</li>\n";
	echo "<li> Disk space: 1.5 MB for net2ftp, and a few MB for the temporary files.</li>\n";
	echo "</ul>\n";
	echo "\n";
	echo "<div class=\"header31\">Procedure</div>\n";
	echo "<br />\n";
	echo "1 - Unzip all the files on your computer, and upload them to your server.<br /><br />\n";
	echo "2 - The /temp directory should be chmodded to 777 (you can use <a href=\"http://www.net2ftp.com\">net2ftp.com</a> to do this).<br /><br />\n";
	echo "3 - Set your settings in the settings.inc.php file.<br /><br />\n";
	echo "4 - A database is only required if you want to log the actions of the users. To create the tables, execute the SQL queries below (also in the \"create_tables.sql\" file). This can be done easily in <a href=\"http://www.phpmyadmin.net/\" target=\"_blank\">PhpMyAdmin</a>, the popular front-end to MySQL.<br />\n";
	echo "<br />\n";
	echo "<textarea cols=\"70\" rows=\"8\" wrap=\"off\">\n";
	echo "#\n";
	echo "# Table structure for table `net2ftp_logAccess`\n";
	echo "#\n";
	echo "\n";
	echo "CREATE TABLE net2ftp_logAccess (\n";
	echo "  date date NOT NULL default '0000-00-00',\n";
	echo "  time time NOT NULL default '00:00:00',\n";
	echo "  remote_addr text NOT NULL,\n";
	echo "  remote_port text NOT NULL,\n";
	echo "  http_user_agent text NOT NULL,\n";
	echo "  page text NOT NULL,\n";
	echo "  ftpserver text NOT NULL,\n";
	echo "  username text NOT NULL,\n";
	echo "  state text NOT NULL,\n";
	echo "  manage text NOT NULL,\n";
	echo "  directory text NOT NULL,\n";
	echo "  file text NOT NULL,\n";
	echo "  http_referer text NOT NULL\n";
	echo ") TYPE=MyISAM;\n";
	echo "# --------------------------------------------------------\n";
	echo "\n";
	echo "#\n";
	echo "# Table structure for table `net2ftp_logError`\n";
	echo "#\n";
	echo "\n";
	echo "CREATE TABLE net2ftp_logError (\n";
	echo "  date date NOT NULL default '0000-00-00',\n";
	echo "  time time NOT NULL default '00:00:00',\n";
	echo "  ftpserver text NOT NULL,\n";
	echo "  username text NOT NULL,\n";
	echo "  message text NOT NULL,\n";
	echo "  cause text NOT NULL,\n";
	echo "  drilldown text NOT NULL,\n";
	echo "  state text NOT NULL,\n";
	echo "  manage text NOT NULL,\n";
	echo "  directory text NOT NULL,\n";
	echo "  debug1 text NOT NULL,\n";
	echo "  debug2 text NOT NULL,\n";
	echo "  debug3 text NOT NULL,\n";
	echo "  debug4 text NOT NULL,\n";
	echo "  debug5 text NOT NULL,\n";
	echo "  remote_addr text NOT NULL,\n";
	echo "  remote_port text NOT NULL,\n";
	echo "  http_user_agent text NOT NULL\n";
	echo ") TYPE=MyISAM;\n";
	echo "# --------------------------------------------------------\n";
	echo "\n";
	echo "#\n";
	echo "# Table structure for table `net2ftp_logLogin`\n";
	echo "#\n";
	echo "\n";
	echo "CREATE TABLE net2ftp_logLogin (\n";
	echo "  date date NOT NULL default '0000-00-00',\n";
	echo "  time time NOT NULL default '00:00:00',\n";
	echo "  ftpserver text NOT NULL,\n";
	echo "  username text NOT NULL,\n";
	echo "  remote_addr text NOT NULL,\n";
	echo "  remote_port text NOT NULL,\n";
	echo "  http_user_agent text NOT NULL\n";
	echo ") TYPE=MyISAM;\n";
	echo "</textarea><br />\n";
	echo "\n";
	echo "<br /><br />\n";
	echo "\n";
	echo "<div class=\"header31\">Next steps</div>\n";
	echo "<ul>\n";
	echo "<li>Set authorizations in settings_authorizations.inc.php:\n";
	echo "	<ul>\n";
	echo "	<li>Allow the users to connect to any FTP server, or only to a restricted list of FTP servers</li>\n";
	echo "	<li>Ban certain FTP servers</li>\n";
	echo "	<li>Ban certain IP addresses; users connecting from these addresses will not be able to use the website</li>\n";
	echo "	<li>Allow the users to connect to any FTP server port, or only to one port</li>\n";
	echo "	<li>Set the default login directory -- this is not restrictive, users can get out of it</li>\n";
	echo "	<li>Set the default root directory per user -- this is restrictive, users cannot get out of it when they are using net2ftp. However, this is not a secure method of restricting the access; it is much safer to set this on the FTP server itself</li>\n";
	echo "	</ul>\n";
	echo "</li>\n";
	echo "<li>To allow large file uploads and transfers, you may have to change these settings:\n";
	echo "	<ul>\n";
	echo "	<li>in the file php.ini (directory C:\windows or /etc): upload_max_filesize, post_max_size, max_execution_time, memory_limit</li>\n";
	echo "	<li>in the file php.conf (directory /etc/httpd/conf.d): LimitRequestBody</li>\n";
	echo "	</ul>\n";
	echo "</li>\n";
	echo "<li>Protect the /temp and the /admin directories. If you use the Apache web server, use .htaccess and .htpasswd files to do this -- sample files are provided (username admin, password net2ftp).\n";
	echo "	<ul>\n";
	echo "	<li>.htaccess file: set the path to the .htpasswd file</li>\n";
	echo "	<li>.htpasswd file: enter a list of usernames and encrypted passwords (the admin panel can be used to generate encrypted passwords)</li>\n";
	echo "	</ul>\n";
	echo "</li>\n";
	echo "<li>In your php.ini file, register_globals can be set to \"off\" (this is more secure), but the application will off course also work if it is set to \"on\".</li>\n";
	echo "<li>The files are transmitted using the BINARY mode by default. There is a list of file extensions (txt, php, ...) which are transmitted in ASCII mode. Edit this list if needed, it is located in /includes/filesystem.inc.php. Look for function ftpAsciiBinary.</li>\n";
	echo "</ul>\n";
	echo "\n";
	echo "<br /><br />\n";
	echo "\n";
	echo "<div class=\"header31\">NOTE: IF YOUR WEB SERVER RUNS ON WINDOWS</div>\n";
	echo "If you can log in but you cannot see any directory or file in the Browse Screen, then it is probably caused by a filesystem permission problem on your web server.<br /><br />\n";
	echo "\n";
	echo "<u>Quote from the PHP bug report database:</u><br />\n";
	echo "<i>\n";
	echo "ftp_rawlist requires write permissions to the system's tempoarary directory. <br />\n";
	echo "IIS's default installation does not include this in the permissions for IUSR.<br /> \n";
	echo "The bug is in system configuration, not PHP.<br />\n";
	echo "</i><br />\n";
	echo "\n";
	echo "This was discussed in the following PHP bug reports:<br />\n";
	echo "<a href=\"http://bugs.php.net/bug.php?id=8874\"  target=\"_blank\">http://bugs.php.net/bug.php?id=8874</a><br />\n";
	echo "<a href=\"http://bugs.php.net/bug.php?id=13720\" target=\"_blank\">http://bugs.php.net/bug.php?id=13720</a><br />\n";
	echo "<a href=\"http://bugs.php.net/bug.php?id=16057\" target=\"_blank\">http://bugs.php.net/bug.php?id=16057</a><br /><br />\n";
	echo "\n";
	echo "<div class=\"header31\">NOTE: IF YOUR FTP SERVER IS THE IIS FTP SERVER</div>\n";
	echo "In the FTP server's configuration, set it for UNIX style directory listings rather than MSDOS style listings.\n";
	echo "\n";
	echo "<br /><br />\n";
	echo "\n";
	echo "<div class=\"header21\">Known bugs and limitations</div>\n";
	echo "\n";
	echo "<ul>\n";
	echo "\n";
	echo "<li> Symlinks are not yet handled well. \n";
	echo "Currently, they are displayed on the Browse Screen, but you can't do anything with it except clicking on the name.\n";
	echo "If the symlink points to a directory, you will be directed to that directory -- but if it points to a file, net2ftp will redirect you to the root directory of the FTP server instead of downloading the file...\n";
	echo "</li>\n";
	echo "\n";
	echo "<li> The root directory authorizations can currently only be set per user -- not per user and FTP server.\n";
	echo "This limitation will be solved in one of the next versions.\n";
	echo "</li>\n";
	echo "\n";
	echo "</ul>\n";

} // End function homepage_install

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_download() {

// --------------
// This function prints screenshots
// --------------


	echo "<div class=\"header21\">Current version</div>";
	echo "Version 0.80 released on March 14, 2004.<br />\n";
	echo "Changes: <a href=\"download/_CHANGES_v0.80.txt\" target=\"_blank\">Changelog</a><br />\n";
	echo "Download from: \n";
	echo " &nbsp; <a href=\"http://www.net2ftp.com/download/net2ftp_v0.80.zip\">net2ftp.com</a>\n";
	echo " &nbsp; <a href=\"http://julie.nfrance.com/~ju30490/download/net2ftp_v0.80.zip\">net2ftp.com mirror</a>\n";
	echo "(320 kB)<br /><br />\n";

	echo "<div class=\"header21\">Previous versions</div>";
	echo "<table border=\"0\" cellspacing=\"2\" style=\"margin-left: 50px; padding: 2px;\">\n";
	echo "<tr><td>Version 0.73</td>         <td><a href=\"download/net2ftp_v0.73.zip\">Download</a> 463 kB</td> <td><a href=\"download/_CHANGES_v0.73.txt\" target=\"_blank\">Changelog</a></td>  <td><a href=\"download/_TODO_v0.73.txt\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.72</td>         <td><a href=\"download/net2ftp_v0.72.zip\">Download</a> 463 kB</td> <td><a href=\"download/_CHANGES_v0.72.txt\" target=\"_blank\">Changelog</a></td>  <td><a href=\"download/_TODO_v0.72.txt\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.71</td>         <td><a href=\"download/net2ftp_v0.71.zip\">Download</a> 455 kB</td> <td><a href=\"download/_CHANGES_v0.71.txt\" target=\"_blank\">Changelog</a></td>  <td><a href=\"download/_TODO_v0.71.txt\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.7</td>          <td><a href=\"download/net2ftp_v0.7.zip\">Download</a> 455 kB</td>  <td><a href=\"download/_CHANGES_v0.7.txt\" target=\"_blank\">Changelog</a></td>   <td><a href=\"download/_TODO_v0.7.txt\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.62</td>         <td><a href=\"download/net2ftp_v0.62.zip\">Download</a> 135 kB</td> <td><a href=\"download/_CHANGES_v0.62\" target=\"_blank\">Changelog</a></td>      <td><a href=\"download/_TODO_v0.62\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.61</td>         <td><a href=\"download/net2ftp_v0.61.zip\">Download</a> 135 kB</td> <td><a href=\"download/_CHANGES_v0.61\" target=\"_blank\">Changelog</a></td>      <td><a href=\"download/_TODO_v0.61\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.6</td>          <td><a href=\"download/net2ftp_v0.6.zip\">Download</a> 135 kB</td>  <td><a href=\"download/_CHANGES_v0.6\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.6\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.5</td>          <td><a href=\"download/net2ftp_v0.5.zip\">Download</a> 66 kB</td>   <td><a href=\"download/_CHANGES_v0.5\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.5\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.4</td>          <td><a href=\"download/net2ftp_v0.4.zip\">Download</a> 66 kB</td>   <td><a href=\"download/_CHANGES_v0.4\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.4\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.3</td>          <td><a href=\"download/net2ftp_v0.3.zip\">Download</a> 65 kB</td>   <td><a href=\"download/_CHANGES_v0.3\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.3\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.2</td>          <td><a href=\"download/net2ftp_v0.2.zip\">Download</a> 62 kB</td>   <td><a href=\"download/_CHANGES_v0.2\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.2\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "<tr><td>Version 0.1</td>          <td><a href=\"download/net2ftp_v0.1.zip\">Download</a> 60 kB</td>   <td><a href=\"download/_CHANGES_v0.1\" target=\"_blank\">Changelog</a></td>       <td><a href=\"download/_TODO_v0.1\" target=\"_blank\">Todo</a></td></tr>\n";
	echo "</table>\n";

} // End function homepage_download

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printMenu($state2) {

// --------------
// This function prints the menu
// --------------

$highlight_begin = "<span style=\"font-weight: bold; font-size: 110%\">";
$highlight_end   = "</span>";


	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 100%; margin: 0px; padding: 0px;\">\n";

// Learn more
// ----------
	echo "<tr>\n";
	echo "<td class=\"menu_header\">Learn more</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class=\"menu_item\">\n";
// Login
	if ($state2 == "login") { echo $highlight_begin . "Home" . $highlight_end . "<br />\n"; }
	else                    { echo "<a href=\"" . printPHP_SELF("no") ."?state=homepage&state2=login\">Home</a><br />\n"; }
// Screenshots
	if ($state2 == "screenshots") { echo $highlight_begin . "Screenshots" . $highlight_end . "<br />\n"; }
	else                          { echo "<a href=\"" . printPHP_SELF("no") ."?state=homepage&state2=screenshots\">Screenshots</a><br />\n"; }
// Features
	if ($state2 == "features") { echo $highlight_begin . "Features" . $highlight_end . "<br />\n"; }
	else                       { echo "<a href=\"" . printPHP_SELF("no") ."?state=homepage&state2=features\">Features</a><br />\n"; }
	echo "</td>\n";
	echo "</tr>\n";

// Community
// ---------
	echo "<tr>\n";
	echo "<td class=\"menu_header\">Community</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class=\"menu_item\">\n";
	echo "<a href=\"http://www.net2ftp.org/forums\">Forums</a><br />\n";
	echo "</td>\n";
	echo "</tr>\n";

// Download and Install
// --------------------
	echo "<tr>\n";
	echo "<td class=\"menu_header\">Download and Install</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class=\"menu_item\">\n";
// Download
	$directdownload_stable = "<a href=\"http://www.net2ftp.com/download/net2ftp_v0.80.zip\" style=\"font-size: 70%\">Stable 0.80</a>";
//	$directdownload_beta   = "<a href=\"http://www.net2ftp.org/net2ftp_v0.81_beta1.zip\" style=\"font-size: 70%\">Beta 0.81</a>";

	if ($state2 == "download")     { echo $highlight_begin . "Download" . $highlight_end . "<br />\n"; }
	else                           { echo "<a href=\"" . printPHP_SELF("no") ."?state=homepage&state2=download\">Download</a> $directdownload_stable $directdownload_beta \n"; }
// Install
	if ($state2 == "help_install") { echo $highlight_begin . "Installation instructions" . $highlight_end . "<br />\n"; }
	else                           { echo "<a href=\"" . printPHP_SELF("no") ."?state=homepage&state2=help_install\">Installation instructions</a><br />\n"; }
	echo "</td>\n";
	echo "</tr>\n";

// Help
// ----
	echo "<tr>\n";
	echo "<td class=\"menu_header\">Help</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class=\"menu_item\">\n";
	echo "<a href=\"help.html\" target=\"_blank\">Help guide</a><br />\n";
	echo "<a href=\"http://www.net2ftp.org/forums\">Ask a question</a><br />\n";
	echo "</td>\n";
	echo "</tr>\n";

	echo "</table>\n";

} // End printMenu

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printAnnouncements() {

// --------------
// This function prints the announcements
// --------------

	echo "<u>March 14, 2004</u><br /> Version 0.80 released: new version with major enhancements<br /><br />\n";
	echo "<u>September 29, 2003</u><br /> Version 0.73 released: minor bugfixes and improvements<br /><br />\n";

} // End printAnnouncements

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printVotingButton($site) {

// --------------
// This function prints the voting buttons (hotscripts, scriptsearch)
// --------------

	if ($site == "hotscripts") {

		echo "<!-- ----- Start Hotscripts ----- -->\n";
		echo "<form action=\"http://www.hotscripts.com/cgi-bin/rate.cgi\" method=\"POST\" target=\"_blank\">\n";
		echo "<input type=\"hidden\" name=\"ID\" value=\"20386\">\n";
		echo "<table BORDER=\"0\" CELLSPACING=\"0\" bgcolor=\"#000000\" width=\"400px;\">\n";
		echo "	<tr>\n";
		echo "		<td>\n";
		echo "			<table border=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#EFEFEF\" cellpadding=\"3\">\n";
		echo "				<tr>\n";
		echo "					<td align=\"center\">\n";
		echo "						<font face=\"arial, verdana\" size=\"2\">\n";
		echo "						<b>Rate <b>net2ftp</b> @ <a href=\"http://www.hotscripts.com/Detailed/20386.html\">HotScripts.com</a></b>\n";
		echo "						</font>\n";
		echo "					</td>\n";
		echo "					<td align=\"center\">\n";
		echo "						<select name=\"ex_rate\" size=\"1\">\n";
		echo "						<option>Select</option>\n";
		echo "						<option value=\"5\" selected>Excellent!</option>\n";
		echo "						<option value=\"4\">Very Good</option>\n";
		echo "						<option value=\"3\">Good</option>\n";
		echo "						<option value=\"2\">Fair</option>\n";
		echo "						<option value=\"1\">Poor</option>\n";
		echo "						</select>\n";
		echo "					</td>\n";
		echo "					<td align=\"center\">\n";
		echo "						<input type=\"submit\" value=\"Go!\">\n";
		echo "					</td>\n";
		echo "				</tr>\n";
		echo "			</table>\n";
		echo "		</td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
		echo "<!-- ----- End Hotscripts ----- -->\n";

	}
	elseif ($site == "scriptsearch") {
		echo "<!-- ----- Start Scriptsearch ----- -->\n";
		echo "<form action=\"http://www.scriptsearch.com/cgi-bin/rateit.cgi\" method=\"POST\" target=\"_blank\">\n";
		echo "<input type=\"hidden\" name=\"ID\" value=\"7563\">\n";
		echo "<table BORDER=\"0\" CELLSPACING=\"0\" bgcolor=\"#000000\" width=\"400px;\">\n";
		echo "	<tr>\n";
		echo "		<td>\n";
		echo "			<table border=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#EFEFEF\" cellpadding=\"3\">\n";
		echo "				<tr>\n";
		echo "					<td align=\"center\">\n";
		echo "						<font face=\"arial, verdana\" size=\"2\">\n";
		echo "						<b>Rate <b>net2ftp</b> @ <a href=\"http://www.scriptsearch.com/details/7563.html\">ScriptSearch.com</a></b>\n";
		echo "						</font>\n";
		echo "					</td>\n";
		echo "					<td align=\"center\">\n";
		echo "						<select name=\"rate\" size=\"1\">\n";
		echo "						<option>Select</option>\n";
		echo "						<option value=\"5\" selected>Excellent!</option>\n";
		echo "						<option value=\"4\">Very Good</option>\n";
		echo "						<option value=\"3\">Good</option>\n";
		echo "						<option value=\"2\">Fair</option>\n";
		echo "						<option value=\"1\">Poor</option>\n";
		echo "						</select>\n";
		echo "					</td>\n";
		echo "					<td align=\"center\">\n";
		echo "						<input type=\"submit\" value=\"Go!\">\n";
		echo "					</td>\n";
		echo "				</tr>\n";
		echo "			</table>\n";
		echo "		</td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
		echo "<!-- ----- End Scriptsearch ----- -->\n";

	}
	else {
		echo "Site $site unknown.";
	}

} // End printVotingButton

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// ************************************************************************************** 
// ************************************************************************************** 
// **                                                                                  ** 
// **                                                                                  ** 

function printDescription() {

// -------------- 
// This function prints the description of the service offered
// -------------- 

	echo "<div style=\"font-size: 120%; font-weight: bold;\">net2ftp - a web based FTP client</div>\n";
	echo "Once you are logged in, you will be able to: \n";
	echo "<ul>\n";
	echo "<li> navigate the FTP server</li>\n";
	echo "<li> upload download</li>\n";
	echo "<li> copy move delete rename chmod</li>\n";
	echo "<li> copy/move to a 2nd FTP server</li>\n";
	echo "<li> view code with syntax highlighting</li>\n";
	echo "<li> edit text files</li>\n";
	echo "<li> edit text in WYSIWYG form (IE only)</li>\n";
	echo "<li> zip-and-download</li>\n";
	echo "<li> upload-and-unzip</li>\n";
	echo "<li> email files <span style=\"font-size: 80%; color: red;\">new</span></li>\n";
	echo "</ul>\n";

} // End function printDescription

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function homepage_logout($state2) {

// --------------
// This function prints the logout page
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$net2ftpdotcom = getSetting("net2ftpdotcom");
	global $application_tempdir;

// -------------------------------------------------------------------------
// Delete all temporary files in the /temp folder which are older than 3 days
// -------------------------------------------------------------------------
	$max_age = 3;

	if ($handle = @opendir($application_tempdir)) {
		while (false !== ($file = readdir($handle))) { 
			if ($file != "." && $file != ".." && $file != ".htaccess" && $file != ".htpasswd" && $file != "chmod_this_dir_to_777.txt" && $file != "index.php") { 
				$dirfile = glueDirectories($application_tempdir, $file);
				$age_in_days = (time() - @filemtime($dirfile)) / 86400;
				if ($age_in_days > $max_age) { @unlink($dirfile); }
			}		
		}
		closedir($handle); 
	}

// -------------------------------------------------------------------------
// Logout text
// -------------------------------------------------------------------------
	echo "<div style=\"border: 1px solid black; background-color: #DDDDDD; margin-top: 50px; margin-left: 100px; margin-right: 100px; padding: 10px;\">\n";
	echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\"><tr><td>\n";

	echo "You have logged out from the FTP server. To log back in, <a href=\"index.php\">follow this link</a>.<br /><br />\n";

	echo "Note: other users of this computer could click on the browser's Back button and access the FTP server.\n";
	echo "To prevent this, you must close all browser windows and exit the browser application.<br /><br />\n";

	echo "<div style=\"text-align: center;\"><input type=\"button\" onClick=\"javascipt:window.close();\" value=\"Close\" title=\"Click here to close this window\"></div>\n";

	echo "</td></tr></table>\n";
	echo "</div><br /><br />\n";

// Webhost table
/* -----------------------------------------------------------------------------------------
	if ($net2ftpdotcom == "yes") {
		echo "<div style=\"text-align: center;\">\n";
		echo "If you're looking for a good webhost, here are some we recommend:\n";
		echo "</div><br />\n";

		echo "<table border=\"1\" bordercolor=\"#000000\" cellspacing=\"0\" cellpadding=\"2\" style=\"text-align: center; margin-left: 20px; margin-right: 20px; font-size: 80%;\">\n";
		echo "	<tr style=\"font-weight: bold; background-color: #DDDDDD; text-align: center;\">\n";
		echo "		<td width=\"150px\">Webhost</td>\n";
		echo "		<td>Yearly fee <span style=\"font-size: 80%\">VAT included</span></td>\n";
		echo "		<td>Setup fee <span style=\"font-size: 80%\">VAT included</span></td>\n";
		echo "		<td>Space</td>\n";
		echo "		<td>Traffic</td>\n";
		echo "		<td>Support</td>\n";
		echo "		<td>Note</td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><a href=\"http://www.discount-hosting.com\">Discount-Hosting</a></td>\n";
		echo "		<td>15 USD</td>\n";
		echo "		<td>None</td>\n";
		echo "		<td>50 MB</td>\n";
		echo "		<td>5000 MB per month</td>\n";
		echo "		<td><a href=\"http://forum.discount-hosting.com\">forum in English</a></td>\n";
		echo "		<td>Good service for a low price.</td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><a href=\"http://www.les-basics-nfrance.com\">Les Basics Nfrance</a></td>\n";
		echo "		<td>22 EUR</td>\n";
		echo "		<td>6 EUR</td>\n";
		echo "		<td>45 MB</td>\n";
		echo "		<td>No limit as long as you don't overload the servers</td>\n";
		echo "		<td><a href=\"http://forum.les-basics-nfrance.com\">forum in French</a></td>\n";
		echo "		<td>Large developer community, check out the support forum if you understand French</td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
	}
----------------------------------------------------------------------------------------- */

} // End function homepage_logout

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// ************************************************************************************** 
// ************************************************************************************** 
// **                                                                                  ** 
// **                                                                                  ** 

function printTermsOfUse() {

// -------------- 
// This function prints the terms of use
// -------------- 



// ------------------------------------------------------------------------- 
// Globals
// ------------------------------------------------------------------------- 
$email_feedback = getSetting("email_feedback");
$myname = "This website's owner";

echo "<div style=\"text-align: center; margin-top: 20px;\">";
echo "<textarea cols=\"50\" rows=\"4\" readonly>";

// ------------------------------------------------------------------------- 
// Print Terms Of Use
// ------------------------------------------------------------------------- 
echo "Disclaimer For Interactive Services\n\n";

echo "$myname maintains the interactive portion(s) of their Web site as a service free of charge. By using any interactive services provided herein, you are agreeing to comply with and be bound by the terms, conditions and notices relating to its use.\n\n";

echo "1.  As a condition of your use of this Web site and the interactive services contained therein, you represent and warrant to $myname that you will not use this Web site for any purpose that is unlawful or prohibited by these terms, conditions, and notices.\n\n";

echo "2.  This Web site contains one or more of the following interactive services: bulletin boards, chat areas, news groups, forums, communities and/or other message or communication facilities.  You agree to use such services only to send and receive messages and material that are proper and related to the particular service, area, group, forum, community or other message or communication facility. In addition to any other terms or conditions of use of any bulletin board services, chat areas, news groups, forums, communities and/or other message or communication facilities, you agree that when using one, you will not:\n";
echo "Publish, post, upload, distribute or disseminate any inappropriate, profane, derogatory, defamatory, infringing, improper, obscene, indecent or unlawful topic, name, material or information.\n";
echo "Upload files that contain software or other material protected by intellectual property laws or by rights of privacy of publicity unless you own or control such rights or have received all necessary consents.\n"; 
echo "Upload files that contain viruses, corrupted files, or any other similar software or programs that may damage the operation of another's computer.\n";
echo "Advertise any goods or services for any commercial purpose.\n";
echo "Offer to sell any goods or services for any commercial purpose.\n";
echo "Conduct or forward chain letters or pyramid schemes.\n";
echo "Download for distribution in any manner any file posted by another user of a forum that you know, or reasonably should know, cannot be legally distributed in such manner.\n"; 
echo "Defame, abuse, harass, stalk, threaten or otherwise violate the legal rights (such as rights of privacy and publicity) of others.\n";
echo "Falsify or delete any author attributions, legal or other proper notices, proprietary designations, labels of the origin, source of software or other material contained in a file that is uploaded.\n"; 
echo "Restrict or inhibit any other user from using and enjoying any of the bulletin board services, chat areas, news groups, forums, communities and/or other message or communication facilities.\n\n";

echo "3. $myname has no obligation to monitor the bulletin board services, chat areas, news groups, forums, communities and/or other message or communication facilities. However, $myname reserves the right at all times to disclose any information deemed by $myname necessary to satisfy any applicable law, regulation, legal process or governmental request, or to edit, refuse to post or to remove any information or materials, in whole or in part.\n\n";

echo "4. You acknowledge that communications to or with bulletin board services, chat areas, news groups, forums, communities and/or other message or communication facilities are not private communications, therefore others may read your communications without your knowledge. You should always use caution when providing any personal information about yourself or your children. $myname does not control or endorse the content, messages or information found in any bulletin board services, chat areas, news groups, forums, communities and/or other message or communication facilities and, specifically disclaims any liability with regard to same and any actions resulting from your participation. To the extent that there are moderators, forum managers or hosts, none are authorized $myname spokespersons, and their views do not necessarily reflect those of $myname.\n\n";

echo "5. The information, products, and services included on this Web site may include inaccuracies or typographical errors. Changes are periodically added to the information herein. $myname may make improvements and/or changes in this Web site at any time. Advice received via this Web site should not be relied upon for personal, legal or financial decisions and you should consult an appropriate professional for specific advice tailored to your situation.\n\n";

echo "6. $myname MAKES NO REPRESENTATIONS ABOUT THE SUITABILITY, RELIABILITY, TIMELINESS, AND ACCURACY OF THE INFORMATION, PRODUCTS, AND SERVICES CONTAINED ON THIS WEB SITE FOR ANY PURPOSE. ALL SUCH INFORMATION, PRODUCTS, AND SERVICES ARE PROVIDED \"AS IS\" WITHOUT WARRANTY OF ANY KIND.\n\n";

echo "7. $myname HEREBY DISCLAIMS ALL WARRANTIES AND CONDITIONS WITH REGARD TO THE INFORMATION, PRODUCTS, AND SERVICES CONTAINED ON THIS WEB SITE, INCLUDING ALL IMPLIED WARRANTIES AND CONDITIONS OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT.\n\n";

echo "8. IN NO EVENT SHALL $myname BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, INCIDENTAL, SPECIAL, CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF USE, DATA OR PROFITS, ARISING OUT OF OR IN ANY WAY CONNECTED\n";
echo "WITH THE USE OR PERFORMANCE OF THIS WEB SITE,\n";
echo "WITH THE DELAY OR INABILITY TO USE THIS WEB SITE,\n";  
echo "WITH THE PROVISION OF OR FAILURE TO PROVIDE SERVICES, OR\n";  
echo "FOR ANY INFORMATION, SOFTWARE, PRODUCTS, SERVICES AND RELATED GRAPHICS OBTAINED THROUGH THIS WEB SITE, OR OTHERWISE ARISING OUT OF THE USE OF THIS WEB SITE, WHETHER BASED ON CONTRACT, TORT, STRICT LIABILITY OR OTHERWISE, EVEN IF $myname HAS BEEN ADVISED OF THE POSSIBILITY OF DAMAGES.\n\n"; 

echo "9. DUE TO THE FACT THAT CERTAIN JURISDICTIONS DO NOT PERMIT OR RECOGNIZE AN EXCLUSION OR LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES, THE ABOVE LIMITATION MAY NOT APPLY TO YOU. IF YOU ARE DISSATISFIED WITH ANY PORTION OF THIS WEB SITE, OR WITH ANY OF THESE TERMS OF USE, YOUR SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE USING THIS WEB SITE.\n\n";

echo "10. $myname reserves the right in its sole discretion to deny any user access to this Web site, any interactive service herein, or any portion of this Web site without notice, and the right to change the terms, conditions, and notices under which this Web site is offered.\n\n";

echo "11. This agreement is governed by the laws of the Kingdom of Belgium. You hereby consent to the exclusive jurisdiction and venue of courts of Brussels, Belgium. in all disputes arising out of or relating to the use of this Web site. Use of this Web site is unauthorized in any jurisdiction that does not give effect to all provisions of these terms and conditions, including without limitation this paragraph. You agree that no joint venture, partnership, employment, or agency relationship exists between you and $myname as a result of this agreement or use of this Web site. The performance of this agreement by $myname is subject to existing laws and legal process, and nothing contained in this agreement is in derogation of its right to comply with governmental, court and law enforcement requests or requirements relating to your use of this Web site or information provided to or gathered with respect to such use. If any part of this agreement is determined to be invalid or unenforceable pursuant to applicable law including, but not limited to, the warranty disclaimers and liability limitations set forth above, then the invalid or unenforceable provision will be deemed superseded by a valid, enforceable provision that most closely matches the intent of the original provision and the remainder of the agreement shall continue in effect.\n\n";

echo "12. This agreement constitutes the entire agreement between the user and $myname with respect to this Web site and it supersedes all prior or contemporaneous communications and proposals, whether electronic, oral or written with respect to this Web site. A printed version of this agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. Fictitious names of companies, products, people, characters and/or data mentioned herein are not intended to represent any real individual, company, product or event. Any rights not expressly granted herein are reserved.\n\n";

echo "13. $myname can be reached by email: $email_feedback.\n\n";

echo "14. All contents of this Web site are: Copyright © $myname.\n\n";

echo "</textarea></div>";

} // End printTermsOfUse

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



