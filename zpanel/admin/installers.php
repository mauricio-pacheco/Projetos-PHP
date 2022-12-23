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
 
 $colname_Installers = "1";
 mysql_select_db($database_Customer_Database, $Customer_Database);
 $query_Installers = sprintf("SELECT * FROM installers", $colname_Installers);
 $Installers = mysql_query($query_Installers, $Customer_Database) or die(mysql_error());
 $row_Installers = mysql_fetch_assoc($Installers);
 $totalRows_Installers = mysql_num_rows($Installers);
 
if (isset($_POST['delete'])) {
  $updateSQL = sprintf("DELETE FROM installers WHERE id = '".$HTTP_POST_VARS['id']."'");

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());
  
  echo ("<script language=javascript>document.location.href = 'installers.php?message=Updated!'</script>");
  
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
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><strong><font size="4"><?php echo  $lang_adminstallers; ?></font></strong> 
        <font color="#FF0000"> 
        <?php if (isset($_GET['message'])) { echo ' - '.$_GET['message']; } ?>
        </font></p>
          
        <p align="center"><font size="2">**<a href="installers.php"><?php echo $lang_lnkrefresh; ?></a>** </font></p>
          
        <font size="2"> 
        <?php do { ?>
        </MM:DECORATION></MM_REPEATEDREGION></font>
        <div align="center"><MM_REPEATEDREGION SOURCE=" "></MM_REPEATEDREGION></div>
        
      <div align="center"><MM_REPEATEDREGION SOURCE=" "></MM_REPEATEDREGION></div>
      <MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=1> <div align="center"> 
      <div align="center">
        <table width="587" border="1" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top"> 
            <td colspan="3"><img src="../<?php echo $row_Installers['icon']; ?>" align="absmiddle"> 
              <strong><?php echo $row_Installers['name']; ?> </strong>(<?php echo $lang_niscriptfull; ?>)</td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><strong><?php echo $lang_niscriptfilepath; ?>:</strong> <?php echo $row_Installers['filepath']; ?></td>
          </tr>
          <tr align="left" valign="top"> 
            <td width="24%"><p> <font size="2"><strong><?php echo $lang_niscriptshort; ?>:</strong></font><br>
                <font size="3"><?php echo $row_Installers['shortname']; ?> </font></p>
              <p><font size="2"><strong><?php echo $lang_niscripthomepage; ?>:</strong></font><br>
                <font size="3"><?php echo $row_Installers['website']; ?> </font></p>
              <p><font size="2"><strong><?php echo $lang_nptype; ?>:</strong></font><br>
                <font size="3"><?php echo $row_Installers['scripttype']; ?> </font></p></td>
            <td width="33%"><p><font size="2"><strong><?php echo $lang_niexampledir; ?>:</strong></font><br>
                <font size="3"><?php echo $row_Installers['exampledir']; ?></font></p>
              <p><font size="2"><strong><?php echo $lang_niwelcome; ?>:</strong></font><br>
                <font size="2"><?php echo $row_Installers['welcome']; ?> </font><font size="3"> </font></p></td>
            <td width="43%"><p><font size="2"><strong><?php echo $lang_niinstructions; ?>:</strong></font><br>
                <font size="2"><?php echo $row_Installers['instructions']; ?> </font></p>
              <p><font size="2"><strong><?php echo $lang_nifinal; ?>:</strong></font><br>
                <font size="2"><?php echo $row_Installers['finalmessage']; ?> </font></p></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="74%">&nbsp;</td>
                  <td width="11%" align="center" valign="top"><form name="form1" method="post" action="javascript:popUpWindow('update_installer.php?installer=<?php echo $row_Installers['id']; ?>', '200', '100', '395', '590')">
                      
                    <input class="inputbox" name="editpackage" type="submit" value="<?php echo $lang_edit; ?>">
                    </form></td>
                  <td width="15%" align="center" valign="top"><form name="form1" method="post" action="installers.php">
                      <input name="delete" type="hidden" value="yes">
                      <input name="id" type="hidden" value="<?php echo $row_Installers['id']; ?>">
                      
                    <input class="inputbox" name="deletepackage" type="submit" value="<?php echo $lang_delete; ?>">
                    </form></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } while ($row_Installers = mysql_fetch_assoc($Installers)); ?>
        <br>
        <font size="2">**<a href="installers.php"><?php echo $lang_lnkrefresh; ?></a>**</font> 
        <br>
      </div></div>
        <table width="65" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
			<td><div align="center"><form name="form1" method="post" action="javascript:popUpWindow('addnew_installer.php', '200', '100', '422', '560')">
                    <div align="right">
                      <input class="inputbox" type="submit" name="Submit" value="New Installer" onsubmit>
                    </div>
                  </form></div></td>
            </tr>
          </table>
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