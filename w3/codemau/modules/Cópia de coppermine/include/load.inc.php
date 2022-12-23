<?php 
//  PHPNuke                                        POSTNuke
if (!eregi("modules.php", $_SERVER['PHP_SELF']) && !defined("LOADED_AS_MODULE") &&
    !$cpg_block && !defined('INSTALL_PHP')) {
    die ("You can't access this file directly...");
}
//define('SILLY_SAFE_MODE', 1);

$CPG_VERSION = '1.2.2b';
if (!$cpg_block) require_once("mainfile.php");
if (!defined('IN_COPPERMINE')) define('IN_COPPERMINE', true);

if (!isset($name)) $name = $GLOBALS['name']; // postnuke

if (!isset($cpg_dir)) $cpg_dir = $name;
$CPG_M_DIR = "modules/" . $cpg_dir;
$CPG_URL = "modules.php?name=" . $cpg_dir;
$CPG_M_URL = $CPG_URL;
$CPG_PROFILE_URL = "modules.php?name=Forums&file=profile&mode=viewprofile&u=";

global $CONFIG, $CURRENT_ALBUM_DATA, $CPG_URL, $cookie;
// language variables not declared global else where
global $lang_user_admin_menu, $lang_gallery_admin_menu, $lang_cat_list,
       $lang_get_pic_data,    $lang_pagetitle_php,      $lang_charset,
       $lang_text_dir,        $lang_byte_units,         $lang_day_of_week,
       $lang_month,           $lang_yes,                $lang_no,
       $lang_back,            $lang_continue,           $lang_info,
       $lang_error,           $album_date_fmt,          $lastcom_date_fmt,
       $lastup_date_fmt,      $lasthit_date_fmt,        $comment_date_fmt,
       $lang_picinfo,         $lang_album_admin_menu;
global $template_tab_display, $template_user_list_info_box, $template_album_admin_menu; // index.php
global $template_img_navbar,  $template_display_picture,    $template_image_rating,
       $template_image_comments, $template_add_your_comment; // displayimage.php
global $template_cpg_die, $template_msg_box; // functions.inc.php
global $template_ecard;                      // displayecard.php
global $template_edit_one_pic;               // editDesc.inc.php
global $field_user_id, $field_user_pass, $field_user_name, $field_user_email;
global $first_install_M_DIR,$CPG_PROFILE_URL,$meta_link;

// load postnuke specific part
if (!isset($Version_Num)) {
    $CPG_URL = "modules.php?op=modload&name=" . $cpg_dir;
    $CPG_M_URL = $CPG_URL."&file=index";
    $CPG_PROFILE_URL = "user.php?op=userinfo&uname=";
    if (!defined('IN_POSTNUKE')) {
        require_once($CPG_M_DIR . "/include/postnuke.php");
    }
} else {
    if (!defined('LOGOUT_URL')) {
        define('LOGOUT_URL', "modules.php?name=Your_Account&op=logout");
        define('LOGIN_URL', "modules.php?name=Your_Account"); //&redirect=$name 
        define('NEWUSER_URL', "modules.php?name=Your_Account&op=new_user");
        define('ADDUSER_URL', "admin.php?op=mod_users");
//        define('ADDUSER_URL', "modules.php?name=Your_Account&file=admin&op=addUser");
        define('USERPROF_URL', "modules.php?name=Your_Account&op=edituser");
    }
    $module_name = $name;
    $field_user_regdate = "user_regdate";
    $field_user_avatar = "user_avatar";
    // get_lang($module_name);
    // load phpnuke 5.5-6.0 specific part
    if ($Version_Num[0] < 6 || $Version_Num == "6.0") {
        global $dbi;
        if (!defined('IN_OLDNUKE')) {
            require_once($CPG_M_DIR . "/include/oldnuke.php");
        }
    } 
    // load phpnuke 6.5+ specific part
    else {
        $field_user_id = "user_id";
        $field_user_name = "username";
        $field_user_pass = "user_password";
        $field_user_email = "user_email";
    }
} 

if (!defined('INSTALL_PHP')) {
    // load required settings for this install
    $result = $db->sql_fetchrow($db->sql_query("SELECT prefix, dirname FROM cpg_installs WHERE dirname='$cpg_dir'"));
    if (!$result || $result[1] != $cpg_dir) {
        $error = "The coppermine module \"$cpg_dir\" isn't installed/upgraded yet. <br>Go to ";
        if (defined('IN_POSTNUKE')) $error .= "modules.php?op=modload&name=$cpg_dir&file=install to proceed.";
        else $error .= "modules.php?name=$cpg_dir&file=install to proceed.";
        die ($error);
    }
    $cpg_prefix = $result[0];

// $first_install_M_DIR gets the first installs module directory is used for language detection 
// can be used for other file that are not required to be different between installs
$result = $db->sql_fetchrow($db->sql_query("SELECT dirname FROM cpg_installs WHERE  cpg_id=1"));
$first_install_M_DIR = "modules/" .$result[0];

    require($CPG_M_DIR . '/include/init.inc.php');

    if (!defined('NO_HEADER') && !defined('IN_POSTNUKE')) {
        // Set nice page title
        $pagetitle = "> ".$CONFIG['gallery_name'];
        $sql = "SELECT value FROM " . $cpg_prefix . "config WHERE name='nice_titles'";
        $value = $db->sql_fetchrow($db->sql_query($sql));
        if ($value[0]) {
            $breadcrumb = array();
            if (is_numeric($album) && $album > 0) {
                $result = db_query("SELECT aid AS id, title, category AS parent FROM {$CONFIG['TABLE_ALBUMS']} WHERE aid = ".$album);
                if (mysql_num_rows($result) > 0) {
                    $breadcrumb[] = mysql_fetch_array($result);
                    mysql_free_result($result);
                }
            }
            else if (is_numeric($cat) && $cat > 0) {
                if ($cat > FIRST_USER_CAT) {
                    $result = db_query("SELECT $field_user_name AS title FROM {$CONFIG['TABLE_USERS']} WHERE $field_user_id = " . ($cat - FIRST_USER_CAT));
                    if (mysql_num_rows($result) != 0) {
                        $row = mysql_fetch_array($result);
                        $row['id'] = $cat;
                        $row['parent'] = 1;
                        $breadcrumb[] = $row;
                        mysql_free_result($result);
                    }
                }
                else {
                    $result = db_query("SELECT cid as id, parent, catname AS title FROM {$CONFIG['TABLE_CATEGORIES']} WHERE cid='$cat'");
                    if (mysql_num_rows($result) > 0) {
                        $breadcrumb[] = mysql_fetch_array($result);
                        mysql_free_result($result);
                    }
                }
            }
            get_breadcrumb($breadcrumb);
            foreach($breadcrumb as $crumb) {
                $pagetitle .= " > ".$crumb['title'];
            }
            if (!is_numeric($album)) switch ($album) {
                case 'lastup':
                case 'lastcom':
                case 'topn':
                case 'toprated':
                case 'search':
                case 'random':
                    $pagetitle .= " > ".$lang_meta_album_names[$album];
                    break;
            }else {
            //sorted by code
            }
            if ($pagetitle == "") $pagetitle = "> ".$CONFIG['gallery_name'];
        }
        else $pagetitle = "> ".$CONFIG['gallery_name'];
    }
}
?>
