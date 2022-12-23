<?php

# $Author: chatserv $
# $Date: 2004/12/07 22:12:57 $
/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if ( !defined('ADMIN_FILE') )
{
	die("Illegal File Access");
}
if (!stristr($_SERVER['SCRIPT_NAME'], "admin.php")) { die ("Access Denied"); }

switch($op) {

    case "Groups":
    case "grp_add":
    case "grp_edit":
    case "grp_edit_save":
    case "grp_del":
    case "points_update":
    include("admin/modules/groups.php");
    break;

}
# $Log: case.groups.php,v $
# Revision 1.3  2004/12/07 22:12:57  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/11/24 22:34:36  chatserv
# Version 2.7 Release
#
# Revision 1.1  2004/10/04 23:22:01  chatserv
# Initial CVS Addition
#

?>