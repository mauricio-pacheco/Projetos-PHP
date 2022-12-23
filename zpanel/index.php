<?php
require('database/db.php');
if (!isset($row_Config['installed'])) {
	echo ("<script language=javascript>document.location.href = 'admin/install.php'</script>");
}
if ($row_Config['installed'] != '1') {
	echo ("<script language=javascript>document.location.href = 'admin/install.php'</script>");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ZPanel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#CCCCCC">
<table width="100%" height="97%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><table width="445" height="212" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td background="images/templates/ZPanelV2/loginwindow/login.gif"><div align="center"> 
              <br>
              <strong><font face="Verdana, Arial, Helvetica, sans-serif" size="5"><?php echo $row_Config['company']; ?><br>
                </font></strong> 
<?php

if (isset($_POST['uname'])) {

$colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_POST['uname']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Packages = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Packages = sprintf("SELECT * FROM packages WHERE package_name = '".$row_Recordset1['webservice']."'", $colname_Packages);
$Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
$row_Packages = mysql_fetch_assoc($Packages);
$totalRows_Packages = mysql_num_rows($Packages);

}

if (isset($_POST['submit'])) { // if form has been submitted

/* check they filled in what they were supposed to and authenticate */
if(!$_POST['uname'] | !$_POST['passwd']) {
	die('You did not fill in a required field.');
}

// authenticate.

if (!get_magic_quotes_gpc()) {
	$_POST['uname'] = addslashes($_POST['uname']);
}

if ($totalRows_Recordset1 == '0') {
	die('That username does not exist in our database.');
}

$info = $row_Recordset1;

// check passwords match

$_POST['passwd'] = stripslashes($_POST['passwd']);
$info['ftppass'] = stripslashes($info['ftppass']);
//	$_POST['passwd'] = $_POST['passwd'];

if ($_POST['passwd'] != $info['ftppass']) {
	die('Incorrect password, please try again.');
}

// if we get here username and password are correct, 
//register session variables

$date = date('m d, Y');

$_POST['uname'] = stripslashes($_POST['uname']);
$_SESSION['username'] = strtolower($_POST['uname']);
$_SESSION['password'] = $_POST['passwd'];
	
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$_SESSION['Rank'] = $row_Recordset1['Rank'];
$_SESSION['id'] = $row_Recordset1['id'];
$_SESSION['ipbased'] = $settings['ipbased'];
$_SESSION['namebased'] = $settings['namebased'];
$_SESSION['homedir'] = $row_Recordset1['homedir'];

echo ("<script language=javascript>document.location.href = 'zpanel.php'</script>");
}
?><br>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <table align="center" border="0" cellspacing="0" cellpadding="3">
                  <tr> 
                    <td width="99" height="28" bgcolor="#CCCCCC">Demo User</td>
                    <td width="69"><font size="2"><?php echo $lang_username; ?></font>:</td>
                    <td width="149"> <input class="inputbox" type="text" name="uname" maxlength="40"> 
                    </td>
                  </tr>
                  <tr> 
                    <td bgcolor="#CCCCCC"><font size="2"><?php echo $lang_username; ?>: 
                      demo<br>
                      <?php echo $lang_password; ?>: demo <br>
                      </font></td>
                    <td><font size="2"><?php echo $lang_password; ?></font>:</td>
                    <td> <input class="inputbox" type="password" name="passwd" maxlength="50"> 
                    </td>
                  </tr>
                  <tr> 
                    <td colspan="3" align="right"> <input class="inputbox" type="submit" name="submit" value="Login"> 
                    </td>
                  </tr>
                </table>
              </form>
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
