<?php
//check user
require dirname(__FILE__).'/includes/check_user.php';
require dirname(__FILE__).'/includes/ImageEditor.php';
require dirname(__FILE__).'/includes/functions.php';

//------ exact dimensions for thumbnails used in FIG ------//
$thumb_width = 148;
$thumb_height = 118;

//how thumbs should be processed
// full - a basic thumbnail
// crop - crops thumbnail to fit
$process = $_SESSION['thumbs'];

//ratio of width/height
$thumb_ratio = round($thumb_width/$thumb_height, 2);

$folder = $_POST['folder'];
$name = $_POST['name'];

$pics_xml_add = "";
$attach = $_POST['add'];

//upload pictures
for($x=1; $x<=5; $x++){
	if ($_FILES["file$x"]["size"] > 0) {
		//temp location
		$imgSource = $_FILES["file$x"]["tmp_name"];
		//path to gallery folder
		$dir = realpath("../$folder");
		//picture dir vars
		$pic = urldecode(basename($_FILES["file$x"]["name"]));
		//convert spaces to underscores
		$pic = str_replace(" ", "_", $pic);
		//move file 
		if(move_uploaded_file( $imgSource, "$dir/$pic")){
			list($width, $height, $type, $attr) = getimagesize("$dir/$pic");
			//get ratio of width/height
			$ratio = round($width/$height, 2);
			
			if ($process == "crop"){
				//determine the width and height to keep the thumbnail uniform
				//then crop the thumbnail in the center to get our new thumbnail
				if($ratio > $thumb_ratio){
					//picture is too wide so we will need to crop the thumbnails width
					$new_width = ceil(($width*$thumb_width)/$height);
					$new_height = $thumb_height;
					$crop_x = (round($new_width/2))-(round($thumb_width/2));
					$crop_y = 0;
				} elseif($ratio < $thumb_ratio){
					//picture is too high so we will need to crop the thumbnails height
					$new_width = $thumb_width;
					$new_height = ceil(($height*$thumb_height)/$width);
					$crop_x = 0;
					$crop_y = (round($new_height/2))-(round($thumb_height/2));
				} else {
					//the ratio of the image is the same as the thumbnail
					$new_width = $thumb_width;
					$new_height = $thumb_height;
					$crop_x = 0;
					$crop_y = 0;
				}
				
				//time to resize the image and crop it for thumbnail
				$imageEditor = new ImageEditor($pic, $dir . "/");
				//resize
				$imageEditor->resize($new_width, $new_height);
				//crop
				$imageEditor->crop($crop_x, $crop_y, $thumb_width, $thumb_height);
				//save
				$imageEditor->outputFile($pic, $dir . "/thumbs/");
			} else { //make a basic thumbnail
				if($ratio > $thumb_ratio){
					//picture is too wide so we will set the the width to its maximum
					$new_width = $thumb_width;
					$new_height = ceil(($thumb_width*$height)/$width);
				} elseif($ratio < $thumb_ratio){
					//picture is too high so we will set the height to its maximum
					$new_width = ceil(($thumb_height*$width)/$height);
					$new_height = $thumb_height;
				} else {
					//the ratio of the image is the same as the thumbnail
					$new_width = $thumb_width;
					$new_height = $thumb_height;
				}
				
				//time to resize the image and crop it for thumbnail
				$imageEditor = new ImageEditor($pic, $dir . "/");
				//resize
				$imageEditor->resize($new_width, $new_height);
				//save
				$imageEditor->outputFile($pic, $dir . "/thumbs/");
			}
			//create xml for this picture
			$pics_xml_add .= "\t<image location=\"" . $pic . "\" desc=\"" . stripslashes($_POST["desc$x"]) . "\" />\n";
		}
	}
}

//------------- writing new xml ----------------//

//path to xml
$filename = realpath("../$folder/pics.xml");

// make sure xml exists and is writable
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
   
   if ($attach == "start"){
		//attach pictures at beginning of gallery
		$contents = str_replace("<pictures>","",$contents);
		$contents = "<pictures>\n" . $pics_xml_add . $contents;
   } else {
   		//attach pictures at end of gally
		$contents = str_replace("</pictures>","",$contents);
		$contents .= $pics_xml_add . "</pictures>";
   }

   // writing new xml
   if (fwrite($handle, $contents) === FALSE) {
       error("Cannot write to file");
       exit;
   }
   
   fclose($handle);

} else {
   error("pics.xml does not seem to be writable. Check that you have changed its CHMOD settings to 777.");
}

//---------------- done writing new xml --------------//


?>
<html>
<head>
<title><?php echo $name; ?> - Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
p {
	line-height: 1.5em;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <p align="center"><a href="page_upload_pics.php?name=<?php echo $name; ?>&folder=<?php echo $folder; ?>">Enviar mais Imagens</a></p>
  <p align="center">OU</p>
  <p align="center"><a href="javascript:window.close();">Fechar esta Janela</a></p>
</body>
</html>