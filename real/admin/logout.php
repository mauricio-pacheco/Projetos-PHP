<?php
	session_start();
	header('HTTP/1.0 401 Unauthorized');
	
	session_register("username");
	session_register("userpassword");
	session_register("userID");
	$current_user = "";
	$agentname = "";
	session_unset();
	session_destroy();

	include("../include/common.php");

	global $config, $lang;



	include("$config[template_path]/admin_top.html");
	echo "<P>$lang[you_are_logged_out]...</P>";
	
	include("$config[template_path]/admin_bottom.html");
?>