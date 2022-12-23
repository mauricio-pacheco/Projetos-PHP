<?php
$down_one = "yes";
require_once('../database/db.php');

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
  $updateSQL = sprintf("UPDATE config SET admin_name=%s, admin_username=%s, admin_password=%s",
                       GetSQLValueString($HTTP_POST_VARS['admin_name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['admin_username'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['admin_password'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
  
  $updateSQL = sprintf("INSERT INTO `custumerbase` VALUES (111, '".$HTTP_POST_VARS['admin_username']."', '".$HTTP_POST_VARS['admin_name']."', 'Admin', 'admin@domain.com', NULL, '".$HTTP_POST_VARS['admin_password']."', NULL, NULL, NULL, NULL, NULL, 'Unlimited', NULL, NULL, NULL, 'Active', 'c:/inetpub/wwwroot/', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', '0000-00-00 00:00:00', NULL, NULL, 'mydomain.com');");

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());  
  
  echo ("<script language=javascript>alert ('All Updated!')</script>");
  echo ("<script language=javascript>document.location.href = 'install4.php'</script>");
}
if ($row_Config['installed'] == '1') {
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
        <br><ul>
          <li><font color="#999999"><strong>Welcome to ZPanel</strong></font></li>
          <li><strong><font color="#999999">Setup Database</font></strong></li>
          <li><strong><font color="#FF0000">Setup Admin</font></strong></li>
          <li><strong>Setup System Info.</strong></li>
          <li><strong>Customize Packages</strong></li>
          <li><strong>Finished!</strong></li>
        </ul>
        <strong>Step 3 of 6</strong><br>
        <table width="143" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#F4F4F4">
          <tr> 
            <td height="25" align="left" valign="top"><font color="#0000FF"><strong><font color="#FF0000">|||</font></strong></font><font color="#FF0000"><strong>||||||</strong></font><strong><font color="#FF0000">|||||||||||||||</font>||||||||||||||||||||||</strong></td>
          </tr>
        </table></td>
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong>Setup 
          3: Setup Admin</strong></font></p>
        <blockquote> 
          <p></p>
          <p>Please update the current information that will be used as your admin 
            account:</p>
          <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
            <blockquote> Your Name: 
              <input name="admin_name" type="text" id="admin_name">
              <br>
              Your Username: 
              <input name="admin_username" type="text" id="admin_username">
              <br>
              Your Password: 
              <input name="admin_password" type="text" id="admin_password">
              <font size="2">*warning, not masked.</font></blockquote>
          <p>&nbsp;</p>
            <div align="right">
			  <input name="MM_update" type="hidden" value="form1"> 
			  <input name="id" type="hidden" value="1">
			  <input name="Rank" type="hidden" value="Admin"> 
              <input class="inputbox" type="submit" name="Submit" value="Continue" onsubmit>
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