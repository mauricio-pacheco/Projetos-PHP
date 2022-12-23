<?php
//require_once('database/db.php');

$colname_Recordset1 = "1";
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = "SELECT * FROM billingbase WHERE servicename = '".$_SESSION['username']."' ORDER BY date DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Customer_Database) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($HTTP_GET_VARS['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $HTTP_GET_VARS['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<p><img src="images/icons/cgicenter.gif" width="32" height="32"><b><font size="5"><?php echo $lang_billinginfo; ?></font></b></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."...<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?><?php echo $lang_billingactivity; ?><br>
  (<a href="#credit"><?php echo $lang_checkbalance; ?></a>)</font></p>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
  <tr bordercolor="#FFFFFF"> 
    <td width="13%" bgcolor="#769FEB"> <div align="center"><font color="#FFFFFF" size="2"><?php echo $lang_date; ?></font></div></td>
    <td width="20%" bgcolor="#769FEB"> <div align="center"><font color="#FFFFFF" size="2"><?php echo $lang_service; ?></font></div></td>
    <td width="19%" bgcolor="#769FEB"><div align="center"><font color="#FFFFFF" size="2"><?php echo $lang_debitcredit; ?></font></div></td>
    <td width="14%" bgcolor="#769FEB"> <div align="center"><font color="#FFFFFF" size="2"><?php echo $lang_paymentmethod; ?></font></div></td>
    <td width="34%" bgcolor="#769FEB"> <div align="center"><font color="#FFFFFF" size="2"><?php echo $lang_amount; ?></font></div></td>
  </tr>
  <?php $totalbill = "0"; $lastdate = "Unknown"; ?>
  <?php do { ?>
  <tr bordercolor="#CCCCCC"> 
    <td><font size="2"><?php echo $row_Recordset1['date']; ?></font></td>
    <td><font size="2"><?php echo $row_Recordset1['service']; ?></font></td>
    <td><font size="2"><?php echo $row_Recordset1['debitorcredit']; ?></font></td>
    <td><font size="2"><?php echo $row_Recordset1['method']; ?></font></td>
    <td><font size="2"><?php echo $lang_currency." ".$row_Recordset1['amount']; ?></font></td>
  </tr>
  <?php
  $totalbill = ($totalbill + $row_Recordset1['amount']);
  } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  ?>
</table>
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr align="left" valign="top"> 
    <td width="39%"><p><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a name="credit"></a><?php echo $lang_currentbalance; ?><br>
        </font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?php echo $lang_currency." ".($totalbill * -1); ?></font> </p>
      <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_usestatements; ?></font></p></td>
    <td width="61%" bgcolor="#769FEB"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><?php echo $lang_notice; ?>:</strong> 
      <?php echo $lang_billingnotice; ?></font></td>
  </tr>
</table>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
<?php
mysql_free_result($Recordset1);
?>

