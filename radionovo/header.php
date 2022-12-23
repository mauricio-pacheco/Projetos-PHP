<?php

# $Author: chatserv $
# $Date: 2004/12/07 22:09:40 $
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

if (stristr($_SERVER['SCRIPT_NAME'], "header.php")) {
    Header("Location: index.php");
    die();
}

require_once("mainfile.php");

##################################################
# Include some common header for HTML generation #
##################################################

$header = 1;

function head() {
    global $ab_config, $slogan, $sitename, $banners, $nukeurl, $Version_Num, $artpage, $topic, $hlpfile, $user, $hr, $theme, $cookie, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $forumpage, $adminpage, $userpage, $pagetitle;
    $ThemeSel = get_theme();
    include("themes/$ThemeSel/theme.php");
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
    echo "<html>\n";
    echo "<head>\n";
    echo "<title>$sitename</title>\n";

    include("includes/meta.php");
    include("includes/javascript.php");

    if (file_exists("themes/$ThemeSel/images/favicon.ico")) {
	echo "<link REL=\"shortcut icon\" HREF=\"themes/$ThemeSel/images/favicon.ico\" TYPE=\"image/x-icon\">\n";
    }

    echo "<LINK REL=\"StyleSheet\" HREF=\"themes/$ThemeSel/style/style.css\" TYPE=\"text/css\">\n\n\n";
    include("includes/my_header.php");
    echo "\n\n\n</head>\n\n";
	if($ab_config['site_switch'] == 1) {
      echo "<center><img src='images/sentinel/disabled.png' border='0' width='200' height='20'></center><br />\n";
    }
    themeheader();
}

online();
head();
include("includes/counter.php");
global $home;
if ($home == 1) {
    message_box();
    blocks(Center);
}
# $Log: header.php,v $
# Revision 1.2  2004/12/07 22:09:40  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.1  2004/10/04 19:24:21  chatserv
# Initial CVS Addition
#

?>
