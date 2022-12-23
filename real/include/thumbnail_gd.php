<?
function make_thumb ($input_file_name, $input_file_path)
	{
	// makes a thumbnail using the GD library
	global $config;
	
	$quality = 100; // jpeg quality -- the lower the num, the smaller the file size
	
	// first, grab the dimensions of the pic
	$imagedata = GetImageSize("$input_file_path/$input_file_name");
	$imagewidth = $imagedata[0];
	$imageheight = $imagedata[1];
	$imagetype = $imagedata[2];
	// type definitions
	// 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP
	// 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order)
	// 9 = JPC, 10 = JP2, 11 = JPX
	$thumb_name = $input_file_name; //by default
	
	// the GD library, which this uses, can only resize JPG and PNG
	if ($imagetype == 2)
		{
		// it's a JPG
		// figure out the ratio to which it should be shrunk, if at all
		$shrinkage = 1;
		if ($imagewidth > $config[thumbnail_width])
			{
			$shrinkage = $config[thumbnail_width]/$imagewidth;
			}
		$dest_height = $shrinkage * $imageheight;
		$dest_width = $config[thumbnail_width];
		
		$src_img = imagecreatefromjpeg("$input_file_path/$input_file_name");
		$dst_img = imagecreate($dest_width,$dest_height);
		imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $dest_width,$dest_height, $imagewidth, $imageheight);
		$thumb_name = "thumb_"."$input_file_name";
		imagejpeg($dst_img, "$input_file_path/$thumb_name", $quality);
		imagedestroy($src_img);
		imagedestroy($dst_img);
		} // end if $imagetype == 2
	
	elseif ($imagetype == 3)
		{
		// it's a PNG
		// figure out the ratio to which it should be shrunk, if at all
		$shrinkage = 1;
		if ($imagewidth > $config[thumbnail_width])
			{
			$shrinkage = $config[thumbnail_width]/$imagewidth;
			}
		$dest_height = $shrinkage * $imageheight;
		$dest_width = $config[thumbnail_width];
		
		$src_img = imagecreatefrompng("$input_file_path/$input_file_name");
		$dst_img = imagecreate($dest_width,$dest_height);
		imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $dest_width,$dest_height, $imagewidth, $imageheight);
		$thumb_name = "thumb_"."$input_file_name";
		imagepng($dst_img, "$input_file_path/$thumb_name");
		imagedestroy($src_img);
		imagedestroy($dst_img);
		} // end if $imagetype == 3
	
	
	return $thumb_name;
	} // end function make_thumb
?>