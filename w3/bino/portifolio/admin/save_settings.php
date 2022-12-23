<?php
//check user
require dirname(__FILE__).'/includes/check_user.php';

require dirname(__FILE__).'/includes/functions.php';

//get the post variables
$border = $_POST['border'];
$text = $_POST['text'];
$navtext = $_POST['navtext'];
$navbg = $_POST['navbg'];
$navgrad = $_POST['navgrad'];
$thumbborder = $_POST['thumbborder'];
$thumbbg = $_POST['thumbbg'];
$mainbg = $_POST['mainbg'];
$popups = $_POST['popups'];
$splash = $_POST['splash'];

$filename = realpath("../settings.xml");

//make xml
$xml = "<settings>
	<bordercolor>$border</bordercolor>
	<textcolor>$text</textcolor>
	<navtextcolor>$navtext</navtextcolor>
	<navbgcolor>$navbg</navbgcolor>
	<navgradcolor>$navgrad</navgradcolor>
	<thumbbordercolor>$thumbborder</thumbbordercolor>
	<thumbbgcolor>$thumbbg</thumbbgcolor>
	<mainbgcolor>$mainbg</mainbgcolor>
	<popups>$popups</popups>
	<splash>$splash</splash>
</settings>";

/*
<settings>
	<bordercolor>00000</bordercolor>
	<textcolor>FFFFFF</textcolor>
	<navtextcolor>FFFFFF</navtextcolor>
	<navbgcolor>000066</navbgcolor>
	<navgradcolor>660066</navgradcolor>
	<thumbbordercolor>000000</thumbbordercolor>
	<thumbbgcolor>000000</thumbbgcolor>
	<mainbgcolor>FFFFFF</mainbgcolor>
	<popups>true</popups>
	<splash>splash.jpg</splash>
</settings>
*/

// make sure xml exists and is writable
if (is_writable($filename)) {
	//open the file
   if (!$handle = fopen($filename, 'wb')) {
         error("Cannot open file");
         exit;
   }

   // writing new xml
   if (fwrite($handle, $xml) === FALSE) {
       error("Cannot write to file");
       exit;
   }
   
   fclose($handle);

} else {
   error("settings.xml does not seem to be writable. Check that you have changed its CHMOD settings to 777.");
}

//go back to settings page
header("Location:page_settings.php");
?>