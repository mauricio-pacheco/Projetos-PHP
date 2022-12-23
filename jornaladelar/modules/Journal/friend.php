<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:19:50 $
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
/* Additional security checking code 2003 by chatserv                   */
/* http://www.nukefixes.com -- http://www.nukeresources.com             */
/************************************************************************/
    /* Journal 2.0 Enhanced and Debugged 2004                               */
    /* by sixonetonoffun -- http://www.netflake.com --                      */
    /* Images Created by GanjaUK -- http://www.GanjaUK.com                  */
    /************************************************************************/
if (!stristr($_SERVER['SCRIPT_NAME'], "modules.php")) {
        die ("You can't access this file directly...");
    }
    require_once("mainfile.php");
    $module_name = basename(dirname(__FILE__));
    get_lang($module_name);
    $pagetitle = "- "._USERSJOURNAL."";
    include("header.php");
    include("modules/$module_name/functions.php");
    if (is_user($user)) {
        cookiedecode($user);
        $username = $cookie[1];
        $user = check_html($user, nohtml);
        $username = check_html($username, nohtml);
        $sitename = check_html($sitename, nohtml);
        $debug = check_html($debug, nohtml);
        if ($debug == "true") :
        echo ("UserName:$username<br>SiteName: $sitename");
        endif;
        startjournal($sitename, $user);
        $jid = intval($jid);
        $sql = "select title from ".$user_prefix."_journal where jid='$jid'";
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $jtitle = $row[title];
        $send = intval($send);
        $sent = intval($sent);
        if ($send == 1) {
            $fname = removecrlf($fname);
            $fmail = removecrlf($fmail);
            $yname = removecrlf($yname);
            $ymail = removecrlf($ymail);
            $subject = ""._INTERESTING." $sitename";
            $message = ""._HELLO." $fname:\n\n"._YOURFRIEND." $yname "._CONSIDERED."\n\n\n$jtitle\n"._URL.": $nukeurl/modules.php?name=$module_name&file=display&jid=$jid\n\n\n"._AREMORE."\n\n---\n$sitename\n$nukeurl";
            mail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" . phpversion());
            $title = urlencode($jtitle);
            $fname = urlencode($fname);
            $sent = 1;
        }
        if ($sent == 1) {
            echo "<br>";
            title(""._SENDJFRIEND."");
            OpenTable();
            echo "<center>"._FSENT."<br><br>[ <a href=\"modules.php?name=$module_name&file=display&jid=$jid\">"._RETURNJOURNAL2."</a> ]</center>";
            CloseTable();
            journalfoot();
            die();
        }
        echo "<br>";
        title(""._SENDJFRIEND."");
        OpenTable();
        echo "<table align=center border=0><tr><td>" ."<center><b>$jtitle</b><br>"._YOUSENDJOURNAL."</center><br><br>" ."<form action=\"modules.php?name=$module_name&file=friend\" method=\"post\">" ."<input type=\"hidden\" name=\"send\" value=\"1\">" ."<input type=\"hidden\" name=\"jid\" value=\"$jid\">";
        if (is_user($user)) {
            $sql = "select name, username, user_email from ".$user_prefix."_users where username='$cookie[1]'";
            $result = $db->sql_query($sql);
            $row = $db->sql_fetchrow($result);
            $yn = check_html($row[name], nohtml);
            $yun = check_html($row[username], nohtml);
            $ye = check_html($row[user_email], nohtml);
        }
        if ($yn == "") {
            $yn = $yun;
        }
        echo "<b>"._FYOURNAME." </b> <input type=\"text\" name=\"yname\" value=\"$yn\"><br><br>\n" ."<b>"._FYOUREMAIL." </b> <input type=\"text\" name=\"ymail\" value=\"$ye\"><br><br><br>\n" ."<b>"._FFRIENDNAME." </b> <input type=\"text\" name=\"fname\"><br><br>\n" ."<b>"._FFRIENDEMAIL." </b> <input type=\"text\" name=\"fmail\"><br><br>\n" ."<input type=\"hidden\" name=\"op\" value=\"SendStory\">\n" ."<input type=\"submit\" value="._SEND.">\n" ."</form></td></tr></table>\n";
        CloseTable();
        journalfoot();
    } else {
        echo ("<br>");
        openTable();
        echo ("<div align=center>"._YOUMUSTBEMEMBER."<br></div>");
        closeTable();
        journalfoot();
        die();
    }
# $Log: friend.php,v $
# Revision 1.3  2004/12/08 00:19:50  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/10/08 19:20:00  chatserv
# Updated to match additional bug fixes by sixonetonoffun
#
# Revision 1.1  2004/10/05 18:05:08  chatserv
# Initial CVS Addition
#

?>