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
define('THUMBNAILS_PHP', true);
define('INDEX_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (isset($HTTP_GET_VARS['sort'])) $USER['sort'] = $HTTP_GET_VARS['sort'];
if (isset($HTTP_GET_VARS['uid'])) $USER['uid'] = (int)$HTTP_GET_VARS['uid'];
if (isset($HTTP_GET_VARS['search'])) {
    $USER['search'] = $HTTP_GET_VARS['search'];
    if (isset($HTTP_GET_VARS['type']) && $HTTP_GET_VARS['type'] == 'full') {
        $USER['search'] = '###' . $USER['search'];
    } 
} 
global $meta_link;
if (!isset($page)) $page = 1;
if (!is_numeric($album)){
    isset($cat)?$meta_link = "&cat=". $cat : $meta_link = "&cat=0" ;
    if ($cat < 0) {
        $actual_album = -$cat;
        $thisalbum = "a.aid = $actual_album";
    } elseif ($cat == 0) {
        $actual_album = $cat;
        $thisalbum = "a.category >= 0";
    } else {
        $actual_album = $cat;
        if ($cat == 1) $thisalbum = "a.category > ".FIRST_USER_CAT;
        else $thisalbum = "a.category = $cat";
    }
} else {
    $meta_link = "&cat=". -$album;
    $thisalbum = "a.category = cat";
}
define('META_LNK',$meta_link);
pageheader(isset($CURRENT_ALBUM_DATA) ? $CURRENT_ALBUM_DATA['title'] : $lang_meta_album_names[$album]);
set_breadcrumb(!is_numeric($album));
display_thumbnails($album, $cat, $page, $CONFIG['thumbcols'], $CONFIG['thumbrows'], true);
pagefooter();
include("footer.php");
?>
