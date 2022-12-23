<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Gr�gory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
define('SHOWTHUMB_PHP', true);
define('NO_HEADER', true);
require("modules/" . $name . "/include/load.inc.php");

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);

define("UNKNOW_ICON", $CPG_M_DIR . '/images/unk48x48.gif');
define("GIF_ICON", $CPG_M_DIR . '/images/gif48x48.gif');
define("READ_ERROR_ICON", $CPG_M_DIR . '/images/read_error48x48.gif');

function makethumbnail($src_file, $newSize, $method)
{
    global $CONFIG;

    $content_type = array(
        GIS_GIF => 'gif',
        GIS_JPG => 'jpeg',
        GIS_PNG => 'png'
        ); 
    // Checks that file exists and is readable
    if (!filesize($src_file) || !is_readable($src_file)) {
        header("Content-type: image/gif");
        fpassthru(fopen(READ_ERROR_ICON, 'rb'));
        exit;
    } 
    // find the image size, no size => unknow type
    $imginfo = getimagesize($src_file);
    if ($imginfo == null) {
        header("Content-type: image/gif");
        fpassthru(fopen(UNKNOW_ICON, 'rb'));
        exit;
    } 
    // GD can't handle gif images
    if ($imginfo[2] == GIS_GIF && ($method == 'gd1' || $method == 'gd2')) {
        header("Content-type: image/gif");
        fpassthru(fopen(GIF_ICON, 'rb'));
        exit;
    } 
    // height/width
    $srcWidth = $imginfo[0];
    $srcHeight = $imginfo[1];

    $ratio = max($srcWidth, $srcHeight) / $newSize;
    $ratio = max($ratio, 1.0);
    $destWidth = (int)($srcWidth / $ratio);
    $destHeight = (int)($srcHeight / $ratio); 
    // Choose method for thumb creation
    switch ($method) {
	    case "none" :
	     	break;
        case "im" :
            if (preg_match("#[A-Z]:|\\\\#Ai", __FILE__)) {
                $cur_dir = dirname(__FILE__);
                $src_file = '"' . $cur_dir . '\\' . strtr($src_file, '/', '\\') . '"';
            } else {
                $src_file = escapeshellarg($src_file);
            } 
            header("Content-type: image/" . ($content_type[$imginfo[2]]));
            passthru("{$CONFIG['impath']}convert -quality $CONFIG[jpeg_qual] -antialias -geometry {$destWidth}x{$destHeight} $src_file -");
            break;

        case "gd2" :
            if ($imginfo[2] == GIS_JPG)
                $src_img = imagecreatefromjpeg($src_file);
            else
                $src_img = imagecreatefrompng($src_file);
            $dst_img = imagecreatetruecolor($destWidth, $destHeight);
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $destWidth, (int)$destHeight, $srcWidth, $srcHeight);
            header("Content-type: image/jpeg");
            imagejpeg($dst_img);
            imagedestroy($src_img);
            imagedestroy($dst_img);
            break;

        default :
            if ($imginfo[2] == GIS_JPG)
                $src_img = imagecreatefromjpeg($src_file);
            else
                $src_img = imagecreatefrompng($src_file);
            $dst_img = imagecreate($destWidth, $destHeight);
            imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $destWidth, (int)$destHeight, $srcWidth, $srcHeight);
            header("Content-type: image/jpeg");
            imagejpeg($dst_img);
            imagedestroy($src_img);
            imagedestroy($dst_img);
            break;
    } 
} 

makethumbnail($CONFIG['fullpath'] . $HTTP_GET_VARS['picfile'], $HTTP_GET_VARS['size'], $CONFIG['thumb_method']);
?>
