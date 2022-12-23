<?php

require_once('database/db.php');	// database connect script.

if ($logged_in == 0) {
	die('You are not logged in so you cannot log out.');
}


unset($_SESSION['username']);
unset($_SESSION['password']);
// kill session variables
$_SESSION = array(); // reset session array
session_destroy();   // destroy session.
header('Location: index.php');
// redirect them to anywhere you like.
?>