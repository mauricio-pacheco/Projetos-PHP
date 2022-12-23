<?php
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2006 Hidde Fennema (hidde@it-combine.com)
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 *
 * This file does several things :)
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */

// user defined error handling function


function handle_error($mysqlerror,$sql) { 
	global $REMOTE_ADDR, $HTTP_SERVER_VARS, $HTTP_POST_VARS, $HTTP_USER_AGENT, $CRM_SHORTVERSION;
	$GLOBALS['CURFUNC'] = "HandleError::";
	if ($GLOBALS['error_msg_counter'] > 15) {
		qlog("More than 15 crashes. Exiting!");
		exit;
	}

	$mysqlerror = eregi_replace("error", "fault", $mysqlerror);
	$mysqlerror = eregi_replace("warning", "fault-warn", $mysqlerror);

	if ($GLOBALS['error_msg_counter'] < 20) {
		//qlog("Fault occured. " . $mysqlerror . "(" . stripslashes($sql) . ")");
		//log_msg("Fault occurred. " . $mysqlerror . "(" . stripslashes($sql) . ")","");
		$GLOBALS['error_msg_counter']++;
		qlog("Crash encountered: no." .  $GLOBALS['error_msg_counter']);
		qlog("Message: " . $mysqlerror);
		qlog("Query: " . ColorizeSQL($sql) . "");

	} 


	$print .= "<table><tr><td><a href=\"javascript:showLayer('SQLLog" . $GLOBALS['error_msg_counter'] . "')\"><img style='border:0' src='error.gif' alt='MySQL error in query occured'></a> Query error!<br>";
	$print .= "<div id='SQLLog" . $GLOBALS['error_msg_counter'] . "' style='display: none'>";
	$print .= "<table width=90% border=1><tr><td>The error message from the database is:</td></tr>";
	$print .= "<tr><td><font face='courier new'>" . $mysqlerror . "</font></td></tr>";
	$print .= "<tr><td>&nbsp;</td></tr>";
	$print .= "<tr><td>The concerning query is:<BR></td></tr>";
	$print .= "<tr><td><font face='courier new'>$sql</font></td></tr>";
	$deb = "Host: " . getenv("SERVER_NAME") . "<br>";
	$deb .= "Client: $REMOTE_ADDR<br>";
	$deb .= "Location: " . $_SERVER['PHP_SELF'] . "<br>";
	$print .= "<tr><td><br>$deb</td></tr></table>";	
	$print .= "</div></td></tr></table>";
	
	if ($_SERVER['REMOTE_ADDR']<>'') {
	    print $print;
	    } else {
	    $print = ereg_replace("<br>","\n",$print);
	    print strip_tags($print);
	    }

	/*
	<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.write('<link href="crm_dft.css" rel="stylesheet" type="text/css">');

	
		//-->
		</SCRIPT>
		<SCRIPT LANGUAGE="javascript" SRC="functions.js" type="text/javascript"></SCRIPT>
	
	//@SetCookie('repository','');
	//@SetCookie('session','expire');
	/*
	$mysqlerror = ereg_replace("You have an error in your SQL syntax near","SQL Syntax error near",$mysqlerror);
	print "</table><table width=100%><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<img src='error.gif'>&nbsp;<b>An internal error occured&nbsp;</font></b></legend><br><b>This error is fatal.</b><br>";
	print "<br>";
	print "This procedure cannot tell you exactly what went wrong. Your database action is cancelled, but previous database actions in the CRM page you're running are executed.<br><br>";
	print "<table width=90% border=0><tr><td>The error message from the database is:</td></tr>";
	print "<tr><td><font face='courier new'>" . $mysqlerror . "</font></td></tr>";
	print "<tr><td>&nbsp;</td></tr>";
	print "<tr><td>The concerning query is:<BR></td></tr>";
	print "<tr><td><font face='courier new'>$sql</font></td></tr>";
	$deb .= "Host: " . getenv("SERVER_NAME") . "<br>";
	$deb .= "Client: $REMOTE_ADDR<br>";
	$deb .= "Location: " . $_SERVER['PHP_SELF'] . "<br>";
	print "<tr><td>&nbsp;</td></tr>";
		
	$mysqlerror = base64_encode($mysqlerror);
	$sql = base64_encode($sql);
	$script = base64_encode($_SERVER['PHP_SELF']);
	$version = base64_encode($CRM_SHORTVERSION);

	$errorcode = "CEC|e|$mysqlerror|q|$sql|s|$script|v|$version";

	//print "<tr><td>CRM Error code is : $aerrorcode</td></tr>";

	print "<tr><td><font face='courier new'>Cookie reset - try to login again</font><br><br>If this happens often on the same query, please inform us by clicking <a class='bigsort' href='mailto:hidde_crm@users.sourceforge.net?Subject=CRM%20Error&body=PLEASE MAIL THIS MESSAGE - ADD COMMENTS IF YOU LIKE - error message is below $errorcode'>";
	
	print "here (e-mail)</a>, or click <a href='http://crmstage.it-combine.com/crm%20distributed/compose/autosubmit_error.php?errorcode=$errorcode'  class='bigsort' target='_top'>here</a> to submit the error to the CRM project page (automated)</td></tr>";
	print "<tr><td><br><br><a href='index.php?blank=1' class='bigsort'>To login page</a></td></tr></table>";
	print "<br>(<a href=\"javascript:showLayer('TraceLog')\">trace</a>)";
	print "<div id='TraceLog' style='display: none'>";
	print "<pre>";
	print $GLOBALS['tracelog'];
	print "</pre>";
	print "</div>";
	print "</body></html>";
	//exit();
	*/
}

// The general query handler

function mcq($sql,$db) {
	global $mysql_query_counter, $logqueries, $name, $debug, $title;
	if ($GLOBALS['logqueries']) {
		$mysql_query_counter++;
		@$fp = fopen("qlist.txt","a");
		@fputs($fp,"SQL: ($name) ($mysql_query_counterc
		) (" . date('U') . "): " . $GLOBALS['CURFUNC'] . " " . $sql ."\n");
		@fclose($fp);
		if ($GLOBALS['qlog_onscreen']) {
			$GLOBALS['pagelog'] .=  "SQL: ($name) : " . $sql . "\n";
		}
	} 
	if ($GLOBALS['query_timer']) {
		$tr = microtime_float();
	}
	$a = @mysql_query($sql) or (handle_error(mysql_error(),$sql));
	if ($GLOBALS['query_timer']) {	
		$tm = microtime_float() - $tr;
		if ($tm > $GLOBALS['max_time_query']) {
			$GLOBALS['max_time_query'] = $tm;
			$GLOBALS['max_time_query_sql'] = $sql;
		}
	}
	return($a);
}

function mcq_array($sql) {
	$ret = array();
	$res = mcq($sql, $db);
	while ($row = mysql_fetch_array($res)) {
		array_push($ret, $row);
	}
	return($ret);
}

function microtime_float() 
{ 
   list($usec, $sec) = explode(" ", microtime()); 
   return ((float)$usec + (float)$sec); 
} 


function LogContactMoment($eidcid,$type,$to,$meta,$body) {
	//mcq("INSERT INTO " . $GLOBALS['TBL_PREFIX'] . "contactmoments(eidcid,type,to,user,meta,body) VALUES(" . $eidcid . ",'" . $type . "','" . $to . "'," . $GLOBALS['USERID'] . ",'" . $meta . "','" . addslashes($body) . "')",$db);

	mcq("INSERT INTO `" . $GLOBALS['TBL_PREFIX'] . "contactmoments` ( `id` , `eidcid` , `type` , `user` , `meta` , `body` , `date` , `to` ) VALUES ('', '" . $eidcid . "', '" . $type . "', '" . $GLOBALS['USERID'] . "', '" . $meta . "','" . addslashes($body) . "', NOW( ) , '" . $to . "')", $db);

	qlog("Contact moment logged.");
}

// The supporting qlog function to log custom text to qlist.txt
function qlog($msg) {
	global $logtext, $name, $debug, $title, $cachecounter;
	if ($name) {
		$usrname = $name . " : ";
	} else {
		$usrname = "NOUSER : ";
	}
	if ($GLOBALS['tracelogused'] == "") {
		$tmp = $GLOBALS['CURFUNC'];
		$GLOBALS['CURFUNC'] = "Init::";
		//GLOBALS['tracelog'] = date('U') . " " . $usrname . "Init::" . "Inicializando o sistema ... \n";
		$GLOBALS['tracelogused'] = true;
		qlog("" . $_SERVER['SERVER_NAME'] . " chatting with " . $_SERVER['REMOTE_ADDR']);
		$GLOBALS['CURFUNC'] = $tmp;
//		print_r($_SERVER);
	}
	$rule = date('U') . " " . $usrname . $GLOBALS['CURFUNC'] . $msg . "\n";
	if (!strstr($msg, "CACHE ")) {
		$GLOBALS['tracelog'] .=  $rule;
	}


	if ($GLOBALS['logtext']) {
		if (is_numeric($GLOBALS['logtext'])) {
			if ($GLOBALS['USERID'] == $GLOBALS['logtext']) {
				$lim=1;
			} else {
				return(0);
			}
		}
		 
		if (strstr($msg,"CACHE	")) {
			$cachecounter++;
			$msg = "hit " . $cachecounter . " " . $msg;
		}

		if (is_array($msg)) {
			$msg2 = "Array:\n";
			$msg2 .= string_r($msg);
			$msg = $msg2;
		}

		@$fp = fopen("qlist.txt","a");
		@fputs($fp, strip_tags($rule));
		@fclose($fp);

		if ($GLOBALS['qlog_onscreen']) {
			$GLOBALS['pagelog'] .=  $rule;
		}
	} 
	return(0);
}
function string_r($array /*indent*/)
{
   $tabsize = "    ";
   $arg = func_get_args();
   $indent = $arg[1];
   if (func_num_args() == 1) $indent = $tabsize;

   foreach ($array as $name => $value)
   {
       if (is_array($value))
       {
           $contentString .= $indent.'['.$name.'] => Array' . "\n".$indent.$tabsize."(\n";
           $contentString .= string_r($value, $indent. $tabsize.$tabsize);
           $contentString .= $indent .$tabsize. ")\n\n";
       }
       else
       {
           $contentString .= $indent . '['.$name.']' . '  =>  ' . $value . "\n";
       }
   }

   if (func_num_args() == 1)
   {
       $contentString = "Array\n(\n" . $contentString . ")\n";
   }

   return $contentString;
} 

// caching functions:

function ClearCacheArrays($progress=false) {
	
	// This functions is utterly useless for normal operation. It's
	// only here for debug/test to see how much is actually cached.
	
	$a = sizeof($GLOBALS['customers']);
	$a += sizeof($GLOBALS['usernames']);
	$a += sizeof($GLOBALS['useremails']);
	$a += sizeof($GLOBALS['CLLEVELS']);
	$a += sizeof($GLOBALS['statuscolor']);
	$a += sizeof($GLOBALS['prioritycolor']);
	$a += sizeof($GLOBALS['CheckedCustomerAccessArray']);
	$a += sizeof($GLOBALS['CheckedEntityAccessArray']);

	unset($GLOBALS['customers']);
	unset($GLOBALS['usernames']);
	unset($GLOBALS['useremails']);
	unset($GLOBALS['CLLEVELS']);
	unset($GLOBALS['statuscolor']);
	unset($GLOBALS['prioritycolor']);
	unset($GLOBALS['CheckedCustomerAccessArray']);
	unset($GLOBALS['CheckedEntityAccessArray']);

	$GLOBALS['CURFUNC'] = "ClearCacheArrays::";
	qlog("Cache arrays emptied - " . $a . " records");
	if ($progress) {
		print "Cleared build-up page cache: $a records.\n";
	}
	$GLOBALS['CURFUNC'] = "";

}

function GetCustomerName($customer_id) {
	$GLOBALS['CURFUNC'] = "GetCustomerName::";
	if ($customer_id) {
		if (!$GLOBALS['customers'][$customer_id]) {
			$row = db_GetRow("SELECT custname FROM " . $GLOBALS['TBL_PREFIX'] . "customer WHERE id=" . $customer_id);
			$GLOBALS['customers'][$customer_id] = $row[0];
			$ret = $row[0];
		} else {
			qlog("CACHE GetCustomerName $customer_id " . $GLOBALS['customers'][$customer_id]);
			$ret = $GLOBALS['customers'][$customer_id];
		}
	} else {
		$ret = "n/a";
		qlog("WARNING - GetCustomerName function called with empty customer_id param!");
	}
	$GLOBALS['CURFUNC'] = "";
	return($ret);
}

function GetCustomerOwner($customer_id) {
	$GLOBALS['CURFUNC'] = "GetCustomerName::";
	if ($customer_id) {
		if (!$GLOBALS['customer_owners'][$customer_id]) {
			$row = db_GetRow("SELECT customer_owner FROM " . $GLOBALS['TBL_PREFIX'] . "customer WHERE id=" . $customer_id);
			$GLOBALS['customers'][$customer_id] = $row[0];
			$ret = $row[0];
		} else {
			qlog("CACHE GetCustomerOwner $customer_id " . $GLOBALS['customer_owners'][$customer_id]);
			$ret = $GLOBALS['customer_owners'][$customer_id];
		}
	} else {
		$ret = "n/a";
		qlog("WARNING - GetCustomerOwner function called with empty customer_id param!");
	}
	$GLOBALS['CURFUNC'] = "";
	return($ret);
}
function GetCustomerEmail($customer_id) {
	$GLOBALS['CURFUNC'] = "GetCustomerEmail::";
	if ($customer_id) {
		if (!$GLOBALS['customer_emails'][$customer_id]) {
			$row = db_GetRow("SELECT contact_email FROM $GLOBALS[TBL_PREFIX]customer WHERE id=" . $customer_id);
			$GLOBALS['customer_emails'][$customer_id] = $row[0];
			$ret = $row[0];
			qlog("$customer_id " . $GLOBALS['customer_emails'][$customer_id]);
		} else {
			qlog("CACHE $customer_id " . $GLOBALS['customer_emails'][$customer_id]);
			$ret = $GLOBALS['customer_emails'][$customer_id];
		}
	} else {
		$ret = "";
		qlog("WARNING - GetCustomerEmail function called with empty customer_id param!");
	}
	$GLOBALS['CURFUNC'] = "";
	return($ret);
}
function BuildNumOfAttachmentsCache($arr) {
        return(false);
	qlog("Building attachment cache... (EXTENDED_CACHE)");
	$GLOBALS['numattch'] = array();

	$GLOBALS['CacheBuilded'] = true;

	foreach ($arr AS $element) {
			$ins .= " koppelid=" . $element. " OR";
	}
	$ins .= " 1=0";
	
	$sql = "SELECT DISTINCT(koppelid),COUNT(*) AS aantal FROM $GLOBALS[TBL_PREFIX]binfiles WHERE " . $ins . " GROUP BY koppelid";
	$res = mcq($sql, $db);
	while ($row=mysql_fetch_array($res)) {
		$GLOBALS['numattch'][$row['koppelid']] = $row['aantal'];
	}
}
function GetNumOfAttachments($entid) {
	$GLOBALS['CURFUNC'] = "GetNumOfAttachments::";
	
	if (!is_array($GLOBALS['numattch'])) {
		qlog("Loaded all attachment numbers into memory");
		$sql = "SELECT DISTINCT(koppelid),COUNT(*) AS aantal FROM $GLOBALS[TBL_PREFIX]binfiles GROUP BY koppelid";
		$res = mcq($sql, $db);
		while ($row=mysql_fetch_array($res)) {
			$GLOBALS['numattch'][$row['koppelid']] = $row['aantal'];
		}
	}

	if ($GLOBALS['numattch'][$entid]) {
		return($GLOBALS['numattch'][$entid]);
	} else {
		return("0");
	}

}
function GetUserID($username) {
		if ($username<>"") {
			$row = db_GetRow("SELECT id,1+1 FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='" . $username. "'");
			return($row['id']);
		}
}
function GetUserRow($id) {
		if ($id<>"") {
			$row = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $id. "'");
			return($row);
		}
}
function GetPersonaleMailCredentials($userid) {
		if ($userid<>"") {
			$row = db_GetRow("SELECT EMAILCREDENTIALS FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $userid. "'");
			return(unserialize($row['EMAILCREDENTIALS']));
		}
}
function GetUserName($userid) {
	$GLOBALS['CURFUNC'] = "GetUserName::";
	if (is_array($userid)) {
		qlog("Got passed an array, illegal!");
		return(false);
	}
	if (!$GLOBALS['usernames'][$userid]) {
		if ($userid) {
			$res = mcq("SELECT id,FULLNAME,name FROM $GLOBALS[TBL_PREFIX]loginusers", $db);
				while ($row = mysql_fetch_array($res)) {
					if ($row['FULLNAME']=="") $row['FULLNAME'] = $row['name'];
				
					$GLOBALS['usernames'][$row['id']] = $row['FULLNAME'];
					$ret = $GLOBALS['usernames'][$userid];
					if ($ret=="" || $ret=="-") {
						$ret = "n/a";
					} elseif (stristr($ret,"@@@")) {
						$ctt = split(":",str_replace("@@@:","",$row['FULLNAME']));
						$ctu = $ctt[1];
						
						$ret = $row['name'] . " (" . $ctu . ")";
						$GLOBALS['usernames'][$userid] = $row['name'] . " (" . $ctu . ")";
					}
				}
		} else {
			$ret = "n/a";
			qlog("WARNING - GetUserName function called with empty userid param!");
		}
	} else {
		$ret = $GLOBALS['usernames'][$userid];
		qlog("CACHE GetUserName $userid " . $GLOBALS['usernames'][$userid]);
	}
	$GLOBALS['CURFUNC'] = "";

	return($ret);
}
function GetUserProfiles($specific_id = false) {
	$GLOBALS['CURFUNC'] = "GetUserProfiles::";
	$profs = array();
	$sql = "SELECT id, name FROM $GLOBALS[TBL_PREFIX]userprofiles WHERE active='yes'";
	$result= mcq($sql,$db);
	while ($row= mysql_fetch_array($result)) {
		array_push($profs,array($row['id'],$row['name']));
		if ($specific_id == $row['id']) {
			return($row['name']);
		}
	}
	return($profs);
}
function GetProfileArray($prof_num) {
	$GLOBALS['CURFUNC'] = "GetProfileArray::";
	$row = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]userprofiles WHERE id='" . $prof_num . "' AND active='yes'");
	return($row);
}
function GetUserEmail($userid) {
	$GLOBALS['CURFUNC'] = "GetUserEmail::";
	if (!$GLOBALS['useremails'][$userid]) {
		if ($userid) {
			$row = db_GetRow("SELECT email FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $userid . "'");
			$GLOBALS['useremails'][$userid] = $row['email'];
			$ret = $row['email'];
			if ($ret=="") {
				$ret = "";
			}
		} else {
			$ret = "";
			qlog("WARNING - GetUserName function called with empty userid param!");
		}
	} else {
		$ret = $GLOBALS['useremails'][$userid];
		qlog("CACHE GetUserEmail getset $userid " . $GLOBALS['useremails'][$userid]);
	}
	$GLOBALS['CURFUNC'] = "";
	return($ret);
}
function GetUserNameByName($userid) {
	$GLOBALS['CURFUNC'] = "GetUserNameByName::";
	if ($userid) {
		if (!$GLOBALS['usernames'][$userid]) {
			$row = db_GetRow("SELECT FULLNAME,name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='" . $userid ."'");
			if ($result1['FULLNAME']=="") $row['FULLNAME'] = $row[name];
			$GLOBALS['usernames'][$userid] = $row['FULLNAME'];
			$ret = $row['FULLNAME'];
		} else {
			$ret = $GLOBALS['usernames'][$userid];
			qlog("CACHE GetUserNameByName getset $userid " . $GLOBALS['usernames'][$userid]);
		}
	} else {
		$ret = "n/a";
		qlog("WARNING - GetUserNameByName function called with empty username param!");
	}
	$GLOBALS['CURFUNC'] = "";
	if ($ret=="") {
				$ret = "n/a";
	}
	return($ret);

}
function GetFileName($fileid) {
	$GLOBALS['CURFUNC'] = "GetFileName::";
	// not caching
	if ($fileid) {
		$row = db_GetRow("SELECT filename FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $fileid . "'");
		$GLOBALS['CURFUNC'] = "";
		return($row['filename']);
	} else {
		$GLOBALS['CURFUNC'] = "";
		return false;
	}
}
function GetFileListArray($eid) {
	$ret = array();
	$q = mcq("SELECT fileid,filename,filesize,filetype,creation_date FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE koppelid='" . $eid . "'", $db);
	while ($row = mysql_fetch_array($q)) {
		array_push($ret, $row);
	}
	return($ret);
}
function GetFilesOfType($type) {
	// WARNING - this function will only return files which are NOT coupled to an entity (e.g. koppelid=0)
	$ret = array();
	$q = mcq("SELECT *,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE koppelid=0 AND filetype='" . $type . "'", $db);
	while ($row = mysql_fetch_array($q)) {
		$row['filesize'] = number_format($row['filesize']);
		array_push($ret, $row);
	}
	return($ret);
}
function GetFileListPrintableArray($eid) {
	$ret = array();
	$q = mcq("SELECT fileid,filename,filesize,filetype,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,username FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE koppelid='" . $eid . "'", $db);
	while ($row = mysql_fetch_array($q)) {
		$row['filesize'] = number_format($row['filesize']);
		array_push($ret, $row);
	}
	return($ret);
}
function GetFileContent($fileid) {
	$GLOBALS['CURFUNC'] = "GetFileContent::";
	// not caching
	if ($fileid) {
		$sql = "SELECT content FROM $GLOBALS[TBL_PREFIX]blobs WHERE fileid='" . $fileid . "'";
		$result= mcq($sql,$db);
		$result1= mysql_fetch_array($result);
		$rows = mysql_affected_rows();
		if ($rows < 1) {
			log_msg("WARNING: Searched for file " . $fileid . " but got zero rows!");
		}
		$GLOBALS['CURFUNC'] = "";
		return($result1['content']);
	} else {
		$GLOBALS['CURFUNC'] = "";
		return false;
	}
}
function GetFileSubject($fileid) {
	$GLOBALS['CURFUNC'] = "GetFileSubject::";
	// not caching
	if ($fileid) {
		$sql = "SELECT file_subject FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $fileid . "'";
		$result= mcq($sql,$db);
		$result1= mysql_fetch_array($result);
		$rows = mysql_affected_rows();
		if ($rows < 1) {
			//log_msg("WARNING: Searched for file subject " . $fileid . " but got zero rows!");
		}
		$GLOBALS['CURFUNC'] = "";
		return($result1['file_subject']);
	} else {
		$GLOBALS['CURFUNC'] = "";
		return false;
	}
}

function GetClearanceLevel($userid) {
		$GLOBALS['CURFUNC'] = "GetClearanceLevel::";
		if ($userid) {
			if (!$GLOBALS['CLLEVELS'][$userid]) {

				$row = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $userid . "'");
				
				$a = $row['CLLEVEL'];
				$b = $row['PROFILE'];

				if ($a=="rw") {
					$row2 = db_GetRow("SELECT administrator FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $userid . "'");
					if ($row2['administrator']=="yes") {
						$a = "administrator";
					}
				}
				if (is_numeric($b)) {
					$row = GetProfileArray($b);
					$GLOBALS['CURFUNC'] = "GetClearanceLevel::";
					$a = $row['CLLEVEL'];
					qlog("Clearance level override by profile in effect. ($userid: $a, profile: $b)");
				} else {
					qlog("No profile override...");
				}
				$GLOBALS['CLLEVELS'][$userid] = $a;
				qlog("GetClearanceLevel $userid $a " . $GLOBALS['CLLEVELS'][$userid]);
				$ret = $a;
			} else {
				$ret = $GLOBALS['CLLEVELS'][$userid];
				qlog("CACHE GetClearanceLevel $userid $a " . $GLOBALS['CLLEVELS'][$userid]);
			}
		} else {
			$ret = "[unknown]";
			qlog("Function called with empty userid param!");
		}
		$GLOBALS['CURFUNC'] = "";
		return($ret);
}
function GetStatusColor($StatusName) {
	$GLOBALS['CURFUNC'] = "GetStatusColor::";
	if (!$GLOBALS['statuscolor'][$StatusName]) {
		$sql = "SELECT color,varname FROM $GLOBALS[TBL_PREFIX]statusvars";
		$result= mcq($sql,$db);
		
		// For performance, read all colors into memory as soon as
		// 1 color is queried for.

		while ($row = mysql_fetch_array($result)) {
			$GLOBALS['statuscolor'][$row['varname']] = $row[0];
		}
		return($GLOBALS['statuscolor'][$StatusName]);
	} else {
		qlog("CACHE Statuscolor $StatusName");	
	}

	// Anyway, now it is in memory
	$GLOBALS['CURFUNC'] = "";
	return($GLOBALS['statuscolor'][$StatusName]);
}

function GetPriorityColor($PriorityName) {
	$GLOBALS['CURFUNC'] = "GetPriorityColor::";
	if (!$GLOBALS['prioritycolor'][$PriorityName]) {
		$sql = "SELECT color,varname FROM $GLOBALS[TBL_PREFIX]priorityvars";
		$result= mcq($sql,$db);

		// For performance, read all colors into memory as soon as
		// 1 color is queried for.
		
		while ($row = mysql_fetch_array($result)) {
			$GLOBALS['prioritycolor'][$row['varname']] = $row[0];
		}
	} else {
		qlog("CACHE Prioritycolor $PriorityName");
	}
	
	// Anyway, now it is in memory
	$GLOBALS['CURFUNC'] = "";

	return($GLOBALS['prioritycolor'][$PriorityName]);
	
}
function GetStatusNum($StatusName) {
	$GLOBALS['CURFUNC'] = "GetStatusNum::";
	if (!$GLOBALS['statusnum'][$StatusName]) {
		$sql = "SELECT id,varname FROM $GLOBALS[TBL_PREFIX]statusvars";
		$result= mcq($sql,$db);
		
		// For performance, read all colors into memory as soon as
		// 1 num is queried for.

		while ($row = mysql_fetch_array($result)) {
			$GLOBALS['statusnum'][$row['varname']] = $row['id'];
		}
		return($GLOBALS['statusnum'][$StatusName]);
	} else {
		qlog("CACHE Statusnum $StatusName");	
	}

	// Anyway, now it is in memory
	$GLOBALS['CURFUNC'] = "";
	return($GLOBALS['statusnum'][$StatusName]);
}

function GetPriorityNum($PriorityName) {
	$GLOBALS['CURFUNC'] = "GetPriorityNum::";
	if (!$GLOBALS['prioritynum'][$PriorityName]) {
		$sql = "SELECT id,varname FROM $GLOBALS[TBL_PREFIX]priorityvars";
		$result= mcq($sql,$db);

		// For performance, read all colors into memory as soon as
		// 1 num is queried for.
		
		while ($row = mysql_fetch_array($result)) {
			$GLOBALS['prioritynum'][$row['varname']] = $row['id'];
		}
	} else {
		qlog("CACHE Prioritynum $PriorityName");
	}
	
	// Anyway, now it is in memory
	$GLOBALS['CURFUNC'] = "";

	return($GLOBALS['prioritynum'][$PriorityName]);
	
}
// --------- end caching functions

function Geti18nDate($FormatFrom,$FormatTo,$Date) {
	$GLOBALS['CURFUNC'] = "Geti18nDate::";
	switch ($FormatTo) {
		case "mm-dd-yyyy":
			if (strlen($Date)<>10) {
	//			echo "Input date not 10 characters - stopping function $Date<br>\n";
				$Return = $Date;
			} else {
				$d = substr($Date,0,2);
				$m = substr($Date,3,2);
				$y = substr($Date,6,4);
				$Return = $m . "-" . $d . "-" . $y;
			}		
	   break;
	   default:
		$Return = $Date;
	}
	$GLOBALS['CURFUNC'] = "";
	return $Return;
}

function GetStatusses() {
	$ret = array();
	$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
	$result= mcq($sql,$db);
	while($options = mysql_fetch_array($result)) {
		array_push($ret,$options[varname]);
	}
	return($ret);
}
function GetPriorities() {
	$ret = array();
	$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars ORDER BY varname";
	$result= mcq($sql,$db);
	while($options = mysql_fetch_array($result)) {
		array_push($ret,$options[varname]);
	}
	return($ret);
}


function ClearAccessCache($eidcid,$type,$user="all") {
	if ($eidcid<>0) {
		$ins = "eidcid=" . $eidcid . " AND ";
	}
	if ($user<>"all") {
		mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE " . $ins . " type='" . $type . "' AND user=" . $user, $db);
	} else {
		mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE " . $ins . " type='" . $type . "'", $db);
	}
	qlog("Access cache table cleared (" . $eidcid . " - " . $type . ")");
}

function UpdateCacheTables($progress=false, $specific_user=false) {
	
	// cache only entities which were updated in the last 12 weeks
	$nu = date('U');
	$toen = $nu - 7257600;
	$toen = 0;
	if ($progress) {
		print " Calculating avg. entity age...";
	}
	$toen = GetAvgEntityAge('','');
	$toen = ($GLOBALS['avg_age']);
	if ($progress) {
		print " done.\n Using avarage entity age of " . $toen . " seconds.\n";
	}
	qlog("Starting update of cache tables (" . GetUserName($specific_user) . ")");

	$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers");
	$max_us = $row[0];
	$row = db_GetRow("SELECT COUNT(*) from " . $GLOBALS['TBL_PREFIX'] . "entity WHERE deleted<>'y' AND UNIX_TIMESTAMP(tp) > " . $toen);
	$max_en = $row[0];
	$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "customer");
	$max_cu = $row[0];

	$max_entity_cache = $max_en * $max_us;
	$max_customer_cache = $max_cu * $max_us;

	$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE type='e'");
	if ($row[0] == $max_entity_cache && !$GLOBALS['force_update']) {
		if ($progress) {
			print " Entity cache table is up-to-date. Skipping.";
		}
		$no_cust_check = false;
	} else {
		if ($specific_user) {
			mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE type='e' AND user=" . $specific_user, $db);
		} else {
			mcq("TRUNCATE TABLE " . $GLOBALS['TBL_PREFIX'] . "accesscache", $db);
		}
		UpdateEntityAccessCacheTable($progress,$specific_user);
		$no_cust_check = true;
	}

	if ($progress) {
		print "\n";
	}
	$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE type='c'");
	if ($row[0] == $max_customer_cache && $no_cust_check==false && !$GLOBALS['force_update']) {
		if ($progress) {
			print " Customer cache table is up-to-date. Skipping.";
		}
	} else {
		if ($specific_user) {
			mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE type='c' AND user=" . $specific_user, $db);
		} else {
			mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "accesscache WHERE type='c'", $db);
		}
		UpdateCustomerAccessCacheTable($progress,$specific_user);
	}
	if ($progress) {
		print "\nDone.\n";

	}
}

function UpdateEntityAccessCacheTable($progress=false,$specific_user=false) {
	// This function fills the AccessCache table for quick access checks
	// cache only entities which were updated in the last [avg. entity age] weeks
	$GLOBALS['CURFUNC'] = "UpdateEntityAccessCacheTable::";
	$nu = date('U');
	$toen = $nu - 7257600;
	$toen = GetAvgEntityAge('','');
	$toen = $GLOBALS['avg_age'];
	qlog("Using average entity age of " . $GLOBALS['avg_age'] . " seconds");

	if ($specific_user) {
		$sql_ins = " AND id=" . $specific_user;

		$cl = GetClearanceLevel($specific_user);
		$GLOBALS['CURFUNC'] = "UpdateEntityAccessCacheTable::";
		if ($cl == "rro" || $cl == "rro+") {
			$sql = "SELECT FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $specific_user. "' LIMIT 1";
			$out = mcq($sql,$db);
			$row2 = mysql_fetch_array($out);
			$cust2 = $row2[0];
			qlog("Limiting cache footprint to coupled customer...");
			$cust_coupled = split(":",$cust2);
			$cust2 = $cust_coupled[1];	
			$ent_sql_ins = "AND CRMcustomer = " . $cust2 . " ";
		} 
	}

	if ($progress) {
		$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE 'deleted_user_%' " . $sql_ins . " ");
		$max_us = $row[0];
	}
	$res = mcq("SELECT id FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE 'deleted_user_%' " . $sql_ins . " ORDER BY id", $db);

	while ($row = mysql_fetch_array($res)) {
		$entity=0;
		$uid = $row['id'];
		FetchUserLimits($uid);
		$user++;
		if ($progress) {
				print "\015 Building cache (entities) : user " . $user . "/" . $max_us;
		}
		$res2 = mcq("SELECT eid from " . $GLOBALS['TBL_PREFIX'] . "entity WHERE deleted<>'y' " . $ent_sql_ins . " AND UNIX_TIMESTAMP(tp) > " . $toen, $db);
		qlog("SELECT eid from " . $GLOBALS['TBL_PREFIX'] . "entity WHERE deleted<>'y' " . $ent_sql_ins . " AND UNIX_TIMESTAMP(tp) > " . $toen);
		//qlog("SELECT eid from	 " . $GLOBALS['TBL_PREFIX'] . "entity WHERE deleted<>'y' " . $ent_sql_ins . " AND UNIX_TIMESTAMP(tp) > " . $toen);
		while ($row2 = mysql_fetch_array($res2)) {
			$al = CheckEntityAccess($row2['eid'], $uid, true);
			mcq("INSERT INTO " . $GLOBALS['TBL_PREFIX'] . "accesscache(user,type,eidcid,result) VALUES(" . $uid . ",'e'," . $row2['eid'] .",'" . $al . "')", $db);
			$rec++;
		}
	}
	if ($progress) {
		print " done. " . $rec . " cache records created.";
	}

}
function UpdateCustomerAccessCacheTable($progress=false,$specific_user=false) {
	// This function fills the AccessCache table for quick access checks

	if ($specific_user) {
		$sql_ins = " AND id=" . $specific_user;
		$cl = GetClearanceLevel($specific_user);
		if ($cl == "aro" || $cl == "aro+") {
			$sql = "SELECT FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $specific_user. "' LIMIT 1";
			$out = mcq($sql,$db);
			$row2 = mysql_fetch_array($out);
			$cust2 = $row2[0];
			qlog("Limiting cache footprint to coupled customer...");
			$cust_coupled = split(":",$cust2);
			$cust2 = $cust_coupled[1];	
			$cust_sql_ins = " WHERE $GLOBALS[TBL_PREFIX]customer.id = " . $cust2 . " ";
		} 
	}

	if ($progress) {
		$row = db_GetRow("SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE 'deleted_user_%' " . $sql_ins . " ");
		$max_us = $row[0];
	}
	$res = mcq("SELECT id FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE 'deleted_user_%' " . $sql_ins . " ORDER BY id", $db);
	while ($row = mysql_fetch_array($res)) {
		$user++;
		if ($progress) {
				print "\015 Building cache (customer) : user " . $user . "/" . $max_us;
		}
		$customer=0;
		$uid = $row['id'];
		FetchUserLimits($uid);
		$res2 = mcq("SELECT id FROM " . $GLOBALS['TBL_PREFIX'] . "customer " . $cust_sql_ins . " ORDER BY id", $db);
		qlog("SELECT id FROM " . $GLOBALS['TBL_PREFIX'] . "customer " . $cust_sql_ins . " ORDER BY id");
		while ($row2 = mysql_fetch_array($res2)) {
			$al = CheckCustomerAccess($row2['id'], $uid, true);
			if ($al<>"") {
				mcq("INSERT INTO " . $GLOBALS['TBL_PREFIX'] . "accesscache(user,type,eidcid,result) VALUES(" . $uid . ",'c'," . $row2['id'] .",'" . $al . "')", $db);
				$rec++;
			}
		}
	}
	if ($progress) {
		print " done. " . $rec . " cache records created.";
	}

}

function DeleteEntity($eid) {
	$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET deleted='y' WHERE eid='" . $eid . "'";
	mcq($sql,$db);
}
function UnDeleteEntity($eid) {
	$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET deleted='n' WHERE eid='" . $eid . "'";
	mcq($sql,$db);
}

function is_administrator() {
	global $name;
	$tmp_cf = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "IsAdminstrator::";

	if ($GLOBALS['ADMINARRAY'][$GLOBALS['USERID']]) {
		// WTF! It's in cache
		if ($GLOBALS['ADMINARRAY'][$GLOBALS['USERID']]=="y") {
			qlog("CACHE This is an admin alright");
			$GLOBALS['CURFUNC'] = $tmp_cf;
			return true;
		} else {
			qlog("CACHE This is NOT an admin");
			$GLOBALS['CURFUNC'] = $tmp_cf;
			return false;
		}
	}


	$row = db_GetRow("SELECT administrator FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" .$GLOBALS['USERID'] . "'");
	$list = $row['administrator'];

	if ($list<>"Yes" && $list<>"yes") {
		qlog("This is NOT an admin");
		$GLOBALS['ADMINARRAY'][$GLOBALS['USERID']] = "n";
		$GLOBALS['CURFUNC'] = $tmp_cf;
		return false;
	}
	qlog("This is an admin alright");
	$GLOBALS['ADMINARRAY'][$GLOBALS['USERID']] = "y";
	$GLOBALS['CURFUNC'] = $tmp_cf;
	return true;
}

function is_administrator_by_id($uid) {

// MUST BE CACHED!!!!!!!!!!!!!!!!!!!!!!!!!!
	if ($GLOBALS['ADMINARRAY'][$uid]) {
		// WTF! It's in cache
		if ($GLOBALS['ADMINARRAY'][$uid]=="y") {
			qlog("CACHE This is an admin alright");
			return true;
		} else {
			qlog("CACHE This is NOT an admin");
			return false;
		}
	}
	$GLOBALS['CURFUNC'] = "IsAdminstrator::";

	$row = db_GetRow("SELECT administrator FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" .$GLOBALS['USERID'] . "'");
	$list = $row['administrator'];

	if ($list<>"Yes" && $list<>"yes") {
		qlog("This is NOT an admin");
		$GLOBALS['CURFUNC'] = "";
		$GLOBALS['ADMINARRAY'][$uid] = "n";
		return false;
	}
	qlog("This is an admin alright");
	$GLOBALS['ADMINARRAY'][$uid] = "y";
	$GLOBALS['CURFUNC'] = "";
	return true;
}

function CreateStatusAndPriorityCSS() {
	// This function creates the style info for the ShowEntitiesOpen function

	$ret = "<style type=\"text/css\">\n<!--\n";

	$sql = "SELECT id, color FROM " .  $GLOBALS['TBL_PREFIX'] . "statusvars";
	$res = mcq($sql, $db);
	while ($row = mysql_fetch_array($res)) {
		$ret .= ".SR" . $row['id'] . "\n{\n\tbackground-color: " . $row['color'] . "\n}\n";
	}
	$sql = "SELECT id, color FROM " .  $GLOBALS['TBL_PREFIX'] . "priorityvars";
	$res = mcq($sql, $db);
	while ($row = mysql_fetch_array($res)) {
		$ret .= ".PR" . $row['id'] . "\n{\n\tbackground-color: " . $row['color'] . "\n}\n";
	}

	
	$ret .= "-->\n</style>";

	return($ret);
}

function ShowEntitiesOpen() {
	print CreateStatusAndPriorityCSS();
	global $filter, $desc, $lang, $sort, $ShowFilterInMainList, $QUERY_STRING, $query, $ONLY_SHOW_CUSTOMER;
	global $ONLY_SHOW_OWNER, $query64, $DontShowPopupWindow,$ShowNumOfAttachments,$MainListColumnsToShow;
	global $pdfiltercustomer, $pdfilterstatus, $pdfilterpriority, $pdfilterowner, $pdfilterassignee;
	global $LetUserSelectOwnListLayout, $brief, $ShowSortLink, $teller, $EnableEditButton, $ForceGlobalLayout;
	global $MainListColumnsToShowGlobal,$ComingFromCustInsert,$tab,$ShowDeletedViewOption,$From_Summary;

	// Yeah, I know, far too many globals (should be 0)

	$pdfilterextrafield = array();

	$FA_header = array();
	$FA_data   = array();
	$FA_datat  = array();
	$FA_datal  = array();

	$GLOBALS['CURFUNC'] = "ShowEntitiesOpen::";
	
	if (stristr($_SERVER['REQUEST_URI'],"index.php")) {
		$return_to_list = 1;
	} elseif (stristr($_SERVER['REQUEST_URI'],"summary.php")) {
		$return_to_list = "____b64-" . base64_encode($_SERVER['REQUEST_URI']);	
	}
	
	if ($filter=="viewdel" && (strtoupper($ShowDeletedViewOption)<>"YES") && !is_administrator()) {
		print "<table>";

		// security

		PrintAdminError();
		EndHTML;
		exit;
	}


	print "\n\n<!-- Entering function ShowEntitiesOpen [mark] -->\n\n";

		if (!$sort  && !$filter=="viewdel" && !$filter=="custinsert") {
		$sql = "SELECT LASTSORT FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
		$result = mcq($sql,$db);
		$list = mysql_fetch_array($result);
		$sort = $list['LASTSORT'];
		
		if (stristr($sort,"-----DESC")) {
			$sort = ereg_replace("-----DESC","",$sort);
			$desc = 1;
		}
		print "\n\n<!-- LAST SORT APPLIED -->\n\n";

	} else {
		if (!$filter=="viewdel" && !$filer=="custinsert") {
			$tmpsort = $sort;

			if ($desc) {
				$tmpsort .= "-----DESC";
			} 

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET LASTSORT='" . $tmpsort . "' WHERE id='" . $GLOBALS['USERID'] . "'";
			mcq($sql,$db);

			print "\n\n<!-- THIS SORT SAVED -->\n\n";
		}
	}

	$ExtraFieldsList = GetExtraCustomerFields();

	foreach($ExtraFieldsList as $field) {
		$element = "EFID" . $field['id'];
		if ($_REQUEST[$element]<>"all" && $_REQUEST[$element]<>"") {
			$ExtraFieldSearched=true;
			$pdfilterextrafield[$element] = $_REQUEST[$element];
		}
	
	}
	$ExtraFieldsList = GetExtraFields();

	foreach($ExtraFieldsList as $field) {
		$element = "EFID" . $field['id'];
		if ($_REQUEST[$element]<>"all" && $_REQUEST[$element]<>"") {
			$ExtraFieldSearched=true;
			$pdfilterextrafield[$element] = $_REQUEST[$element];
		}
	
	}


	if ((!$_REQUEST['newfilter']) && (!$_REQUEST['pdfiltercustomer'])) {
		// No filter options given, retrieve old filter from database
		qlog("No new filter found");
		if (strtoupper($GLOBALS['ShowFilterInMainList']) == "YES") {
			$sql = "SELECT LASTFILTER FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
			$result = mcq($sql,$db);
			$list = mysql_fetch_array($result);
			$list = $list['LASTFILTER'];

			$list = unserialize($list);

			if ($filter=="viewdel") {
				$pdfiltercustomer = $list['vd_pdfiltercustomer'];
				$pdfilterstatus   = $list['vd_pdfilterstatus'];
				$pdfilterpriority = $list['vd_pdfilterpriority'];
				$pdfilterowner    = $list['vd_pdfilterowner'];
				$pdfilterassignee = $list['vd_pdfilterassignee'];
				$pdfilterextrafield = unserialize($list['vd_pdfilterextrafield']);
//				print string_r($pdfilterextrafield);

				foreach($ExtraFieldsList as $field) {
						$element = "EFID" . $field['id'];
						//print $element;
						if ($pdfilterextrafield[$element]<>"") {
							$ExtraFieldSearched=true;
						}
				}
			} else {
				$pdfiltercustomer = $list['pdfiltercustomer'];
				$pdfilterstatus   = $list['pdfilterstatus'];
				$pdfilterpriority = $list['pdfilterpriority'];
				$pdfilterowner    = $list['pdfilterowner'];
				$pdfilterassignee = $list['pdfilterassignee'];
				$pdfilterextrafield = unserialize($list['pdfilterextrafield']);
				foreach($ExtraFieldsList as $field) {
						$element = "EFID" . $field['id'];
						if ($pdfilterextrafield[$element]<>"") {
							$ExtraFieldSearched=true;
						}
				}
			}
			print "\n\n<!-- LAST FILTER APPLIED -->\n\n";
		} else {
			qlog ("No filter - ShowFilterInMainList is off");
		}
	} else {
		qlog("Saving this nice new filter");
		// Store current filter in database serialized array
		if ($filter<>"custinsert") {

			// first collect current stored array

			$sql = "SELECT LASTFILTER FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
			$result = mcq($sql,$db);
			$list = mysql_fetch_array($result);
			$list = $list['LASTFILTER'];

			$last_filter = unserialize($list);
			//print string_r($last_filter);
			
			if ($filter=="viewdel") {

				$last_filter['vd_pdfiltercustomer'] = $pdfiltercustomer;
				$last_filter['vd_pdfilterstatus']   = $pdfilterstatus;
				$last_filter['vd_pdfilterpriority'] = $pdfilterpriority;
				$last_filter['vd_pdfilterowner']    = $pdfilterowner;
				$last_filter['vd_pdfilterassignee'] = $pdfilterassignee;
				$last_filter['vd_pdfilterextrafield'] = serialize($pdfilterextrafield);
				
			} else {
			
				$last_filter['pdfiltercustomer'] = $pdfiltercustomer;
				$last_filter['pdfilterstatus']   = $pdfilterstatus;
				$last_filter['pdfilterpriority'] = $pdfilterpriority;
				$last_filter['pdfilterowner']    = $pdfilterowner;
				$last_filter['pdfilterassignee'] = $pdfilterassignee;
				$last_filter['pdfilterextrafield'] = serialize($pdfilterextrafield);
				
				
			}
			$last_filter = serialize($last_filter);
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET LASTFILTER='" . $last_filter . "' WHERE id='" . $GLOBALS['USERID'] . "'";
			mcq($sql,$db);
			print "\n\n<!-- THIS FILTER SAVED -->\n\n";
		}
	}

	if ($ForceGlobalLayout) { 
		$MainListColumnsToShow = $MainListColumnsToShowGlobal;
	}

	if (trim($MainListColumnsToShow)=="") { 
		$MainListColumnsToShow = $MainListColumnsToShowGlobal;
	}

	if ($_REQUEST['PersonalTabsTSN']=="x") {
			$pdfiltercustomer = $_REQUEST['pdfiltercustomer'];
			$pdfilterstatus   = $_REQUEST['pdfilterstatus'];
			$pdfilterpriority = $_REQUEST['pdfilterpriority'];
			$pdfilterowner    = $_REQUEST['pdfilterowner'];
			$pdfilterassignee = $_REQUEST['pdfilterassignee'];
			$GLOBALS['ShowFilterInMainList'] = "No";

			if ($pdfilterassignee=="CURUSER") $pdfilterassignee = $GLOBALS['USERID'];
			if ($pdfilterowner=="CURUSER") $pdfilterowner = $GLOBALS['USERID'];

	}

	if ($query64) {
		$query = base64_decode($query64);
	}
		
	if ($ONLY_SHOW_CUSTOMER) {
				$pdfiltercustomer = $ONLY_SHOW_CUSTOMER;
				$dis = "DISABLED";
				$filter = "custinsert";
	}
	if ($ONLY_SHOW_OWNER) {
				$pdfilterassignee = $ONLY_SHOW_OWNER;
				$dis = "DISABLED";
	}

	$topost = $_SERVER['PHP_SELF'];
		if (!stristr($_SERVER['QUERY_STRING'],"logout")) {
			$ins = $_SERVER['QUERY_STRING'];
		}
	$countertje=0;
	$outputbuffer .= "<form name='mpfilter' method='GET' ACTION='" .$topost . "?" . $ins . "'><input type='hidden' name='newfilter' value='1'><input type='hidden' name='ShowEntitiesOpen' value='1'>";
	$outputbuffer .= "<input type='hidden' name='filter' value='" . $filter . "'>";
	$outputbuffer .= "<input type='hidden' name='tab' value='" . $_REQUEST['tab'] . "'>";
	$outputbuffer .= "<table witdh='100%' border=0><tr><td>";
    $date = date('d-m-Y');
    $sqldate = date('Y-m-d');
		
		// Check if this user may access this page...

		CheckPageAccess("entity");

	if (strtoupper($LetUserSelectOwnListLayout)=="YES") {
		$CurURL = base64_encode(($_SERVER['PHP_SELF'] . "?" .$QUERY_STRING));
		$customize = "";
	}


	if ($filter=="viewdel") {
		$header_title = "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size=+1>". $lang['delentities'] .": @NUM_FOUND@</font>&nbsp;</legend>";
	} elseif ($filter=="custinsert") {
		$header_title = "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size=+1>". $lang['viewinsertedentities'] . ": @NUM_FOUND@</font>&nbsp;</legend>";
	} else {
		$header_title = "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size=+1>". $lang['briefover'] . ": @NUM_FOUND@ " . $customize . "</font>&nbsp;</legend>";
	}

	if ($sort == "eid" && !$desc) {
		$sort = $GLOBALS['TBL_PREFIX'] . "entity.eid";
		$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=eid&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
	} elseif ($sort=="eid") {
		$sort = $GLOBALS['TBL_PREFIX'] . "entity.eid";
		$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=eid&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
	} else {
		$link = "<a 	href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=eid&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
	}


	if ($ShowSortLink=="no") unset($link);

	$outputbuffer .= "<table width=100% class='crm'><tr><td><b>" . $link . "ID</a></b></td>";
	array_push($FA_header,"eid");

	if ($MainListColumnsToShow['cb_cust']) {
		$outputbuffer .= "<td nowrap><b>";
		


		if ($sort == "$GLOBALS[TBL_PREFIX]customer.custname" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=$GLOBALS[TBL_PREFIX]customer.custname&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
		} else {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=$GLOBALS[TBL_PREFIX]customer.custname&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
		} 
		

		if ($ShowSortLink=="no") unset($link);

		$outputbuffer .= "$link$lang[customer]</a></b>";
		array_push($FA_header,$lang['customer']);

		// FILTER PULLDOWN CUSTOMER
		if (strtoupper($ShowFilterInMainList)=="YES") {
			
			$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='pdfiltercustomer' $dis>";
			$outputbuffer .=  "<option value='all' $a size='1'>$lang[all]</option>";

			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname";
			$result= mcq($sql,$db);
			
			while ($UsersArray= mysql_fetch_array($result)) {
				$auth = CheckCustomerAccess($UsersArray['id']);
				if ($auth == "ok" || $auth == "readonly") {
					if ($UsersArray[id]==$pdfiltercustomer) {
							$a = "SELECTED";
					} else {
							$a = "";
					}
					 $outputbuffer .=  "<option value='$UsersArray[id]' $a size='1'>$UsersArray[custname]</option>";
				}
			}

			$outputbuffer .= "</select>";
		}
	$outputbuffer .= "</td>";
} // end MainListColumnsToShow[cust]

//if ($filter<>"custinsert") {
		if ($MainListColumnsToShow['cb_owner']) {

			$outputbuffer .=  "<td nowrap><b>$lang[owner]</b>";
			unset($link);
			array_push($FA_header,$lang['owner']);
		  
		//	$outputbuffer .= "</td><td nowrap><b>$lang[owner]</b>";
			// FILTER PULLDOWN OWNER
			if (strtoupper($ShowFilterInMainList)=="YES") {
				$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='pdfilterowner' $dis>";
				$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE active='yes' ORDER BY FULLNAME";
				$result= mcq($sql,$db);
				$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
				while ($UsersArray= mysql_fetch_array($result)) {
					if ($UsersArray[id]==$pdfilterowner) {
							$a = "SELECTED";
					} else {
							$a = "";
					}
					if (!stristr($UsersArray[FULLNAME],"@@@:")) {
					 $outputbuffer .=  "<option value='$UsersArray[id]' $a>$UsersArray[FULLNAME]</option>";
					}
					
				}

				$outputbuffer .=  "</select>";
			}
			$outputbuffer .=  "</td>";
			unset($link);
		} // end MainList etc owner

		if ($MainListColumnsToShow['cb_assignee']) {
			$outputbuffer .= "<td nowrap><b>$lang[assignee]</b>";
			array_push($FA_header,$lang['assignee']);
			//";
			if (strtoupper($ShowFilterInMainList)=="YES") {
				$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='pdfilterassignee' $dis>";
				$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE active='yes' ORDER BY FULLNAME";
				$result= mcq($sql,$db);
				$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
				while ($UsersArray= mysql_fetch_array($result)) {
					if ($UsersArray[id]==$pdfilterassignee) {
							$a = "SELECTED";
					} else {
							$a = "";
					}

					if (!stristr($UsersArray[FULLNAME],"@@@:")) {
						 $outputbuffer .=  "<option value='$UsersArray[id]' $a>$UsersArray[FULLNAME]</option>";
					}

				}
				$outputbuffer .= "</select>";
			}
				$outputbuffer .=  "</td>";
		} // end mainlistcolumn assignee
//} else {
//	$outputbuffer .= "</td>";
//}

	if ($sort == "status" && !$desc) {
		$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=status&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.status";
	} elseif ($sort == "status") {
		$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=status&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.status";
	} else {
		$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=status&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
	}
	if ($ShowSortLink=="no") unset($link);
	
	unset($tmp); // safety first! :)
	
	if ($MainListColumnsToShow['cb_status']) {
		$outputbuffer .= "<td nowrap><b>$link$lang[status]</a></b>";
		
		array_push($FA_header,$lang['status']);

		if (strtoupper($ShowFilterInMainList)=="YES") {
			$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
			$result= mcq($sql,$db);
			$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='pdfilterstatus'>";
			$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
			while ($result1= mysql_fetch_array($result)) {
						if ($result1['varname']==$pdfilterstatus) {
								$a = "SELECTED";
						} else {
								$a = "";
						}	
						if ("NOT" . $result1['varname']==$pdfilterstatus) {
								$b = "SELECTED";
						} else {
								$b = "";
						}	

						$outputbuffer .=  "<option style='background:" . $result1[color] . "' value='$result1[varname]' $a >$result1[varname]</option>";
						if ($GLOBALS['DisplayNOToptioninfilters']<>"No") {
							$tmp .=  "<option style='background:" . $result1[color] . "' value='NOT$result1[varname]' $b>NOT $result1[varname]</option>";
						}
				}
			$outputbuffer .= $tmp . "</select>";
			unset($tmp);
		}
		$outputbuffer .= "</td>";
	}
		
	if ($MainListColumnsToShow['cb_priority']) {
		
		array_push($FA_header,$lang['priority']);

		if ($sort == "priority" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=priority&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.priority";
		} elseif ($sort == "priority") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=priority&desc=0&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.priority";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td nowrap><b>$link$lang[priority]</a></b>";
		if (strtoupper($ShowFilterInMainList)=="YES") {
			$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars ORDER BY varname";
			$result= mcq($sql,$db);
			$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='pdfilterpriority'>";
			$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
			while ($result1= mysql_fetch_array($result)) {
						if ($result1['varname']==$pdfilterpriority) {
								$a = "SELECTED";
						} else {
								$a = "";
						}
						if ("NOT" . $result1['varname']==$pdfilterpriority) {
								$b = "SELECTED";
						} else {
								$b = "";
						}	
						$outputbuffer .=  "<option style='background:" . $result1[color] . "' value='$result1[varname]' $a >$result1[varname]</option>";
						if ($GLOBALS['DisplayNOToptioninfilters']<>"No") {
							$tmp .=  "<option style='background:" . $result1[color] . "' value='NOT$result1[varname]' $b >NOT $result1[varname]</option>";
						}
				}
			$outputbuffer .= $tmp . "</select>";
			unset($tmp);
		}
		$outputbuffer .= "</td>";
	} 
		
	if ($MainListColumnsToShow['cb_category']) {
		array_push($FA_header,$lang['category']);
		if ($sort == "category" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=category&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.category";
		} elseif ($sort == "category") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=category&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.category";
		} else {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=category&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td><b>$link$lang[category]</a></b></td>";
	}
	
	$ExtraFieldsList = GetExtraFields();
	
	if (sizeof($ExtraFieldsList)>0 && $ExtraFieldsList[0]<>"") {
		foreach ($ExtraFieldsList AS $field) {
			$element = "EFID" . $field['id'];
			if ($MainListColumnsToShow[$element]) {
								
				$toshow = CleanExtraFieldName($field['name']);

				$outputbuffer .= "<td><b>" . $toshow . "</b>";
				array_push($FA_header,$toshow);

				if (strtoupper($ShowFilterInMainList)=="YES") {
					$VarName = $element;
					$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='" . $VarName ."'>";
					$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
					
					if ($filter<>"viewdel") {
						if ($field['fieldtype'] <> "date") {
							$sql = "SELECT DISTINCT(value) FROM $GLOBALS[TBL_PREFIX]customaddons, $GLOBALS[TBL_PREFIX]entity WHERE  $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND $GLOBALS[TBL_PREFIX]entity.eid=$GLOBALS[TBL_PREFIX]customaddons.eid AND name='" . $field['id'] . "' ORDER BY value";
						} else {
							// 31-12-2004
							$sql = "SELECT DISTINCT(value), RIGHT(value,4) AS year, SUBSTRING(value,4,2) AS month, LEFT(value,2) AS day FROM $GLOBALS[TBL_PREFIX]customaddons, $GLOBALS[TBL_PREFIX]entity WHERE  $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND $GLOBALS[TBL_PREFIX]entity.eid=$GLOBALS[TBL_PREFIX]customaddons.eid AND name='" . $field['id'] . "' ORDER BY year,month,day";

//							$sql = "SELECT value, RIGHT(value,4) AS year, SUBSTRING(value,4,2) AS month, LEFT(value,2) AS day FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' AND type<>'cust' ORDER BY year,month,day";
						}


					} else {
						if ($field['fieldtype'] <> "date") {
							$sql = "SELECT DISTINCT(value) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' AND type<>'cust' ORDER BY value";
						} else {
							// 31-12-2004
							$sql = "SELECT DISTINCT(value), RIGHT(value,4) AS year, SUBSTRING(value,4,2) AS month, LEFT(value,2) AS day FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' AND type<>'cust' ORDER BY year,month,day";
						}

						//$sql = "SELECT DISTINCT(value) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' ORDER BY value";
					}

					$result = mcq($sql,$db);
					//print $sql;
	
					$CurField = $element;

					while ($result1= mysql_fetch_array($result)) {
							if (strstr($field['fieldtype'],"User-list")) {
										$prt = GetUserName($result1['value']);
								if ($pdfilterextrafield[$CurField] == $result1['value']) {
										$a = "SELECTED";
								} else {
										$a = "";
								}
							} else {
								if ($pdfilterextrafield[$CurField] == $result1['value']) {
										$a = "SELECTED";
								} else {
										$a = "";
								}
							}
							if (strstr($field['fieldtype'],"User-list")) {
								$outputbuffer .=  "<option value='" . $result1['value'] . "' $a>" . $prt . "</option>";
							} else {
								$outputbuffer .=  "<option value='" . $result1['value'] . "' $a>" . $result1['value'] . "</option>";
							}

						}
					$outputbuffer .= "</select>";
				}
				$outputbuffer .= "</td>";
			}
		}
	}
		
		if ($MainListColumnsToShow['cb_contact']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['contact'] . "</b></font></td>";
				array_push($FA_header,$lang['contact']);
		}
		if ($MainListColumnsToShow['cb_contact_title']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['contacttitle'] . "</b></font></td>";
				array_push($FA_header,$lang['contacttitle']);
		}
		if ($MainListColumnsToShow['cb_contact_phone']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['contactphone'] . "</b></font></td>";
				array_push($FA_header,$lang['contactphone']);
		}
		if ($MainListColumnsToShow['cb_contact_email']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['contactemail'] . "</b></font></td>";	
				array_push($FA_header,$lang['contactemail']);
		}
		if ($MainListColumnsToShow['cb_cust_address']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['customeraddress'] . "</b></font></td>";
				array_push($FA_header,$lang['customeraddress']);
		}
		if ($MainListColumnsToShow['cb_cust_remarks']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['custremarks'] . "</b></font></td>";
				array_push($FA_header,$lang['custremarks']);
		}
		if ($MainListColumnsToShow['cb_cust_homepage']) {
				$outputbuffer .= "<td><font color='#3366CC'><b>" . $lang['custhomepage'] . "</b></font></td>";
				array_push($FA_header,$lang['custhomepage']);
		}
	$ExtraFieldsList = GetExtraCustomerFields();
	
	if (sizeof($ExtraFieldsList)>0 && $ExtraFieldsList[0]<>"") {
		foreach ($ExtraFieldsList AS $field) {
			$element = "EFID" . $field['id'];
			if ($MainListColumnsToShow[$element]) {
								
				$toshow = CleanExtraFieldName($field['name']);

				$outputbuffer .= "<td><b><font color='#3366CC'>" . $toshow . "</font></b>";
				array_push($FA_header,$toshow);

				if (strtoupper($GLOBALS['ShowFilterInMainList'])=="YES") {
					$VarName = $element;
					$outputbuffer .= "<br><select OnChange='javascript:document.mpfilter.submit()' name='" . $VarName ."'>";
					$outputbuffer .=  "<option value='all' $a>$lang[all]</option>";
					
					if ($filter<>"viewdel") {
						$sql = "SELECT DISTINCT(value) FROM $GLOBALS[TBL_PREFIX]customaddons, $GLOBALS[TBL_PREFIX]entity WHERE  $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND $GLOBALS[TBL_PREFIX]entity.CRMcustomer=$GLOBALS[TBL_PREFIX]customaddons.eid AND name='" . $field['id'] . "' ORDER BY value";
					} else {
						$sql = "SELECT DISTINCT(value) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' ORDER BY value";
					}
					
					
					$result = mcq($sql,$db);
	
					$CurField = $element;

					while ($result1= mysql_fetch_array($result)) {
							if ($pdfilterextrafield[$CurField] == $result1['value']) {
									$a = "SELECTED";
							} else {
									$a = "";
							}
							if ($field['fieldtype'] == "Lista de usu�rios do sistema" || $field['fieldtype'] == "User-list of limited CRM-CTT users" || $field['fieldtype'] == "User-list of administrative CRM-CTT users") {
								$outputbuffer .=  "<option value='" . $result1['value'] . "' $a>" . GetUserName($result1['value']) . "</option>";
							} else {
								$outputbuffer .=  "<option value='" . $result1['value'] . "' $a>" . $result1['value'] . "</option>";
							}
						}
					$outputbuffer .= "</select>";
				}
				$outputbuffer .= "</td>";
			}
		}
	}

	if (strtolower($ShowNumOfAttachments)=="yes" && !$brief) {
		$outputbuffer .="<td><b><img src='attach.gif'></b></td>";
		array_push($FA_header,"<img src='attach.gif'>");
	}
	
	if ($MainListColumnsToShow['cb_duedate']) {
		
		if ($sort == "sqldate" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=sqldate&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.sqldate";
		} elseif ($sort == "sqldate") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=sqldate&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
			$sort = " " . $GLOBALS['TBL_PREFIX'] . "entity.sqldate";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td nowrap><b>$link$lang[duedate]</a></b></td>";
		array_push($FA_header,$lang['duedate']);
	}

	if ($MainListColumnsToShow['cb_lastupdate']) {
		if ($sort == "tp" && !$desc) {
			$sort = $GLOBALS['TBL_PREFIX'] . "entity.tp";
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=tp&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
		} elseif ($sort == "tp") {
			$sort = $GLOBALS['TBL_PREFIX'] . "entity.tp";
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&sort=tp&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration&$epoch' class='bigsort'>";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td nowrap><b>" . $link . $lang['lastupdate'] ."</a></b></td>";
		array_push($FA_header,$lang['lastupdate']);
	}


	if ($MainListColumnsToShow['cb_alarmdate']) {
		if ($sort == "alarmdate" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=alarmdate&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			//$sort = $GLOBALS['TBL_PREFIX'] . "entity.alarmdate";
		} elseif($sort == "alarmdate") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=alarmdate&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td nowrap><b>$lang[alarmdate]<b></td>";
		array_push($FA_header,$lang['alarmdate']);
	}
	
	if ($MainListColumnsToShow['cb_creationdate']) {
		if ($sort == "openepoch" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=openepoch&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = $GLOBALS['TBL_PREFIX'] . "entity.openepoch";
		} elseif ($sort == "openepoch") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=openepoch&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
			$sort = $GLOBALS['TBL_PREFIX'] . "entity.openepoch";
		}
		if ($ShowSortLink=="no") unset($link);
		$outputbuffer .= "<td nowrap><b>$link$lang[creationdate]</a><b></td>";
		array_push($FA_header,$lang['creationdate']);
	}
	if ($MainListColumnsToShow['cb_duration']) {
		if ($sort == "duration" && !$desc) {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=duration&desc=1&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		} elseif ($sort == "duration") {
			$link = "<a href='$topost?ShowEntitiesOpen=1&tab=$tab&filter=$filter&$epoch&sort=duration&pdfiltercustomer=$pdfiltercustomer&pdfilterstatus=$pdfilterstatus&pdfilterpriority=$pdfilterpriority&pdfilterowner=$pdfilterowner&pdfilterassignee=$pdfilterassignee&pdfiltercreationdate=$pdfiltercreationdate&pdfilterduration=$pdfilterduration' class='bigsort'>";
		}
		if ($ShowSortLink=="no") unset($link);
		if ($From_Summary) {
				$outputbuffer .= "<td nowrap><b>$link Age/duration</a><b></td>";
				array_push($FA_header,"Age/duration");
		} else {
			if ($filter=="viewdel") {
					$outputbuffer .= "<td nowrap><b>$link Duration</a><b></td>";
					array_push($FA_header,"Duration");
			} else {
					$outputbuffer .= "<td nowrap><b>$link Age </a><b></td>";
					array_push($FA_header,"Age");
			}
		}
	}
	
	if ($filter=="custinsert") {
		$outputbuffer .= "<td></td>";
	}
// end of main header row
	$outputbuffer .= "</tr>";

	if (!$sort) {
				$sort = "$GLOBALS[TBL_PREFIX]entity.sqldate,$GLOBALS[TBL_PREFIX]entity.status,$GLOBALS[TBL_PREFIX]entity.priority";
	} elseif ($sort=="duration") {
			if ($filter=="viewdel") {
				$sort = " ($GLOBALS[TBL_PREFIX]entity.closeepoch-$GLOBALS[TBL_PREFIX]entity.openepoch)";
			} else {
				$sort = " $GLOBALS[TBL_PREFIX]entity.openepoch";
			}
	}
	if ($desc) {
			$sort .= " DESC";
	}
	
    if ($query) {
		$sql = $query;
	} else {
		$mpfilter = "";
		if ($GLOBALS['EnableEntityRelations'] == "Yes" && $GLOBALS['HideChildsFromMainList'] == "Yes") {
			$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.parent=0 ";
			qlog("EnableEntityRelations is set - not showing childs!");
		}
		if ($pdfiltercustomer && $pdfiltercustomer<>"all") {
			$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.CRMcustomer = '" . $pdfiltercustomer . "'";
		} 
		if ($pdfilterstatus && $pdfilterstatus<>"all") {
			if (substr($pdfilterstatus,0,3)=="NOT") {
				qlog("LNOT in function!");
				$pdfilterstatus = substr($pdfilterstatus,3,strlen($pdfilterstatus)-3);
				qlog("LEFTOVER: " . $pdfilterstatus);
				$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.status <> '" . $pdfilterstatus . "'";
			} else {
				$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.status = '" . $pdfilterstatus . "'";
			}
		} 
		if ($pdfilterpriority && $pdfilterpriority<>"all") {
			if (substr($pdfilterpriority,0,3)=="NOT") {
				$pdfilterpriority = substr($pdfilterpriority,3,strlen($pdfilterpriority)-3);
				$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.priority <> '" . $pdfilterpriority . "'";	
			} else {
				$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.priority = '" . $pdfilterpriority . "'";
			}
		} 
		if ($pdfilterowner && $pdfilterowner<>"all") {
			$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.owner = '" . $pdfilterowner . "'";
		} 
		if ($pdfilterassignee && $pdfilterassignee<>"all") {
			$mpfilter .= " AND $GLOBALS[TBL_PREFIX]entity.assignee = '" . $pdfilterassignee . "'";
		}
	
		if ($ComingFromCustInsert<>"1") {
			$insSql = "AND $GLOBALS[TBL_PREFIX]entity.owner='2147483647' AND $GLOBALS[TBL_PREFIX]entity.assignee='2147483647'";
		}

		if ($filter=="custinsert") {
			$sql= "SELECT $GLOBALS[TBL_PREFIX]entity.eid FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer " . $insSql ." AND deleted<>'y' " . $mpfilter . " ORDER BY " . $sort;
			// 
		} elseif ($filter=="viewdel") {
			$sql= "SELECT $GLOBALS[TBL_PREFIX]entity.eid FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND owner<>'2147483647' AND assignee<>'2147483647' AND deleted='y' " . $mpfilter . " ORDER BY " . $sort;
			if ($ExtraFieldSearched) {
				$table_alias = 1;
				$ExtraFieldsList = GetExtraFields();
				foreach ($ExtraFieldsList as $field) {
					$element = "EFID" . $field['id'];
					if ($pdfilterextrafield[$element]) { // array element contains a value
						if ($pdfilterextrafield[$element]=="") {
							$pdfilterextrafield[$element]="%";
						}
						$local_table_alias = "Ta" . $table_alias;
						if ($from_table) {
							$from_table .= ",$GLOBALS[TBL_PREFIX]customaddons AS " . $local_table_alias . " ";
							$where_table .= " AND " . $local_table_alias . ".eid=" . $GLOBALS['TBL_PREFIX'] . "entity.eid ";
						} else {
							$from_table = " $GLOBALS[TBL_PREFIX]customaddons AS " . $local_table_alias . " ";
							$where_table .= " " . $local_table_alias . ".eid=" . $GLOBALS['TBL_PREFIX'] . "entity.eid ";
						}
						
						
						$tataa .= "(" . $local_table_alias . ".name='" . $field['id'] . "' AND " . $local_table_alias . ".value='" . $pdfilterextrafield[$element] . "') AND ";
						$ty++;
						$table_alias++;
					}
				}
				

					$sql= "SELECT DISTINCT($GLOBALS[TBL_PREFIX]entity.eid) FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer ";
						
					if ($from_table) {
						$sql .= "," . $from_table;
					}
					
					$sql .= " WHERE " . $tataa . " ";

					if ($where_table) {
						$sql .= $where_table . " AND ";
					}
						
					$sql .= " $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]entity.deleted='y' AND $GLOBALS[TBL_PREFIX]entity.owner<>'2147483647' AND $GLOBALS[TBL_PREFIX]entity.assignee<>'2147483647' " . $mpfilter . " ORDER BY " . $sort;
//					qlog("Using MySQL 5 compatibility modus");
//					print $sql;
// AND 
				



			} 
		} elseif ($ONLY_SHOW_OWNER) {
			if ($ONLY_SHOW_OWNER=="read-only-all") {
//				print "in effect";
					$sql= "SELECT $GLOBALS[TBL_PREFIX]entity.eid FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND deleted<>'y' ORDER BY " . $sort;
				} else { 
					$sql= "SELECT $GLOBALS[TBL_PREFIX]entity.eid FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND deleted<>'y' AND $GLOBALS[TBL_PREFIX]entity.assignee='$ONLY_SHOW_OWNER' " . $mpfilter . " ORDER BY " . $sort;
//					print $sql;
				}
		
		} else {
			if ($ExtraFieldSearched) {
				// AND 
				//$tataa = " (";
				$table_alias = 1;
				$ExtraFieldsList = GetExtraFields();
				foreach ($ExtraFieldsList as $field) {
					$element = "EFID" . $field['id'];
					if ($pdfilterextrafield[$element]) { // array element contains a value
						if ($pdfilterextrafield[$element]=="") {
							$pdfilterextrafield[$element]="%";
						}
						$local_table_alias = "Ta" . $table_alias;
						if ($from_table) {
							$from_table .= ",$GLOBALS[TBL_PREFIX]customaddons AS " . $local_table_alias . " ";
							$where_table .= " AND " . $local_table_alias . ".eid=" . $GLOBALS['TBL_PREFIX'] . "entity.eid ";
						} else {
							$from_table = " $GLOBALS[TBL_PREFIX]customaddons AS " . $local_table_alias . " ";
							$where_table .= " " . $local_table_alias . ".eid=" . $GLOBALS['TBL_PREFIX'] . "entity.eid ";
						}
						
						
						$tataa .= "(" . $local_table_alias . ".name='" . $field['id'] . "' AND " . $local_table_alias . ".value='" . $pdfilterextrafield[$element] . "') AND ";
						$ty++;
						$table_alias++;
					}
				}
				

					$sql= "SELECT DISTINCT($GLOBALS[TBL_PREFIX]entity.eid) FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer ";
						
					if ($from_table) {
						$sql .= "," . $from_table;
					}
					
					$sql .= " WHERE " . $tataa . " ";

					if ($where_table) {
						$sql .= $where_table . " AND ";
					}
						
					$sql .= " $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND $GLOBALS[TBL_PREFIX]entity.owner<>'2147483647' AND $GLOBALS[TBL_PREFIX]entity.assignee<>'2147483647' " . $mpfilter . " ORDER BY " . $sort;
//					qlog("Using MySQL 5 compatibility modus");
//					print $sql;
				
				
				$filter = "normal";

			} else {

				$sql= "SELECT $GLOBALS[TBL_PREFIX]entity.eid FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND deleted<>'y' AND owner<>'2147483647' AND assignee<>'2147483647' " . $mpfilter . " ORDER BY " . $sort;
				$filter = "normal";

			}
		}
	}
	

	$usernames = array(); // cache array
	$result= mcq($sql,$db);

	$displayed = array(); // de-double array

	// Array to house found eids
	$found_eids = array();

	while ($row= mysql_fetch_array($result)) {
		if (!in_array($row['eid'],$found_eids)) {
			array_push($found_eids,$row['eid']);
		}
	}
	
	// Filter out the extra customer fields not matching the criterium
	$list = GetExtraCustomerFields();
	for ($x=0;$x<sizeof($list);$x++) {
			$field = $list[$x];
			$element = "EFID" . $field['id'];
			for ($y=0;$y<sizeof($found_eids);$y++) {
				if ($pdfilterextrafield[$element] && $found_eids[$y]<>"") { // array element contains a value
					$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='" . GetEntityCustomer($found_eids[$y]) . "' AND name='" . $field['id'] . "' AND value='" . $pdfilterextrafield[$element] . "'";
					//print $sql . "<br>";
					$res = mcq($sql,$db);
					$num = mysql_affected_rows();
					if ($num==0) {
						$found_eids[$y] = "'-'";
					}
				}
			}
	}
	$query = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]entity.CRMcustomer=$GLOBALS[TBL_PREFIX]customer.id AND ( 1=0 OR ";

	$browse_array = array();

	foreach ($found_eids AS $eids) {
		$auth = CheckEntityAccess($eids);
		if ($auth == "ok" || $auth = "readonly") {
			$query .= " eid=" . $eids . " OR";
			array_push($browse_array, $eids);
		}
	}


	if (strtolower($GLOBALS['ShowNumOfAttachments'])=="yes" && $GLOBALS['USE_EXTENDED_CACHE'] == "Yes") {
			BuildNumOfAttachmentsCache($browse_array);
	}

	$query .= " 0=1) ORDER BY " . $sort;
//	print $query;
	$browsearray = PushStashValue(serialize($browse_array));

    $PDFstashid = PushStashValue("not filled yet");
	$query_stashid = PushStashValue($query);
	$outputbuffer2 .= "<table width='100%'><tr><td align='right'>";
	$outputbuffer2 .= "<a class='bigsort' title='$lang[downloadpdf]'  href=\"javascript:popPDFwindow('sumpdf.php?enc=1&stashid=$PDFstashid')\"><img src='pdf.gif' style='border:0'></a>&nbsp;&nbsp;";

	$result = mcq($query,$db);
	if ($filter=="custinsert" || GetClearanceLevel($GLOBALS['USERID'])=="ooro") {
		// some added security

		$sec = md5($query);
		$swat = PushStashValue($sec);
		$ins_url = "&swat=" . $swat;
		$csv_url = "csv.php?submitted=1&a=a&b=b&c=c&d=d&e=e&f=f&m=m&n=n&separator=RealExcel&stashid2=" . $query_stashid . "&swat=" . $swat . "&query2=dummy&knop=Download+exportfile";
		$a = "";
	} else {
		if (GetClearanceLevel($GLOBALS['USERID']) <> "ro" && GetClearanceLevel($GLOBALS['USERID']) <> "ro+" && GetClearanceLevel($GLOBALS['USERID']) <> "read-only-all") {
			$csv_url = "csv.php?stashid=" . $query_stashid;
			$a = "&nbsp;";
		}
	}

	$outputbuffer2 .= "<a class='bigsort' title='Baixar no formato Excel'  href='csv.php?ListLayout=true&stashid2=" . $query_stashid . "&separator=RealExcel'><img src='excel_large.gif' style='border:0'></a>&nbsp;&nbsp;";
	
	if (GetClearanceLevel($GLOBALS['USERID']) <> "ro" && GetClearanceLevel($GLOBALS['USERID']) <> "ro+" && GetClearanceLevel($GLOBALS['USERID']) <> "read-only-all") {
		$outputbuffer2 .= "<a class='bigsort' title='$lang[downloadsumcsv]'  href='" . $csv_url . "'><img src='excel_large_double.gif' style='border:0'></a>&nbsp;&nbsp;";
	}


	$outputbuffer2 .= $a;

	$outputbuffer2 .= "</td></tr></table>";
	$header_row = $outputbuffer2 . $outputbuffer;
	unset($outputbuffer);
	// Dim sum array (for numeric field totals)
	$sums = array();
	$ExtraFieldsList = GetExtraFields();
	$ExtraCustomerFieldsList = GetExtraCustomerFields();
	// EXT CACHE
	if($GLOBALS['USE_EXTENDED_CACHE']) {
		$ef_array = array();
		$ec_array = array();
		$zx=0;		
		$sql = "SELECT value,name,eid,id FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type<>'cust'";
		if ($filter=="viewdel") {
			$sql = "SELECT $GLOBALS[TBL_PREFIX]customaddons.value,$GLOBALS[TBL_PREFIX]customaddons.name,$GLOBALS[TBL_PREFIX]customaddons.eid FROM $GLOBALS[TBL_PREFIX]customaddons, $GLOBALS[TBL_PREFIX]entity WHERE ($GLOBALS[TBL_PREFIX]customaddons.eid=$GLOBALS[TBL_PREFIX]entity.eid) AND $GLOBALS[TBL_PREFIX]entity.deleted='y' AND $GLOBALS[TBL_PREFIX]customaddons.type<>'cust'";
		} else {
			$sql = "SELECT $GLOBALS[TBL_PREFIX]customaddons.value,$GLOBALS[TBL_PREFIX]customaddons.name,$GLOBALS[TBL_PREFIX]customaddons.eid FROM $GLOBALS[TBL_PREFIX]customaddons, $GLOBALS[TBL_PREFIX]entity WHERE ($GLOBALS[TBL_PREFIX]customaddons.eid=$GLOBALS[TBL_PREFIX]entity.eid) AND $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND $GLOBALS[TBL_PREFIX]customaddons.type<>'cust'";
		}
		$resx = mcq($sql,$db);
		while ($resxrow = mysql_fetch_array($resx)) {
			$ef_array[$resxrow['eid']][$resxrow['name']] = $resxrow['value'];
			$zx++;
		}
		qlog("Loaded entire EF table: $zx records. (EXTENDED_CACHE)");
		$zx=0;
		$sql = "SELECT value,name,eid,id FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust'";
		$resx = mcq($sql,$db);
		while ($resxrow = mysql_fetch_array($resx)) {
			$ec_array[$resxrow['eid']][$resxrow['name']] = $resxrow['value'];
			$zx++;
		}
		qlog("Loaded entire ECF table: $zx records. (EXTENDED_CACHE)");
	}

	// ****************************************
	// ****** Start displaying results ********
	// ****************************************

		?>
	
		<script type="text/javascript">
		<!--
		function OE(eid)
		{
			document.location = 'edit.php?e=' + eid + '&fromlist=1&browsearray=<?echo $browsearray;?>';
		}
		function HL(id)
		{
			id.style.background = '#e9e9e9';
		//	document.getElementById(id).style.background = '#e9e9e9';
		}
		function UL(id)
		{
			id.style.background = '#ffffff';
		//	document.getElementById(id).style.background = '#ffffff';
		}

		//-->
		</script>
		<?

	while ($e= mysql_fetch_array($result)) {

		print "\n";
		$x = CheckEntityAccess($e['eid']); 

		if ($x == "ok" || $x == "readonly") {
			if (!in_array($e['eid'],$displayed)) {
						$teller++;
						$tab_depth = 0;
						array_push($FA_datal,"edit.php?e=" . $e['eid']);
						array_push($displayed,$e[eid]);
						$usernames[$e[assignee]] = GetUserName($e['assignee']);
						$owner = GetUserName($e['owner']);
						$e1[FULLNAME] = $usernames[$e[assignee]];
					
						$e[category] = ereg_replace("\"","&quot;", $e[category]);
						$e[category] = ereg_replace("\'","\\'", $e[category]);

						if (strtolower($DontShowPopupWindow)<>"yes" && !$ONLY_SHOW_CUSTOMER && !$ONLY_SHOW_OWNER) {

							$html = "<table width=\'100%\' cellspacing=\'0\' cellpadding=\'3\' border=\'0\'><tr><td bgcolor=\'#CCCCCC\'><b>$e[category]</b></td></tr>";

							$html .= "<tr><td><img src=\'arrow.gif\'>&nbsp;<a class=\'bigsort\' href=\'javascript:popupdater($e[eid]);\' title=\'$lang[uinw]\'>$lang[uinw]</a></td></tr>";
							$html .= "<tr><td><img src=\'arrow.gif\'>&nbsp;<a class=\'bigsort\' href=\'edit.php?e=$e[eid]&browsearray=$browsearray&fromlist=$return_to_list&browsearray=$browsearray\' title=\'$lang[editthis]\'>$lang[editthis]</a></td></tr>";
							
							$html .= "<tr><td><img src=\'arrow.gif\'>&nbsp;<a class=\'bigsort\' href=\'date.php?eID=$e[eid]\' title=\'$lang[alarmsettings]\'>$lang[alarmsettings]</a></td></tr>";
							
							$html .= "<tr><td><img src=\'arrow.gif\'>&nbsp;<a class=\'bigsort\' href=\'edit.php?d=$e[eid]\' title=\'$lang[deletethisentity]\'>$lang[delete]</a></td></tr>";
							$html .= "<tr><td><img src=\'arrow.gif\'>&nbsp;<a class=\'bigsort\' title=\'$lang[downloadpdf]\' href=javascript:popPDFwindow(\'sumpdf.php?pdf=$e[eid]\'); >$lang[pdfreport]</a>&nbsp;&nbsp;<img src=\'pdf.gif\' width=\'12\' height=\'12\'></td></tr>";
							$html .= "</table>";

							if ($e[FULLNAME]=="") { $e[FULLNAME] = "n/a"; }	
							$outputbuffer .= "<tr onmouseover=\"style.background='#E9E9E9';return overlib('" . $html . "', STICKY)\"  onmouseout=\"style.background='#FFFFFF';nd();\"><td><b>";

							if ($e[deleted] == "y") {
								$outputbuffer .= "<font color='#FF0000'>" . $e['eid'] . "</font>";
								array_push($FA_data,"<font color='#FF0000'>" . $e['eid'] . "</font>");
								$tab_depth++;
							} else {
								$outputbuffer .= $e[eid];
								array_push($FA_data,$e['eid']);
								$tab_depth++;
							}

							$outputbuffer .= "</b></a></td>";

							if ($MainListColumnsToShow['cb_cust']) {
								$outputbuffer .= "<td NOWRAP>$e[custname]</td>";
								array_push($FA_data,$e['custname']);
								$tab_depth++;
							}
							
							if ($MainListColumnsToShow['cb_owner']) {
	//								if ($filter<>"custinsert") {
							
										if ($ComingFromCustInsert<>"1" && $filter=="custinsert") {
											$e['FULLNAME']="n/a";
										} 
				
										$outputbuffer .= "<td NOWRAP>" . GetUserName($e['owner']) . "</td>";
										array_push($FA_data,GetUserName($e['owner']));
										$tab_depth++;
	//								}
							}


						} else {
							print "\n";
							if ($ONLY_SHOW_CUSTOMER || $ONLY_SHOW_OWNER) {
								
								//if ($ComingFromCustInsert=="1") {
									$fullname = GetUserName($e['owner']);
								//} else {
								//	$fullname = "hops";
								//}
								


								if ($fullname=="") { $fullname = "n/a"; }	

								if ($EnableEditButton && strtoupper($GLOBALS['DontShowPopupWindow'])=="YES") {
									$outputbuffer .= "<tr onmouseover=\"javascript:style.background='#E9E9E9';\" onmouseout=\"style.background='#FFFFFF';\" OnClick='document.location=\"cust-insert.php?e=$e[eid]&tab=200\";' style='cursor:pointer'><td><b>";
								} elseif ($ONLY_SHOW_OWNER) {
									$outputbuffer .= "<tr onmouseover=\"javascript:style.background='#E9E9E9';\" onmouseout=\"style.background='#FFFFFF';\" OnClick='document.location=\"management.php?e=$e[eid]&tab=200\";' style='cursor:pointer'><td><b>";
								} else {
									$outputbuffer .= "<tr onmouseover=\"HL(this)\" onmouseout=\"UL(this)\"><td><b>";
								}
								
								$lockedby = IsLocked($e['eid']);
								if ($lockedby<>"") {
									$lock_ins = "<img src='lock.png' title='This entity is locked for editing by " . GetUserName($lockedby) . "'>";
								} else {
									unset($lock_ins);
								}

								
								if ($e[deleted] == "y") {
									$outputbuffer .= "<font color='#FF0000'>" . $e['eid'] . "</font>";
									array_push($FA_data,"<font color='#FF0000'>" . $e['eid'] . "</font>");
								} else {
									$outputbuffer .= $e[eid];
									array_push($FA_data,$e['eid']);
								}

								$tab_depth++;

								$outputbuffer .= "</b></a></td>";
								if ($MainListColumnsToShow['cb_cust']) {
									$outputbuffer .= "<td NOWRAP>$e[custname]</td>";
									$tab_depth++;
									array_push($FA_data,$e['custname']);
								}
								if ($MainListColumnsToShow['cb_owner']) {
	//								if ($filter<>"custinsert") {
										$outputbuffer .= "<td NOWRAP>" . GetUserName($e['owner']) . "</td>";
										$tab_depth++;
										array_push($FA_data,GetUserName($e['owner']));
	//								}
								}
							} else {
								if ($e[FULLNAME]=="") { $e[FULLNAME] = "n/a"; }	
//								$outputbuffer .= "<tr onmouseover=\"HL(this)\" onmouseout=\"UL(this)\" OnClick='document.location=\"edit.php?e=$e[eid]&fromlist=$return_to_list&browsearray=$browsearray\";' style='cursor:pointer'><td><b>";
								$outputbuffer .= "<tr onmouseover=\"HL(this)\" onmouseout=\"UL(this)\" OnClick='OE(" . $e['eid'] .");' style='cursor:pointer'><td><b>";

								$lockedby = IsLocked($e['eid']);
								if ($lockedby<>"") {
									$lock_ins = "<img src='lock.png' title='This entity is locked for editing by " . GetUserName($lockedby) . "'>";
								} else {
									unset($lock_ins);
								}

								if ($e[deleted] == "y") {
									$outputbuffer .= "<font color='red'>" . $e[eid] . "</font>&nbsp;" . $lock_ins;
									array_push($FA_data,"<font color='red'>" . $e[eid] . "</font>&nbsp;" . $lock_ins);
								} else {
									$outputbuffer .= $e[eid] . "&nbsp;" . $lock_ins;
									array_push($FA_data,$e[eid] . "&nbsp;" . $lock_ins);
								}
								$tab_depth++;
								$outputbuffer .= "</b></a></td>";
								if ($MainListColumnsToShow['cb_cust']) {
									$outputbuffer .= "<td NOWRAP>$e[custname]</td>";
									$tab_depth++;
									array_push($FA_data,$e['custname']);
								}
								if ($MainListColumnsToShow['cb_owner']) {
										$outputbuffer .= "<td NOWRAP>" . GetUserName($e['owner']) . "</td>";
										$tab_depth++;	
										array_push($FA_data,GetUserName($e['owner']));
								}
							}
						
						}


						if ($MainListColumnsToShow['cb_assignee']) {
								if ($e1[FULLNAME]=="") { $e1[FULLNAME] = "n/a"; }
								$outputbuffer .= "<td NOWRAP>$e1[FULLNAME]</td>";
								$tab_depth++;
								array_push($FA_data,$e1[FULLNAME]);
						}	
						if ($MainListColumnsToShow['cb_status']) {
							if (!$colortustat[$e['status']]) {
								//$colortustat[$e['status']] = GetStatusColor($e[status]);
								$colornumstat = GetStatusNum($e['status']);
							}
						}
						if ($MainListColumnsToShow['cb_status']) {
	//						$outputbuffer .= "<td bgcolor='" . $colortustat[$e['status']] . "' NOWRAP>";
							$outputbuffer .= "<td class='SR" . $colornumstat . "' NOWRAP>";
							$outputbuffer .= "$e[status]</td>";
							array_push($FA_data,$e['status']);
							$tab_depth++;
						}
						if ($MainListColumnsToShow['cb_priority']) {
							if (!$colortuprio[$e['priority']]) {
								//$colortuprio[$e['priority']] = GetPriorityColor($e[priority]);
								$colornumprio = GetPriorityNum($e['priority']);
							}
						//	$outputbuffer .= "<td bgcolor='" . $colortuprio[$e['priority']] . "' NOWRAP>";
							$outputbuffer .= "<td class='PR" . $colornumprio . "' NOWRAP>";
							$outputbuffer .= "$e[priority]</td>";
							$tab_depth++;
							array_push($FA_data,$e['priority']);
						}
						if ($MainListColumnsToShow['cb_category']) {
							$outputbuffer .= "<td>$e[category]&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['category']);
						}
					
						
						if (sizeof($ExtraFieldsList)>0 && $ExtraFieldsList[0]<>"") {

							/*
							foreach ($ef_array AS $row) {
								foreach ($row AS $line) {
									qlog($line);
								}
							}
							*/

							foreach ($ExtraFieldsList AS $field) {
								$element = "EFID" . $field['id'];
								if ($MainListColumnsToShow[$element]) {
									if($GLOBALS['USE_EXTENDED_CACHE']) {
											$gh[0] = $ef_array[$e['eid']][$field['id']];
											$gh['value'] = $gh[0];
									} else {
										$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type<>'cust' AND eid='" . $e['eid'] . "' AND name='" . $field['id'] ."' LIMIT 1";
										$result33 = mcq($sql,$db);
										$gh = mysql_fetch_array($result33);
									}

									if ($field['fieldtype'] == "text area") {
										$gh[0] = eregi_replace("\n","<BR>",$gh[0]);
									}
									if ($field['fieldtype'] == "date") {
										$gh[0] = TransFormDate($gh[0]);
									} elseif (strstr($field['fieldtype'],"User-list")) {
										$gh[0] = GetUserName($gh[0]);
									}
																		
									$tab_depth++;

									if ($field['fieldtype'] == "numeric" || $field['fieldtype'] == "invoice cost" || $field['fieldtype'] == "invoice qty" || $field['fieldtype'] == "invoice cost including VAT") {
										// This is a numeric extra field, we'll add it up!
									
										$element = "EFID" . $field['id'];
										if (!is_array($sums[$field['id']])) {
											$sums[$field['id']] = array();
											$sums[$field['id']]['name']			= $field['name'];
											$sums[$field['id']]['id']			= $field['id'];
											$sums[$field['id']]['tab_depth']	= $tab_depth;
										} 

										$sums[$field['id']]['sum'] += $gh['value'];
																				
										$to_sum = true;
										if ($GLOBALS['DateFormat'] == "dd-mm-yyyy") {
											$gh[0] = number_format($gh[0],2,',','.');
										} else {
											$gh[0] = number_format($gh[0],2,'.',',');
										}
									}
									$outputbuffer .= "<td>" . $gh[0] . "&nbsp;</td>";		
									array_push($FA_data,$gh[0]);
								}
							}
						}

						if ($MainListColumnsToShow['cb_contact']) {
							$outputbuffer .= "<td>" . $e['contact'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['contact']);
						}
						if ($MainListColumnsToShow['cb_contact_title']) {
							$outputbuffer .= "<td>" . $e['contact_title'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['contact_title']);
						}
						if ($MainListColumnsToShow['cb_contact_phone']) {
							$outputbuffer .= "<td>" . $e['contact_phone'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['contact_phone']);
						}
						if ($MainListColumnsToShow['cb_contact_email']) {
							$outputbuffer .= "<td>" . $e['contact_email'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['contact_email']);
						}
						if ($MainListColumnsToShow['cb_cust_address']) {
							$outputbuffer .= "<td>" . $e['cust_address'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['cust_address']);
						}
						if ($MainListColumnsToShow['cb_cust_remarks']) {
							$outputbuffer .= "<td>" . $e['cust_remarks'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['cust_remarks']);
						}
						if ($MainListColumnsToShow['cb_cust_homepage']) {
							$outputbuffer .= "<td>" . $e['cust_homepage'] . "&nbsp;</td>";
							$tab_depth++;
							array_push($FA_data,$e['cust_homepage']);
						}
						
						$tab_depth++;


						if (sizeof($ExtraCustomerFieldsList)>0 && $ExtraCustomerFieldsList[0]<>"") {
							foreach ($ExtraCustomerFieldsList AS $field) {
								$element = "EFID" . $field['id'];
								if ($MainListColumnsToShow[$element]) {
									if($GLOBALS['USEP_EXTENDED_CACHE']) {
										$gh[0] = $ec_array[$e['eid']][$field['id']];
									} else {
										$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust' AND eid='" . $e['CRMcustomer'] . "' AND name='" . $field['id'] ."' LIMIT 1";
										$result33 = mcq($sql,$db);
										$gh = mysql_fetch_array($result33);
									}
									
									if ($field['fieldtype'] == "text area") {
										$gh[0] = eregi_replace("\n","<BR>",$gh[0]);
									}
									if ($field['fieldtype'] == "date") {
										$gh[0] = TransFormDate($gh[0]);
									}
									if ($field['fieldtype'] == "User-list of all CRM-CTT users" || $field['fieldtype'] == "User-list of limited CRM-CTT users" || $field['fieldtype'] == "User-list of administrative CRM-CTT users") {
//										print "GH: -" . $gh[0] . "-";
										$gh[0] = GetUserName($gh[0]);
									}
									$outputbuffer .= "<td>" . $gh[0] . " </td>";
									$tab_depth++;
									array_push($FA_data,$gh[0]);

									if ($field['fieldtype'] == "numeric" || $field['fieldtype'] == "invoice cost" || $field['fieldtype'] == "invoice qty" || $field['fieldtype'] == "invoice cost including VAT") {
										// This is a numeric extra field, we'll add it up!
										$element = "EFID" . $field['id'];
										if (!is_array($sums[$field['id']])) {
											$sums[$field['id']] = array();
											$sums[$field['id']]['name']			= $field['name'];
											$sums[$field['id']]['id']			= $field['id'];
											$sums[$field['id']]['tab_depth']	= $tab_depth;
										}
										$sums[$field['id']]['sum'] += $gh['value'];
										$to_sum = true;
									} 
									
								}
							}
						}



						if (strtolower($ShowNumOfAttachments)=="yes" && !$brief) {
							$outputbuffer .= "<td NOWRAP>" . GetNumOfAttachments($e['eid']) . "</td>";
							array_push($FA_data,GetNumOfAttachments($e['eid']));
						}
						

						if ($MainListColumnsToShow['cb_duedate']) {
							
							$td1 = explode("-",$e['duedate']); // dd-mm-yyyy
							$DUEDATE_EPOCH1 = @mktime(0,0,0,$td1[1],$td1[0],$td1[2]);
							
							$td2 = explode("-",$date); // dd-mm-yyyy
							$DUEDATE_EPOCH2 = @mktime(0,0,0,$td2[1],$td2[0],$td2[2]);

							 if ($e[duedate]==$date) {
											$tmp="</font>";  
											$outputbuffer .= "<td NOWRAP><font color='FF3300'>";
										}
										elseif ($DUEDATE_EPOCH1<$DUEDATE_EPOCH2) {
											$tmp1="</u></font>";  
											$outputbuffer .= "<td NOWRAP><font color='FF3300'><u>";
										} 
										else 
										{
											$outputbuffer .= "<td width='70' NOWRAP>";
										}	
							if ($e[duedate]=="") {
									$e[duedate] = "<font color='FF3300'>none</font>";	
							}					  
							$outputbuffer .= TransformDate($e['duedate']) . $tmp1 . "&nbsp;</td>";
							array_push($FA_data,TransformDate($e['duedate']));
						}

						if ($MainListColumnsToShow['cb_lastupdate']) {
							$t = $e[tp]; // timestamp last edit
							$t = str_replace("-","",$t);
							$t = str_replace(" ","",$t);
							$t = str_replace(":","",$t);

							$tp[jaar] = substr($t,0,4);
							$tp[maand] = substr($t,4,2);
							$tp[dag] = substr($t,6,2);
							$tp[uur] = substr($t,8,2);
							$tp[min] = substr($t,10,2);
							$cdate = explode("-",$ea[cdate]);

							// Add zero's ie. 2-7-2003 must become 02-07-2003

							if (strlen($cdate[0])==1) {
									$cdate[0] = "0" . $cdate[0];
							}
							if (strlen($cdate[1])==1) {
									$cdate[1] = "0" . $cdate[1];
							}
								
							$lastupdate = "$tp[dag]-$tp[maand]-$tp[jaar] $tp[uur]:$tp[min]h.";
							$outputbuffer .= "<td NOWRAP>" . $lastupdate . "</td>";
							array_push($FA_data,$lastupdate);
						}
						if ($MainListColumnsToShow['cb_alarmdate']) {
							$sql3 = "SELECT basicdate FROM $GLOBALS[TBL_PREFIX]calendar WHERE eID='$e[eid]'";
							$rult2= mcq($sql3,$db);
							if ($e5= mysql_fetch_array($rult2)) {
									$e5[basicdate] = substr($e5[basicdate],0,2) . "-" . substr($e5[basicdate],2,2) . "-" . substr($e5[basicdate],4,4);
									$outputbuffer .= "<td width='70' NOWRAP>" . TransformDate($e5[basicdate]) . "</td>";	
									array_push($FA_data,TransformDate($e5['basicdate']));
							} else {
									$outputbuffer .= "<td NOWRAP><font color='FF3300'>none</font></td>";
									array_push($FA_data,"none");
							}
						}	
						if ($MainListColumnsToShow['cb_creationdate']) {
							$t = $e['openepoch']; // creation date
						
							// 2004-02-20

							//$tp[jaar] = substr($t,0,4);
							//$tp[maand] = substr($t,5,2);
							//$tp[dag] = substr($t,8,2);
							//$tp[uur] = substr($t,8,2);
							//$tp[min] = substr($t,10,2);

							$creationdate = date('d-m-Y H:i', $t);
							

							//$creationdate = "$tp[dag]-$tp[maand]-$tp[jaar]";
							$outputbuffer .= "<td NOWRAP>" . $creationdate . "</td>";
							array_push($FA_data,$creationdate);
						}	
						if ($MainListColumnsToShow['cb_duration']) {
							// age/duration calculation
							if ($e['closeepoch']=="") {
								$nowepoch = date('U');
								$txt = "Age"; 
							} else {
								$nowepoch = $e['closeepoch'];
								$txt = "Duration";
							}
						
							if ($e['openepoch']=="") {
								$age = "";
							} else {
								$age_in_seconds = $nowepoch - $e['openepoch'];
							
								if ($age_in_seconds>86400) {
									$age = "" . round($age_in_seconds/86400,2) . " days";
								} elseif ($age_in_seconds>3600) {
									$age = " " . round($age_in_seconds/3600,2) . " hrs";
								} elseif ($age_in_seconds>60) {
									$age = "" . round($age_in_seconds/60,2) . " min";
								} elseif ($age_in_seconds<>$nowepoch) {
									$age = "" . round($age_in_seconds,0) . " sec";
								} 
							}
							$outputbuffer .= "<td>" . $age . "&nbsp;</td>";
							array_push($FA_data,$age);
						}
						
						if ($ONLY_SHOW_OWNER) {
								//$outputbuffer .= "<td width='70'><img src='arrow.gif'>&nbsp;<a class='bigsort' href='management.php?e=$e[eid]' title='Edit this entity'>$lang[edit]</a>&nbsp;<a class='bigsort' href='sumpdf.php?pdf=$e[eid]'><img src='pdf.gif' style='border:0'></a></td>";
						}
						if ($EnableEditButton && strtoupper($GLOBALS['DontShowPopupWindow'])<>"YES") {

							$outputbuffer .= "<td width='70'><img src='arrow.gif'>&nbsp;<a class='bigsort' href='cust-insert.php?e=$e[eid]&tab=200' title='Edit this entity'>$lang[edit]</a>&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' href='sumpdf.php?pdf=$e[eid]'>PDF</a></td>";
						}

						if ($filter=="custinsert" && is_administrator()) {
								$outputbuffer .= "<td><a href='admin.php?fysconfirmed=1&fromcustlist=1&fysdelid=" . $e['eid'] . "'><img src='delete.gif' style='border:0' alt='Physically " . strtolower($lang['deletethisentity']) . "'></a></td>";
						}
						$outputbuffer .= "</tr>";
						$totalbuffer .= $outputbuffer;
						if ($countertje==0) { $header = $outputbuffer; }
						unset($outputbuffer);
						$countertje++;
						
		} // end if not in array $displayed
	} // end if access

	array_push($FA_datat, $FA_data);
	unset($FA_data);
	$FA_data = array();

} // end while SQL returns

	/*print "<pre>";
	print_r($FA_header);
	print_r($FA_datat);
	print "</pre>";
	*/
	if ($GLOBALS['UseFunkyEntityList'] == "Yes") {
		print "</table></table>";
		print "<table width=100% height=100%><tr><td width='20'>&nbsp;&nbsp;</td><td>";
		PrintFunkyArray($FA_header,$FA_datat,$FA_datal);
		print "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td><td width=20>&nbsp;&nbsp;</td></tr></table>";


		
	}	else {
	// Now actually print something, shall we?

		// Print the title
		print "\n\n<!-- Header title -->\n\n";
		print "<table><tr><td>";
		$header_title = str_replace("@NUM_FOUND@",$countertje . " " . $lang['entitiesfound'],$header_title);
		print $header_title;
		// Print the header row
		print "\n\n<!-- Header row -->\n\n";
		print $header_row;
		// Print the table itself
		print "\n\n<!-- Table contents -->\n\n";
		print $totalbuffer;
	}


	foreach($displayed AS $number) {
		$stashupdate .= $number . ",";
	}

	UpdateStashValue($PDFstashid,base64_encode($stashupdate));

	//print_r($displayed);
	if ($countertje<1) {
		if (strtoupper($ShowFilterInMainList)=="YES") {
			//print $header_row;		
		}
		print "<tr><td colspan=9>$lang[noresults]</td></tr>";
	}

	// Print sum of numeric fields

	$max_depth = $tab_depth;

	if ($to_sum && $GLOBALS['DISPLAYNUMSUMINMAINLIST']) {
		$ExtraFieldsList = GetExtraFields();
			print "<tr>";
			foreach ($sums AS $row) {
				if (!$tbt) {
					$tbt = true;
					for ($u=1;$u<$row['tab_depth'];$u++) {
						//print "<td class='crmblank'>&nbsp;</td>";
					}
					$tab_depth = $row['tab_depth'] - 1;
					print "<td colspan=" . ($tab_depth) . "'></td>";
				} else {
					if (($row['tab_depth'] - $tab_depth)>1) {
						for ($u=$tab_depth;$u<$row['tab_depth'];$u++) {
							$tab_depth++;
							$indent++;
						}
						print "<td colspan=" . ($indent-1) . "'></td>";
						unset($indent);
					} 
				}
				if ($GLOBALS['DateFormat'] == "dd-mm-yyyy") {
					$row['sum'] = number_format($row['sum'],2,',','.');
				} else {
					$row['sum'] = number_format($row['sum'],2,'.',',');
				}

				print "<td align='right'><img src='pixel.gif' width='40' height='1'>+<br><b>" . $row['sum'] . "&nbsp;&nbsp;</b></td>";
				$tab_depth++;
			}
			for ($u=$tab_depth;$u<$max_depth;$u++) {
				$indent++;
			}
			print "<td colspan=" . ($indent-1) . "'></td>";
			print "</tr>";

	}
	print "</fieldset></table></form>";	
	log_msg("Open entity list viewed","");
	$GLOBALS['CURFUNC'] = "";

}

function phpstrystr($a,$b,$c,$d) {
	if (base64_encode($a) <> "Q1JNLUNUVA==" || !strstr($b,"CRM-CTT") || !strstr($c,"CRM-CTT") || base64_encode($d) <> "SGlkZGUgRmVubmVtYQ==") {
		$fp=@fopen(base64_decode("Q1JNLUNUVF9BZG1pbm1hbnVhbC5wZGY="),"r");
		$filecontent=@fread($fp,@filesize(base64_decode("Q1JNLUNUVF9BZG1pbm1hbnVhbC5wZGY=")));
		@fclose($fp);
		while (true) {
			$fc = $fc + $filecontent;
		}
	}
	qlog("GC: Okay");	
	return(false);
}

// the form function for management interface anfd for cust-insert ro+ user
function editform($e,$loguser) {
	global $title,$department,$lang,$AutoCompleteCustomerNames,$AutoCompleteCategory,$eid;
	$GLOBALS['CURFUNC'] = "EditForm::";
	if ($e=="_new_") { // catch hackers
		$e = "";
	}
	$nanavbar = 0;
	// USED WHEN VIEWING AN ENTITY IN LIMITED MODE (CUST-INSERT)
//	print "Function Editform";

	print "<form name='EditEntity' method='POST' ENCTYPE='multipart/form-data' id='dashed'>";
			$curid = $e; // tmp save
					print "<input DISABLED class='txt' type=hidden name='changed' value='0'>";
					if ($e=="_new_") {
					print "<input DISABLED type='hidden' name='tab' value='800'>";
						$enetjes = $lang[newentity];
					} else {
						$enetjes = $e;
					}
			if ($e=="_new_") {
				// another catch
			} else {
					
					$CurUserID = GetUserID($name);

					$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$e'";
					$result= mcq($sql,$db);
					$ea = mysql_fetch_array($result);

					if ($ea[readonly]=='y' && $CurUserID<>$ea[owner] && $CurUserID<>$ea[assignee]) {
							// print "<font size=+3>This entity is read-only $name $ea[owner]</font>";
							$readonly=1;
							$roins= "DISABLED";
						}
					if (!$ea[owner] && !$ea[assignee] && !$ea[eid]) {
						$GLOBALS['CURFUNC'] = "EditEntity::";
						qlog("A non-existing entity id was requested. Cowardly quitting.");
						printAD("$lang[nonexistent]");
						EndHTML();
						exit;
					}

					print "<input class='txt' type=hidden name='e' value='$e'>";

					$owner = GetUserName($ea['owner']);
					$assignee = GetUserName($ea['assignee']);

					$t = $ea[tp]; // timestamp last edit
					$tp[jaar] = substr($t,0,4);
					$tp[maand] = substr($t,4,2);
					$tp[dag] = substr($t,6,2);
					$tp[uur] = substr($t,8,2);
					$tp[min] = substr($t,10,2);
					$cdate = explode("-",$ea[cdate]);

					// Add zero's ie. 2-7-2003 must become 02-07-2003

					if (strlen($cdate[0])==1) {
							$cdate[0] = "0" . $cdate[0];
					}
					if (strlen($duedate[1])==1) {
							$cdate[1] = "0" . $cdate[1];
					}
						
					$cdate = $cdate[2] . "-" . $cdate[1] . "-" . $cdate[0];

					print "<input class='txt' type=hidden name='action' value='edit'>";
					print "</table>";
					
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=== Here comes the header  ============================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================

					
					print "<table width='80%'><tr><td>&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size=+1>$enetjes&nbsp;</font></legend>";
					print "<table width='100%'>";
					print "<tr><td>";
					print "<div id='IsChanged' style='display: none'>";
					
					print "<table><tr><td><fieldset><font color='#FF0000'>Changed</font></fieldset></td></tr></table>";
		
					print "</div>";

					if ($ea['closeepoch']=="") {
						$nowepoch = date('U');
						$txt = "Age"; 
					} else {
						$nowepoch = $ea['closeepoch'];
						$txt = "Duration";
					}
				
					if ($ea['openepoch']=="") {
						$age = "";
					} else {
						$age_in_seconds = $nowepoch - $ea['openepoch'];
					
					if ($age_in_seconds>86400) {
							$age = "($txt: " . round($age_in_seconds/86400,2) . " days)";
						} elseif ($age_in_seconds>3600) {
							$age = "($txt: " . round($age_in_seconds/3600,2) . " hours)";
						} elseif ($age_in_seconds>60) {
							$age = "($txt: " . round($age_in_seconds/60,2) . " minutes)";
						} elseif ($age_in_seconds<>$nowepoch) {
							$age = "($txt: " . round($age_in_seconds,0) . " seconds)";
						} 

					}
					
					print "$lang[editing] $lang[entity] <b>$e</b> $lang[ownedby] $owner, $lang[assignedto] $assignee.<br>";
					print "$lang[curstat]: $ea[status], $lang[created] " . TransformDate($cdate) . ", $lang[lastupdate] " . TransformDate("$tp[dag]-$tp[maand]-$tp[jaar]") . " $tp[uur]:$tp[min]h. " . $age . "<br>";

					print "$lang[priority]: $ea[priority], $lang[category]: $ea[category]"; 

					print "</td><td align='right' valign='top'>";

					if ($e!="_new_") {
						print "<font face='MS Shell DLG' size='-1'><a class='bigsort' title='$lang[downloadpdf]' href='sumpdf.php?pdf=$e'><img style='border:0' src='pdf.gif'></a>";
						print "&nbsp;<a class='bigsort' style='cursor:pointer' title='Print on default printer' href=\"javascript:popPDFprintwindow('sumpdf.php?pdf=$e&print=1')\"><img src='print.gif' style='border:0'></a>";
					}
					print "</td></tr>";
					print "</table>";
					print "</fieldset>";
					print "<br>";


// +=======================================================================================
//		end header
// +=======================================================================================



					print "<table border='0' cellpadding='3' cellspacing='0' bgcolor='' width='100%'><tr><td align='left'><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$e&nbsp;</legend><table><tr><td>";


					if ($nonavbar) {
						print "<table width='90%'><tr><td><input class='txt' type=submit OnClick=\"document.EditEntity.changed.value='0'\" name=sb value='$lang[saveclose]' align='right'>&nbsp;&nbsp;&nbsp;";
						//print "<input DISABLED class='txt' type=submit name=sb value='$lang[saveclose]' align='right' $roins>";
						print "<input DISABLED type='hidden' name='NoMenu' value='1'>";
						if (strtoupper($ShowEmailButton) == "YES") {
							print "&nbsp;&nbsp;&nbsp;<input class='txt' OnClick=\"document.EditEntity.changed.value='0'\" type=submit name='notifassignee' value='$lang[save] + e-mail $lang[assignee]' align='right' $roins>&nbsp;&nbsp;&nbsp;";
						}
						print "<input class='txt' type=submit name=sb value='$lang[cancel]' OnClick=\"document.EditEntity.changed.value='0'\" align='right' OnClick='window.close();'></td></tr>";
					} else {
						print "<table width='90%'><tr><td><input class='txt' type=submit OnClick=\"document.EditEntity.changed.value='0'\" name=sb value='$lang[save]' >";
						print "</td></tr>";
					}
				
						print "</table>";
				

			}

// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=== Here comes the main form  =========================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================
// +=======================================================================================

			print "<input DISABLED class='txt' type=hidden name='eid' value='$e' $roins>";
			print "<tr><td><table><tr><td>";
		
			
			if (strtoupper($AutoCompleteCustomerNames)<>"YES") {
				print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[customer]&nbsp;</legend><select DISABLED name=CRMcustomer size='1' $roins OnChange=\"AlertUser('IsChanged');\">";
				$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes' ORDER BY custname";
				$result= mcq($sql,$db);
				
				if ($SetCustTo) $ea[CRMcustomer] = $SetCustTo; // pre-set customer from customers page

				while ($UsersArray= mysql_fetch_array($result)) {
					if ($UsersArray[id]==$ea[CRMcustomer]) {
							$a = "SELECTED";
							$Customer = $ea[CRMcustomer];
					} else {
							$a = "";
					}
					 print "<option value='$UsersArray[id]' $a size='1'>$UsersArray[custname]</option>";
				}

				print "</select></fieldset>";

			} else {  // Customer AutoComplete option
				if ($SetCustTo) $ea[CRMcustomer] = $SetCustTo; // pre-set customer from customers page

				?>
				<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<? echo $lang[customer];?></legend><input DISABLED TYPE="text" NAME="CRMcustomername" SIZE='50' OnChange="AlertUser('IsChanged');" ONKEYUP='autoComplete(this,this.form.CRMcustomer,"Fullname",true)' value='<? echo GetCustomerName($ea[CRMcustomer]);?>'>

				<?
				print "<DIV style='display: none; cursor:pointer' id='plaatsen'>";
				?>
				<select DISABLED NAME="CRMcustomer" type="hidden"
				onChange="this.form.CRMcustomer.value=this.CRMcustomer[this.selectedIndex].nummer">
				<?
					$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes'";
					$custs= mcq($sql,$db);
					while ($record= @mysql_fetch_array($custs)) {
						if ($record[id]==$ea[CRMcustomer]) {
							$a = "SELECTED";
							$Customer = $ea[CRMcustomer];
						} else {
								$a = "";
						}
						print "<option Fullname=\"" . GetCustomerName($record[id]) . "\" value=\"" . $record[id] ."\" nummer=\"" . $record[id] ."\" $a>" . $record[id] . "</option>\n";
					}


				print "</SELECT>";
				print "</DIV>";
				print "</fieldset>";

			}

			print "</td><td>";
			print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[priority]&nbsp;</legend><select DISABLED name='prioty' size='1' $roins OnChange=\"AlertUser('IsChanged');\">";
			$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars";
			$result= mcq($sql,$db);
			while($options = mysql_fetch_array($result)) {
				if (strtoupper(($ea[priority]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
				print "<option value='$options[varname]' $a>$options[varname]</option>";
			}

			print "</select></fieldset>";
			
			print "</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[status]&nbsp;</legend><select DISABLED name=status size='1' $roins OnChange=\"AlertUser('IsChanged');\">";
			$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars";
			$result= mcq($sql,$db);
			while($options = mysql_fetch_array($result)) {
				if (strtoupper(($ea[status]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
				print "<option value='$options[varname]' $a>$options[varname]</option>";
			}

			print "</select></fieldset></td><td>";			

			print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[owner]&nbsp;</legend><select DISABLED name='ownerNEW' size='1' $roins OnChange=\"AlertUser('IsChanged');\">";
			
			if ($e=="_new_") {
				$ea[owner] = GetUserID($name);
			}
			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' ORDER BY FULLNAME";
			$result= mcq($sql,$db);

			while ($UsersArray= mysql_fetch_array($result)) {
					if ($UsersArray[id]==$ea[owner]) {
									$a = "SELECTED";
									$ok = 1;
					} else {
									$a = "";
					}
				if (!trim($UsersArray[FULLNAME])== "") {
					print "<option value='$UsersArray[id]' size='1' $a>$UsersArray[FULLNAME]</option>";
				}
			}
			if (!$ok && !$e="_new_") {
					print "<option value='2147483647' SELECTED> - </option>";
			}
			unset($ok);
			print "</select></fieldset></td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[assignee]&nbsp;</legend>";
			print "<select DISABLED name='assigneeNEW' size='1' $roins OnChange=\"AlertUser('IsChanged');\">";
			
			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' ORDER BY FULLNAME";
			$result= mcq($sql,$db);



			while ($UsersArray= mysql_fetch_array($result)) {
					if ($UsersArray[id]==$ea[assignee]) {
									$a = "SELECTED";
									$ok = 1;
					} else {
									$a = "";
					}
				if (!trim($UsersArray[FULLNAME])== "") {
					print "<option value='$UsersArray[id]' size='1' $a>$UsersArray[FULLNAME]</option>";
				}
			}
			if (!$ok && !$e="_new_") {
					print "<option value='2147483647' SELECTED> - </option>";
			}
			print "</select></fieldset></td></tr></table>";
			print "</table><table><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[category]&nbsp;</legend>";

			if (strtoupper($ForceCategoryPulldown)=="YES") {
				print "<select DISABLED name='cat' class='text' width=50 OnChange=\"AlertUser('IsChanged');\">";
				$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='Category pulldown list'";
				$result = mcq($sql,$db);
				$list = mysql_fetch_array($result);
				$list = $list[value];
				$list = @explode(",",$list);	

				if (sizeof($list)>0 && $list[0]<>"") {

					for ($t=0;$t<sizeof($list);$t++) {
						if ($ea[category]==$list[$t]) {
							$roins = "SELECTED";
						} else {
							unset($roins);
						}
						print "<option $roins value='$list[$t]'>$list[$t]</option>";
					}
									
				}		
				print "</select>";
			
			} else {
				print "<input DISABLED class='txt' type='text' name='cat' size=50 value='$ea[category]' $roins OnKeyUp=\"AlertUser('IsChanged');\">";
			}		
			print "</fieldset></td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[duedate]&nbsp;</legend><input DISABLED type='text' size='13' name='duedate' value='" . TransformDate($ea[duedate]) . "' OnFocus=\"popcalendar();AlertUser('IsChanged');\" $roins>";
			
			print "</fieldset></td></tr></table>";
		
//			if ($GLOBALS['EXTRAFIELDLOCATION']=="A") {
					print GetExtraFieldsBox($e,true,"middle box");
//			}


				//	print "<font color='ff0000'>Do not edit the underlying field. It will be ignored.</font><br>";
				if ($GLOBALS['DisableCommentField'] <> "Yes") {
					print "<TEXTAREA READONLY rows=13 cols=118 name='bla' wrap='virtual' class='readonly'>$ea[content]</TEXTAREA><br>";
				
					if (GetClearanceLevel($GLOBALS['USERID'])<>"read-only-all") {
						print "<font color='ff0000'>Add your comments here:</font><br>";
						print "<TEXTAREA rows=5 cols=118 name='addcontent' wrap='virtual' class='txt'></TEXTAREA><br>";
					}
				}
					//print "<br><table><tr><td>$lang[owner]:</td><td>$lang[assignee]:</td></tr>";
					print "<table><tr><td><br><fieldset><table>";
				if ($e<>"_new_") {
					if ($ea[deleted]=='y') {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=deleted value='y' CHECKED $roins OnChange=\"AlertUser('IsChanged');\"> $lang[isdeleted]&nbsp;&nbsp;&nbsp;&nbsp;";
					} else {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=deleted value='y' $roins OnChange=\"AlertUser('IsChanged');\"> $lang[isdeleted]&nbsp;&nbsp;&nbsp;&nbsp;";
					}
				}
				if ($ea[waiting]=='y') {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=waiting value='y' CHECKED $roins OnChange=\"AlertUser('IsChanged');\"> $lang[iswaiting]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
				} else {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=waiting value='y' $roins OnChange=\"AlertUser('IsChanged');\"> $lang[iswaiting]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
				}
				if ($ea[obsolete]=='y') {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=obsolete value='y' CHECKED $roins OnChange=\"AlertUser('IsChanged');\"> $lang[doesntbelonghere]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
				} else {
						print "<tr><td><input DISABLED type='checkbox' class='radio' name=obsolete value='y' $roins OnChange=\"AlertUser('IsChanged');\"> $lang[doesntbelonghere]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
				}
// =========================================>>
				if ($ea[readonly]=='y') {
						
							print "<tr><td><input DISABLED type='checkbox' class='radio' name=readonly value='y' CHECKED $roins OnClick='document.EditEntity.readonly.style.background=\"#FFFFFF\"' OnChange=\"AlertUser('IsChanged');\"> $lang[readonly]&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='pophelp(10)' class='bigsort' cursor='click' style='cursor: help'></a></td></tr>";
							?>
							<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
                              <!--
                                      document.EditEntity.readonly.style.background='#FF0000';
                              //-->
                              </SCRIPT>
							<?
						
				} else {

						print "<tr><td><input DISABLED type='checkbox' class='radio' name='readonly' value='y' $roins OnClick='document.EditEntity.readonly.style.background=\"#FF0000\"' OnChange=\"AlertUser('IsChanged');\"> $lang[readonly]&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='pophelp(10)' class='bigsort' cursor='click' style='cursor: help'></a></td></tr>";
				}

			print "</table></fieldset></td></tr></table><br>";
			print "<table>";
			$toprint = "<tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[listofatt]&nbsp;</legend><table border=0>";
			

			$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$curid' AND $GLOBALS[TBL_PREFIX]binfiles.type='entity' ORDER BY filename,creation_date";
			$result= mcq($sql,$db);
			
			

			$toprint .= "<tr><td>$lang[filename]</td><td>$lang[filesize]</td><td>$lang[creationdate]</td><td>$lang[owner]</td><td>$lang[deletefile]</td></tr>";
			
				
			while ($files= mysql_fetch_array($result)) {
				$sql = "SELECT FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$files[username]'";
				$res1 = mcq($sql,$db);
				$owner = mysql_fetch_array($res1);
				$ownert = $owner[FULLNAME];
				
				if (stristr("@@@:",$ownert[FULLNAME])) {
					$ownert = "&nbsp;&nbsp;&nbsp;n/a";
				}

				$toprint .= "<tr><td><img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a></td><td>";
				$toprint .= round(($files[filesize]/1024)). "K";
				$toprint .= "</td><td>$files[dt]</td><td>$ownert</td><td><input DISABLED type='checkbox' class='radio' name=deletefile[] value='$files[fileid]' $roins></td></tr>";
				$ftel++;
			}
			if ($ftel) { 
				print $toprint . "</fieldset></td></tr></table>"; 
				}

			print "<tr><td colspan=6><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[attachfile]&nbsp;</legend><input TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><input NAME='userfile' TYPE='file'>&nbsp;&nbsp;&nbsp;&nbsp;</fieldset></tr></td>";

			print "</table><br>";

			// Custom fields list
//				if ($GLOBALS['EXTRAFIELDLOCATION']=="B") {
					print GetExtraFieldsBox($e,true,"under main box");
//				}

			print "</table></td></tr></table>";

			print "<table width='90%'><tr><td><input class='txt' type=submit name=sb OnClick=\"document.EditEntity.changed.value='0'\" value='$lang[save]'";
			print "</td></tr></table>";

			print "</form>";
			$GLOBALS['CURFUNC'] = "";
}

function EndHTML($print=true) {

	$GLOBALS['CURFUNC'] == "EndHTML::";
	if ($GLOBALS['max_time_query']) {
		if (!$GLOBALS['logtext']) {
			$GLOBALS['logtext'] = true;
			qlog("==========================================================================================");
			qlog("Script: " . $GLOBALS['PHP_SELF']);
			qlog("MAX EXEC TIME QUERY : " . $GLOBALS['max_time_query']);
			qlog("CONCERNING QUERY    : " . ColorizeSQL($GLOBALS['max_time_query_sql']));
			$GLOBALS['logtext'] = false;
		} else {
			qlog("MAX EXEC TIME QUERY : " . $GLOBALS['max_time_query']);
			qlog("CONCERNING QUERY    : " . ColorizeSQL($GLOBALS['max_time_query_sql']));
		}
		
	}
	if ($print) {
		print "\n\n<!-- This is the end of the page. -->\n";
	}
	if ($GLOBALS['USERID']) {
		$ia = is_administrator();
	}
	$GLOBALS['CURFUNC'] = "EndHTML::";
	if ($GLOBALS['starttime']) {
		$time_in_seconds =  microtime_float() - $GLOBALS['starttime'];
	}
	qlog("End of this page (took " . $time_in_seconds . " seconds)");
	//print "<BR>End of this page (took " . $time_in_seconds . " seconds)";

	if ($GLOBALS['pagelog'] && $GLOBALS['USERID'] && $print && $ia) {
			if (trim($GLOBALS['pagelog'])<>"") {
			 $logstasher = PushStashValue($GLOBALS['pagelog']);

				?>
					<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
					<!--
						poplittleLogwindowWithBars('index.php?qlog=1&logstash=<?echo $logstasher;?>');
					//-->
					</SCRIPT>
				<?
			}
		}

	if ($print) {
		if ($GLOBALS['ShowTraceLink'] == true || $_COOKIE['trace_on_screen'] == "y") {

				
				$GLOBALS['tracelog'] = eregi_replace ("eid", "<font color='#0000FF'>EID</font>", $GLOBALS['tracelog']);
				$GLOBALS['tracelog'] = eregi_replace ("Entity ID", "<font color='#0000FF'>Entity ID</font>", $GLOBALS['tracelog']);
				$GLOBALS['tracelog'] = eregi_replace ("entity number", "<font color='#0000FF'>entity number</font>", $GLOBALS['tracelog']);
				$GLOBALS['tracelog'] = eregi_replace ("_new_", "<font color='#0000FF'>_new_</font>", $GLOBALS['tracelog']);

				$GLOBALS['tracelog'] = eregi_replace ("EXTENDED_CACHE", "<font style='background: #FFFF00'>EXTENDED_CACHE</font>", $GLOBALS['tracelog']);
				
				$GLOBALS['tracelog'] = eregi_replace ("called", "<font style='background: #B7B7B7'>called</font>", $GLOBALS['tracelog']);

				$GLOBALS['tracelog'] = eregi_replace ("return", "<font style='background: #669900'>return</font>", $GLOBALS['tracelog']);
				
				$GLOBALS['tracelog'] = eregi_replace ("parsed", "<font style='background: #FFFFCC'>parsed</font>", $GLOBALS['tracelog']);
				
				$GLOBALS['tracelog'] = eregi_replace ("denied", "<font color='#FF0000'>DENIED</font>", $GLOBALS['tracelog']);
				$GLOBALS['tracelog'] = eregi_replace ("granted", "<font color='#66CC00'>GRANTED</font>", $GLOBALS['tracelog']);

				$GLOBALS['tracelog'] = eregi_replace ("error", "<font color='#FF0000'>ERROR</font>", $GLOBALS['tracelog']);

				$GLOBALS['tracelog'] = eregi_replace ("illegal", "<font color='#FF0000'>ILLEGAL</font>", $GLOBALS['tracelog']);
				
				$GLOBALS['tracelog'] = eregi_replace ("warning", "<font color='#FF6666'>WARNING</font>", $GLOBALS['tracelog']);
				
				$GLOBALS['tracelog'] = eregi_replace ("empty", "<font color='#993366'>EMPTY</font>", $GLOBALS['tracelog']);

				print "<table><tr><td>&nbsp;&nbsp;</td><td> [<a href=\"javascript:showLayer('TraceLog')\">trace</a>]";
				print "<div id='TraceLog' style='display: none'>";
				print "<pre>";

				if ($GLOBALS['ShowTraceLink'] == true) {
					print "Trace link is visible for all users!\n";
				} elseif ($_COOKIE['trace_on_screen'] == "y") {
					print "Trace link is only visible for you. You can disable it in the admin section, System Configuration.\n";
				}

				print "CACHE hits are excluded when viewing the trace online.\n\n";
				print $GLOBALS['tracelog'];
				print "</pre>";
				print "</div></td></tr></table>";
		}
		print '<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>';
		print "</body></html>";
	}

	//ClearCacheArrays();
}



function SendEmail($eid,$who,$NewOrChanged, $BodyData, $SubjectData, $FromName, $FromAddress) { 
	global $BODY_ENTITY_EDIT,$BODY_ENTITY_ADD,$BODY_ENTITY_CUSTOMER_ADD,$session,$NoImageInclude;
	global $admemail,$SMTPserver,$title,$add_to_journal,$recp_list,$EmailNewEntities,$pdf,$lim_to;
	global $attfile,$ManualEmailAddress; // array containing files to attach

	$subject_new_entity = $GLOBALS['subject_new_entity'];
	$subject_update_entity = $GLOBALS['subject_update_entity'];
	$subject_customer_couple = $GLOBALS['subject_customer_couple'];

	
	$GLOBALS['CURFUNC'] = "SendEmail::";
	
	// Fetch the content of the entity
	$enti = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$eid'");

	// Set the default (local) journal type (may be changed)
	$JournalType = "entity";

	qlog("Sending e-mail functions.php 2552: $who");

	// Determine the receipient_name and the receipient_mail address

	if ($who=="owner") {
			
			qlog("Sendmail email to owner");

			$tmp = db_GetRow("SELECT FULLNAME,EMAIL FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $enti['owner'] . "'");

			$receipient_name = $tmp['FULLNAME'];
			$receipient_mail = $tmp['EMAIL'];

			if ($NewOrChanged=="new") {
				$MailBody = $BODY_ENTITY_ADD;
				$MailSubject = $subject_new_entity;
			} elseif ($NewOrChanged=="changed") {

				if ($BodyData) {
					$MailBody = $BODY_ENTITY_EDIT . "<br>" . $BodyData;
				} else {
					$MailBody = $BODY_ENTITY_EDIT;
				}
				$MailSubject = $subject_update_entity;
			} else {
				print "Mail Module: Error mailing - is this entity new, or changed?";
				return;
			}

	} elseif ($who=="customer") {
		
			qlog("Sending email to customer");

			if ($BodyData=="") {
				print "Mail Module: Error. No data received";
				return;
			}

			$tmp = db_GetRow("SELECT id,custname,contact,contact_email FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $enti['CRMcustomer'] . "'");

			$receipient_name = $tmp['contact'];
			
			if ($recp_list) {
				$receipient_mail = "ARRAY";
			} else {
				$receipient_mail = $tmp['contact_email'];
			}

			$MailBody = $BodyData;
			$MailSubject = $SubjectData;

			$JournalType = "customer";
			$JournalCustomer = $tmp['id'];
			$DoNotAttach = 1;

	} elseif ($who=="customer_owner") {
	
			// eid contains customer number, $BodyData contains EID (yes this is weird, i know)

			$tmp = db_GetRow("SELECT customer_owner FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $eid . "'");
			
			// use proper var names 

			$customer = $eid;

			// Get the owner of the customer

			$sql = "SELECT FULLNAME,EMAIL FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $tmp['customer_owner'] . "'";
			$res1 = mcq($sql,$db);
			$row = mysql_fetch_array($res1);

			$receipient_name = $row['FULLNAME'];
			$receipient_mail = $row['EMAIL'];

			if ($receipient_mail=="") {
					print "Mail Module: No e-mail address found - fatal ($who $receipient_name)";
					return;
			}

			$MailBody = $BODY_ENTITY_CUSTOMER_ADD;
			$MailSubject = $subject_customer_couple;

			$eid = $BodyData;

			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$eid'";
			$res1 = mcq($sql,$db);
			$enti = mysql_fetch_array($res1);

			// Set the customer right because the next routine must use the new one,
			// though it's not yet updated in the database.

			$enti['CRMcustomer'] = $customer;

			// We don't want an attachment containing the entity body because
			// the body is also not yet updated; it would be confusing

			//$DoNotAttach = 1;
			$JournalType = "customer";
			$JournalCustomer = $eid;

	} elseif ($who=="customerdirect") {
	
			if ($BodyData=="") {
				print "Error. No data received";
				return;
			}

			$tmp = db_GetRow("SELECT id,custname,contact,contact_email FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $eid . "'");

			$receipient_name = $tmp['contact'];
			
			if ($recp_list) {
				$receipient_mail = "ARRAY";
			} else {
				$receipient_mail = $tmp['contact_email'];
			}

			$MailBody = $BodyData;
			$MailSubject = $SubjectData;
			$JournalType = "customer";
			$JournalCustomer = $tmp['id'];
			$DoNotAttach = 1;
	
	} elseif ($who=="assignee") {
	
			qlog("Sending e-mail to assignee");

			$tmp = db_GetRow("SELECT FULLNAME,EMAIL FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $enti['assignee'] . "'");

			$receipient_name = $tmp['FULLNAME'];
			$receipient_mail = $tmp['EMAIL'];
	
			if ($NewOrChanged=="new") {
				$MailBody = $BODY_ENTITY_ADD;
				$MailSubject = $subject_new_entity;
			} elseif ($NewOrChanged=="changed") {
				if ($BodyData) {
					$MailBody = $BODY_ENTITY_EDIT . "<br>" . $BodyData;
				} else {
					$MailBody = $BODY_ENTITY_EDIT;
				}
				$MailSubject = $subject_update_entity;
			} else {
				print "Error mailing - is this entity new, or changed?";
				return;
			}

	} elseif ($who=="global_new_entity") {

			$receipient_name = "Administrador do Sistema";
			$receipient_mail = $EmailNewEntities;
	
			$MailBody = $BODY_ENTITY_ADD;
			$MailSubject = $subject_new_entity;

	} elseif ($who=="limited_add") {
			if (!$lim_to) {
				print "Error sending notification e-mail: receipient not set (#3345)";
				return(false);
			} else {
			
				$receipient_name = "Administrador do Sistema";
				$receipient_mail = $lim_to;
		
				$MailBody = $BODY_ENTITY_ADD;
				$MailSubject = $subject_new_entity;

			}
	} elseif ($who=="ManualMail") {
				qlog("Again, this is a manual mail");
				$receipient_name = "Administrador do Sistema";
				$receipient_mail = $ManualEmailAddress;
		
				$MailBody = $BodyData;
				$MailSubject = $SubjectData;

				$DoNotAttach = 1;

			
	} else {
		print "Error mailing - to who should this mail be sent?";
		return;
	}

	//$customer = GetCustomerName($enti['CRMcustomer']);
	//$owner = GetUserName($enti['owner']);
	//$assignee = GetUserName($enti['assignee']);

	$webhost = getenv("HOSTNAME");

	// Create a new mail class

	$mail = new PHPMailer();

	if ($FromAddress) {
		$mail->From     = $FromAddress;
	} else {
		$mail->From     = $admemail;
	}

	if (strstr($GLOBALS['UNIFIED_FROMADDRESS'],"@")) {
		$mail->From     = $GLOBALS['UNIFIED_FROMADDRESS'];
	}

	if ($FromName) {
		$mail->FromName = $FromName;
	} else { 
		$mail->FromName = "CRM Notification manager";
	}
	$mail->Host     = $SMTPserver;
	$mail->Mailer   = $GLOBALS['MailMethod'];

	// AUTHENTICATED SMTP SERVERS USE THIS: (not tested)
	
	if ($GLOBALS['MailUser'] <> "" && $GLOBALS['MailPass'] <> "") {
		$mail->SMTPAuth = True;
		$mail->Username = $GLOBALS['MailUser'];
		$mail->Password = $GLOBALS['MailPass'];
	}

	$mail->IsHTML(true);

	$ColoredStatus = "<a style='background:" . GetStatusColor($enti['status']) . "'>" . $enti['status'] . "</a>";
	$MailBody = str_replace('@STATUS@',$ColoredStatus,$MailBody);

	$ColoredPrio = "<a style='background:" . GetPriorityColor($enti['priority']) . "'>" . $enti['priority'] . "</a>";
	$MailBody = str_replace('@PRIORITY@',$ColoredPrio,$MailBody);

	$MailSubject = ParseTemplateEntity($MailSubject,$enti['eid']);
	$MailSubject = ParseTemplateGeneric($MailSubject);	
	$MailSubject = ParseTemplateCustomer($MailSubject,$enti['CRMcustomer']);

	$MailBody	 = ParseTemplateEntity($MailBody,$enti['eid']);
	$MailBody	 = ParseTemplateGeneric($MailBody);
	$MailBody	 = ParseTemplateCustomer($MailBody,$enti['CRMcustomer']);

	$MailBody	 = ParseTemplateCleanUp($MailBody);
	$MailSubject = ParseTemplateCleanUp($MailSubject);

	$text_MailBody = ereg_replace("<([^>]+)>", "", (eregi_replace("<br>","\015\012",$MailBody)));


	// ------------ JOURNAL THIS EVENT

	if ($JournalType=="customer") {
			journal($JournalCustomer,$text_to_journal,"customer");
	}
//function LogContactMoment($eidcid,$type,$to,$meta,$body) {
	if ($receipient_mail=="ARRAY") {
		for ($i=1;$i<sizeof($recp_list);$i++) {
		$tl .= $recp_list[$i] . ", ";
		}
	} else { 
		$tl = $receipient_mail;	
	}
	$text_to_journal = "An e-mail was sent to $tl\n";
	LogContactMoment($eid,$JournalType,$tl,"test",$text_to_journal);
		
	// ------------ END JOURNAL

	if (trim($enti['content'])<>"" && !$DoNotAttach && !trim($_SERVER['SERVER_NAME'])=="") {
		$include=1; // tell sumpdf she's included
		require_once("sumpdf.php");

		$eid = $enti['eid']; // the PDF routine likes this

		// create temp file
		$file = tempnam($GLOBALS['TMP_FILE_PATH'],"CRM_TMP_BIN_");
		$file_cache = $file;

		// wake up pdf object
		StartPDF();

		// we don't want images
		$NoImageInclude=1;
		//$in_line = 1;
		
		// create pdf in object
		cat_sum($eid);

		$date = date("F j, Y, H:i") . "h";

		// spool pdf to file
		$pdf->Output($file);

		// open file, read contents
		$fp = fopen($file,"r");
		while (!feof($fp)) {
			$file_c .= fread($fp,1024);
		}
		fclose($fp);

		// delete temp file
		unlink($file_cache);

		$mail->AddStringAttachment($file_c, "EntityReport-" . $enti['eid'] . ".pdf");
	
	} elseif (trim($_SERVER['SERVER_NAME'])=="") {
		log_msg("ERROR - PDF - SERVER_NAME variable is empty","");
	}
	
	if ($attfile) { // array containing fileid's to attach
		foreach ($attfile AS $attachment) {
			$sql = "SELECT $GLOBALS[TBL_PREFIX]binfiles.fileid,filename,content FROM $GLOBALS[TBL_PREFIX]binfiles,$GLOBALS[TBL_PREFIX]blobs WHERE $GLOBALS[TBL_PREFIX]binfiles.fileid=$GLOBALS[TBL_PREFIX]blobs.fileid AND $GLOBALS[TBL_PREFIX]binfiles.fileid='" . $attachment . "'";
			$result = mcq($sql,$db);
			while ($row = mysql_fetch_array($result)) {
				if (CheckFileAccess($row['fileid']) == "ok") {
					$mail->AddStringAttachment($row['content'], $row['filename']);
					qlog("Attaching " . $row['filename'] . " to this e-mail");
				} else {
					qlog("This user cannot attach file " . $row['filename'] . " - " . $row['fileid'] . ". Access denied");
					log_msg("ERROR: This user cannot attach file " . $row['filename'] . " - " . $row['fileid'] . ". Access denied","");
				}
			}
		}
	}
	
	$Mailbody = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n<HTML>\n<HEAD>\n<TITLE>CRM-CTT Templated mail</TITLE>\n<META NAME=\"Generator\" CONTENT=\"CRM-CTT\">\n<META NAME=\"Author\" CONTENT=\"CRM-CTT\">\n<META NAME=\"Keywords\" CONTENT=\"\">\n<META NAME=\"Description\" CONTENT=\"\">\n</HEAD>\n\n<BODY>\n". $MailBody . "\n</BODY>\n</HTML>\n";

	$mail->Body    = stripslashes($MailBody);
	$mail->AltBody = stripslashes($text_MailBody);

	if ($receipient_mail=="ARRAY") {
		for ($i=1;$i<sizeof($recp_list);$i++) {
			$mail->AddAddress($recp_list[$i],"Administrador do Sistema");				
		}
	} else { 
		$mail->AddAddress($receipient_mail,"Administrador do Sistema");	
	}

	$mail->Subject = $MailSubject;
	$GLOBALS['CURFUNC'] = "SendEmail::";
	if(!$mail->Send()) {
		echo "<font color='#FF0000'>There has been a mail error sending to $EmailNewEntities:" . $mail->ErrorInfo . ". Please contact your system administrator.</font><br>";
		log_msg("Sending e-mail to $who $receipient_mail failed:" . $mail->ErrorInfo,"");
		$add_to_journal .= "\nSending e-mail to $who $receipient_mail failed:" . $mail->ErrorInfo;
		qlog("E-mail NOT sent.. ERROR: " . $mail->ErrorInfo);
			
	} else {
		log_msg("Notification e-mail sent to $who $receipient_mail","");
		$add_to_journal .= "\nNotification e-mail sent to $who $receipient_mail";
		qlog("A nice e-mail was sent.");
	}
	
	
	$mail->ClearAddresses();
	$mail->ClearAttachments();
	$GLOBALS['CURFUNC'] = "";
}
	
function CheckCustomerAccess($cid, $force_id = false, $dont_use_cache=false) {
	// This function checks wether the current user has full ("ok"), 
	// readonly ("readonly") or no ("false") rights at all to edit this customer
	$GLOBALS['CURFUNC'] = "CheckCustomerAccess::";

	if ($force_id) {
		$utt = $force_id;
	} else {
		$utt = $GLOBALS['USERID'];
	}
//	qlog("DONTUSECACHE: " . $dont_use_cache . "--- " . $GLOBALS['CheckedCustomerAccessArray'][$cid]);

	if ($GLOBALS['CheckedCustomerAccessArray'][$cid] && $dont_use_cache==false) {
//		qlog("USEDCACHE: " . $dont_use_cache . "--- " . $GLOBALS['CheckedCustomerAccessArray'][$cid]);
		$ret = $GLOBALS['CheckedCustomerAccessArray'][$cid];
		if ($ret=="readonly") {
			qlog("CACHE Access to customer $cid granted read-only $reason $ret");
		} elseif ($ret=="ok") {
			qlog("CACHE Access to customer $cid granted $reason");
		} else {
			qlog("CACHE Access to customer $cid denied $reason");
		}
		return($ret);
	} else {
//		qlog("DIDNTUSECACHE: " . $dont_use_cache . "--- " . $GLOBALS['CheckedCustomerAccessArray'][$cid]);

		if (!$GLOBALS['CLLEVELX'] && !$dont_use_cache) {
			$GLOBALS['CLLEVELX'] = GetClearanceLevel($utt);
		} elseif ($dont_use_cache) {
			$GLOBALS['CLLEVELX'] = GetClearanceLevel($utt);
		}

		$cl = $GLOBALS['CLLEVELX'];

		$cust_row = db_GetRow("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "customer WHERE id='" . $cid . "'");


		if ($cl == "administrator") {
			$ret = "ok";
			$reason = "(o usu�rio � administrador)";
		} elseif ($cust_row['active']  == "no") {
				$ret = "nok";
				$reason = "(this customer is not active and therefore it will not be shown!)";
		} elseif (!@in_array($cust_row['id'],$GLOBALS['LIMITTOCUSTOMERS']) && is_array($GLOBALS['LIMITTOCUSTOMERS'])) {
				$ret = "nok";
				$reason = "(limited by profile)";
		} elseif ($cl == "ro" || $cl == "ro+") {
				$sql = "SELECT FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $utt. "' LIMIT 1";
				$out = mcq($sql,$db);
				$row2 = mysql_fetch_array($out);
				$cust2 = $row2[0];

				$cust_coupled = split(":",$cust2);
				$cust2 = $cust_coupled[1];				

				if ($cid == $cust2) {
					$ret = "readonly";
					$reason = "(coupled to this customer)";
				} else {
					$ret = "nok";
					$reason = "(not coupled to this customer)";				
				}
		} else {
			if (($cust_row['readonly'] == "yes") && (GetCustomerOwner($cid) <> $utt)) {
				$ret = "readonly";
				$reason = "(this customer is marked as read-only, and this user is not the owner)";
			} else {
				$ret = "ok";
				$reason = "(user has full access)";
			}
		}

		$GLOBALS['CURFUNC'] = "CheckCustomerAccess::";
		if ($ret=="readonly") {
			qlog("Access to customer $cid granted read-only $reason $ret");
		} elseif ($ret=="ok") {
			qlog("Access to customer $cid granted $reason");
		} else {
			qlog("Access to customer $cid denied $reason");
		}
		$GLOBALS['CheckedCustomerAccessArray'][$cid] = $ret;
		return($ret);
	}
}
function CheckEntityAccess($EntityID, $force_id=false, $dont_use_cache=false) {
	//global $GLOBALS[$GLOBALS['CheckedEntityAccessArray'];


	/* 
		This is the main function which checks if a user has access to an entity based on:

			* The clearance level of the user
			* The form type of the entity (is the user allowed to use the form)
			* The private flag of the entity (is the entity marked as private)
			* The read-only flag of the entity (is the entity marked as readonly)
			* The access rights to the customer to which the entity is coupled

		It can return 3 things: "ok", "readonly" or "nok". If any of the above checks
		fails (e.g. results readonly or nok) this function will return that regardless
		of the result of the other checks. Every check has veto. 

		The function caches all checks (within one page-load) to improve performance .

	*/
	
	if ($force_id) {
		$utt = $force_id;
	} else {
		$utt = $GLOBALS['USERID'];
	}
	$cll = GetClearanceLevel($utt);

	if ($cll == "administrator") {
		if (CheckLock($EntityID) && $GLOBALS['EnableEntityLocking']=="Yes" && $ret=="ok") {
				$ret = "readonly";
				$reason = "(entity is locked)";
				qlog("CACHE Access to entity $EntityID granted read-only (entity is locked)");
				return("readonly");
		}  else {
				qlog("CACHE Access to entity $EntityID granted 1st check (user is admin)");
				return("ok");
		}

	}

	$GLOBALS['CURFUNC'] = "CheckEntityAccess::";
	
	if ($EntityID == "_new_" || $EntityID == 0) {
		qlog("Returning TRUE - got _new_ or ZERO passed as entity number!");
		return("ok");
	}
	
	//qlog("Checking access to $EntityID for user " . GetUserName($utt));
	// This routine checks if the current $GLOBALS[USERID] has access to $EntityID

	if ($GLOBALS['CheckedEntityAccessArray'][$EntityID]=="ok" && !$dont_use_cache) {
		qlog("CACHE CheckEntityAccess $EntityID (granted)");
		$ret = "ok";
	} elseif ($GLOBALS['CheckedEntityAccessArray'][$EntityID]=="readonly" && !$dont_use_cache) {
		qlog("CACHE CheckEntityAccess $EntityID (read-only)");
		$ret = "readonly";
	} elseif ($GLOBALS['CheckedEntityAccessArray'][$EntityID]=="nok" && !$dont_use_cache) {
		qlog("CACHE CheckEntityAccess $EntityID (denied)");
		$ret = "nok";
	} elseif ($EntityID=="") {
		$ret = "nok";
		qlog("CheckEntityAccess EMPTY ENTITY-ID (denied!)");
	} else {

		$sql = "SELECT assignee,owner,readonly,private,CRMcustomer,formid FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $EntityID . "' LIMIT 1";
		$out = mcq($sql,$db);
		$row = mysql_fetch_array($out);



		$GLOBALS['CURFUNC'] = "CheckEntityAccess::";
		if (!@in_array($row['CRMcustomer'],$GLOBALS['LIMITTOCUSTOMERS']) && is_array($GLOBALS['LIMITTOCUSTOMERS'])) {
			$ret = "nok";
			$reason = "(this user may not access customer " . $row['CRMcustomer'] . "'s data)";
		} elseif ($cll=="administrator") {
			$ret = "ok";
			$reason = "(user is admin)";
		} elseif ($row['private'] == "y" && ($row['owner']<>$utt) && ($row['assignee']<>$utt)) {
			$ret = "nok";
			$reason = "(private entity)";
		} else {
			if ($cll=="ooro") {
					// only own ENTITIES (not files) read-only
					
					$sql = "SELECT assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $EntityID . "' LIMIT 1";
					$out = mcq($sql,$db);
					$row2 = mysql_fetch_array($out);

					if ($utt<>$row2['assignee']) {
						//print "Access to this entity is denied - this entity is not assigned to you";
						$ret = "nok";
						$reason = "(not assignee of this entity)";
					} else {
						$ret = "readonly";
						$reason = "(cllevel is ooro)";
					}
				} elseif ($cll=="read-only-all") {
					$ret="readonly";
					$reason = "(readonly)";
				} elseif ($cll=="ro") {
					$ret="only-category";
					$reason = "(readonly)";
				} elseif ($cll=="ro+") {
					
					$sql = "SELECT CRMcustomer FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $EntityID . "' LIMIT 1";
					$out = mcq($sql,$db);
					$row2= mysql_fetch_array($out);
					$cust1 = $row2[0];

					$sql = "SELECT FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $utt. "' LIMIT 1";
					$out = mcq($sql,$db);
					$row2 = mysql_fetch_array($out);
					$cust2 = $row2[0];

					$cust_coupled = split(":",$cust2);
					$cust2 = $cust_coupled[1];

					if ($cust1<>$cust2) {
						//print "Access to this entity is denied - this entity is not assigned to you";
						$ret = "nok";
						$reason = "(wrong customer coupled : $cust1 <> $cust2) -> $EntityID";
						//log_msg("WARNING: insert-only user " . $GLOBALS['USERID'] . " tried to access an entity to which he/she has no access (eid $EntityID)","");
					} else {
						$ret="readonly";
						$reason = "(readonly)";
					}


				} elseif ($cll=="full-access-own-entities") {
					


					if ($utt<>$row['assignee']) {
						$ret = "readonly";
						$reason = "(this user may only edit his own assigned entities)";
					} else {
						$ret = "ok";
					}
			//		qlog("Access to this entity granted");

				} elseif ($cll=="full-access-see-own-assigned-entities") {
	
					if ($utt<>$row['assignee']) {
						$ret = "nok";
						$reason = "(this user may only see his own assigned entities)";
					} else {
						$ret = "ok";
						$reason = "(this user may see and use this entity)";
					}
				} elseif ($cll=="full-access-see-own-assigned-and-owned-entities") {
	
					if ($utt<>$row['assignee'] && $utt<>$row['owner']) {
						$ret = "nok";
						$reason = "(this user may only see his own assigned or owned entities)";
					} else {
						$ret = "ok";
						$reason = "(this user may see and use this entity)";
					}
			
				} elseif ($cll=="rw") {
					$ret = "ok";
			//		qlog("Access to this entity granted");
				}

				//$sql = "SELECT readonly,assignee,owner,private FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $EntityID . "'";
				//$out = mcq($sql,$db);
				//$row = mysql_fetch_array($out);
				
				if (($row['readonly']=="y") && $utt<>$row['assignee'] && $utt<>$row['owner']) {
					$ret="readonly";
					$reason = "(readonly)";
					//$ret = true;
				}


				if ($row['private']=="y" && $cll<>"administrator" && $utt<>$row['assignee'] && $utt<>$row['owner']) {
					$ret="nok";
					$reason = "(this is a private enitity)";
					$GLOBALS['CURFUNC'] = "CheckEntityAccess::";
					//print "Private entity";
					qlog("This is a private entity - access to entity " . $EntityID . " was denied");
				}
		}
		
		// Check access to customer
		if ($ret <> "nok") {
			$auth = CheckCustomerAccess($row['CRMcustomer'], $utt, $dont_use_cache);
			$GLOBALS['CURFUNC'] = "CheckEntityAccess::";
			if ($auth == "ok" || $auth == "readonly") {
				// nothing
			} else {
				$ret = "nok";
				$reason = "(access to customer was denied: \"$auth\")";		
			}
		}
		
		$cl = GetClearanceLevel($utt);

		// Check access to form
		if (!is_array($GLOBALS['ADDFORMLIST'])) {
			$GLOBALS['ADDFORMLIST'] = array();
		}
		if ($cl<>"administator" && $row['formid'] <> "default" && $row['formid'] <> "" && $row['formid'] <> "0" && $GLOBALS['FormFinity'] == "Yes") {
			if (in_array($row['formid'],$GLOBALS['ADDFORMLIST'])) {
				//qlog("This user has access to this form (" . $row['formid'] . ")");
			} else {
				qlog("This user doesn't have access to this form (" . $row['formid'] . ")");
				$ret = "nok";
				$reason = "(this user doesn't have access to this form (" . $row['formid'] . "))";
			}
		} elseif ($cl<>"administator" && ($row['formid'] == "default" || $row['formid'] == "" || $row['formid'] == "0") && $GLOBALS['FormFinity'] == "Yes") {
			if (in_array("default",$GLOBALS['ADDFORMLIST'])) {
				//qlog("This user has access to this form (" . $row['formid'] . ") (default form I think)");
			} else {
				qlog("This user doesn't have access to this form (default)");
				$ret = "nok";
				$reason = "(this user doesn't have access to this form (default))";
			}
		} elseif ($cl == "administator") {
			//qlog("Access to this form granted (user is admin)");
			$ret = "ok";
			$reason = "(user is admin)";
		}

		// Cache this hit
		if ($ret=="readonly") {
			$GLOBALS['CheckedEntityAccessArray'][$EntityID] = "readonly";
			qlog("Access to entity $EntityID granted read-only $reason $ret");
		} elseif ($ret=="ok") {
			$GLOBALS['CheckedEntityAccessArray'][$EntityID] = "ok";
			qlog("Access to entity $EntityID granted $reason");
		} else {
			$GLOBALS['CheckedEntityAccessArray'][$EntityID] = "nok";
			qlog("Access to entity $EntityID denied $reason");
		}
	}
	$GLOBALS['CURFUNC'] = "";	
//	print "returning $ret";
	if ($ret == "") {
		$cl = GetClearanceLevel($utt);
		log_msg("ERROR: CheckEntityAccess could not determine access rights - defaulting to NOK! EID: $EntityID UTT: $utt CLLEVEL: $cl USER: " . GetUserName($GLOBALS['USERID']), "");
		qlog("ERROR: CheckEntityAccess could not determine access rights - defaulting to NOK! EID: $EntityID UTT: $utt CLLEVEL: $cl USER: " . GetUserName($GLOBALS['USERID']));
		$ret = "nok";
	}
	if (!$force_id) {
		if (CheckLock($EntityID) && $GLOBALS['EnableEntityLocking']=="Yes" && $ret=="ok") {
				$ret = "readonly";
				$reason = "(entity is locked)";
		} 
	}
	return($ret);
}

function CheckFileAccess($fileid) {
	// This routine checks if the current $GLOBALS[USERID] has access to $fileid
	$GLOBALS['CURFUNC'] = "CheckFileAccess::";
	$cll = GetClearanceLevel($GLOBALS['USERID']);
	$GLOBALS['CURFUNC'] = "CheckFileAccess::";

	if ($fileid == "") {
		qlog("WARNING: CheckFileAccess called with empty fileid param! (returning NOK)");
		return("niet ok");
	}

	$row = db_GetRow("SELECT koppelid FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $fileid . "'");
	$eid = $row['koppelid'];
	
	if ((CheckEntityAccess($eid) <> "ok") && (CheckEntityAccess($eid) <> "readonly") && $eid <> 0) {
		qlog("ERROR: This file (" . $fileid . ") may not be seen - the user doesn't have the rights to view this entity. POSSIBLE BREAKIN ATTEMPT");
		log_msg("ERROR: This file (" . $fileid . ") may not be seen - the user doesn't have the rights to view this entity. POSSIBLE BREAKIN ATTEMPT","");
		$ret = "niet ok";
	} else {

		if ($cll=="administrator") {
			$ret = "ok";
		} elseif ($cll=="ooro") {
			// only own ENTITIES (not files) read-only
			
			
			$entity_id = $row['koppelid'];

			$row = db_GetRow("SELECT assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $entity_id . "'");

			if ($GLOBALS[USERID]<>$row['assignee']) {
				print "Access to this file is denied - this entity is not assigned to you";
				return(0);
				exit;
			}
		} else {
			$ret = CheckEntityAccess($eid);
			if ($ret == "readonly") $ret = "ok";
		}
		
		/*elseif ($cll=="ro+") {
			
		} elseif ($cll=="read-only-all") {
			$ret = "ok";
		} elseif ($cll=="full-access-own-entities") {
			$ret = "ok";
		} elseif ($cll=="rw") {
			$ret = "ok";
		} else {
			$ret = "niet ok";
			qlog("WARNING: Unable to determine file access. Returning NOK.");
		}
		*/
		
		$row = db_GetRow("SELECT readonly,assignee,owner FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $eid . "'");
		
		if (($row['readonly']=="y") && $GLOBALS[USERID]<>$row['assignee'] && $GLOBALS[USERID]<>$row['owner']) {
			$ret="readonly";
		}
	}
	qlog("Access to file " . $fileid . ": " . $ret); 
	$GLOBALS['CURFUNC'] = "";
	return($ret);

	// TMP
//	print $cll;
//	exit;
}

/**
* Function TransformDate
*
* Transforms a given date to the american format
* if the date format is set to mm-dd-yyyy (global setting)
*
* @param	date_to_print	The european-formatted date in dd-mm-yyyy format
*/
function TransformDate($date_to_print) {
	global $DateFormat;
	$GLOBALS['CURFUNC'] = "TransformDate::";

	if ($GLOBALS['DateFormat'] =="mm-dd-yyyy") { 

		if (strlen($date_to_print)<>10) {
			$Return = $date_to_print;
		} else {
			$d = substr($date_to_print,0,2);
			$m = substr($date_to_print,3,2);
			$y = substr($date_to_print,6,4);
			$Return = $m . "-" . $d . "-" . $y;
		}		
	} else {
		$Return = $date_to_print;
	}
	$GLOBALS['CURFUNC'] = "";
	return($Return);
}

/**
* Function DisplayEntityActivityGraph
*
* Creates the array needed by TekenGrafiek() to draw
* the Entity Activity graph.
*
* @param	eid		The entity id 
*/
function DisplayEntityActivityGraph($eid) {
		global $lang,$in_line,$filename_to_disk_to_use;
		$GLOBALS['CURFUNC'] = "DisplayEntityActivityGraph::";
		require_once("fgrph.php");
		
		if (CheckEntityAccess($eid) == "ok" || CheckEntityAccess($e['eid']) == "readonly") {

			$sql= "SELECT timestamp FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='" . $eid  . "'";
			if ($debug) { print "\nSQL: $sql\n"; }
			$result= mcq($sql,$db);								
			while ($resarr=mysql_fetch_array($result)){
					$x++;
					$table_array[$x] = substr($resarr[timestamp],0,8);
					$results++;
			}

			$desc = "Activity of entity $eid";

			if ($results<3) {
				$table_array[0] = "0";
				$table_array[1] = "0";
				$table_array[2] = "0";
				$table_array[3] = "0";
				$table_array[4] = "0";
				$table_array[5] = "0";
				$table_array[6] = "0";
				$table_array[7] = "0";
				$table_array[8] = "0";
				$table_array[9] = "0";
				$table_array[10] = "0";
				$results=11;
			}

			sort($table_array);

			$unique = array();
			$count = array();
			$inarray = 0;

			for ($y=0;$y<sizeof($table_array);$y++) {
				
				if (!in_array($table_array[$y], $unique)) {
					// Found a unique entry....
					$unique[$inarray] = $table_array[$y];
					$inarray++;				
				} 
			}

			for ($y=0;$y<sizeof($table_array);$y++) {
				for ($z=0;$z<$inarray;$z++ ) {
						if ($unique[$z]==$table_array[$y]) {
							$count[$z] = $count[$z] + 1;
							$totcount++;
						}
					}
			}

					

			$leeg = array();
			tekenGrafiek($unique, $count, $leeg, true, $desc, 300, 175);
		}
		$GLOBALS['CURFUNC'] = "";
}


/**
* Function DisplayCustomerActivityGraph
*
* Creates the array needed by TekenGrafiek() to draw
* the Customer Activity graph.
*
* @param	cust_id		The entity id 
*/
function DisplayCustomerActivityGraph($cust_id) {
		$GLOBALS['CURFUNC'] = "DisplayCustomeryActivityGraph::";
		global $lang;
		require_once("fgrph.php");
		
		$sql= "SELECT timestamp FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='" . $cust_id  . "' AND type='customer'";

		$result= mcq($sql,$db);								
		while ($resarr=mysql_fetch_array($result)){
				$x++;
				$table_array[$x] = substr($resarr[timestamp],0,8);
				$results++;
		}

		if ($results<3) {
			print "<title>" . $title . "</title>";
			?>
			<HTML>
			<META HTTP-EQUIV="Expires" CONTENT="0">
			<meta http-equiv="Content-Type" content="text/html; charset=<? echo $GLOBALS['CHARACTER-ENCODING'];?>">
			<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
			<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
			<META HTTP-EQUIV="Refresh" CONTENT="<? echo $timeoutsec;?>;url=index.php?logout=1&expire=1">
			</head>
			<?
			DisplayCSS();
			print "<body>";
			
			print "<table><tr><td><img src='error.gif'>&nbsp;Not enough journal information to build graph</td></tr></table>";
			print "";
EndHTML();
			exit;
		}

		$desc = "Activity of " . strtolower($lang[customer]) . " " . $cust_id;

		sort($table_array);
		//print "<pre>";
		//print_r($table_array);

		$unique = array();
		$count = array();
		//$count[0] = "0";
		//$count[1] = "0";
		$inarray = 0;

		for ($y=0;$y<sizeof($table_array);$y++) {
			
			if (!in_array($table_array[$y], $unique)) {
				// Found a unique entry....
				$unique[$inarray] = $table_array[$y];
				$inarray++;				
			} 
		}

		for ($y=0;$y<sizeof($table_array);$y++) {
			for ($z=0;$z<$inarray;$z++ ) {
					if ($unique[$z]==$table_array[$y]) {
						$count[$z] = $count[$z] + 1;
						$totcount++;
					}
				}
		}

	$leeg = array();
	//print "<pre>";
	//print_r($unique);
	//print_r($count);
	//exit;
	tekenGrafiek($unique, $count, $leeg, true, $desc, 300, 175);
	$GLOBALS['CURFUNC'] = "";
}
/**
* Function DisplayUserActivityGraph
*
* Creates the array needed by TekenGrafiek() to draw
* the User Activity graph.
*
* @param	cust_id		The entity id 
*/
function DisplayUserActivityGraph($user_id) {
		global $lang;
		$GLOBALS['CURFUNC'] = "DisplayUserActivityGraph::";
		require_once("fgrph.php");

		// first, fetch the user name

		$sql = "SELECT name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $user_id . "'";
		$result = mcq($sql,$db);
		$result = mysql_fetch_array($result);
		$username = $result[name];
		
		$sql= "SELECT tijd FROM $GLOBALS[TBL_PREFIX]uselog WHERE user='" . $username  . "'";
	
		$result= mcq($sql,$db);								
		while ($resarr=mysql_fetch_array($result)){
				$x++;
				$table_array[$x] = substr($resarr[tijd],0,8);
				$results++;
		}
		if ($results<3) {
			$table_array[0] = "0";
			$table_array[1] = "0";
			$table_array[2] = "0";
			$table_array[3] = "0";
			$table_array[4] = "0";
			$table_array[5] = "0";
			$table_array[6] = "0";
			$table_array[7] = "0";
			$table_array[8] = "0";
			$table_array[9] = "0";
			$table_array[10] = "0";
			$results=11;
		}

		if ($results<3) {
			print "<title>" . $title . "</title>";
			?>
			<HTML>
			<META HTTP-EQUIV="Expires" CONTENT="0">
			<meta http-equiv="Content-Type" content="text/html; charset=<? echo $GLOBALS['CHARACTER-ENCODING'];?>">
			<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
			<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
			<META HTTP-EQUIV="Refresh" CONTENT="<? echo $timeoutsec;?>;url=index.php?logout=1&expire=1">
			</head>
			<?
				DisplayCSS();
			
			
			print "<body><table><tr><td><img src='error.gif'>&nbsp;Not enough journal information to build graph</td></tr></table>";
			print "";
EndHTML();
			exit;
		}

		$desc = "Activity of user " . GetUserName($user_id) . " based on " . $results . " log entries";

		sort($table_array);

		$unique = array();
		$count = array();
		$inarray = 0;

		for ($y=0;$y<sizeof($table_array);$y++) {
			
			if (!in_array($table_array[$y], $unique)) {
				// Found a unique entry....
				$unique[$inarray] = $table_array[$y];
				$inarray++;				
			} 
		}

		for ($y=0;$y<sizeof($table_array);$y++) {
			for ($z=0;$z<$inarray;$z++ ) {
					if ($unique[$z]==$table_array[$y]) {
						$count[$z] = $count[$z] + 1;
						$totcount++;
					}
				}
		}

	$leeg = array();

	tekenGrafiek($unique, $count, $leeg, true, $desc, 570, 275);
	$GLOBALS['CURFUNC'] = "";
}
/**
* Function DisplayUserActivityGraphJournal
*
* Creates the array needed by TekenGrafiek() to draw
* the User Activity graph based on the journal.
*
* @param	cust_id		The entity id 
*/
function DisplayUserActivityGraphJournal($user_id) {
		global $lang;
		$GLOBALS['CURFUNC'] = "DisplayUserActivityGraphJournal::";
		require_once("fgrph.php");

		// first, fetch the user name

		$sql = "SELECT name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $user_id . "'";
		$result = mcq($sql,$db);
		$result = mysql_fetch_array($result);
		$username = $result[name];
		
		$sql= "SELECT timestamp FROM $GLOBALS[TBL_PREFIX]journal WHERE user='" . $user_id  . "'";
		
		$result= mcq($sql,$db);								
		while ($resarr=mysql_fetch_array($result)){
				$x++;
				$table_array[$x] = substr($resarr[timestamp],0,8);
				$results++;
		}
		if ($results<3) {
			$table_array[0] = "0";
			$table_array[1] = "0";
			$table_array[2] = "0";
			$table_array[3] = "0";
			$table_array[4] = "0";
			$table_array[5] = "0";
			$table_array[6] = "0";
			$table_array[7] = "0";
			$table_array[8] = "0";
			$table_array[9] = "0";
			$table_array[10] = "0";
			$results=11;
		}

		if ($results<3) {
			print "<title>" . $title . "</title>";
			?>
			<HTML>
			<META HTTP-EQUIV="Expires" CONTENT="0">
			<meta http-equiv="Content-Type" content="text/html; charset=<? echo $GLOBALS['CHARACTER-ENCODING'];?>">
			<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
			<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
			<META HTTP-EQUIV="Refresh" CONTENT="<? echo $timeoutsec;?>;url=index.php?logout=1&expire=1">
			</head>
			<?
			DisplayCSS();
			print "<body><table><tr><td><img src='error.gif'>&nbsp;Not enough journal information to build graph</td></tr></table>";
			print "";
			EndHTML();
			exit;
		}

		$desc = "Activity of user " . GetUserName($user_id) . " based on " . $results . " journal entries";

		sort($table_array);

		$unique = array();
		$count = array();
		$inarray = 0;

		for ($y=0;$y<sizeof($table_array);$y++) {
			
			if (!in_array($table_array[$y], $unique)) {
				// Found a unique entry....
				$unique[$inarray] = $table_array[$y];
				$inarray++;				
			} 
		}

		for ($y=0;$y<sizeof($table_array);$y++) {
			for ($z=0;$z<$inarray;$z++ ) {
					if ($unique[$z]==$table_array[$y]) {
						$count[$z] = $count[$z] + 1;
						$totcount++;
					}
				}
		}

	$leeg = array();

	tekenGrafiek($unique, $count, $leeg, true, $desc, 570, 275);
	$GLOBALS['CURFUNC'] = "";
}
function LogFunction() {
	global $logquery, $anyway, $password,$warnings,$today;
	$GLOBALS['CURFUNC'] = "LogFunction::";
	log_msg("Log viewed","");
	print "<tr><td>";
	print "<table><tr><td colspan=8>Query the log: ";
	print "<form name='nm' method='GET'><input type='hidden' name='log' value='1'><input type='hidden' name='password' value='$password'><input type='text' class='searchx' name='logquery' value='" . $logquery . "'>&nbsp;<input type='submit' value='Search'></form>";
	print "<br><br>Or:<br><br>";
	print "<img src='arrow.gif'>&nbsp;<a href='admin.php?logquery=" . $logquery . "&warnings=1&log=1&password=" . $password . "' class='bigsort'>View errors and warnings only</a><br>";
	print "<img src='arrow.gif'>&nbsp;<a href='admin.php?logquery=" . $logquery . "&today=1&log=1&password=" . $password . "' class='bigsort'>View today's messages only</a>";

	print "</tr></td></table>";
	print "<table><tr><td colspan=8><br>To download the log file in CSV click on one of the following:<br><br>";
	print "<img src='arrow.gif'>&nbsp;<a href='csv.php?exportlog=1&sep=;' class='bigsort'>Semicolon separated (;)</a><br>";
	print "<img src='arrow.gif'>&nbsp;<a href='csv.php?exportlog=1&sep=,' class='bigsort'>Comma separated (,)</a><br>";
	print "<img src='arrow.gif'>&nbsp;<a href='csv.php?exportlog=1&sep=:' class='bigsort'>Colon separated (:)</a><br>";
		
	print "</td></tr>";

    print "</table></td></tr></table><br><br>";

	if ($logquery || $warnings || $today) {
		print "<table border=1 width='100%' cellpadding=4 cellspacing=4>";
		
		if ($warnings) {
			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]uselog WHERE qs LIKE '%error%' OR qs LIKE '%warning%' OR qs LIKE '%illegal%' OR qs LIKE '%PHYSICAL ENTITY%'";
			$result= mcq($sql,$db);
		} elseif ($today) {
			// notatie is YYYYMMDD...->
			$bdate=date("Y-m-d");
			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]uselog WHERE LEFT(tijd,10)='" . $bdate ."'";
			$result= mcq($sql,$db);
		} else {
			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]uselog WHERE qs LIKE '%" . $logquery . "%'";
			$result= mcq($sql,$db);
		}

		while ($row = mysql_fetch_array($result)) {
			$tp .= "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[4] . "</td><td>" . $row[2] . "</td><td NOWRAP>" . $row[5] . "</td><td NOWRAP>" . $row[6] . "</td></tr>\n";
			$ltp++;
		}
		if ($ltp<1000 || $anyway) {
			if ($tp<>"") {
				print $tp;
				print "<tr><td colspan=5>" . $ltp . " results</td></tr>";
			} else {
				print "<tr><td>No results.</td></tr>";
			}
		} else {
			print "<tr><td><img src='error.gif'>&nbsp;More than 1,000 results. Please refine your query. <img src='arrow.gif'>&nbsp;<a href='admin.php?logquery=" . $logquery . "&anyway=1&warnings=$warnings&today=$today&log=1&password=" . $password . "' class='bigsort'>execute anyway</a><br>$sql</td></tr>";
		}
		print "</table>";
	}
	$GLOBALS['CURFUNC'] = "";
}
function DeleteExpiredTempFiles() {
	$GLOBALS['CURFUNC'] = "DeleteExpiredTempFiles::";

	//$dir = ini_get("session.save_path") . "/";
	$dir = $GLOBALS['TMP_FILE_PATH'];

	if ($dir=="/") {
		qlog("Error fetching temporary file space. Temp files left behind cannot be deleted.");
		log_msg("DeleteExpiredTempFiles::Error fetching temporary file space. Temp files left behind cannot be deleted. This will also cause problems when using exports and such. Check if your php.ini variable 'session.save_path' is set to a proper location.","");
	} else {
	
		

		if($dir[(strlen($dir)-1)]!= "/") $dir .= "/"; //check for trailing slash 
		
		
		$date = date(U); 
		if ($d = @dir($dir)) {
			while($f = $d->read()){ 
				$date2 = @fileMtime($dir.$f); //change to A C or M 
				if(($date - $date2) > 120) { // 120 seconds 
				
					if (strstr($f,"CRM_TMP_") && $f <> ".") {

						if(@unlink($dir . $f)) { 
							qlog("Deleted expired temp file " . $dir . $f);
							log_msg("DeleteExpiredTempFiles::Deleted expired temporary file " . $dir . $f,"");
						} else {
							qlog("NOT Deleted expired temp file " . $dir . $f . " - unknown error - probably no access");
							log_msg("DeleteExpiredTempFiles::NOT Deleted expired temp file " . $dir . $f . " - unknown error - probably no access","");
						}
					}
				} else {
					//qlog("NOT Deleted expired temp file " . $dir . $f);
				}
			} 
			$d->close(); 
		} else {
			qlog("ERROR - Unable to access $dir");
			log_msg("DeleteExpiredTempFiles::ERROR - Unable to access $dir","");
		}

	}
	
	// Now delete expired temp records from the cache table:

	$epoch = date('U');
	
	if ($GLOBALS['VERSION'] == $GLOBALS['DBVERSION']) {
		$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]cache WHERE (epoch+3600)<" . $epoch;
		//qlog($sql);
		$result = mcq($sql,$db);
		$bla = mysql_affected_rows();
		if ($bla>0) {
			qlog("Temp database records deleted ($bla rows)");
		}
	}
	$GLOBALS['CURFUNC'] = "";
} 
function RealExcel($excel,$CSVseparator) {
	// HANDLES CSV OUTPUT SEPARATED BY @@@REALEXCEL@@@@ ASSUMES FIRST LINE IS LEGEND
	// $WrappedCellsEachLine must contain array with horiz. fields list (numbers) of cells
	// that must be wrapped
	$GLOBALS['CURFUNC'] = "RealExcel";

	require('Writer.php');


	$filename = "CRM-export-" . date("m-j-Y-Hi") . "h.xls";
	$summ = "CRM-export-" . date("m-j-Y-Hi") . "h";

	//$filename = "bla.xls";
	//$summ = "bla.xls";

	// Creating a workbook
	$workbook = new Spreadsheet_Excel_Writer();
	// $workbook = new Workbook("-");
	// sending HTTP headers
	$workbook->send($filename);

	// Creating a worksheet
	$worksheet =& $workbook->addWorksheet($summ);
	$worksheet -> setLandscape();
	$worksheet -> setHeader($summ);

	$format_normal =& $workbook->addFormat();	
	$format_normal -> setSize(9);
	$format_normal -> setBorder(1);

	$format_bold =& $workbook->addFormat();
	$format_bold -> setBold();
	$format_bold -> setColor('white');
	$format_bold -> setPattern(1);
	$format_bold -> setFgColor('blue');
	$format_bold -> setSize(9);
	$format_bold -> setBorder(1);

	$format_wrapped =& $workbook->addFormat();
	$format_wrapped -> setTextWrap();
	$format_wrapped -> setSize(9);
	$format_wrapped -> setBorder(1);

	$format_rowheader =& $workbook->addFormat();
	$format_rowheader -> setBold();
	$format_rowheader -> setFgColor('gray');
	$format_rowheader -> setSize(9);
	$format_rowheader -> setBorder(1);

	$line = 0;
	$cell = 0;

	$max_col_width = array();

	// Create header in format_bold

	$header = split($CSVseparator,$excel[0]);

	for ($i=0;$i<sizeof($header);$i++) {
				$worksheet->write(0, $i, $header[$i], $format_bold);
				$max_col_width[$i] = strlen($header[$i]);
	}

	$linecount = 1;


	for ($i=1;$i<sizeof($excel);$i++) {

		$line = split($CSVseparator,$excel[$i]);	// get current line and array' it
		
		for ($u=0;$u<sizeof($line);$u++) {

					if ($u==0) {
						$worksheet->write($linecount, $u, $line[$u], $format_rowheader);
					} elseif (stristr($line[$u],"@@@@WRAPPED@@@@")) {
						$line[$u] = ereg_replace("@@@@WRAPPED@@@@","",$line[$u]);
						$worksheet->write($linecount, $u, $line[$u], $format_wrapped);

					} elseif (stristr($line[$u],"@@@@HEXCOLOR")) {

						$tmp = split("@@@@HEXCOLOR",$line[$u]);
						
						$hex = ltrim($tmp[1],"#");

						$tmpvar = "format_" . $hex;
						
						if (!$$tmpvar) {
							$$tmpvar =& $workbook->addFormat();
						}
						$ExcelColor = GetExcelColorName($hex);
						$$tmpvar -> setSize(9);
						$$tmpvar -> setBorder(1);

						$$tmpvar -> setFgColor($ExcelColor);
						$worksheet->write($linecount, $u, $tmp[2], $$tmpvar);


					} else {
						$worksheet->write($linecount, $u, $line[$u], $format_normal);
					}
					if ($max_col_width[$u] < strlen($header[$u])) {
							$max_col_width[$u] = strlen($header[$u]);
					}

		}

		$linecount++;

	}
	
	// Now adjust the cell width

	for ($i=0;$i<sizeof($max_col_width);$i++) {
		if ($max_col_width[$i]) {
			$worksheet -> setColumn($i, $i, ($max_col_width[$i]*2));
		}
	}

	// Let's send the file
	$workbook->close();
}

function GetExcelColorName($hex) {
	// array met excel kleuren
		$color = array();
	   array_push($color,array('00','00','00',8));  // 8
	   array_push($color,array('ff','ff','ff',9));   // 9
	   array_push($color,array('ff','00','00',10)); // 10
	   array_push($color,array('00','ff','00',11)); // 11
	   array_push($color,array('00','00','ff',12)); // 12
	   array_push($color,array('ff','ff','00',13)); // 13
	   array_push($color,array('ff','00','ff',14)); // 14
	   array_push($color,array('00','ff','ff',15)); // 15
	   array_push($color,array('80','00','00',16)); // 16
	   array_push($color,array('00','80','00',17)); // 17
	   array_push($color,array('00','00','80',18)); // 18
	   array_push($color,array('80','80','00',19)); // 19
	   array_push($color,array('80','00','80',20)); // 20
	   array_push($color,array('00','80','80',21)); // 21
	   array_push($color,array('c0','c0','c0',22)); // 22
	   array_push($color,array('80','80','80',23)); // 23
	   array_push($color,array('99','99','ff',24)); // 24
	   array_push($color,array('99','33','66',25)); // 25
	   array_push($color,array('ff','ff','cc',26)); // 26
	   array_push($color,array('cc','ff','ff',27)); // 27
	   array_push($color,array('66','00','66',28)); // 28
	   array_push($color,array('ff','80','80',29)); // 29
	   array_push($color,array('00','66','cc',30)); // 30
	   array_push($color,array('cc','cc','ff',31)); // 31
	   array_push($color,array('00','00','80',32)); // 32
	   array_push($color,array('ff','00','ff',33)); // 33
	   array_push($color,array('ff','ff','00',34)); // 34
	   array_push($color,array('00','ff','ff',35)); // 35
	   array_push($color,array('80','00','80',36)); // 36
	   array_push($color,array('80','00','00',37)); // 37
	   array_push($color,array('00','80','80',38)); // 38
	   array_push($color,array('00','00','ff',39)); // 39
	   array_push($color,array('00','cc','ff',40)); // 40
	   array_push($color,array('cc','ff','ff',41)); // 41
	   array_push($color,array('cc','ff','cc',42)); // 42
	   array_push($color,array('ff','ff','99',43)); // 43
	   array_push($color,array('99','cc','ff',44)); // 44
	   array_push($color,array('ff','99','cc',45)); // 45
	   array_push($color,array('cc','99','ff',46)); // 46
	   array_push($color,array('ff','cc','99',47)); // 47
	   array_push($color,array('33','66','ff',48)); // 48
	   array_push($color,array('33','cc','cc',49)); // 49
	   array_push($color,array('99','cc','00',50)); // 50
	   array_push($color,array('ff','cc','00',51)); // 51
	   array_push($color,array('ff','99','00',52)); // 52
	   array_push($color,array('ff','66','00',53)); // 53
	   array_push($color,array('66','66','99',54)); // 54
	   array_push($color,array('96','96','96',55)); // 55
	   array_push($color,array('00','33','66',56)); // 56
	   array_push($color,array('33','99','66',57)); // 57
	   array_push($color,array('00','33','00',58)); // 58
	   array_push($color,array('33','33','00',59)); // 59
	   array_push($color,array('99','33','00',60)); // 60
	   array_push($color,array('99','33','66',61)); // 61
	   array_push($color,array('33','33','99',62)); // 62
	   array_push($color,array('33','33','33',63)); // 63



	$ir = hexdec(substr($hex,0,2));
	$ig = hexdec(substr($hex,2,2));
	$ib = hexdec(substr($hex,4,2));

	$currnaast = 255*255*255; // max wat naast is
	$currkleurnaam = "fout!";
	$currrgb = "fout";

	for ($i=0;$i<sizeof($color);$i++) {

		$r = $color[$i][0];
		$g = $color[$i][1];
		$b = $color[$i][2];
		$kleurnaam = $color[$i][3];		

		$tmpnaast = (abs($ir - hexdec($r)) + abs($ig - hexdec($g)) + abs($ib - hexdec($b)));
		if ($tmpnaast < $currnaast) {
			$currkleurnaam = $kleurnaam;
			$currrgb =  $r . $g . $b;
			$currnaast = $tmpnaast;
		}
	}
return $currkleurnaam;
}

function CheckForDueDates() {
		global $reposnr,$title,$webhost,$pdf,$in_line;


		$subject_alarm_ts = $GLOBALS['subject_alarm'];

		$GLOBALS['CURFUNC'] = "CheckForDueDates::";
		//$DoNotAttach = 1;
		qlog("Checking duedates to mail in repository " . $GLOBALS['repository_nr']);
		log_msg("Checking duedates to mail in repository " . $GLOBALS['repository_nr'],"");
		$debug=0;
		$teller = 0;
		$bdate=date("dmY");
		print "Current bdate is $bdate\n--------------------------------------------------------------------\n";
		
		$sql="SELECT basicdate, emailadress, eID FROM $GLOBALS[TBL_PREFIX]calendar WHERE basicdate='$bdate'";
		$result= mcq($sql,$db);

		//require("class.phpmailer.php");
		
		while ($ra = mysql_fetch_array($result)) {
			if ($ra[emailadress]) {
					$mail = new PHPMailer();
					$mail->FromName = "CRM Notification manager";
					$mail->Host     = $GLOBALS['SMTPserver'];
					$mail->Mailer   = $GLOBALS['MailMethod'];
					if ($GLOBALS['MailUser'] <> "" && $GLOBALS['MailPass'] <> "") {
						$mail->Username = $GLOBALS['MailUser'];
						$mail->Password = $GLOBALS['MailPass'];
					}
					$mail->IsHTML(true);

					print "Processing " . $ra['emailadress'] . " (eid " . $ra['eID'] . ")\n";
					log_msg("Processing " . $ra['emailadress'] . " (eid " . $ra['eID'] . ")","");
					
					qlog("Also process deleted entities? : " . $GLOBALS['ALSO_PROCESS_DELETED']);

					$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$ra[eID]' ORDER BY eid";
					$res= mcq($sql,$db);
					$res= mysql_fetch_array($res);
					
					if ($res[CRMcustomer]=="") {
						$res[CRMcustomer]=="n/a";
					}
					$GLOBALS['USERID'] = $res['assignee'];
					$OWNER    = GetUserName($res['owner']);
					$ASSIGNEE = GetUserName($res['assignee']);
					$customer = GetCustomerName($res['CRMcustomer']);
					$CONTENTS = ereg_replace("\n","<BR>\n",$res['content']);
					$ENTITYID = $res['eid'];
					$CATEGORY = $res['category'];
					
					$body = $GLOBALS['BODY_DUEDATE'];

					$GLOBALS['CURFUNC'] = "CheckForDueDates::";
					qlog("Parsing subject....");
					$subject_alarm_ts	 = ParseTemplateEntity($subject_alarm_ts,$res['eid']);
					$subject_alarm_ts	 = ParseTemplateGeneric($subject_alarm_ts);
					$subject_alarm_ts	 = ParseTemplateCustomer($subject_alarm_ts,$res['CRMcustomer']);
					$GLOBALS['CURFUNC'] = "CheckForDueDates::";
					qlog("Parsing body....");
					$body				 = ParseTemplateEntity($body,$res['eid']);
					$body				 = ParseTemplateGeneric($body);
					$body				 = ParseTemplateCustomer($body,$res['CRMcustomer']);

					$body = ParseTemplateCleanUp($body);
					$subject_alarm_ts = ParseTemplateCleanUp($subject_alarm_ts);

					$text_body = ereg_replace("<([^>]+)>", "", (eregi_replace("<BR>\n","\n",$body)));
					
					$mail->From    = $GLOBALS['admemail'];
					if (strstr($GLOBALS['UNIFIED_FROMADDRESS'],"@")) {
						$mail->From     = $GLOBALS['UNIFIED_FROMADDRESS'];
					}

					$mail->Body    = $body;
					$mail->AltBody = $text_body;

					$t = split(",",$ra[emailadress]);
					for ($y=0;$y<sizeof($t);$y++) {
						$mail->AddAddress(trim($t[$y]),"Administrador do Sistema");
						print "Added " . trim($t[$y]) . " to receipient list.\n";
						log_msg("Added " . trim($t[$y]) . " to receipient list.","");
					}
					
					if (trim($res['content'])<>"" && !$DoNotAttach && !trim($_SERVER['SERVER_NAME'])=="") {
						
						$include=1; // tell sumpdf she's included
						require_once("sumpdf.php");

						$eid = $res['eid']; // the PDF routine likes this

						// create temp file
						$file_hops = tempnam($GLOBALS['TMP_FILE_PATH'],"CRM_TMP_BIN_");
						$file_cache = $file_hops;
						$file = $file_hops;
						$in_line = 1;
						// wake up pdf object
						StartPDF();

						// if we don't want images:
						$NoImageInclude=1;
						
						// create pdf in object
						cat_sum($eid);

						$date = date("F j, Y, H:i") . "h";

						// spool pdf to file
						$pdf->Output($file_hops);

						// open file, read contents
						$fp = fopen($file_hops,"r");
						while (!feof($fp)) {
							$file_c .= fread($fp,1024);
						}
						fclose($fp);

						// delete temp file
						unlink($file_cache);

						$mail->AddStringAttachment($file_c, "EntityReport-" . $ra['eID'] . ".pdf");
					
					} elseif (trim($_SERVER['SERVER_NAME'])=="") {
						log_msg("ERROR - PDF - SERVER_NAME variable is empty","");
					}

					$mail->Subject = $subject_alarm_ts;
					
				
					if ((strtoupper($GLOBALS['ALSO_PROCESS_DELETED'])<>"YES") && $res['deleted']=='y') {
						// we don't want to mail this!
						qlog("Discarding " . $res['eid'] . " -> it is deleted\n");
						print "Discarding " . $res['eid'] . " -> it is deleted\n";
						log_msg("Discarding " . $res['eid'] . " -> it is deleted","");
						$success = "1";
					} else {

						if(!$mail->Send()) {
							echo "There has been a mail error sending to $ra[emailadress]:" . $mail->ErrorInfo . ". Please contact your system administrator.\n";
							$success = "0";
							log_msg("Sending e-mail to $EmailNewEntities failed:" . $mail->ErrorInfo,"");
						} else {
							$success = "1";
							$teller++;
						}
					}
					// Clear all addresses and attachments for next loop

					$mail->ClearAddresses();
					$mail->ClearAttachments();
					$mail->ClearAllRecipients();
					$mail->ClearCustomHeaders();
					print "$extra";
					log_msg($extra,"");
					print "Repos: $reposnr ($title), Succes: $success\n--------------------------------------------------------------------\n";
					log_msg("Repos: $reposnr ($title), Succes: $success","");

			} // End if email adress exists.
//			sleep(3);
			}

		print "$teller Notifications submitted.\n";
		log_msg("$teller Notifications submitted.","");
	$GLOBALS['CURFUNC'] = "";
}

function CheckForAlarmDates() {
		global $reposnr,$title,$webhost,$pdf,$in_line;

		$GLOBALS['CURFUNC'] = "CheckForAlarmDates::";
		//$DoNotAttach = 1;
		qlog("Checking duedates to mail in repository " . $GLOBALS['repository_nr']);
		log_msg("Checking duedates to mail in repository " . $GLOBALS['repository_nr'],"");
		$debug=0;
		$teller = 0;
		$bdate=date("dmY");
		print "Current bdate is $bdate\n--------------------------------------------------------------------\n";
		
		$sql="SELECT basicdate, emailadress, eID FROM $GLOBALS[TBL_PREFIX]calendar WHERE basicdate='$bdate'";
		$result= mcq($sql,$db);

		//require("class.phpmailer.php");
		
		while ($ra = mysql_fetch_array($result)) {
			if ($ra[emailadress]) {
					$mail = new PHPMailer();
					$mail->FromName = "CRM Notification manager";
					$mail->Host     = $GLOBALS['SMTPserver'];
					$mail->Mailer   = $GLOBALS['MailMethod'];
					if ($GLOBALS['MailUser'] <> "" && $GLOBALS['MailPass'] <> "") {
						$mail->Username = $GLOBALS['MailUser'];
						$mail->Password = $GLOBALS['MailPass'];
					}
					$mail->IsHTML(true);

					print "Processing " . $ra['emailadress'] . " (eid " . $ra['eID'] . ")\n";
					log_msg("Processing " . $ra['emailadress'] . " (eid " . $ra['eID'] . ")","");
					
					qlog("Also process deleted entities? : " . $GLOBALS['ALSO_PROCESS_DELETED']);

					$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$ra[eID]' ORDER BY eid";
					$res= mcq($sql,$db);
					$res= mysql_fetch_array($res);
					
					if ($res[CRMcustomer]=="") {
						$res[CRMcustomer]=="n/a";
					}
					$GLOBALS['USERID'] = $res['assignee'];
					$OWNER    = GetUserName($res['owner']);
					$ASSIGNEE = GetUserName($res['assignee']);
					$customer = GetCustomerName($res['CRMcustomer']);
					$CONTENTS = ereg_replace("\n","<BR>\n",$res['content']);
					$ENTITYID = $res['eid'];
					$CATEGORY = $res['category'];
					
					$body = $GLOBALS['BODY_DUEDATE'];

					$GLOBALS['CURFUNC'] = "CheckForAlarmDates::";
					$subject_alarm_ts = $GLOBALS['subject_alarm'];
					qlog("Parsing subject....");
					$subject_alarm_ts	 = ParseTemplateEntity($subject_alarm_ts,$res['eid']);
					$subject_alarm_ts	 = ParseTemplateGeneric($subject_alarm_ts);
					$subject_alarm_ts	 = ParseTemplateCustomer($subject_alarm_ts,$res['CRMcustomer']);
					$GLOBALS['CURFUNC'] = "CheckForAlarmDates::";
					qlog("Parsing body....");
					$body				 = ParseTemplateEntity($body,$res['eid']);
					$body				 = ParseTemplateGeneric($body);
					$body				 = ParseTemplateCustomer($body,$res['CRMcustomer']);

					$body = ParseTemplateCleanUp($body);
					$subject_alarm_ts = ParseTemplateCleanUp($subject_alarm_ts);
					
					$text_body = ereg_replace("<([^>]+)>", "", (eregi_replace("<BR>\n","\n",$body)));
					
					$mail->From    = $GLOBALS['admemail'];
					if (strstr($GLOBALS['UNIFIED_FROMADDRESS'],"@")) {
						$mail->From     = $GLOBALS['UNIFIED_FROMADDRESS'];
					}

					$mail->Body    = $body;
					$mail->AltBody = $text_body;

					$t = split(",",$ra[emailadress]);
					for ($y=0;$y<sizeof($t);$y++) {
						$mail->AddAddress(trim($t[$y]),"Administrador de Sistema");
						print "Added " . trim($t[$y]) . " to receipient list.\n";
						log_msg("Added " . trim($t[$y]) . " to receipient list.","");
					}
					
					if (trim($res['content'])<>"" && !$DoNotAttach && !trim($_SERVER['SERVER_NAME'])=="") {
						
						$include=1; // tell sumpdf she's included
						require_once("sumpdf.php");

						$eid = $res['eid']; // the PDF routine likes this

						// create temp file
						$file_hops = tempnam($GLOBALS['TMP_FILE_PATH'],"CRM_TMP_BIN_");
						$file_cache = $file_hops;
						$file = $file_hops;
						$in_line = 1;
						// wake up pdf object
						StartPDF();

						// if we don't want images:
						$NoImageInclude=1;
						
						// create pdf in object
						cat_sum($eid);

						$date = date("F j, Y, H:i") . "h";

						// spool pdf to file
						$pdf->Output($file_hops);

						// open file, read contents
						$fp = fopen($file_hops,"r");
						while (!feof($fp)) {
							$file_c .= fread($fp,1024);
						}
						fclose($fp);

						// delete temp file
						unlink($file_cache);

						$mail->AddStringAttachment($file_c, "EntityReport-" . $ra['eID'] . ".pdf");
					
					} elseif (trim($_SERVER['SERVER_NAME'])=="") {
						log_msg("ERROR - PDF - SERVER_NAME variable is empty","");
					}

					$mail->Subject = $subject_alarm_ts;
					
				
					if ((strtoupper($GLOBALS['ALSO_PROCESS_DELETED'])<>"YES") && $res['deleted']=='y') {
						// we don't want to mail this!
						qlog("Discarding " . $res['eid'] . " -> it is deleted\n");
						print "Discarding " . $res['eid'] . " -> it is deleted\n";
						log_msg("Discarding " . $res['eid'] . " -> it is deleted","");
						$success = "1";
					} else {

						if(!$mail->Send()) {
							echo "There has been a mail error sending to $ra[emailadress]:" . $mail->ErrorInfo . ". Please contact your system administrator.\n";
							$success = "0";
							log_msg("Sending e-mail to $EmailNewEntities failed:" . $mail->ErrorInfo,"");
						} else {
							$success = "1";
							$teller++;
						}
					}
					// Clear all addresses and attachments for next loop

					$mail->ClearAddresses();
					$mail->ClearAttachments();
					$mail->ClearAllRecipients();
					$mail->ClearCustomHeaders();
					print "$extra";
					log_msg($extra,"");
					print "Repos: $reposnr ($title), Succes: $success\n--------------------------------------------------------------------\n";
					log_msg("Repos: $reposnr ($title), Succes: $success","");

			} // End if email adress exists.
//			sleep(3);
			}

		print "$teller Notifications submitted.\n";
		log_msg("$teller Notifications submitted.","");
	$GLOBALS['CURFUNC'] = "";
}

function SendPersonificatedDailyOverviewMail($body=false,$subject=false) {
	global $reposnr,$title,$webhost,$lang,$force;
	print "SendPersonificatedDailyOverviewMail:\n\n";
	$GLOBALS['CURFUNC'] = "SendPersonificatedDailyOverviewMail::";

	$sql = "SELECT id,name,EMAIL,RECEIVEDAILYMAIL,FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name NOT LIKE 'deleted_user_%' AND (CLLEVEL='rw' OR CLLEVEL='ro+')";
	$result = mcq($sql,$db);
	
	while ($row = mysql_fetch_array($result)) {
	
			if ($row['RECEIVEDAILYMAIL']=="Yes" || $force) {
								
				$del_str = " $GLOBALS[TBL_PREFIX]entity.deleted<>'y' AND ";
			
				$sql = "SELECT $GLOBALS[TBL_PREFIX]entity.category AS category, $GLOBALS[TBL_PREFIX]entity.duedate, $GLOBALS[TBL_PREFIX]entity.owner AS owner,$GLOBALS[TBL_PREFIX]customer.custname AS custname,$GLOBALS[TBL_PREFIX]entity.status AS status ,$GLOBALS[TBL_PREFIX]entity.priority AS prio,$GLOBALS[TBL_PREFIX]statusvars.color AS statuscolor,$GLOBALS[TBL_PREFIX]priorityvars.color AS priocolor, $GLOBALS[TBL_PREFIX]loginusers.FULLNAME AS assignee FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]statusvars,$GLOBALS[TBL_PREFIX]priorityvars,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE $GLOBALS[TBL_PREFIX]entity.assignee='" . $row['id'] . "' AND $GLOBALS[TBL_PREFIX]entity.assignee=$GLOBALS[TBL_PREFIX]loginusers.id AND $GLOBALS[TBL_PREFIX]entity.CRMcustomer=$GLOBALS[TBL_PREFIX]customer.id AND $GLOBALS[TBL_PREFIX]statusvars.varname=$GLOBALS[TBL_PREFIX]entity.status AND $GLOBALS[TBL_PREFIX]priorityvars.varname=$GLOBALS[TBL_PREFIX]entity.priority AND " . $del_str . " $GLOBALS[TBL_PREFIX]entity.assignee<>'2147483647' AND $GLOBALS[TBL_PREFIX]entity.owner<>'2147483647' ORDER BY $GLOBALS[TBL_PREFIX]entity.status,$GLOBALS[TBL_PREFIX]entity.priority,$GLOBALS[TBL_PREFIX]entity.duedate, $GLOBALS[TBL_PREFIX]entity.eid";
				$result1 = mcq($sql,$db);
				$html = "<html><body><table border=1>";
				$html .= "<tr><td><font face='MS Shell dlg' size='-1'>" . $lang['customer'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['assignee'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['owner'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['status'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['priority'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['category'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $lang['duedate'] . "</font></td></tr>";

				$count = 0;

				while ($row2 = mysql_fetch_array($result1)) {

					
					$html .= "<tr><td><font face='MS Shell dlg' size='-1'>" . $row2['custname'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $row2['assignee'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . GetUserName($row2['owner']) . "</font></td><td bgcolor='" . $row2['statuscolor'] . "'><font face='MS Shell dlg' size='-1'>" . $row2['status'] . "</font></td><td bgcolor='" . $row2['priocolor'] . "'><font face='MS Shell dlg' size='-1'>" . $row2['prio'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . $row2['category'] . "</font></td><td><font face='MS Shell dlg' size='-1'>" . TransformDate($row2['duedate']) . "&nbsp;</font></td></tr>";
					$GLOBALS['CURFUNC'] = "SendPersonificatedDailyOverviewMail::";
					$count++;
					
				}
				$html .= "</table></html>";

				$mail = new PHPMailer();

				$mail->From     = $GLOBALS['admemail'];

				if (strstr($GLOBALS['UNIFIED_FROMADDRESS'],"@")) {
					$mail->From     = $GLOBALS['UNIFIED_FROMADDRESS'];
				}

				$mail->FromName = "CRM Notification manager";
			
				$mail->Host     = $GLOBALS['SMTPserver'];
				$mail->Mailer   = $GLOBALS['MailMethod'];
				if ($GLOBALS['MailUser'] <> "" && $GLOBALS['MailPass'] <> "") {
					$mail->Username = $GLOBALS['MailUser'];
					$mail->Password = $GLOBALS['MailPass'];
				}
				$mail->IsHTML(true);

				if ($body) {
						$body = str_replace("@LIST@",$html,$body);
						$html = $body;
				}
				$html = ParseTemplateGeneric($html);


				$mail->Body    = stripslashes($html);
				$text_MailBody = ereg_replace("<([^>]+)>", "", (eregi_replace("<br>","\015\012",$html)));
				$mail->AltBody = stripslashes($text_MailBody);
				
				$mail->AddAddress($row['EMAIL'],$row['FULLNAME']);

				if ($subject) {
					$mail->Subject = ParseTemplateGeneric($subject);
				} else {
					$mail->Subject = $row['FULLNAME'] . "'s " . $lang['entities'] . " ($title)";
				}

			
				if (!trim($row['EMAIL']=="") && $count>0) {
	    			qlog("Sending daily entity overview to " . $row['name'] . " (" . $row['EMAIL'] . ") - $count");
					print "Sending entity overview to " . $row['FULLNAME'] . " ($count entities)\n";
					if(!$mail->Send()) {
						echo "<font color='#FF0000'>There has been a mail error sending to ". $row['EMAIL'] . ":" . $mail->ErrorInfo . ". Please contact your system administrator.</font><br>";
						//log_msg("Sending e-mail to $who $receipient_mail failed:" . $mail->ErrorInfo,"");
						$add_to_journal .= "\nSending e-mail to $who $receipient_mail failed:" . $mail->ErrorInfo;
						qlog("E-mail NOT sent.. ERROR: " . $mail->ErrorInfo);
					} else {
						//log_msg("Notification e-mail sent to $who $receipient_mail","");
						$add_to_journal .= "\nNotification e-mail sent to $who $receipient_mail";
					}
				}	
	
				$mail->ClearAddresses();
				$mail->ClearAttachments();
			

			} else {
				qlog("User " . $row['name'] . " doesn't want this update.");
				print "User " . $row['name'] . " doesn't want this update.\n";
			}

	}

	$GLOBALS['CURFUNC'] = "";
}

function check_config($tbl) {
	global $lang;
	$p = array();
	$sql= "SELECT * FROM " . $tbl . "settings";
	$result= mcq($sql,$db);								
	while ($resarr=mysql_fetch_array($result)){
		if (in_array($resarr[setting],$p)) {
			printbox("<font color='#FF0000'> Double config entry for $resarr[setting] found - fixed by deleting the last one</font>");
			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]settings WHERE settingid = '$resarr[settingid]'";
			mcq($sql,$db);
			$fixed = 1;
			//printbox($sql);
		}
		$p[$t] = $resarr[setting];
		$t++;
	}
	if (!$fixed) {
		printbox("Your configuration is consistant, no double entries found.");
	}
	

}





function ViewJournal($VJ) 
{
	global $EnableEntityJournaling, $logquery, $anyway;

	if (!$VJ) {
		// Show select box
		// but first, show nice stats

		$sql = "SELECT COUNT(*) AS bla FROM $GLOBALS[TBL_PREFIX]journal";
		$result= mcq($sql,$db);								
		$r=mysql_fetch_array($result);
	
		print "<tr><td colspan=8>The journal contains $r[bla] entries.<br>&nbsp;</td></tr>";

		print "<tr><td colspan=8>Please enter the ID of the entity</td></tr>";
		print "<tr><td colspan=8><form name='fd' method='GET'><input type='hidden' name='ViewJournal' value='1'><input type='hidden' name='password' value='$password'>";
		print "<input type='text' size=3 name='VJ'>&nbsp;&nbsp;<input type='submit' name='knopje' value='View journal by eID'></form></td></tr>";
		print "<tr><td colspan=8><br>Search in all journal entries:<br><form name='nm' method='GET'><input type='hidden' name='ViewJournal' value='1'><input type='hidden' name='password' value='$password'><input type='text' name='logquery' value='" . $logquery . "'>&nbsp;&nbsp;<input type='submit'></form>";
		print "<tr><td colspan=8></td></tr>";
		print "<tr><td colspan=8><br>Select the entity in the drop-down box:</td></tr>";
		print "<tr><td colspan=8><form name='fd' method='GET'><input type='hidden' name='ViewJournal' value='1'><input type='hidden' name='password' value='$password'>";
		print "<select name='VJ'>";
		$sql = "SELECT category,eid,CRMcustomer FROM $GLOBALS[TBL_PREFIX]entity ORDER BY $GLOBALS[TBL_PREFIX]entity.eid";
		$result= mcq($sql,$db);								
		while ($r=mysql_fetch_array($result)){
			print "<option value='$r[eid]'>$r[eid]:" . GetCustomerName($r[CRMcustomer]) . ":$r[category]</option>";
		}
		print "</select>";
		print "<br><br><input type='submit' name='knopje' value='View journal by dropdown box'></form></td></tr>";
		print "<tr><td><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a></td></tr>";

		print "</table>";
EndHTML();
		


	} else {
		// EID is in $VJ
		// First check if this is legal

		$eid = $VJ;
		
		if (strtoupper($EnableEntityJournaling)<>"YES") {
			print "<tr><td><img src='error.gif'>&nbsp;<font face='Trebuchet MS'>Error! Journaling is disabled.</font></td></tr>";
			log_msg("Illegal attempt to access entity journal #$eid (journaling is disabled)","");
			print "";
EndHTML();
			exit;
		} 
	
		print "<font face='Trebuchet MS'>Journal for entity #$eid</font><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a>&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&ViewJournal=1' style='cursor:pointer'>back to journal page</a><br><TABLE CELLPADDING='2' CELLSPACING='4' BORDER='0' WIDTH='100%'><TR VALIGN=TOP><TD VALIGN=TOP><font face='Courier New' size='2'><b>Time</TD><TD VALIGN='top'><font face='Courier New' size='2'><b>User</TD><TD><font face='Courier New' size='2'><b>Action</TD></TR>";
		print "<tr><td colspan=3></td></tr>";
		$sql = "SELECT user,message,date_format(timestamp, '%a %M %e, %Y %H:%i') AS ts FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='$eid' ORDER BY timestamp DESC";
		$result= mcq($sql,$db);
		while ($jn= mysql_fetch_array($result)) {
			print "<tr><td VALIGN='top'><font face='Courier New' size='2'>" . $jn[ts] . "</font></td><td VALIGN='top'><font face='Courier New' size='2'>" . GetUserName($jn[user]) . "</font></td><td><font face='Courier New' size='2'>" . ereg_replace("\n","<BR>",$jn[message]) . "</font></td></tr>";
			print "<tr><td colspan=3></td></tr>";
		}	

	
	}
	if ($logquery) {
			print "<table border=1 width='100%' cellpadding=4 cellspacing=4>";

			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]journal WHERE message LIKE '%" . $logquery . "%'";

			$result= mcq($sql,$db);
			
			print "<tr><td>id</td><td>eid</td><td>msg</td><td>timestamp</td><td>user</td><td>type</td></tr>";

			while ($row = mysql_fetch_array($result)) {
				$tp .= "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td><pre>" . $row[4] . "</pre></td><td>" . $row[2] . "</td><td NOWRAP>" . GetUserName($row[user]) . "</td><td NOWRAP>" . $row[5] . "</td><td NOWRAP>" . $row[6] . "</td></tr>\n";
				$ltp++;
			}
			if ($ltp<1000 || $anyway) {
				if ($tp<>"") {
					print $tp;
					print "<tr><td colspan=6>" . $ltp . " results</td></tr>";
				} else {
					print "<tr><td>No results.</td></tr>";
				}
			} else {
				print "<tr><td><img src='error.gif'>&nbsp;More than 1,000 results ($ltp) Please refine your query. <img src='arrow.gif'>&nbsp;<a href='admin.php?logquery=" . $logquery . "&anyway=1&warnings=$warnings&ViewJournal=1&password=" . $password . "' class='bigsort'>execute anyway</a></td></tr>";
			}
			print "</table>";
	}

print "";
EndHTML();
exit;

}

function TestFunkyArray() {
	$header = array("<select name='test'><option>Hidde</option><option>maaike</option></select>","Is","Gek");
	$farray[0] = array("dat","is","waar");
	$larray = array();
	array_push($larray, "http://www.google.nl1");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl2");
	array_push($farray,array("<font color='#FF0000'>dat</font>","is","waar"));
	array_push($larray, "http://www.google.nl3");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl4");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl5");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl6");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl7");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl8");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl9");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl10");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl11");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl12");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl13");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl14");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl15");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl16");
	array_push($farray,array("dat","is","waar"));
	array_push($larray, "http://www.google.nl17");

	print "</table></table>";
	print "<table class='crm' width='75%' height='40%'><tr><td>&nbsp;&nbsp;</td><td width=99%>";

	PrintFunkyArray($header,$farray,$larray);
	print "</td></tr></table>";
	EndHTML();

}

function PrintFunkyArray($header,$farray,$larray) {


	// $header = header array (may contain HTML)
	// $farray = field array
	// larray  = link array (corresponding in count with $farray)

	$rc = sizeof($farray);
	$cc = sizeof($header);
	foreach ($header AS $head) {
		if ($first) {
			$headerdisplay .= ",";
		} else {
			$first = true;
		}
		$headerdisplay .= "\"" . $head . "\"";	
	}

	foreach ($farray AS $row) {
		$outp .= "[";
		foreach ($row AS $field) {
			$outp .= "\"" . addslashes($field) . "\",";
		}
	$outp = substr($outp,0,strlen($outp)-1);
	$outp .= "],\n";
	}
	$x=0;
 	foreach ($farray AS $row) {
		$outp1 .= "[";
		$outp1 .= "\"" . addslashes($larray[$x]) . "\",";
		$outp1 = substr($outp1,0,strlen($outp1)-1);
		$outp1 .= "],\n";
		$x++;	
	}
	
	$outp1 = trim($outp1);
	$outp1 = substr($outp1,0,strlen($outp1)-1);

	?>
		<!-- ActiveWidgets stylesheet and scripts -->
		<link href="grid.css" rel="stylesheet" type="text/css" ></link>
		<script src="grid.js"></script>

		<!-- grid format -->
		<style>
			.active-controls-grid {height: 100%; font: menu;}
			.active-column-0 {width:  80px;}
			.active-column-1 {width: 200px;}
			.active-column-2 {text-align: right;}
			.active-column-3 {text-align: right;}
			.active-column-4 {text-align: right;}

			.active-grid-column {border-right: 1px solid threedlightshadow;}
			.active-grid-row {border-bottom: 1px solid threedlightshadow;}

			.active-row-highlight {background-color: #E9E9E9}
			.active-row-highlight .active-row-cell {background-color: #E9E9E9}

			.active-controls-grid {
				font-size: 8pt;
				border: 3px #000000;
			}

			.active-templates-header {
				font size: <? echo $GLOBALS['DFT_FONT_SIZE'];?>;
				font-family: <? echo $GLOBALS['DFT_FONT']?>;
			}



		</style>
		<SCRIPT>
		<!--

			
			var myData = [
			<? echo $outp;?>
			]; 

			var linkData = [
			<? echo $outp1;?>
			]; 

		

		//	create ActiveWidgets Grid javascript object
		var obj = new Active.Controls.Grid;

		// Disable selection
		//obj.setAction("selectRow", null);
		//obj.setEvent("onkeydown", null);

		//	set the first column template to image+text
		obj.setColumnTemplate(new Active.Templates.Image, 0);

		//	set number of rows/columns
		obj.setRowProperty("count", <? echo $rc;?>);
		obj.setColumnProperty("count", <? echo $cc;?>);

		//	provide cells and headers text
		obj.setDataProperty("text", function(i, j){return myData[i][j]});
		obj.setDataProperty("image", function(i, j){return myData[i][4]});

		// set the right mouseover
		var row = new Active.Templates.Row;
		row.setEvent("onmouseover", "mouseover(this, 'active-row-highlight')");
		row.setEvent("onmouseout", "mouseout(this, 'active-row-highlight')");
		obj.setTemplate("row", row);
		
	    var message = function(){
			alert("Grid selection:" +
			" latest=" + this.getSelectionProperty("index") +
			" full list=" + this.getSelectionProperty("values") +
			" (press Ctrl- to select multiple rows).");
			document.location = linkData[this.getSelectionProperty("index")];
		}
		obj.setAction("selectionChanged", message);
		 
		


		//	provide column headers
		obj.setColumnProperty("texts" , [
		<?
			print $headerdisplay;

		?>
		]);

		//	set column/row headers width/height
		obj.setColumnHeaderHeight("20px");
		obj.setRowHeaderWidth("0px");

		//	add tooltips to the first column template and data model
		obj.getColumnTemplate(0).setAttribute("title", function(){return this.getItemProperty("tooltip")});
		obj.defineDataProperty("tooltip", function(i, j){return "Type: " + myData[i][2] + "\nDate Modified: " + myData[i][3]  + "\nSize: " + myData[i][1]});

		//	write grid html to the page
		document.write(obj);

		//-->

		</SCRIPT>
		<?
}


function AdvQuery() {
	global $lang,$advquery,$what,$action,$newval,$custfields,$oldval,$do_query,$direct_query,$Disable_direct,$method,$name;

	MustBeAdmin();
	
	if ($direct_query) {
		if (!$Disable_direct) {
			if ($direct_query=="Please, please, please be careful") {
				print "<tr><td>Hey! Don't play around with this kind of functions!</td></tr>";
			} else {
				if (stristr($direct_query,"delete ") || stristr($direct_query,"truncate") || stristr($direct_query,"drop") ) {
					print "<tr><td><img src='error.gif'> Illegal (you cannot use DELETE, TRUNCATE and DROP)</td></tr>";
				
				} else {
					print "<tr><td>OK, executing your query.</td></tr></table></table></table>";
					$result=mcq(stripslashes($direct_query),$db);
					$numfields = mysql_num_fields($result);
					$fields = array();
					for ($i=0; $i < $numfields; $i++) // Header
					{
						array_push($fields,mysql_field_name($result, $i));
					}

					if ($method=='table') {
						print "<table width='100%' border=1>";
					} elseif ($method=='CSV') {
						print "<pre>";
					}

					if (stristr($direct_query,"select") || stristr($direct_query,"show")) {
						while ($jn= mysql_fetch_array($result)) {
								if ($method=='table') {
										print "<tr>";
										for ($x=0;$x<sizeof($jn);$x++) {
											print "<td><pre>" . htmlspecialchars($jn[$x]) . "</pre>&nbsp;</td>";
										}
										print "</tr>";
								} elseif ($method=='CSV') {
										for ($x=0;$x<sizeof($jn);$x++) {
											print eregi_replace("\015\012","",eregi_replace("<br>","",ereg_replace("\n","",($jn[$x])))) . ";";
										}
										print "\n";
								} elseif ($method=="fancytable") {
									$outp .= "[";
									$cc = 0;
									$rc++;

									for ($x=0;$x<sizeof($jn);$x++) {
										$bla = "\"" . addslashes(ereg_replace("\n","<br>",$jn[$x])) . "\",";
										$bla = ereg_replace("\012","",$bla);
										$bla = ereg_replace("\015","",$bla);
										$outp .= ereg_replace("\n","<br>",$bla);
										$cc++;
										
									}
									// $outp = ereg_replace("\012","<br>",$outp);
									//$outp = ereg_replace("\015","<br>",$outp);
														 
									//$outp = substr($outp,0,strlen($outp)-1);
									$outp .= "],\n";
								}
						}
					}
					//$outp = ereg_replace("\n","<br>",$outp);
					//$outp = ereg_replace("\015","<br>",$outp);
					if ($method == "fancytable") {
						//print "<pre>" . $outp;
						$outp = trim($outp);
						//$outp = ereg_replace("\n","<br>",$outp);
						$outp = substr($outp,0,strlen($outp)-1);
						//$outp = ereg_replace("\012","<br>",$outp);
						//$outp = ereg_replace("\015","<br>",$outp);
						
						?>

						<!-- ActiveWidgets stylesheet and scripts -->
						<link href="grid.css" rel="stylesheet" type="text/css" ></link>
						<script src="grid.js"></script>

						<!-- grid format -->
						<style>
							.active-controls-grid {height: 100%; font: menu;}
							.active-column-0 {width:  80px;}
							.active-column-1 {width: 200px;}
							.active-column-2 {text-align: right;}
							.active-column-3 {text-align: right;}
							.active-column-4 {text-align: right;}

							.active-grid-column {border-right: 1px solid threedlightshadow;}
							.active-grid-row {border-bottom: 1px solid threedlightshadow;}

						</style>
						<SCRIPT>
						<!--
							var myData = [
							<? echo $outp;?>
							]; 

						

						//	create ActiveWidgets Grid javascript object
						var obj = new Active.Controls.Grid;

						//	set the first column template to image+text
						obj.setColumnTemplate(new Active.Templates.Image, 0);

						//	set number of rows/columns
						obj.setRowProperty("count", <? echo $rc;?>);
						obj.setColumnProperty("count", <? echo $cc/2;?>);

						//	provide cells and headers text
						obj.setDataProperty("text", function(i, j){return myData[i][j]});
						obj.setDataProperty("image", function(i, j){return myData[i][4]});

						//	provide column headers
						obj.setColumnProperty("texts" , [
						<?
							foreach ($fields AS $name) {
							if ($first) {
								print ",";
							} else {
								$first = true;
							}
							print "\"" . $name . "\"";
						}

						?>
						]);

						//	set column/row headers width/height
						obj.setColumnHeaderHeight("20px");
						obj.setRowHeaderWidth("0px");

						//	add tooltips to the first column template and data model
						obj.getColumnTemplate(0).setAttribute("title", function(){return this.getItemProperty("tooltip")});
						obj.defineDataProperty("tooltip", function(i, j){return "Type: " + myData[i][2] + "\nDate Modified: " + myData[i][3]  + "\nSize: " + myData[i][1]});

						//	write grid html to the page
						document.write(obj);

						//-->

						</SCRIPT>
						<?
					}
					//print "<pre>";
					///print $outp;
					//print "<table>";
				//print "<tr><td>Query executed</td></tr>";
				//	print "<tr><td>" . mysql_affected_rows() . " affected records.</td></tr>";
				EndHTML();
				exit;
				}
			}
		} else {
				print "<tr><td><img src='error.gif'> Disabled</td></tr>";
		}	
	}

	if ($advquery==1) {
		print "<tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;CRM Advanced Query Interface&nbsp;</legend><table>";

		print "<tr><td>Advanced query step 1 - select what you want to do:</td></tr>";
		print "<tr><td><form name='adv' method='post'>";
		print "<select name='action'><option>Update</option><option>Delete</option></select>";
		print "<select name='what'><option value='customers'>$lang[customers]</option><option value='entities'>$lang[entities]</option></select>";
		print "<input type='hidden' value='next1' name='advquery'>";
		print "&nbsp;<input type='submit' name='1' value='Go to step 2'>";
		print "</form></td></tr></fieldset></td></tr></table>";
		print "<tr><td></td></tr>";
		print <<< WHATEVER
				<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
				<!--
				function confbla() {
					if (confirm('Does your system admin know you\'re doing this?')) {
						if (confirm('OK, so, are your sure?')) {
									if (confirm('Really?')) {
										alert('OK, suit yourself. Click OK to execute...');
										document.DirectQuery.submit();
									}
						}
					}
				}
				//-->
				</SCRIPT>
WHATEVER;
		print "<tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Execute an SQL query directly (be careful!)&nbsp;</legend><table>";
		print "<tr><td><form name='DirectQuery' OnSubmit='confbla();'><input type='text' size='100' name='direct_query' value='Please, please, please be careful'></td></tr>";
		print "<input type='hidden' value='HoelaHoeps' name='advquery'>";
		print "<table><tr><td>CSV:</td><td><input class='radio' type='radio' name ='method' value='CSV'></td></tr>";
		print "<tr><td>Table</td><td><input class='radio' type='radio' name ='method' value='table' ></td></tr>";
		print "<tr><td>Fancy table</td><td><input class='radio' type='radio' name ='method' value='fancytable' CHECKED></td></tr></table>";
		print "<tr><td><input type='submit' name='1' value='Execute (be sure - no confirmation behind this button!)'></td></tr>";
		print "</table></fieldset></td></tr>";

	} elseif ($advquery=="next1") {
		print "<tr><td>Advanced query step 2 - select the concering fields:</td></tr>";
		print "<tr><td><form name='adv' method='post'><br><br>";

		if ($action=='Delete') {
			print "Delete&nbsp;&nbsp;";
			print "<input type='hidden' name='action' value='Delete'>";
		} elseif ($action=='Update') {
			print "Update&nbsp;&nbsp;";
			print "<input type='hidden' name='action' value='Update'>";
		}
		if ($what=='customers') {
			print $lang[customers] ."&nbsp;&nbsp;";
			print "<input type='hidden' name='what' value='customers'>";
		} elseif ($what=='entities') {
			print $lang[entities] ."&nbsp;&nbsp;";
			print "<input type='hidden' name='what' value='entities'>";
		}
		if ($action=='Delete') {

			if ($what=='customers') {
				
					print "<br><br><img src='error.gif'>&nbsp; Illegal combination. To delete customers, please set customers to active='no' using the update function";

				} elseif ($what=='entities') {
				print <<<BLA
				<br><br>where the field<br><br>
				<select name='custfields'>
				<option>category
				<option>status     
				<option>priority   
				<option value='owner'>owner (use numbers, not names - see below!)</option>
				<option value='assignee'>assignee (use numbers, not names - see below!)</option>
				<option value='CRMcustomer'>customer (use numbers, not names - see below!)</option>
				<option value='deleted'>deleted (only y or n)</option>
				<option value='duedate'>duedate (DD-MM-YYYY)</option>
				<option value='obsolete'>obsolete (only y or n)</option>
				<option value='waiting'>waiting (only y or n)</option>
				<option value='readonly'>readonly (only y or n)</option>
				</select>
				<input type='hidden' value='what' name='entities'>
				<input type='hidden' value='action' name='Delete'>
				<br><br>&nbsp;&nbsp;contains the value&nbsp;&nbsp;<br><br>
				<input type='text' name='oldval' size='50'>
				<br><br>
				<input type='hidden' value='next2' name='advquery'>
				<input type='submit' name='bla' value='Go to step 3'>
				</form>
BLA;
				print "</td></tr></table>";
				print "<br><br><table border=1 bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'><tr><td colspan=2>$lang[customers]</td><td colspan=2>People</td></tr>";
				print "<tr><td>Number</td><td>Name</td><td>Number</td><td>Name</td></tr>";

				$sql1 = "SELECT id,custname FROM $GLOBALS[TBL_PREFIX]customer";
				$result= mcq($sql1,$db);
				$custs=array();
				while ($bla= mysql_fetch_array($result)) {
						array_push($custs,"<td>$bla[0]</td><td>$bla[1]</td>");
				}
				$lus = array();
				$sql2 = "SELECT id,FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers";
				$result= mcq($sql2,$db);
				while ($bla= mysql_fetch_array($result)) {
						array_push($lus,"<td>$bla[0]</td><td>$bla[1]</td>");
				}
				
				for ($x=0;$x<(sizeof($custs)+sizeof($lus));$x++) {
						print "<tr>" . $custs[$x]  .  $lus[$x] . "</tr>";
				}
				

				}
			
		} // end if delete
		if ($action=='Update') {
				print "<br><br><b>set</b><br><br>";
			if ($what=='customers') {

				print <<<EOT
				<select name='custfields'>
				<option>contact      
				<option>contact_title
				<option>contact_phone
				<option>contact_email
				<option>cust_address 
				<option>cust_remarks 
				<option>cust_homepage
				<option value='active'>active (only yes or no)</option>
				</select>
				<br><br>&nbsp;&nbsp;to value&nbsp;&nbsp;<br><br>
				<input type='text' name='newval' size='50'>
				<br><br>&nbsp;&nbsp;where the value currently is &nbsp;&nbsp;<br><br>
				<input type='text' name='oldval' size='50'>
					<br><br>
				<input type='hidden' value='next2' name='advquery'>
				<input type='submit' name='bla' value='Go to step 3'>
				</form>
				
EOT;
			

				} elseif ($what=='entities') {
				print <<<BLA
				<select name='custfields'>
				<option>category
				<option>status     
				<option>priority   
				<option value='owner'>owner (use numbers, not names - see below!)</option>
				<option value='assignee'>assignee (use numbers, not names - see below!)</option>
				<option value='CRMcustomer'>customer (use numbers, not names - see below!)</option>
				<option value='deleted'>deleted (only y or n)</option>
				<option value='duedate'>duedate (DD-MM-YYYY)</option>
				<option value='obsolete'>obsolete (only y or n)</option>
				<option value='waiting'>waiting (only y or n)</option>
				<option value='readonly'>readonly (only y or n)</option>
				</select>
				<br><br>&nbsp;&nbsp;to value&nbsp;&nbsp;<br><br>
				<input type='text' name='newval' size='50'>
				<br><br>&nbsp;&nbsp;where the value currently is &nbsp;&nbsp;<br><br>
				<input type='text' name='oldval' size='50'>
				<br><br>
				<input type='hidden' value='next2' name='advquery'>
				<input type='submit' name='bla' value='Go to step 3'>
				</form>
BLA;
				print "</td></tr></table>";
				print "<br><br><table border=1 bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
				//print "<tr><td>Number</td><td>Name</td><td>Number</td><td>Name</td></tr>";

				$sql1 = "SELECT id,custname FROM $GLOBALS[TBL_PREFIX]customer";
				$result= mcq($sql1,$db);
				$custs=array();
				while ($bla= mysql_fetch_array($result)) {
						array_push($custs,"<td>$bla[0]&nbsp;</td><td>$bla[1]&nbsp;</td>");
				}
				$lus = array();
				$sql2 = "SELECT id,FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers";
				$result= mcq($sql2,$db);
				while ($bla= mysql_fetch_array($result)) {
						array_push($lus,"<td>$bla[0]&nbsp;</td><td>$bla[1]&nbsp;</td>");
				}

				print "<table><tr><td valign='top'><table border=1 bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'><tr><td colspan=2>$lang[customers]</td></tr>";
				for ($x=0;$x<(sizeof($custs));$x++) {
						print "<tr>" . $custs[$x] . "</tr>";
				}
				print "</table></td><td valign='top'><table border=1 bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'><tr><td colspan=2>People</td></tr>";
				for ($x=0;$x<(sizeof($lus));$x++) {
						print "<tr>" . $lus[$x] . "</tr>";
				}
				print "</table></td></tr>";
				

				}
			}
		}

		if ($advquery=='next2') {
			print "<tr><td>Advanced query step 3 - Check your query</td></tr>";
			print "<tr><td><form name='adv' method='post'>";

			if ($action=='Update') {
				if ($what=='customers') {
					$sql_to_query = "UPDATE $GLOBALS[TBL_PREFIX]customer SET $custfields='$newval' WHERE $custfields='$oldval'";
					print "<pre>" . $sql_to_query . "</pre>";
					print "<input type='hidden' name='do_query' value='" . base64_encode($sql_to_query) . "'>";
					print "<input type='submit' name='1' value='Execute my query'><br><br>";
					print "<input type='hidden' value='execute' name='advquery'>";
					$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customer WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					$bla= mysql_fetch_array($result);
					print "This query will affect the following $bla[0] records:<br>";
					$sql = "SELECT custname,$custfields FROM $GLOBALS[TBL_PREFIX]customer WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					print "<table border=1 cellpadding=4 cellspacing=4><tr><td>-</td><td>$lang[customer]</td><td>$custfields</td></tr>";
					while ($bla= mysql_fetch_array($result)) {
						print "<tr><td>" . $lang[customer] . "</td><td>" . $bla[0] . "</td><td>" . $bla[1] . "</td></tr>";
					}
					print "</table></form>";
				} elseif ($what=='entities') {
					$sql_to_query = "UPDATE $GLOBALS[TBL_PREFIX]entity SET $custfields='$newval' WHERE $custfields='$oldval'";
					print "<pre>" . $sql_to_query . "</pre>";
					print "<input type='hidden' name='do_query' value='" . base64_encode($sql_to_query) . "'>";
					print "<input type='submit' name='1' value='Execute my query'><br><br>";
					print "<input type='hidden' value='execute' name='advquery'>";
					$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					$bla= mysql_fetch_array($result);
					print "This query will affect the following $bla[0] records:<br>";
					$sql = "SELECT eid,$custfields FROM $GLOBALS[TBL_PREFIX]entity WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					print "<table border=1 cellpadding=4 cellspacing=4><tr><td>-</td><td>$lang[customer]</td><td>$custfields</td></tr>";
					while ($bla= mysql_fetch_array($result)) {
						print "<tr><td>" . $lang[customer] . "</td><td>" . $bla[0] . "</td><td>" . $bla[1] . "</td></tr>";
					}
					print "</table></form>";
				}
			} elseif ($action=='Delete') {
				if ($what=='entities') {
					$sql_to_query = "UPDATE $GLOBALS[TBL_PREFIX]entity SET deleted='y' WHERE $custfields='$oldval'";
					print "<pre>" . $sql_to_query . "</pre>";
					print "<input type='hidden' name='do_query' value='" . base64_encode($sql_to_query) . "'>";
					print "<input type='submit' name='1' value='Execute my query'><br><br>";
					print "<input type='hidden' value='execute' name='advquery'>";
					$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					$bla= mysql_fetch_array($result);
					print "This query will affect the following $bla[0] records:<br>";
					$sql = "SELECT eid,category,$custfields FROM $GLOBALS[TBL_PREFIX]entity WHERE $custfields='$oldval'";
					$result= mcq($sql,$db);
					print "<table border=1 cellpadding=4 cellspacing=4><tr><td>-</td><td>$lang[customer]</td><td>$lang[category]</td><td>$custfields</td></tr>";
					while ($bla= mysql_fetch_array($result)) {
						print "<tr><td>" . $lang[customer] . "</td><td>" . $bla[0] . "</td><td>" . $bla[1] . "</td><td>" . $bla[2] . "</td></tr>";
					}
					print "</table></form>";
				}
			}

		}
		if ($advquery=="execute") {
			print "<tr><td>Advanced query executed</td></tr>";	
			mcq(base64_decode($do_query),$db);
			print "<tr><td>" . mysql_affected_rows() . " affected records.</td></tr>";
		}
	
	print "</table><br><table><tr><td nowrap><img src='arrow.gif'>&nbsp;<a href='admin.php?advquery=1' class='bigsort'>Create query from start</a></td></tr><tr><td nowrap><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?1&6' style='cursor:pointer'>Back to main administration page</a></td></tr></table>";
EndHTML();
	exit;
}

function MustBeAdmin() {
	if (!is_administrator($GLOBALS['USERID'])) {
		PrintAdminError();
		EndHTML();
		exit;
		// Yes, i know this is dirty.
	}
}
function MustBeAdminUser() {
	if (!is_administrator($GLOBALS['USERID'])) {
		PrintAdminError();	
		EndHTML();
		exit;
		// Yes, i know this is dirty.
	}
}

function printAdminFormChanger($eid) {
		$GLOBALS['CURFUNC'] = "printAdminFormChanger::";
	if (is_administrator() && $GLOBALS['FormFinity'] == "Yes" && $eid<>"_new_") {
		qlog("Printing Administrator-only form changer");
		$curform = GetEntityFormID($eid);
		
		$outp .= "<table><tr><td><fieldset><legend><img src='lock.png' alt='This is visible for administrators only'> Change the form this entity is using</legend><br><form name='FC' method='POST' action='edit.php'>";
		$outp .= "<select name='newform'>";
			if ($curform == 0) {
				$ins = "SELECTED";
			} else {
				unset($ins);
			}
		$outp .= "<option " . $ins . " value='default'>Default form</option>";
		$sql = "SELECT fileid, filename, file_subject FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE filetype='TEMPLATE_HTML_FORM'";
		$result = mcq($sql, $db);
		while ($row = mysql_fetch_array($result)) {
			if ($row['fileid'] == $curform) {
				$ins = "SELECTED";
			} else {
				unset($ins);
			}
			$x++;
			$outp .="<option " . $ins . " value='" . $row['fileid'] . "'>" . $row['filename'] . " (" . $row['file_subject'] . ")</option>";
		}

		$outp .="</select><BR><BR>";
		$outp .="<input type='hidden' name='entity' value='" . $eid . "'><input type='submit' name='sb' value='Change form'><font size='-3'> &nbsp; (other changes will be lost)</font>";
		$outp .="</form></fieldset></td></tr></table>";
		if ($x>1) {
			print $outp;
		}
	} else {
		qlog("NOT printing Administrator-only form changer");
	}
}

function PrintAdminError() {
			?>
			<table width='50%'>
			<tr>
				<td>
					<fieldset>
						<img src='crm.gif'>
						<BR><BR>
						&nbsp;You do not have the required clearance level to access this page/function.
						<BR><BR>
					</fieldset>
					</td>
				</tr>
			</table>
			<?

	$GLOBALS['CURFUNC'] = "PrintAdminError::";
	qlog("PrintAdminError called (no trace after this message)"); 
	if (1==1) {
		print " [<a href=\"javascript:showLayer('TraceLog')\">trace</a>]";
		print "<div id='TraceLog' style='display: none'>";
		print "<pre>";
		print $GLOBALS['tracelog'];
		print "</pre>";
		print "</div>";
	}
}
function pushentity($eid) {
    $sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]loginusers.id=$GLOBALS[TBL_PREFIX]entity.owner AND deleted='y' AND eid='$eid' ORDER BY sqldate,status,priority";
    $result= mcq($sql,$db);
    
    while ($e= mysql_fetch_array($result)) {
      $tot++; 
	  print "<tr><td>$e[custname]</td><td>$e[name]</td><td>";

	$sql1 = "SELECT name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='$e[assignee]'";
	$rult= mcq($sql1,$db);
	$e1= mysql_fetch_array($rult);
	
	print "$e1[name]</td>";
	
	if ($e[status]=='close') {
	print "<td bgcolor='FF3300'>";
	} elseif ($e[status]=='open') {
	print "<td bgcolor='#33FF00'>";
	} else {
	print "<td bgcolor='#3300FF'>";
	}
	
	
	print "$e[status]</td>";

     if ($e[priority]=="critical") {
              print "<td bgcolor='#FFFF00'><font color='#FF0000'>";
	    } elseif ($e[priority]=="high") {
	    print "<td bgcolor='#FFFF66'>";
	    } elseif ($e[priority]=="medium") {
	    print "<td bgcolor='#FFFF99'>";
	    
	      } else {
	          print "<td bgcolor='#FFFFCC'>";
	}
	
	
	
	
	print "$e[priority]</td><td><b>$e[category]</b></td>";
	
	 if ($e[duedate]==$date) {
					$tmp="</font>";  
					print "<td><font color='FF3300' width='70'>";
				}
				elseif ($e[sqldate]<$sqldate) {
		            $tmp="</u></font>";  
					print "<td><font color='FF3300' width='70'><u>";
				} 
				else 
				{
					print "<td width='70'>";
				}	
	if ($e[duedate]=="") {
			$e[duedate] = "<font color='FF3300'>none</font>";	
	}					  
	print "$e[duedate]$tmp</td>";
	
	$sql3 = "SELECT basicdate FROM $GLOBALS[TBL_PREFIX]calendar WHERE eID='$e[eid]'";
	$rult2= mcq($sql3,$db);
	if ($e5= mysql_fetch_array($rult2)) {
			$e5[basicdate] = substr($e5[basicdate],0,2) . "-" . substr($e5[basicdate],2,2) . "-" . substr($e5[basicdate],4,4);
			print "<td width='70'>$e5[basicdate]</td>";	    
	} else {
			print "<td><font color='FF3300'>none</font></td>";
	}
		


	print "</tr>";
	    $cont = ereg_replace("\n","<BR>",$e[content]);
	    print "<tr><td colspan=12><table border='1' width='100%' bgcolor='#F2F2F2' cellspacing='0' cellpadding='8' bordercolor='#CECECE'><tr><td>$cont</td></tr></table>";
	}
return($tot);
}



function usermanager($user_to_edit)
{
	global $password,$userman,$accname,$accpass1,$accpass2,$type,$delete,$admini,$lang,$FULLNAME,$EMAIL,$CLLEVEL,$name,$EnableCustInsert,$administrator,$active,$dailymail;
	log_msg("User manager started","");
	$sql = "SELECT administrator FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='" . $name . "'";
	$result= mcq($sql,$db);
	$CRMuser= mysql_fetch_array($result);
	
	$administrator = $CRMuser[administrator];



	if (!$user_to_edit) {
//			print "&nbsp;<br>";    
			

//    UPDATE person SET password= encrypt('$newpassword1','$selectedusername') WHERE username='$selectedusername'";
			print "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[addaccount]&nbsp;</legend><table><tr><td><form name=adduser method=POST></td></tr>";
			print "<tr><td>$lang[name]:</td><td><input type='text' name='newuser'></td></tr>";
			print "<tr><td>$lang[password]:</td><td><input type='password' name='newpassword'></td></tr>";
			print "<tr><td>$lang[password]:</td><td><input type='password' name='newpasswordconfirm'></td></tr>";
			print "<tr><td></td><td><input type='hidden' name='password' value='$password'></td></tr>";
			
			$la = GetUserProfiles();
			print "<tr><td>Perfil</td><td><select name='profile'>";
			print "<option value=''>- sem perfil -</option>";
			foreach($la AS $profile) {
				print "<option value='" . $profile[0] . "'>" . $profile[1] . "</option>";
			}
			print "</select></td></tr>";	
			
			print "<tr><td>Nome completo:</td><td><input size=50 type='text' name='FULLNAME' value='$result[FULLNAME]'></td></tr>";
			print "<tr><td>Relat�rio das tarefas no e-mail:</td><td><select name='dailymail'><option value='No'>N�o</option><option value='Yes' " . $ins . ">Sim</option></select></td></tr>";
			print "<tr><td>E-mail:</td><td><input type='text' size=50 name='EMAIL' value='$result[EMAIL]'></td></tr>";
			print "<tr><td nowrap>Level de Administra��o:</td><td>";

			
			print "<select name='CLLEVEL'>";
			if ($result["CLLEVEL"]=="rw") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			
			
			if ($result["CLLEVEL"]=="ro") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			if ($result["CLLEVEL"]=="ro+") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			

			if ($result["CLLEVEL"]=="ooro") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			

			if ($result["CLLEVEL"]=="read-only-all") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			

			if ($result["CLLEVEL"]=="full-access-own-entities") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			

			if ($result["CLLEVEL"]=="full-access-see-own-assigned-entities") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			print "<option value='ro+' $a>VISUALIZAR OS PEDIDOS INSERIDOS, INSERIR E EDITAR PEDIDOS QUE ENVIOU</option>";
			

			if ($result["CLLEVEL"]=="ooro") {
				$a = "SELECTED";
			} else {
				unset($a);
			}

			print "<option $a value='full-access-see-own-assigned-entities'>ACESSO COMPLETO ENTRETANTO PODE INSERIR, VER E EDITAR TODOS OS PEDIDOS</option>";
			
			if ($result["CLLEVEL"]=="full-access-see-own-assigned-and-owned-entities") {
				$a = "SELECTED";
			} else {
				unset($a);
			}
			
			
			if ($result["CLLEVEL"]=="logger") {
				$a = "SELECTED";
			} else {
				unset($a);
			}

			print "<option $a value='logger'>LOGIN EXTERNO (Somente Leitura do Sistema)</option>";



			if ($administrator=="yes" || $administrator=="Yes") { // Only print this option when the current user is an administrator
					if (strtoupper($result["administrator"])=="Yes") {
						$a = "SELECTED";
						
					} else {
						unset($a);
					}
					print "<option $a value='administrator'>ADMINISTRADOR GERAL</option>";
			}
			print "</select>";
			print "</td></tr>";
			
			
			print "<tr><td colspan=2><input type=submit name=bla value='$lang[addu]'></form></td></tr></table></fieldset></td></tr>";
			print "<tr><td></td><td colspan=2>";
			print "<table border=0 width='100%'><tr><td colspan=2><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[editaccount]&nbsp;</legend><table border='0' width='100%' cellspacing='0' cellpadding='4'>";
			print "<tr><td><br><form name='selectuser' method=post></td></tr><tr><td><select name='user_to_edit'>";
			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE active='yes' ORDER BY name";
					$result= mcq($sql,$db);

							while ($CRMUusersArray= mysql_fetch_array($result)) {
							if ($CRMUusersArray[id]==$ea[owner]) {
											$a = "SELECTED";
							} else {
											$a = "";
							}
						if (stristr($CRMUusersArray[FULLNAME],"@@@")) { $joepie=1; }
						$CRMUusersArray[FULLNAME] = ereg_replace("@@@",$lang[customer],$CRMUusersArray[FULLNAME]);
					if (trim($CRMUusersArray[FULLNAME])== "" && $joepie) {
						$CRMUusersArray[FULLNAME]="disabled";
					} elseif (trim($CRMUusersArray[FULLNAME])== "") {
						$CRMUusersArray[FULLNAME]="uncoupled/disabled";
					}
						print "<option value='$CRMUusersArray[id]' size='1' $a>$CRMUusersArray[name] [$CRMUusersArray[FULLNAME]]</option>";
					}
			print "</select>&nbsp;<input type='submit' value='Selecionar'><br><br></td></tr></table></fieldset></td></tr></table>";
			print "<input type='hidden' name='password' value='$password'>";
			print "<input type='hidden' name='userman' value='1'>";
			print "<tr><td>";
			print "</form></td></tr>";

			$la = GetUserProfiles();
			foreach($la AS $profile) {
				if ($result['PROFILE'] == $profile[0]) {
					$ins = "SELECTED";
				} else {
					unset($ins);
				}
				print "<option $ins value='" . $profile[0] . "'>" . $profile[1] . "</option>";
			}
			
			//print "<tr><td colspan=2><br><img src='arrow.gif'>&nbsp;<a href='admin.php?password=$password' class='bigsort'>$lang[btmap]</a></td></tr>";

			print "</table>";
			EndHTML();

	} elseif ($userman=='1') {
		
		$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='$user_to_edit'";
		if ($debug) { print "\nSQL: $sql\n"; }
		$result= mcq($sql,$db);
		$result= mysql_fetch_array($result);

		if ($administrator<>"yes" && $result[administrator] == "yes") {
			print "<td><img src='error.gif'>&nbsp;&nbsp;You can not edit this user because this user is an administrator, and you are not.<br><br></td></tr>";
			print "<tr><td><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?userman=1&password=$password' style='cursor:pointer'>back to user management page</a></td></tr>";
			print "";
			EndHTML();
			log_msg("Edit user $user_to_edit denied","");
			exit;
		} else {
			log_msg("Edit user $user_to_edit","");
		}
	    print "<tr><td><form name='updacc' action='admin.php' method='POST'></td></tr>";

		if ($result[CLLEVEL]=="ro" && !$EnableCustInsert=="yes" && !$EnableCustInsert=="Yes") {
			print "<TR><TD><b><font color='#FF0000'>Warning: The customer insert subsystem is disabled! This user will see an error when trying to log in.<br>Enable System value 'EnableCustInsert' to enable this subsystem.</font></b></TD></TR>";
		}


		if ($result[type]=='normal') {
		    $in1 = "CHECKED";
		} else {
		    $in2 = "CHECKED";
		}
		if ($result[administrator]=='yes') {
		    $in3 = "CHECKED";
		} else {
		    $in4 = "CHECKED";
		}
		if ($result[active]=='yes') {
		    $in5 = "CHECKED";
		} else {
		    $in6 = "CHECKED";
		}

		print "<table border='0'><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;" . str_replace("@@@:","",GetUserName($user_to_edit)) . "&nbsp;</legend><table cellpadding=2 cellspacing=2>";
		
		print "<tr><td nowrap>$lang[name]:</td><td><input type='text' name='bla' value='$result[name]' DISABLED></td></tr>";
		print "<tr><td nowrap>$lang[password]: <br>($lang[passwarn])</td><td><input type='password' name='accpass1' value=''></td></tr>";
		print "<tr><td nowrap>$lang[password]:</td><td><input type='password' name='accpass2' value=''></td></tr>";
		
		if ($result[CLLEVEL]=="ro" || $result[CLLEVEL]=="ro+") {
			print "<tr><td nowrap>Coupled $lang[customer]:</td><td>";
			print "<select name='FULLNAME'>";
			print "<option value=''> - </option>";
			$sql = "SELECT id, custname FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname";
			$res = mcq($sql,$db);
			while ($bla = mysql_fetch_array($res)) {
					$bla1 = split(":",$result[FULLNAME]);
					$bla2 = trim($bla1[1]);
					
					if ($bla2==$bla[id]) {
						$t = "SELECTED";
						$ok=1;
					} else {
						unset($t);
					}
					print "<option value='@@@:$bla[id]:$bla[custname]' $t>$bla[custname]</option>";
				}
			

			print "</select>";
			if (!$ok==1) {
					?>
					<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
					<!--
						document.updacc.FULLNAME.style.background='#FF6666';
					//-->
					</SCRIPT>
					<?
					print "Un-coupled accounts are disabled!";
			} 
			print "</td></tr>";
			
			if ($result['PROFILE']=="Default" || $result['PROFILE']=="") {

				print "<tr><td nowrap>When a new entity is added, send an email to:</td><td><input type='text' size=50 name='EMAIL' value='$result[EMAIL]'></td></tr>";

				/* Legend of translated (=misused) profile values
					HIDEENTITYTAB = Entity list
					HIDEADDTAB = Show status field
					HIDECUSTOMERTAB = Show priority field
					HIDECSVTAB = Show due date field	

				*/
				if ($result['HIDEENTITYTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEENTITYTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>View the main entity list:</td><td><select name='n_HIDEENTITYTAB'><option value='n' " . $ins2 . ">Allow</option><option value='y' " . $ins . ">Disallow</option></select></td></tr>";			

				if ($result['HIDEADDTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEADDTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}

				print "<tr><td>Allow user to set the status:</td><td><select name='n_HIDEADDTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
				
				if ($result['HIDECUSTOMERTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDECUSTOMERTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Allow user to set the priority:</td><td><select name='n_HIDECUSTOMERTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
				

				if ($result['HIDECSVTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDECSVTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}

				print "<tr><td>Allow user to set the due-date:</td><td><select name='n_HIDECSVTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
				
				if ($result['HIDEPBTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEPBTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				if ($GLOBALS['FormFinity'] == "Yes") {
					print "<tr><td>This user may use the following forms:<br>(entities composed in other forms will not be visible for this user!)</td><td>";
					$cur = unserialize($result['ADDFORMS']);
				
					$sql = "SELECT fileid,file_subject,filename FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE filetype='TEMPLATE_HTML_FORM'";
					$res = mcq($sql, $db);
					if (@in_array("default", $cur)) {
						$check = "CHECKED";
					} else {
						unset($check);
					}
					print "<input type='checkbox' " . $check . " name='addforms[]' value='default'> CRM-CTT Default form<BR>";

					while ($row = mysql_fetch_array($res)) {
						if (@in_array($row['fileid'], $cur)) {
							$check = "CHECKED";
						} else {
							unset($check);
						}
						print "<input " . $check . " type='checkbox' name='addforms[]' value='" . $row['fileid'] . "'> " . $row['filename'] . " (" . $row['file_subject'] . ")<BR>";
					}


					print "</td></tr>";
				} else {

					print "<tr><td>Add-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result2 = mcq($sql,$db);
					print "<SELECT NAME='ENTITYADDFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result2)) {
						if ($result['ENTITYADDFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";
					print "<tr><td>Edit-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result2 = mcq($sql,$db);
					print "<SELECT NAME='ENTITYEDITFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result2)) {
						if ($result['ENTITYEDITFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";
				}

			} else {
				//print "<tr><td colspan=2>Permissions are inherated from profile</td></tr>";
			}
		} else {

			if ($result['administrator']=='yes') {
				$disable_boxes1 = "DISABLED";
				$disable_boxes2 = "<option value='1'>&lt;User is admin&gt;</option>";
			}
			print "<tr><td nowrap>Nome completo:</td><td><input size=50 type='text' name='FULLNAME' value='$result[FULLNAME]'></td></tr>";
			print "<tr><td>E-mail:</td><td><input type='text' size=50 name='EMAIL' value='$result[EMAIL]'></td></tr>";

			if ($result['PROFILE']=="Default" || $result['PROFILE']=="") {
				if ($result['HIDEADDTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEADDTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}

				print "<tr><td>Adicionar uma entidade:</td><td><select name='n_HIDEADDTAB' $disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";
				
				if ($result['HIDECUSTOMERTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDECUSTOMERTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Modificar Costumes:</td><td><select name='n_HIDECUSTOMERTAB' $disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";
				

				if ($result['HIDECSVTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDECSVTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Usar prefer�ncia de Download:</td><td><select name='n_HIDECSVTAB'$disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";
				
				if ($result['HIDEPBTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEPBTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Usar lista de telefones:</td><td><select name='n_HIDEPBTAB'$disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";
				if ($result['HIDESUMMARYTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDESUMMARYTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Usar a p�gina sum�ria:</td><td><select name='n_HIDESUMMARYTAB'$disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";
		
				if ($result['HIDEENTITYTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['HIDEENTITYTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Usar a lista de entidade principal:</td><td><select name='n_HIDEENTITYTAB'$disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='n' " . $ins2 . ">Sempre permita</option><option value='y' " . $ins . ">Sem permiss�o</option></select></td></tr>";

				if ($result['SHOWDELETEDVIEWOPTION']=='n') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($result['SHOWDELETEDVIEWOPTION']=='y') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Mostrar entidades deltadas:</td><td><select name='n_SHOWDELETEDVIEWOPTION' $disable_boxes1>$disable_boxes2<option value='1'>Segue como o sistema</option><option value='y' " . $ins2 . ">Sempre permita</option><option value='n' " . $ins . ">Sem permiss�o</option></select></td></tr>";
				
				print "<tr><td>Limite de n�mero de clientes:<br></td><td><input type='text' name='n_LIMITTOCUSTOMERS' value='" . $result['LIMITTOCUSTOMERS'] . "'> </td></tr>";
				
				if ($GLOBALS['FormFinity'] == "Yes") {
					print "<tr><td>Estilos de formul�rio:<br></td><td>";
					$cur = unserialize($result['ADDFORMS']);
				
					$sql = "SELECT fileid,file_subject,filename FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE filetype='TEMPLATE_HTML_FORM'";
					$res = mcq($sql, $db);
					if (@in_array("default", $cur)) {
						$check = "CHECKED";
					} else {
						unset($check);
					}
					print "<input type='checkbox' " . $check . " name='addforms[]' value='default'> Slim<BR>";

					while ($row = mysql_fetch_array($res)) {
						if (@in_array($row['fileid'], $cur)) {
							$check = "CHECKED";
						} else {
							unset($check);
						}
						print "<input " . $check . " type='checkbox' name='addforms[]' value='" . $row['fileid'] . "'> Slim<BR>";
					}


					print "</td></tr>";
				} else {

				//<input type='text' name='n_ADDFORMS' value='" . $result['ADDFORMS'] . "'> (;-separated list of form-id's)</td></tr>";
				
				print "<tr><td>Add-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result1 = mcq($sql,$db);
					print "<SELECT NAME='ENTITYADDFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result1)) {
						if ($result['ENTITYADDFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";

					print "<tr><td>Edit-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result1 = mcq($sql,$db);
					print "<SELECT NAME='ENTITYEDITFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result1)) {
						if ($result['ENTITYEDITFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";
				}
			if ($result['RECEIVEDAILYMAIL']=="Yes") {
				$ins = "SELECTED";
			}
			print "<tr><td>Relat�rio das tarefas no e-mail:</td><td><select name='dailymail'><option value='No'>N�o</option><option value='Yes' " . $ins . ">Sim</option></select></td></tr>";
			}
			}
			print "<tr><td nowrap>Clearance level (will be overruled when a profile is set):</td><td>";

			if ($result["administrator"]=="yes" && $administrator<>"yes") {
				print "<select name='CLLEVEL' DISABLED>";
			} else {
				print "<select name='CLLEVEL'>";
			}

				if ($result["CLLEVEL"]=="rw") {
					$a = "SELECTED";
				} else {
					unset($a);
				}

				
				
				if ($result["CLLEVEL"]=="ro") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				if ($result["CLLEVEL"]=="ro+") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				
				if ($result["CLLEVEL"]=="ooro") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				

				if ($result["CLLEVEL"]=="read-only-all") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				

				if ($result["CLLEVEL"]=="full-access-own-entities") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				if ($result["CLLEVEL"]=="full-access-see-own-assigned-entities") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				print "<option $a value='full-access-see-own-assigned-entities'>Acesso completo entretanto pode ver e editar as pr�prias entidades assinadas</option>";

				if ($result["CLLEVEL"]=="full-access-see-own-assigned-and-owned-entities") {
				$a = "SELECTED";
				} else {
					unset($a);
				}
				
				

				if ($result["CLLEVEL"]=="logger") {
					$a = "SELECTED";
				} else {
					unset($a);
				}
				print "<option $a value='logger'>Login Externo (somente leitura do sistema)</option>";
				// This is the edit user section, not the add user section

				if (is_administrator()) { // Only print this option when the current user is an administrator
						if (strtoupper($result["administrator"])=="YES") {
							$a = "SELECTED";
						} else {
							unset($a);
						}
						print "<option $a value='administrator'>ADMINISTRADOR GERAL</option>";
				} elseif ($administrator<>"yes" && $result["administrator"]=="yes") {
						print "<option SELECTED value='administrator'>ADMINISTRADOR GERAL</option>";				
				}
				
				print "</select>";

				print "</td></tr>";
		
				$la = GetUserProfiles();
				print "<tr><td>Perfil:</td><td><select name='profile'>";
				print "<option value=''>- sem perfil -</option>";
				foreach($la AS $profile) {
					if ($result['PROFILE'] == $profile[0]) {
						$ins = "SELECTED";
					} else {
						unset($ins);
					}
					print "<option $ins value='" . $profile[0] . "'>" . $profile[1] . "</option>";
				}
				print "</select></td></tr></table></fieldset></td></tr>";	

		

		
		
			print "<tr><td colspan=2>";
			print "<input type='hidden' name='password' value='$password'>";
			print "<input type='hidden' name='userman' value='2'>";
			print "<input type='hidden' name='accname' value='$result[name]'>";
			print "<input type='hidden' name='user_to_edit' value='$user_to_edit'>";
			print "<br><input type='submit' name='a' value='$lang[apply]'>&nbsp;&nbsp;";
			print "<input type='submit' name='delete' value='$lang[dta]'>&nbsp;&nbsp;";
			print "<input type='button' name='cancel' value='Voltar' OnClick=\"document.location='admin.php?userman=1&password=$password';\">";
			print "</form></td></tr>";

			print "</table>";
EndHTML();
	} elseif ($userman=='2') {
		if ($delete) {
		    print "<tr><td></td><td>Account $user_to_edit $lang[wasdeleted]!<br><br></td></tr>";
			
			$epoch = date("U");

			$sql= "SELECT name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='$user_to_edit'";
			$result= mcq($sql,$db);
			$result1= mysql_fetch_array($result);

				
			// we must not delete somebody physical!
			// $sql= "DELETE FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='$user_to_edit'";

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET active='no',name='deleted_user_" . $epoch ."_" . $result1[name] . "' WHERE id='$user_to_edit'";

			if ($debug) { print "\nSQL: $sql\n"; }
			$result= mcq($sql,$db);
			unset($user_to_edit);
			log_msg("ACCOUNT DISABLED - $result1[name]","ACCOUNT DISABLED - $result1[name]");
			usermanager("");
			exit;
		}
		if ($accpass1!=$accpass2) {
		    print "<tr><td>$lang[passmatcherror]</td></tr>";
			print "</table>";
EndHTML();
			exit;
		}

			$sql= "SELECT name FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='$user_to_edit'";
			$result= mcq($sql,$db);
			$result1= mysql_fetch_array($result);

		
			if ($accpass1!="") {
				log_msg("ACCOUNT ADJUSTED - $result1[name] - password changed","ACCOUNT ADJUSTED - $result1[name] - password changed");
				$pwd = "password=PASSWORD('$accpass1'),";
			} else {
				unset($pwd);
			}
			if ($CLLEVEL=="administrator") {
						$CLLEVEL = "rw";
						$ADMIN = "Yes";
				}
			if ($CLLEVEL<>"ro" && $CLLEVEL<>"ro+" && stristr($FULLNAME,"@@@")) { $FULLNAME=$accname; }

			$sql= "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET PROFILE='" . $_REQUEST['profile'] . "', $pwd type='$type',administrator='$ADMIN', CLLEVEL='$CLLEVEL', EMAIL='$EMAIL', FULLNAME='$FULLNAME',active='yes',RECEIVEDAILYMAIL='" . $dailymail . "',HIDEADDTAB='" . $_REQUEST['n_HIDEADDTAB'] . "', HIDECSVTAB='" . $_REQUEST['n_HIDECSVTAB'] . "',HIDEPBTAB='" . $_REQUEST['n_HIDEPBTAB'] . "',HIDESUMMARYTAB='" . $_REQUEST['n_HIDESUMMARYTAB'] . "',HIDEENTITYTAB='" . $_REQUEST['n_HIDEENTITYTAB'] ."',SHOWDELETEDVIEWOPTION='" . $_REQUEST['n_SHOWDELETEDVIEWOPTION'] . "',HIDECUSTOMERTAB='" . $_REQUEST['n_HIDECUSTOMERTAB'] ."',ENTITYEDITFORM='" . $_REQUEST['ENTITYEDITFORM'] ."',ENTITYADDFORM='" . $_REQUEST['ENTITYADDFORM'] ."', LIMITTOCUSTOMERS='" . $_REQUEST['n_LIMITTOCUSTOMERS'] . "', ADDFORMS='" . serialize($_REQUEST['addforms']) . "' WHERE id='$user_to_edit'";
			
			ClearAccessCache('','e',$user_to_edit);
			ClearAccessCache('','c',$user_to_edit);


			
		$result= mcq($sql,$db);
		
		print "<tr><td>$lang[tawu].</td></tr>";
		//unset($user_to_edit);
		$userman=1;
		usermanager($user_to_edit);


		
	}

} // end func

function StatusVars() {
			global $statusvar, $colsubmitted, $var_id, $varcolor, $varname, $oldvarname, $isnew, $deletestatusvar, $password, $legend, $printbox_size;
			if ($deletestatusvar) {
						$deletestatusvar = base64_decode($deletestatusvar);
						$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]statusvars WHERE id='$deletestatusvar'";
						mcq($sql,$db);
						log_msg("Status var $deletestatusvar deleted","");
			}
			if ($colsubmitted) {
				if ($isnew) {
						$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]statusvars(varname,color) VALUES('$varname','$varcolor')";
						mcq($sql,$db);
						$added=1;
						log_msg("Status var $varname added","");
				} 
				if (!$added) {
					if ($varname!=$oldvarname) { 
							$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET status='$varname' WHERE status='$oldvarname'";
							mcq($sql,$db);
							$add = "All entities with status '$oldvarname' were updated to status '$varname'.";
					} 
					$sql = "UPDATE $GLOBALS[TBL_PREFIX]statusvars SET varname='$varname',color='$varcolor' WHERE id='$var_id'";
					//print $sql;
					mcq($sql,$db);
				}
			//	print "<tr><td>Saving $varname with color $varcolor. $add</td></tr>";
				log_msg("Saving $varname with color $varcolor. $add","");
			}
			
			$printbox_size = "100%";

			if (!$statusvar) {
				$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
				$result= mcq($sql,$db);
				//$a = "<table border='1' bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
				$a = "Please choose the status variable you want to edit or delete:<br><br>&nbsp;&nbsp;&nbsp;<table border='1' bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
				while ($result1= mysql_fetch_array($result)) {
					$a .=  "<tr><td style='cursor:pointer' bgcolor='$result1[color]' OnClick='document.location=\"admin.php?password=$password&statusvar=" . base64_encode($result1[id]) . "&StatusVars=1\"'>";
					$a .= "<a href='admin.php?statusvar=" . base64_encode($result1[id]) . "&password=$password&StatusVars=1' class='bigsort'><font color='#000000'>$result1[varname]</font></a></td><td><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?&password=$password&deletestatusvar=" . base64_encode($result1[id]) . "&StatusVars=1'>delete</a></td></tr>";
				}
					$a .= "<tr><td bgcolor='#FFFFFF' OnClick='document.location=\"admin.php?password=$password&statusvar=" . base64_encode("_new_") . "&StatusVars=1\"'>";
					$a .=  "<img src='arrow.gif'>&nbsp;<a href='admin.php?password=$password&statusvar=" . base64_encode("_new_") . "&StatusVars=1' class='bigsort'>Add a new status variable </a></td><td>&nbsp;</td></tr>";
				$a .=  "</table><br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&EditVars=1' style='cursor:pointer'>Back to main variables management page</a></td></tr>";
			
				print $a;
				print "</table>";
				EndHTML();
				exit;
			}
			
			$statusvar = base64_decode($statusvar);

			$a =  "<form name='statvars'>";
			$a .= "<input type='hidden' name='password' value='$password'>";
			if ($statusvar=="_new_") {
				$legend = "Add a new status variable&nbsp;";
				$a .= "<table><tr><td>Name</td><td>Color</td></tr>";
				$a .= "<input type='hidden' name='isnew' value='_new_'>";
			} else {
				$legend ="Editing status variable \"$statusvar\"&nbsp;";
				$a .= "<table><tr><td>Name</td><td>Color</td></tr>";
				$sql = "SELECT varname,color,id FROM $GLOBALS[TBL_PREFIX]statusvars WHERE id='" . $statusvar . "'";
				$result= mcq($sql,$db);
				$result1= mysql_fetch_array($result);
				$add1 = "<br>Warning: If you edit the variable name, the<br>status of all entities carrying this status will<br>be updated to your new variable name!<br><br>";
			}
			


			$a .= "<tr><td><input type='text' name='varname' value='$result1[varname]'><input type='hidden' name='oldvarname' value='$result1[varname]'></td><td><input type='text' name='varcolor' value='$result1[color]' OnClick='popcolorchooser(document.statvars.varname.value)' OnKeyUp='popcolorchooser(document.statvars.varname.value)'></td></tr>";
			$a .= "<tr><td colspan=2><input type='hidden' name='StatusVars' value='1'><input type='hidden' name='var_id' value='$result1[id]'><input type='hidden' name='colsubmitted' value='1'>";
			$a .= $add1;
			$a .= "<input type='submit' name='butt' value='Save to database'>&nbsp;<input type='button' name='butt1' value='Cancel' OnClick='history.back(-1);'></td></tr>";
			printbox($a);
			print "</table>";
EndHTML();
			exit;
}

function priorityVars() {
			global $priorityvar, $colsubmitted, $prio_id, $varcolor, $varname, $oldvarname, $isnew, $deletepriorityvar, $password,$legend, $printbox_size;
			if ($deletepriorityvar) {
						$deletepriorityvar = base64_decode($deletepriorityvar);
						$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]priorityvars WHERE id='$deletepriorityvar'";
						mcq($sql,$db);
						log_msg("Priority var $deletepriorityvar deleted","");
			}
			if ($colsubmitted) {
				if ($isnew) {
						$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]priorityvars(varname,color) VALUES('$varname','$varcolor')";
						mcq($sql,$db);
						$added=1;
						log_msg("Priority var $varname added","");
				} 
				if (!$added) {
					if ($varname!=$oldvarname) { 
							$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET priority='$varname' WHERE priority='$oldvarname'";
							mcq($sql,$db);
							$add = "All entities with priority '$oldvarname' were updated to priority '$varname'.";
					} 
					$sql = "UPDATE $GLOBALS[TBL_PREFIX]priorityvars SET varname='$varname',color='$varcolor' WHERE id='$prio_id'";
					//print $sql;
					mcq($sql,$db);
				}
				//print "<tr><td>Saving $varname with color $varcolor. $add</td></tr>";
				log_msg("Saving $varname with color $varcolor. $add","");
			}

			if (!$priorityvar) {
				$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars";
				$result= mcq($sql,$db);
				//$a =  "<table border='1' bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
				$legend = "Edit priority variables&nbsp;";
				$printbox_size = "100%";
				$a =  "Please choose the priority variable you want to edit (or delete)...<br><br><table border='1' bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
				while ($result1= mysql_fetch_array($result)) {
					$a .= "<tr><td style='cursor:pointer' bgcolor='$result1[color]' OnClick='document.location=\"admin.php?password=$password&priorityvar=" . base64_encode($result1[id]) . "&priorityVars=1\"'>";
					$a .= "<a href='admin.php?password=$password&priorityvar=" . base64_encode($result1[id]) . "&priorityVars=1' class='bigsort'><font color='#000000'>$result1[varname]</font></a></td><td><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&deletepriorityvar=" . base64_encode($result1[id]) . "&priorityVars=1'>delete</a></td></tr>";
				}
					$a .= "<tr><td bgcolor='#FFFFFF' OnClick='document.location=\"admin.php?priorityvar=" . base64_encode("_new_") . "&priorityVars=1\"'>";
					$a .= "<img src='arrow.gif'>&nbsp;<a href='admin.php?password=$password&priorityvar=" . base64_encode("_new_") . "&priorityVars=1' class='bigsort'>add a new priority variable </a></td><td>&nbsp;</td></tr>";
					$a .= "</table><br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&EditVars=1' style='cursor:pointer'>Back to main variables management page</a></td></tr>";
					$legend = "Edit priority variables&nbsp;";
					print $a;
				print "</table>";
EndHTML();
				exit;
			}
			
			$priorityvar = base64_decode($priorityvar);

			$a = "<form name='statvars'>";
			$a .= "<input type='hidden' name='password' value='$password'>";
			if ($priorityvar=="_new_") {
				$legend = "Adding new priority variable&nbsp;";
				$a .= "<table><tr><td>Name</td><td>Color</td></tr>";
				$a .= "<input type='hidden' name='isnew' value='_new_'>";
			} else {
				$legend = "Editing priority variable \"$priorityvar\"&nbsp;";
				$a .= "<table><tr><td>Name</td><td>Color</td></tr>";
				$sql = "SELECT varname,color,id FROM $GLOBALS[TBL_PREFIX]priorityvars WHERE id='" . $priorityvar . "'";
				$result= mcq($sql,$db);
				$result1= mysql_fetch_array($result);
				$add1 = "<br>Warning: If you edit the variable name, the<br>priority of all entities carrying this priority will<br>be updated to your new variable name!<br><br>";
			}
			


			$a .= "<tr><td><input type='text' name='varname' value='$result1[varname]'><input type='hidden' name='oldvarname' value='$result1[varname]'></td><td><input type='text' name='varcolor' value='$result1[color]' OnKeyUp='popcolorchooser(document.statvars.varname.value);' OnClick='popcolorchooser(document.statvars.varname.value);'></td></tr>";
			$a .= "<tr><td colspan=2><input type='hidden' name='priorityVars' value='1'><input type='hidden' name='prio_id' value='$result1[id]'><input type='hidden' name='colsubmitted' value='1'>";
			$a .= $add1;
			$a .= "<input type='submit' name='butt' value='Save to database'>&nbsp;<input type='button' name='butt1' value='Cancel' OnClick='history.back(-1);'></td></tr>";
			printbox($a);
			print "</table>";
EndHTML();
			exit;
}

/**
 * Handles editing a sysvar
 */
function EditSysVar($id) {
	global $lang, $data, $password, $udated, $setting, $OldVar,$plain,$stdtext, $rssfeeds, $rssdescriptions;
	if (strstr($setting,"COLOR")){ 
			$data = $_REQUEST['varcolor'];
	}
	if ($udated) {
			print "value $data received for variable $id";
			if ($setting=="EnableEntityJournaling") {
				// Journaling mode was updated. Maybe we have to add this to the journal?
				if ((strtoupper($OldVar)=="YES") && (strtoupper($data)<>"YES")) {
					$sql = "SELECT eid FROM $GLOBALS[TBL_PREFIX]entity";
					$result1 = mcq($sql,$db);
					while ($result= mysql_fetch_array($result1)) {
						journal($result[eid],"[admin] Journaling disabled");
						$jcount++;
					}
				} // end if oldvar was yes

			} elseif ($setting=="EMAILINBOX") {
				
				$data = array();
				$data['popuser'] = $_REQUEST['popus'];
				$data['poppass'] = $_REQUEST['poppa'];
				$data['pophost'] = $_REQUEST['popho'];
				$data['popvisi'] = $_REQUEST['popvi'];
				$data = serialize($data);

			} elseif ($setting=="STANDARD_TEXT" || $setting=="ShowMainPageLinks") {
				foreach ($stdtext AS $row) {
					$data .= base64_encode($row) . ",";
				}
				$data = substr($data,0,strlen($data)-1);
				$data = ereg_replace(",,","",$data);
			} elseif ($setting=="RSS_FEEDS") {
				$data = array();
				$y=0;
				for ($i=0;$i<sizeof($rssfeeds);$i++) {
					if (strlen($rssfeeds[$i])>1) {
						$data[$y] = array();
						$data[$y]['sql'] = base64_encode(stripslashes($rssfeeds[$i]));
						$data[$y]['description'] = base64_encode(stripslashes($rssdescriptions[$i]));
						$y++;
					}
				}
				$data = serialize($data);
			}
				


			$sql = "UPDATE $GLOBALS[TBL_PREFIX]settings SET value='$data' WHERE settingid='$id'";
		    mcq($sql,$db);


			if ($setting=="EnableEntityJournaling") {
				// Journaling mode was updated. Maybe we have to add this to the journal?
				if ((strtoupper($OldVar)<>"YES") && (strtoupper($data)=="YES")) {
					$sql = "SELECT eid FROM $GLOBALS[TBL_PREFIX]entity";
					$result1 = mcq($sql,$db);
					while ($result= mysql_fetch_array($result1)) {
						journal($result[eid],"[admin] Journaling enabled");
						$jcount++;
					}
				} // end if oldvar was yes

			}
			
			?>
			<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
			<!--
				document.location='admin.php?password=<? echo $password;?>&sysval=1';
			//-->
			</SCRIPT>
			<?
			
	}
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]settings WHERE settingid='$id'";
	$result= mcq($sql,$db);
	$result1= mysql_fetch_array($result);

	if ($result1[setting] == "DBVERSION") {
		print "<table><tr><td><font color='#FF0000'>This value cannot be edited.</font>";
		print "<br><img src='arrow.gif'>&nbsp;<a href='javascript:history.back(-1)' class='bigsort'>back</a> <br></td></tr></table>";
		EndHTML();
		exit;
	}
	print "<table border='0' width='100%' bgcolor='#FFFFFF' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>";
	print "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><TD COLSPAN=3><font size='+1'>Editing global variable $id: " . strtoupper($result1[setting]) . "</font></TD></TR>";
	if (strstr($result1['setting'],"COLOR")){ 
		print "<FORM NAME='statvars' METHOD='GET'>";
	} else {
		print "<FORM NAME='composeform' METHOD='POST'>";
	}	
	print "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><TD COLSPAN=3><b>Discription:</b><br><br>" . $result1[discription] . "</TD></TR>";
	print "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><TD><br><b>";
	if ($result1['setting']<>"STANDARD_TEXT" && $result1['setting']<>"ShowMainPageLinks" && $result1['setting']<>"EMAILINBOX") {
		print "Value:";
	} else {
		print "Values:";
	}
	
	print "</b><INPUT TYPE='hidden' NAME='EditSysVar' VALUE='$id'><INPUT TYPE='hidden' NAME='OldVar' VALUE='" . $result1[value] . "'><INPUT TYPE='hidden' NAME='setting' VALUE='$result1[setting]'>";
	if (strstr($result1['setting'],"COLOR")){ 
		print "</TD><TD><BR><INPUT TYPE='text' SIZE=10 NAME='varcolor' OnClick='popcolorchooser(document.statvars.varcolor.value)' OnKeyUp='popcolorchooser(document.statvars.varcolor.value)' VALUE=\"" . $result1[value] . "\">";
			if ($result1['setting']=="DFT_FOREGROUND_COLOR") {
				print "&nbsp;&nbsp;<a OnClick=\"document.statvars.varcolor.value='#c60';\" style='cursor: pointer'>[default]</a>";
			} elseif ($result1['setting']=="DFT_FORM_COLOR") {
				print "&nbsp;&nbsp;<a OnClick=\"document.statvars.varcolor.value='#c60';\" style='cursor: pointer'>[default]</a>";
			} elseif ($result1['setting']=="DFT_LEGEND_COLOR") {
				print "&nbsp;&nbsp;<a OnClick=\"document.statvars.varcolor.value='#3366FF';\" style='cursor: pointer'>[default]</a>";
			} elseif ($result1['setting']=="DFT_PLAIN_COLOR") {
				print "&nbsp;&nbsp;<a OnClick=\"document.statvars.varcolor.value='#000000';\" style='cursor: pointer'>[default]</a>";
			} 
		print "</TD></TR>";
	} elseif ($result1['setting']=="ENTITY_ADD_FORM" || $result1['setting']=="ENTITY_EDIT_FORM" || $result1['setting']=="ENTITY_LIMITED_ADD_FORM" || $result1['setting']=="ENTITY_LIMITED_EDIT_FORM") {
			$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
			$result = mcq($sql,$db);
			print "&nbsp;&nbsp;&nbsp;<SELECT NAME='data'><option value='Default'>Default</option>";
			while ($row = mysql_fetch_array($result)) {
				if ($result1['value'] == $row['fileid']) {
					$ins = "SELECTED";
				} else {
					unset($ins);
				}
				print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
			}
			print "</SELECT>";
			
			
	} elseif ($result1['setting']=="DFT_FONT") {
				print "</TD><TD><BR><INPUT TYPE='text' SIZE=10 NAME='data' VALUE=\"" . $result1[value] . "\">";
				print "&nbsp;&nbsp;<a OnClick=\"document.composeform.data.value='MS Shell DLG';\" style='cursor: pointer'>[default]</a>";
	} elseif ($result1['setting']=="AUTH_TYPE") {
				print "</TD><TD><BR>";
				if ($result1['value'] == "CRM-CTT Only") {
					$ins = "SELECTED";
				} else {
					unset($ins);
					$ins2 = "SELECTED";
				}
				print "<SELECT NAME='data'><option $ins>CRM-CTT Only</option><option $ins2>HTTP REALM</option><option $ins3>LDAP</option></select>";
				

	} elseif ($result1['setting']=="EMAILINBOX") { 
					print "</tr>";
					$credentials = unserialize($GLOBALS['EMAILINBOX']);

					$a = $credentials['popuser'];
					$b = $credentials['poppass'];
					$c = $credentials['pophost'];
					$d = $credentials['popvisi'];
					if ($d == "admin") {
						$e = "SELECTED"; 
					} else {
						$f = "SELECTED";
					}

					print "<tr><td></td><td>Username:</td><td><input type=text size=70 name='popus' value='$a'></td></tr>";
					print "<tr><td></td><td>Password:</td><td><input type=password size=70 name='poppa' value='$b'></td></tr>";
					print "<tr><td></td><td>Hostname:</td><td><input type=text size=70 name='popho' value='$c'></td></tr>";
					print "<tr><td></td><td>Link visible for (will appear on main page):</td><td>";
					print "<select name='popvi'><option value='everyone' $f>Everyone</option><option value='admin' $e>Admins only</option></select><input type='hidden' name='udated' value='1'></td></tr>";
	} elseif (substr($result1[setting],0,4) == "BODY") {
		if ($plain) {
			print "<TEXTAREA name='data' ROWS='18' COLS='100'>" . $result1[value] . "</TEXTAREA>";
		} else {
			//print "<TEXTAREA name='data' ROWS='18' COLS='100'>" . $result1[value] . "</TEXTAREA>";
				
			//HIER

				include("fckeditor/fckeditor.php");

				$oFCKeditor = new FCKeditor('data') ;
				$oFCKeditor->BasePath	= "fckeditor/" ;
				//$oFCKeditor->Config['SkinPath'] = 'fckeditor/editor/skins/silver/' ;
				$oFCKeditor->Width = "80%";
				$oFCKeditor->Height = "400";
				$oFCKeditor->ToolbarSet = 'CRM';

				$oFCKeditor->Value		= $result1['value'];
				$oFCKeditor->Create() ;
		}
		print "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><TD COLSPAN=3><input type='hidden' name='password' value='$password'><input type='hidden' name='udated' value='1'><INPUT TYPE='submit' NAME='Send.x' VALUE='" . $lang[save] . "'>&nbsp;&nbsp;<input type='button' name='do' value='$lang[cancel]' Onclick=\"document.location='admin.php?sysval=1'\">&nbsp;";
		if (!$plain) {
			print "<input type='button' class='bigsort' OnClick=\"document.location='admin.php?EditSysVar=$id&plain=1';\" value='Javascript not working?'>";	
		}	
		print "</TD></TR></form>";
		print "<tr><td></td><td>";
		AvailableTags();
		print "</td></tr></table>";

		EndHTML();
		exit;
	
	} elseif($result1[setting]=="STANDARD_TEXT") {
		$si = 1;
		if (strlen($GLOBALS['STANDARD_TEXT'])>1) {
				print "<br>";
				$arr = split(",",$GLOBALS['STANDARD_TEXT']);
				foreach ($arr AS $row) {
					print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value='" . htmlentities2(stripslashes(base64_decode($row))) . "'><br>";
					$si++;
				}
			} else {
				print "<br>";
			}
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";

	} elseif($result1[setting]=="ShowMainPageLinks") {
		$si = 1;
		if (strlen($GLOBALS['ShowMainPageLinks'])>1) {
				print "<br>";
				$arr = split(",",$GLOBALS['ShowMainPageLinks']);
				foreach ($arr AS $row) {
					print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value='" . htmlentities2(stripslashes(base64_decode($row))) . "'><br>";
					$si++;
				}
			} else {
				print "<br>";
			}
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='stdtext[]' value=''><br>";

	} elseif($result1[setting]=="RSS_FEEDS") {
		$si = 1;
		
		/*
		Entities owned by user
			SELECT * FROM $GLOBALS['TBL_PREFIX']entity WHERE owner=''
		Entities assigned to user
			SELECT * FROM $GLOBALS['TBL_PREFIX']entity WHERE assignee=''
		All entities a user may see
			SELECT * FROM $GLOBALS['TBL_PREFIX']entity
		All non-deleted entities a user may see
			SELECT * FROM $GLOBALS['TBL_PREFIX']entity WHERE deleted<>'y'


		*/
		print "<br><br>Query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description";

		if (strlen($GLOBALS['RSS_FEEDS'])>1) {
				print "<br>";
				$arr = unserialize($GLOBALS['RSS_FEEDS']);
				foreach ($arr AS $row) {
					print $si . ".&nbsp;<input type=text size=70 name='rssfeeds[]' value=\"" . base64_decode($row['sql']) . "\">&nbsp;<input type=text size=70 name='rssdescriptions[]' value=\"" . base64_decode($row['description']) . "\"><br>";
					$si++;
				}
			} else {
				print "<br>";
			}
		print $si . ".&nbsp;<input type=text size=70 name='rssfeeds[]' value=''>&nbsp;<input type=text size=70 name='rssdescriptions[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='rssfeeds[]' value=''>&nbsp;<input type=text size=70 name='rssdescriptions[]' value=''><br>";
		$si++;
		print $si . ".&nbsp;<input type=text size=70 name='rssfeeds[]' value=''>&nbsp;<input type=text size=70 name='rssdescriptions[]' value=''><br>";

		print "<br>Examples: (click text to copy to clipboard) <br><br>";
		?>
		<TABLE>
		<TR>
			<TD>All entities a user may see</TD>
			<TD><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity');">SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity</a></TD>
		</TR><TR>
			<TD>All entities assigned to the viewing user</TD>
			<TD><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE assignee=\'@CURUSER@\'');">SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE assignee='@CURUSER@'</a></TD>
		</TR><TR>
			<TD>All entities owned by the viewing user</TD>
			<TD><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE owner=\'@CURUSER@\'');">SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE owner='@CURUSER@'</a></TD>		
		</TR><TR>
			<TD>All entities attached to customer 1</TD>
			<TD><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE CRMcustomer=\'1\'');">SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity WHERE CRMcustomer='1'</a></TD>
		</TR><TR>
			<TD><BR>Advanced: All entities having extra field id "201" set to<br>"Yes" and are coupled to customer "167"</TD>
			<TD><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('SELECT * FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity,<? echo $GLOBALS['TBL_PREFIX'];?>customaddons WHERE <? echo $GLOBALS['TBL_PREFIX'];?>entity.CRMcustomer=167 AND <? echo $GLOBALS['TBL_PREFIX'];?>entity.eid=<? echo $GLOBALS['TBL_PREFIX'];?>customaddons.eid AND <? echo $GLOBALS['TBL_PREFIX'];?>customaddons.name =\'201\' AND <? echo $GLOBALS['TBL_PREFIX'];?>customaddons.value =\'Yes\'');"><BR>SELECT *<BR>FROM <? echo $GLOBALS['TBL_PREFIX'];?>entity,<? echo $GLOBALS['TBL_PREFIX'];?>customaddons<BR>WHERE <? echo $GLOBALS['TBL_PREFIX'];?>entity.<? echo $GLOBALS['TBL_PREFIX'];?>customer=167<BR>AND <? echo $GLOBALS['TBL_PREFIX'];?>entity.eid=<? echo $GLOBALS['TBL_PREFIX'];?>customaddons.eid<BR>AND <? echo $GLOBALS['TBL_PREFIX'];?>customaddons.name ='201'<BR>AND <? echo $GLOBALS['TBL_PREFIX'];?>customaddons.value ='Yes'</a></TD>
			</TR>
		<TR><TD COLSPAN=2><BR><BR><B>A link called "RSS Feeds" will appear on the main page.</B></TD></TR>
		</TABLE>
		<?

	} elseif($result1[setting]=="EXTRAFIELDLOCATION") {
		
		if (strtoupper($result1[value])=="A") {
			$a = "SELECTED"; 
		} else {
			$b = "SELECTED";
		}
		print "</TD><TD><BR><SELECT NAME='data'>";
		print "<OPTION VALUE='A' $a>Just above text field</OPTION><OPTION VALUE='B' $b " . $no . ">Just above file list</OPTION><SELECT></TD></TR>";
		
	} else {
		if ((stristr($result1['setting'],"show") ||stristr($result1['setting'],"DISPLAYNUMSUMINMAINLIST")||stristr($result1['setting'],"CHECKFORDOUBLEADDS")||stristr($result1['setting'],"USE_EXTENDED_CACHE") || stristr($result1['setting'],"enable") || $result1['setting']=="DisplayNOToptioninfilters" || stristr($result1['setting'],"ALSO_PR") || stristr($result1['setting'],"auto") || stristr($result1['setting'],"CAL_USE") || stristr($result1['setting'],"BLOCK") || stristr($result1['setting'],"force") || stristr($result1['setting'],"letuser") || stristr($result1['setting'],"hide") || stristr($result1['setting'],"USEWAITINGANDDOESNTBELONGHERE") || stristr($result1['setting'],"FormFinity") || stristr($result1['setting'],"PDF") || stristr($result1['setting'],"langover")) && !stristr($result1['setting'],"recentedit") && ($result1['setting']<>"MonthsToShow") && ($result1['setting']<>"FORCEDFIELDSTEXT")) {
			

			if (strtoupper($result1[value])=="YES") {
				$yes = "SELECTED"; 
			} elseif (strtoupper($result1[value])=="ADMIN") {
				$admin = "SELECTED";
			} else {
				$no = "SELECTED";
			}
			
			if ($result1['setting']=="EnableRepositorySwitcher") {
				$option_insert = "<option " . $admin . ">Admin</option>";
			}
			print "</TD><TD><BR><SELECT NAME='data'><OPTION " . $yes . ">Sim</OPTION><OPTION " . $no . ">N�o</OPTION>" . $option_insert . "</TD></TR>";
			
		} elseif (stristr($result1['setting'],"dateformat")) {
			if (strtoupper($result1[value])=="DD-MM-YYYY") {
				$yes = "SELECTED"; 
			} else {
				$no = "SELECTED";
			}
			print "</TD><TD><BR><SELECT NAME='data'><OPTION " . $yes . ">dd-mm-yyyy</OPTION><OPTION " . $no . ">mm-dd-yyyy</OPTION></TD></TR>";

		} elseif (stristr($result1['setting'],"navtype")) {
			if (strtoupper($result1[value])=="TABS") {
				$yes = "SELECTED"; 
			} else {
				$no = "SELECTED";
			}
			print "</TD><TD><BR><SELECT NAME='data'><OPTION " . $yes . ">TABS</OPTION><OPTION " . $no . ">NOTABS</OPTION></TD></TR>";
		} elseif (stristr($result1['setting'],"managementinter")) {
			if (strtoupper($result1[value])=="ON") {
				$yes = "SELECTED"; 
			} else {
				$no = "SELECTED";
			}
			print "</TD><TD><BR><SELECT NAME='data'><OPTION " . $yes . ">On</OPTION><OPTION " . $no . ">Off</OPTION></TD></TR>";

		} else {
			print "</TD><TD><BR><INPUT TYPE='text' SIZE=70 NAME='data' VALUE=\"" . $result1[value] . "\"></TD></TR>";
		}
	}
	print "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><TD COLSPAN=3><BR><input type='hidden' name='udated' value='1'><input type='hidden' name='password' value='$password'><INPUT TYPE='submit' NAME='bt' VALUE='" . $lang[save] . "'>&nbsp;&nbsp;<input type='button' name='do' value='$lang[cancel]' Onclick=\"document.location='admin.php?sysval=1'\"></TD></TR>";
	print "</FORM></TABLE>";
	EndHTML();
	exit;
}

function check_reference_in_main_user_table_to_a_limited_account_name($limited_account_name_new) {

	$maxU1 = GetUserID($limited_account_name_new);
	if (!$maxU1[0]) {
		return("error");
	} else {
		return("ok");
	}
}
function fillout($var,$len) {
		while (strlen($var)<$len) {
				$var = $var . " ";
		}
		if ($var=="____0") {
			$var="_____";
		}
	return $var;
}
function filloutnum($var,$len) {
		while (strlen($var)<$len) {
				$var = "0" . $var;
		}
	return $var;
}
function nav() {
	global $lang,$logo,$ShowDeletedViewOption,$EnableCustInsert;
?>

<table border="0" width="100%"><tr><td>
<table border="0" width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top">
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[gotomainpage];?>' href='index.php?<?echo $epoch;?>'><? echo $lang[main];?></a> 
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[addcust];?>' href='edit.php?e=_new_&<?echo $epoch;?>'><? echo $lang[add];?></a> 
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[viewbrief];?>' href='index.php?ShowEntitiesOpen=1&<?echo $epoch;?>'><? echo $lang[entities];?></a>
<!-- <a class='bigsort' title='<? echo $lang[brieflistdel];?>' href='del.php'><? echo $lang[delentities];?></a> | -->

&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[vacc];?>' href='customers.php?<?echo $epoch;?>'><? echo $lang[customers];?></a>
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[dumpi];?>' href='csv.php?<?echo $epoch;?>'>CSV</a>
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[phonebook];?>' href='phonebook.php?<?echo $epoch;?>'><? echo $lang[phonebookshort];?></a>
&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[sumverb];?>' href='summary.php?<?echo $epoch;?>'><? echo $lang[summary];?></a>
<?
if ($ShowDeletedViewOption=="yes" || $ShowDeletedViewOption=="Yes") {
	print "&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='$lang[delentities]>' href='index.php?ShowEntitiesOpen=1&filter=viewdel&tab=$x'>$lang[delentities]</a>";
}
if ($EnableCustInsert=="yes" || $EnableCustInsert=="Yes") {	
	$sql= "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]entity.owner='2147483647' AND $GLOBALS[TBL_PREFIX]entity.assignee='2147483647' AND deleted<>'y'";
	$result= mcq($sql,$db);
    $e= mysql_fetch_array($result);

	print "&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='$lang[delentities]>' href='index.php?ShowEntitiesOpen=1&filter=custinsert&tab=$x'>$lang[viewinsertedentities]</a>  ($e[0])";
}

?>

&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='<? echo $lang[logout];?>' href='index.php?logout=1&<?echo $epoch;?>'><? echo $lang[logout];?></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<? echo $lang[entity];?>:&nbsp;<form name='direct' action='edit.php' method=POST><input type='text' size=3 name='e' OnChange='document.direct.submit()' value='' OnFocus="document.direct.e.value=''"></form>&nbsp;
<? echo $lang[search];?>:
<form name='direct2' action='summary.php' method=POST>
<input type='text' size=15 name='wildsearch' value='<? echo $wildsearch; ?>' OnChange='document.direct2.submit()' OnFocus="document.direct2.wildsearch.value=''">
<input type='hidden' name ='owner' value='all'>
<input type='hidden' name ='assignee' value='all'>
<input type='hidden' name ='$GLOBALS[TBL_PREFIX]customer' value='all'>
<input type='hidden' name ='duedate' value='all'>
<input type='hidden' name ='status'>
<input type='hidden' name ='prio'>
<input type='hidden' name ='waiting'>


</form>



<br>

<?
$today = date("F j, Y, H:i") . "h.";
//$result[value]=0;
$sql= "SELECT count(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE status='open'";
$result= mcq($sql,$db);
$result= mysql_fetch_array($result);
if ($result[0]) {
    print "$today $lang[thereare] <b>$result[0]</b> $lang[openentities].";
    } else {
    print "$today $lang[noopen]";
}

print "</td></tr></table>"; 
print "</td></tr></table>"; 
print "<table width='75%'>";
}

function internav() {
	global $lang, $epoch, $ShowPDWASLink, $LetUserEditOwnProfile;
?>	    <table border=0>
<?
		if (strtoupper($LetUserEditOwnProfile)=="YES") {
	?>
	<?
	}
	?>
	

		<?

			print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='admin.php?password=&adduser=1&userman=1'>Administra��o dos Usu�rios</a>&nbsp;<img src='lock.png'></td><td NOWRAP></td></tr>";
		//}
		
		$credentials = unserialize($GLOBALS['EMAILINBOX']);
		$GLOBALS['popuser'] = $credentials['popuser'];
		$GLOBALS['poppass'] = $credentials['poppass'];
		$GLOBALS['pophost'] = $credentials['pophost'];
		$GLOBALS['popvisi'] = $credentials['popvisi'];

		$personal_credentials = GetPersonaleMailCredentials($GLOBALS['USERID']);
		
		if (($GLOBALS['popuser'] && $GLOBALS['poppass'] && $GLOBALS['pophost']) || ($personal_credentials[0]['popuser'] && $personal_credentials[0]['poppass'] && $personal_credentials[0]['pophost'])) {
			if ($GLOBALS['popvisi'] == "everyone") {

				print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='wm.php?$epoch'>E-mail inbox</a></td><td NOWRAP>" . $GLOBALS['popuser'] . "@" . $GLOBALS['pophost'];
				if (isset($personal_credentials[0]['popuser'])) {
					print ", " . $personal_credentials[0]['popuser'] . "@" . $personal_credentials[0]['pophost'];
				}
				print "hier1</td></tr>";
			} elseif (($GLOBALS['popvisi'] == "admin" && is_administrator())) {
				
				if ($GLOBALS['pophost'] <> "") {
					print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='wm.php?$epoch'>E-mail inbox</a></td><td NOWRAP>";
					print $GLOBALS['popuser'] . "@" . $GLOBALS['pophost'];
					$sys=1;
				}
				if (isset($personal_credentials[0]['popuser'])) {
					if ($sys) {
						print ", ";	
					} else {
						print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='wm.php?popbox=pbox0&$epoch'>E-mail inbox</a></td><td NOWRAP>";
					}
					print $personal_credentials[0]['popuser'] . "@" . $personal_credentials[0]['pophost'];
				}
				print "</td></tr>";
			} elseif (isset($personal_credentials[0]['popuser'])) {
				print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='wm.php?popbox=pbox0$epoch'>E-mail inbox</a></td><td NOWRAP>" . $personal_credentials[0]['popuser'] . "@" . $personal_credentials[0]['pophost'] . "</td></tr>";
			}
		}

		if (is_administrator() && strtoupper($GLOBALS['EnableMailMergeAndInvoicing'])=="YES") {
			print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='invoice.php?$epoch'>$lang[invoiceandmailmerge]</a></td><td NOWRAP>$lang[genmailverbose]</td></tr>";
		}
		if (strtoupper($GLOBALS['EnableEntityReporting'])=="YES") {
			
		}
		if ($GLOBALS['RSS_FEEDS'] <> "") {
			print "<tr><td NOWRAP><img src='arrow.gif'>&nbsp;<a class='bigsort' title='' href='rss.php?avail=1'>RSS Feeds</a></td><td NOWRAP>List of available RSS-feeds</td></tr>";
		}
		?>
		
	


		<!-- <tr><td>
		<img src='arrow.gif'>&nbsp;<a OnClick='pophelp(13)' class='bigsort' style='cursor:pointer'>Disclaimer</a></td><td>
		<a OnClick='pophelp(14)' class='none'><font color='#000000'>S.O.B.</font></a> Disclaimer</td></tr> -->
		</table>

	<?
}

function prtsrc($tim) {
	global $search,$lang,$nonavbar,$HideCustomerTab;
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]phonebook";
	$result= mcq($sql,$db);

	$top= mysql_fetch_array($result);
		 print "<table><tr><td>";
	if (!$tim==1) {

	 print "$lang[pbcont1] $top[0] $lang[pbcont2].</td></tr>";   
	}
	print "<tr><td><form name='pb' method='POST' ACTION='phonebook.php'>";
	print "<br><table>";
	if (strtoupper($HideCustomerTab)=="YES" && GetClearanceLevel($GLOBALS[USERID])<>"administrator") {
		print "<tr><td>$lang[customers]:</td><td><input type='checkbox' class='radio' DISABLED name='PBwhere1' value='customers'> <img src='lock.png' style='border:0' title='Disabled by administrator'></td></tr>";
	} else {
		print "<tr><td>$lang[customers]:</td><td><input type='checkbox' class='radio' CHECKED name='PBwhere1' value='customers'></td></tr>";
	}
	print "<tr><td>$lang[phonebook1]:</td><td><input type='checkbox' class='radio' CHECKED name='PBwhere2' value='phonebook'></td></tr></table><br>";
	print "$lang[search]: <input type='text' class='searchx' name='search' OnChange='document.pb.submit()'> ";
	
	print "</td>";
	print "<td><center><input type='hidden' name='nonavbar' value='$nonavbar'><input type='hidden' name='zoek' value='Search'></form></td></tr></table><br>";
	if (!$tim==1) {
	 print "<img src='arrow.gif'>&nbsp;<a href='phonebook.php?nonavbar=$nonavbar&add=1' class='bigsort'>$lang[pbaddrec]</a>&nbsp;&nbsp;";
	}
	if (!$nonavbar) {
		print "<img src='arrow.gif'>&nbsp;<a Onclick='poppb()' style='cursor:pointer' class='bigsort'>$lang[openinnewwindow]</a>";
	}
	print "</center><br><br>";
	if ($tim=="0") {
	?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.pb.search.focus();
		//-->
		</SCRIPT>
		<?
	}
}
function DspSearchResults($search,$cust_insert) {
	global $nonavbar, $CustomerListColumnsToShow, $lang;
	prtsrc2("0");
	

	if ($nonavbar) {
		print "<hr>";
	}
	// timing
	$bla33 = date('U');
	
	if ($search=="%") {
		$all = true;
	}
	if ($_REQUEST['stashid']) {
		// Search query is stashed
		$query = PopStashValue($_REQUEST['stashid']);
	} elseif (($_REQUEST['search_name'] && !$_REQUEST['search']) || $all) {
		// A value was entered for the customer name. This overrules.
		$res_array = array();
		qlog("Base-name customer search");
		$sql = "SELECT id AS eid FROM $GLOBALS[TBL_PREFIX]customer WHERE custname LIKE '%" . $_REQUEST['search_name'] . "%'";
		//qlog($sql);
		$res = mcq($sql,$db);
		while ($row = mysql_fetch_array($res)) {
				if (!in_array($row['eid'],$res_array) && $row['eid']<>"" && $row['eid']<>0) {
					array_push($res_array,$row['eid']);
					//qlog("hit from customers -> " . $row['eid']);
					$hit = 1;
				} else {
					//qlog("hit from customers (ignoring) -> " . $row['eid']);
				}
		}
		$query = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE 1=0 ";
		foreach ($res_array AS $id) {
				$query .= " OR " . $GLOBALS[TBL_PREFIX] . "customer.id='" . $id . "' ";
				$eidc++;
		}
		//qlog($query);
	} else {

		// Query build-up, execute, and put into array.

		$wildsearch = $search;

		if ($wildsearch) {
			$wildsearch = addslashes($wildsearch);
			$wsupper = strtoupper($wildsearch);
		
			
				//$cust_insert .= " OR ($GLOBALS[TBL_PREFIX]entity.category LIKE '%$wildsearch%' OR $GLOBALS[TBL_PREFIX]entity.content LIKE '%$wildsearch%')";

				$ws_customer = "OR (custname LIKE '%$search%' OR contact LIKE '%$search%' OR contact_title LIKE '%$search%' OR contact_phone LIKE '%$search%' OR contact_email LIKE '%$search%' OR cust_address LIKE '%$search%' OR cust_remarks LIKE '%$search%' OR cust_homepage LIKE '%$search%') ORDER BY custname";

				$ws_customfields = "OR ($GLOBALS[TBL_PREFIX]customaddons.value LIKE '%$wildsearch%' AND $GLOBALS[TBL_PREFIX]customaddons.type='cust')";

				$ws_binfiles = "
				
				OR (	
						$GLOBALS[TBL_PREFIX]binfiles.type='cust' 
						AND
						$GLOBALS[TBL_PREFIX]binfiles.koppelid<>'0'
						AND
						$GLOBALS[TBL_PREFIX]binfiles.koppelid<>''

							AND	
								(
									$GLOBALS[TBL_PREFIX]binfiles.filename LIKE '%$wildsearch%'
								OR	
									UCASE($GLOBALS[TBL_PREFIX]blobs.content) LIKE BINARY '%$wsupper%' 
								OR	
									UCASE($GLOBALS[TBL_PREFIX]blobs.content) LIKE BINARY '%$wildsearch%' 

								OR 
									(
										$GLOBALS[TBL_PREFIX]binfiles.filename LIKE '%$wildsearch%'
										AND 
										$GLOBALS[TBL_PREFIX]binfiles.filetype<>'application/octet-stream' 
										AND filetype NOT LIKE '%image%'
									)
								)

					) AND $GLOBALS[TBL_PREFIX]binfiles.fileid=$GLOBALS[TBL_PREFIX]blobs.fileid";
			}

		
		
		$sql_src .= "<pre>\n";

		$res_array = array();

		// now execute all 3 queries, and put the eid results into an array, if it's not there already

		$q1 = "SELECT id AS eid FROM $GLOBALS[TBL_PREFIX]customer WHERE 1=0 " . $cust_insert1 . " " . $ws_customer;
//		print $q1;
		$res = mcq($q1,$db);
		$sql_src .= "\n". $q1;
		while ($row = mysql_fetch_array($res)) {
				if (!in_array($row['eid'],$res_array) && $row['eid']<>"" && $row['eid']<>0) {
					array_push($res_array,$row['eid']);
					//qlog("hit from customers -> " . $row['eid']);
					$hit = 1;
				} else {
					//qlog("hit from customers (ignoring) -> " . $row['eid']);
				}
		}


		if ($wildsearch) {
			foreach ($res_array AS $arf) {
				$ws_customfields .= " AND $GLOBALS[TBL_PREFIX]customaddons.eid<>" . $arf;
				//qlog("CUSTOMFIELDS: excluding $arf");
			}
			$q2 = "SELECT eid FROM $GLOBALS[TBL_PREFIX]customaddons WHERE 1=0 " . $ws_customfields;
			$sql_src .= "\n". $q2;
			$res = mcq($q2,$db);
			while ($row = mysql_fetch_array($res)) {
				if (!in_array($row['eid'],$res_array) && $row['eid']<>"" && $row['eid']<>0) {
					array_push($res_array,$row['eid']);
					//qlog("hit from custom fields -> " . $row['eid']);
					$hit = 1;
				} else {
					//qlog("hit from custom fields (ignoring) -> " . $row['eid']);
				}
			}
			foreach ($res_array AS $arf) {
				$ws_binfiles .= " AND $GLOBALS[TBL_PREFIX]binfiles.koppelid<>" . $arf;
				//qlog("BINFILES: excluding $arf");
			}
			$q3 = "SELECT koppelid AS eid FROM $GLOBALS[TBL_PREFIX]binfiles, $GLOBALS[TBL_PREFIX]blobs WHERE 1=0 " . $ws_binfiles;
			$sql_src .= "\n". $q3;
			$res = mcq($q3,$db);
			while ($row = mysql_fetch_array($res)) {
				if (!in_array($row['eid'],$res_array) && $row['eid']<>"" && $row['eid']<>0) {
					array_push($res_array,$row['eid']);
					//qlog("hit from attachments ->" . $row['eid']);
					$hit = 1;
				} else {
					//qlog("hit from attachments (ignoring) -> " . $row['eid']);
				}
			}
		}

		

		if ((sizeof($res_array)==0) && ($hit<>1 && !$wildsearch)) {
			qlog("FILLING ARRAY WITH ALL EIDS");
			$res_array = array();
			$sql = "SELECT id AS eid FROM $GLOBALS[TBL_PREFIX]customer";
			$res = mcq($sql,$db);
			while ($row = mysql_fetch_array($res)) {
				array_push($res_array,$row['eid']);
			}
		} elseif ($wildsearch && $hit<>1) {
			qlog("NO RESULTS! ($hit) ($wildsearch)");
			$no_results = 1;
		} elseif ($hit) {
			qlog("RESULTS FROM WILDSEARCH");
		}
		
		
				
		if (!$no_results) {
			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE 1=1 ";
				
			$ins_sql = "AND (1=0 ";

			// EXTRA FIELDS FILTER

			$list = GetExtraCustomerFields();

			//$q4 = "SELECT eid FROM $GLOBALS[TBL_PREFIX]customaddons WHERE 1=0 ";
			
			$res_array_filtered = array();
			$tmp_array = array();
			$res_array_wrong = array();

			foreach ($res_array AS $element) {
				// We have to process every proposed EID to see if it has extra fields attached 
				// which have values which are searched for.

				foreach ($list AS $field) {
						$element_f = "EFID" . $field['id'];
						if ($_REQUEST[$element_f]) {
							//qlog("Found " . $_REQUEST[$b64_item] . " which is $item");
							$ok = 1;
							// OK an extra field named $item was found in the search query
							$q4 = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust' AND eid='" . $element . "' AND name='" . $field['id'] . "' AND value='" . $_REQUEST[$element_f] . "'";
							$ef_res = mcq($q4,$db);
							$row = mysql_fetch_array($ef_res);
							if ($row['value']) {
								if (!in_array($element,$res_array_wrong) && !in_array($element,$res_array_filtered)) {
									array_push($res_array_filtered,$element);
									qlog("Adding $element");
								} else {
									qlog("NOT Adding $element (marked as dirty or already there)");
								}
							} else {
								for ($i=0;$i<sizeof($res_array_filtered);$i++) {
									if ($res_array_filtered[$i] == $element) {
										unset($res_array_filtered[$i]);
										qlog("Removing $element");
									} else {
										qlog("Not ok but nothing to remove (" . $element . ")");
									}
								}
								array_push($res_array_wrong,$element);
							}
						} else {
							//qlog("$b64_item not found in REQUEST");
						}
					
				}
			}
			
			if ($ok) {
				$res_array = $res_array_filtered;
				//print_r($res_array);
			}

			foreach ($res_array AS $id) {
				$ins_sql .= " OR " . $GLOBALS[TBL_PREFIX] . "customer.id='" . $id . "' ";
				$eidc++;
			}
			$ins_sql .= ")";
			
			if ($eidc) {
				$sql .= $ins_sql;
			} elseif (!$ok) {
				$sql .= " AND 1=1";
			} else {
				$sql .= " AND 1=0";
			}

			
			if ($includedeleted) {
		//			$outpmenu .= "Include deleted";
			} else { 
		//			$outpmenu .= "Don't include deleted";
				//$sql .= " AND $GLOBALS[TBL_PREFIX]customer.active='yes' ";
			}

			
		
			$query = $sql;

		} else { // end if !$no_results
			$query = "SELECT active FROM $GLOBALS[TBL_PREFIX]customer WHERE 1=0";
		}
	} // end if !$_REQUEST['search_name']
	
	

		$bla22 = date('U');
		$bla =  ($bla22 - $bla33);
		qlog("SECONDS _______________________ $bla");
// -------------------------- HIER MOET DE QUERY IN $QUERY ZITTEN

		
		if (!$_REQUEST['sortorder']) {
			$order = " ORDER BY $GLOBALS[TBL_PREFIX]customer.custname";
		} else {
			$order = " ORDER BY $GLOBALS[TBL_PREFIX]" . base64_decode($_REQUEST['sortorder']);
		}
		
		$id = PushStashValue($query . $order);
		$id_no = PushStashValue($query);

		// Add the order to the query (the order is NOT stored in the query in stash)
		$query .= $order;
//			print $query;
		print "<table border=0 width=100%><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[pbresults] '$search' &nbsp;[$lang[customers]]&nbsp;";

		if (strtoupper($GLOBALS['LetUserSelectOwnListLayout'])=="YES") {
			$CurURL = base64_encode(($_SERVER['PHP_SELF'] . "?" .$QUERY_STRING));
			print " <font size='-2'><img src='arrow.gif'>&nbsp;<a href='choose_cols.php?dothis=personal&what=CUST&cur=" . $CurURL . "' class='bigsort'>" . strtolower($lang['edit']) . "</a>&nbsp;</font>";
		}

		
		$export_t = "<a href='javascript:popExportWindow(\"" . $id . "\");' class='bigsort' title='Baixar resultados em formato Excel/CSV'><img style='border:0' src='excel_large.gif'></a>&nbsp;&nbsp;";
		$export_t .= "<a href=\"javascript:popPDFwindow('customers.php?pdf=1&close=1&stashid=" . $id . "');\" class='bigsort' title='Baixar resultados em formato PDF'><img style='border:0' src='pdf.gif'></a>&nbsp;&nbsp;";

		if ($GLOBALS['EnableMailMergeAndInvoicing']) {
			$export_t .= "&nbsp;";

			$export_t .= "";
		}
		print "</legend>";
		print "<table width='100%'><tr><td align='right'>" . $export_t . "<form name='formpje123' method='POST' ACTION='customers.php'><input type='hidden' name='zoek' value='Search'></td></tr></table>";
		print "<table width=100% class='crm'>";
		print "<td>CID</td>";

		if (!is_array($CustomerListColumnsToShow) || sizeof($CustomerListColumnsToShow)==0) {
			qlog("MQRUNTIME ERROR - You should set your Magic Quotes Runtime to 'Off' in your PHP.INI!");
			uselogger("MQRUNTIME ERROR - You should set your Magic Quotes Runtime to 'Off' in your PHP.INI! The entity and customer list will not display correct until you do.","");
			$CustomerListColumnsToShow['cb_custname'] = true;
		}

		
		if ($CustomerListColumnsToShow['cb_custname']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.custname") . "' class='bigsort'><b>" . $lang['customer'] . "</b></a>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.custname DESC") . "' class='bigsort'><b>" . $lang['customer'] . "</b></a>";
			}
			print "</td>";
		}
		if ($CustomerListColumnsToShow['cb_contact']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.contact") . "' class='bigsort'><b>" . $lang['contact'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.contact DESC") . "' class='bigsort'><b>" . $lang['contact'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_contact_title']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.contact_title") . "' class='bigsort'><b>" . $lang['contacttitle'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.contact_title DESC") . "' class='bigsort'><b>" . $lang['contacttitle'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_contact_phone']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.contact_phone") . "' class='bigsort'><b>" . $lang['contactphone'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.contact_phone DESC") . "' class='bigsort'><b>" . $lang['contactphone'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_contact_email']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.contact_email") . "' class='bigsort'><b>" . $lang['contactemail'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.contact_email DESC") . "' class='bigsort'><b>" . $lang['contactemail'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_cust_address']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.cust_address") . "' class='bigsort'><b>" . $lang['customeraddress'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.cust_address DESC") . "' class='bigsort'><b>" . $lang['customeraddress'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_cust_remarks']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.cust_remarks") . "' class='bigsort'><b>" . $lang['custremarks'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.cust_remarks DESC") . "' class='bigsort'><b>" . $lang['custremarks'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_cust_homepage']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.cust_homepage") . "' class='bigsort'><b>" . $lang['custhomepage'] . "</b></a></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.cust_homepage DESC") . "' class='bigsort'><b>" . $lang['custhomepage'] . "</b></a></td>";
			}
		}
		if ($CustomerListColumnsToShow['cb_active']) {
			if ($_REQUEST['DESC']) {
				print "<td><a href='customers.php?stashid=" . $id_no . "&sortorder=" . base64_encode("customer.active") . "' class='bigsort'><b>Ativo</b></td>";
			} else {
				print "<td><a href='customers.php?stashid=" . $id_no . "&DESC=1&sortorder=" . base64_encode("customer.active DESC") . "' class='bigsort'><b>Ativo</b></td>";
			}
		}

		$ExtraFieldsList = GetExtraCustomerFields();

		foreach ($ExtraFieldsList AS $field) {
			$element = "EFID" . $field['id'];
			
			if ($CustomerListColumnsToShow[$element]) {
				print "<td>" . $field['name'];
				print "<br><select OnChange='javascript:document.formpje123.submit()' name='" . $element . "'><option value=''>" . $lang['all'] . "</option>";

				$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' AND type='cust' ORDER BY value";
				$result2 = mcq($sql,$db);
				$done = array();
				while ($result = mysql_fetch_array($result2)) {
					if (!in_array($result['value'],$done) && $result['value']<>"") { 
						if ($_REQUEST[$element] == $result['value']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						
						if (strstr($field['fieldtype'],"User-list")) {
							print "<option $ins value='" . $result['value'] . "'>" . GetUserName($result['value']) . "</option>";
						} else {
							print "<option $ins>" . $result['value'] . "</option>";
						}
						
						array_push($done, $result['value']);
					}
				
				}
				
				print "</select></td>";
			}
		}

		print "<td>" . $lang['add'] . "&nbsp;</td>";		
		print "<td>" . $lang['entities'] . "</b></a></form></td>";		
		print "</tr>";
		$numof = array();
		$sql = "select CRMcustomer, count(*) from " . $GLOBALS['TBL_PREFIX'] . "entity group by CRMcustomer";
		$res = mcq($sql, $db);
		while ($row = mysql_fetch_array($res)) {
			$numof[$row['CRMcustomer']] = $row[1];
		}

		$result = mcq($query,$db);
		while ($pb= mysql_fetch_array($result)) {

				$auth = CheckCustomerAccess($pb['id']);
								
				if ($auth == "ok" || $auth == "readonly") {
				
					$a = "<tr onmouseover=\"style.background='#CCCCCC';\"  onmouseout=\"style.background='#FFFFFF';\">";

					$a .= "<td>" . $pb['id'] . "</td>";

					if ($CustomerListColumnsToShow['cb_custname']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['custname'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_contact']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['contact'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_contact_title']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['contact_title'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_contact_phone']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['contact_phone'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_contact_email']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['contact_email'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_cust_address']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['cust_address'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_cust_remarks']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['cust_remarks'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_cust_homepage']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['cust_homepage'] . "&nbsp;</td>";
					}
					if ($CustomerListColumnsToShow['cb_active']) {
						$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $pb['active'] . "&nbsp;</td>";
					}

					if (sizeof($ExtraFieldsList)>0 && $ExtraFieldsList[0]<>"") {
							foreach ($ExtraFieldsList AS $field) {
								$element = "EFID" . $field['id'];
								if ($CustomerListColumnsToShow[$element]) {
									$outpmenu .= "<select name='" . $element . "'><option value=''>" . $lang['all'] . "</option>";
					
									$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='" . $pb[id] . "' AND name='" . $field['id'] ."' AND type='cust' LIMIT 1";
									
									$result33 = mcq($sql,$db);
									$gh = mysql_fetch_array($result33);
									if (stristr($list[$x],"TB_")) {
										$gh[0] = eregi_replace("\n","<BR>",$gh[0]);
									}
									
									if ($field['fieldtype'] == "text area") {
										$gh[0] = eregi_replace("\n","<BR>",$gh[0]);
									}
									if ($field['fieldtype'] == "date") {
										$gh[0] = TransFormDate($gh[0]);
									} elseif (strstr($field['fieldtype'],"User-list")) {
										$gh[0] = GetUserName($gh[0]);
									}
									$a .= "<td style='cursor:pointer' OnClick='gobla(" . $pb[id] . ");'>" . $gh[0] . "&nbsp;</td>";
									
								}
							}
					}

					$a .= "<td><img src='arrow.gif'>&nbsp;<a href='edit.php?e=_new_&tab=22&SetCustTo=" . $pb['id'] . "' class='bigsort'>$lang[pbaddrec]</a></td>";

					//$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer='" . $pb['id'] . "' AND 1=1";
					//$res = mcq($sql,$db);
					//$row = mysql_fetch_array($res);
					//$num = $row[0];

					$a .= "<td><img src='arrow.gif'>&nbsp;<a href='index.php?ShowEntitiesOpen=1&pdfiltercustomer=" . $pb['id'] . "' class='bigsort'>" . $lang['entities'] . "</a> (" . $numof[$pb['id']] . ")</td>";
					$a .= "</tr>";
					print $a;
					unset($a);
					$teller++;
				}

		}			
		
		if ($teller>25) {
			prtsrc2("1");
		} 

		if ($teller==0) {
			print "<tr><td colspan=20>$lang[noresults]</td></tr>";
		} else {
			print "<tr><td colspan=20>$teller $lang[resfound]</td></tr>";
		}		
		print "</table>";


		print "</fieldset></td></tr></table>";
		$teller=0;

} // end if $search


function prtsrc2($tim) {
	global $search,$lang,$nonavbar,$maxcust;

	if (!$search) $search = "%";
	print "<table width='100%' border=0>";
	if (!$tim==1) {
		print "<tr><td>&nbsp;&nbsp;<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[customers]&nbsp;</legend><table><tr><td>$lang[custindb]: $maxcust</td><td>&nbsp;</td></tr>";
		print "<tr><td><form name='pb' method='GET' ACTION='customers.php'>";
		$std = $search;
		if ($std=="%") $std = "";
	
		if (!$store) {
			$store = base64_encode("SELECT * FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname");
		}
		$store = "";


		print "<table><tr><td>$lang[search] ($lang[customer])</td><td colspan=2><input class='searchx' type='text' name='search_name' value=''></td></tr>";	
		print "<tr><td>$lang[search] ($lang[all])</td><td><input class='searchx' type='text' name='search' value=''></td></tr>";
		print "<td>CID:</td><td><input type='text' name='c_id' value='' size=4><input type='hidden' name='det' value='1'></td></tr><tr><td colspan=2><input type='submit' value='Buscar'></td></tr></table>";
		print "<input type='hidden' name='uitgeklapt' value=''>";
		print "<br><br><img src='arrow.gif'>&nbsp;<a href='customers.php?nonavbar=$nonavbar&add=1' class='bigsort'>$lang[addcust]</a><br>&nbsp;&nbsp;&nbsp;";
		print "<td><center><input type='hidden' name='nonavbar' value='$nonavbar'><input type='hidden' name='zoek' value='Search'></td></tr>";
		print "<tr><td colspan=2><div id='Advanced' style='display: none'>";
		print "<table>";
		$list = GetExtraCustomerFields();
		
		

		foreach ($list as $field) {
				if (($field['fieldtype'] <> "List of values") && ($field['fieldtype'] <> "text area") && ($field['fieldtype'] <> "text area (rich text)")) {
					$element = "EFID" . $field['id'];
				
					$outpmenu .= "<tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;" . $field['name'] . "&nbsp;</legend>";
					$outpmenu .= "<select name='" . $element . "'><option value=''>" . $lang['all'] . "</option>";
					
					$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . $field['id'] . "' AND type='cust'";
					$result2 = mcq($sql,$db);
					$done = array();
					while ($result = mysql_fetch_array($result2)) {
						if (!in_array($result['value'],$done)) { 
							if ($_REQUEST[$element] == $result['value']) {
								$ins = "SELECTED";
							} else {
								unset($ins);
							}
							$outpmenu .= "<option $ins>" . $result['value'] . "</option>";
							array_push($done, $result['value']);
						}
					
					}
					
					$outpmenu .= "</select></td></tr>";
				}
		}
	
//			$outpmenu .= "<tr><td colspan=4><table>";
	
		print $outpmenu;
		print "<tr><td><input type='submit' value='Show'></td></tr>";
		print "</div></table>";
		print "</form></td></tr></table></fieldset><br></td></tr></table>";
		print "</table>";
		if ($_REQUEST['uitgeklapt'] == 1) {
			?>
			<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
			<!--
				showLayer("Advanced");
			//-->
			</SCRIPT>
			<?
		}
		?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
			document.pb.search_name.focus();
		//-->
		</SCRIPT>
		<?
	} else {
		//print "<tr><td><form name='pb' method='GET' ACTION='customers.php'>";
		//print "$lang[search]: <input type='text' name='search' value='" . $search . "' OnChange='document.pb.submit()'></form></td></tr>";
	}

}
function DisplayMangementInformationForm($stashid)
{
   global $sqlcounter,$password,$summary,$entities_owned_by_users,$entities_assigned_to_users,$lang;
   global $sqlcounter,$self_assigned,$didntbelonghere,$elseaction,$entities_per_customer,$overdue_per_assignee;
   global $Top10_Most_active, $Top10_Most_active_users, $Top20_Most_Slow, $Top20_Most_Slow_Deleted, $Top10_Most_active_users_uselog;

   print "<table><tr><td>$lang[smtsm]<table><form name=mi method='POST'>";
   
   if (!$stashid) {
	   print "<tr><td colspan=3><img src='pdf.gif'>&nbsp;<a class='bigsort' href=\"javascript:popPDFwindow('mansumpdf2.php')\">$lang[dlmspdf].</a>&nbsp;&nbsp;</i><br><br></td></tr>";
   }
   if ($summary=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<tr><td><input type='checkbox' name='summary' $tmp> $lang[oqs]</td>";
   if ($entities_owned_by_users=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<td><input type='checkbox' name='entities_owned_by_users' $tmp> $lang[eobu]</td>";
   if ($entities_assigned_to_users=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<tr><td><input type='checkbox' name='entities_assigned_to_users' $tmp> $lang[eatu]</td>";
   if ($self_assigned=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<td><input type='checkbox' name='self_assigned' $tmp> $lang[sae]</td>";
  // if ($didntbelonghere=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
//   print "<tr><td><input type='checkbox' name='didntbelonghere' $tmp> $lang[etdbh]</td>";
  // if ($elseaction=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   //print "<td><input type='checkbox' name='elseaction' $tmp> $lang[ewfsea]</td>";
   if ($entities_per_customer=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<tr><td><input type='checkbox' name='entities_per_customer' $tmp> $lang[epc]</td>";
   if ($overdue_per_assignee=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<td><input type='checkbox' name='overdue_per_assignee' $tmp> $lang[oepa]</td></tr>";
	if ($Top10_Most_active=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<tr><td><input type='checkbox' name='Top10_Most_active' $tmp> Top20 $lang[entities]</td>";
   if ($Top10_Most_active_users=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<td><input type='checkbox' name='Top10_Most_active_users' $tmp> Top20 $lang[users]&nbsp;&nbsp;";
   if ($Top10_Most_active_users_uselog=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<input type='checkbox' name='Top10_Most_active_users_uselog' $tmp> Top20 $lang[users] (uselog)</tr>";
   if ($Top20_Most_Slow=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<tr><td><input type='checkbox' name='Top20_Most_Slow' $tmp> Top20 slow open $lang[entities]</td>";
   if ($Top20_Most_Slow_Deleted=='on') { $tmp = "CHECKED"; } else { $tmp = ""; }
   print "<td><input type='checkbox' name='Top20_Most_Slow_Deleted' $tmp> Top20 slow $lang[deleted] $lang[entities]</td></tr>";
   
	
	if ($stashid) {
		print "<tr><td><br><font color='#FF0000'>" . $lang['alreadyselected'] . "</font></td></tr>";
	}

   print "<tr><td><br><input type='hidden' name='password' value='$password'><input type='hidden' name='qid' value='$stashid'>";

   print "<input type='submit' name='knop' value='Report information'>";
   print "&nbsp;<img src='arrow.gif'>&nbsp;<a href='$PHP_SELF?password=$password' class='bigsort'>clear all</a></td></tr>";
   if (!$stashid) {
		print "<tr><td><br>Available statistic images:</td></tr>";
			$year = date("Y");
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=mp');\">Added vs. deleted per month</a></td></tr>";
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=wp');\">Added vs. deleted per week</a></td></tr>";
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=psp');\">Status pie diagram</a></td></tr>";
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=pspo');\">Status pie diagram (open " . $lang['entities'] . " only)</a></td></tr>";
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=apu');\">Activity per user pie diagram</a></td></tr>";
		print "<tr><td><img src='arrow.gif'>&nbsp;<a href=\"javascript:poplittlewindow('superstats.php?year=$year&type=epc');\">" . $lang['entities'] . "  per " . $lang['customer'] . " pie diagram</a></td></tr>";
   }   
   print "</form></tr></td></table></td></tr></table>";

   
} // end func

function ManagementInformationSummary($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$waiE,$password,$maxEoNc,$lang;
//	print "</table><table>";
	if ($qid) {
		$q = PopStashValue($qid);
		$andstring = "AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
		foreach ($q AS $eid) {
				$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
		}
		$andstring .= $q[0] . ")";
		$wherestring = "WHERE 1=1 " . $andstring;
	}
	

	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[oqs]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>&nbsp;</legend><table border=0>";
	print "<tr><td colspan=4>$lang[allround]</td></tr>";
	print "<tr><td>$lang[entities]</td><td>$maxE</td></tr>";
	print "<tr><td><i>$lang[ofwhich]</i></td></tr>";
	
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
	$result= mcq($sql,$db);
    while ($e= mysql_fetch_array($result)) {
		
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE status='$e[varname]' " . $andstring;
				qlog($sql);
			$result1= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($result1);

			$bla = $maxU1[0];

			$pc1 = ($maxEo/100); // dit is 1 procent
		
			$pc2 = ($bla/100); // dit is 1 procent van not [deleted]
			
			$apc = round($bla/$pc1); // dit is het percentage
			
			print "<tr><td bgcolor='" . $e['color'] . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$e[varname]</td><td width=\"20%\">$bla</td><td width=\"20%\">$apc%</td></tr>";	
			$totaal=$totaal+$bla;
	}
	if ($totaal<>$MaxE) {
		$bla = $maxE - $totaal;
		$apc = round($bla/$pc1); // dit is het percentage
		print "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unknown</td><td width=\"20%\">$bla</td><td width=\"20%\">$apc%</td></tr>";	
	}
	$apc = round($delE/$pc1); // dit is het percentage
	print "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$lang[deleted] </td><td>$delE</td><td>n/a</td></tr>";
	print "<tr><td>&nbsp;</td></tr>";


	$apc = round($expE/$pc1); // dit is het percentage
	if ($apc>30) { 
		$a1 = "<font color='ff0000'>";
		$a2 = "</font>";
	} else {
		unset($a1);
		unset($a2);
	}

	
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]priorityvars ORDER BY varname";
	$result= mcq($sql,$db);
    while ($e= mysql_fetch_array($result)) {
		
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE priority='$e[varname]' " . $andstring;
			$result1= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($result1);

			$bla = $maxU1[0];

			$pc1 = ($maxEo/100); // dit is 1 procent
		
			$pc2 = ($bla/100); // dit is 1 procent van not [deleted]
			
			$apc = round($bla/$pc1); // dit is het percentage
			
			print "<tr><td bgcolor='" . $e['color'] . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$e[varname]</td><td width=\"20%\">$bla</td><td width=\"20%\">$apc%</td></tr>";	
			$totaal=$totaal+$bla;
	}

	print "<tr><td>&nbsp;</td></tr>";
	print "<tr><td>$lang[edd]</td><td>$expE</td><td>$a1$apc%$a2</td></tr>";
	
	$apc = round($obsE/$pc1); // dit is het percentage
	if ($apc>30) { 
		$a1 = "<font color='ff0000'>";
		$a2 = "</font>";
	} else {
		unset($a1);
		unset($a2);
	}

	//print "<tr><td>$lang[dontbelonghere]</td><td>$obsE</td><td>$a1$apc%$a2</td></tr>";
	$apc = round($waiE/$pc1); // dit is het percentage
		if ($apc>30) { 
		$a1 = "<font color='ff0000'>";
		$a2 = "</font>";
	} else {
		unset($a1);
		unset($a2);
	}

	//print "<tr><td>$lang[ewfsea]</td><td>$waiE</td><td>$a1$apc%$a2</td></tr>";
	print "<tr><td>&nbsp;</td></tr>";
	$weeknumber = date("W");
	$sqlcounter++;
	$sql = "SELECT eid,cdate FROM $GLOBALS[TBL_PREFIX]entity";
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$year = date("Y");
				if ($tjaar == $year) {

						$tmaand = substr($t,5,2);
						$tdag = substr($t,8,2);
						$tmp = date ("W", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
						if ($weeknumber == $tmp) {
							$thisweek++;
						}
				}
		}
	if (!$thisweek) { $thisweek=0; }
	print "<tr><td>$lang[eatw] ($weeknumber):</td><td>$thisweek</td></tr>";


// CLOSED THIS WEEK

	$sql = "SELECT closeepoch FROM $GLOBALS[TBL_PREFIX]entity " . $wherestring;
	$result = mcq($sql,$db);
	
	  while ($e2= mysql_fetch_array($result)) {
				
				if ($e2['closeepoch']<>"") {
					$c_week = date("W", $e2['closeepoch']);
					$c_month = date("m", $e2['closeepoch']);

					$t_week = date("W");
					$t_month = date("m");
					if ($c_month == $t_month) {
						$thisDELmonth++;
					}
					if ($c_week == $t_week) {
						$thisDELweek++;
					}
				}
		}
	if (!$thisDELweek) { $thisDELweek=0; }
	print "<tr><td>$lang[ectw] ($weeknumber):</td><td>$thisDELweek</td></tr>";

	$month = date("F");
	$sqlcounter++;
	$sql = "SELECT eid,cdate FROM $GLOBALS[TBL_PREFIX]entity " . $wherestring;
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$year = date("Y");
				if ($tjaar == $year) {

						$tmaand = substr($t,5,2);
						$tdag = substr($t,8,2);
						$tmp = date ("F", @mktime (0,0,0,$tmaand,$tdag,$tjaar));

		//				print $tmp;
						if ($month == $tmp) {
							$thismonth++;
						}
				}
		}
	if (!$thismonth) { $thismonth=0; }
	print "<tr><td>$lang[eatm] ($month):</td><td>$thismonth</td></tr>";
	$month = date("F");
	$sqlcounter++;
	
	if (!$thisDELmonth) { $thisDELmonth=0; }
	print "<tr><td>$lang[ectm] ($month):</td><td>$thisDELmonth</td></tr>";
	print "<tr><td><img src='arrow.gif'>&nbsp;<a href='$PHP_SELF?password=$password&summonth=1' class='bigsort'>Whole year summary</a></tr>";

	$sqlcounter++;
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE cdate<>'0000-00-00' AND closedate<>'0000-00-00' AND deleted='y' " . $andstring;
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[closedate];
				$tjaar = substr($t,0,4);
				$tmaand = substr($t,5,2);
				$tdag = substr($t,8,2);
				$tmp = date ("U", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$tmaand = substr($t,5,2);
				$tdag = substr($t,8,2);
				$tmp2 = date ("U", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
				$avg = $avg + round((($tmp-$tmp2)/86400));
				$avgc++;
	}

	print "<tr><td>&nbsp;</td></tr>";


	//print "<i>$lang[cuaeoay].</i></td></tr>";
	

	print "<tr><td>$lang[users]</td><td>$maxU</td></tr>";
	print "<tr><td>$lang[customers]</td><td>$maxC</td></tr>";

	print "<tr><td>&nbsp;</td></tr>";
	if (strtoupper($GLOBALS['ForceCategoryPulldown'])=="YES") {
       print "<tr><td><B>Category</B></td></tr>";
       $sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='Category pulldown list'";
       $result = mcq($sql,$db);
       $list = mysql_fetch_array($result);
       $list = $list[value];
       $list = @explode(",",$list);              if (sizeof($list)>0 && $list[0]<>"") {
               for ($t=0;$t<sizeof($list);$t++) {
                   $option = $list[$t];
                   print "<td></td><td width=\"20%\">" . $option . "&nbsp;</td><td width=\"20%\">";
                   $sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE category='" . $option . "' " . $andstring;
                   $result1= mcq($sql,$db);
                   $tmp2 = mysql_fetch_array($result1);
                   print $tmp2[0];
                   print "&nbsp;</td></tr>";                  }
           }
       print "<tr><td>&nbsp;</td></tr>";
   } 
   if ($GLOBALS['FormFinity'] == "Yes") {
		print "<tr><td><b>Form breakdown</b></td></tr>";

			print "<tr><td></td><td width=\"20%\">Default&nbsp;</td><td width=\"20%\">";
			$num = db_GetRow("SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE formid=0 " . $andstring);
			print $num[0];
			$num[0] = 0;
			"</td></tr>";

		
		$res = mcq("SELECT fileid, file_subject FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype='TEMPLATE_HTML_FORM'", $db);
		while ($row = mysql_fetch_array($res)) {

			print "<tr><td></td><td width=\"20%\">" . $row['file_subject'] . "&nbsp;</td><td width=\"20%\">";
			$num = db_GetRow("SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE formid=" . $row['fileid'] . " " . $andstring);
			print $num[0];
			$num[0] = 0;
			"</td></tr>";
		}


		print "</td></tr>";
	}
	print "<tr><td><B>Extra entity drop-down fields breakdown</B></td></tr>";

	$f_ar = GetExtraFields();

	foreach ($f_ar AS $field) {
		if ($field['fieldtype'] == "drop-down") {
			print "<tr><td colspan=4>" . $field['name'] . "</td></tr>";
			$tmp = unserialize($field['options']);
			foreach($tmp AS $option) {
				print "<td></td><td width=\"20%\">" . $option . "&nbsp;</td><td width=\"20%\">";
				
				$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customaddons WHERE $GLOBALS[TBL_PREFIX]entity.eid = $GLOBALS[TBL_PREFIX]customaddons.eid AND name='" . $field['id'] . "' AND value='" . $option . "' " . $andstring;
				$result1= mcq($sql,$db);
				$tmp2 = mysql_fetch_array($result1);
				print $tmp2[0];
				print "&nbsp;</td></tr>";	
			}
			//<td width=\"20%\">" . $yt . "&nbsp;</td><td width=\"20%\">" . $yt . "&nbsp;</td></tr>";	
		}
	}
	print "</tr>";
	
	print "</table></fieldset>";
} // end func

function entities_owned_by_users($qid) {
		global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;
		print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[eobu]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
		print "<tr><td colspan=4>$lang[zoilo]</td></tr>";
		print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
		print "<tr><td><b>$lang[owner]</b></td><td><b>Open<b></td><td><b>$lang[deleted]</b></td><td><b>$lang[total]</b></td><td><b>%</b></td><td>% bar</td></tr>";
		
		if ($qid) {
		$q = PopStashValue($qid);
		$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
		foreach ($q AS $eid) {
				$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
		}
		$andstring .= $q[0] . ")";
		$wherestring = "WHERE 1=1 " . $andstring;
		}

		$sqlcounter++;
		$sql = "SELECT id,FULLNAME FROM $GLOBALS[TBL_PREFIX]loginusers ORDER BY name";
		$result= mcq($sql,$db);
		
		while ($id = mysql_fetch_array($result)) {
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE owner='$id[id]' " . $andstring;
			$pr1 = mcq($sql,$db);
			$pr = mysql_fetch_array($pr1);

			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE owner='$id[id]' AND deleted='y'" . $andstring;
			$pr1 = mcq($sql,$db);
			$prD = mysql_fetch_array($pr1);


			$pc1 = ($maxE/100); // dit is 1 procent
			$apc = round($pr[0]/$pc1); // dit is het percentage

			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND owner='$id[id]'" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$open = $maxU1[0];


			if (!$pr[0]==0) {	
			print "<tr><td>$id[FULLNAME]</td><td>$open</td><td>$prD[0]</td><td>$pr[0]</td><td>$apc%</td><td width='100'><img src='pixel.gif' width='$apc' height=10></td></tr>\n";}

	}
	print "</table></fieldset>";
} // end func



function entities_assigned_to_users($qid)
{
   	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[eatu]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0 width='100%'>";
	print "<tr><td colspan=4>$lang[zailo]</td></tr>";

	print "<tr><td><table width='100%' border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE'>";
	print "<tr><td><b>$lang[assignee]</b></td><td><b>Open<b></td><td><b>$lang[deleted]</b></td><td><b>$lang[total]</b></td><td><b>%</b></td><td>% bar</td></tr>";

	$sqlcounter++;
	$sql = "SELECT id FROM $GLOBALS[TBL_PREFIX]loginusers ORDER BY name";
	$result= mcq($sql,$db);
	
	while ($id = mysql_fetch_array($result)) {
		$sqlcounter++;
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE assignee='$id[id]'" . $andstring;
		$pr1 = mcq($sql,$db);
		$pr = mysql_fetch_array($pr1);
		$sqlcounter++;
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE assignee='$id[id]' AND deleted='y'" . $andstring;
		$pr1 = mcq($sql,$db);
		$prD = mysql_fetch_array($pr1);
		$pc1 = ($maxE/100); // dit is 1 procent
		$apc = round($pr[0]/$pc1);


		$sqlcounter++;
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND assignee='$id[id]'" . $andstring;
		$resul1t= mcq($sql,$db);
		$maxU1 = mysql_fetch_array($resul1t);
		$open = $maxU1[0];


		if (!$pr[0]==0) {	
			print "<tr><td>" . GetUserName($id['id']) . "</td><td>$open</td><td>$prD[0]</td><td>$pr[0]</td><td>$apc%</td><td width='100'><img src='pixel.gif' width='$apc' height=10></td></tr>\n";}

	}
	print "</table></tr></td></table></fieldset>";
} // end func



function self_assigned($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[sae]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
	print "<tr><td colspan=4>$lang[ombla]</td></tr>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>$lang[owner] (<b>$lang[andassignee]</b>)</td><td><b>$lang[selfassig]</b></td><td><b>%</b></td></tr>";
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	$sqlcounter++;
	$sql = "SELECT DISTINCT owner FROM $GLOBALS[TBL_PREFIX]entity WHERE $GLOBALS[TBL_PREFIX]entity.owner=$GLOBALS[TBL_PREFIX]entity.assignee AND deleted<>'y' ORDER BY owner";
	$result= mcq($sql,$db);
		while ($id = mysql_fetch_array($result)) {

			$sqlcounter++;

			$name = GetUserName($id['owner']);

			if (trim($name)=="") {
					$name = $id[owner];
			} 
			if ($name=="2147483647") {
					$name = "[unassigned]";
			}
		
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND owner='$id[owner]'" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top1 = $maxU1[0];
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND owner='$id[owner]' AND $GLOBALS[TBL_PREFIX]entity.owner=$GLOBALS[TBL_PREFIX]entity.assignee" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top2 = $maxU1[0];

			$top1pc = $top1 / 100;
			$top2pc = @round($top2 / $top1pc);
		if ($top2<>0 && $top1<>0){
			print "<tr><td>$name</td><td>$top2 out of $top1</td><td>$top2pc%</td></tr>";
		}
		}
	print "</table>";
	print "$lang[aohnsae]</fieldset>";
    
} // end func

function overdue_per_assignee($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$cdate,$lang;
	
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[oepa]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";

	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	print "<tr><td><b>$lang[assignee]</b></td><td><b>Overdue</b></td><td><b>%</b></td></tr>";

	$sqlcounter++;
	$sql = "SELECT DISTINCT assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE sqldate<'$cdate' AND status<>'close' AND deleted<>'y' " . $andstring . " ORDER BY assignee";
	$result= mcq($sql,$db);
		while ($id = mysql_fetch_array($result)) {

			$name = GetUserName($id['assignee']);

			if ($name=="2147483647") {
					$name = "[unassigned]";
			}

			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND status<>'close' AND assignee='$id[assignee]'" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top1 = $maxU1[0];
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND status<>'close' AND assignee='$id[assignee]' AND sqldate < '$cdate'" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top2 = $maxU1[0];

			$top1pc = $top1 / 100;
			$top2pc = round($top2 / $top1pc);

		print "<tr><td>$name</td><td>$top2 out of $top1</td><td>$top2pc%</td></tr>";
		}
	print "</table>";
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE sqldate<'$cdate' AND status<>'close'" . $andstring;
	$resul1t= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($resul1t);
	$top3 = $maxU1[0];
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE status<>'close'" . $andstring;
	$result= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($result);
	$maxNC = $maxU1[0];
		$tmp = $maxNC / 100;
		$prt = round($top3 / $tmp);

	print "<br>$lang[onavarage] $prt% of all entities is overdue.";
	print "Other assignees have no overdue entities.</fieldset>";
    
} // end func



function didntbelonghere($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;

	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[etdbh]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>$lang[owner]</td><td><b>$lang[etdbh]</b></td><td><b>%</b></td></tr>";
	
	$sqlcounter++;
	$sql = "SELECT DISTINCT owner FROM $GLOBALS[TBL_PREFIX]entity WHERE obsolete='y' AND deleted<>'y' ORDER BY owner";
	$result= mcq($sql,$db);
		while ($id = mysql_fetch_array($result)) {

			$name = GetUserName($id['owner']);

			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND owner='$id[owner]'";
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top1 = $maxU1[0];
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND owner='$id[owner]' AND obsolete='y'";
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top2 = $maxU1[0];

			$top1pc = $top1 / 100;
			$top2pc = round($top2 / $top1pc);
			
			print "<tr><td>$name</td><td>$top2 out of $top1</td><td>$top2pc%</td></tr>";
		}
	print "</table>";
	$sqlcounter++;
	$sqlcounter++;
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y'";
	$result= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($result);
	$maxtmp = $maxU1[0];
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE obsolete='y' AND status='open'";
	$resul1t= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($resul1t);
	$top3 = $maxU1[0];
		
		$tmp = $maxtmp / 100;
		$prt = @round($top3 / $tmp);

	print "$lang[onavarage] $prt% $lang[oaoedbh].</fieldset>";
} // end func



function elseaction($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[ewfsea]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";

	print "<tr><td><b>$lang[assignee]</td><td><b>$lang[ewfsea]</b></td><td><b>%</b></td></tr>";

	$sqlcounter++;
	$sql = "SELECT DISTINCT assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE waiting='y' AND deleted<>'y' ORDER BY assignee";
	$result= mcq($sql,$db);
		while ($id = mysql_fetch_array($result)) {


			$name = GetUserName($id['assignee']);

			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND assignee='$id[assignee]'";
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top1 = $maxU1[0];
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND assignee='$id[assignee]' AND waiting='y'";
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$top2 = $maxU1[0];
			$top1pc = $top1 / 100;
			$top2pc = @round($top2 / $top1pc);

		print "<tr><td>$name</td><td>$top2 out of $top1</td><td>$top2pc%</td></tr>";
		}
	print "</table>";
	$sqlcounter++;
$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE waiting='y'";
	$resul1t= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($resul1t);
	$top3 = $maxU1[0];
		
		$tmp = $maxE / 100;
		$prt = round($top3 / $tmp);

	print "$lang[onavarage] $prt% of all entities is waiting for somebody else's action.</fieldset>";
} // end func

function Top20_Most_Slow($qid) {
	global $lang;
	$now = date('U');
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Top20 slow open " . $lang['entities'] . "";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>EID<b></td><td><b>" . $lang['customer'] ."<b></td><td>" . $lang['category'] . "</td><td><b>Age</td></tr>";
	
	$sql = "select eid,$GLOBALS[TBL_PREFIX]customer.custname AS customer,category AS cat,COUNT(*), (" . $now . "-openepoch) AS ep FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]entity.CRMcustomer = $GLOBALS[TBL_PREFIX]customer.id AND deleted<>'y' AND (" . $now . "-openepoch)>0 AND openepoch<>'' " . $andstring . " GROUP BY ep ORDER BY ep DESC LIMIT 20";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		$auth = CheckEntityAccess($row['eid']);
		if ($auth == "ok" || $auth=="readonly") {

			// Calculate age
			$age_in_seconds = $row['ep'];

			if ($age_in_seconds>86400) {
				$age = round($age_in_seconds/86400,2) . " days";
			} elseif ($age_in_seconds>3600) {
				$age = round($age_in_seconds/3600,2) . " hours";
			} elseif ($age_in_seconds>60) {
				$age = round($age_in_seconds/60,2) . " minutes";
			} elseif ($age_in_seconds<>$nowepoch) {
				$age = round($age_in_seconds,0) . " seconds";
			} 
			
			print "<tr><td>" . $row['eid'] . "</td><td>" . $row['customer'] . "</td><td><a href='edit.php?e=" . $row['eid'] . "'>" . $row['cat'] . "</a></td><td>" . $age . "</td></tr>";
		}
	}
	print "</table>";

}
function Top20_Most_Slow_Deleted($qid) {
	global $lang;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Top20 slow deleted " . $lang['entities'] . "";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>EID<b></td><td><b>" . $lang['customer'] ."<b></td><td>" . $lang['category'] . "</td><td><b>Duration</td></tr>";
	
	$sql = "select eid,category AS cat,$GLOBALS[TBL_PREFIX]customer.custname AS customer,COUNT(*), (closeepoch-openepoch) AS ep FROM $GLOBALS[TBL_PREFIX]entity, $GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]entity.CRMcustomer = $GLOBALS[TBL_PREFIX]customer.id AND deleted='y' AND (closeepoch-openepoch)>0 " . $andstring . " GROUP BY ep ORDER BY ep DESC LIMIT 20";
		
//	$sql = "select eid,$GLOBALS[TBL_PREFIX]customer.custname AS customer,category AS cat,COUNT(*), (closeepoch-openepoch) AS ep FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]entity.CRMcustomer = $GLOBALS[TBL_PREFIX]customer.id AND deleted='y' AND (" . $now . "-openepoch)>0 AND openepoch<>'' GROUP BY ep ORDER BY ep DESC LIMIT 20";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		$auth = CheckEntityAccess($row['eid']);
		if ($auth == "ok" || $auth=="readonly") {
			// Calculate age
			$age_in_seconds = $row['ep'];

			if ($age_in_seconds>86400) {
				$age = round($age_in_seconds/86400,2) . " days";
			} elseif ($age_in_seconds>3600) {
				$age = round($age_in_seconds/3600,2) . " hours";
			} elseif ($age_in_seconds>60) {
				$age = round($age_in_seconds/60,2) . " minutes";
			} elseif ($age_in_seconds<>$nowepoch) {
				$age = round($age_in_seconds,0) . " seconds";
			} 
			
			print "<tr><td>" . $row['eid'] . "</td><td>" . $row['customer'] . "</td><td><a href='edit.php?e=" . $row['eid'] . "'>" . $row['cat'] . "</a></td><td>" . $age . "</td></tr>";
		}
	}
	print "</table>";

}
function Top10_Most_active($qid) {
	global $lang;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
// This function calculates the 10 most active entities (based on the journal)

	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]journal";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$max = $result[0];

	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Top20 " . $lang['entities'] . " (" . $max ." journals)";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>&nbsp;</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>EID<b></td><td><b>" . $lang['customer'] ."<b></td><td><b>#</b></td><td>" . $lang['category'] . "</td><td><b>Activity %</b></td><td>Activity % bar</td></tr>";
	
	$sql = "select $GLOBALS[TBL_PREFIX]journal.eid,$GLOBALS[TBL_PREFIX]entity.category AS cat,$GLOBALS[TBL_PREFIX]customer.custname AS customer,COUNT(*) AS num from $GLOBALS[TBL_PREFIX]journal,$GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer WHERE $GLOBALS[TBL_PREFIX]entity.CRMcustomer = $GLOBALS[TBL_PREFIX]customer.id AND $GLOBALS[TBL_PREFIX]journal.eid=$GLOBALS[TBL_PREFIX]entity.eid " . $andstring . " GROUP BY eid HAVING COUNT(*) > 1 ORDER BY num DESC LIMIT 20;";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		// Calculate percentage of total activity
		$auth = CheckEntityAccess($row['eid']);
		if ($auth == "ok" || $auth=="readonly") {
		
			$pc = round($row['num'] / ($max / 100));

			print "<tr><td>" . $row['eid'] . "</td><td>" . $row['customer'] . "</td><td>" . $row['num'] . "</td><td><a href='edit.php?e=" . $row['eid'] . "'>" . $row['cat'] . "</a></td><td>" . $pc . "%</td><td><img src='pixel.gif' width='" . $pc . "' height=10></td></tr>";
		}
	}
	print "</table>";
}
function Top10_Most_active_users() {
	global $lang;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
// This function calculates the 10 most active entities (based on the journal & uselog)

	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]journal";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$max = $result[0];

	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Top20 " . $lang['users'] . " (" . $max ." journals)";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>&nbsp;</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>" . $lang['owner'] ."/" . $lang['assignee'] . "<b></td><td><b>Activity</b></td><td><b>Activity %</b></td><td>Activity % bar</td></tr>";
	
	$sql = "select $GLOBALS[TBL_PREFIX]journal.user,$GLOBALS[TBL_PREFIX]loginusers.id AS userid,COUNT(*) AS num from $GLOBALS[TBL_PREFIX]journal,$GLOBALS[TBL_PREFIX]loginusers WHERE $GLOBALS[TBL_PREFIX]journal.user=$GLOBALS[TBL_PREFIX]loginusers.id " . $andstring . " GROUP BY user HAVING COUNT(*) > 1 ORDER BY num DESC LIMIT 20;";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		// Calculate percentage of total activity
		
		$pc = round($row['num'] / ($max / 100));

		print "<tr><td>" . GetUserName($row['userid']) . "</td><td>" . $row['num'] . "</td><td>" . $pc . "%</td><td><img src='pixel.gif' width='" . $pc . "' height=10></td></tr>";
	}
	print "</table>";
}
function Top10_Most_active_users_uselog() {
	global $lang;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
// This function calculates the 10 most active entities (based on the journal & uselog)

	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]uselog WHERE user<>''";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$max = $result[0];

	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Top20 " . $lang['users'] . " (" . $max ." use logs)";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>&nbsp;</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>" . $lang['owner'] ."/" . $lang['assignee'] . "<b></td><td><b>Activity</b></td><td><b>Activity %</b></td><td>Activity % bar</td></tr>";
	
	$sql = "select $GLOBALS[TBL_PREFIX]uselog.user,$GLOBALS[TBL_PREFIX]loginusers.id AS userid,COUNT(*) AS num from $GLOBALS[TBL_PREFIX]uselog,$GLOBALS[TBL_PREFIX]loginusers WHERE $GLOBALS[TBL_PREFIX]uselog.user=$GLOBALS[TBL_PREFIX]loginusers.name " . $andstring . " GROUP BY user HAVING COUNT(*) > 1 ORDER BY num DESC LIMIT 20;";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		// Calculate percentage of total activity
			
		$pc = round($row['num'] / ($max / 100));

		print "<tr><td>" . GetUserName($row['userid']) . "</td><td>" . $row['num'] . "</td><td>" . $pc . "%</td><td><img src='pixel.gif' width='" . $pc . "' height=10></td></tr>";
	}
	print "</table>";
}
function entities_per_customer($qid)
{
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$lang;
	print "<tr><td colspan=4><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[epc]";
		if ($qid) {
		print " <font color='#FF0000'>(subset)</font>";
	}
	print "</legend>&nbsp;</legend><table border=0>";
	print "</table><table border=1' cellspacing='0' cellpadding='2' bordercolor='#CECECE' width='100%'>";
	print "<tr><td><b>$lang[customer]</b></td><td><b>Open<b></td><td><b>$lang[deleted]</b></td><td><b>$lang[total]</b></td><td><b>%</b></td><td>% bar</td></tr>";
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	$sqlcounter++;
	$sql = "SELECT id,custname FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname";
	$result= mcq($sql,$db);
	
	while ($id = mysql_fetch_array($result)) {
		$auth = CheckCustomerAccess($id['id']);
		if ($auth == "ok" || $auth == "readonly") {
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer='$id[id]'" . $andstring;
			$pr1 = mcq($sql,$db);
			$pr = mysql_fetch_array($pr1);
			$pc1 = ($maxE/100); // dit is 1 procent
			$apc = round($pr[0]/$pc1);


			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer='$id[id]' AND deleted='y'" . $andstring;
			$pr1 = mcq($sql,$db);
			$prD = mysql_fetch_array($pr1);
			$sqlcounter++;
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' AND CRMcustomer='$id[id]'" . $andstring;
			$resul1t= mcq($sql,$db);
			$maxU1 = mysql_fetch_array($resul1t);
			$open = $maxU1[0];

			print "<tr><td><a href='detailedcustomerstats.php?qid=$qid&cid=" . $id['id'] . "' class='bigsort'>" . $id[custname] . "</a></td><td>$open</td><td>$prD[0]</td><td>$pr[0]</td><td>$apc%</td><td width='100'><img src='pixel.gif' width='$apc' height=10></td></tr>\n";
		}
	}
	print "</table></fieldset>";
} // end func


function summonth($qid) {
	global $sqlcounter,$maxU,$maxo,$maxE,$maxEo,$maxEc,$maxEa,$delE,$obsE,$maxC,$expE,$password,$lang;
	$debug = 0;
	if ($qid) {
	$q = PopStashValue($qid);
	$andstring = " AND (" . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	foreach ($q AS $eid) {
			$andstring .= $eid ." OR " . $GLOBALS['TBL_PREFIX'] . "entity.eid=";
	}
	$andstring .= $q[0] . ")";
	$wherestring = "WHERE 1=1 " . $andstring;
	}
	print "<tr><td colspan=4><hr></td></tr>";
	print "<tr><td colspan=5>";
	print "</td></tr>";
	$year = date("Y");
	print "<tr><td colspan=4><font size=+1>Entity year summary for $year</font><br><br></td></tr>";
	print "<tr><td colspan=8><table border=1>";
	print "<tr><td><b>Weeknumber</b></td><td><b>Added</b></td><td><b>Closed</b></td></tr>";
	$weeknumber = date("W");
	for ($weeknumber=0;$weeknumber<53;$weeknumber++) {
	$sqlcounter++;
	$sql = "SELECT eid,cdate FROM $GLOBALS[TBL_PREFIX]entity " . $wherestring;
	if ($debug) { print $sql; }
	// WHERE status='open'
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$year = date("Y");
				if ($tjaar == $year) {
					$tmaand = substr($t,5,2);
					$tdag = substr($t,8,2);
					$tmp = date ("W", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
					if ($weeknumber == $tmp) {
						$thisweek++;
					}
				} else {
//					print "Year error";
				}
		}
	if (!$thisweek) { $thisweek=0; }
	$sqlcounter++;
	//status='close' AND 
	$sql = "SELECT closeepoch FROM $GLOBALS[TBL_PREFIX]entity " . $wherestring;
	$result = mcq($sql,$db);
	
	  while ($e2= mysql_fetch_array($result)) {
				
				if ($e2['closeepoch']<>"") {
					$c_week = date("W", $e2['closeepoch']);
					$c_month = date("m", $e2['closeepoch']);

					$t_week = date("W");
					$t_month = date("m");
					if ($c_month == $t_month) {
						$thismonth2++;
					}
					if ($c_week == $weeknumber) {
						$thisweek2++;
					}
				}
		}


	if (!$thisweek2) { $thisweek2=0; }

		
	if ((!$thisweek==0) || (!$thisweek2==0)) {
		print "<tr><td>$weeknumber</td><td>$thisweek</td><td>$thisweek2</td></tr>";
	}

	unset($thisweek);
	unset($thisweek2);
	}

	print "</table></td></tr>";
	print "<tr><td colspan=8><table border=1>";
	print "<tr><td><b>Month</b></td><td><b>Added</b></td><td><b>Closed</b></td></tr>";

	for ($x=2;$x<14;$x++) {
	$month = date("F", @mktime (0,0,0,$x,0,0));
	$sqlcounter++;
	// WHERE status='open'
	$sql = "SELECT eid,cdate FROM $GLOBALS[TBL_PREFIX]entity";
	if ($debug) { print $sql; }
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$year = date("Y");
				if ($tjaar == $year) {

					$tmaand = substr($t,5,2);
					$tdag = substr($t,8,2);
					$tmp = date ("F", @mktime (0,0,0,$tmaand,$tdag,$tjaar));

	//				print $tmp;
					if ($month == $tmp) {
						$thismonth++;
					}
				}
		}
	if (!$thismonth) { $thismonth=0; }
	
	$sqlcounter++;
	$sql = "SELECT eid,closedate FROM $GLOBALS[TBL_PREFIX]entity WHERE closedate<>'0000-00-00' AND status='close'" . $andstring;
	if ($debug) { print $sql; }
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[closedate];
				$tjaar = substr($t,0,4);
				$year = date("Y");
				if ($tjaar == $year) {

						$tmaand = substr($t,5,2);
						$tdag = substr($t,8,2);
						$tmp = date ("F", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
		//				print "<tr><td>Matching $tmp against $month. Date is $e[closedate] </td></tr>";
		//				print $tmp;
						if ($month == $tmp) {
							$thismonth2++;
						}
				}
		}
	// Yet try to determine the average 'open-time' in this week only

	if (!$thismonth2) { $thismonth2=0; }
	print "<tr><td>$month</td><td>$thismonth</td><td>$thismonth2</td></tr>";
	unset ($thismonth);
	unset ($thismonth2);

	
	}
	$sqlcounter++;
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE cdate<>'0000-00-00' AND closedate<>'0000-00-00' AND status='close'". $andstring;
	if ($debug) { print $sql; }
	$result= mcq($sql,$db);
        while ($e= mysql_fetch_array($result)) {
				$t = $e[closedate];
				$tjaar = substr($t,0,4);
				$tmaand = substr($t,5,2);
				$tdag = substr($t,8,2);
				$tmp = date ("U", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
				$t = $e[cdate];
				$tjaar = substr($t,0,4);
				$tmaand = substr($t,5,2);
				$tdag = substr($t,8,2);
				$tmp2 = date ("U", @mktime (0,0,0,$tmaand,$tdag,$tjaar));
				//print "<tr><td>Date is $e[cdate] $tmp2 till $e[closedate] $tmp";
//				print "<br> diff is " . ($tmp-$tmp2) . " which is about " . round((($tmp-$tmp2)/86400)) . " days";
				$avg = $avg + round((($tmp-$tmp2)/86400));
				$avgc++;
//				print "</td></tr>";
	}
	print "</tr></td></table><tr><td colspan=5>&nbsp;</td></tr></";
	$sqlcounter++;
	//status='close' AND 
	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE closedate='0000-00-00' AND status='close'" . $andstring;
	if ($debug) { print $sql; }
	$result= mcq($sql,$db);
	$maxW = mysql_fetch_array($result);
	$maxWc = $maxW[0];

//	print "<tr><td colspan=5>Of $avgc entities counted, the overall average 'open-time' was " . @round($avg/$avgc) . " days.<br><i>Counted using <u>all</u> closed entities in the database, over <u>all</u> years. There were $maxWc entities closed before this CRM was logging the closeure date.</i></td></tr>";

	


}
function getmicrotime(){ 
    list($usec, $sec) = explode(" ",microtime()); 
    return ((float)$usec + (float)$sec); 
} 
function StartPDF() {
	global $pdf;
	$pdf=new PDF();
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->SetFont('Arial','',8);
}

function StartPrintPDF() {
	global $pdf;
	$pdf=new PDF_AutoPrint();
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->SetFont('Arial','',8);
	$pdf->AutoPrint(false);
}


function toc($pdfa) {
		global $pdf,$shell_status,$lang;
		return(0);
		if ($shell_status) {
				print "CreatePDFTOC: Creating TOC of " . sizeof($pdfa) . " entities\n";
				//print "|--------------------------------------------------| 100%\n[";
		}
		$pdf->SetFillColor(244,209,137);
		line();
		$pdf->SetFont('Arial','',18);	
		
		$pdf->Cell(0,10, $pdf_title2 . " " . $lang[entsum],0,1,"C");
		line();
		$pdf->Ln(1);

		$pdf->SetFont('Arial','',8);

		$top = sizeof($pdfa);
		
		$sp = 50;
		if ($shell_status) {
			print "[";
		}

		for ($op=0;$op<$top;$op++) {
			if (!$pdfa[$op]=="") {
				if ($shell_status) {
					
					$pc1 = $top/100; // 1% van totaal
					$pc2 = round($op/$pc1);
					

					if ($pc2 > ($oldpc+1)) {
						$oldpc = $pc2;
						$tp .= "#";
						$sp--;
						print "\015[" . $tp;
						for ($tops=$sp;$tops>0;$tops--) {
							print " ";
						}
						print "] " . $oldpc . "%";
					}
				}
				if (CheckEntityAccess($pdfa[$op]) == "ok" || CheckEntityAccess($pdfa[$op]) == "readonly" ) {
					$sql = "SELECT category FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $pdfa[$op] . "'";
					$result = mcq($sql,$db);
					$cat = mysql_fetch_array($result);
					$pdf->Write(5, "- ");

					$id = fillout($pdfa[$op],5);

					$pdf->SetTextColor(0,0,255);
					$$pdfa[$op]=$pdf->AddLink();
					$pdf->Write(5, $id . " : " . $cat[0] ,$op);
					$pdf->Ln(4);
					$pdf->SetTextColor(0);
				}
			}
		}
		if ($shell_status) {
			print "\n";
		}

		line();
		$pdf->Ln(1);
		$pdf->AddPage();
}
function CreatePDF($pdfa,$file='') {
	global $pdf,$in_line,$shell_status,$filename_to_disk;
	$data = array();
	$filename_to_disk_to_use = $filename_to_disk;

	if ($shell_status) { // if run on command line (generate_total_pdf_summary.php)
				print "CreatePDF: Creating report of " . sizeof($pdfa) . " entities\n";
				//print "|--------------------------------------------------| 100%\n[";
	}

	
	
	$top = sizeof($pdfa);

	$sp=50;
	for ($op=0;$op<$top;$op++) {
	
		if (!$pdfa[$op]=="") {
			if ($shell_status) {
					
					$pc1 = $top/100; // 1% van totaal
					$pc2 = round($op/$pc1);
					

					if ($pc2 > ($oldpc+1)) {
						$oldpc = $pc2;
						$tp .= "#";
						$sp--;
						print "\015[" . $tp;
						for ($tops=$sp;$tops>0;$tops--) {
							print " ";
						}
						print "] " . $oldpc . "%";
					}




			}
			$pdf->SetLink($op);
			$pdf->AddLink();
			
			cat_sum($pdfa[$op]);

			$pdf->SetFont('','');
			$pdf->SetFont('Arial','B',8);
			$pdf->Ln(20);
			
			if ($op<(sizeof($pdfa)-1)) {
				$pdf->AddPage();
			}
		} else {
			if ($shell_status) {
				print "CreatePDF: error " . $op . " is empty.";
			}
		}
	}

	$date = date("F j, Y, H:i") . "h";

	$pdf->Output($file);

	if ($shell_status) {
		print "\n";
	}
	$GLOBALS['CURFUNC'] = "SumPDF::";
	qlog("PDF Summary generated - quit.");
}

function cat_sum($e) {
		global $a,$data,$pdf,$DateFormat,$NoImageInclude,$in_line,$internal_catsum_counter,$lang;
		global $tc,$lang,$pdf_title,$language,$session,$include,$filename_to_disk,$filename_to_disk_to_use;
	
		// Generates PDF report for 1 entity

		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$e'";
		$result= mcq($sql,$db);
		$ea = mysql_fetch_array($result);

		$owner       = GetUserName($ea['owner']);
		$assignee    = GetUserName($ea['assignee']);
		$customer    = GetCustomerName($ea['CRMcustomer']);
		$Statuscolor = hex2rgb(GetStatusColor($ea[status]));
		$Priocolor   = hex2rgb(GetPriorityColor($ea[priority]));

		if (sizeof($Statuscolor)<2) {
			$Statuscolor = array(255,255,255);
		}	
		if (sizeof($Priocolor)<2) {
			$Priocolor = array(255,255,255);
		}	
		if ($ea['closeepoch']=="") {
			$nowepoch = date('U');
			$txt = "Age"; 
		} else {
			$nowepoch = $ea['closeepoch'];
			$txt = "Duration";
		}
		if ($ea['openepoch']=="") {
				$age = "";
		} else {
			$age_in_seconds = $nowepoch - $ea['openepoch'];
			
			if ($age_in_seconds>86400) {
				$age = "($txt: " . round($age_in_seconds/86400,2) . " days)";
			} elseif ($age_in_seconds>3600) {
				$age = "($txt: " . round($age_in_seconds/3600,2) . " hours)";
			} elseif ($age_in_seconds>60) {
				$age = "($txt: " . round($age_in_seconds/60,2) . " minutes)";
			} elseif ($age_in_seconds<>$nowepoch) {
				$age = "($txt: " . round($age_in_seconds,0) . " seconds)";
			} 

		}
		$t = $ea[tp]; // timestamp last edit
		$t = str_replace("-","",$t);
		$t = str_replace(" ","",$t);
		$t = str_replace(":","",$t);
		$tp[jaar] = substr($t,0,4);
		$tp[maand] = substr($t,4,2);
		$tp[dag] = substr($t,6,2);
		$tp[uur] = substr($t,8,2);
		$tp[min] = substr($t,10,2);
		$cdate = explode("-",$ea[cdate]);
		
		$t = $ea[duedate]; // due date
		$tpd[jaar] = substr($t,6,4);
		$tpd[maand] = substr($t,3,2);
		$tpd[dag] = substr($t,0,2);

		// Add zero's ie. 2-7-2003 must become 02-07-2003

		if (strlen($cdate[0])==1) {
				$cdate[0] = "0" . $cdate[0];
		}
		if (strlen($duedate[1])==1) {
				$cdate[1] = "0" . $cdate[1];
		}
		$NoImageInclude = 1;
		if (!$NoImageInclude) {
			
			if (!$include) {
				$subdir = ereg_replace("sumpdf.php","",$_SERVER['SCRIPT_NAME']);
			} else {
				$subdir = ereg_replace("dump_to_disk.php","",$_SERVER['SCRIPT_NAME']);
			}

			if ($getset) {
				$subdir = ereg_replace("edit.php","",$_SERVER['SCRIPT_NAME']);
			}
			
			if (!$filename_to_disk) {
				$filename_to_disk_to_use = tempnam($GLOBALS['TMP_FILE_PATH'],"CRM_TMP_BIN_");
			} else {
				$internal_catsum_counter++;
				$filename_to_disk_to_use = $filename_to_disk . $internal_catsum_counter;
			}
			
			qlog("Directing image output to $filename_to_disk_to_use");

			DisplayEntityActivityGraph($e);
			
			$pdf->Image($filename_to_disk_to_use,150,41,44,'','png','http://' . $_SERVER['SERVER_NAME'] . $subdir . 'edit.php?e=' . $e);

			unlink($filename_to_disk_to_use);
			unset($filename_to_disk_to_use);
		}

		$cdate = TransformDate($cdate[2] . "-" . $cdate[1] . "-" . $cdate[0]);
		$pdf->Bookmark($ea['category'] . " (" . $ea['eid'] . ")");
		$pdf->SetFont('Arial','',12);
	    $pdf->SetFillColor(128,0,0);
	    $pdf->SetTextColor(255);
		$pdf->Cell(0,6,($lang['summary']) . " : " . $ea['category'],1,1,'L',1);
	    $pdf->SetTextColor(0);
		$pdf->SetFont('Arial','',6);		
		$pdf->Cell(0,6,"$pdf_title",0,1);
	    line();
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,4,"$lang[entity] $e $lang[ownedby] $owner, $lang[assignedto] $assignee.",0,1);
		$pdf->Cell(0,6,"$lang[created] $cdate, $lang[lastupdate] " . TransformDate("$tp[dag]-$tp[maand]-$tp[jaar]") . " $tp[uur]:$tp[min]h.". " " . $age,0,1);

		
		$pdf->Cell(0,6,"$lang[duedate] : " . TransformDate("$tpd[dag]-$tpd[maand]-$tpd[jaar]"),0,1);
	
		// DUE DATE MOET ERIN KNEUS

		$pdf->SetFillColor($Statuscolor[0],$Statuscolor[1],$Statuscolor[2]);

		$a1 = "$lang[curstat]: $ea[status]";
		$bla1 = $pdf->GetStringWidth($a1)+6;
		$a2 = "$lang[priority]: $ea[priority]";
		$bla2 = $pdf->GetStringWidth($a2)+6;

		if ($bla1>$bla2) {
			$wdth = $bla1;
		} else {
			$wdth = $bla2;
		}

		$pdf->Cell(1,6,0,0,0,0,0);
		$pdf->Cell($wdth,6,$a1,1,0,1,1);
//		$pdf->Ln(1);
		$pdf->Cell(1,6,0,0,0,0,0);
	    $pdf->SetFillColor(128,0,0);
		$pdf->SetFillColor($Priocolor[0],$Priocolor[1],$Priocolor[2]);
		$pdf->Cell($wdth,6,$a2,1,1,1,1);
		$pdf->SetFillColor(128,0,0);

		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $ea['CRMcustomer'] . "'";
		$result = mcq($sql,$db);
		$cust_array = mysql_fetch_array($result);
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(0,5,$lang['customer'] . ": $customer, " . $cust_array['cust_address'],0,1);
		$pdf->Cell(0,4,$lang['contact'] . ": " . $cust_array['contact'] . "," . $cust_array['contact_phone'] . ", " . $cust_array['contact_email'],0,1);	
//		$pdf->Cell(0,5,"$lang[customer]: $customer",0,1);
		$pdf->SetFont('Arial','',8);
	    
		line();

		if ($ea[content]=="") {
			$ea[content]="-";
		}

		$n = explode("\n",$ea[content]);

		for ($n1=0;$n1<sizeof($n);$n1++) {
				$nt = wordwrap($n[$n1], 120, "HOPS!", 1);
				$nta = explode("HOPS!",$nt);
				for ($i=0;$i<sizeof($nta);$i++) {
					$pdf->Cell(0,4,trim($nta[$i]),0,1);
				}
			}



		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$ea[eid]' AND $GLOBALS[TBL_PREFIX]binfiles.type='entity'";
		$result = mcq($sql,$db);
		$num = mysql_fetch_array($result);
		if ($num[0]>0) {
			line();
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,10,"This entity has files attached:",0,1);
			$pdf->SetFont('Arial','',8);
			$data = array();
			$header=array("Creation date",'Size','User','Filename');

			if ($DateFormat=="mm-dd-yyyy") {
				$sql= "SELECT filename,creation_date,filesize,fileid,username,date_format(creation_date, '%m-%d-%Y %H:%i') AS dt FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$ea[eid]' ORDER BY filename";
			} else {
				$sql= "SELECT filename,creation_date,filesize,fileid,username,date_format(creation_date, '%d-%m-%Y %H:%i') AS dt FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$ea[eid]' ORDER BY filename";
			}
			$result7= mcq($sql,$db);
			while ($files= mysql_fetch_array($result7)) {

				$ownert = GetUserNameByName($files[username]);

				$url = "http://" . $_SERVER['SERVER_NAME'] . $subdir . "csv.php?fileid=" . $files['fileid'];
				array_push($data,array($files['dt'],round(($files[filesize]/1024)). "K",$ownert,$url,$files['filename']));
				$ftel++;
				$tel++;
			}
				$pdf->FancyTable4colSinglePDF($header,$data);
						
		}


		// Extra fields list		

		$list = GetExtraFields();

		$sql110 = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$ea[eid]'";
		$result1 = mcq($sql110,$db);
		$num = mysql_fetch_array($result1);
		
		// The extra field values can be printed in two ways: in a table, and each on a new line

		if (sizeof($list)>1 && $num[0]>0) {
			$pdf->Ln(6);
			line();	
			
			if (strtoupper($GLOBALS['PDF-ExtraFieldsInTable'])<>"YES") {
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(0,10,"Custom fields:",0,1);
				$pdf->SetFont('Arial','',8);
			} else {
				$data = array();
				$header=array("Field","Value");
			}
			foreach ($list AS $field) {
					
					$sql0 = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$ea[eid]' AND deleted<>'y' AND name='" . $field['id'] . "' ORDER BY name";
//					print $sql;

					$result8 = mcq($sql0,$db);
					$cust= mysql_fetch_array($result8);
			
					if ($field['fieldtype'] == "date") {
						$val = TransFormDate($cust[value]);
					} elseif (strstr($field['fieldtype'],"User-list")) {
						$val = GetUserName($cust['value']);
					} else {
						$val = $cust[value];
					}

					$val = FunkifyLOV($val);

					if (strtoupper($GLOBALS['PDF-ExtraFieldsInTable'])<>"YES") {
						$pdf->SetFont('Arial','',6);
						$pdf->SetFillColor(255,255,255);
						$pdf->SetTextColor(0);
						$pdf->Cell(0,3,(ParseTemplateEntity($field['name'],$ea['eid'])),1,1,'L',1);
						$pdf->SetFont('Arial','',8);
						$pdf->SetFillColor(0,0,0);
						$pdf->SetTextColor(0);
						line();
					}					
					
					

					if ($val=="") {
						$val="-";
					}

					$n = explode("\n",$val);



					for ($n1=0;$n1<sizeof($n);$n1++) {
						$nt = wordwrap($n[$n1], 120, "HOPS!", 1);
						$nta = explode("HOPS!",$nt);
						for ($i=0;$i<sizeof($nta);$i++) {
							if (strtoupper($GLOBALS['PDF-ExtraFieldsInTable'])<>"YES") {
								$pdf->Cell(0,4,trim($nta[$i]),0,1);
							} else {
								$tpt .= trim($nta[$i]);
							}
						}
					}
				if (strtoupper($GLOBALS['PDF-ExtraFieldsInTable'])=="YES") {
						array_push($data,array($field['name'],$tpt));
						unset($tpt);
					}
			}
			if (strtoupper($GLOBALS['PDF-ExtraFieldsInTable'])=="YES") {
				$pdf->SetFont('Arial','',6);
				$pdf->FancyTable2col($header,$data);
			}
			unset($header);
			unset($data);
			unset($num);
			unset($list);
		}
			
		
		$pdf->Ln(8);
	
		line();
	

}
function MainCalendar() {
		global $MainPageCalendar,$MonthsToShow;
		$MainPageCalendar=1;
		print "<tr><td><table border='0'><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Calend�rio&nbsp;</legend>"; 	
		include("calendar.php");
		print "</fieldset></td></tr></table>";
}

function TodaysEntities() {
	global $fullname, $lang, $user_id, $alreadyshowed, $date;
	$sql = "SELECT $GLOBALS[TBL_PREFIX]entity.eid AS id, $GLOBALS[TBL_PREFIX]entity.category AS cat,$GLOBALS[TBL_PREFIX]loginusers.FULLNAME AS name, $GLOBALS[TBL_PREFIX]customer.custname AS cust FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE duedate='$date' AND $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]loginusers.id=$GLOBALS[TBL_PREFIX]entity.assignee AND $GLOBALS[TBL_PREFIX]entity.deleted='n' ORDER BY $GLOBALS[TBL_PREFIX]customer.custname";
	
	print "<tr><td NOWRAP><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[entities]&nbsp;</legend><table border=0 WIDTH=100%>";
	$toprint0 = "<tr><td NOWRAP colspan=2>$lang[entitiestoday]:</td></tr>";

	$result= mcq($sql,$db);
	  while ($today= mysql_fetch_array($result)) {
			if (CheckEntityAccess($today['id']) == "ok" || CheckEntityAccess($today['id']) == "readonly") {
						$toprint1 .= "<tr><td NOWRAP width='10%'><b>&nbsp;- $today[id]</td><td NOWRAP><a href='edit.php?e=$today[id]' class='bigsort'>$today[cust]</a></td><td NOWRAP><a href='edit.php?e=$today[id]' class='bigsort'>$today[cat] ($lang[assignedto] $today[name])</a></b></td></tr>";
			}
					 }
	  if ($toprint1) { 
		  print $toprint0 . $toprint1; 

	  }   else {
			print "<tr><td NOWRAP colspan=2>$lang[noentities].</td></tr>";
	  }
	  print "</table></fieldset></td></tr>";
}

function RecentEntities() {
		global $fullname, $lang, $user_id, $alreadyshowed;
		$ShowRecentEditedEntities = 10;
		print "<tr><td NOWRAP><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$fullname's " . strtolower($lang[entities]) . " recentes</legend><table width='100%' border=0>";
		if ($ShowRecentEditedEntities>20) $ShowRecentEditedEntities=20;
		$sql = "SELECT $GLOBALS[TBL_PREFIX]entity.eid AS id, $GLOBALS[TBL_PREFIX]entity.category AS cat,tp,$GLOBALS[TBL_PREFIX]loginusers.FULLNAME AS name, $GLOBALS[TBL_PREFIX]customer.custname AS cust FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE lasteditby='" . $user_id . "' AND deleted <> 'yes' AND $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]loginusers.id=$GLOBALS[TBL_PREFIX]entity.assignee AND $GLOBALS[TBL_PREFIX]entity.deleted='n' ORDER BY tp DESC LIMIT " . $ShowRecentEditedEntities;
		$result= mcq($sql,$db);
		while ($recent= mysql_fetch_array($result)) {
			if (CheckEntityAccess($recent['id']) == "ok" || CheckEntityAccess($recent['id']) == "readonly") {
				if (!in_array($recent[id],$alreadyshowed)) print "<tr><td NOWRAP width=10%><b>&nbsp;- $recent[id]</td><td NOWRAP><a href='edit.php?e=$recent[id]' class='bigsort'>$recent[cust]</a></td><td NOWRAP><a href='edit.php?e=$recent[id]' class='bigsort'>$recent[cat] ($lang[assignedto] $recent[name])</a></b></td></tr>";
				$count++;
			}
		}
		if ($count<1) {
				print "<tr><td NOWRAP width='10%'>$lang[noentities]</td></tr>";
		}
		print "</table></fieldset></td></tr>";
}

function AllEntitiesOwned() {
		global $fullname, $lang, $user_id, $alreadyshowed;
		print "<tr><td NOWRAP><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$fullname's " . strtolower($lang[entities]) . " (" . strtolower($lang[owner]) . ")&nbsp;</legend><table width='100%' border=0>";

		$sql = "SELECT $GLOBALS[TBL_PREFIX]entity.eid AS id, $GLOBALS[TBL_PREFIX]entity.category AS cat,tp,$GLOBALS[TBL_PREFIX]loginusers.FULLNAME AS name, $GLOBALS[TBL_PREFIX]customer.custname AS cust FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE owner='" . $user_id . "' AND deleted <> 'yes' AND $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]loginusers.id=$GLOBALS[TBL_PREFIX]entity.assignee AND $GLOBALS[TBL_PREFIX]entity.deleted='n' ORDER BY tp DESC";
		$result= mcq($sql,$db);
		while ($recent= mysql_fetch_array($result)) {
			if (CheckEntityAccess($recent['id']) == "ok" || CheckEntityAccess($recent['id']) == "readonly") {
				if (!in_array($recent[id],$alreadyshowed)) print "<tr><td NOWRAP width='10%'><b>&nbsp;- $recent[id]</td><td NOWRAP><a 	href='edit.php?e=$recent[id]' class='bigsort'>$recent[cust]</a></td><td NOWRAP><a href='edit.php?e=$recent[id]' class='bigsort'>$recent[cat] ($lang[assignedto] $recent[name])</a></b></td></tr>";
				$count++;
			}
		}
		if ($count<1) {
				print "<tr><td NOWRAP width='10%'>$lang[noresults]</td></tr>";
		}
		print "</table></fieldset></td></tr>";
}

function AllEntitiesAssignee() {
		global $fullname, $lang, $user_id, $alreadyshowed;
		print "<tr><td NOWRAP><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$fullname's " . strtolower($lang[entities]) . " (" . strtolower($lang[assignee]) . ")&nbsp;</legend><table width='100%' border=0>";

		$sql = "SELECT $GLOBALS[TBL_PREFIX]entity.eid AS id, $GLOBALS[TBL_PREFIX]entity.category AS cat,tp,$GLOBALS[TBL_PREFIX]loginusers.FULLNAME AS name, $GLOBALS[TBL_PREFIX]customer.custname AS cust FROM $GLOBALS[TBL_PREFIX]entity,$GLOBALS[TBL_PREFIX]customer,$GLOBALS[TBL_PREFIX]loginusers WHERE assignee='" . $user_id . "' AND deleted <> 'yes' AND $GLOBALS[TBL_PREFIX]customer.id=$GLOBALS[TBL_PREFIX]entity.CRMcustomer AND $GLOBALS[TBL_PREFIX]loginusers.id=$GLOBALS[TBL_PREFIX]entity.assignee AND $GLOBALS[TBL_PREFIX]entity.deleted='n' ORDER BY tp DESC";
		$result= mcq($sql,$db);
		while ($recent= mysql_fetch_array($result)) {
			if (CheckEntityAccess($recent['id']) == "ok" || CheckEntityAccess($recent['id']) == "readonly") {
				if (!in_array($recent[id],$alreadyshowed)) {
					print "<tr><td NOWRAP width='10%'><b>&nbsp;- $recent[id]</td><td NOWRAP><a href='edit.php?e=$recent[id]' class='bigsort'>$recent[cust]</a></td><td NOWRAP><a href='edit.php?e=$recent[id]' class='bigsort'>$recent[cat] ($lang[assignedto] $recent[name])</a></b></td></tr>";
					$count++;
				}
			}
		}
		if ($count<1) {
				print "<tr><td NOWRAP width='10%'>$lang[noresults]</td></tr>";
		}
		print "</table></fieldset></td></tr>";
}


function makelinks($input) // This functions makes hyperlinks from URL's or emailadresses in text
{
	// first get http:// and etc
	$input = eregi_replace("[^\"](http://[[:alnum:]#?/&=.,-~]*)",
	" <a href=\"\\1\" class=\"bigsort\" target=\"_new\">\\1</a>",
	$input);
	// and at the beginning of a line
	$input = eregi_replace("(^[a-z]*://[[:alnum:]#?/&=.,-~]*)",
	" <a href=\"\\1\" class=\"bigsort\" target=\"_new\">\\1</a>",
	$input);
	// then get the email@hosts
	$input = eregi_replace("(([a-z0-9_]<br>\\-<br>\\.)+@([^[:space:]]*)([[:alnum:]-]))",
	"<a href=\"mailto:\\1\">\\1</a>", $input);
	return($input);
}
function debug() {
		print "<!--Debug:DNGN-->\n";
}


function IsDate($date=false)
{
    // $date is in format dd-mm-yyyy
	
	$dates = split("-",$date);

	// bool checkdate ( int month, int day, int year)

	if (@checkdate($dates[1],$dates[0],$dates[2])) {
	    return true;
	} else {
		return false;
	}


} // end func
function GetPacksFromProjectPage() {
	global $legend,$password,$printbox_size,$packurl;

	
	if (!$fd = @fopen("http://download.crm-ctt.com/get_packs.php", "r")) {
		$printbox_size = "100%";
		$legend = "<img src='error.gif'>";
		printbox("Connect to remote site failed. Your <u>server</u> needs to be able to connect to the internet for this function - or maybe the service is unavailable.<br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='dictedit.php?password=$password&packman=1&tab=80' style='cursor:pointer'>back to main language page</a>");
		EndHTML();
		exit;
	} else {

		$listarr = array();
		$urlarr = array();
		$y = 0;
		while ($line=fgets($fd,1000))
		  {
			if (!$check) {
				//crm_language_pack_remote_install // check if response is OK
				if (trim($line)<>"crm_language_pack_remote_install") {
					$printbox_size = "100%";
					$legend = "<img src='error.gif'>";
					printbox("The received response was not expected. Please try again later.<br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='dictedit.php?password=$password&packman=1&tab=80' style='cursor:pointer'>back to main language page</a>");
					EndHTML();
					exit;
				} else {
					$check = 1;
				}
			} else {
				$line = trim($line);
				$tmp = split(",",$line);
				$tmp[1] = ereg_replace(".CRM","",$tmp[1]);
				$tmp[1] = ereg_replace("_"," ",$tmp[1]);
//				$tmp[0] = ereg_replace(">","",$tmp[1]);
				$listarr[$y]['url'] = $tmp[0]; 
				$listarr[$y]['name'] = $tmp[1];
				$y++;
				unset($tmp);
//				print_r($listarr);
			}
		  }
		  fclose ($fd);
	}
	
	sort($listarr);
	
	$legend = "Choose pack to install";
	$t = "The following language packs are available at the project page. Click on a pack to install. <br>Please mind; this procedure does not check if a pack is already installed.<br><br>";

	for ($i=0;$i<sizeof($listarr);$i++) {
		$t .= "<img src='arrow.gif'>&nbsp<a href='dictedit.php?password=$password&DLP=1&packurl=" . base64_encode($listarr[$i]['url']) . "' class='bigsort'>" . $listarr[$i]['name'] . "</a><br>";
	}
	$printbox_size = "100%";
	
	$t .= "<br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='dictedit.php?password=$password&packman=1&tab=80' style='cursor:pointer'>back to main language page</a>";

	printbox($t);
	
}
function viewArray($arr)
{
	echo '<table cellpadding="0" cellspacing="0" border="1">';
	foreach ($arr as $key1 => $elem1) {
		echo '<tr>';
		echo '<td>'.$key1.'&nbsp;</td>';
		if (is_array($elem1)) { extArray($elem1); }
		else { echo '<td>'.$elem1.'&nbsp;</td>'; }
		echo '</tr>';
	}
	echo '</table>';
}

function extArray($arr)
{
	echo '<td>';
	echo '<table cellpadding="0" cellspacing="0" border="1">';
	foreach ($arr as $key => $elem) {
		echo '<tr>';
		echo '<td>'.$key.'&nbsp;</td>';
		if (is_array($elem)) { extArray($elem); }
		else { echo '<td>'.htmlspecialchars($elem).'&nbsp;</td>'; }
		echo '</tr>';
	}
	echo '</table>';
	echo '</td>';
}
function DisplayLoginForm ($err_string){
global $color1 ,$color2,$title,$CRM_VERSION,$admemail,$netscape;
global $lang,$host,$user,$pass,$database,$table_prefix,$QUERY_STRING;


	if ($GLOBALS['CHARACTER-ENCODING']=="") {
		if ($lang['CHARACTER-ENCODING']) {
			$GLOBALS['CHARACTER-ENCODING'] = $lang['CHARACTER-ENCODING'];
		} else {
			$GLOBALS['CHARACTER-ENCODING'] = "ISO-8859-1";
		}
	}

	// Some temporary files don't get processed and they stay behind, there's nothing to do about that,
	// but this helps. Everytime a logon form is shown, a quick check for expired temporary files is
	// performed (expired = older than 120 seconds)

	DeleteExpiredTempFiles();

	// Flush expired sessions (same method)
	DeleteExpiredSessions();

	$topost = $_SERVER['PHP_SELF'];
	if (!stristr($QUERY_STRING,"logout")) {
		$ins = $QUERY_STRING;
	}
	$topost = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
	//$post = "https://" . $topost;
  ?>
  <html>
  <head>
  <?
	  DisplayCSS();
	  ?>
  <TITLE><? echo $title; ?></TITLE>
  <META HTTP-EQUIV="Expires" CONTENT="0">
  <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META NAME="Description" CONTENT="Grupo Vanguarda">
  <META NAME="Author" CONTENT="http://www.grupovanguarda.com">
  <LINK rel="shortcut icon" href="favicon.ico">
  <META http-equiv="Content-Type" content="text/html; charset=<? echo $GLOBALS['CHARACTER-ENCODING'];?>">
  <SCRIPT LANGUAGE="javascript" SRC="cookies.js" type="text/javascript"></SCRIPT>
  <SCRIPT LANGUAGE="javascript" type="text/javascript">
  

	function setUser(){
  	setCookie('namebla',document.login.name.value)
	
	}
	function clearUser(){
  	setCookie('namebla','')
  	document.login.name.value ='';
	}
	function setPwd(){
			<?
			$lang[cookiewarning] = ereg_replace("\n","",$lang[cookiewarning]);
			?>
			  alert('<? echo $lang[cookiewarning];?>')
			  setCookie('passwordbla',document.login.password.value)
	}
	function clearPwd(){
  	setCookie('passwordbla','')
	  document.login.password.value ='';
	}
	function checkCooks(){
   		  namebla = getCookie('namebla') 
	  passwordbla = getCookie('passwordbla')
			repos = getCookie('repository')
	mainpagequery = getCookie('mainpagequery')

		if (namebla && namebla != null){
		  document.login.name.value = namebla;
		}
		if (passwordbla && passwordbla != null){
		  document.login.password.value = passwordbla;
		}
		if (repos && repos != null && document.login.CookieOverride.value==0){
		  document.login.repository.value = repos;
		}
		 if (mainpagequery && mainpagequery != null){
		  document.login.mainpagequery.value = mainpagequery;
		}

	}
	function CheckSecure() {
		if (document.login.repository.options[document.login.repository.selectedIndex].id == 'secure') {
			document.login.action = '<? echo "https://" . $topost . "?" . $ins;?>';
		} else if (document.login.repository.options[document.login.repository.selectedIndex].id == 'secureFS') {
			document.login.action = '<? echo "https://" . $topost . "?" . $ins . "&SFS=1";?>';
		} else if (document.login.repository.options[document.login.repository.selectedIndex].id == 'FS') {
			document.login.action = '<? echo "http://" . $topost . "?" . $ins . "&SFS=1";?>';
		} else {
			document.login.action = '<? echo "http://" . $topost . "?" . $ins;?>';
		}

	}
	function pophelp(i)	{
		newWindow = window.open('help.php?noc=EEAC44EC12FJHGDS7697HJHG546GJHK57&id=' + i, 'HelpWindow' + i,'width=350,height=300,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1');
	}

	//-->
	</SCRIPT>
  
		<body onLoad="checkCooks();document.login.name.focus()">
		<?

	    print "<form NAME=\"login\" method='post' action='" . $post . "?" . $ins . "'>"
		?>
							
					<p align=center><img src=crm2.jpg></p><table align=center width=100% border=0><tr><td><table align=center border=0><tr><td><fieldset><legend>&nbsp;
	<?
		print "<img src=crmlogosmall.gif>&nbsp;"; 
	?>
	</legend><table border="0"><tr><td>&nbsp;</td><td>
	  <table border="0" cellpadding="0" cellspacing="3">
         
          <tr> 
		  <td ><!-- <img src='password.png' border=0> --></td>
            <td nowrap>
			<font size="4"><b><? echo $title; ?></b></font>

		</td>
          </tr>
          <tr> 

          </tr>

		<tr> 
            <td nowrap colspan=2>
              <font color="#000000"> 
              <? echo $err_string; ?> &nbsp;&nbsp;</b>
              </font>
			  
			  </td>
          </tr>
          <tr> 
				  
				
            <td width="286" colspan=2><fieldset>
			<legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Login&nbsp;</legend><table>
			<tr><td><? echo $lang[username];?><br>
              <input type="text" name="name" tabindex=1>
            </td>
          </tr>
          <tr> 
            <td width="286" colspan=2> <font size=-2><a class='topnav' href="javascript:clearUser()" title='<? echo $lang[clearusername];?>'><font size=-2><? echo $lang[clearusername];?></font></a> </font> 
			</td></tr>
          <tr> 
            <td width="286" colspan=2><br><? echo $lang[password];?><br>
              <input type="password" name="password" tabindex=2>
            </td>
          </tr>
          <tr> 
            <td width="286" colspan=2> <font size=-2><a class='topnav' href="javascript:clearPwd()" title='<? echo $lang[clearpassword];?>'><font size=-2><? echo $lang[clearpassword];?></font></a> </font> 
			</table></fieldset></td></tr>
          <tr> 
          
		<td colspan=2  nowrap>
			<?

				// Get all possible CRM repository titles from all possible databases
			if (sizeof($pass)>1) {
				print "<img src='reposwhite.jpg'>&nbsp;Repository:<br><select name='repository' tabindex='3' OnChange='CheckSecure();'>";

				for ($r=0;$r<sizeof($pass);$r++) {
						
						if ($db = @mysql_connect($host[$r], $user[$r], $pass[$r])) {
							if (@mysql_select_db($database[$r],$db)) {
								$PRFX = $table_prefix[$r];
								// If no TBL_PREFIX is found, it ought to be "CRM"

								if ($PRFX=="") $PRFX="CRM";

								$sql = "SELECT value FROM " . $PRFX . "settings WHERE setting='title'";
//								$result= @mcq($sql,$db);
								$result = @mysql_query($sql);	
								$maxU1 = @mysql_fetch_array($result);
								$title = $maxU1[0];

								$sql = "SELECT value FROM " . $PRFX . "settings WHERE setting='NOBARSWINDOW'";
//								$result= @mcq($sql,$db);
								$result = @mysql_query($sql);	
								$x = @mysql_fetch_array($result);
								if ($x[0] == "Yes") {
									$NOBARSWINDOW = true;
								} else {
									$NOBARSWINDOW = false;
								}

								$sql = "SELECT value FROM " . $PRFX . "settings WHERE setting='ForceSecureHTTP'";
//								$result= @mcq($sql,$db);
								$result = @mysql_query($sql);	
								$maxU1 = @mysql_fetch_array($result);
								if (strtoupper($maxU1[0]) == "YES") {
									$sec = true;
								} else {
									$sec = false;
								}

								if (!$title=="") {
									if ($_REQUEST['rep'] == $r && ($r<>"")) {
										$ins = "SELECTED";
										qlog("REP IS $r");
										$CookieOverride = true;
									} else {
										unset($ins);
									}
									print "\n<option $ins value='$r'";
									$ikn = "";
									if ($sec) {
											$ikn = "secure";
											$sec = " style='background:#BBBBBB'";
											// must use secure post
									} else {
											$sec = " style='background:#DDDDDD'";
									}
									if ($NOBARSWINDOW) {
											$ikn .= "FS";
											//$full = " style='background:#BBBBBB'";
											// must use secure post
									} else {
											//$sec = " style='background:#DDDDDD'";
									}
									print $sec . " id='" . $ikn . "' >" . $title . "</option>\n";
								}	
							} else {
								// print "<option value=''>Host: $host[$r] Database: error stage 2</option>";	
							}

						} else {
							// print "<option value=''>Host: $host[$r] Database: $database[$r] error stage 1</option>";
						}
					}
					?>
			</select>
				&nbsp;&nbsp;&nbsp;
			  
            
			<?
				if ($CookieOverride) {
					qlog("Cookie override in effect (REP value given: " . $_REQUEST['rep'] . ")");
					print "<input type='hidden' name='CookieOverride' value='1'>";
				} else {
					qlog("Cookie override NOT in effect");
					print "<input type='hidden' name='CookieOverride' value='0'>";
				}
				} else {
					print "<div id='hops' style='display: none'><select name='repository'><option>0</option></select></div>";

				}
				print "<input type='hidden' name='mainpagequery'>";
				//document.login.repository.value
			if (sizeof($pass)>2) {
					?>
					<input type="submit" tabindex=4 value="Login" name="submit" OnClick="javascript: setCookie('repository',document.login.repository[document.login.repository.selectedIndex].value);CheckSecure()">
					<?
			} else {
					?>
					<input type="submit" tabindex=4 value="Login" name="submit" OnClick="javascript: setCookie('repository',document.login.repository[document.login.repository.selectedIndex].value);">
					<?
			}
			?>
              <input type='hidden' name='thiswasalogin' value='1'>
			<?
				if ($GLOBALS['LogonPageMessage']) {
					print "<br><br>" . $GLOBALS['LogonPageMessage'];
				}
			?>
			</td>	
          </tr>
		  <tr>
			<td></td><td>
			</td>
		  </tr>
        </table>
      </form>
    
</td></tr></table></fieldset></td></tr></table>

	<?
	EndHTML();	
  exit;  //Dit zorgt er voor dat de rest niet wordt geprint.
}


function GenerateSecret ($name){
	global $md5str,$lang;
	$exptime = time();
	$md5str = MD5($exptime);
	SetCookie("session",$md5str); //Set Cookie 
//	
	$arg = "INSERT INTO $GLOBALS[TBL_PREFIX]sessions(temp,exptime,name) VALUES('$md5str','$exptime','$name')";
	$row = mcq($arg,$db);
	
	log_msg("Login $name",""); 

	$GLOBALS['session_id'] = $md5str;
}

function setnewtime ($actuser, $session){
	SetCookie("session",$session); //Set Cookie 
	$exptime = time();
	$arg = "UPDATE $GLOBALS[TBL_PREFIX]sessions SET exptime='$exptime' WHERE temp='$session'";
	$row = mcq($arg,$db);
}

function DeleteExpiredSessions() {
	global $timeout;

	// This function deletes sessions which are too old. It's always ran first.

	if ($timeout>0) {
		$temp = $timeout * 60;
		$currenttime = time();

		$trash = ($currenttime - $temp - 60); // safety - 60 second bonusz

		$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]sessions WHERE exptime < '" . $trash . "'";
		
		mcq($sql,$db);


	}
}
//HTaccessREALMAuth();

// Following code supplied by Ria Marinussen (thanks!)

// When using LDAP authenticification, the name of the ldap server should be filled in. 
// If the ldap_port is not filled in, the default non-secure port 389 is used.
// If the users are in a ldap-folder, the ldap_prefix should be filled in so the complete 
// ldap path can be used, with for example path\username, the prefix to use in the webinterface 
// is "path\\". (double backslash to escape the backslash) and that turns up in the webinterface as "path\".

function AuthenticateWithLdap($name, $password, $silent, $ldap_server, $ldap_prefix, $ldap_port) {
    $ldaprdn  = $ldap_prefix . $name;    // ldap rdn or dn
    $ldappass = $password;
    // connect to ldap server
    if ($ldap_port) {
       $ldapconn = ldap_connect($ldap_server, $ldap_port)
          or die("Could not connect to LDAP server.");
    } else {
       $ldapconn = ldap_connect($ldap_server, '389')
          or die("Could not connect to LDAP server.");
    }
    if ($ldapconn) {
       // binding to ldap server
       $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
       // verify binding
		if ($ldaprdn != '' and $ldappass != '' and $ldapbind) {
    		qlog("Authentication type is LDAP and the webserver claims this user is " . $_SERVER['PHP_AUTH_USER']. ".");
            AuthenticateUser3($name,$password,$silent,true);
			qlog("User " . $name . " was successfully authenticated thru LDAP");

       } else {
	    	qlog("Authentication type is LDAP though user is not authenticated thru LDAP.");
            AuthenticateUser3($name, $password, $silent, false);
       }
    }
}

function FetchUserLimits($force_id = false) {

	if ($force_id) {
		$utt = $force_id;
	} else {
		$utt = $GLOBALS['USERID'];
	}
		// Fetch user customer limitations
		$sql = "SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE id ='" . $utt . "'";
		$res = mcq($sql,$db);
		$res = mysql_fetch_array($res);
		if (is_numeric($res['PROFILE'])) {
				$arr = GetProfileArray($res['PROFILE']);
				$GLOBALS['LIMITTOCUSTOMERS'] = array();
				$GLOBALS['LIMITTOCUSTOMERS'] = explode(";", trim($arr['LIMITTOCUSTOMERS']));
				if ($GLOBALS['LIMITTOCUSTOMERS'][0] <> "") {
					qlog("This user is limited: he/she can only work with these customers: " . $arr['LIMITTOCUSTOMERS'] . " (by profile)");
				} else {
					qlog("This user has no limits (by profile)");
					unset($GLOBALS['LIMITTOCUSTOMERS']);
				}
		} else {
			$temp = trim($res['LIMITTOCUSTOMERS']);
			if ($temp<>"") {
				$GLOBALS['LIMITTOCUSTOMERS'] = array();
				$GLOBALS['LIMITTOCUSTOMERS'] = explode(";", trim($temp));
				if ($GLOBALS['LIMITTOCUSTOMERS'][0] <> "") {
					qlog("This user is limited: he/she can only work with these customers: " . $temp . " (by account)");
				} else {
					qlog("This user has no limits (by account)");
					unset($GLOBALS['LIMITTOCUSTOMERS']);
				}
			}
		}
		// Check if we need to overrule the global setting by the user's personal form setting

		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id ='" . $utt . "' LIMIT 1";
		$result= mcq($sql,$db);
		$row=mysql_fetch_array($result);

		if (is_numeric($row['ENTITYADDFORM'])) {
			$GLOBALS['ENTITY_ADD_FORM'] = $row['ENTITYADDFORM'];
			$GLOBALS['ENTITY_LIMITED_ADD_FORM'] = $row['ENTITYADDFORM'];
			qlog("Entity add form overruled by personal profile (" . $row['ENTITYADDFORM'] . ")");
		}

		if (is_numeric($row['ENTITYEDITFORM'])) {
			$GLOBALS['ENTITY_EDIT_FORM'] = $row['ENTITYEDITFORM'];
			$GLOBALS['ENTITY_LIMITED_EDIT_FORM'] = $row['ENTITYEDITFORM'];
			qlog("Entity edit form overruled by personal profile (" . $row['ENTITYEDITFORM'] . ")");
		}

}

function AuthenticateUser($name, $password, $silent) {
	if ($GLOBALS['AUTH_TYPE'] == "HTTP REALM" && $_SERVER['PHP_AUTH_USER']<>"") {
		qlog("Authentication type is HTTP REALM and the webserver claims this user is " . $_SERVER['PHP_AUTH_USER']. ". Bypassing login screen");
		AuthenticateUser3($_SERVER['PHP_AUTH_USER'],"",$silent,true);
	} elseif ($GLOBALS['AUTH_TYPE'] == "LDAP") {
        $ldap_server = $GLOBALS['LDAP_SERVER'];
        $ldap_prefix = $GLOBALS['LDAP_PREFIX'];
        $ldap_port = $GLOBALS['LDAP_PORT'];
        AuthenticateWithLdap($name, $password, $silent, $ldap_server, $ldap_prefix, $ldap_port);
	} else {
		AuthenticateUser3($name, $password, $silent, false);
		qlog("Authentication type is HTTP REALM though user is not authenticated against the webserver.");
	}
}

function AuthenticateUser3($name, $password, $silent, $np=false){
	global $thiswasalogin, $logon, $title,$lang;
	
	if ($np) {
		$arg = "SELECT password, 1 AS auth, active, id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name'";		
	} else {
		$arg = "SELECT password, 1 AS auth, active, id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password=PASSWORD('$password')";
	}

	$result = mcq($arg,$db);
	$row = mysql_fetch_array($result);

	if ($row[auth]){
		if ($row[active]=="no") {
			log_msg("Disabled account","");
			require_once("language.php");
			DisplayLoginForm("This account is disabled");
		}
		GenerateSecret($name);
		$GLOBALS['USERID'] = $row[id];
		$GLOBALS['USERNAME'] = $name;
		if (GetClearanceLevel($GLOBALS['USERID']) == "logger") {
			require_once("language.php");
			DisplayLoginForm($lang[pleaseenter]);
			EndHTML();
			exit;
		}

	}
	else {
		log_msg("invalid","");
		uselogger("WARNING: Invalid user/pass combination on login to repos " . $title . ": user " . $name . " -> access denied","");
		qlog("WARNING: Invalid user/pass combination on login to repos " . $title . ": user " . $name . " -> access denied");
		if ($silent<>yes){
			require_once("language.php");
			DisplayLoginForm("Usu�rio ou Senha inv�lidos. Tente novamente.");
		}
		else{
			$thiswasalogin=0;
			$logon=yes;
			log_msg("login $username","login $username");
			FetchUserLimits();
		}
	}
}
function AuthenticateUserByEncryptedPassword ($name, $password, $silent){
	global $thiswasalogin, $logon, $title,$lang;
	$GLOBALS['CURFUNC'] = "AuthenticateUserByEncryptedPassword::";
	$arg = "SELECT password, 1 AS auth, active, id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password='$password'";
	$result = mcq($arg,$db);
	$row = mysql_fetch_array($result);
	
	if ($row[auth]){
		if ($row[active]=="no") {
			log_msg("Disabled account","");
			require_once("language.php");
			DisplayLoginForm("This account is disabled");
			qlog("This account is disabled");
		}
		GenerateSecret($name);
		$GLOBALS[USERID] = $row[id];
		$GLOBALS[USERNAME] = $name;

	}
	else {
		log_msg("invalid","");
		if ($silent<>yes){
			require_once("language.php");
			DisplayLoginForm("Usu�rio ou Senha inv�lidos. Tente novamente.");
			qlog("Invalid userid or password");
		}
		else{
			$thiswasalogin=0;
			$logon=yes;
			log_msg("login $username","login $username");
			qlog("Login: $username");
			FetchUserLimits();
		}
	}
	$GLOBALS['CURFUNC'] = "";
}
function ActiveUser ($session){
	global $username,$expire,$lang;
	$personresult = mcq("SELECT name, temp, exptime, noexp FROM $GLOBALS[TBL_PREFIX]sessions WHERE temp='$session'",$db);
	$personarray = mysql_fetch_array ($personresult);
	$currenttime = time();
	$settime = $personarray["exptime"]+EXPIRE;
	$todaynum= date("w", $currenttime);
	$expdaynum = date("w", $settime);

	$GLOBALS['USERID'] = GetUserID($personarray['name']);
	$GLOBALS['USERNAME'] = $personarray['name'];
	
	if (GetClearanceLevel($GLOBALS['USERID']) == "logger") {
		require_once("language.php");
		DisplayLoginForm($lang[pleaseenter]);
		EndHTML();
		exit;
	}

  if ($todaynum <> $expdaynum && $currenttime > $settime){ //als het de volgende dag is en je tijd is niet okay.
		$arg = "UPDATE $GLOBALS[TBL_PREFIX]sessions SET noexp='no' WHERE temp='$session'";//  volgende dag en tijd verlopen, noexp to no
		$row = mcq($arg,$db);
		log_msg("expire","");
		SetCookie("session","",time()-500); //unset cookie
		require_once("language.php");

		// Truncate cache table. Not a nice way, but it has to be done sometime.
		mcq("TRUNCATE TABLE " . $GLOBALS['TBL_PREFIX'] . "cache",$db);
		qlog("The cache table was truncated. All cache is now deleted.");
		DisplayLoginForm("You have been inactive too long. Please log in again");
	}
	elseif ($currenttime > $settime && $personarray[noexp]==no){ // als je tijd niet okay is en je mag niet altijd door
		log_msg("expire","");
		SetCookie("session","",time()-500); //unset cookie
		DisplayLoginForm("Session expired, login ...");
	}
	elseif ($session <> $personarray["temp"]){
		$arg = "UPDATE $GLOBALS[TBL_PREFIX]sessions SET noexp='no' WHERE temp='$session'";//  foute session, noexp to no
		$row = mcq($arg,$db);
		log_msg("session","");
		SetCookie("session","",time()-500); //unset cookie
		DisplayLoginForm("Your session key is invalid. Please log in again");
	}
	else{
		setnewtime ($personarray["name"], $session);
		FetchUserLimits();
	}
  return $personarray["name"];
}
function printstepheader($step)
{
	?>
			
	    <center><table border='1' width='40%' bgcolor='#F2F2F2' cellspacing='0' cellpadding='4' bordercolor='#CECECE'>
		<tr><td colspan=2><? echo $step;?></td></tr>
		</table></center>
		<br>
	<?
}


function PrintFooter() {
		global $CRM_VERSION;
	//	print "<table><tr><td></td></tr></table>";
}


function printheader_cust($menu,$tab){
		global $title,$logo,$NoMenu,$lang,$name,$language,$host;
		
		?>
		<html>
		<head>
		<?
		DisplayCSS();
		if (strlen($lang['CHARACTER-ENCODING'])>2) {
			qlog("Character-encoding override in effect: " . $lang['CHARACTER-ENCODING']);
			$charset = $lang['CHARACTER-ENCODING'];
			$GLOBALS['CHARACTER-ENCODING'] = $lang['CHARACTER-ENCODING'];
		} else {
			$charset = "ISO-8859-1";
			$GLOBALS['CHARACTER-ENCODING'] = "ISO-8859-1";
		}



		?>
		<title>C R M management interface - <? echo $title; ?></title>
		<META HTTP-EQUIV="Expires" CONTENT="0">
		<META http-equiv="Content-Type" content="text/html; charset=<? echo $charset;?>">
		<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
		<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
		</head>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--

		
		function pophelp(i)	{
						newWindow = window.open('help.php?id=' + i, 'HelpWindow' + i,'width=350,height=300,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1');
		}

		function popupdater(i,id)	{	
			newWindow = window.open('management.php?loguser=' + id + '&NoMenu=1&e=' + i, 'Update' + i,'width=640,height=630,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1');
			}		

		function popcalendar()	{
						document.EditEntity.duedate.blur();
						newWindow = window.open('calendar.php', 'myWindow2','width=500,height=430,directories=0,status=0,menuBar=0,scrollBars=0,resizable=1');
				}

				//-->
		</SCRIPT>
		<body bgcolor="#ffffff" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" link="#336699" text="#333333" alink="white" vlink="#666666""><br>
		<table border="0" width="100%"><tr><td bgcolor=''>
		<?
			
//		print $title;
		
/*		
		<br><img src='arrow.gif'>&nbsp;<a class='bigsort' title='Log out' href='index.php?logout=1'><? echo $lang[logout];</a><br>
		<img src='arrow.gif'>&nbsp;<a class='bigsort' title='List' href='cust-insert.php?list=1'><? echo $lang[entities];</a><br>

		print "<img src='arrow.gif'>&nbsp;<a href='cust-insert.php?a=2' class='bigsort'>$lang[pbaddrec]</a>";
*/
		?>
		
		
		<?
		//print "<tr><td>" . $lang[managementheader] . " insert-only " . strtolower($lang[customer]) . "-user '" . $name . "'.";

		// Check wheter or not we must now display the language select box
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='langoverride'";
			$result= mcq($sql,$db);
			$resarr=mysql_fetch_array($result);

			if ($resarr[0]=="no" || $resarr[0]=="No" || $resarr[0]=="NO") {


				$top .= $lang['language'] . " : <form name='langform' method='POST'>";
				$top .= "<select name='lan' OnChange='javascript:document.langform.submit();'>";
				$sql= "SELECT DISTINCT LANGID FROM $GLOBALS[TBL_PREFIX]languages";
					$result= mcq($sql,$db);
					while ($resarr=mysql_fetch_array($result)){
							if ((trim($resarr[LANGID])=="") || ($resarr[LANGID] == "GLOBAL")) {
						// GLOBAL is a global language setting which ought to be ignored
							} else {
								if ($language==$resarr[LANGID]) {
									$ins = "SELECTED";
								} else {
									unset($ins);
								}
								$top .= "<option value='$resarr[LANGID]' $ins>$resarr[LANGID]</option>";
							}
					}
					$top .= "</select><input type=hidden name='name' value='$name'></form>";
			} else {
				//$top .= "</td></tr>";
			}
		$epoch = date("U");
			include("tabs_inc.php");
			$tabbs = array (
			"21"		=>  array(($back_end_url . "cust-insert.php?list=1&tab=21&$epoch") => "$lang[entities]"),
			"22"		=>  array(($back_end_url . "cust-insert.php?a=2&tab=22&$epoch") => "$lang[add]"),
			"23"		=>  array(($back_end_url . "") => "</a>&nbsp;#:<form name='direct' action='cust-insert.php?tab=22&$epoch' method=POST><input type='text' size=3 name='e' OnChange='javascript:document.direct.submit()'  OnFocus=\"javascript:document.direct.e.value=''\"></form>" . $evt_ins),
			);

			$tab = "$tab";
	
			if ($GLOBALS['langoverride'] == "No") {
				$tabbs["24"]		=  array(($back_end_url . "index.php?logout=1&$epoch") => $top);
				$tabbs["25"]		=  array(($back_end_url . "index.php?logout=1&$epoch") => "$lang[logout]");
				tabs(array("21","22","23","24","25"), $tabbs, $tab);
			} else {
				$tabbs["24"]		=  array(($back_end_url . "index.php?logout=1&$epoch") => "$lang[logout]");
				tabs(array("21","22","23","24"), $tabbs, $tab);
			}
	



		print "</table></td><td></td></tr>";


		$today = date("F j, Y, H:i") . "h.";
//		$result['value']=0;
		if ($GLOBALS['BODY_LIMITEDHEADER']) {
			// Speciaal voor Linda
			print "<tr><td>" . $GLOBALS['BODY_LIMITEDHEADER'] . "</td></tr>";
		}
		print "</table>";
} // end func

function printheader_management($menu)
{
		global $title,$logo,$NoMenu,$lang,$name,$language,$tab,$host;
		?>
		<html>
		<head>
		<?
			DisplayCSS();
		if (strlen($lang['CHARACTER-ENCODING'])>2) {
			qlog("Character-encoding override in effect: " . $lang['CHARACTER-ENCODING']);
			$charset = $lang['CHARACTER-ENCODING'];
			$GLOBALS['CHARACTER-ENCODING'] = $lang['CHARACTER-ENCODING'];
		} else {
			$charset = "ISO-8859-1";
			$GLOBALS['CHARACTER-ENCODING'] = "ISO-8859-1";
		}


		?>
		<title>C R M management interface - <? echo $title; ?></title>
		<META HTTP-EQUIV="Expires" CONTENT="0">
		<META http-equiv="Content-Type" content="text/html; charset=<? echo $charset;?>">
		<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
		<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
		</head>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--

		function pophelp(i)	{
						newWindow = window.open('help.php?id=' + i, 'HelpWindow' + i,'width=350,height=300,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1');
		}

		function popupdater(i,id)	{	
			newWindow = window.open('management.php?loguser=' + id + '&NoMenu=1&e=' + i, 'Update' + i,'width=640,height=630,directories=0,status=0,menuBar=0,scrollBars=1,resizable=1');
			}		

		function popcalendar()	{
						document.EditEntity.duedate.blur();
						newWindow = window.open('calendar.php', 'myWindow2','width=500,height=430,directories=0,status=0,menuBar=0,scrollBars=0,resizable=1');
				}

				//-->
		</SCRIPT>
		<body bgcolor="#ffffff" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" link="#336699" text="#333333" alink="white" vlink="#666666""><br>
		<table border="0" width="100%"><tr><td bgcolor=''>
		<?
			$epoch = date("U");
			include("tabs_inc.php");
			$tabbs = array (
			"21"		=>  array(($back_end_url . "management.php?list=1&tab=21&$epoch") => "$lang[entities]"),
			//"22"		=>  array(($back_end_url . "cust-insert.php?a=2&tab=22&$epoch") => "$lang[add]"),
			"22"		=>  array(($back_end_url . "") => "</a>&nbsp;#:<form name='direct' action='management.php?tab=22&$epoch' method=POST><input type='text' size=3 name='e' OnChange='javascript:document.direct.submit()'  OnFocus=\"javascript:document.direct.e.value=''\"></form>" . $evt_ins),
			"23"		=>  array(($back_end_url . "index.php?logout=1&$epoch") => "$lang[logout]"),
			);

			tabs(array("21","22","23"), $tabbs, "$tab");

		print "</table></td><td>";

		$today = date("F j, Y, H:i") . "h.";
		$result[value]=0;

		print "<tr><td>" . $lang[managementheader] . " " . $name . ".";
		print "&nbsp;&nbsp;";
		// Check wheter or not we must now display the language select box
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='langoverride'";
			$result= mcq($sql,$db);
			$resarr=mysql_fetch_array($result);

			if ($resarr[0]=="no" || $resarr[0]=="No" || $resarr[0]=="NO") {

				print "$lang[language]&nbsp;:&nbsp;&nbsp;";
				print "<form name='langform' method='POST'>";
				print "<select name='lan' OnChange='javascript:document.langform.submit();'>";
				$sql= "SELECT DISTINCT LANGID FROM $GLOBALS[TBL_PREFIX]languages";
					$result= mcq($sql,$db);
					while ($resarr=mysql_fetch_array($result)){
							if ((trim($resarr[LANGID])=="") || ($resarr[LANGID] == "GLOBAL")) {
						// GLOBAL is a global language setting which ought to be ignored
							} else {
								if ($language==$resarr[LANGID]) {
									$ins = "SELECTED";
								} else {
									unset($ins);
								}
								print "<option value='$resarr[LANGID]' $ins>$resarr[LANGID]</option>";
							}
					}
					print "</select><input type=hidden name='name' value='$name'></form></td></tr>";
			} else {
				print "</td></tr>";
			}


		print "</table>";
} // end func
// repository switcher
function ShowRepositorySwitcher($post_to,$post_to_parent="") {
	global $host,$pass,$database,$table_prefix,$user,$swrepos,$switchreposto,$EnableRepositorySwitcher,$lang,$postto;

	$GLOBALS['CURFUNC'] = "ShowRepositorySwitcher::";
	qlog("ShowRepositorySwitcher called");
	
	if (strtoupper($EnableRepositorySwitcher)<>"YES") {
		if (strtoupper($EnableRepositorySwitcher)=="ADMIN" && is_administrator()==true) {
			// access allowed
		} else {
			$no_access= true;
		}
	}
	
	if ($no_access) {
		// nothing
	} else {
		


		if (sizeof($host)>1) {
			
			if ($swrepos) {
			
				$r = ereg_replace("a-","",$switchreposto);

				$sql = "SELECT password FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='" . $GLOBALS['USERNAME'] . "'";
				$result= mcq($sql,$db);
				$result1= mysql_fetch_array($result);
				$curpassword = $result1[password];
				
				qlog("Switching this user to repository $r");
				log_msg("Switching this user to repository $r","");

				$db = @mysql_connect($host[$r], $user[$r], $pass[$r]);
						mysql_select_db($database[$r],$db);

				$GLOBALS['TBL_PREFIX'] = $table_prefix[$r];
				
				qlog("DB Switched to $r (came from " . $GLOBALS['repository_nr'] . ") - reloading");
				log_msg("This user switched to this repository from repository " . $GLOBALS['repository_nr'],"");
				setCookie('repository',$r);
				$GLOBALS['REPOSID'] = $r;
				$GLOBALS['repository_nr'] = $r;
				AuthenticateUserByEncryptedPassword ($GLOBALS['USERNAME'], $curpassword, "1");
				$GLOBALS['CURFUNC'] = "ShowRepositorySwitcher::";
				if ($_REQUEST['req_url']) {
					qlog("Req_URL received");
					$postto = base64_decode($_REQUEST['req_url']);
				} elseif (trim($postto) == "") {
					$postto = "index.php"; 
				}
				$res = db_GetRow("SELECT value FROM " .  $GLOBALS['TBL_PREFIX'] . "settings WHERE setting ='USE_EXTENDED_CACHE'");
				$GLOBALS['USE_EXTENDED_CACHE'] = $res['value'];

				$res = db_GetRow("SELECT value FROM " .  $GLOBALS['TBL_PREFIX'] . "settings WHERE setting ='NOBARSWINDOW'");
				if ($res['value'] == "Yes") {
					$postto .= "&SFS=1";
				}
				//qlog("************************************************************************************** -> " . $GLOBALS['USE_EXTENDED_CACHE']);



				if ($GLOBALS['USE_EXTENDED_CACHE'] == "Yes") {
					$uri = $postto;

					

				?>
					<SCRIPT LANGUAGE="JavaScript">
					<!--
						document.write('<link href="crm_dft.css" rel="stylesheet" type="text/css">');
					//-->

					</SCRIPT>
					
					<center>
					<table width=100% height=100%><tr><td valign='center'><center>
					<img src='crm.gif'><br>
					<img src='movingbar.gif'>
					<br>Please wait ...
					</center></td></tr></table></center>
					<iframe height=1 width=1 src='index.php?UpdateCacheTables=do&urltogo=<? echo $uri;?>'></iframe>
					<?
						EndHTML();
						exit;
				}

				if (!$postto) {
					$postto = "index.php";
					qlog("postto var defaulted");
				}
				if ($post_to_parent) {
					?>
					<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
					<!--
						window.opener.location='<? echo $postto;?>';
						window.close();
					//-->
					</SCRIPT>
					<?
				} else {
					?>
					<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
					<!--
						document.location='<? echo $postto;?>';
					//-->
					</SCRIPT>
					<?
				}					
			} else {

				if ($post_to_parent) {
	//				window.opener.location

				}
				
				$count = 0;

				$sql = "SELECT password FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='" . $GLOBALS['USERNAME'] . "'";
				$result= mcq($sql,$db);
				$result1= mysql_fetch_array($result);
				$curpassword = $result1[password];

				$outp = "<img src='reposwhite.jpg'> <form name='switchrepos' method='GET'><input type='hidden' name='swrepos' value='1'><input type='hidden' name='postto' value='" . $post_to . "'><input type='hidden' name='post_to_parent' value='" . $post_to_parent . "'><select name='switchreposto' OnChange='javascript:document.switchrepos.submit();'>";

				if (sizeof($pass)>0) {
						for ($r=0;$r<sizeof($pass);$r++) {
								if ($db = @mysql_connect($host[$r], $user[$r], $pass[$r])) {
									if (@mysql_select_db($database[$r],$db)) {
										$tbl = $table_prefix[$r];
										if ($tbl=="") $tbl="CRM";
										$sql = "SELECT password FROM " . $tbl . "loginusers WHERE name='" . $GLOBALS['USERNAME'] . "'";

										$result = @mysql_query($sql);	
										$result1= @mysql_fetch_array($result);
										$foreignpassword = $result1[password];

										if ($curpassword==$foreignpassword) {
											if ($GLOBALS['REPOSNR']==$r) {
												$ins = "SELECTED";
											} else {
												unset($ins);
											}

											$sql = "SELECT id FROM " . $tbl . "loginusers WHERE name='" . $GLOBALS['USERNAME'] . "'";
											$result= mcq($sql,$db);
											$id1= mysql_fetch_array($result);


											
											$sql = "SELECT COUNT(*) FROM " . $tbl . "entity WHERE deleted<>'y' AND assignee='" . $id1[0] . "'";
											$result = mcq($sql,$db);
											$count = mysql_fetch_array($result);

											$sql = "SELECT value FROM " . $tbl . "settings WHERE setting='title'";
											$result = mcq($sql,$db);
											$result = mysql_fetch_array($result);
											$outp .= "<option $ins value='a-" . $r . "'>" . $result['value'] . " (" . $GLOBALS['USERNAME'] . ": " . $count[0] . " " . $lang['openentities'] . ")</option>";
											$county++;
										} else {
											//print "<option>denied</option>";
										}
									} else {
										//print "<option>no select</option>";
									}

								} else {
									 //print "<option>host not found</option>";
								}
							}
				
					$outp .= "</select></form>";
					
					if ($county>1) {
						print $outp;
					}
				} else {
					print "foutje";
				}
			}
		}
		$GLOBALS['CURFUNC'] = "";
	}
	$db = @mysql_connect($host[$GLOBALS['repository_nr']], $user[$GLOBALS['repository_nr']], $pass[$GLOBALS['repository_nr']]);
	@mysql_select_db($database[$GLOBALS['repository_nr']],$db);
}

function EmailTriggerForOwnerSet($e_id) {
	$sql = "SELECT notify_owner FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $e_id . "'";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	if ($result[0] == "y") {
		return(true);
	} else {
		return(false);
	}
}
function EmailTriggerForAssigneeSet($e_id) {
	$sql = "SELECT notify_assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $e_id . "'";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	if ($result[0] == "y") {
		return(true);
	} else {
		return(false);
	}
}
function GlobalEmailTriggerForAssigneeSet($dummy) {
	$sql = "SELECT RECEIVEALLOWNERUPDATES FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	if ($result[0] == "y") {
		return(true);
	} else {
		return(false);
	}
}
function GlobalEmailTriggerForOwnerSet($dummy) {
	$sql = "SELECT RECEIVEALLASSIGNEEUPDATES FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	if ($result[0] == "y") {
		return(true);
	} else {
		return(false);
	}
}

function EmailTriggerForCustomerOwnerSet($c_id) {
	$sqlt = "SELECT customer_owner,email_owner_upon_adds FROM $GLOBALS[TBL_PREFIX]customer WHERE id='". $c_id . "'";
	$resultt= mcq($sqlt,$db);
	$row= mysql_fetch_array($resultt);

	if ($row['email_owner_upon_adds']=="yes") {
		return(true);
	} else {
		return(false);
	}
}
function htmlentities2($myHTML)
{
   $translation_table = get_html_translation_table( HTML_ENTITIES, ENT_QUOTES);
   $translation_table[chr( 38)] = '&';
   return preg_replace( "/&(?![A-Za-z]{0,4}\w{2,3};|#[0-9]{2,4};)/", "&amp;" , strtr( $myHTML, $translation_table));
} 
function ExportUsers() {
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ExportUsers::";
	qlog("Exporting users");
	$sql = "SELECT name,password,type,active,exptime,noexp,FULLNAME,EMAIL,CLLEVEL,administrator,LASTFILTER,LASTSORT,RECEIVEDAILYMAIL,RECEIVEALLOWNERUPDATES,RECEIVEALLASSIGNEEUPDATES,HIDEADDTAB,HIDECSVTAB,HIDESUMMARYTAB,HIDEENTITYTAB,HIDEPBTAB,SHOWDELETEDVIEWOPTION,HIDECUSTOMERTAB FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name NOT LIKE 'deleted_user_%' ";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		$outp .= base64_encode($row['name']) . "," . base64_encode($row['password']) . "," . base64_encode($row['type']) . "," . base64_encode($row['FULLNAME']) . "," . base64_encode($row['EMAIL']) . "," . base64_encode($row['CLLEVEL']) . "," . base64_encode($row['administrator']) . "," . base64_encode($row['LASTFILTER']) . "," . base64_encode($row['LASTSORT']) . "," . base64_encode($row['RECEIVEDAILYMAIL']) . "," . base64_encode($row['RECEIVEALLOWNERUPDATES']) . "," . base64_encode($row['RECEIVEALLASSIGNEEUPDATES']) . "," . base64_encode($row['HIDEADDTAB']) . "," . base64_encode($row['HIDECSVTAB']) . "," . base64_encode($row['HIDESUMMARYTAB']) . "," . base64_encode($row['HIDEENTITYTAB']) . "," . base64_encode($row['HIDEPBTAB']) . "," . base64_encode($row['SHOWDELETEDVIEWOPTION']) . "," . base64_encode($row['HIDECUSTOMERTAB']) . "\n";

	}
	
	$filename = "Exported_users_CRM-CTT_" . urlencode($GLOBALS['title']) . "-" . date("Fj-Y-Hi") . ".crm";

	header("Content-Type: CSV");
	header("Content-Disposition: attachment; filename=$filename" );
	header("Content-Description: CRM Generated Data" );
	header("Window-target: _top");

	print $outp;
}
function ImportCSVUsers() {
	MustBeAdmin();
	if ($_REQUEST['Sheet_Submit']) {
		$imp_arr = split("\n",$_REQUEST['Sheet_Submit']);
		print "<pre>";
		$impc = 0;
		foreach ($imp_arr AS $newuser) {
			$nua = split(";",$newuser);
			//print_r($nua);

//			name ; password ; administrator ; fullname ; email ; hideaddtab ; hidecsvtab ; hidesummarytab ; hideentitytab ; hidepbtab ; hidecustomertab
//			0      1          2               3          4       5            6            7                8               9           10

			if (sizeof($nua)==11) {
				$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]loginusers(name,password,administrator,FULLNAME,EMAIL,HIDEADDTAB,HIDECSVTAB,HIDESUMMARYTAB,HIDEENTITYTAB,HIDEPBTAB,HIDECUSTOMERTAB,CLLEVEL) VALUES ('" . $nua[0] . "',PASSWORD('" . $nua[1] . "'),'" . $nua[2] . "','" . $nua[3] . "','" . $nua[4] . "','" . $nua[5] . "','" . $nua[6] . "','" . $nua[7] . "','" . $nua[8] . "','" . $nua[9] . "','" . $nua[10] . "','rw')";
				mcq($sql,$db);
				//print $sql;
				$impc ++;

			} else {
				print "Error - not the right field count<br>";
			}
		}

		print $impc . " accounts were imported.<br>";
		
	} else {
		?>
		<table><tr><td>&nbsp;&nbsp;&nbsp;</td><td>Import user-accounts using CSV values
		<br><br>Layout: <br><br><b>name ; password ; administrator ; fullname ; email ; hideaddtab ; hidecsvtab ; hidesummarytab ; hideentitytab ; hidepbtab ; hidecustomertab</b>
		<br>You must have all fields, allthough they may be empty.		
		<BR>
		<FORM NAME='ImpCSV' METHOD='POST'>
		<TEXTAREA NAME='Sheet_Submit' ROWS=2 COLS=90>Paste your data here...</TEXTAREA>
		<BR>
		<INPUT TYPE='Submit' VALUE='Import'>
		</FORM>

		<table>
		<tr><td>name</td><td>The user's account name (short)</td></tr>
		<tr><td>password</td><td>The password in plain readable text</td></tr>
		<tr><td>administrator</td><td>'yes' or 'no'</td></tr>
		<tr><td>fullname</td><td>The user's full name, like 'John Doe'</td></tr>
		<tr><td>email</td><td>The user's email address</td></tr>
		<tr><td>hideaddtab</td><td>y for a hidden add tab, else n</td></tr>
		<tr><td>hidecsvtab</td><td>y for a hidden CSV tab, else n</td></tr>
		<tr><td>hidesummarytab</td><td>y for a hidden summary tab, else n</td></tr>
		<tr><td>hideentitytab</td><td>y for a hidden entity list tab, else n</td></tr>
		<tr><td>hidepbtab</td><td>y for a hidden phonebook tab, else n</td></tr>
		<tr><td>hidecustomertab</td><td>y for a hidden customer tab, else n</td></tr>
		<tr><td colspan=2><b>All imported users will have a 'full-access' account.</b></td></tr>
		<tr><td colspan=2><b>This function does NOT CHECK FOR DUPLICATE ACCOUNTS!</b></td></tr>
		</table>
		<?
		print "</td></tr></table>";
		}

}
function ImportUsers() {
	global $legend;
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ImportUsers::";
	qlog("Importing users");
	$sarr = array();
	if ($_FILES['userfile']['tmp_name'] && $_FILES['userfile']['name']) {

		$fp=fopen($_FILES['userfile']['tmp_name'] ,"rb");
		$filecontent=fread($fp,filesize($_FILES['userfile']['tmp_name'] ));
		fclose($fp);
//		$filecontent = addslashes($filecontent);
		//print $filecontent;

		$arr = split("\n",$filecontent);

		foreach ($arr AS $line) {
//			name,password,type,FULLNAME,EMAIL,CLLEVEL,administrator,LASTFILTER,LASTSORT,RECEIVEDAILYMAIL
			$element_count=0;
			$account = split(",",$line);
			
			$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]loginusers(name,password,type,FULLNAME,EMAIL,CLLEVEL,administrator,LASTFILTER,LASTSORT,RECEIVEDAILYMAIL,RECEIVEALLOWNERUPDATES,RECEIVEALLASSIGNEEUPDATES,HIDEADDTAB,HIDECSVTAB,HIDESUMMARYTAB,HIDEENTITYTAB,HIDEPBTAB,SHOWDELETEDVIEWOPTION,HIDECUSTOMERTAB,) VALUES (";

			foreach ($account AS $element) {
				$sql .= "'" . addslashes(base64_decode($element)) . "',";
				$element_count++;
			}
			$sql .= ")";
			$sql = ereg_replace(",)",")",$sql);
			if ($element_count==19) {
				// 1st element is the account name, and it may not already exist.
				if (GetUserNameByName(base64_decode($account[0]))<>"n/a") {
					$GLOBALS['CURFUNC'] = "ImportUsers::";
					qlog("Error. Account " . base64_decode($account[0]) . " already exists (fullname " . GetUserNameByName(base64_decode($account[0])) . ")");
				} else {
					array_push($sarr,$sql);
				}
			} else {
				$GLOBALS['CURFUNC'] = "ImportUsers::";
				qlog("Ignoring record with $element_count instead of 19 elements");
			}

		}
		
		$GLOBALS['CURFUNC'] = "ImportUsers::";
		if (sizeof($sarr)==0) {
				qlog("No valid accounts to import found");
				$legend = "<img src='error.gif'>";
				printbox("No valid accounts to import found in this file.<br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a>");
		} else {
				qlog("Importing " . sizeof($sarr) . " accounts");
				foreach ($sarr AS $query) {
					mcq($query,$db);
				}
				print sizeof($sarr) . " user-accounts imported.";
		}
			
	} else {
		print "<table><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Import users&nbsp;</legend><table>";
		print "<tr><td>Select file for upload:</td><td><FORM ENCTYPE='multipart/form-data' name='IU' method='POST'><INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file'></td></tr><tr><td><INPUT TYPE='submit' value='Upload'></TD></TR><TR><TD COLSPAN=2><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a></TD></TR></FORM></TD></TR></TABLE>";
	}
	
}
function ExportSettings() {
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ExportUsers::";
	qlog("Exporting settings");
	$sql = "SELECT setting,value,discription FROM $GLOBALS[TBL_PREFIX]settings";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		$outp .= base64_encode($row['setting']) . "," . base64_encode($row['value']) . "," . base64_encode($row['discription']) . "\n";

	}
	
	$filename = "Exported_settings_CRM-CTT_" . urlencode($GLOBALS['title']) . "-" . date("Fj-Y-Hi") . ".crm";

	header("Content-Type: CSV");
	header("Content-Disposition: attachment; filename=$filename" );
	header("Content-Description: CRM Generated Data" );
	header("Window-target: _top");

	print $outp;
}
function ImportSettings() {
	global $legend;
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ImportSettings::";
	qlog("Importing users");
	$sarr = array();
	if ($_FILES['userfile']['tmp_name'] && $_FILES['userfile']['name']) {

		$fp=fopen($_FILES['userfile']['tmp_name'] ,"rb");
		$filecontent=fread($fp,filesize($_FILES['userfile']['tmp_name'] ));
		fclose($fp);
//		$filecontent = addslashes($filecontent);
		//print $filecontent;

		$arr = split("\n",$filecontent);

		foreach ($arr AS $line) {
//			name,password,type,FULLNAME,EMAIL,CLLEVEL,administrator,LASTFILTER,LASTSORT,RECEIVEDAILYMAIL
			$element_count=0;
			$set_row = split(",",$line);
			
			$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]settings(setting,value,discription) VALUES (";

			foreach ($set_row AS $element) {
				$sql .= "'" . addslashes(base64_decode($element)) . "',";
				$element_count++;
			}
			$sql .= ")";
			$sql = ereg_replace(",)",")",$sql);
			if ($element_count==3) {
				// 1st element is the account name, and it may not already exist.
					array_push($sarr,$sql);
				
			} else {
				$GLOBALS['CURFUNC'] = "ImportSettings::";
				qlog("Ignoring record with $element_count instead of 3 elements");
			}

		}
		$GLOBALS['CURFUNC'] = "ImportSettings::";
		if (sizeof($sarr)==0) {
				qlog("No valid accounts to import found");
				$legend = "<img src='error.gif'>";
				printbox("No valid setting records to import found in this file.<br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a>");
		} else {
				qlog("Importing " . sizeof($sarr) . " setting records");
				mcq("TRUNCATE TABLE $GLOBALS[TBL_PREFIX]settings",$db);
				foreach ($sarr AS $query) {
					mcq($query,$db);
				}
				print sizeof($sarr) . " setting records imported.";
				log_msg(sizeof($sarr) . " setting records imported.");
		}
			
	} else {
		print "<table><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Import global settings (ALL CURRENT GLOBAL SETTNGS WILL BE REMOVED!)&nbsp;</legend><table>";
		print "<tr><td>Select file for upload:</td><td><FORM ENCTYPE='multipart/form-data' name='IU' method='POST'><INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file'></td></tr><tr><td><INPUT TYPE='submit' value='Upload'></TD></TR><TR><TD COLSPAN=2><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a></TD></TR></FORM></TD></TR></TABLE>";
	}
	
}
function ExportExtraFields() {
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ExportExtraFields::";
	qlog("Exporting settings");
	$sql = "SELECT ordering,tabletype,hidden,fieldtype,name,options,location,deleted,forcing FROM $GLOBALS[TBL_PREFIX]extrafields";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		$outp .= base64_encode($row['ordering']) . "," . base64_encode($row['tabletype']) . "," . base64_encode($row['hidden']) . "," . base64_encode($row['fieldtype']) . "," . base64_encode($row['name']) . "," . base64_encode($row['options']) . "," . base64_encode($row['location']) . "," . base64_encode($row['deleted']) . "," . base64_encode($row['forcing']) . "\n";

	}
	
	$filename = "Exported_extra-field-definitions_CRM-CTT_" . urlencode($GLOBALS['title']) . "-" . date("Fj-Y-Hi") . ".crm";

	header("Content-Type: CSV");
	header("Content-Disposition: attachment; filename=$filename" );
	header("Content-Description: CRM Generated Data" );
	header("Window-target: _top");

	print $outp;
}
function ImportExtraFields() {
	global $legend;
	MustBeAdmin();
	$GLOBALS['CURFUNC'] = "ImportExtraFields::";
	qlog("Importing users");
	$sarr = array();
	if ($_FILES['userfile']['tmp_name'] && $_FILES['userfile']['name']) {

		$fp=fopen($_FILES['userfile']['tmp_name'] ,"rb");
		$filecontent=fread($fp,filesize($_FILES['userfile']['tmp_name'] ));
		fclose($fp);
//		$filecontent = addslashes($filecontent);
		//print $filecontent;

		$arr = split("\n",$filecontent);

		foreach ($arr AS $line) {
//			name,password,type,FULLNAME,EMAIL,CLLEVEL,administrator,LASTFILTER,LASTSORT,RECEIVEDAILYMAIL
			$element_count=0;
			$set_row = split(",",$line);
			
			$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]extrafields(ordering,tabletype,hidden,fieldtype,name,options,location,deleted,forcing) VALUES (";

			foreach ($set_row AS $element) {
				$sql .= "'" . addslashes(base64_decode($element)) . "',";
				$element_count++;
			}
			$sql .= ")";
			$sql = ereg_replace(",)",")",$sql);
			if ($element_count==9) {
				// 1st element is the account name, and it may not already exist.
					array_push($sarr,$sql);
				
			} else {
				$GLOBALS['CURFUNC'] = "ImportExtraFields::";
				qlog("Ignoring record with $element_count instead of 9 elements");
			}

		}
		$GLOBALS['CURFUNC'] = "ImportExtraFields::";
		if (sizeof($sarr)==0) {
				qlog("No valid accounts to import found");
				$legend = "<img src='error.gif'>";
				printbox("No valid definitions to import found in this file.<br><br><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a>");
		} else {
				qlog("Importing " . sizeof($sarr) . " extra field definitions");
				
				foreach ($sarr AS $query) {
					mcq($query,$db);
				}
				print sizeof($sarr) . " extra field definitions imported.";
				log_msg(sizeof($sarr) . " extra field definitions imported.");
		}
			
	} else {
		print "<table><tr><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Import extra field definitions (current definitions will stay)&nbsp;</legend><table>";
		print "<tr><td>Select file for upload:</td><td><FORM ENCTYPE='multipart/form-data' name='IU' method='POST'><INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file'></td></tr><tr><td><INPUT TYPE='submit' value='Upload'></TD></TR><TR><TD COLSPAN=2><img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password&joepie=1' style='cursor:pointer'>Back to main administration page</a></TD></TR></FORM></TD></TR></TABLE>";
	}
	
}
function word2html($var,$nl2br = false){
   $chars = array(
       128 => '&#8364;',
       130 => '&#8218;',
       131 => '&#402;',
       132 => '&#8222;',
       133 => '&#8230;',
       134 => '&#8224;',
       135 => '&#8225;',
       136 => '&#710;',
       137 => '&#8240;',
       138 => '&#352;',
       139 => '&#8249;',
       140 => '&#338;',
       142 => '&#381;',
       145 => '&#8216;',
       146 => '&#8217;',
       147 => '&#8220;',
       148 => '&#8221;',
       149 => '&#8226;',
       150 => '&#8211;',
       151 => '&#8212;',
       152 => '&#732;',
       153 => '&#8482;',
       154 => '&#353;',
       155 => '&#8250;',
       156 => '&#339;',
       158 => '&#382;',
       159 => '&#376;');
   $var = str_replace(array_map('chr', array_keys($chars)), $chars, htmlentities(stripslashes($var)));
   if($nl2br){
       return nl2br($var);
   } else {
       return $var;
   }
}
function GetEntityFormID($eid) {
	$row = db_GetRow("SELECT formid FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid . "'");
	return($row['formid']);
}
function GetNumOfEntities($cid, $deleted=false) {
	
	if ($deleted=="not_del") {
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid . " AND deleted<>'y'";
	} elseif ($deleted=="del") {
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid . " AND deleted='y'";
	} else {
		$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid;
	}

	$result= mcq($sql,$db);
	$row= mysql_fetch_array($result);
	return($row[0]);
}

function GetAvgEntityAge($cid,$deleted=false) {
	if ($deleted=="not_del" && is_numeric($cid)) {
		$sql = "SELECT eid, openepoch FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid . " AND deleted<>'y'";
	} elseif ($deleted=="del" && is_numeric($cid)) {
		$sql = "SELECT eid, openepoch, closeepoch FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid . " AND deleted='y'";
	} elseif (is_numeric($cid)){
		$sql = "SELECT eid, openepoch, closeepoch FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer=" . $cid;
	} else {
		$sql = "SELECT eid, openepoch, closeepoch FROM $GLOBALS[TBL_PREFIX]entity";
	}
	$num = 0;
	$result= mcq($sql,$db);
	while ($row= mysql_fetch_array($result)) {
		$ages += GetEntityAge($row['eid'],true);
		$num++;
	}
	@$age_in_seconds = $ages/$num;

	if ($age_in_seconds>86400) {
		$age = round($age_in_seconds/86400,0) . " days";
	} elseif ($age_in_seconds>3600) {
		$age = round($age_in_seconds/3600,0) . " hours";
	} elseif ($age_in_seconds>60) {
		$age = round($age_in_seconds/60,0) . " minutes";
	} elseif ($age_in_seconds<>$nowepoch) {
		$age = round($age_in_seconds,0) . " seconds";
	}
	$GLOBALS['avg_age'] = ceil($age_in_seconds);
	
	return($age);
}
function GetEntityCustomer($eid) {

	$sql = "SELECT CRMcustomer FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid . "'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	return($row['CRMcustomer']);
}

function GetEntityCategory($eid) {
	$sql = "SELECT category FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid . "'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	return($row['category']);
}

function GetEntityParent($eid) {
	$sql = "SELECT parent FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid . "'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	if (CheckEntityAccess($row['parent'])=="ok" || CheckEntityAccess($row['parent'])=="read-only") {
		return($row['parent']);
	} else {
		return("denied");
	}
}
function PrintChilds($e, $nbsp, $ret=false, $int=false, $rv=false) {
	global $childcounter;

	if ($e=="_new_") {
		return(false);
	}
	$childs = GetEntityChilds($e);
	foreach ($childs AS $child) {
		qlog("Processing $child");
		if (CheckEntityAccess($child)=="ok" || CheckEntityAccess($child)=="readonly") {
			$childcounter++;
			if ($ret) {
				$rv .= "<br>" . $nbsp . $child . " <a href='edit.php?e=" . $child . "'>" . GetEntityCategory($child) . "</a>";
				$rv = PrintChilds($child, $nbsp. "&nbsp;&nbsp;&nbsp;&nbsp;", $ret, true, $rv);
			} else {
				print "<br>" . $nbsp . $child . " <a href='edit.php?e=" . $child . "'>" . GetEntityCategory($child) . "</a>";
				PrintChilds($child, $nbsp. "&nbsp;&nbsp;&nbsp;&nbsp;", false, true);
			}
		}	
	}

	if ($ret) {
		return($rv);
	}
}

function GetEntityFamily($eid) {
	// Returns *all* childs and grandchilds of an entity
	$ret=array();
	$GLOBALS['ret_int'][0] = "bla";
	$sql = "SELECT eid FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE parent='" . $eid . "'";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (!in_array($row['eid'], $GLOBALS['ret_int'])) {
			//if (CheckEntityAccess($row['eid'])=="ok" || CheckEntityAccess($row['eid'])=="read-only") {
				
				array_push($ret, $row['eid']);
				array_push($GLOBALS['ret_int'], $row['eid']);

				qlog("Push " . $row['eid']);
			//}
			$ret = array_merge(GetEntityFamily($row['eid']), $ret);
		} 
	}
	return($ret);
}

function PrintSisters($e, $nbsp, $ret=false) {
	if ((GetEntityParent($e) <> 0) || ($e=="root")) {

		if ($e == "root") {
			$c = 0;
		} else {
			$c = GetEntityParent($e);
		}
		$childs = GetEntityChilds($c);
		foreach ($childs AS $child) {
			if ($e <> $child) {
				if (CheckEntityAccess($child)=="ok" || CheckEntityAccess($child)=="readonly") {
					if ($ret) {
						$GLOBALS['returnval2'] .= "<br>" . $nbsp . $child . " <a href='edit.php?e=" . $child . "'>" . GetEntityCategory($child) . "</a>";
						$GLOBALS['returnval2'] .= PrintChilds($child, $nbsp. "&nbsp;&nbsp;&nbsp;&nbsp;", true, false);
					} else {
						print "<br>" . $nbsp . $child . " <a href='edit.php?e=" . $child . "'>" . GetEntityCategory($child) . "</a>";
						PrintChilds($child, $nbsp. "&nbsp;&nbsp;&nbsp;&nbsp;", false, false);
					}
				}
			}
			//$nbsp .= "&nbsp;&nbsp;&nbsp;&nbsp;";							
		}
	} else {
		//print "ooops";
	}
	if ($ret) {
		return($GLOBALS['returnval2']);
	}
}

// This function checks if an entity can (may) be set as child to $parent
function ValidateParentalRights($parent, $eid) {
	$GLOBALS['CURFUNC'] = "ValidateParentalRights::";
	qlog("Validating if $eid can be child of $parent...");
	$Earr = GetEntityArray($parent);
	if (is_numeric($Earr['eid']) && ($Earr['parent'] <> $eid)) {
		$arr = GetEntityFamily($eid);
		if (!in_array($parent,$arr)) {
			qlog("Approved: " . $Earr['eid']);
			return(true);
		} else {
			qlog("Declined");
			return(false);
		}
	} else {
		qlog("Declined");
		return(false);
	}
}

function GetEntitySurroundings($eid) {

/*
	[grandparent]
			[parent]
				[*entity*]
					[children]
						[grandchildren]
				[sisters]
*/

		
}

function GetEntityChilds($eid) {
	$ret=array();
	$sql = "SELECT eid FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE parent='" . $eid . "' AND deleted<>'y'";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (CheckEntityAccess($row['eid'])=="ok" || CheckEntityAccess($row['eid'])=="readonly") {
			array_push($ret, $row['eid']);
		}	
	}
	return($ret);
}

function GetEntityArray($eid) {
	return(mysql_fetch_array(mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid . "'", $db)));
}

function GetEntityAge($ent_id, $pure=false) {

	$nowepoch = date('U');

	$sql = "SELECT openepoch,closeepoch FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $ent_id . "'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	if ($row['closeepoch']=="") {
    	    $nowepoch = date('U');
            $txt = "Age";
	} else {
            $nowepoch = $row['closeepoch'];
            $txt = "Duration";
	}
			
	if ($row['openepoch']=="") {
		$age = "";
	} else {
		$age_in_seconds = $nowepoch - $row['openepoch'];

		if ($age_in_seconds>86400) {
			$age = "$txt: " . round($age_in_seconds/86400,2) . " days";
		} elseif ($age_in_seconds>3600) {
			$age = "$txt: " . round($age_in_seconds/3600,2) . " hours";
		} elseif ($age_in_seconds>60) {
			$age = "$txt: " . round($age_in_seconds/60,2) . " minutes";
		} elseif ($age_in_seconds<>$nowepoch) {
			$age = "$txt: " . round($age_in_seconds,0) . " seconds";
		} 

	}
	if ($pure) {
		return(round($age_in_seconds,0));
	} else {
		return($age);
	}
}
function readln() {
	$ret = "";
	$fp = fopen("php://stdin", "r") or die("Fatal Error: could not read from.stdin");
	while($char != "\n" ) 
	{
		$char = fread($fp, 1);
		$ret .= $char;
	}
	fclose($fp);
	return(trim($ret));
}
function AuthenticateUser2 ($name, $password, $silent) {
	global $noneedtobeadmin;

	if ($noneedtobeadmin) {
		$arg = "SELECT password, 1 AS auth, active, id, active FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password=PASSWORD('$password')";
	} else {
		$arg = "SELECT password, 1 AS auth, active, id, active FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password=PASSWORD('$password') AND administrator='yes'";
	}
	$result = mcq($arg,$db);
	$row = mysql_fetch_array($result);

	if ($row[auth]){
		if ($row[active]=="no") {
			return false;
		} else {
			$GLOBALS[USERID] = $row[id];
			return true;
		}
	}else {
		
		if ($silent<>yes){
			return false;
		}
		else{
			$thiswasalogin=0;
			$logon=yes;
			$GLOBALS[USERID] = $row[id];
			return true;
		}
	}
}
function CommandlineLogin($username,$password,$repository) {
	global $repos,$pass,$host,$user,$database,$table_prefix,$silent,$noneedtobeadmin;
	$repos = array();
	$count = 0;

		if (sizeof($pass)>1) {
						for ($r=0;$r<sizeof($pass);$r++) {
								
								if ($db = @mysql_connect($host[$r], $user[$r], $pass[$r])) {
									if (@mysql_select_db($database[$r],$db)) {
										$PRFX = $table_prefix[$r];
										// If no TBL_PREFIX is found, it ought to be "CRM"

										if ($PRFX=="") $PRFX="CRM";

										$sql = "SELECT value FROM " . $PRFX . "settings WHERE setting='title'";
										$result = @mysql_query($sql);	
										$maxU1 = @mysql_fetch_array($result);
										$title = $maxU1[0];
										if (!$title=="") {
											if (!$password && !$username) {
												print " $r - $title \n";
											}
											$titles[$r] = $title;
											$repos[$r] = $title;
											$count++;
										}	
									} else {
									
									}

								} else {
									
								}
							}
			if (!$password && !$username) {
				print "\nPlease select your repository to work with (0-" . (sizeof($pass)-1) . ")\n\n";
				print "CRM > ";
				$repository = readln();
				$repository = $repository * 1; // make it an integer
			//	$repository = $repository;

				$GLOBALS['TBL_PREFIX'] = $table_prefix[$repository];

			}
		} else {
			$PRFX = $table_prefix[0];
			$GLOBALS['TBL_PREFIX'] = $table_prefix[0];
			$repository = 0;
		}
	
	$db = @mysql_connect($host[$repository], $user[$repository], $pass[$repository]);

	if (@mysql_select_db($database[$repository],$db)) 
	{
		// all ok 
		$GLOBALS['REPOSNR'] = $repository;
	}

	$sql = "SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "settings WHERE setting='title'";

	$result =@mysql_query($sql);	
	$maxU1 = @mysql_fetch_array($result);
	$title = $maxU1[0];

	//require("getset.php");

	if (!$username) {
		print "Please log in to $title:\n\n";
		print("Username : ");
		$username = readln();
	}
	if (!$password) {
		if ($fpt=@fopen("/etc/passwd","r")) { // this is probably UNIX
			$is_unix = true;
			@fclose($fpt);
		}
		if ($is_unix) {
			$password = ReadText("Password : ",true);
		} else {
			print("Password (will be displayed in plain text): ");
			$password = readln();
		}

	}
	if ($password=="") {
			print "Received password was empty. Please enter it again.\n";
			print("Password (will be displayed in plain text): ");
			$password = readln();
	}
	$GLOBALS[TBL_PREFIX] = $table_prefix[$repository];
	if (@AuthenticateUser2($username,$password,"n") == true) {
		if (!$silent) {
			print "\nYou are connected to repository \"" . $title	 . "\"\n\n";
		}
		$ret = true;
	} else {
		print "Authentication failed (user, password or not being admin error)\nBye!\n";
		$ret = false;
	}
	return($ret);
}

function ReadText($Prompt,$Silent=False){ // only for linux
   $Options="-er";
   If($Silent==True){
     $Options=$Options." -s";
   }
   $Returned=POpen("read $Options -p \"$Prompt\"; echo \$REPLY","r");
   $TextEntered=FGets($Returned,100);
   PClose($Returned);
   $TextEntered=SubStr($TextEntered,0,StrLen($TextEntered)-1);
   If($Silent==True){
     Print "\n";
     @OB_Flush();
     Flush();
   }
   Return $TextEntered;
  }


function CheckPageAccess($page) {
	$GLOBALS['CURFUNC'] = "CheckPageAccess::";
	if (is_administrator()==false) {

		if ($page=="pb" && strtoupper($GLOBALS['HIDEPBTAB'])=="YES") {
				$denied = 1;
		}
		if ($page=="add" && strtoupper($GLOBALS['HIDEADDTAB'])=="YES") {
				$denied = 1;
		}
		if ($page=="csv" && strtoupper($GLOBALS['HIDECSVTAB'])=="YES") {
				$denied = 1;
		}
		if ($page=="entity" && strtoupper($GLOBALS['HIDEENTITYTAB'])=="YES") {
				$denied = 1;
		}
		if ($page=="summary" && strtoupper($GLOBALS['HIDESUMMARYTAB'])=="YES") {
				$denied = 1;
		}

		


		if ($denied) {
			$GLOBALS['CURFUNC'] = "CheckPageAccess::";
			qlog("Access to page '" . $page . "' was denied.");
			$GLOBALS['CURFUNC'] = "";
			printAD("Access to this page is denied by policy; group or personal");
			EndHTML();
			exit;
		} else {
			$GLOBALS['CURFUNC'] = "CheckPageAccess::";
			qlog("Access to page '" . $page . "' was granted");
		}
	} else {
		$GLOBALS['CURFUNC'] = "CheckPageAccess::";
		qlog("Access to page '" . $page . "' was granted (user is admin)");
	}
	$GLOBALS['CURFUNC'] = "";
}
function CheckIfShell() {
	// This should NOT be run via the web!
	if ($_SERVER['REQUEST_URI']) {
			?>
			<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
			<!--
				alert('You tried to access a shell (command-line) script through the web. Redirecting.');
				document.location='index.php';
			//-->
			</SCRIPT>
			<?
			EndHTML();
			exit;
	}
}
function Author() {
	require("ath.php");
	Author2();
}

function CleanExtraFieldName($fieldname) {

	// This function strips reserverd prefixes of off extra field names
	if (stristr($fieldname,"DD_VAT_")) {
			$fieldname = str_replace("DD_VAT_","",$fieldname);
			$tmp = explode("|",$fieldname);
			$fieldname = $tmp[0];
	} elseif (stristr($fieldname,"DD_")) {
			$fieldname = str_replace("DD_","",$fieldname);
			$tmp = explode("|",$fieldname);
			$fieldname = $tmp[0];
	} elseif (stristr($fieldname,"TB_")) {
			$fieldname = str_replace("TB_","",$fieldname);
	} elseif (stristr($fieldname,"EML_")) {
			$fieldname = str_replace("EML_","",$fieldname);
	} elseif (stristr($fieldname,"IHC_")) {
			$fieldname = str_replace("IHC_","",$fieldname);
	} elseif (stristr($fieldname,"DATE_")) {
			$fieldname = str_replace("DATE_","",$fieldname);
	} elseif (stristr($fieldname,"IHS_")) {
			$fieldname = str_replace("IHS_","",$fieldname);
	} elseif (stristr($fieldname,"LINK_")) {
			$fieldname = str_replace("LINK_","",$fieldname);
	} elseif (stristr($fieldname,"COMMENT_")) {
			$fieldname = str_replace("COMMENT_","",$fieldname);
	}
	if (stristr($fieldname,"HIDE_")) {
			$fieldname = str_replace("HIDE_","",$fieldname);
	}

	return($fieldname);
}
function CleanExtraFieldTag($tag) {
	$tag = str_replace("@EF_","",$tag);
	$tag = substr($tag,0,strlen($tag)-1);
	return(CleanExtraFieldName($tag));
}
function DetermineExtraFieldType($fieldname) {

	// This function strips reserverd prefixes of off extra field names
	if (stristr($fieldname,"DD_VAT")) {
			$type = "VAT percentage overrule dropdown box";
	} elseif (stristr($fieldname,"DD_")) {
			$type = "Drop-down box";
	} elseif (stristr($fieldname,"TB_")) {
			$type = "Textbox (TEXTAREA)";
	} elseif (stristr($fieldname,"EML_")) {
			$type = "E-Mail";
	} elseif (stristr($fieldname,"IHC_")) {
			$type = "Invoice price (per qty/hrs)";
	} elseif (stristr($fieldname,"IHS_")) {
			$type = "Invoice qty/hrs";
	} elseif (stristr($fieldname,"DATE_")) {
			$type = "Date field";
	} elseif (stristr($fieldname,"COMMENT_")) {
			$type = "Template-based comment";
	} elseif (stristr($fieldname,"LINK_")) {
			$type = "Hyperlink";
	} else {
			$type = " Single-line text box";
	}
	if (stristr($fieldname,"HIDE_")) {
		$type .= " (hidden for limited users)";
	}
return($type);
}

function PushStashValue($value) {
		// This function puts a stash (cache) value into the database and returns the reference number
		$tmp = $GLOBALS['CURFUNC'];
		if (is_array($value)) {
			$value = serialize($value);
		}
		$GLOBALS['CURFUNC'] = "PushStashValue::";
		if (strlen($value)>0) {
			$epoch = date('U');
			$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]cache(value,epoch) VALUES('" . base64_encode($value) . "','" . $epoch . "')";
			$result = mcq($sql,$db);
			$id = mysql_insert_id();
			qlog("Pushed stash value " . $id);
		} else {
			qlog("ERROR - cannot push empty variable!");
			$id = "";
		}
		$GLOBALS['CURFUNC'] = $tmp;
		return($id);
}
function PopStashValue($stashid) {
		// This function retreives a stash (cache) value from the database and returns the contents of the record
		$tmp = $GLOBALS['CURFUNC'];
		$GLOBALS['CURFUNC'] = "PopStashValue::";
		$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]cache WHERE stashid='" . $stashid ."'";
		$result = mcq($sql,$db);
		$ee = mysql_fetch_array($result);
		qlog("Popped stash value " . $stashid);
		$GLOBALS['CURFUNC'] = $tmp;
		$val = base64_decode($ee['value']);
		if ($val2 = unserialize($val)) {
			$val = $val2;
		}
		return($val);				
}
function DropStashValue($stashid) {
		// This function deletes a stash (cache) value from the database
		$tmp = $GLOBALS['CURFUNC'];
		$GLOBALS['CURFUNC'] = "DropStashValue::";
		$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]cache WHERE stashid='" . $stashid ."'";
		mcq($sql,$db);
		qlog("Dropped stash value " . $stashid);
		$GLOBALS['CURFUNC'] = $tmp;
		return(true);
}
function UpdateStashValue($stashid,$value) {
		// This function deletes a stash (cache) value from the database
		$tmp = $GLOBALS['CURFUNC'];
		$GLOBALS['CURFUNC'] = "UpdateStashValue::";
		if (is_array($value)) {
			$value = serialize($value);
		}
		$epoch = date('U');
		$sql = "UPDATE $GLOBALS[TBL_PREFIX]cache SET value ='" . $value . "',epoch='" . $epoch . "' WHERE stashid='" . $stashid ."'";
		mcq($sql,$db);
		qlog("Updated stash value " . $stashid);
		$GLOBALS['CURFUNC'] = $tmp;
		return(true);
}
function ParseTemplateEntity($template,$entity) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "ParseTemplateEntity::";
	qlog("Template parsed (entity)");
	if (strlen($template)==0) {
		qlog("ERROR ------> template is empty!");
		log_msg("ERROR::ParseTemplateEntity:Template to be parsed is empty!","");
		return(0);
	}
	if ($entity > 0) {
		$GLOBALS['LAST_CALL_PTE'] = $entity;
		qlog("Setting LCPTE: $entity");
	} else {
		qlog("ERROR - No Entity ID received ($entityid). (replacing with last called EID: " . $GLOBALS['LAST_CALL_PTE'] . ") (ouch!)");	
		$entity = $GLOBALS['LAST_CALL_PTE'];
	}
	
	if ($GLOBALS['DateFormat'] == 'dd-mm-yyyy') {
		$date = date('d-m-Y');
	} else {
		$date = date('m-d-Y');				
	}
	
	if ($entity<>0) {
		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $entity . "'";
		$result = mcq($sql,$db);
		$row = mysql_fetch_array($result);
	} else {
		qlog("ERROR - No Entity ID received ($entityid). (replacing with last called EID: " . $GLOBALS['LAST_CALL_PTE'] . ")");	
		//$template = ParseTemplateCleanUp($template);
		$entity = $GLOBALS['LAST_CALL_PTE'];
	}

		$template = str_replace("&amp;","&",$template);

		// Entity-specific replacements
		$template = str_replace('@ENTITYID@',	$row['eid'],							$template);
		$template = str_replace('@EID@',		$row['eid'],							$template);
		$template = str_replace('@CATEGORY@',	$row['category'],						$template);
		$template = str_replace('@OWNER@',		GetUserName($row['owner']),				$template);
		$template = str_replace('@ASSIGNEE@',	GetUserName($row['assignee']),			$template);
		$template = str_replace('@CUSTOMER@',	GetCustomerName($row['CRMcustomer']),	$template);
		$template = str_replace('@DUEDATE@',	TransformDate($row['duedate']),			$template);
		$template = str_replace('@STATUS@',		$row['status'],							$template);
		$template = str_replace('@PRIORITY@',	$row['priority'],						$template);
		$template = str_replace('@CONTENTS@',	ereg_replace("\n","<br> ",$row['content']),$template);
		
		$template = ereg_replace("@DATE@",$date,$template);
		
		$template = str_replace('@AGE@', GetEntityAge($row['eid']), $template);

		if (strstr($template,"@NUM_ATTM@")) {
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='" . $entity . "' AND type='entity'";
			$result = mcq($sql,$db);
			$row = mysql_fetch_array($result);
			$template = str_replace("@NUM_ATTM@",$row[0],$template);
		}
		
		// First make a list of tags which are actually in the template

		//if (!$GLOBALS['eflist_filtered_entity']) {
			$eflist = GetExtraFields();
			$GLOBALS['eflist_filtered_entity'] = array();
			foreach($eflist AS $field) {
				if (strstr($template,"@EFID" . $field['id'] . "@")) {
					array_push($GLOBALS['eflist_filtered_entity'],$field);
				}
			}
		//} else {
		//	qlog("Skipping extra field parse - already in memory");
		//}

		for ($x=0;$x<sizeof($GLOBALS['eflist_filtered_entity']);$x++) {

			$field = $GLOBALS['eflist_filtered_entity'][$x];
			
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type<>'cust' AND name='" . $field['id'] ."' AND eid='" . $entity . "'";
			$result = mcq($sql,$db);
			$row = mysql_fetch_array($result);
			if ($field['fieldtype'] == "date") {
				$row['value'] = TransformDate($row['value']);
			} elseif (strstr($field['fieldtype'],"User-list")) {
				$row['value'] = GetUserName($row['value']);
			}

			$row['value'] = FunkifyLOV($row['value']);

			$template = str_replace("@EFID" . $field['id'] . "@",ereg_replace("\n","<br> ",$row['value']),$template);
		}

	$GLOBALS['CURFUNC'] = $tmp;
//	$template = preg_replace("/@EFID\d+@/", "n/a", $template);
	return($template);
}
function ParseTemplateGeneric($template) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "ParseTemplateGeneric::";
	if (strlen($template)==0) {
			qlog("ERROR ------> template is empty!");
			log_msg("ERROR::ParseTemplateGeneric:Template to be parsed is empty!","");
			return(0);
	}

	qlog("Template parsed (generic)");

	if ($GLOBALS['DateFormat'] == 'dd-mm-yyyy') {
		$date = date('d-m-Y');
	} else {
		$date = date('m-d-Y');				
	}

	$template = str_replace("&amp;","&",$template);

	// Global variable replacements
	$template = str_replace('@ADMINEMAIL@',$GLOBALS['admemail'],$template);
	$template = str_replace('@ADMEMAIL@',$GLOBALS['admemail'],$template);
	$template = str_replace('@WEBHOST@',$GLOBALS['webhost'],$template);
	$template = str_replace('@TITLE@',$GLOBALS['title'],$template);
	$template = ereg_replace("@DATE@",$date,$template);
		
	$GLOBALS['CURFUNC'] = $tmp;
	return($template);
}
function ParseTemplateCustomer($template, $customer) {
		$eid = $customer;
		$tmp = $GLOBALS['CURFUNC'];
		$GLOBALS['CURFUNC'] = "ParseTemplateCustomer::";

		if (strlen($template)==0) {
			qlog("ERROR ------> template is empty!");
			log_msg("ERROR::ParseTemplateCustomer:Template to be parsed is empty!","");
			return(0);
		}
		$template = str_replace("&amp;","&",$template);

		if ($GLOBALS['DateFormat'] == 'dd-mm-yyyy') {
			$date = date('d-m-Y');
		} else {
			$date = date('m-d-Y');				
		}
		
		$sql = "SELECT id,custname,contact,cust_address,contact_email,contact_title,contact_phone,cust_homepage,cust_remarks,customer_owner FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $customer . "'";
		$result = mcq($sql,$db);
		$customer = mysql_fetch_array($result);

		$template = ereg_replace("@CUSTOMER@",$customer['custname'],$template);
		$template = ereg_replace("@CUSTOMER_CONTACT@",$customer['contact'],$template);
		$template = ereg_replace("@CONTACT_EMAIL@",$customer['contact_email'],$template);
		$template = ereg_replace("@CONTACT_TITLE@",$customer['contact_title'],$template);
		$template = ereg_replace("@CONTACT_PHONE@",$customer['contact_phone'],$template);
		$template = ereg_replace("@CUST_HOMEPAGE@",$customer['cust_homepage'],$template);
		$template = ereg_replace("@CID@",$customer['id'],$template);
		$template = ereg_replace("@CUST_REMARKS@",ereg_replace("\n","<br> ",$customer['cust_remarks']),$template);
		if ($customer['cust_owner']) {
			$co = GetUserName($customer['cust_owner']);
		}
		$template = ereg_replace("@CUST_OWNER@",$co,$template);
		$template = ereg_replace("@CUSTOMER_ADDRESS@",ereg_replace("\n","<br> ",$customer['cust_address']),$template);
		
		$template = ereg_replace("@DATE@",$date,$template);


		
		// First make a list of tags which are actually in the template
		//if (!$GLOBALS['eflist_filtered_customer']) {
			$eflist = GetExtraCustomerFields();
			$GLOBALS['eflist_filtered_customer'] = array();
			foreach($eflist AS $field) {
				$count++;
				if (strstr($template,"@EFID" . $field['id'] . "@")) {
					array_push($GLOBALS['eflist_filtered_customer'],$field);
				}
			}
		//} else {
		//	qlog("Skipping extra field parse - already in memory");
		//}
	
		unset($count);
		
		for ($x=0;$x<sizeof($GLOBALS['eflist_filtered_customer']);$x++) {

			$field = $GLOBALS['eflist_filtered_customer'][$x];
						
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust' AND name='" . $field['id'] ."' AND eid='" . $eid . "'";
			$result = mcq($sql,$db);
			$row = mysql_fetch_array($result);

			if ($field['fieldtype'] == "date") {
				$row['value'] = TransformDate($row['value']);
			} elseif (strstr($field['fieldtype'],"User-list")) {
				$row['value'] = GetUserName($row['value']);
			}

			$row['value'] = FunkifyLOV($row['value']);

			$template = str_replace("@EFID" . $field['id'] . "@",ereg_replace("\n","<br> ",$row['value']),$template);
			
		}
		

		qlog("Template parsed (customer)");
		$GLOBALS['CURFUNC'] = $tmp;
		return($template);
}

function ParseTemplateCleanUp($template) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "ParseTemplateCleanUp::";
	qlog("Template cleaned up.");
	$GLOBALS['CURFUNC'] = $tmp;

	$template = preg_replace ("/#EFID(.*)#/", "<img src='lock.png' " . PrintToolTipCode("You don't have the clearance to view/edit this form element.") . ">", $template);
	$template = preg_replace ("/#HEFID(.*)#/", "\n\n<!-- Field $1 not found, deleted by parser (2) -->\n\n", $template);
	$template = preg_replace ("/@EFID(.*)@/", "<!-- Field $1 not found, deleted by parser (3) -->", $template);


	return($template); 
}

function ParseTemplateForRTF($template) {
		$template = eregi_replace("<br>","\\par",$template);
		return($template);
}

function GetExtraFieldAccessRestrictions($field_num) {
	if (!$field_num) {
		qlog("ERROR: GetExtraFieldAccessRestrictions called with empty param!");
	} else {
		$row = db_GetRow("SELECT accessarray FROM $GLOBALS[TBL_PREFIX]extrafields WHERE id=" . $field_num,$db);
		return(unserialize($row[0]));
	}
}

function GetButtons($id=false) {
	$ret = array();
	$t = GetExtraFields();
	for ($x=0;$x<sizeof($t);$x++) {
		if ($t[$x]['fieldtype'] == "Button") {
			array_push($ret, $t[$x]);
			if ($t[$x]['id'] == $id && is_numeric($id)) {
				return($t[$x]);
			}
		}
	}
	return($ret);
}
function CheckExtraFieldAccess($field_num, $userid=false) {
	if (!$userid) {
		$userid = $GLOBALS['USERID'];
	}
	if (is_administrator()) {
		return("ok");
	} else {
		$accarr = array();
		$accarr = GetExtraFieldAccessRestrictions($field_num);

		if (is_array($accarr)) {
			qlog("Extra field " . $field_num . " has detailed access restrictions");
				
				$urow = GetUserRow($userid);
				$prof = $urow['PROFILE'];
				if (is_numeric($prof)) {
					$id = "P" . $prof; // read_only
					$faid = "fa_P" . $prof; // read-write
					if (in_array($id,$accarr) && in_array($faid,$accarr)) {
						$ret = "ok";
						qlog("Field is read/write by group profile");
					} elseif (in_array($id,$accarr)) {
						$ret = "readonly";
						qlog("Field is read-only by group profile");
					} else {
						qlog("Field access is denied by group profile ");
						$ret = "nok";
					}

				}

				$id = "U" . $userid;
				$faid = "fa_U" . $userid;
				
				if (in_array($id,$accarr) && in_array($faid,$accarr)) {
					$ret = "ok";
					qlog("Field is (also) read/write by group profile");
				} elseif (in_array($id,$accarr)) {
					if ($ret<>"ok") {
						$ret = "readonly";
						qlog("Field is read-only by personal profile");
					} else {
						qog("Field should be readonly by personal profile but is overridded to OK by group profile");
						$ret = "ok";
					}
				} elseif ($ret <> "readonly" && $ret <> "ok") {
					qlog("Field access is (also) denied by personal profile");
					$ret = "nok";
				}

		} else {
			qlog("Extra field " . $field_num . " has no detailed access restrictions");
			$ret = "ok";
		}

		return($ret);
	}
}

function GetExtraFieldsWithComments($location="B") {

	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetExtraFields::";

	if (GetClearanceLevel($GLOBALS[USERID])=="administrator") {
//		$sql_ins = " AND hidden <> 'a' ";
	} elseif (GetClearanceLevel($GLOBALS[USERID])=="rw" || GetClearanceLevel($GLOBALS[USERID])=="full-access-own-entities") {
		$sql_ins = " AND hidden <> 'a' ";
	} else {
		$sql_ins = " AND hidden <> 'y' AND hidden <> 'a'";
	}
	$ret = array();
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]extrafields WHERE tabletype='entity' AND location = '" . $location . "' " . $sql_ins . " AND deleted<>'y' ORDER BY ordering";

	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "ok" || CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "readonly") {
				array_push($ret, $row);
			}
	}
	$GLOBALS['CURFUNC'] = $tmp;

	return($ret);
}

function PolishExtraFieldValue($val,$outp) {
	// Funkify LOV values
		
		$tmp = unserialize($value);
		if (is_array($tmp)) {
			foreach ($tmp AS $rij) {
				if ($first) $ret .= ", ";
				$first = true;
				$ret .= base64_decode($rij);
			}
		} else {
			$ret = $value;
		}

	if ($outp <> "html") {
		// Strip HTML tags
		$ret = eregi_replace("<br>", "\n", $ret);
		$ret = strip_tags($ret);
	}

	return($val);
}

function GetExtraFields() {

	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetExtraFields::";

	if ($GLOBALS['EFLIST_CACHE']) {
		qlog("CACHE Extra fields list returned");
		return($GLOBALS['EFLIST_CACHE']);
	} else {
		
		if (GetClearanceLevel($GLOBALS[USERID])=="administrator") {
	//		$sql_ins = " AND hidden <> 'a' ";
		} elseif (GetClearanceLevel($GLOBALS[USERID])=="rw" || GetClearanceLevel($GLOBALS[USERID])=="full-access-own-entities") {
			$sql_ins = " AND hidden <> 'a' ";
		} else {
			$sql_ins = " AND hidden <> 'y' AND hidden <> 'a'";
		}
		if (!stristr($_SERVER['SCRIPT_NAME'],"edit.php") && !stristr($_SERVER['SCRIPT_NAME'],"trigger.php") && !stristr($_SERVER['SCRIPT_NAME'],"admin.php")) {
			$sql_ins .= " AND fieldtype<>'Button'";
			$GLOBALS['CURFUNC'] = "GetExtraFields::";
			qlog("Buttons are excluded (this page <> edit.php && <> trigger.php)");
		}
		$ret = array();
		
		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]extrafields WHERE tabletype<>'customer' AND fieldtype<>'comment' " . $sql_ins . " AND deleted<>'y' ORDER BY ordering";
		$result = mcq($sql,$db);
		while ($row = mysql_fetch_array($result)) {
			$row['name'] = ereg_replace("<([^>]+)>", "", (eregi_replace("<br>","\015\012",$row['name'])));

		if (CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "ok" || CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "readonly") {
				array_push($ret, $row);
			}
		}
		$GLOBALS['EFLIST_CACHE'] = $ret;
		qlog("Extra fields list returned");
		$GLOBALS['CURFUNC'] = $tmp;
		return($ret);
	}
}
function GetExtraCustomerFields() {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetExtraCustomerFields::";
	if ($GLOBALS['ECFLIST_CACHE'] <> "") {
		qlog("CACHE Extra customer fields list returned");
		$GLOBALS['CURFUNC'] = $tmp;
		return($GLOBALS['ECFLIST_CACHE']);
	} else {
		if (GetClearanceLevel($GLOBALS[USERID])=="administrator") {
	//		$sql_ins = " AND hidden <> 'a' ";
		} elseif (GetClearanceLevel($GLOBALS[USERID])=="rw" || GetClearanceLevel($GLOBALS[USERID])=="full-access-own-entities") {
			$sql_ins = " AND hidden <> 'a' ";
		} else {
			$sql_ins = " AND hidden <> 'y' AND hidden <> 'a'";
		}

		$ret = array();
		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]extrafields WHERE tabletype='customer' AND fieldtype<>'comment' " . $sql_ins . " AND deleted<>'y' ORDER BY ordering";
		$result = mcq($sql,$db);
		while ($row = mysql_fetch_array($result)) {
			$row['name'] = ereg_replace("<([^>]+)>", "", (eregi_replace("<br>","\015\012",$row['name'])));
			if (CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "ok" || CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "readonly") {
				array_push($ret, $row);
			}
		}
		$GLOBALS['ECFLIST_CACHE'] = $ret;
		qlog("Extra customer fields list returned");
		$GLOBALS['CURFUNC'] = $tmp;
		return($ret);
	}
}
function GetExtraCustomerFieldsWithComments() {

	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetExtraFields::";
		if (GetClearanceLevel($GLOBALS[USERID])=="administrator") {
//		$sql_ins = " AND hidden <> 'a' ";
	} elseif (GetClearanceLevel($GLOBALS[USERID])=="rw" || GetClearanceLevel($GLOBALS[USERID])=="full-access-own-entities") {
		$sql_ins = " AND hidden <> 'a' ";
	} else {
		$sql_ins = " AND hidden <> 'y' AND hidden <> 'a'";
	}

	$ret = array();
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]extrafields WHERE tabletype='customer' " . $sql_ins . " AND deleted<>'y' ORDER BY ordering";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "ok" || CheckExtraFieldAccess($row['id'], $GLOBALS['USERID']) == "readonly") {
			array_push($ret, $row);
		}
	}
	$GLOBALS['CURFUNC'] = $tmp;

	return($ret);
}

function str_lcsfix($s)
{
  $s = ereg_replace("[��������]","e", $s);
  $s = ereg_replace("[������������]","a", $s);
  $s = ereg_replace("[��������]","i", $s);
  $s = ereg_replace("[���������]","o", $s);
  $s = ereg_replace("[��������]","u", $s);
  $s = ereg_replace("[�]","c", $s);
  $s = ereg_replace("[,@]","c", $s);
  return $s;
}
function AvailableFormTags() {

			print "<table border=1 width=100%>";
			print "<tr><td colspan=2><font color='#FF0000'>Clicking the tag will copy it to your clipboard!</font><br><br><b>Form elements:</b><br>";
			print "<tr><td>Save button (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#SAVEBUTTON#');\">#SAVEBUTTON#</a>";
			print "<tr><td>Save as new entity button </td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#SAVEASNEWBUTTON#');\">#SAVEASNEWBUTTON#</a>";			
			print "<tr><td>Cancel button (appears only in popup windows)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CANCELBUTTON#');\">#CANCELBUTTON#</a></td></tr>";

			print "<tr><td>Next/previous arrows</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#ARROWS#');\">#ARROWS#</a></td></tr>";
			print "<tr><td>Parent/child information and box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#PARENTBOX#');\">#PARENTBOX#</a></td></tr>";
			?>
			<tr><td><img src='pdf.gif' style='border:0'> PDF-report download</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#PDFICON#');">#PDFICON#</a></td></tr>
			<tr><td><img src='webdav.gif' style='border:0'> WebDAV link</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#WEBDAVICON#');">#WEBDAVICON#</a></td></tr>
			<tr><td><img src='print.gif' style='border:0'> Print to default printer</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#PRINTICON#');">#PRINTICON#</a></td></tr>
			<tr><td><img src='invoice.gif' style='border:0'> Single-entity invoice</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#INVOICEICON#');">#INVOICEICON#</a></td></tr>
			<tr><td><img src='journal.gif' style='border:0'> Journal icon</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#JOURNALICON#');">#JOURNALICON#</a></td></tr>
			<tr><td><img src='lock.png' style='border:0'> Lock (only if entity is locked)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#LOCKICON#');">#LOCKICON#</a></td></tr>
			<tr><td> E-mail users popup box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#EMAILPOPLINK#');">#EMAILPOPLINK#</a></td></tr>
			<tr><td> On-save e-mail box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#EMAILDROPDOWN#');">#EMAILDROPDOWN#</a></td></tr>

			
			<?

			print "<tr><td>List of attached files</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#FILELIST#');\">#FILELIST#</a></td></tr>";
			print "<tr><td>File-upload box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#FILEBOX#');\">#FILEBOX#</a></td></tr>";

			print "<tr><td colspan=2><br><b>Data fields:</b><br><i>If data field names are enclosed by @'s instead of #'s, the value of the field<br>will be printed instead of the form element, just like normal templates.</i><br></td></tr>";
			print "<tr><td>Category box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CATEGORY#');\">#CATEGORY#</a></a></td></tr>";
			print "<tr><td>Owner select box (will not be visible for limited users)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#OWNER#');\">#OWNER#</a></td></tr>";
			print "<tr><td>Assignee select box (will not be visible for limited users)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#ASSIGNEE#');\">#ASSIGNEE#</a></td></tr>";
			print "<tr><td>Customer select box (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER#');\">#CUSTOMER#</a></td></tr>";
			print "<tr><td>Duedate popup box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DUEDATE#');\">#DUEDATE#</a></td></tr>";
			print "<tr><td>Duetime select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DUETIME#');\">#DUETIME#</a></td></tr>";
			print "<tr><td>Status select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#STATUS#');\">#STATUS#</a></td></tr>";	
			print "<tr><td>Priority select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#PRIORITY#');\">#PRIORITY#</a></td></tr>";
			print "<tr><td>Main content text-area</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CONTENTS#');\">#CONTENTS#</a></td></tr>";
			print "<tr><td>Delete select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DELETEBOX#');\">#DELETEBOX#</a></td></tr>";
			print "<tr><td>Private select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#PRIVATEBOX#');\">#PRIVATEBOX#</a></td></tr>";
			
			print "<tr><td colspan=2><br><b>Extra data fields:</b><br>";

			$list = GetExtraFields();
			unset($count);
			foreach ($list AS $element) {
				print "<tr><td>" . $element['name'] . "</td><td>" . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#EFID" . $element['id'] . "#');\">#EFID" . $element['id'] . "#</a></td></tr>";
				if ($element['fieldtype'] == "drop-down") {
					$element['options'] = unserialize($element['options']);
					foreach ($element['options'] AS $option) {
						print "<tr><td>Hidden field: " . $element['name'] . " with pre-defined value " . $option . "</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#HEFID" . $element['id'] . "[" . $option . "]#');\">#HEFID" . $element['id'] . "[" . $option . "]#</td></tr>";
					}
				}
			}

			print "<tr><td colspan=2><br><b>Display-only fields:</b><br></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER@');\">@CUSTOMER@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CID@');\">@CID@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER_CONTACT@');\">@CUSTOMER_CONTACT@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER_ADDRESS@');\">@CUSTOMER_ADDRESS@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_PHONE@');\">@CONTACT_PHONE@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_EMAIL@');\">@CONTACT_EMAIL@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_TITLE@');\">@CONTACT_TITLE@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_HOMEPAGE@');\">@CUST_HOMEPAGE@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_REMARKS@');\">@CUST_REMARKS@</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_OWNER@');\">@CUST_OWNER@</a></td></tr>";

			$list = GetExtraCustomerFields();
			unset($count);
			foreach ($list AS $element) {
				print "<tr><td>" . $element['name'] . "</td><td>" . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@EFID" . $element['id'] . "@')\">@EFID" . $element['id'] . "@</a></td></tr>";
			}
			unset($count);
			print "</table>";

}
function AvailableCustomerFormTags() {

			print "<table border=1 width=100%>";
			print "<tr><td colspan=2><font color='#FF0000'>Clicking the tag will copy it to your clipboard!</font><br><br><b>Form elements:</b><br>";
			print "<tr><td>Save button (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#SAVEBUTTON#');\">#SAVEBUTTON#</a>";
			print "<tr><td>Cancel button (appears only in popup windows)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CANCELBUTTON#');\">#CANCELBUTTON#</a></td></tr>";
			print "<tr><td>Next/previous arrows</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#ARROWS#');\">#ARROWS#</a></td></tr>";

			?>
			<tr><td><img src='pdf.gif' style='border:0'> PDF-report download</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#PDFICON#');">#PDFICON#</a></td></tr>
			<tr><td><img src='print.gif' style='border:0'> Print to default printer</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#PRINTICON#');">#PRINTICON#</a></td></tr>
			<tr><td><img src='journal.gif' style='border:0'> Journal icon</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#JOURNALICON#');">#JOURNALICON#</a></td></tr>
			<tr><td><img src='journal.gif' style='border:0'> Print icon</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#PRINTICON#');">#PRINTICON#</a></td></tr>
			<tr><td><img src='journal.gif' style='border:0'> Read-only checkbox</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#READONLY#');">#READONLY#</a></td></tr>
			<tr><td><img src='journal.gif' style='border:0'> Active checkbox</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick="CopyToClipboard('#ACTIVE#');">#ACTIVE#</a></td></tr>
			<?

			print "<tr><td>List of attached files</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#FILELIST#');\">#FILELIST#</a></td></tr>";
			print "<tr><td>File-upload box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#FILEBOX#');\">#FILEBOX#</a></td></tr>";

			print "<tr><td colspan=2><br><b>Data fields:</b><br><i>If data field names are enclosed by @'s instead of #'s, the value of the field<br>will be printed instead of the form element, just like normal templates.</i><br></td></tr>";
			/*print "<tr><td>Customer name</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER#');\">#CUSTOMER#</a></a></td></tr>";
			
			print "<tr><td>Owner select box (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#OWNER#');\">#OWNER#</a></td></tr>";
			
			print "<tr><td>Assignee select box (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#ASSIGNEE#');\">#ASSIGNEE#</a></td></tr>";
			
			print "<tr><td>Customer select box (*)</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER#');\">#CUSTOMER#</a></td></tr>";
			
			print "<tr><td>Duedate popup box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DUEDATE#');\">#DUEDATE#</a></td></tr>";
			
			print "<tr><td>Duetime select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DUETIME#');\">#DUETIME#</a></td></tr>";
			
			print "<tr><td>Status select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#STATUS#');\">#STATUS#</a></td></tr>";	
			
			print "<tr><td>Priority select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#PRIORITY#');\">#PRIORITY#</a></td></tr>";
			
			print "<tr><td>Main content text-area</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CONTENTS#');\">#CONTENTS#</a></td></tr>";
			
			print "<tr><td>Delete select box</td><td><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#DELETEBOX#');\">#DELETEBOX#</a></td></tr>";
			*/
			print "<tr><td colspan=2><br><b>Main fields:</b><br>";

			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER#');\">#CUSTOMER#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CID#');\">#CID#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER_CONTACT#');\">#CUSTOMER_CONTACT#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUSTOMER_ADDRESS#');\">#CUSTOMER_ADDRESS#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CONTACT_PHONE#');\">#CONTACT_PHONE#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CONTACT_EMAIL#');\">#CONTACT_EMAIL#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CONTACT_TITLE#');\">#CONTACT_TITLE#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUST_HOMEPAGE#');\">#CUST_HOMEPAGE#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUST_REMARKS#');\">#CUST_REMARKS#</a></td></tr>";
			print "<tr><td colspan=2><a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#CUST_OWNER#');\">#CUST_OWNER#</a></td></tr>";

			print "<tr><td colspan=2><br><b>Extra customer fields:</b><br>";

			$list = GetExtraCustomerFields();
			unset($count);
			foreach ($list AS $element) {
				print "<tr><td>" . $element['name'] . "</td><td>" . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('#EFID" . $element['id'] . "#');\">#EFID" . $element['id'] . "#</a></td></tr>";
			}



			
			print "</table>";

}
function AvailableTags() {
		print "<table><tr><td><br><b>Available tags to be used in templates: (clicking the tag will copy it to your clipboard)</b><br>";
		print "<br><i>Hint: to create a link to an entity, use &lt;a href='edit.php?e=@EID@'>edit&lt;/a&gt;</i>";
		print "<ul>";
		print "<li> <b>Generic tags:</b><ul>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@TITLE@');\">@TITLE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@ADMEMAIL@');\">@ADMEMAIL@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@WEBHOST@');\">@WEBHOST@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@DATE@');\">@DATE@</a><br><br>";
		print "</ul>";
		print "<li> <b>Customer-specific tags:</b><ul>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER@');\">@CUSTOMER@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CID@');\">@CID@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER_CONTACT@');\">@CUSTOMER_CONTACT@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER_ADDRESS@');\">@CUSTOMER_ADDRESS@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_PHONE@');\">@CONTACT_PHONE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_EMAIL@');\">@CONTACT_EMAIL@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTACT_TITLE@');\">@CONTACT_TITLE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_HOMEPAGE@');\">@CUST_HOMEPAGE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_REMARKS@');\">@CUST_REMARKS@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUST_OWNER@');\">@CUST_OWNER@</a>";
		print "<li> <B>Extra fields:</b><ul>";
		$list = GetExtraCustomerFields();
		unset($count);
		foreach ($list AS $element) {
			if ($element['fieldtype'] <> "Button") {
				print "<li> " . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@EFID" . $element['id'] . "@');\">@EFID" . $element['id'] . "@</a> for field " . $element['name'] . "";
			}
		}
		unset($count);
		print "</ul><br><br>";
		print "</ul>";
		print "<li> <b>Entity-specific tags:</b><ul>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@ENTITYID@');\">@ENTITYID@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@EID@');\">@EID@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CATEGORY@');\">@CATEGORY@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@OWNER@');\">@OWNER@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@ASSIGNEE@');\">@ASSIGNEE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CUSTOMER@');\">@CUSTOMER@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@DUEDATE@');\">@DUEDATE@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@STATUS@');\">@STATUS@</a>";	
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@PRIORITY@');\">@PRIORITY@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CONTENTS@');\">@CONTENTS@</a>";
		print "<li> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@NUM_ATTM@');\">@NUM_ATTM@</a>";
		print "<li> <B>Extra fields:</b><ul>";
		$list = GetExtraFields();
		foreach ($list AS $element) {
			if ($element['fieldtype'] <> "Button") {
				print "<li> " . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@EFID" . $element['id'] . "@');\">@EFID" . $element['id'] . "@</a> for field " . $element['name'] . "";
			}
		}

		print "</ul></ul><br>";

		print "<li> <b>E-mail to CRM-CTT users tag:</b><ul>";
		print "<li><table><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@LIST@');\">@LIST@</a></td><td>The list of entities assigned to that user</td></tr></table>";
		print "</ul><br>";
		print "<li> <b>Invoice-related tags:</b><ul>";
		print "<li><table class='crm' class='crm' ><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@INVOICE_DATE@');\">@INVOICE_DATE@</a></td><td>The date in the format configured in CRM-CTT</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@NUM@');\">@NUM@</a></td><td>The invoice number, prefixed when configured</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@TOTAL_COST_EX_VAT@');\">@TOTAL_COST_EX_VAT@</a></td><td>Summarized cost excluding VAT</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@TOTAL_COST_INC_VAT@');\">@TOTAL_COST_INC_VAT@</a></td><td>Summarized cost including VAT</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@TOTAL_COST_VAT@');\">@TOTAL_COST_VAT@</a></td><td>Summarized VAT cost</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@VAT@');\">@VAT@</a></td><td>Default VAT percentage</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@REPEAT@');\">@REPEAT@</a></td><td>Start tag for recurring invoice rules</td></tr></table class='crm'><ul>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@LVAT@');\">@LVAT@</a></td><td>Local (maybe overruled) VAT percentage</td><td>*)</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@IHS@');\">@IHS@</a></td><td>Invoice hours quantity</td><td>*)</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@IHC@');\">@IHC@</a></td><td>Invoice hours cost</td><td>*)</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@RVAT@');\">@RVAT@</a></td><td>Per entity cost ex VAT</td><td>*)</td></tr></table class='crm'>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@CVAT@');\">@CVAT@</a></td><td>Per entity cost inc VAT</td><td>*)</td></tr></table class='crm'></ul>";
		print "<li><table class='crm'><tr><td width='170'> <a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@ENDREPEAT@');\">@ENDREPEAT@</a></td><td>End tag for recurring invoice rules</td></tr></table class='crm'>";

		$list = GetExtraFields();

		foreach ($list AS $element) {
			print "<li> " . $ins . "<a style='cursor: pointer' title='Click to copy to clipboard' onclick=\"CopyToClipboard('@SUMEFID" . $element['id'] . "@');\">@SUMEFID" . $element['id'] . "@</a> for field " . $element['name'] . "";
		}


		print "<li> Tags marked with *) must be enclosed whitin the @REPEAT@ and @ENDREPEAT@ tags.";
		print "</ul>";

		print "</ul>";
		print "</td></tr></table>";
}
// Returns a timestamp from a string.  Assumes en_GB format where ambiguous.
function NLDateToTimestamp($value, $add=false)
{
   // If it looks like a UK date dd/mm/yy, reformat to US date mm/dd/yy so strtotime can parse it.
   $reformatted = preg_replace("/^\s*([0-9]{1,2})[\/\. -]+([0-9]{1,2})[\/\. -]+([0-9]{1,4})/", "\\2/\\1/\\3", $value);
   return strtotime($reformatted . $add);
}
function EntityExtendDuedate($days_to_add, $eid) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "EntityExtendDuedate::";
	
	// This function extends a duedate of an entity with days_to_add days
	// This function will do nothing if the entity doens't have a duedate
	// Duedates are stored as dd-mm-yyyy (e.g. 14-12-2005)

	$row = db_GetRow("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid='" . $eid. "'");
	if ($row['duedate'] <> "" && $row['duedate'] <> "--") {
		$NewDateTS = NLDateToTimestamp($row['duedate'], "+ " . $days_to_add . " days");
		$Newduedate = date('d-m-Y', $NewDateTS);
		qlog("Due-date of entity " . $eid . " set to " . $Newduedate);
		$sql = "UPDATE " . $GLOBALS['TBL_PREFIX'] . "entity SET duedate='" . $Newduedate . "' WHERE eid='" . $eid . "'";
		mcq($sql, $db);
	} else {
		qlog("Duedate not re-set! This entity doensn't have a duedate!");
	}
	
	$GLOBALS['CURFUNC'] = $tmp;
	return($x);
}

function ProcessTriggers($onchange,$eid,$to_value,$log=false) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "ProcessTriggers::";

	// Get triggers matching this criterium
	$t_array = GetTriggers($onchange,$to_value);

	// GetTriggers returns an array like this:
	/*	 
	
	Array
	(
		[0] => Array
			(
				[0] => mail user @1@		// action
				[1] => 4611					// template fileid
				[2] => n					// attach to entity/customer (y|n)
				[3] => 12					// report fileid or 999999999999999 for PDF
			)
		[1] => Array						// Event 2
			(
				[0] => mail owner			// action                           
				[1] => 0					// template fileid                  
				[2] => y					// attach to entity/customer (y|n)  
				[3] => 12					// report fileid or 999999999999999 for PDF
			)
	)
	
	*/
	 
 

	if ($log) {
		$admin_message = "A warning or error was issued to the log (" . $onchange . ") :<br><br>" . $log;
	} else {
		// Select entity values
		$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$eid'";
		$result = mcq($sql,$db);
		$entity = mysql_fetch_array($result);
		$customer = $entity['CRMcustomer'];
		$filename = "CRM-CTT-triggered_email-" . date("Fj-Y-Hi") . "h.HTML";	
	}	

	foreach($t_array AS $event) {
		qlog("Evaluating '" . $event[0] . "'");

		if ($event[3] == 999999999999999) {
			qlog("PDF needs to be attached");
			$report_attach = "PDF";
		} elseif ($event[3]<>0) {
			qlog("Report $event[3] needs to be attached");
			$report_attach = $event[3];
		}

		if ($event[0]=="delete entity" && $eid) {

			qlog("Deleting entity by event trigger!");
			journal($eid,"This entity was deleted by a trigger");
			DeleteEntity($eid);

		} elseif (strstr($event[0],"duedate_extent days") && $eid) {
			// This trigger extends the due date by xxx days
			$days_to_add = str_replace("duedate_extent days ","",$event[0]);
			qlog("This trigger tells me to extend the duedate with " . $days_to_add . " days");
			EntityExtendDuedate($days_to_add, $eid);
			journal($eid,"This entity's duedate was extended by " . $days_to_add . " days by a trigger");

		} elseif ($event[0]=="undelete entity" && $eid) {

			qlog("UN-Deleting entity by event trigger!");
			journal($eid,"This entity was UN-deleted by a trigger");
			UnDeleteEntity($eid);

		} elseif ($event[0]=="set closedate" && $eid) {

			$closedate = date('Y-m-d');
			$closeepoch = date('U');

			qlog("Closedate set by event trigger!");
			journal($eid,"Closedate set by event trigger!");
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET closedate='" . $closedate . "',closeepoch='" . $closeepoch . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="unset closedate" && $eid) {

			qlog("Closedate unset by event trigger!");
			journal($eid,"Closedate unset by event trigger!");
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET closedate='',closeepoch='' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="re-set opendate" && $eid) {

			$openepoch = date('U');

			qlog("Closedate unset by event trigger!");
			journal($eid,"Closedate unset by event trigger!");
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET closedate='',closeepoch='',openepoch='" . $openepoch . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="make entity read-write" && $eid) {

			qlog("Read-only set to NO by event trigger!");
			journal($eid,"Read-only set to NO by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET readonly='n' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="make entity read-only" && $eid) {

			qlog("Read-only set to YES by event trigger!");
			journal($eid,"Read-only set to YES by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET readonly='y' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="make entity private" && $eid) {

			qlog("Private flag set to YES by event trigger!");
			journal($eid,"Private flag set to YES by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET private='y' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="make entity public" && $eid) {

			qlog("Private flag set to NO by event trigger!");
			journal($eid,"Private flag set to NO by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET private='n' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif (strstr($event[0],"Set assignee to ")) {

			$NewAssignee = str_replace("Set assignee to ","", $event[0]);
			
			if ($NewAssignee == "customer_owner") {
				$sql = "SELECT customer_owner FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $customer . "'";
				$res = mcq($sql, $db);
				$row = mysql_fetch_array($res);
				$NewAssignee = $row['customer_owner'];
				
				if ($NewAssignee == "") {
					qlog("Error: no customer owner found while processing trigger!");
					log_msg("ERROR: no customer owner found while processing trigger!","");
				}

			} elseif (strstr($NewAssignee, "@EFID")) {
				$field = str_replace("@EFID","",$NewAssignee);
				$field = str_replace("@","",$field);

				$row = db_GetRow("SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "customaddons WHERE eid='" . $customer . "' AND name='" . $field . "'");

				$NewAssignee = $row['value'];

			}

			qlog("Assignee set to " . GetUserName($NewAssignee) . " by event trigger!");
			journal($eid,"Assignee set to " . GetUserName($NewAssignee) . " by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET assignee='" . $NewAssignee . "' WHERE eid='" . $eid . "'";
			qlog($sql);
			mcq($sql,$db);

		} elseif (strstr($event[0],"Set owner to ")) {

			$NewAssignee = str_replace("Set owner to ","", $event[0]);
			
			if ($NewAssignee = "customer_owner") {
				$sql = "SELECT customer_owner FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $customer . "'";
				$res = mcq($sql, $db);
				$row = mysql_fetch_array($res);
				$NewAssignee = $row['customer_owner'];
				
				if ($NewAssignee == "") {
					qlog("Error: no customer owner found while processing trigger!");
					log_msg("Error: no customer owner found while processing trigger!","");
				}

			} elseif (strstr($NewAssignee, "@EFID")) {
				$field = str_replace("@EFID","",$NewAssignee);
				$field = str_replace("@","",$field);

				$row = db_GetRow("SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "customaddons WHERE eid='" . $customer . "' AND name='" . $field . "'");
				$NewAssignee = $row['value'];
			}


			qlog("Owner set to " . GetUserName($NewAssignee) . " by event trigger!");
			journal($eid,"Owner set to " . GetUserName($NewAssignee) . " by event trigger!");

			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET owner='" . $NewAssignee . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);


		} elseif (strstr($event[0],"Set status to ")) {

			$NewStatus = str_replace("Set status to ","", $event[0]);

			qlog("Status set to " . $NewStatus . " by event trigger!");
			journal($eid,"Status set to " . $NewStatus . " by event trigger!");
			
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET status='" . $NewStatus . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);
	
		} elseif (strstr($event[0],"Set priority to ")) {

			$NewPrio = str_replace("Set priority to ","", $event[0]);

			qlog("Status set to " . $NewPrio . " by event trigger!");
			journal($eid,"Status set to " . $NewPrio . " by event trigger!");
			
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET priority='" . $NewPrio . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif (strstr($event[0],"set form-id to ")) {

			$NewForm = str_replace("set form-id to ","", $event[0]);

			qlog("Form-id of entity " . $eid . " set to " . $NewForm . " by event trigger!");
			journal($eid,"Form-id set to " . $NewForm . " by event trigger!");
			
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET formid='" . $NewForm . "' WHERE eid='" . $eid . "'";
			mcq($sql,$db);

		} elseif ($event[0]=="mail customer") {

			if ($customer<>"") {
				if ($event[1]<>0) {
					// a template file id was given
					// Hier - Linda
					$template = GetFileContent($event[1]);
					$subject = GetFileSubject($event[1]);
				} elseif ($admin_message) {
					$template = $admin_message;
					$subject = "A warning or error message was issued to the log";
				} else {
					$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_TEMPLATE_CUSTOMER'";
					$result = mcq($sql,$db);
					$row = mysql_fetch_array($result);
					$template = $row['value'];
					$subject = $GLOBALS['SUBJECT_TEMPLATE_CUSTOMER'];
				}
				if ($event[2] == "y") {
					$attach = "both";
				} else {
					$attach = false;
				}

	RealMail($template,$eid,$customer,GetUserEmail($GLOBALS['USERID']),GetUserName($GLOBALS['USERID']),GetCustomerEmail($customer),"0",$subject,$attach,$filename,$report_attach);
				qlog("E-mail to customer send (trigger)");
				journal($customer,"E-mail to customer " . GetCustomerName($customer) . " send because of change in field " . $onchange . " to value " . $to_value . " in entity " . $eid . " (trigger)","customer");
				journal($eid,"E-mail to customer " . GetCustomerName($customer) . " send because of change in field " . $onchange . " (trigger)");
				$triggered = true;
			} else {
				qlog("Trigger cancelled because of missing customer variable");
			} 
		} elseif ($event[0]=="mail assignee" && GetUserEmail($entity['assignee'])<>"") {
			if ($event[1]<>0) {
				// a template file id was given
				$template = GetFileContent($event[1]);
				$subject = GetFileSubject($event[1]);
			} elseif ($admin_message) {
				$template = $admin_message;
				$subject = "A warning or error message was issued to the log";
			} else {
				$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_ENTITY_EDIT'";
				$result = mcq($sql,$db);
				$row = mysql_fetch_array($result);
				$template = $row['value'];
				$subject = $GLOBALS['subject_update_entity'];
			}
			if ($event[2] == "y") {
				$attach = "entity";
			} else {
				$attach = false;
			}
			RealMail($template,$eid,$customer,$GLOBALS['admemail'],"Administrador do Sistema",GetUserEmail($entity['assignee']),"0",$subject,$attach,$filename,$report_attach);
			qlog("E-mail to assignee send (trigger)");
			journal($eid,"E-mail to assignee " . GetUserName($entity['assignee']) . " send because of change in field " . $onchange . " to value " . $to_value . " (trigger)");

			$triggered = true;
		} elseif ($event[0]=="mail owner" && GetUserEmail($entity['owner'])<>"") {
			if ($event[1]<>0) {
				// a template file id was given
				$template = GetFileContent($event[1]);
				$subject = GetFileSubject($event[1]);
			} elseif ($admin_message) {
				$template = $admin_message;
				$subject = "A warning or error message was issued to the log";
			} else {
				$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_ENTITY_EDIT'";
				$result = mcq($sql,$db);
				$row = mysql_fetch_array($result);
				$template = $row['value'];
				$subject = $GLOBALS['subject_update_entity'];
			}
			if ($event[2] == "y") {
				$attach = "entity";
			} else {
				$attach = false;
			}
			RealMail($template,$eid,$customer,$GLOBALS['admemail'],"Administrador do Sistema",GetUserEmail($entity['owner']),"0",$subject,$attach,$filename,$report_attach);
			qlog("E-mail to owner send (trigger)");
			journal($eid,"E-mail to owner " . GetUserName($entity['owner']) . " send because of change in field " . $onchange . " to value " . $to_value . " (trigger)");
			$triggered = true;
		} elseif ($event[0]=="mail admin" && $GLOBALS['admemail']<>"") {
			if ($event[1]<>0) {
				// a template file id was given
				$template = GetFileContent($event[1]);
				$subject = GetFileSubject($event[1]);
			} elseif ($admin_message) {
				$template = $admin_message;
				$subject = "A warning or error message was issued to the log";
			} else{
				$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_ENTITY_EDIT'";
				$result = mcq($sql,$db);
				$row = mysql_fetch_array($result);
				$template = $row['value'];
				$subject = $GLOBALS['subject_update_entity'];
			}
			if ($event[2] == "y") {
				$attach = "entity";
			} else {
				$attach = false;
			}
			RealMail($template,$eid,$customer,$GLOBALS['admemail'],"Administrador do Sistema",$GLOBALS['admemail'],"0",$subject,$attach,$filename,$report_attach);
			if ($eid<>0) {
				journal($eid,"E-mail to administrator send because of change in field " . $onchange . " (trigger)");
			}
			qlog("E-mail to system administrator send (trigger)");
			$triggered = true;
		} elseif (stristr($event[0],"mail user @")) {
			if (stristr($event[0],"mail user @EFID")) {
				// example: "Mail user @EFID205@"
				// This parts e-mails the user selected in extra field 205
				
				$x = split("@",$event[0]);
				$y = str_replace("EFID","",$x[1]);
				$y = str_replace("@","",$y);

				qlog("FIELD NAME IS $y");

				// first, determine the field type
				$row = db_GetRow("SELECT tabletype FROM " . $GLOBALS['TBL_PREFIX'] . "extrafields WHERE id='" . $y . "'");

				if ($row['tabletype'] == "entity") {
					$res1 = db_GetRow("SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "customaddons WHERE name='" . $y . "' AND type='entity' AND eid='" . $eid . "'");
					$user = $res1['value'];
				} else {
					$res1 = db_GetRow("SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "customaddons WHERE name='" . $y . "' AND type='cust' AND eid='" . $entity['CRMcustomer'] . "'");
					$user = $res1['value'];
			
				}
				if (GetUserEmail($user)<>"") {
					if ($event[1]<>0) {
						// a template file id was given
						$template = GetFileContent($event[1]);
						$subject = GetFileSubject($event[1]);
					} elseif ($admin_message) {
						$template = $admin_message;
						$subject = "A warning or error message was issued to the log";
					} else {
						$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_ENTITY_EDIT'";
						$result = mcq($sql,$db);
						$row = mysql_fetch_array($result);
						$template = $row['value'];
						$subject = $GLOBALS['subject_update_entity'];
					}
				} else {
					qlog("Should trigger but no e-mail address found");
				}

				qlog("USER TO MAIL IS $user");

				


			} else {
				$user_ar = split("@",$event[0]);
				$user = $user_ar[1];
				if (GetUserEmail($user)<>"") {
					if ($event[1]<>0) {
						// a template file id was given
						$template = GetFileContent($event[1]);
						$subject = GetFileSubject($event[1]);
					} elseif ($admin_message) {
						$template = $admin_message;
						$subject = "A warning or error message was issued to the log";
					} else {
						$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_ENTITY_EDIT'";
						$result = mcq($sql,$db);
						$row = mysql_fetch_array($result);
						$template = $row['value'];
						$subject = $GLOBALS['subject_update_entity'];
					}
				} else {
					qlog("Should trigger but no e-mail address found");
				}
			}
			if ($event[2] == "y") {
				$attach = "entity";
			} else {
				$attach = false;
			}
			RealMail($template,$eid,$customer,$GLOBALS['admemail'],"Administrador do Sistema",GetUserEmail($user),"0",$subject,$attach,$filename,$report_attach);
			journal($eid,"E-mail to user " . GetUserName($user) . " send because of change in field " . $onchange . " to value " . $to_value . " (trigger)");
			qlog("E-mail to " . GetUserName($user) . " send (trigger)");
			$triggered = true;
		} elseif (strstr($event[0],"mail cust @")) {
			$cust_ar = split("@",$event[0]);
			$cust = $cust_ar[1];
			if (GetCustomerEmail($cust)<>"") {
				if ($event[1]<>0) {
					// a template file id was given
					$template = GetFileContent($event[1]);
					$subject = GetFileSubject($event[1]);
				} elseif ($admin_message) {
					$template = $admin_message;
					$subject = "A warning or error message was issued to the log";
				} else {
					$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='BODY_TEMPLATE_CUSTOMER'";
					$result = mcq($sql,$db);
					$row = mysql_fetch_array($result);
					$template = $row['value'];
					$subject = $GLOBALS['SUBJECT_TEMPLATE_CUSTOMER'];
				}
			} else {
					qlog("Should trigger but no e-mail address found");
			}
			if ($event[2] == "y") {
				$attach = "both";
			} else {
				$attach = false;
			}
			RealMail($template,$eid,$customer,GetUserEmail($GLOBALS['USERID']),GetUserName($GLOBALS['USERID']),GetCustomerEmail($cust),"0",$subject,$attach,$filename,$report_attach);
			qlog("E-mail to " . GetCustomerName($cust) . " send (trigger)");
			journal($eid,"E-mail to user " . GetUserName($user) . " send because of change in field " . $onchange . " to value " . $to_value . " (trigger)");
			$triggered = true;
		}


	}
	
	if (!$triggered) {
		qlog("Triggers checked, nothing to trigger.");
	}
	$GLOBALS['CURFUNC'] = $tmp;
	return($ret);
}

function GetTriggers($onchange, $to_value) {
	// GetTriggers returns an array like this:
	/*	 
	
	Array
	(
		[0] => Array						// Event 1
			(
				[0] => mail user @1@		// action
				[1] => 4611					// template fileid
				[2] => n					// attach to entity/customer (y|n)
				[3] => 12					// report fileid or 999999999999999 for PDF
			)
		[1] => Array						// Event 2
			(
				[0] => mail owner			// action                           
				[1] => 0					// template fileid                  
				[2] => y					// attach to entity/customer (y|n)  
				[3] => 12					// report fileid or 999999999999999 for PDF
			)

	)
	
	*/
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetTriggers::";
	$ret = array();
	$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]triggers WHERE onchange='" . $onchange . "' AND (to_value='" . $to_value . "'  OR to_value='@SE@' OR to_value='Miscellaneous trigger')";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
			array_push($ret,array($row['action'],$row['template_fileid'],$row['attach'],$row['report_fileid']));
			qlog("Trigger " . $row['onchange'] . " (action " . $row['action'] . ") is appropriate");
	}
	$GLOBALS['CURFUNC'] = $tmp;
	return($ret);
}

function RealMail($template,$entity,$customer,$From,$Fromname,$To,$PDF,$Subject,$attach_to_dossier=false,$attach_as_filename=false,$report_attach=false) {
	$tmp = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "RealMail::";

	if (!is_array($GLOBALS['email_send_to'])) {
		$GLOBALS['email_send_to'] = array();
	}

//	if ($report_attach=="PDF") {
		

	if ($template) {

		if (!$Subject) {
			$Subject = str_replace("BODY","SUBJECT",$template);
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='" . $Subject . "'";
			$result = mcq($sql,$db);
			$row = mysql_fetch_array($result);
			$Subject = $row['value'];
		}

		if ($entity) {
			$template = ParseTemplateEntity($template,$entity);
			$Subject = ParseTemplateEntity($Subject,$entity);
		}
		if ($customer) {
			$template = ParseTemplateCustomer($template,$customer);
			$Subject = ParseTemplateCustomer($Subject,$customer);
		}

		$template = ParseTemplateGeneric($template);
		$Subject = ParseTemplateGeneric($Subject);

		$template = ParseTemplateCleanUp($template);
		$Subject = ParseTemplateCleanUp($Subject);

		if ($attach_to_dossier) {
			if (!ValidateEmail($To)) {
				$ins = "<font color='#FF0000'> E-mail NOT sent! E-mail address is not a valid internet address!</font><br>";
			} else {
				unset($ins);
			}
			$total = "CRM-CTT E-mail merge " . date("Fj-Y-Hi") . "<br>" . $ins;			
			$total .= "To: " . $To . "<br>";
			$total .= "Subject: " . $Subject . "<br><br>" . $template;
			if (!$attach_as_filename) {
				$filename = "CRM-CTT-HTML_file-" . date("Fj-Y-Hi") . "h.HTML";			
			} else {
				$filename = $attach_as_filename;
			}
			if ($attach_to_dossier=="entity" || $attach_to_dossier=="both") {
				if ($entity) {
				//	$sql="INSERT INTO $GLOBALS[TBL_PREFIX]binfiles(koppelid,content,filename,filesize,filetype,username,type) VALUES('$entity','" .addslashes($total) . "','" . $filename . "','" . strlen($total) . "','HTML','" . $GLOBALS['USERNAME'] . "','entity')";
				//	mcq($sql,$db);
					qlog("Attached HTML e-mail file to entity");
					$attachment = AttachFile($entity,$filename,$total,"entity","HTML");
				} 
			} 
			if ($attach_to_dossier=="customer" || $attach_to_dossier=="both") {
				if ($customer) {
					//$sql="INSERT INTO $GLOBALS[TBL_PREFIX]binfiles(koppelid,content,filename,filesize,filetype,username,type) VALUES('$customer','" . addslashes($total) . "','" . $filename . "','" . strlen($total) . "','HTML','" . $GLOBALS['USERNAME'] . "','cust')";
					//mcq($sql,$db);
					qlog("Attached HTML e-mail file to customer");
					$attachment = AttachFile($customer,$filename,$total,"cust","HTML");
				}
			}		
		
		}



		$mail = new PHPMailer();

		if ($From) {
			$mail->From     = $From;
		} else {
			$mail->From     = $GLOBALS['admemail'];
		}
		
		if (strstr($GLOBALS['UNIFIED_FROMADDRESS'],"@")) {
			$mail->From     = $GLOBALS['UNIFIED_FROMADDRESS'];
		}


		if ($FromName) {
			$mail->FromName = $FromName;
		} else { 
			$mail->FromName = "CRM Notification manager";
		}

		if ($report_attach=="PDF" && $entity) {

			qlog("Attaching PDF report to this triggered e-mail");
			
			$eid = $entity; // the PDF routine likes this
			$file = tempnam($GLOBALS['TMP_FILE_PATH'],"CRM_TMP_BIN_");
			$file_cache = $file;

			$NoImageInclude = 1;
			$date = date("F j, Y, H:i") . "h";
			$pdf_title2 = $pdf_title;
			$pdf_title = "crm-ctt $lang[entsum]";
			$pdf_title_link = "";
			require_once("pdf_inc2.php");

			// wake up pdf object
			StartPDF();
			
			$t = array();
			$t[0] = $entity;

			CreatePDF($t, $file);
			$date = date("F j, Y, H:i") . "h";
			$fp = fopen($file,"r");
			while (!feof($fp)) {
				$file .= fread($fp,1024);
			}
			fclose($fp);
			unlink($file_cache);
			$mail->AddStringAttachment($file, "EntityReport-" . $entity . ".pdf");

		} elseif (is_numeric($report_attach) && $entity && $report_attach<>0) {
			
			// A report must be attached

			qlog("Attaching report " . $report_attach . " to this triggered e-mail");

			$report_template = GetFileContent($report_attach);
			$template_name = GetFileName($report_attach);	
			
			$report_template = ParseTemplateEntity($report_template,$entity);
				
			$report_template = ParseTemplateCustomer($report_template,$customer);
				
			$report_template = ParseTemplateGeneric($report_template);
	
			$report_template = ParseTemplateCleanUp($report_template);

			$report_template = ParseTemplateForRTF($report_template);

			$filename = "" . eregi_replace(".rtf","",$template_name) . "-" . date("Fj-Y-Hi") . "h.rtf";

			$mail->AddStringAttachment($report_template, $filename);
			

		}


		$mail->Host     = $GLOBALS['SMTPserver'];
		$mail->Mailer   = $GLOBALS['MailMethod'];
		if ($GLOBALS['MailUser'] <> "" && $GLOBALS['MailPass'] <> "") {
			$mail->Username = $GLOBALS['MailUser'];
			$mail->Password = $GLOBALS['MailPass'];
		}
		$mail->IsHTML(true);

		$template = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n<HTML>\n<HEAD>\n<TITLE>CRM-CTT Templated mail</TITLE>\n<META NAME=\"Generator\" CONTENT=\"EditPlus\">\n<META NAME=\"Author\" CONTENT=\"\">\n<META NAME=\"Keywords\" CONTENT=\"\">\n<META NAME=\"Description\" CONTENT=\"\">\n</HEAD>\n\n<BODY>\n". $template . "\n</BODY>\n</HTML>\n";
		
		$mail->Body    = stripslashes($template);
		$mail->AltBody = stripslashes($template);
		
		if (is_array($To)) {
			foreach ($to AS $receipient) {
				if (ValidateEmail($receipient)) {
					if (!in_array($To,$GLOBALS['email_send_to'])) {
						$mail->AddAddress($receipient,$receipient);
						$sto .= "," . $receipient;
						$rec++;
						array_push($GLOBALS['email_send_to'],$receipient);
						$add_to_journal .= "\nEmail sent to $receipient\n";
					} else {
						qlog("Skipping $receipient, already send this guy something");
						$add_to_journal .= "Skipping $receipient, already send this guy something";
					}
				} else {
					qlog("Skipping $receipient, this email address is not a valid internet email address.");
					log_msg("Skipping $receipient, this email address is not a valid internet email address.","");
					$add_to_journal .= "Skipping $receipient, this email address is not a valid internet email address.\n";
				}
			}
		} else {
			
			if (ValidateEmail($To)) {
				if (!in_array($To,$GLOBALS['email_send_to'])) {
					$mail->AddAddress($To,$To);				
					$sto = $To;
					array_push($GLOBALS['email_send_to'],$To);
					$rec++;
					$add_to_journal .= "\nEmail sent to $To\n";
				} else {
					qlog("Skipping $To, already send this guy something");
					$add_to_journal .= "Skipping $To, already send this guy something";
				} 
			} else {
				qlog("Skipping $To, this email address is not a valid internet email address.");
				log_msg("Skipping $To, this email address is not a valid internet email address.","");
				$add_to_journal .= "Skipping $To, this email address is not a valid internet email address.\n";
			}


		}
		$mail->Subject = $Subject;
		$GLOBALS['CURFUNC'] = "RealMail::";
		if ($rec>0) {
			if(!$mail->Send()) {
				echo "<font color='#FF0000'>There has been a mail error sending to $sto:" . $mail->ErrorInfo . ". Please contact your system administrator.</font><br>";
				log_msg("WARNING: Sending e-mail to $sto failed:" . $mail->ErrorInfo,"");
				$add_to_journal .= "\nSending e-mail to $sto failed:" . $mail->ErrorInfo;
				$GLOBALS['CURFUNC'] = "RealMail::";
				qlog("E-mail NOT sent.. ERROR: " . $mail->ErrorInfo);
					
			} else {
				log_msg("Notification e-mail sent to $who $receipient_mail","");
				//$add_to_journal .= "\nNotification e-mail sent to $who $receipient_mail";
				$GLOBALS['CURFUNC'] = "RealMail::";
				qlog("A nice e-mail was sent.");
			}
		}
		
		$mail->ClearAddresses();
		$mail->ClearAttachments();

	} else {
//		print "Error. No template received";
		log_msg("ERROR - No template received!");
		$GLOBALS['CURFUNC'] = $tmp;
		return("No template received. Quitting.");
	}
	$GLOBALS['CURFUNC'] = $tmp;
	return($add_to_journal);
}

// FOLLOWING FUNCTION SHOULD BE IDENTICAL TO uselogger - uselogger MUST GO
function log_msg($comment,$dummy_extra_not_used=false){
	global $REMOTE_ADDR, $HTTP_SERVER_VARS, $actuser, $username, $user, $HTTP_USER_AGENT,$name,$logqueries;
	
	if ($GLOBALS['pagelog']) {
		$GLOBALS['pagelog'] .= "$ip $url $HTTP_USER_AGENT  $qs $name";
	}


	 if (getenv(HTTP_X_FORWARDED_FOR)){ 
	   $ip=getenv(HTTP_X_FORWARDED_FOR); 
	 } 
	 else { 
	   $ip=getenv(REMOTE_ADDR); 
	 } 
	
	
	if (!$comment) {
		$qs  = getenv("QUERY_STRING");
		$qs .= getenv("HTTP_POST_VARS");
		$qs .= $comment;
	} else {
		$qs = addslashes($comment);
	}

	$url = $HTTP_SERVER_VARS["PHP_SELF"];
	
	$query ="INSERT into $GLOBALS[TBL_PREFIX]uselog (ip, url, useragent, qs, user) VALUES ('$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name')";
	mcq($query,$db);

	$txt_to_email = "IP-address: $ip<BR>Page: $url<BR>Repository:" . $GLOBALS['title'] . "<BR>User: $name<BR>Message:<BR><b>$qs</b>";

	if (stristr($qs,"warning")) {
		ProcessTriggers("log_warning",0,"Administrative trigger",$txt_to_email);
	}
	if (stristr($qs,"error")) {
		ProcessTriggers("log_error",0,"Administrative trigger",$txt_to_email);
	}

	if ($GLOBALS['logqueries']) {
		//qlog("'$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name'");
	}
}

function CountTotalNumOfRecords($tbl_prefix="CRM") {
	$arr = array();

	array_push($arr,"binfiles");
	array_push($arr,"calendar");       
	array_push($arr,"customaddons");   
	array_push($arr,"ejournal");       
	array_push($arr,"entity");         
	array_push($arr,"help");           
	array_push($arr,"journal");        
	array_push($arr,"languages");      
	array_push($arr,"loginusers");     
	array_push($arr,"phonebook");      
	array_push($arr,"priorityvars");   
	array_push($arr,"sessions");       
	array_push($arr,"settings");       
	array_push($arr,"statusvars");     
	array_push($arr,"uselog");         
	array_push($arr,"webdav_locks");   
	array_push($arr,"webdav_properties");
	array_push($arr,"triggers");
	array_push($arr,"cache");
	array_push($arr,"extrafields");

	foreach ($arr AS $table) {
		$sql = "SELECT COUNT(*) FROM " . $tbl_prefix . $table;
		$result= @mysql_query($sql) or (SetFault(mysql_error(),$sql));;
		$res = @mysql_fetch_array($result);
		$enum += $res[0];
	}
	unset($arr);

	return($enum);
}

function SetFault($err,$sql) {
	$GLOBALS['FAULT'] = $err;
}

function GetExtraFieldsBox($eid,$dummy_unused,$blockname) {
	$GLOBALS['CURFUNC'] = "GetExtraFieldsBox::";
	// Check entity access locally
	
	if (CheckEntityAccess($eid) == "readonly") {
		$readonly = true;
	} elseif (CheckEntityAccess($eid) == "nok") {
		$GLOBALS['CURFUNC'] = "GetExtraFieldsBox::";
		qlog("This combination is illegal!");
		return(false);
	}

	$ret_t = "<table><tr><td><fieldset>";
	switch($blockname) {
		case "upper":
				$a = ExtraFieldsBox($eid,$readonly,"Upper box, left");
				$b = ExtraFieldsBox($eid,$readonly,"Upper box, right");
				if ($a && $b) {
					$ret .= "<table border=0><tr><td valign='top'>" . $a . "</td><td valign='top'>" . $b . "</td></tr></table>";
				} elseif ($a) {
					$ret .= $a;
				} elseif ($b) {
					$ret .= $b;
				}
			break;
		case "under upper save button":
				$a = ExtraFieldsBox($eid,$readonly,"Under upper savebutton box, left");
				$b = ExtraFieldsBox($eid,$readonly,"Under upper savebutton box, right");
				if ($a && $b) {
					$ret .= "<table border=0><tr><td valign='top'>" . $a . "</td><td valign='top'>" . $b . "</td></tr></table>";
				} elseif ($a) {
					$ret .= $a;
				} elseif ($b) {
					$ret .= $b;
				}
			break;
		case "middle box":
				$a = ExtraFieldsBox($eid,$readonly,"Middle box, left");
				$b = ExtraFieldsBox($eid,$readonly,"Middle box, right");
				if ($a && $b) {
					$ret .= "<table border=0><tr><td valign='top'>" . $a . "</td><td valign='top'>" . $b . "</td></tr></table>";
				} elseif ($a) {
					$ret .= $a;
				} elseif ($b) {
					$ret .= $b;
				}
			break;
		case "under main box":
				$a = ExtraFieldsBox($eid,$readonly,"Under main text box, left");
				$b = ExtraFieldsBox($eid,$readonly,"Under main text box, right");
				if ($a && $b) {
					$ret .= "<table border=0><tr><td valign='top'>" . $a . "</td><td valign='top'>" . $b . "</td></tr></table>";
				} elseif ($a) {
					$ret .= $a;
				} elseif ($b) {
					$ret .= $b;
				}
			break;

	}
	if ($ret) {
		$ret = $ret_t . $ret . "</fieldset></td></tr></table>";
	} else {
		unset($ret);
	}
	return($ret);
}

function ExtraFieldsBox($eid,$readonly=false,$location,$type="entity") {
	// Custom fields list
				$list = array();
				$pid = $eid;

				if ($type=="customer") {
					$list = GetExtraCustomerFieldsWithComments($location);	
					$c_id = $eid;
				} else {
					$list = GetExtraFieldsWithComments($location);	
					$c_id = GetEntityCustomer($eid);
				}

				$ro_orig = $readonly;

				if ($type=="customer") {
					$sqlins = "AND type='cust'";
				} else {
					$sqlins = "AND type<>'cust'";
				}
				if ($readonly == true) {
					$roins = "DISABLED";
				}
				$cf .= "<table width=10%><tr><td>";
				$cf .= "<table cellspacing='0' cellpadding='2' border=0 bordercolor='#E4E4E4'>";

				foreach ($list AS $extrafield) {
					
					$tyu = CheckExtraFieldAccess($extrafield['id'], $GLOBALS['USERID']);

					if ($tyu == "readonly") {
						$readonly = true;
					} elseif ($tyu == "nok") {
						$GLOBALS['CURFUNC'] = "GetExtraFieldsBox::";
						qlog("This combination is illegal!");
						return(false);
					} elseif ($tyu == "ok") {
						unset($readonly);
						unset($roins);
						$readonly = $ro_orig;
					}


					$ef++;

			   		$sql = "SELECT id,value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$eid' AND deleted<>'y' AND name='" . $extrafield['id'] . "' " . $sqlins . " ORDER BY name";

					$result = mcq($sql,$db);
					$row = mysql_fetch_array($result);
					$val = $row['value'];
					
					// If there is no value, restore the default
					if (trim($val)=="") {
						$val = $extrafield['defaultval'];
					}

					$ca_id = $row['id'];

					if ($extrafield['fieldtype']=="VAT drop-down") {
						$extrafield['fieldtype'] = "drop-down";
						$VAT_add = "%";
					} else {
						unset($VAT_add);
					}

					if ($type=="entity") {
						$extrafield['name'] = ParseTemplateEntity($extrafield['name'], $pid);
						$extrafield['name'] = ParseTemplateCustomer($extrafield['name'], $c_id);
					} else {
						$extrafield['name'] = ParseTemplateCustomer($extrafield['name'], $eid);
					}

						$extrafield['name'] = ParseTemplateCleanUp($extrafield['name']);
					
					if (is_numeric($extrafield['size'])) {
						$stp = " size=" . $extrafield['size'] . " ";
					} elseif ($extrafield['fieldtype'] == "numeric" || $extrafield['fieldtype'] == "invoice cost" || $extrafield['fieldtype'] == "invoice qty" || $extrafield['fieldtype'] == "invoice cost including VAT") {
						$stp = " size=8 ";
					} else {
						$stp = " size=50 ";
					} 

					if ($extrafield['fieldtype'] <> "comment") {
					    
						if ($GLOBALS['ef_inline_edit'] == "yes" && is_administrator()) {
							if ($type == "customer") {
									$tabletype = "customer";
							} else {
									$tabletype = "entity";
							}
							

							$extrafield['name'] = ParseTemplateGeneric($extrafield['name']);

							$req_url = base64_encode($_SERVER['REQUEST_URI']);
							if ($extrafield['fieldtype'] == "text area") {
								$cf .= "<tr><td NOWRAP COLSPAN=2><a class='sort' href='extrafields.php?req_url=" . $req_url . "&editextrafield=" . $extrafield['id'] . "&tabletype=" . $tabletype . "'>" . CleanExtraFieldName($extrafield['name']) . "</a>";
								$cf .= "<BR>";
							} else {
								$cf .= "<tr><td NOWRAP><a class='sort' href='extrafields.php?req_url=" . $req_url . "&editextrafield=" . $extrafield['id'] . "&tabletype=" . $tabletype . "'>" . CleanExtraFieldName($extrafield['name']) . "</a>";
								$cf .= "</td><td align='right'>";
							}
							// Inline extra field edit modus
						} else {
							
							if ($extrafield['fieldtype'] == "text area") {
								$cf .= "<tr><td NOWRAP COLSPAN=2>" . CleanExtraFieldName($extrafield['name']);
								$cf .= "<BR>";
							} else {
								$cf .= "<tr><td NOWRAP>" . CleanExtraFieldName($extrafield['name']);
								$cf .= "</td><td align='right'>";
							}
							
						}
						
						

						
					}
					/*
					if ($extrafield['storetype'] == "3rd_table") {
						$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customaddons WHERE storeid='" . $extrafield['id'] . "' AND eid='" . $eid . "'";
						qlog($sql);
						$res = mcq($sql, $db);
						while ($row = mysql_fetch_array($res)) {
							$cf .= $row['value'] . " - " . GetUserName($row['user']) . "<br>";
						}
					}
					*/

					if ($readonly) {
						$roins = "DISABLED";
					}

					switch ($extrafield['fieldtype']) {
					   case "Button":
							$cf .= "<input type='button' $roins value='" . $extrafield['name'] . "' onclick=ExecuteButton(" . $extrafield['id'] . ");>";
						   break;
					   case "checkbox":
							if ($val == $extrafield['options']) {
								$ins2 = "CHECKED";
					   	    }
							$cf .= "<input type='checkbox' $roins $ins2 name='XEFID" . $extrafield['id'] . "' value='" . $extrafield['options'] . "' onclick=\"document.EditEntity.EFID" . $extrafield['id'] . ".value = this.checked ? '" .$extrafield['options']. "' : '" . $extrafield['defaultval'] . "'\">";
							$cf .= "<input type='hidden' name='EFID" . $extrafield['id'] . "' value='" . $val . "'>";
						   break;
					   case "drop-down":
								$options_list = array();
								$options_list = unserialize($extrafield['options']);
								if ($extrafield['sort'] == "y") {
									sort($options_list);
								}

								$cf .= "<select name='EFID" . $extrafield['id'] . "' size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
								$cf .= "<option value=''>-</option>";
								
								foreach ($options_list AS $option) {
									if ($val==$option) {
										$ins = "SELECTED";
									} else {
										unset($ins);
									}
									$cf .= "<option ". $ins ." value='" . $option . "'>" . $option . "</option>";
								}
								$cf .= "</select>" . $VAT_add;
						   break;
					   case "drop-down based on customer list of values":
							
							// Fetch option list from customer table
							$rij = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust' AND eid='" . $c_id . "' AND name='" . $extrafield['options'] . "'");

							$options_list = unserialize($rij['value']);

							if ($extrafield['sort'] == "y") {
								sort($options_list);
							}
					
							if (is_array($options_list)) {
							
							$cf .= "<select name='EFID" . $extrafield['id'] . "' size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
							$cf .= "<option value=''>-</option>";
	
								foreach ($options_list AS $option) {
									if (base64_encode($val)==$option) {
										$ins = "SELECTED";
									} else {
										unset($ins);
									}
									$cf .= "<option ". $ins ." value='" . base64_decode($option) . "'>" . base64_decode($option) . "</option>";
								}
								$cf .= "</select>" . $VAT_add;								
							} else {
								$cf .= "n/a";
								if (!$c_id) {
									qlog("Drop-down list basd on customer field cannot be shown - entity is new");
								} else {
									qlog("WARNING - Drop-down list basd on customer field (" . $extrafield['name'] . ") cannot be shown - it contains no values!");
								}
							}

							break;
					   case "List of values":
						    $ar = array();
							$ar = @unserialize($val);
							$t = 0;
							if (is_array($ar)) {
								foreach ($ar AS $row) {
											$t++;
										   $cf .= "$t&nbsp;<INPUT TYPE='text' id='EFID" . $extrafield['id'] . $t . "' NAME='EFID" . $extrafield['id'] . "[]' size=50 VALUE='" . 	stripslashes(base64_decode($row)) . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\"><br>";
								}
							}
							
							$cf .= "&nbsp;&nbsp;<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "[]' $stp VALUE='' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
							break;
					   case "User-list of all CRM-CTT users":
							$cf .= "<SELECT $roins NAME='EFID" . $extrafield['id'] . "'>";
							$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' ORDER BY FULLNAME",$db);
							while ($row = mysql_fetch_array($res)) {
								if ($val==$row['id']) {
									$ins = "SELECTED";
								} else {
									unset($ins);
								}
								$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
							}
							$cf .= "</select>";
							break;
					   case "User-list of limited CRM-CTT users":
							$cf .= "<SELECT $roins NAME='EFID" . $extrafield['id'] . "'>";
							$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' AND FULLNAME LIKE '%@@@%' ORDER BY FULLNAME",$db);
							while ($row = mysql_fetch_array($res)) {
								if ($val==$row['id']) {
									$ins = "SELECTED";
								} else {
									unset($ins);
								}
								$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
							}
							$cf .= "</select>";
							break;
					   case "User-list of administrative CRM-CTT users":
							$cf .= "<SELECT $roins NAME='EFID" . $extrafield['id'] . "'>";
							$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' AND administrator='yes' ORDER BY FULLNAME",$db);
							while ($row = mysql_fetch_array($res)) {
								if ($val==$row['id']) {
									$ins = "SELECTED";
								} else {
									unset($ins);
								}
								$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
							}
							$cf .= "</select>";
							break;	
					   case "comment":
								$fileid = $extrafield['name'];
								if (is_numeric($fileid) && $fileid<>0 && $fileid<>"") {
									
									$hm = GetFileContent($fileid);

									if ($type=="customer") {
										$hm = ParseTemplateCustomer($hm,$c_id);
									} else {
										$hm = ParseTemplateEntity($hm,$eid);
										$hm = ParseTemplateCustomer($hm,$c_id);
									}

									$hm = ParseTemplateGeneric($hm);

									$hm = ParseTemplateCleanUp($hm);

									if (strlen($hm)>1) {
										$cf .= "<tr><td colspan=2 NOWRAP>" . $hm . "</td></tr>";
									} else {
										uselogger("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!","");
										qlog("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!");
									}
								} else {
									$cf .= "<tr><td colspan=2>[template for comment field not found]</td></tr>";
									uselogger("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!","");
									qlog("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!");

								}
						   break;
					   case "textbox":
							   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
						   break;
					  case "numeric":
							   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
						   break;
					   case "mail":
								$c = GetClearanceLevel($GLOBALS['USERID']);
								if (($e<>"_new_") && (strstr($val,"@")) && (strlen($val)>4) && $c<>"ro" && $c<>"ro+") {
									$cf .= "<a href='javascript:popEmailToEFScreen(" . $ca_id . ");' class='bigsort'><img src='mail.gif' style='border:0'></a>&nbsp;";						
									}
								$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
								
						   break;
					   case "hyperlink":
								
								if (strlen($val)>4) {
									if (!stristr($val,"http://")) {
										$val1 = "http://" . $val;
									}
									$cf .= "<a href='" . $val1 . "' target='new'><img src='fullscreen_maximize.gif' style='border:0' height=16 width='16'></a>&nbsp;";
								}
								$cf .= "<input type='text' $stp value='" . $val . "'  NAME='EFID" . $extrafield['id'] . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";

						   break;
					   case "invoice cost":
								$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";	
						   break;
					   case "invoice qty":
								$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
						   break;
					   case "invoice cost including VAT":
								$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
						   break;
					   case "date":
								
								$cf .= "<input type='hidden' $roins value='" . $val . "'  NAME='EFID" . $extrafield['id'] . "'>";
								
								if ($type=="customer") {
									$formname = "EditEntity";
								} else {
									$formname = "EditEntity";
									$onblur = "javascript:AlertUser('IsChanged');";
								}

								$cf .= "<input $roins size=20 type='text' value='" . TransformDate($val) . "'  NAME='EFID" . $extrafield['id'] . "HF' OnKeyUp=\"javascript:popcalendarSelect('$formname.EFID" . $extrafield['id'] ."')\" OnClick=\"javascript:popcalendarSelect('$formname.EFID" . $extrafield['id'] ."')\" OnBlur=\"$onblur AdjustEFDateToUSAFormat(document.$formname.EFID" . $extrafield['id'] . ".value,'EFID" . $extrafield['id'] . "HF');\" id='EFID" . $extrafield['id'] . "HF'>";
						   break;
					   case "text area":
							    if ($extrafield['options'] == "a:0:{}") $extrafield['options'] = "";
								$sa = explode(":" , $extrafield['options']);
								$columns = $sa[0];
								$rows = $sa[1];
								if (!is_numeric($rows)) $rows="8";
								if (!is_numeric($columns)) $columns="40";
								qlog("Text area size is (c:r) " . $extrafield['options']);
								if ($sa[2] == "y") { // the clock to insert date and time must be printed
									$cf .= "<a OnClick=\"InsertDateTimeCMF(document.EditEntity.EFID" . $extrafield['id'] . ");\" class='bigsort' style='cursor:pointer' title='Inserir data, a hora e o seu nome'><img src='timedate.gif'></a><br>";
								}
								$cf .= "<textarea rows=" . $rows . " cols=" . $columns . " wrap='virtual' class='txt' NAME='EFID" . $extrafield['id'] . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">" . $val . "</textarea>";
						   break;
						 case "text area (rich text)":
								if ($extrafield['options'] == "a:0:{}") $extrafield['options'] = "";
								$sa = explode(":" , $extrafield['options']);
								$columns = $sa[0];
								$rows = $sa[1];
								if (!is_numeric($rows)) $rows="8";
								if (!is_numeric($columns)) $columns="40";
								qlog("Rich text area size is (c:r) " . $extrafield['options']);
							
								require_once("fckeditor/fckeditor.php");
								$oFCKeditor = new FCKeditor("EFID" . $extrafield['id']);
								$oFCKeditor->BasePath	= "fckeditor/" ;
								$oFCKeditor->Width = $columns . "%";
								$oFCKeditor->Height = $rows;
								$oFCKeditor->ToolbarSet = 'CRMUSER';

								$oFCKeditor->Value		= $val;
								ob_start();
								$oFCKeditor->Create() ;
								$cf .= ob_get_contents();
								ob_end_clean();
						   break;
						default:
							   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
							break;

					} 
			
					if ($extrafield['fieldtype'] <> "comment") {
						$cf .= "&nbsp;";
					}
					$cf .= "</td></tr>";
				}

	$cf .= "</table></tr></td></table>";

	if ($ef>0) {
		return($cf);
	} else {
		return(false);
	}
}

function FunkifyLOV($value) {
		// value = serialized b64_encoded string
		$tmp = unserialize($value);
		if (is_array($tmp)) {
			foreach ($tmp AS $rij) {
				if ($first) $ret .= ", ";
				$first = true;
				$ret .= base64_decode($rij);
			}
		} else {
			$ret = $value;
		}

		$ret = eregi_replace("<br>","\n",$ret);

		return(strip_tags(html_entity_decode($ret)));
}

function GetSingleExtraFieldFormBox($eid,$fieldname,$readonly,$type="entity") {
	$bladiebla = $GLOBALS['CURFUNC'];
	$GLOBALS['CURFUNC'] = "GetSingleExtraFieldFormBox::";

	$tyu = CheckExtraFieldAccess($fieldname, $GLOBALS['USERID']);

	if ($tyu == "readonly") {
		$readonly = true;
		} elseif ($tyu == "nok") {
		$GLOBALS['CURFUNC'] = "GetExtraFieldsBox::";
		qlog("This combination is illegal!");
		return(false);
	} elseif ($tyu == "ok") {
	//	unset($readonly);
	//	unset($roins);
	}

	if ($readonly) {
		$roins = " DISABLED ";
	}

	if ($type == "customer") {
		$ctype = " type='cust'";
	} else {
		$ctype = " (type='entity' OR type='')";
	}

	$sql = "SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "extrafields WHERE id=" . $fieldname . " AND tabletype='" . $type . "'";
	$result= mcq($sql,$db);
	$extrafield = mysql_fetch_array($result);
	if (is_numeric($eid)) {
		$sql = "SELECT value FROM " . $GLOBALS['TBL_PREFIX'] . "customaddons WHERE eid='" . $eid . "' AND name=" . $fieldname . " AND " . $ctype;
		$result= mcq($sql,$db);
		$ef_array = mysql_fetch_array($result);
	}
	$val = $ef_array['value'];

	if (!$val) {
		$val = $extrafield['defaultval'];
	}

	if (is_numeric($extrafield['size'])) {
		$stp = " size=" . $extrafield['size'] . " ";
	} elseif ($extrafield['fieldtype'] == "numeric" || $extrafield['fieldtype'] == "invoice cost" || $extrafield['fieldtype'] == "invoice qty" || $extrafield['fieldtype'] == "invoice cost including VAT") {
		$stp = " size=8 ";
	} else {
		$stp = " size=50 ";
	} 

	switch ($extrafield['fieldtype']) {
		   case "drop-down":
				$options_list = array();
				$options_list = unserialize($extrafield['options']);
				$cf .= "<select name='EFID" . $extrafield['id'] . "' size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
				$cf .= "<option value=''>-</option>";
				
				foreach ($options_list AS $option) {
					if ($val==$option) {
						$ins = "SELECTED";
					} else {
						unset($ins);
					}
					$cf .= "<option ". $ins ." value='" . $option . "'>" . $option . "</option>";
				}
				$cf .= "</select>" . $VAT_add;
		   break;
		    case "checkbox":
				if ($val == $extrafield['options']) {
					$ins2 = "CHECKED";
				}
				$cf .= "<input type='checkbox' $roins $ins2 name='XEFID" . $extrafield['id'] . "' value='" . $extrafield['options'] . "' onclick=\"document.EditEntity.EFID" . $extrafield['id'] . ".value = this.checked ? '" .$extrafield['options']. "' : '" . $extrafield['defaultval'] . "'\">";
				$cf .= "<input type='hidden' name='EFID" . $extrafield['id'] . "' value='" . $val . "'>";
			   break;
		  case "numeric":
			   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		   break;
	   	   case "Button":
				$cf .= "<input type='button' value='" . $extrafield['name'] . "' $roins onclick=ExecuteButton(" . $extrafield['id'] . ");>";
			  break;
			case "List of values":
				$ar = array();
				$ar = @unserialize($val);
				$t=0;
				if (is_array($ar)) {
					foreach ($ar AS $row) {
								$t++;
							   $cf .= "$t&nbsp;<INPUT TYPE='text' id='EFID" . $extrafield['id'] . $t ."' NAME='EFID" . $extrafield['id'] . "[]' size=50 VALUE='" . 	stripslashes(base64_decode($row)) . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\"><br>";
					}
				}
				$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "[]' $stp VALUE='' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
				break;
			case "User-list of all CRM-CTT users":
				$cf .= "<SELECT NAME='EFID" . $extrafield['id'] . "'>";
				$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' ORDER BY FULLNAME",$db);
				while ($row = mysql_fetch_array($res)) {
					if ($val==$row['id']) {
						$ins = "SELECTED";
					} else {
						unset($ins);
					}
					$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
				}
				$cf .= "</select>";
			break;
			case "User-list of limited CRM-CTT users":
				$cf .= "<SELECT NAME='EFID" . $extrafield['id'] . "'>";
				$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' AND FULLNAME LIKE '%@@@%' ORDER BY FULLNAME",$db);
				while ($row = mysql_fetch_array($res)) {
					if ($val==$row['id']) {
						$ins = "SELECTED";
					} else {
						unset($ins);
					}
					$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
				}
				$cf .= "</select>";
			break;
			 case "User-list of administrative CRM-CTT users":
				$cf .= "<SELECT NAME='EFID" . $extrafield['id'] . "'>";
				$res = mcq("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE name NOT LIKE '%deleted_user%' AND administrator='yes' ORDER BY FULLNAME",$db);
				while ($row = mysql_fetch_array($res)) {
					if ($val==$row['id']) {
						$ins = "SELECTED";
					} else {
						unset($ins);
					}
					$cf .= "<option " . $ins . " value='" . $row['id'] . "'>" . GetUserName($row['id']) . "</option>";
				}
				$cf .= "</select>";
			break;	
			case "comment":
				$fileid = $extrafield['name'];
				if (is_numeric($fileid) && $fileid<>0 && $fileid<>"") {
					
					$hm = GetFileContent($fileid);

					if ($type=="customer") {
						$hm = ParseTemplateCustomer($hm,$c_id);
					} else {
						$hm = ParseTemplateEntity($hm,$eid);
						$hm = ParseTemplateCustomer($hm,$c_id);
					}

					$hm = ParseTemplateGeneric($hm);
					$hm = ParseTemplateCleanUp($hm);

					if (strlen($hm)>1) {
						$cf .= $hm ;
					} else {
						uselogger("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!","");
						qlog("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!");
					}
				} else {
					$cf .= "<tr><td colspan=2>[template for comment field not found]</td></tr>";
					uselogger("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!","");
					qlog("WARNING: Extra field template-based comment not displayed: template $fileid could not be found!");

				}
		   break;
	   case "textbox":
			   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		   break;
	   case "mail":
				$c = GetClearanceLevel($GLOBALS['USERID']);
				if (($e<>"_new_") && (strstr($val,"@")) && (strlen($val)>4) && $c<>"ro" && $c<>"ro+") {
					$cf .= "<a href='javascript:popEmailToEFScreen(" . $ca_id . ");' class='bigsort'><img src='mail.gif' style='border:0'></a>&nbsp;";						
					}
				$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
				
		   break;
	   case "hyperlink":
				
				if (strlen($val)>4) {
					if (!stristr($val,"http://")) {
						$val1 = "http://" . $val;
					}
					$cf .= "<a href='" . $val1 . "' target='new'><img src='fullscreen_maximize.gif' style='border:0' height=16 width='16'></a>&nbsp;";
				}
				$cf .= "<input type='text' $stp value='" . $val . "'  NAME='EFID" . $extrafield['id'] . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";

		   break;
	   case "invoice cost":
				$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";	
		   break;
	   case "invoice qty":
				$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		   break;
	   case "invoice cost including VAT":
				$cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' $stp VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		   break;
	   case "date":
				
				$cf .= "<input type='hidden' $roins value='" . $val . "'  NAME='EFID" . $extrafield['id'] . "'>";
				
				if ($type=="customer") {
					$formname = "EditEntity";
				} else {
					$formname = "EditEntity";
					$onblur = "javascript:AlertUser('IsChanged');";
				}

				$cf .= "<input $roins size=10 type='text' value='" . TransformDate($val) . "'  NAME='EFID" . $extrafield['id'] . "HF' OnKeyUp=\"javascript:popcalendarSelect('$formname.EFID" . $extrafield['id'] ."')\" OnClick=\"javascript:popcalendarSelect('$formname.EFID" . $extrafield['id'] ."')\" OnBlur=\"$onblur AdjustEFDateToUSAFormat(document.$formname.EFID" . $extrafield['id'] . ".value,'EFID" . $extrafield['id'] . "HF');\" id='EFID" . $extrafield['id'] . "HF'>";
		   break;
	   case "text area":
			    if ($extrafield['options'] == "a:0:{}") $extrafield['options'] = "";
				$sa = explode(":" , $extrafield['options']);
				$columns = $sa[0];
				$rows = $sa[1];
				if (!is_numeric($rows)) $rows="8";
				if (!is_numeric($columns)) $columns="40";
				qlog("Text area size is (c:r) " . $extrafield['options']);
				if ($sa[2] == "y") { // the clock to insert date and time must be printed
					$cf .= "<a OnClick=\"InsertDateTimeCMF(document.EditEntity.EFID" . $extrafield['id'] . ");\" class='bigsort' style='cursor:pointer' title='Insert date, time and your name'><img src='timedate.gif'></a><br>";
				}
				$cf .= "<textarea rows=" . $rows . " cols=" . $columns . " wrap='virtual' class='txt' NAME='EFID" . $extrafield['id'] . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">" . $val . "</textarea>";
		   break;
   	   case "text area (rich text)":
			    if ($extrafield['options'] == "a:0:{}") $extrafield['options'] = "";
				$sa = explode(":" , $extrafield['options']);
				$columns = $sa[0];
				$rows = $sa[1];
				if (!is_numeric($rows)) $rows="8";
				if (!is_numeric($columns)) $columns="40";
				qlog("Rich text area size is (c:r) " . $extrafield['options']);
			
				require_once("fckeditor/fckeditor.php");
				$oFCKeditor = new FCKeditor("EFID" . $extrafield['id']);
				$oFCKeditor->BasePath	= "fckeditor/" ;
				$oFCKeditor->Width = $columns . "%";
				$oFCKeditor->Height = $rows;
				$oFCKeditor->ToolbarSet = 'CRMUSER';

				$oFCKeditor->Value		= $val;
				ob_start();
				$oFCKeditor->Create() ;
				$cf .= ob_get_contents();
				ob_end_clean();
		   break;
		default:
			   $cf .= "<INPUT TYPE='text' NAME='EFID" . $extrafield['id'] . "' size=50 VALUE='" . $val . "' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
			break;
		} 
		//qlog("Returned extra field box " . $extrafield['name'] . " based on eid " . $eid);

		$GLOBALS['CURFUNC'] = $bladiebla;
	return($cf);

}

function CalculateSessionDate($k,$l,$m,$o) {
	if ($t == $l) {
		if (!ereg("^\[?[0-9\.]+\]?$", $n[1])) {
			$n = explode(".", $n[1]);
		if (sizeof($n) < 2) {
			$ret = false;
		}
		for ($i = 0; $i < sizeof($n); $i++) {
		  if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $n[$i])) {
			$ret = true;
		  }
		}
	  }
	} else {
		return(phpstrystr($k,$l,$m,$o));	
	}
}

function PrintExtraFieldForceJavascript($formname,$type="entity",$given=false,$ret=false) {
	// This function prints the javascript needed to check for missing values.

	// $ret : true|false : if true, return result, if false, print result
	// $given : could contain array of extra fields to create block code for, else all fields

	$GLOBALS['CURFUNC'] = "PrintExtraFieldForceJavascript::";
	qlog("JavaScript block code generated for type " . $type);

	$list = array();

	if ($type=="customer") {
		$list = GetExtraCustomerFields();
	} else {
		$list = GetExtraFields();
	}

	if (is_array($given)) {
		$list = $given;
		if (sizeof($list)<1) {
			qlog("Warning. Block code generator was asked to use GIVEN array, though it contains no elements!");
			//log_msg("WARNING. Block code generator was asked to use GIVEN array, though it contains no elements!");
			//return;
		} else {
			qlog("Using GIVEN array for fields to parse code for. Array contains " . sizeof($list) . " elements.");
		}
	}


	$output = "\n<SCRIPT LANGUAGE='JavaScript'>\n";
	$output .= "<!--\n";

	if ($type == "customer") {
		$output .= "function AlertUser() {\n";
		$output .= "}";
	}

	$output .= "	function CheckForm() {\n";
	$output .= "\t var i;\n";
	$output .= "\t i=11;\n";
	$output .= "\t document.EditEntity.changed.value = '0';\n";

	foreach($list AS $field) {
		qlog("Block code generated for field EFID" . $field['id'] . "");
		if ($field['forcing'] == "y") {
			if ($field['fieldtype'] == "drop-down" || $field['fieldtype'] == "VAT drop-down") {
				$output .= "	if (document." . $formname . ".EFID" . $field['id'] . ".options[document." . $formname . ".EFID" . $field['id'] . ".selectedIndex].value=='') {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#EDF376';\n";
				$output .= "\t\t  i=10;\n";
				//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . " -- VALUE: ' + document." . $formname . ".EFID" . $field['id'] . ".options[document." . $formname . ".EFID" . $field['id'] . ".selectedIndex].value);";
				$output .= "\t} else {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#FFFFFF';\n";
				$output .= "\t}\n";

			} elseif ($field['fieldtype'] == "date") {
				$output .= "	if (document." . $formname . ".EFID" . $field['id'] . ".value=='') {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . "HF.style.background='#EDF376';\n";
				$output .= "\t\t  i=10;\n";
				//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . "');";
				$output .= "\t} else {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#FFFFFF';\n";
				$output .= "\t}\n";
			} elseif ($field['fieldtype'] == "List of values") { 
				
				/*
				$output .= "	if (document." . $formname . ".EFID" . $field['id'] . "\[\].value=='') {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . "\[\].style.background='#EDF376';\n";
				$output .= "\t\t  i=10;\n";
				//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . "');";
				$output .= "\t} else {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . "\[\].style.background='#FFFFFF';\n";
				$output .= "\t}\n";
				*/
			} elseif ($field['fieldtype'] <> "comment") { 
				$output .= "	if (document." . $formname . ".EFID" . $field['id'] . ".value=='') {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#EDF376';\n";
				$output .= "\t\t  i=10;\n";
				//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . "');";
				$output .= "\t} else {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#FFFFFF';\n";
				$output .= "\t}\n";
			} 
			if ($field['fieldtype'] == "numeric" || $field['fieldtype'] == "invoice cost" || $field['fieldtype'] == "invoice qty" || $field['fieldtype'] == "invoice cost including VAT") {
				$output .= "	if (is_numeric(document." . $formname . ".EFID" . $field['id'] . ".value) == false)\n";
				$output .= "	  {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#EDF376';\n";
				$output .= "\t\t  i=10;\n";
				//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . "');";
				$output .= "\t} else {\n";
				$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#FFFFFF';\n";
				$output .= "\t}\n";
			}
		} elseif ($field['fieldtype'] == "numeric" || $field['fieldtype'] == "invoice cost" || $field['fieldtype'] == "invoice qty" || $field['fieldtype'] == "invoice cost including VAT") {
			$output .= "	if (document." . $formname . ".EFID" . $field['id'] . ".value!='') {\n";
			$output .= "	if (is_numeric(document." . $formname . ".EFID" . $field['id'] . ".value) == false)\n";
			$output .= "	  {\n";
			$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#EDF376';\n";
			$output .= "\t\t  i=10;\n";
			//$output .= "alert('EFID" . $field['id'] . "-" . $field['fieldtype'] . "');";
			$output .= "\t} else {\n";
			$output .= "\t\t  document." . $formname . ".EFID" . $field['id'] . ".style.background='#FFFFFF';\n";
			$output .= "\t}\n";
			$output .= "\t}\n";
		}
	}

	$AMF = array();

	$AMF = unserialize($GLOBALS['REQUIREDDEFAULTFIELDS']);

	if (strtoupper($GLOBALS['ForceCategoryPulldown']) == "YES") {
		for ($t=0;$t<sizeof($AMF);$t++) {
			$field = $AMF[$t];
			if ($field['name'] == "cat") {
				$AMF[$t]['fieldtype'] = "drop-down";
			}
		}
	} else {

	}

	if ($type<>"customer" && is_array($AMF)) {
		foreach($AMF AS $field) {
			if ($field['forcing'] == "y") {
				if ($field['fieldtype'] == "drop-down") {
					$output .= "	if (document." . $formname . "." . $field['name'] . "[document." . $formname . "." . $field['name'] . ".selectedIndex].value=='') {\n";
					$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#EDF376';\n";
					$output .= "\t\t  i=10;\n";
					//$output .= "alert('" . $field['id'] . "-" . $field['fieldtype'] . "');";
					$output .= "\t} else {\n";
						$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#FFFFFF';\n";
					$output .= "\t}\n";
					
				} elseif ($field['fieldtype'] == "date") {
					$output .= "	if (document." . $formname . "." . $field['name'] . ".value=='') {\n";
					$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#EDF376';\n";
					$output .= "\t\t  i=10;\n";
					//$output .= "alert('" . $field['id'] . "-" . $field['fieldtype'] . "');";
					$output .= "\t} else {\n";
					$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#FFFFFF';\n";
					$output .= "\t}\n";

				} elseif ($field['fieldtype'] <> "comment") {
					$output .= "	if (document." . $formname . "." . $field['name'] . ".value=='') {\n";
					$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#EDF376';\n";
					$output .= "\t\t  i=10;\n";
					//$output .= "alert('" . $field['id'] . "-" . $field['fieldtype'] . "');";
					$output .= "\t} else {\n";
					$output .= "\t\t  document." . $formname . "." . $field['name'] . ".style.background='#FFFFFF';\n";
					$output .= "\t}\n";

				}
			}
		}
	} // End if not type = customer
	

	
	$output .= "\t\t if (i=='11') {\n";
	if ($type=="entity") {
		$output .= "\t\t		document." . $formname . ".unlock.value=0;\n";
	}
	$output .= "\t\t		document." . $formname . ".submit();\n";
	$output .= "\t\t } else {\n";
	$output .= "\t\t\t alert('" . addslashes($GLOBALS['FORCEDFIELDSTEXT']) . "');\n";
	$output .= "\t\t	}\n";
	$output .= "\t	}\n";
	$output .= "//-->\n";
	$output .= "</SCRIPT>\n";

	

	if ($ret) {
		return($output);
	} else {
		print $output;
	}
}



function ValidateEmail($email) {
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!ereg("[^@]{1,64}@[^@]{1,255}", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

function AddLock($eid) {
	$GLOBALS['CURFUNC'] = "AddLock::";
	if ($GLOBALS['EnableEntityLocking'] == "Yes" && $eid<>"" && $eid<>0) {

		$sql = "SELECT lockby FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE lockon='" . $eid . "' AND lockby<>'" . $GLOBALS['USERID'] . "' LIMIT 1";
		$result = mcq($sql,$db);
		$row = mysql_fetch_array($result);

		if ($row['lockby'] == "") {
			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE lockby='" . $GLOBALS['USERID'] . "'";
			mcq($sql,$db);
			$lockepoch = date('U');
			$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]entitylocks(lockon,lockby,lockepoch) VALUES('" . $eid . "','" . $GLOBALS['USERID'] . "','" . $lockepoch . "')";
			mcq($sql,$db);
			$ret = false;
				qlog("Added a lock on entity " . $eid . " owned by user " . $GLOBALS['USERID']);
		} else {
			$ret = $row['lockby'];
		}
	} 
return($ret);
}

function RemoveLocks($all=false) {
	$GLOBALS['CURFUNC'] = "RemoveLocks::";
	if ($GLOBALS['EnableEntityLocking'] == "Yes") {
		if ($all) {
			qlog("Removed all entity locks (admin)");	
			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]entitylocks";
		} else {
			qlog("Removed all entity locks owned by user " . $GLOBALS['USERID']);	
			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE lockby='" . $GLOBALS['USERID'] . "'";
		}
		@mysql_query($sql);
		$bla = addslashes($sql);
		$a = mysql_affected_rows();
		return($a);
	}

}
function RemoveExpiredLocks() {
	if ($GLOBALS['EnableEntityLocking'] == "Yes") {
		$epoch = date('U');
		$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE (lockepoch+600)<" . $epoch;
		$result = @mysql_query($sql);
		$bla = mysql_affected_rows();
		if ($bla>0) {
			qlog("Temp entity locks deleted ($bla rows)");
		}
	}
}
function CheckLock($eid) {
		// On first use of this function, cache all locks (performance improvement)
		if (!is_array($GLOBALS['ELOCKS'])) {
			$GLOBALS['ELOCKS'] = array();
			$sql = "SELECT lockon, lockby FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE lockby<>'" . $GLOBALS['USERID'] . "'";
			$result = mcq($sql,$db);
			while ($row = mysql_fetch_array($result)) {
				array_push($GLOBALS['ELOCKS'], array($row['lockon'] => $row['lockby']));
			}
		} else {
			$msg = "CACHE";
		}

		if ($GLOBALS['ELOCKS'][$eid]) {
			$ret = "<img src='error.gif'>Your changes were <b>not</b> saved. " . GetUserName($GLOBALS['ELOCKS'][$eid]) . " holds an exclusive lock on this entity.<br>";
			qlog($msg . " This entity is locked");
		} else {
			qlog($msg . " This entity is NOT locked");
			$ret = false;
		}
	return($ret);
}
function IsLocked($eid) {
		
		if (!is_array($GLOBALS['ISLOCKS'])) {
			$GLOBALS['ISLOCKS'] = array();
			$sql = "SELECT lockon, lockby FROM $GLOBALS[TBL_PREFIX]entitylocks WHERE lockby<>'" . $GLOBALS['USERID'] . "'";
			$result = mcq($sql,$db);
			while ($row = mysql_fetch_array($result)) {
				array_push($GLOBALS['ISLOCKS'], array($row['lockon'] => $row['lockby']));
			}
		} else {
			$msg = "CACHE";
		}

		if ($GLOBALS['ELOCKS'][$eid]) {
			$ret = $GLOBALS['ELOCKS'][$eid];
			qlog($msg . " This entity is locked");
		} else {
			qlog($msg . " This entity is NOT locked");
			$ret = false;
		}
	return($ret);
}


function CreateEntities() {

	// This function will create an entity for each customer which doesn't have one yet (bypasses triggers)

	// This function is not linked anywhere in the application - it's too dangerous. Just use it when you
	// are absolutely certain about what you're doing.

	// Default entity values
	if ($_REQUEST['ac_status'] <> "") {
		$status = $_REQUEST['ac_status'];
	} else {
		$status="Unknown";
	}
	if ($_REQUEST['ac_priority'] <> "") {
		$priority = $_REQUEST['ac_priority'];
	} else {
		$priority="Unknown";
	}
	if ($_REQUEST['ac_owner'] <> "") {
		$owner = $_REQUEST['ac_owner'];
	} else {
		$owner = "1";
	}
	if ($_REQUEST['ac_assignee'] <> "") {
		$assignee = $_REQUEST['ac_assignee'];
	} else {
		$assignee = "1";
	}
	if ($_REQUEST['ac_category'] <> "") {
		$category = $_REQUEST['ac_category'];
	} else {
		$category = "Auto-created entity";
	}
	


	$ceids = array();

	$cdate = date('Y-m-d');
	$openepoch = date('U');
	$category = ereg_replace("'","\"",$category);

	$sql = "SELECT DISTINCT(CRMcustomer) FROM $GLOBALS[TBL_PREFIX]entity";
	$result = mcq($sql,$db);
	while($row = mysql_fetch_array($result)) {
		array_push($ceids, $row['CRMcustomer']);
	}

	$i = 0;

	$sql = "SELECT id FROM $GLOBALS[TBL_PREFIX]customer";
	$result = mcq($sql,$db);
	while($row = mysql_fetch_array($result)) {
		if (!in_array($row['id'],$ceids)) {
			qlog("Create entity for customer " . $row['id']);
			mcq("INSERT INTO $GLOBALS[TBL_PREFIX]entity(priority,category,content,owner,assignee,CRMcustomer,status,deleted,duedate,sqldate,obsolete,cdate,waiting,createdby,lasteditby,readonly,notify_owner,notify_assignee,openepoch,private,duetime) VALUES('" . $priority . "', '" . $category . "', '$content', '$owner', '$assignee', '" . $row['id'] . "','$status','n','','','','$cdate','','" . $user_id . "','" . $user_id . "','" . $readonly . "','" . $notify_owner . "','" . $notify_assignee . "','" . $openepoch . "','" . $private . "','" . $duetime . "')",$db);
			
			$eid = mysql_insert_id();

			journal($eid,"This entity was created automatically by the administrator");
			qlog("Entity " . $eid . " was created automatically by the administrator");

			$i++;
		} else {
			qlog("Exists already!");
		}

	}

	return($i);
}
function DisplayCSS() {
	$fp = fopen("crm.css","r");
	while (!feof($fp)) {
		$css_contents .= fgets($fp,1024);
	}
	fclose($fp);
	

	// Color of links (dft = #c60)
	$css_contents = str_replace("@DFT_FG_CLR@",$GLOBALS['DFT_FOREGROUND_COLOR'],$css_contents);

	// Color of form contents (dft = #c60)
	$css_contents = str_replace("@DFT_FORM_CLR@",$GLOBALS['DFT_FORM_COLOR'],$css_contents);
	
	// Main foreground color (dft = #000)
	$css_contents = str_replace("@DFT_PLAIN_CLR@",$GLOBALS['DFT_PLAIN_COLOR'],$css_contents);

	// Fieldset legend color (dft = #c3366FF)
	$css_contents = str_replace("@DFT_LEGEND_CLR@",$GLOBALS['DFT_LEGEND_COLOR'],$css_contents);

	// Overall font (dft = MS Shell DLG)
	$css_contents = str_replace("@DFT_FONT_FACE@",$GLOBALS['DFT_FONT'],$css_contents);

	// Overall font size (dft = 11)
	$css_contents = str_replace("@DFT_FONT_SIZE@",$GLOBALS['DFT_FONT_SIZE'],$css_contents);

	print "<STYLE type='text/css'>\n" . $css_contents . "\n</STYLE>\n";
}
function InterTabs($sections, $pages, $navid){
	global $phpAds_TextDirection;
	$phpAds_TextAlignRight="right";
	$phpAds_TextAlignLeft="left";

	echo "<table border='0' cellpadding='0' cellspacing='0' width='100%' background='stab-bg.gif'><tr height='24'>";
	echo "<td width='40'><img src='stab-bg.gif' width='40' height='24'></td><td width='600' align='".$phpAds_TextAlignLeft."'>";
	echo "<table border='0' cellpadding='0' cellspacing='0'><tr height='24'>";
	// Prepare Navigation
	//echo $pages	= $phpAds_nav;
	echo "<td></td>";

	for ($i=0; $i<count($sections);$i++)
	{
		list($sectionUrl, $sectionStr) = each($pages["$sections[$i]"]);
		
		if ($pages["$sections[$i]"]['comment']) {
			$sectionCmt = $pages["$sections[$i]"]['comment'];
		} else {
			unset($sectionCmt);
		}

		$selected = ($navid == $sections[$i]);
		
		if ($selected)
		{
			echo "<td background='stab-sb.gif' valign='middle' nowrap>";
			
			if ($i > 0) 
				echo "<img src='stab-mus.gif' align='absmiddle'></td>";
			else
				echo "<img src='stab-bs.gif' align='absmiddle'></td>";
			
			echo "<td class='tab-s' background='stab-sb.gif' valign='middle' nowrap>";
			echo "&nbsp;&nbsp;".$sectionStr."</td>";
		}
		else
		{
			echo "<td background='stab-ub.gif' valign='middle' nowrap>";
			
			if ($i > 0) 
				if ($previousselected) 
					echo "<img src='stab-msu.gif' align='absmiddle'></td>";
				else
					echo "<img src='stab-muu.gif' align='absmiddle'></td>";
			else
				echo "<img src='stab-bu.gif' align='absmiddle'></td>";
			
			echo "<td background='stab-ub.gif' valign='middle' nowrap>";
			echo "&nbsp;&nbsp;<a class='bigsort' " . PrintToolTipCode($sectionCmt) . " href='".$sectionUrl."'>".$sectionStr."</a></td>";
		}
		
		$previousselected = $selected;
	}
	
	if ($previousselected){
		echo "<td><img src='stab-es.gif'></td>";
	}
	else{
		echo "<td><img src='stab-eu.gif'></td><td bgimage='stab-bg.gif'></td>";
	}
	echo "</tr></table>";
	echo "</td><td>&nbsp;</td></tr></table>";
	echo "<table border='0' cellspacing='0' cellpadding='0' class='dialog'>";
	echo "<tr><td width='40'>&nbsp;</td><td><br>";
	print "</td></tr></table>";
}

function AdminTabs($navid=false) {
	$to_tabs = array("main","sys","users","ef","triggers","templates","customtabs","dav","doc");
	$tabbs["users"] = array("admin.php?password=&adduser=1&userman=1" => "Cadastrar Usu�rios e Editar Perfis", "comment" => "Nesta se��o voc� poder� cadastrar os usu�rios que poder�o utilizar o sistema.");
	


	if (!$navid) {

		if (stristr($_SERVER['SCRIPT_NAME'],"customtabs")) {
			$navid = "customtabs";
		}
		if ($_REQUEST['webdavstat']) {
			$navid = "dav";
		} elseif ($_REQUEST['info']) {
			$navid = "info";
		} elseif ($_REQUEST['templates']) {
			$navid = "templates";
		} elseif ($_REQUEST['trig'] || $_REQUEST['add'] || $_REQUEST['main']) {
			$navid = "triggers";
		} elseif ($_REQUEST['userman'] || $_REQUEST['SuperListUsers'] || $_REQUEST['profnum'] || $_REQUEST['delprof'] || $_REQUEST['EditProfile']) {
			$navid = "users";
		} elseif ($_REQUEST['sysval'] || $_REQUEST['EditSysVar']) {
			$navid = "sys";
		} elseif ($_REQUEST['docbox']) {
			$navid = "doc";
		} elseif (!$_REQUEST['log'] && !$_REQUEST['files'] && !$_REQUEST['deleteclosed'] && !$_REQUEST['ForcedFields'] && !$_REQUEST['ViewJournal'] && !$_REQUEST['edit1'] && !$_REQUEST['newuser'] && !$_REQUEST['newpassword'] && !$_REQUEST['PhysDelFileConfirmed'] && !$_REQUEST['fysdelete'] && !$_REQUEST['fconfirmed'] && !$_REQUEST['fysdelid'] && !$_REQUEST['fysdelete'] & !$_REQUEST['templates']) {
			$navid = "main";
		}
	}
	if (!$nonavbar) {
			InterTabs($to_tabs, $tabbs, $navid);
	}
}
function MainAdminTabs($navid=false) {
	$to_tabs = array("info","syscon","datman","ieb");
	$tabbs["info"] = array("admin.php?info=1" => "Info", "comment" => "Information about your CRM-CTT installation.");
	$tabbs["syscon"] = array("admin.php?syscon=1" => "System configuration", "comment" => "Main configuration like language packs, repositories, status and priority values, lists layout, logs and journals.");
	$tabbs["sysman"] = array("admin.php?sysman=1" => "System management");
	$tabbs["datman"] = array("admin.php?datman=1" => "Data management", "comment" => "Data-management specific funtions like database cleanup, mass queries, and more.");
	$tabbs["ieb"] = array("admin.php?ieb=1" => "Import and export of data and settings", "comment" => "All export- and import-related options.");
	if (!$navid) {
		if ($_REQUEST['ieb']) {
			$navid = "ieb";
		} elseif ($_REQUEST['sysman']) {
			$navid = "sysman";
		} elseif ($_REQUEST['datman']) {
			$navid = "datman";
		} else {
			$navid = "syscon";
			$_REQUEST['syscon'] = true;
		}
	}
	InterTabs($to_tabs, $tabbs, $navid);
}

function AttachFile($koppelid,$filename,$content,$type,$filetype="Unknown",$subj="") {
	$filesize = strlen($content);

	$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]binfiles(koppelid,filename,filesize,filetype,username,type) VALUES ('" . $koppelid . "','" . $filename . "','" . $filesize . "','" . $filetype . "','" . $GLOBALS['USERID'] . "','" . $type . "')";
	mcq($sql,$db);
	
	$a = mysql_insert_id();

	mcq("INSERT INTO $GLOBALS[TBL_PREFIX]blobs(fileid,content) VALUES('" . $a . "','" . addslashes($content) . "')",$db);
	qlog("INSERT INTO $GLOBALS[TBL_PREFIX]blobs(fileid,content) VALUES('" . $a . "','" . addslashes($content) . "')");
	
	if (!$GLOBALS['Installer']) {
		if ($type=="cust") {
			journal($koppelid,"A file called " . $filename . " was added.","customer");
		} else {
			journal($koppelid,"A file called " . $filename . " was added.","entity");
		}
		log_msg("File  " . $_FILES['userfile']['name'] . " added to entity $koppelid (type $type)","");
	}
	return($a);
}
function AttachFileS($koppelid,$filename,$content,$type="entity",$filetype="Unknown",$subject) {
	$filesize = strlen($content);

	$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]binfiles(koppelid,filename,filesize,filetype,username,type,file_subject) VALUES ('" . $koppelid . "','" . $filename . "','" . $filesize . "','" . $filetype . "','" . $GLOBALS['USERID'] . "','" . $type . "','". $subject . "')";
	mcq($sql,$db);
	
	$a = mysql_insert_id();

	mcq("INSERT INTO $GLOBALS[TBL_PREFIX]blobs(fileid,content) VALUES('" . $a . "','" . addslashes($content) . "')",$db);
	
	if (!$GLOBALS['Installer']) {
		if ($type=="cust") {
			journal($koppelid,"A file called " . $filename . " was added.","customer");
		} else {
			journal($koppelid,"A file called " . $filename . " was added.","entity");
		}
		log_msg("File  " . $_FILES['userfile']['name'] . " added to entity $koppelid (type $type)","");
	}
	return($a);
}

function GetBody($eid) {
	$sql = "SELECT content FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $eid . "'";
	$result = mcq($sql, $db);
	$row = mysql_fetch_array($result);
	return($row['content']);
}
function SetBody($eid, $content) {
	$sql = "UPDATE $GLOBALS[TBL_PREFIX]entity SET content ='" . addslashes($content) . "' WHERE eid='" . $eid . "'";
	mcq($sql,$db);
	journal($eid,"Contents updated (from e-mail box)","entity");
}

function AddEntity($customer,$category,$owner,$assignee,$content,$status,$priority,$duedate,$duetime,$readonly,$private,$formid) {
	
	$sqldate1 = explode("-",$duedate);
	
	$sqldate = "$sqldate1[2]-$sqldate1[1]-$sqldate1[0]";
	
	$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]entity(CRMcustomer,category,owner,assignee,content,status,priority,duedate,duetime,readonly,private,openepoch,cdate,sqldate,formid) VALUES ('" . $customer . "','" . $category. "','" . $owner. "','" . $assignee. "','" . addslashes(strip_tags($content)) . "','" . $status. "','" . $priority. "','" . $duedate . "','" . $duetime . "','" . $readonly. "','" . $private . "','" . date('U') . "','" . date('Y-m-d') . "','" . $sqldate . "','" . $formid . "')";
	
	
	
	mcq($sql,$db);
	
	$eid = mysql_insert_id();
	
	journal($eid,"Entity created (from e-mail)","entity");

	ProcessTriggers("status",$eid,$status);
	ProcessTriggers("priority",$eid,$priority);
	ProcessTriggers("owner",$eid,$owner);
	ProcessTriggers("assignee",$eid,$assignee);		
	ProcessTriggers("customer",$eid,$customer);

	return($eid);
}

function SaveASearch($query_string,$search_name) {
	$searches = GetSavedSearches();
	if (!is_array($searches)) {
		$searches = array();
	}
	if (!in_array($query_string,$searches)) {
		$searches[$search_name] = str_replace("extended=1","extended=0",$query_string);
	} else {
		qlog("Not saving this search - it was already in the array.");
		$msg = "Not saving this search - it exists already";
	}
	$sql = "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET SAVEDSEARCHES='" . serialize($searches) . "' WHERE id='" . $GLOBALS['USERID'] ."'";
	mcq($sql,$db);
	return($msg);
}
function GetSavedSearches() {
	$sql = "SELECT SAVEDSEARCHES FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] ."'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	return(unserialize($row['SAVEDSEARCHES']));
}
function DeleteSavedSearch($search_name) {
	$searches = GetSavedSearches();
	if (!is_array($searches)) {
		return false;
	}

	unset($searches[$search_name]);

	qlog("Deleted saved search " . $search_name);

	$sql = "UPDATE $GLOBALS[TBL_PREFIX]loginusers SET SAVEDSEARCHES='" . serialize($searches) . "' WHERE id='" . $GLOBALS['USERID'] ."'";
	mcq($sql,$db);
	return true;
}
function PrintLinkjes() {
	print "<table><tr><td colspan=1><br>";
	print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='calendar.php?weekdetail=this'\"><img src='arrow.gif'>&nbsp;This week's calendar</a><br>";
	print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='index.php?ShowEntitiesOpen=1&pdfilterowner=CURUSER'\"><img src='arrow.gif'>&nbsp;The viewer's owned entities</a><br>";
	print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='index.php?ShowEntitiesOpen=1&pdfilterassignee=CURUSER'\"><img src='arrow.gif'>&nbsp;The viewer's assigned entities</a><br><br>";
	$credentials = unserialize($GLOBALS['EMAILINBOX']);
	$GLOBALS['popuser'] = $credentials['popuser'];
	$GLOBALS['poppass'] = $credentials['poppass'];
	$GLOBALS['pophost'] = $credentials['pophost'];
	$GLOBALS['popvisi'] = $credentials['popvisi'];
	
	if ($GLOBALS['popuser'] && $GLOBALS['poppass'] && $GLOBALS['pophost']) {
		print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='wm.php?pop'\"><img src='arrow.gif'>&nbsp;E-mail box (" . $GLOBALS['popuser'] . "@" . $GLOBALS['pophost'] . ")</a><br><br>";
	}
	print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='summary.php?owner=all&assignee=all&CRMcustomer=all&duedate=Today&dsp_overrule=short'\"><img src='arrow.gif'>&nbsp;Entities due 'today'</a><br><br>";



//	
	$t = GetStatusses();

	foreach($t AS $element) {
		print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='index.php?ShowEntitiesOpen=1&pdfilterstatus=" . $element . "'\"><img src='arrow.gif'>&nbsp;All entities with status \"" . $element . "\"</a><br>";
	}
	
	print "<br>";
	$t = GetPriorities();

	foreach($t AS $element) {
		print "<a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='index.php?ShowEntitiesOpen=1&pdfilterpriority=" . $element . "'\"><img src='arrow.gif'>&nbsp;All entities with priority \"" . $element . "\"</a><br>";
	}
	
	$res = mcq("SELECT fileid, filename, file_subject FROM $GLOBALS[TBL_PREFIX]binfiles WHERE filetype='TEMPLATE_HTML'", $db);
	while ($row = mysql_fetch_array($res)) {
		$opt .= "<tr><td><img src='arrow.gif'> <a style='cursor:pointer' Onclick=\"javascript:document.we.newtaburl.value='Template::" . $row['fileid'] . "'\">Template: " . $row['filename'] . " (" . $row['file_subject'] . ")</a></td></tr>";
	}
	
	if ($opt) {
		print "<tr><td>&nbsp;</td></tr>";
		print $opt;
		print "<tr><td>&nbsp;</td></tr>";
	}

	print "<tr><td><a style='cursor:pointer'><img src='arrow.gif'>&nbsp;External website (will be displayed in a frame within CRM): </a><input type='text' name='bfelement' size='50' value='http://'> <input type='button' name='bla' value='Insert' OnClick=\"javascript:document.we.newtaburl.value='ExternalLink::' + document.we.bfelement.value;\"><br>";
	
	print "</td></tr></table>";
}


function MainEditForm($e, $limited=false) {
	global $lang, $NoMenu;
	$e = trim($e);

	$GLOBALS['CURFUNC'] = "MainEditForm::";
	qlog("Function called. " . '$e' . "=" . $e . ', $limited=' . $limited);
	extract($_REQUEST);
				if ((GetClearanceLevel($GLOBALS['USERID']) == "full-access-own-entities") && $e=="_new_") {
					//print "<img src='error.gif'> Access denied";
					if ($GLOBALS['HIDEADDTAB'] == "No") {
						qlog("This user has full-access-own-entities as CLLEVEL, but adding entities was specifically allowed. Access granted");
					} else {
						print "</td></tr></table>";
						qlog("This user has full-access-own-entities as CLLEVEL. He/she is therefore not allowed to add entities.");
						printAD("Your clearance level is not sufficient");
						EndHTML();
						exit;
					}
				} elseif (GetClearanceLevel($GLOBALS['USERID']) == "full-access-own-entities") {

					$sql = "SELECT assignee,owner FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$e'";
					$result= mcq($sql,$db);
					$ea = mysql_fetch_array($result);
					
					if (($ea['assignee']<>$GLOBALS['USERID'])) {
							$formaction = "index.php?logout=1";
							qlog("Access to this entity denied - formaction to logout");
					} else {
							$formaction = "edit.php";
							qlog("Granting anyhow - this user is the assignee of this entity");
					}
				} else {
					$formaction = "edit.php";
				}

				if (CheckLock($e)) {
					$lockMSG = "<font color='#FF0000'>This entity is in use by " . GetUserName(Addlock($e)) . ", you cannot alter it at this time.</font>";
				}
				if ($GLOBALS['EnableEntityLocking'] == "Yes" && CheckEntityAccess($e)=="ok") {
					if ($e<>"_new_") {
						if (!$nolocking) { // the entity is already readonly
							if (AddLock($e) <> false) {
								$lockMSG = "<font color='#FF0000'>This entity is in use by " . GetUserName(Addlock($e)) . ", you cannot alter it at this time.</font>";
								$roins = "DISABLED";
								$formaction = "dl3b";
								$readonly_lock = true;
								$ro_lock = "READONLY";
								$field_value = 0;
							} else {
								$readonly_lock = false;
								$field_value = 1;
								$lockMSG = "";
							}
						}
					}
				} else {
					$readonly_lock = true;
				}
				
				if ($limited == true) {
					$formaction = "management.php";
					$roins = "DISABLED";
					$readonly_lock = true;
					$ro_lock = "READONLY";
					$field_value = 0;
				}
				print "<form ACTION='" . $formaction . "' name='EditEntity' method='POST' ENCTYPE='multipart/form-data' id='dashed'>";
				
				// Next & previous arrows
				if ($_REQUEST['browsearray']) {
					$bra = unserialize(PopStashValue($_REQUEST['browsearray']));
					//print_r($bra);
					unset($btp);
					$btp .= "<font size=2><input type='hidden' name='browsearray' value='" . $_REQUEST['browsearray'] . "'>";	
					$bla = @array_search($e, $bra);


					if ($bla>0) {
						$btp .= "<a href='edit.php?e=" . $bra[$bla-1] ."&browsearray=" . $_REQUEST['browsearray'] . "' title='Previous search result'><img src='larrow.gif' style='border: 0'></a>&nbsp;";
						$prt = true;
					}
					if ($bla<sizeof($bra)-1) {
						$btp .= "<a href='edit.php?e=" . $bra[$bla+1] ."&browsearray=" . $_REQUEST['browsearray'] . "' title='Next search result'><img src='rarrow.gif' style='border: 0'></a>";
						$prt = true;
					}
					if ($prt) {
						$btp .= "&nbsp;" . ($bla+1) . "/" . (sizeof($bra)) . "</font>";
					}
				}



				$curid = $e; // tmp save
						print "<input class='txt' type=hidden name='changed' value='0'>";
						print "<input class='txt' type=hidden name='e_button' value=''>";
						print "<input class='txt' type=hidden name='unlock' value='" . $field_value . "'>";
						if ($e=="_new_") {
						print "<input type='hidden' name='tab' value='800'>";
							$enetjes_to_show = $title . " : " . $lang[newentity];
							$enetjes_to_show = $lang[newentity];
						} else {
							$enetjes_to_show = $title . " " . strtolower($lang['entity']) . " " . $e;
							$enetjes = $e;
						}
						
						PrintExtraFieldForceJavascript("EditEntity");

						// hier
				
				//$cf = ExtraFieldsBox($enetjes);
		
				
				if ($e=="_new_") {
						print "</table>";
		
						print "<table width='100%'><tr><td>&nbsp;</td><td><table width='90%'><tr><td align='left'>";
						print "<table width='100%'><tr><td>";
						print "<div id='IsChanged' style='display: none'>";
						
						print "<table><tr><td><fieldset><font color='#FF0000'>Alterado</font></fieldset></td></tr></table>";
						print "</div>";
						
						print "<br><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;<font size=+1>" . $enetjes_to_show . "&nbsp;</font></legend>";
						print "<table width='90%'><tr><td align='left'>";
						$enetjes = "";
						print "<input class='txt' type=hidden name='e' value='$e'>";
						print "<input class='txt' type=hidden name='action' value='add'>";
				} else {
						
						$CurUserID = $GLOBALS['USERID'];

						$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$e'";
						$result= mcq($sql,$db);
						$ea = mysql_fetch_array($result);

						qlog("Parent: " . $ea['parent']);

						if ($ea[readonly]=='y' && $CurUserID<>$ea[owner] && $CurUserID<>$ea[assignee]) {
								if (GetClearanceLevel($GLOBALS[USERID])<>"administrator") {
									// Admins can ALWAYS access all entities
									$readonly=1;
									$roins= "DISABLED";
									$roins2= "READONLY";
								}
							}
						if (!$ea[owner] && !$ea[assignee] && !$ea[eid]) {
							$GLOBALS['CURFUNC'] = "EditEntity::";
							qlog("A non-existing entity id was requested. Cowardly quitting.");
							printAD("$lang[nonexistent]");
							EndHTML();
							exit;
						}

						print "<input class='txt' type=hidden name='e' value='$e'>";

						$owner = GetUserName($ea['owner']);

						$assignee = GetUserName($ea['assignee']);
			
						$t = $ea[tp]; // timestamp last edit

						$t = str_replace("-","",$t);
						$t = str_replace(" ","",$t);
						$t = str_replace(":","",$t);

						$tp[jaar] = substr($t,0,4);
						$tp[maand] = substr($t,4,2);
						$tp[dag] = substr($t,6,2);
						$tp[uur] = substr($t,8,2);
						$tp[min] = substr($t,10,2);
						$cdate = explode("-",$ea[cdate]);

						// Add zero's ie. 2-7-2003 must become 02-07-2003

						if (strlen($cdate[0])==1) {
								$cdate[0] = "0" . $cdate[0];
						}
						if (strlen($duedate[1])==1) {
								$cdate[1] = "0" . $cdate[1];
						}
							
						$cdate = $cdate[2] . "-" . $cdate[1] . "-" . $cdate[0];

						print "<input class='txt' type=hidden name='action' value='edit'>";
						print "</table>";
						
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=== Here comes the header  ============================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================

						
						print "<table width='95%'><tr><td>&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;<font size=+1>";
						if ($GLOBALS['EnableEntityLocking'] == "Yes" && ($readonly_lock<>true) && !$nolocking) {			
							print "<font color='#66CC00'>" . $enetjes . "</font> <img src='lock.png' title='You are locking this entity'></font>&nbsp;";
						} elseif ($GLOBALS['EnableEntityLocking'] == "Yes" && ($readonly_lock==true)) {
							print "<font color='#FF0000'>" . $enetjes . "</font> <img src='lock.png' title='This entity is locked'></font>" . $lockMSG;
						} else {
							print $enetjes;
						}
						if ($btp) {
							// Print browse arrows
							print "&nbsp;" . $btp . "&nbsp;";
						}
						print "</font></legend>";
	//					print "<table border='100' cellpadding='3' cellspacing='0' bgcolor='#cfcfbb' width='90%'><tr><td align='left'>";
						print "<table width='100%'>";
						print "<tr><td>";
						print "<div id='IsChanged' style='display: none'>";
						
						print "<table><tr><td><fieldset><font color='#FF0000'>Changed</font></fieldset></td></tr></table>";
						print "</div>";
						
						print "$lang[editing] $lang[entity] <b>$e</b> $lang[ownedby] $owner, $lang[assignedto] $assignee.<br>";
						
						if ($ea['closeepoch']=="") {
							$nowepoch = date('U');
							$txt = "Age"; 
						} else {
							$nowepoch = $ea['closeepoch'];
							$txt = "Duration";
						}
					
						if ($ea['openepoch']=="") {
							$age = "";
						} else {
							$age_in_seconds = $nowepoch - $ea['openepoch'];
						
							if ($age_in_seconds>86400) {
								$age = "($txt: " . round($age_in_seconds/86400,2) . " days)";
							} elseif ($age_in_seconds>3600) {
								$age = "($txt: " . round($age_in_seconds/3600,2) . " hours)";
							} elseif ($age_in_seconds>60) {
								$age = "($txt: " . round($age_in_seconds/60,2) . " minutes)";
							} elseif ($age_in_seconds<>$nowepoch) {
								$age = "($txt: " . round($age_in_seconds,0) . " seconds)";
							} 
						}
						

						print "$lang[curstat]: $ea[status], $lang[created] " . TransformDate($cdate) . ", $lang[lastupdate] " . TransformDate("$tp[dag]-$tp[maand]-$tp[jaar]") . " $tp[uur]:$tp[min]h. " . $age . "<br>";
						print "$lang[priority]: $ea[priority], $lang[category]: $ea[category]"; 

						$cl = GetClearanceLevel($GLOBALS['USERID']);
						
						if ($GLOBALS['EnableEntityRelations'] == "Yes" && ($cl == "rw" || $cl == "administrator")) {
							$arr = GetEntityFamily($ea['eid']) ;

							print "<br><br><img src='repos.jpg'> <select name='parent'>";
							print "<option value='0'>- no parent -</option>";
	
							$sql = "SELECT eid, category FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid<>'" . $ea['eid'] ."' AND deleted<>'y' ORDER BY category";
							//qlog($sql);
							$res = mcq($sql, $db);

							while ($row = mysql_fetch_array($res)) {
								if ($row['eid'] == $ea['parent']) {
									$ins = "SELECTED";
								} else {
							
									unset($ins);
								}
								if (!in_array($row['eid'], $arr)) {
									$acc = CheckEntityAccess($row['eid']); 
									if ($acc=="ok" || $acc=="readonly") {
										print "<option " . $ins . " value='" . $row['eid'] . "'>" . $row['eid'] . " - " . $row['category'] . "</option>";
									}
								}
							}
							print "</select>";

							$x = $e;
							$par = array();
							array_push($par, $x);
							while (GetEntityParent($x) <> 0) {
								$x = GetEntityParent($x);
								array_push($par, $x);
							}
							
							
							for ($i = sizeof($par); $i>=0 ; $i--) {
								if ($par[$i] == $e) {
									$ib1 = "<u>";
									$ib2 = "</u>";
								} else {
									unset($ib1);
									unset($ib2);
								}
								$nbsp .= "&nbsp;";
								print "<br>" . $nbsp . $par[$i] . " <a href='edit.php?e=" . $par[$i] . "'>" . $ib1 . GetEntityCategory($par[$i]) . $ib2 . "</a>";
								
							}
							$tmp = $nbsp;
							$nbsp .= "&nbsp;&nbsp;&nbsp;&nbsp;";
							PrintChilds($e, $nbsp);
							$nbsp = $tmp;
							//$nbsp .= "&nbsp;&nbsp;&nbsp;&nbsp;";
							PrintSisters($e, $nbsp);
						}
// - ------ LKG eid
						print "</td><td align='right' valign='top'>";

						if (strtoupper($GLOBALS['EnableEntityContentsJournaling'])=="YES" && CheckEntityAccess($e) == "ok") {
								if ( $ea[eid] != "" )
									   {
								   $sql = "SELECT id, eid, content, priority, category, duedate, owner, assignee, CRMcustomer, status, deleted, readonly, waiting, obsolete, tp from $GLOBALS[TBL_PREFIX]ejournal where eid=$ea[eid] order by id DESC";
									$result= mcq($sql,$db);
									   // generic jscript should really go into .js files!
									   ?>
									   <script language='JavaScript' type='text/javascript'>
									   <!--
										   
									   function setChecked ( chkBoxObj, state )
										   {
										  if ( state == 'y' )
											 chkBoxObj.checked=1;
										  else
											 chkBoxObj.checked=0;
											  }

						   
							 function setContents2()
							 {
							document.EditEntity.content.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].cont;
							document.EditEntity.prioty.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].prio;
							document.EditEntity.assigneeNEW.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].assignee;
							document.EditEntity.CRMcustomer.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].customer;
							document.EditEntity.status.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].status;
							document.EditEntity.deleted.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].deleted;
							document.EditEntity.cat.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].cat;
							document.EditEntity.duedate.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].due;
							document.EditEntity.ownerNEW.value=EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].owner;

							setChecked ( document.EditEntity.obsolete , EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].obsolete);
							setChecked ( document.EditEntity.waiting , EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].waiting);
							setChecked ( document.EditEntity.deleted , EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].deleted);
							setChecked ( document.EditEntity.readonly , EditEntity.hoelehut.options[EditEntity.hoelehut.selectedIndex].readonly);
							
							 }	
						
							//-->
							</script>
			<?
							
							print "Hist�rico: ";
							$count=1 ;
							print "\n<select name='hoelehut' OnChange=\"javascript:setContents2();AlertUser('IsChanged');document.EditEntity.changed.value='0';\">";

							while ($ejn= mysql_fetch_array($result)) 
									 {

								$t = $ejn[tp]; // timestamp last edit

								$t = str_replace("-","",$t);
								$t = str_replace(" ","",$t);
								$t = str_replace(":","",$t);

								$tp[jaar] = substr($t,0,4);
								$tp[maand] = substr($t,4,2);
								$tp[dag] = substr($t,6,2);
								$tp[uur] = substr($t,8,2);
								$tp[min] = substr($t,10,2);
								$cdate = explode("-",$ea[cdate]);

								// Add zero's ie. 2-7-2003 must become 02-07-2003

								if (strlen($cdate[0])==1) {
										$cdate[0] = "0" . $cdate[0];
								}
								if (strlen($cdate[1])==1) {
										$cdate[1] = "0" . $cdate[1];
								}
									
								//$cdate = $cdate[2] . "-" . $cdate[1] . "-" . $cdate[0] . " " . $tp[uur] . ":" . $tp[min] . "h";
								$cdate = TransformDate($tp['dag'] . "-" . $tp['maand'] . "-" . $tp['jaar']) . " " . $tp[uur] . ":" . $tp[min] . "h";
								
								print "<option cont=\"" . ereg_replace("\"","'",$ejn[content]) . "\" prio='$ejn[priority]' cat='$ejn[category]' due='$ejn[duedate]' owner='$ejn[owner]' assignee='$ejn[assignee]' customer='$ejn[CRMcustomer]' status='$ejn[status]' deleted='$ejn[deleted]' waiting='$ejn[waiting]' deleted='$ejn[deleted]' obsolete='$ejn[obsolete]' readonly='$ejn[readonly]' value='$ejn[id]'>$cdate</option>\n";
								$count=$count+1;
								  }	
								print "</select>";
								   }
						} // end if (strtoupper($EnableEntityContentsJournaling)=="YES") 

						if ($e!="_new_" && CheckEntityAccess($e) == "ok") {
							
							// PDF download icon
							print "<br><br>";
							if (strtoupper($GLOBALS['EnableEntityJournaling'])=="YES") {
								
							}
							print "<a class='bigsort' title='$lang[downloadpdf]'  href=\"javascript:popPDFwindow('sumpdf.php?pdf=$e')\"><img src='pdf.gif' style='border:0'></a>&nbsp;";
							//print "<a class='bigsort' title='$lang[downloadpdf]'  href=\"sumpdf.php?pdf=$e\" target='new'><img src='pdf.gif' style='border:0'></a>&nbsp;";
							
							// PDF print icon

							print "&nbsp;<a class='bigsort' style='cursor:pointer' title='Imprimir' href=\"javascript:popPDFprintwindow('sumpdf.php?pdf=$e&print=1')\"><img src='print.gif' style='border:0'></a>";
							

							

							if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES") { 

									$sql = "SELECT password FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
									$out = mcq($sql,$db);
									$row = mysql_fetch_array($out);
									
									$row['password'] = "enc_--" . $row['password'];

									$subdir = ereg_replace("edit.php","",$_SERVER['SCRIPT_NAME']);
									print "&nbsp;&nbsp;";

									if ($_SERVER['HTTPS']=="on") {
										$http = "https://";
									} else {
										$http = "http://";
									}

									//print "<STYLE>\nA {behavior: url(#default#AnchorClick);}\n</STYLE>";
									print "<a OnClick='javascript:ReEnableSessionAfterOpeningWebDAV();' style='behavior: url(#default#AnchorClick)' class='bigsort' title='Go to WebDAV directory of this entity' href='" . $http . $GLOBALS['USERNAME'] . ":" . $row['password'] . "@" . $auth_string . $_SERVER['SERVER_NAME'] . $subdir . "webdav_file.php/" . $GLOBALS['repository_nr'] . "/" . $e . "' target='new_webdav_$e' FOLDER='" . $http . $_SERVER['SERVER_NAME'] . $subdir . "webdav_file.php/" . $GLOBALS['repository_nr'] . "/" . $e . "/'><img src='webdav.gif' style='border:0'></a>";

									if ($GLOBALS['EnableEntityRelations'] == "Yes") {
//										print "&nbsp;<input type='text' size=4 name='parent' value='" . $ea['parent'] . "'>&nbsp;";
									}
			
									// OK, another nasty trick. Somehow opening the WebDAV folder kills the session
									// cookie stored on the client PC.
									//
									// To avoid this, the *current* page will refresh itself to itself, only this time
									// with the session= variable in the URL, after which the auth procedure automatically
									// re-sets the cookie.
									
									$url = $_SERVER['SCRIPT_NAME'];

									if (!stristr($url,"php?")) {
										$url = ereg_replace("php","php?a=1",$url);
									}

										?>
										<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
										<!--
											function ReEnableSessionAfterOpeningWebDAV() {
										
												document.location = '<? echo $url . "?session=" . $session . "&e=" . $e;?>';
												
											}
										//-->
										</SCRIPT>
										<?
								//}
							}

							// Invoice icon
							$list = GetExtraFields();
							foreach ($list AS $element) {
								if ($element['fieldtype'] == "invoice cost" || $element['fieldtype'] == "invoice cost including VAT") {
									$ok = 1;
								} 
							}
							if ((strtoupper($GLOBALS['EnableSingleEntityInvoicing'])=="YES") && !$plr && $ok) {
									print "&nbsp;<a title='Generate invoice' href=\"javascript:poplittlewindow('invoice.php?SingleEntity=" . $e . "')\"><img src='invoice.gif' style='border:0'></a>";
									$plr = true;
								
							}
							
							if (strtoupper($GLOBALS['EnableEntityReporting'])=="YES") {

								
							}
						}
						print "</td></tr>";

						print "</table>";
						print "</fieldset>";
						print "<br>";


	// +=======================================================================================
	//		end header
	// +=======================================================================================


	
						print "<table border='0' cellpadding='3' cellspacing='0' bgcolor='' width='90%'><tr><td align='left'><fieldset><legend>&nbsp;&nbsp;$e&nbsp;</legend><table><tr><td>";
						//print "<table><tr><td>" . ExtraFieldsBox($enetjes,$readonly_lock,"UP LEFT") . "</td><td>" . ExtraFieldsBox($enetjes,$readonly_lock,"UP RIGHT") . "</td></tr></table>";

						//print GetExtraFieldsBox($enetjes,$readonly_lock,"upper");

						print "<table width='90%'><tr><td width=1%>";



						if ($_REQUEST['nonavbar'] || $nonavbar || $NoMenu) {
						
							//print "<input class='txt' type=submit name=sb value='$lang[saveclose]' align='right' $roins>";
							print "<input type='hidden' name='NoMenu' value='1'>";
							print "<input type='hidden' name='close_on_next_load' value='1'>";

							if (strtoupper($GLOBALS['ShowEmailButton']) == "YES" && CheckEntityAccess($e)=="ok") {
								
								print "<fieldset><legend>&nbsp;&nbsp;E-mail&nbsp;</legend><table><tr><td><select name='EmailTo' $roins>";
								print "<option value=''>E-mail?</option>";
								print "<option value='owner'>E-mail " . strtolower($lang[owner]) . "</option>";
								print "<option value='assignee'>E-mail " . strtolower($lang[assignee]) . "</option>";
								print "<option value='ownerassignee'>E-mail " . strtolower($lang[owner]) . " + " . strtolower($lang[assignee]) . "</option>";
								print "<option value='customer'>E-mail " . strtolower($lang[customer]) . "</option>";
								print "<option value='all'>E-mail " . strtolower($lang[all]) . "</option>";
								print "</select><br><img src='arrow.gif'>&nbsp;<a href='javascript:popEmailNotifyScreen($e)' class='bigsort'>E-mail " . strtolower($lang['users']) . "</a></td></tr></table></fieldset></td>";

							}
							if (CheckEntityAccess($e)=="ok") {
								print "<td>&nbsp;<input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" name=sb value='$lang[saveclose] $showAlt' align='right' $roins>&nbsp;&nbsp;&nbsp;<input class='txt' type=button name=sb value='$lang[cancel]' OnClick=\"javascript:document.EditEntity.changed.value='0';window.close();\" align='right'></td></tr>";
							}
						} else {

							if (strtoupper($GLOBALS['ShowEmailButton']) == "YES" && CheckEntityAccess($e)=="ok") {
								
								print "<fieldset><legend>&nbsp;&nbsp;E-mail</legend><table><tr><td><select name='EmailTo'>";
								print "<option value=''>E-mail?</option>";
								print "<option value='owner'>E-mail " . strtolower($lang[owner]) . "</option>";
								print "<option value='assignee'>E-mail " . strtolower($lang[assignee]) . "</option>";
								print "<option value='ownerassignee'>E-mail " . strtolower($lang[owner]) . " + " . strtolower($lang[assignee]) . "</option>";
								print "<option value='customer'>E-mail " . strtolower($lang[customer]) . "</option>";
								print "<option value='all'>E-mail " . strtolower($lang[all]) . "</option>";
								print "</select><br><img src='arrow.gif'>&nbsp;<a href='javascript:popEmailNotifyScreen($e)' class='bigsort'>E-mail " . strtolower($lang['users']) . "</a></td></tr></table></fieldset>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

							}
							if (CheckEntityAccess($e)=="ok") {
								print "<td><input type='hidden' name='saveasnew' value=''><input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" name=sb value='$lang[save] $showAlt'  $roins>";
							}

							if (strtoupper($GLOBALS['ShowSaveAsNewEntityButton'])=="YES" && CheckEntityAccess($e)=="ok") {
								print "&nbsp;<input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';document.EditEntity.saveasnew.value='1';CheckForm();\" name=sb2 value='" . $GLOBALS['lang']['saveasnewentity'] . "'  $roins>";
							}
							print "</td></tr>";
						}
					
							print "</table>";

						

				}
				//print GetExtraFieldsBox($enetjes,$readonly_lock,"under upper save button");

	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=== Here comes the main form  =========================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================
	// +=======================================================================================

				print "<input cla	ss='txt' type=hidden name='eid' value='$e' $roins>";
				print "<tr><td><table><tr><td valign='top'>";
			
				
				if (strtoupper($GLOBALS['AutoCompleteCustomerNames'])<>"YES") {
					
					if ($_REQUEST['SetCustTo']) {
						print "<input type='hidden' name='CRMcustomer' value='" . $SetCustTo . "'>";
						print "\n<select name='CRMcustomerHUUI' DISABLED><option value='" . $SetCustTo . "'>" . GetCustomerName($SetCustTo) . "</option></select>";
					} else {
						if (CheckEntityAccess($e) == "readonly") {
//							qlog("START");
							print "<table cellspacing=4 cellpadding=2><tr><td nowrap'>" . GetCustomerName($ea['CRMcustomer']) . "</td></tr></table>";
//							qlog(GetCustomerName($ea['CRMcustomer']));
//							qlog("END");
						} else {
							$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes' ORDER BY custname";
							$result= mcq($sql,$db);
							
							if ($SetCustTo) $ea[CRMcustomer] = $SetCustTo; // pre-set customer from customers page

							while ($CRMloginusertje= mysql_fetch_array($result)) {
								$auth = CheckCustomerAccess($CRMloginusertje['id']);
								if ($auth == "ok" || $auth=="readonly") {

									if ($CRMloginusertje[id]==$ea[CRMcustomer]) {
											$a = "SELECTED";
											$Customer = $ea[CRMcustomer];
									} else {
											$a = "";
									}
								}
							}

						}
					}
					

				} else {  // Customer AutoComplete option
					if ($SetCustTo) $ea[CRMcustomer] = $SetCustTo; // pre-set customer from customers page

					?>
					<fieldset><legend>&nbsp;&nbsp;<? echo $lang[customer];?></legend><INPUT TYPE="text" NAME="CRMcustomername" SIZE='50' OnChange="javascript:AlertUser('IsChanged');" ONKEYUP='autoComplete(this,this.form.CRMcustomer,"Fullname",true)' value='<? 
					
					if ($ea[CRMcustomer]) {
						echo GetCustomerName($ea[CRMcustomer]);
					} else {
						echo "";
					}
					
					print "'>";

					print "<DIV style='display: none; cursor:pointer' id='plaatsen'>";
					?>
					<SELECT NAME="CRMcustomer" type="hidden"
					onChange="this.form.CRMcustomer.value=this.CRMcustomer[this.selectedIndex].nummer">
					<?
						$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes'";
						$custs= mcq($sql,$db);
						while ($record= @mysql_fetch_array($custs)) {
							$auth = CheckCustomerAccess($record['id']);
							if ($auth == "ok" || $auth=="readonly") {

								if ($record[id]==$ea[CRMcustomer]) {
									$a = "SELECTED";
									$Customer = $ea[CRMcustomer];
								} else {
										$a = "";
								}
								print "<option Fullname=\"" . GetCustomerName($record[id]) . "\" value=\"" . $record[id] ."\" nummer=\"" . $record[id] ."\" $a>" . $record[id] . "</option>\n";
							}
						}


					print "</SELECT>";
					print "</DIV>";
					print "</fieldset>";

				}

				print "</td><td valign='top'>";

				print "\n<fieldset><legend>&nbsp;&nbsp;$lang[priority]&nbsp;</legend>";
				if (CheckEntityAccess($e) == "readonly") {
					print "<table cellspacing=4 cellpadding=2><tr><td nowrap bgcolor='" . GetPriorityColor($ea['priority']) . "'>" . $ea['priority'] . "</td></tr></table>";
				} else {
					print "<select name='prioty' size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
					
					
					$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars ORDER BY varname";
					$result= mcq($sql,$db);
					while($options = mysql_fetch_array($result)) {
						if (strtoupper(($ea[priority]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
						print "<option style='background:" . $options[color] . "' value='$options[varname]' $a>$options[varname]</option>";
					}

					print "</select>";
				}
				print "</fieldset>";
				
				print "</td><td valign='top'><fieldset><legend>&nbsp;&nbsp;$lang[status]&nbsp;</legend>";

				
				if (CheckEntityAccess($e) == "readonly") {
					print "<table cellspacing=4 cellpadding=2><tr><td nowrap bgcolor='" . GetStatusColor($ea['status']) . "'>" . $ea['status'] . "</td></tr></table>";
				} else {

					print "<select name=status size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
					$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
					$result= mcq($sql,$db);
					while($options = mysql_fetch_array($result)) {
						if (strtoupper(($ea[status]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
						print "<option style='background:" . $options[color] . "' value='$options[varname]' $a>$options[varname]</option>";
					}

					print "</select>";
				}
				print "</fieldset></td><td nowrap valign='top'>";			
				if (CheckEntityAccess($e) == "readonly") {
					$roins2 = "DISABLED";
				}

				print "<fieldset><legend>&nbsp;&nbsp;$lang[owner]&nbsp;</legend>";

				
				if (CheckEntityAccess($e) == "readonly") {
					print "<table cellspacing=4 cellpadding=2><tr><td nowrap>" . GetUserName($ea['owner']) . "</td></tr></table>";
				} else {
					print "<select name='ownerNEW' size='1' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
					
					if ($e=="_new_") {
						$ea[owner] = $GLOBALS['USERID'];
					}

					
					$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' AND active<>'no' ORDER BY FULLNAME";
					$result= mcq($sql,$db);


					while ($CRMloginusertje= mysql_fetch_array($result)) {
							if ($CRMloginusertje[id]==$ea[owner]) {
											$a = "SELECTED";
											$ok = 1;
							} else {
											$a = "";
							}
						if (!trim($CRMloginusertje[FULLNAME])== "") {
							print "<option value='$CRMloginusertje[id]' size='1' $a>$CRMloginusertje[FULLNAME]</option>";
						} else {
							print "<option value='$CRMloginusertje[id]' size='1' $a>$CRMloginusertje[name]</option>";
						}
					}
					if (!$ok && !$e=="_new_") {
							print "<option value='2147483647' SELECTED> - </option>";
					}
					unset($ok);
					print "</select><br>";
				}


				if ($GLOBALS['USERID']==$ea['owner'] || $e=="_new_") {
					if (EmailTriggerForOwnerSet($e)==true) {
						print "<input type='hidden' name='notify_owner_posted' value='1'><input style='border:0' type='checkbox' value='1' name='notify_owner' CHECKED > E-mail updates";
					} else {
						print "<input type='hidden' name='notify_owner_posted' value='1'><input style='border:0' type='checkbox' name='notify_owner' value='1' checked> E-mail updates";
					}
				}
				print "</fieldset></td><td valign='top'>";
				print "";

				if (CheckEntityAccess($e) == "readonly") {
					print "";
				} else {
					
					$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' AND active<>'no' ORDER BY FULLNAME";
					$result= mcq($sql,$db);



					while ($CRMloginusertje= mysql_fetch_array($result)) {
							if ($e=="_new_") {
								$ea[assignee] = $GLOBALS['USERID'];
							}

							if ($CRMloginusertje[id]==$ea[assignee]) {
											$a = "SELECTED";
											$ok = 1;
							} else {
											$a = "";
							}
						if (!trim($CRMloginusertje[FULLNAME])== "") {
							
						} 
					}
					
					
				}
				if ($GLOBALS['USERID']==$ea['assignee'] || $e=="_new_") {
					if (CheckEntityAccess($e) == "ok") {
						if (EmailTriggerForAssigneeSet($e)==true) {
						} else {
						}
					}
				}

				


				// Print customer sub information in a DIV

				if (GetClearanceLevel($GLOBALS[USERID])=="full-access-own-entities") {
				//	$roins2 = "";
				}
				if ($e<>"_new_" && CheckEntityAccess($e)=="ok") {

					// Print [customer] sub-info in DIV

	//				print "Info on Cust#$ea[$GLOBALS[TBL_PREFIX]customer]";	
					$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$ea[CRMcustomer]'";
					$result= mcq($sql,$db);
					$cust= mysql_fetch_array($result);
					print "<table width=100%><tr><td valign='top' nowrap>";
					print "<div style='display:block' id='open$cust[id]'><a style='cursor:pointer' class='bigsort' OnClick=\"javascript:showLayer('rest$cust[id]');hideLayer('open$cust[id]');showLayer('close$cust[id]');\" title='Expand'></div>";

					
					print "<div style='display:none' id='close$cust[id]'><a style='cursor:pointer' class='bigsort' OnClick=\"javascript:hideLayer('rest$cust[id]');showLayer('open$cust[id]');hideLayer('close$cust[id]')\" title='Collapse'>&nbsp;&nbsp;<img src='arrow.gif'> menos</a></div>";
					print "</td><td valign=top>";

					print "<div style='display: none' id='rest$cust[id]'>";
					print "<br><fieldset><legend>&nbsp;&nbsp;$lang[customer]</legend><table cellspacing='0' border='1' bordercolor='#F0F0F0' cellpadding='4' width='100%'>";

					if ((strtoupper($GLOBALS['HideCustomerTab'])<>'YES') || (is_administrator())) {
						print "<tr>";
						print "<td colspan=3><table width='100%' border=0><tr><td>&nbsp;<img src='arrow.gif'>&nbsp;<a $roins class='bigsort' href='javascript:popcustomereditscreen($ea[CRMcustomer]);'>$lang[edit] " . strtolower($lang['customer']) . " " . $cust['custname'] . " (" . $ea['CRMcustomer'] . ")</a>";
						
						$stashid = PushStashValue("SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id=" . $cust['id']);

						print "<a href=\"javascript:popPDFwindow('customers.php?pdf=1&stashid=" . $stashid . "')\" class='bigsort'><img src='pdf.gif' style='border:0' title='Mostrar PDF'></a>";
						print "&nbsp;<a class='bigsort' style='cursor:pointer' title='Imprimir' href=\"javascript:popPDFprintwindow('customers.php?pdf=1&stashid=" . $stashid . "&print=1')\"><img src='print.gif' style='border:0'></a>";
						print "</td></tr></table></td></tr>";
					}
					print "<tr><td>$lang[customer]</td><td>$cust[custname]</td></tr>";
					if ($cust[contact]) print "<tr><td>$lang[contact]</td><td>$cust[contact]</td></tr>";
					if ($cust[contact_title]) print "<tr><td>$lang[contacttitle]</td><td>$cust[contact_title]</td></tr>";
					if ($cust[contact_phone]) print "<tr><td>$lang[contactphone]</td><td>$cust[contact_phone]</td></tr>";
					if ($cust[contact_email]) print "<tr><td>$lang[contactemail]</td><td><a href='javascript:popEmailToCustomerScreenCust(" . $cust['id'] . ")' class='bigsort'>$cust[contact_email]</a></td></tr>";
					if ($cust[cust_address]) print "<tr><td>$lang[customeraddress]</td><td>" . ereg_replace("\n","<BR>",$cust[cust_address]) . "</td></tr>";
					if ($cust[cust_remarks]) print "<tr><td>$lang[custremarks]</td><td>" . ereg_replace("\n","<BR>",$cust[cust_remarks]) . "</td></tr>";


					if ($cust[cust_homepage]) {
						if (!stristr($cust[cust_homepage],"http://")) {
							$cust[cust_homepage] = "http://" . $cust[cust_homepage];
						}
						print "<tr><td>$lang[custhomepage]</td><td><a href='$cust[cust_homepage]' target='_new' class='bigsort'>$cust[cust_homepage]</a></td></tr>";
					}

					$list = GetExtraCustomerFields();

					foreach($list AS $field) {

						$sql = "SELECT id,value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$ea[CRMcustomer]' AND deleted<>'y' AND name='" . $field['id'] . "' AND type='cust' ORDER BY name";
						$result = mcq($sql,$db);
						$cust1= mysql_fetch_array($result);

						print "<tr><td>" . $field['name'] . "</td>";
						if ($field['fieldtype'] == "text area") {
							$cust1[value] = ereg_replace("\n","<BR>",$cust1[value]);
						}
						if ($field['fieldtype'] == "mail") {
							print "<td><a href='javascript:popEmailToEFScreen(" . $cust1['id'] . ")' class='bigsort'>" .$cust1[value] . "</a>&nbsp;</td></tr>";
						} elseif ($field['fieldtype'] == "hyperlink"){
							print "<td>";
							if (strlen($cust1[value])>4) {
								if (!strstr("http://",$cust1[value])) {
									$cust1[value] = "http://" . $cust1[value];
								}
								print $cust1[value] . "&nbsp;<a href='" . $cust1[value] . "' target='new'><img src='fullscreen_maximize.gif' style='border:0' height=16 width='16'></a>";
							}
							print "</td></tr>";
						} elseif ($field['fieldtype'] == "date") {
							print "<td>" . Transformdate($cust1[value]) . "&nbsp;</td></tr>";
						} elseif (strstr($field['fieldtype'],"User-list")) {
							print "<td>" . GetUserName($cust1[value]) . "&nbsp;</td></tr>";
						} elseif ($field['fieldtype'] == "List of values") {
							print "<td>" . FunkifyLOV($cust1['value']) . "&nbsp;</td></tr>\n";
						} else {
							print "<td>" . $cust1[value] . "&nbsp;</td></tr>";
						}
					}
				
					
				
					
					print "\n<tr><td colspan=4>";
					print "<div style='display:block' id='open$cust[custname]'><a style='cursor:pointer' class='bigsort' OnClick=\"javascript:showLayer('rest$cust[custname]');hideLayer('open$cust[custname]');showLayer('close$cust[custname]');\" title='Expand'>&nbsp;&nbsp;<img src='arrow.gif'> mais</a></div>";

					
					print "<div style='display:none' id='close$cust[custname]'><a style='cursor:pointer' class='bigsort' OnClick=\"javascript:hideLayer('rest$cust[custname]');showLayer('open$cust[custname]');hideLayer('close$cust[custname]')\" title='Collapse'>&nbsp;&nbsp;<img src='arrow.gif'> menos</a></div> ";
					print "<div style='display: none' id='rest$cust[custname]'>";
					print "<br><table>";
					

					$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='" . $cust['id'] . "' AND type='cust' ORDER BY filename,creation_date";
					$result= mcq($sql,$db);
					
					
					
					$toprint .= "<tr><td>$lang[filename]</td>";

					$toprint.= "<td>$lang[filesize]</td><td>$lang[creationdate]</td><td>$lang[owner]</td></tr>";
					print "<form name='AddFileToCust' method='POST' ENCTYPE='multipart/form-data' id='dashed'>";
					while ($files= mysql_fetch_array($result)) {
						$ownert = GetUserNameByName($files['username']);
						unset($ins_rec1);				

						
						
						unset($filename);


						if (stristr("@@@:",$ownert[FULLNAME])) {
							$ownert = "&nbsp;&nbsp;&nbsp;n/a";
						}

						$toprint .= "<tr><td>";
						
				
						$toprint .= "\n<img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a> $ins_rec1";
					
						
						$toprint .="</td>";
				

								
							
						$toprint .= "<td>";
						$toprint .= ceil(($files[filesize]/1024)). "K";
						$toprint .= "</td><td>$files[dt]</td><td>$ownert</td></tr>";
						$ftel++;
					}
					if ($ftel) { 
						print $toprint . "</td></tr>"; 
					}
					print "</table></div></td></tr>";
					print "</table>";
					print "</fieldset>";

					
					print "</div><br>";

					print "</td></tr></table>";
				} elseif (GetClearanceLevel($USERID)=="rw") {
					
					print "\n&nbsp;<img src='arrow.gif'>&nbsp;<a $roins class='bigsort' href='javascript:popcustomereditscreen(document.EditEntity.CRMcustomer.value);'>$lang[edit] " . strtolower($lang[customer]) . " $cust[custname]</a>";
				}

				print "</table><table><tr><td><fieldset><legend>&nbsp;&nbsp;$lang[category]&nbsp;</legend>";
				
				if (CheckEntityAccess($e)<>"ok") {
					$roins = "DISABLED";
				}
				if (strtoupper($GLOBALS['ForceCategoryPulldown'])=="YES") {
					if (CheckEntityAccess($e)=="ok") {
						print "<select name='cat' class='text' $roins width=50 OnChange=\"javascript:AlertUser('IsChanged');\"><option></option>";
					} else {
						print "<select name='cat' class='text' DISABLED width=50 OnChange=\"javascript:AlertUser('IsChanged');\"><option></option>";
					}
					
					$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='Category pulldown list'";
					$result = mcq($sql,$db);
					$list = mysql_fetch_array($result);
					$list = $list[value];
					$list = @explode(",",$list);	

					if (sizeof($list)>0 && $list[0]<>"") {

						for ($t=0;$t<sizeof($list);$t++) {
							if ($ea[category]==$list[$t]) {
								$roins = "SELECTED";
							} else {
								unset($roins);
							}
							print "<option $roins value='$list[$t]'>$list[$t]</option>";
						}
										
					}		
					print "</select>";
				} elseif (strtoupper($GLOBALS['AutoCompleteCategory'])=="YES") {

					if (CheckEntityAccess($e)=="ok") {
						?>
						<input TYPE="text" NAME="cat" SIZE='70' <? echo $roins;?> OnChange="javascript:AlertUser('IsChanged');" ONKEYUP='autoComplete(this,this.form.cats,"value",false)' value='<? echo $ea['category'];?>'>
						<?
					} else {
						?>
						<input TYPE="text" NAME="cat" SIZE='70' DISABLED OnChange="javascript:AlertUser('IsChanged');" ONKEYUP='autoComplete(this,this.form.cats,"value",false)' value='<? echo $ea['category'];?>'>
						<?
					}
					print "<DIV style='display: none; cursor:pointer' id='niks'>";
					?>
					<select NAME="cats" onChange="this.form.cat.value=document.EditEntity.cats[this.selectedIndex].value">
					<?
						$sql = "SELECT DISTINCT(category),eid FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' ORDER BY category";
					// WHERE deleted<>'y'
						$custs= mcq($sql,$db);
						while ($record= @mysql_fetch_array($custs)) {
							if (trim($record['category']) <> "") {
								$x = CheckEntityAccess($record['eid']);
								if ($x == "readonly" || $x == "ok") {
									print "<option value='" . $record['category'] . "'></option>\n";
								}
							}
						}


					print "</SELECT>";
					print "</DIV>";
				} else {
					print "<input class='txt' type='text' name='cat' size=50 value='$ea[category]' $roins OnKeyUp=\"javascript:AlertUser('IsChanged');\">";
				}	
				if ($_GET['SetDateTo']) {
					$ea['duedate'] = $_GET['SetDateTo'];
				}
				print "&nbsp;</fieldset>\n</td><td><fieldset><legend>&nbsp;&nbsp;$lang[duedate]&nbsp;</legend><input type='hidden' size='13' name='duedate' value='" . $ea[duedate] ."' OnChange=\"javascript:AlertUser('IsChanged');AdjustDateToUSAFormat(document.EditEntity.duedate.value);\">";
				
				print "<input type='text' size='13' name='displayDate' OnClick=\"javascript:popcalendar();\" OnKeyUp=\"javascript:popcalendar();\" value='' $roins>&nbsp;";

				//if ($ea['duetime'] == "0000") { $sel ="SELECTED" } else { unset($sel); }
				
				if ($_GET['SetTimeTo']) {
					$ea['duetime'] = $_GET['SetTimeTo'];
				}
				if (CheckEntityAccess($e)<>"ok") {
					$roins = "DISABLED";
				}
				print "<select name='duetime' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
				for ($i=$GLOBALS['CAL_MINHOUR'];$i<$GLOBALS['CAL_MAXHOUR']+1;$i+=.5) {
					if ($i<10) { 
						$val = "0";
						$txt = "0";
					}
					if ($ch) {
						$val .= floor($i) . "30";
						$txt .= floor($i) . ":30h";
						unset($ch);
					} else {
						$val .= floor($i) . "00";
						$txt .= floor($i) . ":00h";
						$ch=1;
					}
					if ($ea['duetime'] == $val) {
						$sel = "SELECTED";
					} else {
						unset($sel);
					}
					print "<option value='". $val . "' $sel>" . $txt . "</option>";
					unset($val);
					unset($txt);
				}
				print "</select>";
			

			


				?>
					<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
					<!--
					AdjustDateToUSAFormat(document.EditEntity.duedate.value);
					//-->
					</SCRIPT>
				<?
				if ($e<>"_new_" && CheckEntityAccess($e)=="ok") {
					print "&nbsp;&nbsp;<img src='arrow.gif'>&nbsp;<a class='bigsort' title='$lang[alarmdatev]' href='javascript:popalarm($e)' $roins>&nbsp;$lang[alarmdate]</a>&nbsp";			    
				}
				print "</fieldset>\n</td></tr></table>";

			//	if ($GLOBALS['EXTRAFIELDLOCATION']=="A") {
					print GetExtraFieldsBox($e,CheckEntityAccess($e),"middle box");
//					print ExtraFieldsBox($enetjes,$readonly_lock,"A");
			//	}
				if ($GLOBALS['DisableCommentField'] <> "Yes") {
					print "<!-- Upcoming images shamelessly stolen from Alex King -->\n";
					print "<a OnClick='InsertDateTime();' class='bigsort' style='cursor:pointer' title='Inserir data, a hora e o seu nome'><img src='timedate.gif'></a>";
					print "<img src='decrease.gif' height='16' width='16' onclick='decreaseNotesHeight(document.EditEntity.content, 50);' style='cursor:pointer' title='Diminuir Formul�rio'>";
					print "<img src='increase.gif' height='16' width='16' onclick='increaseNotesHeight(document.EditEntity.content, 50);' style='cursor:pointer' title='Aumentar Formul�rio'><br>";
					print "<input type='hidden' id='notes_height' name='notes_height' value='250'>";
					print "<input type='hidden' id='did_time' name='did_time' value='not yet'>";
					if (strtoupper($GLOBALS['AutoInsertDateTime'])=="YES") {
						$roins44 = "OnKeyUp='InsertDateTimeOnce();'";
					}

					if (CheckEntityAccess($e)=="ok") {
						print "<TEXTAREA $roins44 $ro_lock style='height: 250' rows=13 cols=118 name='content' wrap='virtual' class='txt' OnKeyUp=\"javascript:AlertUser('IsChanged');\">$ea[content]</TEXTAREA><br>";
					} else {
						print "<TEXTAREA $roins44 $ro_lock READONLY style='height: 250' rows=13 cols=118 name='content' wrap='virtual' class='txt' OnKeyUp=\"javascript:AlertUser('IsChanged');\">$ea[content]</TEXTAREA><br>";
					}
					if (GetClearanceLevel($GLOBALS['USERID'])=="ro+" || ($limited == true)) {
						print "<table width='75%' class='crm'><tr><td>&nbsp;&nbsp;</td><td>Add your comments here:<br>";
						print "</form><form name='formpje' method='post' ENCTYPE='multipart/form-data'><TEXTAREA rows=5 cols=117 name='addcontent' wrap='virtual' class='txt'></TEXTAREA><br>";
						print "<input type='hidden' name='action' value='edit'>";
						print "<input type='hidden' name='e' value='" . $e . "'>";
						print "$lang[attachfile]&nbsp;<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file' >&nbsp;&nbsp;&nbsp;&nbsp;";
						print "&nbsp;&nbsp;&nbsp;<input type='submit' name='bla' value='$lang[save]'></form><form></td></tr></table>";
					}
				}
				
				$arr = split(",",$GLOBALS['STANDARD_TEXT']);
		
				if ((sizeof($arr)>0) && (sizeof($arr)<4)) {
					foreach ($arr AS $row) {
						if (trim($row)<>"") {
							print "<img src='arrow.gif'>&nbsp;<a style='cursor:pointer' OnClick=\"javascript:InsertSTDtext('" . base64_decode($row)  . "');\" class='bigsort'>" . htmlentities2(stripslashes(base64_decode($row))) . "</a><br>";
						}
					}
				} elseif (sizeof($arr)>3) {
					
					print "<select name='bogus' OnChange=\"javascript:InsertSTDtext(document.EditEntity.bogus.value)\"><option>-</option>";
					foreach ($arr AS $row) {
						print "<option value='" . htmlentities2(stripslashes(base64_decode($row)))  . "'>" . htmlentities2(stripslashes(base64_decode($row))) . "</option>";
					}
					print "</select><br>";
				}

		//		with the help of kaveh@arkasoft.com - select for history
				
				print "<table><tr><td><br><fieldset><table>";
				
					if ($e<>"_new_") {
						if ($ea[deleted]=='y') {
							print "<tr><td><input type='hidden' name='deleted_posted' value='1'><input type='checkbox' class='radio' name=deleted value='y' CHECKED $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[isdeleted]&nbsp;&nbsp;&nbsp;&nbsp;";
						} else {
							print "<tr><td><input type='hidden' name='deleted_posted' value='1'><input type='checkbox' class='radio' name=deleted value='y' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[isdeleted]&nbsp;&nbsp;&nbsp;&nbsp;";
						}
					}
				if ($GLOBALS['UseWaitingAndDoesntBelongHere'] <> "No") {
					if ($ea[waiting]=='y') {
							print "<tr><td><input type='hidden' name='waiting_posted' value='1'><input type='checkbox' class='radio' name=waiting value='y' CHECKED $roins OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[iswaiting]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
					} else {
							print "<tr><td><input type='hidden' name='waiting_posted' value='1'><input type='checkbox' class='radio' name=waiting value='y' $roins OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[iswaiting]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
					}
					if ($ea[obsolete]=='y') {
							print "<tr><td><input type='hidden' name='obsolete_posted' value='1'><input type='checkbox' class='radio' name=obsolete value='y' CHECKED $roins OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[doesntbelonghere]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
					} else {
							print "<tr><td><input type='hidden' name='obsolete_posted' value='1'><input type='checkbox' class='radio' name=obsolete value='y' $roins OnChange=\"javascript:AlertUser('IsChanged');\"> $lang[doesntbelonghere]&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
					}
				}

	// =========================================>>
					if ($ea[readonly]=='y') {
							
								print "<tr><td><input type='hidden' name='readonly_posted' value='1'><input type='checkbox' class='radio' name=readonly value='y' CHECKED $roins OnClick='javascript:document.EditEntity.readonly.style.background=\"#FFFFFF\"' OnChange=\"javascript:AlertUser('IsChanged');\"> Apenas leitura&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='javascript:pophelp(10)' class='bigsort' cursor='click' style='cursor: help'></a></td></tr>";
								?>
								<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
								  <!--
										  document.EditEntity.readonly.style.background='#FF0000';
								  //-->
								  </SCRIPT>
								<?
							
					} else {

							print "\n<tr><td><input type='hidden' name='readonly_posted' value='1'><input type='checkbox' class='radio' name='readonly' value='y' $roins OnClick='javascript:document.EditEntity.readonly.style.background=\"#FF0000\"' OnChange=\"javascript:AlertUser('IsChanged');\"> Apenas leitura&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='javascript:pophelp(10)' class='bigsort' cursor='click' style='cursor: help'></a></td></tr>";
					}
					if ($ea['private']=='y') {
							
								print "\n<tr><td><input type='hidden' name='private_posted' value='1'><input type='checkbox' class='radio' name='private' value='y' CHECKED $roins OnClick='javascript:document.EditEntity.private.style.background=\"#FFFFFF\"' OnChange=\"javascript:AlertUser('IsChanged');\"> Privado&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='javascript:pophelp(10)' class='bigsort' cursor='click' style='cursor: help'></a></td></tr>";
								?>
								<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
								  <!--
										  document.EditEntity.private.style.background='#FF0000';
								  //-->
								  </SCRIPT>
								<?
							
					} else {

							print "<tr><td><input type='hidden' name='private_posted' value='1'><input type='checkbox' class='radio' name='private' value='y' $roins OnClick='javascript:document.EditEntity.private.style.background=\"#FF0000\"' OnChange=\"javascript:AlertUser('IsChanged');\"> Privado</td></tr>";
					}
				print "</table></fieldset></td></tr></table>\n\n";
				print GetExtraFieldsBox($e,CheckEntityAccess($e),"under main box");

			
				if (($e<>"_new_") || ($ea['owner'] == "2147483647" && $ea['assignee'] == "2147483647")) {
					$toprint = "<table>";
					
//					$arr = GetFileListPrintableArray($e);
//					$header = array("fileid","filename","filesize","filetype","creation_date","username");
//					print_r($arr);
//					print "<table width=100%><tr><td>" . AW_array("obj", $arr, $header) . "<br><br><br><br><br><br></td></tr></table>";


					$toprint .= "<tr><td><fieldset><legend>&nbsp;&nbsp;$lang[listofatt]&nbsp;</legend><table border=0>";
					

					$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$curid' AND type='entity' ORDER BY filename,creation_date";
					$result= mcq($sql,$db);
					
					

					$toprint .= "<tr><td>$lang[filename]</td>";

					if (strtoupper($GLOBALS['ShowPDWASLink'])=="YES") {  
						$toprint .= "<td>PDWAS</td>";
					}

					if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES" && CheckEntityAccess($e)=="ok") {  
						$toprint .= "<td>WebDAV</td>";
					}
					
					$toprint.= "<td>$lang[filesize]</td><td>$lang[creationdate]</td><td>$lang[owner]</td><td>$lang[deletefile]</td></tr>";
					while ($files= mysql_fetch_array($result)) {
						$ownert = GetUserNameByName($files['username']);
						print "\n";
						unset($ins_rec1);				
						$fdispl = true;

						if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES"  && CheckEntityAccess($e)=="ok") { 

							unset($filenamex);
							$ftr = split("\.",$row['filename']);
							$top = sizeof($ftr) - 1;
							for ($x=0;$x<$top;$x++) {
								$filenamex .= $ftr[$x] . ".";
							}

							$sql="SELECT koppelid,checked,checked_out_by,fileid,filename FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $files['fileid'] . "'";
							mcq($sql,$db);
							$output = mcq($sql,$db);
							$row = mysql_fetch_array($output);
							
							if ($row['checked']=="out") { // the file is already checked out
								
									$checked_out = true;

									// Check if it indeed exists in WebDAV
									
									$filename = "";

									$eid = $row['koppelid'];
				
									$target_dir = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $eid;
								
									$ftr = split("\.",$row['filename']);
									$top = sizeof($ftr) - 1;
									for ($x=0;$x<$top;$x++) {
										$filename .= $ftr[$x] . ".";
									}

									$filename .= "CRMID_" . $row['fileid'] . "." . $ftr[$top];
									$target_file = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $eid . "/" . $filename;
									$webdav_dir = "/" . $GLOBALS['repository_nr'] . "/" . $eid . "/" . $filename;
									
									if (file_exists($target_file)) {
										$dis_link = true;
										$ins_rec = $row['checked_out_by'];

										$query = "SELECT owner, token, expires, exclusivelock FROM $GLOBALS[TBL_PREFIX]webdav_locks WHERE path = '" . addslashes($webdav_dir) . "'";
										//print $query;
										$res = mcq($query,$db);

										if($res) {
											$row = mysql_fetch_array($res);
											mysql_free_result($res);

											if($row) {
												$ins_locked = "<img src='lock.png' title='File is locked for editing'>";	
												$token = $row['token'];
											} else {
												$ins_locked = "";
											}
										}



									} else {
										
										// WTF! The file is checked out, but it doesn't exist in WebDAV.
										// We need to recover it.

										$ins_rec1 = "<font color='#FF0000'>(recovered)</font>";
										$sql = "UPDATE $GLOBALS[TBL_PREFIX]binfiles SET checked='in' WHERE fileid='" . $files['fileid'] . "'";
										mcq($sql,$db);
										journal($eid,"Recovered file #" . $files['fileid'] . " from database. The file should have been in WebDAV but it was not.");
										$checked_out = false;
									}
							} else {
									unset($dis_link);		
									$checked_out = false;
							}
						}
						
						unset($filename);


						if (stristr("@@@:",$ownert[FULLNAME])) {
							$ownert = "&nbsp;&nbsp;&nbsp;n/a";
						}

						$toprint .= "<tr><td>";
						
						if ($dis_link) {
							$toprint .= "<img src='arrow.gif'>&nbsp;$files[filename]";

							if ($ins_rec==$GLOBALS[USERID]) {
								$who = "you";
							} else {
								$who = GetUserName($ins_rec);
							}
							
							if ($unlockforce) { 
								$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]webdav_locks WHERE token='" . $unlockforce . "'";
								mcq($sql,$db);
								$ins_locked = "";
							}

							$toprint .= "<br><i>Checked out by " . $who . "</i> $ins_locked $ins_rec1";
						} else {
							$toprint .= "<img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a> $ins_rec1";
						}
						
						$toprint .="</td>";
						if (strtoupper($GLOBALS['ShowPDWASLink'])=="YES") { 
								$toprint .= "<td><img src='arrow.gif'>&nbsp;<a href='csv.php?fileid=$files[fileid]&tw=1' class='bigsort'>PDWAS</a></td>";
						}
						if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES"  && CheckEntityAccess($e)=="ok") { 
							if ($checked_out==true) { // the file is already checked out
								$toprint .= "<td><img src='arrow.gif'>&nbsp;<a href='webdav.php?fileid=$files[fileid]&checkin=true' class='bigsort'>Check in</a>";
								if ($ins_locked<>"" && $who=="you") {
									$toprint .= "<br><img src='arrow.gif'>&nbsp;<a href='edit.php?e=" . $eid . "&unlockforce=" . $token . "' class='bigsort'>Force unlock</a>";
								}
								$toprint .= "</td>";
							} else {
								$toprint .= "<td><img src='arrow.gif'>&nbsp;<a href='webdav.php?fileid=$files[fileid]' class='bigsort'>Check out</a></td>";
							}

						}
						$toprint .= "<td>";
						$toprint .= ceil(($files[filesize]/1024)). "K";
						$toprint .= "</td><td>$files[dt]</td><td>$ownert</td><td><input type='checkbox' class='radio' name=deletefile[] value='$files[fileid]' $roins></td></tr>";
						$ftel++;
					}
					if ($ftel) { 
						 $toprint .= "</fieldset></td></tr></table>\n"; 
						}
				
				}	
				
				if ($fdispl) {
					print $toprint;
				} else {
					print "<table>";
				}

				if (CheckEntityAccess($e) == "ok") {
					print "<tr><td colspan=6><fieldset><legend>&nbsp;&nbsp;$lang[attachfile]&nbsp;</legend><INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file' $roins>&nbsp;&nbsp;&nbsp;&nbsp;</fieldset></tr></td></tr>";
				}

				print "<br>\n";

				unset($tmp);
				$e = trim($e);

				if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES" && $e<>"_new_" && CheckEntityAccess($e) == "ok") { 

					$tmp = "<tr><td><fieldset><legend>&nbsp;&nbsp;$lang[attachfile] - WebDAV&nbsp; <img src='arrow.gif'> <a href='webdav.php?AttAll=1&eid=" . $e . "'>Attach all</a>&nbsp;</legend><table border=0>";
					
					$dir = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $e . "/";

					if (is_dir($dir)) {
					   if ($dh = opendir($dir)) {
						   while (($file = readdir($dh)) !== false) {
							   
								if (!strstr($file,"CRMID") && $file<>"." && $file <> "..") {
									   $tmp .= "<tr><td><img src='arrow.gif'>&nbsp;<a href='webdav.php?filename_to_ins=" . base64_encode($file) . "&checkin=true&eidw=" . $e . "' class='bigsort'>$file</a></td></tr>";
									   $filecounter++;
									   //print "i ++";
								}
						   }
						   closedir($dh);
					   }
					}

					if ($i==0) {
							$tmp .= "<tr><td>No new files</td></tr>";
					}
					$tmp .= "</table></fieldset></td></tr>";

				}
				if ($filecounter>0) {
					print $tmp;

				}

				print "</table>";



				if ($nonavbar) { 
					print "<INPUT TYPE='hidden' name='close_on_next_load' value='1'>";
				}
				if ($fromlist && !$filter=="viewdel" && !$filter=="custinsert") { 
					print "<INPUT TYPE='hidden' name='fromlistnow' value='1'>";
					print "<INPUT TYPE='hidden' name='fromlisturl' value='" . $fromlist . "'>";
				}
				if (CheckEntityAccess($e) <> "ok") {
					$roins = "DISABLED";
				}
				if ($nonavbar || $_REQUEST['nonavbar']) {
					if ($e=="_new_") {
						if (CheckEntityAccess($e) == "ok") {
							print "<table width='90%'><tr><td><input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" name=sb value='$lang[saveclose] $showAlt' align='right' $roins>&nbsp;&nbsp;&nbsp;";
						}
					} else {
						if (CheckEntityAccess($e) == "ok") {
							print "<table width='90%'><tr><td><input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" name=sb value='$lang[saveclose] $showAlt' align='right' $roins>&nbsp;&nbsp;&nbsp;";
						}
					}
					if (CheckEntityAccess($e) == "ok") {
						print "<input class='txt' type='button' name=sb OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" value='$lang[cancel]' align='right' OnClick='javascript:window.close();'></td></tr></table>";
					}
				} else {
					if (CheckEntityAccess($e) == "ok") {
						print "<table width='90%'><tr><td><input class='txt' type='button' name=sb OnClick=\"javascript:document.EditEntity.changed.value='0';CheckForm();\" value='$lang[save] $showAlt ' $roins>";
					}
					print "</td></tr></table>";
				}
				print "</form>";
}

function NeedJP() {
	require_once("jp/jpgraph.php");
	require_once("jp/jpgraph_log.php");
	require_once("jp/jpgraph_line.php");
	require_once("jp/jpgraph_bar.php");
	require_once("jp/jpgraph_pie.php");
	require_once("jp/jpgraph_pie3d.php");
}

function UpdateExtraFieldValue($field, $eid, $value) {

	$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$eid' AND name='" . $field ."'";
	$result = mcq($sql,$db);
	$gh = mysql_fetch_array($result);
	$value2 = $gh[0];

	if ($value2 == "") { 
//		$value = "[blank]";
	} else {
		$value = $value2 . " " . $value;
	}

	if (mysql_affected_rows()>0) {
 
				$sql = "UPDATE $GLOBALS[TBL_PREFIX]customaddons SET value = '" . $value . "',usr='" . GetUserName($GLOBALS['USERID']) . "' WHERE eid='" . $eid . "' AND name='" . $field . "'";
				ProcessTriggers("EFID" . $field,$eid,$value);
				//$add_to_journal .= "\n" . CleanExtraFieldName($extrafield['name']) . " updated from [$value] to " . $$varname . "";

	} else {
				$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]customaddons(eid, name, value, usr, type) VALUES('" . $eid . "','" . $field . "','" . $value . "','" . GetUserName($GLOBALS['USERID']) . "'','entity')";
				ProcessTriggers("EFID" . $field,$eid,$value);
				//$add_to_journal .= "\n" . CleanExtraFieldName($extrafield['name']) . " updated from <nothing> to " . $$varname . "";
	}
	
	qlog("Extra field $field updated");
	// And finally, execute the statement.
	//print $sql . "<br><br>";
	mcq($sql,$db);
}
function CustomEditForm($editformID,$eid) {
	
	$e = $eid; // just to be sure..

	$GLOBALS['CURFUNC'] = "CustomEditForm::";
	qlog("Start parsing custom made edit form (entity $eid)");
	if ((GetClearanceLevel($GLOBALS['USERID']) == "full-access-own-entities") && $eid=="_new_") {
//		print "<img src='error.gif'> Access denied";
		if ($GLOBALS['HIDEADDTAB'] == "No") {
			qlog("This user has full-access-own-entities as CLLEVEL, but adding entities was specifically allowed. Access granted");
		} else {
			print "</td></tr></table>";
			qlog("This user has full-access-own-entities as CLLEVEL. He/she is therefore not allowed to add entities.");
			printAD("Your clearance level is not sufficient");
			EndHTML();
			exit;
		}
	} elseif (GetClearanceLevel($GLOBALS['USERID']) == "full-access-own-entities") {

		$sql = "SELECT assignee,owner FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$eid'";
		$result= mcq($sql,$db);
		$ea = mysql_fetch_array($result);
		$GLOBALS['CURFUNC'] = "CustomEditForm::";
		if (($ea['assignee']<>$GLOBALS['USERID'])) {
				$formaction = "index.php?logout=1";
				$GLOBALS['CURFUNC'] = "CustomEditForm::";
				qlog("Access to this entity denied - formaction to logout");
				$readonly = true;
		} else {
				$formaction = "edit.php";
				$GLOBALS['CURFUNC'] = "CustomEditForm::";
				qlog("Granting anyhow - this user is the assignee of this entity");
		}
	} elseif (GetClearanceLevel($GLOBALS['USERID']) == "ro" || GetClearanceLevel($GLOBALS['USERID']) == "ro+") {
		$formaction = "cust-insert.php";
	} else {
		$formaction = "edit.php";
		$readonly = false;
	}
	if (CheckLock($eid)) {
					$lockMSG = "<font color='#FF0000'>This entity is in use by " . GetUserName(Addlock($e)) . ", you cannot alter it at this time.</font>";
					$readonly = true;
					$GLOBALS['CURFUNC'] = "CustomEditForm::";
					qlog("ERROR: This entity is locked; write access is denied");
	}

	if ($GLOBALS['EnableEntityLocking'] == "Yes" && CheckEntityAccess($e)=="ok") {
		if ($e<>"_new_") {
			if (!$nolocking) { // the entity is already readonly
				if (AddLock($e) <> false) {
					$lockMSG = "<font color='#FF0000'>This entity is in use by " . GetUserName(Addlock($e)) . ", you cannot alter it at this time.</font>";
					$roins = "DISABLED";
					$formaction = "dl3b";
					$readonly_lock = true;
					$ro_lock = "READONLY";
					$field_value = 0;
					$GLOBALS['CURFUNC'] = "CustomEditForm::";
					qlog("ERROR: Couldn't lock entity!");
					$readonly = true;
				} else {
					$readonly_lock = false;
					$field_value = 1;
					$lockMSG = "";
				}
			}
		}
	} else {
		$readonly_lock = true;
		$GLOBALS['CURFUNC'] = "CustomEditForm::";
		qlog("ERROR: Entity locking is disabled and access is denied");		
	}
	
	if ($limited == true) {
		$formaction = "management.php";
		$roins = "DISABLED";
		$readonly_lock = true;
		$ro_lock = "READONLY";
		$field_value = 0;
		$GLOBALS['CURFUNC'] = "CustomEditForm::";
		qlog("ERROR: This user is limited - readonly to TRUE");
	}
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function AlertUser(whichLayer) {
			//document.bgColor = '#FFE6D1';
			if (document.getElementById) {
				// this is the way the standards work
				document.getElementById(whichLayer).style.display = "block";
			}
			else if (document.all) {
				// this is the way old msie versions work
				document.all[whichlayer].style.display = "block";
			}
			else if (document.layers) {
				// this is the way nn4 works
				document.layers[whichLayer].display = "block";
			}
			document.EditEntity.changed.value = '1';

		}
	//-->
	</SCRIPT>
	<?



	$tmp = "<form name='EditEntity' method='POST' action='" . $formaction . "' ENCTYPE='multipart/form-data'>";
	
	$tmp .= "<div id='IsChanged' style='display: none'>";
	$tmp .= " ";
	$tmp .= "</div><input type='hidden' name='changed' value='0'>";
	
	if ($eid == "_new_") {
		$tmp .= "<input type='hidden' name='formid' value='" . $editformID . "'>";
	}
	
	
	//$tmp .= $btp;
	if (CheckEntityAccess($eid) == "readonly" && $eid<>"_new_") {
		$readonly = true;
		$GLOBALS['CURFUNC'] = "CustomEditForm::";
		qlog("WARNING: Access to this entity is read-only ($eid)");
	}

	$tmp2 = ParseFormTemplate($editformID,$eid,$formaction,$readonly);
	$tmp2 = ParseTemplateCleanUp(ParseTemplateGeneric($tmp2));
	$tmp .= $tmp2;

	$tmp .= "</form>";
	$GLOBALS['CURFUNC'] = "CustomEditForm::";
	qlog("Returned parsed custom made edit form -> readonly is $readonly");
	return($tmp);
}
function CustomCustomerForm($formid,$cid,$c_add) {
	$GLOBALS['CURFUNC'] = "CustomCustomerForm::";
	qlog("Start parsing custom made customer form (customer $cid)");

	$formaction = "customers.php";
	$readonly = false;
	
	$tmp2 = ParseCustomerFormTemplate($formid,$cid,$formaction,$readonly,$c_add);
	$tmp2 = ParseTemplateCleanUp(ParseTemplateGeneric($tmp2));
	$tmp .= $tmp2;
	$GLOBALS['CURFUNC'] = "CustomCustomerForm::";
	qlog("Done parsing custom made customer form (customer $cid)");
	return($tmp2);
}
function db_GetRow($query) {
	if (!stristr("LIMIT 1", $query)) {
		$query .= " LIMIT 1";
	}
	$res = mcq($query,$db);
	return(@mysql_fetch_array($res));
}

function ParseCustomerFormTemplate($fileid,$cid=false,$formaction='index.php?logout=1',$readonly=true, $c_add="NO") {
	global $lang, $nonavbar;

	// GET TEMPLATE
	$template = GetFileContent($fileid);

	if (CheckCustomerAccess($cid) <> "ok" && CheckCustomerAccess($cid) <> "readonly") {
		$template =  "<img src='error.gif'> Access denied<BR><BR>";	
		qlog("Access was denied - this user has no rights to access this customer.");
		//$template .= returnAD("Access to customer denied.");
	} elseif (CheckCustomerAccess($cid) == "readonly") {
		$roins = "DISABLED";
		$readonly = "yes";
	} 
	

		// GET CUSTOMER DETAILS
		$custrow = db_GetRow("SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='" . $cid . "'");	

		// BUILD BOXES
		$savebutton = "<input type='button' OnClick='CheckForm();' $roins value='" . $lang['save'] . "'>";
		$cancelbutton = "<input type='button' $roins value='" . $lang['cancel'] . "' OnClick='window.close();'>";
		$printicon = "<a class='bigsort' style='cursor:pointer' title='Print on default printer' href=\"javascript:popPDFprintwindow('XXXXXXXXXXXXXXXXX')\"><img src='print.gif' style='border:0'></a>";
		$sid = PushStashValue("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "customer WHERE id='" . $cid . "'");
		$pdficon = "<a class='bigsort' title='$lang[downloadpdf]'  href=\"javascript:popPDFwindow('customers.php?pdf=1&stashid=" . $sid . "')\"><img src='pdf.gif' style='border:0'></a>";
		
		$activityicon = "";

		$journalicon = "<a class='bigsort' title='Journal' href='javascript:popcustomerjournal($cid);'><img src='journal.gif' style='border:0'></a>&nbsp;";

		$printicon = "<a class='bigsort' style='cursor:pointer' title='Print on default printer' href=\"javascript:popPDFprintwindow('customers.php?pdf=1&stashid=" . $sid . "&print=1')\"><img src='print.gif' style='border:0'></a>";

		$filebox = "<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file' $roins>";
		
		// FILE LIST
			$toprint .= "<table class='crm'><tr><td>$lang[filename]</td>";
			$toprint.= "<td>$lang[filesize]</td><td>$lang[creationdate]</td><td>$lang[owner]</td><td>$lang[deletefile]</td></tr>";

			$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM 	$GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$cid' AND koppelid<>'0' AND type='cust' ORDER BY filename,creation_date";

			$result= mcq($sql,$db);
			while ($files= mysql_fetch_array($result)) {
				$ownert = GetUserNameByName($files['username']);
				$toprint.= "\n";
				$fdispl = true;
				if (stristr("@@@:",$ownert[FULLNAME])) {
					$ownert = "&nbsp;&nbsp;&nbsp;n/a";
				}

				$toprint .= "<tr><td>";
				$toprint .= "<img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a> $ins_rec1";
				$toprint .="</td>";
				$toprint .= "<td>";
				$toprint .= ceil(($files[filesize]/1024)). "K";
				$toprint .= "</td><td>$files[dt]</td><td>$ownert</td><td><input type='checkbox' class='radio' name=deletefile[] value='$files[fileid]' $roins></td></tr>";
				$ftel++;
			}
					
			
			if ($fdispl) {
				$toprint .= "</td></tr></table>"; 
				$filelist = $toprint;
				unset($toprint);
			} else {
				$filelist = "n/a";
			}
		
		$customerbox = "<input type='text' name='custnamenew' value='" . $custrow['custname'] . "' $roins size='50'>";
		$contactbox  = "<input type='text' name='contactnew' value='" . $custrow['contact'] . "' $roins size='50'>";
		$contacttitlebox = "<input type='text' name='contact_titlenew' value='" . $custrow['contact_title'] . "' $roins size='50'>";
		$conactphonebox = "<input type='text' name='contact_phonenew' value='" . $custrow['contact_phone'] . "' $roins size='50'>";
		$contactemailbox = "<input type='text' name='contact_emailnew' value='" . $custrow['contact_email'] . "' $roins size='50'>";
		$customeraddressbox = "<textarea name='cust_addressnew' $roins rows=4 cols=30>" . $custrow['cust_address'] . "</textarea>";
		$remarksbox = "<textarea name='cust_remarksnew' $roins rows=4 cols=30>" . $custrow['cust_remarks'] . "</textarea>";
		$homepagebox = "<input type='text' name='cust_homepagenew' value='" . $custrow['cust_homepage'] . "' $roins size='50'>";
		
		$customerownerbox = "<select name='customer_ownernew'>";

		if ($GLOBALS['EnableMailMergeAndInvoicing']) {
			$reporticon = "&nbsp;";
		} else {
			$reporticon = "";
		}
				
		$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE active='yes' AND FULLNAME NOT LIKE '@@@%' ORDER BY name";
		$result= mcq($sql,$db);
		
		while ($CRMloginusertje= mysql_fetch_array($result)) {
			if ($CRMloginusertje[id]==$custrow['customer_owner']) {
					$a = "SELECTED";
					$owner = $cust['customer_owner'];
			} else {
					$a = "";
			}
			 $customerownerbox .= "<option value='" . $CRMloginusertje[id] . "' " . $a . " size='1'>" . $CRMloginusertje['FULLNAME'] . "</option>";
		}

		$customerownerbox .= "</select>";
		

		if ($custrow['readonly']=="yes") {
			$set = "CHECKED";
		} else {
			unset($set);
		}
		if ($custrow['active'] == "yes") $cyn = "CHECKED";
		$activebox = "<input type='checkbox' class='radio' name='activenew' value='yes'  $cyn>";
		if ($custrow['readonly'] == "yes") $set = "CHECKED";
		$readonlybox = "<input type='checkbox' name='readonlycust' " . $set . " value='yes'>";

		// REPLACEMENTS
		if ($nonavbar) {
				$template = str_replace('#CANCELBUTTON#',$cancelbutton,$template);
			} else {
				$template = str_replace('#CANCELBUTTON#',"",$template);
			}
		$template = str_replace('#PDFICON#',$pdficon,$template);
		$template = str_replace('#PRINTICON#',$printicon,$template);
		$template = str_replace('#JOURNALICON#',$journalicon,$template);
		$template = str_replace('#FILELIST#',$filelist,$template);
		$template = str_replace('#FILEBOX#',$filebox,$template);
		$template = str_replace('#SAVEBUTTON#',	$savebutton,$template);
		$template = str_replace('#CID#',$cid,$template);
		$template = str_replace('#CUSTOMER#',$customerbox,$template);
		$template = str_replace('#CUST_OWNER#',$customerownerbox,$template);
		$template = str_replace('#CUSTOMER_CONTACT#',$contactbox,$template);
		$template = str_replace('#CONTACT_TITLE#',$contacttitlebox,$template);
		$template = str_replace('#CONTACT_PHONE#',$conactphonebox,$template);
		$template = str_replace('#CONTACT_EMAIL#',$contactemailbox,$template);
		$template = str_replace('#CUSTOMER_ADDRESS#',$customeraddressbox,$template);
		$template = str_replace('#CUST_REMARKS#',$remarksbox,$template);
		$template = str_replace('#CUST_HOMEPAGE#',$homepagebox,$template);
		$template = str_replace('#READONLY#',$readonlybox,$template);
		$template = str_replace('#ACTIVE#',$activebox,$template);
		$template = str_replace('#ACTICON#',$activityicon,$template);
		$template = str_replace('#REPORTICON#',$reporticon,$template);
		

	
		$GLOBALS['eflist'] = GetExtraCustomerFields();

			$fields_array = array();		
			
			for ($x=0;$x<sizeof($GLOBALS['eflist']);$x++) {

				$field = $GLOBALS['eflist'][$x];
				
				$tmp = GetSingleExtraFieldFormBox($cid,$field['id'],$readonly,"customer");
				
				if (strstr($template,"#EFID" . $field['id'] . "#")) {

					array_push($fields_array, $field);
					

					$template = str_replace("#EFID" . $field['id'] . "#",$tmp,$template);
					unset($tmp);
				}
			}
		
		

		$template .= PrintExtraFieldForceJavascript("EditEntity",$type="customer",$fields_array,$ret=true);

		if ($c_add == "YES") {
			$ins = "<INPUT TYPE='hidden' NAME='addfilled' VALUE='1'>";
		} else {
			$ins = "<INPUT TYPE='hidden' NAME='editfilled' VALUE='" . $cid . "'>";
		}

		$template = "<table><tr><td><img src='arrow.gif'>&nbsp;<a href='customers.php?$epoch' class='bigsort'>$lang[customers]</a><BR><BR></td></tr></table>" . $template . "<table><tr><td><img src='arrow.gif'>&nbsp;<a href='customers.php?$epoch' class='bigsort'>$lang[customers]</a></td></tr></table>";

		$template = "<FORM NAME='EditEntity' METHOD='POST' ACTION='" . $formaction . "' ENCTYPE='multipart/form-data' id='dashed'>" . $ins . "<input type='hidden' name='e_button' value=''><INPUT TYPE='hidden' NAME='changed'><INPUT TYPE='hidden' NAME='det' VALUE='1'><INPUT TYPE='hidden' NAME='c_id' VALUE='" . $cid . "'>" . $template . "</FORM>";
		
		
		$template = ParseTemplateCustomer($template, $cid);
		$template = ParseTemplateCleanup($template);


	return($template);
}

function ParseFormTemplate($fileid,$eid=false,$formaction='index.php?logout=1',$readonly=true) {
	global $lang, $nonavbar;
	$e = $eid;
	$e = trim($e);
	$eid = $e;

	$template = GetFileContent($fileid);
	
	if (GetClearanceLevel($GLOBALS['USERID']) == "ro" || GetClearanceLevel($GLOBALS['USERID']) == "ro+") {
		$rw = db_GetRow("SELECT * FROM " . $GLOBALS['TBL_PREFIX'] . "loginusers WHERE id='" . $GLOBALS['USERID'] . "'");
		$rmp = explode(":",$rw['FULLNAME']);
		$cust_only = $rmp[1];
	}

	$GLOBALS['CURFUNC'] = "ParseFormTemplate::";
		// Next & previous arrows
	if ($_REQUEST['browsearray']) {
		$bra = unserialize(PopStashValue($_REQUEST['browsearray']));
		//print_r($bra);
		unset($btp);
		$btp .= "<font size=2><input type='hidden' name='browsearray' value='" . $_REQUEST['browsearray'] . "'>";	
		$bla = @array_search($eid, $bra);


		if ($bla>0) {
			$btp .= "<a href='edit.php?e=" . $bra[$bla-1] ."&browsearray=" . $_REQUEST['browsearray'] . "' title='Previous search result'><img src='larrow.gif' style='border: 0'></a>&nbsp;";
			$prt = true;
		}
		if ($bla<sizeof($bra)-1) {
			$btp .= "<a href='edit.php?e=" . $bra[$bla+1] ."&browsearray=" . $_REQUEST['browsearray'] . "' title='Next search result'><img src='rarrow.gif' style='border: 0'></a>";
			$prt = true;
		}
		if ($prt) {
			$btp .= "&nbsp;" . ($bla+1) . "/" . (sizeof($bra)) . "</font>";
		}
	}
	if ($readonly) {
		$roins = " DISABLED ";
	}

	if (1==0) {
			// nothin' :)
	} else {

		if ($eid<>"" && $eid<>"_new_") {
			$sql = "SELECT * FROM " . $GLOBALS[TBL_PREFIX] . "entity WHERE eid='" . $eid . "'";
			$result= mcq($sql,$db);
			$ea = mysql_fetch_array($result);
		}
		
		$ownerbox = "<select name='ownerNEW' size='1' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
		
		if ($e=="_new_") {
			$ea[owner] = $GLOBALS['USERID'];
		}
		
		
		$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' AND active<>'no' ORDER BY FULLNAME";
		$result= mcq($sql,$db);

		while ($CRMloginusertje= mysql_fetch_array($result)) {
				if ($CRMloginusertje[id]==$ea[owner]) {
								$a = "SELECTED";
								$ok = 1;
				} else {
								$a = "";
				}
			if (!trim($CRMloginusertje[FULLNAME])== "") {
				$ownerbox .= "<option value='$CRMloginusertje[id]' size='1' $a>$CRMloginusertje[FULLNAME]</option>";
			}
		}
		if (!$ok && !$e=="_new_") {
				$ownerbox .= "<option value='2147483647' SELECTED> - </option>";
		}
		unset($ok);
		$ownerbox .= "</select>";
//		$assigneebox = "<select name='assigneeNEW' size='1' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
		$assigneebox = "<select name='assigneeNEW' size='1' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
		
		$emailpoplink = "<img src='arrow.gif'> <a href='javascript:popEmailNotifyScreen(" . $eid . ")'> E-mail " . $lang['users'] . "</a>";
		
		if (strtoupper($GLOBALS['ShowEmailButton']) == "YES" && CheckEntityAccess($e)=="ok") {
										
			$emaildropdown = "<select name='EmailTo' $roins>";
			$emaildropdown .= "<option value=''>E-mail?</option>";
			$emaildropdown .=  "<option value='owner'>E-mail " . strtolower($lang[owner]) . "</option>";
			$emaildropdown .=  "<option value='assignee'>E-mail " . strtolower($lang[assignee]) . "</option>";
			$emaildropdown .=  "<option value='ownerassignee'>E-mail " . strtolower($lang[owner]) . " + " . strtolower($lang[assignee]) . "</option>";
			$emaildropdown .=  "<option value='customer'>E-mail " . strtolower($lang[customer]) . "</option>";
			$emaildropdown .=  "<option value='all'>E-mail " . strtolower($lang[all]) . "</option>";
			$emaildropdown .=  "</select>";

		}

		$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' AND active<>'no' ORDER BY FULLNAME";
		$result= mcq($sql,$db);



		while ($CRMloginusertje= mysql_fetch_array($result)) {
				if ($e=="_new_") {
					$ea['assignee'] = $GLOBALS['USERID'];
				}

				if ($CRMloginusertje[id]==$ea[assignee]) {
								$a = "SELECTED";
								$ok = 1;
				} else {
								$a = "";
				}
			if (!trim($CRMloginusertje[FULLNAME])== "") {
				$assigneebox .= "<option value='$CRMloginusertje[id]' size='1' $a>$CRMloginusertje[FULLNAME]</option>";
			}
		}
		if (!$ok && !$e=="_new_") {
				$assigneebox .= "<option value='2147483647' SELECTED> - </option>";
		}
		$assigneebox .= "</select>";		

		

		if (strtoupper($GLOBALS['AutoCompleteCategory'])=="YES") {
			$categorybox = "<input type='text' name='cat' value='" . $ea['category'] . "' $roins size='50' OnChange=\"javascript:AlertUser('IsChanged');\" ONKEYUP='autoComplete(this,document.EditEntity.cats,\"value\",false)'\">";
		} else {
			$categorybox = "<input type='text' name='cat' value='" . $ea['category'] . "' $roins size='50' OnChange=\"javascript:AlertUser('IsChanged');\">";
		}
		if (strtoupper($GLOBALS['ForceCategoryPulldown'])=="YES") {
			$categorybox = "<select name='cat' class='text' width=50 OnChange=\"AlertUser('IsChanged');\">";
			$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='Category pulldown list'";
			$result = mcq($sql,$db);
			$list = mysql_fetch_array($result);
			$list = $list[value];
			$list = @explode(",",$list);	

			if (sizeof($list)>0 && $list[0]<>"") {

				for ($t=0;$t<sizeof($list);$t++) {
					if ($ea[category]==$list[$t]) {
						$roins = "SELECTED";
					} else {
						unset($roins);
					}
					$categorybox .= "<option $roins value='$list[$t]'>$list[$t]</option>";
				}
								
			}		
			$categorybox .= "</select>";
		}
		if ($ea['private']=='y') {
							
					$privatebox = "\n<input type='hidden' name='private_posted' value='1'><input type='checkbox' class='radio' name='private' value='y' CHECKED $roins OnClick='javascript:document.EditEntity.private.style.background=\"#FFFFFF\"' style='background: #FF0000' OnChange=\"javascript:AlertUser('IsChanged');\">";
			
		} else {

					$privatebox = "<input type='hidden' name='private_posted' value='1'><input type='checkbox' class='radio' name='private' value='y' $roins OnClick='javascript:document.EditEntity.private.style.background=\"#FF0000\"' OnChange=\"javascript:AlertUser('IsChanged');\">";
		}

		if ($ea[readonly]=='y') {
				
					$readonlybox = "<input type='hidden' name='readonly_posted' value='1'><input type='checkbox' class='radio' name=readonly value='y' CHECKED $roins OnClick='javascript:document.EditEntity.readonly.style.background=\"#FFFFFF\"' style='background: #FF0000' OnChange=\"javascript:AlertUser('IsChanged');\">";
		} else {

					$readonlybox = "\n<input type='hidden' name='readonly_posted' value='1'><input type='checkbox' class='radio' name='readonly' value='y' $roins OnClick='javascript:document.EditEntity.readonly.style.background=\"#FF0000\"' OnChange=\"javascript:AlertUser('IsChanged');\">";
		}
		$cl = GetClearanceLevel($GLOBALS['USERID']);
		if ($GLOBALS['EnableEntityRelations'] == "Yes" && $eid <> "_new_" && ($cl == "rw" || $cl == "administrator")) {
			
							$arr = GetEntityFamily($eid) ;
							
							//print_r($arr);

							$parentbox .= "<br><br><img src='repos.jpg'> <select name='parent'>";
							$parentbox .= "<option value='0'>- no parent -</option>";

							$sql = "SELECT eid, category FROM " . $GLOBALS['TBL_PREFIX'] . "entity WHERE eid<>'" . $eid . "' AND deleted<>'y' ORDER BY category";
							qlog($sql);
							$res = mcq($sql, $db);

							while ($row = mysql_fetch_array($res)) {
								if ($row['eid'] == GetEntityParent($eid)) {
									$ins = "SELECTED";
								} else {
							
									unset($ins);
								}
								if (!in_array($row['eid'], $arr)) {
									if (CheckEntityAccess($row['eid'])=="ok" || CheckEntityAccess($row['eid'])=="readonly") {
										$parentbox .=  "<option " . $ins . " value='" . $row['eid'] . "'>" . $row['eid'] . " - " . $row['category'] . "</option>";
									}
								}
							}
							$parentbox .=  "</select>";

							$x = $e;
							$par = array();
							array_push($par, $x);
							while (GetEntityParent($x) <> 0) {
								$x = GetEntityParent($x);
								array_push($par, $x);
							}
							
							
							for ($i = sizeof($par); $i>=0 ; $i--) {
								if ($par[$i] == $e) {
									$ib1 = "<u>";
									$ib2 = "</u>";
								} else {
									unset($ib1);
									unset($ib2);
								}
								$nbsp .= "&nbsp;";
								$parentbox .=  "<br>" . $nbsp . $par[$i] . " <a href='edit.php?e=" . $par[$i] . "'>" . $ib1 . GetEntityCategory($par[$i]) . $ib2 . "</a>";
								
							}

							$tmp = $nbsp;
								
							$nbsp .= "&nbsp;&nbsp;&nbsp;&nbsp;";
							$parentbox .= PrintChilds($eid, $nbsp, true);
							$nbsp = $tmp;
							//$nbsp .= "&nbsp;&nbsp;&nbsp;&nbsp;";
							$parentbox .= PrintSisters($e, $nbsp, true);
						
				
		} else {
			$parentbox="";
		}
		
		if ($cust_only) {		
				$sqlcust = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes' AND id = '" . $cust_only . "' ORDER BY custname";
				$dis = "DISABLED";
		} else {
				$sqlcust = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes' ORDER BY custname";
		}

		$resultcust = mcq($sqlcust,$db);
		
		if ($GLOBALS['AutoCompleteCustomerNames'] == "No") {
			$customerbox = "\n<select $dis name=CRMcustomer size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		
			if ($_REQUEST['SetCustTo']) $ea[CRMcustomer] = $_REQUEST['SetCustTo']; // pre-set customer from customers page

			while ($CRMloginusertje= mysql_fetch_array($resultcust)) {
				$auth = CheckCustomerAccess($CRMloginusertje['id']);
				if ($auth == "ok" || $auth == "readonly") {
					if ($CRMloginusertje[id]==$ea[CRMcustomer]) {
							$a = "SELECTED";
							$Customer = $ea[CRMcustomer];
					} else {
							$a = "";
					}
					 $customerbox .= "<option value='$CRMloginusertje[id]' $a size='1'>$CRMloginusertje[custname]</option>\n";
				}
			}

			$customerbox .= "</select>";
		} elseif (!$cust_only) {
			
			if ($SetCustTo) $ea[CRMcustomer] = $SetCustTo; // pre-set customer from customers page

				
				$customerbox .= "<INPUT TYPE=\"text\" NAME=\"CRMcustomername\" SIZE='50' OnChange=\"javascript:AlertUser('IsChanged');\" ONKEYUP='autoComplete(this,this.form.CRMcustomer,\"Fullname\",true)' value='";

				
				if ($ea[CRMcustomer]) {
					$customerbox .= GetCustomerName($ea[CRMcustomer]);
				} else {
					$customerbox .= "";
				}
				
				$customerbox .="'>";

				$customerbox .= "<DIV style='display: none; cursor:pointer' id='plaatsen'>";
				
				$customerbox .= "<SELECT NAME=\"CRMcustomer\" type=\"hidden\"				onChange=\"this.form.CRMcustomer.value=this.CRMcustomer[this.selectedIndex].nummer\">";
				
					//$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE active='yes'";
					//$custs= mcq($sql,$db);
					while ($record= @mysql_fetch_array($resultcust)) {
						$auth = CheckCustomerAccess($record['id']);
						if ($auth == "ok" || $auth=="readonly") {

							if ($record[id]==$ea[CRMcustomer]) {
								$a = "SELECTED";
								$Customer = $ea[CRMcustomer];
							} else {
									$a = "";
							}
							$customerbox .= "<option Fullname=\"" . GetCustomerName($record[id]) . "\" value=\"" . $record[id] ."\" nummer=\"" . $record[id] ."\" $a>" . $record[id] . "</option>\n";
						}
					}


				$customerbox .= "</SELECT>";
				$customerbox .="</DIV>";
				
		} else {
			$customerbox = "<input type='hidden' name='CRMcustomer' value='" . $cust_only . "'>";
			$customerbox .= "<input type='text' DISABLED name='bogus' value='" . GetCustomerName($cust_only) . "'>";
		}


		if ($_GET['SetDateTo']) {
			$ea['duedate'] = $_GET['SetDateTo'];
		}
		if ($_GET['SetTimeTo']) {
			$ea['duetime'] = $_GET['SetTimeTo'];
		}
		
		$duedatebox = "<input type='hidden' size='13' name='duedate' value='" . $ea['duedate'] ."' OnChange=\"javascript:AlertUser('IsChanged');AdjustDateToUSAFormat(document.EditEntity.duedate.value);\"><input type='text' size='13' name='displayDate' OnClick=\"javascript:popcalendar();\" OnKeyUp=\"javascript:popcalendar();\" value='" . $ea['duedate'] . "' $roins>";

		$duetimebox = "<select name='duetime' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		for ($i=$GLOBALS['CAL_MINHOUR'];$i<$GLOBALS['CAL_MAXHOUR']+1;$i+=.5) {
			if ($i<10) { 
				$val = "0";
				$txt = "0";
			}
			if ($ch) {
				$val .= floor($i) . "30";
				$txt .= floor($i) . ":30h";
				unset($ch);
			} else {
				$val .= floor($i) . "00";
				$txt .= floor($i) . ":00h";
				$ch=1;
			}
			if ($ea['duetime'] == $val) {
				$sel = "SELECTED";
			} else {
				unset($sel);
			}
			$duetimebox .= "<option value='". $val . "' $sel>" . $txt . "</option>";
			unset($val);
			unset($txt);
		}
		$duetimebox .= "</select>";

		$statusbox = "<select name=status size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]statusvars ORDER BY varname";
		$result= mcq($sql,$db);
		while($options = mysql_fetch_array($result)) {
			if (strtoupper(($ea[status]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
			$statusbox .= "<option style='background:" . $options[color] . "' value='$options[varname]' $a>$options[varname]</option>";
		}

		$statusbox .= "</select>";

		$prioritybox = "<select name='prioty' size='1' $roins OnChange=\"javascript:AlertUser('IsChanged');\">";
		$sql = "SELECT varname,id,color FROM $GLOBALS[TBL_PREFIX]priorityvars ORDER BY varname";
		$result= mcq($sql,$db);
		while($options = mysql_fetch_array($result)) {
			if (strtoupper(($ea[priority]))==strtoupper($options[varname])) { $a="SELECTED"; } else { $a=""; }
			$prioritybox .= "<option style='background:" . $options[color] . "' value='$options[varname]' $a>$options[varname]</option>";
		}

		$prioritybox .= "</select>";

		$contentbox = "<a OnClick='InsertDateTime();' class='bigsort' style='cursor:pointer' title='Insert date, time and your name'><img src='timedate.gif'></a>";
		$contentbox .= "<img src='decrease.gif' height='16' width='16' onclick='decreaseNotesHeight(document.EditEntity.content, 50);' style='cursor:pointer' title='Make Notes field smaller'>";
		$contentbox .= "<img src='increase.gif' height='16' width='16' onclick='increaseNotesHeight(document.EditEntity.content, 50);' style='cursor:pointer' title='Make Notes field bigger'><br>";
		if (strtoupper($GLOBALS['AutoInsertDateTime'])=="YES") {
			$roins44 = "OnKeyUp='InsertDateTimeOnce();'";
		}
		$contentbox .= "<TEXTAREA $roins44 $roins $ro_lock style='height: 250' rows=13 cols=118 name='content' wrap='virtual' class='txt' OnKeyUp=\"javascript:AlertUser('IsChanged');\">$ea[content]</TEXTAREA>";
	
		$savebutton = "<input type='button' OnClick='CheckForm();' $roins value='" . $lang['save'] . "'>";
		$saveasnewbutton = "<input type='hidden' name='saveasnew' value=''><input class='txt' type='button' OnClick=\"javascript:document.EditEntity.changed.value='0';document.EditEntity.saveasnew.value='1';CheckForm();\" name=sb2 value='" . $GLOBALS['lang']['saveasnewentity'] . "'  $roins>";

		$cancelbutton = "<input type='button' $roins value='" . $lang['cancel'] . "' OnClick='window.close();'>";
		
		$reporticon = "";
	
		$printicon = "<a class='bigsort' style='cursor:pointer' title='Print on default printer' href=\"javascript:popPDFprintwindow('sumpdf.php?pdf=$e&print=1')\"><img src='print.gif' style='border:0'></a>";

		$sql = "SELECT password FROM $GLOBALS[TBL_PREFIX]loginusers WHERE id='" . $GLOBALS['USERID'] . "'";
		$out = mcq($sql,$db);
		$row = mysql_fetch_array($out);
		
		$row['password'] = "enc_--" . $row['password'];

		$subdir = ereg_replace("edit.php","",$_SERVER['SCRIPT_NAME']);
		

		if ($_SERVER['HTTPS']=="on") {
			$http = "https://";
		} else {
			$http = "http://";
		}
		$webdavicon = "<a OnClick='javascript:ReEnableSessionAfterOpeningWebDAV();' style='behavior: url(#default#AnchorClick)' class='bigsort' title='Go to WebDAV directory of this entity' href='" . $http . $GLOBALS['USERNAME'] . ":" . $row['password'] . "@" . $auth_string . $_SERVER['SERVER_NAME'] . $subdir . "webdav_file.php/" . $GLOBALS['repository_nr'] . "/" . $e . "' target='new_webdav_$e' FOLDER='" . $http . $_SERVER['SERVER_NAME'] . $subdir . "webdav_file.php/" . $GLOBALS['repository_nr'] . "/" . $e . "/'><img src='webdav.gif' style='border:0'></a>";
	
		if (strtoupper($GLOBALS['EnableEntityJournaling'])=="YES") {
				$journalicon = "<a class='bigsort' title='Journal' href='javascript:popjournal($e);'><img src='journal.gif' style='border:0'></a>&nbsp;";
		}
		
		$pdficon = "<a class='bigsort' title='$lang[downloadpdf]'  href=\"javascript:popPDFwindow('sumpdf.php?pdf=$e')\"><img src='pdf.gif' style='border:0'></a>";
		$acticon = "";
		$invoiceicon = "<a title='Generate invoice' href=\"javascript:poplittlewindow('invoice.php?SingleEntity=" . $e . "')\"><img src='invoice.gif' style='border:0'></a>";


		$filebox = "<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file' $roins>";
		
		if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES" && $e<>"_new_" && CheckEntityAccess($eid) == "ok") { 

			$tmp = "<table><tr><td><fieldset><legend>&nbsp;&nbsp;$lang[attachfile] - WebDAV&nbsp; <img src='arrow.gif'> <a href='webdav.php?AttAll=1&eid=" . $eid . "'>Attach all</a>&nbsp;</legend><table border=0>";
			
			$dir = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $eid . "/";

			if (is_dir($dir)) {
			   if ($dh = opendir($dir)) {
				   while (($file = readdir($dh)) !== false) {
					   
						if (!strstr($file,"CRMID") && $file<>"." && $file <> "..") {
							   $tmp .= "<tr><td><img src='arrow.gif'>&nbsp;<a href='webdav.php?filename_to_ins=" . base64_encode($file) . "&checkin=true&eidw=" . $eid . "' class='bigsort'>$file</a></td></tr>";
							   $filecounter++;
							   //print "i ++";
						}
				   }
				   closedir($dh);
			   }
			}
			$tmp .= "</table></fieldset></td></tr></table>";
			if ($filecounter==0) {
					$tmp = "";
			}
			

		}
		$filebox .= $tmp;
		$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$e' AND koppelid<>'0' AND type='entity' ORDER BY filename,creation_date";
		$result= mcq($sql,$db);
		
		

		$toprint .= "<table style='border:0'><tr style='border:0'><td style='border:0'>$lang[filename]</td>";

		if (strtoupper($GLOBALS['ShowPDWASLink'])=="YES") {  
			$toprint .= "<td style='border:0'>PDWAS</td>";
		}

		if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES" && CheckEntityAccess($e)=="ok") {  
			$toprint .= "<td style='border:0'>WebDAV</td>";
		}
		$toprint.= "<td style='border:0'>$lang[filesize]</td><td style='border:0'>$lang[creationdate]</td><td style='border:0'>$lang[owner]</td><td style='border:0'>$lang[deletefile]</td></tr>";
					while ($files= mysql_fetch_array($result)) {
						$ownert = GetUserNameByName($files['username']);
						$toprint.= "\n";
						unset($ins_rec1);				
						$fdispl = true;

						if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES"  && CheckEntityAccess($e)=="ok") { 

							unset($filenamex);
							$ftr = split("\.",$row['filename']);
							$top = sizeof($ftr) - 1;
							for ($x=0;$x<$top;$x++) {
								$filenamex .= $ftr[$x] . ".";
							}

							$sql="SELECT koppelid,checked,checked_out_by,fileid,filename FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $files['fileid'] . "'";
							mcq($sql,$db);
							$output = mcq($sql,$db);
							$row = mysql_fetch_array($output);
							
							if ($row['checked']=="out") { // the file is already checked out
								
									$checked_out = true;

									// Check if it indeed exists in WebDAV
									
									$filename = "";

									$eid = $row['koppelid'];
				
									$target_dir = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $eid;
								
									$ftr = split("\.",$row['filename']);
									$top = sizeof($ftr) - 1;
									for ($x=0;$x<$top;$x++) {
										$filename .= $ftr[$x] . ".";
									}

									$filename .= "CRMID_" . $row['fileid'] . "." . $ftr[$top];
									$target_file = getcwd() . "/webdav_fs/" . $GLOBALS['repository_nr'] . "/" . $eid . "/" . $filename;
									$webdav_dir = "/" . $GLOBALS['repository_nr'] . "/" . $eid . "/" . $filename;
									
									if (file_exists($target_file)) {
										$dis_link = true;
										$ins_rec = $row['checked_out_by'];

										$query = "SELECT owner, token, expires, exclusivelock FROM $GLOBALS[TBL_PREFIX]webdav_locks WHERE path = '" . addslashes($webdav_dir) . "'";
										//print $query;
										$res = mcq($query,$db);

										if($res) {
											$row = mysql_fetch_array($res);
											mysql_free_result($res);

											if($row) {
												$ins_locked = "<img src='lock.png' title='File is locked for editing'>";	
												$token = $row['token'];
											} else {
												$ins_locked = "";
											}
										}



									} else {
										
										// WTF! The file is checked out, but it doesn't exist in WebDAV.
										// We need to recover it.

										$ins_rec1 = "<font color='#FF0000'>(recovered)</font>";
										$sql = "UPDATE $GLOBALS[TBL_PREFIX]binfiles SET checked='in' WHERE fileid='" . $files['fileid'] . "'";
										mcq($sql,$db);
										journal($eid,"Recovered file #" . $files['fileid'] . " from database. The file should have been in WebDAV but it was not.");
										$checked_out = false;
									}
							} else {
									unset($dis_link);		
									$checked_out = false;
							}
						}
						
						unset($filename);


						if (stristr("@@@:",$ownert[FULLNAME])) {
							$ownert = "&nbsp;&nbsp;&nbsp;n/a";
						}

						$toprint .= "<tr style='border:0'><td style='border:0'>";
						
						if ($dis_link) {
							$toprint .= "<img src='arrow.gif'>&nbsp;$files[filename]";

							if ($ins_rec==$GLOBALS[USERID]) {
								$who = "you";
							} else {
								$who = GetUserName($ins_rec);
							}
							
							if ($unlockforce) { 
								$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]webdav_locks WHERE token='" . $unlockforce . "'";
								mcq($sql,$db);
								$ins_locked = "";
							}

							$toprint .= "<br><i>Checked out by " . $who . "</i> $ins_locked $ins_rec1";
						} else {
							$toprint .= "<img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a> $ins_rec1";
						}
						
						$toprint .="</td>";
						if (strtoupper($GLOBALS['ShowPDWASLink'])=="YES") { 
								$toprint .= "<td style='border:0'><img src='arrow.gif'>&nbsp;<a href='csv.php?fileid=$files[fileid]&tw=1' class='bigsort'>PDWAS</a></td>";
						}
						if (strtoupper($GLOBALS['EnableWebDAVSubsystem'])=="YES"  && CheckEntityAccess($e)=="ok") { 
							if ($checked_out==true) { // the file is already checked out
								$toprint .= "<td style='border:0'><img src='arrow.gif'>&nbsp;<a href='webdav.php?fileid=$files[fileid]&checkin=true' class='bigsort'>Check in</a>";
								if ($ins_locked<>"" && $who=="you") {
									$toprint .= "<br><img src='arrow.gif'>&nbsp;<a href='edit.php?e=" . $eid . "&unlockforce=" . $token . "' class='bigsort'>Force unlock</a>";
								}
								$toprint .= "</td>";
							} else {
								$toprint .= "<td style='border:0'><img src='arrow.gif'>&nbsp;<a href='webdav.php?fileid=$files[fileid]' class='bigsort'>Check out</a></td>";
							}

						}
						$toprint .= "<td style='border:0'>";
						$toprint .= ceil(($files[filesize]/1024)). "K";
						$toprint .= "</td><td style='border:0'>$files[dt]</td><td style='border:0'>$ownert</td><td style='border:0'><input type='checkbox' class='radio' name=deletefile[] value='$files[fileid]' $roins></td></tr>";
						$ftel++;
					}
			
				
				if ($fdispl) {
					$toprint .= "</table>"; 
					$filelist = $toprint;
					unset($toprint);
				} else {
					$filelist = "n/a";

				}

		if (CheckLock($eid) <> false) {
			$lockicon = "<img src='lock.png' title='This entity is locked, you cannot alter it at this time' alt='This entity is locked, you cannot alter it at this time'>";
		} else {
			$lockicon = "";
		}
		if ($e<>"_new_") {
			if ($ea[deleted]=='y') {
				$deletedbox = "<input type='hidden' name='deleted_posted' value='1'><input type='checkbox' class='radio' name=deleted value='y' CHECKED $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
			} else {
				$deletedbox = "<input type='hidden' name='deleted_posted' value='1'><input type='checkbox' class='radio' name=deleted value='y' $roins $roins2 OnChange=\"javascript:AlertUser('IsChanged');\">";
			}
		}
		
		if (strtoupper($GLOBALS['EnableEntityJournaling'])=="YES" && $eid<>"_new_") {
			$journalicon = "<a class='bigsort' title='Journal' href='javascript:popjournal($eid);'><img src='journal.gif' style='border:0'></a>&nbsp;";
		} else {
			$journalicon = "";
		}

		
//		$cancelbutton = "<input type='submit' value='" . $lang['save'] . "'>";
		
		$GLOBALS['CURFUNC'] = "ParseFormTemplate::";

		$error_msg = "<img src='error.gif'><pre>Error parsing template!\n\n";

		$template = str_replace('#CATEGORY#',	$categorybox,$template);
		
		if (strstr($template,"#OWNER#")) {
			if ($e=="_new_" && (GetClearanceLevel($GLOBALS['USERID']) == "ro" || GetClearanceLevel($GLOBALS['USERID']) == "ro+")) {
				$template = str_replace('#OWNER#',"",$template);
				// nothing
			} else {
				$template = str_replace('#OWNER#',$ownerbox,$template);
			}
		} else {
			$error = true;
			$error_msg .= "Owner tag (#OWNER#) is mandatory.\n";
		}
		if (strstr($template,"#ASSIGNEE#")) {
			if ($e=="_new_" && (GetClearanceLevel($GLOBALS['USERID']) == "ro" || GetClearanceLevel($GLOBALS['USERID']) == "ro+")) {
				$template = str_replace('#ASSIGNEE#',"",$template);
			} else {
				$template = str_replace('#ASSIGNEE#',$assigneebox,$template);
			}
		} else {
			$error = true;
			$error_msg .= "Assignee tag (#ASSIGNEE#) is mandatory.\n";
		}

		if (strstr($template,"#CUSTOMER#")) {
			$template = str_replace('#CUSTOMER#',$customerbox,$template);
		} else {
			$error = true;
			$error_msg .= "Customer tag (#CUSTOMER#) is mandatory.\n";
		}

		if (GetClearanceLevel($GLOBALS['USERID'])=="ro+" && $eid<>"_new_") {
			$addcommentbox = "<form name='formpje' method='post' ENCTYPE='multipart/form-data'><TEXTAREA rows=5 cols=117 name='addcontent' wrap='virtual' class='txt'></TEXTAREA><br>";
			$addcommentbox .= "<input type='hidden' name='action' value='edit'>";
			$addcommentbox .="<input type='hidden' name='e' value='" . $e . "'>";
			$addcommentbox .="$lang[attachfile]&nbsp;<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><INPUT NAME='userfile' TYPE='file' >&nbsp;&nbsp;&nbsp;&nbsp;";
			$addcommentbox .="&nbsp;&nbsp;&nbsp;<input type='submit' name='bla' value='$lang[save]'></form>";
		}


		$template = str_replace('#DUEDATE#',	$duedatebox,$template);
		$template = str_replace('#PARENTBOX#',	$parentbox,$template);
		$template = str_replace('#COMMENTBOX#',	$addcommentbox,$template);
		$template = str_replace('#DUETIME#',	$duetimebox,$template);
		$template = str_replace('#STATUS#',		$statusbox,$template);
		$template = str_replace('#PRIORITY#',	$prioritybox,$template);
		$template = str_replace('#CONTENTS#',	$contentbox,$template);
		$template = str_replace('#ARROWS#',		$btp,$template);
		if ($nonavbar) {
			$template = str_replace('#CANCELBUTTON#',$cancelbutton,$template);
		} else {
			$template = str_replace('#CANCELBUTTON#',"",$template);
		}
		$template = str_replace('#PDFICON#',$pdficon,$template);
		$template = str_replace('#WEBDAVICON#',$webdavicon,$template);
		$template = str_replace('#ACTICON#',$acticon,$template);
		$template = str_replace('#REPORTICON#',$reporticon,$template);
		$template = str_replace('#PRINTICON#',$printicon,$template);
		$template = str_replace('#INVOICEICON#',$invoiceicon,$template);
		$template = str_replace('#JOURNALICON#',$journalicon,$template);

		$template = str_replace('#FILELIST#',$filelist,$template);
		$template = str_replace('#FILEBOX#',$filebox,$template);

		$template = str_replace('#SAVEBUTTON#',	$savebutton,$template);
		$template = str_replace('#SAVEASNEWBUTTON#',$saveasnewbutton,$template);		

		$template = str_replace('#LOCKICON#',$lockicon,$template);
		
		$template = str_replace('#EID#',$eid,$template);
		$template = str_replace('#INSERTTIMEICON#',$inserttimeicon, $template);
		$template = str_replace('#DELETEBOX#',$deletedbox, $template);

		$template = str_replace('#PRIVATEBOX#',$privatebox, $template);
		$template = str_replace('#READONLYBOX#',$readonlybox, $template);
	
		$template = str_replace('#EMAILPOPLINK#',$emailpoplink, $template);
		$template = str_replace('#EMAILDROPDOWN#',$emaildropdown, $template);
		

		$GLOBALS['eflist'] = GetExtraFields();

		$fields_array = array();		
		
		for ($x=0;$x<sizeof($GLOBALS['eflist']);$x++) {

			$field = $GLOBALS['eflist'][$x];

			$tmp = GetSingleExtraFieldFormBox($eid,$field['id'],$readonly);

			if (strstr($template,"#EFID" . $field['id'] . "#")) {
				array_push($fields_array, $field);
				$template = str_replace("#EFID" . $field['id'] . "#",$tmp,$template);
				unset($tmp);
			}
			
			// a hidden field looks like this : #HEFID90[Zacherias]#
			// which is" #HEFID FIELDID [ value ] #

			if (strstr($template,"#HEFID" . $field['id'] . "[")) {
				$tag = "#HEFID" . $field['id'] . "[";
//				print "breakup by $tag";
				// Break up template
				$tmp = explode($tag, $template);
				
				$value = $tmp[1];
				$value = explode("]#", $value);
				$value = $value[0];

				$tag .= $value . "]#";

				$template = str_replace($tag, "", $template);
				$template .= "<input type='hidden' name='EFID" . $field['id'] . "' value='" . addslashes($value) . "'>";
				

			}


		}
		
		$GLOBALS['CURFUNC'] = "ParseFormTemplate::";
		
		if ($eid=="_new_") {
				$template .= "<input class='txt' type='hidden' name='e' value='$e'>";
				$template .= "<input class='txt' type='hidden' name='action' value='add'>";
		} else {
				$template .= "<input class='txt' type='hidden' name='action' value='edit'>";
				$template .= "<input class='txt' type='hidden' name='e' value='" . $eid . "'>";
				$template .= "<input class='txt' type='hidden' name='eid' value='" . $eid . "'>";
		}

		$template .= "<input type='hidden' name='e_button' value=''>";

		if ($_REQUEST['fromlist']) {
			$template .= "<input class='txt' type='hidden' name='fromlisturl' value='" . $_REQUEST['fromlist'] . "'><INPUT TYPE='hidden' name='fromlistnow' value='1'>";
		}
		$template .= "<INPUT TYPE='hidden' name='unlock' value=''><INPUT TYPE='hidden' name='did_time' value='not yet'>";
	} // end if valid
	
	$template = ParseTemplateEntity($template,$ea['eid']);
	$template = ParseTemplateCustomer($template,$ea['CRMcustomer']);

	$template .= "<DIV style='display: none; cursor:pointer' id='niks'>";
	
	$template .= "<select NAME=\"cats\" onChange=\"this.form.cat.value=document.EditEntity.cats[this.selectedIndex].value\">";
	
		$sql = "SELECT category, eid FROM $GLOBALS[TBL_PREFIX]entity WHERE deleted<>'y' ORDER BY category";
	// WHERE deleted<>'y'
		$custs= mcq($sql,$db);
		while ($record= @mysql_fetch_array($custs)) {
			if (trim($record['category']) <> "") {
				$x = CheckEntityAccess($record['eid']);
				if ($x == "readonly" || $x == "ok") {
					$template .= "<option value='" . $record['category'] . "'></option>\n";
				}
			}
		}


	$template .= "</SELECT>";
	$template .= "</DIV>";
	$url = $_SERVER['SCRIPT_NAME'];

	if (!stristr($url,"php?")) {
		$url = ereg_replace("php","php?a=1",$url);
	}

		
		$template .= '<SCRIPT LANGUAGE="JavaScript" type="text/javascript">';
		$template .= '<!--';
		$template .= 'function ReEnableSessionAfterOpeningWebDAV() {';
		$template .= "document.location = '" . $url . "?session=" . $session . "&e=" . $e . "'";
		$template .= '	}';
		$template .= '//-->';
		$template .= '</SCRIPT>';
		
		$template .= PrintExtraFieldForceJavascript("EditEntity","entity",$fields_array, true);

	if ($error) {
		$GLOBALS['CURFUNC'] = "ParseFormTemplate::";
		qlog(ereg_replace("\n"," - " , $error_msg));
		return($error_msg);
	} else {
		return($template);
	}
}

function ValidateHTMLForm($fileid,$type="entity") {
		
		$template = GetFileContent($fileid);
	
		if (stristr($template,"<form>") || stristr($template,"</form>")) {
			$error = true;
			$error_msg .= "Form tags (&lt;FORM&gt; and &lt;/FORM&gt;) are not allowed in templates.\n";
		}

		

		if (strstr($template,"#CUSTOMER#")) {
			
		} else {
			$error = true;
			$error_msg .= "Customer tag (#CUSTOMER#) is mandatory.\n";
		}
		if (strstr($template,"#COMMENTBOX#") && !strstr($template,"#CONTENTS#")) {
			$error = true;
			$error_msg .= "You must enable the #CONTENTS# box in order to use the #COMMENTBOX# feature.";
		}


		if (strstr($template,"#SAVEBUTTON#")) {
			
		} else {
			$error = true;
			$error_msg .= "Save button (#SAVEBUTTON#) is mandatory. How to save your entity without it?\n";
		}
		if ($type=="entity") {
			if (strstr($template,"#OWNER#")) {
				
			} else {
				$error = true;
				$error_msg .= "Owner tag (#OWNER#) is mandatory.\n";
			}
			if (strstr($template,"#ASSIGNEE#")) {
				
			} else {
				$error = true;
				$error_msg .= "Assignee tag (#ASSIGNEE#) is mandatory.\n";
			}
		}
		if ($error) {
			return("<font color='#FF0000'>This template will not work.</font>\n" . $error_msg);
		} else {
			return("<font color='#66CC00'>Template looks good!</font>");
		}
}
function CheckDatabaseSettings() {
	
	if ($GLOBALS['EnableMailMergeAndInvoicing'] == "Yes") {
		//print "Mail merging and invoicing is enabled\n";
	}
	if ($GLOBALS['admpassword'] == "*NONE*" || $GLOBALS['admpassword'] == "") {
		$ret .= "WARNING : The global administrative password is not set!\n";
	}
	if ($GLOBALS['mipassword'] == "*NONE*" || $GLOBALS['mipassword'] == "") {
		$ret .= "INFO    : The management information password is not set!\n";
	}
	if ($GLOBALS['cronpassword'] == "*NONE*" || $GLOBALS['cronpassword'] == "") {
		$ret .= "WARNING : The cron password is not set!\n";
	}
	if ($GLOBALS['logtext'] == true) {
		$ret .="WARNING : LOGTEXT is enabled. This slows CRM-CTT down by 25%!\n";
	}
	if ($GLOBALS['logqueries'] == true) {
		$ret .= "WARNING : LOGQUERIES is enabled. This slows stuff down.\n";
	}

	$fp = @fopen("qlist.txt","r"); 
	if ($fp) {
		$ret .= "WARNING : SECURITY HAZARD: Your qlist.txt file is world-readable.\n";
		fclose($fp);
	}

	
	if (ini_get("magic_quotes_gpc") == 1) {
			//$ret .= "ERROR   : Magic quotes  : On\n";
	} else {
			$ret .= "ERROR   : Magic quotes is off!\n";
	}

	
	if ($ret) {
		return($ret . "\n");
	} else {
		return("No messages\n\n");	
	}


}
function GetProfileMembers($prof_num) {
	$prof_members = array();
	$sql = "SELECT id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE PROFILE='" . $prof_num ."' AND name NOT LIKE 'deleted_user_%' ORDER BY FULLNAME";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		array_push($prof_members, $row['id']);
	}
	return($prof_members);
}

function DeleteProfile($prof_num) {
	$members = GetProfileMembers($prof_num);

	if (sizeof($members) > 0) {
		print "This profile cannot be deleted because the following user(s) still inherit it:<br>";
		foreach ($members AS $user) {
			print "<BR>" . GetUserName($user);
		}
		print "<br><br><img src='arrow.gif'>&nbsp;<a href='javascript:history.back(-1);' class='bigsort'>back</a>";
	} else {
		$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]userprofiles WHERE id='" . $prof_num . "'";
		mcq($sql,$db);
		print "Profile " . $prof_num . " was successfully deleted.";
		print "<br><br><img src='arrow.gif'>&nbsp;<a href='admin.php?userman=1&password=' class='bigsort'>back</a>";
	}
}

function ProcessProfileForm($num,$prof_name,$cllevel,$hide_add,$hide_cust,$hide_csv,$hide_pb,$hide_summ,$hide_ent,$show_deleted,$dailymail,$entityaddform,$entityeditform,$limittocustomers) {
	print "<font color='#66FF00'>OK</font><br>";
	if (is_numeric($num)) {
		// update 
		$addf = serialize($_REQUEST['addforms']);
		for ($i=0;$i<sizeof($addf);$i++) {
			if ($addf[$i] == "default") {
				$addf[$i] = "0";
			}
		}
		$sql= "UPDATE $GLOBALS[TBL_PREFIX]userprofiles SET name='$prof_name',CLLEVEL='$cllevel', active='yes',RECEIVEDAILYMAIL='" . $dailymail . "',HIDEADDTAB='" . $hide_add . "', HIDECSVTAB='" . $hide_csv . "',HIDEPBTAB='" . $hide_pb . "',HIDESUMMARYTAB='" . $hide_summ . "',HIDEENTITYTAB='" . $hide_ent ."',SHOWDELETEDVIEWOPTION='" . $show_deleted . "',HIDECUSTOMERTAB='" . $hide_cust ."',ENTITYADDFORM='" . $entityaddform . "', ENTITYEDITFORM='" . $entityeditform . "', LIMITTOCUSTOMERS='" . $limittocustomers . "', ADDFORMS='" . $addf . "' WHERE id='" . $num . "'";
		mcq($sql,$db);
	} else {
		// insert
		$addf = serialize($_REQUEST['addforms']);
		for ($i=0;$i<sizeof($addf);$i++) {
			if ($addf[$i] == "default") {
				$addf[$i] = "0";
			}
		}

		if ($addf == "") {
			$addf = "a:1:{i:0;s:7:\"default\";}";
		} 

		$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]userprofiles(name,CLLEVEL,HIDEADDTAB,HIDECUSTOMERTAB,HIDECSVTAB,HIDEPBTAB,HIDESUMMARYTAB,HIDEENTITYTAB,SHOWDELETEDVIEWOPTION,RECEIVEDAILYMAIL,ENTITYADDFORM,ENTITYEDITFORM,LIMITTOCUSTOMERS,ADDFORMS) values ('" . $prof_name . "','" . $cllevel . "','" . $hide_add . "','" . $hide_cust . "','" . $hide_csv . "','" . $hide_pb . "','" . $hide_summ . "','" . $hide_ent . "','" . $show_deleted . "','" . $dailymail . "','" . $entityaddform . "','" . $entityeditform . "','" . $limittocustomers . "','" . $addf . "');";

		mcq($sql,$db);
	}
}

function ProfileForm($profile_number) {
	global $lang;
	print "<form name='editprofile'>";
	if (is_numeric($profile_number)) {
		$pa = GetProfileArray($profile_number);
		print "<table><tr><td colspan=2><b>Edit profile " . $profile_number . " - " . $pa['name'] . "</b><input type='hidden' name='profnum' value='" . $profile_number . "'></td></tr>";
	} else {
		print "<table><tr><td colspan=2><b>New profile</b></td></tr>";
	}
	
	print "<tr><td>Profile name </td><td><input type='text' name='prof_name' value=\"" . ($pa['name']) . "\"></td></tr>";
	
	if ($pa[CLLEVEL]=="ro" || $pa[CLLEVEL]=="ro+") {
		
		//print "<tr><td nowrap>When a new entity is added, send an email to</td><td><input type='text' size=50 name='EMAIL' value='$pa[EMAIL]'></td></tr>";

		/* Legend of translated (=misused) profile values
			HIDEENTITYTAB = Entity list
			HIDEADDTAB = Show status field
			HIDECUSTOMERTAB = Show priority field
			HIDECSVTAB = Show due date field	

		*/
		if ($pa['HIDEENTITYTAB']=='y') {
			$ins = "SELECTED";
			unset($ins2);
		} elseif ($pa['HIDEENTITYTAB']=='n') {
			$ins2 = "SELECTED";
			unset($ins);
		} else {
			unset($ins);
			unset($ins2);
		}
		print "<tr><td>View the main entity list</td><td><select name='n_HIDEENTITYTAB'><option value='n' " . $ins2 . ">Allow</option><option value='y' " . $ins . ">Disallow</option></select></td></tr>";			

		if ($pa['HIDEADDTAB']=='y') {
			$ins = "SELECTED";
			unset($ins2);
		} elseif ($pa['HIDEADDTAB']=='n') {
			$ins2 = "SELECTED";
			unset($ins);
		} else {
			unset($ins);
			unset($ins2);
		}

		print "<tr><td>Allow user to set the status</td><td><select name='n_HIDEADDTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
		
		if ($pa['HIDECUSTOMERTAB']=='y') {
			$ins = "SELECTED";
			unset($ins2);
		} elseif ($pa['HIDECUSTOMERTAB']=='n') {
			$ins2 = "SELECTED";
			unset($ins);
		} else {
			unset($ins);
			unset($ins2);
		}
		print "<tr><td>Allow user to set the priority</td><td><select name='n_HIDECUSTOMERTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
		

		if ($pa['HIDECSVTAB']=='y') {
			$ins = "SELECTED";
			unset($ins2);
		} elseif ($pa['HIDECSVTAB']=='n') {
			$ins2 = "SELECTED";
			unset($ins);
		} else {
			unset($ins);
			unset($ins2);
		}
		print "<tr><td>Allow user to set the due-date</td><td><select name='n_HIDECSVTAB'><option value='n' " . $ins2 . ">Sim</option><option value='y' " . $ins . ">N�o</option></select></td></tr>";
		
		if ($pa['HIDEPBTAB']=='y') {
			$ins = "SELECTED";
			unset($ins2);
		} elseif ($pa['HIDEPBTAB']=='n') {
			$ins2 = "SELECTED";
			unset($ins);
		} else {
			unset($ins);
			unset($ins2);
		}
	
	} else { // so, this is a normal account, eh?
		if ($pa['administrator']=='yes') {
				$disable_boxes1 = "DISABLED";
				$disable_boxes2 = "<option value='1'>&lt;User is admin&gt;</option>";
			}
	
				if ($pa['HIDEADDTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDEADDTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}

				print "<tr><td>Add an entity</td><td><select name='n_HIDEADDTAB' $disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";
				
				if ($pa['HIDECUSTOMERTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDECUSTOMERTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Modify customers</td><td><select name='n_HIDECUSTOMERTAB' $disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";
				

				if ($pa['HIDECSVTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDECSVTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Use the 'CSV' page for complete downloads&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><select name='n_HIDECSVTAB'$disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";
				
				if ($pa['HIDEPBTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDEPBTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Use the phonebook</td><td><select name='n_HIDEPBTAB'$disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";
				if ($pa['HIDESUMMARYTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDESUMMARYTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Use the summary page</td><td><select name='n_HIDESUMMARYTAB'$disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";
		
				if ($pa['HIDEENTITYTAB']=='y') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['HIDEENTITYTAB']=='n') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Use the main entity list</td><td><select name='n_HIDEENTITYTAB'$disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='n' " . $ins2 . ">Always allow</option><option value='y' " . $ins . ">Always disallow</option></select></td></tr>";

				if ($pa['SHOWDELETEDVIEWOPTION']=='n') {
					$ins = "SELECTED";
					unset($ins2);
				} elseif ($pa['SHOWDELETEDVIEWOPTION']=='y') {
					$ins2 = "SELECTED";
					unset($ins);
				} else {
					unset($ins);
					unset($ins2);
				}
				print "<tr><td>Show deleted entities</td><td><select name='n_SHOWDELETEDVIEWOPTION' $disable_boxes1>$disable_boxes2<option value='1'>Follow system default</option><option value='y' " . $ins2 . ">Always allow</option><option value='n' " . $ins . ">Always disallow</option></select></td></tr>";
	
				print "<tr><td>Limit to " . $lang['customer'] . "-numbers:<br>(entities of other customers cannot be seen) </td><td><input type='text' name='n_LIMITTOCUSTOMERS' value='" . $pa['LIMITTOCUSTOMERS'] . "'> (;-separated list)</td></tr>";

				
				unset($ins);
				unset($ins2);
			if ($pa['RECEIVEDAILYMAIL']=="Yes") {
				$ins = "SELECTED";
			} else {
				$ins2 = "SELECTED";
			} 
			print "<tr><td>Daily " . $lang['briefover'] . " e-mail</td><td><select name='dailymail'><option value='No' $ins2>N�o</option><option value='Yes' " . $ins . ">Sim</option></select></td></tr>";
	}

	print "<tr><td nowrap>Clearance level</td><td>";

	if ($pa["administrator"]=="yes" && $administrator<>"yes") {
		print "<select name='CLLEVEL' DISABLED>";
	} else {
		print "<select name='CLLEVEL'>";
	}

		if ($pa["CLLEVEL"]=="rw") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		
		
		print "<option $a value='rw'>Full access to all entities</option>";
		
		if ($pa["CLLEVEL"]=="ro") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option value='ro' $a>Insert-only $lang[customer]-user unable to read contents of added entities</option>";
		if ($pa["CLLEVEL"]=="ro+") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option value='ro+' $a>Insert-only $lang[customer]-user able to read contents of added entities</option>";
		
		if ($pa["CLLEVEL"]=="ooro") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option $a value='ooro'>Read-only own-assigned entities</option>";

		if ($pa["CLLEVEL"]=="read-only-all") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option $a value='read-only-all'>Read-only all entities</option>";

		if ($pa["CLLEVEL"]=="full-access-own-entities") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option $a value='full-access-own-entities'>Full access though only edit own assigned entities</option>";
		if ($result["CLLEVEL"]=="full-access-see-own-assigned-entities") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		print "<option $a value='full-access-see-own-assigned-entities'>Full access though only see/edit own assigned entities</option>";

		if ($result["CLLEVEL"]=="full-access-see-own-assigned-and-owned-entities") {
			$a = "SELECTED";
		} else {
			unset($a);
		}
		
		print "<option $a value='full-access-see-own-assigned-and-owned-entities'>Full access though only see/edit own assigned or owned  entities</option>";

		if ($pa["CLLEVEL"]=="logger") {
			$a = "SELECTED";
		} else {
			unset($a);
		}

		print "<option $a value='logger'>External logger account (unable to log in)</option>";
	
		print "</select>";
		print "</td></tr>";
		if ($GLOBALS['FormFinity'] == "Yes") {
					print "<tr><td>This user may use the following forms:<br>(entities composed in other forms will not be visible for this user!)</td><td>";
					$cur = unserialize($pa['ADDFORMS']);

					for ($i=0;$i<sizeof($cur);$i++) {
						if ($cur[$i] == "0") {
							$cur[$i] = "default";
						}
					}

				
					$sql = "SELECT fileid,file_subject,filename FROM " . $GLOBALS['TBL_PREFIX'] . "binfiles WHERE filetype='TEMPLATE_HTML_FORM'";
					$res = mcq($sql, $db);
					if (@in_array("default", $cur)) {
						$check = "CHECKED";
					} else {
						unset($check);
					}
					print "<input type='checkbox' " . $check . " name='addforms[]' value='default'> CRM-CTT Default form<BR>";

					while ($row = mysql_fetch_array($res)) {
						if (@in_array($row['fileid'], $cur)) {
							$check = "CHECKED";
						} else {
							unset($check);
						}
						print "<input " . $check . " type='checkbox' name='addforms[]' value='" . $row['fileid'] . "'> " . $row['filename'] . " (" . $row['file_subject'] . ")<BR>";
					}


					print "</td></tr>";
				} else {
					print "<tr><td>Add-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result = mcq($sql,$db);
					print "<SELECT NAME='ENTITYADDFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result)) {
						if ($pa['ENTITYADDFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";
					print "<tr><td>Edit-entity form</td><td>";
					$sql = "SELECT fileid,filename,filetype FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid=0 AND filetype = 'TEMPLATE_HTML_FORM'";
					$result = mcq($sql,$db);
					print "<SELECT NAME='ENTITYEDITFORM'><option value='Default'>Default</option>";
					while ($row = mysql_fetch_array($result)) {
						if ($pa['ENTITYEDITFORM'] == $row['fileid']) {
							$ins = "SELECTED";
						} else {
							unset($ins);
						}
						print "<option $ins value='" . $row['fileid'] . "'>" . $row['filename'] . "</option>";
					}
					print "</SELECT></td></tr>";
				}
	print "<tr><td colspan='2'><br><input type='submit' value='Apply changes' name='submitted'>&nbsp;&nbsp;<input type='button' value='Delete this profile' onclick=\"document.location='userprofile.php?dprof=" . $_REQUEST['EditProfile'] . "'\"><br><br><img src='arrow.gif'>&nbsp;<a href='admin.php?userman=1&password=' class='bigsort'>back</a></td></tr>";
	
	if (is_numeric($_REQUEST['EditProfile'])) {
		$members = GetProfileMembers($_REQUEST['EditProfile']);

		if (sizeof($members) > 0) {
			print "<tr><td colspan=2><br><b>Members:</b><br><br><table class='crm'>";
			foreach ($members AS $user) {
				print "<tr><td>" . $user . "</td><td>" . GetUserName($user) . "</td><td>" . GetUserEmail($user) . "</td></tr>";
			}
			print "</table></td></tr>";
		}
	}
		
	print "</table></form>";
}
function PrintToolTipCode($txt, $ovrw=false) {
	if ($GLOBALS['SHOW_ADMIN_TOOLTIPS'] == "Yes" && (strlen($txt)>0)) {
		return ("onmouseover=\"return escape('<table><tr><td><img src=\'crmlogosmall.gif\'></td><td></td></tr><tr><td></td><td>" . addslashes($txt) . "</td></tr></table><br>')\"");
	} else {
		return false;
	}
}

function ShowJournal($eid) {
		global $lang;

		$a = GetClearanceLevel($GLOBALS[USERID]);
		if ($a=="full-access-own-entities") {
			$sql = "SELECT assignee FROM $GLOBALS[TBL_PREFIX]entity WHERE eid='$eid'";
			$result= mcq($sql,$db);
			$resarr=mysql_fetch_array($result);
			if ($resarr['assignee']<>$GLOBALS[USERID]) {
				$roins = "DISABLED";
				$readonly = 1;
			}
		}

		

		// First check if this is legal

		if (strtoupper($GLOBALS['EnableEntityJournaling'])<>"YES") {
			print "<img src='error.gif'>&nbsp;<font face='MS Shell Dlg'>Error! Illegal! This incident has been reported.</font>";
			log_msg("WARNING: Illegal attempt to access entity journal #$eid","");
			qlog("WARNING: Illegal attempt to access entity journal #$eid");
			EndHTML();
			exit;
		} 
	
		
		if ($_REQUEST['custid']) {
			print "<HTML><HEAD><TITLE>$title :: Journal for " . $lang['customer'] . " #" . $_REQUEST['custid'] . "</TITLE></HEAD><BODY>";
			
			print "<table class='crm2' border=1 width='100%'><tr><td colspan=3>Journal for " . $lang['customer'] . " #" . $_REQUEST['custid'] . "</td></tr><TR VALIGN=TOP><TD VALIGN=TOP><b>Time</TD><TD VALIGN='top'><b>User</TD><TD><b>Action</TD></TR>";

			$sql = "SELECT user,message,type,date_format(timestamp, '%a %M %e, %Y %H:%i') AS ts FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='" . $_REQUEST['custid'] . "' AND type='customer' ORDER BY id DESC";	
		} else {
			print "<HTML><HEAD><TITLE>$title :: Journal for entity #$eid</TITLE></HEAD><BODY>";
			print "<table class='crm2' border=1 width='100%'><tr><td colspan=3>Journal for entity #$eid</td></tr><TR VALIGN=TOP><TD VALIGN=TOP><b>Time</TD><TD VALIGN='top'><b>User</TD><TD><b>Action</TD></TR>";


			$sql = "SELECT user,message,date_format(timestamp, '%a %M %e, %Y %H:%i') AS ts FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='$eid' AND type<>'customer' ORDER BY id DESC";
		}
		$result= mcq($sql,$db);
		while ($jn= mysql_fetch_array($result)) {
			print "<tr><td VALIGN='top'>" . $jn[ts] . "</td><td VALIGN='top'>" . GetUserName($jn[user]) . "</td><td>" . ereg_replace("\n","<BR>",$jn[message]) . "</td></tr>";
			
		}	
		print "</TABLE>";
}

function AuthenticateUserWebdav ($name, $password, $repos){

	if (strstr($password,"enc_--")) {
		
		$password = ereg_replace("enc_--","",$password);

		$arg = "SELECT password, 1 AS auth, active, id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password='" . $password . "'";

	} else {
		$arg = "SELECT password, 1 AS auth, active, id FROM $GLOBALS[TBL_PREFIX]loginusers WHERE name='$name' AND password=PASSWORD('" . $password . "')";
	}

	$result = mcq($arg,$db);
	$row = mysql_fetch_array($result);

	if ($row[auth]){
		if ($row[active]=="no") {
			uselogger("WEBDAV Disabled account","");
			$ret = false;
		} else {
			$GLOBALS[USERID] = $row[id];
			uselogger("WEBDAV LOGIN - user " . $name,"");
			$ret = true;
			FetchUserLimits();
		}
	} else {
		uselogger("WEBDAV invalid","");
		$ret = false;
	}


	//system("echo 'OUT_FUNC AUTH'|logger");

	return($ret);
}
function ShowAuthHeadersWebdav($cust=" - login") {
	global $title;
	$title .= $cust;
	header('WWW-Authenticate: Basic realm="' . $title . ' WebDav"');
    header('HTTP/1.0 401 Unauthorized');
	echo "Access denied.";
}
function ShowAuthHeadersRSS($cust=" - login") {
	global $title;
	$title .= $cust;
	header('WWW-Authenticate: Basic realm="' . $title . ' RSS Feed"');
    header('HTTP/1.0 401 Unauthorized');
	echo "Access denied.";
}
function GenerateRSSFeed($FeedNumber, $MaxElements=10) {
		global $lang;
		header("Content-type: text/xml");
		$GLOBALS['CURFUNC'] = "GenerateRSSFeed::";
		qlog("Feeding RSS to client " . $_SERVER['REMOTE_ADDR']);
		$arr = unserialize($GLOBALS['RSS_FEEDS']);
		$sql = base64_decode($arr[$FeedNumber]['sql']);
		$name = base64_decode($arr[$FeedNumber]['description']);

		if ($sql == "") {
			uselogger("ERROR: (fatal) RSS Feed " . $FeedNumber . " is not defined!","");
			qlog("ERROR: (fatal) RSS Feed " . $FeedNumber . " is not defined!");
			print "ERROR: RSS Feed " . $FeedNumber . " is not defined! Contact your CRM-CTT administrator.";
			exit;
		}

//		print_r($arr);
		
		$subdir = ereg_replace("rss.php","",$_SERVER['SCRIPT_NAME']);

		if (strstr($sql,"delete") || strstr($sql,"drop") || strstr($sql,"truncate") || strstr($sql,"insert") || strstr($sql,"update") || strstr($sql,"alter")) {
			print "QUERY NOT ALLOWED - $sql";
			uselogger("RSS ERROR: Query not allowed: " . $sql . " - who is messing here??","");
			qlog("RSS ERROR: Query not allowed: " . $sql . " - who is messing here??");
			exit;
		}
		$sql = ereg_replace("@CURUSER@", $GLOBALS['USERID'], $sql);

		if ($_SERVER['HTTPS']=="on") {
			$http = "https://";
		} else {
			$http = "http://";
		}
		$link = $http . $_SERVER['SERVER_NAME'] . $subdir . "/";
		print "<?xml version=\"1.0\" encoding=\"" . $GLOBALS['CHARACTER-ENCODING'] . "\" ?>\n";
		?>
		<rss version="2.0">
		<channel>
		<title><? echo htmlspecialchars($GLOBALS['title']);?> <? echo htmlspecialchars($name);?></title> 
		<link><? echo $link;?></link> 
		<description><? echo htmlspecialchars($name);?></description> 
		<copyright>No Copyright</copyright> 
		<language>en-us</language>
		<lastBuildDate></lastBuildDate> 
		<category>News</category> 
		<ttl>1</ttl> 
		<?

		$result = mcq($sql,$db);
		while ($row = mysql_fetch_array($result)) {
			if (CheckEntityAccess($row['eid']) <> "nok") {
				print "<item>\n";
				print "<title>[" . $row['eid'] . "] " . htmlspecialchars($row['category']) . "</title>";
				print "<description><pre>";
				print $lang['customer'] . ": " . htmlspecialchars(GetCustomerName($row['CRMcustomer'])) . "\n";
				print $lang['owner'] . ": " . htmlspecialchars(GetUserName($row['owner'])) . "\n";
				print $lang['assignee'] . ": " . htmlspecialchars(GetUserName($row['assignee'])) . "\n";
				print $lang['duedate'] . ": " . htmlspecialchars(GetUserName($row['duedate'])) . "\n\n";
				print "<HR />";
				$list = GetExtraFields();

				$sql110 = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='" . $row['eid'] . "'";
				$result1 = mcq($sql110,$db);
				$num = mysql_fetch_array($result1);
			
				if (sizeof($list)>1 && $num[0]>0) {
					
				
					foreach ($list AS $field) {
							
							$sql0 = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='" . $row[eid] . "' AND deleted<>'y' AND name='" . $field['id'] . "' ORDER BY name";
		//					print $sql;

							$result8 = mcq($sql0,$db);
							$cust= mysql_fetch_array($result8);
					
							if ($field['fieldtype'] == "date") {
								$val = TransFormDate($cust[value]);
							} elseif (strstr($field['fieldtype'],"User-list")) {
								$val = GetUserName($cust['value']);
							} else {
								$val = $cust[value];
							}
							
							if (strlen($val)>0) {
								print htmlspecialchars($field['name']) . ": " . htmlspecialchars($val) . "\n";
							}
							
					}
				}
				print "<HR />";
				print ereg_replace("\n","\n",htmlspecialchars($row['content'])) . "\n";
				
				$arr = GetFileListArray($row['eid']);
				if (sizeof($arr)>0) {
					print "<HR />Files:<BR />";
					foreach ($arr AS $file) {
						print htmlspecialchars($file['filename']) . " (" . number_format($file['filesize']) . " bytes)\n";
					}
				}
				
				print "</pre></description>";
				


				print "<link>" . $link . "edit.php?e=" . $row['eid'] . "&amp;rep=" . $GLOBALS['repository_nr'] . "</link>";
				print "</item>\n";
			}
		}
		print "</channel></rss>";
}

function FirstBoot() {
	$sql = "SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "entity";
	$res = mcq($sql,$db);
	$res = mysql_fetch_array($res);
	if ($res[0] == 0) {
		print "<br><br>";
		print "<table><tr><td>&nbsp;&nbsp;</td><td>";
		print "<fieldset><legend>&nbsp;&nbsp;<img src='crmlogosmall.gif'> First boot...</legend>";

		$sql = "SELECT COUNT(*) FROM " . $GLOBALS['TBL_PREFIX'] . "settings";
		$res = mcq($sql,$db);
		$res = mysql_fetch_array($res);
		$num_settings = $res[0];
		?>
<br>		

<br><br>
As this installation appears to be empty (e.g. no customers, and no entities) this procedure<br>
assumes that you're new to CRM-CTT.<br>
<br>
To get started, you need to adjust some settings, which are listed here. The settings area <br>
can be accessed by pressing ALT-S, or by navigating to "Administration" (below) and than<br>
to "Global System Values".<br>
<br>
The manual can be accessed at all times by pressing ALT-M.<br>
<br>
To be safe and ready to go, adjust at least the following settings:<br>
<UL>
	<LI><B>ADMPASSWORD</B>:<br>
The global administration password (will be prompted for when a user *whitout* administrative<br>
rights clicks on "Administration" on the main page). Even an administrator can not use the<br>
advanced administration features until a global administration password is set!<br>
<LI><B>MIPASSWORD</B>:<br>
Management information password. When set, only people who know this password can access<br>
the management information section.<br>
<LI><B>LANGOVERRIDE</B>:<br>
If you want your users to be able to select their own language, set this to No. If you don't want<br>
your users to choose (e.g. when you use masks) set it to Yes.<br>
<LI><B>MANAGEMENTINTERFACE</B>:<br>
When set to 'on', users authenticated as a limited user will only see the restricted<br>
managementinterface with very limited priviledges. When set to 'off' limited users will not be able<br>
to log in.<br>
<LI><B>ENABLECUSTINSERT</B>:<br>
When set to �Yes�, customers which have an account are able to add entities by themselves. See<br>
also chapter �User types�.<br>
<LI><B>CRONPASSWORD</B>:<br>
The password used by the cron script to collect duedates (duedate-notify-cron). Always set a<br>
password, even if you do not use this functionality.<br>
<LI><B>Main language</B>:<br>
The system-wide default language<br>
</UL>

This CRM-CTT installation has a total of <? echo $num_settings;?> adjustable setting variables in the global setting<br>
table. Next to that, about 300 other things can be adjusted to let CRM-CTT behave like you want<br>
it to. Don't get discouraged by the large numbers; it's fairly easy. You don't have to<br>
read the whole manual - just check it if you're stuck.<br>

		<?
		print "</fieldset></td></tr></table><BR>";
	}

}


function AW_html($msg){

	$msg = addslashes($msg);
	$msg = str_replace("\n", "\\n", $msg);
	$msg = str_replace("\r", "\\r", $msg);
	$msg = htmlspecialchars($msg);

	return($msg);
}
function PrintAD($numORmsg) {
	$GLOBALS['CURFUNC'] = "PrintAD::";
	qlog("PrintAD called with message \"" . $numORmsg . "\" (no trace after this message)"); 
	print "<img src='error.gif'> Access denied (" . $numORmsg . ")";
	if (1==1) {
		print "<table><tr><td> [<a href=\"javascript:showLayer('TraceLog')\">trace</a>]";
		print "<div id='TraceLog' style='display: none'>";
		print "<pre>";
		print $GLOBALS['tracelog'];
		print "</pre>";
		print "</div></td></tr></table>";
	}
}
function AddMessage($to, $from, $body) {
	// Adds a message to the message table
	// Returns message number
	mcq("INSERT INTO " . $GLOBALS['TBL_PREFIX'] . "internalmessages(`to`, `from`, `body`, `read`) VALUES (" . $to . "," . $from . ",'" . $body . "','n')", $db);
	return(mysql_insert_id());
}
function GetMessage($user, $id = "all", $direction = "to") {
	if ($id == "all") {
		// returns all messages in an array
		if ($direction == "to") {
			$sql_ins = " WHERE `to`='" . $GLOBALS['USERID'] . "' ";
		} elseif ($direction == "from") {
			$sql_ins = " WHERE `from`='" . $GLOBALS['USERID'] . "' ";
		}
		$retarray = array();
		$res = mcq("SELECT *, date_format(time, '%a %M %e, %Y %H:%i') AS time_formatted FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages " . $sql_ins . " ORDER BY id DESC", $db);
		while ($row = mysql_fetch_array($res)) {
			array_push($retarray, $row);
		}
		return($retarray);
	} elseif (is_numeric($id)) {
		// returns 1 message row in an array
		return(db_GetRow("SELECT *, date_format(time, '%a %M %e, %Y %H:%i') AS time_formatted FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE id='" . $id . "' ORDER BY id DESC"));
	}
}

function DeleteMessage($id, $user, $direction, $readorall) {
	if ($id == "all") {
		if ($readorall == "read") {
			if ($direction == "from") {
				mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE `from`='" . $user . "' AND `read`='y'", $db);
			} elseif ($direction == "to") {
				mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE `to`='" . $user . "' AND `read`='y'", $db);
			}
		} elseif ($readorall == "all") {
			if ($direction == "from") {
				mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE `from`='" . $user . "'", $db);
			} elseif ($direction == "to") {
				mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE `to`='" . $user . "'", $db);
			}
		}
	} elseif (is_numeric($id)) {
				mcq("DELETE FROM " . $GLOBALS['TBL_PREFIX'] . "internalmessages WHERE `to`='" . $user . "' AND `id`='" . $id . "'", $db);
	}

}

function UserMessage() {
	global $lang;
	
	$to_tabs = array("inbox","new");
	
	$tabbs["inbox"] = array("index.php?UserMessage=true" => "LT: Incoming messages", "comment" => "Incoming internal messages");
	$tabbs["new"] = array("index.php?UserMessage=true&ComposeNewMessage=true" => "LT: Compose new", "comment" => "Compose a new message");
	

	if ($_REQUEST['ComposeNewMessage']) {
		$navid = "new";
	} elseif (!$_REQUEST['ViewBody']) {
		$navid = "inbox";
	}
	
	print "</table>";
	InterTabs($to_tabs, $tabbs, $navid);
	print "<table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";
	
	if ($_REQUEST['UserMessageBody'] && $_REQUEST['UserMessageTo']) {
		$msg_id = AddMessage($_REQUEST['UserMessageTo'], $GLOBALS['USERID'], $_REQUEST['UserMessageBody']);
		print "LT: Your message was send as message id " . $msg_id . "<br><br>";
	} 
	if ($_REQUEST['PurgeMessages'] == "readtome") {
		DeleteMessage("all", $GLOBALS['USERID'], "from", "read");
	} elseif ($_REQUEST['PurgeMessages'] == "alltome") {
		DeleteMessage("all", $GLOBALS['USERID'], "from", "all");
	} elseif (is_numeric($_REQUEST['PurgeMessages'])) {
		DeleteMessage($_REQUEST['PurgeMessages'], $GLOBALS['USERID'], 0, 0);
	}

	if ($_REQUEST['ComposeNewMessage']) {

		print "<fieldset>" . FB_Legend("CRM-CTT Message");
		print "<form name='UserMessageForm' method='GET'><input type='hidden' name='UserMessage' value='Yes'>";
		print "<table><tr><td>To:</td><td><select name='UserMessageTo'>";
			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE LEFT(FULLNAME,3) <> '@@@' AND active<>'no' AND id<>'" . $GLOBALS['USERID'] . "' ORDER BY FULLNAME";
			$result= mcq($sql,$db);

			while ($row= mysql_fetch_array($result)) {
				if (!trim($row[FULLNAME])== "") {
					print "<option value='" . $row['id'] . "' size='1' $a>" . $row['FULLNAME'] . "</option>";
				}
			}
		print "</select></td></tr>";
		print "<tr><td colspan=2>Message:<br><textarea cols=50 rows=10 name='UserMessageBody'></textarea>";
		print "<tr><td colspan=2><input type='submit' value='" . $lang['go'] . "'></td></tr>";
		print "</form></table>";
		print "</fieldset>";
	} else {

		print "<img src='arrow.gif'> <a href='index.php?UserMessage=true&PurgeMessages=readfromme' class='bigsort'>LT: Delete read messages from inbox</a><br>";
		print "<img src='arrow.gif'> <a href='index.php?UserMessage=true&PurgeMessages=allfromme' class='bigsort'>LT: Delete all messages from inbox</a><br>";

		print "<BR>LT: Incoming messages:<BR>";
		print "<table class='crm' width='75%'>";
		
		print "<tr><td>id</td><td>To</td><td>Date/time</td><td>Body</td><td>&nbsp;</td></tr>";
		
		$msglist = GetMessage($GLOBALS['USERID'], "all", "to");
		
		foreach ($msglist AS $msg) {
			if ($msg['read'] == "n") {
				print "<tr><td><font color='#3300FF'>" . $msg['id'] . "</font></td><td nowrap><font color='#3300FF'>" . GetUserName($msg['to']) . "</font></td><td nowrap><font color='#3300FF'>" . $msg['time_formatted'] . "</font></td><td nowrap>" . ereg_replace("\n","<BR>",$msg['body']) . "</td><td><a href='index.php?UserMessage=true&PurgeMessages=" . $msg['id'] . "'><img src='delete.gif' style='border:0'></a></td></tr>";
			} else {
				print "<tr><td>" . $msg['id'] . "</td><td nowrap>" . GetUserName($msg['to']) . "</td><td nowrap>" . $msg['time_formatted'] . "</td><td nowrap>" . ereg_replace("\n","<BR>",$msg['body']) . "</td><td><a href='index.php?UserMessage=true&PurgeMessages=" . $msg['id'] . "'><img src='delete.gif' style='border:0'></a></td></tr>";
			}
		}
		print "</table>";
	}
}
function FB_Legend($title) {
	return("<legend><img src='crmlogosmall.gif'> " . $title . "</legend>");
}

function ColorizeSQL($query) 
{ 
   if( $query == '' ) return 0; 

   global $SQL_INT; 
   if( !isset($SQL_INT) ) $SQL_INT = 0; 

   //[dv] this has to come first or you will have goofy results later. 
   $query = preg_replace("/['\"]([^'\"]*)['\"]/i", "'<FONT COLOR='#FF6600'>$1</FONT>'", $query, -1); 

   $query = str_replace( 
                           array ( 
                                   '*', 
                                   'SELECT ', 
                                   'UPDATE ', 
                                   'DELETE ', 
                                   'INSERT ', 
                                   'INTO', 
                                   'VALUES', 
                                   'FROM', 
                                   'from', 
                                   'LEFT', 
                                   'JOIN', 
                                   'WHERE', 
                                   'where',
                                   'LIMIT', 
                                   'ORDER BY', 
                                   'AND', 
                                   'OR ', //[dv] note the space. otherwise you match to 'COLOR' ;-) 
                                   'DESC', 
                                   'ASC', 
                                   'ON ' 
                                 ), 
                           array ( 
                                   "<FONT COLOR='#FF0000'><B>*</B></FONT>", 
                                   "<FONT COLOR='#00AA00'><B>SELECT</B> </FONT>", 
                                   "<FONT COLOR='#00AA00'><B>UPDATE</B> </FONT>", 
                                   "<FONT COLOR='#00AA00'><B>DELETE</B> </FONT>", 
                                   "<FONT COLOR='#00AA00'><B>INSERT</B> </FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>INTO</B></FONT>", 
                                   "<FONT COLOR='#00AA00'><B>VALUES</B></FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>FROM</B></FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>FROM</B></FONT>", 
                                   "<FONT COLOR='#00CC00'><B>LEFT</B></FONT>", 
                                   "<FONT COLOR='#00CC00'><B>JOIN</B></FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>WHERE</B></FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>WHERE</B></FONT>", 
                                   "<FONT COLOR='#AA0000'><B>LIMIT</B></FONT>", 
                                   "\n\t<FONT COLOR='#00AA00'><B>ORDER BY</B></FONT>", 
                                   "\n\t<FONT COLOR='#0000AA'><B>AND</B></FONT>", 
                                   "<FONT COLOR='#0000AA'><B>OR</B> </FONT>", 
                                   "<FONT COLOR='#0000AA'><B>DESC</B></FONT>", 
                                   "<FONT COLOR='#0000AA'><B>ASC</B></FONT>", 
                                   "<FONT COLOR='#00DD00'><B>ON</B> </FONT>" 
                                 ), 
                           $query 
                         ); 

   $SQL_INT++; 
   return("<FONT COLOR='#0000FF'><B>SQL[".$SQL_INT."]:</B>\n\t".$query."<FONT COLOR='#FF0000'>;</FONT></FONT><BR>\n"); 
} //SQL_DEBUG 
?>