<?
ob_start();
$n_E = extract($_REQUEST);

$browser="$User-Agent";
if ($logout=="1"){
  $session = $_COOKIE['session'];
  qlog("Autor::Este usuário deslogou");
  SetCookie("session","",time()-500); 
  uselogger("Logoff $name","");
  $sql = "DELETE FROM $GLOBALS[TBL_PREFIX]sessions WHERE temp = '$session'";
  mcq($sql,$db);

  if ($expire) {
		$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]settings WHERE setting='timeout'";
		$result= mcq($sql,$db);
		$result= mysql_fetch_array($result);
		$timeout = $result[value];
		include("language.php");
		DisplayLoginForm($lang[signedoffdue1] . "&nbsp;" . $timeout . "&nbsp;" . $lang[signedoffdue2]);	
  } else {
	  include("language.php");
	  DisplayLoginForm($lang[signedoff]);
  }
} elseif ($session){
	
	
    $actuser=ActiveUser ($session);
	$GLOBALS['session_id'] = $session;
	$name= $actuser;
	$GLOBALS['username'] = $actuser;
	$GLOBALS['USERNAME'] = $actuser;
	$GLOBALS['USERID']   = GetUserID($actuser);

	//uselogger("","$name");
}
elseif ($name){

	AuthenticateUser($name, $password, $silent);
	uselogger("Authenticate $name","Authenticate $name");
	qlog("Auth3::User $name logged in");
	$GLOBALS['username'] = $name;
	$GLOBALS['USERNAME'] = $name;
	$GLOBALS['USERID']   = GetUserID($name);

	if ($GLOBALS['USE_EXTENDED_CACHE']) {
		$uri = urlencode($_SERVER['REQUEST_URI']);
		if (trim($uri) == "") {
			$uri = "index.php";
		}
	?>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
			document.write('<link href="crm_dft.css" rel="stylesheet" type="text/css">');
			setTimeout('continueNow()',20000);

			function continueNow() {
					document.location = "<? echo $_REQUEST['urltogo'];?>";
			}
		//-->
		</SCRIPT>
		
		<center>
		<table width=100% height=100%><tr><td valign='center'><center>
		<img src='crm.gif'><br>
		<img src='movingbar.gif'>
		<br>Por favor espere...
		</center></td></tr></table></center>
		<iframe height=1 width=1 src='index.php?UpdateCacheTables=do&urltogo=<? echo $uri;?>'></iframe>
		<?
	}

	$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]settings WHERE setting = 'Logon message'";
	$result= mcq($sql,$db);
	$result= mysql_fetch_array($result);
	$logonmsg = $result[value];
	
	if (trim($logonmsg)<>"") {
		include("language.php");
		$logonmsg = $lang[sysmsg] . ":\\n\\n" . $logonmsg;
		
		?>
			<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
			<!--
			alert("<? echo $logonmsg;?>");
			//-->
			</SCRIPT>
		<?
	}
	if ($GLOBALS['USE_EXTENDED_CACHE']) {
		EndHTML();
		exit;
	}
	$session = $md5str;
	
}
else {
	include("language.php");
	DisplayLoginForm($lang[pleaseenter]);
}

function uselogger($comment,$dummy_extra_not_used){
	global $REMOTE_ADDR, $HTTP_SERVER_VARS, $actuser, $username, $user, $HTTP_USER_AGENT,$name,$logqueries;
	
	qlog(">>>>> VELHA FUNÇÃO DE LOGIN EM USO");
	
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

	$txt_to_email = "Endereço IP: $ip<BR>Página: $url<BR>Repository:" . $GLOBALS['title'] . "<BR>Usuário: $name<BR>Mensagem:<BR><b>$qs</b>";

	if (stristr($qs,"warning")) {
		ProcessTriggers("log_warning",0,"Administrative trigger",$txt_to_email);
	}
	if (stristr($qs,"error")) {
		ProcessTriggers("log_error",0,"Administrative trigger",$txt_to_email);
	}

	if ($GLOBALS['logqueries']) {
		qlog("'$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name'");
	}
}

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
?>