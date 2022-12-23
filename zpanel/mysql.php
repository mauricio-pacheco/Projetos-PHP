<?php
//require_once('database/db.php');

$colname_Recordset1 = "1";
mysql_select_db($database_MySQL, $MySQL);
$query_Recordset1 = sprintf("SELECT * FROM db WHERE User = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $MySQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "1";
mysql_select_db($database_MySQL, $MySQL);
$query_Recordset2 = sprintf("SELECT * FROM db WHERE User = '".$_SESSION['username']."'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $MySQL) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_User = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_User = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_User);
$User = mysql_query($query_User, $Customer_Database);
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);

$colname_Package = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Package = sprintf("SELECT * FROM packages WHERE package_name = '".$row_User['webservice']."'", $colname_Package);
$Package = mysql_query($query_Package, $Customer_Database);
$row_Package = mysql_fetch_assoc($Package);
$totalRows_Package = mysql_num_rows($Package);

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

?>
<p><img src="images/icons/mysql.gif" width="45" height="31"> <b><font size="5" face="Times New Roman, Times, serif"> <?php echo $lang_mcmysqlconfig; ?></font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die("You are not logged in...<br><br><p align=center><font size=2>[ <a href=index.php target=parent>Go To Login</a> ]</font></p>");
}
?>
  </font><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_mccurentlyusing; ?> <strong><?php echo $totalRows_Recordset1; ?></strong> <?php echo $lang_mcoutof; ?> <strong><?php echo $row_Package['maxsql']; ?></strong> <?php echo $lang_mcdatabases; ?>.</font></p>
<?php
if (isset($_GET['cmd'])) {
	if ($_GET['cmd'] == 'remove') {

//		mysql_select_db($database_MySQL, $MySQL);
		$updateSQL = mysql_query("DROP DATABASE " . $_POST['toremove']);
		$updateSQL = mysql_query("FLUSH PRIVILEGES;");
		mysql_select_db($database_MySQL, $MySQL);
		$updateSQL = mysql_query("DELETE FROM db WHERE db = '".$HTTP_POST_VARS['toremove']."'");
		echo exec('c:\services\restartmysql.bat');
		echo ("<script language=javascript>alert('Database deleted!')</script>");
		echo ("<script language=javascript>document.location.href = '?page=mysql'</script>");
	}
	if($_GET['cmd'] == 'create') {
		if ($totalRows_Recordset1 < $row_Package['maxsql']) {
		
			$databasename = $_SESSION['username']."_".$HTTP_POST_VARS['db'];
		
			$updateSQL1 = 'CREATE DATABASE '.$databasename;
			$Result1 = mysql_query($updateSQL1, $MySQL) or die(mysql_error());
			
			$updateSQL2 = 'USE '.$databasename;
			$Result1 = mysql_query($updateSQL2, $MySQL) or die(mysql_error());
			
			$updateSQL3 = ("GRANT ALL PRIVILEGES ON " . $databasename . ".* TO " . $_SESSION['username'] . "@localhost IDENTIFIED BY '" . $row_User['ftppass'] . "'");
			$Result1 = mysql_query($updateSQL3, $MySQL) or die(mysql_error());

//			echo exec('c:\services\restartmysql.bat');
			echo ("<script language=javascript>alert('Database created!')</script>");
			echo ("<script language=javascript>document.location.href = '?page=mysql'</script>");
		}else{
		echo ("<script language=javascript>alert('Sorry, you are out of databases. Please delete one to continue.')</script>");		
		}
	}
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr align="left" valign="top"> 
    <td width="36%" height="160"> 
      <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
          <td height="140" align="left" valign="top"> 
            <p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_mcdbases; ?>:</font></p>
            <ul>
              <font size="2" face="Times New Roman, Times, serif">
              <?php do { ?>
					<li><?php echo $row_Recordset1['Db']; ?></li>
              <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
			  $colname_Recordset1 = "1"; ?>
              </font> 
            </ul></td>
        </tr>
      </table>
    </td>
    <td width="64%"><p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_mcnew; ?>:</font></p>
      <form name="form1" method="post" action="?page=mysql&cmd=create">
        <blockquote> 
          <p> 
            <input type="text" name="db">
            <input type="submit" name="Submit" value="<?php echo $lang_btncreate; ?>">
          </p>
        </blockquote>
      </form>
      <p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_mcremove; ?>:</font></p>
      <form name="form2" method="post" action="?page=mysql&cmd=remove">
        <blockquote> 
          <p> 
            <select name="toremove" id="toremove">
              <?php do { ?>
              <option><?php echo $row_Recordset2['Db']; ?></option>
              <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
            </select>
            <input type="submit" name="Submit2" value="<?php echo $lang_remove; ?>">
          </p>
        </blockquote>
      </form>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="top"> 
    <td width="48%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
      <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></td>
    <td width="52%">
<form action="mysql/index.php" method="post" name="login_form" target="_blank" id="login_form">
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="pma_username" type="hidden" id="pma_username" value="<?php echo $_SESSION['username']; ?>">
        <input name="pma_password" type="hidden" id="pma_password" value="<?php echo $row_User['ftppass']; ?>">
        [ <a href="javascript:document.login_form.submit()">phpMyAdmin Login </a> 
        ]</font> 
      </form></td>
  </tr>
</table>
