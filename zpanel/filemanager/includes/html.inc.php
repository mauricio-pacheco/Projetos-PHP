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

function HtmlBegin($pagetitle, $state, $state2, $screen, $directory, $entry, $company) {

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	global $client_css;
	global $wysiwyg;
	global $net2ftp_ftpserver, $net2ftp_skin, $net2ftpcookie_skin;
	global $browser_agent, $browser_version;

// -------------------------------------------------------------------------
// Replace ' by \' in $directory and $dirfilename to avoid javascript errors if
// these variables contain single quotes (they may not contain double quotes).
// -------------------------------------------------------------------------
	$directory_js   = javascriptEncode($directory);

// -------------------------------------------------------------------------
// Log access
// -------------------------------------------------------------------------
	$page = printPHP_SELF("no");
	logAccess($page);

// -------------------------------------------------------------------------
// HTML begin
// -------------------------------------------------------------------------

// Strict XHTML 1.0
//	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">\n";

// Transitional HTML 4.01
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n";


	echo "<html>\n";
// -------------------------------------------------------------------------
// Head
// -------------------------------------------------------------------------
	echo "<head>\n";
	echo "<meta http-equiv=\"Content-type\" content=\"text/html; charset=iso-8859-1\">\n";
  $check_version = getSetting('version_checking');
	if ($check_version) {
	  echo "<script type=\"text/javascript\" src=\"http://www.net2ftp.org/version.js\"></script>\n";
	  echo "<script type=\"text/javascript\" src=\"versioncheck.js\"></script>\n";
	}
	if ($state2 == "view" || $state2 == "edit") { echo "<title>ZPanel Filemanager - Provided by Net2FTP - $net2ftp_ftpserver$directory/$entry</title>\n"; }
	else                                        { echo "<title>ZPanel Filemanager - Provided by Net2FTP - $net2ftp_ftpserver$directory</title>\n"; }

// Include stylesheet
	$skinArray = getSkinArray();

	$css = $skinArray[$net2ftp_skin]['css'];
	if (!trim($css)) { $css = $skinArray[1]['css']; }

	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$css\">\n";

// Include javascript functions
	printJavascriptFunctions($state, $state2, $screen);

	if (($state2 == "edit" || $state2 == "newfile") && $wysiwyg == "wysiwyg" && ($browser_agent == "IE" && ($browser_version == "5.5" || $browser_version == "6.0"))) {
		echo "<script type=\"text/javascript\">\n";
		echo "_editor_url = \"./htmlarea/\";\n";
		echo "</script>\n";
		echo "<script type=\"text/javascript\" src=\"htmlarea/editor.js\"></script>\n";
	} // end if

// Link to favicon
//	echo "<link rel=\"shortcut icon\" href=\"favicon.ico\">\n";

	echo "</head>\n\n\n";

// -------------------------------------------------------------------------
// Body
// -------------------------------------------------------------------------
	echo "<body>\n";
	printFunctionTags("HtmlBegin", "begin");

// -------------------------------------------------------------------------
// Top status bar
// -------------------------------------------------------------------------
	if (($state=="manage" && $state2=="edit") || ($state=="manage" && $state2=="updatefile" && $screen=="screen3") || ($state=="manage" && $state2=="newfile") || ($state=="browse" && $state2=="popup") || $state=="error") {
		// Do not print anything
	}
	elseif ($state == "browse" || $state == "manage" || $state == "bookmark" || $state == "advanced") {
		echo "<form name=\"LogoutForm\" id=\"LogoutForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"state\" value=\"logout\" />\n";
		echo "</form>\n";

		echo "<table align=\"center\" class=\"header_table\">\n";
		echo "<tr style=\"height: 32px; vertical-align: middle;\">\n";

// FTP server
		echo "<td style=\"font-size: 120%; font-weight: bold;\">".$company."</td>\n";

// Space
		echo "<td tyle=\"width:20px;\">&nbsp;</td>\n";

// Status
		echo "<td style=\"text-align: right;\">Status: <input type=\"text\" style=\"width: 250px; background-color: #FFFFFF; color: #000000;\" id=\"status\" value=\"Starting the script...\" readonly/></td>\n";

		echo "<td style=\"text-align: right; width:180px;\">\n";
// Bookmark
		if ($state != "bookmark") { printBookmarkLink(); }
// Refresh
		echo getAction("refresh", "window.location.reload();");
// Help
		echo getAction("help", "void(window.open('help.html', 'Help', 'location, menubar, resizable, scrollbars, status, toolbar'));");
// Logout
		echo getAction("logout", "document.LogoutForm.submit()");
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
	else {
		echo "<div class=\"header11\">" . $pagetitle . "</div>\n";
	}

	printFunctionTags("HtmlBegin", "end");

	flush();

} // end function HtmlBegin

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function HtmlEnd($state, $state2, $screen) {

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$application_version = getSetting("application_version");

	printFunctionTags("HtmlEnd", "begin");

// -------------------------------------------------------------------------
// Edit: do not print anything
// -------------------------------------------------------------------------
	if (($state=="manage" && $state2=="edit") || ($state=="manage" && $state2=="newfile") || ($state=="manage" && $state2=="updatefile" && $screen=="screen3") || ($state=="browse" && $state2=="popup")) {
		// Do not print anything
	}

// -------------------------------------------------------------------------
// login and feedback: print only copyright notice
// -------------------------------------------------------------------------
	elseif ($state=="homepage" || $state=="feedback")  {
	// Advertisement
	// You are entitled to remove the "advertisement" below, because this
	// software is released under the GPL license. However, the copyright
	// notice at the beginning of this file may not be removed; note though
	// that this is not printed.
		echo "<table align=\"center\" style=\"margin-top: 50px;\">\n";
		echo "<tr>\n";
		echo "<td style=\"text-align: center; font-size: 70%;\">\n";
		echo "Powered by net2ftp $application_version &copy; <a href=\"http://www.net2ftp.com\">net2ftp.com</a><br />\n";
		$check_version = getSetting('version_checking');
		if ($check_version=="yes") {
		  echo "<script type=\"text/javascript\">\n";
      echo "<!--\n";
      echo "var current_version = '".$application_version."';\n";
      echo "if (typeof(stable_version)!=\"undefined\" && typeof(beta_version)!=\"undefined\") {\n";
      echo "  if (check_version(current_version, stable_version)) {\n";
      echo "    document.write('Theres a new stable version of Net2FTP available ('+stable_version+').<br />');\n";
      echo "  }\n";
      echo "  else if (check_version(current_version, beta_version)) {\n";
      echo "    document.write('Theres a new beta version of Net2FTP available ('+beta_version+').<br />');\n";
      echo "  }\n";
      echo "  else {\n";
      echo "    document.write('This version of Net2FTP is up-to-date.<br />');\n";
      echo "  }\n";
      echo "}\n";
      echo "//-->\n";
      echo "</script>\n";
	  }
		echo "net2ftp's main code is free software, released under the <a href=\"http://www.gnu.org\" target=\"_blank\">GNU/GPL license</a><br />\n";
		echo "Some modules have a different license, refer to the <a href=\"_LICENSE.txt\" target=\"_blank\">LICENSE</a> file for the details.\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}

// -------------------------------------------------------------------------
// All other cases: print link to feedback form, and the copyright notice
// -------------------------------------------------------------------------
	else {
	// Link to the feedback form
		echo "<table align=\"center\" style=\"margin-top: 50px;\">\n";
		echo "<tr>\n";
		echo "<td style=\"text-align: center; font-size: 70%;\">\n";

		echo "<a href=\"help.html\">Help</a> | \n";
		echo "<a href=\"http://www.net2ftp.org/forums\">Comments & Questions</a> | \n";
		echo "<a href=\"_LICENSE.txt\">License</a>\n";

	// Advertisement
	// You are entitled to remove the "advertisement" below, because this
	// software is released under the GPL license. However, the copyright
	// notice at the beginning of this file may not be removed; note though
	// that this is not printed.
		echo "<br /><br />Powered by net2ftp $application_version &copy; <a href=\"http://www.net2ftp.com\">net2ftp.com</a><br />\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}

// -------------------------------------------------------------------------
// Update the status
// -------------------------------------------------------------------------
	if (($state=="manage" && $state2=="edit") || ($state=="manage" && $state2=="updatefile" && $screen=="screen3") || ($state=="manage" && $state2=="newfile") || ($state=="browse" && $state2=="popup") || $state=="error") {
		// Do not print anything
	}
	elseif ($state == "browse" || $state == "manage" || $state == "bookmark" || $state == "advanced") {
		$time_taken = timer();
		setStatus_php("Script finished in $time_taken seconds");
	}

	echo "<!-- net2ftp version $application_version -->\n";

	printFunctionTags("HtmlEnd", "end");

	echo "</body>\n";
	echo "</html>\n";
}

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printJavascriptFunctions($state, $state2, $screen) {

// --------------
// This functions prints the Javascript functions in the header of each HTML page
// --------------

// -------------------------------------------------------------------------
// Global variables and settings
// -------------------------------------------------------------------------
	$max_execution_time = ini_get("max_execution_time");
	$browse_rows_fontcolor_odd  = getSkinColors("rows_fontcolor_odd");
	$browse_rows_bgcolor_odd    = getSkinColors("rows_bgcolor_odd");
	$browse_rows_fontcolor_even = getSkinColors("rows_fontcolor_even");
	$browse_rows_bgcolor_even   = getSkinColors("rows_bgcolor_even");
	$browse_selected_fontcolor  = getSkinColors("selected_fontcolor");
	$browse_selected_bgcolor    = getSkinColors("selected_bgcolor");


	printFunctionTags("printJavascriptFunctions", "begin");
	echo "<script type=\"text/javascript\"><!--\n";

	if (($state == "browse" && $state2 == "main") || ($state == "manage" && $state2 == "findstring")) {
		echo "function CheckAll(myform) {\n";
		echo "	var nr_checkboxes = 0;\n";
		echo "	for (var i = 0; i < myform.elements.length; i++) {\n";
		echo "		if (myform.elements[i].type == 'checkbox') {\n";
		echo "			myform.elements[i].checked = !(myform.elements[i].checked);\n";
		echo "			nr_checkboxes = nr_checkboxes + 1;\n";
		echo "		}\n";
		echo "	}\n";
		echo "	for (var j = 1; j <= nr_checkboxes; j++) {\n";
		echo "		setColor_js(j)\n";
		echo "	}\n";
		echo "}\n";

		echo "function setColor_js(i) {\n";
		// Parameters
		echo "	row_id = 'row' + i;\n";
		echo "	checkbox_id = 'list[' + i + '][dirfilename]';\n";
		echo "	if (i%2 == 1) { bgcolor_true = '$browse_selected_bgcolor'; fontcolor_true = '$browse_selected_fontcolor'; bgcolor_false = '$browse_rows_bgcolor_odd'; fontcolor_false = '$browse_rows_fontcolor_odd'; }\n";   // odd
		echo "	else          { bgcolor_true = '$browse_selected_bgcolor'; fontcolor_true = '$browse_selected_fontcolor'; bgcolor_false = '$browse_rows_bgcolor_even'; fontcolor_false = '$browse_rows_fontcolor_even'; }\n"; // even
		// Code
		echo "	if (document.getElementById) {\n";
		echo "		if (document.getElementById(checkbox_id).checked == true) { document.getElementById(row_id).style.background = bgcolor_true;  document.getElementById(row_id).style.color = fontcolor_true; }\n";
		echo "		else                                                      { document.getElementById(row_id).style.background = bgcolor_false; document.getElementById(row_id).style.color = fontcolor_false; }\n";
		echo "	}\n";
		echo "	else if (document.all) {\n";
		echo "		if (document.all[checkbox_id].checked == true) { document.all[row_id].style.background = bgcolor_true;  document.all[row_id].style.color = fontcolor_true; }\n";
		echo "		else                                           { document.all[row_id].style.background = bgcolor_false; document.all[row_id].style.color = fontcolor_false; }\n";
		echo "	}\n";
		echo "}\n";
	}

	if (($state == "browse" && $state2 == "main") || $state == "manage" || $state == "bookmark" || $state == "advanced") {
		echo "function setStatus_js(text) {\n";
		echo "	id = 'status';\n";
		echo "	if (document.getElementById) {\n";
		echo "		document.getElementById(id).value = text;\n";
		echo "	}\n";
		echo "	else if (document.all) {\n";
		echo "		document.all[id].value = text;\n";
		echo "	}\n";
		echo "}\n";
	}

	if (($state == "browse" && $state2 == "main") || ($state == "manage" && ($state2 == "copy" || $state2 == "move" || $state2 == "uploadfile")) || ($state == "advanced" && $state2 == "apache")) {
		echo "\nfunction createDirectoryTreeWindow(directory, FormAndFieldName) {\n";
		echo "	directoryTreeWindow = window.open(\"\",\"directoryTreeWindow\",\"height=450,width=300,resizable=yes,scrollbars=yes\");\n";
		echo "	var d = directoryTreeWindow.document;\n";
		echo "	d.writeln('<html>');\n";
		echo "	d.writeln('<head>');\n";
		echo "	d.writeln('<title>Choose a directory</title>');\n";
		echo "	d.writeln('</head>');\n";
		echo "	d.writeln('<bo' + 'dy on' + 'load=\"document.DirectoryTreeForm.submit();\">');\n";
//		echo "	d.writeln('<body>');\n";
		echo "	d.writeln('Please wait...<br /><br />');\n";
		echo "	d.writeln('<form name=\"DirectoryTreeForm\" id=\"DirectoryTreeForm\" action=\"" . printPHP_SELF("no") . "\" method=\"post\"/>');\n";
		printLoginInfo_javascript();
		echo "	d.writeln('<input type=\"hidden\" name=\"state\" value=\"browse\" />');\n";
		echo "	d.writeln('<input type=\"hidden\" name=\"state2\" value=\"popup\" />');\n";
		echo "	d.writeln('<input type=\"hidden\" name=\"directory\" value=\"' + directory + '\"  />');\n";
		echo "	d.writeln('<input type=\"hidden\" name=\"FormAndFieldName\" value=\"' + FormAndFieldName + '\"  />');\n";
//		echo "	d.writeln('<input type=\"submit\" class=\"smallbutton\" value=\"Submit\"/>');\n";
//		echo "	d.writeln('<input type=\"button\" class=\"smallbutton\" value=\"Close\" onClick=\"self.close()\" />');\n";
		echo "	d.writeln('</form>');\n";
		echo "	d.writeln('</div>');\n";
		echo "	d.writeln('</body>');\n";
		echo "	d.writeln('</html>');\n";
		echo "	d.close();\n";
		echo "} // end function createDirectoryTreeWindow\n";
	}

	if ($state == "manage" && $state2 == "uploadfile") {
		echo "\nfunction createUploadWindow() {\n";
		echo "	uploadWindow = window.open(\"\",\"uploadWindow\",\"height=170,width=400,resizable=yes,scrollbars=yes\");\n";
		echo "	var d = uploadWindow.document;\n";
		echo "	d.writeln('<html>');\n";
		echo "	d.writeln('<head>');\n";
		echo "	d.writeln('<title>Uploading... please wait...</title>');\n";
		echo "	d.writeln('</head>');\n";
		echo "	d.writeln('<body>');\n";
		echo "	d.writeln('Uploading... please wait...<br /><br />');\n";
		echo "	d.writeln('If the upload takes more than the allowed <b>$max_execution_time seconds</b>, you will have to try again with less/smaller files.<br /><br />');\n";

		echo "	d.writeln('<scr' + 'ipt lan' + 'guage=\"jav' + 'ascript\">');\n";
		echo "	d.writeln('setTimeout(\"self.close()\",8000);');\n";
		echo "	d.writeln('</scr' + 'ipt>');\n";

		echo "	d.writeln('<form><span style=\"font-size: 70%;\">');\n";
		echo "	d.writeln('This window will close automatically in a few seconds.<br />');\n";
		echo "	d.writeln('<a href=\"jav' + 'ascript:self.close();\">Close window now</a>');\n";
		echo "	d.writeln('</span></form>');\n";

		echo "	d.writeln('</body>');\n";
		echo "	d.writeln('</html>');\n";
		echo "	d.close();\n";

		echo "} // end function createUploadWindow\n";
	}

	if ($state == "browse" && $state2 == "popup") {
		echo "\nfunction submitDirectoryTreeForm() {\n";
		echo "	if (document.DirectoryTreeForm.DirectoryTreeSelect.options[document.DirectoryTreeForm.DirectoryTreeSelect.selectedIndex].value != 'up') { document.DirectoryTreeForm.directory.value=document.DirectoryTreeForm.directory.value + '/' + document.DirectoryTreeForm.DirectoryTreeSelect.options[document.DirectoryTreeForm.DirectoryTreeSelect.selectedIndex].value; }\n";
		echo "	else { document.DirectoryTreeForm.directory.value = document.DirectoryTreeForm.updirectory.value; }\n";
		echo "	document.DirectoryTreeForm.submit();\n";
		echo "} // end function submitDirectoryTreeForm\n";

	}

  if ($state == "manage" && ($state2 == "copy" || $state2 == "move")) {
    echo "\nfunction CopyValueToAll(myform, mysourcefield, mytargetfieldname) {\n";
    echo " for (var i = 0; i < myform.elements.length; i++) {\n";
    echo "  if (myform.elements[i].name.indexOf(mytargetfieldname) >= 0) {\n";
    echo "   myform.elements[i].value = mysourcefield.value;\n";
    echo "  }\n";
    echo " }\n";
    echo "}\n";
  }

  if ($state2 == "chmod") {
    echo "function update_field(id,text) {\n";
    echo " if (document.getElementById) {\n";
    echo "  document.getElementById(id).value = text;\n";
    echo " }\n";
    echo " else if (document.all) {\n";
    echo "  document.all[id].value = text;\n";
    echo " }\n";
    echo "}\n";

    echo "function get_field(id) {\n";
    echo " if (document.getElementById) {\n";
    echo "  var value = document.getElementById(id).value;\n";
    echo " }\n";
    echo " else if (document.all) {\n";
    echo "  var value = document.all[id].value;\n";
    echo " }\n";
    echo " return value;\n";
    echo "}\n";

    echo "function update_input(num) {\n";
    echo "  var myform = document.ChmodForm;\n";
    echo "  var myfield = 'chmod';\n";
    echo "  var regexp = /list\\[([0-9]+)\\]\\[(owner|group|other)_(read|write|execute)\\]/i;\n";
    echo "  var myArray = new Array();\n";
    echo "  var maxfields = 0;\n";
    echo " for (var i = 0; i < myform.elements.length; i++) {\n";
    echo "  if (regexp.test(myform.elements[i].name)) {\n";
    echo "    var ar = regexp.exec(myform.elements[i].name);\n";
    echo "   var checked = myform.elements[i].checked;\n";
    echo "   if (maxfields<ar[1]) maxfields = ar[1];\n";
    echo "      myArray[myArray.length] = new Array(ar[1],ar[2],ar[3],checked);\n";
    echo "  }\n";
    echo " }\n";
    echo " if (!num || num==\"all\" || num == '') num = 0;\n";
    echo " for(var i=0; i<maxfields; i++) {\n";
    echo "    var id = i+1;\n";
    echo "    if (num==0 || num==id) {\n";
    echo "     var owner = 0;\n";
    echo "     var group = 0;\n";
    echo "     var other = 0;\n";
    echo "     var add = 0;\n";
    echo "      for (var j=0; j<myArray.length; j++) {\n";
    echo "        checked = myArray[j][3];\n";
    echo "        if (checked && id==myArray[j][0]) {\n";
    echo "       if(myArray[j][2]=='read') add = 4;\n";
    echo "       else if(myArray[j][2]=='write') add = 2;\n";
    echo "       else if(myArray[j][2]=='execute') add = 1;\n";
    echo "       if(myArray[j][1]=='owner') owner += add;\n";
    echo "       else if(myArray[j][1]=='group') group += add;\n";
    echo "       else if(myArray[j][1]=='other') other += add;\n";
    echo "      }\n";
    echo "      }\n";
    echo "      update_field(myfield+id,owner+''+group+''+other);\n";
    echo "      if (num!=0 && num==id) break;\n";
    echo "    }\n";
    echo "  }\n";
    echo "}\n";

    echo "function update_checkbox(num) {\n";
    echo "  var myform = document.ChmodForm;\n";
    echo "  var myfield = 'chmod';\n";
    echo "  var regexp = /list\\[([0-9]+)\\]\\[(owner|group|other)_(read|write|execute)\\]/i;\n";
    echo "  if (!num || num==\"all\" || num == '') num = 0;\n";
    echo "  for (var i = 0; i < myform.elements.length; i++) {\n";
    echo "    var name = myform.elements[i].name;\n";
    echo "    if (name.substr(0,myfield.length) == myfield) {\n";
    echo "      var id = name.substr(myfield.length,name.length);\n";
    echo "      if (id>0 && (num==0 || num==id)) {\n";
    echo "        var field = get_field(myfield+id);\n";
    echo "        var o = field.substr(0,1);\n";
    echo "        var g = field.substr(1,1);\n";
    echo "        var e = field.substr(2,1);\n";
    echo "        if (field.length==3 && o>=0 && o<=7 && g>=0 && g<=7 && e>=0 && e<=7) {\n";
    echo "         for (var j = 0; j < myform.elements.length; j++) {\n";
    echo "          if (regexp.test(myform.elements[j].name)) {\n";
    echo "            var ar = regexp.exec(myform.elements[j].name);\n";
    echo "            if (ar[1]==id) {\n";
    echo "              var check = false;\n";
    echo "             if (ar[2]=='owner') {\n";
    echo "               if (ar[3]=='read' && (o==4 || o==5 || o==6 || o==7))\n";
    echo "                 check = true;\n";
    echo "              if (ar[3]=='write' && (o==2 || o==3 || o==6 || o==7))\n";
    echo "                 check = true;\n";
    echo "               if (ar[3]=='execute' && (o==1 || o==3 || o==5 || o==7))\n";
    echo "                 check = true;\n";
    echo "             }\n";
    echo "             else if (ar[2]=='group') {\n";
    echo "               if (ar[3]=='read' && (g==4 || g==5 || g==6 || g==7))\n";
    echo "                 check = true;\n";
    echo "               if (ar[3]=='write' && (g==2 || g==3 || g==6 || g==7))\n";
    echo "                 check = true;\n";
    echo "               if (ar[3]=='execute' && (g==1 || g==3 || g==5 || g==7))\n";
    echo "                 check = true;\n";
    echo "             }\n";
    echo "             else if (ar[2]=='other') {\n";
    echo "               if (ar[3]=='read' && (e==4 || e==5 || e==6 || e==7))\n";
    echo "                 check = true;\n";
    echo "               if (ar[3]=='write' && (e==2 || e==3 || e==6 || e==7))\n";
    echo "                 check = true;\n";
    echo "               if (ar[3]=='execute' && (e==1 || e==3 || e==5 || e==7))\n";
    echo "                 check = true;\n";
    echo "             }\n";
    echo "             if (check==true) myform.elements[j].checked = 1;\n";
    echo "             else myform.elements[j].checked = 0;\n";
    echo "           }\n";
    echo "            }\n";
    echo "          }\n";
    echo "      }\n";
    echo "      else {\n";
    echo "        update_input(id);\n";
    echo "      }\n";
    echo "     }\n";
    echo "   }\n";
    echo "  }\n";
    echo "}\n";
  }

  if ($state == "manage" && $state2 == "chmod") {
    echo "\nfunction CopyCheckboxToAll(myform, mysourcefieldname, mytargetfieldname) {\n";
    echo " for (var i = 0; i < myform.elements.length; i++) {\n";
    echo "  if (myform.elements[i].name.indexOf(mysourcefieldname) >= 0) {\n";

    echo "   for (var j = 0; j < myform.elements.length; j++) {\n";
    echo "    if (myform.elements[j].name.indexOf(mytargetfieldname) >= 0) {\n";
    echo "     myform.elements[j].checked = myform.elements[i].checked;\n";
    echo "    }\n";
    echo "   }\n";

    echo "  }\n";
    echo " }\n";
    echo "}\n";
  }


//	if ($state == "" || $state == "login") {
//		THE JAVASCRIPT FUNCTIONS USED ON THE LOGIN PAGE ARE LOCATED
//          IN THE FILE net2ftp_loginform.inc.php
//	}

	echo "//--></script>\n";
	printFunctionTags("printJavascriptFunctions", "end");

} // end printJavascriptFunctions

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function setStatus_php($text) {

// --------------
// This function prints the Javascript which will update the status in the top table
// See also the Javascript function setStatus_js defined in the PHP function printJavascriptFunctions.
// --------------

	echo "<script type=\"text/javascript\"><!--\n";
	echo "	setStatus_js('$text');\n";
	echo "//--></script>\n";

	flush();

} // End function setStatus_php

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function timer() {

// --------------
// This function calculates the time between starttime and endtime in milliseconds
// --------------

	global $starttime, $endtime; // the value is set in index.php

	list($start_usec, $start_sec) = explode(' ', $starttime);
	$starttime  = ((float)$start_usec + (float)$start_sec);
	list($end_usec, $end_sec) = explode(' ', $endtime);
	$endtime    = ((float)$end_usec + (float)$end_sec);
	$time_taken = ($endtime - $starttime);   // to convert from microsec to sec
	$time_taken = number_format($time_taken, 2);     // optional

	return $time_taken;

} // End function timer

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function mytime() {
	$datetime = date("Y-m-d H:i:s");
	return $datetime;
}

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function printTitle($title) {

// --------------
// This function prints the a title
// --------------

	echo "<div class=\"header21\">\n";
	echo "$title\n";
	echo "</div>\n";

} // End function printTitle

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **

function getBrowser($what) {

// --------------
// This function returns the browser name, version and platform using the http_user_agent string
// --------------

// Original code comes from http://www.phpbuilder.com/columns/tim20000821.php3?print_mode=1
// Written by Tim Perdue, and released under the GPL license
//
// SourceForge: Breaking Down the Barriers to Open Source Development
// Copyright 1999-2000 (c) The SourceForge Crew
// http://sourceforge.net
//
// $Id: tim20000821.php3,v 1.2 2001/05/22 19:22:47 tim Exp $


	global $HTTP_USER_AGENT;

	if ($what == "version" || $what == "agent") {

// -------------------------------------------------------------------------
// Determine browser and version
// -------------------------------------------------------------------------

		if (ereg('MSIE ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$regs)) {
			$BROWSER_VERSION = $regs[1];
			$BROWSER_AGENT = 'IE';
		}
		elseif (ereg('Opera ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$regs)) {
			$BROWSER_VERSION = $regs[1];
			$BROWSER_AGENT = 'Opera';
		}
		elseif (ereg('Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$regs)) {
			$BROWSER_VERSION = $regs[1];
			$BROWSER_AGENT = 'Mozilla';
		}
		else {
			$BROWSER_VERSION = 0;
			$BROWSER_AGENT = 'Other';
		}

		if ($what == "version") { return $BROWSER_VERSION; }
		elseif ($what == "agent")   { return $BROWSER_AGENT; }

	} // end if

// -------------------------------------------------------------------------
// Determine platform
// -------------------------------------------------------------------------

	elseif ($what == "platform") {

		if (strstr($HTTP_USER_AGENT,'Win')) {
			$BROWSER_PLATFORM = 'Win';
		}
		else if (strstr($HTTP_USER_AGENT,'Mac')) {
			$BROWSER_PLATFORM = 'Mac';
		}
		else if (strstr($HTTP_USER_AGENT,'Linux')) {
			$BROWSER_PLATFORM = 'Linux';
		}
		else if (strstr($HTTP_USER_AGENT,'Unix')) {
			$BROWSER_PLATFORM = 'Unix';
		}
		else {
			$BROWSER_PLATFORM = 'Other';
		}

		return $BROWSER_PLATFORM;

	} // end if elseif

} // End function getBrowser

// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>
