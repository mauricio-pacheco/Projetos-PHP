<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Ultra Downloads per PHP-Nuke 6.x - 7.x by Weblord.it                 */
/* Copyright (c) 2004 by Weblord.it                                     */
/* http://www.weblord.it                                                */
/*                                                                      */
/* Grazie a:                                                            */
/* MGCJerry      http://www.2thextreme.org    (Fetch Mode)              */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }

switch($op) {

    case "Download_admin":
    case "DownConfigSave":
    include("admin/modules/download_admin.php");
    break;

}

?>