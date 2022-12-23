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
// **    

function printBookmarkLink() {

// --------------
// This function prints a link
// --------------

// -------------------------------------------------------------------------
// Global variables
// -------------------------------------------------------------------------
global $net2ftp_ftpserver, $directory, $state, $state2;


	if ($state == "manage") { $text = "net2ftp - $net2ftp_ftpserver$directory $state2"; }
	else {                    $text = "net2ftp - $net2ftp_ftpserver$directory $state";  }

// All the state information is printed by the function printPHP_SELF (see authorizations.inc.php)

	echo "<form name=\"BookmarkForm\" id=\"BookmarkForm\" method=\"post\" action=\"" . printPHP_SELF("no") . "\">\n";
	printLoginInfo();
	echo "<input type=\"hidden\" name=\"state\" value=\"bookmark\" />\n";
	echo "<input type=\"hidden\" name=\"directory\" value=\"$directory\" />\n";
	echo "<input type=\"hidden\" name=\"url\" value=\"" . printPHP_SELF("yes") . "\" />\n";
	echo "<input type=\"hidden\" name=\"text\" value=\"$text\" />\n";
	echo "</form>\n";

// Text
//	echo "<a href=\"" . printPHP_SELF("yes") . "\" onClick=\"javascript: document.BookmarkForm.submit(); return false;\" style=\"font-size: 70%;\">Bookmark</a>\n";

// Icon
	echo getAction("bookmark", "document.BookmarkForm.submit();");

} // End function printBookmarkLink

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **    

function bookmark($directory, $url, $text) {

// --------------
// This function prints a page which allows to add a bookmark
// --------------

	printTitle("Bookmark");

	printBack($directory, "BookmarkForm");

	echo "<table style=\"margin-left: 30px; margin-right: auto;\">\n";
	echo "<tr>\n";
	echo "<td>\n";

	echo "Add this link to your bookmarks: <a href=\"$url\">$text</a><br />\n";

	echo "<div style=\"font-size: 80%\">\n";
	echo "<ul>\n";
	echo "	<li> Internet Explorer: right-click on the link and choose \"Add to Favorites...\"</li>\n";
	echo "	<li> Netscape, Mozilla, Firebird: right-click on the link and choose \"Bookmark This Link...\" </li>\n";
	echo "</ul>\n";

	echo "<br />\n";

	echo "Note: when you will use this bookmark, a popup window will ask you for your username and password.<br />\n";

	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";

} // End function bookmark

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>