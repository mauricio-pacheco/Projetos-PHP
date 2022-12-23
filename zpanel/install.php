<?php
//require_once('database/db.php');

//yawn!!! It's 5 in the morning and I'm still working on this stuff... I'm too dedicated.

 $colname_InstallersPHP = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_InstallersPHP = sprintf("SELECT * FROM installers WHERE scripttype='PHP'", $colname_InstallersPHP);
 $InstallersPHP = mysql_query($query_InstallersPHP, $Customer_Database) or die(mysql_error());
 $row_InstallersPHP = mysql_fetch_assoc($InstallersPHP);
 $totalRows_InstallersPHP = mysql_num_rows($InstallersPHP);

 $colname_InstallersASP = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_InstallersASP = sprintf("SELECT * FROM installers WHERE scripttype='ASP'", $colname_InstallersASP);
 $InstallersASP = mysql_query($query_InstallersASP, $Customer_Database) or die(mysql_error());
 $row_InstallersASP = mysql_fetch_assoc($InstallersASP);
 $totalRows_InstallersASP = mysql_num_rows($InstallersASP);
?>
<p><img src="images/icons/addon.gif" width="32" height="32"><b><font size="5"><?php echo $lang_installscripts; ?></font></b></p>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
</font>
<table width="391" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr bgcolor="#F7F7F7"> 
    <td colspan="3"><strong><font size="4" face="Verdana, Arial, Helvetica, sans-serif">PHP Scripts</font></strong></td>
  </tr>
  <tr bgcolor="#6699CC"> 
    <td width="173" bgcolor="#6699CC"> <div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_toinstall; ?></font></b></div></td>
    <td width="111"> <div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_install; ?></font></b></div></td>
    <td width="89"><div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_theirsite; ?></font></b></div></td>
  </tr>
  <?php do { ?>
  <tr bgcolor="#CCCCCC"> 
    <td><div align="center"><font size="2"><?php echo $row_InstallersPHP['name']; ?></font></div></td>
    <td><div align="center"><font size="2"><a href="?page=install-execute&script=<?php echo $row_InstallersPHP['shortname']; ?>"><?php echo $lang_clickhere; ?></a></font></div></td>
    <td><div align="center"><font size="2"><a href="<?php echo $row_InstallersPHP['website']; ?>" target="_blank"><?php echo $lang_view; ?></a></font></div></td>
  </tr>
  <?php } while ($row_InstallersPHP = mysql_fetch_assoc($InstallersPHP)); ?>
</table>
<MM:DECORATION OUTLINE="Repeat" OUTLINEID=1></mm:decoration>
<?php if($row_Config['hide_asp'] == "no") { ?>
<table width="391" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr bgcolor="#F7F7F7"> 
    <td colspan="3"> 
      <div align="left"><font color="#000000" size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>ASP Scripts</strong></font></div></td>
  </tr>
  <tr bgcolor="#6699CC"> 
    <td width="173"> <div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_toinstall; ?></font></b></div></td>
    <td width="111"> <div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_install; ?></font></b></div></td>
    <td width="89"><div align="center"><b><font color="#FFFFFF" size="2"><?php echo $lang_theirsite; ?></font></b></div></td>
  </tr>
<?php do { ?>
  <tr bgcolor="#CCCCCC"> 
    <td><div align="center"><font size="2"><?php echo $row_InstallersASP['name']; ?></font></div></td>
    <td><div align="center"><font size="2"><a href="?page=install-execute&script=<?php echo $row_InstallersPHP['shortname']; ?>"><?php echo $lang_clickhere; ?></a></font></div></td>
    <td><div align="center"><font size="2"><a href="<?php echo $row_InstallersPHP['website']; ?>" target="_blank"><?php echo $lang_view; ?></a></font></div></td>
  </tr>
<?php } while ($row_InstallersASP = mysql_fetch_assoc($InstallersASP)); ?>
</table>
<?php
}
?>
<p align="center"><font size="2"><?php echo $lang_morecoming; ?></font></p>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
