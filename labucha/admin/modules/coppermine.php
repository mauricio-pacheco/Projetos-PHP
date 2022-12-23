<?php

// ######################################################################
// # PHP-Nuke                                                           #
// #====================================================================#
// #  Copyright (c) 2003 - Francisco Burzi                              #
// #  http://phpnuke.org/                                               #
// #====================================================================#
// # PCMS                                                               #
// #====================================================================#
// #  Copyright (c) 2003 - Darren Poulton (paladin@intaleather.com.au)  #
// #  http://paladin.intaleather.com.au/                                #
// #                                                                    #
// #  Developed from the PHP-Nuke 6.5 Standard Distribution             #
// #  Copyright (c) 2003 - Francisco Burzi                              #
// #  http://phpnuke.org/                                               #
// #====================================================================#
// #  Use of this program is goverened by the terms of the GNU General  #
// #     Public License (GPL - version 1 or 2) as published by the      #
// #           Free Software Foundation (http://www.gnu.org/)           #
// ######################################################################

// Check Referer
if (!eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

// Restrict Access to Codepage Functionality
$result = sql_query("select radminsuper from ".$prefix."_authors where aid='$aid'", $dbi);
list($radminsuper) = sql_fetch_row($result, $dbi);
$schedinfo = "Coppermine Administration";
if ($radminsuper==1) {

// ######################################################################
// FUNCTION :: schedule()
// ######################################################################
function coppermine() {
    global $dbi;
    include ("header.php");
    GraphicAdmin();

    OpenTable();
    echo "<form action=\"modules.php\" method=\"get\">"
        ."Which install: <select name=\"name\">";
    $result = sql_query("SELECT dirname FROM cpg_installs", $dbi);
    if (!$result) {
        die(mysql_error());
    }
    while (list($cpg_dir) = sql_fetch_row($result, $dbi)) {
        echo "<option>".$cpg_dir."</option>";
    }
    echo "</select>"
        ."<br>"
        ."Which page: <select name=\"file\">"
        ."<option value=\"config\">Configuration</option>"
        ."<option value=\"reviewcom\">Review Comments</option>"
        ."<option value=\"searchnew\">Batch add pictures</option>"
        ."</select><p>"
        ."<input type=\"submit\" value=\"Go\">"
        ."</form>";
    CloseTable();

    include ("footer.php");
}

// ######################################################################
// SWITCHBOARD
// ######################################################################
switch ($op){
    case "coppermine": coppermine(); break;
}

} else {
    echo "Access Denied";
}

?>
