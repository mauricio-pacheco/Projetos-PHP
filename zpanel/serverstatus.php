<?php
//require_once('database/db.php');
$domain = $row_Config['domainname'];
?>
<p><img src="images/icons/status.jpg" width="36" height="36" align="absmiddle"> 
  <b><font size="5" face="Times New Roman, Times, serif">Server Status </font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."...<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
  <?php echo $lang_serverstatusdesc; ?> </font></p>
<p><font color="red" size="4">*</font> = <?php echo $lang_ssfailed; ?><br>
<font color=green size="4">*</font> = <?php echo $lang_ssokay; ?><br>
<br>
<?

ini_set('display_errors','0'); 

function lookup_ports($hport,$hdomain) {
         $fp = fsockopen($hdomain, $hport,$errno,$errstr, 4);
         if (!$fp){
             $data = "<font color=red size=4>*</font>";
         } else {
             $data = "<font color=green size=4>*</font>";
             fclose($fp);
         }
         return $data;
}
echo $lang_checkingservices.": ".$domain;
echo "<li><b>HTTP:</b> <i>PORT 80 = <b>".lookup_ports("80",$domain)."</b></i></li>";
echo "<li><b>FTP:</b> <i>PORT 21 = <b>".lookup_ports("21",$domain)."</b></i></li>";
echo "<li><b>SMTP:</b> <i>PORT 25 = <b>".lookup_ports("25",$domain)."</b></i></li>";
echo "<li><b>POP:</b> <i>PORT 110 = <b>".lookup_ports("110",$domain)."</b></i></li>";
echo "<li><b>MySQL:</b> <i>PORT 3306 = <b>".lookup_ports("3306",$domain)."</b></i></li>";
?></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_ssthatsit; ?></font>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></div>
