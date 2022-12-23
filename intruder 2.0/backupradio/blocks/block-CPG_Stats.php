<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
if (eregi("block-CPG_Stats.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
} 
define('NO_HEADER', true);
global $prefix, $db, $CONFIG, $Version_Num, $cat, $cpg_dir;

$cpg_dir = "coppermine";
$cat = is_numeric($cat) ? $cat : 0;

$cpg_block = true;
require("modules/" . $cpg_dir . "/include/load.inc.php");
$cpg_block = false;

$content = "";

$result = $db->sql_query("SELECT dirname, prefix FROM cpg_installs");
while ($row = $db->sql_fetchrow($result)) {
    if ($content != "") $content .= "<hr>";
    $cpgdir = $row[0];
    $cpgprefix = $row[1];
    $cpgurl = "modules.php?name=" . $cpgdir;
    if (defined('IN_POSTNUKE')) $cpgurl = "modules.php?op=modload&name=" . $cpgdir;
    $cpgtitle = $db->sql_fetchrow($db->sql_query("SELECT custom_title FROM " . $prefix . "_modules WHERE title='$cpgdir'"));
    if ($cpgtitle[0] == '') $cpgtitle[0] = $cpgdir;
    $content .= "<center><b>" . $cpgtitle[0] . "</b></center>";
    $content .= "<strong><big>&middot;</big></strong>&nbsp;" . ALBUMS . ": " . cpg_tablecount($cpgprefix . "albums", "count(*)") . "<br>";
    $content .= "<strong><big>&middot;</big></strong>&nbsp;" . PICTURES . ": " . cpg_tablecount($cpgprefix . "pictures", "count(*)") . "<br>";
    $num = cpg_tablecount($cpgprefix . "pictures", "sum(hits)");
    if (!is_numeric($num)) $num = 0;
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;" . PIC_VIEWS . ": $num<br>";
    $num = cpg_tablecount($cpgprefix . "pictures", "sum(votes)");
    if (!is_numeric($num)) $num = 0;
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;" . PIC_VOTES . ": $num<br>";
    $content .= "<strong><big>&nbsp;&nbsp;&middot;</big></strong>&nbsp;" . PIC_COMMENTS . ": " . cpg_tablecount($cpgprefix . "comments", "count(*)") . "<br>";
    if (GALLERY_ADMIN_MODE) {
        $num = $db->sql_fetchrow($db->sql_query("SELECT count(*) FROM " . $cpgprefix . "pictures WHERE approved='NO'"));
        $content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=editpics&mode=upload_approval\">" . UPL_APP_LNK . "</a>: " . $num[0] . "<br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=searchnew\">" . SEARCHNEW_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=reviewcom\">" . COMMENTS_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=groupmgr\">" . GROUPS_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=usermgr\">" . USERS_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=albmgr&cat=";
        if ($name == $cpgdir) $content .= "$cat\">";
        else $content .= "0\">";
        $content .= ALBUMS_LNK . "</a><br>";
        $content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=catmgr\">" . CATEGORIES_LNK . "</a><br>";
        if (is_admin($admin)) $content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=config\">" . CONFIG_LNK . "</a>";
    } else if (USER_ADMIN_MODE) {
        $content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=albmgr\">" . ALBMGR_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=modifyalb\">" . MODIFYALB_LNK . "</a><br>" .
                    "<strong><big>&middot;</big></strong>&nbsp;<a href=\"$cpgurl&file=profile&op=edit_profile\">" . MY_PROF_LNK . "</a>";
    } 
} 
// $ob = ob_get_contents();
// ob_end_clean();
?>
