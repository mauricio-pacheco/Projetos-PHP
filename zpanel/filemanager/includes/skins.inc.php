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
function getSkinArray() {


// --------------
// This function returns an array of skin names, file names, ...
// --------------

	$skinArray[1]['name'] = "Blue";
	$skinArray[1]['css'] = "skin1-blue.css";
	$skinArray[1]['iconset'] = "crystal";

	$skinArray[2]['name'] = "Grey";
	$skinArray[2]['css'] = "skin2-grey.css";
	$skinArray[2]['iconset'] = "crystal";

	$skinArray[3]['name'] = "Black";
	$skinArray[3]['css'] = "skin3-black.css";
	$skinArray[3]['iconset'] = "crystal";

	$skinArray[4]['name'] = "Kids";
	$skinArray[4]['css'] = "skin4-kids.css";
	$skinArray[4]['iconset'] = "kids";

	return $skinArray;

} // End function getSkinArray

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function printSkinSelect($fieldname, $onchange) {


// --------------
// This function prints a select with the available skins
// Skin nr 1 is the default skin
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftpcookie_skin;
	global $net2ftp_skin;

	$skinArray = getSkinArray();

	if ($net2ftp_skin != "")           { $currentskin = $net2ftp_skin; }
	elseif ($net2ftpcookie_skin != "") { $currentskin = $net2ftpcookie_skin; }
	else                               { $currentskin = 1; }

	echo "<select name=\"$fieldname\" id=\"$fieldname\" onChange=\"$onchange\">\n";

	for ($i=1; $i<=sizeof($skinArray); $i=$i+1) {
		if ($i == $currentskin) { $selected = "selected"; }
		else { $selected = ""; }
		echo "<option value=\"$i\" $selected>" . $skinArray[$i]['name'] . "</option>\n";
	} // end for

	echo "</select>\n";

} // End function printSkinSelect

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getSkinColors($what) {

	global $net2ftp_skin;
	$skin = $net2ftp_skin;

	if ($skin == "1") {
		if     ($what == "heading_fontcolor")   { return "#000000"; }
		elseif ($what == "heading_bgcolor")     { return "#CCCCFF"; }
		elseif ($what == "rows_fontcolor_odd")  { return "#000000"; }
		elseif ($what == "rows_bgcolor_odd")    { return "#FFFFFF"; }
		elseif ($what == "rows_fontcolor_even") { return "#000000"; }
		elseif ($what == "rows_bgcolor_even")   { return "#EFEFEF"; }
		elseif ($what == "cursor_fontcolor")    { return "#000000"; }
		elseif ($what == "cursor_bgcolor")      { return "#9999FF"; }
		elseif ($what == "border_color")        { return "#000000"; }
		elseif ($what == "selected_fontcolor")  { return "#000000"; }
		elseif ($what == "selected_bgcolor")    { return "#FFAA33"; }
	}
	elseif ($skin == "2") {
		if     ($what == "heading_fontcolor")   { return "#CCCCCC"; }
		elseif ($what == "heading_bgcolor")     { return "#EEEEEE"; }
		elseif ($what == "rows_fontcolor_odd")  { return "#CCCCCC"; }
		elseif ($what == "rows_bgcolor_odd")    { return "#FFFFFF"; }
		elseif ($what == "rows_fontcolor_even") { return "#CCCCCC"; }
		elseif ($what == "rows_bgcolor_even")   { return "#EEEEEE"; }
		elseif ($what == "cursor_fontcolor")    { return "#CCCCCC"; }
		elseif ($what == "cursor_bgcolor")      { return "#DDDDDD"; }
		elseif ($what == "border_color")        { return "#000000"; }
		elseif ($what == "selected_fontcolor")  { return "#CCCCCC"; }
		elseif ($what == "selected_bgcolor")    { return "#FFAA33"; }
	}
	elseif ($skin == "3") {
		if     ($what == "heading_fontcolor")   { return "#FFFFFF"; }
		elseif ($what == "heading_bgcolor")     { return "#5E5E5E"; }
		elseif ($what == "rows_fontcolor_odd")  { return "#FFFFFF"; }
		elseif ($what == "rows_bgcolor_odd")    { return "#000000"; }
		elseif ($what == "rows_fontcolor_even") { return "#FFFFFF"; }
		elseif ($what == "rows_bgcolor_even")   { return "#232323"; }
		elseif ($what == "cursor_fontcolor")    { return "#000000"; }
		elseif ($what == "cursor_bgcolor")      { return "#898033"; }
		elseif ($what == "border_color")        { return "#000000"; }
		elseif ($what == "selected_fontcolor")  { return "#FFFFFF"; }
		elseif ($what == "selected_bgcolor")    { return "#FFAA33"; }
	}
	if ($skin == "4") {
		if     ($what == "heading_fontcolor")   { return "#000000"; }
		elseif ($what == "heading_bgcolor")     { return "#CCCCFF"; }
		elseif ($what == "rows_fontcolor_odd")  { return "#000000"; }
		elseif ($what == "rows_bgcolor_odd")    { return "#FFFFFF"; }
		elseif ($what == "rows_fontcolor_even") { return "#000000"; }
		elseif ($what == "rows_bgcolor_even")   { return "#EFEFEF"; }
		elseif ($what == "cursor_fontcolor")    { return "#000000"; }
		elseif ($what == "cursor_bgcolor")      { return "#9999FF"; }
		elseif ($what == "border_color")        { return "#000000"; }
		elseif ($what == "selected_fontcolor")  { return "#000000"; }
		elseif ($what == "selected_bgcolor")    { return "#FFAA33"; }
	}
	else {
		if     ($what == "heading_fontcolor")   { return "#000000"; }
		elseif ($what == "heading_bgcolor")     { return "#CCCCFF"; }
		elseif ($what == "rows_fontcolor_odd")  { return "#000000"; }
		elseif ($what == "rows_bgcolor_odd")    { return "#FFFFFF"; }
		elseif ($what == "rows_fontcolor_even") { return "#000000"; }
		elseif ($what == "rows_bgcolor_even")   { return "#EFEFEF"; }
		elseif ($what == "cursor_fontcolor")    { return "#000000"; }
		elseif ($what == "cursor_bgcolor")      { return "#9999FF"; }
		elseif ($what == "border_color")        { return "#000000"; }
		elseif ($what == "selected_fontcolor")  { return "#000000"; }
		elseif ($what == "selected_bgcolor")    { return "#FFAA33"; }
	}

} // end  function getSkinColors

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getHtmlColors() {

// --------------
// This function returns an array which contains the colors used by the HTML highligher
// Written by Slynderdale
// --------------

$html_highlight = array(
  'html' => array(
    'format' => "<pre>\n<font color=\"{color}\">\n{html}\n</font>\n</pre>",
    'color' => '#000000'
  ),
  'default' => array(
    'format' => "<font color=\"{color}\">{html}</font>",
    'color' => '#006600'
  ),
  'tag' => array(
    'format' => "<font color=\"{color}\">{html}</font>",
    'color' => '#000080',
    0 => array('tags' => array('table','tr','td','th','tbody','thead'), 'color' => '#008080'),
    1 => array('tags' => array('form','input','select','option','textarea','label'), 'color' => '#FF3000'),
    2 => array('tags' => array('script'), 'color' => '#800000'),
    3 => array('tags' => array('style'), 'color' => '#800080'),
    4 => array('tags' => array('a'), 'color' => '#008000'),
    5 => array('tags' => array('img'), 'color' => '#800080'),
    'count' => '6'
  ),
  'comment' => array(
    'format' => "<font color=\"{color}\"><i>{html}</i></font>",
    'color' => '#FF9900'
  ),
  'string' => array(
    'format' => "<font color=\"{color}\">{html}</font>",
    'color' => '#CC0000'
  ),
  'entity' => array(
    'format' => "<i><b>{html}</b></i>",
    'color' => ''
  ),
  'keyword' => array(
    'format' => "<font color=\"{color}\">{html}</font>",
    'color' => '#0000CC'
  )
);

	return $html_highlight;

} // end  function getHtmlColors

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getMime($filename) {

// --------------
// Checks the extension of a file to determine which is the type of the file and the icon
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $browser_agent;

	$last = get_filename_extension($filename);

// -------------------------------------------------------------------------
// Icon names
// -------------------------------------------------------------------------
	if ($last == "directory") {
		$icon = "folder";
		$type = "Directory";
	}
	elseif ($last == "symlink") {
		$icon = "folder_grey";
		$type = "Symlink";
	}

// Web files
	elseif ($last == "asp") {
		$icon = "";
		$type = "ASP script";
	}
	elseif ($last == "css") {
		$icon = "stylesheet";
		$type = "Cascading Style Sheet";
	}
	elseif ($last == "htm" || $last == "html") {
		$icon = "html";
		$type = "HTML file";
	}
	elseif ($last == "java") {
		$icon = "source_java";
		$type = "Java source file";
	}
	elseif ($last == "js") {
		$icon = "";
		$type = "JavaScript file";
	}
	elseif ($last == "phps") {
		$icon = "php-icon";
		$type = "PHP Source";
	}
	elseif (substr($last,0,3) == "php") {
		if (strlen($last)>3) { $version = substr($last,3,strlen($last)); }
		$icon = "php-icon";
		$type = "PHP version " . $version . " script";
	}
	elseif ($last == "txt") {
		$icon = "document";
		$type = "Text file";
	}

// Images
	elseif ($last == "bmp") {
		$icon = "colors";
		$type = "Bitmap file";
	}
	elseif ($last == "gif") {
		$icon = "colors";
		$type = "GIF file";
	}
	elseif ($last == "jpg" || $last == "jpeg") {
		$icon = "colors";
		$type = "JPEG file";
	}
	elseif ($last == "png") {
		$icon = "colors";
		$type = "PNG file";
	}
	elseif ($last == "tif" || $last == "tiff") {
		$icon = "colors";
		$type = "TIF file";
	}
	elseif ($last == "xcf") {
		$icon = "gimp";
		$type = "GIMP file";
	}

// Executables and scripts
	elseif ($last == "exe" || $last == "com") {
		$icon = "exec";
		$type = "Executable";
	}
	elseif ($last == "sh") {
		$icon = "terminal";
		$type = "Shell script";
	}

// MS Office
	elseif ($last == "doc") {
		$icon = "";
		$type = "MS Office - Word document";
	}
	elseif ($last == "xls") {
		$icon = "";
		$type = "MS Office - Excel spreadsheet";
	}
	elseif ($last == "ppt") {
		$icon = "";
		$type = "MS Office - PowerPoint presentation";
	}
	elseif ($last == "mdb") {
		$icon = "";
		$type = "MS Office - Access database";
	}
	elseif ($last == "vsd") {
		$icon = "";
		$type = "MS Office - Visio drawing";
	}
	elseif ($last == "mpp") {
		$icon = "";
		$type = "MS Office - Project file";
	}

// OpenOffice 6
	elseif ($last == "sxw") {
		$icon = "openoffice";
		$type = "OpenOffice - Writer 6.0 document";
	}
	elseif ($last == "stw") {
		$icon = "openoffice";
		$type = "OpenOffice - Writer 6.0 template";
	}
	elseif ($last == "sxc") {
		$icon = "openoffice";
		$type = "OpenOffice - Calc 6.0 spreadsheet";
	}
	elseif ($last == "stc") {
		$icon = "openoffice";
		$type = "OpenOffice - Calc 6.0 template";
	}
	elseif ($last == "sxd") {
		$icon = "openoffice";
		$type = "OpenOffice - Draw 6.0 document";
	}
	elseif ($last == "std") {
		$icon = "openoffice";
		$type = "OpenOffice - Draw 6.0 template";
	}
	elseif ($last == "sxi") {
		$icon = "openoffice";
		$type = "OpenOffice - Impress 6.0 presentation";
	}
	elseif ($last == "sti") {
		$icon = "openoffice";
		$type = "OpenOffice - Impress 6.0 template";
	}
	elseif ($last == "sxg") {
		$icon = "openoffice";
		$type = "OpenOffice - Writer 6.0 global document";
	}
	elseif ($last == "sxm") {
		$icon = "openoffice";
		$type = "OpenOffice - Math 6.0 document";
	}

// StarOffice 5
	elseif ($last == "sdw") {
		$icon = "openoffice";
		$type = "StarOffice - StarWriter 5.x document";
	}
	elseif ($last == "sgl") {
		$icon = "openoffice";
		$type = "StarOffice - StarWriter 5.x global document";
	}
	elseif ($last == "sdc") {
		$icon = "openoffice";
		$type = "StarOffice - StarCalc 5.x spreadsheet";
	}
	elseif ($last == "sda") {
		$icon = "openoffice";
		$type = "StarOffice - StarDraw 5.x document";
	}
	elseif ($last == "sdd") {
		$icon = "openoffice";
		$type = "StarOffice - StarImpress 5.x presentation";
	}
	elseif ($last == "sdp") {
		$icon = "openoffice";
		$type = "StarOffice - StarImpress Packed 5.x file";
	}
	elseif ($last == "smf") {
		$icon = "openoffice";
		$type = "StarOffice - StarMath 5.x document";
	}
	elseif ($last == "sds") {
		$icon = "openoffice";
		$type = "StarOffice - StarChart 5.x document";
	}
	elseif ($last == "sdm") {
		$icon = "openoffice";
		$type = "StarOffice - StarMail 5.x mail file";
	}

// PDF and PS
	elseif ($last == "pdf") {
		$icon = "acroread";
		$type = "Adobe Acrobat document";
	}

// Archives
	elseif ($last == "arc") {
		$icon = "tgz";
		$type = "ARC archive";
	}
	elseif ($last == "arj") {
		$icon = "tgz";
		$type = "ARJ archive";
	}
	elseif ($last == "rpm") {
		$icon = "rpm";
		$type = "RPM";
	}
	elseif ($last == "gz") {
		$icon = "tgz";
		$type = "GZ archive";
	}
	elseif ($last == "tar") {
		$icon = "tar";
		$type = "TAR archive";
	}
	elseif ($last == "zip") {
		$icon = "tgz";
		$type = "Zip archive";
	}

// Movies
	elseif ($last == "mov") {
		$icon = "video";
		$type = "MOV movie file";
	}
	elseif ($last == "mpg" || $last == "mpeg") {
		$icon = "video";
		$type = "MPEG movie file";
	}
	elseif ($last == "rm" || $last == "ram") {
		$icon = "realplayer";
		$type = "Real movie file";
	}
	elseif ($last == "qt") {
		$icon = "quicktime";
		$type = "Quicktime movie file";
	}

// Flash
	elseif ($last == "fla") {
		$icon = "";
		$type = "Shockwave flash file";
	}
	elseif ($last == "swf") {
		$icon = "";
		$type = "Shockwave file";
	}


// Sound
	elseif ($last == "wav") {
		$icon = "irc_voice";
		$type = "WAV sound file";
	}

// Fonts
	elseif ($last == "ttf") {
		$icon = "fonts";
		$type = "Font file";
	}

// Default Extension
	elseif ($last) {
		$icon = "mime";
		$type = strtoupper($last)." File";
	}

// Default File
	else {
		$icon = "mime";
		$type = "File";
	}

	if ($icon == "") { $icon = "mime"; }
	if ($type == "") { $type = "File"; }

// -------------------------------------------------------------------------
// Return mime icon and mime type
// -------------------------------------------------------------------------
	$icon .= ".png";
	$icon_directory = "images/mime";

	// Internet Explorer does not display transparent PNG images correctly.
	// A solution is described here: http://support.microsoft.com/default.aspx?scid=kb;en-us;Q294714
	if ($browser_agent == "IE") {	$mime['mime_icon'] = "<img src=\"$icon_directory/spacer.gif\" alt=\"icon\" style=\"width: 16px; height: 16px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$icon_directory/$icon', sizingMethod='scale')\" />\n"; }
	else                        { $mime['mime_icon'] = "<img src=\"$icon_directory/$icon\"      alt=\"icon\" style=\"width: 16px; height: 16px;\" />\n"; }

	$mime['mime_type'] = $type;

	return $mime;

} // end getMime

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getAction($action, $onClick) {

// --------------
// Checks the icon related to an action
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $browser_agent, $net2ftp_skin;


// -------------------------------------------------------------------------
// Icon name
// -------------------------------------------------------------------------
	if ($action == "back") {
		$alt = "Back";
		$icon = "back";
	}
	elseif ($action == "forward") {
		$alt = "Submit";
		$icon = "button_ok";
	}
	elseif ($action == "refresh") {
		$alt = "Refresh";
		$icon = "reload";
	}
	elseif ($action == "view_details") {
		$alt = "Details";
		$icon = "view_detailed";
	}
	elseif ($action == "view_icons") {
		$alt = "Icons";
		$icon = "view_icon";
	}
	elseif ($action == "listdirectories") {
		$alt = "List";
		$icon = "view_tree";
	}
	elseif ($action == "logout") {
		$alt = "Logout";
		$icon = "exit";
	}
	elseif ($action == "help") {
		$alt = "Help";
		$icon = "info";
	}
	elseif ($action == "bookmark") {
		$alt = "Bookmark";
		$icon = "bookmark";
	}
	elseif ($action == "save") {
		$alt = "Save";
		$icon = "filesave";
	}
	else {
		$alt = "Default";
		$icon = "mime";
	}

	$icon .= ".png";

// -------------------------------------------------------------------------
// Icon directory
// -------------------------------------------------------------------------
	$skinArray = getSkinArray();
	$icon_directory = "images/actions/" . $skinArray[$net2ftp_skin]['iconset'];

// -------------------------------------------------------------------------
// Return icon
// -------------------------------------------------------------------------
	// Internet Explorer does not display transparent PNG images correctly.
	// A solution is described here: http://support.microsoft.com/default.aspx?scid=kb;en-us;Q294714

	if ($browser_agent == "IE") { $icon_total = "<a href=\"javascript: $onClick\"><img src=\"$icon_directory/spacer.gif\" alt=\"$alt\" onMouseOver=\"this.style.margin='0px';this.style.width='34px';this.style.height='34px';\" onMouseOut=\"this.style.margin='1px';this.style.width='32px';this.style.height='32px';\" style=\"border: 0px; margin: 1px; width: 32px; height: 32px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$icon_directory/$icon', sizingMethod='scale');\" /></a>\n"; }
	else                        { $icon_total = "<a href=\"javascript: $onClick\"><img src=\"$icon_directory/$icon\"      alt=\"$alt\" onMouseOver=\"this.style.margin='0px';this.style.width='34px';this.style.height='34px';\" onMouseOut=\"this.style.margin='1px';this.style.width='32px';this.style.height='32px';\" style=\"border: 0px; margin: 1px; width: 32px; height: 32px;\" /></a>\n"; }

	return $icon_total;

} // end getAction

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getMode($setting, $on_off, $onClick) {

// --------------
// Checks the icon related to a mode
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $browser_agent;

	if ($setting == "details") {
		$alt = "Details";
		$icon = "view_detailed";
	}
	elseif ($setting == "icons") {
		$alt = "Icons";
		$icon = "view_icon";
	}

// Default
	else {
		$alt = "Default";
		$icon = "mime";
	}

// Default
	if ($alt  == "") { $alt  = "Default"; }
	if ($icon == "") { $icon = "mime"; }

// On or off: icon and style
	if ($on_off == "on") {
		$icon_normal      = $icon;
		$icon_onmouseover = $icon;
	}
	else {
		$icon_normal      = $icon . "_light";
		$icon_onmouseover = $icon;
	}

// -------------------------------------------------------------------------
// Icon directory
// -------------------------------------------------------------------------
	$icon_directory = "images/settings/";

// -------------------------------------------------------------------------
// Return icon
// -------------------------------------------------------------------------

// DO NOT CLOSE THE IMAGE TAG TO ALLOW ADDITIONAL ACTIONS
	if ($on_off == "on") {
		if ($browser_agent == "IE") {	$icon_total = "<img src=\"$icon_directory/spacer.gif\"   alt=\"$alt\" style=\"border: 2px solid #000000; padding-top: 1px; padding-left: 2px; width: 32px; height: 32px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$icon_directory/$icon', sizingMethod='scale');\" />\n"; }
		else                        { $icon_total = "<img src=\"$icon_directory/$icon_normal\" alt=\"$alt\" style=\"border: 2px solid #000000; padding-top: 1px; padding-left: 2px; width: 32px; height: 32px;\" />\n"; }
	}
	else {
		if ($browser_agent == "IE") {	$icon_total = "<a href=\"javascript: $onClick\"><img src=\"$icon_directory/spacer.gif\"   alt=\"$alt\" onMouseOver=\"this.style.margin='0px';this.style.width='34px';this.style.height='34px';\" onMouseOut=\"this.style.margin='1px';this.style.width='32px';this.style.height='32px';\" style=\"border: 0px; margin: 1px; width: 32px; height: 32px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$icon_directory/$icon', sizingMethod='scale');\" /></a>\n"; }
		else                        { $icon_total = "<a href=\"javascript: $onClick\"><img src=\"$icon_directory/$icon_normal\" alt=\"$alt\" onMouseOver=\"this.style.margin='0px';this.style.width='34px';this.style.height='34px';\" onMouseOut=\"this.style.margin='1px';this.style.width='32px';this.style.height='32px';\" style=\"border: 0px; margin: 1px; width: 32px; height: 32px;\" /></a>\n"; }
	}

	return $icon_total;

} // end getMode

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>