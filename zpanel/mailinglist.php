<?php
//include ("database/db.php");
?>
<p><img src="images/icons/email.gif" width="32" height="32"> <b><font size="5">Mass 
  E-Mail</font></b></p>
<p> 
  <?php

if ($_SESSION['Rank'] != "Admin") {
	die($lang_notarep."...<br><br><p align=center><font size=2>[ <a href=?page=main>".$lang_back."</a> ]</font></p>");
}

if(!isset($_POST['subject'])) {
	echo ("<font size=2 face=Verdana>".$lang_emaildesc."</font><br><br><center><form action=?page=mailinglist method=post>".$lang_subject.": <input type=text name=subject><br>".$lang_content.":<br><textarea cols=55 rows=20 name=content></textarea><br><input type=submit value='".$lang_mailusers."'></form><br><br><a href=main.php>".$lang_back."</a>");
} else {
$subject = $_POST['subject'];
$message = $_POST['content'];

$subject or die ('Please enter required fields!');
$message or die ('Please enter required fields!');

$mails=mysql_query("SELECT * FROM custumerbase");
while($info=mysql_fetch_array($mails)) {
extract($info);
$mail = $info['email'];
mail("$mail", "$subject", $message,
     "From: ".$row_Config['support_email']."\r\n") or die ('Error');
}
echo ("<center><b>".$lang_mailed."</b><P>".$lang_mailedokay."<br><br><a href=?page=main>".$lang_back."</a>");
}
?>
</p>