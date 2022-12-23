<?
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2004 Hidde Fennema (hidde@it-combine.com)
 * Licensed under the GNU GPL. For full terms see http://www.gnu.org/
 *
 * This is the duedate notifier
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */
extract($_REQUEST);
$c_l = "1";
include ("config.inc.php");
include ("getset.php");
include ("language.php");

print "<pre>\n\n";

if ($password<>$GLOBALS['cronpassword']) {
    print "Incorrect user authentication string for this repository. Quitting.\n\n";
	exit;
}

if (!$reposnr) {
	print "WARNING!\n\nNo repository number submitted (or the value = 0, which doesn't get passed to the webserver). Assuming repos# 0!\n\n";
	$reposnr=0;
} 

$db = mysql_connect($host[$reposnr], $user[$reposnr], $pass[$reposnr]);
mysql_select_db($database[$reposnr],$db);

$webhost = getenv("HOSTNAME");

// Check for alarm dates in the calendar table:
CheckForAlarmDates();

// Check for duedates to trigger in the entity table:

      // >X - Initialize this variable so the display looks good when 0 triggers fired.
      $trgd = 0;

	$sqldate = date('Y-m-d');
	qlog(" Due date is . $sqldate");
	$sql = "SELECT eid FROM $GLOBALS[TBL_PREFIX]entity WHERE sqldate='" . $sqldate . "'";
	$result= mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
              // >X - the following line has been added to clear out the array of
              // E-mail messages sent for each ticket.  Without it, each user will
              // only receive one E-mail per time this script is run, no matter how
              // many tickets they have due.
              unset ($GLOBALS['email_send_to']);
		ProcessTriggers("duedate_reached",$row['eid'],"Miscellaneous trigger");
		qlog("Enabling due-date trigger for entity " . $row['eid']);
		$trgd++;
	}

print "--------------------------------------------------------------------\n";
print $trgd . " triggers fired (duedate reached)\n";
print "--------------------------------------------------------------------\n";
SendPersonificatedDailyOverviewMail();

print "\n</pre>\n";

// Journalling function (Entity ID, Message)
function journal($eid,$msg,$JournalType="entity") {
	global $EnableEntityJournaling;
	if (strtoupper($EnableEntityJournaling)=="YES" || (stristr($msg,"[admin]"))) {
		
		$msg = addslashes($msg);

		// $msg = base64_encode($msg);

		$sql = "INSERT INTO " . $GLOBALS[TBL_PREFIX] ."journal (eid,user,message,type) VALUES('$eid','" . $GLOBALS[USERID] . "','$msg','" . $JournalType ."')";

		mcq($sql,$db);
	}
}
function uselogger($comment,$dummy_extra_not_used){
	global $REMOTE_ADDR, $HTTP_SERVER_VARS, $actuser, $username, $user, $HTTP_USER_AGENT,$name,$logqueries;
		
		// here comes the mail trigger
	


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

	if ($logqueries) {
		qlog("'$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name'");
	}
}
?>
