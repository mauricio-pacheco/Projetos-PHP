<?php

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

global $prefix, $db, $admin_file;
if (!eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied."); }
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='News'"));
$row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'"));
$admins = explode(",", $row['admins']);
$auth_user = 0;
for ($i=0; $i < sizeof($admins); $i++) {
    if ($row2['name'] == "$admins[$i]" AND $row['admins'] != "") {
        $auth_user = 1;	
    }
}

if ($row2['radminsuper'] == 1) {
	$radminsuper = 1;	
}

if ($row2['radminsuper'] == 1 || $auth_user == 1) {

// include Editor Start
include("modules/FCKeditor/fckeditor.php");
// include Editor Ende 

/*********************************************************/
/* Story/News Functions                                  */
/*********************************************************/

function puthome($ihome, $acomm) {
    echo "<br><b>"._PUBLISHINHOME."</b>&nbsp;&nbsp;";
    if (($ihome == 0) OR ($ihome == "")) {
	$sel1 = "checked";
	$sel2 = "";
    }
    if ($ihome == 1) {
	$sel1 = "";
	$sel2 = "checked";
    }
    echo "<input type=\"radio\" name=\"ihome\" value=\"0\" $sel1>"._YES."&nbsp;"
	."<input type=\"radio\" name=\"ihome\" value=\"1\" $sel2>"._NO.""
	."&nbsp;&nbsp;<br>";
	
    echo "<br><b>"._ACTIVATECOMMENTS."</b>&nbsp;&nbsp;";
    if (($acomm == 0) OR ($acomm == "")) {
	$sel1 = "checked";
	$sel2 = "";
    }
    if ($acomm == 1) {
	$sel1 = "";
	$sel2 = "checked";    
    }
    echo "<input type=\"radio\" name=\"acomm\" value=\"0\" $sel1>"._YES."&nbsp;"
	."<input type=\"radio\" name=\"acomm\" value=\"1\" $sel2>"._NO."</font><br><br>";

}

function FCKdeleteStory($qid) {
    global $prefix, $db, $admin_file;
    $qid = intval($qid);
    $result = $db->sql_query("delete from ".$prefix."_queue where qid='$qid'");
    if (!$result) {
	return;
    }
    Header("Location: admin.php?op=FCKsubmissions");
}

function FCKSelectCategory($cat) {
    global $prefix, $db, $admin_file;
    $selcat = $db->sql_query("select catid, title from ".$prefix."_stories_cat order by title");
    $a = 1;
    echo "<b>"._CATEGORY."</b> ";
    echo "<select name=\"catid\">";
    if ($cat == 0) {
	$sel = "selected";
    } else {
	$sel = "";
    }
    while(list($catid, $title) = $db->sql_fetchrow($selcat)) {
	$catid = intval($catid);
	if ($catid == $cat) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"catid\" value=\"$catid\" $sel>$title</option>";
	$a++;
    }
    echo "</select> ";
}

function putpoll($pollTitle, $optionText) {
    
}

function FCKAddCategory () {
	global $admin_file;
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._CATEGORYADD."</b></font><br><br><br>"
	."<form action=\"admin.php\" method=\"post\">"
	."<b>"._CATNAME.":</b> "
	."<input type=\"text\" name=\"title\" size=\"22\" maxlength=\"20\"> "
	."<input type=\"hidden\" name=\"op\" value=\"FCKSaveCategory\">"
	."<input type=\"submit\" value=\""._SAVE."\">"
	."</form></center>";
    CloseTable();
    include("footer.php");
}

function FCKEditCategory($catid) {
    global $prefix, $db, $admin_file;
    $catid = intval($catid);
    $result = $db->sql_query("select title from ".$prefix."_stories_cat where catid='$catid'");
    list($title) = $db->sql_fetchrow($result);
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._EDITCATEGORY."</b></font><br>";
    if (!$catid) {
	$selcat = $db->sql_query("select catid, title from ".$prefix."_stories_cat");
	echo "<form action=\"admin.php\" method=\"post\">";
	echo "<b>"._ASELECTCATEGORY."</b>";
	echo "<select name=\"catid\">";
	echo "<option name=\"catid\" value=\"0\" $sel>Articles</option>";
	while(list($catid, $title) = $db->sql_fetchrow($selcat)) {
	    $catid = intval($catid);
	    echo "<option name=\"catid\" value=\"$catid\" $sel>$title</option>";
	}
	echo "</select>";
	echo "<input type=\"hidden\" name=\"op\" value=\"FCKEditCategory\">";
	echo "<input type=\"submit\" value=\""._EDIT."\"><br><br>";
	echo ""._NOARTCATEDIT."";
    } else {
	echo "<form action=\"admin.php\" method=\"post\">";
	echo "<b>"._CATEGORYNAME.":</b> ";
	echo "<input type=\"text\" name=\"title\" size=\"22\" maxlength=\"20\" value=\"$title\"> ";
	echo "<input type=\"hidden\" name=\"catid\" value=\"$catid\">";
	echo "<input type=\"hidden\" name=\"op\" value=\"FCKSaveEditCategory\">";
	echo "<input type=\"submit\" value=\""._SAVECHANGES."\"><br><br>";
	echo ""._NOARTCATEDIT."";
	echo "</form>";
    }
    echo "</center>";
    CloseTable();
    include("footer.php");
}

function FCKDelCategory($cat) {
    global $prefix, $db, $admin_file;
    $cat = intval($cat);
    $result = $db->sql_query("select title from ".$prefix."_stories_cat where catid='$cat'");
    list($title) = $db->sql_fetchrow($result);
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._DELETECATEGORY."</b></font><br>";
    if (!$cat) {
	$selcat = $db->sql_query("select catid, title from ".$prefix."_stories_cat");
	echo "<form action=\"admin.php\" method=\"post\">"
	    ."<b>"._SELECTCATDEL.": </b>"
	    ."<select name=\"cat\">";
	while(list($catid, $title) = $db->sql_fetchrow($selcat)) {
	    $catid = intval($catid);
	    echo "<option name=\"cat\" value=\"$catid\">$title</option>";
	}
	echo "</select>"
	    ."<input type=\"hidden\" name=\"op\" value=\"FCKDelCategory\">"
	    ."<input type=\"submit\" value=\"Delete\">"
	    ."</form>";
    } else {
	$result2 = $db->sql_query("select * from ".$prefix."_stories where catid='$cat'");
	$numrows = $db->sql_numrows($result2);
	if ($numrows == 0) {
	    $db->sql_query("delete from ".$prefix."_stories_cat where catid='$cat'");
	    echo "<br><br>"._CATDELETED."<br><br>"._GOTOADMIN."";
	} else {
	    echo "<br><br><b>"._WARNING.":</b> "._THECATEGORY." <b>$title</b> "._HAS." <b>$numrows</b> "._STORIESINSIDE."<br>"
		.""._DELCATWARNING1."<br>"
		.""._DELCATWARNING2."<br><br>"
		.""._DELCATWARNING3."<br><br>"
		."<b>[ <a href=\"admin.php?op=FCKYesDelCategory&amp;catid=$cat\">"._YESDEL."</a> | "
		."<a href=\"admin.php?op=FCKNoMoveCategory&amp;catid=$cat\">"._NOMOVE."</a> ]</b>";
	}
    }
    echo "</center>";
    CloseTable();
    include("footer.php");
}

function FCKYesDelCategory($catid) {
    global $prefix, $db, $admin_file;
    $catid = intval($catid);
    $db->sql_query("delete from ".$prefix."_stories_cat where catid='$catid'");
    $result = $db->sql_query("select sid from ".$prefix."_stories where catid='$catid'");
    while(list($sid) = $db->sql_fetchrow($result)) {
	$sid = intval($sid);
	$db->sql_query("delete from ".$prefix."_stories where catid='$catid'");
	$db->sql_query("delete from ".$prefix."_comments where sid='$sid'");
    }
    Header("Location: admin.php");
}

function FCKNoMoveCategory($catid, $newcat) {
    global $prefix, $db, $admin_file;
    $catid = intval($catid);
    $result = $db->sql_query("select title from ".$prefix."_stories_cat where catid='$catid'");
    list($title) = $db->sql_fetchrow($result);
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._MOVESTORIES."</b></font><br><br>";
    if (!$newcat) {
	echo ""._ALLSTORIES." <b>$title</b> "._WILLBEMOVED."<br><br>";
	$selcat = $db->sql_query("select catid, title from ".$prefix."_stories_cat");
	echo "<form action=\"admin.php\" method=\"post\">";
	echo "<b>"._SELECTNEWCAT.":</b> ";
	echo "<select name=\"newcat\">";
        echo "<option name=\"newcat\" value=\"0\">"._ARTICLES."</option>";
	while(list($newcat, $title) = $db->sql_fetchrow($selcat)) {
    	    echo "<option name=\"newcat\" value=\"$newcat\">$title</option>";
	}
	echo "</select>";
	echo "<input type=\"hidden\" name=\"catid\" value=\"$catid\">";
	echo "<input type=\"hidden\" name=\"op\" value=\"FCKNoMoveCategory\">";
	echo "<input type=\"submit\" value=\""._OK."\">";
	echo "</form>";
    } else {
	$resultm = $db->sql_query("select sid from ".$prefix."_stories where catid='$catid'");
	while(list($sid) = $db->sql_fetchrow($resultm)) {
	$sid = intval($sid);
	    $db->sql_query("update ".$prefix."_stories set catid='$newcat' where sid='$sid'");
	}
	$db->sql_query("delete from ".$prefix."_stories_cat where catid='$catid'");
	echo ""._MOVEDONE."";
    }
    CloseTable();
    include("footer.php");
}

function FCKSaveEditCategory($catid, $title) {
    global $prefix, $db, $admin_file;
    $title = ereg_replace("\"","",$title);
    $result = $db->sql_query("select catid from ".$prefix."_stories_cat where title='$title'");
    $catid = intval($catid);
	$check = $db->sql_numrows($result);
    if ($check) {
	$what1 = _CATEXISTS;
	$what2 = _GOBACK;
    } else {
	$what1 = _CATSAVED;
	$what2 = "[ <a href=\"admin.php\">"._GOTOADMIN."</a> ]";
	$result = $db->sql_query("update ".$prefix."_stories_cat set title='$title' where catid='$catid'");
	if (!$result) {
	    return;
	}
    }
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"content\"><b>$what1</b></font><br><br>";
    echo "$what2</center>";
    CloseTable();
    include("footer.php");
}

function FCKSaveCategory($title) {
    global $prefix, $db;
    $title = ereg_replace("\"","",$title);
    $result = $db->sql_query("select catid from ".$prefix."_stories_cat where title='$title'");
	$check = $db->sql_numrows($result);
    if ($check) {
	$what1 = _CATEXISTS;
	$what2 = _GOBACK;
    } else {
	$what1 = _CATADDED;
	$what2 = _GOTOADMIN;
	$result = $db->sql_query("insert into ".$prefix."_stories_cat values (NULL, '$title', '0')");
	if (!$result) {
	    return;
	}
    }
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._CATEGORIESADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"content\"><b>$what1</b></font><br><br>";
    echo "$what2</center>";
    CloseTable();
    include("footer.php");
}

function FCKautodelete($anid) {
    global $prefix, $db, $admin_file;
    $anid = intval($anid);
    $db->sql_query("delete from ".$prefix."_autonews where anid='$anid'");
    Header("Location: admin.php?op=adminMain");
}

function FCKautoEdit($anid) {
    global $aid, $bgcolor1, $bgcolor2, $prefix, $db, $multilingual, $admin_file, $copy;
    $sid = intval($sid);
    $aid = substr("$aid", 0,25);
    $result = $db->sql_query("select radminsuper from ".$prefix."_authors where aid='$aid'");
    list($radminsuper) = $db->sql_fetchrow($result);
    $radminsuper = intval($radminsuper);
	$result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
	$row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$aid'"));
	while ($row = $db->sql_fetchrow($result)) {
		$admins = explode(",", $row[admins]);
		$auth_user = 0;
		for ($i=0; $i < sizeof($admins); $i++) {
			if ($row2[name] == "$admins[$i]") {
				$auth_user = 1;	
			}
		}
		if ($auth_user == 1) {
			$radminarticle = 1;
		}
	}
    $result2 = $db->sql_query("select aid from ".$prefix."_stories where sid='$sid'");
    list($aaid) = $db->sql_fetchrow($result2);
    $aaid = substr("$aaid", 0,25);
    if (($radminarticle == 1) AND ($aaid == $aid) OR ($radminsuper == 1)) {
    include ("header.php");
    $result = $db->sql_query("select catid, aid, title, time, hometext, bodytext, topic, informant, notes, ihome, alanguage, acomm from ".$prefix."_autonews where anid='$anid'");
    list($catid, $aid, $title, $time, $hometext, $bodytext, $topic, $informant, $notes, $ihome, $alanguage, $acomm) = $db->sql_fetchrow($result);
	$catid = intval($catid);
	$aid = substr("$aid", 0,25);
	$informant = substr("$informant", 0,25);
	$ihome = intval($ihome);
	$acomm = intval($acomm);
    ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    echo "<center><font class=\"option\"><b>"._AUTOSTORYEDIT."</b></font></center><br><br>"
	."<form action=\"admin.php\" method=\"post\">";
    $title = stripslashes($title);
    $hometext = stripslashes($hometext);
    $bodytext = stripslashes($bodytext);
    $notes = stripslashes($notes);
    $result=$db->sql_query("select topicimage from ".$prefix."_topics where topicid='$topic'");
    list($topicimage) = $db->sql_fetchrow($result);
    echo "<table border=\"0\" width=\"75%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>"
	."<table border=\"0\" width=\"100%\" cellpadding=\"8\" cellspacing=\"1\" bgcolor=\"$bgcolor1\"><tr><td>"
	."";
    themepreview($title, $hometext, $bodytext);
    echo "</td></tr></table></td></tr></table>"
	."<br><br><b>"._TITLE."</b><br>"
	."<input type=\"text\" name=\"title\" size=\"50\" value=\"$title\"><br><br>"
	."";
    $toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
    echo "";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	$topicid = intval($topicid);
    if ($topicid==$topic) { $sel = "selected "; }
        echo "";
	$sel = "";
    }
    echo "";
    $cat = $catid;
    FCKSelectCategory($cat);
    echo "<br>";
    puthome($ihome, $acomm);
    if ($multilingual == 1) {
	echo "<br><b>"._LANGUAGE.": </b>"
	    ."<select name=\"alanguage\">";
	$handle=opendir('language');
	while ($file = readdir($handle)) {
	    if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
		$langFound = $matches[1];
	        $languageslist .= "$langFound ";
	    }
	}
	closedir($handle);
	$languageslist = explode(" ", $languageslist);
	sort($languageslist);
	for ($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!="") {
		echo "<option value=\"$languageslist[$i]\" ";
		if($languageslist[$i]==$alanguage) echo "selected";
		echo ">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	if ($alanguage == "") {
	    $sellang = "selected";
	} else {
    	    $sellang = "";
	}
	echo "<option value=\"\" $sellang>"._ALL."</option></select>";
    } else {
	echo "<input type=\"hidden\" name=\"alanguage\" value=\"\">";
    }
    echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$hometext" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$bodytext" ;
$oFCKeditor->Create() ;
// Editor Ende 
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"hometext\">$hometext</textarea><br><br>"
#	."<b>"._EXTENDEDTEXT."</b><br>"
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"bodytext\">$bodytext</textarea><br>"
echo "<br><font class=\"content\">"._ARESUREURL."</font><br><br>";
    if ($aid != $informant) {
    	echo "<b>"._NOTES."</b><br>
	<textarea wrap=\"virtual\" cols=\"50\" rows=\"4\" name=\"notes\">$notes</textarea><br><br>";
    }
    echo "<br><b>"._CHNGPROGRAMSTORY."</b><br><br>"
	.""._NOWIS.": $date<br><br>";
    $xday = 1;
    echo ""._DAY.": <select name=\"day\">";
    while ($xday <= 31) {
	if ($xday == $datetime[3]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"day\" $sel>$xday</option>";
	$xday++;
    }
    echo "</select>";
    $xmonth = 1;
    echo ""._UMONTH.": <select name=\"month\">";
    while ($xmonth <= 12) {
	if ($xmonth == $datetime[2]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"month\" $sel>$xmonth</option>";
	$xmonth++;
    }
    echo "</select>";
    echo ""._YEAR.": <input type=\"text\" name=\"year\" value=\"$datetime[1]\" size=\"5\" maxlength=\"4\">";
    echo "<br>"._HOUR.": <select name=\"hour\">";
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $datetime[4]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"hour\" $sel>$xhour</option>";
	$xhour = $dummy;
	$xhour++;
    }
    echo "</select>";
    echo ": <select name=\"min\">";
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $datetime[5]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"min\" $sel>$xmin</option>";
	$xmin = $xmin + 5;
    }
    echo "</select>";
    echo ": 00<br><br>
    <input type=\"hidden\" name=\"anid\" value=\"$anid\">
    <input type=\"hidden\" name=\"op\" value=\"FCKautoSaveEdit\">
    <input type=\"submit\" value=\""._SAVECHANGES."\">
    </form>";
    CloseTable();
    include ('footer.php');
    } else {
	include ('header.php');
	GraphicAdmin();
	OpenTable();
	echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><b>"._NOTAUTHORIZED1."</b><br><br>"
	    .""._NOTAUTHORIZED2."<br><br>"
	    .""._GOBACK."";
	CloseTable();
	include("footer.php");
    }
}

function FCKautoSaveEdit($anid, $year, $day, $month, $hour, $min, $title, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm) {
    global $aid, $ultramode, $prefix, $db, $admin_file;
    $aid = substr("$aid", 0,25);
    $sid = intval($sid);
    $result = $db->sql_query("select radminsuper from ".$prefix."_authors where aid='$aid'");
    list($radminsuper) = $db->sql_fetchrow($result);
    $radminsuper = intval($radminsuper);
	$result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
	$row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$aid'"));
	while ($row = $db->sql_fetchrow($result)) {
		$admins = explode(",", $row[admins]);
		$auth_user = 0;
		for ($i=0; $i < sizeof($admins); $i++) {
			if ($row2[name] == "$admins[$i]") {
				$auth_user = 1;	
			}
		}
		if ($auth_user == 1) {
			$radminarticle = 1;
		}
	}
    $result2 = $db->sql_query("select aid from ".$prefix."_stories where sid='$sid'");
    list($aaid) = $db->sql_fetchrow($result2);
    $aaid = substr("$aaid", 0,25);
    if (($radminarticle == 1) AND ($aaid == $aid) OR ($radminsuper == 1)) {
    if ($day < 10) {
	$day = "0$day";
    }
    if ($month < 10) {
	$month = "0$month";
    }
    $sec = "00";
    $date = "$year-$month-$day $hour:$min:$sec";
    $title = stripslashes(FixQuotes($title));
    $hometext = stripslashes(FixQuotes($hometext));
    $bodytext = stripslashes(FixQuotes($bodytext));
    $notes = stripslashes(FixQuotes($notes));
    $result = $db->sql_query("update ".$prefix."_autonews set catid='$catid', title='$title', time='$date', hometext='$hometext', bodytext='$bodytext', topic='$topic', notes='$notes', ihome='$ihome', alanguage='$alanguage', acomm='$acomm' where anid='$anid'");
    if (!$result) {
	exit();
    }
    if ($ultramode) {
	ultramode();
    }
    Header("Location: admin.php?op=adminMain");
    } else {
	include ('header.php');
	GraphicAdmin();
	OpenTable();
	echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><b>"._NOTAUTHORIZED1."</b><br><br>"
	    .""._NOTAUTHORIZED2."<br><br>"
	    .""._GOBACK."";
	CloseTable();
	include("footer.php");
    }
}

function FCKdisplayStory($qid) {
    global $user, $subject, $story, $bgcolor1, $bgcolor2, $anonymous, $user_prefix, $prefix, $db, $multilingual, $admin_file, $copy;
    include ('header.php');
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._SUBMISSIONSADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $ttmon = $today[mon];
    if ($ttmon < 10){
	$ttmon = "0$ttmon";
    }
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    $qid = intval($qid);
    $result = $db->sql_query("SELECT qid, uid, uname, subject, story, storyext, topic, alanguage FROM ".$prefix."_queue where qid='$qid'");
    list($qid, $uid, $uname, $subject, $story, $storyext, $topic, $alanguage) = $db->sql_fetchrow($result);
	$qid = intval($qid);
	$uid = intval($uid);
    $subject = stripslashes($subject);
    $story = stripslashes($story);
    $storyext = stripslashes($storyext);
    $story1 = eregi_replace("<a href=\"http://", "<a href=\"index.php?url=http://", $story);
    $storyext1 = eregi_replace("<a href=\"http://", "<a href=\"index.php?url=http://", $storyext);
    OpenTable();
    echo "<font class=\"content\">"
	."<form action=\"admin.php\" method=\"post\">"
	."<b>"._NAME."</b><br>"
	."<input type=\"text\" NAME=\"author\" size=\"25\" value=\"$uname\">";
    if ($uname != $anonymous) {
	$res = $db->sql_query("select user_email from ".$user_prefix."_users where username='$uname'");
	list($email) = $db->sql_fetchrow($res);
	echo "&nbsp;&nbsp;<font class=\"content\">[ <a href=\"mailto:$email?Subject=Re: $subject\">"._EMAILUSER."</a> | <a href='modules.php?name=Your_Account&op=userinfo&username=$uname'>"._USERPROFILE."</a> | <a href=\"modules.php?name=Private_Messages&amp;mode=post&amp;u=$uid\">"._SENDPM."</a> ]</font>";
    }
    echo "<br><br><b>"._TITLE."</b><br>"
	."<input type=\"text\" name=\"subject\" size=\"50\" value=\"$subject\"><br><br>";
    if($topic=="") {
        $topic = 1;
    }
    $result = $db->sql_query("select topicimage from ".$prefix."_topics where topicid='$topic'");
    list($topicimage) = $db->sql_fetchrow($result);
    echo "<table border=\"0\" width=\"70%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>"
	."<table border=\"0\" width=\"100%\" cellpadding=\"8\" cellspacing=\"1\" bgcolor=\"$bgcolor1\"><tr><td>"
	."";
    $storypre = "$story1<br><br>$storyext1";
    themepreview($subject, $storypre);
    echo "</td></tr></table></td></tr></table>"
	."";
    $toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
    echo "";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
    $topicid = intval($topicid);
        if ($topicid==$topic) {
	    $sel = "selected ";
	}
        echo "";
	$sel = "";
    }
    echo "";
    echo "<br>";
    echo "<table border='0' width='100%' cellspacing='0'><tr><td width='20%'><b>"._ASSOTOPIC."</b></td><td width='100%'>"
	."<table border='1' cellspacing='3' cellpadding='8'><tr>";
    $sql = "SELECT topicid, topictext FROM ".$prefix."_topics ORDER BY topictext";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) {
	if ($a == 3) {
	    echo "</tr><tr>";
	    $a = 0;
	}
	echo "<td><input type='checkbox' name='assotop[]' value='$row[topicid]'>$row[topictext]</td>";
	$a++;
    }
    echo "</tr></table></td></tr></table><br><br>";
    FCKSelectCategory($cat);
    echo "<br>";
    puthome($ihome, $acomm);
    if ($multilingual == 1) {
	echo "<br><b>"._LANGUAGE.": </b>"
	    ."<select name=\"alanguage\">";
	$handle=opendir('language');
	while ($file = readdir($handle)) {
	    if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
	        $langFound = $matches[1];
	        $languageslist .= "$langFound ";
	    }
	}
	closedir($handle);
	$languageslist = explode(" ", $languageslist);
	sort($languageslist);
	for ($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!="") {
		echo "<option value=\"$languageslist[$i]\" ";
		if($languageslist[$i]==$alanguage) echo "selected";
		echo ">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	if ($alanguage == "") {
	    $sellang = "selected";
	} else {
    	    $sellang = "";
	}
	echo "<option value=\"\" $sellang>"._ALL."</option></select>";
    } else {
	echo "<input type=\"hidden\" name=\"alanguage\" value=\"\">";
    }
    echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$story" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$storyext" ;
$oFCKeditor->Create() ;
// Editor Ende  
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"7\" name=\"hometext\">$story</textarea><br><br>"
#	."<b>"._EXTENDEDTEXT."</b><br>"
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"8\" name=\"bodytext\">$storyext</textarea><BR>"
echo "<br><font class=\"content\">"._AREYOUSURE."</font><br><br>"
	."<b>"._NOTES."</b><br>"
	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"4\" name=\"notes\"></textarea><br>"
	."<input type=\"hidden\" NAME=\"qid\" size=\"50\" value=\"$qid\">"
	."<input type=\"hidden\" NAME=\"uid\" size=\"50\" value=\"$uid\">"
	."<br><b>"._PROGRAMSTORY."</b>&nbsp;&nbsp;"
	."<input type=\"radio\" name=\"automated\" value=\"1\">"._YES." &nbsp;&nbsp;"
	."<input type=\"radio\" name=\"automated\" value=\"0\" checked>"._NO."<br><br>"
	.""._NOWIS.": $date<br><br>";
    $day = 1;
    echo ""._DAY.": <select name=\"day\">";
    while ($day <= 31) {
	if ($tday==$day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"day\" $sel>$day</option>";
	$day++;
    }
    echo "</select>";
    $month = 1;
    echo ""._UMONTH.": <select name=\"month\">";
    while ($month <= 12) {
	if ($ttmon==$month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"month\" $sel>$month</option>";
	$month++;
    }
    echo "</select>";
    $date = getdate();
    $year = $date[year];
    echo ""._YEAR.": <input type=\"text\" name=\"year\" value=\"$year\" size=\"5\" maxlength=\"4\">";
    echo "<br>"._HOUR.": <select name=\"hour\">";
    $hour = 0;
    $cero = "0";
    while ($hour <= 23) {
	$dummy = $hour;
	if ($hour < 10) {
	    $hour = "$cero$hour";
	}
	echo "<option name=\"hour\">$hour</option>";
	$hour = $dummy;
	$hour++;
    }
    echo "</select>";
    echo ": <select name=\"min\">";
    $min = 0;
    while ($min <= 59) {
	if (($min == 0) OR ($min == 5)) {
	    $min = "0$min";
	}
	echo "<option name=\"min\">$min</option>";
	$min = $min + 5;
    }
    echo "</select>";
    echo ": 00<br><br>"
	."<select name=\"op\">"
	."<option value=\"FCKDeleteStory\">"._DELETESTORY."</option>"
	.""
	."<option value=\"FCKPostStory\">"._POSTSTORY."</option>"
	."</select>"
	."<input type=\"submit\" value=\""._OK."\">&nbsp;&nbsp;[ <a href=\"admin.php?op=FCKDeleteStory&qid=$qid\">"._DELETE."</a> ]";
	CloseTable();
    echo "<br>";
    putpoll($pollTitle, $optionText);
    echo "</form>";
    include ('footer.php');
}

function FCKpreviewStory($automated, $year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop) {
    global $user, $boxstuff, $anonymous, $bgcolor1, $bgcolor2, $user_prefix, $prefix, $db, $multilingual, $admin_file, $copy;
    include ('header.php');
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    $subject = stripslashes($subject);
    $hometext = stripslashes($hometext);
    $bodytext = stripslashes($bodytext);
    $hometext1 = eregi_replace("<a href=\"http://", "<a href=\"index.php?url=http://", $hometext);
    $bodytext1 = eregi_replace("<a href=\"http://", "<a href=\"index.php?url=http://", $bodytext);
    $notes = stripslashes($notes);
    OpenTable();
    echo "<font class=\"content\">"
	."<form action=\"admin.php\" method=\"post\">"
	."<b>"._NAME."</b><br>"
	."<input type=\"text\" name=\"author\" size=\"25\" value=\"$author\">";
    if ($author != $anonymous) {
	$res = $db->sql_query("select user_id, user_email from ".$user_prefix."_users where username='$author'");
	list($pm_userid, $email) = $db->sql_fetchrow($res);
	$pm_userid = intval($pm_userid);
	echo "&nbsp;&nbsp;<font class=\"content\">[ <a href=\"mailto:$email?Subject=Re: $subject\">"._EMAILUSER."</a> | <a href='modules.php?name=Your_Account&op=userinfo&username=$author'>"._USERPROFILE."</a> | <a href=\"modules.php?name=Private_Messages&amp;mode=post&amp;u=$uid\">"._SENDPM."</a> ]</font>";
    }
    echo "<br><br><b>"._TITLE."</b><br>"
	."<input type=\"text\" name=\"subject\" size=\"50\" value=\"$subject\"><br><br>";
    $result = $db->sql_query("select topicimage from ".$prefix."_topics where topicid='$topic'");
    list($topicimage) = $db->sql_fetchrow($result);
    echo "<table width=\"70%\" bgcolor=\"$bgcolor2\" cellpadding=\"0\" cellspacing=\"1\" border=\"0\"align=\"center\"><tr><td>"
	."<table width=\"100%\" bgcolor=\"$bgcolor1\" cellpadding=\"8\" cellspacing=\"1\" border=\"0\"><tr><td>"
	."";
    themepreview($subject, $hometext1, $bodytext1, $notes);
    echo "</td></tr></table></td></tr></table>"
	."";
    $toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
    echo "";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	    $topicid = intval($topicid);
        if ($topicid==$topic) {
	    $sel = "selected ";
	}
        echo "";
	$sel = "";
    }
    echo "";
    echo "";
    for ($i=0; $i<sizeof($assotop); $i++) {
	$associated .= "$assotop[$i]-";
    }
    $asso_t = explode("-", $associated);
    echo "<table border='0' width='100%' cellspacing='0'><tr><td width='20%'><b>"._ASSOTOPIC."</b></td><td width='100%'>"
        ."<table border='1' cellspacing='3' cellpadding='8'><tr>";
    $sql = "SELECT topicid, topictext FROM ".$prefix."_topics ORDER BY topictext";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) {
        if ($a == 3) {
    	    echo "</tr><tr>";
	    $a = 0;
	}
	for ($i=0; $i<sizeof($asso_t); $i++) {
	    if ($asso_t[$i] == $row[topicid]) {
	        $checked = "CHECKED";
	        break;
	    }
	}
	echo "<td><input type='checkbox' name='assotop[]' value='$row[topicid]' $checked>$row[topictext]</td>";
	$checked = "";
	$a++;
    }
    echo "</tr></table></td></tr></table><br><br>";
    $cat = $catid;
    FCKSelectCategory($cat);
    echo "<br>";
    puthome($ihome, $acomm);
    if ($multilingual == 1) {
	echo "<br><b>"._LANGUAGE.": </b>"
	    ."<select name=\"alanguage\">";
	$handle=opendir('language');
	while ($file = readdir($handle)) {
	    if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
	        $langFound = $matches[1];
	        $languageslist .= "$langFound ";
	    }
	}
	closedir($handle);
	$languageslist = explode(" ", $languageslist);
	sort($languageslist);
	for ($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!="") {
		echo "<option value=\"$languageslist[$i]\" ";
		if($languageslist[$i]==$alanguage) echo "selected";
		echo ">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	if ($alanguage == "") {
	    $sellang = "selected";
	} else {
    	    $sellang = "";
	}
	echo "<option value=\"\" $sellang>"._ALL."</option></select>";
    } else {
	echo "<input type=\"hidden\" name=\"alanguage\" value=\"$language\">";
    }
    echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$hometext" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$bodytext" ;
$oFCKeditor->Create() ;
// Editor Ende 
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"7\" name=\"hometext\">$hometext</textarea><br><br>"
#	."<b>"._EXTENDEDTEXT."</b><br>"
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"10\" name=\"bodytext\">$bodytext</textarea><br>"
	echo "<br><font class=\"content\">"._AREYOUSURE."</font><br><br>"
	."<b>"._NOTES."</b><br>"
	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"4\" name=\"notes\">$notes</textarea><br><br>"
	."<input type=\"hidden\" NAME=\"qid\" size=\"50\" value=\"$qid\">"
	."<input type=\"hidden\" NAME=\"uid\" size=\"50\" value=\"$uid\">";
    if ($automated == 1) {
	$sel1 = "checked";
	$sel2 = "";
    } else {
	$sel1 = "";
	$sel2 = "checked";
    }
    echo "<b>"._PROGRAMSTORY."</b>&nbsp;&nbsp;"
	."<input type=\"radio\" name=\"automated\" value=\"1\" $sel1>"._YES." &nbsp;&nbsp;"
	."<input type=\"radio\" name=\"automated\" value=\"0\" $sel2>"._NO."<br><br>"
	.""._NOWIS.": $date<br><br>";
    $xday = 1;
    echo ""._DAY.": <select name=\"day\">";
    while ($xday <= 31) {
	if ($xday == $day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"day\" $sel>$xday</option>";
	$xday++;
    }
    echo "</select>";
    $xmonth = 1;
    echo ""._UMONTH.": <select name=\"month\">";
    while ($xmonth <= 12) {
	if ($xmonth == $month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"month\" $sel>$xmonth</option>";
	$xmonth++;
    }
    echo "</select>";
    echo ""._YEAR.": <input type=\"text\" name=\"year\" value=\"$year\" size=\"5\" maxlength=\"4\">";
    echo "<br>"._HOUR.": <select name=\"hour\">";
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $hour) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"hour\" $sel>$xhour</option>";
	$xhour = $dummy;
	$xhour++;
    }
    echo "</select>";
    echo ": <select name=\"min\">";
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $min) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"min\" $sel>$xmin</option>";
	$xmin = $xmin + 5;
    }
    echo "</select>";
    echo ": 00<br><br>"
	."<select name=\"op\">"
	."<option value=\"FCKDeleteStory\">"._DELETESTORY."</option>"
	.""
	."<option value=\"FCKPostStory\">"._POSTSTORY."</option>"
	."</select>"
	."<input type=\"submit\" value=\""._OK."\">";
    CloseTable();
    echo "<br>";
    putpoll($pollTitle, $optionText);
    echo "</form>";
    include ('footer.php');
}

function FCKpostStory($automated, $year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop) {
    global $aid, $ultramode, $prefix, $db, $user_prefix, $admin_file;
    for ($i=0; $i<sizeof($assotop); $i++) {
	$associated .= "$assotop[$i]-";
    }
    if ($automated == 1) {
        if ($day < 10) {
	    $day = "0$day";
	}
	if ($month < 10) {
	    $month = "0$month";
	}
	$sec = "00";
	$date = "$year-$month-$day $hour:$min:$sec";
	if ($uid == 1) $author = "";
	if ($hometext == $bodytext) $bodytext = "";
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	$result = $db->sql_query("insert into ".$prefix."_autonews values (NULL, '$catid', '$aid', '$subject', '$date', '$hometext', '$bodytext', '$topic', '$author', '$notes', '$ihome', '$alanguage', '$acomm', '$associated')");
	if (!$result) {
	    return;
	}
	if ($uid != 1) {
	    $db->sql_query("update ".$user_prefix."_users set counter=counter+1 where user_id='$uid'");
	    $row = $db->sql_fetchrow($db->sql_query("SELECT points FROM ".$prefix."_groups_points WHERE id='4'"));
	    $db->sql_query("UPDATE ".$user_prefix."_users SET points=points+$row[points] where user_id='$uid'");
	}
	$db->sql_query("update ".$prefix."_authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
    	    ultramode();
	}
        $qid = intval($qid);
	$db->sql_query("delete from ".$prefix."_queue where qid='$qid'");
	Header("Location: admin.php?op=FCKsubmissions");
    } else {
	if ($uid == 1) $author = "";
	if ($hometext == $bodytext) $bodytext = "";
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	if (($pollTitle != "") AND ($optionText[1] != "") AND ($optionText[2] != "")) {
	    $haspoll = 1;
	    $timeStamp = time();
	    $pollTitle = FixQuotes($pollTitle);
	    if(!$db->sql_query("INSERT INTO ".$prefix."_poll_desc VALUES (NULL, '$pollTitle', '$timeStamp', '0', '$alanguage', '0')")) {
		return;
	    }
	    $object = $db->sql_fetchrow($db->sql_query("SELECT pollID FROM ".$prefix."_poll_desc WHERE pollTitle='$pollTitle'"));
	    $id = $object['pollID'];
	    $id = intval($id);
	    for($i = 1; $i <= sizeof($optionText); $i++) {
		if($optionText[$i] != "") {
		    $optionText[$i] = FixQuotes($optionText[$i]);
		}
		if(!$db->sql_query("INSERT INTO ".$prefix."_poll_data (pollID, optionText, optionCount, voteID) VALUES ('$id', '$optionText[$i]', '0', '$i')")) {
		    return;
		}
	    }
	} else {
	    $haspoll = 0;
	    $id = 0;
	}
	$result = $db->sql_query("insert into ".$prefix."_stories values (NULL, '$catid', '$aid', '$subject', now(), '$hometext', '$bodytext', '0', '0', '$topic', '$author', '$notes', '$ihome', '$alanguage', '$acomm', '$haspoll', '$id', '0', '0', '$associated')");
	$result = $db->sql_query("select sid from ".$prefix."_stories WHERE title='$subject' order by time DESC limit 0,1");
	list($artid) = $db->sql_fetchrow($result);
	$artid = intval($artid);
	$db->sql_query("UPDATE ".$prefix."_poll_desc SET artid='$artid' WHERE pollID='$id'");
	if (!$result) {
	    return;
	}
	if ($uid != 1) {
	    $row = $db->sql_fetchrow($db->sql_query("SELECT points FROM ".$prefix."_groups_points WHERE id='4'"));
	    $db->sql_query("UPDATE ".$user_prefix."_users SET points=points+$row[points] where user_id='$uid'");
    	    $db->sql_query("update ".$user_prefix."_users set counter=counter+1 where user_id='$uid'");
	}
	$db->sql_query("update ".$prefix."_authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
    	    ultramode();
	}
	FCKdeleteStory($qid);
    }
}

function FCKeditStory($sid) {
    global $user, $bgcolor1, $bgcolor2, $aid, $prefix, $db, $multilingual, $admin_file, $copy;
    $aid = substr("$aid", 0,25);
    $result = $db->sql_query("select radminsuper from ".$prefix."_authors where aid='$aid'");
    list($radminsuper) = $db->sql_fetchrow($result);
    $radminsuper = intval($radminsuper);
	$result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
	$row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$aid'"));
	while ($row = $db->sql_fetchrow($result)) {
		$admins = explode(",", $row[admins]);
		$auth_user = 0;
		for ($i=0; $i < sizeof($admins); $i++) {
			if ($row2[name] == "$admins[$i]") {
				$auth_user = 1;	
			}
		}
		if ($auth_user == 1) {
			$radminarticle = 1;
		}
	}
    $result2 = $db->sql_query("select aid from ".$prefix."_stories where sid='$sid'");
    list($aaid) = $db->sql_fetchrow($result2);
    $aaid = substr("$aaid", 0,25);
    if (($radminarticle == 1) AND ($aaid == $aid) OR ($radminsuper == 1)) {
	include ('header.php');
	GraphicAdmin();
	OpenTable();
	echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	CloseTable();
	echo "<br>";
	$result = $db->sql_query("SELECT catid, title, hometext, bodytext, topic, notes, ihome, alanguage, acomm FROM ".$prefix."_stories where sid='$sid'");
        list($catid, $subject, $hometext, $bodytext, $topic, $notes, $ihome, $alanguage, $acomm) = $db->sql_fetchrow($result);
	$catid = intval($catid);
	$subject = stripslashes($subject);
        $hometext = stripslashes($hometext);
        $bodytext = stripslashes($bodytext);
        $notes = stripslashes($notes);
	$ihome = intval($ihome);
	$acomm = intval($acomm);
        $result2=$db->sql_query("select topicimage from ".$prefix."_topics where topicid='$topic'");
        list($topicimage) = $db->sql_fetchrow($result2);
        OpenTable();
        echo "<center><font class=\"option\"><b>"._EDITARTICLE."</b></font></center><br>"
	    ."<table width=\"80%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>"
	    ."<table width=\"100%\" border=\"0\" cellpadding=\"8\" cellspacing=\"1\" bgcolor=\"$bgcolor1\"><tr><td>"
	    ."";
	themepreview($subject, $hometext, $bodytext, $notes);
	echo "</td></tr></table></td></tr></table><br><br>"
	    ."<form action=\"admin.php\" method=\"post\">"
	    ."<b>"._TITLE."</b><br>"
	    ."<input type=\"text\" name=\"subject\" size=\"50\" value=\"$subject\"><br><br>"
	    ."";
	$toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
	echo "";
	while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	    $topicid = intval($topicid);
    	    if ($topicid==$topic) { $sel = "selected "; }
        	echo "";
		$sel = "";
	}
	echo "";
	echo "";
	$asql = "SELECT associated FROM ".$prefix."_stories WHERE sid='$sid'";
	$aresult = $db->sql_query($asql);
	$arow = $db->sql_fetchrow($aresult);
	$asso_t = explode("-", $arow[associated]);
	$sql = "SELECT topicid, topictext FROM ".$prefix."_topics ORDER BY topictext";
        $result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result)) {
	    if ($a == 3) {
		$a = 0;
	    }
	    for ($i=0; $i<sizeof($asso_t); $i++) {
		if ($asso_t[$i] == $row[topicid]) {
		    $checked = "CHECKED";
		    break;
		}
	    }
	    $checked = "";
	    $a++;
	}
	$cat = $catid;
	FCKSelectCategory($cat);
	echo "<br>";
	puthome($ihome, $acomm);
	if ($multilingual == 1) {
	    echo "<br><b>"._LANGUAGE.":</b>"
		."<select name=\"alanguage\">";
	    $handle=opendir('language');
	    while ($file = readdir($handle)) {
		if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
	    	    $langFound = $matches[1];
	    	    $languageslist .= "$langFound ";
	    	}
	    }
	    closedir($handle);
	    $languageslist = explode(" ", $languageslist);
	    sort($languageslist);
	    for ($i=0; $i < sizeof($languageslist); $i++) {
	        if($languageslist[$i]!="") {
		    echo "<option name=\"alanguage\" value=\"$languageslist[$i]\" ";
		    if($languageslist[$i]==$alanguage) echo "selected";
		    echo ">".ucfirst($languageslist[$i])."\n</option>";
		}
	    }
	    if ($alanguage == "") {
		$sellang = "selected";
	    } else {
    		$sellang = "";
	    }
	    echo "<option value=\"\" $sellang>"._ALL."</option></select>";
	} else {
	    echo "<input type=\"hidden\" name=\"alanguage\" value=\"\">";
	}
	echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$hometext" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$bodytext" ;
$oFCKeditor->Create() ;
// Editor Ende 
#	    ."<textarea wrap=\"virtual\" cols=\"50\" rows=\"7\" name=\"hometext\">$hometext</textarea><br><br>"
#	    ."<b>"._EXTENDEDTEXT."</b><br>"
#	    ."<textarea wrap=\"virtual\" cols=\"50\" rows=\"10\" name=\"bodytext\">$bodytext</textarea><br>"
	    echo "<br><font class=\"content\">"._AREYOUSURE."</font><br><br>"
	    ."<b>"._NOTES."</b><br>"
	    ."<textarea wrap=\"virtual\" cols=\"50\" rows=\"4\" name=\"notes\">$notes</textarea><br><br>"
	    ."<input type=\"hidden\" NAME=\"sid\" size=\"50\" value=\"$sid\">"
	    ."<input type=\"hidden\" name=\"op\" value=\"FCKChangeStory\">"
	    ."<input type=\"submit\" value=\""._SAVECHANGES."\">"
	    ."</form>";
	CloseTable();
	include ('footer.php');
    } else {
	include ('header.php');
	GraphicAdmin();
	OpenTable();
	echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><b>"._NOTAUTHORIZED1."</b><br><br>"
	    .""._NOTAUTHORIZED2."<br><br>"
	    .""._GOBACK."";
	CloseTable();
	include("footer.php");
    }
}

function FCKremoveStory($sid, $ok=0) {
    global $ultramode, $aid, $prefix, $db, $admin_file;
    $aid = substr("$aid", 0,25);
    $result = $db->sql_query("select counter, radminsuper from ".$prefix."_authors where aid='$aid'");
    list($counter, $radminsuper) = $db->sql_fetchrow($result);
    $radminsuper = intval($radminsuper);
    $counter = intval($counter);
    $sid = intval($sid);
	$result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
	$row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$aid'"));
	while ($row = $db->sql_fetchrow($result)) {
		$admins = explode(",", $row[admins]);
		$auth_user = 0;
		for ($i=0; $i < sizeof($admins); $i++) {
			if ($row2[name] == "$admins[$i]") {
				$auth_user = 1;	
			}
		}
		if ($auth_user == 1) {
			$radminarticle = 1;
		}
	}
    $result2 = $db->sql_query("select aid from ".$prefix."_stories where sid='$sid'");
    list($aaid) = $db->sql_fetchrow($result2);
    $aaid = substr("$aaid", 0,25);
    if (($radminarticle == 1) AND ($aaid == $aid) OR ($radminsuper == 1)) {
	if($ok) {
	    $counter--;
    	    $db->sql_query("DELETE FROM ".$prefix."_stories where sid='$sid'");
	    $db->sql_query("DELETE FROM ".$prefix."_comments where sid='$sid'");
	    $db->sql_query("update ".$prefix."_poll_desc set artid='0' where artid='$sid'");
	    $result = $db->sql_query("update ".$prefix."_authors set counter='$counter' where aid='$aid'");
	    if ($ultramode) {
	        ultramode();
	    }
	    Header("Location: admin.php");
	} else {
	    include("header.php");
	    GraphicAdmin();
	    OpenTable();
	    echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	    CloseTable();
	    echo "<br>";
	    OpenTable();
	    echo "<center>"._REMOVESTORY." $sid "._ANDCOMMENTS."";
	    echo "<br><br>[ <a href=\"admin.php\">"._NO."</a> | <a href=\"admin.php?op=FCKRemoveStory&amp;sid=$sid&amp;ok=1\">"._YES."</a> ]</center>";
    	    CloseTable();
	    include("footer.php");
	}
    } else {
	include ('header.php');
	GraphicAdmin();
	OpenTable();
	echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><b>"._NOTAUTHORIZED1."</b><br><br>"
	    .""._NOTAUTHORIZED2."<br><br>"
	    .""._GOBACK."";
	CloseTable();
	include("footer.php");
    }
}

function FCKchangeStory($sid, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $assotop) {
    global $aid, $ultramode, $prefix, $db, $admin_file;
    for ($i=0; $i<sizeof($assotop); $i++) {
	$associated .= "$assotop[$i]-";
    }
    $sid = intval($sid);
    $aid = substr("$aid", 0,25);
    $result = $db->sql_query("select radminsuper from ".$prefix."_authors where aid='$aid'");
    list($radminsuper) = $db->sql_fetchrow($result);
    $radminsuper = intval($radminsuper);
	$result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
	$row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$aid'"));
	while ($row = $db->sql_fetchrow($result)) {
		$admins = explode(",", $row[admins]);
		$auth_user = 0;
		for ($i=0; $i < sizeof($admins); $i++) {
			if ($row2[name] == "$admins[$i]") {
				$auth_user = 1;	
			}
		}
		if ($auth_user == 1) {
			$radminarticle = 1;
		}
	}
    $result2 = $db->sql_query("select aid from ".$prefix."_stories where sid='$sid'");
    list($aaid) = $db->sql_fetchrow($result2);
    $aaid = substr("$aaid", 0,25);
    if (($radminarticle == 1) AND ($aaid == $aid) OR ($radminsuper == 1)) {
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	     $db->sql_query("update ".$prefix."_stories set catid='$catid', title='$subject', hometext='$hometext', bodytext='$bodytext', topic='$topic', notes='$notes', ihome='$ihome', alanguage='$alanguage', acomm='$acomm', associated='$associated' where sid='$sid'");
	if ($ultramode) {
    	    ultramode();
	}
	Header("Location: admin.php?op=adminMain");
    }
}

function FCKadminStory() {
    global $prefix, $db, $language, $multilingual, $admin_file, $copy;
    include ('header.php');
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $ttmon = $today[mon];
    if ($ttmon < 10){
	$ttmon = "0$ttmon";
    }
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._ADDARTICLE."</b></font></center><br><br>"
    	."<form action=\"admin.php\" method=\"post\">"
	."<b>"._TITLE."</b><br>"
	."<input type=\"text\" name=\"subject\" size=\"50\"><br><br>"
	."";
    $toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
    echo "";
    echo "";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	    $topicid = intval($topicid);
        if ($topicid == $topic) {
	    $sel = "selected ";
	}
    	echo "";
	$sel = "";
    }
    echo "";
    $sql = "SELECT topicid, topictext FROM ".$prefix."_topics ORDER BY topictext";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) {
	if ($a == 3) {
	    $a = 0;
	}
	$a++;
    }
    $cat = 0;
    FCKSelectCategory($cat);
    echo "<br>";
    puthome($ihome, $acomm);
    if ($multilingual == 1) {
	echo "<br><b>"._LANGUAGE.": </b>"
	    ."<select name=\"alanguage\">";
	$handle=opendir('language');
	while ($file = readdir($handle)) {
	    if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
	        $langFound = $matches[1];
	        $languageslist .= "$langFound ";
	    }
	}
	closedir($handle);
	$languageslist = explode(" ", $languageslist);
	sort($languageslist);
	for ($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!="") {
		echo "<option value=\"$languageslist[$i]\" ";
		if($languageslist[$i]==$language) echo "selected";
		echo ">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	echo "<option value=\"\">"._ALL."</option></select>";
    } else {
	echo "<input type=\"hidden\" name=\"alanguage\" value=\"$language\">";
    }
    echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$hometext" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$bodytext" ;
$oFCKeditor->Create() ;
// Editor Ende 
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"hometext\"></textarea><br><br>"
#	."<b>"._EXTENDEDTEXT."</b><br>"
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"bodytext\"></textarea><br>"
	$day = 1;
    while ($day <= 31) {
	if ($tday==$day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$day++;
    }
    $month = 1;
    while ($month <= 12) {
	if ($ttmon==$month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$month++;
    }
    $date = getdate();
    $year = $date[year];
    $hour = 0;
    $cero = "0";
    while ($hour <= 23) {
	$dummy = $hour;
	if ($hour < 10) {
	    $hour = "$cero$hour";
	}
	$hour = $dummy;
	$hour++;
    }
    $min = 0;
    while ($min <= 59) {
	if (($min == 0) OR ($min == 5)) {
	    $min = "0$min";
	}
	$min = $min + 5;
    }
    echo "<br>"
	."<select name=\"op\">"
	.""
	."<option value=\"FCKPostAdminStory\">"._POSTSTORY."</option>"
	."</select>"
	."<input type=\"submit\" value=\""._OK."\">";
    CloseTable();
    echo "<br>";
    putpoll($pollTitle, $optionText);
    echo "</form>";
    include ('footer.php');
}

function FCKpreviewAdminStory($automated, $year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop) {
    global $user, $bgcolor1, $bgcolor2, $prefix, $db, $alanguage, $multilingual, $admin_file, $copy;
    include ('header.php');
    if ($topic<1) {
        $topic = 1;
    }
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._ARTICLEADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    OpenTable();
    echo "<center><font class=\"option\"><b>"._PREVIEWSTORY."</b></font></center><br><br>"
	."<form action=\"admin.php\" method=\"post\">"
	."<input type=\"hidden\" name=\"catid\" value=\"$catid\">";
    $subject = stripslashes($subject);
    $subject = ereg_replace("\"", "''", $subject);
    $hometext = stripslashes($hometext);
    $bodytext = stripslashes($bodytext);
    $result=$db->sql_query("select topicimage from ".$prefix."_topics where topicid='$topic'");
    list($topicimage) = $db->sql_fetchrow($result);
    echo "<table border=\"0\" width=\"75%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>"
	."<table border=\"0\" width=\"100%\" cellpadding=\"8\" cellspacing=\"1\" bgcolor=\"$bgcolor1\"><tr><td>"
	."";
    themepreview($subject, $hometext, $bodytext);
    echo "</td></tr></table></td></tr></table>"
	."<br><br><b>"._TITLE."</b><br>"
	."<input type=\"text\" name=\"subject\" size=\"50\" value=\"$subject\"><br><br>"
	."";
    $toplist = $db->sql_query("select topicid, topictext from ".$prefix."_topics order by topictext");
    echo "";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	    $topicid = intval($topicid);
	if ($topicid==$topic) {
	    $sel = "selected ";
	}
        echo "";
	$sel = "";
    }
    echo "";
    for ($i=0; $i<sizeof($assotop); $i++) {
	$associated .= "$assotop[$i]-";
    }
    $asso_t = explode("-", $associated);
    $sql = "SELECT topicid, topictext FROM ".$prefix."_topics ORDER BY topictext";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) {
        if ($a == 3) {
       $a = 0;
	}
	for ($i=0; $i<sizeof($asso_t); $i++) {
	    if ($asso_t[$i] == $row[topicid]) {
	        $checked = "CHECKED";
	        break;
	    }
	}
	$checked = "";
	$a++;
    }
    $cat = $catid;
    FCKSelectCategory($cat);
    echo "<br>";
    puthome($ihome, $acomm);
    if ($multilingual == 1) {
	echo "<br><b>"._LANGUAGE.": </b>"
	    ."<select name=\"alanguage\">";
	$handle=opendir('language');
	while ($file = readdir($handle)) {
	    if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
	        $langFound = $matches[1];
	        $languageslist .= "$langFound ";
	    }
	}
	closedir($handle);
	$languageslist = explode(" ", $languageslist);
	sort($languageslist);
	for ($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!="") {
		echo "<option value=\"$languageslist[$i]\" ";
		if($languageslist[$i]==$alanguage) echo "selected";
		echo ">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	if ($alanguage == "") {
	    $sellang = "selected";
	} else {
    	    $sellang = "";
	}
	echo "<option value=\"\" $sellang>"._ALL."</option></select>";
    } else {
	echo "<input type=\"hidden\" name=\"alanguage\" value=\"$language\">";
    }
    echo "<br><br><b>"._STORYTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(hometext) ;
$oFCKeditor->InstanceName = "hometext" ;
$oFCKeditor->Value = "$hometext" ;
$oFCKeditor->Create() ;
// Editor Ende 
  echo "<br>$copy<br><br><b>"._EXTENDEDTEXT."</b><br>";
// Editor Start
$oFCKeditor = new FCKeditor(bodytext) ;
$oFCKeditor->InstanceName = "bodytext" ;
$oFCKeditor->Value = "$bodytext" ;
$oFCKeditor->Create() ;
// Editor Ende 
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"hometext\">$hometext</textarea><br><br>"
#	."<b>"._EXTENDEDTEXT."</b><br>"
#	."<textarea wrap=\"virtual\" cols=\"50\" rows=\"12\" name=\"bodytext\">$bodytext</textarea><br><br>";
echo "<br>";
    if ($automated == 1) {
	$sel1 = "checked";
	$sel2 = "";
    } else {
	$sel1 = "";
	$sel2 = "checked";
    }
    $xday = 1;
    while ($xday <= 31) {
	if ($xday == $day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$xday++;
    }
    $xmonth = 1;
    while ($xmonth <= 12) {
	if ($xmonth == $month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$xmonth++;
    }
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $hour) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$xhour = $dummy;
	$xhour++;
    }
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $min) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	$xmin = $xmin + 5;
    }
    echo "<br>"
	."<select name=\"op\">"
	.""
	."<option value=\"FCKPostAdminStory\">"._POSTSTORY."</option>"
	."</select>"
	."<input type=\"submit\" value=\""._OK."\">";
    CloseTable();
    echo "<br>";
    putpoll($pollTitle, $optionText);
    echo "</form>";
    include ('footer.php');
}

function FCKpostAdminStory($automated, $year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop) {
    global $ultramode, $aid, $prefix, $db, $admin_file;
    for ($i=0; $i<sizeof($assotop); $i++) {
	$associated .= "$assotop[$i]-";
    }
    if ($automated == 1) {
	if ($day < 10) {
	    $day = "0$day";
	}
	if ($month < 10) {
	    $month = "0$month";
	}
	$sec = "00";
	$date = "$year-$month-$day $hour:$min:$sec";
	$notes = "";
	$author = $aid;
	$subject = stripslashes(FixQuotes($subject));
	$subject = ereg_replace("\"", "''", $subject);
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$result = $db->sql_query("insert into ".$prefix."_autonews values (NULL, '$catid', '$aid', '$subject', '$date', '$hometext', '$bodytext', '$topic', '$author', '$notes', '$ihome', '$alanguage', '$acomm', '$associated')");
	if (!$result) {
	    exit();
	}
	$result = $db->sql_query("update ".$prefix."_authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
	    ultramode();
	}
	Header("Location: admin.php?op=adminMain");
    } else {
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	if (($pollTitle != "") AND ($optionText[1] != "") AND ($optionText[2] != "")) {
	    $haspoll = 1;
	    $timeStamp = time();
	    $pollTitle = FixQuotes($pollTitle);
	    if(!$db->sql_query("INSERT INTO ".$prefix."_poll_desc VALUES (NULL, '$pollTitle', '$timeStamp', '0', '$alanguage', '0')")) {
		return;
	    }
	    $object = $db->sql_fetchrow($db->sql_query("SELECT pollID FROM ".$prefix."_poll_desc WHERE pollTitle='$pollTitle'"));
	    $id = $object['pollID'];
	    $id = intval($id);
	    for($i = 1; $i <= sizeof($optionText); $i++) {
		if($optionText[$i] != "") {
		    $optionText[$i] = FixQuotes($optionText[$i]);
		}
		if(!$db->sql_query("INSERT INTO ".$prefix."_poll_data (pollID, optionText, optionCount, voteID) VALUES ('$id', '$optionText[$i]', '0', '$i')")) {
		    return;
		}
	    }
	} else {
	    $haspoll = 0;
	    $id = 0;
	}
	$result = $db->sql_query("insert into ".$prefix."_stories values (NULL, '$catid', '$aid', '$subject', now(), '$hometext', '$bodytext', '0', '0', '$topic', '$aid', '$notes', '$ihome', '$alanguage', '$acomm', '$haspoll', '$id', '0', '0', '$associated')");
	$result = $db->sql_query("select sid from ".$prefix."_stories WHERE title='$subject' order by time DESC limit 0,1");
	list($artid) = $db->sql_fetchrow($result);
	$artid = intval($artid);
	$db->sql_query("UPDATE ".$prefix."_poll_desc SET artid='$artid' WHERE pollID='$id'");
	if (!$result) {
	    exit();
	}
	$result = $db->sql_query("update ".$prefix."_authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
	    ultramode();
	}
	Header("Location: admin.php?op=adminMain");
    }
}

function FCKsubmissions() {
    global $admin, $bgcolor1, $bgcolor2, $prefix, $db, $radminsuper, $anonymous, $multilingual, $admin_file;
    $dummy = 0;
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>"._SUBMISSIONSADMIN."</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
	$result = $db->sql_query("SELECT qid, uid, uname, subject, timestamp, alanguage FROM ".$prefix."_queue order by timestamp DESC");
	if($db->sql_numrows($result) == 0) {
	    echo "<table width=\"100%\"><tr><td bgcolor=\"$bgcolor1\" align=\"center\"><b>"._NOSUBMISSIONS."</b></td></tr></table>\n";
	} else {
	    echo "<center><font class=\"content\"><b>"._NEWSUBMISSIONS."</b></font><form action=\"admin.php\" method=\"post\"><table width=\"100%\" border=\"1\" bgcolor=\"$bgcolor2\"><tr><td><b>&nbsp;"._TITLE."&nbsp;</b></td>";
	    if ($multilingual == 1) {
		  echo "<td><b><center>&nbsp;"._LANGUAGE."&nbsp;</center></b></td>";
	    }
		echo "<td><b><center>&nbsp;"._AUTHOR."&nbsp;</center></b></td><td><b><center>&nbsp;"._DATE."&nbsp;</center></b></td><td><b><center>&nbsp;"._FUNCTIONS."&nbsp;</center></b></td></tr>\n";
	    while (list($qid, $uid, $uname, $subject, $timestamp, $alanguage) = $db->sql_fetchrow($result)) {
		$qid = intval($qid);
		$uid = intval($uid);
		/*
		$hour = "AM";
		ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $timestamp, $datetime);
		if ($datetime[4] > 12) { $datetime[4] = $datetime[4]-12; $hour = "PM"; }
		$datetime = date(""._DATESTRING."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
		*/
   	    echo "<td width=\"100%\"><font class=\"content\">\n";
		if ($subject == "") {
		    echo "&nbsp;<a href=\"admin.php?op=FCKDisplayStory&amp;qid=$qid\">"._NOSUBJECT."</a></font>\n";
		} else {
		    echo "&nbsp;<a href=\"admin.php?op=FCKDisplayStory&amp;qid=$qid\">$subject</a></font>\n";
		}
		if ($multilingual == 1) {
			if ($alanguage == "") {
		    		$alanguage = _ALL;
			}
			echo "</td><td align=\"center\"><font size=\"2\">&nbsp;$alanguage&nbsp;</font>\n";
		}
		if ($uname != $anonymous) {
			echo "</td><td align=\"center\" nowrap><font size=\"2\">&nbsp;<a href='modules.php?name=Your_Account&op=userinfo&username=$uname'>$uname</a>&nbsp;</font>\n";
		} else {
			echo "</td><td align=\"center\" nowrap><font size=\"2\">&nbsp;$uname&nbsp;</font>\n";
		}
		$timestamp = explode(" ", $timestamp);
		echo "</td><td align=\"right\" nowrap><font class=\"content\">&nbsp;$timestamp[0]&nbsp;</font></td><td align=\"center\"><font class=\"content\">&nbsp;<a href=\"admin.php?op=FCKDeleteStory&amp;qid=$qid\">"._DELETE."</a>&nbsp;</td></tr>\n";
		$dummy++;
	    }
	    if ($dummy < 1) {
		echo "<tr><td bgcolor=\"$bgcolor1\" align=\"center\"><b>"._NOSUBMISSIONS."</b></form></td></tr></table>\n";
	    } else {
		echo "</table></form>\n";
	    }
	}
    if ($radminsuper == 1) {
	echo "<br><center>"
	    ."[ <a href=\"admin.php?op=subdelete\">"._DELETE."</a> ]"
	    ."</center><br>";
    }
    CloseTable();
    include ("footer.php");
}

function FCKsubdelete() {
    global $prefix, $db, $admin_file;
    $db->sql_query("delete from ".$prefix."_queue");
    Header("Location: admin.php?op=adminMain");
}

switch($op) {

    case "FCKEditCategory":
    FCKEditCategory($catid);
    break;

    case "FCKsubdelete":
    FCKsubdelete();
    break;

    case "FCKDelCategory":
    FCKDelCategory($cat);
    break;

    case "FCKYesDelCategory":
    FCKYesDelCategory($catid);
    break;

    case "FCKNoMoveCategory":
    FCKNoMoveCategory($catid, $newcat);
    break;

    case "FCKSaveEditCategory":
    FCKSaveEditCategory($catid, $title);
    break;

    case "FCKSelectCategory":
    FCKSelectCategory($cat);
    break;

    case "FCKAddCategory":
    FCKAddCategory();
    break;

    case "FCKSaveCategory":
    FCKSaveCategory($title);
    break;

    case "FCKDisplayStory":
    FCKdisplayStory($qid);
    break;

    case "FCKPreviewAgain":
    FCKpreviewStory($automated, $year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop);
    break;

    case "FCKPostStory":
    FCKpostStory($automated, $year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop);
    break;

    case "FCKEditStory":
    FCKeditStory($sid);
    break;

    case "FCKRemoveStory":
    FCKremoveStory($sid, $ok);
    break;

    case "FCKChangeStory":
    FCKchangeStory($sid, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm, $assotop);
    break;

    case "FCKDeleteStory":
    FCKdeleteStory($qid);
    break;

    case "FCKadminStory":
    FCKadminStory($sid);
    break;

    case "FCKPreviewAdminStory":
    FCKpreviewAdminStory($automated, $year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop);
    break;

    case "FCKPostAdminStory":
    FCKpostAdminStory($automated, $year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome, $alanguage, $acomm, $pollTitle, $optionText, $assotop);
    break;

    case "FCKautoDelete":
    FCKautodelete($anid);
    break;

    case "FCKautoEdit":
    FCKautoEdit($anid);
    break;

    case "FCKautoSaveEdit":
    FCKautoSaveEdit($anid, $year, $day, $month, $hour, $min, $title, $hometext, $bodytext, $topic, $notes, $catid, $ihome, $alanguage, $acomm);
    break;

    case "FCKsubmissions":
    FCKsubmissions();
    break;

}

} else {
	include("header.php");
	GraphicAdmin();
	OpenTable();
	echo "<center><b>"._ERROR."</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
	CloseTable();
	include("footer.php");
}

?>
