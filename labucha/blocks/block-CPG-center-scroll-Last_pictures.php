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
if (eregi("block-CPG-center-scroll-Last_pictures.php", $_SERVER['PHP_SELF'])) {
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
// $length=$CONFIG['thumbcols']; //number of thumbs
$length = 8; //number of thumbs
$maxlength = 20; // maximum length of name in block

// marquee info at http://www.faqs.org/docs/htmltut/_MARQUEE.html
$content .= '<p align="center"><a name="scroller"></a><MARQUEE behavior="scroll" direction="left" height="150" scrollamount="1" scrolldelay="1" onmouseover=\'this.stop()\' onmouseout=\'this.start()\'><center>';

$result = $db->sql_query("SELECT pid, filepath, filename, p.aid, p.title FROM ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE approved='YES' GROUP BY pid ORDER BY pid DESC LIMIT $length");
$content .= '<table width="100%" cols="' . $length . '" border="0" cellpadding="0" cellspacing="7" align="center"><tr align="center">';
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
	    $content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . truncate_stringblocks($thumb_title, $maxlength) . '</a>&nbsp;&nbsp;</td>';
    }else{
	    $content .= '<td align="center" valign="baseline"><a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . truncate_stringblocks($thumb_title, $maxlength) . '</a>&nbsp;&nbsp;</td>';
    }
} 
$content .= '</tr></table></MARQUEE></p><p align="center"><table width="100%"  border="0" cellpadding="0" cellspacing="0" align="center"><tr align="center"><td valign="baseline"><a href="' . $CPG_M_URL . '">' . $lang_pagetitle_php["photogallery"] . '</a><br /></center></td></tr></table></p>';

?>
