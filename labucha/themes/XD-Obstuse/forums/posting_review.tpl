<?php
getusrinfo($user);
    cookiedecode($user);
		echo "<body background=\"themes/XD-Obstuse/images/bg.gif\"  topmargin=\"0\">\n"
	    ."<br>\n";

    mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $mtimed = 'dGhlbWVzL1hELUdhbWVyc1YyL2ZvcnVtcy9sb2dpbl9tYWluLnRwbA==';
    $mretimed = base64_decode($mtimed);
    require $mretimed;
    $random_num = mt_rand(0, $maxran);
    $datekey = date("F j");
    $rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
    $code = substr($rcode, 2, 6);
    $username = $cookie[1];
    $real = 'dGhlbWVzL1hELUdhbWVyc1YyL2ZvcnVtcy9hZ3JlZW1lbnRzLnRwbA==';
    $public_decode = base64_decode($real);
    require $public_decode;
    $username = $cookie[1];
 if ($username == "") {
        $username = "GUEST";
    }
        $public_msg = public_message(); 
    echo "$public_msg";
    $uresult = $db->sql_query("select user_id from ".$user_prefix."_users where username='$username'");
    list($uid) = $db->sql_fetchrow($uresult);
    $presult = $db->sql_query("select * from ".$prefix."_bbprivmsgs where privmsgs_to_userid='$uid' AND (privmsgs_type='0' OR privmsgs_type='1' OR privmsgs_type='3' OR privmsgs_type='5')");
    $pnumrow = $db->sql_numrows($presult);

	$userip = getenv('REMOTE_ADDR'); //~ get ip address 
	

    if ($username == "GUEST") {
        $theuser ="<table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"24\" ><tr><td ><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"449\" height=\"178\"><param name=\"movie\" value=\"themes/XD-Obstuse/Flash/login.swf?pm=$pnumrow&userip=$userip&username=$username\"><param name=\"quality\" value=\"high\"><embed src=\"themes/XD-Obstuse/Flash/login.swf?pm=$pnumrow&userip=$userip&username=$username\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"449\" height=\"178\"></embed></object></td></tr></table>\n";
} else {
        $theuser ="<table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"24\"><tr><td ><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"449\" height=\"178\"><param name=\"movie\" value=\"themes/XD-Obstuse/Flash/login2.swf?pm=$pnumrow&userip=$userip&username=$username\"><param name=\"quality\" value=\"high\"><embed src=\"themes/XD-Obstuse/Flash/login2.swf?pm=$pnumrow&userip=$userip&username=$username\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"449\" height=\"178\"></embed></object></td></tr></table>\n";
}
    echo "<!----- Theme Design Copyright &copy; 2003-2004 Strato Designs  (http://www.xtrato.com- admin@xtrato.com) ----->\n";
echo "<!----- XD-Obstuse - Unique Themes. Currently using XD-Obstuse, a Unique theme license, for more information regarding Xtrato Designs visit www.xtrato.com . ----->\n";

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
} 	    $pazo = 'dGhlbWVzL1hELUdhbWVyc1YyL0ZsYXNoL2xvZ2luMi5zd2Y='; // NO CAMBIO EN V2 , CAMBIO EN OTROS
    $pazo1 = base64_decode($pazo);
	
	$file = file_get_contents($pazo1);
 
$size = strlen($file);


    $theme22 = 'NTI1Mjc='; // Code 747 Cambio EL PINCHE SIZE
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