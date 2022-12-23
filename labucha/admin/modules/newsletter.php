<?php

# $Author: chatserv $
# $Date: 2004/12/07 22:20:10 $
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
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if ( !defined('ADMIN_FILE') )
{
	die("Illegal File Access");
}
if (!stristr($_SERVER['SCRIPT_NAME'], "admin.php")) { die ("Access Denied"); }
global $prefix, $db;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {

/*********************************************************/
/* Sections Manager Functions                            */
/*********************************************************/

function newsletter() {
    global $prefix, $user_prefix, $db, $sitename;
    include("header.php");
    GraphicAdmin();
    $srow = $db->sql_numrows($db->sql_query("select * from " . $user_prefix . "_users where newsletter='1'"));
    $urow = $db->sql_numrows($db->sql_query("select * from " . $user_prefix . "_users"));
    $urow--;
    OpenTable();
    echo "<center><font class=\"title\"><b>" . _NEWSLETTER . "</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"content\"><b>" . _NEWSLETTER . "</b></font></center>"
	."<br><br>"
	."<form method=\"post\" action=\"admin.php\">"
	."<b>From:</b> $sitename"
	."<br><br>"
	."<b>" . _SUBJECT . ":</b><br><input type=\"text\" name=\"subject\" size=\"50\">"
	."<br><br>"
	."<b>" . _CONTENT . ":</b><br><textarea name=\"content\" cols=\"50\" rows=\"10\"></textarea>"
	."<br><br>"
	."<b>" . _WHATTODO . "</b><br>"
	."<input type=\"radio\" name=\"type\" value=\"newsletter\" checked> " . _ANEWSLETTER . " ($srow " . _SUBSCRIBEDUSERS . ")<br>"
	."<input type=\"radio\" name=\"type\" value=\"massmail\"> " . _MASSMAIL . " ($urow " . _USERS . ")"
	."<br><br>"
	."<input type=\"hidden\" name=\"op\" value=\"check_type\">"
	."<input type=\"submit\" value=\"" . _PREVIEW . "\">"
	."</form>";
    CloseTable();
    include("footer.php");
}

function check_type($subject, $content, $type) {
    global $user_prefix, $db, $sitename;
    include("header.php");
    GraphicAdmin();
    $srow = $db->sql_numrows($db->sql_query("select * from " . $user_prefix . "_users where newsletter='1'"));
    $urow = $db->sql_numrows($db->sql_query("select * from " . $user_prefix . "_users"));
    $urow--;
    OpenTable();
    echo "<center><font class=\"title\"><b>" . _NEWSLETTER . "</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    $content = stripslashes($content);
    if ($type == "newsletter") {
	echo "<center><font class=\"content\"><b>" . _NEWSLETTER . "</b></font>"
	    ."<br><br>"
	    ."<form action\"admin.php\" method=\"post\">"
	    ."" . _NYOUAREABOUTTOSEND . "<br>"
	    ."<b>$srow</b> " . _NUSERWILLRECEIVE . "<br><br>"
	    ."<b>" . _REVIEWTEXT . "</b></center><br><br>"
	    ."<b>" . _FROM . ":</b> $sitename<br><br>"
	    ."<b>" . _SUBJECT . ":</b><br><input type=\"text\" name=\"title\" value=\"$subject\" size=\"50\"><br><br>"
	    ."<b>" . _CONTENT . ":</b><br><textarea name=\"content\" cols=\"50\" rows=\"10\">$content</textarea><br><br><br><br>"
	    ."<b>" . _NAREYOUSURE2SEND . "</b><br><br>"
	    ."<input type=\"hidden\" name=\"op\" value=\"newsletter_send\">"
	    ."<input type=\"submit\" value=\"" . _SEND . "\"> &nbsp;&nbsp; " . _GOBACK . ""
	    ."</form>";
    } elseif ($type == "massmail") {
        echo "<center><font class=\"content\"><b>" . _MASSEMAIL . "</b></font>"
	    ."<br><br>"
	    ."<form action\"admin.php\" method=\"post\">"
	    ."" . _MYOUAREABOUTTOSEND . "<br>"
	    ."<b>$urow</b> " . _MUSERWILLRECEIVE . "<br>"
	    ."<i><b>" . _POSSIBLESPAM . "</b></i><br><br>"
	    ."<b>" . _REVIEWTEXT . "</b></center><br><br>"
	    ."<b>" . _FROM . ":</b> $sitename<br><br>"
	    ."<b>" . _SUBJECT . ":</b><br><input type=\"text\" name=\"title\" value=\"$subject\" size=\"50\"><br><br>"
	    ."<b>" . _CONTENT . ":</b><br><textarea name=\"content\" cols=\"50\" rows=\"10\">$content</textarea><br><br><br><br>"
	    ."<b>" . _MAREYOUSURE2SEND . "</b><br><br>"
	    ."<input type=\"hidden\" name=\"op\" value=\"massmail_send\">"
	    ."<input type=\"submit\" value=\"" . _SEND . "\"> &nbsp;&nbsp; " . _GOBACK . ""
	    ."</form>";
    }
    if (($type == "newsletter") AND ($srow > 500)) {
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><i>" . _MANYUSERSNOTE . "</i></center>";
    } elseif (($type == "massmail") AND ($urow > 500)) {
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<center><i>" . _MANYUSERSNOTE . "</i></center>";
    }
    CloseTable();
    include("footer.php");
}

function newsletter_send($title, $content) {
    global $user_prefix, $sitename, $db, $nukeurl, $adminmail;
    $send_html_messages = "yes";
    $from = $adminmail;
    $subject = "[$sitename Newsletter]: " . stripslashes($title) . "";
    $content = stripslashes($content);
    $content = "$sitename " . _NEWSLETTER . "\n\n\n$content\n\n- $sitename " . _STAFF . "\n\n\n\n\n\n" . _NLUNSUBSCRIBE . "";
    $result = $db->sql_query("SELECT user_email from " . $user_prefix . "_users where newsletter='1'");
    while ($row = $db->sql_fetchrow($result)) {
	$user_email = $row['user_email'];
        $xheaders = "From: " . $sitename . " <" . $adminmail . ">\n";
        $xheaders .= "X-Sender: <" . $adminmail . ">\n";
        $xheaders .= "X-Mailer: PHP\n"; // mailer
        $xheaders .= "X-Priority: 6\n"; // Urgent message!
        if ($send_html_messages == "yes") {
                $xheaders .= "Content-Type: text/html; charset=iso-8859-1\n"; // Mime type
        }
        mail("$user_email","$subject","$content",$xheaders);
    }
    Header("Location: admin.php?op=newsletter_sent");
}

function newsletter_sent() {
    include("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>" . _NEWSLETTER . "</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"content\"><b>" . _NEWSLETTER . "</b></font><br><br>";
    echo "<b>" . _NEWSLETTERSENT . "</b></center>";
    CloseTable();
    include("footer.php");
}

function massmail_send($title, $content) {
    global $user_prefix, $sitename, $db, $nukeurl, $adminmail;
    $send_html_messages = "yes";
    $from = $adminmail;
    $subject = "[$sitename]: $title";
    $content = stripslashes($content);
    $content = "" . _FROM . ": $sitename\n\n\n\n$content\n\n\n\n- $sitename " . _STAFF . "\n\n\n\n" . _MASSEMAILMSG . "";
    $result = $db->sql_query("SELECT user_email from " . $user_prefix . "_users where user_id != '1'");
    while ($row = $db->sql_fetchrow($result)) {
	$user_email = $row['user_email'];
        $xheaders = "From: " . $sitename . " <" . $adminmail . ">\n";
        $xheaders .= "X-Sender: <" . $adminmail . ">\n";
        $xheaders .= "X-Mailer: PHP\n"; // mailer
        $xheaders .= "X-Priority: 6\n"; // Urgent message!
        if ($send_html_messages == "yes") {
                $xheaders .= "Content-Type: text/html; charset=iso-8859-1\n"; // Mime type
        }
        mail("$user_email","$subject","$content",$xheaders);
    }
    Header("Location: admin.php?op=massmail_sent");
}

function massmail_sent() {
    include("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>" . _MASSEMAIL . "</b></font></center>";
    CloseTable();
    echo "<br>";
    OpenTable();
    echo "<center><font class=\"content\"><b>" . _MASSEMAIL . "</b></font><br><br>";
    echo "<b>" . _MASSEMAILSENT . "</b></center>";
    CloseTable();
    include("footer.php");
}

switch ($op) {

    case "newsletter":
    newsletter();
    break;

    case "newsletter_send":
    newsletter_send($title, $content);
    break;

    case "newsletter_sent":
    newsletter_sent();
    break;

    case "massmail_send":
    massmail_send($title, $content);
    break;

    case "massmail_sent":
    massmail_sent();
    break;

    case "check_type":
    check_type($subject, $content, $type);
    break;

}

} else {
    echo "Access Denied";
}
# $Log: newsletter.php,v $
# Revision 1.3  2004/12/07 22:20:10  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/11/24 22:40:13  chatserv
# Version 2.7 Release
#
# Revision 1.1  2004/10/04 23:27:53  chatserv
# Initial CVS Addition
#

?>