<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
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
define('ADDPIC_PHP', true);
define('NO_HEADER', true);
require("modules/" . $name . "/include/load.inc.php");

require($CPG_M_DIR . '/include/picmgmtbatch.inc.php');
// if (!GALLERY_ADMIN_MODE) die('Access denied');
$aid = (int)$HTTP_GET_VARS['aid'];
$pic_file = $CONFIG['fullpath'] . base64_decode($HTTP_GET_VARS['pic_file']);
$dir_name = dirname($pic_file) . "/";
$file_name = basename($pic_file);

$sql = "SELECT pid " . "FROM {$CONFIG['TABLE_PICTURES']} " . "WHERE filepath='" . addslashes($dir_name) . "' AND filename='" . addslashes($file_name) . "' " . "LIMIT 1";
$result = db_query($sql);

if (mysql_num_rows($result)) {
    $file_name = $CPG_M_DIR . "/images/up_dup.gif";
} elseif (add_picture($aid, $dir_name, $file_name)) {
    $file_name = $CPG_M_DIR . "/images/up_ok.gif";
} else {
    $file_name = $CPG_M_DIR . "/images/up_pb.gif";
    echo $ERROR;
} 

if (ob_get_length()) {
   	exit;
}
 

header('Content-type: image/gif');
echo fread(fopen($file_name, 'rb'), filesize($file_name));
?>
