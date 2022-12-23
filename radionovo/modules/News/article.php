<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:22:34 $
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
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if (!stristr($_SERVER['SCRIPT_NAME'], "modules.php")) {
    die ("You can't access this file directly...");
}
require_once("mainfile.php");
$optionbox = "";
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

if (stristr($REQUEST_URI,"mainfile")) {
    Header("Location: modules.php?name=$module_name&file=article&sid=$sid");
} elseif (!isset($sid) && !isset($tid)) {
    Header("Location: index.php");
}
if (isset($sid)) $sid=intval($sid); 
if (isset($tid)) $tid=intval($tid);
if ($save AND is_user($user)) {
    cookiedecode($user);
    $db->sql_query("UPDATE ".$user_prefix."_users SET umode='$mode', uorder='$order', thold='$thold' where uid='$cookie[0]'");
    getusrinfo($user);
    $info = base64_encode("$userinfo[user_id]:$userinfo[username]:$userinfo[user_password]:$userinfo[storynum]:$userinfo[umode]:$userinfo[uorder]:$userinfo[thold]:$userinfo[noscore]");
    setcookie("user","$info",time()+$cookieusrtime);
}

if ($op == "Reply") {
    Header("Location: modules.php?name=$module_name&file=comments&op=Reply&pid=0&sid=$sid&mode=$mode&order=$order&thold=$thold");
}

$result = $db->sql_query("select catid, aid, time, title, hometext, bodytext, topic, informant, notes, acomm, haspoll, pollID, score, ratings, video, foto1c, foto2c, foto3c, foto4c, foto5c, foto6c, foto7c, foto8c, foto9c, foto10c, foto1, foto2, foto3, foto4, foto5, foto6, foto7, foto8, foto9, foto10, foto1m, foto2m, foto3m, foto4m, foto5m, foto6m, foto7m, foto8m, foto9m, foto10m, fotopub FROM ".$prefix."_stories where sid='$sid'");
if ($numrows = $db->sql_numrows($result) != 1) {
    Header("Location: index.php");
    die();
}
$row = $db->sql_fetchrow($result);
$catid = intval($row['catid']);
$aid = stripslashes($row['aid']);
$time = $row['time'];
$title = stripslashes(check_html($row['title'], "nohtml"));
$hometext = stripslashes($row['hometext']);
$bodytext = stripslashes($row['bodytext']);
$topic = intval($row['topic']);
$informant = stripslashes($row['informant']);
$notes = stripslashes($row['notes']);
$acomm = intval($row['acomm']);
$haspoll = intval($row['haspoll']);
$pollID = intval($row['pollID']);
$score = intval($row['score']);
$ratings = intval($row['ratings']);
$video = stripslashes($row['video']);
$foto1c = stripslashes($row['foto1c']);
$foto2c = stripslashes($row['foto2c']);
$foto3c = stripslashes($row['foto3c']);
$foto4c = stripslashes($row['foto4c']);
$foto5c = stripslashes($row['foto5c']);
$foto6c = stripslashes($row['foto6c']);
$foto7c = stripslashes($row['foto7c']);
$foto8c = stripslashes($row['foto8c']);
$foto9c = stripslashes($row['foto9c']);
$foto10c = stripslashes($row['foto10c']);
$foto1 = stripslashes($row['foto1']);
$foto2 = stripslashes($row['foto2']);
$foto3 = stripslashes($row['foto3']);
$foto4 = stripslashes($row['foto4']);
$foto5 = stripslashes($row['foto5']);
$foto6 = stripslashes($row['foto6']);
$foto7 = stripslashes($row['foto7']);
$foto8 = stripslashes($row['foto8']);
$foto9 = stripslashes($row['foto9']);
$foto10 = stripslashes($row['foto10']);
$foto1m = stripslashes($row['foto1m']);
$foto2m = stripslashes($row['foto2m']);
$foto3m = stripslashes($row['foto3m']);
$foto4m = stripslashes($row['foto4m']);
$foto5m = stripslashes($row['foto5m']);
$foto6m = stripslashes($row['foto6m']);
$foto7m = stripslashes($row['foto7m']);
$foto8m = stripslashes($row['foto8m']);
$foto9m = stripslashes($row['foto9m']);
$foto10m = stripslashes($row['foto10m']);
$fotopub = stripslashes($row['fotopub']);

if ($aid == "") {
    Header("Location: modules.php?name=$module_name");
}

$db->sql_query("UPDATE ".$prefix."_stories SET counter=counter+1 where sid='$sid'");

$artpage = 1;
$pagetitle = "- $title";
require("header.php");
$artpage = 0;

formatTimestamp($time);
$title = stripslashes(check_html($title, "nohtml"));
$hometext = stripslashes($hometext);
$bodytext = stripslashes($bodytext);
$notes = stripslashes($notes);

if ($notes != "") {
    $notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>";
} else {
    $notes = "";
}

if($bodytext == "") {
    $bodytext = "$hometext$notes";
} else {
    $bodytext = "$bodytext$notes";
}

if($informant == "") {
    $informant = $anonymous;
}

getTopics($sid);

if ($catid != 0) {
    $row2 = $db->sql_fetchrow($db->sql_query("select title from ".$prefix."_stories_cat where catid='$catid'"));
    $title1 = stripslashes(check_html($row2['title'], "nohtml"));
    $title = "<a href=\"modules.php?name=$module_name&amp;file=categories&amp;op=newindex&amp;catid=$catid\"><font class=\"storycat\">$title1</font></a>: $title";
}

echo "<table width=\"100%\" border=\"0\"><tr><td valign=\"top\" width=\"100%\">\n";
themearticle($aid, $informant, $datetime, $title, $bodytext, $topic, $topicname, $topicimage, $topictext, $video, $foto1c, $foto2c, $foto3c, $foto4c, $foto5c, $foto6c, $foto7c, $foto8c, $foto9c, $foto10c, $foto1, $foto2, $foto3, $foto4, $foto5, $foto6, $foto7, $foto8, $foto9, $foto10, $foto1m, $foto2m, $foto3m, $foto4m, $foto5m, $foto6m, $foto7m, $foto8m, $foto9m, $foto10m, $fotopub);
echo "&nbsp;&nbsp;<a href=javascript:window.history.go(-1)><img src=voltarnot.jpg border=0></a></td><td>&nbsp;</td><td valign=\"top\">\n";

if ($multilingual == 1) {
    $querylang = "AND (blanguage='$currentlang' OR blanguage='')";
} else {
    $querylang = "";
}

/* Determine if the article has attached a poll */
if ($haspoll == 1) {
    $url = sprintf("modules.php?name=Surveys&amp;op=results&amp;pollID=%d", $pollID);
    $boxContent = "<form action=\"modules.php?name=Surveys\" method=\"post\">";
    $boxContent .= "<input type=\"hidden\" name=\"pollID\" value=\"".$pollID."\">";
    $boxContent .= "<input type=\"hidden\" name=\"forwarder\" value=\"".$url."\">";
    $row3 = $db->sql_fetchrow($db->sql_query("SELECT pollTitle, voters FROM ".$prefix."_poll_desc WHERE pollID='$pollID'"));
    $pollTitle = stripslashes(check_html($row3['pollTitle'], "nohtml"));
    $voters = $row3['voters'];
    $boxTitle = _ARTICLEPOLL;
    $boxContent .= "<font class=\"content\"><b>$pollTitle</b></font><br><br>\n";
    $boxContent .= "<table border=\"0\" width=\"100%\">";
    for($i = 1; $i <= 12; $i++) {
	$result4 = $db->sql_query("SELECT pollID, optionText, optionCount, voteID FROM ".$prefix."_poll_data WHERE (pollID='$pollID') AND (voteID='$i')");
	$row4 = $db->sql_fetchrow($result4);
	$numrows = $db->sql_numrows($result4);
	if($numrows != 0) {
	    $optionText = $row4['optionText'];
	    if($optionText != "") {
		$boxContent .= "<tr><td valign=\"top\"><input type=\"radio\" name=\"voteID\" value=\"".$i."\"></td><td width=\"100%\"><font class=\"content\">$optionText</font></td></tr>\n";
	    }
	}
    }
    $boxContent .= "</table><br><center><font class=\"content\"><input type=\"submit\" value=\""._VOTE."\"></font><br>";
    if (is_user($user)) {
        cookiedecode($user);
    }
    for($i = 0; $i < 12; $i++) {
	$row5 = $db->sql_fetchrow($db->sql_query("SELECT optionCount FROM ".$prefix."_poll_data WHERE (pollID='$pollID') AND (voteID='$i')"));
	$optionCount = $row5['optionCount'];
	$sum = (int)$sum+$optionCount;
    }
    $boxContent .= "<font class=\"content\">[ <a href=\"modules.php?name=Surveys&amp;op=results&amp;pollID=$pollID&amp;mode=$cookie[4]&amp;order=$cookie[5]&amp;thold=$cookie[6]\"><b>"._RESULTS."</b></a> | <a href=\"modules.php?name=Surveys\"><b>"._POLLS."</b></a> ]<br>";

    if ($pollcomm) {
	$result6 = $db->sql_query("select * from ".$prefix."_pollcomments where pollID='$pollID'");
	$numcom = $db->sql_numrows($result6);
	$boxContent .= "<br>"._VOTES.": <b>$sum</b><br>"._PCOMMENTS." <b>$numcom</b>\n\n";
    } else {
        $boxContent .= "<br>"._VOTES." <b>$sum</b>\n\n";
    }
    $boxContent .= "</font></center></form>\n\n";
    themesidebox($boxTitle, $boxContent);
}

$row7 = $db->sql_fetchrow($db->sql_query("select title, content, active, bposition from ".$prefix."_blocks where blockfile='block-Login.php' $querylang"));
$title = stripslashes(check_html($row7['title'], "nohtml"));
$content = stripslashes($row7['content']);
$active = intval($row7['active']);
$position = $row7['bposition'];
$position = substr("$position", 0,1);
if (($active == 1) AND ($position == "r") AND (!is_user($user))) {
    loginbox();
}

$boxtitle = ""._RELATED."";
$boxstuff = "<font class=\"content\">";
$result8 = $db->sql_query("select name, url from ".$prefix."_related where tid='$topic'");
while ($row8 = $db->sql_fetchrow($result8)) {
	$name = stripslashes($row8['name']);
	$url = stripslashes($row8['url']);
    $boxstuff .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$url\" target=\"new\">$name</a><br>\n";
}

$boxstuff .= "";
$boxstuff .= "";

$boxstuff .= "</font><br><center><font class=\"content\"><b>"._MOSTREAD." $topictext:</b><br>\n";

global $multilingual, $currentlang;
    if ($multilingual == 1) {
	$querylang = "AND (alanguage='$currentlang' OR alanguage='')"; /* the OR is needed to display stories who are posted to ALL languages */
    } else {
	$querylang = "";
    }
$row9 = $db->sql_fetchrow($db->sql_query("select sid, title from ".$prefix."_stories where topic='$topic' $querylang order by counter desc limit 0,1"));
$topstory = intval($row9['sid']);
$ttitle = stripslashes(check_html($row9['title'], "nohtml"));

$boxstuff .= "<a href=\"modules.php?name=$module_name&file=article&sid=$topstory\">$ttitle</a></font></center><br>\n";
themesidebox($boxtitle, $boxstuff);

if ($ratings != 0) {
    $rate = substr($score / $ratings, 0, 4);
    $r_image = round($rate);
	if ($r_image == 1) {
    		$the_image = "<br><br><img src=\"images/articles/stars-1.gif\" border=\"1\"></center><br>";
	} elseif ($r_image == 2) {
    		$the_image = "<br><br><img src=\"images/articles/stars-2.gif\" border=\"1\"></center><br>";
	} elseif ($r_image == 3) {
    		$the_image = "<br><br><img src=\"images/articles/stars-3.gif\" border=\"1\"></center><br>";
	} elseif ($r_image == 4) {
    		$the_image = "<br><br><img src=\"images/articles/stars-4.gif\" border=\"1\"></center><br>";
	} elseif ($r_image == 5) {
    		$the_image = "<br><br><img src=\"images/articles/stars-5.gif\" border=\"1\"></center><br>";
	}
} else {
    $rate = 0;
    $the_image = "</center><br>";
}

$ratetitle = ""._RATEARTICLE."";
$ratecontent = "<center>"._AVERAGESCORE.": <b>$rate</b><br>"._VOTES.": <b>$ratings</b>$the_image";
$ratecontent .= "<form action=\"modules.php?name=$module_name\" method=\"post\"><center>"._RATETHISARTICLE."</center><br>";
$ratecontent .= "<input type=\"hidden\" name=\"sid\" value=\"$sid\">";
$ratecontent .= "<input type=\"hidden\" name=\"op\" value=\"rate_article\">";
$ratecontent .= "<input type=\"radio\" name=\"score\" value=\"5\"> <img src=\"images/articles/stars-5.gif\" border=\"0\" alt=\""._EXCELLENT."\" title=\""._EXCELLENT."\"><br>";
$ratecontent .= "<input type=\"radio\" name=\"score\" value=\"4\"> <img src=\"images/articles/stars-4.gif\" border=\"0\" alt=\""._VERYGOOD."\" title=\""._VERYGOOD."\"><br>";
$ratecontent .= "<input type=\"radio\" name=\"score\" value=\"3\"> <img src=\"images/articles/stars-3.gif\" border=\"0\" alt=\""._GOOD."\" title=\""._GOOD."\"><br>";
$ratecontent .= "<input type=\"radio\" name=\"score\" value=\"2\"> <img src=\"images/articles/stars-2.gif\" border=\"0\" alt=\""._REGULAR."\" title=\""._REGULAR."\"><br>";
$ratecontent .= "<input type=\"radio\" name=\"score\" value=\"1\"> <img src=\"images/articles/stars-1.gif\" border=\"0\" alt=\""._BAD."\" title=\""._BAD."\"><br><br>";
$ratecontent .= "<center><input type=\"submit\" value=\""._CASTMYVOTE."\"></center></form>";
themesidebox($ratetitle, $ratecontent);

$optiontitle = ""._OPTIONS."";
$optionbox = "<br>";
$optionbox .= "&nbsp;<img src='images/print.gif' border='0' alt='"._PRINTER."' title='"._PRINTER."'> <a href=\"modules.php?name=$module_name&amp;file=print&amp;sid=$sid\">"._PRINTER."</a><br><br>";
$optionbox .= "&nbsp;<img src='images/friend.gif' border='0' alt='"._FRIEND."' title='"._FRIEND."'> <a href=\"modules.php?name=$module_name&amp;file=friend&amp;op=FriendSend&amp;sid=$sid\">"._FRIEND."</a><br><br></center>\n";
if (is_admin($admin)) {
    $optionbox .= "</center>";
}
themesidebox($optiontitle, $optionbox);

echo "</td></tr></table>\n";
cookiedecode($user);

include("modules/$module_name/associates.php");

if ((($mode != "nocomments") OR ($acomm == 0)) OR ($articlecomm == 1)) {
    include("modules/News/comments.php");
}
include ("footer.php");
# $Log: article.php,v $
# Revision 1.3  2004/12/08 00:22:34  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/11/01 20:49:27  chatserv
# http://www.nukefixes.com/ftopic-1052-0-days0-orderasc-.html
#
# Revision 1.1  2004/10/05 18:05:24  chatserv
# Initial CVS Addition
#

?>