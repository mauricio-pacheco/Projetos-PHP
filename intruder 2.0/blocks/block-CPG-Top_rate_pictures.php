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
if (eregi("block-CPG-Top_rate_pictures.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir;

$cpg_dir = "coppermine";

$cpg_block = true;
include("modules/" . $cpg_dir . "/include/load.inc.php");
$cpg_block = false;
// $limit=$CONFIG['thumbcols']; //number of thumbs
$limit = 5; //number of pictures
$content = '';

$result = $db->sql_query("SELECT pid, filepath, filename, p.aid, pic_rating, p.votes FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' AND p.votes >= '{$CONFIG['min_votes_for_rating']}' GROUP BY pid ORDER BY ROUND((pic_rating+1)/2000) DESC, p.votes DESC LIMIT $limit");
while ($row = $db->sql_fetchrow($result)) {
    if (defined('THEME_HAS_RATING_GRAPHICS')) {
        $theme_prefix = $CONFIG['theme'] . '/';
    } else {
        $theme_prefix = '';
    } 
    // $caption = '<img src="' . $CPG_M_DIR . '/' . $theme_prefix . 'images/rating' . round($row["pic_rating"] / 2000) . '.gif" align="center" border="0">' . '<br />' . sprintf(N_VOTES, $row[\'votes\']).'<br />';
    $caption = "<img src=\"" . $CPG_M_DIR . "/" . $theme_prefix . "images/rating" . round($row['pic_rating'] / 2000) . ".gif\" align=\"center\" border=\"0\">" . "<br />" . round($row['pic_rating'] / 2000, 2) . "/5 ";
    $caption .= sprintf(N_VOTES, $row['votes']);
    $caption .= "<br>";
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
		$content .= '<p align="center"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . $caption . '</a></p>';
	}else{
		$content .= '<p align="center"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . $caption . '</a></p>';
	}
}
$content .= '<p align="center"><a href = "' . $CPG_M_URL . '"> Go to gallery </a> </p>';

?>
