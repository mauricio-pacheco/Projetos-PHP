<?php

/************************************************************/
/*                                                          */
/* Updated for PHP-Nuke 5.6 -  18 Jun 2002 NukeScripts      */
/* website http://www.nukescripts.com                       */
/*                                                          */
/* Updated for PHP-Nuke 5.5 - 24/03/2002 Rugeri             */
/* website http://newsportal.homip.net                      */
/*                                                          */
/* (C) 2002                                                 */
/* All rights beyond the GPL are reserved                   */
/*                                                          */
/* Please give a link back to my site somewhere in your own */
/*                                                          */
/************************************************************/
/* Additional security checking code 2003 by chatserv       */
/* http://www.nukefixes.com -- http://www.nukeresources.com */
/************************************************************/

if (stristr($_SERVER['SCRIPT_NAME'], "block-block-User_Info.php")) { 
    Header("Location: ../index.php");
}

$content = "";

global $user, $cookie, $prefix, $user_prefix, $db, $anonymous, $sitekey, $nukeurl, $startdate;
mt_srand ((double)microtime()*1000000);
$maxran = 1000000;
$random_num = mt_rand(0, $maxran);
$datekey = date("F j");
$rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
$code = substr($rcode, 2, 10);
cookiedecode($user);
$uname = $cookie[1];

$lasturow = $db->sql_fetchrow($db->sql_query("SELECT username FROM $user_prefix"._users." ORDER BY user_id DESC LIMIT 0,1"));
$lastuser = $lasturow['username'];
$numrows = $db->sql_numrows($db->sql_query("SELECT user_id FROM $user_prefix"._users.""));

$result = $db->sql_query("SELECT uname, guest FROM $prefix"._session." WHERE guest='0'");
$member_online_num = $db->sql_numrows($result);
$who_online_now = "";
$i = 1;
while ($session = $db->sql_fetchrow($result)) {
    if (isset($session["guest"]) and $session["guest"] == 0) {
        if ($i < 10) {
            $who_online_now .= "0$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n";
        } else {
            $who_online_now .= "$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n";
        }
        $who_online_now .= ($i != $member_online_num ? "  " : "");
        $i++;
    }
}
$Today = getdate();
//Formatting Current Date
$month = $Today['month'];
$mday = $Today['mday'];
$year = $Today['year'];
//Formatting Previous Date
$pmonth = $Today['month'];
$pmday = $Today['mday'];
$pmday = $mday-1;
$pyear = $Today['year'];
//Month conversion into numeric mode
if ($pmonth=="January") { $pmonth=1; } else
if ($pmonth=="February") { $pmonth=2; } else
if ($pmonth=="March") { $pmonth=3; } else
if ($pmonth=="April") { $pmonth=4; } else
if ($pmonth=="May") { $pmonth=5; } else
if ($pmonth=="June") { $pmonth=6; } else
if ($pmonth=="July") { $pmonth=7; } else
if ($pmonth=="August") { $pmonth=8; } else
if ($pmonth=="September") { $pmonth=9; } else
if ($pmonth=="October") { $pmonth=10; } else
if ($pmonth=="November") { $pmonth=11; } else
if ($pmonth=="December") { $pmonth=12; };
$test = mktime (0,0,0,$pmonth,$pmday,$pyear,1);

//Creating SQL parameter
$curDate2 = "%".$month[0].$month[1].$month[2]."%".$mday."%".$year."%";
$preday = strftime ("%d",$test);
$premonth = strftime ("%B",$test);
$preyear = strftime ("%Y",$test);
$curDateP = "%".$premonth[0].$premonth[1].$premonth[2]."%".$preday."%".$preyear."%";

//Executing SQL Today
$row = $db->sql_fetchrow($db->sql_query("SELECT COUNT(user_id) AS userCount FROM $user_prefix"._users." WHERE user_regdate LIKE '$curDate2'"));
$userCount = $row['userCount'];
//end

//Executing SQL Today
$row2 = $db->sql_fetchrow($db->sql_query("SELECT COUNT(user_id) AS userCount FROM $user_prefix"._users." WHERE user_regdate LIKE '$curDateP'"));
$userCount2 = $row2['userCount'];
//end

$guest_online_num = $db->sql_numrows($db->sql_query("SELECT uname FROM ".$prefix."_session WHERE guest='1'"));
$member_online_num = $db->sql_numrows($db->sql_query("SELECT uname FROM ".$prefix."_session WHERE guest='0'"));

$who_online_num = $guest_online_num + $member_online_num;
$row = $db->sql_fetchrow($db->sql_query("SELECT count FROM ".$prefix."_counter WHERE type='total' AND var='hits'"));
$content = "<div align=\"center\"><img src=\"images/blocks/server.gif\"><iframe align=\"center\" src=\"relogio.htm\" width=\"50\" height=\"12\" frameborder=\"0\" scrolling=\"no\"></iframe></div><br><div align=\"center\"><font class=\"tiny\">Nº de visitas:<br><br><b><img src=\"images/blocks/direita.gif\">&nbsp<a href=\"modules.php?name=Statistics\">$row[0]</a>&nbsp<img src=\"images/blocks/esquerda.gif\"><br>"._PAGESVIEWS."</b></center></font></div><br>";
$content .= "<form action=\"modules.php?name=Your_Account\" method=\"post\">";

if (is_user($user)) {
    $content .= "<div align=\"center\"><img src=\"images/blocks/333.gif\" height=\"32\" width=\"32\"><br> "._BWEL."<br><br> <b>- <font color=\"#05A1FB\"> $uname </font>-</b></div><hr>";
    $row3 = $db->sql_fetchrow($db->sql_query("SELECT user_id FROM $user_prefix"._users." WHERE username='$uname'"));
    $uid = intval($row3[user_id]);
    $newpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));
    $oldpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'"));
    $content .= "<img src=\"images/blocks/email-y.gif\" height=\"10\" width=\"14\"> <a href=\"modules.php?name=Private_Messages\"><b>"._BPM."</b></a><br>\n";
    $content .= "<img src=\"images/blocks/email-r.gif\" height=\"10\" width=\"14\"> "._BUNREAD.": <b>$newpms</b><br>\n";
    $content .= "<img src=\"images/blocks/email-g.gif\" height=\"10\" width=\"14\"> "._BREAD.": <b>$oldpms</b><br>\n<hr><div align=\"center\"><a href=\"modules.php?name=Your_Account&op=logout\"><img src=\"images/blocks/x.jpg\" border=\"0\" height=\"16\" width=\"49\"></a></div>";
} else 
{
    $content .= "<div align=\"center\"><img src=\"images/blocks/group-4.gif\" height=\"32\" width=\"32\"><br> "._BWEL."<br><br> <b>- <font color=\"#04EF30\">$anonymous</font> -</b></div><br><br>";
    $content .= ""._NICKNAME." <input type=\"text\" name=\"username\" size=\"13\" maxlength=\"25\"><br>";
    $content .= ""._PASSWORD." <img src=\"images/blocks/espaco.gif\" height=\"1\" width=\"8\"><input type=\"password\" name=\"user_password\" size=\"13\" maxlength=\"20\"><br>";
    $content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
    $content .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
    $content .= "<input type=\"hidden\" name=\"op\" value=\"login\">";
    $content .= "<input type=\"submit\" value=\""._LOGIN."\">\n &nbsp;( <a href=\"modules.php?name=Your_Account&amp;op=new_user\">"._BREG."</a> )<br>";
}
$content .= "<br><br><div align=\"center\"><img src=\"images/blocks/group-3.gif\" height=\"32\" width=\"55\"><br> <b><u>"._BMEMP.":</u></b></div>";
$content .= "<img src=\"images/blocks/ur-moderator.gif\" height=\"19\" width=\"10\"> "._BLATEST.": <A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$lastuser\"><b>$lastuser</b></a><br>\n";
$content .= "<img src=\"images/blocks/ur-author.gif\" height=\"19\" width=\"10\"> "._BTD.": <b>$userCount</b><br>\n";
$content .= "<img src=\"images/blocks/ur-admin.gif\" height=\"19\" width=\"10\"> "._BYD.": <b>$userCount2</b><br>\n";
$content .= "<img src=\"images/blocks/ur-guest.gif\" height=\"19\" width=\"10\"> "._BOVER.": <b>$numrows</b><br>\n";
$content .= "<br><br><div align=\"center\"><img src=\"images/blocks/group-2.gif\" height=\"24\" width=\"57\"><br> <b><u>"._BVISIT.":</u></b></div>";
$content .= "<img src=\"images/blocks/ur-anony.gif\" height=\"19\" width=\"10\"> "._BVIS.": <b>$guest_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-member.gif\" height=\"19\" width=\"10\"> "._BMEM.": <b>$member_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-registered.gif\" height=\"19\" width=\"10\"> "._BTT.": <b>$who_online_num</b><br>\n";
    $content .= "<br><br>\n<img src=\"images/blocks/group-1.gif\" height=\"16\" width=\"16\"> <b><u>"._BON.":</u></b><br>$who_online_now";
$content .= "</form>";

if (stristr($_SERVER['SCRIPT_NAME'], "block-Total_Hits.php")) { 
    Header("Location: ../index.php");
    die();
}

?>