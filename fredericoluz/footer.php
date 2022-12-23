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

if (stristr($_SERVER['SCRIPT_NAME'], "footer.php")) {
    Header("Location: index.php");
    die();
}

$footer = 1;

function footmsg() {
    global $foot1, $foot2, $foot3, $copyright, $total_time, $start_time;
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    $end_time = $mtime;
    $total_time = ($end_time - $start_time);
    $total_time = ""._PAGEGENERATION." ".substr($total_time,0,4)." "._SECONDS."";
    echo "<font class=\"footmsg\">\n";
    if ($foot1 != "") {
	echo "$foot1<br>\n";
    }
    if ($foot2 != "") {
	echo "$foot2<br>\n";
    }
    if ($foot3 != "") {
	echo "$foot3<br>\n";
    }
    // DO NOT REMOVE THE FOLLOWING COPYRIGHT LINE. YOU'RE NOT ALLOWED TO REMOVE NOR EDIT THIS.
    // IF YOU REALLY NEED TO REMOVE IT AND HAVE MY WRITTEN AUTHORIZATION CHECK: http://phpnuke.org/modules.php?name=Commercial_License
    // PLAY FAIR AND SUPPORT THE DEVELOPMENT, PLEASE!
    echo "$copyright<br>$total_time<br>\n</font>\n";
}

function foot() {
    global $prefix, $user_prefix, $db, $index, $user, $cookie, $storynum, $user, $cookie, $Default_Theme, $foot1, $foot2, $foot3, $foot4, $home, $module, $name, $admin;
    if ($home == 1) {
		blocks(Down);
    }
    if ($module == 1 AND file_exists("modules/$name/copyright.php")) {
		$cpname = ereg_replace("_", " ", $name);
		echo "<div align=\"right\"><a href=\"javascript:openwindow()\">$cpname &copy;</a></div>";
    }
    if ($module == 1 AND (file_exists("modules/$name/admin/panel.php") && is_admin($admin))) {
    	echo "<br>";
    	 }
    themefooter();
    echo "</body>\n"
		."</html>";
    die();
}

foot();
# $Log: footer.php,v $
# Revision 1.3  2004/12/07 22:09:40  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.2  2004/10/06 22:00:14  chatserv
# http://www.nukefixes.com/ftopicp-3024.html#3024
#
# Revision 1.1  2004/10/04 19:24:21  chatserv
# Initial CVS Addition
#

?>