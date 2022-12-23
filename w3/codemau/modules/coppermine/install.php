<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2b for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003 Gregory DEMAR <gdemar@wanadoo.fr>                 //
// http://www.chezgreg.net/coppermine/                                       //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify      //
// it under the terms of the GNU General Public License as published by      //
// the Free Software Foundation; either version 2 of the License, or         //
// (at your option) any later version.                                       //
// ------------------------------------------------------------------------- //
if (!isset($name)) {
    $dirname = basename(dirname(__FILE__));
    $name = $dirname;
    chdir("../../");
    $dirlogo = "images";
}
else {
    $dirname = $name;
    $dirlogo = "modules/$name/images";
}

define('INSTALL_PHP', true);
define('NO_HEADER', true);
require("modules/" . $name . "/include/load.inc.php");

$login_url = LOGIN_URL;
if ($dirlogo == "images") {
    $INST_URL = "install.php";
    $CPG_URL = "../../$CPG_URL";
    $login_url = "../../$login_url";
}
else $INST_URL = "$CPG_URL&file=install";

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting (E_ALL ^ E_NOTICE);

echo '<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Coppermine - Installation</title><link type="text/css" rel="stylesheet" href="installer.css">
</head>
<body>
 <div align="center" style="width:600px;">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="maintable">
       <tr>
        <td valign="top" bgcolor="#EFEFEF"><img src="'.$dirlogo.'/logo.gif"><br />
        </td>
       </tr>
      </table><br>';

$phpver = phpversion();
$phpver = "$phpver[0]$phpver[2]";
if ($phpver < 41) {
    echo "You need atleast PHP version 4.1 to use Coppermin 4 Nuke</a>";
    cpgfooter();
    die();
}

// check if user has access
if (!is_admin($admin)) {
    echo "You don't have permission to access this file !<p><a href=\"$login_url\">Login as Admin</a>";
    cpgfooter();
    die();
} 

$installtype = 0; // 0 = new, 1 = 1.1D, 2 = 1.2, 3 = 1.2 RC, 4 = 1.2 RC5, 5 = 1.2.2 / 1.2.2a

// check if this is an upgrade
if (file_exists($CPG_M_DIR."/include/config.inc.php")) {
    require_once($CPG_M_DIR."/include/config.inc.php");
    if ($CONFIG['TABLE_PREFIX']) {
        // CPG 1.1D
        $cpg_prefix = $CONFIG['TABLE_PREFIX'];
        $installtype = 1;
    }
    else $installtype = 2; // CPG 1.2 RC1/2
}
// check if CPG 1.2 RC5 or higher is already installed
$result = $db->sql_query("SELECT * FROM `cpg_installs` WHERE dirname='$dirname'");
if ($result) {
    $row = $db->sql_fetchrow($result);
    if (isset($row[1]) && isset($row[3])) {
        if ($row[1] == $dirname && $row[3] == "1.2.2b") {
            echo '
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="maintable">
       <tr>
        <td class="tableh1" colspan="2"><h2>The installer is locked</h2>
        </td>
       </tr>
       <tr>
        <td class="tableh2" colspan="2" align="center"><span class="error">&#149;&nbsp;&#149;&nbsp;&#149;&nbsp;ERROR&nbsp;&#149;&nbsp;&#149;&nbsp;&#149;</span>
        </td>
       </tr>
       <tr>
        <td class="tableb" colspan="2">The install/upgrade has already been run successfuly for "' . $dirname . '" and is now locked.
        </td>
       </tr>
      </table>';
            cpgfooter();
            die();
        }
    }
    if ($row[1] == $dirname) {
        $cpg_prefix = $row[2];
        if ($row[3] == "1.2.2" || $row[3] == "1.2.2a") { $installtype = 5; }
        elseif ($row[3] == "1.2 RC5") { $installtype = 4; }
        else                          { $installtype = 3; }
    }
}
clearstatcache(); // frees filexists caching

// Show upgrade page ?
if (isset($cpg_prefix) && !isset($_POST['update'])) {
    echo '
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="maintable">
       <tr>
        <td class="tableh1"><h2>Coppermine update</h2>
        </td>
       </tr>
       <tr>
        <td class="tableb" align="center">The installer noticed you are already running Coppermine but it needs to be updated.<br>
          Click below to begin update.
          <form action="'.$INST_URL.'" method="post">
          <input type="hidden" name="table_prefix" value="' . $cpg_prefix . '">
          <input type="hidden" name="update" value="1">
          <input type="submit" value="Update now!">
          </center></form>
        </td>
       </tr>
      </table>';
    cpgfooter();
    die();
} 
// else show install page
else if (!isset($_POST['table_prefix'])) {
    echo '
  <form action="'.$INST_URL.'" method="post"></center>
  Welcome and thanks for your interest in the cool Coppermine Photo Gallery<br>
  Before you can use coppermine setup below settings.
  <table>
    <tr>
      <td>Coppermine tables prefix:</td>
      <td><input type="text" name="table_prefix" maxlength=\"20\" value="nuke_cpg_"></td>
    </tr>
  </table>
  <input type="submit" value="install">
  </center></form>';
    cpgfooter();
    die();
} 
// run installation/upgrade
else {
    $result = $db->sql_query("SELECT * FROM `cpg_installs` WHERE prefix='".$_POST['table_prefix']."'");
    if ($result && $installtype < 3) {
        $row = $db->sql_fetchrow($result);
        if (isset($row['prefix'])) {
            if ($row['prefix'] == $_POST['table_prefix']) {
                echo '
  <form action="'.$INST_URL.'" method="post"></center>
  The installer noticed there\'s already a install with the prefix "'.$_POST['table_prefix'].'"<br>
  Please create a other prefix.
  <table>
    <tr>
      <td>Coppermine tables prefix:</td>
      <td><input type="text" name="table_prefix"></td>
    </tr>
  </table>
  <input type="submit" value="install">
  </center></form>';
                cpgfooter();
                die();
        }   }
    }
    include($CPG_M_DIR."/include/sql_parse.php");

    if ($installtype == 0) {
        $query = '
CREATE TABLE cpg_albums (
  aid int(11) NOT NULL auto_increment,
  title varchar(255) NOT NULL default \'\',
  description text NOT NULL,
  visibility int(11) NOT NULL default \'0\',
  uploads enum(\'YES\',\'NO\') NOT NULL default \'NO\',
  comments enum(\'YES\',\'NO\') NOT NULL default \'YES\',
  votes enum(\'YES\',\'NO\') NOT NULL default \'YES\',
  pos int(11) NOT NULL default \'0\',
  category int(11) NOT NULL default \'0\',
  pic_count int(11) NOT NULL default \'0\',
  thumb int(11) NOT NULL default \'0\',
  last_addition datetime NOT NULL default \'0000-00-00 00:00:00\',
  stat_uptodate enum(\'YES\',\'NO\') NOT NULL default \'NO\',
  PRIMARY KEY  (aid),
  KEY alb_category (category)
) TYPE=MyISAM;

CREATE TABLE cpg_categories (
  cid int(11) NOT NULL auto_increment,
  owner_id int(11) NOT NULL default \'0\',
  catname varchar(255) NOT NULL default \'\',
  description text NOT NULL,
  pos int(11) NOT NULL default \'0\',
  parent int(11) NOT NULL default \'0\',
  subcat_count int(11) NOT NULL default \'0\',
  alb_count int(11) NOT NULL default \'0\',
  pic_count int(11) NOT NULL default \'0\',
  stat_uptodate enum(\'YES\',\'NO\') NOT NULL default \'NO\',
  PRIMARY KEY  (cid),
  KEY cat_parent (parent),
  KEY cat_pos (pos),
  KEY cat_owner_id (owner_id)
) TYPE=MyISAM;

INSERT INTO cpg_categories VALUES (1, 0, \'User galleries\', \'This category contains albums that belong to Coppermine users.\', 0, 0, 0, 0, 0, \'NO\');

CREATE TABLE cpg_comments (
  pid mediumint(10) NOT NULL default \'0\',
  msg_id mediumint(10) NOT NULL auto_increment,
  msg_author varchar(25) NOT NULL default \'\',
  msg_body text NOT NULL,
  msg_date datetime NOT NULL default \'0000-00-00 00:00:00\',
  author_md5_id varchar(32) NOT NULL default \'\',
  author_id int(11) NOT NULL default \'0\',
  msg_raw_ip tinytext,
  msg_hdr_ip tinytext,
  PRIMARY KEY  (msg_id),
  KEY com_pic_id (pid)
) TYPE=MyISAM;

CREATE TABLE cpg_config (
  name varchar(40) NOT NULL default \'\',
  value varchar(255) NOT NULL default \'\',
  PRIMARY KEY  (name)
) TYPE=MyISAM;

INSERT INTO cpg_config VALUES (\'albums_per_page\', \'12\');
INSERT INTO cpg_config VALUES (\'album_list_cols\', \'2\');
INSERT INTO cpg_config VALUES (\'display_pic_info\', \'1\');
INSERT INTO cpg_config VALUES (\'alb_list_thumb_size\', \'50\');
INSERT INTO cpg_config VALUES (\'allowed_file_extensions\', \'GIF/PNG/JPG/JPEG/TIF/TIFF\');
INSERT INTO cpg_config VALUES (\'allowed_img_types\', \'JPG/GIF/PNG/TIFF\');
INSERT INTO cpg_config VALUES (\'allow_private_albums\', \'1\');
INSERT INTO cpg_config VALUES (\'allow_user_registration\', \'0\');
INSERT INTO cpg_config VALUES (\'allow_duplicate_emails_addr\', \'0\');
INSERT INTO cpg_config VALUES (\'caption_in_thumbview\', \'1\');
INSERT INTO cpg_config VALUES (\'charset\', \'language file\');
INSERT INTO cpg_config VALUES (\'cookie_name\', \''.$_POST['table_prefix'].'nuke\');
INSERT INTO cpg_config VALUES (\'cookie_path\', \'/\');
INSERT INTO cpg_config VALUES (\'debug_mode\', \'1\');
INSERT INTO cpg_config VALUES (\'default_dir_mode\', \'0755\');
INSERT INTO cpg_config VALUES (\'default_file_mode\', \'0644\');
INSERT INTO cpg_config VALUES (\'default_sort_order\', \'na\');
INSERT INTO cpg_config VALUES (\'ecards_more_pic_target\', \'http://www.yoursite.com/\');
INSERT INTO cpg_config VALUES (\'enable_smilies\', \'1\');
INSERT INTO cpg_config VALUES (\'filter_bad_words\', \'0\');
INSERT INTO cpg_config VALUES (\'forbiden_fname_char\', \'$/\\\\\\\\:*?&quot;\\\'&lt;&gt;|`\');
INSERT INTO cpg_config VALUES (\'fullpath\', \''.$CPG_M_DIR.'/albums/\');
INSERT INTO cpg_config VALUES (\'gallery_admin_email\', \'you@somewhere.com\');
INSERT INTO cpg_config VALUES (\'gallery_description\', \'Your online photo album\');
INSERT INTO cpg_config VALUES (\'gallery_name\', \'Coppermine Photo Gallery\');
INSERT INTO cpg_config VALUES (\'im_options\', \'-antialias\');
INSERT INTO cpg_config VALUES (\'impath\', \'\');
INSERT INTO cpg_config VALUES (\'jpeg_qual\', \'80\');
INSERT INTO cpg_config VALUES (\'keep_votes_time\', \'30\');
INSERT INTO cpg_config VALUES (\'lang\', \'english\');
INSERT INTO cpg_config VALUES (\'main_page_layout\', \'breadcrumb/catlist/alblist/lastalb,1/lastup,1/lastcom,1/topn,1/toprated,1/random,1/anycontent\');
INSERT INTO cpg_config VALUES (\'main_table_width\', \'100%\');
INSERT INTO cpg_config VALUES (\'make_intermediate\', \'1\');
INSERT INTO cpg_config VALUES (\'max_com_lines\', \'10\');
INSERT INTO cpg_config VALUES (\'max_com_size\', \'512\');
INSERT INTO cpg_config VALUES (\'max_com_wlength\', \'38\');
INSERT INTO cpg_config VALUES (\'max_img_desc_length\', \'512\');
INSERT INTO cpg_config VALUES (\'max_tabs\', \'12\');
INSERT INTO cpg_config VALUES (\'max_upl_size\', \'1024\');
INSERT INTO cpg_config VALUES (\'max_upl_width_height\', \'2048\');
INSERT INTO cpg_config VALUES (\'min_votes_for_rating\', \'1\');
INSERT INTO cpg_config VALUES (\'normal_pfx\', \'normal_\');
INSERT INTO cpg_config VALUES (\'picture_table_width\', \'600\');
INSERT INTO cpg_config VALUES (\'picture_width\', \'400\');
INSERT INTO cpg_config VALUES (\'randpos_interval\', \'5\');
INSERT INTO cpg_config VALUES (\'read_exif_data\', \'0\');
INSERT INTO cpg_config VALUES (\'reg_requires_valid_email\', \'1\');
INSERT INTO cpg_config VALUES (\'subcat_level\', \'2\');
INSERT INTO cpg_config VALUES (\'theme\', \'default\');
INSERT INTO cpg_config VALUES (\'thumbcols\', \'4\');
INSERT INTO cpg_config VALUES (\'thumbrows\', \'3\');
INSERT INTO cpg_config VALUES (\'thumb_method\', \'none\');
INSERT INTO cpg_config VALUES (\'thumb_pfx\', \'thumb_\');
INSERT INTO cpg_config VALUES (\'thumb_width\', \'100\');
INSERT INTO cpg_config VALUES (\'userpics\', \''.$CPG_M_DIR.'/albums/userpics/\');
INSERT INTO cpg_config VALUES (\'user_field1_name\', \'\');
INSERT INTO cpg_config VALUES (\'user_field2_name\', \'\');
INSERT INTO cpg_config VALUES (\'user_field3_name\', \'\');
INSERT INTO cpg_config VALUES (\'user_field4_name\', \'\');
INSERT INTO cpg_config VALUES (\'display_comment_count\', \'0\');
INSERT INTO cpg_config VALUES (\'display_film_strip\', \'1\');
INSERT INTO cpg_config VALUES (\'max_film_strip_items\', \'5\');
INSERT INTO cpg_config VALUES (\'first_level\', \'1\');
INSERT INTO cpg_config VALUES (\'show_private\', \'0\');
INSERT INTO cpg_config VALUES (\'thumb_use\', \'ht\');
INSERT INTO cpg_config VALUES (\'comment_email_notification\', \'0\');
INSERT INTO cpg_config VALUES (\'disable_flood_protection\', \'0\');
INSERT INTO cpg_config VALUES (\'nice_titles\', \'1\');
INSERT INTO cpg_config VALUES (\'advanced_debug_mode\', \'1\');
INSERT INTO cpg_config VALUES (\'seo_alts\', \'0\');
INSERT INTO cpg_config VALUES (\'read_iptc_data\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_favorites\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_filename\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_album_name\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_file_size\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_dimensions\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_count_displayed\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_URL\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_URL_bookmark\', \'1\');
INSERT INTO cpg_config VALUES (\'allow_anon_fullsize\', \'1\');

CREATE TABLE cpg_exif (
  filename varchar(255) NOT NULL default \'\',
  exifData text NOT NULL,
  UNIQUE KEY filename (filename)
) TYPE=MyISAM;

CREATE TABLE cpg_pictures (
  pid int(11) NOT NULL auto_increment,
  aid int(11) NOT NULL default \'0\',
  filepath varchar(255) NOT NULL default \'\',
  filename varchar(255) NOT NULL default \'\',
  filesize int(11) NOT NULL default \'0\',
  total_filesize int(11) NOT NULL default \'0\',
  pwidth smallint(6) NOT NULL default \'0\',
  pheight smallint(6) NOT NULL default \'0\',
  hits int(10) NOT NULL default \'0\',
  mtime timestamp(14) NOT NULL,
  ctime int(11) NOT NULL default \'0\',
  owner_id int(11) NOT NULL default \'0\',
  owner_name varchar(40) NOT NULL default \'\',
  pic_rating int(11) NOT NULL default \'0\',
  votes int(11) NOT NULL default \'0\',
  title varchar(255) NOT NULL default \'\',
  caption text NOT NULL,
  keywords varchar(255) NOT NULL default \'\',
  approved enum(\'YES\',\'NO\') NOT NULL default \'NO\',
  user1 varchar(255) NOT NULL default \'\',
  user2 varchar(255) NOT NULL default \'\',
  user3 varchar(255) NOT NULL default \'\',
  user4 varchar(255) NOT NULL default \'\',
  url_prefix tinyint(4) NOT NULL default \'0\',
  randpos int(11) NOT NULL default \'0\',
  pic_raw_ip tinytext,
  pic_hdr_ip tinytext,
  PRIMARY KEY  (pid),
  KEY pic_hits (hits),
  KEY pic_rate (pic_rating),
  KEY aid_approved (aid,approved),
  KEY randpos (randpos),
  KEY pic_aid (aid),
  FULLTEXT KEY search (title,caption,keywords,filename)
) TYPE=MyISAM;

CREATE TABLE cpg_usergroups (
  group_id int(11) NOT NULL auto_increment,
  group_name varchar(255) NOT NULL default \'\',
  group_quota int(11) NOT NULL default \'0\',
  has_admin_access tinyint(4) NOT NULL default \'0\',
  can_rate_pictures tinyint(4) NOT NULL default \'0\',
  can_send_ecards tinyint(4) NOT NULL default \'0\',
  can_post_comments tinyint(4) NOT NULL default \'0\',
  can_upload_pictures tinyint(4) NOT NULL default \'0\',
  can_create_albums tinyint(4) NOT NULL default \'0\',
  pub_upl_need_approval tinyint(4) NOT NULL default \'1\',
  priv_upl_need_approval tinyint(4) NOT NULL default \'1\',
  PRIMARY KEY  (group_id)
) TYPE=MyISAM;

INSERT INTO cpg_usergroups VALUES (1, \'Administrators\', 0, 1, 1, 1, 1, 1, 1, 0, 0);
INSERT INTO cpg_usergroups VALUES (2, \'Registered\', 1024, 0, 1, 1, 1, 1, 1, 1, 0);
INSERT INTO cpg_usergroups VALUES (3, \'Anonymous\', 0, 0, 1, 0, 0, 0, 0, 1, 1);
INSERT INTO cpg_usergroups VALUES (4, \'Banned\', 0, 0, 0, 0, 0, 0, 0, 1, 1);

CREATE TABLE cpg_votes (
  pic_id mediumint(9) NOT NULL default \'0\',
  user_md5_id varchar(32) NOT NULL default \'\',
  vote_time int(11) NOT NULL default \'0\',
  PRIMARY KEY  (pic_id,user_md5_id)
) TYPE=MyISAM;';
        if (defined('IN_POSTNUKE'))
            $query .= "\nINSERT INTO ".$prefix."_modules VALUES (NULL, '$dirname', 1, '$dirname', 'Coppermine photo gallery', 0, '$dirname', '1.2', 1, 1, 3);";
/*
        else if (defined('IN_OLDNUKE'))
            $query .= "\nINSERT INTO ".$prefix."_modules VALUES (NULL, '$dirname', '$dirname', 0, 0);";
        else
            $query .= "\nINSERT INTO ".$prefix."_modules VALUES (NULL, '$dirname', '$dirname', 0, 0, 1);";
*/
    } // end if new install
    else if ($installtype == 1) {
//        $db_cpg = '../../sql/cpgupgrade.sql';
        $query = '
ALTER TABLE cpg_categories CHANGE `namee` `catname` VARCHAR(255) NOT NULL;

ALTER TABLE cpg_comments add msg_raw_ip tinytext;
ALTER TABLE cpg_comments add msg_hdr_ip tinytext;
ALTER TABLE cpg_pictures add pic_raw_ip tinytext;
ALTER TABLE cpg_pictures add pic_hdr_ip tinytext;

UPDATE cpg_config SET value= \'1\' WHERE name=\'debug_mode\';
INSERT INTO cpg_config VALUES (\'thumb_use\', \'any\');
INSERT INTO cpg_config VALUES (\'show_private\', \'0\');
INSERT INTO cpg_config VALUES (\'first_level\', \'1\');
INSERT INTO cpg_config VALUES (\'display_film_strip\', \'1\');
INSERT INTO cpg_config VALUES (\'max_film_strip_items\', \'5\');
INSERT INTO cpg_config VALUES (\'comment_email_notification\', \'1\');
INSERT INTO cpg_config VALUES (\'nice_titles\', \'1\');
INSERT INTO cpg_config VALUES (\'advanced_debug_mode\', \'1\');
INSERT INTO cpg_config VALUES (\'read_iptc_data\', \'0\');
INSERT INTO cpg_config VALUES (\'picinfo_display_filename\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_album_name\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_file_size\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_dimensions\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_count_displayed\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_URL\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_URL_bookmark\', \'1\');
INSERT INTO cpg_config VALUES (\'picinfo_display_favorites\', \'1\');
INSERT INTO cpg_config VALUES (\'seo_alts\', \'0\');
INSERT INTO cpg_config VALUES (\'reg_notify_admin_email\', \'0\');
INSERT INTO cpg_config VALUES (\'disable_flood_protection\', \'0\');
INSERT INTO cpg_config VALUES (\'allow_anon_fullsize\', \'1\');
UPDATE cpg_config SET value = \'breadcrumb/catlist/alblist/lastalb,1/lastup,1/lastcom,1/topn,1/toprated,1/random,1/anycontent\' WHERE name = \'main_page_layout\';
UPDATE cpg_config SET value = \'default\' WHERE name = \'theme\';
';
    }
    else if ($installtype == 2) {
        $query = '
UPDATE cpg_config SET value= \'1\' WHERE name=\'debug_mode\';
UPDATE cpg_config SET value = \'default\' WHERE name = \'theme\';
      ';
    }
    else if ($installtype == 3) {
        $query = "
ALTER TABLE ".$user_prefix."_users ADD user_group_list_cp VARCHAR(100) DEFAULT '2' NOT NULL AFTER user_group_cp;
UPDATE ".$user_prefix."_users SET user_group_list_cp = '3' WHERE user_group_cp = '3';
UPDATE ".$user_prefix."_users SET user_group_list_cp = '4' WHERE user_group_cp = '4';
      ";
    }
    if ($installtype < 5) {
        $query .= "\nINSERT INTO cpg_config VALUES ('showupdate', '0');";
        $query .= "\nINSERT INTO cpg_config VALUES ('right_blocks', '0');";
    }
    $query = preg_replace('/cpg_/', $_POST['table_prefix'], $query);

    // extra sql part
    $result = $db->sql_query("SELECT * FROM `cpg_installs` WHERE dirname = '$dirname'");
    if (!$result) $query .= "\nCREATE TABLE `cpg_installs` (`cpg_id` TINYINT (3) NOT NULL AUTO_INCREMENT, `dirname` VARCHAR (20) NOT NULL, `prefix` VARCHAR (20) NOT NULL, `version` VARCHAR(10), PRIMARY KEY(`cpg_id`));";
    else $query .= "\nALTER TABLE `cpg_installs` CHANGE `prefix` `prefix` VARCHAR(20) NOT NULL;";

    if ($installtype < 3)
        $query .= "\nINSERT INTO `cpg_installs` VALUES(NULL, '" . $dirname . "', '" . $_POST['table_prefix'] . "', '1.2.2b');";
    else if ($installtype == 3)
        $query .= "\nALTER TABLE cpg_installs ADD version VARCHAR(10);";

    $result = $db->sql_query("SELECT user_group_cp FROM `".$user_prefix."_users` LIMIT 0");
    if (!$result) {
        $query .= "\nALTER TABLE `".$user_prefix."_users` ADD `user_group_cp` INT( 11 ) DEFAULT '2' NOT NULL, ADD `user_active_cp` ENUM( 'YES', 'NO' ) DEFAULT 'YES' NOT NULL;";
        $query .= "\nUPDATE ".$user_prefix."_users SET user_group_cp = '1' WHERE $field_user_id = '2';";
    }
    $result = $db->sql_query("SELECT user_group_list_cp FROM `".$user_prefix."_users` LIMIT 0");
    if (!$result)
        $query .= "\nALTER TABLE `".$user_prefix."_users` ADD `user_group_list_cp` VARCHAR(100) DEFAULT '2' NOT NULL AFTER `user_group_cp`;";
    if ($installtype < 5) {
        $query .= "\nUPDATE ".$user_prefix."_users SET user_group_cp = '3', user_group_list_cp = '3' WHERE $field_user_id = '-1';";
        $query .= "\nUPDATE ".$user_prefix."_users SET user_group_cp = '3', user_group_list_cp = '3' WHERE $field_user_id = '1';";
    }

    $query .= "\nUPDATE cpg_installs SET version = '1.2.2b' WHERE dirname = '$dirname';";

    echo "Check if all queries succeeded <img src=\"$dirlogo/green.gif\" alt=\"Succeed\" title=\"Succeed\"><br>";
    echo "<table border=1>";
    $query = remove_remarks($query);
    $query = split_sql_file($query, ';');

    foreach($query as $q) {
        if (! mysql_query($q)) {
            echo "<tr><td><font size=1>$q<p>mySQL Error: " . mysql_error() . "</font></td><td><img src=\"$dirlogo/red.gif\" alt=\"Failed\" title=\"Failed\"></td></tr>";
        } else echo "<tr><td><font size=1>$q</font></td><td><img src=\"$dirlogo/green.gif\" alt=\"Succeed\" title=\"Succeed\"></tr></tr>";
    } 
    echo "</table>";
    echo "When everything is correct please go to your <a href=\"$CPG_URL&file=config\">Coppermine config screen</a>";

    cpgfooter();
} 

function cpgfooter()
{
    echo '
 </div>
</body>
</html>';
} 
?>
