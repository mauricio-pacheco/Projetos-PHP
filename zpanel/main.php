<?php
require_once ('database/db.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="default.css" rel="stylesheet" type="text/css">
</head>

<body>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php
if ($_SESSION['username'] == "") {
	die("You are not logged in...<br><br><p align=center><font size=2>[ <a href=index.php target=_parent>Go To Login</a> ]</font></p>");
}
if (isset($row_Config['broadcastmessage'])) {
	if ($row_Config['broadcastmessage'] <> '') {
		echo '<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF0000"><tr><td><strong>Message from the administration:</strong> '.$row_Config['broadcastmessage'].'</td></tr></table><br>';
	}
}
?>
</font>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="top"> 
    <td width="25%" height="50"><font size="2"><a href="?page=install"><img src="images/icons/addon.gif" alt="Install Scripts" width="32" height="32" border="0"></a><br>
      Install Scripts</font></td>
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=install-execute&script=phpBB"><img src="images/icons/forum.gif" alt="Bulletin Board" width="32" height="32" border="0"></a><br>
      Bulletin Board</font></td>
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=serverinfo"><img src="images/icons/server.gif" alt="Server Information" width="32" height="32" border="0"></a><br>
      Server Information</font></td>
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=helpfulscripts"><img src="images/icons/webftpstats.gif" alt="Helpful Scripts" width="32" height="32" border="0"></a><br>
      Helpful Scripts</font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=install-execute&script=phpOpenChat"><img src="images/icons/chat.gif" alt="Chat Service" width="32" height="32" border="0"></a><br>
      Install Chat</font></td>
    <td width="25%"><font size="2">&nbsp;<a href="?page=email"><img src="images/icons/email.gif" alt="E-Mail" width="32" height="32" border="0"></a><br>
      <font size="2">E-Mail</font></font></td>
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=mysql"><img src="images/icons/mysql.gif" alt="MySQL Config" width="45" height="31" border="0"></a><br>
      MySQL Config</font></td>
    <td width="25%"><font size="2">&nbsp; <a href="?page=serverstatus"><img src="images/icons/status.gif" alt="Server Status" width="32" height="32" border="0"></a><br>
      Server Status</font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
    <td width="25%" height="1"><font size="2">&nbsp;</font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td width="25%" height="50"><font size="2">&nbsp;<a href="?page=billing"><img src="images/icons/cgicenter.gif" width="32" height="32" border="0"></a><br>
      Billing Info.</font></td>
    <td width="25%" height="50"><font size="2">&nbsp; <a href="?page=diskusage"><img src="images/icons/usage.gif" alt="Disk Usage" width="32" height="32" border="0"></a><br>
      Disk Usage</font></td>
    <td width="25%" height="50"><font size="2">&nbsp; <a href="?page=nettools"><img src="images/icons/nettools.gif" alt="Network Tools" width="32" height="32" border="0"></a><br>
      Network Tools</font></td>
    <td width="25%" height="50"><p><font size="2"><a href="?page=profile"><img src="images/icons/profile.gif" alt="My Profile" width="32" height="32" border="0"></a><br>
        My Profile</font></p></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="1"><font size="2">&nbsp;</font></td>
    <td height="1"><font size="2">&nbsp;</font></td>
    <td height="1"><font size="2">&nbsp;</font></td>
    <td height="1"><font size="2">&nbsp;</font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="40"><font size="2"> 
      <form action="filemanager/index.php" method="post" name="LoginForm" target="_blank" id="LoginForm">
        <input type="hidden" name="input_ftpserver" value="<?php echo $row_Config['ftpserver']; ?>">
        <input type="hidden" name="input_ftpserverport" value="21">
        <input type="hidden" name="input_username" value="<?php echo $_SESSION['username']; ?>">
        <input type="hidden" name="input_password" value="<?php echo $_SESSION['password']; ?>">
        <input type="hidden" name="input_skin" value="1">
        <input type="hidden" name="state" value="browse">
        <input type="hidden" name="state2" value="main">
        <input type="hidden" name="cookiesetonlogin" value="yes">
        <a href="javascript:void(document.LoginForm.submit())"><img src="images/icons/fileman.gif" alt="File Manager" width="32" height="32" border="0"></a><br>
        <font size="2">File Manager </font> 
      </form>
      </font></td>
    <td height="40"><font size="2">&nbsp; <a href="?page=privatemessage"><img src="images/icons/chat.gif" alt="Private Messages" width="32" height="32" border="0"></a><br>
      Private Messages</font></td>
    <td height="40"><font size="2"> 
      <?php if (($_SESSION['Rank'] == "Rep") || ($_SESSION['Rank'] == "Admin") || ($_SESSION['Rank'] == "Power User")) {
	echo('<a href=?page=accountlookup><img src=images/icons/passprotection.gif width=32 height=32 border=0></a><br>Account Lookup');
}else{
	echo('&nbsp;');
}
?>
      </font></td>
    <td height="40"><font size="2">&nbsp; 
      <?php if (($_SESSION['Rank'] == "Admin") || ($_SESSION['Rank'] == "Power User")) {
	echo('<a href=?page=mailinglist><img src=images/icons/email.gif width=32 height=32 border=0></a><br>Mass E-Mail');
}else{
	echo('&nbsp;');
}
?>
      </font></td>
  </tr>
  <tr align="center" valign="top"> 
    <td width="25%" height="15">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
