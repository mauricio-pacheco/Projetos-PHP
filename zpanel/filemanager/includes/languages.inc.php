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
function getLanguageArray() {

// --------------
// This function returns an array of languages
// --------------

	$languageArray[1]['name'] = "English";
	$languageArray[1]['file'] = "en.inc.php";
	$languageArray[2]['name'] = "Nederlands";
	$languageArray[2]['file'] = "nl.inc.php";
	$languageArray[3]['name'] = "Français";
	$languageArray[3]['file'] = "fr.inc.php";
	$languageArray[4]['name'] = "Deutch";
	$languageArray[4]['file'] = "de.inc.php";

	return $languageArray;

} // End function getLanguageArray

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
function printLanguageSelect($fieldname, $onchange) {


// --------------
// This function prints a select with the available languages
// Language nr 1 is the default language
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $net2ftpcookie_language;
	global $net2ftp_language;

	$languageArray = getLanguageArray();

	if ($net2ftp_language != "")           { $currentlanguage = $net2ftp_language; }
	elseif ($net2ftpcookie_language != "") { $currentlanguage = $net2ftpcookie_language; }
	else                                   { $currentlanguage = 1; }

	echo "<select name=\"$fieldname\" id=\"$fieldname\" onChange=\"$onchange\">\n";

	for ($i=1; $i<=sizeof($languageArray); $i=$i+1) {
		if ($i == $currentlanguage) { $selected = "selected"; }
		else { $selected = ""; }
		echo "<option value=\"$i\" $selected>" . $languageArray[$i]['name'] . "</option>\n";
	} // end for

	echo "</select>\n";

} // End function printLanguageSelect

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function includeLanguageFile() {

	global $net2ftp_language;
	global $application_localedir;
	$languageArray = getLanguageArray();

// If the language is English, there is nothing to translate
	if ($net2ftp_language == 1) {
		return true; 
	}

// If the language is not set
	elseif ($net2ftp_language == "") {
		$net2ftp_language = 1;
		return true; 
	}

// If language exists, include the language file
	elseif (array_key_exists($net2ftp_language, $languageArray) == true) { 
		$languageFile = glueDirectories($application_localedir, $languageArray[$net2ftp_language]['file']);
//		include_once($languageFile); 
	}

// If it does not exist
	else { 
		$net2ftp_language = 1;
	}

	return true;

} // end  function includeLanguageFile

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function __($message) {



} // end  function __

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>