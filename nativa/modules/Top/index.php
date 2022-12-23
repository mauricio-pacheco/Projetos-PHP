<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:34:11 $
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
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

if (!stristr($_SERVER['SCRIPT_NAME'], "modules.php")) {
    die ("You can't access this file directly...");
}

require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

include("header.php");

if ($multilingual == 1) {
    $queryalang = "WHERE (alanguage='$currentlang' OR alanguage='')"; /* top stories */
    $querya1lang = "WHERE (alanguage='$currentlang' OR alanguage='') AND"; /* top stories */
    $queryslang = "WHERE slanguage='$currentlang' "; /* top section articles */
    $queryplang = "WHERE planguage='$currentlang' "; /* top polls */
    $queryrlang = "WHERE rlanguage='$currentlang' "; /* top reviews */
} else {
    $queryalang = "";
    $querya1lang = "WHERE";
    $queryslang = "";
    $queryplang = "";
    $queryrlang = "";
}

OpenTable();
echo "<center><font class=\"title\"><b>"._TOPWELCOME."</b></font></center>";
CloseTable();
echo "<br>\n\n";
OpenTable();

/* Top 10 read stories */
global $prefix, $db, $dbi;
$result = $db->sql_query("SELECT sid, title, counter FROM ".$prefix."_stories $queryalang ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\"><b>$top "._READSTORIES."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row = $db->sql_fetchrow($result)) {
	$sid = intval($row['sid']);
    $title = stripslashes(check_html($row['title'], "nohtml"));
    $counter = intval($row['counter']);
        if($counter>0) {
    	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=News&amp;file=article&amp;sid=$sid\">$title</a> - ($counter "._READS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 most voted stories */

$result2 = $db->sql_query("SELECT sid, title, ratings FROM ".$prefix."_stories $querya1lang score!='0' ORDER BY ratings DESC LIMIT 0,$top");
if ($db->sql_numrows($result2) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\"><b>$top "._MOSTVOTEDSTORIES."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row2 = $db->sql_fetchrow($result2)) {
	$sid = intval($row2['sid']);
    $title = stripslashes(check_html($row2['title'], "nohtml"));
    $ratings = intval($row2['ratings']);
        if($ratings>0) {
    	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=News&amp;file=article&amp;sid=$sid\">$title</a> - ($ratings "._LVOTES.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 best rated stories */

$result3 = $db->sql_query("SELECT sid, title, score, ratings FROM ".$prefix."_stories $querya1lang score!='0' ORDER BY ratings+score DESC LIMIT 0,$top");
if ($db->sql_numrows($result3) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\"><b>$top "._BESTRATEDSTORIES."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row3 = $db->sql_fetchrow($result3)) {
	$sid = intval($row3['sid']);
	$title = stripslashes(check_html($row3['title'], "nohtml"));
	$score = intval($row3['score']);
	$ratings = intval($row3['ratings']);
        if($score>0) {
	    $rate = substr($score / $ratings, 0, 4);
    	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=News&amp;file=article&amp;sid=$sid\">$title</a> - ($rate "._POINTS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 commented stories */

if ($articlecomm == 1) {
    $result4 = $db->sql_query("SELECT sid, title, comments FROM ".$prefix."_stories $queryalang ORDER BY comments DESC LIMIT 0,$top");
    if ($db->sql_numrows($result4) > 0) {
		echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
		    ."<font class=\"option\"><b>$top "._COMMENTEDSTORIES."</b></font><br><br><font class=\"content\">\n";
		$lugar=1;
		while ($row4 = $db->sql_fetchrow($result4)) {
	    	$sid = intval($row4['sid']);
	    	$title = stripslashes(check_html($row4['title'], "nohtml"));
	    	$comments = intval($row4['comments']);
		    if($comments>0) {
				echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=News&amp;file=article&amp;sid=$sid\">$title</a> - ($comments "._COMMENTS.")<br>\n";
				$lugar++;
		    }
		}
		echo "</font></td></tr></table><br>\n";
    }
}

/* Top 10 categories */

$result5 = $db->sql_query("SELECT catid, title, counter FROM ".$prefix."_stories_cat ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result5) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._ACTIVECAT."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row5 = $db->sql_fetchrow($result5)) {
	$catid = intval($row5['catid']);
    $title = stripslashes(check_html($row5['title'], "nohtml"));
    $counter = intval($row5['counter']);
	if($counter>0) {
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=News&amp;file=categories&amp;op=newindex&amp;catid=$catid\">$title</a> - ($counter "._HITS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 articles in special sections */

$result6 = $db->sql_query("SELECT artid, secid, title, content, counter FROM ".$prefix."_seccont $queryslang ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result6) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
		."<font class=\"option\"><b>$top "._READSECTION."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row6 = $db->sql_fetchrow($result6)) {
		$artid = intval($row6['artid']);
		$secid = intval($row6['secid']);
	    $title = stripslashes(check_html($row6['title'], "nohtml"));
	    $content = stripslashes($row6['content']);
	    $counter = intval($row6['counter']);
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Sections&amp;op=viewarticle&amp;artid=$artid\">$title</a> - ($counter "._READS.")<br>\n";
		$lugar++;
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 users submitters */

$result7 = $db->sql_query("SELECT username, counter FROM ".$user_prefix."_users WHERE counter > '0' ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result7) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._NEWSSUBMITTERS."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row7 = $db->sql_fetchrow($result7)) {
    $uname = stripslashes($row7['username']);
    $counter = intval($row7['counter']);
	if($counter>0) {
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\">$uname</a> - ($counter "._NEWSSENT.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 Polls */

$result8 = $db->sql_query("select * from ".$prefix."_poll_desc $queryplang");
if ($db->sql_numrows($result8)>0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._VOTEDPOLLS."</b></font><br><br><font class=\"content\">\n";
    $lugar = 1;
    $result9 = sql_query("SELECT pollID, pollTitle, timeStamp, voters FROM ".$prefix."_poll_desc $querylang order by voters DESC limit 0,$top", $dbi);
    $counter = 0;
    while($object = sql_fetch_object($result9, $dbi)) {
	$resultArray[$counter] = array($object->pollID, $object->pollTitle, $object->timeStamp, $object->voters);
	$counter++;
    }
    for ($count = 0; $count < count($resultArray); $count++) {
	$id = $resultArray[$count][0];
	$pollTitle = $resultArray[$count][1];
	$voters = $resultArray[$count][3];
	for($i = 0; $i < 12; $i++) {
	    $result10 = sql_query("SELECT optionCount FROM ".$prefix."_poll_data WHERE (pollID='$id') AND (voteID='$i')", $dbi);
	    $object = sql_fetch_object($result10, $dbi);
	    $optionCount = $object->optionCount;
	    $sum = (int)$sum+$optionCount;
	}
	echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Surveys&amp;pollID=$id\">$pollTitle</a> - ($sum "._LVOTES.")<br>\n";
	$lugar++;
	$sum = 0;
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 authors */

$result11 = $db->sql_query("SELECT aid, counter FROM ".$prefix."_authors ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result11) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._MOSTACTIVEAUTHORS."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row11 = $db->sql_fetchrow($result11)) {
    $aid = stripslashes($row11['aid']);
    $counter = intval($row11['counter']);
	if($counter>0) {
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Search&amp;query=&amp;author=$aid\">$aid</a> - ($counter "._NEWSPUBLISHED.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 reviews */

$result12 = $db->sql_query("SELECT id, title, hits FROM ".$prefix."_reviews $queryrlang ORDER BY hits DESC LIMIT 0,$top");
if ($db->sql_numrows($result12) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._READREVIEWS."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row12 = $db->sql_fetchrow($result12)) {
	$id = intval($row12['id']);
	$title = stripslashes(check_html($row12['title'], "nohtml"));
	$hits = intval($row12['hits']);
	if($hits>0) {
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Reviews&amp;op=showcontent&amp;id=$id\">$title</a> - ($hits "._READS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table><br>\n";
}

/* Top 10 downloads */

$result13 = $db->sql_query("SELECT lid, cid, title, hits FROM ".$prefix."_downloads_downloads ORDER BY hits DESC LIMIT 0,$top");
if ($db->sql_numrows($result13) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._DOWNLOADEDFILES."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row13 = $db->sql_fetchrow($result13)) {
	$lid = intval($row13['lid']);
	$cid = intval($row13['cid']);
	$title = stripslashes(check_html($row13['title'], "nohtml"));
	$hits = intval($row13['hits']);
	if($hits>0) {
	    $row_res = $db->sql_fetchrow($db->sql_query("SELECT title FROM ".$prefix."_downloads_categories WHERE cid='$cid'"));
	    $ctitle = stripslashes(check_html($row_res['title'], "nohtml"));
	    $utitle = ereg_replace(" ", "_", $title);
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$lid&amp;ttitle=$utitle\">$title</a> ("._CATEGORY.": $ctitle) - ($hits "._LDOWNLOADS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table>\n\n";
}

/* Top 10 Pages in Content */

$result14 = $db->sql_query("SELECT pid, title, counter FROM ".$prefix."_pages WHERE active='1' ORDER BY counter DESC LIMIT 0,$top");
if ($db->sql_numrows($result14) > 0) {
    echo "<table border=\"0\" cellpadding=\"10\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\"><b>$top "._MOSTREADPAGES."</b></font><br><br><font class=\"content\">\n";
    $lugar=1;
    while ($row14 = $db->sql_fetchrow($result14)) {
	$pid = intval($row14['pid']);
	$title = stripslashes(check_html($row14['title'], "nohtml"));
	$counter = intval($row14['counter']);
	if($counter>0) {
	    echo "<strong><big>&middot;</big></strong>&nbsp;$lugar: <a href=\"modules.php?name=Content&amp;pa=showpage&amp;pid=$pid\">$title</a> ($counter "._READS.")<br>\n";
	    $lugar++;
	}
    }
    echo "</font></td></tr></table>\n\n";
}

CloseTable();
include("footer.php");
# $Log: index.php,v $
# Revision 1.2  2004/12/08 00:34:11  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.1  2004/10/05 18:05:27  chatserv
# Initial CVS Addition
#

?>