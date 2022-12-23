<?php
//require_once('database/db.php');
?>
<p><font size="2">&nbsp;<img src="images/icons/windows.gif" width="30" height="27"> 
  <font size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $lang_serverinfo; ?></font></font></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_currentlyrunning; ?>: <strong><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></strong></font></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_supportsfollowing; ?>:</font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="bottom"> 
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="images/supported/php.gif" width="176" height="64"><br>
      </font></td>
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="images/supported/mysql.gif" width="167" height="64"></font></td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">v<?php echo phpversion(); ?></font></td>
    <td width="25%"></td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td width="25%" height="30"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php
switch ($_SERVER["SERVER_SOFTWARE"])
{
case 'Microsoft-IIS/6.0':
	echo '<img src="images/supported/asp.gif" width="139" height="58">';
	break;  
case 'Microsoft-IIS/5.1':
	echo '<img src="images/supported/asp.gif" width="139" height="58">';
	break;
case 'Microsoft-IIS/5.0':
	echo '<img src="images/supported/asp.gif" width="139" height="58">';
	break;
case 'Microsoft-IIS/4.0':
	echo '<img src="images/supported/asp.gif" width="139" height="58">';
	break;
default:
	echo '';
}
?></font></td>
    <td width="25%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" valign="bottom"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
