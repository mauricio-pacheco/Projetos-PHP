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

function manage($state2, $directory, $entry, $list, $newNames, $formresult, $screen, $targetDirectories, $copymovedelete, $text, $wysiwyg, $uploadedFilesArray, $uploadedArchivesArray, $use_folder_names, $command, $to, $message, $zipactions, $searchoptions, $comparison) {

// --------------
// This function allows to manage a file: view/edit/rename/delete
// The real action is done in subfunctions
// --------------

	$show_beta = getSetting("show_beta");

// Filter the list entries which were selected from the ones that were not selected
	$list = getSelectedEntries($list);

// Check that at least one entry was chosen
	if (sizeof($list) < 1 && $state2 != "view" && $state2 != "edit" && $state2 != "newdirectory" && $state2 != "newfile" && $state2 != "uploadfile" && $state2 != "updatefile") {
		$resultArray['message'] = "Please select at least one directory or file !";
		$resultArray['drilldown'] = "manage > initial check";
		printErrorMessage($resultArray, "exit", "");
	}

	switch ($state2) {
		case "copy":
			copymovedeleteentry($directory, $list, $targetDirectories, $newNames, "copy", $formresult);
		break;
		case "move":
			copymovedeleteentry($directory, $list, $targetDirectories, $newNames, "move", $formresult);
		break;
		case "delete":
			copymovedeleteentry($directory, $list, $targetDirectories, $newNames, "delete", $formresult);
		break;
		case "rename":
			renameentry($directory, $list, $newNames, $formresult);
		break;
		case "chmod":
			chmodentry($directory, $list, $formresult);
		break;
		case "download":
			// Everything is done in httpheaders.inc.php
		break;
		case "zip":
			zipentry($directory, $list, $zipactions, $newNames, $to, $message, $formresult);
		break;
		case "calculatesize":
			calculatesize($directory, $list);
		break;
		case "findstring":
			findstring($directory, $list, $searchoptions, $formresult);
		break;
// Directory specific
		case "newdirectory":
			newdirectory($directory, $newNames, $formresult);
		break;
// File specific
		case "view":
			view($directory, $entry);
		break;
		case "edit":
			edit($directory, $entry, $text, $wysiwyg, $formresult);
		break;
		case "newfile":
			edit($directory, $newNames[0], $text, $wysiwyg, $formresult);
		break;
		case "uploadfile":
			uploadfile($directory, $uploadedFilesArray, $uploadedArchivesArray, $use_folder_names, $formresult);
		break;
		case "updatefile":
// UPDATEFILE
		if ($show_beta == "yes") { updatefile($directory, $entry, $uploadedFilesArray, $comparison, $screen); }
		else {
			$resultArray['message'] = "This beta function is not activated on this server.";
			$resultArray['drilldown'] = "manage > updatefile";
			printErrorMessage($resultArray, "exit", "");
		}
		break;
// Default
		default:
			$resultArray['message'] = "Unexpected state2 string. Exiting.";
  			printErrorMessage($resultArray, "exit", "");
  		break;

	} // End switch

} // End function manage

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function renameentry($directory, $list, $newNames, $formresult) {

// --------------
// This function allows to rename a directory or file
// --------------


// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	printTitle("Rename directories and files");

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {
		echo "<form name=\"RenameForm\" id=\"RenameForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"rename\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "RenameForm");
		printForwardInForm("RenameForm");

		for ($i=1; $i<=count($list); $i++) {
			printDirFileProperties($i, $list[$i], "hidden", "");
			echo "Old name: <b>" . $list[$i]['dirfilename'] . "</b><br />\n";
			echo "New name: <input type=\"text\" class=\"input\" name=\"newNames[$i]\" value=\"" . $list[$i]['dirfilename'] . "\" /><br /><br />\n";
		} // End for

		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printBack($directory);

// Open connection
		setStatus_php("Connecting to the FTP server");
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false) { printErrorMessage($resultArray, "exit", ""); }

// Rename files
		setStatus_php("Processing the entries");
		for ($i=1; $i<=count($list); $i++) {
			if (strstr($list[$i]['dirfilename'], "..") != false) {
				echo "The new name may not contain any dots. This entry was not renamed to <b>" . $list[$i]['dirfilename'] . "</b>.<br />";
				continue;
			}
			$resultArray = ftp_myrename($conn_id, $directory, $list[$i]['dirfilename'], $newNames[$i]);	// filesystem.inc.php
			$success = getResult($resultArray);
			if ($success ==	false) { printErrorMessage($resultArray, "", ""); continue; }
			else { echo "<b>" . $list[$i]['dirfilename'] . "</b> was successfully renamed to <b>$newNames[$i]</b><br />"; }
		} // End for

// Close connection
		ftp_closeconnection($conn_id);

	} // End if elseif (form or result)

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function renameentry

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function chmodentry($directory, $list, $formresult) {

// --------------
// This function allows to chmod a directory or file
// The initial permissions are contained in $list[$i]['permissions'], and are coming from the browse view
// The permissions to be set are contained in chmodoctal
// --------------

// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	printTitle("Chmod directories and files");

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

		echo "<form name=\"ChmodForm\" id=\"ChmodForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"chmod\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "ChmodForm");
		printForwardInForm("ChmodForm");

// Header
		echo "<table style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 5px;\">\n";
		echo "<tr><td>\n";

		echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" style=\"margin-left: 5px;\">\n";
		echo "	<tr>\n";
		echo "		<td rowspan=\"4\" valign=\"top\"><input type=\"button\" class=\"extralongbutton\" value=\"Set all permissions\" onClick=\"";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[owner_read]',    'owner_read'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[owner_write]',   'owner_write'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[owner_execute]', 'owner_execute'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[group_read]',    'group_read'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[group_write]',   'group_write'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[group_execute]', 'group_execute'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[other_read]',    'other_read'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[other_write]',   'other_write'); ";
		echo "		CopyCheckboxToAll(document.ChmodForm, 'header[other_execute]', 'other_execute'); ";
		echo "    update_input(); \" /></td>\n";

		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Owner:</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[owner_read]\" value=\"4\">Read</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[owner_write]\" value=\"2\">Write</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[owner_execute]\" value=\"1\">Execute</td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Group:</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[group_read]\" value=\"4\">Read</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[group_write]\" value=\"2\">Write</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[group_execute]\" value=\"1\">Execute</td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Everyone:</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[other_read]\" value=\"4\">Read</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[other_write]\" value=\"2\">Write</td>\n";
		echo "		<td><input type=\"checkbox\" name=\"header[other_execute]\" value=\"1\">Execute</td>\n";
		echo "	</tr>\n";
		echo "</table>\n";

		echo "<div style=\"font-size: 65%\">To set all permissions to the same values, enter those permissions above and click on the button \"Set all permissions\".</div>\n";
		echo "</td></tr>\n";
		echo "</table>\n";
		echo "<br />";

// Items
		for ($i=1; $i<=count($list); $i++) {
			printDirFileProperties($i, $list[$i], "hidden", "");

			if     ($list[$i]['dirorfile'] == "d")   { echo "Set the permissions of directory <b>" . $list[$i]['dirfilename'] . "</b> to: <br />\n"; }
			elseif ($list[$i]['dirorfile'] == "-")   { echo "Set the permissions of file <b>"      . $list[$i]['dirfilename'] . "</b> to: <br />\n"; }
			elseif ($list[$i]['dirorfile'] == "l")   { echo "Set the permissions of symlink <b>"   . $list[$i]['dirfilename'] . "</b> to: <br />\n"; }


			$owner_chmod = 0;
			if (substr($list[$i]['permissions'], 0, 1) == "r") { $owner_chmod+=4; $owner_read = "checked=\"checked\""; }
			else $owner_read = "";
			if (substr($list[$i]['permissions'], 1, 1) == "w") { $owner_chmod+=2; $owner_write = "checked=\"checked\"";  }
			else $owner_write = "";
			if (substr($list[$i]['permissions'], 2, 1) == "x") { $owner_chmod+=1; $owner_execute = "checked=\"checked\"";  }
			else $owner_execute = "";

			$group_chmod = 0;
			if (substr($list[$i]['permissions'], 3, 1) == "r") { $group_chmod+=4; $group_read = "checked=\"checked\"";  }
			else $group_read = "";
			if (substr($list[$i]['permissions'], 4, 1) == "w") { $group_chmod+=2; $group_write = "checked=\"checked\"";  }
			else $group_write = "";
			if (substr($list[$i]['permissions'], 5, 1) == "x") { $group_chmod+=1; $group_execute = "checked=\"checked\"";  }
			else $group_execute = "";

			$other_chmod = 0;
			if (substr($list[$i]['permissions'], 6, 1) == "r") { $other_chmod+=4; $other_read = "checked=\"checked\"";  }
			else $other_read = "";
			if (substr($list[$i]['permissions'], 7, 1) == "w") { $other_chmod+=2; $other_write = "checked=\"checked\"";  }
			else $other_write = "";
			if (substr($list[$i]['permissions'], 8, 1) == "x") { $other_chmod+=1; $other_execute = "checked=\"checked\"";  }
			else $other_execute = "";

      $chmod_value = $owner_chmod.$group_chmod.$other_chmod;

			echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" style=\"margin-left: 20px;\">\n";
			echo "	<tr>\n";
			echo "		<td>Owner:</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][owner_read]\" value=\"4\" onclick=\"update_input($i);\" $owner_read/>Read</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][owner_write]\" value=\"2\" onclick=\"update_input($i);\" $owner_write/>Write</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][owner_execute]\" value=\"1\" onclick=\"update_input($i);\" $owner_execute/>Execute</td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td>Group:</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][group_read]\" value=\"4\" onclick=\"update_input($i);\" $group_read/>Read</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][group_write]\" value=\"2\" onclick=\"update_input($i);\" $group_write/>Write</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][group_execute]\" value=\"1\" onclick=\"update_input($i);\" $group_execute/>Execute</td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td>Everyone:</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][other_read]\" value=\"4\" onclick=\"update_input($i);\" $other_read/>Read</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][other_write]\" value=\"2\" onclick=\"update_input($i);\" $other_write/>Write</td>\n";
			echo "		<td><input type=\"checkbox\" name=\"list[$i][other_execute]\" value=\"1\" onclick=\"update_input($i);\" $other_execute/>Execute</td>\n";
			echo "	</tr>\n";
			echo "  <tr>\n";
			echo "    <td colspan=4>Chmod Value: <input class=\"smallinput\" value=\"$chmod_value\" name=\"chmod$i\" id=\"chmod$i\" onChange=\"update_checkbox($i);\"></td>\n";
			echo "  </tr>\n";
			echo "</table>\n";

			if     ($list[$i]['dirorfile'] == "d")   {
				echo "<input type=\"checkbox\" name=\"list[$i][chmod_subdirectories]\" value=\"yes\" checked> Chmod also the subdirectories within this directory<br />\n";
				echo "<input type=\"checkbox\" name=\"list[$i][chmod_subfiles]\"          value=\"yes\" checked> Chmod also the files within this directory<br />\n";
			}

			echo "<br /><br />\n";

		} // End for

		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printBack($directory);

// Calculate the chmod octal
		for ($i=1; $i<=count($list); $i++) {
			$ownerOctal = $list[$i]['owner_read'] + $list[$i]['owner_write'] + $list[$i]['owner_execute'];
			$groupOctal = $list[$i]['group_read'] + $list[$i]['group_write'] + $list[$i]['group_execute'];
			$otherOctal = $list[$i]['other_read'] + $list[$i]['other_write'] + $list[$i]['other_execute'];

			$chmodOctal = $ownerOctal . $groupOctal . $otherOctal;

			if ($chmodOctal > 777 || $chmodOctal < 0) {
				$resultArray['message'] = "The chmod nr <b>$chmodOctal</b> is out of the range 000-777. Please try again.\n";
				printErrorMessage($resultArray, "exit", "");
			}
			else { $list[$i]['chmodoctal'] = $chmodOctal; }

		} // End for

// Open connection
		setStatus_php("Connecting to the FTP server");
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false) { printErrorMessage($resultArray, "exit", ""); }

// Chmod the entries
		setStatus_php("Processing the entries");
		$resultArray = ftp_mychmod($conn_id, $directory, $list, 0);
		$success = getResult($resultArray);
		if ($success == false)  { printErrorMessage($resultArray, "", ""); }

// Close connection
		ftp_closeconnection($conn_id);

	} // End if elseif (form or result)

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";


} // End function chmodentry

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function copymovedeleteentry($directory, $list, $targetDirectories, $newNames, $copymovedelete, $formresult) {

// --------------
// This function allows to copy or move a directory or file
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------

global $input_ftpserver2, $input_username2;


// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------
	if (($copymovedelete != "move" && $copymovedelete != "delete")) { $copymovedelete = "copy"; }

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	if ($copymovedelete == "copy")       { printTitle("Copy directories and files"); }
	elseif ($copymovedelete == "move")   { printTitle("Move directories and files"); }
	elseif ($copymovedelete == "delete") { printTitle("Delete directories and files"); }


// -------------------------------------------------------------------------
// Show form
// -------------------------------------------------------------------------
	if ($formresult != "result") {

// Hidden stuff
		echo "<form name=\"CopyMoveDeleteForm\" id=\"CopyMoveDeleteForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"$copymovedelete\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "CopyMoveDeleteForm");
		printForwardInForm("CopyMoveDeleteForm");

// Title and text
		if ($copymovedelete == "delete") { echo "Are you sure you want to delete these directories and files</b>?<br />Note that all the subdirectories and files of the selected directories will also be deleted!<br /><br />\n"; }

// Header: directory and button to copy text to all target directory textboxes -- only for copy/move
		if ($copymovedelete != "delete") {
			echo "<table style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 10px;\">\n";
			echo "<tr><td>\n";
			echo "<input type=\"button\" class=\"extralongbutton\" value=\"Set all targetdirectories\" onClick=\"CopyValueToAll(document.CopyMoveDeleteForm, document.CopyMoveDeleteForm.headerDirectory, 'targetdirectory');\" /> &nbsp; \n";
			echo "<input type=\"text\" class=\"longinput\" name=\"headerDirectory\" value=\"$directory\" />\n";
			printDirectoryTreeLink($directory, "CopyMoveDeleteForm.headerDirectory");
			echo "<div style=\"font-size: 65%\">To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\".</div>\n";
			echo "<div style=\"font-size: 65%\">Note: the target directory must already exist before anything can be copied into it.</div>\n";
			echo "</td></tr>\n";
			echo "</table>\n";
		} // End if

		echo "<br />";

// Header: option to copy/move to a different FTP server -- only for copy/move
		if ($copymovedelete != "delete") {

			echo "<table style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 10px; margin-right: 100px; margin-bottom: 30px;\">\n";
			echo "<tr>\n";
			echo "<td valign=\"top\" width=\"40%\">Different target FTP server:</td>\n";
			echo "<td>\n";
			echo "<input type=\"text\" class=\"input\" name=\"input_ftpserver2\" value=\"$net2ftpcookie_ftpserver\" /> port \n";
			if ($net2ftpcookie_ftpserverport != "") {
				echo "<input type=\"text\" class=\"input\" size=\"3\" maxlength=\"5\" name=\"input_ftpserverport2\" value=\"$net2ftpcookie_ftpserverport\" />\n";
			}
			else {
				echo "<input type=\"text\" class=\"input\" size=\"3\" maxlength=\"5\" name=\"input_ftpserverport2\" value=\"21\" />\n";
			}

			echo "</td>\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo "<td>Username:</td>\n";
			echo "<td><input type=\"text\" class=\"input\" name=\"input_username2\" value=\"$net2ftpcookie_username\" /></td>\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo "<td>Password:</td>\n";
			echo "<td><input type=\"password\" class=\"input\" name=\"input_password2\" /></td>\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo "<td colspan=\"2\">\n";
			echo "<div style=\"font-size: 65%;\">\n";
			echo "Leave empty if you want to $copymovedelete the files to the same FTP server.<br />\n";
			echo "If you want to $copymovedelete the files to another FTP server, enter your login data.\n";
			echo "</div>\n";
			echo "</td>\n";
			echo "</tr>\n";

			echo "</table>\n";
		} // End if

// Items
		for ($i=1; $i<=count($list); $i++) {

			printDirFileProperties($i, $list[$i], "hidden", "");

			if     ($copymovedelete == "copy" && $list[$i]['dirorfile']   == "d") { echo "Copy directory <b>" . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "move" && $list[$i]['dirorfile']   == "d") { echo "Move directory <b>" . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "delete" && $list[$i]['dirorfile'] == "d") { echo "Directory <b>"      . $list[$i]['dirfilename'] . "</b><br />\n"; }
			elseif ($copymovedelete == "copy" && $list[$i]['dirorfile']   == "-") { echo "Copy file <b>"      . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "move" && $list[$i]['dirorfile']   == "-") { echo "Move file <b>"      . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "delete" && $list[$i]['dirorfile'] == "-") { echo "File <b>"           . $list[$i]['dirfilename'] . "</b><br />\n"; }
			elseif ($copymovedelete == "copy" && $list[$i]['dirorfile']   == "l") { echo "Copy symlink <b>"   . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "move" && $list[$i]['dirorfile']   == "l") { echo "Move symlink <b>"   . $list[$i]['dirfilename'] . "</b> to:<br />\n"; }
			elseif ($copymovedelete == "delete" && $list[$i]['dirorfile'] == "l") { echo "Symlink <b>"        . $list[$i]['dirfilename'] . "</b><br />\n"; }

// Options

			echo "<input type=\"hidden\" name=\"list[$i][sourcedirectory]\" value=\"$directory\" />\n";

//    Copy or move: ask for options
			if ($copymovedelete != "delete") {
				echo "<table>\n";
				echo "<tr><td>\n";
				echo "Target directory: </td><td><input type=\"text\" class=\"longinput\" name=\"list[$i][targetdirectory]\" value=\"$directory\" />\n";

				printDirectoryTreeLink($directory, "CopyMoveDeleteForm.elements[\'list[$i][targetdirectory]\']");

				echo "</td></tr>\n";
				echo "<tr><td>Target name:      </td><td><input type=\"text\" class=\"input\" name=\"list[$i][newname]\" value=\"" . $list[$i]['dirfilename'] . "\" /></td></tr>\n";
				echo "</table><br />\n";
			}

		} // End for
		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Show result
// -------------------------------------------------------------------------
	elseif ($formresult == "result") {

		printBack($directory);

		echo "<b><u>Processing the entries:</u></b> <br />\n";

// Open connection to the source server
		setStatus_php("Connecting to the FTP server");
		$resultArray = ftp_openconnection();
		$conn_id_source = getResult($resultArray);
		if ($conn_id_source == false)  { printErrorMessage($resultArray, "exit", ""); }

// Open connection to the target server, if it is different from the source server, or if the username
// is different (different users may have different authorizations on the same FTP server)
		if (($input_ftpserver2 != $net2ftp_ftpserver) || ($input_username2 != $net2ftp_username)) {
			$resultArray = ftp_openconnection2();       // Note: ftp_openconnection2 cleans the input values
			$conn_id_target = getResult($resultArray);
			if ($conn_id_target == false)  { printErrorMessage($resultArray, "exit", ""); }
		}
		else { $conn_id_target = $conn_id_source; }

// Copy, move or delete the files and directories
		setStatus_php("Processing the entries");
		ftp_copymovedelete($conn_id_source, $conn_id_target, $list, $copymovedelete, 0);

// Close the connection to the source server
		ftp_closeconnection($conn_id_source);

// Close the connection to the target server, if it is different from the source server
		if ($conn_id_source != $conn_id_target) { $resultArray = ftp_closeconnection($conn_id_target); }

	} // End if elseif (form or result)

	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";

} // End function copymovedeleteentry

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function newdirectory($directory, $newNames, $formresult) {


// --------------
// This function allows to make a new directory
// --------------

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	printTitle("Create new directories");

	if (strlen($directory) > 0) { $printdirectory = $directory; }
	else                        { $printdirectory = "/"; }

// -------------------------------------------------------------------------
// Show form
// -------------------------------------------------------------------------

	if ($formresult != "result") {
		echo "<form name=\"NewForm\" id=\"NewForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"newdirectory\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "NewForm");
		printForwardInForm("NewForm");

		echo "The new directories will be created in <b>$printdirectory</b>.<br /><br />\n";

		for ($k=1; $k<=5; $k++) {
			echo "New directory name: <input type=\"text\" class=\"input\" name=\"newNames[$k]\" /><br /><br />\n";
		} // End for

		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Show result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printBack($directory);

// Open connection
		setStatus_php("Connecting to the FTP server");
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false)  { printErrorMessage($resultArray, "exit", ""); }

// Create new directories
		setStatus_php("Processing the entries");
		for ($k=1; $k<=count($newNames); $k++) {
			if (strlen($newNames[$k]) > 0) {
				$newsubdir = glueDirectories($directory, $newNames[$k]);		// filesystem.inc.php
				$resultArray = ftp_newdirectory($conn_id, $newsubdir);
				$success = getResult($resultArray);
				if ($success == false)  { printErrorMessage($resultArray, "", ""); }
				else { echo "Directory <b>$newNames[$k]</b> was successfully created.<br />"; }
			} // End if
		} // End for

// Close connection
		ftp_closeconnection($conn_id);

	} // End if elseif (form or result)

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function newdirectory

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function view($directory, $entry) {

// --------------
// This function allows to view a file
// --------------

	echo "<div style=\"margin-left: 30px;\">\n";
	printTitle("View file $entry");
	printBack($directory);
	echo "</div>\n";

	$resultArray = ftp_readfile("", $directory, $entry);
	$text = getResult($resultArray);
	if ($text == false)  { printErrorMessage($resultArray, "exit", ""); }

	printCode($directory, $entry, $text);

} // End function view

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function edit($directory, $entry, $text, $wysiwyg, $formresult) {

// --------------
// This function allows to edit a file in a regular textarea
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
global $state2;
global $application_rootdir;

// -------------------------------------------------------------------------
// First step: show edit form
// -------------------------------------------------------------------------
	if ($formresult != "result") {
		if ($state2 == "edit") {
			$resultArray = ftp_readfile("", $directory, $entry);
			$text_fromfile = getResult($resultArray);
			if ($text_fromfile == false)  { echo printErrorMessage($resultArray, "exit", ""); }
		}
		elseif ($state2 == "newfile") {
			$handle = fopen("$application_rootdir/template.txt", "r"); // Open the local template file for reading only
			if ($handle == false) { echo "Unable to open the temporary file"; exit(); }

			clearstatcache(); // for filesize

			$text_fromfile = fread($handle, filesize("$application_rootdir/template.txt"));
			if ($text_fromfile == false) { echo "Unable to read the temporary file"; exit(); }


			$success1 = fclose($handle);
//			if ($success1 == false) { echo "Unable to close the temporary file"; }

		}

		printEditForm($directory, $entry, $text_fromfile, $wysiwyg, "notsavedyet");

	}
// -------------------------------------------------------------------------
// Second step: save to remote file, and show View/Edit screen
// -------------------------------------------------------------------------
	elseif ($formresult == "result") {
		if (strlen($entry)<1) { $resultArray['message'] = "Please specify a filename.\n"; printErrorMessage($resultArray, "exit", ""); }

		$resultArray = ftp_writefile("", $directory, $entry, $text);
		$success_save = getResult($resultArray);
		if ($success_save == false)  { printErrorMessage($resultArray, "exit", ""); }

		printEditForm($directory, $entry, $text, $wysiwyg, $success_save);
	}

} // End function edit

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printCode($directory, $entry, $text) {

// --------------
// This function prints the code with syntax highlighting
// For HTML files, a custom highlighter is used (written by Slynderdale)
// For other files, the standard PHP function is used
// --------------

	$ext = get_filename_extension($entry);

	echo "<div class=\"view\">\n";
	echo "<!-- -------------------- Start of code -------------------- -->\n";

// HTML files use the custom highligher
// Other files use the standard PHP function
	if ($ext == "htm" || $ext == "html") { $text = highlight_html($text); }
	else if (substr($ext,0,3) == "php") { $text = format_php($text); }
	else { $text = number_line($text); }
  echo $text;

	echo "<!-- -------------------- End  of code  -------------------- -->\n";
	echo "</div>\n";

} // End function printCode

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function highlight_html($html,$linenumber=true) {

  // --------------
  // This is the HTML highlighter written by Slynderdale
  // --------------

  $html = trim($html);
  if (!$html) return $html;
  $html = htmlentities($html);
  if ($linenumber==true) {
    $lines_array = explode("\n",$html);
    $linecount = count($lines_array);
    $space = "";
    for ($l=0;$l<strlen($linecount);$l++) $space .= "0";
    $space_lenth = strlen($space);
    for($i=0;$i<$linecount;$i++) {
      $line = $i+1;
      $linespace = "";
      $line_length = strlen($line);
      if (($space_lenth-$line_length) > 0) {
        $linespace = substr($space,0,$space_lenth-$line_length);
      }
      $line_number = $linespace.$line;
      $lines[$i] = "<font color=\"#000000\">".$line_number.":</font>&nbsp;".$lines_array[$i];
    }
    $html = implode("\n",$lines);
  }
  $html = wordwrap($html,130);
  $regexfind = array(
  '#<br( /)?>#siU',
  '#(&amp;\w+;)#esiU',
  '#(&lt;\!--)(.+)?(--&gt;)#esiU',
  '#&lt;(.*)&gt;#esiU'
  );
  $regexreplace = array(
  '',
  "_dogethtml('\\1','entity')",
  "_dogethtml('\\0','comment')",
  "_dohtmltag('\\1')"
  );
  $html = _dogethtml(preg_replace($regexfind, $regexreplace, $html),'html');
  $html = str_replace(array("\r\n","\r","\n"),array("\n","\n","\r\n"),$html);

  return $html;

} // end function highlight_html

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function _dohtmltag($tag) {

// --------------
// Written by Slynderdale
// --------------

	if (substr(trim($tag),0,3) != "!--") {
		$spacepos = strpos($tag,' ');
		if ($spacepos != false) {
			$tagname = substr($tag, 0, $spacepos);
			$tag = preg_replace('#([\s])([\w\-]+)=#esiU', "_dogethtml('\\1\\2=','keyword')", $tag);
			$tag = preg_replace("#(&quot;|')(.*)\\1#esiU", "_dogethtml('\\0','string')", $tag);
		} else {
			$tagname = $tag;
		}
		$letter = substr($tagname,0,1);
		if ($letter == '/' or $letter == '!' or $letter == '?') {
			$tagname = substr($tagname, 1);
		}
		$tagname = strtolower($tagname);
		$tag = _dogethtml("&lt;".$tag."&gt;",'tag',$tagname);
		return $tag;
	}

	return "&lt;".$tag."&gt;";

} // end function _dohtmltag

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function _dogethtml($html,$key='',$tag='') {

// --------------
// Written by Slynderdale
// --------------

// Get the colors to use for highlighting
// The function getHtmlColors is located in skins.inc.php
	$html_highlight = getHtmlColors();

	$key = trim(strtolower($key));
	if (!$key) $key = 'default';
	if (trim($html) and trim($html_highlight[$key][format])) {
		if ($key == 'tag') {
			$tag = trim(strtolower($tag));
			if (!$tag) $tag = $html;
			$color = $html_highlight[$key][color];
			$count = $html_highlight[$key][count];
			for($i=0;$i<$count;$i++) {
				$tags = $html_highlight[$key][$i][tags];
				if (in_array($tag,$tags)) {
					$color = $html_highlight[$key][$i][color];
					break;
				}
			} // end for
		} else {
			$color = $html_highlight[$key][color];
		}
		$format = $html_highlight[$key][format];
		$html = str_replace(array('{color}','{html}'),array("$color","$html"),$format);
	}

  return $html;

} // end function _dogethtml

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printEditForm($directory, $entry, $text, $wysiwyg, $success_save) {

// --------------
// This function prints the form containing the textarea in which text is edited
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $state, $state2;
	global $browser_agent, $browser_version;

	$edit_nrofcolumns         = getSetting("edit_nrofcolumns");
	$edit_nrofrows            = getSetting("edit_nrofrows");
	$edit_nrofcolumns_wysiwyg = getSetting("edit_nrofcolumns_wysiwyg");
	$edit_nrofrows_wysiwyg    = getSetting("edit_nrofrows_wysiwyg");

	$text = htmlspecialchars($text, ENT_QUOTES);

	if (strlen($directory) > 0) { $printdirectory = $directory; }
	else                        { $printdirectory = "/"; }


// Bookmark
//	echo "<div style=\"text-align: right;\">\n";
//	printBookmarkLink();
//	echo "</div>\n";

	echo "<form name=\"EditForm\" id=\"EditForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"edit\" />\n";
	echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
	echo "<input type=\"hidden\" name=\"entry\" value=\"$entry\" />\n";
	echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
	echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
  echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";

	if ($wysiwyg != "wysiwyg") {     echo "<input type=\"hidden\" name=\"wysiwyg\" value=\"plain\" />\n"; }
	elseif ($wysiwyg == "wysiwyg") { echo "<input type=\"hidden\" name=\"wysiwyg\" value=\"wysiwyg\" />\n"; }

//	echo "<table style=\"padding: 2px; width: 90%; height: 100%;\" border=\"0\">\n";
	echo "<table style=\"padding: 2px; width: 100%; height: 100%; border: 0px;\">\n";

// Row 1, Col1: Buttons (back and save)
//---------------------------------------
	echo "<tr>\n";
	echo "<td valign=\"top\" style=\"text-align: left; width: 20%;\">\n";

// Back
	echo getAction("back", "document.EditForm.state.value='browse'; document.EditForm.state2.value='main'; document.EditForm.submit();") . "&nbsp;\n";

// Save
	echo getAction("save", "document.EditForm.submit();") . "\n";

	echo "</td>\n";

// Row 1, Col2: Directory and Filename
//------------------------------------
	echo "<td valign=\"top\" style=\"text-align: left; width: 40%;\">\n";
  // Edit ==> print filename
	if ($state2 == "edit" || $state2 == "updatefile") {
		echo "<table border=\"0\">\n";
		echo "<tr><td valign=\"top\">Directory:</td><td><b>$printdirectory</b></td></tr>\n";
		echo "<tr><td valign=\"top\">File:</td><td><b>$entry</b></td></tr>\n";
		echo "</table>\n";
	}
  // Newfile ==> print new filename textbox
	elseif ($state2 == "newfile") {
		echo "<table>\n";
		echo "<tr><td valign=\"top\">Directory:</td><td><b>$printdirectory</b></td></tr>\n";
		echo "<tr><td valign=\"top\">New file name:</td><td> <input class=\"input\" type=\"text\" name=\"entry\" /></td></tr>\n";
		echo "</table>\n";
	}
	echo "</td>\n";

// Row 1, Col3
//---------------------------------------
	echo "<td valign=\"top\" style=\"text-align: right; width: 40%;\">\n";

// Plain or WYSIWYG, only for IE 5.5 and 6.0
	if (($browser_agent == "IE" && ($browser_version == "5.5" || $browser_version == "6.0")) || ($browser_agent == "Mozilla" && ($browser_version == "1.3" || $browser_version == "1.4"))) {
		echo "Textarea type: &nbsp; ";
		if ($wysiwyg != "wysiwyg") {
			echo "<b>Plain</b> | <a href=\"javascript: document.EditForm.wysiwyg.value='wysiwyg'; document.EditForm.submit();\">WYSIWYG</a>\n";
		}
		elseif ($wysiwyg == "wysiwyg") {
			echo "<a href=\"javascript: document.EditForm.wysiwyg.value='plain'; document.EditForm.submit();\">Plain</a> | <b>WYSIWYG</b>\n";
		}
		echo "<div style=\"font-size: 60%;\">Switching the textarea type will save the changes</div>";
	}

	echo "</td>\n";

	echo "</tr>\n";

// Row 2: Saving-status
//---------------------------------------
	$ftpmode = ftpAsciiBinary($entry);
	if ($ftpmode == FTP_ASCII) { $printftpmode = "FTP_ASCII"; }
	elseif ($ftpmode == FTP_BINARY) { $printftpmode = "FTP_BINARY"; }

	echo "<tr>\n";
	echo "<td colspan=\"3\" valign=\"top\" style=\"text-align: left;\">\n";
	if ($success_save === "notsavedyet") { echo "<div style=\"font-size: 70%;\">Status: This file has not yet been saved</div>\n"; }
	elseif ($success_save === true)      { echo "<div style=\"font-size: 70%;\">Status: Saved on <b>" . mytime() . "</b> using mode " . $printftpmode . "</div>\n"; }
	elseif ($success_save === false)     { echo "<div style=\"font-size: 70%;\">Status: <b>This file could not be saved</b></div>\n"; }
	echo "</td>\n";
	echo "</tr>\n";

// Row 3: Textarea
//----------------------
	echo "<tr>\n";
	echo "<td colspan=\"3\" valign=\"top\" style=\"text-align: left;\">\n";

// Normal textarea
	echo "<div style=\"margin-left: 0px; text-align: left;\">\n";

	if ($wysiwyg != "wysiwyg") {
		echo "\n\n<!-- -------------------- Start of code -------------------- -->\n";
		echo "<textarea name=\"text\" class=\"edit\" rows=\"$edit_nrofrows\" cols=\"$edit_nrofcolumns\" wrap=\"off\">\n";
		echo "$text";  // do not add a \n at the end, this would add a final newline at the end of each file!!
		echo "</textarea>\n";
		echo "<!-- -------------------- End  of code  -------------------- -->\n\n\n";
	}
	elseif ($wysiwyg == "wysiwyg") {
		echo "\n\n<!-- -------------------- Start of code -------------------- -->\n";
		echo "<textarea name=\"text\" class=\"edit\" rows=\"$edit_nrofrows_wysiwyg\" cols=\"$edit_nrofcolumns_wysiwyg\" wrap=\"off\">\n";
		echo "$text";  // do not add a \n at the end, this would add a final newline at the end of each file!!
		echo "</textarea>\n";
		echo "<!-- -------------------- End  of code  -------------------- -->\n\n\n";
		echo "<script type=\"text/javascript\" defer> editor_generate('text'); </script>\n";
	}


	echo "</div>\n";
	echo "</td>\n";
	echo "</tr>\n";

	echo "</table>\n";
	echo "</form>\n";

} // End function printEditForm

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

// function newfile()
//
//    is now implemented using the edit() function
//

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function uploadfile($directory, $uploadedFilesArray, $uploadedArchivesArray, $use_folder_names, $formresult) {

// --------------
// This function allows to upload a file to a directory
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $application_tempdir;

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {

		printTitle("Upload files and archives");
		printUploadForm($directory);

	} // end if (show form, show result)

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------
	else {

// -------------------------------------------------------------------------
// Results
// -------------------------------------------------------------------------

		printTitle("Upload results");

		printBack($directory);

		echo "<table style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 10px; margin-right: 100px; margin-bottom: 30px;\">\n";
		echo "<tr>\n";
		echo "<td>\n";

// ---------------------------------------
// Check the files and move them to the net2ftp temp directory
// The .txt extension is added
// ---------------------------------------
		if (sizeof($uploadedFilesArray) > 0 || sizeof($uploadedArchivesArray) > 0) {
			setStatus_php("Checking files");

			echo "<b><u>Checking files:</u></b> <br />\n";
			echo "<ul>\n";
			if (sizeof($uploadedFilesArray) > 0) {
				$resultArray = acceptFiles($uploadedFilesArray, $application_tempdir);
				$acceptedFilesArray = getResult($resultArray);
				if ($acceptedFilesArray == false)  { printErrorMessage($resultArray, "exit", ""); }
			}
			if (sizeof($uploadedArchivesArray) > 0) {
				$resultArray = acceptFiles($uploadedArchivesArray, $application_tempdir);
				$acceptedArchivesArray = getResult($resultArray);
				if ($acceptedArchivesArray == false)  { printErrorMessage($resultArray, "exit", ""); }
			}
			echo "</ul>\n";
		}

// ---------------------------------------
// Transfer files
// ---------------------------------------
		if ($acceptedFilesArray != "all_uploaded_files_are_too_big" && sizeof($acceptedFilesArray) > 0) {
			setStatus_php("Transferring files to the FTP server");

			echo "<b><u>Transferring files to the FTP server:</u></b> <br />\n";
			echo "<ul>\n";

			$resultArray = ftp_transferfiles($acceptedFilesArray, $application_tempdir, $directory);
			$result3 = getResult($resultArray);
			if ($result3 == false)  { printErrorMessage($resultArray, "", ""); }

			echo "</ul>\n";
		}

// ---------------------------------------
// Unzip archives and transfer the files (create subdirectories if needed)
// ---------------------------------------
		if ($acceptedArchivesArray != "all_uploaded_files_are_too_big" && sizeof($acceptedArchivesArray) > 0) {
			setStatus_php("Decompressing archives and transferring files");

			echo "<b><u>Decompressing archives and transferring files to the FTP server:</u></b> <br />\n";
			echo "<ul>\n";

			$resultArray = ftp_unziptransferfiles($acceptedArchivesArray, $use_folder_names, $application_tempdir, $directory);
			$result4 = getResult($resultArray);
			if ($result4 == false)  { printErrorMessage($resultArray, "", ""); }

			echo "</ul>\n";
		}

		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";


// -------------------------------------------------------------------------
// Upload more files
// -------------------------------------------------------------------------
		printTitle("Upload more files and archives");
		printUploadForm($directory);

	} // end else

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function uploadfile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printUploadForm($directory) {

// --------------
// This function prints the upload form
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------

	$max_upload_size    = getSetting("max_upload_size");
	$nr_upload_files    = getSetting("nr_upload_files");
	$nr_upload_archives = getSetting("nr_upload_archives");

	$max_upload_size_MB = $max_upload_size / 1000;
	$max_execution_time = ini_get("max_execution_time");
	if (strlen($directory) > 0) { $printdirectory = $directory; }
	else                        { $printdirectory = "/"; }

	echo "<form name=\"UploadForm\" id=\"UploadForm\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . printPHP_SELF("no") . "\">\n";

	printBackInForm($directory, "UploadForm");
	echo getAction("forward", "createUploadWindow(); document.UploadForm.submit();") . "<br /><br />\n";

// Directory
	echo "Upload to directory: <input type=\"text\" class=\"longinput\" name=\"directory\" value=\"$printdirectory\" />\n";
	printDirectoryTreeLink($directory, "UploadForm.directory");
	echo "<br /><br />\n";

	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"uploadfile\" />\n";
	echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
	echo "<input type=\"hidden\" name=\"max_file_size\" value=\"$max_upload_size\" />\n"; // in bytes, advisory to browser, easy to circumvent; see also below, in PHP code!
	echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
  echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";

	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	echo "<tr>\n";

// Titles
	echo "<td valign=\"top\" width=\"50%\">\n";
	echo "<div class=\"header31\">Files</div>";
	echo "<div style=\"font-size: 80%;\">Files entered here will be transferred to the FTP server.</div><br />\n";
	echo "</td>\n";
	echo "<td valign=\"top\" width=\"50%\">\n";
	echo "<div class=\"header31\">Archives (zip, tar, tgz, gz)</div>";
	echo "<div style=\"font-size: 80%;\">Archives entered here will be decompressed, and the files inside will be transferred to the FTP server.</div><br />\n";
	echo "</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td valign=\"top\" width=\"50%\">\n";

// Files
	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	for ($i=1; $i<=$nr_upload_files; $i=$i+1) {
		echo "<tr><td>File $i: </td><td> <input type=\"file\" class=\"uploadinputbutton\" maxsize=\"$max_upload_size\" name=\"file" . $i . "\" /></td></tr>\n";
	}
	echo "</table>";
	echo "<br />\n";

	echo "</td>\n";


// Archives
	echo "<td valign=\"top\" width=\"50%\">\n";

	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	for ($i=1; $i<=$nr_upload_archives; $i=$i+1) {
		echo "<tr><td>Archive $i: </td><td><input type=\"file\" class=\"uploadinputbutton\" name=\"archive" . $i . "\" /></td></tr>\n";
	}
	echo "</table>";
	echo "<br /><div style=\"font-size: 80%;\"><input type=\"checkbox\" name=\"use_folder_names\" value=\"yes\" checked/> Use folder names (creates subdirectories automatically)</div><br />\n";


	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";

	echo "</form>\n";


	echo "<u>Restrictions:</u>\n";
	echo "<div style=\"font-size: 80%\">\n";
	echo "<ul>\n";
	echo "	<li> The maximum size of one file is <b>$max_upload_size_MB kB</b></li>\n";
	echo "	<li> The maximum execution time is <b>$max_execution_time seconds</b></li>\n";
	echo "	<li> The FTP transfer mode (ASCII or BINARY) will be automatically determined, based on the filename extension\n";
	echo "	<li> If the destination file already exists, it will be overwritten</li>\n";
	echo "</ul>\n";
	echo "</div><br />\n";

} // End function printUploadForm

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function zipentry($directory, $list, $zipactions, $newNames, $to, $message, $formresult) {

// --------------
// This function allows to rename a directory or file $entry to $newentry
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
global $REMOTE_ADDR, $HTTP_REFERER, $application_tempzipdir;

$email_feedback = getSetting("email_feedback");

// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	printTitle("Zip entries");


// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {
		echo "<form name=\"ZipForm\" id=\"ZipForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"zip\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "ZipForm");
		printForwardInForm("ZipForm");

// --------------------
// Save
// --------------------
		echo "<div style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 10px; margin-right: 100px; margin-bottom: 10px;\">\n";

		$zipfilename = get_filename_name($list[1]['dirfilename']) . ".zip";
		echo "<input type=\"checkbox\" name=\"zipactions[save]\" value=\"yes\" /> Save the zip file on the FTP server as: <input type=text class=\"input\" name=\"zipactions[save_filename]\" value=\"$zipfilename\">\n";
		echo "</div> &nbsp; \n";

// --------------------
// Email
// --------------------
		echo "<div style=\"border-color: #000000; border-style: solid; border-width: 1px; padding: 10px; margin-right: 100px; margin-bottom: 10px;\">\n";
		echo "<input type=\"checkbox\" name=\"zipactions[email]\" value=\"yes\" /> Email the zip file in attachment to: <input type=\"text\" class=\"input\" name=\"zipactions[email_to]\" value=\"\" /><br /><br />\n";
		echo "Note that sending files is not anonymous: your IP address as well as the time of the sending will be added to the email.<br /><br />\n";

// Additional comments
		echo "Some additional comments to add in the email:<br />\n";
		echo "<textarea name=\"message\" class=\"edit\" rows=\"5\" cols=\"60\" wrap=\"off\">\n";
		echo "</textarea>\n";

		echo "</div>\n";

// --------------------
// List of directories and files
// --------------------
//		echo "<br />Selected directories and files:<br />\n";
		for ($i=1; $i<=count($list); $i++) {
			printDirFileProperties($i, $list[$i], "hidden", "");
//			echo $list[$i]['dirfilename'] . "<br />\n";
		} // End for

		echo "</form>\n";
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printBack($directory);

// --------------------
// Check the input data
// --------------------
// Filename
		if ($zipactions['save'] == "yes" && $zipactions['save']['filename'] == "") {
			$resultArray['message'] = "You did not enter a filename for the zipfile. Go back and enter a filename.<br />";
			printErrorMessage($resultArray, "exit", "");
		}

// Email address
		if ($zipactions['email'] == "yes" && checkEmailAddress($zipactions['email_to']) == false) {
			$resultArray['message'] = "The email address you have entered (" . $zipactions['email_to'] . ") does not seem to be valid.<br />Please enter an address in the format <b>username@domain.com</b><br />";
			printErrorMessage($resultArray, "exit", "");
		}

// --------------------
// Execute the function
// --------------------
		setStatus_php("Processing the entries");
		$zipactions['download'] == "no";
		ftp_zip("", $directory, $list, $zipactions, "", 0);
	}

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function zipentry

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function calculatesize($directory, $list) {

// --------------
// This function calculates the size taken by the selected directories and files
// The directories are processed recursively
// --------------

// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";
	printTitle("Size of selected directories and files");

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

// No form


// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	printBack($directory);

// Open connection
	setStatus_php("Connecting to the FTP server");
	$resultArray = ftp_openconnection();
	$conn_id = getResult($resultArray);
	if ($conn_id == false) { printErrorMessage($resultArray, "exit", ""); }

// Calculate the size
	$options = array();
	$result['size'] = 0;
	$result['skipped'] = 0;
	$result = ftp_processfiles("calculatesize", $conn_id, $directory, $list, $options, $result, 0);

// Close connection
	ftp_closeconnection($conn_id);

// Print message
	echo "The total size taken by the selected directories and files is: <b>" . formatFilesize($result['size']) . "</b> (" . $result['size'] . " Bytes) <br /><br />\n";

	if ($statistics['skipped'] > 0) {
		echo "The nr of files which were skipped: <b>" . $result['skipped'] . "</b><br /><br />\n";
	}

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

} // End function calculatesize

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function findstring($directory, $list, $searchoptions, $formresult) {

// --------------
// This function finds the files which contain a particular word
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------

	$heading_bgcolor     = getSkinColors("heading_bgcolor");

	printFunctionTags("findstring", "begin");


// -------------------------------------------------------------------------
// Table begin
// -------------------------------------------------------------------------
	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------

	if ($formresult != "result") {
		printTitle("Search directories and files");
		printFindstringForm($directory, $list, $searchoptions);
	}

// -------------------------------------------------------------------------
// Result
// -------------------------------------------------------------------------

	elseif ($formresult == "result") {

		printTitle("Search results");
		printBack($directory);

// Perl regular expression help:
// http://www.wdvl.com/Authoring/Languages/Perl/PerlfortheWeb/pattern_matching.html
// http://www.wdvl.com/Authoring/Languages/Perl/PerlfortheWeb/perlintro2_table1.html
// http://theoryx5.uwinnipeg.ca/CPAN/perl/pod/perlfaq6-full.html

// ------------
// CHECKS
// ------------
// Check if $searchoptions['string'] is a valid string
		if (is_string($searchoptions['string']) == false) { $resultArray['message'] = "Please enter a valid search word or phrase."; printErrorMessage($resultArray, "exit", ""); }

// Check if $searchoptions['filename'] is a valid filename with a possible wildcard character *
		if (preg_match("/^[a-zA-Z0-9_ *\.-]*$/", $searchoptions['filename']) == 0) { $resultArray['message'] = "Please enter a valid filename."; printErrorMessage($resultArray, "exit", ""); }

// Check if $searchoptions['size_from'] and $searchoptions['size_to'] are valid numbers
		if (is_numeric($searchoptions['size_from']) == false) { $resultArray['message'] = "Please enter a valid file size in the \"from\" textbox, for example 0."; printErrorMessage($resultArray, "exit", ""); }
		if (is_numeric($searchoptions['size_to']) == false)   { $resultArray['message'] = "Please enter a valid file size in the \"to\" textbox, for example 500000."; printErrorMessage($resultArray, "exit", ""); }

// Check if $searchoptions['modified_from'] and $searchoptions['modified_to'] are valid dates
		if (preg_match("/^[0-9-]*$/", $searchoptions['modified_from']) == 0) { $resultArray['message'] = "Please enter a valid date in Y-m-d format in the \"from\" textbox."; printErrorMessage($resultArray, "exit", ""); }
		if (preg_match("/^[0-9-]*$/", $searchoptions['modified_to']) == 0)   { $resultArray['message'] = "Please enter a valid date in Y-m-d format in the \"to\" textbox."; printErrorMessage($resultArray, "exit", ""); }
// ------------
// CONVERSIONS
// ------------
// Convert the wildcard character * in the filename by the wildcard .* that can be read by preg_match
		$searchoptions['filename'] = str_replace("*", ".*", $searchoptions['filename']);

// Convert the mtime to a unix timestamp
		$searchoptions['modified_from'] = strtotime($searchoptions['modified_from']);
		$searchoptions['modified_to'] = strtotime($searchoptions['modified_to']);

// Open connection
		setStatus_php("Connecting to the FTP server");
		$resultArray = ftp_openconnection();
		$conn_id = getResult($resultArray);
		if ($conn_id == false) { printErrorMessage($resultArray, "exit", ""); }

// Find the files
		$result = array();
		setStatus_php("Searching the files...");
		$result = ftp_processfiles("findstring", $conn_id, $directory, $list, $searchoptions, $result, 0);

// Close connection
		ftp_closeconnection($conn_id);

// Print result
		if (count($result) == 0) {
			echo "The word <b>" . $searchoptions['string'] . "</b> was not found in the selected directories and files.<br /><br />\n";
			printTitle("Search again");
			printFindstringForm($directory, $list, $searchoptions);
		}
		else {
			echo "The word <b>" . $searchoptions['string'] . "</b> was found in the following files:<br /><br />\n";

			echo "<form name=\"BrowseForm\" id=\"BrowseForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
			printLoginInfo();
			echo "<input type=\"hidden\" name=\"state\" />\n";
			echo "<input type=\"hidden\" name=\"state2\" />\n";
			echo "<input type=\"hidden\" name=\"directory\" />\n";
			echo "<input type=\"hidden\" name=\"entry\" />\n";
			echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
      echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";

			echo "<script type=\"text/javascript\"><!--\n";
			echo "function submitBrowseForm(directory, entry, state, state2) {\n";
			echo "	document.BrowseForm.state.value=state;\n";
			echo "	document.BrowseForm.state2.value=state2;\n";
			echo "	document.BrowseForm.directory.value=directory;\n";
			echo "	document.BrowseForm.entry.value=entry;\n";
			echo "	document.BrowseForm.submit();\n";
			echo "}\n"; // End javascript function submitBrowseForm
			echo "//--></script>\n";

			echo "<table cellpadding=\"2\" style=\"border: 2px solid $heading_bgcolor;\">\n";
			echo "	<tr class=\"browse_rows_heading\">\n";
			echo "		<td>File</td>\n";
			echo "		<td>Line</td>\n";
			echo "		<td colspan=\"2\">Action</td>\n";
			echo "	</tr>\n";

			$rowcounter = 0;

			for ($k=0; $k<count($result); $k++) {
				$rowcounter = $rowcounter + 1;
				if ($rowcounter % 2 == 1) { $thisrow_class = "browse_rows_odd";  }
				if ($rowcounter % 2 == 0) { $thisrow_class = "browse_rows_even"; }

				echo "	<tr class=\"$thisrow_class\">\n";
				echo "		<td>" . glueDirectories($result[$k]['directory'], $result[$k]['dirfilename']) . "</td>\n";
				echo "		<td>" . $result[$k]['line'] . "</td>\n";
				$dirfilename    = $result[$k]['dirfilename'];
				$directory_js   = javascriptEncode($result[$k]['directory']);
				$dirfilename_js = javascriptEncode($result[$k]['dirfilename']);
				echo "		<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'view');\"           title=\"View the highlighted source code of file $dirfilename\" style=\"cursor: pointer; cursor: hand;\">View</td>\n";
				echo "		<td onClick=\"submitBrowseForm('$directory_js', '$dirfilename_js', 'manage', 'edit');\"           title=\"Edit the source code of file $dirfilename\" style=\"cursor: pointer; cursor: hand;\">Edit</td>\n";
				echo "	</tr>\n";
			} // end for
			echo "</table>\n";
			echo "</form>\n";
			echo "<br /><br />\n";

			printTitle("Search again");
			printFindstringForm($directory, $list, $searchoptions);

		}

	} // End if elseif (form or result)

	echo "</tr>\n";
	echo "</td>\n";
	echo "</table>\n";

	printFunctionTags("findstring", "end");

} // End function findstring

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printFindstringForm($directory, $list, $searchoptions) {


// --------------
// This function prints the search form
// --------------

	echo "<form name=\"FindStringForm\" id=\"FindStringForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"findstring\" />\n";
	echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
	echo "<input type=\"hidden\" name=\"formresult\" value=\"result\" />\n";
	echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
  echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
	printBackInForm($directory, "FindStringForm");
	printForwardInForm("FindStringForm");

	for ($i=1; $i<=count($list); $i++) {
		printDirFileProperties($i, $list[$i], "hidden", "");
	} // End for

	echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" style=\"margin-left: 20px;\">\n";
// Search string
	if ($searchoptions['case_sensitive'] == "yes") { $checked_case_sensitive = "checked"; }
	echo "	<tr>\n";
	echo "		<td valign=\"top\">Search for a word or phrase</td>\n";
	echo "		<td valign=\"top\"><input type=\"text\" class=\"input\" name=\"searchoptions[string]\" value=\"" . $searchoptions['string'] . "\" /><br />\n";
	echo "					<input type=\"checkbox\" name=\"searchoptions[case_sensitive]\" value=\"yes\" $checked_case_sensitive/> Case sensitive search </td>\n";
	echo "	</tr>\n";

	echo "	<tr>\n";
	echo "		<td colspan=\"2\">Restrict the search to: </td>\n";
	echo "	</tr>\n";
// Filename
	$searchoptions['filename'] = str_replace(".*", "*", $searchoptions['filename']);
	if ($searchoptions['filename'] == "") { $searchoptions['filename'] = "*.*"; }
	echo "	<tr>\n";
	echo "		<td> &nbsp; files with a filename like</td>\n";
	echo "		<td><input type=\"text\" class=\"input\" name=\"searchoptions[filename]\" value=\"" . $searchoptions['filename'] . "\" /> (wildcard character is *) </td>\n";
	echo "	</tr>\n";
// Size
	if ($searchoptions['size_from'] == "") { $searchoptions['size_from'] = 0; }
	if ($searchoptions['size_to'] == "")   { $searchoptions['size_to'] = 500000; }
	echo "	<tr>\n";
	echo "		<td> &nbsp; files with a size</td>\n";
	echo "		<td>from <input type=\"text\" class=\"input\" name=\"searchoptions[size_from]\" value=\"" . $searchoptions['size_from'] . "\" maxlength=\"7\" /> to <input type=\"text\" class=\"input\" name=\"searchoptions[size_to]\" value=\"" . $searchoptions['size_to'] . "\" maxlength=\"7\" /> Bytes</td>\n";
	echo "	</tr>\n";
// Modified
	if ($searchoptions['modified_from'] == "") { $searchoptions['modified_from'] = date("Y-m-d", time() - 3600*24*7); }
	else                                       { $searchoptions['modified_from'] = date("Y-m-d", $searchoptions['modified_from']); }
	if ($searchoptions['modified_to'] == "")   { $searchoptions['modified_to'] = date("Y-m-d"); }
	else                                       { $searchoptions['modified_to'] = date("Y-m-d", $searchoptions['modified_to']); }
	echo "	<tr>\n";
	echo "		<td> &nbsp; files which were last modified </td>\n";
	echo "		<td>from <input type=\"text\" class=\"input\" name=\"searchoptions[modified_from]\" value=\"" . $searchoptions['modified_from'] . "\" /> to <input type=\"text\" class=\"input\" name=\"searchoptions[modified_to]\" value=\"" . $searchoptions['modified_to'] . "\"/></td>\n";
	echo "	</tr>\n";

	echo "</table>\n";
	echo "</form>\n";

} // End function printFindstringForm

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function updatefile($directory, $entry, $uploadedFilesArray, $comparison, $screen) {

// --------------
// This function allows to merge 2 files
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------

	$max_upload_size    = getSetting("max_upload_size");
	$max_upload_size_MB = $max_upload_size / 1000;
	$max_execution_time = ini_get("max_execution_time");
	global $application_tempdir;

// -------------------------------------------------------------------------
// Initial checks
// -------------------------------------------------------------------------

	if ($screen == "") { $screen = "screen1"; }

// -------------------------------------------------------------------------
// Screen 1
// -------------------------------------------------------------------------
	if ($screen == "screen1") {

		echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
		echo "<tr>\n";
		echo "<td>\n";

		printTitle("Update file");

		echo "<form name=\"UpdateFileForm\" id=\"UpdateFileForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\" enctype=\"multipart/form-data\">\n";
		printLoginInfo();
		echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
		echo "<input type=\"hidden\" name=\"state2\" value=\"updatefile\" />\n";
		echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
		echo "<input type=\"hidden\" name=\"entry\" value=\"$entry\" />\n";
		echo "<input type=\"hidden\" name=\"screen\" value=\"screen2\" />\n";
		echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
    echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";
		printBackInForm($directory, "UpdateFileForm");
		printForwardInForm("UpdateFileForm");

		echo "<b>WARNING: THIS FUNCTION IS STILL IN EARLY DEVELOPMENT. USE IT ONLY ON TEST FILES! YOU HAVE BEEN WARNED!<br />\n";
		echo "Known bugs: - erases tab characters - doesn't work well with big files (> 50kB) - was not tested yet on files containing non-standard characters</b><br /><br /><br />\n";

		echo "This function allows you to upload a new version of the selected file, to view what are the changes and to accept or reject each change. Before anything is saved, you can edit the merged files.<br /><br /><br />\n";

		echo "Old file: <b>$entry</b> <br /><br />\n";
		echo "New file: <input type=\"file\" class=\"uploadinputbutton\" maxsize=\"$max_upload_size\" name=\"file1\" /> <br />\n";

		echo "</form>\n";

		echo "<u>Restrictions:</u>\n";
		echo "<div style=\"font-size: 80%\">\n";
		echo "<ul>\n";
		echo "	<li> The maximum size of one file is <b>$max_upload_size_MB kB</b></li>\n";
		echo "	<li> The maximum execution time is <b>$max_execution_time seconds</b></li>\n";
		echo "	<li> The FTP transfer mode (ASCII or BINARY) will be automatically determined, based on the filename extension\n";
		echo "</ul>\n";
		echo "</div><br />\n";

		echo "</tr>\n";
		echo "</td>\n";
		echo "</table>\n";

	} // end if ($screen == "screen1")

// -------------------------------------------------------------------------
// Screen 2
// -------------------------------------------------------------------------

	elseif ($screen == "screen2") {

		echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
		echo "<tr>\n";
		echo "<td>\n";

		printTitle("Update file");

// ---------------------------------------
// Upload the new file
// ---------------------------------------
		if (sizeof($uploadedFilesArray) > 0) {
			setStatus_php("Uploading new file");
			if (sizeof($uploadedFilesArray) > 0) {
				$resultArray = acceptFiles($uploadedFilesArray, $application_tempdir);
				$acceptedFilesArray = getResult($resultArray);
				if ($acceptedFilesArray != "" && $acceptedFilesArray == false)  { printErrorMessage($resultArray, "exit", ""); }
				$newfilename = $acceptedFilesArray[1]["tmp_name"];
			}
		}
		else {
			$resultArray['message'] = "You did not provide any files or archives to upload.";
			printErrorMessage($resultArray, "exit", "");
		}

// ---------------------------------------
// Read the old and the new file
// The old file is on the FTP server
// The new file is in the /temp directory of the web server
// ---------------------------------------

// New file
		setStatus_php("Reading the new file");

		$handle = fopen($newfilename, "r"); // Open the local template file for reading only
		if ($handle == false) { @unlink($newfilename); $resultArray = putResult(false, "", "fopen", "updatefile > fopen: newfilename=$newfilename.", "Unable to open the new file. Check the permissions of the net2ftp /temp directory.<br />"); printErrorMessage($resultArray, "exit", ""); }

		clearstatcache(); // for filesize

		$string_new = fread($handle, filesize($newfilename));
		if ($string_new == false && filesize($newfilename)>0) { @unlink($newfilename); $resultArray = putResult(false, "", "fread", "updatefile > fread: handle=$handle; newfilename=$newfilename.", "Unable to read the new file file<br />"); printErrorMessage($resultArray, "exit", ""); }

		$success1 = fclose($handle);
		if ($success1 == false) { @unlink($newfilename); $resultArray = putResult(false, "", "fclose", "updatefile > fclose: handle=$handle", "Unable to close the handle of the new file<br />"); printErrorMessage($resultArray, "exit", ""); }

		$success2 = unlink($newfilename);
		if ($success2 == false) { $resultArray = putResult(false, "", "unlink", "updatefile > unlink: newfilename=$newfilename.", "Unable to delete the new file<br />"); printErrorMessage($resultArray, "exit", ""); }
		registerTempfile("unregister", $newfilename);

// Old file
		setStatus_php("Reading the old file");

		$resultArray = ftp_readfile("", $directory, $entry);
		$string_old = getResult($resultArray);
		if ($string_old == false)  { printErrorMessage($resultArray, "exit", ""); }

// ---------------------------------------
// Compare files
// ---------------------------------------
		setStatus_php("Comparing the 2 files");

//	$resultArray = compareFiles($string_old, $string_new);
//	$comparison = getResult($resultArray);
//	if ($comparison == false) { printErrorMessage($resultArray, "exit", ""); }
		$comparison = compareFiles($string_old, $string_new);

// ---------------------------------------
// Print out the select
// ---------------------------------------
		setStatus_php("Printing the comparison");
		printComparisonSelect($comparison, $directory, $entry);

		echo "</tr>\n";
		echo "</td>\n";
		echo "</table>\n";

	} // end elseif ($screen == "screen2")

// -------------------------------------------------------------------------
// Screen 3
// -------------------------------------------------------------------------

	elseif ($screen == "screen3") {

// Merge strings based on the comparison array
		$string_merged = mergeStrings($comparison);

// Print the Edit form
		printEditForm($directory, $entry, $string_merged, "plain", "notsavedyet");

	} // end elseif ($screen == "screen3")


} // End function updatefile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function compareFiles($string_old, $string_new) {

// --------------
// This function compares a new file to an old file and indicates the changes
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
	global $application_tempdir;

// Explode them into separate lines
// Add a \n in the beginning of the strings so that the first line of the string would
// be in the first element of the exploded array
	$string_old_exploded = explode("\n", "\n" . $string_old);
	$string_new_exploded = explode("\n", "\n" . $string_new);

// Initialize the variables
	$line_old = 1;
	$line_new = 1;
	$line_total = 1;

// For each line in the new file...
// Note that the third argument of the for loop is not filled in; the index is incremented inside the for loop
	for ($line_new = 1; $line_new <= count($string_new_exploded);) {

// Check if the current new line is equal to the current old line

// If they are equal, then set the status to "unchanged"
		if (trim($string_new_exploded[$line_new]) == trim($string_old_exploded[$line_old])) {
			$string_old_change[$line_old] = "unchanged";
			$string_new_change[$line_new] = "unchanged";
			$comparison[$line_total]['string'] = $string_new_exploded[$line_new];
			$comparison[$line_total]['line_old'] = $line_old;
			$comparison[$line_total]['line_new'] = $line_new;
			$comparison[$line_total]['change'] = "unchanged";
			$line_old++;
			$line_new++;
			$line_total++;
		} // end if

// If the current new line is empty, then set its status directly as added
		elseif (trim($string_new_exploded[$line_new]) == "") {
			$string_new_change[$line_new] = "added";
			$comparison[$line_total]['string'] = $string_new_exploded[$line_new];
			$comparison[$line_total]['line_old'] = " ";
			$comparison[$line_total]['line_new'] = $line_new;
			$comparison[$line_total]['change'] = "added";
			$line_new++;
			$line_total++;
		}

// If the current old line is empty, then set its status directly as deleted
		elseif (trim($string_old_exploded[$line_old]) == "") {
			$string_old_change[$line_old] = "deleted";
			$comparison[$line_total]['string'] = $string_old_exploded[$line_old];
			$comparison[$line_total]['line_old'] = $line_old;
			$comparison[$line_total]['line_new'] = " ";
			$comparison[$line_total]['change'] = "deleted";
			$line_old++;
			$line_total++;
		}

		else {
// If they are not equal, then either lines have been deleted, or lines have been added
// 	nr of old lines "deleted" = occurence new line in old file - current old line
//    nr of new lines "added"   = occurence old line in new file - current new line
// The smallest nr of lines indicates which of the 2 is true

// Occurence of new line in old file
			$current_new_line = trim($string_new_exploded[$line_new]);
			$newline_in_oldfile = 0;
			for ($i = $line_old; ($i <= count($string_old_exploded) && $newline_in_oldfile == 0); $i++) {
				if (trim($string_old_exploded[$i]) == $current_new_line) { $newline_in_oldfile = $i; }
			} // end for Occurence of new line in old file

	// If the new line does not occur in the old file, then it is added
	// Set its status to "added"
	// Increase $lines_new
	// Do not search for the occurence of the old line in the new file; do not compare the nr of lines deleted versus added
			if ($newline_in_oldfile == 0) {
				$string_new_change[$line_new] = "added";
				$comparison[$line_total]['string'] = $string_new_exploded[$line_new];
				$comparison[$line_total]['line_old'] = " ";
				$comparison[$line_total]['line_new'] = $line_new;
				$comparison[$line_total]['change'] = "added";
				$line_new++;
				$line_total++;
			} // end if $newline_in_oldfile == 0

			else {
// Occurence of old line in new file
				$current_old_line = trim($string_old_exploded[$line_old]);
				$oldline_in_newfile = 0;
				for ($j = $line_new; ($j <= count($string_new_exploded) && $oldline_in_newfile == 0); $j++) {
					if (trim($string_new_exploded[$j]) == $current_old_line) { $oldline_in_newfile = $j; }
				} // end for Occurence of old line in new file

	// If the old line does not occur in the new file, then it is deleted
	// Set its status as "deleted"
	// Increase $lines_old
	// Do not compare the nr of lines deleted versus added
				if ($oldline_in_newfile == 0) {
					$string_old_change[$line_old] = "deleted";
					$comparison[$line_total]['string'] = $string_old_exploded[$line_old];
					$comparison[$line_total]['line_old'] = $line_old;
					$comparison[$line_total]['line_new'] = " ";
					$comparison[$line_total]['change'] = "deleted";
					$line_old++;
					$line_total++;
				} // end if $oldline_in_newfile == 0

				else {
// -------------------------------------------------------------------------
// If the new line occurs in the old file, and the old line occurs also in the new file,
// then either lines have been added, either lines have been deleted.
// For example:
//    Old file: 1 2 3 4 5
//    New file: 1 5 6 5 2 3 4 5
//    ==> Are lines 2 3 4 deleted, or are lines 5 6 5 added?
// Compare how many lines have been added versus deleted, and take the option with the smallest nr
//					$deleted = $newline_in_oldfile - $line_old;
//					$added   = $oldline_in_newfile - $line_new;
//					if ($added <= $deleted) { set new lines as added }
//					else                    { set old lines as deleted }
// -------------------------------------------------------------------------

					$deleted = $newline_in_oldfile - $line_old;
					$added   = $oldline_in_newfile - $line_new;

			// Added
			// Set the status of all new lines until the occurence of the old line to "added"
			// Set the status of the occurence of the old line and of the next new line to "unchanged"
					if ($added <= $deleted) {
						for ($k = $line_new; $k < $oldline_in_newfile; $k++) {
							$string_new_change[$k] = "added";
							$comparison[$line_total]['string'] = $string_new_exploded[$k];
							$comparison[$line_total]['line_old'] = " ";
							$comparison[$line_total]['line_new'] = $k;
							$comparison[$line_total]['change'] = "added";
							$line_total++;
						}
						$string_new_change[$oldline_in_newfile] = "unchanged";
						$string_old_change[$line_old] = "unchanged";
						$comparison[$line_total]['string'] = $string_new_exploded[$oldline_in_newfile];
						$comparison[$line_total]['line_old'] = $line_old;
						$comparison[$line_total]['line_new'] = $oldline_in_newfile;
						$comparison[$line_total]['change'] = "unchanged";
						$line_total++;
						$line_old++;
						$line_new = $oldline_in_newfile + 1;
					} // end if $added <= $deleted

			// Deleted
			// Set the status of all old lines until the occurence of the new line to "deleted"
			// Set the status of the occurence of the new line and of the next old line to "unchanged"
					else {
						for ($k = $line_old; $k < $newline_in_oldfile; $k++) {
							$string_old_change[$k] = "deleted";
							$comparison[$line_total]['string'] = $string_old_exploded[$k];
							$comparison[$line_total]['line_old'] = $k;
							$comparison[$line_total]['line_new'] = " ";
							$comparison[$line_total]['change'] = "deleted";
							$line_total++;
						}
						$string_old_change[$newline_in_oldfile] = "unchanged";
						$string_new_change[$line_new] = "unchanged";
						$comparison[$line_total]['string'] = $string_old_exploded[$newline_in_oldfile];
						$comparison[$line_total]['line_old'] = $newline_in_oldfile;
						$comparison[$line_total]['line_new'] = $line_new;
						$comparison[$line_total]['change'] = "unchanged";
						$line_total++;
						$line_new++;
						$line_old = $newline_in_oldfile + 1;
					} // end if else $added <= $deleted

				} // end if else $oldline_in_newfile == 0

			} // end if else $newline_in_oldfile == 0

		} // end if else trim($string_new_exploded[$line_new]) == trim($string_old_exploded[$line_old])

	} // end for ($line_new = 0; $line_new < count($string_new_exploded);) {

// If the end of the new file is reached, while the end of the old file is not reached, then
// this means that the rest of the old file has been deleted
	if ($line_old < count($string_old_exploded)) {
		for ($k = $line_old; $k < count($string_old_exploded); $k++) {
			$string_old_change[$k] = "deleted";
			$comparison[$line_total]['string'] = $string_old_exploded[$k];
			$comparison[$line_total]['line_old'] = $k;
			$comparison[$line_total]['line_new'] = " ";
			$comparison[$line_total]['change'] = "deleted";
			$line_total++;
		} // end for
		$line_old = count($string_old_exploded);
	} // end if


// Set all the changed lines to validated
	for ($k=1; $k<count($comparison); $k++) {
		if ($comparison[$k]['change'] != "unchanged") { $comparison[$k]['validation'] = "yes"; }
		else { $comparison[$k]['validation'] = "no"; }
	} // end for

// Print out the result
//	echo "OLD FILE: <br />";
//	for ($m = 0; $m < count($string_old_exploded); $m++) {
//		echo $string_old_exploded[$m] . " &nbsp; " . $string_old_change[$m] . "<br />";
//	} // end for
//
//	echo "<br /><br />";
//
//	echo "NEW FILE: <br />";
//	for ($m = 0; $m < count($string_new_exploded); $m++) {
//		echo $string_new_exploded[$m] . " &nbsp; " . $string_new_change[$m] . "<br />";
//	} // end for
//
//	echo "<br /><br />";

// if ($success == false) { return putResult(false, "", "ftp_pasv", "ftp_openconnection > ftp_pasv: conn_id=$conn_id;", "Unable to switch to the passive mode on FTP server <b>$net2ftp_ftpserver</b>.<br />"); }
//	return putResult(true, $comparison, "", "", "");
	return $comparison;

} // End function compareFiles

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printComparisonSelect($comparison, $directory, $entry) {

// --------------
// This function prints out the $comparison array returned by the function compareFiles
// with a <select> and some Javascript functions to validate or reject the changes
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------

	$updatefile_nrofrows = getSetting("updatefile_nrofrows");


// -------------------------------------------------------------------------
// Javascript functions
// -------------------------------------------------------------------------
	echo "\n<script type=\"text/javascript\"><!--\n";

// -----------------------------------
	echo "function printComparisonValidation(startindex) {\n";
// -----------------------------------
// Note that the printing starts only from the startindex onwards; this is to avoid going through the rows
// which should anyway not be changed.
// The function is called the first time with startindex = 1; then, when options are validated or rejected,
// the function is called with startindex = first selected row.
	echo "	if (startindex == 0) { startindex = 1; }\n";
	echo "	for (var i = startindex; i < comparison.length; i++) {\n";
	echo "		if(comparison[i]['validation'] == 'yes') {\n";
// The selected options are validated
// ==> Set the first 2 characters of the select option to OK
//     Set the color to green or red
	echo "			if      (comparison[i]['change'] != 'unchanged') { document.ComparisonForm.ComparisonSelect.options[i].text = 'OK' + document.ComparisonForm.ComparisonSelect.options[i].text.substr(2); }\n";
	echo "			if      (comparison[i]['change'] == 'added')     { document.ComparisonForm.ComparisonSelect.options[i].style.backgroundColor = '#55CC44'; }\n";
	echo "			else if (comparison[i]['change'] == 'deleted')   { document.ComparisonForm.ComparisonSelect.options[i].style.backgroundColor = '#EE4422'; }\n";
	echo "		}\n";
// The selected options are rejected
// ==> Set the first 2 characters of the select option to --
//     Set the color to grey
	echo "		else {\n";
	echo "			if      (comparison[i]['change'] != 'unchanged') { document.ComparisonForm.ComparisonSelect.options[i].text = '--' + document.ComparisonForm.ComparisonSelect.options[i].text.substr(2); }\n";
	echo "			if      (comparison[i]['change'] == 'added')     { document.ComparisonForm.ComparisonSelect.options[i].style.backgroundColor = '#CCEECC'; }\n";
	echo "			else if (comparison[i]['change'] == 'deleted')   { document.ComparisonForm.ComparisonSelect.options[i].style.backgroundColor = '#EECCCC'; }\n";
	echo "			\n";
	echo "		}\n";
	echo "	}\n";
	echo "	return true;\n";
	echo "}\n";

// -----------------------------------
	echo "function setValidation(dowhat) {\n";
// -----------------------------------
	// Code snippet from http://developer.irt.org/script/1663.htm
	echo "	for (var i = document.ComparisonForm.ComparisonSelect.selectedIndex; i < document.ComparisonForm.ComparisonSelect.options.length; i++) {\n";
	echo "		if((document.ComparisonForm.ComparisonSelect.options[i].selected) & (i != 0)) {\n";
	echo "			if (dowhat == 'accept') { comparison[i]['validation'] = 'yes'; }\n";
	echo "			if (dowhat == 'reject') { comparison[i]['validation'] = 'no';  }\n";
	echo "		}\n";
	echo "	}\n";
	echo "	printComparisonValidation(document.ComparisonForm.ComparisonSelect.selectedIndex);\n";
	echo "	return true;\n";
	echo "}\n";

// -----------------------------------
	echo "function submitComparisonForm() {\n";
// -----------------------------------
	echo "	var d = document;\n";
	echo "	d.writeln('<html><head></head><body><form name=\"NewForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">');\n";
//	echo "	d.writeln('Please wait...<br /><br />');\n";
	printLoginInfo_javascript();
	echo "	d.writeln('<input type=\"hidden\" name=\"state\" value=\"manage\">');\n";
	echo "	d.writeln('<input type=\"hidden\" name=\"state2\" value=\"updatefile\">');\n";
	echo "	d.writeln('<input type=\"hidden\" name=\"screen\" value=\"screen3\">');\n";
	echo "	d.writeln('<input type=\"hidden\" name=\"directory\" value=\"$directory\">');\n";
	echo "	d.writeln('<input type=\"hidden\" name=\"entry\" value=\"$entry\">');\n";
	echo "  d.writeln('<input type=\"hidden\" name=\"sort\" value=\"$sort\">');\n";
  echo "  d.writeln('<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\">');\n";
	echo "	for(i=1; i<comparison.length; i++) {;\n";
	echo "		d.writeln('<input type=\"hidden\" name=\"comparison[' + i + '][line_old]\"   value=\"' + comparison[i]['line_old']   + '\">');\n";
	echo "		d.writeln('<input type=\"hidden\" name=\"comparison[' + i + '][line_new]\"   value=\"' + comparison[i]['line_new']   + '\">');\n";
	echo "		d.writeln('<input type=\"hidden\" name=\"comparison[' + i + '][string]\"     value=\"' + comparison[i]['string']     + '\">');\n";
	echo "		d.writeln('<input type=\"hidden\" name=\"comparison[' + i + '][change]\"     value=\"' + comparison[i]['change']     + '\">');\n";
	echo "		d.writeln('<input type=\"hidden\" name=\"comparison[' + i + '][validation]\" value=\"' + comparison[i]['validation'] + '\">');\n";
	echo "	}\n";
	echo "	d.writeln('</form></body></html>');\n";
	echo "	d.NewForm.submit();\n";
	echo "}\n";

	echo "//--></script>\n";


// -------------------------------------------------------------------------
// Form
// -------------------------------------------------------------------------
	echo "<form name=\"ComparisonForm\" id=\"ComparisonForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"manage\" />\n";
	echo "<input type=\"hidden\" name=\"state2\" value=\"updatefile\" />\n";
	echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
	echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\" />\n";
  echo "<input type=\"hidden\" name=\"sortorder\" value=\"$sortorder\" />\n";

// -------------------------------------------------------------------------
// Buttons
// -------------------------------------------------------------------------
	echo "<table border=\"0\" width=\"100%\" cellspacing=\"2\" cellpadding=\"2\">\n";
	echo "	<tr>\n";
	echo "		<td valign=\"top\">\n";
	printBackInForm($directory, "ComparisonForm");
	echo getAction("forward", "submitComparisonForm();");
	echo "		</td>\n";
	echo "		<td valign=\"top\" style=\"text-align: right;\">\n";
	echo "			<input type=\"button\" class=\"longbutton\" value=\"Accept change\" onClick=\"setValidation('accept');\"> &nbsp;\n";
	echo "			<input type=\"button\" class=\"longbutton\" value=\"Reject change\" onClick=\"setValidation('reject');\"> &nbsp;\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "</table>\n";

// -------------------------------------------------------------------------
// Select
// -------------------------------------------------------------------------
	echo "<select name=\"ComparisonSelect\" multiple size=\"$updatefile_nrofrows\" style=\"width: 900px; font-family: courier;\">\n";

	echo "<option style=\"background-color: #FFFFFF\">Select lines below, accept or reject changes and submit the form.</option>\n";

	for ($k=1; $k<count($comparison); $k++) {
// Background colors
		if     ($comparison[$k]['change'] == "deleted") { $bgcolor = "#EE4422"; }
		elseif ($comparison[$k]['change'] == "added")   { $bgcolor = "#55CC44"; }
		else                                            { $bgcolor = "#FFFFFF"; }

// Add trailing spaces to the line nr
		$linenr = $k;
		for ($i=strlen($k); $i<strlen(count($comparison)); $i++) { $linenr = $linenr . "&nbsp;"; }

// Add trailing spaces to the change
		if     ($comparison[$k]['change'] == "unchanged") { $change = "unchanged"; }
		elseif ($comparison[$k]['change'] == "added")     { $change = "added&nbsp;&nbsp;&nbsp;&nbsp;"; }
		elseif ($comparison[$k]['change'] == "deleted")   { $change = "deleted&nbsp;&nbsp;"; }

// Set spaces to the validation
		if     ($comparison[$k]['validation'] == "yes") { $validation = "OK"; }
		else                                            { $validation = "--"; }

		$string = htmlspecialchars($comparison[$k]['string'], ENT_QUOTES);

		echo "<option style=\"background-color: $bgcolor;\">" . $validation . " " . $linenr . " " . $change . " | " . $string . " </option>\n";

	} // end for

	echo "</select>\n";

// -------------------------------------------------------------------------
// Javascript comparison array
// -------------------------------------------------------------------------
	echo "\n<script type=\"text/javascript\"><!--\n";
	echo "comparison = new Array();\n";
	for ($k=1; $k<count($comparison); $k++) {
		echo "comparison[$k] = new Array();\n";
		echo "comparison[$k]['line_old']   = '" . $comparison[$k]['line_old'] . "';\n";
		echo "comparison[$k]['line_new']   = '" . $comparison[$k]['line_new'] . "';\n";
		echo "comparison[$k]['string']     = '" . trim(htmlspecialchars($comparison[$k]['string'], ENT_QUOTES)) . "';\n";
		echo "comparison[$k]['change']     = '" . $comparison[$k]['change'] . "';\n";
		echo "comparison[$k]['validation'] = '" . $comparison[$k]['validation'] . "';\n";
	} // end for
	echo "printComparisonValidation(1);\n";
	echo "//--></script>\n";



	echo "</form>\n";

} // End function printComparisonSelect

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function mergeStrings($comparison) {

// --------------
// This function merges 2 files based on the comparison array
// --------------

	$string_merged = "";
	for ($k=1; $k<=count($comparison); $k++) {
		if ($comparison[$k]['change'] == "unchanged" ||
		   ($comparison[$k]['change'] == "added" && $comparison[$k]['validation'] == "yes") ||
		   ($comparison[$k]['change'] == "deleted" && $comparison[$k]['validation'] == "no")) {
			$string_merged .= $comparison[$k]['string'] . "\n"; }
	} // end for

	return $string_merged;

} // End function mergeStrings

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function format_php($code, $linkcode=true, $highlight=true, $linenumbers=true, $addphptags=true) {
  if (trim($code)) {
    if ($highlight==true and function_exists('highlight_string')) {
      if ($addphptags==true and !preg_match("/(<(php)?\?)(.*)(\?>)/i",$code)) {
        if (!preg_match("/(<(php)?\?)/i",$code)) {
          $code = "<?php".($addphptags==true?"\n":"").$code;
          $phptag_before = true;
        }
        if (!preg_match("/(\?>)/i",$code)) {
          $phptag_after = true;
          $code = $code.($addphptags==true?"\n":"")."?>";
        }
      }
      $code = @highlight_string($code,true);
      if ($addphptags==true and ($phptag_before==true or $phptag_after==true)) {
        if ($phptag_before==true) {
          $openingpos = strpos($code,"&lt;php?");
          $code = substr($code, 0, $openingpos).substr($code, $openingpos+8, strlen($code));
        }
        if ($phptag_after==true) {
          $closingpos = strrpos($code, '?&gt;');
          $code = substr($code, 0, $closingpos).substr($code, $closingpos+5);
        }
      }
    } else {
      $code = htmlentities($code);
    }
    if ($linenumbers==true) {
      if ($highlight==true) {
        $code = str_replace('<br>','<br />',$code);
        $lines_array = explode("<br />",$code);
      } else $lines_array = explode("\n",$code);
      $linecount = count($lines_array);
      $space = "";
      for ($l=0;$l<strlen($linecount);$l++) $space .= "0";
      $space_lenth = strlen($space);
      for($i=0;$i<$linecount;$i++) {
        $line = $i+1;
        $linespace = "";
        $line_length = strlen($line);
        if (($space_lenth-$line_length) > 0) {
          $linespace = substr($space,0,$space_lenth-$line_length);
        }
        $line_number = $linespace.$line;
        if ($highlight==true && $i==0) {
          $stuff = explode("\n",$lines_array[$i]);
          $lines[$i] = $stuff[0]."\n"."<font color=\"#000000\">".$line_number.":</font>&nbsp;".$stuff[1];
       } else {
          $lines[$i] = "<font color=\"#000000\">".$line_number.":</font>&nbsp;".$lines_array[$i];
        }
      }
      $code = implode("<br />\n",$lines);
    }
    if ($linkcode==true) {
      $allfuncs = @get_defined_functions();
      $searches = array();
      $replaces = array();
      if (is_array($allfuncs['internal'])) {
        $highlight = ini_get('highlight.keyword');
        foreach ($allfuncs['internal'] as $name) {
          if (substr_count($code,$name)>=1) {
            if ($highlight==true) {
              $searches[] = "/([^a-z0-9_])$name(<\/font><font color=\"".$highlight."\">){0,1}( {0,1})\(/i";
              $replaces[] = "\\1<a href=\"http://www.php.net/$name\" target=\"_blank\">$name</a>\\2\\3(";
            } else {
              $searches[] = "/([^a-z0-9_])$name( {0,1})\(/i";
              $replaces[] = "\\1<a href=\"http://www.php.net/$name\" target=\"_blank\">$name</a>\\2(";
            }
          }
        }
        $code = preg_replace($searches, $replaces, $code);
      }
    }
    $code = str_replace('<br>','<br />',$code);
    $code = str_replace(array("\r\n","\r","\n"),array("\n","\n","\r\n"),$code);
  }
  return $code;
} // End function format_code

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function number_line($code,$break=false) {
  if ($code) {
    $code = htmlspecialchars($code);
    if ($break==true) {
      $code = str_replace('<br>','<br />',$code);
      $lines_array = explode("<br />",$code);
    } else $lines_array = explode("\n",$code);
    $linecount = count($lines_array);
    $space = "";
    for ($l=0;$l<strlen($linecount);$l++) $space .= "0";
    $space_lenth = strlen($space);
    for($i=0;$i<$linecount;$i++) {
      $line = $i+1;
      $linespace = "";
      $line_length = strlen($line);
      if (($space_lenth-$line_length) > 0) {
        $linespace = substr($space,0,$space_lenth-$line_length);
      }
      $line_number = $linespace.$line;
      $lines[$i] = "<font color=\"#000000\">".$line_number.":</font>&nbsp;".$lines_array[$i];
    }
    $code = implode("<br />\n",$lines);
    $code = str_replace(array("\r\n","\r","\n"),array("\n","\n","\r\n"),$code);
    return $code;
  }
  return $code;
} // End function number_line

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





?>