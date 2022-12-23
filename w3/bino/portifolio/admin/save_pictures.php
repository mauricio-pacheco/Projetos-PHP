<?php
//check user
require dirname(__FILE__).'/includes/check_user.php';

require dirname(__FILE__).'/includes/functions.php';

//get the post variables
$deletes = explode(",",$_POST['pic_deletes']);
$names = explode(",",$_POST['pic_names']);
$descs = explode("<break>",$_POST['pic_descs']);
$folder = $_POST['folder'];
$gallery = $_POST['gallery'];

// -------delete any pictures that need it-------
if($deletes[0] != ""){
	foreach($deletes as $delete){
		//get the server path to the picture to delete
		$pic = realpath("../" . $folder. "/" . $delete);
		$pic_thumb = realpath("../" . $folder. "/thumbs/" . $delete);
		//delete picture and its thumbnail
		if(file_exists($pic)){
			unlink($pic);
		} 
		if(file_exists($pic_thumb)){
			unlink($pic_thumb);
		}
	}
}
// ------  save new pics.xml -------

$filename = realpath("../" . $folder . "/pics.xml");

//make xml for new pics.xml
$xml = "<pictures>\n";

if($names[0] != ""){
	foreach($names as $key => $value){
		$xml .= "\t<image location=\"" . $value . "\" desc=\"" . stripslashes($descs[$key]) . "\" />\n";
	}
}

$xml .= "</pictures>";

// make sure pics.xml exists and is writable
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
   error("pics.xml does not seem to be writable. Check that you have changed its CHMOD settings to 777.");
}

//go back to picture admin for this gallery
header("Location:page_pictures.php?name=$gallery&folder=$folder");
?>