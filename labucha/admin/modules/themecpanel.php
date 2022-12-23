<?PHP

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Theme Cpanel (c) by Xtrato, www.xtrato.com                           */
/* Encryption Source Created by Maku, phpnuke.ee
/* Based on original Theme CP by Kenetix, kenetix.net
/*
/* No removing of this copyright notice is allowed.
/************************************************************************/

if (!eregi("admin.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
global $prefix, $db;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1)

 { 


function themecpanel() { 
    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"title\"><b>Theme CPanel</b></font></center>";
    CloseTable();
    echo "<br>";

    OpenTable();
    echo "<font class=\"title\">This theme cpanel allows you to have some administrative control over your theme. Most of the functions are self explanatory. <br><br>
- Left/Right blocks templates: This allows you to choose which block templates you want to use for your blocks. If set to default, blocks.htm will be used. Otherwise it will use the blocks-right.htm or blocks-left.htm template files.<br><br>
- Popup New Private Message: Notifies the user he/she has new private messages the moment the page loads on the site. This only works for all theme pages except the Members List, Forums, and Private Messages. If you wish to disable that you have to go to your forum profile and disable the popup.<br><br>
- Broadcast Message: A global message that appears  Under The header for all pages of the siteite. Similar to broadcast message but it is permanent until deleted.<br><br>
- Forum Left Blocks: Choose weather to display left blocks on all forum pages or hide them for better viewing purposes.<br><br>

Please note that using the <b>&</b> symbol in the links will result to the links URL not working. Use the <b>%26</b> symbol instead.

</font>";
    CloseTable();
    echo "<br>";
//theme links
    OpenTable();
    $result = $db->sql_query("SELECT link1name, link1url, link2name, link2url, link3name, link3url, link4name, link4url, link5name, link5url, themeflash, themesearch, pmpop, leftblockstemp, rightblockstemp, sitelogin, sitemsg, broadcastmsg, clock, forumleftblocks from ".$prefix."_themecpanel");
	list($link1name, $link1url, $link2name, $link2url, $link3name, $link3url, $link4name, $link4url, $link5name, $link5url, $themeflash, $themesearch, $pmpop, $leftblockstemp, $rightblockstemp, $sitelogin, $sitemsg, $broadcastmsg, $clock, $forumleftblocks) = $db->sql_fetchrow($result);

  ///begin layout/// 
    echo "<center><font class='option'>This section allows you to configure your theme settings such as links names and links url for your theme.</font></center>"
	."<form action='admin.php' method='post'>"
	."<table border='0' align=center><tr><td>"
	."Link 1 Name:</td><td><input type='text' name='xlink1name' value='$link1name' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 1 URL:</td><td><input type='text' name='xlink1url' value='$link1url' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 2 Name:</td><td><input type='text' name='xlink2name' value='$link2name' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 2 URL:</td><td><input type='text' name='xlink2url' value='$link2url' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 3 Name:</td><td><input type='text' name='xlink3name' value='$link3name' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 3 URL:</td><td><input type='text' name='xlink3url' value='$link3url' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 4 Name:</td><td><input type='text' name='xlink4name' value='$link4name' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 4 URL:</td><td><input type='text' name='xlink4url' value='$link4url' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 5 Name:</td><td><input type='text' name='xlink5name' value='$link5name' size='60' maxlength='500'>"
	."</td></tr><tr><td>"
	."Link 5 URL:</td><td><input type='text' name='xlink5url' value='$link5url' size='60' maxlength='500'>"
	."<br><br></td></tr><tr><td>"
	."Flash in Theme:</td><td>";
    if ($themeflash==1) {
       echo "<input type='radio' name='xthemeflash' value='1' checked>Yes &nbsp;
        <input type='radio' name='xthemeflash' value='0'>No";
    } else {
        echo "<input type='radio' name='xthemeflash' value='1'>Yes &nbsp;
        <input type='radio' name='xthemeflash' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."Display Search:</td><td>";
    if ($themesearch==1) {
       echo "<input type='radio' name='xthemesearch' value='1' checked>Yes &nbsp;
        <input type='radio' name='xthemesearch' value='0'>No";
    } else {
        echo "<input type='radio' name='xthemesearch' value='1'>Yes &nbsp;
        <input type='radio' name='xthemesearch' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."New Private Message Popup:</td><td>";
    if ($pmpop==1) {
       echo "<input type='radio' name='xpmpop' value='1' checked>Yes &nbsp;
        <input type='radio' name='xpmpop' value='0'>No";
    } else {
        echo "<input type='radio' name='xpmpop' value='1'>Yes &nbsp;
        <input type='radio' name='xpmpop' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"

	."Left Block Template:</td><td>";
    if ($leftblockstemp==2) {
       echo "<input type='radio' name='xleftblockstemp' value='2' checked>Left Blocks Template (blocks-left.htm)<br>
        <input type='radio' name='xleftblockstemp' value='1'>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xleftblockstemp' value='0'>Default Template (blocks.htm)";
    } 
    if ($leftblockstemp==1) {
       echo "<input type='radio' name='xleftblockstemp' value='2' >Left Blocks Template (blocks-left.htm)<br>
        <input type='radio' name='xleftblockstemp' value='1' checked>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xleftblockstemp' value='0'>Default Template (blocks.htm)";
    } 
    if ($leftblockstemp==0) {
        echo "<input type='radio' name='xleftblockstemp' value='2'>Left Blocks Template (blocks-left.html)<br>
        <input type='radio' name='xleftblockstemp' value='1'>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xleftblockstemp' value='0' checked>Default Template (blocks.htm)";
    }
	echo "<br><br></td></tr><tr><td>"
	."Right Block Template:</td><td>";
    if ($rightblockstemp==2) {
       echo "<input type='radio' name='xrightblockstemp' value='2' checked>Left Blocks Template (blocks-right.htm)<br>
        <input type='radio' name='xrightblockstemp' value='1'>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xrightblockstemp' value='0'>Default Template (blocks.htm)";
    } 
    if ($rightblockstemp==1) {
       echo "<input type='radio' name='xrightblockstemp' value='2' >Left Blocks Template (blocks-right.htm)<br>
        <input type='radio' name='xrightblockstemp' value='1' checked>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xrightblockstemp' value='0'>Default Template (blocks.htm)";
    } 
    if ($rightblockstemp==0) {
        echo "<input type='radio' name='xrightblockstemp' value='2'>Left Blocks Template (blocks-right.html)<br>
        <input type='radio' name='xrightblockstemp' value='1'>Right Blocks Template (blocks-right.htm) <br>
        <input type='radio' name='xrightblockstemp' value='0' checked>Default Template (blocks.htm)";
    }
	echo "<br><br></td></tr><tr><td>"
	."Hide Forum Left Blocks:</td><td>";
    if ($forumleftblocks==1) {
       echo "<input type='radio' name='xforumleftblocks' value='1' checked>Yes &nbsp;
        <input type='radio' name='xforumleftblocks' value='0'>No";
    } else {
        echo "<input type='radio' name='xforumleftblocks' value='1'>Yes &nbsp;
        <input type='radio' name='xforumleftblocks' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."Show Login Form:</td><td>";
    if ($sitelogin==1) {
       echo "<input type='radio' name='xsitelogin' value='1' checked>Yes &nbsp;
        <input type='radio' name='xsitelogin' value='0'>No";
    } else {
        echo "<input type='radio' name='xsitelogin' value='1'>Yes &nbsp;
        <input type='radio' name='xsitelogin' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."Show Clock:</td><td>";
    if ($clock==1) {
       echo "<input type='radio' name='xclock' value='1' checked>Yes &nbsp;
        <input type='radio' name='xclock' value='0'>No";
    } else {
        echo "<input type='radio' name='xclock' value='1'>Yes &nbsp;
        <input type='radio' name='xclock' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."Broadcast Message:</td><td>";
    if ($broadcastmsg==1) {
       echo "<input type='radio' name='xbroadcastmsg' value='1' checked>Yes &nbsp;
        <input type='radio' name='xbroadcastmsg' value='0'>No";
    } else {
        echo "<input type='radio' name='xbroadcastmsg' value='1'>Yes &nbsp;
        <input type='radio' name='xbroadcastmsg' value='0' checked>No";
    }
	echo "<br><br></td></tr><tr><td>"
	."Message:<br> (If above checked YES)</td><td><textarea name='xsitemsg' cols='40' rows='5' class='input'>$sitemsg</textarea>"
	."</td></tr><tr><td>";

// save
    echo "</td></tr></table><br><br>";
    echo "<input type='hidden' name='op' value='themecpanelsave'>" //themecpanel save case
	."<center><input type='submit' value='Save Settings'></center>"
	."</form>";
	 CloseTable();
//close2
//links end


//security start
    echo "<br>";
    OpenTable();
    $result = $db->sql_query("SELECT rightclick, rightclick1, disableall, disableall1, sourcecode, clickms from ".$prefix."_themecpanel");
	list($rightclick, $rightclick1, $disableall, $disableall1, $sourcecode, $clickms) = $db->sql_fetchrow($result);
    echo "<center><font class=\"option\"><b>Theme security - allows you to set some simple security control to your theme to limit ripper access.</b></font></center><br><br>";
    echo"<form action='admin.php' method='post'>"
       ."<table border=0 width=100% align=center cellpadding=1 align=\"center\"><tr><td>";
    echo "Disable Rightclick (User/Guest):</td><td>";
    if ($rightclick==1) {
       echo "<input type='radio' name='xrightclick' value='1' checked>Yes &nbsp;
        <input type='radio' name='xrightclick' value='0'>No";
    } else {
        echo "<input type='radio' name='xrightclick' value='1'>Yes &nbsp;
        <input type='radio' name='xrightclick' value='0' checked>No";
    }
    echo "</td></tr><tr><td>";



    echo "Disable Rightclick for Admins:</td><td>";
    if ($rightclick1==1) {
       echo "<input type='radio' name='xrightclick1' value='1' checked>Yes &nbsp;
        <input type='radio' name='xrightclick1' value='0'>No";
    } else {
        echo "<input type='radio' name='xrightclick1' value='1'>Yes &nbsp;
        <input type='radio' name='xrightclick1' value='0' checked>No";
    }
    echo "</td></tr><tr><td>";

    echo "Disable Rightclick Message:</td><td>";
    echo "<input type='text' name='xclickms' value='$clickms' size='40' maxLength='255'>";
    echo "</td></tr><tr><td>";


     echo "Disable Mouse Drag:</td><td>";
    if ($disableall==1) {
       echo "<input type='radio' name='xdisableall' value='1' checked>Yes &nbsp;
        <input type='radio' name='xdisableall' value='0'>No";
    } else {
        echo "<input type='radio' name='xdisableall' value='1'>Yes &nbsp;
        <input type='radio' name='xdisableall' value='0' checked>No";
    }
    echo "</td></tr><tr><td>";

    echo "Disable Mouse Drag for Admins:</td><td>";
    if ($disableall1==1) {
       echo "<input type='radio' name='xdisableall1' value='1' checked>Yes &nbsp;
        <input type='radio' name='xdisableall1' value='0'>No";
    } else {
        echo "<input type='radio' name='xdisableall1' value='1'>Yes &nbsp;
        <input type='radio' name='xdisableall1' value='0' checked>No";
    }
    echo "</td></tr><tr><td>";

    echo "Encrypt Source Code:</td><td>";
    if ($sourcecode==1) {
       echo "<input type='radio' name='xsourcecode' value='1' checked>Yes &nbsp;
        <input type='radio' name='xsourcecode' value='0'>No";
    } else {
        echo "<input type='radio' name='xsourcecode' value='1'>Yes &nbsp;
        <input type='radio' name='xsourcecode' value='0' checked>No";
    }
    echo "</td></tr></table><br><br>";

    echo "<center><input type='hidden' name='op' value='savesecurity'>";
    echo "<input type='submit' value='Save Settings'></center></form><br><br>";
    CloseTable();
//DO NOT REMOVE THE FOLLOWING LINES.
    OpenTable();
    echo "<center><font class=\"title\"><b>Theme CPanel</b><br> Script based on Kenetix CPanel Theme CP <br>Current Theme CPanel script created by Xtrato - http://xtrato.com.<br> Security script add-on and installer for theme cpanel created by Maku - http://PHP-Nuke.ee</font></center>";
    CloseTable();
    echo "<br>";

    include("footer.php");

} //close 2

//security end
//save links
function themecpanelsave($xlink1name, $xlink1url, $xlink2name, $xlink2url, $xlink3name, $xlink3url, $xlink4name, $xlink4url, $xlink5name, $xlink5url, $xthemeflash, $xthemesearch, $xpmpop, $xleftblockstemp, $xrightblockstemp, $xsitelogin, $xsitemsg, $xbroadcastmsg, $xclock, $xforumleftblocks) {
     global $prefix, $dbi, $module_name;

    $xlink1name = htmlentities($xlink1name, ENT_QUOTES);
    $xlink1url = htmlentities($xlink1url, ENT_QUOTES);
    $xlink2name = htmlentities($xlink2name, ENT_QUOTES);
    $xlink2url = htmlentities($xlink2url, ENT_QUOTES);
    $xlink3name = htmlentities($xlink3name, ENT_QUOTES);
    $xlink3url = htmlentities($xlink3url, ENT_QUOTES);
    $xlink4name = htmlentities($xlink4name, ENT_QUOTES);
    $xlink4url = htmlentities($xlink4url, ENT_QUOTES);
    $xlink5name = htmlentities($xlink5name, ENT_QUOTES);
    $xlink5url = htmlentities($xlink5url, ENT_QUOTES);
    $xsitemsg = htmlentities($xsitemsg, ENT_QUOTES);

     sql_query("UPDATE ".$prefix."_themecpanel SET link1name='$xlink1name', link1url='$xlink1url', link2name='$xlink2name', link2url='$xlink2url', link3name='$xlink3name', link3url='$xlink3url', link4name='$xlink4name', link4url='$xlink4url', link5name='$xlink5name', link5url='$xlink5url', themeflash='$xthemeflash', themesearch='$xthemesearch', pmpop='$xpmpop', leftblockstemp='$xleftblockstemp', rightblockstemp='$xrightblockstemp', sitelogin='$xsitelogin', sitemsg='$xsitemsg', broadcastmsg='$xbroadcastmsg', clock='$xclock', forumleftblocks='$xforumleftblocks'", $dbi);
	 Header("Location: admin.php?op=themecpanel");
}
//save links end

//save security
function savesecurity($xrightclick, $xrightclick1, $xdisableall, $xdisableall1, $xsourcecode, $xclickms) {
     global $prefix, $dbi, $module_name;
     sql_query("UPDATE ".$prefix."_themecpanel SET rightclick='$xrightclick', rightclick1='$xrightclick1', disableall='$xdisableall', disableall1='$xdisableall1', sourcecode='$xsourcecode', clickms='$xclickms'", $dbi);
	Header("Location: admin.php?op=themecpanel");

}/**/

//save security end




switch ($op) {
    case "themecpanel":
    themecpanel();
    break;
    case "themecpanelsave":
    themecpanelsave ($xlink1name, $xlink1url, $xlink2name, $xlink2url, $xlink3name, $xlink3url, $xlink4name, $xlink4url, $xlink5name, $xlink5url, $xthemeflash, $xthemesearch, $xpmpop, $xleftblockstemp, $xrightblockstemp, $xsitelogin, $xsitemsg, $xbroadcastmsg, $xclock, $xforumleftblocks);
    break;
    case "savesecurity":
    savesecurity($xrightclick, $xrightclick1, $xdisableall, $xdisableall1, $xsourcecode, $xclickms);
    break;
}


}
else {
    echo "Access Denied";
}
?>