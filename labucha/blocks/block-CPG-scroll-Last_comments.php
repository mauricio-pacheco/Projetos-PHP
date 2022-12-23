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
if (eregi("block-CPG-scroll-Last_comments.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir, $cpg_prefix, $lang_pagetitle_php, $lastcom_date_fmt;
$cpg_dir = "coppermine";

$cpg_block = true;
require("modules/" . $cpg_dir . "/include/load.inc.php");
$cpg_block = false;
// $length = $CONFIG['thumbcols']; //number of thumbs
$length = 5; //number of thumbs
$title_length = 15; //length of title below thumb 
// marquee info at http://www.faqs.org/docs/htmltut/_MARQUEE.html
$body_length = 50; //length of body of comment to show
$auth_length = 10; //length of author name to show
$content = '';
$content .= '<p align="center"><a name="scroller"></a><MARQUEE behavior="scroll" direction="up" height="150" scrollamount="1" scrolldelay="1" onmouseover=\'this.stop()\' onmouseout=\'this.start()\'><center>';
// END USER DEFINEABLES

$result = $db->sql_query("SELECT p.pid, filepath, filename, msg_author, UNIX_TIMESTAMP(msg_date) as msg_date, msg_body FROM " . $cpg_prefix . "comments as c, ".$cpg_prefix."pictures AS p INNER JOIN ".$cpg_prefix."albums AS a ON (p.aid = a.aid AND ".VIS_GROUPS.") WHERE c.pid=p.pid AND approved='YES' ORDER BY msg_date DESC LIMIT $length");
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
    $date = localised_date($row['msg_date'], $lastcom_date_fmt);
    $author = $row["msg_author"];
    $messagebody = $row["msg_body"];
    if ($CONFIG['thumb_method']=='none'){
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '" width="'. $CONFIG['thumb_width'] .'"><br>' . truncate_stringblocks($author, $auth_length) . '</a> <br />' . truncate_stringblocks($messagebody, $body_length) . '<br />(' . $date . ')';
    }else{
	    $content .= '<a href="' . $CPG_M_URL . '&file=displayimage&pos=-' . $row["pid"] . '"><img src="' . $row["filepath"] . $CONFIG["thumb_pfx"] . $row["filename"] . '" border="0" alt="' . $thumb_title . '" title="' . $thumb_title . '"><br>' . truncate_stringblocks($author, $auth_length) . '</a> <br />' . truncate_stringblocks($messagebody, $body_length) . '<br />(' . $date . ')';
    }
} 
$content .= '</MARQUEE></p><p align="center"><a href="' . $CPG_M_URL . '">' . $lang_pagetitle_php["photogallery"] . '</a></p>';
?>
