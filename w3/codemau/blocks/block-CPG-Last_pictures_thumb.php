<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Gr?gory DEMAR <gdemar@wanadoo.fr>               //
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
if (eregi("block-CPG-Last_pictures_thumb.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir;
//global $ALBUM_SET;

$cpg_dir = "coppermine";

$cpg_block = true;
require("modules/" . $cpg_dir . "/include/load.inc.php");
$cpg_block = false;
$length = $CONFIG['thumbcols']; //number of thumbs
// $length=4; //number of thumbs
$title_length = 15; // maximum length of title under pictures, 20 is default

$content = '';
$content = '<p align="center">';

$result = $db->sql_query("SELECT pid, filepath, filename, p.aid, p.title FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid ORDER BY pid DESC LIMIT $length");
while ($row = $db->sql_fetchrow($result)) {
    if ($CONFIG['seo_alts'] == 0) {
        $thumb_title = $row['filename'];
    } else {
        if ($row['title'] != '') {
            $thumb_title = $row['title'];
        } else {
            $thumb_title = substr($row['filename'], 0, -4);
        } 
    } 
    stripslashes($thumb_title);
    if ($CONFIG['thumb_method']=='none'){
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . truncate_stringblocks($thumb_title, $title_length) . '</a><br>';
    }else{
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . truncate_stringblocks($thumb_title, $title_length) . '</a><br>';
    }
} 
$content .= '<br><br><a href="' . $CPG_M_URL . '">' . $lang_pagetitle_php["photogallery"] . '</a></p>';

?>
