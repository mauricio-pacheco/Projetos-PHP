<?php
//require_once('database/db.php');

 $colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

 $colname_Users = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Users = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Users);
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
  $updateSQL = sprintf("UPDATE custumerbase SET name=%s, email=%s, address=%s, city=%s, zip=%s, state=%s, phone=%s WHERE id=%s",
                       GetSQLValueString($HTTP_POST_VARS['name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['email'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['address'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['city'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['zip'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['state'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['phone'], "text"),
					   GetSQLValueString($HTTP_POST_VARS['id'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());

  echo ("<script language=javascript>alert ('Profile Updated!')</script>");
  echo ("<script language=javascript>document.location.href = '?page=profile'</script>");

}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = 'index.php'</script>");
}

?>
<table width="100%" height="427" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="427" align="left" valign="top"> 
      <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
        <p><strong><img src="images/icons/profile.gif" width="32" height="32" align="absmiddle"> 
          <?php echo $lang_profile; ?> </strong></p><strong><img src="images/profile_mainaccount.gif" width="200" height="15"></strong><br>

<?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."...<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="213" height="103"><font size="2"><strong><?php echo $lang_servicename; ?>:</strong> 
              <?php echo $row_Users['servicename']; ?> <strong><br>
              <?php echo $lang_rank; ?>:</strong> <?php echo $row_Users['Rank']; ?><strong> <br>
              <?php echo $lang_status; ?>:</strong> <?php echo $row_Users['status']; ?><strong> <br>
              <?php echo $lang_webpackage; ?>:</strong> <?php echo $row_Packages['package_name']; ?> <strong><br>
              <?php echo $lang_paidtill; ?>:</strong> <?php echo $row_Users['PaidTill']; ?> (<a href="billing.php"><font size="1"><?php echo $lang_billinginfo; ?></font></a>)<strong> 
              </strong> </font></td>
            <td width="288"><p><font size="2"><strong> <?php echo $lang_homedir; ?>:</strong> 
                <?php echo $row_Users['homedir']; ?><font size="1"> </font><strong><br>
                <?php echo $lang_url; ?>: </strong> <?php echo $row_Users['url']; ?></font></p>
              <p><font size="2"><strong> <?php echo $lang_adminemails; ?>:</strong> <?php echo $row_Users['adminemail']; ?><br>
                <font size="1">- <?php echo $lang_adminemailsdesc; ?></font></font></p>
              <p>&nbsp;</p></td>
          </tr>
          <tr align="left" valign="top"> 
            <td height="108" colspan="2"> 
              <p><font size="2"><strong><img src="images/profile_owner.gif" width="200" height="15"><br>
                <?php echo $lang_name; ?>: </strong> 
                <input name="name" type="text" id="name3" value="<?php echo $row_Users['name']; ?>">
                <strong><br>
                <?php echo $lang_youremail; ?>:</strong> 
                <input name="email" type="text" id="email" value="<?php echo $row_Users['email']; ?>">
                </font></p>
              </td>
          </tr>
        </table>
        <img src="images/profile_contact.gif" width="200" height="15"><br>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="217"><font size="2"><strong>Address:</strong> 
              <input name="address" type="text" id="servicename3" value="<?php echo $row_Users['address']; ?>">
              </font></td>
            <td width="317"><font size="2"><strong>State:</strong> 
              <input name="state" type="text" id="state" value="<?php echo $row_Users['state']; ?>" size="3">
              <strong>Zip Code:</strong> 
              <input name="zip" type="text" id="address3" value="<?php echo $row_Users['zip']; ?>" size="10">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><p><font size="2"><strong>City:</strong> 
                <input name="city" type="text" id="address" value="<?php echo $row_Users['city']; ?>">
                </font></p>
              <p>&nbsp;</p></td>
            <td><font size="2"><strong>Phone:</strong> 
              <input name="phone" type="text" id="address4" value="<?php echo $row_Users['phone']; ?>">
              </font></td>
          </tr>
        </table>
        <img src="images/profile_mysql.gif" width="200" height="15"><br>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="left" valign="top"> 
            <td width="229"><font size="2"><strong>MySQL User:</strong> <?php echo $row_Users['mysqluser']; ?></font></td>
            <td width="305"><font size="2"><strong>MySQL Databases:</strong> <?php echo $row_Users['mysqlpass']; ?><br>
              </font></td>
          </tr>
        </table>
        <p align="right"><font size="2"> 
          <input name="id" type="hidden" id="id" value="<?php echo $row_Users['id']; ?>">
          <input name="MM_update" type="hidden" value="form1">
          <input type="submit" name="Submit" value="<?php echo $lang_update; ?>">
          </font></p>
      </form>
      <div align="center"><br>
        <br>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ <a href="?page=main"><?php echo $lang_back; ?></a> 
        ]</font></div></td>
  </tr>
</table>
