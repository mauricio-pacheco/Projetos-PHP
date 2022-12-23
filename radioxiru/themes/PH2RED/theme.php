<?php

//*********************************************************************************************************//
// Theme Name: PH2 Red (Original Theme by: Pitcher.no - http://pitcher.no)              			    	      
// Theme re-Design by: Lorkan (http://lorkan.com)		      
// version 2.0                                              
// 
// Lorkan Themes and/or Lorkan is a Registered Organization and holds a copyright with CIPO
// (Canadian Intellectual Property Office)                                                         
// Original Author of file: Lorkan Themes - http://lorkan.com
// Developed by: Lorkan Themes - Simply The Best Themes for Nuke
// Forum Template: Desgined by SubBlue Designs, but ported by: Lorkan Themes for use with PHP-Nuke©
// Copyright © 2004 by Lorkan Themes - All Rights Reserved
// ----------------------------------------------------------------------
// THEME MODIFICATION 
// Users may alter or modify this theme at their own risk,
// but only for their own use. They may also hire Lorkan Themes to modify their own copy of the theme.
// Although users may modify the code for their use,
// modified code may not be resold or distributed,
// without express written permission from Lorkan Themes.
//
// DISPLAY OF COPYRIGHT NOTICES REQUIRED
// All copyright notices used within the scripts that the scripts generate,
// MUST remain intact. Furthermore, these notices must remain visible.
//
// SUPPORT
// Lorkan Themes provide free support on all their theme designs, BUT not on Forum Templates,
// (includes consulting, troubleshooting and fixing problems).
//
// Lorkan Themes is not liable for any products or services offered by means of the theme.
// The user must assume the entire risk of using the program.
//
// Lorkan Themes
// For commercial themes, exclusive themes, visit our Theme Shop http://lorkan.com/modules.php?name=Themes
// For some free themes, visit us at: http://lorkan.com
//*********************************************************************************************************//

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#FFFFFD";
$bgcolor2 = "#FFFFFD";
$bgcolor3 = "#FFFFFD";
$bgcolor4 = "#FFFFFD";
$textcolor1 = "#4A4C4F";
$textcolor2 = "#4A4C4F";

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	echo "<tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
	echo "<tr><td bgcolor=\"#555D6A\">";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\">";
	echo "<tr><td bgcolor=\"#FFFFFD\">";
}

function CloseTable() {
	echo "</td></tr></table></td></tr></table>";
	echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tbl\"><tr><td class=\"tbll\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblbot\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblr\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" />";
	echo "</td></tr></table></td></tr></table>";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	echo "<tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
	echo "<tr><td bgcolor=\"#555D6A\">";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\">";
	echo "<tr><td bgcolor=\"#FFFFFD\">";
}

function CloseTable2() {
	echo "</td></tr></table></td></tr></table>";
	echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tbl\"><tr><td class=\"tbll\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblbot\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblr\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" />";
	echo "</td></tr></table></td></tr></table>";
}

/************************************************************/
/* Function formatstory()                                   */
/************************************************************/

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
   } else {
	$notes = "";
   }
    if ("$aid" == "$informant") {
	echo "<font class=\"content\">$thetext$notes</font>\n";
   } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"modules.php?name=Your_Account&op=userinfo&amp;username=$informant\">$informant</a> ";
   } else {
	    $boxstuff = "$anonymous ";
   }
	$boxstuff .= ""._WRITES.": $thetext $notes\n";
	echo "<font class=\"content\">$boxstuff</font>\n";
   }
   }

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global  $admin, $user, $banners, $sitename, $slogan, $cookie, $prefix, $db, $nukeurl, $anonymous, $name, $index, $blockside;


	/* Check of right block on/off */

	if ($index == 1) {
		$topblock = "<td width=\"194\" height=\"12\"><img src=\"themes/PH2RED/images/right_block_top.jpg\"></td>";
	} else {
		$topblock = "<td width=\"194\" height=\"12\" background=\"themes/PH2RED/images/middle_block_top.jpg\"></td>";
	}
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
    }
}
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
           
	$datetime = "<script type=\"text/javascript\">\n\n";
	$datetime .= "<!--   // Array ofmonth Names\n";
	$datetime .= "var monthNames = new Array( \""._JANUARY."\",\""._FEBRUARY."\",\""._MARCH."\",\""._APRIL."\",\""._MAY."\",\""._JUNE."\",\""._JULY."\",\""._AUGUST."\",\""._SEPTEMBER."\",\""._OCTOBER."\",\""._NOVEMBER."\",\""._DECEMBER."\");\n";
	$datetime .= "var now = new Date();\n";
	$datetime .= "thisYear = now.getYear();\n";
	$datetime .= "if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n";
	$datetime .= "document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n";
	$datetime .= "// -->\n\n";
	$datetime .= "</script>";


	echo "<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" onLoad=\"MM_preloadImages('themes/PH2RED/images/header_05_on.jpg','themes/PH2RED/images/header_06_on.jpg','themes/PH2RED/images/header_07_on.jpg','themes/PH2RED/images/header_08_on.jpg','themes/PH2RED/images/header_09_on.jpg')\">\n";
	echo'<script src="themes/PH2RED/style/grade.js" language="Javascript"></script>';
	echo '<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_swapImgRestore() { //v3.0
	var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

	function MM_preloadImages() { //v3.0
	var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
	var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
	if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

	function MM_findObj(n, d) { //v4.01
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
	d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	if(!x && d.getElementById) x=d.getElementById(n); return x;
}

	function MM_swapImage() { //v3.0
	var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
	//-->
	</script>';


    if ($username == "Anonymous") {
        $theuser = "&nbsp;&nbsp;<a href=\"modules.php?name=Your_Account&op=new_user\">Create an account";
    } else {
        $theuser = "&nbsp;&nbsp;Welcome $username!";
    }
        $public_msg = public_message();

	echo "<table class=\"bodyline\" align=\"center\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
	echo "<tr><td valign=\"top\">";
	echo "<table width=\"100%\" height=\"21\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
	echo "<td background=\"themes/PH2RED/images/header_top.gif\" width=\"100%\"></td>";
	echo "</tr></table>";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
	echo "<td width=\"100%\" align=\"center\" color='#F2DC6C'>
	<script>
  function camada( sId ) {
  var sDiv = document.getElementById( sId );
  if( sDiv.style.visibility == \"hidden\" ) {
  sDiv.style.visibility = \"visible\";
  } else {
  sDiv.style.visibility = \"hidden\";
  }
  }
</script>
<div id=\"menu\" style=\"position:absolute; z-index:9; VISIBILITY: s2; top: 22px; left: 542px;\"><a href=\"#\" onClick=\"camada('menu');\"> <img src=\"fechar.jpg\" border=\"0\" /></a><br />
  <img src=\"radio.png\" /></div>
	
	<OBJECT 
      codeBase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0 
      height=150 width=1000 classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000><PARAM NAME=\"movie\" VALUE=\"bannerfinal.swf\"><PARAM NAME=\"menu\" VALUE=\"false\"><PARAM NAME=\"wmode\" VALUE=\"transparent\">
                                      <embed src=\"bannerfinal.swf\" width=\"1000\" 
      height=\"150\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" 
      type=\"application/x-shockwave-flash\" menu=\"false\" 
      wmode=\"transparent\"></embed></OBJECT></td></tr></table>";
	echo "<table width=\"100%\" height=\"38\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
	echo "<td style=\"padding-top:3px;\" align=\"right\" width=\"100%\" background=\"themes/PH2RED/images/spacer_bottom.jpg\">&nbsp;</td>";
	echo "</tr></table>";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
	echo "<td width=\"194\" height=\"12\"><img src=\"themes/PH2RED/images/left_block_top.jpg\"></td>";
	echo "<td width=\"100%\" height=\"12\" background=\"themes/PH2RED/images/middle_block_top.jpg\"></td>";
	echo "$topblock</tr></table>";
	echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">";
	echo "<tr valign=\"top\">";
	echo "<td valign=\"top\" background=\"themes/PH2RED/images/block_left.jpg\">";

// Modification to hide left blocks in Forums
		blocks(left);
	echo "</td><td align=\"center\" bgcolor=\"#FFFFFF\" valign=\"top\" width=\"100%\">$showbanners\n";
	}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index;
    if ($index == 1) {

	echo "</td><td valign=\"top\" width=\"194\" background=\"themes/PH2RED/images/block_right.jpg\">";
		blocks(right);
	}
	echo "</td></table>";
	echo "<div align=\"center\"><table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" height=\"120\" background=\"themes/PH2RED/images/bottomline.jpg\">";
	echo "<tr>";
	echo "<td align=\"center\" width=\"100%\"><table width=68% border=0 align=\"center\">
  <tr>
    <td><img src=tele.gif></td>
    <td><b>Telefones:</b> (0xx55) 3791 1175 - (0xx55) 3791 1441 - (0xx55) 9908 2805</td>
	<td><img src=msn.jpg></td>
	<td><b>MSN:</b> <a href=msnim:add?contact=radiochiru@hotmail.com>radiochiru@hotmail.com</a></td>
  </tr>
</table>
<br><table align=\"center\" width=96% border=0>
  <tr>
    <td><img src=cartiado.gif></td>
    <td><b>Direção:</b> <a href=mailto:direcao@radiochiru.com.br>direcao@radiochiru.com.br</a></td>
    <td><img src=cartiado.gif></td>
    <td><b>Geral:</b> <a href=mailto:radiochiru@radiochiru.com.br>radiochiru@radiochiru.com.br</a></td>
	<td><img src=cartiado.gif></td>
    <td><b>Studio:</b> <a href=mailto:studio@radiochiru.com.br>studio@radiochiru.com.br</a></td>
    <td><img src=cartiado.gif></td>
    <td><b>Jornalismo:</b> <a href=mailto:jornalismo@radiochiru.com.br>jornalismo@radiochiru.com.br</a></td>
  </tr>
</table></div>
<br><b>Endereço:</b> Rua Duque de Caxias, 375 - Centro Palmitinho - Apto 302 - Cep: 98430-000 - Desenvolvimento: <a href=\"http://www.casadaweb.net\" target=_blank>Casa da Web</a></b></td>";
	echo "<td width=\"103\">";
	
}

/************************************************************/
/* Function themeindex()                                    */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;

	$ThemeSel = get_theme();
	if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "themes/$ThemeSel/images/topics/$topicimage";
} else {
	$t_image = "$tipath$topicimage";
}

	echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
	echo "<tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
	echo "<td bgcolor=\"#555D6A\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">";
	echo "<tr><td bgcolor=\"#FBD603\" width=\"100%\"><b>$title</b></td></tr>";
	echo "<tr><td bgcolor=\"#FFFFFD\">";
		FormatStory($thetext, $notes, $aid, $informant);
	echo "</td></tr>";
	echo "<tr><td class=\"articles\" align=\"left\">"._POSTEDBY." ";
	
	echo "  $time $timezone - ($counter "._READS.")</td>";
	echo "<tr><td class=\"articles_base\" align=\"right\">";
	echo "<div align=\"right\"><font class=\"content\">$morelink</font></div></td></table></td></tr></table>";
	echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tbl\"><tr><td class=\"tbll\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblbot\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblr\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" />";
	echo "</td></tr></table></td></tr></table>";
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

	echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
	echo "<tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
	echo "<td bgcolor=\"#555D6A\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">";
	echo "<tr><td class=\"newsbar\"><font color='#000000'>$title</font></td></tr>";
	echo "<tr><td bgcolor=\"#FFFFFD\"><a href=\"modules.php?name=News&new_topic=$topic\"><img src=\"$t_image\" alt=\"$topictext\" border=\"0\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>";
		FormatStory($thetext, $notes, $aid, $informant);
	echo "</td></tr>";
	echo "<tr><td class=\"articles\" align=\"left\">"._POSTEDBY." ";
		
	echo "  $datetime</td></table></td></tr></table>";
	echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tbl\"><tr><td class=\"tbll\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblbot\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" /></td><td class=\"tblr\"><img src=\"themes/PH2RED/forums/images/spacer.gif\" alt=\"\" width=\"8\" height=\"4\" />";
	echo "</td></tr></table></td></tr></table>";
}


/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/

function themesidebox($title, $content) {

	echo "<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
	echo "<tr><td height=\"20\" background=\"themes/PH2RED/images/block_left_header.jpg\">&nbsp;&nbsp;&nbsp;&nbsp;<font class=\"block-title\"><strong>$title</strong></font></td>";
	echo "</tr>";
	echo "<tr><td height=\"2\"><img src=\"themes/PH2RED/images/block_left_shaddow.jpg\"></td></tr>";
	echo "<tr><td background=\"themes/PH2RED/images/block_left.jpg\">";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td><table align=\"center\" width=\"165\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td height=\"5\"></td></tr><tr><td><font class=\"content\">$content</font>";
	echo "</td></tr></table>\n";
	echo "<img src=\"themes/PH2RED/images/pixel.gif\" width=\"4\" height=\"3\">";
	echo "</td></tr></table></td></tr></table>";
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/

function themesidebox2($title, $content) {

	echo "<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
	echo "<tr><td height=\"20\" align='center'><font class=\"block-title\"><strong>$title</strong></font></td>";
	echo "</tr>";
	echo "<tr><td >";
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td><table align=\"center\" width=\"165\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td height=\"5\"></td></tr><tr><td><font class=\"content\">$content</font>";
	echo "</td></tr></table>\n";
	echo "<img src=\"themes/PH2RED/images/pixel.gif\" width=\"4\" height=\"3\">";
	echo "</td></tr></table></td></tr></table>";
}



?>
