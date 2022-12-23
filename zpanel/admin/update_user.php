<?php
$down_one = "yes";
require_once('../database/db.php');
 
 $colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ($_SESSION['Rank'] != 'Admin' && $_SESSION['Rank'] != 'Power User') {
	die('Uhm, nice try.');
}

 $colname_Users = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Users = sprintf("SELECT * FROM custumerbase WHERE id = '".$_GET['user']."'", $colname_Users);
 $Users = mysql_query($query_Users, $Customer_Database) or die(mysql_error());
 $row_Users = mysql_fetch_assoc($Users);
 $totalRows_Users = mysql_num_rows($Users);

 $colname_Packages = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Packages = sprintf("SELECT * FROM packages", $colname_Packages);
 $Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
 $row_Packages = mysql_fetch_assoc($Packages);
 $totalRows_Packages = mysql_num_rows($Packages);
 
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
  $updateSQL = sprintf("UPDATE custumerbase SET servicename=%s, name=%s, Rank=%s, email=%s, adminemail=%s, ftppass=%s, address=%s, city=%s, zip=%s, state=%s, phone=%s, webservice=%s, status=%s, homedir=%s, mysqluser=%s, mysqlpass=%s, mysqldatabases=%s, notes=%s, PaidTill=%s, url=%s WHERE id=%s",
                       GetSQLValueString($HTTP_POST_VARS['servicename'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['Rank'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['email'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['adminemail'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['ftppass'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['address'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['city'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['zip'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['state'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['phone'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['webservice'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['status'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['homedir'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqluser'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqlpass'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqldatabases'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['notes'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['PaidTill'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['url'], "text"),
					   GetSQLValueString($HTTP_POST_VARS['id'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());

  echo ("<script language=javascript>alert ('User Updated!')</script>");
  echo ("<script language=javascript>window.close()</script>");
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?><html>
<head>
<title><?php echo $lang_btnupdateuser; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" height="168" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="168" align="left" valign="top"> 
      <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
        <p><strong><img src="../images/icons/password.gif" width="32" height="32" align="absmiddle"> <?php echo $lang_btnupdateuser; ?></strong></p>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="277"><font size="2"><strong><?php echo $lang_servicename; ?>:</strong> 
              <input name="servicename" type="text" id="servicename" value="<?php echo $row_Users['servicename']; ?>">
              <br>
              <font size="1">- should match their username on your FTP server. 
              (ex. demo)</font></font></td>
            <td width="313"><font size="2"><strong><?php echo $lang_password; ?>:</strong> 
              <input name="ftppass" type="text" id="ftppass" value="<?php echo $row_Users['ftppass']; ?>">
              <br>
              <font size="1">- should match their password on your FTP server. 
              (ex. demo)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_name; ?>: </strong> 
              <input name="name" type="text" id="name3" value="<?php echo $row_Users['name']; ?>">
              <br>
              <font size="1">(ex. Demo User) </font></font></td>
            <td><font size="2"><strong><?php echo $lang_youremail; ?>:</strong> 
              <input name="email" type="text" id="email2" value="<?php echo $row_Users['email']; ?>">
              <br>
              <font size="1">-the client's main e-mail address (ex. demo)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2"><strong><?php echo $lang_url; ?>: </strong> 
              <input name="url" type="text" id="name" value="<?php echo $row_Users['url']; ?>">
              <br>
              <font size="1">(examples: http://demo.zee-way.com OR http://www.zee-way.com/hosted/demo) 
              *DO NOT PUT A TRAILING SLASH / *</font></font><font size="2">&nbsp;</font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_rank; ?>:</strong> 
              <select name="Rank" id="select">
                <?php if ($_SESSION['Rank'] == 'Admin') { ?>
                <option<?php if ($row_Users['Rank'] == "Admin") { echo ' selected'; } ?>>Admin</option>
                <option<?php if ($row_Users['Rank'] == "Power User") { echo ' selected'; } ?>>Power 
                User</option>
                <? } ?>
                <option<?php if ($row_Users['Rank'] == "Rep") { echo ' selected'; } ?>>Rep</option>
                <option<?php if ($row_Users['Rank'] == "User") { echo ' selected'; } ?>>User</option>
              </select>
              </font></td>
            <td><font size="2"><strong><?php echo $lang_adminemails; ?>:</strong> 
              <input name="adminemail" type="text" id="adminemail" value="<?php echo $row_Users['adminemail']; ?>">
              <br>
              <font size="1">- e-mail addresses allowed to make changes to this 
              account with your tech support. Seperate by commas. (ex. demo)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_webpackage; ?>:</strong> 
              <select name="webservice" id="webservice">
                <?php do { ?>
                <option<?php if ($row_Packages['package_name'] == $row_Users['webpackage']) { echo ' selected'; } ?>><?php echo $row_Packages['package_name']; ?></option>
                <?php } while ($row_Packages = mysql_fetch_assoc($Packages)); ?>
              </select>
              </font></td>
            <td><font size="2"><strong><?php echo $lang_homedir; ?>:</strong> 
              <input name="homedir" type="text" id="homedir" value="<?php echo $row_Users['homedir']; ?>">
              <br>
              <font size="1"> (ex. c:/wwwroot/zpanel/hosted/user) * DO NOT PUT 
              A TRAILING SLASH / *</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_status; ?>:</strong> 
              <select name="status" id="status">
                <option<?php if ($row_Users['status'] == 'Active') { echo ' selected'; } ?>>Active</option>
                <option<?php if ($row_Users['status'] == 'Suspended') { echo ' selected'; } ?>>Suspended</option>
                <option<?php if ($row_Users['status'] == 'Marked For Deletion') { echo ' selected'; } ?>>Marked For Deletion</option>
              </select>
              </font></td>
            <td><font size="2"><strong><?php echo $lang_paidtill; ?>:</strong> 
              <input name="PaidTill" type="text" id="PaidTill" value="<?php echo $row_Users['PaidTill']; ?>">
              <br>
              <font size="1">-format: YYYY-MM-DD (ex.2004-01-12)</font> </font></td>
          </tr>
        </table>
        <hr>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="273"><font size="2"><strong>Address:</strong> 
              <input name="address" type="text" id="servicename3" value="<?php echo $row_Users['address']; ?>">
              </font></td>
            <td width="317"><font size="2"><strong>State:</strong> 
              <input name="state" type="text" id="state" value="<?php echo $row_Users['state']; ?>" size="3">
              <strong>Zip Code:</strong> 
              <input name="zip" type="text" id="address3" value="<?php echo $row_Users['zip']; ?>" size="10">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong>City:</strong> 
              <input name="city" type="text" id="address" value="<?php echo $row_Users['city']; ?>">
              </font></td>
            <td><font size="2"><strong>Phone:</strong> 
              <input name="phone" type="text" id="address4" value="<?php echo $row_Users['phone']; ?>">
              </font></td>
          </tr>
        </table>
        <hr>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="275"><font size="2"><strong>MySQL User:</strong> 
              <input name="mysqluser" type="text" id="address5" value="<?php echo $row_Users['mysqluser']; ?>">
              </font></td>
            <td width="315"><font size="2"><strong>MySQL Databases:</strong> 
              <input name="mysqldatabases" type="text" id="mysqlpass" value="<?php echo $row_Users['mysqlpass']; ?>">
              <br>
              <font size="1">- Seperate by commas</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong>MySQL Pass:</strong> 
              <input name="mysqlpass" type="text" id="mysqluser" value="<?php echo $row_Users['mysqlpass']; ?>">
              </font></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <hr>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="117"><strong><?php echo $lang_accountnotes; ?>:</strong></td>
            <td width="473"><textarea name="notes" cols="45" wrap="VIRTUAL" id="notes"><?php echo $row_Users['notes']; ?></textarea>
            </td>
          </tr>
        </table>
        <p align="right"><font size="2"> 
          <input name="id" type="hidden" id="id" value="<?php echo $row_Users['id']; ?>">
          <input name="MM_update" type="hidden" value="form1">
          <input type="submit" name="Submit" value="<?php echo $lang_update; ?>">
          </font></p>
      </form></td>
  </tr>
</table>
</body>
</html>
