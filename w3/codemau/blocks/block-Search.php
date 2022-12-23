<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Modified Search Block                                                */
/* Copyright (c) 2002 by Shawn Archer                                   */
/* http://www.NukeStyles.com                                            */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/************************************************************************/
/* Este Arquivo Foi Distribuido por: NukeBrasil.org                     */
/* http://www.nukebrasil.org - Antonio Andrade - nuke@nukebrasil.org    */
/************************************************************************/

/************************************************************************/
/* Tradução para Português do Brasil - Antonio Andrade                  */
/* http://www.nukebrasil.org - Antonio Andrade - nuke@nukebrasil.org    */
/* ICQ: 212091895 - MSN: msn@nukebrasil.org                             */
/************************************************************************/





if (eregi("block-Search.php", $PHP_SELF)) {
    Header("Location: index.php");
    die();
}


global $type, $prefix, $dbi;

$content  = "<form action=\"modules.php?name=Search#results\" method=\"post\">";
$content .= "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" align=\"center\">";
$content .= "<tr><td align=\"center\">";
$content .= "<b><u>"._SEARCHTYPE."</u></b><br><br>";
$num_sec = sql_num_rows(sql_query("select * from ".$prefix."_sections", $dbi), $dbi);
$num_rev = sql_num_rows(sql_query("select * from ".$prefix."_reviews", $dbi), $dbi);
$content .= "<select name=\"type\">";
$content .= "<option  name=\"type\" value=\"stories\">"._SSTORIES."</option>";
$content .= "<option  name=\"type\" value=\"comments\">"._SCOMMENTS."</option>";
if (is_active("Downloads")) {
$content .= "<option  name=\"type\" value=\"downloads\">"._DOWNLOADS."</option>";
}
if ($num_rev > 0) {
$content .= "<option  name=\"type\" value=\"reviews\">"._REVIEWS."</option>";
}	
if ((is_active("Sections")) AND ($num_sec > 0)) {	
$content .= "<option  name=\"type\" value=\"sections\">"._SSECTIONS."</option>";
}
$content .= "<option  name=\"type\" value=\"users\">"._SUSERS."</option>";
if (is_active("Web_Links")) {
$content .= "<option  name=\"type\" value=\"links\">"._WEBLINKS."</option>";
}
$content .= "</select>";             
$content .= "</td></tr><tr><td align=\"center\">";
$content .= "<input type=\"text\" onfocus=\"value=''\" value=\"Seu Texto\" name=\"query\" size=\"15\"><br>";
$content .= "</td></tr><tr><td align=\"center\"><input type=\"submit\" value=\""._SEARCH."\">";
$content .= "</td></tr><tr><td align=\"center\">";
$content .= "<a href=\"modules.php?name=Search\">"._ADVANCEDSEARCH."</a>";
$content .= "</td></tr></table>";
$content .= "</form>";

?>