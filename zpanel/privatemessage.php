<?php
//include('database/db.php');

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$colname_UserSettings = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_UserSettings = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_UserSettings);
$UserSettings = mysql_query($query_UserSettings, $Customer_Database);
$row_UserSettings = mysql_fetch_assoc($UserSettings);

$colname_BuddyList = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_BuddyList = sprintf("SELECT * FROM buddylists WHERE listowner = '".$_SESSION['username']."'", $colname_BuddyList);
$BuddyList = mysql_query($query_BuddyList, $Customer_Database);
$row_BuddyList = mysql_fetch_assoc($BuddyList);
$totalRows_BuddyList = mysql_num_rows($BuddyList);

$colname_BuddyList2 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_BuddyList2 = sprintf("SELECT * FROM buddylists WHERE listowner = '".$_SESSION['username']."'", $colname_BuddyList2);
$BuddyList2 = mysql_query($query_BuddyList2, $Customer_Database);
$row_BuddyList2 = mysql_fetch_assoc($BuddyList2);
$totalRows_BuddyList2 = mysql_num_rows($BuddyList2);

$colname_PrivateMessages = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_PrivateMessages = sprintf("SELECT * FROM privatemessages WHERE whoto = '".$_SESSION['username']."'", $colname_PrivateMessages);
$PrivateMessages = mysql_query($query_PrivateMessages, $Customer_Database);
if (!$PrivateMessages) {
	echo mysql_error();
}else{
$row_PrivateMessages = mysql_fetch_assoc($PrivateMessages);
$totalRows_PrivateMessages = mysql_num_rows($PrivateMessages);
}

if (isset($_GET['action'])) {
if ($_GET['action'] == 'deletemessage') {
	$colname_message = "1";
	mysql_select_db($database_Customer_Database, $Customer_Database);
	$query_message = sprintf("SELECT * FROM privatemessages WHERE messageid = '".$_GET['id']."'", $colname_message);
	$message = mysql_query($query_message, $Customer_Database);
	$row_message= mysql_fetch_assoc($message);

	if ($row_message['whoto'] == $_SESSION['username']) {
		mysql_select_db($database_Customer_Database, $Customer_Database);
		$updateSQL = sprintf("DELETE FROM privatemessages WHERE messageid = '".$_GET['id']."'");
		$Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
		echo ("<script language=javascript>document.location.href = '?page=privatemessage'</script>");
	}else{
		echo ("<script language=javascript>alert('The message you are trying to delete does not belong to you.')</script>");
		echo ("<script language=javascript>document.location.href = '?page=privatemessage'</script>");
	}
}
if ($_GET['action'] == 'deletebuddy') {
		mysql_select_db($database_Customer_Database, $Customer_Database);
		$updateSQL = sprintf("DELETE FROM buddylists WHERE buddyid = '".$_POST['toremove']."'");
		$Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
		echo ("<script language=javascript>document.location.href = 'privatemessage.php'</script>");
}
if ($_GET['action'] == 'sendmessage') {

	$colname_CheckUser = "1";
	mysql_select_db($database_Customer_Database, $Customer_Database);
	$query_CheckUser = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$HTTP_POST_VARS['to']."'", $colname_CheckUser);
	$CheckUser = mysql_query($query_CheckUser, $Customer_Database);
	$row_CheckUser= mysql_fetch_assoc($CheckUser);

	if (isset($row_CheckUser['id'])) {
	
	$restrictions1 = ereg_replace('<?php', '', $HTTP_POST_VARS['message']); //disallow php open tag
	$restrictions2 = ereg_replace('<', '', $restrictions1); //disallow HTML open tag
	$message2send = ereg_replace('>', '', $restrictions2); //disallow HTML end tag
	
	$updateSQL = sprintf("INSERT INTO privatemessages (whoto, whofrom, message) VALUES (%s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['to'], "text"),
                       GetSQLValueString($_SESSION['username'], "text"),
                       GetSQLValueString($message2send, "text"));

	mysql_select_db($database_Customer_Database, $Customer_Database);
	$Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
	echo ("<script language=javascript>document.location.href = '?page=privatemessage'</script>");
	}else{
		echo ("<script language=javascript>alert('That user does not exist!')</script>");
	}
}
if ($_GET['action'] == 'addbuddy') {

	$colname_CheckUser = "1";
	mysql_select_db($database_Customer_Database, $Customer_Database);
	$query_CheckUser = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$HTTP_POST_VARS['buddy']."'", $colname_CheckUser);
	$CheckUser = mysql_query($query_CheckUser, $Customer_Database);
	$row_CheckUser= mysql_fetch_assoc($CheckUser);

	if (isset($row_CheckUser['id'])) {
	$updateSQL = sprintf("INSERT INTO buddylists (listowner, buddy) VALUES (%s, %s)",
                       GetSQLValueString($_SESSION['username'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['buddy'], "text"));

	mysql_select_db($database_Customer_Database, $Customer_Database);
	$Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
	
	echo ("<script language=javascript>document.location.href = '?page=privatemessage'</script>");
	
	}else{
		echo ("<script language=javascript>alert('That user does not exist!')</script>");
	}
}
}


function convert_timestamp ($timestamp, $adjust="") {
   $timestring = substr($timestamp,0,8)." ".
                 substr($timestamp,8,2).":".
                 substr($timestamp,10,2).":".
                 substr($timestamp,12,2);
   return strtotime($timestring." $adjust");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="default.css" rel="stylesheet" type="text/css">
</head>

<body>
<p><img src="images/icons/chat.gif" width="32" height="32"> <b><font size="5" face="Times New Roman, Times, serif"><?php echo $lang_privatemessages; ?></font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
  </font><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_pmdesc; ?></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td bgcolor="#999999"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><?php echo $lang_yourmessages; ?></strong></font></td>
  </tr>
  <tr> 
    <td align="left" valign="top"> 
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="16%" bgcolor="#CCCCCC"><font size="2"><?php echo $lang_date; ?></font></td>
          <td width="16%" bgcolor="#CCCCCC"><font size="2"><?php echo $lang_from; ?></font></td>
          <td width="63%" bgcolor="#CCCCCC"> <div align="left"><font size="2"><?php echo $lang_message; ?></font></div></td>
          <td width="5%" bgcolor="#CCCCCC"> <div align="center"><font size="2"><?php echo $lang_delete; ?></font></div></td>
        </tr>
<?php if (!$PrivateMessages) { ?>
       <tr> 
          <td colspan="4"><center>
              <font size="2"><?php echo $lang_nomessages; ?></font>
</center></td>
        </tr>
<?php  }else{ ?>
<?php do {
ini_set('display_errors','0'); 

$timestamp = strtotime($row_PrivateMessages['timestamp']);
?>
        <tr> 
          <td><font size="2"><?php echo date('M d, Y <br> h:i:s A', convert_timestamp($row_PrivateMessages['timestamp'])); ?></font></td>
          <td><font size="2"><?php echo $row_PrivateMessages['whofrom']; ?></font></td>
          <td><font size="2"><?php echo $row_PrivateMessages['message']; ?></font></td>
          <td><div align="center"><font size="2"><a href="?page=privatemessage&action=deletemessage&id=<?php echo $row_PrivateMessages['messageid']; ?>">[ 
              x ]</a></font></div></td>
        </tr>
<?php } while ($row_PrivateMessages = mysql_fetch_assoc($PrivateMessages)); } ?>
      </table>
    </td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top"> 
    <td width="56%" height="174"> 
      <form action="?page=privatemessage&action=sendmessage" method="post" name="sendmessage" id="sendmessage">
        <p><font size="2"><?php echo $lang_from; ?></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">: 
          <strong><?php echo $row_UserSettings['name']; ?></strong> (<?php echo $_SESSION['username']; ?>)<br>
          </font><font size="2"><?php echo $lang_to; ?></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">: 
          <select name="to" id="to">
            <?php do { ?>
            <option><?php echo $row_BuddyList['buddy']; ?></option>
            <?php } while ($row_BuddyList = mysql_fetch_assoc($BuddyList)); ?>
          </select>
          </font></p>
        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
          <textarea name="message" cols="30" rows="5" id="message"></textarea>
          <br>
          <input type="submit" name="Submit" value="Send Message">
          </font></p>
        <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Note</strong>: 
          The following are not allowed in your message for security reasons: 
          &lt;?php, &lt;, &gt;. They will be automatically deleted in your message.</font></p>
        </form>
    </td>
    <td width="44%"><form action="?page=privatemessage&action=addbuddy" method="post" name="addfriend" id="addfriend">
        <strong><font size="2"><?php echo $lang_addfriend; ?></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
        </font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="buddy" type="text" id="buddy">
          <input type="submit" name="Submit2" value="<?php echo $lang_add; ?>">
          </font>
        </form>
      <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
      </font></strong> </font> <form action="?page=privatemessage&action=deletebuddy" method="post" name="addfriend" id="addfriend">
        <font size="2"><?php echo $lang_removefriend; ?></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong></strong> 
        <br>
        <select name="toremove" id="toremove">
          <?php do { ?>
          <option value="<?php echo $row_BuddyList2['buddyid']; ?>"><?php echo $row_BuddyList2['buddy']; ?></option>
          <?php } while ($row_BuddyList2 = mysql_fetch_assoc($BuddyList2)); ?>
        </select>
        <input type="submit" name="Submit2" value="<?php echo $lang_remove; ?>">
        </font> 
      </form>
      <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
        <br>
        <a href="?page=privatemessage"><?php echo $lang_refreshmessages; ?></a></font></div></td>
  </tr>
</table>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
</body>
</html>
