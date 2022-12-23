<?php
//require_once('database/db.php');
?>
<p><img src="images/icons/email.gif" width="32" height="32"> <b><font size="5" face="Times New Roman, Times, serif"><?php echo $lang_email; ?></font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
  </font><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_outlook; ?></font></p>
<p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_outlookinfo; ?>:</font></p>
<ul>
  <li><font size="2" face="Times New Roman, Times, serif"><b><?php echo $lang_pop3server; ?></b>: <?php echo $row_Config['server_pop']; ?></font></li>
  <li><font size="2" face="Times New Roman, Times, serif"><b><?php echo $lang_smtpserver; ?></b>: <?php echo $row_Config['server_smtp']; ?></font></li>
  <li><font size="2" face="Times New Roman, Times, serif"><b><?php echo $lang_username; ?></b>: <?php echo $lang_fullemail; ?></font></li>
  <li><font size="2" face="Times New Roman, Times, serif"><b><?php echo $lang_password; ?></b>: <a href="<?php echo $row_Config['support_link']; ?>" target="_blank">Contact Support</a></font></li>
</ul>
<p><font size="2" face="Times New Roman, Times, serif"><?php echo $lang_webmail; ?>: <a href="<?php echo $row_Config['email_webmail']; ?>" target="_blank"><?php echo $row_Config['email_webmail']; ?></a></font></p>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>