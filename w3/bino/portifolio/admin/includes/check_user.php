<?php
session_start(); 

if(!isset($_SESSION['user_level'])){
	//session is not set - redirect to login
	header("Location:index.php");
	exit();
}
?>