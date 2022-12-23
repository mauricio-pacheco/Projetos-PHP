<?php
if (!function_exists('file_get_contents')) 
{ 
    function file_get_contents($filename, $use_include_path = 0) 
    { 
        $file = @fopen($filename, 'rb', $use_include_path); 
        if ($file) 
        { 
            if ($fsize = @filesize($filename)) 
            { 
                $data = fread($file, $fsize); 
            } 
            else 
            { 
                while (!feof($file)) 
                { 
                    $data .= fread($file, 1024); 
                } 
            } 
            fclose($file); 
        } 
        return $data; 
    } 
} 
    
	    $pazo = 'dGhlbWVzL1hELVpvbmFyL2ltYWdlcy9GVC9YRC1ab2x1X0ZUX0NSXzA0LmdpZg==';  // Cambio + para otros temas , - para V2
    $pazo1 = base64_decode($pazo);
	
	$file = file_get_contents($pazo1);
 
$size = strlen($file);
  
    $theme22 = 'NzA4MQ=='; //Cambio + para otros temas , - para V2
    $theme2 = base64_decode($theme22);
   
$onlinesize = $theme2;
if ($size > $onlinesize)
{
$reqdec = base64_decode($reqcode);
$decode1 = "An Error Has Occured Click <a href=\"http://www.xtrato.com/violator\">HERE</a> To Clear The Error";
$decode2 = "<center>$decode1</center>";
die("$decode2");
}
if ($size < $onlinesize)
{
$reqdec = base64_decode($reqcode);
$decode1 = "An Error Has Occured Click <a href=\"http://www.xtrato.com/violator\">HERE</a> To Clear The Error";
$decode2 = "<center>$decode1</center>";
die("$decode2");
}

?>