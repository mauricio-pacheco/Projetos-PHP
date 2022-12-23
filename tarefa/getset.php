<?
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2004 Hidde Fennema (hidde@it-combine.com)
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 *
 * This file does several things :)
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */
//error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL);
extract($_REQUEST);
// Set error reporting level
error_reporting(E_ERROR);

require_once("functions.php");
$GLOBALS['starttime'] = microtime_float();
require_once("class.phpmailer.php");

//require_once("sajax.php");

// This file is called from header.inc.php just after config.inc.php and before language.php

// It is not recommended nor needed to edit values in this file unless you're debugging or developing

// Enable debug mode: 
// Some qeuries become visible. Some functions will not work (mostly file pushes and cookies)
// when you enable debug. More information regarding variable values in the source of the 
// result pages - ALSO PASSWORD VALUES- BE CAREFUL!

// When not using debug, leave this line with = false; to avoid hacking using REGISTER_GLOBALS

// Update, version 2.6.0: don't use debug, it's useless. Use the logqueries, logtext, and onscreen
// function, about 20 lines down.

    $GLOBALS['debug'] = false;

// Logqueries : Wether or not to log *all* MySQL queries in qlist.txt 
//
// 1. This generates LOTS of data
// 2. You need to have a file called "qlist.txt" in your CRM installation
//    directory which is owned by the user under which your webserver runs
// 3. Since this file could be webserver-readable plain text, all your data could
//    be exposed - THESE QUERIES MIGHT CONTAIN READABLE PASSWORDS!
//
// Logtext: wether or not to log remarks made by me (high-traffic)
//
// 1. This generates LOTS of data
// 2. You need to have a file called "qlist.txt" in your CRM installation
//    directory which is owned by the user under which your webserver runs
// 3. Since this file could be webserver-readable plain text, all your data could
//    be exposed
//
// On Linux, to make sure qlist.txt cannot be exposed, make it owned by somebody OTHER THAN the 
// webserver users, and issue chmod 702 qlist.txt. This will make it world-writeable, but not readable.
// On Windows, don't bother. You will be exposed anyhow ;)
//
// Generally NOT recommended for security reasons!

// When _not_ using logqueries and logtext, leave these lines with = false; to 
// avoid hacking using REGISTER_GLOBALS

// Enable the qlog_onscreen to have on-screen logging (will pop up in a window)
// (you can also enable this in the administration section)

	$GLOBALS['logqueries']    = false;   // logs all queries (10% slower)
	$GLOBALS['logtext']       = false;   // logs all comments - alternative: user-num. Logs only that user. (25% slower)
	$GLOBALS['query_timer']   = false;   // logs slowest SQL query
	$GLOBALS['qlog_onscreen'] = false;   // displays pop-up containing log
	$GLOBALS['ShowTraceLink'] = false;   // displays qlog trace link at end of page (same 25% slower as 'logtext')

// Performance thingy

	$GLOBALS['USE_EXTENDED_CACHE_WHAT'] = "all";

// Version information (DO NOT CHANGE THESE VALUES!)
	
	$GLOBALS['VERSION'] = "3.4.2"; // The main version
	$GLOBALS['AUTHOR']  = "Hidde Fennema";
	$GLOBALS['PRODUCT'] = "CRM-CTT";

	$CRM_SHORTVERSION = $GLOBALS['PRODUCT'] . " " . $GLOBALS['VERSION'];
	$CRM_VERSION = $CRM_SHORTVERSION . " (c) 2001-2006";

	$GLOBALS['CRM_SHORTVERSION'] = $CRM_SHORTVERSION;
	$GLOBALS['CRM_VERSION'] = $CRM_VERSION;

	if (strstr($CRM_SHORTVERSION, "devel")) {
		$CRM_SHORTVERSION .= " DEVELOPMENT ";
		$CRM_VERSION .= " DEVELOPMENT ";
	}

	if (strstr($CRM_SHORTVERSION, "pre")) {
		$CRM_SHORTVERSION .= " BETA RELEASE ";
		$CRM_VERSION .= " BETA RELEASE ";
	}

	if (strstr($CRM_SHORTVERSION, "rc1")) {
		$CRM_SHORTVERSION .= " RELEASE CANDIDATE 1 ";
		$CRM_VERSION .= " RELEASE CANDIDATE 1";
	}
	if (strstr($CRM_SHORTVERSION, "rc2")) {
		$CRM_SHORTVERSION .= " RELEASE CANDIDATE 2 ";
		$CRM_VERSION .= " RELEASE CANDIDATE 2";
	}
	if (strstr($CRM_SHORTVERSION, "rc3")) {
		$CRM_SHORTVERSION .= " RELEASE CANDIDATE 3 ";
		$CRM_VERSION .= " RELEASE CANDIDATE 3";
	}
	
	// Add a warning when debug, text logging or query logging is enabled
    
	if ($GLOBALS['logqueries']) { $CRM_VERSION .= " - QLOG ENABLED"; }
	if ($GLOBALS['debug']) { $CRM_VERSION .= " - DEBUG ENABLED"; }
	if ($GLOBALS['logtext']) { $CRM_VERSION .= " - LOGTEXT ENABLED"; }


	$GLOBALS['webhost'] = getenv("HOSTNAME");
	// Extract last repository number and language setting from cookie

	// Don't do it if blank=1
    if (!$_REQUEST['blank'] && !$rss && !$_REQUEST['rep']) {
		$repository_nr = $_COOKIE['repository'];
		$language_display = $_COOKIE['language_display'];
	} else {
		$repository_nr = $_REQUEST['rep'];
	}

    
    $GLOBALS['ef_inline_edit'] = $_COOKIE['ef_inline_edit'];

	if ($_COOKIE['log_on_screen'] == "y") {
		qlog("Forced on-screen logging - log_on_screen cookie is set");
		$GLOBALS['logtext']       = 1;   // logs all comments
		$GLOBALS['query_timer']   = 1;   // logs slowest SQL query
		$GLOBALS['qlog_onscreen'] = 1;   // displays pop-up containing log
	}

// Catch reposnr var (given when the cron job comes along)

if ($reposnr) {
			$repository_nr = $reposnr;
}

if ($repository_nr=="" || $repository_nr==0) {
	$repository_nr=0;
}

if ($repository_nr==sizeof($pass) || $repository_nr>sizeof($pass)) {
    $repository_nr=0;
}

if (stristr($_SERVER['SCRIPT_NAME'],"webdav_file.php")) {

	
	// URL could be ...../webdav_file.php/[repnr]/[id]
	// URL could be ...../webdav_file.php/[repnr]/
	// URL could be ...../webdav_file.php/[repnr]
	// URL could be ...../webdav_file.php/[repnr]/[id]/file.doc
	// URL could be ...../webdav_file.php/ (which is wrong)
	
	$tmp = $_SERVER['REQUEST_URI'];

	$tmp2 = split("webdav_file.php",$tmp);

	$tmp2 = split("/",$tmp2[1]);


	$repository_nr = $tmp2[1];
	$repos_nr = $tmp2[1];

	if ($repository_nr == "") {
		exit;
	}
	$dni = 1;

} elseif (stristr($_SERVER['SCRIPT_NAME'],"subscribe.php")) {
	// do nothing
} else {
	$dni = 0;
}
// Now determine the table prefix (quite important)

$GLOBALS['TBL_PREFIX'] = $table_prefix[$repository_nr];

// If no TBL_PREFIX is found, it ought to be "CRM"

if ($GLOBALS['TBL_PREFIX']=="") {
	$GLOBALS['TBL_PREFIX']="CRM";
	$GLOBALS['FORCED_TBL']="1";
	qlog("WARNING - FORCED TABLE PREFIX TO CRM! Please set a table prefix for this repository!");
}

	$db = @mysql_connect($host[$repository_nr], $user[$repository_nr], $pass[$repository_nr]);

	if (@mysql_select_db($database[$repository_nr],$db)) 
	{
		// all ok, now authenticate!
		$GLOBALS['REPOSNR'] = $repository_nr;
	}
	else {
		if ($_SERVER['PHP_SELF']=="/sub_ocf.php") {
			print "Couldn't connect to the database.\n";
			print "$host[$repository_nr], $user[$repository_nr], $pass[$repository_nr]";
			exit;
		}
		
		?>
	 	
		<SCRIPT LANGUAGE="javascript" SRC="cookies.js" type="text/javascript"></SCRIPT>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
			setCookie('repository','');
			setCookie('mainpagequery','');
		//-->
		</SCRIPT>
							
		<?
		DisplayCSS();
		?>
		

		<table width='75%'>
			<tr>
				<td>
					<fieldset>
						<legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;
							<img src='error.gif'>
						</legend>
						An error occured. CRM-CTT was unable to connect to the database as stored in your configuration or cookie.<br><br>
						This error could have been caused by:
							<ul>
								<li> You, or an admin, deleted the repository in which you are working </li>
								<li> The database-server (<? echo $host[$repository_nr];?>) was not responding  </li>
								<li> The username or password configured in CRM-CTT for contacting the database is incorrect </li>
								<li> The configuration file has been altered </li>
								<li> Your browser might not support cookies </li>
							</ul>
						Please contact your system administrator for more information. The database error message is:<br><br>
						<pre><? print mysql_error(); ?></pre>
						<br>
						You can try to login again ignoring any cookies <img src='arrow.gif'> <a href='index.php?blank=1' class='bigsort'>here</a><br>
					</fieldset>
				</td>
			</tr>
		</table>



		</BODY></HTML>
		<?
		exit;
	}



$servername = $_SERVER['SERVER_NAME'];

// Collect settings

$sql= "SELECT setting, value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting<>'STASH'";
$result= mcq($sql,$db);								
while ($resarr=mysql_fetch_array($result)){
		$$resarr['setting'] = $resarr['value'];
		$GLOBALS[$resarr['setting']] = $resarr['value'];
}

// Unserialize some data

$GLOBALS['PersonalTabs']				= unserialize($GLOBALS['PersonalTabs']);
$MainListColumnsToShow					= unserialize($MainListColumnsToShow);
$MainListColumnsToShowGlobal			= unserialize($MainListColumnsToShow);
$GLOBALS['MainListColumnsToShow']		= $MainListColumnsToShow;
$GLOBALS['MainListColumnsToShowGlobal']	= $MainListColumnsToShow;
$CustomerListColumnsToShow				= unserialize($CustomerListColumnsToShow);
$GLOBALS['CustomerListColumnsToShow']	= $CustomerListColumnsToShow;




if ($EnableRepositorySwitcherOverrule) {
	$EnableRepositorySwitcher = $EnableRepositorySwitcherOverrule;
	$GLOBALS['EnableRepositorySwitcher'] = $EnableRepositorySwitcherOverrule;
	qlog("Overrule EnableRepositorySwitcher");
}
if ($logqueries || $logtext) {
		$mysql_query_counter = 0;
		$fp = @fopen("qlist.txt","a");
		@fputs($fp,"=============================================================================\n");
		@fputs($fp,$_SERVER[PHP_SELF] . " " . date("d-m-Y H:i:s") . "s ($title)\n");
		@fputs($fp,$_SERVER[PHP_SELF] . " " . date("d-m-Y H:i:s") . "s ($title)\n");
		@fclose($fp);
}

// Authenticate!
if ((!stristr($_SERVER['SCRIPT_NAME'],"help.php")) && !stristr($_SERVER['PHP_SELF'],"help.php") && !stristr($_SERVER['PHP_SELF'],"rss.php") && (!stristr($_SERVER['SCRIPT_NAME'],"duedate-notify-cron.php")) && !stristr($_SERVER['PHP_SELF'],"duedate-notify-cron.php") && $dni<>1) {
		
		if ($c_l == "1") {
			$sn = $_SERVER['argv'][0];
		} else {
			$sn = "blank";
		}

		$fn = str_replace($_SERVER['REQUEST_URI'],"",$_SERVER['SCRIPT_NAME']);


		if ((($sn == "crmlogger.php" || $sn == "./crmlogger.php" || strstr($sn,"/crmlogger.php"))) && $c_l=="1") {

		} else {
			require("auth3.inc.php");
		}
}



// Catch version having the wrong database version
if ($GLOBALS['VERSION'] <> $GLOBALS['DBVERSION'] && (!stristr($_SERVER['PHP_SELF'],"upgrade.php"))) {
	?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.write('<link href="crm_dft.css" rel="stylesheet" type="text/css">');
			setCookie('repository','0')
		//-->
		</SCRIPT>
		

		<table width='50%'>
			<tr>
				<td>
					<fieldset>
						<img src='crm.gif'>
						<BR><BR>
						&nbsp;An error occured. The database version (<? echo $GLOBALS['DBVERSION'];?>) is incompatible with the software version (<? echo $GLOBALS['VERSION'];?>).<br>
						&nbsp;Your administrator will have to upgrade or downgrade your repository before you can continue.<br><br>
						&nbsp;Admins: go <img src='arrow.gif'>&nbsp;<a href='upgrade.php'>here</a>!
						<BR><BR>
					</fieldset>
				</td>
			</tr>
		</table>



		</BODY></HTML>
		<?
	exit;
}

$GLOBALS['CURFUNC'] = "InitValues::";

// && $GLOBALS['DBVERSION'] == $GLOBALS['VERSION']
// Overrule user-specific allows and disallows
if ((!stristr($_SERVER['SCRIPT_NAME'],"upgrade.php")) && !stristr($_SERVER['PHP_SELF'],"install.php")) {
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);

	$GLOBALS['ADDFORMLIST'] = array();
	$GLOBALS['ADDFORMLIST'] = unserialize($row['ADDFORMS']);

	if (is_numeric($row['PROFILE'])) {
		$GLOBALS['USERPROFILE'] = $row['PROFILE'];
		$row = GetProfileArray($row['PROFILE']);
		$GLOBALS['CURFUNC'] = "InitValues::";
		if (is_numeric($row['ENTITYADDFORM'])) {
			$GLOBALS['ENTITY_LIMITED_ADD_FORM'] = $row['ENTITYADDFORM'];
			$GLOBALS['ENTITY_ADD_FORM'] = $row['ENTITYADDFORM'];
			qlog("Entity add form override by profile in effect.");
		}
		if (is_numeric($row['ENTITYEDITFORM'])) {
			$GLOBALS['ENTITY_LIMITED_EDIT_FORM'] = $row['ENTITYEDITFORM'];
			$GLOBALS['ENTITY_EDIT_FORM'] = $row['ENTITYEDITFORM'];	
			qlog("Entity edit form override by profile in effect.");
		}
		$tmp = unserialize($row['ADDFORMS']);
		if (sizeof($tmp) > 0) {
			qlog("List of allowed forms to use override by profile in effect");
			$GLOBALS['ADDFORMLIST'] = $tmp;

		}
	}

		if ($row['HIDEADDTAB'] == "n") {
				$GLOBALS['HIDEADDTAB'] = "No";
				$GLOBALS['e_HIDEADDTAB'] = "No";
				$HIDEADDTAB = "No";
		} elseif ($row['HIDEADDTAB'] == "y") {
				$GLOBALS['HIDEADDTAB'] = "Yes";
				$GLOBALS['e_HIDEADDTAB'] = "Yes";
				$HIDEADDTAB = "Yes";
		}
		if ($row['HIDECSVTAB'] == "n") {
				$GLOBALS['HIDECSVTAB'] = "No";
				$GLOBALS['e_HIDECSVTAB'] = "No";
				$HIDECSVTAB = "No";
		} elseif ($row['HIDECSVTAB'] == "y") {
				$GLOBALS['HIDECSVTAB'] = "Yes";
				$GLOBALS['e_HIDECSVTAB'] = "Yes";
				$HIDECSVTAB = "Yes";
		}
		if ($row['HIDEPBTAB'] == "n") {
				$GLOBALS['HIDEPBTAB'] = "No";
				$GLOBALS['e_HIDEPBTAB'] = "No";
				$HIDEPBTAB = "No";
		} elseif ($row['HIDEPBTAB'] == "y") {
				$GLOBALS['HIDEPBTAB'] = "Yes";
				$GLOBALS['e_HIDEPBTAB'] = "Yes";
				$HIDEPBTAB = "Yes";
		}
		if ($row['HIDESUMMARYTAB'] == "n") {
				$GLOBALS['HIDESUMMARYTAB'] = "No";
				$GLOBALS['e_HIDESUMMARYTAB'] = "No";
				$HIDESUMMARYTAB = "No";
		} elseif ($row['HIDESUMMARYTAB'] == "y") {
				$GLOBALS['HIDESUMMARYTAB'] = "Yes";
				$GLOBALS['e_HIDESUMMARYTAB'] = "Yes";
				$HIDESUMMARYTAB = "Yes";
		}
		if ($row['HIDEENTITYTAB'] == "n") {
				$GLOBALS['HIDEENTITYTAB'] = "No";
				$GLOBALS['e_HIDEENTITYTAB'] = "No";
				$HIDEENTITYTAB = "No";
		} elseif ($row['HIDEENTITYTAB'] == "y") {
				$GLOBALS['HIDEENTITYTAB'] = "Yes";
				$GLOBALS['e_HIDEENTITYTAB'] = "Yes";
				$HIDEENTITYTAB = "Yes";
		}
		if ($row['HIDEENTITYTAB'] == "n") {
				$GLOBALS['HIDEENTITYTAB'] = "No";
				$GLOBALS['e_HIDEENTITYTAB'] = "No";
				$HIDEENTITYTAB = "No";
		} elseif ($row['HIDEENTITYTAB'] == "y") {
				$GLOBALS['HIDEENTITYTAB'] = "Yes";
				$GLOBALS['e_HIDEENTITYTAB'] = "Yes";
				$HIDEENTITYTAB = "Yes";
		}
		if ($row['SHOWDELETEDVIEWOPTION'] == "n") {
				$GLOBALS['ShowDeletedViewOption'] = "No";
				$ShowDeletedViewOption = "No";
		} elseif ($row['SHOWDELETEDVIEWOPTION'] == "y") {
				$GLOBALS['ShowDeletedViewOption'] = "Yes";
				$ShowDeletedViewOption = "Yes";
		}
		if ($row['HIDECUSTOMERTAB'] == "n") {
				$GLOBALS['HideCustomerTab'] = "No";
				$HideCustomerTab = "No";
		} elseif ($row['HIDECUSTOMERTAB'] == "y") {
				$GLOBALS['HideCustomerTab'] = "Yes";
				$HideCustomerTab = "Yes";
		}

		if (strtoupper($LetUserSelectOwnListLayout)=="YES") {
			$x = unserialize($row['ELISTLAYOUT']);
			if (is_array($x)) {
					$MainListColumnsToShow = $x;
					$GLOBALS['MainListColumnsToShow'] = $x;
			} 
			unset($x);
			$x = unserialize($row['CLISTLAYOUT']);
			if (is_array($x)) {
					$CustomerListColumnsToShow = $x;
					$GLOBALS['CustomerListColumnsToShow'] = $x;
			} 
		}

		
		

} else {
	qlog("install/upgrade exception");
}
// Remove expired entity locks

RemoveExpiredLocks();

// Calculate the genuine session date (important!)

CalculateSessionDate($GLOBALS['PRODUCT'],$GLOBALS['CRM_VERSION'],$GLOBALS['CRM_SHORTVERSION'],$GLOBALS['AUTHOR']);

if ($GLOBALS['USE_EXTENDED_CACHE'] == "Yes") {
	$GLOBALS['USE_EXTENDED_CACHE'] = true;
} else {
	unset($GLOBALS['USE_EXTENDED_CACHE']);
}
//unset($GLOBALS['USE_EXTENDED_CACHE']);

if ($GLOBALS['USE_EXTENDED_CACHE']) {

	if ((stristr($_SERVER['SCRIPT_NAME'],"edit.php")) || stristr($_SERVER['PHP_SELF'],"summary.php") || stristr($_SERVER['PHP_SELF'],"csv.php") || stristr($_SERVER['PHP_SELF'],"customers.php") || stristr($_SERVER['PHP_SELF'],"cust-insert.php") || stristr($_SERVER['PHP_SELF'],"index.php") || stristr($_SERVER['PHP_SELF'],"dump_to_disk.php") || stristr($_SERVER['PHP_SELF'],"management.php") || stristr($_SERVER['PHP_SELF'],"stats.php") || stristr($_SERVER['PHP_SELF'],"invoice.php") || $_REQUEST['ShowEntitiesOpen']) {

		if (stristr($_SERVER['SCRIPT_NAME'],"edit.php") && $_REQUEST['e']) {
			if ($GLOBALS['EnableEntityRelations'] == "Yes") {
				$GLOBALS['USE_EXTENDED_CACHE_WHAT'] = "all";
			} else {
				$GLOBALS['USE_EXTENDED_CACHE_WHAT'] = "cust_only";
			}
		}
		// Load cache tables into memory (this is faster I hope)
		qlog("Loading access cache arrays... " . $GLOBALS['USE_EXTENDED_CACHE_WHAT'] . " (EXTENDED_CACHE)");
		$GLOBALS['CheckedCustomerAccessArray'] = array();
		$GLOBALS['CheckedEntityAccessArray'] = array();

		if ($GLOBALS['USE_EXTENDED_CACHE_WHAT'] == "all") {
			$res = mcq("SELECT eidcid,type,result FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE user='" . $GLOBALS['USERID'] . "'", $db);
			while ($row = mysql_fetch_array($res)) {
				if ($row['type'] == "c") {
					$GLOBALS['CheckedCustomerAccessArray'][$row['eidcid']] = $row['result'];
				} else {
					$GLOBALS['CheckedEntityAccessArray'][$row['eidcid']] = $row['result'];
				}
			}
		} elseif ($GLOBALS['USE_EXTENDED_CACHE_WHAT'] == "cust_only") {
			$res = mcq("SELECT eidcid,type,result FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE user='" . $GLOBALS['USERID'] . "' AND type='c'", $db);
			while ($row = mysql_fetch_array($res)) {
				$GLOBALS['CheckedCustomerAccessArray'][$row['eidcid']] = $row['result'];
			}
		}
	} else {
		qlog("NOT loading access cache arrays...");
	}
} else {
	qlog("Cache array usage is disabled! (USE_EXTENDED_CACHE)");
}

if ($_REQUEST['SFS']) {
				qlog("Going to full-screen...");
				$url = ereg_replace("SFS","SFSD",$_SERVER['REQUEST_URI']);
				?>
				<SCRIPT LANGUAGE="JavaScript">
				<!--
					URL = '<? echo $url;?>';
					day = new Date();
					id = day.getTime();
					eval("page" + id + " = window.open(URL, '" + id + "', 'titlebar=no,toolbar=0,location=0,width=1016,height=718,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1,screenX=0,screenY=0,left=0,top=0');");
					win = top;
					win.opener = top;
					win.close ();
				//-->
				</SCRIPT>
						<?
} elseif ($_REQUEST['SFSD']) {
	qlog("Maximizing window...");
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
		window.moveTo(0,0);
		window.resizeTo(screen.width,screen.height);
	//-->
	</SCRIPT>
	<?
}
?>