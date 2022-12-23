<?php 
// Block updated by gtroll 03 DEC 2003 USE WITH PHPNUKE6.5+ ONLY------------ //
// it may be possible to edit commented queries to work with---------------- // 
// phpnuke5.5-6.0 but has not been tested----------------------------------- //
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2 RC5                                          //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>                //
// http://www.chezgreg.net/coppermine/                                       //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                   //
// http://coppermine.findhere.org/                                           //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/                //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify      //
// it under the terms of the GNU General Public License as published by      //
// the Free Software Foundation; either version 2 of the License, or         //
// (at your option) any later version.                                       //
// ------------------------------------------------------------------------- //
// Updated for PHP-Nuke 5.6 -  18 Jun 2002 NukeScripts      //
// website http://www.nukescripts.com                       //
//                                                          //
// Updated for PHP-Nuke 5.5 - 24/03/2002 Rugeri             //
// website http://newsportal.homip.net                      //
//                                                          //

if (eregi("block-CPG-User_Info.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cpg_dir, $cpg_prefix, $field_user_name, $field_user_id, $field_session_uname;
global $user, $cookie, $user_prefix, $anonymous, $sitekey, $admin;
global $ALBUM_SET;

$cpg_dir = "coppermine";

$cpg_block = true;
require("modules/" . $cpg_dir . "/include/load.inc.php");
$cpg_block = false;
$content = "";
mt_srand ((double)microtime() * 1000000);
$maxran = 1000000;
$random_num = mt_rand(0, $maxran);
$datekey = date("F j");
$rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
$code = substr($rcode, 2, 10);
cookiedecode($user);
$uname = $cookie[1];
$sql = "SELECT username FROM " . $CONFIG['TABLE_USERS'] . " ORDER BY user_id DESC LIMIT 0,1";
// $sql = "SELECT ".$field_user_name." FROM " . $CONFIG['TABLE_USERS'] . " ORDER BY ".$field_user_id." DESC LIMIT 0,1";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$lastuser = $row["username"];
$numrows = $db->sql_numrows($db->sql_query("SELECT user_id FROM $user_prefix" . _users . ""));
// $lastuser = $row[$field_user_name];
// $numrows = $db->sql_numrows($db->sql_query("SELECT ".$field_user_id." FROM " . $CONFIG['TABLE_USERS'] . ""));
$sql = "SELECT uname, guest FROM $prefix" . _session . " WHERE guest=0";
// $sql = "SELECT $field_session_uname, guest FROM $prefix" . _session . " WHERE guest=0";
$result = $db->sql_query($sql);
$member_online_num = $db->sql_numrows($result);
$who_online_now = "";
$i = 1;
while ($session = $db->sql_fetchrow($result)) {
    if (isset($session["guest"]) and $session["guest"] == 0) {
        if ($i < 10) {
            // $who_online_now .= "0$i:&nbsp;<A HREF=\"{$module_link}Your_Account&amp;op=userinfo&amp;$field_user_name=$session[$field_session_uname]\">$session[$field_session_uname]</a><br>\n";
            $who_online_now .= "0$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n";
        } else {
            $who_online_now .= "$i:&nbsp;<A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$session[uname]</a><br>\n"; 
            // $who_online_now .= "$i:&nbsp;<A HREF=\"{$module_link}Your_Account&amp;op=userinfo&amp;$field_user_name=$session[$field_session_uname]\">$session[$field_session_uname]</a><br>\n";
        } 
        $who_online_now .= ($i != $member_online_num ? "  " : "");
        $i++;
    } 
} 
$Today = getdate();
// Formatting Current Date
$month = $Today['month'];
$mday = $Today['mday'];
$year = $Today['year'];
// Formatting Previous Date
$pmonth = $Today['month'];
$pmday = $Today['mday'];
$pmday = $mday-1;
$pyear = $Today['year'];
// Month conversion into numeric mode
if ($pmonth == "January") {
    $pmonth = 1;
} else
if ($pmonth == "February") {
    $pmonth = 2;
} else
if ($pmonth == "March") {
    $pmonth = 3;
} else
if ($pmonth == "April") {
    $pmonth = 4;
} else
if ($pmonth == "May") {
    $pmonth = 5;
} else
if ($pmonth == "June") {
    $pmonth = 6;
} else
if ($pmonth == "July") {
    $pmonth = 7;
} else
if ($pmonth == "August") {
    $pmonth = 8;
} else
if ($pmonth == "September") {
    $pmonth = 9;
} else
if ($pmonth == "October") {
    $pmonth = 10;
} else
if ($pmonth == "November") {
    $pmonth = 11;
} else
if ($pmonth == "December") {
    $pmonth = 12;
} ;
$test = mktime (0, 0, 0, $pmonth, $pmday, $pyear, 1);
// Creating SQL parameter
$curDate2 = "%" . $month[0] . $month[1] . $month[2] . "%" . $mday . "%" . $year . "%";
$preday = strftime ("%d", $test);
$premonth = strftime ("%B", $test);
$preyear = strftime ("%Y", $test);
$curDateP = "%" . $premonth[0] . $premonth[1] . $premonth[2] . "%" . $preday . "%" . $preyear . "%";
// Executing SQL Today
$sql = "SELECT COUNT(user_id) AS userCount FROM $user_prefix" . _users . " WHERE user_regdate LIKE '$curDate2'";
// $sql = "SELECT COUNT(".$field_user_id.") AS userCount FROM " . $CONFIG['TABLE_USERS'] . " WHERE user_regdate LIKE '$curDate2'";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$userCount = $row[userCount];
// end
// Executing SQL Today
$sql = "SELECT COUNT(user_id) AS userCount FROM $user_prefix" . _users . " WHERE user_regdate LIKE '$curDateP'";
// $sql = "SELECT COUNT(".$field_user_id.") AS userCount FROM " . $CONFIG['TABLE_USERS'] . " WHERE user_regdate LIKE '$curDateP'";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$userCount2 = $row[userCount];
// end
$guest_online_num = $db->sql_numrows($db->sql_query("SELECT uname FROM " . $prefix . "_session WHERE guest=1"));
$member_online_num = $db->sql_numrows($db->sql_query("SELECT uname FROM " . $prefix . "_session WHERE guest=0"));
// $guest_online_num = $db->sql_numrows($db->sql_query("SELECT $field_session_uname FROM " . $prefix . "_session WHERE guest=1"));
// $member_online_num = $db->sql_numrows($db->sql_query("SELECT $field_session_uname FROM " . $prefix . "_session WHERE guest=0"));
$who_online_num = $guest_online_num + $member_online_num;
$content .= "<form action=\"modules.php?name=Your_Account\" method=\"post\">";
// $content .= "<form action=\"{$module_link}Your_Account\" method=\"post\">";
if (is_user($user)) {
    $content .= "<img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\"> " . _BWEL . ", <a href=\"modules.php?name=Your_Account\"><b>$uname</b></a><br>\n";
    if (is_admin($admin)) {
        $content .= "" . _ADMIN . "[ <a href=\"admin.php?op=logout\">" . _LOGOUT . "</a> ]<hr>\n";
    } else {
        $content .= "[ <a href=\"modules.php?name=Your_Account&op=logout\">" . _LOGOUT . "</a> ]<hr>\n";
    } 
    $sql = "SELECT user_id FROM $user_prefix" . _users . " WHERE username='$uname'"; 
    // $sql = "SELECT ".$field_user_id." FROM " . $CONFIG['TABLE_USERS'] . " WHERE $field_user_name='$uname'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $uid = $row[".$field_user_id."];
    $uid = $row[user_id];
    $newpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix" . _bbprivmsgs . " WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));
    $oldpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix" . _bbprivmsgs . " WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'"));
    // $newpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix" . _bbprivmsgs . " WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));
    // $oldpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix" . _bbprivmsgs . " WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'"));
    $content .= "<img src=\"images/blocks/email-y.gif\" height=\"10\" width=\"14\"> <a href=\"modules.php?name=Private_Messages\"><b>" . _BPM . "</b></a><br>\n";
    $content .= "<img src=\"images/blocks/email-r.gif\" height=\"10\" width=\"14\"> " . _BUNREAD . ": <b>$newpms</b> " . _BREAD . ": <b>$oldpms</b><br>\n<hr>\n";
} else {
    $content .= "<img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\"> " . _BWEL . ", <b>$anonymous</b>\n<hr>";
    $content .= "<center><font class=\"content\">" . _NICKNAME . "<br>";
    $content .= "<input type=\"text\" name=\"$field_user_name\" size=\"10\" maxlength=\"25\"><br>";
    $content .= "" . _PASSWORD . "<br>";
    $content .= "<input type=\"password\" name=\"$field_user_pass\" size=\"10\" maxlength=\"20\"><br>";
    if (!defined("OLDNUKE")) {
        if (extension_loaded("gd")) {
            $content .= "" . _SECURITYCODE . ": <img src='modules.php?name=Your_Account&op=gfx&random_num=$random_num' border='1' alt='" . _SECURITYCODE . "' title='" . _SECURITYCODE . "'><br>\n";
            $content .= "" . _TYPESECCODE . "<br><input type=\"text\" NAME=\"gfx_check\" SIZE=\"7\" MAXLENGTH=\"6\">\n";
            $content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><br>\n";
        } else {
            $content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
            $content .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
        } 
    } 
    $content .= "<input type=\"hidden\" name=\"op\" value=\"login\">";
    $content .= "<input type=\"submit\" value=\"" . _LOGIN . "\">\n (<a href=\"modules.php?name=Your_Account&amp;op=new_user\">" . _BREG . "</a>)<hr></center>";
} 
$content .= "<img src=\"images/blocks/group-2.gif\" height=\"14\" width=\"17\"> <b><u>" . _BMEMP . ":</u></b><br>\n";
$content .= "<img src=\"images/blocks/ur-moderator.gif\" height=\"14\" width=\"17\"> " . _BLATEST . ": <A HREF=\"modules.php?name=Your_Account&amp;op=userinfo&amp;$field_user_name=$lastuser\"><b>$lastuser</b></a><br>\n";
$content .= "<img src=\"images/blocks/ur-author.gif\" height=\"14\" width=\"17\"> " . _BTD . ": <b>$userCount</b><br>\n";
$content .= "<img src=\"images/blocks/ur-admin.gif\" height=\"14\" width=\"17\"> " . _BYD . ": <b>$userCount2</b><br>\n";
$content .= "<img src=\"images/blocks/ur-guest.gif\" height=\"14\" width=\"17\"> " . _BOVER . ": <b>$numrows</b><br>\n<hr>\n";
$content .= "<img src=\"images/blocks/group-3.gif\" height=\"14\" width=\"17\"> <b><u>" . _BVISIT . ":</u></b>\n<br>\n";
$content .= "<img src=\"images/blocks/ur-anony.gif\" height=\"14\" width=\"17\"> " . _BVIS . ": <b>$guest_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-member.gif\" height=\"14\" width=\"17\"> " . _BMEM . ": <b>$member_online_num</b><br>\n";
$content .= "<img src=\"images/blocks/ur-registered.gif\" height=\"14\" width=\"17\"> " . _BTT . ": <b>$who_online_num</b><br>\n";
if ($member_online_num > 0) {
    $content .= "<hr>\n<img src=\"images/blocks/group-1.gif\" height=\"14\" width=\"17\"> <b><u>" . _BON . ":</u></b><br>$who_online_now";
} 
$content .= "</form>";
$result = $db->sql_query("SELECT dirname, prefix FROM cpg_installs");
while ($row = $db->sql_fetchrow($result)) {
    if ($content != "") $content .= "<hr>";
    $cpgdir = $row[0];
    $cpgprefix = $row[1];
    $cpgurl = "modules.php?name=" . $cpgdir;
    if (defined('IN_POSTNUKE')) $cpgurl = "modules.php?op=modload&name=" . $cpgdir;
    $cpgtitle = $db->sql_fetchrow($db->sql_query("SELECT custom_title FROM " . $prefix . "_modules WHERE title='$cpgdir'"));
    if ($cpgtitle[0] == '') $cpgtitle[0] = $cpgdir;
    $content .= "<b><a href=\"$cpgurl\"><img src=\"images/blocks/favicon.gif\" alt=\"" . $cpgtitle[0] . "\" border=\"0\" height=\"16\" width=\"16\">" . $cpgtitle[0] . "</a></b><br />";
    $content .= "<strong><big>&middot;</big></strong>&nbsp;<b>" . ALBUMS . ": " . cpg_tablecount($cpgprefix . "albums", "count(*)") . "<br>";
    $content .= "<strong><big>&middot;</big></strong>&nbsp;<b>" . PICTURES . ": " . cpg_tablecount($cpgprefix . "pictures", "count(*)") . "<br>";
    $num = cpg_tablecount($cpgprefix . "pictures", "sum(hits)");
    if (!is_numeric($num)) $num = 0;
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;<b>" . PIC_VIEWS . ": $num<br>";
    $num = cpg_tablecount($cpgprefix . "pictures", "sum(votes)");
    if (!is_numeric($num)) $num = 0;
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;<b>" . PIC_VOTES . ": $num<br>";
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;<b>" . PIC_COMMENTS . ": " . cpg_tablecount($cpgprefix . "comments", "count(*)") . "<br>";
}
?>
