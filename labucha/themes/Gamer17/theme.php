<?php

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#f6f6f6";
$bgcolor2 = "#f6f6f6";
$bgcolor3 = "#f6f6f6";
$bgcolor4 = "#8D8D8D";
$textcolor1 = "#8D8D8D";
$textcolor2 = "#4F5150";

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
    ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="tlc" src="themes/Gamer17/images/stu/tlc.gif" width="21" height="41" border="0" alt=""></td> 
   <td width="100%" background="themes/Gamer17/images/stu/tm.gif"><img name="tm" src="themes/Gamer17/images/stu/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/Gamer17/images/stu/trc.gif" width="21" height="41" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/Gamer17/images/stu/lt.gif"><img name="left" src="themes/Gamer17/images/stu/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#f6f6f6">

<?
}
function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" ><tr><td class=row1>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" ><tr><td>\n";
}

function CloseTable() {
    ?>
</td>
    <td background="themes/Gamer17/images/stu/rt.gif"><img name="right" src="themes/Gamer17/images/stu/spacer.gif" width="1" height="1" border="0" alt=""></td>
  </tr>
  <tr>
   <td><img name="blc" src="themes/Gamer17/images/stu/blc.gif" width="21" height="21" border="0" alt=""></td>
   <td background="themes/Gamer17/images/stu/btm.gif"><img name="btm" src="themes/Gamer17/images/stu/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="brc" src="themes/Gamer17/images/stu/brc.gif" width="21" height="21" border="0" alt=""></td>
  </tr></table> 
<?
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
        echo "<font class=\"content\" color=\"#81AFD5\">$thetext$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
        echo "<font class=\"content\" color=\"#E3E3E3\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/
   function themeheader() {
    global $user, $cookie, $prefix, $total_time, $start_time, $dbi, $sitekey;
    cookiedecode($user);
    mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
    $datekey = date("F j");
    $rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
    $code = substr($rcode, 2, 6);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    $end_time = $mtime;
    $total_time = ($end_time - $start_time);
    $total_time = "".substr($total_time,0,5)." "._SECONDS."";
    $public_msg = public_message(); 
    echo "$public_msg";

    
    if ($username == "Anonymous") {
        $theuser = "<form action=\"modules.php?name=Your_Account\" method=\"post\">&nbsp;&nbsp;<input type=\"text\" name=\"username\" value=\"username\" onFocus=\"if(this.value=='username')this.value='';\" value style=\"width:75;height:18;FONT-SIZE: 10px;\">&nbsp;&nbsp;<input type=\"password\" name=\"user_password\" value=\"password\" onFocus=\"if(this.value=='password')this.value='';\" value style=\"width:75;height:18;FONT-SIZE: 10px;\"><input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><input type=\"hidden\" name=\"gfx_check\" value=\"$code\"><input type=\"hidden\" name=\"op\" value=\"login\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"image\" value=\"login\" src=\"themes/RVHRadio/images/Submit.gif\" border=\"0\"></td></form>\n";
    } else {
        $theuser = "<font size=\"1\" face=\"arial\" color=#E3E3E3><b>&nbsp;&nbsp;&nbsp;&nbsp;Welcome $username</b></font>";
    }
 $tmpl_file = "themes/Gamer17/header.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
    echo "<table width=\"100%\" align=center cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n"
."<tr>\n"
."<TD WIDTH=\"23\" HEIGHT=\"100%\" valign=top background=\"themes/Gamer17/images/left_bar.gif\"><IMG SRC=\"themes/Gamer17/images/left_bar.gif\" WIDTH=\"23\" HEIGHT=\"5\"></TD>\n"
."<TD WIDTH=\"170\" HEIGHT=\"100%\" valign=top bgcolor=#E3E3E3>\n"; 
if (($name=='Forums') OR ($name=='Private_Messages') OR ($name=='Members_List') OR ($name=='gallery')) { 
} else { 
blocks(left); 
}
echo "</TD>\n"
."<TD WIDTH=\"100%\" valign=top bgcolor=#E3E3E3>\n";
}
/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $user, $banners,$name, $cookie, $prefix, $dbi, $db, $admin,  $adminmail, $foot1, $foot2, $foot3, $copyright, $totaltime;


if ($banners == 1) {
    $numrows = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_banner WHERE type='0' AND active='1'"));
   /* Get a random banner if exist any. */ 
   /* More efficient random stuff, thanks to Cristian Arroyo from http://www.planetalinux.com.ar */ 

    if ($numrows>1) { 
   $numrows = $numrows-1; 
   mt_srand((double)microtime()*1000000); 
   $bannum = mt_rand(0, $numrows); 
    } else { 
   $bannum = 0; 
    } 
    $sql = "SELECT bid, imageurl, clickurl, alttext FROM ".$prefix."_banner WHERE type='0' AND active='1' LIMIT $bannum,1"; 
    $result = $db->sql_query($sql); 
    $row = $db->sql_fetchrow($result); 
    $bid = $row[bid]; 
    $imageurl = $row[imageurl]; 
    $clickurl = $row[clickurl]; 
    $alttext = $row[alttext]; 
    
    if (!is_admin($admin)) { 
       $db->sql_query("UPDATE ".$prefix."_banner SET impmade=impmade+1 WHERE bid='$bid'"); 
    } 
    if($numrows>0) { 
   $sql2 = "SELECT cid, imptotal, impmade, clicks, date FROM ".$prefix."_banner WHERE bid='$bid'"; 
   $result2 = $db->sql_query($sql2); 
   $row2 = $db->sql_fetchrow($result2); 
   $cid = $row2[cid]; 
   $imptotal = $row2[imptotal]; 
   $impmade = $row2[impmade]; 
   $clicks = $row2[clicks]; 
   $date = $row2[date]; 

/* Check if this impression is the last one and print the banner */ 

   if (($imptotal <= $impmade) AND ($imptotal != 0)) { 
       $db->sql_query("UPDATE ".$prefix."_banner SET active='0' WHERE bid='$bid'"); 
       $sql3 = "SELECT name, contact, email FROM ".$prefix."_bannerclient WHERE cid='$cid'"; 
       $result3 = $db->sql_query($sql3); 
       $row3 = $db->sql_fetchrow($result3); 
       $c_name = $row3[name]; 
       $c_contact = $row3[contact]; 
       $c_email = $row3[email]; 
       if ($c_email != "") { 
      $from = "$sitename <$adminmail>"; 
      $to = "$c_contact <$c_email>"; 
      $message = ""._HELLO." $c_contact:\n\n"; 
      $message .= ""._THISISAUTOMATED."\n\n"; 
      $message .= ""._THERESULTS."\n\n"; 
      $message .= ""._TOTALIMPRESSIONS." $imptotal\n"; 
      $message .= ""._CLICKSRECEIVED." $clicks\n"; 
      $message .= ""._IMAGEURL." $imageurl\n"; 
      $message .= ""._CLICKURL." $clickurl\n"; 
      $message .= ""._ALTERNATETEXT." $alttext\n\n"; 
      $message .= ""._HOPEYOULIKED."\n\n"; 
      $message .= ""._THANKSUPPORT."\n\n"; 
      $message .= "- $sitename "._TEAM."\n"; 
      $message .= "$nukeurl"; 
      $subject = "$sitename: "._BANNERSFINNISHED.""; 
      mail($to, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion()); 
       } 
   } 
    $showbanners = "<a href=\"banners.php?op=click&bid=$bid\" target=\"_blank\"><img src=\"$imageurl\" border=\"0\" alt='$alttext' title='$alttext'></a>"; 
    }
}
 


 if ($index == 1) {
	echo "</td>\n"
 ."<TD WIDTH=\"170%\" HEIGHT=\"100%\" valign=top bgcolor=#E3E3E3>\n"; 

	blocks(right);
    }
$footer_message = "$foot1<br>$foot2<br>$foot3<br>$copyright<br>$totaltime";

    echo "</td>\n"

        ."<TD WIDTH=\"23\" HEIGHT=\"100%\" valign=top background=\"themes/Gamer17/images/right_bar.gif\"><IMG SRC=\"themes/Gamer17/images/right_bar.gif\" WIDTH=\"23\" HEIGHT=\"5\"></TD>\n"
	     ."</tr>\n"
	    ."</table>\n\n\n";
     include("themes/Gamer17/footer.html");
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
        $notes = "<br><br><b>"._NOTE."</b> $notes\n";
    } else {
        $notes = "";
    }

    if ("$aid" == "$informant") {
        $content = "$thetext$notes\n";
    } else {
        if($informant != "") {
            $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $content = "$anonymous ";
        }
        $content .= ""._WRITES." \"$thetext\"$notes\n";
    }

    //Code Changed - just show posted by
    $posted = ""._POSTEDBY." ";
    $posted .= get_author($aid);
    $posted .= " "._ON." $time $timezone ";
    //End Code Change

    $datetime = substr($morelink, 0, strpos($morelink, "|") - strlen($morelink));
    $morelink = substr($morelink, strlen($datetime) + 2);
    $tmpl_file = "themes/Gamer17/news.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
}

/************************************************************/
/* Function themeindex()                                    */
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

    $tmpl_file = "themes/Gamer17/news.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($title,$content) {
            $tmpl_file = "themes/Gamer17/blocks.html";
   	    $thefile = implode("", file($tmpl_file));
    	    $thefile = addslashes($thefile);
     	    $thefile = "\$r_file=\"".$thefile."\";";
   	    eval($thefile);
   	    print $r_file;
        }



?>