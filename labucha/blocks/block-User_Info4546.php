<?php

/************************************************************/
/* Description.: User Info Block                            */
/* Version.....: v0.3.1                                     */
/* File Name...: block-User_Info.php                        */
/* Last Updated: 10 December 2003                           */
/*                                                          */
/* Update Release - 19 Jan 2004 - chatserv                  */
/* Website http://www.nukefixes.com                         */
/* 19/01/2004 - Added Points Needed For Group Membership    */
/* 19/01/2004 - Added Missing Language Definitions          */
/*                                                          */
/* Updated for PHP-Nuke 7.x - 10 Dec 2003 - chatserv        */
/* Website http://www.nukefixes.com                         */
/* 10/12/2003 - Added Point Total Display                   */
/* 10/12/2003 - Added Site Groups list w/ points needed     */
/*                                                          */
/* Updated for PHP-Nuke 6.x - 22/07/2003 - NukeZone         */
/* Website http://www.nukezone.com                          */
/* 22/07/2003 - Added Security Check Image                  */
/* 22/07/2003 - Added User logout Link                      */
/* 22/07/2003 - Added Admin Logout - Visible to Admin Only  */
/*                     ------------                         */
/* Updated for PHP-Nuke 5.6 -  18 Jun 2002 NukeScripts      */
/* website http://www.nukescripts.com                       */
/*                     ------------                         */
/* Updated for PHP-Nuke 5.5 - 24/03/2002 Rugeri             */
/* website http://newsportal.homip.net                      */
/*                     ------------                         */
/* (C) 2002                                                 */
/* All rights beyond the GPL are reserved                   */
/*                                                          */
/************************************************************/
/* Additional security checking code 2003 by chatserv       */
/* http://www.nukefixes.com -- http://www.nukeresources.com */
/************************************************************/

if (eregi("block-User_Info.php",$_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
}

$content = "";

global $user, $admin, $cookie, $prefix, $user_prefix, $db, $anonymous, $sitekey;
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
            $who_online_now .= "&nbsp;&nbsp;0$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n";
        } else {
            $who_online_now .= "&nbsp;&nbsp;$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n";
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
$grpcnt = "";
$i = 1;
$gresult = $db->sql_query("SELECT name, points FROM " . $prefix . "_groups ORDER BY points");
while ($grow = $db->sql_fetchrow($gresult)) {
$grname = $grow['name'];
$grpoints = intval($grow['points']);
$users_num = $db->sql_numrows($db->sql_query("SELECT * FROM " . $user_prefix . "_users WHERE points>='$grpoints'"));
        if ($i < 10) {
            $grpcnt .= "&nbsp;&nbsp;<b>0$i:&nbsp;<u>$grname</u></b><br>&nbsp;&nbsp;"._NPOINTS.": <b>$grpoints</b><br>&nbsp;&nbsp;"._SGMEMBERS.": <b>$users_num</b><br>\n";
        } else {
            $grpcnt .= "&nbsp;&nbsp;<b>$i:&nbsp;<u>$grname</u></b><br>&nbsp;&nbsp;"._SGMEMBERS.": <b>$users_num</b><br>\n";
        }
        $i++;
}
$numpoints = $db->sql_fetchrow($db->sql_query("SELECT points FROM ".$user_prefix."_users WHERE username='$uname'"));
$npoints = intval($numpoints['points']);
$content .= "<form action=\"modules.php?name=Your_Account\" method=\"post\">";

if (is_user($user)) {
    $content .= "<br><img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\"> "._BWEL.", <b>$uname</b>.<br>\n";

    $content .= "<center>[ <a href=\"modules.php?name=Your_Account&amp;op=logout\">"._LOGOUT."</a> ]</center>\n";
    if (is_admin($admin) AND is_user($user)) {
        $content .= "<br><center>"._ADMIN."<br>[ <a href=\"admin.php?op=logout\">"._LOGOUT."</a> ]</center>\n";
    }
    $content .= "<hr>\n";
    $row3 = $db->sql_fetchrow($db->sql_query("SELECT user_id FROM $user_prefix"._users." WHERE username='$uname'"));
    $uid = $row3['user_id'];
    $newpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));
    $oldpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'"));
    $content .= "<img src=\"images/blocks/email-y.gif\" height=\"10\" width=\"14\"> <a href=\"modules.php?name=Private_Messages\"><b>"._BPM."</b></a><br>\n";
    $content .= "<img src=\"images/blocks/email-r.gif\" height=\"10\" width=\"14\"> "._BUNREAD.": <b>$newpms</b><br>\n";
    $content .= "<img src=\"images/blocks/email-g.gif\" height=\"10\" width=\"14\"> "._BREAD.": <b>$oldpms</b><br>\n<hr>\n";
    $content .= "<img src=\"images/blocks/icon_poll.gif\" height=\"14\" width=\"17\"> <b><u>"._TPOINTS.":</u></b><br>&nbsp;&nbsp;<b><strong><big>&middot;</big></strong>&nbsp;".$npoints."&nbsp;<strong><big>&middot;</big></strong></b><hr>\n";
} else {
    $content .= "<center><img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\"> "._BWEL.", <b>$anonymous</b>\n<hr>";
    $content .= ""._NICKNAME."<br><input type=\"text\" name=\"username\" size=\"10\" maxlength=\"25\"><br>";
    $content .= ""._PASSWORD."<br><input type=\"password\" name=\"user_password\" size=\"10\" maxlength=\"20\"><br>";
    if (extension_loaded("gd")) {
	$content .= ""._SECURITYCODE.": <img src='modules.php?name=Your_Account&op=gfx&random_num=$random_num' border='1' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'><br>\n";
	$content .= ""._TYPESECCODE."<br><input type=\"text\" NAME=\"gfx_check\" SIZE=\"7\" MAXLENGTH=\"6\">\n";
	$content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><br>\n";
    } else {
	$content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
	$content .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
    }
    $content .= "<input type=\"hidden\" name=\"op\" value=\"login\">";

    $content .= "<input type=\"submit\" value=\""._LOGIN."\">\n (<a href=\"modules.php?name=Forums&file=profile&mode=register\">"._BREG."</a>)</center><hr>";
}
$content .= "<img src=\"images/blocks/icon_members.gif\" height=\"14\" width=\"17\"> <b><u>"._SITEGROUPS.":</u></b><br>$grpcnt<hr>\n";
$content .= "<img src=\"images/blocks/group-2.gif\" height=\"14\" width=\"17\"> <a href=\"modules.php?name=Members_List\"><b><u>"._BMEMP.":</u></b></a><br>\n";
$content .= "<img src=\"images/blocks/ur-moderator.gif\" height=\"14\" width=\"17\"> "._BLATEST.": <A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$lastuser\"><b>$lastuser</b></a><br>\n";
$content .= "<img src=\"images/blocks/ur-author.gif\" height=\"14\" width=\"17\"> "._BTD.": <b>$userCount</b><br>\n";
$content .= "<img src=\"images/blocks/ur-admin.gif\" height=\"14\" width=\"17\"> "._BYD.": <b>$userCount2</b><br>\n";
$content .= "<img src=\"images/blocks/ur-guest.gif\" height=\"14\" width=\"17\"> "._BOVER.": <b>$numrows</b><br>\n<hr>\n";
$content .= "<img src=\"images/blocks/group-3.gif\" height=\"14\" width=\"17\"> <b><u>"._BVISIT.":</u></b>\n<br>\n";
$content .= "<img src=\"images/blocks/ur-anony.gif\" height=\"14\" width=\"17\"> "._BVIS.": <b>$guest_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-member.gif\" height=\"14\" width=\"17\"> "._BMEM.": <b>$member_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-registered.gif\" height=\"14\" width=\"17\"> "._BTT.": <b>$who_online_num</b><br>\n";
if ($member_online_num > 0) {
    $content .= "<hr>\n<img src=\"images/blocks/group-1.gif\" height=\"14\" width=\"17\"> <b><u>"._BON.":</u></b><br>$who_online_now\n";
}
$content .= "</form>";

?>