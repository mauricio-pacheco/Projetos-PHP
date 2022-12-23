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

function browse($state2, $directory, $FormAndFieldName) {

// --------------
// This function shows the subdirectories and files in a particular directory
// From this page it is possible to go to subdirectories, or view/edit/rename/delete files
// --------------

	printFunctionTags("browse", "begin");

// -------------------------------------------------------------------------
// Check if the directory name contains \' and if it does, print an error message
// Note: these directories cannot be browsed, but can be deleted
// -------------------------------------------------------------------------
	if (strstr($directory, "\'") != false) {
		$resultArray['message'] = "Directories with names containing \' cannot be displayed correctly. They can only be deleted. Please go back and select another subdirectory.<br />";
		printErrorMessage($resultArray, "exit", "");
	}

// -------------------------------------------------------------------------
// Open connection
// -------------------------------------------------------------------------
	if ($state2 == "main") { setStatus_php("Connecting to the FTP server"); }

	$resultArray = ftp_openconnection();
	$conn_id = getResult($resultArray);
	if ($conn_id == false)  { printErrorMessage($resultArray, "exit", ""); }


// -------------------------------------------------------------------------
// Get raw list of directories and files
// Parse the raw list and return a nice list
// -------------------------------------------------------------------------
	if ($state2 == "main") { setStatus_php("Getting the list of directories and files"); }

	$resultArray = ftp_getlist($conn_id, $directory);
	$list_warnings_directory = getResult($resultArray);
	if ($list_warnings_directory == false) { printErrorMessage($resultArray, "exit", ""); }

	$list = $list_warnings_directory[1];
	$warnings = $list_warnings_directory[2];
	$directory = $list_warnings_directory[3];

// -------------------------------------------------------------------------
// Close connection
// -------------------------------------------------------------------------
	ftp_closeconnection($conn_id);


// -------------------------------------------------------------------------
// Depending on the state2 variable, print the list of directories and files
// in the main standard format, or in the popup format
// -------------------------------------------------------------------------
	if ($state2 == "main") {

		setStatus_php("Printing the list of directories and files");

		// Location textbox + buttons
		printLocationActions($directory);

		// Warning message if directory is changed to root directory
		if (strlen($warnings) > 1) { echo "<div class=\"warning-box\"><div class=\"warning-text\">$warnings</div></div>\n"; }

		// Sort the list
		$list = custom_sort($list);

		// Print the list of directories and files
		printdirfilelist($directory, "",    "table_begin");
		printdirfilelist($directory, $list, "directories");
		printdirfilelist($directory, $list, "files");
		printdirfilelist($directory, $list, "symlinks");
		printdirfilelist($directory, $list, "unrecognized");
		printdirfilelist("",         "",    "table_end");
	}
	elseif ($state2 == "popup") {
		printDirectorySelect($directory, $list, $FormAndFieldName);
	}

	printFunctionTags("browse", "end");

} // End function browse

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function ftp_getlist($conn_id, $directory) {

// --------------
// This function connects to the FTP server and returns an array with a list of directories and files.
// One row per directory or file, with rows from index 1 to n
//
// Step 1: send ftp_rawlist request to the FTP server; this returns a string
// Step 2: parse that string and get a first array ($templist)
// Step 3: move the rows to another array, to index 1 to n ($list)
//
// !!!!!!!!!! Used in these functions: browse, ftp_copymovedeletedirectory !!!!!!!!!!
//
// --------------

	printFunctionTags("ftp_getlist", "begin");

// -------------------------------------------------------------------------
// Replace \' by \\' to be able to delete directories with names containing \'
// -------------------------------------------------------------------------
	if (strlen($directory) > 1) { $directory1 = str_replace("\'", "\\\'", $directory); }
	else                        { $directory1 = $directory; }

// -------------------------------------------------------------------------
// Step 1 - Chdir to the directory
// This is to check if the directory exists, but also because otherwise
// the ftp_rawlist does not work on some FTP servers.
// -------------------------------------------------------------------------
	$result1 = @ftp_chdir($conn_id, $directory1);

// If the directory1 is "" then the user can be directed to his home directory
// We don't know which directory it is, so we request it from the FTP server
	if ($result1 == true && $directory1 == "") { $directory = ftp_pwd($conn_id); }

// ----------------------------------------------
// 1.1 - If the first ftp_chdir returns false, try a second time without the leading /
// Some Windows FTP servers do not work when you use a leading /
// ----------------------------------------------
	elseif ($result1 == false) {
		if ($directory1 == "/") { $directory2 = ""; }
		else { $directory2 = stripDirectory($directory1); }

		$result2 = @ftp_chdir($conn_id, $directory2);

// If the directory1 is "" then the user can be directed to his home directory
// We don't know which directory it is, so we request it from the FTP server
		if ($result2 == true && $directory2 == "") { $directory = ftp_pwd($conn_id); }

// ----------------------------------------------
// 1.2 - If the second ftp_chdir also does not work, go to the root directory
// ----------------------------------------------
		if ($result2 == false && $directory != "/") {
			$warnings = "The directory <b>$directory</b> does not exist or could not be selected, so the root directory <b>/</b> is shown instead.";
			$directory = "/";
			$result3 = ftp_chdir($conn_id, "/");

		} // end if result2

	} // end if result1

// -------------------------------------------------------------------------
// Step 2 - Get list of directories and files
// The -a option is used to show the hidden files as well on some FTP servers
// Some servers do not return anything when using -a, so in that case try again without the -a option
// -------------------------------------------------------------------------
	$rawlist = ftp_rawlist($conn_id, "-a");
	if (sizeof($rawlist) <= 1) { $rawlist = ftp_rawlist($conn_id, ""); }


// -------------------------------------------------------------------------
// Step 3 - Parse the raw list to get an array
// -------------------------------------------------------------------------
	for($i=0; $i<count($rawlist); $i++) {
		$templist[$i] = ftp_scanline($rawlist[$i]);
	} // End for

// -------------------------------------------------------------------------
// Step 4 - Move the rows so that
//   1. the array would contain elements from 1 to n
//   2. the list would be sorted directories first, then files, then symlinks, then unrecognized
// -------------------------------------------------------------------------
	$i = 0; // $i is the index of templist and could go from 0 to n+3
	$j = 1; // $j is the index of list and should go from 1 to n  (n being the nr of valid rows)
	$list_directories = array();
	$list_files = array();
	$list_symlinks = array();
	$list_unrecognized = array();

	for ($i=0; $i<count($templist); $i=$i+1) {
		if (is_array($templist[$i]) == true) {
			if     ($templist[$i]['dirorfile'] == "d") { array_push($list_directories, $templist[$i]); }
			elseif ($templist[$i]['dirorfile'] == "-") { array_push($list_files, $templist[$i]); }
			elseif ($templist[$i]['dirorfile'] == "l") { array_push($list_symlinks, $templist[$i]); }
			elseif ($templist[$i]['dirorfile'] == "u") { array_push($list_unrecognized, $templist[$i]); }
		}
	}
	for ($i=0; $i<count($list_directories); $i=$i+1)  { $list[$j] = $list_directories[$i]; $j=$j+1; }
	for ($i=0; $i<count($list_files); $i=$i+1)        { $list[$j] = $list_files[$i]; $j=$j+1; }
	for ($i=0; $i<count($list_symlinks); $i=$i+1)     { $list[$j] = $list_symlinks[$i]; $j=$j+1; }
	for ($i=0; $i<count($list_unrecognized); $i=$i+1) { $list[$j] = $list_unrecognized[$i]; $j=$j+1; }

// -------------------------------------------------------------------------
// Step 5 - Return the result
// -------------------------------------------------------------------------
	$list_warnings_directory[1] = $list;
	$list_warnings_directory[2] = $warnings;
	$list_warnings_directory[3] = $directory;

	printFunctionTags("ftp_getlist", "end");

	return putResult(true, $list_warnings_directory, "", "", "");




// -------------------------------------------------------------------------
// Some documentation:
// 1 - Some FTP servers return a total on the first line
// 2 - Some FTP servers return . and .. in their list of directories
// ftp_scanline does not return those entries.
// -------------------------------------------------------------------------


// 1 - After doing some tests on different public FTP servers, it appears that
// they reply differently to the ftp_rawlist request:
//      - some FTP servers, like ftp.belnet.be, start with a line summarizing how
//        many subdirectories and files there are in the current directory. The
//        real list of subdirectories and files starts on the second line.
//               [0] => total 15
//               [1] => drwxr-xr-x 11 BELNET Archive 512 Feb 6 2000 BELNET
//               [2] => drwxr-xr-x 2 BELNET Archive 512 Oct 29 2001 FVD-SFI
//      - some other FTP servers, like ftp.redhat.com/pub, start directly with the
//        list of subdirectories and files.
//               [0] => drwxr-xr-x 9 ftp ftp 4096 Jan 11 06:34 contrib
//               [1] => drwxr-xr-x 13 ftp ftp 4096 Jan 29 21:59 redhat
//               [2] => drwxrwsr-x 6 ftp ftp 4096 Jun 05 2002 up2date


// 2 - Some FTP servers return "." and ".." as directories. These fake entries
// have to be eliminated!
// They would cause infinite loops in the copy/move/delete functions.
//               [0] => drwxr-xr-x 5 80 www 512 Apr 10 09:39 .
//               [1] => drwxr-xr-x 16 80 www 512 Apr 9 08:51 ..
//               [2] => -rw-r--r-- 1 80 www 5647 Apr 9 08:12 _CHANGES_v0.5
//               [3] => -rw-r--r-- 1 80 www 1239 Apr 9 08:12 _CREDITS_v0.5


} // End function ftp_getlist

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function ftp_scanline($rawlistline) {

// --------------
// This function scans an ftp_rawlist line string and returns its parts (directory/file, name, size,...) using ereg()
//
//  !!! Documentation about ereg and FTP server's outputs are now at the end of the function !!!
// --------------

// -------------------------------------------------------------------------
// Scanning:
//   1. first scan with strict rules
//   2. if that does not match, scan with less strict rules
//   3. if that does not match, scan with rules for specific FTP servers (AS400)
//   4. and if that does not match, return the raw line
// -------------------------------------------------------------------------


// ----------------------------------------------
// 1. Strict rules
// ----------------------------------------------
	    if (ereg("([-dl])([rwxst-]{9})[ ]+([0-9]+)[ ]+([^ ]+)[ ]+(.+)[ ]+([0-9]+)[ ]+([a-zA-Z]+[ ]+[0-9]+)[ ]+([0-9:]+)[ ]+(.*)", $rawlistline, $regs) == true) {
//                  permissions             number      owner      group     size         month        day        year/hour    filename
		$listline['scanrule']    = "rule-1";
		$listline['dirorfile']   = "$regs[1]";		// Directory ==> d, File ==> -
		$listline['dirfilename'] = "$regs[9]";		// Filename
		$listline['size']        = "$regs[6]";		// Size
		$listline['owner']       = "$regs[4]";		// Owner
		$listline['group']       = "$regs[5]";		// Group
		$listline['permissions'] = "$regs[2]";		// Permissions
		$listline['mtime']       = "$regs[7] $regs[8]";	// Mtime -- format depends on what FTP server returns (year, month, day, hour, minutes... see above)
	}

// ----------------------------------------------
// 2. Less strict rules
// ----------------------------------------------
	elseif (ereg("([-dl])([rwxst-]{9})[ ]+(.*)[ ]+([a-zA-Z0-9 ]+)[ ]+([0-9:]+)[ ]+(.*)", $rawlistline, $regs) == true) {
//                  permissions             number/owner/group/size
//                                                  month-day          year/hour    filename
		$listline['scanrule']    = "rule-2";
		$listline['dirorfile']   = "$regs[1]";		// Directory ==> d, File ==> -
		$listline['dirfilename'] = "$regs[6]";		// Filename
		$listline['size']        = "$regs[3]";		// Number/Owner/Group/Size
		$listline['permissions'] = "$regs[2]";		// Permissions
		$listline['mtime']       = "$regs[4] $regs[5]";	// Mtime -- format depends on what FTP server returns (year, month, day, hour, minutes... see above)
	}

// ----------------------------------------------
// 3. Specific FTP server rules
// ----------------------------------------------

// ---------------
// 3.1 Windows
// ---------------
	elseif (ereg("([0-9/-]+)[ ]+([0-9:AMP]+)[ ]+([0-9]*)[ ]+(.*)", $rawlistline, $regs) == true) {
//                  date          time            size        filename

		$listline['scanrule']    = "rule-3.1";
		$listline['size']        = "$regs[3]";		// Size
		$listline['dirfilename'] = "$regs[4]";		// Filename
		$listline['owner']       = "";			// Owner
		$listline['group']       = "";			// Group
		$listline['permissions'] = "";			// Permissions
		$listline['mtime']       = "$regs[1] $regs[2]";	// Mtime -- format depends on what FTP server returns (year, month, day, hour, minutes... see above)

		if ($listline['size'] != "") { $listline['dirorfile'] = "-"; }
		else                         { $listline['dirorfile'] = "d"; }
	}

// ---------------
// 3.2 AS400
// ---------------
	elseif (ereg("([a-zA-Z0-9_-]+)[ ]+([0-9]+)[ ]+([0-9/-]+)[ ]+([0-9:]+)[ ]+([a-zA-Z0-9_ -\*]+)[ /]+([^/]+)", $rawlistline, $regs) == true) {
//                  owner               size        date          time          type                     filename

		if ($regs[5] != "*STMF") { $directory_or_file = "d"; }
		elseif ($regs[5] == "*STMF") { $directory_or_file = "-"; }

		$listline['scanrule']    = "rule-3.2";
		$listline['dirorfile']   = "$directory_or_file";// Directory ==> d, File ==> -
		$listline['dirfilename'] = "$regs[6]";		// Filename
		$listline['size']        = "$regs[2]";		// Size
		$listline['owner']       = "$regs[1]";		// Owner
		$listline['group']       = "";			// Group
		$listline['permissions'] = "";			// Permissions
		$listline['mtime']       = "$regs[3] $regs[4]";	// Mtime -- format depends on what FTP server returns (year, month, day, hour, minutes... see above)
	}

// ----------------------------------------------
// 4. If nothing matchs, return the raw line
// ----------------------------------------------
	else {
		$listline['scanrule']    = "rule-4";
		$listline['dirorfile']   = "u";
		$listline['dirfilename'] = $rawlistline;
	}

// -------------------------------------------------------------------------
// Remove the . and .. entries
// -------------------------------------------------------------------------
	if ($listline['dirfilename'] == "." || $listline['dirfilename'] == "..") { return ""; }


// -------------------------------------------------------------------------
// And finally... return the nice list!
// -------------------------------------------------------------------------
	return $listline;






// -------------------------------------------------------------------------
// Documentation
// -------------------------------------------------------------------------


// ----------------------------------------------
// ereg() function
// ----------------------------------------------

/*

mholdgate@wakefield.co.uk
11-Jan-2002 11:51

^                Start of String
$                End of string

n*               Zero or more of 'n'
n+               One or more of 'n'
n?               A possible 'n'

n{2}             Exactly two of 'n'
n{2,}            At least 2 or more of 'n'
n{2,4}           From 2 to 4 of 'n'

()               Parenthesis to group expressions
(n|a)            Either 'n' or 'a'

.                Any single character

[1-6]            A number between 1 and 6
[c-h]            A lower case character between c and h
[D-M]            An upper case character between D and M
[^a-z]           Absence of lower case a to z
[_a-zA-Z]        An underscore or any letter of the alphabet

^.{2}[a-z]{1,2}_?[0-9]*([1-6]|[a-f])[^1-9]{2}a+$

A string beginning with any two characters
Followed by either 1 or 2 lower case alphabet letters
Followed by an optional underscore
Followed by zero or more digits
Followed by either a number between 1 and 6 or a character between a and f (Lowercase)
Followed by a two characters which are not digits between 1 and 9
Followed by one or more n characters at the end of a string

// $regs can contain a maximum of 10 elements !! (regs[0] to regs[9])
// To specify what you really want back from ereg, use (). Only what is within () will be returned. See below.

*/

// ----------------------------------------------
// Sample FTP server's output
// ----------------------------------------------

// ---------------
// 1. "Standard" FTP servers output
// ---------------
// ftp.redhat.com
//drwxr-xr-x    6 0        0            4096 Aug 21  2001 pub (one or more spaces between entries)
//
// ftp.suse.com
//drwxr-xr-x   2 root     root         4096 Jan  9  2001 bin
//-rw-r--r--    1 suse     susewww       664 May 23 16:24 README.txt
//
// ftp.belnet.be
//-rw-r--r--   1 BELNET   Mirror        162 Aug  6  2000 HEADER.html
//drwxr-xr-x  53 BELNET   Archive      2048 Nov 13 12:03 mirror
//
// ftp.microsoft.com
//-r-xr-xr-x   1 owner    group               0 Nov 27  2000 dirmap.htm
//
// ftp.sourceforge.net
//-rw-r--r--   1 root     staff    29136068 Apr 21 22:07 ls-lR.gz
//
// ftp.nec.com
//dr-xr-xr-x  12 other        512 Apr  3  2002 pub
//
// ftp.intel.com
//drwxr-sr-x   11 root     ftp          4096 Sep 23 16:36 pub

// ---------------
// 3.1 AS400
// ---------------
// RGOVINDAN 932 03/29/01 14:59:53 *STMF /cert.txt
// QSYS 77824 12/17/01 15:33:14 *DIR /QOpenSys/
// QDOC 24576 12/31/69 20:00:00 *FLR /QDLS/
// QSYS 12832768 04/14/03 16:47:25 *LIB /QSYS.LIB/
// QDFTOWN 2147483647 12/31/69 20:00:00 *DDIR /QOPT/
// QSYS 2144 04/12/03 12:49:00 *DDIR /QFileSvr.400/
// QDFTOWN 1136 04/12/03 12:49:01 *DDIR /QNTC/


} // End function ftp_scanline

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printdirfilelist($directory, $list, $print_what) {

// --------------
// This function uses an array of directories or files to print a nice looking page ;-)
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftp_skin, $net2ftp_viewmode, $net2ftp_sort, $net2ftp_sortorder;
	global $rowcounter;
	global $browser_agent;

	$show_beta = getSetting("show_beta");
	$show_icons = getSetting("show_icons");

	$browse_heading_fontcolor   = getSkinColors("heading_fontcolor");
	$browse_heading_bgcolor     = getSkinColors("heading_bgcolor");
	$browse_rows_fontcolor_odd  = getSkinColors("rows_fontcolor_odd");
	$browse_rows_bgcolor_odd    = getSkinColors("rows_bgcolor_odd");
	$browse_rows_fontcolor_even = getSkinColors("rows_fontcolor_even");
	$browse_rows_bgcolor_even   = getSkinColors("rows_bgcolor_even");
	$browse_cursor_fontcolor    = getSkinColors("cursor_fontcolor");
	$browse_cursor_bgcolor      = getSkinColors("cursor_bgcolor");
	$browse_border_color        = getSkinColors("border_color");
	$browse_selected_bgcolor    = getSkinColors("selected_bgcolor");

	if (strlen($directory)>0) { $printdirectory = $directory; }
	else                      { $printdirectory = "/"; }

	printFunctionTags("printdirfilelist", "begin");

// -------------------------------------------------------------------------
// Calculate the column span of the directories and files
// -------------------------------------------------------------------------
// UPDATEFILE
		if ($show_beta == "yes") { $total_colspan = 13; }
		else                   { $total_colspan = 12; }


// Replace ' by \' in $directory and $dirfilename to avoid javascript errors if
// these variables contain single quotes (they may not contain double quotes).
	$directory_js   = javascriptEncode($directory);
//	$dirfilename_js = javascriptEncode($dirfilename);  ==> See the FOR loop. At this point, dirfilename does not contain any value yet


// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------
// ------------------------------- Table begin -------------------------------------
// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------

	if ($print_what == "table_begin") {
// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------
		echo "<form name=\"BrowseForm\" id=\"BrowseForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"browse\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"main\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"entry\" />\n";


// -------------------------------------------------------------------------
// Javascript
// -------------------------------------------------------------------------
		echo "<script type=\"text/javascript\"><!--\n";

		echo "function submitBrowseForm(directory, entry, state, state2) {\n";
		echo "	document.BrowseForm.state.value=state;\n";
		echo "	document.BrowseForm.state2.value=state2;\n";
		echo "	document.BrowseForm.directory.value=directory;\n";
		echo "	document.BrowseForm.entry.value=entry;\n";
		echo "	document.BrowseForm.submit();\n";
		echo "}\n"; // End javascript function submitBrowseForm

		echo "function do_sort(sort, sortorder) {\n";
		echo "	document.BrowseForm.net2ftp_sort.value=sort;\n";
		echo "	document.BrowseForm.net2ftp_sortorder.value=sortorder;\n";
		echo "	document.BrowseForm.submit();\n";
		echo "}\n"; // End javascript function do_sort

		echo "//--></script>\n";


// -------------------------------------------------------------------------
// Table
// -------------------------------------------------------------------------
		echo "<table align=\"center\" class=\"browse_table\">\n";

// Row: action buttons
		echo "<tr class=\"browse_rows_actions\">\n";
		echo "<td colspan=\"" . $total_colspan . "\">\n";
		echo "<table style=\"width: 100%;\"><tr><td valign=\"top\" style=\"text-align: left;\">\n";
// Left
		echo "<input type=\"button\" class=\"smallbutton\" value=\"New dir\"  onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'newdirectory');\" title=\"Make a new subdirectory in directory $printdirectory\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"New file\" onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'newfile');\"      title=\"Create a new file in directory $printdirectory\"/>\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Upload\"   onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'uploadfile');\"   title=\"Upload new files in directory $printdirectory\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Advanced\" onClick=\"submitBrowseForm('$directory_js', '', 'advanced', 'main');\"       title=\"Go to the advanced functions\" />\n";

// Right
		echo "</td><td valign=\"top\" style=\"text-align: right;\">\n";
		echo "Transform selected entries: ";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Copy\"     onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'copy');\"          title=\"Copy the selected directories\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Move\"     onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'move');\"          title=\"Move the selected directories\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Delete\"   onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'delete');\"        title=\"Delete the selected directories\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Rename\"   onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'rename');\"        title=\"Rename the selected entries\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Chmod\"    onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'chmod');\"         title=\"Chmod the selected entries (only works on Unix/Linux/BSD servers)\" />\n";
		echo "<div style=\"margin-top: 3px;\">\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Download\" onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'download');\"      title=\"Download a zip file containing all selected entries\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Zip\"      onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'zip');\"           title=\"Zip the selected entries to save or email them\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Size\"     onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'calculatesize');\" title=\"Calculate the size of the selected entries\" />\n";
		echo "<input type=\"button\" class=\"smallbutton\" value=\"Search\"   onClick=\"submitBrowseForm('$directory_js', '', 'manage', 'findstring');\"    title=\"Find files which contain a particular word\" />\n";
		echo "</div>\n";
		echo "</td></tr></table>\n";
		echo "</td>\n";
		echo "</tr>\n";

// Row: go to the parent directory
		$updir_colspan = $total_colspan;
		echo "<tr class=\"browse_rows_heading\" style=\"text-align: center;\" onMouseOver=\"this.style.color='$browse_cursor_fontcolor'; this.style.backgroundColor='$browse_cursor_bgcolor';\" onMouseOut=\"this.style.color='$browse_heading_fontcolor'; this.style.backgroundColor='$browse_heading_bgcolor';\">\n";
		$onClick = "submitBrowseForm('" . upDir($directory_js) . "', '', 'browse', 'main');";
		echo "<td colspan=\"" . $updir_colspan . "\" title=\"Go to the parent directory\" style=\"cursor: pointer; cursor: hand;\" onClick=\"javascript:$onClick\">\n";
		echo "Up\n";
		echo "</td>\n";
		echo "</tr>\n";

// Row: column titles
		echo "<tr class=\"browse_rows_heading\">\n";
		echo "<td style=\"width: 32px;\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"CheckAll(document.BrowseForm);\"  title=\"Click to check or uncheck all rows\">All</a></td>\n";

		// Code to determine the sorting title and icon
		$sortArray = array("name", "type", "size", "owner", "group", "perms", "mtime");
		while(list($index,$value) = each($sortArray)) {
			if ($net2ftp_sort == $value) {
				if ($net2ftp_sortorder == "A") { $sortdir[$value] = "D"; $sorttitle[$value] = "Click to sort by $value in descending order"; $icon = "ascend.png";  $alt = "Ascending order"; }
				else                           { $sortdir[$value] = "A"; $sorttitle[$value] = "Click to sort by $value in ascending order";  $icon = "descend.png"; $alt = "Descending order"; }

				if ($browser_agent == "IE") {	$sorticon[$value] = "<img src=\"images/mime/spacer.gif\"   alt=\"$alt\" style=\"border: 0px; width: 16px; height: 16px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/mime/$icon', sizingMethod='scale');\" />\n"; }
				else                        { $sorticon[$value] = "<img src=\"images/mime/$icon\"        alt=\"$alt\" style=\"border: 0px; width: 16px; height: 16px;\" />\n"; }

			}
			else {
				$sortdir[$value] = "A";
				$sorttitle[$value] = "Click to sort by $value in ascending order";
				$sorticon[$value] = "";
			}
		} // end while

		echo "<td colspan=\"2\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('name','"  . $sortdir['name']  . "');\" title=\""  . $sorttitle['name']  . "\">Name</a>"         . $sorticon['name']  . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('type','"  . $sortdir['type']  . "');\" title=\""  . $sorttitle['type']  . "\">Type</a>"         . $sorticon['type']  . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('size','"  . $sortdir['size']  . "');\" title=\""  . $sorttitle['size']  . "\">Size</a>"         . $sorticon['size']  . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('owner','" . $sortdir['owner'] . "');\" title=\""  . $sorttitle['owner'] . "\">Owner</a>"       . $sorticon['owner'] . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('group','" . $sortdir['group'] . "');\" title=\""  . $sorttitle['group'] . "\">Group</a>"       . $sorticon['group'] . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('perms','" . $sortdir['perms'] . "');\" title=\""  . $sorttitle['perms'] . "\">Perms</a>"       . $sorticon['perms'] . "</td>\n";
		echo "<td colspan=\"1\"><a style=\"text-decoration: underline; cursor: pointer; cursor: hand;\" onClick=\"do_sort('mtime','" . $sortdir['mtime'] . "');\" title=\""  . $sorttitle['mtime'] . "\">Mod Time</a>" . $sorticon['mtime'] . "</td>\n";

// UPDATEFILE
		if ($show_beta == "yes") { echo "<td colspan=\"4\">Actions</td>\n"; }
		else                     { echo "<td colspan=\"3\">Actions</td>\n"; }

		echo "</tr>\n";

// Set the rowcounter to zero
// To create alternating colors for different rows
		$rowcounter = 0;

	}


// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------
// ------------------------------- Rows --------------------------------------------
// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------
	elseif ($print_what == "directories" || $print_what == "files" || $print_what == "symlinks" || $print_what == "unrecognized") {

		for ($i=1; $i<=count($list); $i++) {
			$scanrule           = $list[$i]['scanrule'];  // see ftp_scanline()
			$dirorfile          = $list[$i]['dirorfile']; // can be: d=directory, l=symlink, -=file, u=unrecognized
			$dirfilename        = $list[$i]['dirfilename'];
			$dirfilesize        = $list[$i]['size'];
			$dirfileowner       = $list[$i]['owner'];
			$dirfilegroup       = $list[$i]['group'];
			$dirfilepermissions = $list[$i]['permissions'];
			$dirfilemtime       = $list[$i]['mtime'];

// Get icon and type for this entry
			if ($dirorfile == "d")     { $mime = getMime("directory"); }
			elseif ($dirorfile == "-") { $mime = getMime($dirfilename); }
			elseif ($dirorfile == "l") { $mime = getMime("symlink"); }
			else                       { $mime = getMime("unknown"); }
			$mime_icon = $mime['mime_icon'];
			$mime_type = $mime['mime_type'];

// Create string that has to be printed
			if ($directory == "/") { $printnewdir = glueDirectories("", $dirfilename); }
			else                   { $printnewdir = glueDirectories($directory, $dirfilename); }

// Replace ' by \' in $directory and $dirfilename to avoid javascript errors if
// these variables contain single quotes (they may not contain double quotes).
//			$directory_js   = javascriptEncode($directory);  ==> see begin of this function, before the for loop
			$dirfilename_js = javascriptEncode($dirfilename);
			$newdir_js      = javascriptEncode(glueDirectories($directory, $dirfilename));

// ------------------------------- Subdirectories rows -----------------------------
// ---------------------------------------------------------------------------------
			if ($print_what == "directories" && $dirorfile == "d") {
				$rowcounter = $rowcounter + 1;
				if ($rowcounter % 2 == 1) { $thisrow_class = "browse_rows_odd";  $thisrow_fontcolor = $browse_rows_fontcolor_odd;  $thisrow_bgcolor = $browse_rows_bgcolor_odd; }
				if ($rowcounter % 2 == 0) { $thisrow_class = "browse_rows_even"; $thisrow_fontcolor = $browse_rows_fontcolor_even; $thisrow_bgcolor = $browse_rows_bgcolor_even; }
				$setColorString = "setColor_js($rowcounter);";
				//$setColorString = "setColor_js($i,$rowcounter);";

// Begin of the row
				echo "<tr class=\"$thisrow_class\" id=\"row" . $rowcounter . "\" onMouseOver=\"this.style.color='$browse_cursor_fontcolor'; this.style.backgroundColor='$browse_cursor_bgcolor';\" onMouseOut=\"this.style.color='$thisrow_fontcolor'; $setColorString\">\n";
				//echo "<tr class=\"$thisrow_class\" id=\"row" . $i . "\" onMouseOver=\"this.style.color='$browse_cursor_fontcolor'; this.style.backgroundColor='$browse_cursor_bgcolor';\" onMouseOut=\"this.style.color='$thisrow_fontcolor'; $setColorString\">\n";

// Checkbox
				echo "<td title=\"Select the directory $dirfilename\" style=\"text-align: center; width: 32px;\">\n";
				//printDirFileProperties($number, $entry, $checkbox_hidden, $onClick)
				printDirFileProperties($rowcounter, $list[$i], "checkbox", "onClick=\"$setColorString\"");
				echo "</td>\n";


// Subdirectory: icon and link
				if ($show_icons == "yes") {
					echo "<td onClick=\"submitBrowseForm('$newdir_js', '', 'browse', 'main');\" title=\"Go to the subdirectory $printnewdir\" style=\"cursor: pointer; cursor: hand; width: 32px;\">$mime_icon</td>\n";
				}
				echo "<td ".($show_icons!="yes"?"colspan=2 ":"")."onClick=\"submitBrowseForm('$newdir_js', '', 'browse', 'main');\" title=\"Go to the subdirectory $printnewdir\" style=\"cursor: pointer; cursor: hand;\">" . $dirfilename . "</td>\n";

// Type
				echo "<td>" . $mime_type . "</td>\n";

// Properties: size, owner, group, permissions, mtime
// This data comes from ftp_scanline()
// Depending on the scanning rule which could be used, all or only some data is filled in
				if ($scanrule == "rule-1" || $scanrule == "rule-3.1") {
					echo "<td>$dirfilesize</td>\n";
					echo "<td>$dirfileowner</td>\n";
					echo "<td>$dirfilegroup</td>\n";
					echo "<td>$dirfilepermissions</td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}
				elseif ($scanrule == "rule-2") {
					echo "<td colspan=\"3\">$dirfilesize</td>\n";
					echo "<td>$dirfilepermissions</td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}

// UPDATEFILE
				if ($show_beta == "yes") { echo "<td colspan=\"4\"></td>\n"; }
				else                   { echo "<td colspan=\"3\"></td>\n"; }

				echo "</tr>\n";
			}

// ------------------------------- Files rows --------------------------------------
// ---------------------------------------------------------------------------------
			elseif ($print_what == "files" && $dirorfile == "-") {
				$rowcounter = $rowcounter + 1;
				if ($rowcounter % 2 == 1) { $thisrow_class = "browse_rows_odd";  $thisrow_fontcolor = $browse_rows_fontcolor_odd;  $thisrow_bgcolor = $browse_rows_bgcolor_odd; }
				if ($rowcounter % 2 == 0) { $thisrow_class = "browse_rows_even"; $thisrow_fontcolor = $browse_rows_fontcolor_even; $thisrow_bgcolor = $browse_rows_bgcolor_even; }
				$setColorString = "setColor_js($rowcounter);";
				//$setColorString = "setColor_js($i,$rowcounter);";

// Begin of the row
				echo "<tr class=\"$thisrow_class\" id=\"row" . $rowcounter . "\" onMouseOver=\"this.style.color='$browse_cursor_fontcolor'; this.style.backgroundColor='$browse_cursor_bgcolor';\" onMouseOut=\"this.style.color='$thisrow_fontcolor'; $setColorString\">\n";
				//echo "<tr class=\"$thisrow_class\" id=\"row" . $i . "\" onMouseOver=\"this.style.color='$browse_cursor_fontcolor'; this.style.backgroundColor='$browse_cursor_bgcolor';\" onMouseOut=\"this.style.color='$thisrow_fontcolor'; $setColorString\">\n";

// Checkbox
				echo "<td title=\"Select the file $dirfilename\" style=\"text-align: center; width: 32px;\">\n";
				//printDirFileProperties($number, $entry, $checkbox_hidden, $onClick)
				printDirFileProperties($rowcounter, $list[$i], "checkbox", "onClick=\"$setColorString\"");
				echo "</td>\n";

// File: link and icon
				if ($show_icons == "yes") {
					echo "<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'downloadfile');\"  title=\"Download the file $dirfilename\" style=\"cursor: pointer; cursor: hand; width: 32px;\">$mime_icon</td>";
				}
				echo "<td ".($show_icons!="yes"?"colspan=2 ":"")."onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'downloadfile');\"  title=\"Download the file $dirfilename\" style=\"cursor: pointer; cursor: hand;\">" . $dirfilename . "</td>\n";

// Type
				echo "<td>" . $mime_type . "</td>\n";

// Properties: size, owner, group, permissions, mtime
// This data comes from ftp_scanline()
// Depending on the scanning rule which could be used, all or only some data is filled in
				if ($scanrule == "rule-1" || $scanrule == "rule-3.1") {
					echo "<td>$dirfilesize</td>\n";
					echo "<td>$dirfileowner</td>\n";
					echo "<td>$dirfilegroup</td>\n";
					echo "<td>$dirfilepermissions</td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}
				elseif ($scanrule == "rule-2") {
					echo "<td colspan=\"3\">$dirfilesize</td>\n";
					echo "<td>$dirfilepermissions</td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}


// Actions
				$fileType = getFileType($dirfilename);
// TEXT
				if ($fileType == "TEXT") {
					echo "<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'view');\"       title=\"View the highlighted source code of file $dirfilename\" style=\"cursor: pointer; cursor: hand;\">View</td>\n";
					echo "<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'edit');\"       title=\"Edit the source code of file $dirfilename\" style=\"cursor: pointer; cursor: hand;\">Edit</td>\n";
// UPDATEFILE
					if ($show_beta == "yes") { echo "<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'updatefile');\" title=\"Upload a new version of the file $dirfilename and merge the changes\" style=\"cursor: pointer; cursor: hand;\">Update</td>\n"; }
				} // end if TEXT

// IMAGE, EXECUTABLE, OFFICE, ARCHIVE, OTHER
				else {

// UPDATEFILE
					if ($show_beta == "yes") { echo "<td colspan=\"3\"></td>\n"; }
					else                   { echo "<td colspan=\"2\"></td>\n"; }

				} // end if else

				echo "<td onClick='window.open(\"" . printURL($directory, $dirfilename, no) . "\");' style=\"cursor: pointer; cursor: hand;\" title=\"View the file $dirfilename from your HTTP web server &#13; (Note: This link may not work if you don't have your own domain name.)\">Open</td>\n";
				echo "</tr>\n";
			} // End if elseif

// ------------------------------- Symlinks rows -----------------------------------
// ---------------------------------------------------------------------------------
			elseif ($print_what == "symlinks" && $dirorfile =="l") {
				$rowcounter = $rowcounter + 1;
				if ($rowcounter % 2 == 1) { $thisrow_class = "browse_rows_odd";  }
				if ($rowcounter % 2 == 0) { $thisrow_class = "browse_rows_even"; }

// Begin of the row
				echo "<tr class=\"$thisrow_class\">\n";

// No checkbox as long as net2ftp cannot handle symlinks
				echo "<td>\n";
				echo "</td>\n";

// Symlink: icon and link
				// $dirfilename of symlinks is like this: "subdir1 -> anotherdir"
				// Split the string in 2 parts: "subdir1" and "anotherdir"
				if (ereg("(.*)[ ]*->[ ]*(.*)", $dirfilename_js, $regs) == true) {
					$symlinkname = "$regs[1]";
					$symlinkdir = "$regs[2]";
				}

				$realpath = javascriptEncode(glueDirectories($directory, $symlinkdir));

				if ($show_icons == "yes") {
					echo "<td onClick=\"submitBrowseForm('$realpath', '', 'browse', 'main');\" title=\"Symlink $dirfilename\" style=\"cursor: pointer; cursor: hand; width: 32px;\">$mime_icon</td>";
				}
				echo "<td ".($show_icons!="yes"?"colspan=2 ":"")."onClick=\"submitBrowseForm('$realpath', '', 'browse', 'main');\" title=\"Symlink $dirfilename\" style=\"cursor: pointer; cursor: hand;\">" . $dirfilename . "</td>\n";

// Type
				echo "<td>" . $mime_type . "</td>\n";

// Properties: size, owner, group, permissions, mtime
// This data comes from ftp_scanline()
// Depending on the scanning rule which could be used, all or only some data is filled in
				if ($scanrule == "rule-1" || $scanrule == "rule-3.1") {
					echo "<td>$dirfilesize</td>\n";
					echo "<td>$dirfileowner</td>\n";
					echo "<td>$dirfilegroup</td>\n";
					echo "<td>$dirfilepermissions  <input type=\"hidden\" name=\"chmodStrings[" . $dirfilename_html . "]\" value=\"$dirfilepermissions\" /></td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}
				elseif ($scanrule == "rule-2") {
					echo "<td colspan=\"3\">$dirfilesize</td>\n";
					echo "<td>$dirfilepermissions  <input type=\"hidden\" name=\"chmodStrings[]\" value=\"$dirfilepermissions\" /></td>\n";
					echo "<td>$dirfilemtime</td>\n";
				}
// UPDATEFILE
				if ($show_beta == "yes") { echo "<td colspan=\"4\"></td>\n"; }
				else                   { echo "<td colspan=\"3\"></td>\n"; }

				echo "</tr>\n";
			}

// ------------------------------- Unrecognized rows -------------------------------
// ---------------------------------------------------------------------------------
			elseif ($print_what == "unrecognized" && $dirorfile =="u") {

// Check if there are unrecognized rows
// If there are none, don't display anything (no title and no rows)
				if ($print_what == "unrecognized") {
					$unrecognized_rows_counter = 0;
					for ($i=0; $i<=sizeof($list); $i=$i+1) {
						if ($list[$i]['dirorfile'] == "u") { $unrecognized_rows_counter = $unrecognized_rows_counter + 1; break; }
					}
					if ($unrecognized_rows_counter == 0) { return true; }
				}

// If there are unrecognized rows, print them
// Header
				echo "<tr class=\"browse_rows_heading\">\n";
				echo "<td colspan=\"" . $total_colspan . "\">\n";
				echo "<div style=\"font-size: 70%; font-weight: normal; text-align: center;\">FTP server's output which is not recognized is shown below</div>\n";
				echo "</td>\n";
				echo "</tr>\n";
// Items
				$rowcounter = $rowcounter + 1;
				if ($rowcounter % 2 == 1) { echo "<tr class=\"browse_rows_odd\" >\n"; }
				if ($rowcounter % 2 == 0) { echo "<tr class=\"browse_rows_even\">\n"; }

				echo "<td colspan=\"" . $total_colspan . "\">" . $dirfilename . "</td>\n";

				echo "</tr>\n";
			} // End if elseif

// ---------------------------------------------------------------------------------

		} // End for

	} // End elseif ($print_what == "directories" || $print_what == "files" || $print_what == "symlinks" || $print_what == "unrecognized") {

// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------
// ------------------------------- Table end ---------------------------------------
// ---------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------
	elseif ($print_what == "table_end") {
// If there are no subdirectories or files, print a message to tell so
		if ($rowcounter == 0) {
			echo "<tr class=\"browse_rows_odd\">\n";
			echo "<td style=\"text-align: center;\" colspan=\"$total_colspan\"><br />";
			echo "This folder is empty";
			echo "<br /> <br /></td>\n";
			echo "</tr>\n";
		}
// Close the table and the form
		echo "</table>\n";
		echo "</form>\n";
	}

	printFunctionTags("printdirfilelist", "end");

} // End function printdirfilelist

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printLocationActions($directory) {

// --------------
// This function prints the ftp server and a text box with the directory
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftp_ftpserver;
	$show_beta = getSetting("show_beta");

	printFunctionTags("printLocationActions", "begin");

// -------------------------------------------------------------------------
// Replace ' by \' in $directory and $dirfilename to avoid javascript errors if
// these variables contain single quotes (they may not contain double quotes).
// -------------------------------------------------------------------------
	$directory_js = str_replace("'", "\'", $directory);

	if (strlen($directory)>0) { $printdirectory = $directory; }
	else                      { $printdirectory = "/"; }


// -------------------------------------------------------------------------
// Print form
// -------------------------------------------------------------------------
	echo "<form name=\"GotoForm\" id=\"GotoForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"state\" value=\"browse\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"main\" />\n";
	printLoginInfo();

	echo "<table border=\"0\" style=\"margin-top: 10px; margin-left: 20px; width: 95%;\">\n";
	echo "<tr>\n";

// -------------------------------------------------------------------------
// Directory textbox
// -------------------------------------------------------------------------
	echo "<td style=\"text-align: left;\">\n";
	echo "<input type=\"text\" class=\"longinput\" name=\"directory\" value=\"$printdirectory\" /> &nbsp; \n";
	$onClick = "submitBrowseForm('" . upDir($directory_js) . "', '', 'browse', 'main');";
//	echo getAction("up", $onClick);
	printDirectoryTreeLink($directory, "GotoForm.directory");

	echo "<br />";

// -------------------------------------------------------------------------
// Directory tree
// -------------------------------------------------------------------------
// $split_directory contains an array with the subdirectory pieces of $directory
// $output_directory contains the HTML that is printed
// $goto_directory contains the current subdirectory in the for loop
// $goto_directory_js is the same, except that ' are replaced by \' to avoid Javascript errors if the directory contains a '

	$split_directory = explode("/", stripDirectory($directory));

	if ($directory != "/" && isAuthorizedDirectory("/") == true) { $output_directory = "<a href=\"javascript:submitBrowseForm('/','','browse','main');\">root</a> "; }
	else                                                         { $output_directory = "root "; }

	for ($i=0; $i<count($split_directory)-1; $i++) {
		$goto_directory = glueDirectories($goto_directory, $split_directory[$i]);
		$goto_directory_js = str_replace("'", "\'", $goto_directory);
		if (isAuthorizedDirectory($goto_directory) == true) { $output_directory .= "/<a href=\"javascript:submitBrowseForm('" . $goto_directory_js . "','','browse','main');\">" . $split_directory[$i] . "</a> "; }
		else                                                { $output_directory .= "/" . $split_directory[$i] . " "; }
	}
	$output_directory .= "/" . $split_directory[count($split_directory)-1];

	echo "<span style=\"font-size: 65%;\">Directory Tree: ".$output_directory."</span>";

  echo "</td>";

// Icons details or icons
//	if ($show_beta == "yes") {
//		echo "<td style=\"text-align: right;\">View mode:\n";
//		if ($browse_details == "icons") {
//			$onClick = "document.BrowseForm.browse_details.value='details'; submitBrowseForm('$directory_js', '', 'browse', 'main');";
//			echo getMode("details", "off", $onClick);
//			echo " ";
//			echo getMode("icons", "on", "");
//		}
//		else {
//			$onClick = "document.BrowseForm.browse_details.value='icons'; submitBrowseForm('$directory_js', '', 'browse', 'main');";
//			echo getMode("details", "on", "");
//			echo " &nbsp; ";
//			echo getMode("icons", "off", $onClick);
//		}
//		echo "</td>\n";
//	} // end if show_beta

// Labels
	echo "<td style=\"text-align: right;\">\n";
	if ($show_beta == "yes") { echo "Language: <br />\n"; }
	echo "Skin: \n";
	if ($show_beta == "yes") { echo "<br /> View mode: \n"; }
	echo "</td>\n";

	echo "<td style=\"text-align: left;\">\n";

// Language, skin and view mode drop-down boxes
	if ($show_beta == "yes") {
		$fieldname1 = "language";
		$onchange1 = "document.BrowseForm.net2ftp_language.value=document.GotoForm.language.options[document.GotoForm.language.selectedIndex].value; submitBrowseForm('$directory_js', '', 'browse', 'main');";
		printLanguageSelect($fieldname1, $onchange1);
		echo "<br />";
	}
// Skin
	$fieldname2 = "skin";
	$onchange2 = "document.BrowseForm.net2ftp_skin.value=document.GotoForm.skin.options[document.GotoForm.skin.selectedIndex].value; submitBrowseForm('$directory_js', '', 'browse', 'main');";
	printSkinSelect($fieldname2, $onchange2);

// View mode
	if ($show_beta == "yes") {
		echo "<br />";
		$fieldname3 = "viewmode";
		$onchange3 = "document.BrowseForm.net2ftp_viewmode.value=document.GotoForm.viewmode.options[document.GotoForm.viewmode.selectedIndex].value; submitBrowseForm('$directory_js', '', 'browse', 'main');";
		printViewmodeSelect($fieldname3, $onchange3);
	}

	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";

	echo "</form>\n";

	printFunctionTags("printLocationActions", "end");

} // end printLocationActions

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printURL($directory, $file, $htmltags) {

// --------------
// This function prints the URL of the files in the Browse view
// Given the FTP server (ftp.name.com),
//       the directory and file (/directory/file.php)
// It has to return
//       http://www.name.com/directory/file.php
// $htmltags indicates whether the url should be returned enclosed in HTML tags or not
// --------------

	global $net2ftp_ftpserver, $net2ftp_username;

	if ($directory == "/") { $directory = ""; }

// -------------------------------------------------------------------------
// Convert single quotes from ' to &#039;
// -------------------------------------------------------------------------
	$directory = htmlspecialchars($directory, ENT_QUOTES);
	$file = htmlspecialchars($file, ENT_QUOTES);


// -------------------------------------------------------------------------
// "ftp-www.earthlink.net/webdocs/directory" -----> "http://home.earthlink.net/~username/directory"
// -------------------------------------------------------------------------
	if (ereg("ftp-www.earthlink.net", $net2ftp_ftpserver, $regs)) {
		if (strlen($directory) < 8) {
			if ($htmltags == "no") { return "javascript: alert('This file is not accessible from the web');"; }
			else { return "<a title=\"This file is not accessible from the web\" onClick=\"alert('This file is not accessible from the web');\">$file</a>"; }
		}
		else {
			// Transform directory from /webdocs/dir to /dir  --> remove the first 4 characters
			$directory = substr($directory, 8);
			$URL = "http://home.earthlink.net/~" . $net2ftp_username . $directory . "/" . $file;

			if ($htmltags == "no") { return $URL; }
			else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
		} // end if else strlen
	}

// -------------------------------------------------------------------------
// "ftp.membres.lycos.fr" -----> "http://membres.lycos.fr/username"
// -------------------------------------------------------------------------
	elseif (ereg("ftp.membres.lycos.fr", $net2ftp_ftpserver, $regs)) {
		$URL = "http://membres.lycos.fr/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "ftp.tripod.com" -----> "http://username.tripod.com"
// -------------------------------------------------------------------------
	elseif (ereg("ftp.tripod.com", $net2ftp_ftpserver, $regs)) {
		$URL = "http://" . $net2ftp_username . ".tripod.com" . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "ftpperso.free.fr" -----> "http://username.free.fr"
// -------------------------------------------------------------------------
	elseif (ereg("ftpperso.free.fr", $net2ftp_ftpserver, $regs)) {
		$URL = "http://" . $net2ftp_username . ".free.fr" . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "web.wanadoo.be" -----> "http://web.wanadoo.be/username"
// -------------------------------------------------------------------------
	elseif (ereg("web.wanadoo.be", $net2ftp_ftpserver, $regs)) {
		$URL = "http://web.wanadoo.be/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "perso-ftp.wanadoo.fr" -----> "http://perso.wanadoo.fr/username"
// -------------------------------------------------------------------------
	elseif (ereg("perso-ftp.wanadoo.fr", $net2ftp_ftpserver, $regs)) {
		$URL = "http://perso.wanadoo.fr/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "ftp.wanadoo.es" -----> "http://perso.wanadoo.es/username"
// -------------------------------------------------------------------------
	elseif (ereg("ftp.wanadoo.es", $net2ftp_ftpserver, $regs)) {
		$URL = "http://perso.wanadoo.es/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// wanadoo uk
// "uploads.webspace.freeserve.net" -----> "http://www.username.freeserve.co.uk"
// -------------------------------------------------------------------------
	elseif (ereg("uploads.webspace.freeserve.net", $net2ftp_ftpserver, $regs)) {
		$URL = "http://www." . $net2ftp_username . ".freeserve.co.uk" . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "home.wanadoo.nl" -----> "http://home.wanadoo.nl/username"
// -------------------------------------------------------------------------
	elseif (ereg("home.wanadoo.nl", $net2ftp_ftpserver, $regs)) {
		$URL = "http://home.wanadoo.nl/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "home.planetinternet.be" -----> "http://home.planetinternet.be/~username"
// -------------------------------------------------------------------------
	elseif (ereg("home.planetinternet.be", $net2ftp_ftpserver, $regs)) {
		$URL = "http://home.planetinternet.be/~" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "home.planet.nl" -----> "http://home.planet.nl/~username"
// -------------------------------------------------------------------------
	elseif (ereg("home.planet.nl", $net2ftp_ftpserver, $regs)) {
		$URL = "http://home.planet.nl/~" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "users.skynet.be" -----> "http://users.skynet.be/username"
// -------------------------------------------------------------------------
	elseif (ereg("users.skynet.be", $net2ftp_ftpserver, $regs)) {
		$URL = "http://users.skynet.be/" . $net2ftp_username . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "ftp.xs4all.nl/WWW/directory" -----> "http://www.xs4all.nl/~username/directory"
// -------------------------------------------------------------------------
	elseif (ereg("ftp.xs4all.nl", $net2ftp_ftpserver, $regs)) {
		if (strlen($directory) < 4) {
			if ($htmltags == "no") { return "javascript: alert('This file is not accessible from the web');"; }
			else { return "<a title=\"This file is not accessible from the web\" onClick=\"alert('This file is not accessible from the web');\">$file</a>"; }
		}
		else {
			// Transform directory from /WWW/dir to /dir  --> remove the first 4 characters
			$directory = substr($directory, 4);
			$URL = "http://www.xs4all.nl/~" . $net2ftp_username . $directory . "/" . $file;

			if ($htmltags == "no") { return $URL; }
			else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
		} // end if else strlen
	}

// -------------------------------------------------------------------------
// "ftp.server.com/file" -----> "http://www.server.com/file"
// -------------------------------------------------------------------------
	elseif (ereg("ftp.(.+)(.{2,4})", $net2ftp_ftpserver, $regs)) {
		$URL = "http://www." . $regs[1] . $regs[2] . $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}

// -------------------------------------------------------------------------
// "http://192.168.0.1/file" can be determined using "192.168.0.1/file":
// -------------------------------------------------------------------------
	else {
		$URL = "http://" . $net2ftp_ftpserver. $directory . "/" . $file;

		if ($htmltags == "no") { return $URL; }
		else { return "<a href=\"" . $URL . "\" target=\"_blank\" title=\"Execute $file in a new window\">$file</a>"; }
	}


} // end printURL
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **
function printDirectoryTreeLink($directory, $FormAndFieldName) {

// --------------
// This function prints a link
// --------------

	$directory_js = str_replace("'", "\'", $directory);

//	echo "<a href=\"javascript:createDirectoryTreeWindow('$directory_js', '$FormAndFieldName');\" style=\"font-size: 80%\">List</a>\n";
	$onClick = "createDirectoryTreeWindow('$directory_js', '$FormAndFieldName');";
	echo getAction("listdirectories", $onClick);

} // End function printDirectoryTreeLink

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **

function printDirectorySelect($directory, $list, $FormAndFieldName) {

// $FormAndFieldName can be for example GotoForm.directory

	printFunctionTags("printDirectorySelect", "begin");

// -------------------------------------------------------------------------
// Start select
// -------------------------------------------------------------------------
	echo "<form name=\"DirectoryTreeForm\" id=\"DirectoryTreeForm\"  action=\"" . printPHP_SELF("no") . "\" method=\"post\"/>\n";

	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"browse\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"popup\" />\n";
	echo "<input type=\"hidden\" name=\"updirectory\" value=\"" . upDir($directory) . "\"  />\n";
	echo "<input type=\"hidden\" name=\"FormAndFieldName\" value=\"$FormAndFieldName\"/>\n";

	echo "<input type=\"text\" name=\"directory\" value=\"$directory\"/> &nbsp; \n";

	echo "<input type=\"button\" class=\"smallbutton\" value=\"Choose\" onClick=\"opener.document.$FormAndFieldName.value=document.DirectoryTreeForm.directory.value; self.close();\" /><br /><br />\n";

	echo "<div style=\"font-size: 80%;\">Double-click to go to a subdirectory:</div><br />\n";

	echo "<select name=\"DirectoryTreeSelect\" id=\"DirectoryTreeSelect\" size=\"20\" style=\"width: 200px;\" onDblClick=\"submitDirectoryTreeForm();\">\n";
	echo "<option value=\"up\" selected>Up</option>\n";


// -------------------------------------------------------------------------
// Loop
// -------------------------------------------------------------------------

	for ($i=1; $i<=count($list); $i++) {

		$scanrule           = $list[$i]['scanrule']; // see ftp_scanline()
		$dirorfile          = $list[$i]['dirorfile']; // can be: d=directory, l=symlink, -=file, u=unrecognized
		$dirfilename        = $list[$i]['dirfilename'];
//		$dirfilesize        = $list[$i]['size'];
//		$dirfileowner       = $list[$i]['owner'];
//		$dirfilegroup       = $list[$i]['group'];
//		$dirfilepermissions = $list[$i]['permissions'];
//		$dirfilemtime       = $list[$i]['mtime'];

		if ($dirorfile == "d" || $dirorfile == "l") {

			echo "<option value=\"$dirfilename\">$dirfilename</option>\n";

		} // end if

	} // end for

// -------------------------------------------------------------------------
// End select
// -------------------------------------------------------------------------

	echo "</select>\n";

	echo "<br />\n";
//	echo "<input type=\"button\" class=\"smallbutton\" value=\"Browse\"/ onClick=\"submitDirectoryTreeForm();\">\n";
//	echo "<input type=\"button\" class=\"smallbutton\" value=\"Close\" onClick=\"self.close();\" /><br /><br />\n";
	echo "</form>\n";

	printFunctionTags("printDirectorySelect", "end");

} // End function printDirectorySelect

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function printViewmodeSelect($fieldname, $onchange) {


// --------------
// This function prints a select with the available skins
// Skin nr 1 is the default skin
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftpcookie_viewmode;
	global $net2ftp_viewmode;

	$viewmodeArray[1]['name'] = "Details";
	$viewmodeArray[2]['name'] = "Icons";

	if ($net2ftp_viewmode != "")           { $currentviewmode = $net2ftp_viewmode; }
	elseif ($net2ftpcookie_viewmode != "") { $currentviewmode = $net2ftpcookie_viewmode; }
	else                                   { $currentviewmode = 1; }

	echo "<select name=\"$fieldname\" id=\"$fieldname\" onChange=\"$onchange\">\n";

	for ($i=1; $i<=sizeof($viewmodeArray); $i=$i+1) {
		if ($i == $currentviewmode) { $selected = "selected"; }
		else { $selected = ""; }
		echo "<option value=\"$i\" $selected>" . $viewmodeArray[$i]['name'] . "</option>\n";
	} // end for

	echo "</select>\n";

} // End function printViewmodeSelect

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **

function custom_sort($list) {

// --------------
// This function sorts the list of directories and files
// Written by Slynderdale
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftp_sort, $net2ftp_sortorder;

// -------------------------------------------------------------------------
// Default values
// -------------------------------------------------------------------------
	if (trim($net2ftp_sort) == "")      { $sort = "default"; }
	else                                { $sort = $net2ftp_sort; }
	if (trim($net2ftp_sortorder) == "") { $sortorder = "A"; }
	else                                { $sortorder = $net2ftp_sortorder; }

// -------------------------------------------------------------------------
// Return the list itself if no sorting is indicated, or if the list is empty
// -------------------------------------------------------------------------
	if ($sort == "" || $sort == "default" || is_array($list) == false || count($list) <= 1) {
		return $list;
	}

// -------------------------------------------------------------------------
// Sort the list
// -------------------------------------------------------------------------
	$sort = trim(strtoupper(substr($sort,0,1)));
	$sortorder = trim(strtoupper(substr($sortorder,0,1)));

// Sort based on what?
	if     ($sort=="T")  { $sortname = "dirorfile"; }
	elseif ($sort=="S")  { $sortname = "size"; }
	elseif ($sort=="O")  { $sortname = "owner"; }
	elseif ($sort=="G")  { $sortname = "group"; }
	elseif ($sort=="P")  { $sortname = "permissions"; }
	elseif ($sort=="M")  { $sortname = "mtime"; }
	else                 { $sortname = "dirfilename"; }

// Sort flags
	if ($sort=="S")  { $sortflag = SORT_NUMERIC; }
	else             { $sortflag = SORT_REGULAR; }

// Sort ascending or descending
	if ($sortorder=="A") { $sortfunction = "asort"; }
	else                 { $sortfunction = "arsort"; }

// Create a temporary array $temp which contains only the key $i and the value based on which the sorting is done
	for($i=1; $i<count($list)+1; $i++) {
		if ($sortname == "dirorfile") {
			$type = $list[$i][$sortname];
			if ($type == "d")     { $type = "directory"; }
			elseif ($type == "l") { $type = "symlink"; }
			elseif ($type == "-") { $type = $list[$i][dirfilename]; }
			elseif ($type == "u") { $type = "unrecognized"; }
			$mimetype = getMime($type);
			$temp[$i] = strtolower($mimetype[mime_type]);
		}
		else { $temp[$i] = strtolower($list[$i][$sortname]); }
	}

// Execute the sorting on the $temp array
	$sortfunction($temp, $sortflag);
	$i=1;

	while(list($tname,$tvalue) = each($temp)) {
		while(list($lname,$lvalue) = each($list[$tname])) {
			$return[$i][$lname] = $lvalue;
		}
		$i++;
	}

	return $return;

} // end function custom_sort

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



?>