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

if (stristr($_SERVER['SCRIPT_NAME'], "block-Search.php")) { 
    Header("Location: ../index.php");
    die();
}

$content = "<form action=\"modules.php?name=Search\" method=\"post\">";
$content .= "<br><center><input type=\"text\" name=\"query\" size=\"15\">";
$content .= "<br><input type=\"submit\" value=\""._SEARCH."\"></center></form>";

?>