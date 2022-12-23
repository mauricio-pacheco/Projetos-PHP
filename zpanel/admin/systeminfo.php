<?php
$down_one = "yes";
require_once('../database/db.php');

$colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ($_SESSION['Rank'] != 'Admin') {
	die('Uhm, nice try.');
}

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

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_update"])) && ($HTTP_POST_VARS["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE config SET domainname=%s, company=%s, support_email=%s, support_link=%s, server_smtp=%s, server_pop=%s, hide_asp=%s, installdir=%s, language=%s, ftpserver=%s, template=%s",
                       GetSQLValueString($HTTP_POST_VARS['domainname'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['company'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['support_email'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['support_link'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['server_smtp'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['server_pop'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['hide_asp'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['installdir'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['language'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['ftpserver'], "text"),					   
                       GetSQLValueString($HTTP_POST_VARS['template'], "text"));

					   
  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
  echo ("<script language=javascript>document.location.href = 'systeminfo.php?message=Updated!'</script>");
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ZPanel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../default.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#CCCCCC" topmargin="0">
<div align="center">
  <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
    <!-- fwtable fwsrc="default.png" fwbase="default.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
    <tr> 
      <td width="188"><img src="../images/templates/spacer.gif" width="188" height="1" border="0" alt=""></td>
      <td width="243"><img src="../images/templates/spacer.gif" width="243" height="1" border="0" alt=""></td>
      <td width="349"><img src="../images/templates/spacer.gif" width="349" height="1" border="0" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="2"><img name="default_r1_c1" src="../images/templates/default_r1_c1.jpg" width="188" height="208" border="0" alt=""></td>
      <td><img name="default_r1_c2" src="../images/templates/default_r1_c2.jpg" width="243" height="98" border="0" alt=""></td>
      <td><img name="default_r1_c3" src="../images/templates/default_r1_c3.jpg" width="349" height="98" border="0" alt=""></td>
    </tr>
    <tr> 
      <td><img name="default_r2_c2" src="../images/templates/default_r2_c2.jpg" width="243" height="110" border="0" alt=""></td>
      <td><img name="default_r2_c3" src="../images/templates/default_r2_c3.jpg" width="349" height="110" border="0" alt=""></td>
    </tr>
    <tr> 
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><br>
        <br>
        <p><strong><?php echo  $lang_admpages; ?></strong></p>
        <ul>
          <li><font color="#FF0000" size="2"><a class="boldlink" href="index.php"><strong><?php echo  $lang_admwelcome; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="usermanagement.php"><strong><?php echo  $lang_admusermanagement; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="systeminfo.php"><strong><?php echo  $lang_admsysinfo; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="services.php"><strong><?php echo  $lang_admsysservices; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="broadcast.php"><strong><?php echo  $lang_admbroadcast; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="packages.php"><strong><?php echo  $lang_admpackages; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="installers.php"><strong><?php echo  $lang_adminstallers; ?></strong></a></font></li>
          <li><font size="2"><a class="boldlink" href="../logout.php"><strong><?php echo  $lang_logout; ?></strong></a></font></li>
        </ul></td>
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong><?php echo  $lang_admsysinfo; ?></strong></font> <font color="#FF0000"><?php if (isset($_GET['message'])) { echo ' - '.$_GET['message']; } ?></font></p>
        <blockquote>
<form name="form1" method="post" action="<?php echo $editFormAction; ?>">
            <blockquote> 
              <p><?php echo $lang_sipath; ?>: 
                <input name="installdir" type="text" id="installdir" value="<?php echo $row_Config['installdir']; ?>">
                <font size="2"><br>
                (example: c:/inetpub/wwwroot/zpanel) *<font color="#FF0000">NO 
                TRAILING SLASH<font color="#000000">*</font></font></font></p>
              <p><?php echo $lang_sidomain; ?>: 
                <input name="domainname" type="text" id="domainname" value="<?php echo $row_Config['domainname']; ?>">
                <font size="2"><br>
                (example: zee-way.com)</font></p>
              <p><?php echo $lang_sicompany; ?>: 
                <input name="company" type="text" id="company" value="<?php echo $row_Config['company']; ?>">
                <font size="2"><br>
                </font> <font size="2">(example: Zee-Way Services)</font></p>
              <p> <?php echo $lang_sisupportemail; ?>: 
                <input name="support_email" type="text" id="support_email" value="<?php echo $row_Config['support_email']; ?>">
                <font size="2"><br>
                (example: support@zee-way.com)</font></p>
              <p><?php echo $lang_sisupportlink; ?>: 
                <input name="support_link" type="text" id="support_link" value="<?php echo $row_Config['support_link']; ?>">
                <font size="2"><br>
                </font> <font size="2"><font size="2">(example: maito:support@zee-way.com 
                or http://www.zee-way.com/contact.php)</font></font></p>
              <p><?php echo $lang_sipop3; ?>: 
                <input name="server_pop" type="text" id="server_pop" value="<?php echo $row_Config['server_pop']; ?>">
                <font size="2"><br>
                </font> <font size="2"><font size="2">(example: pop.zee-way.com)</font> 
                </font></p>
              <p><?php echo $lang_sismtp; ?>: 
                <input name="server_smtp" type="text" id="server_smtp" value="<?php echo $row_Config['server_smtp']; ?>">
                <font size="2"><br>
                </font> <font size="2"><font size="2">(example: smtp.zee-way.com)</font></font></p>
              <p><?php echo $lang_siftp; ?>: 
                <input name="ftpserver" type="text" id="ftpserver" value="<?php echo $row_Config['ftpserver']; ?>">
                <font size="2"><br>
                </font> <font size="2"><font size="2">(example: ftp.zee-way.com)</font></font></p>
              <p>Language: 
                <select name="language" id="language">
                  <?php
	$maindir = $row_Config['installdir']."/languages" ;
	$mydir = opendir($maindir) ; 
	$exclude = array( "." , ".." , "Thumbs.db") ;
	while($fn = readdir($mydir)) {
	if ($fn == $exclude[0] || $fn == $exclude[1]) continue; 
	if ($row_Config['language'] == "$fn") {
		$selected = " selected";
	}else{
		$selected = "";
	}
	echo "<option value=$fn$selected>$fn</option>"; }
	closedir($mydir);
?>
                </select>
              </p>
              <p>Template: 
                <select name="template" id="template"><?php
	$maindir = $row_Config['installdir']."/templates" ;
	$mydir = opendir($maindir) ; 
	$exclude = array( "." , ".." , "Thumbs.db") ;
	while($fn = readdir($mydir)) {
	if ($fn == $exclude[0] || $fn == $exclude[1]) continue; 
	if ($row_Config['language'] == "$fn") {
		$selected = " selected";
	}else{
		$selected = "";
	}
	echo "<option value=$fn$selected>$fn</option>"; }
	closedir($mydir);
?></select></p>
            </blockquote>
          <p>&nbsp;</p>
            <div align="right">
			  <input name="MM_update" type="hidden" value="form1"> 
			  <input name="id" type="hidden" value="1"> 
              <input class="inputbox" type="submit" name="Submit" value="<?php echo $lang_update; ?>" onsubmit>
            </div>
          </form>
        </blockquote></td>
    </tr>
    <tr align="center" valign="bottom"> 
      <td height="43" colspan="3" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><img src="../images/templates/default_footer.gif" width="780" height="35" border="0" usemap="#Map"></td>
    </tr>
  </table>
</div>
<map name="Map">
  <area shape="rect" coords="546,5,776,29" href="http://www.zee-way.com" target="_blank">
</map>
</body>
</html>