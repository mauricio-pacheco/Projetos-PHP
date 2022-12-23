<?
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2004 Hidde Fennema (hidde@it-combine.com)
 * Licensed under the GNU GPL. For full terms see http://www.gnu.org/
 *
 * This file does several things :)
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */
error_reporting(E_ALL ^ E_NOTICE);


//print "<pre>";
//print_r($_SERVER);
//print "</pre>";



if (!$_SERVER['SCRIPT_NAME']) {
	print "This function is not available using the command line.\n";
	exit;
 }
ob_start();
print "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
$n_E = extract($_REQUEST);

if ($wait) {
			// This is the code for the search-window with the animated gif
			// in it which appears only when searching for random text strings

			?>

			<HTML>
			<TITLE>Searching.....................................</TITLE>
			<SCRIPT LANGUAGE="JavaScript">
					<!--
						document.write('<link href="crm_dft.css" rel="stylesheet" type="text/css">');
						setTimeout('top.close()',20000);
					//-->
					</SCRIPT>
					
					<center>
					<table width=100% height=100%><tr><td valign='center'><center>
					<img src='crm.gif'><br>
					<img src='movingbar.gif'>
					<br>Please wait ...
					</center></td></tr></table></center>
					</BODY></HTML>
					<?
						
						exit;
			
			
}
require_once("config.inc.php");
require_once("getset.php");

qlog("Extracted " . $n_E . " variables to symbol table.");


// Remove any locks - a user cannot have any locks at this stage
if (!stristr($_SERVER['SCRIPT_NAME'],"calendar.php") && !$_REQUEST['keeplocked']) {
	RemoveLocks();
	//qlog("LOCKS REMOVED");
} else {
	//qlog("LOCKS NOT REMOVED");
}


include("language.php");



// Check if this should be a secure connection
if ($_SERVER['HTTPS']<>"on" && strtoupper($GLOBALS['ForceSecureHTTP'])=="YES") {
	qlog("This user is on the wrong port (80 i.s.o. 443) ... redirecting to https://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
	$to = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
	print "<table border='0' width='50%'><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<img src='info.gif'></legend><font size='2' face='MS Shell DLG'><br><center>Per administrator's request you are redirected to a secure connection.<br> </center><br></font></fieldset></td></tr></table>";
	?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.location = '<? echo $to;?>';
		//-->
		</SCRIPT>
	<?
	EndHTML();
	exit;

} elseif ($_SERVER['HTTPS']=="on" && strtoupper($GLOBALS['ForceSecureHTTP'])=="YES") {
	qlog("This is a secure connection, no need to force");
}

?>
<html>
<head>

<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
<!--
function AdjustDateToUSAFormat(date) {

	if ('<? echo $DateFormat;?>'=='mm-dd-yyyy') { 

			day = date.substring(0,2);
			mon = date.substring(3,5);
			yer = date.substring(6,10);

			NewDate = mon + "-" + day + "-" + yer;
	} else {
			NewDate = date;
	}
	
	document.EditEntity.displayDate.value = NewDate;
	document.EditEntity.displayDate.blur();
}
function AdjustEFDateToUSAFormat(date,field) {

	if ('<? echo $DateFormat;?>'=='mm-dd-yyyy') { 

			day = date.substring(0,2);
			mon = date.substring(3,5);
			yer = date.substring(6,10);

			NewDate = mon + "-" + day + "-" + yer;
	} else {
			NewDate = date;
	}
//	alert('field ' + field + ' set to ' + NewDate);
//	var obj = 'document.' + field + '.value';
//	document.field.value = NewDate;
	document.getElementById(field).value = NewDate;
	//document.field.blur();
	
}
function InsertSTDtext(text) {
	now = new Date;
	if (now.getMinutes() < 10) { 
		var minutes = "0" + now.getMinutes();
	}
	else {
		var minutes = now.getMinutes();
	}
	if (now.getHours() < 10) { 
		var hours = "0" + now.getHours();
	}
	else {
		var hours = now.getHours();
	}
	var add = "[" + now + "] -  <? echo GetUserName($GLOBALS['USERID']);?>: " + text + "\n\n";
	document.EditEntity.did_time.value = "Already done - don't do it again, it'll look messy";
	document.EditEntity.content.value = add + document.EditEntity.content.value;
	document.EditEntity.content.focus();
}

function InsertDateTimeCMF(formid) {
	now = new Date;
	if (now.getMinutes() < 10) { 
		var minutes = "0" + now.getMinutes();
	}
	else {
		var minutes = now.getMinutes();
	}
	if (now.getHours() < 10) { 
		var hours = "0" + now.getHours();
	}
	else {
		var hours = now.getHours();
	}
	var add = "[" + now + "] - <? echo GetUserName($GLOBALS['USERID']);?>: \n\n";
	var len = add.length;

	formid.value = add + formid.value;
	formid.focus();
	
}

function InsertDateTime() {
	now = new Date;
	if (now.getMinutes() < 10) { 
		var minutes = "0" + now.getMinutes();
	}
	else {
		var minutes = now.getMinutes();
	}
	if (now.getHours() < 10) { 
		var hours = "0" + now.getHours();
	}
	else {
		var hours = now.getHours();
	}
	var add = "[" + now + "] - <? echo GetUserName($GLOBALS['USERID']);?>: \n\n";
	var len = add.length;

	document.EditEntity.did_time.value = "Already done - don't do it again, it'll look messy";
	document.EditEntity.content.value = add + document.EditEntity.content.value;
	document.EditEntity.content.focus();
	
}

function InsertDateTimeOnce() {
	
	if (document.EditEntity.did_time.value == "not yet") {
		now = new Date;
		if (now.getMinutes() < 10) { 
			var minutes = "0" + now.getMinutes();
		}
		else {
			var minutes = now.getMinutes();
		}
		if (now.getHours() < 10) { 
			var hours = "0" + now.getHours();
		}
		else {
			var hours = now.getHours();
		}
		var add = "[" + now + "] - <? echo GetUserName($GLOBALS['USERID']);?>: \n\n";
		document.EditEntity.did_time.value = "Already done - don't do it again, it'll look messy";
		document.EditEntity.content.value = add + document.EditEntity.content.value;
		document.EditEntity.content.focus();

	} 

}
//-->
</SCRIPT>

<?


// Get account type
// Define user clearance level:

$sql = "SELECT CLLEVEL FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name'";
$result= mcq($sql,$db);
$result= mysql_fetch_array($result);
$_GLOBALS['CL'] = $result['CLLEVEL'];

$sql= "SELECT type,CLLEVEL,id,FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name'";
if ($debug) { print "\nSQL: $sql\n"; }
$result= mcq($sql,$db);
$result= mysql_fetch_array($result);

$user_id = $result[id];
$fullname = $result[FULLNAME];

if ($result[CLLEVEL]=="ooro") {
	$result[type]='limited';
}
if (($result[CLLEVEL]=="ro" || $result[CLLEVEL]=="ro+") && !$thisishelp==1 && !$custinsertmode) {
?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.location='cust-insert.php';	
		//-->
		</SCRIPT>
		<?
		exit;
} 

if (($result[type]=='limited' || $result[CLLEVEL]=="read-only-all") && !$thisishelp==1) {
	?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
		
		if (document.location!='management.php') {
			document.location='management.php';		    
		}

		//-->
		</SCRIPT>
		<?
		exit;
}


if ($thisishelp) {
		if (!stristr($_SERVER['SCRIPT_NAME'],"help.php")) {
			print "Illegal";
			exit;
		}
}

	
$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='timeout'";
$result= mcq($sql,$db);
$result= mysql_fetch_array($result);
$timeout = $result[value];
$timeoutsec = $timeout * 60;

print "<title>" . $title . "</title>";

$GLOBALS['CURFUNC'] = "LoadLanguage::";
if (strlen($lang['CHARACTER-ENCODING'])>2) {
	qlog("Character-encoding override in effect: " . $lang['CHARACTER-ENCODING']);
	$charset = $lang['CHARACTER-ENCODING'];
	$GLOBALS['CHARACTER-ENCODING'] = $lang['CHARACTER-ENCODING'];
} else {
	$charset = "ISO-8859-1";
	$GLOBALS['CHARACTER-ENCODING'] = "ISO-8859-1";
}

?>
<META HTTP-EQUIV="Expires" CONTENT="0">
<META http-equiv="Content-Type" content="text/html; charset=<? echo $charset;?>">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Refresh" CONTENT="<? echo $timeoutsec;?>;url=index.php?logout=1&amp;expire=1">
<LINK rel="shortcut icon" href="favicon.ico">
<?
//<LINK href="crm.css" rel="stylesheet" type="text/css">

DisplayCSS();

/*
			URL = 'index.php';
			day = new Date();
			id = day.getTime();
			eval("page" + id + " = window.open(URL, '" + id + "', 'titlebar=no,toolbar=0,location=0,width=1016,height=718,directories=0,status=0,menuBar=0,scrollBars=0,resizable=0,screenX=0,screenY=0,left=0,top=0');");
			win = top;
			win.opener = top;
			win.close ();
*/

?>

</head>
<script language="JavaScript1.2">
<!--	
			
			window.status=('<? echo $title . " - " . $CRM_SHORTVERSION . " - DB::" . $host[$repository_nr] . ":" . $database[$repository_nr] . "/" . $table_prefix[$repository_nr] . "*";?> - User: <? echo $name; ?>');
//-->
</SCRIPT>


<SCRIPT LANGUAGE="JavaScript" SRC="functions.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="overlib.js"></SCRIPT>
<DIV class="popupmenu" ID="overDiv" nowrap STYLE="position:absolute; visibility:hidden; z-index:2;"></DIV>
<?


print "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" marginwidth=\"0\" topmargin=\"0\" marginheight=\"0\" link=\"#336699\" text=\"#333333\" alink=\"white\" vlink=\"#666666\" class=\"bigsort\"";

 
// This is for the alert when leaving the edit page without saving

if (stristr($HTTP_SERVER_VARS['PHP_SELF'],"edit.php") && !stristr($HTTP_SERVER_VARS['PHP_SELF'],"dictedit.php")) {
	print " onUnload=\"leave();";
}
if ((stristr($HTTP_SERVER_VARS['PHP_SELF'],"edit.php") || stristr($HTTP_SERVER_VARS['PHP_SELF'],"cust_insert.php")) && $GLOBALS['EnableEntityLocking']=="Yes" && !stristr($HTTP_SERVER_VARS['PHP_SELF'],"dictedit.php") && !$_REQUEST['SendEmailToOtherUsers']) {
	print ";leaveUnlock();\" OnLoad=\"setTimeout('LockWarning()', 600000);\"";
//	$lock = true;
} else {
	print "\"";
}


print ">";

//if ($lock) {
//	print "LOCKING!!!!";
//}

if ($debug) {
		debug();
}

if (!$nonavbar) {
	if ($navtype=="NOTABS") {
		nav();
		print "<hr>";
	} else {
		if ($toptab) {
			$tab = $toptab;
		}
		include("tabsbar.php");
	}

} else {
	print "<table border=\"0\" width=\"100%\">";

}
if ($thisishelp) {
	if (!$noc) {
		print "<tr><td width='100%'><a href='help.php?id=contents' class='topnav'>" . $lang['helpcontents'] . "</a> | <a OnCLick='javascript:window.close()' style='cursor:pointer' class='topnav'>Close</a></td></tr>";   
		print "<tr><td width='100%'><hr></td></tr>";
	}
}

print "<form name='clipboardform'><input type='hidden' name='clipboardvalue'></form>";

print $GLOBALS['BODY_URGENTMESSAGE'];

?>