<?php
if (isset($_GET['update'])) {
	$down_one = "yes";
	require_once('../database/db.php');
	if (isset($_GET['adminpass'])) {
		if ($row_Config['admin_password'] == $_GET['adminpass']) {
			$query = "UPDATE config SET installed='2'";
			$result = mysql_query($query);
		}else{
			echo ("<script language=javascript>alert('Wrong password')</script>");
			echo ("<script language=javascript>document.location.href = '../index.php'</script>");
		}
	}else{
		echo ("<script language=javascript>alert('Wrong password')</script>");
		echo ("<script language=javascript>document.location.href = '../index.php'</script>");
	}
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
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><br>
        <br><ul>
          <li><font color="#FF0000"><strong>Welcome to ZPanel</strong></font></li>
          <li><strong>Setup Database</strong></li>
          <li><strong>Setup Admin</strong></li>
          <li><strong>Setup System Info.</strong></li>
          <li><strong>Customize Packages</strong></li>
          <li><strong>Finished!</strong></li>
        </ul>
        <strong>Step 1 of 6</strong><br>
        <table width="143" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#F4F4F4">
          <tr> 
            <td height="25" align="left" valign="top"><font color="#0000FF"><strong><font color="#FF0000">|||</font></strong></font><font color="#FF0000"><strong>||||||</strong></font><strong>|||||||||||||||||||||||||||||||||||||</strong></td>
          </tr>
        </table></td>
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong>Setup 
          1: Welcome to ZPanel</strong></font></p>
        <blockquote>
          <p>&nbsp;</p>
          <p>ZPanel has been created for those Windows system adminstrators that 
            don't want to pay thousands of dollars for a cuting edge control panel 
            software.</p>
          <p>Zee-Way's ZPanel will now guide you through the setup so you can 
            get online with your new control panel software right away!</p>
          <p>&nbsp;</p>
          <form name="form1" method="post" action="javascript:document.location.href = 'install2.php'">
            <div align="right">
              <input class="inputbox" type="submit" name="Submit" value="Continue" onsubmit>
            </div>
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