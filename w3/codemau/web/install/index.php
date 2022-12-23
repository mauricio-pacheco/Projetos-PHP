<html>
<head>
<title>Testing UebiMiau installation ...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<font face=Arial size=2>

<?
chdir('../');
$error = false;
$warn = false;

echo('<strong>This script will test your configurations and try to tell you a solution.<br>
All configurations are located in <font face="Courier New" color=Gray>/inc</font> folder and appears as config.*.php</strong><br>
<hr>');

echo('<br><strong>- Testing <font face="Courier New" color=Gray>inc/config.php</font></strong><br>
(<em>if the script stops here, there are a parse problem with your file, eg you have misstyped some " ou ;, try getting a fresh copy and re-editing it</em>)<br>...');

@include('inc/config.php');

if($ALL_OK) echo('<font color=green><strong>PASSED</strong></font><br>');
else  die('<font color=red><strong>FAILED</strong></font><br>There are problems with your <font face="Courier New" color=Gray>config.php</font>, try getting a fresh copy and re-editing it<br>');

echo('<br><strong>- Testing your $temporary_directory variable</strong>... ');

$localpath = realpath('./');
$temppath = realpath($temporary_directory);

if(!is_writable($temporary_directory)) {
	echo('<font color=red><strong>FAILED</strong></font>
	<br>The path given in <font face="Courier New" color=Gray>$temporary_directory</font> points to a folder that is no writable<br>
	The user wich your webserver runs on (apache in *nix or IUSR_name in windows) MUST have rights to create folder and files<br>
	on this directory. try chmod or Properties dialog');
	$error = true;
} elseif(substr($temppath, 0, strlen($localpath)) == $localpath) {
	echo('<font color=red><strong>WARNING</strong></font>
	<br>The path given in <font face="Courier New" color=Gray>$temporary_directory</font> points to a folder inside the main folder<br>
	Eg. main folder is /var/html/uebimiau and temp folder is /var/html/uebimiau/tmp<br>
	There are security issues using this configuration, please choose a non-shared folder to store temporary files<br>
	/var/uebimiau is a good choice<br>');
	$warn = true;
} else {
	echo('<font color=green><strong>PASSED</strong></font><br>');
}

$phpver = phpversion();
$phpver = doubleval($phpver[0].".".$phpver[2]);

echo('<br><strong>- Testing your PHP version</strong>... ');

if($phpver >= 4.1) echo('<font color=green><strong>PASSED</strong></font><br>');
else {
	echo('<font color=red><strong>FAILED</strong></font><br> You are using PHP version '.$phpver.', <br>
there are SERIOUS security risks using versions below 4.1. UebiMiau will not work properly with your version, please update now.<br>');
	$error = true;
}

$tempSize = 
	str_replace('K', '*1024', 
	str_replace('M', '*1024*1024', 
	str_replace('G', '*1024*1024*1024', 
	ini_get('memory_limit'))));

$memoryLimit = 8*1024*1024; //default is 8Mb
if($tempSize) eval("\$memoryLimit = $tempSize;");

echo('<br><strong>- Testing your memory limits</strong>... ');

if($memoryLimit < 8) {
	echo('<font color=red><strong>FAILED</strong></font>
	<br>PHP.ini\'s <font face="Courier New" color=Gray>memory_limit</font> must be at least <code>8M</code> (We recommend 64M (64 MegaBytes)<br>');
	$error = true;
} elseif($memoryLimit >= 8 && $memoryLimit < 64) {
	echo('<font color=red><strong>WARNING</strong></font>
	<br>PHP.ini\'s <font face="Courier New" color=Gray>memory_limit</font> should be at least 64M (64 MegaBytes)<br>');
	$warn = true;
} else {
	echo('<font color=green><strong>PASSED</strong></font><br>');
}

echo('<br><strong>- Testing server installation</strong>... ');


if(ini_get('safe_mode')) {
	echo('<font color=red><strong>WARNING</strong></font>
	<br>PHP.ini\'s <font face="Courier New" color=Gray>safe_mode</font> is on. You may have problems with this configuration<br>');
	$warn = true;
} else {
	echo('<font color=green><strong>PASSED</strong></font><br>');
}

echo('<br><hr><br>');
if($error) {
?>

<strong><font color="red">
Your system is not ready to run UebiMiau.<br>
</font>
<h3>Please fix all <font color="red">FAILED</font> topics and run this page again</h3>
</strong></font>
<?
} else {
?>
<strong><font color="#003366">
Your system appears to be ready to run UebiMiau.<br><br>
<?
if($warn) {
?>
There are some <font color="red">WARNINGS</font> that should be fixed before you deploy your webmail.<br>
<br>
<? 
}
?>

Before you start using, make sure you've correctly configured your <font face="Courier New">$smtp_server</font><br>
variable. If you will use an external SMTP server, please make sure you will not  need a SMTP Authentication. <br>
In positive case , use the <font face="Courier New">$use_password_for_smtp</font> variable, otherwise you will<br>
receive a "Verify your relay rules" error message while sending mails<br><br><br>
<h3>To start using your webmail, please delete the <font face="Courier New" color=Gray>/install</font> folder AND <a href="../">CLICK HERE TO CONTINUE</a></h3>
</font></strong></font>
<?
}
?>
</body>
</html>
