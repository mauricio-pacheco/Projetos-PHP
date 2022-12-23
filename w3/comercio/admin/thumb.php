<?php

require_once(dirname(__FILE__).'/init.php');

$TemplateName = AlphaNumOnly($_GET['tpl']);
$TemplateColor = AlphaNumExtendedOnly($_GET['color']); // (colors have an underscore)
$TemplateImageFile = ISC_BASE_PATH . '/templates/'.$TemplateName . '/Previews/'.$TemplateColor;
$CacheTemplateImageFile = ISC_BASE_PATH . '/cache/tplthumbs/'.$TemplateName.'_'.$TemplateColor;
$maxwidth = '200';
$maxheight = '200';

// check cache first
if(file_exists($CacheTemplateImageFile)) {
	if((strtolower(substr($TemplateImageFile,-4)) == ".jpg" || strtolower(substr($TemplateImageFile,-5)) == ".jpeg")) {
		// jpeg image
		header("Content-type: image/jpeg");
	}elseif(strtolower(substr($TemplateImageFile,-4)) == ".gif" ) {
		// gif image
		header("Content-type: image/gif");
	}

	echo file_get_contents($CacheTemplateImageFile);
	die();
}elseif(file_exists($TemplateImageFile)) {
	if(!is_dir(ISC_BASE_PATH . '/cache/tplthumbs/')) {
		mkdir(ISC_BASE_PATH . '/cache/tplthumbs/');
		isc_chmod(ISC_BASE_PATH . '/cache/tplthumbs/', ISC_WRITEABLE_DIR_PERM);
	}
	if((strtolower(substr($TemplateImageFile,-4)) == ".jpg" || strtolower(substr($TemplateImageFile,-5)) == ".jpeg") && function_exists('imagejpeg')) {
		// jpeg image
		header("Content-type: image/jpeg");


	}elseif(strtolower(substr($TemplateImageFile,-4)) == ".gif" && function_exists('imagegif') ) {
		// gif image
		header("Content-type: image/gif");
	}
	ResizeGDImages($TemplateImageFile,$CacheTemplateImageFile,$maxheight,$maxwidth);
	if(file_exists($CacheTemplateImageFile)) {
		echo file_get_contents($CacheTemplateImageFile);
	}
	else {
		OutputNoImage();
	}
	die();

}else {
	OutputNoImage();
}

function OutputNoImage()
{
	header("Content-type: image/gif");
	echo file_get_contents(ISC_BASE_PATH.'/admin/images/nopreview200.gif');
	die();
}
?>