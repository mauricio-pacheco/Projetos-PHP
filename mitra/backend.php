<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/*                                                                      */
/************************************************************************/
/* Additional security checking code 2003 by chatserv                   */
/* http://www.nukefixes.com -- http://www.nukeresources.com             */
/************************************************************************/

include("mainfile.php");
global $prefix, $db, $nukeurl;
header("Content-Type: text/xml");
    $cat = intval($cat);
if ($cat != "") {
    $catid = $db->sql_fetchrow($db->sql_query("SELECT catid FROM ".$prefix."_stories_cat WHERE title LIKE '%$cat%' LIMIT 1"));
    if ($catid == "") {
	$result = $db->sql_query("SELECT sid, title FROM ".$prefix."_stories ORDER BY sid DESC LIMIT 10");
    } else {
	$catid = intval($catid);
	$result = $db->sql_query("SELECT sid, title FROM ".$prefix."_stories WHERE catid='$catid' ORDER BY sid DESC LIMIT 10");
    }
} else {
    $result = $db->sql_query("SELECT sid, title FROM ".$prefix."_stories ORDER BY sid DESC LIMIT 10");
}

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n\n";
echo "<!DOCTYPE rss PUBLIC \"-//Netscape Communications//DTD RSS 0.91//EN\"\n";
echo " \"http://my.netscape.com/publish/formats/rss-0.91.dtd\">\n\n";
echo "<rss version=\"0.91\">\n\n";
echo "<channel>\n";
echo "<title>".htmlspecialchars($sitename)."</title>\n";
echo "<link>$nukeurl</link>\n";
echo "<description>".htmlspecialchars($backend_title)."</description>\n";
echo "<language>$backend_language</language>\n\n";

while ($row = $db->sql_fetchrow($result)) {
    $rsid = intval($row['sid']);
    $rtitle = $row['title'];
    echo "<item>\n";
    echo "<title>".htmlspecialchars($rtitle)."</title>\n";
    echo "<link>$nukeurl/modules.php?name=News&amp;file=article&amp;sid=$rsid</link>\n";
    echo "</item>\n\n";
}
echo "</channel>\n";
echo "</rss>";

?>