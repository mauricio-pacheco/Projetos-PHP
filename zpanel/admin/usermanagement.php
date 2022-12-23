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
 
 $colname_Users = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Users = sprintf("SELECT * FROM custumerbase ORDER BY servicename", $colname_Users);
 $Users = mysql_query($query_Users, $Customer_Database) or die(mysql_error());
 $row_Users = mysql_fetch_assoc($Users);
 $totalRows_Users = mysql_num_rows($Users);
 
 $database_MySQLUsers = "mysql";
 $MySQLUsers = mysql_pconnect($db_host, $db_user, $db_pass) or die(mysql_error());
 
if (isset($_POST['delete'])) {
  mysql_select_db($database_MySQLUsers, $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."1", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."2", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."3", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."4", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."5", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."6", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."7", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."8", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."9", $MySQLUsers);
  $updateSQL = mysql_query("DROP DATABASE ".$HTTP_POST_VARS['sn']."10", $MySQLUsers);
  $updateSQL = mysql_query("DELETE FROM user WHERE user='".$HTTP_POST_VARS['sn']."' and host='localhost';", $MySQLUsers);
  $updateSQL = mysql_query("FLUSH PRIVILEGES;", $MySQLUsers);
  
  mysql_select_db($database_Customer_Database, $Customer_Database);
  $updateSQL = sprintf("DELETE FROM custumerbase WHERE id = '".$HTTP_POST_VARS['id']."'");

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
  
  echo ("<script language=javascript>document.location.href = 'usermanagement.php?message=Updated!'</script>");
  
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?><script language="JavaScript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbar=no,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<title>ZPanel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../default.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#CCCCCC" topmargin="0">
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
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><p>&nbsp;</p>
        
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
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong><?php echo  $lang_admusermanagement; ?> </strong></font><font color="#FF0000"><?php if (isset($_GET['message'])) { echo ' - '.$_GET['message']; } ?></font></p>
          
        
      <p align="center"><font size="2">**<a href="usermanagement.php"><?php echo $lang_lnkrefresh; ?></a>** </font></p>
          
        <?php do { ?>
        </MM:DECORATION></MM_REPEATEDREGION>
        <MM_REPEATEDREGION SOURCE=" "></MM_REPEATEDREGION>
        
      <MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=1> 
      <table width="587" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="256"><font size="2"><?php echo $lang_servicename; ?>:<strong> <font size="3"><?php echo $row_Users['servicename']; ?></font></strong></font></td>
          <td width="331"><font size="2"><?php echo $lang_homedir; ?>:<strong> <?php echo $row_Users['homedir']; ?></strong></font></td>
        </tr>
        <tr> 
          <td height="19"><font size="2"><?php echo $lang_name; ?>:<strong> <?php echo $row_Users['name']; ?></strong></font></td>
          <td><font size="2"><?php echo $lang_paidtill; ?>:<strong> <?php echo $row_Users['PaidTill']; ?></strong></font></td>
        </tr>
        <tr> 
          <td height="19"><font size="2"><?php echo $lang_rank; ?>:<strong> <?php if ($row_Users['Rank'] == "Admin") { echo '<font color=red>'; }elseif ($row_Users['Rank'] == "Rep") { echo '<font color=#00CC00>'; }elseif ($row_Users['Rank'] == "Power User") { echo '<font color=blue>'; }else{ echo '<font color=black>'; } ?><?php echo $row_Users['Rank']; ?></font></strong></font></td>
          <td><font size="2"><?php echo $lang_status; ?>:<strong> <?php echo $row_Users['status']; ?></strong></font></td>
        </tr>
        <tr> 
          <td height="19" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="67%">&nbsp;</td>
                <td width="20%" align="center" valign="top"><form name="form1" method="post" action="javascript:popUpWindow('update_user.php?user=<?php echo $row_Users['id']; ?>', '200', '100', '622', '560')">
                    <input class="inputbox" name="editpackage" type="submit" value="<?php echo $lang_editmore; ?>">
                  </form></td>
                <td width="13%" align="center" valign="top"><form name="form1" method="post" action="usermanagement.php">
                    <input name="delete" type="hidden" value="yes">
                    <input name="id" type="hidden" value="<?php echo $row_Users['id']; ?>">
                    <input name="sn" type="hidden" value="<?php echo $row_Users['servicename']; ?>">
                    <input class="inputbox" name="deletepackage" type="submit" value="<?php echo $lang_delete; ?>">
                  </form></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <hr>
      <?php } while ($row_Users = mysql_fetch_assoc($Users)); ?>
          <br>
      <center>
        <font size="2">**<a href="usermanagement.php"><?php echo $lang_lnkrefresh; ?></a>**</font>
</center><br>
        </div>
        <table width="65" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
			<td><div align="center"><form name="form1" method="post" action="javascript:popUpWindow('addnew_user.php', '200', '100', '622', '560')"><input class="inputbox" type="submit" name="Submit" value="<?php echo $lang_btnnewuser; ?>" onsubmit></form>
				  </div>
			</td>
            </tr>
          </table>
	</td>
    </tr>
    <tr align="center" valign="bottom"> 
      <td height="43" colspan="3" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><img src="../images/templates/default_footer.gif" width="780" height="35" border="0" usemap="#Map"></td>
    </tr>
  </table>
<map name="Map">
  <area shape="rect" coords="546,5,776,29" href="http://www.zee-way.com" target="_blank">
</map>
</body>
</html>