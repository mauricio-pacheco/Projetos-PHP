<?php
session_start();  // Start Session 

require dirname(__FILE__).'/includes/functions.php';

// Convert to simple variables 
$user = $_POST['username']; 
$pass = $_POST['password']; 

if((!$user) || (!$pass)){ 
    error("Please enter a value for username and password.") ;
}

// get username and pass from xml file
$p =& new xmlParser();
$p->parse('chave.xml');
$config = $p->output[0]['child'];
$valid_user = $config[0]['content'];
$valid_pass = $config[1]['content'];
$thumbs = $config[2]['content'];

//echo $p->output[0][child][0][content];
//print_r(array_values($p->output[0][child][0][content]));


$level = 1;

if(($user == $valid_user) && ($pass == $valid_pass)){ 
        // Register some session variables! 
        session_register('special_user'); 
        $_SESSION['user_level'] = $level;
		$_SESSION['thumbs'] = $thumbs;
         
        header("Location:page_galleries.php");
		exit();
} else { 
   error("Invalid Login.");
} 

?>