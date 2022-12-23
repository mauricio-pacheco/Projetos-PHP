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
	die('No');
}

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
  $updateSQL = sprintf("INSERT INTO packages (package_name, package_type, package_mo_price, package_quota, maxftp, maxsql) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['package_name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['package_type'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['package_mo_price'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['package_quota'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['package_maxftp'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['package_maxsql'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());

  echo ("<script language=javascript>alert ('Package Created!')</script>");
  echo ("<script language=javascript>window.close()</script>");
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?><html>
<head>
<title><?php echo $lang_btnnewpackage; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" height="168" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="168" align="left" valign="top"> 
      <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
        <p><strong><img src="../images/icons/password.gif" width="32" height="32" align="absmiddle"><?php echo $lang_btnnewpackage; ?></strong></p>
        <p><?php echo $lang_npname; ?><font size="2">: 
          <input name="package_name" type="text" id="package_name">
          <br>
          <?php echo $lang_nptype; ?>: 
          <select name="package_type" id="package_type">
            <option value="Web" <?php if ($row_Packages['package_type'] == 'Web') { echo ('selected'); } ?>>Web</option>
          </select>
          <br>
          <?php echo $lang_npquota; ?>: 
          <input name="package_quota" type="text" id="package_quota">
          ( MB)</font><br>
          <font size="2"><?php echo $lang_npmaxftp; ?>: 
          <input name="package_maxftp" type="text" id="package_maxftp" size="5">
          <br>
          </font> <font size="2"><?php echo $lang_npmaxdata; ?>: 
          <input name="package_maxsql" type="text" id="package_maxsql" size="5">
          </font><br>
          <font size="2"><?php echo $lang_npprice; ?>: 
          <input name="package_mo_price" type="text" id="package_mo_price" size="10">
          </font> </p>
        <p align="right"><font size="2">
          <input name="id" type="hidden" id="id" value="<?php echo $row_Packages['id']; ?>">
		  <input name="MM_update" type="hidden" value="form1"> 
          <input type="submit" name="Submit" value="<?php echo $lang_btncreate; ?>">
          </font></p>
      </form></td>
  </tr>
</table>
</body>
</html>
