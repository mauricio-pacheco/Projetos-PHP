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

$colname_Packages = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Packages = sprintf("SELECT * FROM packages WHERE package_name = '".$row_Recordset1['webservice']."'", $colname_Packages);
$Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
$row_Packages = mysql_fetch_assoc($Packages);
$totalRows_Packages = mysql_num_rows($Packages);

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
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><p><br>
          <br>
          <strong><?php echo  $lang_admpages; ?></strong></p>
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
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong>ZPanel 
          <?php echo  $lang_administration; ?></strong></font></p>
        <blockquote> 
          <?php
//if ($HTTP_POST_VARS['servicename'] == "") {
//	die("Type in a service name and press Lookup to see results...<br><br><p align=center><font size=2>[ <a href=javascript:window.close()>Close This Window</a> ]</font></p>");
//}
//if ($_SESSION['Rank'] <> "Admin") {
//	die("You are not a Admin...<br><br><p align=center><font size=2>[ <a href=javascript:window.close()>Close This Window</a> ]</font></p>");
//}
?>
          <?php echo  $lang_admwelcomemsg; ?>, <?php echo $row_Recordset1['name']; ?>! <br>
          <br><br><br>
          Please use the links on the left to setup any aspect of your ZPanel. 
          <form name="form1" method="post" action="javascript:document.location.href = 'install2.php'">
            <div align="right"></div>
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