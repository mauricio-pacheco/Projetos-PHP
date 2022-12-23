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

 $colname_Packages = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Packages = sprintf("SELECT * FROM packages", $colname_Packages);
 $Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
 $row_Packages = mysql_fetch_assoc($Packages);
 $totalRows_Packages = mysql_num_rows($Packages);

 $database_MySQLUsers = "mysql";
 $MySQLUsers = mysql_pconnect($db_host, $db_user, $db_pass) or die(mysql_error());


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
 
 $colname_Packages2 = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Packages2 = sprintf("SELECT * FROM packages WHERE package_name = '".$HTTP_POST_VARS['webservice']."'", $colname_Packages2);
 $Packages2 = mysql_query($query_Packages2, $Customer_Database) or die(mysql_error());
 $row_Packages2 = mysql_fetch_assoc($Packages2);
 $totalRows_Packages2 = mysql_num_rows($Packages2);
 
  $updateSQL = sprintf("INSERT custumerbase (servicename, name, Rank, email, adminemail, ftppass, address, city, zip, state, phone, webservice, status, homedir, mysqluser, mysqlpass, mysqldatabases, notes, PaidTill, url) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
                       GetSQLValueString($HTTP_POST_VARS['servicename'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['ftppass'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['servicename']."1", "text"),
                       GetSQLValueString($HTTP_POST_VARS['notes'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['PaidTill'], "text"),
					   GetSQLValueString($HTTP_POST_VARS['url'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());

  mysql_select_db($database_MySQLUsers, $MySQLUsers);
//  $updateSQL = sprintf("INSERT INTO user (Host,User,Password) VALUES('localhost','".$HTTP_POST_VARS['servicename']."','".$HTTP_POST_VARS['ftppass']."');");
  $updateSQL = mysql_query("CREATE DATABASE ".$HTTP_POST_VARS['servicename']."1", $MySQLUsers);
  $updateSQL = mysql_query("GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON ".$HTTP_POST_VARS['servicename']."1.* TO ".$HTTP_POST_VARS['servicename']."@localhost IDENTIFIED BY '".$HTTP_POST_VARS['ftppass']."';", $MySQLUsers);  
  $updateSQL = mysql_query("FLUSH PRIVILEGES;", $MySQLUsers);

  echo ("<script language=javascript>alert ('User Created')</script>");
  echo ("<script language=javascript>window.close()</script>");
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?><html>
<head>
<title><?php echo $lang_btnnewuser; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" height="168" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="168" align="left" valign="top"> 
      <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
        <p><strong><img src="../images/icons/password.gif" width="32" height="32" align="absmiddle"><?php echo $lang_btnnewuser; ?></strong> (* = <?php echo $lang_required; ?>)</p>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="277"><font size="2"><strong>*<?php echo $lang_servicename; ?>:</strong> 
              <input name="servicename" type="text" id="servicename">
              <br>
              <font size="1">- should match their username on your FTP server. 
              (ex. demo)</font></font></td>
            <td width="313"><font size="2"><strong>*<?php echo $lang_password; ?>:</strong> 
              <input name="ftppass" type="text" id="ftppass">
              <br>
              <font size="1">- should match their password on your FTP server. 
              (ex. demo)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_name; ?>: </strong> 
              <input name="name" type="text" id="name3">
              <br>
              <font size="1">(ex. Demo User) </font></font></td>
            <td><font size="2"><strong><?php echo $lang_youremail; ?>:</strong> 
              <input name="email" type="text" id="email">
              <br>
              <font size="1">-the client's main e-mail address (ex. demo@demo.com)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2"><strong><?php echo $lang_url; ?>: </strong> 
              <input name="url" type="text" id="name">
              <br>
              <font size="1">(examples: http://demo.zee-way.com OR http://www.zee-way.com/hosted/demo) 
              *DO NOT PUT A TRAILING SLASH / *</font></font><font size="2">&nbsp;</font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong>*<?php echo $lang_rank; ?>:</strong> 
              <select name="Rank" id="select">
<?php if ($_SESSION['Rank'] == 'Admin') { ?>
                <option>Admin</option>
                <option>Power User</option>
<?php } ?>
                <option>Rep</option>
				<option selected>User</option>
              </select>
              </font></td>
            <td><font size="2"><strong><?php echo $lang_adminemails; ?>:</strong> 
              <input name="adminemail" type="text" id="adminemail">
              <br>
              <font size="1">- e-mail addresses allowed to make changes to this 
              account with your tech support. Seperate by commas. (ex. demo@demo.com)</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong>*<?php echo $lang_webpackage; ?>:</strong> 
              <select name="webservice" id="webservice">
                <?php do { ?>
                <option><?php echo $row_Packages['package_name']; ?></option>
                <?php } while ($row_Packages = mysql_fetch_assoc($Packages)); ?>
              </select>
              </font></td>
            <td><font size="2"><strong>*<?php echo $lang_homedir; ?>:</strong> 
              <input name="homedir" type="text" id="homedir">
              <br>
              <font size="1"> (ex. c:/inetpub/wwwroot/hosted/user) * DO NOT PUT 
              A TRAILING / *</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong><?php echo $lang_status; ?>:</strong> 
              <select name="status" id="status">
                <option>Active</option>
                <option>Suspended</option>
                <option>Marked For Deletion</option>
              </select>
              </font></td>
            <td><font size="2"><strong><?php echo $lang_paidtill; ?>:</strong> 
              <input name="PaidTill" type="text" id="PaidTill">
              <br>
              <font size="1">-format: YYYY-MM-DD (ex.2004-01-12)</font> </font></td>
          </tr>
        </table>
        <hr>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="273"><font size="2"><strong>Address:</strong> 
              <input name="address" type="text" id="servicename3">
              </font></td>
            <td width="317"><font size="2"><strong>State:</strong> 
              <input name="state" type="text" id="state" size="3">
              <strong>Zip Code:</strong> 
              <input name="zip" type="text" id="address3" size="10">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2"><strong>City:</strong> 
              <input name="city" type="text" id="address">
              </font></td>
            <td><font size="2"><strong>Phone:</strong> 
              <input name="phone" type="text" id="address4">
              </font></td>
          </tr>
        </table>
        <hr>
        <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="117"><strong><?php echo $lang_accountnotes; ?>:</strong></td>
            <td width="473"><textarea name="notes" cols="45" wrap="VIRTUAL" id="notes"></textarea>
            </td>
          </tr>
        </table>
        <p align="right"><font size="2"> 
          <input name="id" type="hidden" id="id" value="<?php echo $row_Users['id']; ?>">
          <input name="MM_update" type="hidden" value="form1">
          <input type="submit" name="Submit" value="<?php echo $lang_btnaddnew; ?>">
          </font></p>
      </form></td>
  </tr>
</table>
</body>
</html>
