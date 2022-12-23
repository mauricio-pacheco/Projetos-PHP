<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:19:50 $
/************************************************************************/
/* Journal &#167 ZX                                                     */
/* ================                                                     */
/*                                                                      */
/* Original work done by Joseph Howard known as Member's Journal, which */
/* was based on Trevor Scott's vision of Atomic Journal.                */
/*                                                                      */
/* Modified on 25 May 2002 by Paul Laudanski (paul@computercops.biz)    */
/* Copyright (c) 2002 Modifications by Computer Cops.                   */
/* http://computercops.biz                                              */
/*                                                                      */
/* Required: PHPNuke 5.5 ( http://www.phpnuke.org/ ) and phpbb2         */
/* ( http://bbtonuke.sourceforge.net/ ) forums port.                    */
/*                                                                      */
/* Member's Journal did not work on a PHPNuke 5.5 portal which had      */
/* phpbb2 port integrated.  Thus was Journal &#167 ZX created with the  */
/* Member's Journal author's blessings.                                 */
/*                                                                      */
/* To install, backup everything first and then FTP the Journal package */
/* files into your site's module directory.  Also run the tables.sql    */
/* script so the proper tables and fields can be created and used.  The */
/* default table prefix is "nuke" which is hard-coded throughout the    */
/* entire system as a left-over from Member's Journal.  If a demand     */
/* exists, that can be changed for a future release.                    */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
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
$htime = date(h);
$mtime = date(i);
$ntime = date(a);
$mtime = "$htime:$mtime $ntime";
$mdate = date(m);
$ddate = date(d);
$ydate = date(Y);
$ndate = "$mdate-$ddate-$ydate";
        $username = check_html($username, nohtml);
        $sitename = check_html($sitename, nohtml);
        $ndate = check_html($ndate, nohtml);
        $rid = check_html($rid, nohtml);
        $comment = addslashes(check_html($comment, nohtml));
startjournal($sitename,$user);
$rid = intval($rid);
        $sql = "INSERT INTO ".$user_prefix."_journal_comments VALUES ('','$rid','$username','$comment','$ndate','$mtime')";
$db->sql_query($sql);
update_points(2);
echo ("<br>");

openTable();
echo ("<div align=center>"._COMMENTPOSTED."<br><br>");
echo ("<a href=\"modules.php?name=$module_name&file=display&jid=$rid\">"._RETURNJOURNAL2."</a><br><br><div class=title>"._THANKS."</div></div>");
closeTable();
        journalfoot();
    }
    if (!is_user($user) && !is_admin($admin)) {
        $pagetitle = "- "._YOUMUSTBEMEMBER."";
        $pagetitle = check_html($pagetitle, nohtml);
        OpenTable();
        echo "<center><b>"._YOUMUSTBEMEMBER."</b></center>";
        CloseTable();
        include("footer.php");
        die();
    }
# $Log: commentsave.php,v $
# Revision 1.3  2004/12/08 00:19:50  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/11/26 02:36:48  chatserv
# additional bug fixes by sixonetonoffun
#
# Revision 1.1  2004/10/05 18:05:07  chatserv
# Initial CVS Addition
#

?>