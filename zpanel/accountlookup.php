<?php
//require_once('database/db.php');

?>
<script language="JavaScript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbar=no,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script><?php
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

if ((isset($HTTP_POST_VARS["MM_update"])) && ($HTTP_POST_VARS["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE custumerbase SET name=%s, Rank=%s, email=%s, adminemail=%s, ftppass=%s, address=%s, city=%s, `state`=%s, zip=%s, phone=%s, webservice=%s, status=%s, homedir=%s, ftpaccounts=%s, mysqluser=%s, mysqlpass=%s, mysqldatabases=%s, gameserver=%s, gameserverport=%s, notes=%s WHERE id=%s",
                       GetSQLValueString($HTTP_POST_VARS['name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['Rank'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['email'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['adminemail'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['ftppass'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['address'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['city'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['state'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['zip'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['phone'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['webservice'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['status'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['homedir'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['ftpaccounts'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqluser'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqlpass'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['mysqldatabases'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['gameserver'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['gameserverport'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['notes'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['id'], "int"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
}

$colname_Recordset1 = "1";
if (isset($HTTP_POST_VARS['servicename'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_POST_VARS['servicename'] : addslashes($HTTP_POST_VARS['servicename']);
}
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ($row_Recordset1['Rank'] != 'Admin' || $row_Recordset1['Rank'] != 'Power User') {
	if ($row_Recordset1['id'] > '-1') {
		echo("<script language=javascript>popUpWindow('admin/update_user.php?user=".$row_Recordset1['id']."', '200', '100', '622', '560')</script>");
	}
}
?>
<font size="2"><img src="images/icons/passprotection.gif" width="32" height="32" align="absmiddle"> 
<font size="4" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_accountlookup; ?></font></font>
<p>
  <?php
if ($_SESSION['Rank'] == "User") {
	die($lang_notarep."...<br><br><p align=center><font size=2>[ <a href=?page=main>".$lang_back."</a> ]</font></p>");
}
?>
</p> 
<form name="form1" method="post" action="">
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_enterservicename.':'; ?></font>
<input class="inputbox" name="servicename" type="text" id="servicename">
    
  <input class="inputbox" type="submit" name="Submit" value="<?php echo $lang_lookup; ?>">
  </form>
<?php
if (strtolower($row_Recordset1['Rank']) == 'admin' || strtolower($row_Recordset1['Rank']) == 'power user') {
?>
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="147"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><em><?php echo $lang_poweruseroptions; ?></em> </font></td>
    <td width="143"><form name="form1" method="post" action="javascript:popUpWindow('admin/addnew_user.php', '200', '100', '622', '560')">
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input class="inputbox" type="submit" name="Submit" value="<?php echo $lang_createnewuser; ?>" onsubmit>
        </font></form></td>
    <td width="272"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<?php
}
?>
<hr><?php
if (!isset($HTTP_POST_VARS['servicename'])) {
	$dontfinalmessage = "true";
	echo ("Type in a service name, their login username, and press Lookup to see results...<br><br>");
}else{
?>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php if ($row_Recordset1['Rank'] == 'Admin' || $row_Recordset1['Rank'] == 'Power User') { die($lang_onlyuserinfo.'.'); } ?>
  </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $lang_infofor." \"<b>".$row_Recordset1['servicename']."</b>\" ".$lang_launched; ?></font></p>
<?
}
?>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
<?php
mysql_free_result($Recordset1);
?>

