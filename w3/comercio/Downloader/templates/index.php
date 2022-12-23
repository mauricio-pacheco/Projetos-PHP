<?
/*
This feature is not official. Its created by TrioxX - DecodeThe.Net
*/

require '../../config/config.php';

$tmode = $_GET['tmode'];
$template = $_GET['template'];

if($tmode == 'getInfo' && !empty($template) && file_exists("getInfo/".$template.".txt"))
{
$echotpl = file_get_contents("getInfo/".$template.".txt");
}
elseif($tmode == 'verifyDownload' && !empty($template) && file_exists("verifyDownload/".$template.".txt"))
{
$echotpl = file_get_contents("verifyDownload/".$template.".txt");
}
elseif($tmode == 'streamZip' && !empty($template) && file_exists("streamZip/".$template.".zip"))
{
readfile("streamZip/".$template.".zip");
exit();
}
elseif($tmode == 'versionCheck' && !empty($template) && file_exists("versionCheck/".$template.".txt"))
{
$echotpl = file_get_contents("versionCheck/".$template.".txt");
}
else
{
$echotpl = file_get_contents("templates.txt");
}

$echotpl = str_replace("%%ISCURL%%", $GLOBALS['ISC_CFG']["ShopPath"]."/Downloader/", $echotpl);
echo $echotpl;
exit();
?>