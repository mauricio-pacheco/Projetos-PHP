<?php

/********************************************************/
/* NSN Banner Ads                                       */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if (stristr($_SERVER['PHP_SELF'], "banners2.php") || stristr($_SERVER['SCRIPT_NAME'], "banners2.php")) {
    Header("Location: ../index.php");
    die();
}

$modname = "Banner_Ads";
get_lang($modname);
require_once("mainfile.php");

global $prefix, $db, $admin, $adminmail, $sitename, $nukeurl;
$testdate = date ("Y-m-d");
$bresult = $db->sql_query("SELECT bid FROM ".$prefix."_nsnba_banners WHERE pid='2' AND active='1'");
$numrows = $db->sql_numrows($bresult);
if ($numrows>0) {
    if ($numrows==1) {
        list ($bannum) = $db->sql_fetchrow($bresult);
    } else if ($numrows>1) {
        $i = 1;
        while (list ($id) = $db->sql_fetchrow($bresult)) {
            $abid[$i] = $id;
            $i++;
        }
        $bannum = $abid[rand(1, $numrows)];
    }
} else {
    $bannum = 0;
}
if (!is_admin($admin)) { $db->sql_query("UPDATE ".$prefix."_nsnba_banners SET impmade=impmade+1 WHERE bid='$bannum'"); }
if ($numrows>0) {
    $bidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_nsnba_banners WHERE pid='2' AND active='1' AND bid='$bannum'"));
    $cidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_nsnba_clients WHERE cid='".$bidinfo['cid']."'"));

    if (($bidinfo['imptotal'] <= $bidinfo['impmade']) AND ($bidinfo['imptotal'] != 0)) {
        $db->sql_query("UPDATE ".$prefix."_nsnba_banners SET active='0' WHERE bid='$bannum'");
        $fecha = date("F jS Y, h:iA.");
        $subject  = _BA_BANSTATAT." $sitename";
        $message  = _BA_COMPSTAT." $sitename:\n\n";
        $message .= _BA_CONNME.": ".$cidinfo['name']."\n";
        $message .= _BA_BANNUM.": $bannum\n";
        $message .= _BA_IMGSRC.": $nukeurl/".$bidinfo['imageurl']."\n";
        $message .= _BA_CLKU.": ".$bidinfo['clickurl']."\n\n";
        $message .= _BA_IMPPUR.": ".$bidinfo['imptotal']."\n";
        $message .= _BA_IMPMAD.": ".$bidinfo['impmade']."\n";
        $message .= _BA_CLKS.": ".$bidinfo['clicks']."\n";
        $message .= _BA_REPORTON.": $fecha";
        $from = "$sitename <$adminmail>";
        mail($cidinfo['email'], $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
    }

    if (($testdate > $bidinfo['dateend']) AND ($bidinfo['dateend'] != "0000-00-00")) {
        $db->sql_query("UPDATE ".$prefix."_nsnba_banners SET active='0' WHERE bid='$bannum'");
        $fecha = date("F jS Y, h:iA.");
        $subject  = _BA_BANSTATAT." $sitename";
        $message  = _BA_COMPSTAT." $sitename:\n\n";
        $message .= _BA_CONNME.": ".$cidinfo['name']."\n";
        $message .= _BA_BANNUM.": $bannum\n";
        $message .= _BA_IMGSRC.": $nukeurl/".$bidinfo['imageurl']."\n";
        $message .= _BA_CLKU.": ".$bidinfo['clickurl']."\n\n";
        $message .= _BA_IMPMAD.": ".$bidinfo['impmade']."\n";
        $message .= _BA_CLKS.": ".$bidinfo['clicks']."\n";
        $message .= _BA_STRDTE.": ".$bidinfo['datestr']."\n";
        $message .= _BA_ENDDTE.": ".$bidinfo['dateend']."\n";
        $message .= _BA_REPORTON.": $fecha";
        $from = "$sitename <$adminmail>";
        mail($cidinfo['email'], $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
    }

    if ($bidinfo['flash']==1 AND $bidinfo['code']==0) {
        $tbanners2 .= "\n <SCRIPT src=\"2.js\"></SCRIPT><SCRIPT language=javascript>carregaFlash('".$bidinfo['imageurl']."','".$bidinfo['width']."','".$bidinfo['height']."');</SCRIPT>";
        } elseif ($bidinfo['flash']==0 AND $bidinfo['code']==1) {
        $fp = fopen ($bidinfo['imageurl'], "rb");
        $contents = fread ($fp, filesize ($bidinfo['imageurl']));
        fclose ($fp);
        $tbanners2  = "$contents";
    } else {
        $tbanners2  = "<a href='clicks.php?bid=$bannum' target='_blank'><img src='".$bidinfo['imageurl']."' border='0' alt='".$bidinfo['alttext']."' title='".$bidinfo['alttext']."' height='".$bidinfo['height']."' width='".$bidinfo['width']."'></a>";
    }
} else {
    $tbanners2  = "<a href='modules.php?name=$modname'><img src='modules/$modname/images/ban-banner-2.png' border='0' alt='$sitename' title='$sitename'></a>";
}
$bresult3 = $db->sql_query("SELECT bid, datestr FROM ".$prefix."_nsnba_banners WHERE pid='2' AND active='-1'");
$numrows3 = $db->sql_numrows($bresult3);
if ($numrows3>0) {
    while (list ($id, $datestr) = $db->sql_fetchrow($bresult3)) {
        if (($testdate >= $datestr) AND ($datestr != "0000-00-00")) {
            $db->sql_query("UPDATE ".$prefix."_nsnba_banners SET active='1' WHERE bid='$id'");
        }
    }
}

?>
