<?php

/* check login script, included in db_connect.php. */

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
	$logged_in = 0;
	return;
} else {

	// remember, $_SESSION['password'] will be encrypted.

	if(!get_magic_quotes_gpc()) {
		$_SESSION['username'] = addslashes($_SESSION['username']);
	}


	// addslashes to session username before using in a query.
//	$pass = $db_object->query("SELECT ftppass FROM custumerbase WHERE servicename = '".$_SESSION['username']."'");

$colname_Recordset1 = "1";
mysql_select_db($db_name, $Customer_Database);
$query_pass = sprintf("SELECT ftppass FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
$pass = mysql_query($query_pass, $Customer_Database);
$row_pass = mysql_fetch_assoc($pass);

$colname_Recordset2 = "1";
mysql_select_db($db_name, $Customer_Database);
$query_status = sprintf("SELECT status FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset2);
$status = mysql_query($query_status, $Customer_Database);
$row_status = mysql_fetch_assoc($status);

	if (mysql_error()) {
		$logged_in = 0;
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		// kill incorrect session variables.
	}

	// now we have encrypted pass from DB in 
	//$pass['password'], stripslashes() just incase:

//	$pass['ftppass'] = stripslashes($pass['ftppass']);

	//compare:



	if($_SESSION['password'] == $row_pass['ftppass']) { // valid password for username
		if (strtolower($row_status['status']) == 'suspended') {
			echo ("<script language=javascript>alert('Your account is currently suspended...')</script>");
			echo ("<script language=javascript>document.location.href = 'suspended.php'</script>");
		}else{
			$logged_in = 1; // they have correct info, logged in
		}
	} else {
		$logged_in = 0;
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		// kill incorrect session variables.
	}
}


// clean up
//unset($pass['password']);

?>