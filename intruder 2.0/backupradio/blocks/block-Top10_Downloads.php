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
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if (stristr($_SERVER['SCRIPT_NAME'], "block-Top10_Downloads.php")) { 
    Header("Location: ../index.php");
    die();
}

global $prefix, $db;

$a = 1;
$result = $db->sql_query("SELECT lid, title FROM ".$prefix."_downloads_downloads ORDER BY hits DESC LIMIT 0,10");
while ($row = $db->sql_fetchrow($result)) {
    $lid = intval($row['lid']);
    $title = stripslashes($row['title']);
    $title2 = ereg_replace("_", " ", $title);
    $content .= "<strong><big>&middot;</big></strong>&nbsp;$a: <a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$lid&amp;title=$title\">$title2</a><br>";
    $a++;
}

?>