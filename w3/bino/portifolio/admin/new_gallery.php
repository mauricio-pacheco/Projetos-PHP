<?php
//check user

require dirname(__FILE__).'/includes/check_user.php';

require dirname(__FILE__).'/includes/functions.php';

//get new name
$new_name = $_POST["new_name"];

//format the name to be a folder name
$new_folder = str_replace(" ", "_", strtolower($new_name));


//------------- writing new menu.xml ----------------//

//path to menu.xml
$filename = realpath("../menu.xml");

// make sure menu.xml exists and is writable
if (is_writable($filename)) {
	//open the file for reading and writing
   if (!$handle = fopen($filename, 'r+b')) {
         error("Cannot open file");
         exit;
   }

   //read file
   $contents = fread($handle, filesize($filename));
   
   //rewind file pointer to start and truncate file to zero
   rewind($handle);
   ftruncate($handle, 0);
   
   //strip off </menu> at end of contents
   $contents = str_replace("</menu>","",$contents);
   
   //attach new gallery name
   $contents .= "\t<menu name=\"" . $new_name . "\" folder=\"" . $new_folder . "\" />\n";
   $contents .= "</menu>";

   // writing new menu.xml
   if (fwrite($handle, $contents) === FALSE) {
       error("Cannot write to file");
       exit;
   }
   
   fclose($handle);

} else {
   error("menu.xml does not seem to be writable. Check that you have changed its CHMOD settings to 777.");
}

//---------------- done writing new menu.xml --------------//

//make new folder and chmod it
mkdir(realpath("../") . '/' . $new_folder, 0777);

//chmod again just to make sure
chmod(realpath("../") . '/' . $new_folder, 0777);

//also make the thumbs folder for this gallery
mkdir(realpath("../") . '/' . $new_folder . '/thumbs', 0777);

//chmod again just to make sure
chmod(realpath("../") . '/' . $new_folder . '/thumbs', 0777);

//make a pics.xml for the gallery
//path to xml
$filename = realpath("../") . '/' . $new_folder . '/pics.xml';

//open the file for writing
if (!$handle = fopen($filename, 'wb')) {
	error("Cannot open file $filename");
	exit;
}
// writing new xml
if (fwrite($handle, "<pictures>\n</pictures>") === FALSE) {
	error("Cannot write to file");
	exit;
}

//go back to gallery admin main page
header("Location:page_galleries.php");
?>