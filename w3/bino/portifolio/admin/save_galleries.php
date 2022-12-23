<?php
//check user
require dirname(__FILE__).'/includes/check_user.php';

require dirname(__FILE__).'/includes/functions.php';

//get the post variables
$deletes = explode(",",$_POST['gal_deletes']);
$names = explode(",",$_POST['gal_names']);
$folders = explode(",",$_POST['gal_folders']);

// -------delete any galleries that need it-------
if($deletes[0] != ""){
	foreach($deletes as $delete){
		//get the server path to the gallery to delete
		$dir = realpath("../" . $delete);
		if(is_dir($dir)){
			//delete the gallery
			rmdirr($dir);
		}
	}
}
// ------  save new menu.xml -------

$filename = realpath("../menu.xml");

//make xml for new menu.xml
$xml = "<menu>\n";

if($names[0] != ""){
	foreach($names as $key => $value){
		$xml .= "\t<menu name=\"" . $value . "\" folder=\"" . $folders[$key] . "\" />\n";
	}
}

$xml .= "</menu>";

// make sure menu.xml exists and is writable
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
   error("menu.xml does not seem to be writable. Check that you have changed its CHMOD settings to 777.");
}

//go back to gallery admin main page
header("Location:page_galleries.php");
?>