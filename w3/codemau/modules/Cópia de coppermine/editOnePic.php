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
define('EDITPICS_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (!(GALLERY_ADMIN_MODE || USER_ADMIN_MODE)) cpg_die(ERROR, $lang_errors['access_denied'], __FILE__, __LINE__);

if (isset($HTTP_GET_VARS['id'])) {
    $pid = (int)$HTTP_GET_VARS['id'];
} elseif (isset($HTTP_GET_VARS['id'])) {
    $pid = (int)$HTTP_POST_VARS['id'];
} else {
    $pid = -1;
} 
$sql = "SELECT aid FROM {$CONFIG['TABLE_PICTURES']} WHERE pid = $id";
$result = db_query($sql);
$nbEnr = mysql_fetch_array($result);
$meta_link = "&album=".$nbEnr[0];//
define('META_LNK',$meta_link);
$title = $lang_editpics_php['edit_pics'];
pageheader($title);
// Code after this is Specific to the individual actions - it would be preferable to have each actions in their own inc file
// Crop picture
// include("$CPG_M_DIR/include/crop.inc.php");
// Edit description of the picture
include($CPG_M_DIR . "/include/editDesc.inc.php");
// Upload new thumbnail
// Rotate Image
// Just imagine
pagefooter();
include("footer.php");
?>
