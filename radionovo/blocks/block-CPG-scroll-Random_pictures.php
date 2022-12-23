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
if (eregi("block-scroll-Random_pictures.php", $PHP_SELF)) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir;
$cpg_dir = "coppermine";

$cpg_block = true;
require("modules/".$cpg_dir."/include/load.inc.php");
$cpg_block = false;
$numberpic = $CONFIG['thumbcols']; //number of thumbs
// $numberpic=4; //number of thumbs
$limit = $numberpic;
$maxlength = 20; // maximum length of name in block 

// marquee info at http://www.faqs.org/docs/htmltut/_MARQUEE.html
$content .= '<p align="center"><a name="scroller"></a><MARQUEE behavior="scroll" direction="up" height="150" scrollamount="1" scrolldelay="1" onmouseover=\'this.stop()\' onmouseout=\'this.start()\'><center>';
$result = $db->sql_query("SELECT COUNT(*) FROM ".$cpg_prefix."pictures INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid");
$nbEnr = $db->sql_fetchrow($result);
$pic_count = $nbEnr[0];
// mysql_free_result($result); 
// if we have more than 1000 pictures, we limit the number of picture returned
// by the SELECT statement as ORDER BY RAND() is time consuming
if ($pic_count > 1000) {
    $result = $db->sql_query("SELECT COUNT(*) from " . $cpg_prefix . "pictures WHERE approved = 'YES'");
    $nbEnr = mysql_fetch_row($result);
    $total_count = $nbEnr[0];
    // mysql_free_result($result); 
    $granularity = floor($total_count / 1000);
    $cor_gran = ceil($total_count / $pic_count);
    srand(time());
    for ($i = 1; $i <= $cor_gran; $i++) $random_num_set = rand(0, $granularity) . ', ';
    $random_num_set = substr($random_num_set, 0, -2);
    $result = $db->sql_query("SELECT pid, filepath, filename, p.aid FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE randpos IN ($random_num_set) AND approved='YES' GROUP BY pid ORDER BY RAND() DESC LIMIT $limit");
} else {
    $result = $db->sql_query("SELECT pid, filepath, filename, p.aid FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid ORDER BY RAND() DESC LIMIT $limit");
}
$rowset = array();
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
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . truncate_stringblocks($thumb_title,$maxlength) . '</a><br>';
    }else{
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . truncate_stringblocks($thumb_title,$maxlength) . '</a><br>';
    }
} 
$content .= '</center></marquee><center><a href="' . $CPG_M_URL . '">'.$lang_pagetitle_php["photogallery"].'</a></center>';
?>
