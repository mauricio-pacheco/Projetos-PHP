<?php


include("../include/common.php");
include("$config[template_path]/admin_top.html");

if ($email != "")
	{
	// first, create a random password
	$build_pass = "";
	for ($counter=1;$counter<=10; $counter++)
		{
		$random_number = rand(65,90);
		$build_pass .= chr($random_number);
		}
	
	// now, insert the random pass into the db
	$sql_email = make_db_safe($email);
	$md5_pass = md5($build_pass);
	$md5_pass = make_db_safe($md5_pass);
	$sql = "UPDATE UserDB SET user_password=$md5_pass WHERE emailAddress = $sql_email";
	
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	
	// build the message
	$message = "$lang[your_password_has_been_changed_to]: $build_pass";
	
	// finally, email the password to the user
	mail("$email", "$lang[your_new_password]", $message,"From: $config[admin_email]", "-f$config[admin_email]");

	echo "<p>$lang[your_password_has_been_emailed_to] $email</p>";
	}


include("$config[template_path]/admin_bottom.html");

$conn->Close(); // close the db connection
?>
