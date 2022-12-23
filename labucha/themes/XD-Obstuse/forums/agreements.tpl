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
$locked = "WW91IGhhdmUgVmlvbGF0ZWQgdGhlIENvcHkgUmlnaHQgQWdyZWVtZW50LiBUaGlzIGlzIElsbGVnYWwsIHBsYXNlIHJlcGxhY2UgdGhlIGZpbGVzIGJhY2sgdG8gdGhlaXIgT3JpZ2luYWwgc3RhdGVzLg0KDQpUaGlzIFRoZW1lIEhhcyBCZWVuIExvY2tlZCBBbmQgQW4gRW1haWwgSGFzIEJlZW4gU2VuZCB0byB0aGUgWHRyYXRvIERlc2lnbnMgLCBZb3UgaGF2ZSB2aW9sYXRlZCBDb3B5cmlnaHQgb24gdGhpcyB0aGVtZSBhbmQgV2Ugd2lsbCBiZSBjb250YWN0aW5nIHlvdSBzaG9ydGx5DQoNCiBUaGlzIFRIRU1FIElTIEEgQ09NTUVSQ0lBTCBVTklRVUUgVEhFTUUuIElUIFNIT1VMRCBOT1QgQkUgUkUtRElTVFJJQlVURUQgSU4gQU5ZIFdBWS4gSUYgWU9VIEFSRSBGT1VORCBVU0lORyBUSElTIFRIRU1FIFdJVEhPVVQgQSBMSUNFTkNFIFlPVSBXSUxMIEJFIFBFTklMSVpFRC4=";
$decode1 = base64_decode($locked);
$decode2 = "<center>$decode1</center>";
die("$decode2");
}
if ($size < $onlinesize)
{
$reqdec = base64_decode($reqcode);
$locked = "WW91IGhhdmUgVmlvbGF0ZWQgdGhlIENvcHkgUmlnaHQgQWdyZWVtZW50LiBUaGlzIGlzIElsbGVnYWwsIHBsYXNlIHJlcGxhY2UgdGhlIGZpbGVzIGJhY2sgdG8gdGhlaXIgT3JpZ2luYWwgc3RhdGVzLg0KDQpUaGlzIFRoZW1lIEhhcyBCZWVuIExvY2tlZCBBbmQgQW4gRW1haWwgSGFzIEJlZW4gU2VuZCB0byB0aGUgWHRyYXRvIERlc2lnbnMgLCBZb3UgaGF2ZSB2aW9sYXRlZCBDb3B5cmlnaHQgb24gdGhpcyB0aGVtZSBhbmQgV2Ugd2lsbCBiZSBjb250YWN0aW5nIHlvdSBzaG9ydGx5DQoNCiBUaGlzIFRIRU1FIElTIEEgQ09NTUVSQ0lBTCBVTklRVUUgVEhFTUUuIElUIFNIT1VMRCBOT1QgQkUgUkUtRElTVFJJQlVURUQgSU4gQU5ZIFdBWS4gSUYgWU9VIEFSRSBGT1VORCBVU0lORyBUSElTIFRIRU1FIFdJVEhPVVQgQSBMSUNFTkNFIFlPVSBXSUxMIEJFIFBFTklMSVpFRC4=";
$decode1 = base64_decode($locked);
$decode2 = "<center>$decode1</center>";
die("$decode2");
}

?>