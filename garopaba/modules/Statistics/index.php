<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:29:52 $
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Enhanced with NukeStats Module Version 1.0                           */
/* ==========================================                           */
/* Copyright �2002 by Harry Mangindaan (sens@indosat.net) and           */
/*                    Sudirman (sudirman@akademika.net)                 */
/* http://www.nuketest.com                                              */
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
$module_name = basename(dirname(__FILE__));
get_lang($module_name);
$pagetitle = "- "._STATS."";
if (isset($year)) {
    $year = intval($year);
}
$ThemeSel = get_theme();

$now = date("d-m-Y");
$dot = explode ("-",$now);
$nowdate = $dot[0];
$nowmonth = $dot[1];
$nowyear = $dot[2];

function Stats_Main() {
    global $prefix, $db, $startdate, $sitename, $ThemeSel, $user_prefix, $Version_Num, $module_name, $textcolor2;
    include("header.php");
    $result = $db->sql_query("SELECT type, var, count from ".$prefix."_counter order by type desc");
    while ($row = $db->sql_fetchrow($result)) {
		$type = stripslashes(check_html($row['type'], "nohtml"));
		$var = stripslashes(check_html($row['var'], "nohtml"));
		$count = intval($row['count']);
		if(($type == "total") && ($var == "hits")) {
			$total = $count;
		} elseif($type == "browser") {
			if($var == "Netscape") {
				$netscape[] = $count;
				$netscape[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "MSIE") {
				$msie[] = $count;
				$msie[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Konqueror") {
				$konqueror[] = $count;
				$konqueror[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Opera") {
				$opera[] = $count;
				$opera[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Lynx") {
				$lynx[] = $count;
				$lynx[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Bot") {
				$bot[] = $count;
				$bot[] =  substr(100 * $count / $total, 0, 5);
			} elseif(($type == "browser") && ($var == "Other")) {
				$b_other[] = $count;
				$b_other[] =  substr(100 * $count / $total, 0, 5);
			}
		} elseif($type == "os") {
			if($var == "Windows") {
				$windows[] = $count;
				$windows[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Mac") {
				$mac[] = $count;
				$mac[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "Linux") {
				$linux[] = $count;
				$linux[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "FreeBSD") {
				$freebsd[] = $count;
				$freebsd[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "SunOS") {
				$sunos[] = $count;
				$sunos[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "IRIX") {
				$irix[] = $count;
				$irix[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "BeOS") {
				$beos[] = $count;
				$beos[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "OS/2") {
				$os2[] = $count;
				$os2[] =  substr(100 * $count / $total, 0, 5);
			} elseif($var == "AIX") {
				$aix[] = $count;
				$aix[] =  substr(100 * $count / $total, 0, 5);
			} elseif(($type == "os") && ($var == "Other")) {
				$os_other[] = $count;
				$os_other[] =  substr(100 * $count / $total, 0, 5);
			}
		}
    }
    title(""._STATS."");
    OpenTable();
    OpenTable();
    echo "<center>"._WERECEIVED." <b><img src=\"online2.gif\" width=\"16\" height=\"16\">&nbsp;<font color=\"#FF0000\" size=\"4\" face=\"Verdana, Arial, Helvetica, sans-serif\">$total</font>&nbsp;<img src=\"online2.gif\" width=\"16\" height=\"16\"></b> "._PAGESVIEWS." $startdate<br><br>"
	."[ <a href=\"modules.php?name=$module_name&op=Stats\">"._VIEWDETAILED."</a> ]</center>";
    CloseTable();
    echo "<br><br>";
    $l_size = getimagesize("themes/$ThemeSel/images/leftbar.gif");
    $m_size = getimagesize("themes/$ThemeSel/images/mainbar.gif");
    $r_size = getimagesize("themes/$ThemeSel/images/rightbar.gif");
    $unum = $db->sql_numrows($db->sql_query("select user_id from ".$user_prefix."_users where user_id>1"));
    $anum = $db->sql_numrows($db->sql_query("select * from ".$prefix."_authors"));
    $snum = $db->sql_numrows($db->sql_query("select sid from ".$prefix."_stories"));
    $cnum = $db->sql_numrows($db->sql_query("select tid from ".$prefix."_comments"));
    $subnum = $db->sql_numrows($db->sql_query("select * from ".$prefix."_queue"));
    if (is_active("Topics")) {
	$tnum = $db->sql_numrows($db->sql_query("select * from ".$prefix."_topics"));
    }
    if (is_active("Web_Links")) {
	$links = $db->sql_numrows($db->sql_query("select * from ".$prefix."_links_links"));
	$cat = $db->sql_numrows($db->sql_query("select * from ".$prefix."_links_categories"));
    }
    OpenTable2();
    echo "<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\" align=\"center\"><tr><td colspan=\"2\">\n";
    echo "<center><font color=\"#000000\"><b>"._MISCSTATS."</b></font></center><br></td></tr>\n";
    echo "<tr><td><img src=\"modules/$module_name/images/users.gif\" border=\"0\" alt=\"\">&nbsp;Usu�rios Cadastrados</td><td><b>$unum</b></td></tr>\n";
    echo "<tr><td><img src=\"modules/$module_name/images/authors.gif\" border=\"0\" alt=\"\">&nbsp;"._ACTIVEAUTHORS."</td><td><b>$anum</b></td></tr>\n";
    echo "<tr><td><img src=\"modules/$module_name/images/news.gif\" border=\"0\" alt=\"\">&nbsp;"._STORIESPUBLISHED."</td><td><b>$snum</b></td></tr>\n";
    if (is_active("Topics")) {
	echo "<tr><td><img src=\"modules/$module_name/images/topics.gif\" border=\"0\" alt=\"\">&nbsp;"._SACTIVETOPICS."</td><td><b>$tnum</b></td></tr>\n";
    }
    echo "<tr><td><img src=\"modules/$module_name/images/comments.gif\" border=\"0\" alt=\"\">&nbsp;"._COMMENTSPOSTED."</td><td><b>$cnum</b></td></tr>\n";
    if (is_active("Web_Links")) {
	echo "<tr><td><img src=\"modules/$module_name/images/topics.gif\" border=\"0\" alt=\"\">&nbsp;"._LINKSINLINKS."</td><td><b>$links</b></td></tr>\n";
	echo "<tr><td><img src=\"modules/$module_name/images/sections.gif\" border=\"0\" alt=\"\">&nbsp;"._LINKSCAT."</td><td><b>$cat</b></td></tr>\n";
    }
    echo "<tr><td><img src=\"modules/$module_name/images/waiting.gif\" border=\"0\" alt=\"\">&nbsp;"._NEWSWAITING."</td><td><b>$subnum</b></td></tr>\n";

    echo "</table>\n";
    CloseTable2();
    CloseTable();
    include("footer.php");
}

function Stats($total) {
    global $hlpfile,$nowyear,$nowmonth,$nowdate,$nowhour, $sitename, $startdate, $prefix, $db, $now, $module_name;
    $row = $db->sql_query("SELECT count from ".$prefix."_counter order by type desc");
    list($total) = $db->sql_fetchrow($row);
    include ("header.php");
    title("$sitename "._STATS."");
    $total++;
    OpenTable();
    OpenTable();
    echo "<center><font class=\"option\"><b>$sitename "._STATS."</b></font><br><br>"._WERECEIVED." <img src=\"online2.gif\" width=\"16\" height=\"16\">&nbsp;<font color=\"#FF0000\" size=\"4\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>$total</font></b>&nbsp;<img src=\"online2.gif\" width=\"16\" height=\"16\"> "._PAGESVIEWS." $startdate<br>"._TODAYIS.": $now[0]/$now[1]/$now[2]<br><br>";
    $row2 = $db->sql_fetchrow($db->sql_query("SELECT year, month, hits from ".$prefix."_stats_month order by hits DESC limit 0,1"));
	$year = intval($row2['year']);
	$month = intval($row2['month']);
	$hits = intval($row2['hits']);
    if ($month == 1) {$month = _JANUARY;} elseif ($month == 2) {$month = _FEBRUARY;} elseif ($month == 3) {$month = _MARCH;} elseif ($month == 4) {$month = _APRIL;} elseif ($month == 5) {$month = _MAY;} elseif ($month == 6) {$month = _JUNE;} elseif ($month == 7) {$month = _JULY;} elseif ($month == 8) {$month = _AUGUST;} elseif ($month == 9) {$month = _SEPTEMBER;} elseif ($month == 10) {$month = _OCTOBER;} elseif ($month == 11) {$month = _NOVEMBER;} elseif ($month == 12) {$month = _DECEMBER;}
    echo ""._MOSTMONTH.": $month $year ($hits "._HITS.")<br>";
    $row3 = $db->sql_fetchrow($db->sql_query("SELECT year, month, date, hits from ".$prefix."_stats_date order by hits DESC limit 0,1"));
    $year = intval($row3['year']);
    $month = intval($row3['month']);
    $date = intval($row3['date']);
	$hits = intval($row3['hits']);
    if ($month == 1) {$month = _JANUARY;} elseif ($month == 2) {$month = _FEBRUARY;} elseif ($month == 3) {$month = _MARCH;} elseif ($month == 4) {$month = _APRIL;} elseif ($month == 5) {$month = _MAY;} elseif ($month == 6) {$month = _JUNE;} elseif ($month == 7) {$month = _JULY;} elseif ($month == 8) {$month = _AUGUST;} elseif ($month == 9) {$month = _SEPTEMBER;} elseif ($month == 10) {$month = _OCTOBER;} elseif ($month == 11) {$month = _NOVEMBER;} elseif ($month == 12) {$month = _DECEMBER;}
    echo ""._MOSTDAY.": $date $month $year ($hits "._HITS.")<br>";
    $row4 = $db->sql_fetchrow($db->sql_query("SELECT year, month, date, hour, hits from ".$prefix."_stats_hour order by hits DESC limit 0,1"));
    $year = intval($row4['year']);
    $month = intval($row4['month']);
    $date = intval($row4['date']);
    $hour = intval($row4['hour']);
	$hits = intval($row4['hits']);
    if ($month == 1) {$month = _JANUARY;} elseif ($month == 2) {$month = _FEBRUARY;} elseif ($month == 3) {$month = _MARCH;} elseif ($month == 4) {$month = _APRIL;} elseif ($month == 5) {$month = _MAY;} elseif ($month == 6) {$month = _JUNE;} elseif ($month == 7) {$month = _JULY;} elseif ($month == 8) {$month = _AUGUST;} elseif ($month == 9) {$month = _SEPTEMBER;} elseif ($month == 10) {$month = _OCTOBER;} elseif ($month == 11) {$month = _NOVEMBER;} elseif ($month == 12) {$month = _DECEMBER;}
    if ($hour < 10) {
	$hour = "0$hour:00 - 0$hour:59";
    } else {
	$hour = "$hour:00 - $hour:59";
    }
    echo ""._MOSTHOUR.": $hour "._ON." $month $date, $year ($hits "._HITS.")<br><br>"
	."[ <a href=\"modules.php?name=$module_name\">"._RETURNBASICSTATS."</a> ]</center>";

    CloseTable();
    echo "<br><br>";
    showYearStats($nowyear);
    echo "<BR><BR>";
    showMonthStats($nowyear,$nowmonth);
    echo "<BR><BR>";
    showDailyStats($nowyear,$nowmonth,$nowdate);
    echo "<BR><BR>";
    showHourlyStats($nowyear,$nowmonth,$nowdate);
    echo "<br><br><center>"._GOBACK."</center><br><br>";
    CloseTable();
    include ("footer.php");
}

function YearlyStats($year){
    global $hlpfile,$nowyear,$nowmonth,$nowdate, $sitename, $module_name;
    include ("header.php");
    title("$sitename "._STATS."");
    opentable();
	$year = intval($year);
	$nowmonth = intval($nowmonth);

    showMonthStats($year,$nowmonth);
    echo "<BR>";
    echo "<center>[ <a href=\"modules.php?name=$module_name\">"._BACKTOMAIN."</a> | <a href=\"modules.php?name=$module_name&amp;op=Stats\">"._BACKTODETSTATS."</a> ]</center>";
    closetable();
    include ("footer.php");
}

function MonthlyStats($year,$month){
    global $sitename, $module_name, $nowdate;
    include ("header.php");
    title("$sitename "._STATS."");	
    opentable();
	$year = intval($year);
	$month = intval($month);
	$nowdate = intval($nowdate);
    showDailyStats($year,$month,$nowdate);
    echo "<BR>";
    echo "<center>[ <a href=\"modules.php?name=$module_name\">"._BACKTOMAIN."</a> | <a href=\"modules.php?name=$module_name&amp;op=Stats\">"._BACKTODETSTATS."</a> ]</center>";
    closetable();
    include ("footer.php");
}

function DailyStats($year,$month,$date){
    global $sitename, $module_name;
    include ("header.php");
    title("$sitename "._STATS."");
    opentable();
    $year = intval($year);
    $month = intval($month);
    $date = intval($date);
    showHourlyStats($year,$month,$date);
    echo "<BR>";
    echo "<center>[ <a href=\"modules.php?name=$module_name\">"._BACKTOMAIN."</a> | <a href=\"modules.php?name=$module_name&amp;op=Stats\">"._BACKTODETSTATS."</a> ]</center>";
    closetable();
    include ("footer.php");
}


function showYearStats($nowyear){
    global $db,$prefix,$bgcolor1,$bgcolor2, $ThemeSel, $module_name;
    $l_size = getimagesize("themes/$ThemeSel/images/leftbar.gif");
    $m_size = getimagesize("themes/$ThemeSel/images/mainbar.gif");
    $r_size = getimagesize("themes/$ThemeSel/images/rightbar.gif");
    $resulttotal = $db->sql_query("SELECT sum(hits) as TotalHitsYear from ".$prefix."_stats_year");
    list($TotalHitsYear) = $db->sql_fetchrow($resulttotal);
    $db->sql_freeresult($resulttotal);
    $result = $db->sql_query("select year,hits from ".$prefix."_stats_year order by year");
    echo "<center><b>"._YEARLYSTATS."</b></center><br>";
    echo "<table align=\"center\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\">";
    echo "<tr><td width=\"25%\" bgcolor=\"$bgcolor2\">"._YEAR."</td><td bgcolor=\"$bgcolor2\">"._SPAGESVIEWS."</td></tr>";
    while($row = $db->sql_fetchrow($result)) {
	$year = intval($row['year']);
	$hits = intval($row['hits']);
	echo "<tr bgcolor=\"$bgcolor1\"><td>";
	if ($year != $nowyear) {
	    echo "<a href=\"modules.php?name=$module_name&amp;op=YearlyStats&amp;year=$year\">$year</a>";
	} else {
	    echo "$year";
	}
	echo "</td><td>";
	$WidthIMG = round(100 * $hits/$TotalHitsYear,0);
	echo "<img src=\"themes/$ThemeSel/images/leftbar.gif\" Alt=\"\" width=\"$l_size[0]\" height=\"$l_size[1]\"><img src=\"themes/$ThemeSel/images/mainbar.gif\" height=\"$m_size[1]\" width=",$WidthIMG * 2," Alt=\"\">"
	    ."<img src=\"themes/$ThemeSel/images/rightbar.gif\" Alt=\"\" width=\"$r_size[0]\" height=\"$r_size[1]\"> ($hits)</td></tr>";
    }
    $db->sql_freeresult($result);
    echo "</table>";
}

function showMonthStats($nowyear,$nowmonth){
    global $prefix,$bgcolor1,$bgcolor2,$db, $ThemeSel, $module_name;
    $l_size = getimagesize("themes/$ThemeSel/images/leftbar.gif");
    $m_size = getimagesize("themes/$ThemeSel/images/mainbar.gif");
    $r_size = getimagesize("themes/$ThemeSel/images/rightbar.gif");
    $resultmonth = $db->sql_query("SELECT sum(hits) as TotalHitsMonth from ".$prefix."_stats_month where year='$nowyear'");
    list($TotalHitsMonth) = $db->sql_fetchrow($resultmonth);
    $db->sql_freeresult($resultmonth);
    $result = $db->sql_query("select month,hits from ".$prefix."_stats_month where year='$nowyear'");
    echo "<center><b>"._MONTLYSTATS." $nowyear</b></center><br>";
    echo "<table align=\"center\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\">";
    echo "<tr><td width=\"25%\" bgcolor=\"$bgcolor2\">"._UMONTH."</td><td bgcolor=\"$bgcolor2\">"._SPAGESVIEWS."</td></tr>";
    while($row = $db->sql_fetchrow($result)) {
	$month = intval($row['month']);
	$hits = intval($row['hits']);
	echo "<tr bgcolor=\"$bgcolor1\"><td>";
	if ($month != $nowmonth) {
	    echo "<a href=\"modules.php?name=$module_name&amp;op=MonthlyStats&amp;year=$nowyear&amp;month=$month\" class=\"hover_orange\">";
	    getmonth($month);
	    echo "</a>";
	} else {
	    getmonth($month);
	}
	echo "</td><td>";
	$WidthIMG = round(100 * $hits/$TotalHitsMonth,0);
	echo "<img src=\"themes/$ThemeSel/images/leftbar.gif\" Alt=\"\" width=\"$l_size[0]\" height=\"$l_size[1]\"><img src=\"themes/$ThemeSel/images/mainbar.gif\" height=\"$m_size[1]\" width=",$WidthIMG * 2," Alt=\"\">";
	echo "<img src=\"themes/$ThemeSel/images/rightbar.gif\" Alt=\"\" width=\"$r_size[0]\" height=\"$r_size[1]\"> ($hits)</td></tr>";
	echo "</td></tr>";
    }
    $db->sql_freeresult($result);
    echo "</table>";
}

function showDailyStats($year,$month,$nowdate){
    global $prefix,$bgcolor1,$bgcolor2,$db, $ThemeSel, $module_name;
    $l_size = getimagesize("themes/$ThemeSel/images/leftbar.gif");
    $m_size = getimagesize("themes/$ThemeSel/images/mainbar.gif");
    $r_size = getimagesize("themes/$ThemeSel/images/rightbar.gif");
    $resulttotal = $db->sql_query("SELECT sum(hits) as TotalHitsDate from ".$prefix."_stats_date where year='$year' and month='$month'");
    list($TotalHitsDate) = $db->sql_fetchrow($resulttotal);
    $db->sql_freeresult($resulttotal);
    $result = $db->sql_query("select year,month,date,hits from ".$prefix."_stats_date where year='$year' and month='$month' order by date");
    $total = $db->sql_numrows($result);
    echo "<center><b>"._DAILYSTATS." ";
    getmonth($month);
    echo ", $year</b></center><br>";
    echo "<table align=\"center\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\">";
    echo "<tr><td width=\"25%\" bgcolor=\"$bgcolor2\">"._DATE."</td><td bgcolor=\"$bgcolor2\">"._SPAGESVIEWS."</td></tr>";
    while($row = $db->sql_fetchrow($result)) {
	$year = intval($row['year']);
	$month = intval($row['month']);
	$date = intval($row['date']);
	$hits = intval($row['hits']);
	echo "<tr bgcolor=\"$bgcolor1\"><td>";
	if ($date != $nowdate) {
	    echo "<a href=\"modules.php?name=$module_name&amp;op=DailyStats&amp;year=$year&amp;month=$month&amp;date=$date\" class=\"hover_orange\">";
	    echo $date;
	    echo "</a>";
	} else {
	    echo $date;
	}
	echo "</td><td>";
	if ($hits == 0) {
	    $WidthIMG = 0;
	    $d_percent = 0;
	} else {
	    $WidthIMG = round(100 * $hits/$TotalHitsDate,0);
	    $d_percent = substr(100 * $hits / $TotalHitsDate, 0, 5);
	}
	echo "<img src=\"themes/$ThemeSel/images/leftbar.gif\" Alt=\"\" width=\"$l_size[0]\" height=\"$l_size[1]\"><img src=\"themes/$ThemeSel/images/mainbar.gif\" height=\"$m_size[1]\" width=",$WidthIMG * 2," Alt=\"\">"
	    ."<img src=\"themes/$ThemeSel/images/rightbar.gif\" Alt=\"\" width=\"$r_size[0]\" height=\"$r_size[1]\"> $d_percent% ($hits)</td></tr>"
	    ."</td></tr>";
    }
    $db->sql_freeresult($result);
    echo "</table>";
}

function showHourlyStats($year,$month,$date){
    global $prefix,$bgcolor1,$bgcolor2,$db, $ThemeSel;
    $l_size = getimagesize("themes/$ThemeSel/images/leftbar.gif");
    $m_size = getimagesize("themes/$ThemeSel/images/mainbar.gif");
    $r_size = getimagesize("themes/$ThemeSel/images/rightbar.gif");
    $resulttotal = $db->sql_query("SELECT sum(hits) as TotalHitsHour from ".$prefix."_stats_hour where year='$year' and month='$month' and date='$date'");
    list($TotalHitsHour) = $db->sql_fetchrow($resulttotal);
    $db->sql_freeresult($resulttotal);
    $nowdate = date("d-m-Y");
    $nowdate_arr = explode("-",$nowdate);
    echo "<center><b>"._HOURLYSTATS." ";
    echo getmonth($month)." ".$date.", " .$year."</b></center><br>";
    echo "<table align=\"center\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\">";
    echo "<tr><td width=\"25%\" bgcolor=\"$bgcolor2\">"._HOUR."</td><td bgcolor=\"$bgcolor2\" width=\"70%\">"._SPAGESVIEWS."</td></tr>";
    for ($k = 0;$k<=23;$k++) {
	$result = $db->sql_query("select hour,hits from ".$prefix."_stats_hour where year='$year' and month='$month' and date='$date' and hour='$k'");
	if ($db->sql_numrows($result) == 0){
	    $hits=0;
	} else {
	    $row = $db->sql_fetchrow($result);
	    $hour = intval($row['hour']);
	    $hits = intval($row['hits']);
	}
	echo "<tr><td bgcolor=\"$bgcolor1\">";
	if ($k < 10) {
	    $a = "0$k";
	} else {
	    $a = $k;
	}
	echo "$a:00 - $a:59";
	$a = "";
	echo "</td><td bgcolor=\"$bgcolor1\">";
	if ($hits == 0) {
	    $WidthIMG = 0;
	    $d_percent = 0;
	} else {
	    $WidthIMG = round(100 * $hits/$TotalHitsHour,0);
	    $d_percent = substr(100 * $hits / $TotalHitsHour, 0, 5);
	}
	echo "<img src=\"themes/$ThemeSel/images/leftbar.gif\" Alt=\"\" width=\"$l_size[0]\" height=\"$l_size[1]\"><img src=\"themes/$ThemeSel/images/mainbar.gif\" height=\"$m_size[1]\" width=",$WidthIMG * 2," Alt=\"\">"
	    ."<img src=\"themes/$ThemeSel/images/rightbar.gif\" Alt=\"\" width=\"$r_size[0]\" height=\"$r_size[1]\"> $d_percent% ($hits)</td></tr>"
	    ."</td></tr>";
    }
    $db->sql_freeresult($result);
    echo "</table>";
}

function getmonth($month){
    if ($month == 1) echo ""._JANUARY."";
    if ($month == 2) echo ""._FEBRUARY."";
    if ($month == 3) echo ""._MARCH."";
    if ($month == 4) echo ""._APRIL."";
    if ($month == 5) echo ""._MAY."";
    if ($month == 6) echo ""._JUNE."";
    if ($month == 7) echo ""._JULY."";
    if ($month == 8) echo ""._AUGUST."";
    if ($month == 9) echo ""._SEPTEMBER."";
    if ($month == 10) echo ""._OCTOBER."";
    if ($month == 11) echo ""._NOVEMBER."";
    if ($month == 12) echo ""._DECEMBER."";
}

switch($op) {

    default:
    Stats_Main();
    break;
    
    case "Stats":
    Stats($total);
    break;
	
    case "YearlyStats":
    YearlyStats($year);
    break;
	
    case "MonthlyStats":
    MonthlyStats($year,$month);
    break;
	
    case "DailyStats":
    DailyStats($year,$month,$date);
    break;

}
# $Log: index.php,v $
# Revision 1.2  2004/12/08 00:29:52  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.1  2004/10/05 18:05:26  chatserv
# Initial CVS Addition
#

?>