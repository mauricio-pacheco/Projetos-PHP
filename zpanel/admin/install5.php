<script language="JavaScript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menub ar=no,scrollbar=no,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<?php
$down_one = "yes";
 require_once('../database/db.php');
 
 $colname_Packages = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Packages = sprintf("SELECT * FROM packages", $colname_Packages);
 $Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
 $row_Packages = mysql_fetch_assoc($Packages);
 $totalRows_Packages = mysql_num_rows($Packages);

if ($row_Config['installed'] == '1') {
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
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><br>
        <br><ul>
          <li><font color="#999999"><strong>Welcome to ZPanel</strong></font></li>
          <li><strong><font color="#999999">Setup Database</font></strong></li>
          <li><strong><font color="#999999">Setup Admin</font></strong></li>
          <li><strong><font color="#999999">Setup System Info.</font></strong></li>
          <li><strong><font color="#FF0000">Customize Packages</font></strong></li>
          <li><strong>Finished!</strong></li>
        </ul>
        <strong>Step 5 of 6</strong><br>
        <table width="143" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#F4F4F4">
          <tr> 
            <td height="25" align="left" valign="top"><font color="#0000FF"><strong><font color="#FF0000">|||</font></strong></font><font color="#FF0000"><strong>||||||</strong></font><strong><font color="#FF0000">|||||||||||||||||||||||||||||||</font>||||||</strong></td>
          </tr>
        </table></td>
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong>Setup 
          5: Customize Packages</strong></font></p>
        <blockquote> 
          <p>To customize the web hosting packages:</p>
          <p align="center"><font size="2">**<a href="install5.php">IF YOU UPDATE 
            A PACKAGE, CLICK HERE TO UPDATE THIS PAGE</a>** </font></p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr align="left" valign="top"> 
              <td width="18%"> 
                <div align="center"><font size="2"><strong>Package 
                  Name</strong></font></div></td>
              <td width="23%"> <div align="center"><font size="2"><strong>Package 
                  Type</strong></font></div></td>
              <td width="30%"> <div align="center"><font size="2"><strong>Package 
                  Quota</strong></font></div></td>
              <td width="29%"> <div align="center"><font size="2"></font></div></td>
            </tr>
          </table>
            
          <font size="2">
          <?php do { ?>
          </MM:DECORATION></MM_REPEATEDREGION></font><MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=1>
          <form name="form1" method="post" action="javascript:popUpWindow('update_package.php?package=<?php echo $row_Packages['id']; ?>', '200', '200', '350', '200')">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr align="left" valign="top"> 
                <td width="18%"> <div align="center"><font size="2"><?php echo $row_Packages['package_name']; ?></font></div></td>
                <td width="23%"> <div align="center"><font size="2"><?php echo $row_Packages['package_type']; ?> </font></div></td>
                <td width="30%"> <div align="center"><font size="2"><?php echo $row_Packages['package_quota']; ?> MB</font></div></td>
                <td width="29%"> <div align="center"><font size="2">
                    <input name="toedit" type="hidden" value="<?php echo $row_Packages['id']; ?>">
                    <input class="inputbox" name="editpackage" type="submit" value="Edit">
                    </font></div></td>
              </tr>
            </table>
          </form>
          <?php } while ($row_Packages = mysql_fetch_assoc($Packages)); ?>
          <br><form name="form1" method="post" action="javascript:document.location.href = 'install6.php'">
            <div align="right">If you're done here, then -&gt; 
              <input class="inputbox" type="submit" name="Submit" value="Continue" onsubmit>
            </div>
          </form>
        </blockquote>
	</td>
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