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
if (eregi("block-CPG-center-Top_rate_pictures.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir,$lang_get_pic_data;
//global $ALBUM_SET;

$cpg_dir = "coppermine";

$cpg_block = true;
require("modules/".$cpg_dir."/include/load.inc.php");
$cpg_block = false; 
//get_private_album_set();
$limit=$CONFIG['thumbcols']; //number of thumbs
// $limit = 5; //number of pictures
$content = '';
function truncate_stringctoprate($str)
{
    $maxlength = 20; // maximum length of name in block
    if (strlen($str) > $maxlength)
        return substr($str, 0, $maxlength) . " ...";
    else
        return $str;
} 

// modified by DJMaze
$result = $db->sql_query("SELECT pid, filepath, filename, p.aid, pic_rating, p.votes FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' AND p.votes >= '{$CONFIG['min_votes_for_rating']}' GROUP BY pid ORDER BY ROUND((pic_rating+1)/2000) DESC, p.votes DESC LIMIT $limit");
//$result = $db->sql_query("SELECT  pid, aid, filepath, filename, pic_rating, votes FROM " . $cpg_prefix . "pictures  WHERE approved = 'YES' AND votes >= '{$CONFIG['min_votes_for_rating']}' $ALBUM_SET ORDER BY ROUND((pic_rating+1)/2000) DESC, votes DESC LIMIT $limit");

$content .= '<br /><table width="100%" cols="'.$length.'" border="0" cellpadding="0" cellspacing="0" align="center"><tr align="center">';
while ($row = $db->sql_fetchrow($result)) {
    if (defined('THEME_HAS_RATING_GRAPHICS')) {
        $theme_prefix = $CONFIG['theme'].'/';
    } else {
        $theme_prefix = '';
    } 
    $caption = '<img src="' . $CPG_M_DIR . '/' . $theme_prefix . 'images/rating' . round($row["pic_rating"] / 2000) . '.gif" align="center" border="0">' . '<br />' . sprintf($lang_get_pic_data['n_votes'], $row['votes']) . '<br />';
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
		$content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . $caption . '</a></td>';
	}else{
		$content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . $caption . '</a></td>';
	}
} 
$content .= '</tr><tr><td colspan="'.$limit.'" valign="baseline" align="center"><a href = "'. $CPG_M_URL . '">'.$lang_pagetitle_php["photogallery"].'</a></td></tr></table>';
?>
