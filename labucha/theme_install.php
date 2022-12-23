<?php

require_once("mainfile.php");
global $admin;
if(!is_array($admin)) {
    $adm = base64_decode($admin);
    $adm = explode(":", $adm);
    $aname = "$adm[0]";
} else {
    $aname = "$admin[0]";
}
$index=1;
$adm_info = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_authors WHERE aid='$aname'"));
if ($adm_info['radminsuper']==1) {

//installer title
$pagename = "Theme Cpanel";

switch($op) {

    default:
        $pagetitle = $pagename;
        include("header.php");
        title("$pagetitle");
        OpenTable();
        echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
        echo "<tr><td align='center'>This script will Install SQL tables or Destall SQL tables for $pagename.</td></tr>\n";
        echo "<tr><td align='center'><b>Backup data tables before proceeding!</b></td></tr>\n";
        echo "<tr><td align='center'><b>Proceed at your own risk. Kenetix will not be responsible for anything that happens to your nuke site!</b></td></tr>\n";
        echo "<tr><td align='center'><select name='op'>\n";
        echo "<option value='install'>Install $pagename SQL</option>\n";
        echo "<option value='destall'>Destall $pagename SQL</option>\n";
        echo "</select> <input type='submit' value='COMMIT'></td></tr>\n";
        echo "</form>";
        echo "</table>\n";
        CloseTable();
        include("footer.php");
    break;


    case "install":
//title of page for installer
        $pagetitle = "$pagename: Install Theme CPanel";
        include("header.php");
        title("$pagetitle");
        OpenTable();
        echo "Operation Results:<br>\n";
        echo "<hr>\n";
        $result = $db->sql_query("DROP TABLE IF EXISTS ".$prefix."_thememail");
        $result = $db->sql_query("DROP TABLE IF EXISTS ".$prefix."_themecpanel");
        $result = $db->sql_query("CREATE TABLE ".$prefix."_themecpanel (
        sitemsg text NOT NULL,
        link1name text NOT NULL,
        link1url text NOT NULL,
        link2name text NOT NULL,
        link2url text NOT NULL,
        link3name text NOT NULL,
        link3url text NOT NULL,
        link4name text NOT NULL,
        link4url text NOT NULL,
        link5name text NOT NULL,
        link5url text NOT NULL,
        broadcastmsg tinyint(1) NOT NULL default '0',
        forumleftblocks tinyint(1) NOT NULL default '0',
        clock tinyint(1) NOT NULL default '0',
        sitelogin tinyint(1) NOT NULL default '0',
        themeflash tinyint(1) NOT NULL default '0',
        themesearch tinyint(1) NOT NULL default '0',
        pmpop tinyint(1) NOT NULL default '0',
        leftblockstemp tinyint(1) NOT NULL default '0',
        rightblockstemp tinyint(1) NOT NULL default '0',
        rightclick tinyint(1) NOT NULL default '0',
        rightclick1 tinyint(1) NOT NULL default '0',
        disableall tinyint(1) NOT NULL default '0',
        disableall1 tinyint(1) NOT NULL default '0',
        sourcecode tinyint(1) NOT NULL default '0',
        clickms varchar(255) DEFAULT 'Your text here!' NOT NULL
        ) TYPE=MyISAM");

        if (!$result) { echo "- Create ".$prefix."_themecpanel failed<br>\n"; } else { echo "- Create ".$prefix."_themecpanel succeeded<br>\n"; }
 //insert values - also if fail, display msg
       $db->sql_query("INSERT INTO ".$prefix."_themecpanel VALUES ('Your message. HTML code may be used.', 'HOME', 'index.php', 'DOWNLOADS', 'modules.php?name=Downloads', 'LINKS', 'modules.php?name=Web_Links', 'CONTENT', 'modules.php?name=Content', 'ACCOUNT', 'modules.php?name=Your_Account', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,'Your text here!')");

//display results
        if (!$result) { echo "- Insert into ".$prefix."_themecpanel failed<br>\n"; } else { echo "- Insert into ".$prefix."_themecpanel succeeded<br>\n"; }

        echo "<hr>\n";
        echo "<b>Theme CPanel is successfully aaded in database.<br>Please <font color=#ff0000>delete</font> this file from your server <b>immediatly</b> for security reasons!<br><br><br><center>Click on the icon below to config Theme Cpanel.<br><br><a href=\"admin.php?op=themecpanel\"><img src=\"images/admin/themecpanel.gif\" border=0></a></center>";
        CloseTable();
        include("footer.php");

//calls footer
    break;


//destaller - change required fields
    case "destall":
        $pagetitle = "$pagename: Destall";
        include("header.php");
        title("$pagetitle");
        OpenTable();
        echo "Operation Results:<br>\n";
        echo "<hr>\n";
        $result = $db->sql_query("DROP TABLE IF EXISTS ".$prefix."_themecpanel");
        if (!$result) { echo "- Destall ".$prefix."_themecpanel failed<br>\n"; } else { echo "- Destall ".$prefix."_themecpanel succeeded<br>\n"; }
        echo "<hr>\n";
        echo "Operation Complete<br>\n";
        echo _GOBACK."\n";
        CloseTable();
        include("footer.php");
    break;


}

} else {
    $pagetitle = "$pagename: ERROR";
    include("header.php");
    title("$pagetitle");
    OpenTable();
    echo "<center><b>Sorry, ONLY super admins may run this script. If you have no clue what a super user is, just run along and play ball.</b><center>\n";
    CloseTable();
    include("footer.php");
}





?>