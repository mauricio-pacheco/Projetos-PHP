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
if (eregi("block-CPG-center-Random_pictures.php", $PHP_SELF)) {
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
//get_private_album_set();
$numberpic = $CONFIG['thumbcols']; //number of thumbs
// $numberpic=4; //number of thumbs
$limit = $numberpic;
$content = "";
$content .= '<table width="100%" border="0" align="center" cols="' . $limit2 . '" cellpadding="0" cellspacing="0"><tr>';

// modified by DJMaze
$result = $db->sql_query("SELECT COUNT(*) FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid");
//$result = $db->sql_query("SELECT COUNT(*) from " . $cpg_prefix . "pictures WHERE approved = 'YES' $ALBUM_SET");

$nbEnr = $db->sql_fetchrow($result);
$pic_count = $nbEnr[0];
// if we have more than 1000 pictures, we limit the number of picture returned
// by the SELECT statement as ORDER BY RAND() is time consuming
if ($pic_count > 1000) {
    $result = $db->sql_query("SELECT COUNT(*) from " . $cpg_prefix . "pictures WHERE approved = 'YES'");
    $nbEnr = $db->sql_fetchrow($result);
    $total_count = $nbEnr[0];

    $granularity = floor($total_count / 1000);
    $cor_gran = ceil($total_count / $pic_count);
    srand(time());
    for ($i = 1; $i <= $cor_gran; $i++) $random_num_set = rand(0, $granularity) . ', ';
    $random_num_set = substr($random_num_set, 0, -2);

    // modified by DJMaze
    $result = $db->sql_query("SELECT pid, filepath, filename, p.aid FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE randpos IN ($random_num_set) AND approved='YES' GROUP BY pid ORDER BY RAND() DESC LIMIT $limit");
    //$result = $db->sql_query("SELECT pid, aid, filepath, filename FROM " . $cpg_prefix . "pictures WHERE randpos IN ($random_num_set) AND approved = 'YES' $ALBUM_SET ORDER BY RAND() LIMIT $limit");
} else {
    // modified by DJMaze
    $result = $db->sql_query("SELECT pid, filepath, filename, p.aid FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid ORDER BY RAND() DESC LIMIT $limit");
    //$result = $db->sql_query("SELECT pid, aid, filepath, filename FROM " . $cpg_prefix . "pictures WHERE approved = 'YES' $ALBUM_SET ORDER BY RAND() LIMIT $limit");
}

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
	    $content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . $thumb_title . '</a></td>';
    }else{
	    $content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . $thumb_title . '</a></td>';
    }
} 
$content .= '</tr><tr align="center"><td colspan="' . $limit2 . '" valign="baseline"><a href="' . $CPG_M_URL . '">' . $lang_pagetitle_php["photogallery"] . '</a></center></td></tr></table>';

?>
