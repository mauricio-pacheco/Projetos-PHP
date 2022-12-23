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
	die('No');
}
 
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_update"])) && ($HTTP_POST_VARS["MM_update"] == "form1")) {
  $updateSQL = sprintf("INSERT INTO installers (name, shortname, scripttype, filepath, website, exampledir, welcome, instructions, icon, finalmessage) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['name'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['shortname'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['scripttype'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['filepath'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['website'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['exampledir'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['welcome'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['instructions'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['icon'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['finalmessage'], "text"));

  mysql_select_db($database_Customer_Database, $Customer_Database);
  $Result1 = mysql_query($updateSQL, $Customer_Database) or die(mysql_error());

  echo ("<script language=javascript>alert ('".$lang_nicreated."')</script>");
  echo ("<script language=javascript>window.close()</script>");
}

if (!isset($_SESSION['username'])) {
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}

?><html>
<head>
<title><?php echo $lang_ninewinstaller; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" height="168" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="168" align="left" valign="top"> 
      <form name="form1" method="post" action="<?php echo $editFormAction; ?>">
        <p><strong><img src="../images/icons/password.gif" width="32" height="32" align="absmiddle"><?php echo $lang_btnnewinstaller; ?></strong></p>
        <p><font size="2"><?php echo $lang_niscriptfull; ?>: 
          <input name="name" type="text" id="name">
          (ex. PHP-Nuke v6.9)<br>
          <?php echo $lang_niscriptshort; ?>: 
          <input name="shortname" type="text" id="shortname">
          (ex. Nuke)
          <input name="scripttype" type="hidden" id="scripttype" value="PHP">
          <br>
          <?php echo $lang_niscriptfilepath; ?>: 
          <input name="filepath" type="text" id="filepath">
          <br>
          (ex. c:/wwwroot/cpanel/phpnuke69/)<br>
          <?php echo $lang_niscripthomepage; ?>: 
          <input name="website" type="text" id="website">
          <br>
          (ex. http://www.phpnuke.org) <br>
          <?php echo $lang_niexampledir; ?>: 
          <input name="exampledir" type="text" id="exampledir">
          (ex. nuke)<br>
          <?php echo $lang_niicon; ?>: 
          <select name="icon" id="icon">
            <?php
$maindir = $row_Config['installdir']."/images/icons" ;
$mydir = opendir($maindir) ; 
$exclude = array( "." , ".." , "thumbs.db") ;
while($fn = readdir($mydir)) 
{ if ($fn == $exclude[0] || $fn == $exclude[1]) continue; 
echo "<option value=images/icons/$fn>$fn</option>"; }
closedir($mydir);
?>
          </select>
          <br>
          </font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="26%" align="left" valign="top"><font size="2"><?php echo $lang_niwelcome; ?>:</font></td>
            <td width="39%"><font size="2"> 
              <textarea name="welcome" wrap="VIRTUAL" id="textarea"></textarea>
              </font></td>
            <td width="35%" rowspan="2" align="left" valign="top"><p><strong>Variables:</strong></p>
              <ul>
                <li><font size="2">%username%</font></li>
                <li><font size="2">%url% -<?php echo $lang_nitheirurl; ?></font></li>
              </ul></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="27%" align="left" valign="top"><font size="2"><?php echo $lang_niinstructions; ?>:</font></td>
            <td width="41%"><font size="2"> 
              <textarea name="instructions" wrap="VIRTUAL" id="textarea2"></textarea>
              </font></td>
            <td width="32%" rowspan="2" align="left" valign="top"><ul>
                <li><font size="2">%username%</font></li>
                <li><font size="2">%dir%</font></li>
              </ul></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="27%" align="left" valign="top"><font size="2"><?php echo $lang_nifinal; ?>:</font></td>
            <td width="42%"><font size="2"> 
              <textarea name="finalmessage" wrap="VIRTUAL" id="textarea3"></textarea>
              </font></td>
            <td width="31%">&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p align="right"><font size="2"><br>
          <input name="id" type="hidden" id="id" value="<?php echo $row_Installers['id']; ?>">
          <input name="MM_update" type="hidden" value="form1">
          <input type="submit" name="Submit" value="<?php echo $lang_btncreate; ?>">
          </font></p>
      </form></td>
  </tr>
</table>
</body>
</html>
