<?php
//Making connection to session and configs
include ('database/db.php');

//Establishing database connections
$colname_Recordset1 = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Customer_Database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Packages = "1";
mysql_select_db($database_Customer_Database, $Customer_Database);
$query_Packages = sprintf("SELECT * FROM packages WHERE package_name = '".$row_Recordset1['webservice']."'", $colname_Packages);
$Packages = mysql_query($query_Packages, $Customer_Database) or die(mysql_error());
$row_Packages = mysql_fetch_assoc($Packages);
$totalRows_Packages = mysql_num_rows($Packages);

//Loading a fault to make sure no errors occur if a page isn't specified
if (!isset($_GET['page'])){
	$body = "main.php";
}else{
	$body = $_GET['page'] . ".php";
}

//Loading variables for template
$template_username = $row_Recordset1['servicename'];
$template_homelink = '<a href="?page=main">'.$lang_home.'</a>';
if ($_SESSION['Rank'] == "Admin") {
	$template_admlink = ('<a href=admin/index.php>'.$lang_administration.'</a><br>');
}else{
	$template_admlink = '';
}
$template_logoutlink = '<a href="logout.php" target="_parent">'.$lang_logout.'</a>';
$template_zcopy = '<font size=2>ZPanel &copy; 2004 Zee-Way Services<br><a href=http://www.thezpanel.com>http://www.thezpanel.com</a></font>';

//Loading template
$templatefolder = $row_Config['template'];
include('templates/'.$templatefolder.'/template.php');

?>