<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/* http://alex.mobstop.com                                              */
/* Tested on PHP-NUKE 7.8: Advanced Content Management System           */
/* ============================================                         */
/* Copyright (c) 2003 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/************************************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#000000";
$bgcolor2 = "#000000";
$bgcolor3 = "#000000";
$bgcolor4 = "#000000";
$textcolor1 = "#737372";
$textcolor2 = "#737372";

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {

echo "<table id=\"Table_01\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
echo "	<tr>";
echo "		<td>";
echo "			<img src=\"themes/S-GRaw/images/tb_01.png\" width=\"34\" height=\"28\" alt=\"\"></td>";
echo "		<td width=\"100%\" height=\"28\" background=\"themes/S-GRaw/images/tb_02.png\">&nbsp;			</td>";
echo "		<td>";
echo "			<img src=\"themes/S-GRaw/images/tb_03.png\" width=\"37\" height=\"28\" alt=\"\"></td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td width=\"34\" background=\"themes/S-GRaw/images/tb_04.png\">&nbsp;			</td>";
echo "		<td width=\"100%\" height=\"100%\" background=\"themes/S-GRaw/images/tables_05.png\">&nbsp;			";
}

function CloseTable() {
echo "</td>";
echo "		<td width=\"37\" height=\"100%\" background=\"themes/S-GRaw/images/tb_06.png\">&nbsp;			</td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td>";
echo "			<img src=\"themes/S-GRaw/images/tb_07.png\" width=\"34\" height=\"28\" alt=\"\"></td>";
echo "		<td height=\"28\" background=\"themes/S-GRaw/images/tb_08.png\">&nbsp;			</td>";
echo "		<td>";
echo "			<img src=\"themes/S-GRaw/images/tb_09.png\" width=\"37\" height=\"28\" alt=\"\"></td>";
echo "	</tr>";
echo "</table>";





}

function OpenTable2() {
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

/************************************************************/
/* FormatStory                                              */
/************************************************************/

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
        $notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font class=\"content\" color=\"#505050\">$thetext$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
        echo "<font class=\"content\" color=\"#505050\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/
    function themeheader() {
    global $user, $sitename, $slogan, $cookie, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";

    }
    $public_msg = public_message(); 
    echo "$public_msg";
    //$topics_list = "<select name=\"topic\" onChange='submit()'>\n";
    //$topics_list .= "<option value=\"\">All Topics</option>\n";
    //$toplist = sql_query("select topicid, topictext from $prefix"._topics." order by topictext", $dbi);
    //while(list($topicid, $topics) = sql_fetch_row($toplist, $dbi)) {
    //if ($topicid==$topic) { $sel = "selected "; }
        //$topics_list .= "<option $sel value=\"$topicid\">$topics</option>\n";
        //$sel = "";
    
    if ($username == "Anonymous") {
        $theuser = "<a href=\"modules.php?name=Your_Account&op=new_user\">Login /Register</a>";
    } else {
        $theuser = "Hello $username!";
    }

   echo "<body topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
    include("themes/S-GRaw/header.php");
	
							//LEFT SIDE BACKGROUND
		echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
		."<tr valign=\"top\">\n"
        ."<td width=\"20\" valign=\"top\" background=\"themes/S-GRaw/images/left.png\"><img src=\"themes/S-GRaw/images/left.png\" width=\"20\" height=\"6\" border=\"0\"></td>\n"
		."<td width=\"170\" background=\"themes/S-GRaw/images/.gif\" valign=\"top\">\n";
		{
    blocks(left);
	}
    echo "</td>\n"
    	."<td width=\"15\" valign=\"top\" background=\"themes/S-GRaw/images/.gif\"><img src=\"themes/S-GRaw/images/.gif\" width=\"15\" height=\"1\" border=\"0\"></td>\n"
    	."<td width=\"100%\">\n";


	

}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
     global $index, $foot1, $banners, $foot2, $foot3, $foot4, $prefix, $dbi, $total_time, $start_time, $db;

	$maxshow = 10;	// here you can change Number of downloads or Web links to display in each of the blocks.
	$a = 1;
	$result = sql_query("select lid, title, hits from ".$prefix."_links_links order by date DESC limit 0,$maxshow", $dbi);
	while(list($lid, $title, $hits) = sql_fetch_row($result, $dbi)) {
    $title2 = ereg_replace("_", " ", "<b>$title</b>");
    $show .= "&nbsp;$a: <a href=\"modules.php?name=Web_Links&amp;l_op=visit&amp;lid=$lid\">$title2</a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font class=\"content\">$hits</b><font class=\"copyright\"> times<br>";
    $showlinks = "<A name= \"scrollingCode\"></A><MARQUEE behavior= \"scroll\" direction= \"up\" height=\"68\" scrollamount= \"1\" scrolldelay= \"90\" onmouseover='this.stop()' onmouseout='this.start()'>$show";
    $a++;
	}
global $prefix, $db;
	$a = 1;
	$sql = "SELECT lid, title FROM ".$prefix."_downloads_downloads ORDER BY hits DESC LIMIT 0,$maxshow";
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result)) {
    $title2 = ereg_replace("_", " ", $row[title]);
	$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"modules.php?name=Downloads&amp;d_op=getit&amp;lid=$row[lid]\"></a> $a: <a href=\"modules.php?name=Downloads&amp;d_op=getit&amp;lid=$row[lid]\">$title2</a></span><br>";
	$showdl = " <font class=copyright>&nbsp;</b><br>&nbsp;<A name= \"scrollingCode\"></A><MARQUEE behavior= \"scroll\" direction= \"up\" height=\"85\" scrollamount= \"1\" scrolldelay= \"50\" onmouseover='this.stop()' onmouseout='this.start()'>$content";
    $a++;
	}

    
    if ($index == 1) {
	$tmpl_file = "themes/S-GRaw/left_center.html";
	$thefile = implode("", file($tmpl_file));
	$thefile = addslashes($thefile);
	$thefile = "\$r_file=\"".$thefile."\";";
	eval($thefile);
	print $r_file;
	blocks(right);
    }
	
    echo "</td>\n"
  . "    <td width=\"22\" valign=\"top\" background=\"themes/S-GRaw/images/right.png\"><img src=\"themes/S-GRaw/images/right.png\" width=\"22\" height=\"9\"></td>"
	    ."</tr>\n"
	    ."</table>\n\n\n";
	
    $footer_message = "$foot1<br>$foot2<br>$foot3<br>$foot4";
    include("themes/S-GRaw/footer.php");
	
	
}

/************************************************************/
/* Function themeindex()                                    */
/* This function format the stories on the Homepage         */
/************************************************************/
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
	$ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "$tipath$topicimage";
    }
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	$content = "$thetext$notes\n";
    } else {
	if($informant != "") {
	    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
	} else {
	    $content = "$anonymous ";
	}
	$content .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
    }
    $posted = ""._POSTEDBY." ";
    $posted .= get_author($aid);
    $posted .= " "._ON." $time $timezone";
    $tmpl_file = "themes/S-GRaw/story_home.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
}


/************************************************************/
/* Function themearticle()                                  */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
$ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "$tipath$topicimage";
    }
    $posted = ""._POSTEDON." $datetime "._BY." ";
    $posted .= get_author($aid);
    $posted .= " "._ON." $time $timezone ($counter "._READS.")";
    if ($notes != "") {
        $notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        $content = "$thetext$notes\n";
    } else {
        if($informant != "") {
            $content = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $content = "$anonymous ";
        }
        $content .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
    }
    $tmpl_file = "themes/S-GRaw/story_page.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($title, $content) {
    $tmpl_file = "themes/S-GRaw/blocks.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
	
	
	
}

?>