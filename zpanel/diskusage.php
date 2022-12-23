<?php
//require_once('database/db.php');

$colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Package = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Package = sprintf("SELECT * FROM packages WHERE package_name = '".$row_Recordset1['webservice']."'", $colname_Recordset1);
$Package = mysql_query($query_Package, $Customer_Database);
$row_Package = mysql_fetch_assoc($Package);
$totalRows_Package = mysql_num_rows($Package);
?>
<p><img src="images/icons/usage.gif" width="32" height="32"> <b><font size="5" face="Times New Roman, Times, serif"><?php echo $lang_diskusage; ?></font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
  </font><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_usageinfo; ?></font></p>
<p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_loadingusage; ?></font></p>
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> 
      <?php
echo ($row_Recordset1['url']);
function direcho($path) {
 global $filetotal, $fullsize, $totaldirs;
 if ($dir = opendir($path)) {
  while (false !== ($file = readdir($dir))) {
   if (is_dir($path."/".$file)) {                    // if it's a dir, check it's contents too
   if ($file != '.' && $file != '..') {            // but dont go recursive on '.' and '..'
//     echo '<li><b>' . $file . '</b></li><ul>';
     direcho($path."/".$file);
//     echo '</ul>';
     $totaldirs++;
   }
   }
  else {                      //if it's not a dir, just output.
   $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   $filesize = $tab . '(' . filesize ($path.'/'.$file) . ' kb)';
//   echo '<li>' . $file . $filesize . '</li>';
   $fullsize = $fullsize + filesize ($path.'/'.$file);
   $filetotal++;
  }
 }
 closedir($dir);
}
}

direcho($row_Recordset1['homedir']);

$fullsize = round($fullsize, 2);

echo"<font size=2><br><br>
<b>".$lang_total." ".$lang_files."</b> - $filetotal ".$lang_files."<br>
<b>".$lang_total." ".$lang_directories."</b> - $totaldirs ".$lang_directories."<br></font>";
?>
    </td>
    <td><div align="center"><?php
$quota = ($row_Package['package_quota'] * 1024 * 1024);
echo ('<img src=includes/showgraph.php?quota='.$quota.'&used='.$fullsize.'&username='.$HTTP_SESSION_VARS['username'].'>');
?></div></td>
  </tr>
</table>
<hr>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></div>