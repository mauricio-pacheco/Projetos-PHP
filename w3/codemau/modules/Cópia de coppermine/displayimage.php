<?php
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>       //
// http://www.chezgreg.net/coppermine/      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team//
// (http://coppermine.sf.net/team/)  //
// see /docs/credits.html for details//
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll  //
// http://coppermine.findhere.org/  //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/       //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or//
// (at your option) any later version.      //
// ------------------------------------------------------------------------- //
define('DISPLAYIMAGE_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if ($CONFIG['enable_smilies']) include($CPG_M_DIR . "/include/smilies.inc.php");
$breadcrumb_text = '';
$cat_data = array();
if ($CONFIG['read_exif_data'] && function_exists('exif_read_data')) {
    include($CPG_M_DIR . "/include/exif_php.inc.php");
} elseif ($CONFIG['read_exif_data']) {
    cpg_die(CRITICAL_ERROR, 'PHP running on your server does not support reading EXIF data in JPEG files, please turn this off on the config page', __FILE__, __LINE__);
}
if ($CONFIG['read_iptc_data']) {
    include($CPG_M_DIR . "/include/iptc.inc.php");
}
/**
 * Local functions definition
 */
function html_picture_menu($id)
{
    global $lang_display_image_php, $CPG_URL;
    return <<<EOT
<br><div align="center" class="admin_menu"><a href="$CPG_URL&file=editOnePic&id=$id&what=picture"  class="admin_menu">{$lang_display_image_php['edit_pic']}</a>
<a href="$CPG_URL&file=delete&id=$id&what=picture"  class="adm_menu" onclick="return confirm('{$lang_display_image_php['confirm_del']}');">{$lang_display_image_php['del_pic']}</a></div>
EOT;
}
// Prints the image-navigation menu
function html_img_nav_menu()
{
    global $CONFIG, $HTTP_SERVER_VARS, $HTTP_GET_VARS, $CURRENT_PIC_DATA, $PHP_SELF, $CPG_URL;
    global $album, $cat, $pos, $pic_count, $lang_img_nav_bar, $template_img_navbar, $lang_errors;
    $cat_link = is_numeric($album) ? '' : '&cat=' . $cat;
    $human_pos = $pos + 1;
    $page = ceil(($pos + 1) / ($CONFIG['thumbrows'] * $CONFIG['thumbcols']));
    $pid = $CURRENT_PIC_DATA['pid'];
    if ($pos > 0) {
        $prev = $pos - 1;
        $prev_tgt = $CPG_URL . "&file=displayimage&album=$album$cat_link&pos=$prev";
        $prev_title = $lang_img_nav_bar['prev_title'];
    } else {
        $prev_tgt = "javascript:alert('" . addslashes($lang_img_nav_bar['no_less_images']) . "');";
        $prev_title = $lang_img_nav_bar['no_less_images'];
    }
    if ($pos < ($pic_count -1)) {
        $next = $pos + 1;
        $next_tgt = $CPG_URL . "&file=displayimage&album=$album$cat_link&pos=$next";
        $next_title = $lang_img_nav_bar['next_title'];
    } else {
        $next_tgt = "javascript:alert('" . addslashes($lang_img_nav_bar['no_more_images']) . "');";
        $next_title = $lang_img_nav_bar['no_more_images'];
    }
    if ((USER_CAN_SEND_ECARDS) && (USER_ID or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN)) {
        $ecard_tgt = $CPG_URL . "&file=ecard&album=$album$cat_link&pid=$pid&pos=$pos";
        $ecard_title = $lang_img_nav_bar['ecard_title'];
    } else {
        $ecard_tgt = "javascript:alert('" . addslashes($lang_img_nav_bar['ecard_disabled_msg']) . "');";
        $ecard_title = $lang_img_nav_bar['ecard_disabled'];
    }
    $thumb_tgt = $CPG_URL . "&file=thumbnails&album=$album&page=$page"; //$cat_link&page=$page
    // Only show the slideshow to registered user, admin, or if admin allows anon access to full size images
    if (USER_ID or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN) {
        $slideshow_tgt = $CPG_URL . "&file=displayimage&album=$album$cat_link&pid=$pid&slideshow=5000";
        $slideshow_title = $lang_img_nav_bar['slideshow_title'];
    } else {
        $slideshow_tgt = "javascript:alert('" . addslashes($lang_img_nav_bar['slideshow_disabled_msg']) . "');";
        $slideshow_title = $lang_errors['members_only'];
    }

    $pic_pos = sprintf($lang_img_nav_bar['pic_pos'], $human_pos, $pic_count);
    $params = array('{THUMB_TGT}' => $thumb_tgt,
//                '{THUMB_TITLE}' => $lang_img_nav_bar['thumb_title'],
//                '{PIC_INFO_TITLE}' => $lang_img_nav_bar['pic_info_title'],
                '{SLIDESHOW_TGT}' => $slideshow_tgt,
                '{SLIDESHOW_TITLE}' => $slideshow_title,
                '{PIC_POS}' => $pic_pos,
                '{ECARD_TGT}' => $ecard_tgt,
                '{ECARD_TITLE}' => $ecard_title,
                '{PREV_TGT}' => $prev_tgt,
                '{PREV_TITLE}' => $prev_title,
                '{NEXT_TGT}' => $next_tgt,
                '{NEXT_TITLE}' => $next_title,
    );
    return template_eval($template_img_navbar, $params);
}

// Displays a picture
function html_picture()
{
    global $CONFIG, $CURRENT_PIC_DATA, $CURRENT_ALBUM_DATA, $USER, $HTTP_COOKIE_VARS, $CPG_URL, $CPG_M_DIR;
    global $album, $comment_date_fmt, $template_display_picture;
    global $lang_display_image_php, $lang_picinfo, $lang_config_data, $lang_errors;
    $pid = $CURRENT_PIC_DATA['pid'];
    // $ina is where the Registered Only picture is
    $ina = "$CPG_M_DIR/images/ina.jpg";
    // Check for anon picture viewing - only for registered user, admin, or if admin allows anon access to full size images
    if (USER_ID > 1 or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN) {
        // Add 1 to hit counter unless the user reloaded the page
        if (!isset($USER['liv']) || !is_array($USER['liv'])) {
            $USER['liv'] = array();
        }
        // Add 1 to hit counter
        if ($album != "lasthits" && !in_array($pid, $USER['liv']) && isset($HTTP_COOKIE_VARS[$CONFIG['cookie_name'] . '_data'])) {
            add_hit($pid);
            if (count($USER['liv']) > 4) array_shift($USER['liv']);
            array_push($USER['liv'], $pid);
        }
        if ($CONFIG['make_intermediate'] && max($CURRENT_PIC_DATA['pwidth'], $CURRENT_PIC_DATA['pheight']) > $CONFIG['picture_width']) {
            $picture_url = get_pic_url($CURRENT_PIC_DATA, 'normal');
        } else {
		    $picture_url = get_pic_url($CURRENT_PIC_DATA, 'fullsize');
        }
        if ($CONFIG['thumb_method']=='none'){
	        $picture_url = get_pic_url($CURRENT_PIC_DATA, 'fullsize');
        }
	        
        $picture_menu = ((USER_ADMIN_MODE && $CURRENT_ALBUM_DATA['category'] == FIRST_USER_CAT + USER_ID) || GALLERY_ADMIN_MODE) ? html_picture_menu($pid) : '';
        $image_size = compute_img_size($CURRENT_PIC_DATA['pwidth'], $CURRENT_PIC_DATA['pheight'], $CONFIG['picture_width']);
        $pic_title = '';
        if ($CURRENT_PIC_DATA['title'] != '') {
            $pic_title .= $CURRENT_PIC_DATA['title'] . "\n";
        }
        if ($CURRENT_PIC_DATA['caption'] != '') {
            $pic_title .= $CURRENT_PIC_DATA['caption'] . "\n";
        }
        if ($CURRENT_PIC_DATA['keywords'] != '') {
            $pic_title .= $lang_picinfo['Keywords'] . ": " . $CURRENT_PIC_DATA['keywords'];
        }
        if (isset($image_size['reduced'])) {
            $CONFIG['justso']=0;
            if ($CONFIG['justso']) {
                //include('jspw.js');
                $winsizeX = $CURRENT_PIC_DATA['pwidth']+ 16;
                $winsizeY = $CURRENT_PIC_DATA['pheight']+ 16;
                $hug = 'hug image';
                $hugwidth = '4';
                $bgclr = '#000000';
                $alt = 'Click na imagem para fechar a janela'; // $lang_fullsize_popup[1];
                $pic_html = "<a href=\"$CPG_URL&amp;file=justsofullsize&amp;pid=$pid\" target=\"" . uniqid(rand()) . "\" onClick=\"JustSoPicWindow('$CPG_URL&file=justsofullsize&pid=$pid','$winsizeX','$winsizeY','$alt','$bgclr','$hug','$hugwidth');return false\">";
            } else {
                $winsizeX = $CURRENT_PIC_DATA['pwidth'] + 16;
                $winsizeY = $CURRENT_PIC_DATA['pheight'] + 16;
                $pic_html = "<a href=\"$CPG_URL&file=displayimagepopup&pid=$pid&fullsize=1\" target=\"" . uniqid(rand()) . "\" onClick=\"MM_openBrWindow('$CPG_URL&file=displayimagepopup&pid=$pid&fullsize=1','" . uniqid(rand()) . "','resizable=yes,scrollbars=yes,width=$winsizeX,height=$winsizeY,left=0,top=0');return false\">"; //toolbar=yes,status=yes,
                $pic_title = $lang_display_image_php['view_fs'] . "\n ============== \n" . $pic_title; //added by gaugau
            }
            $pic_html .= "<img src=\"" . $picture_url . "\" {$image_size['geom']} class=\"image\" border=\"0\" alt=\"{$pic_title}\" title=\"{$pic_title}\" /><br />";
            $pic_html .= "</a>\n";
        } else {
            $pic_html = "<img src=\"" . $picture_url . "\" {$image_size['geom']} alt=\"{$pic_title}\" title=\"{$pic_title}\" class=\"image\" border=\"0\" /><br />\n";
        }
        if (!$CURRENT_PIC_DATA['title'] && !$CURRENT_PIC_DATA['caption']) {
            template_extract_block($template_display_picture, 'img_desc');
        } else {
            if (!$CURRENT_PIC_DATA['title']) {
                template_extract_block($template_display_picture, 'title');
            }
            if (!$CURRENT_PIC_DATA['caption']) {
                template_extract_block($template_display_picture, 'caption');
            }
        }
    } else {
        $imagesize = getimagesize($ina);
        $image_size = compute_img_size($imagesize[0], $imagesize[1], $CONFIG['picture_width']);
        $pic_html = '<a href="' .NEWUSER_URL. '">';
        $pic_html .= "<img src=\"" . $ina . "\" {$image_size['geom']} alt=\"Click to register\" title=\"Click to register\" class=\"image\" border=\"0\" /></a><br />";
        $picture_menu = "";
        $CURRENT_PIC_DATA['title'] = $lang_errors['members_only'];
        $CURRENT_PIC_DATA['caption'] = '';
    }
    $params = array('{CELL_HEIGHT}' => '100',
        '{IMAGE}' => $pic_html,
        '{ADMIN_MENU}' => $picture_menu,
        '{TITLE}' => $CURRENT_PIC_DATA['title'],
        '{CAPTION}' => bb_decode($CURRENT_PIC_DATA['caption']),
    );
    return template_eval($template_display_picture, $params);
}

function html_rating_box()
{
    global $CONFIG, $CURRENT_PIC_DATA, $CURRENT_ALBUM_DATA, $CPG_URL;
    global $template_image_rating, $lang_rate_pic;
    if (!(USER_CAN_RATE_PICTURES && $CURRENT_ALBUM_DATA['votes'] == 'YES')) return '';
    $votes = $CURRENT_PIC_DATA['pic_rating'] ? sprintf($lang_rate_pic['rating'], round($CURRENT_PIC_DATA['pic_rating'] / 2000, 1), $CURRENT_PIC_DATA['votes']) : $lang_rate_pic['no_votes'];
    $pid = $CURRENT_PIC_DATA['pid'];
    $params = array(
//        '{TITLE}' => $lang_rate_pic['rate_this_pic'],
        '{VOTES}' => $votes,
        '{RATE0}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=0",
        '{RATE1}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=1",
        '{RATE2}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=2",
        '{RATE3}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=3",
        '{RATE4}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=4",
        '{RATE5}' => $CPG_URL . "&file=ratepic&pic=$pid&rate=5",
//        '{RUBBISH}' => $lang_rate_pic['rubbish'],
//        '{POOR}' => $lang_rate_pic['poor'],
//        '{FAIR}' => $lang_rate_pic['fair'],
//        '{GOOD}' => $lang_rate_pic['good'],
//        '{EXCELLENT}' => $lang_rate_pic['excellent'],
//        '{GREAT}' => $lang_rate_pic['great'],
    );
    if (USER_ID or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN) {
        return template_eval($template_image_rating, $params);
    }
}
// Display picture information
function html_picinfo()
{
    global $CONFIG, $CURRENT_PIC_DATA, $CURRENT_ALBUM_DATA, $THEME_DIR, $FAVPICS, $CPG_URL, $CPG_M_DIR;
    global $album, $lang_picinfo, $lang_display_image_php, $lang_byte_units;
    if ($CURRENT_PIC_DATA['owner_id'] && $CURRENT_PIC_DATA['owner_name']) {
        $owner_link = '<a href ="modules.php?name=Forums&file=profile&mode=viewprofile&u=' . $CURRENT_PIC_DATA['owner_id'] . '">' . $CURRENT_PIC_DATA['owner_name'] . '</a> ';
    } else {
        $owner_link = '';
    }
    if (GALLERY_ADMIN_MODE && $CURRENT_PIC_DATA['pic_raw_ip']) {
        if ($CURRENT_PIC_DATA['pic_hdr_ip']) {
            $ipinfo = ' (' . $CURRENT_PIC_DATA['pic_hdr_ip'] . '[' . $CURRENT_PIC_DATA['pic_raw_ip'] . ']) / ';
        } else {
            $ipinfo = ' (' . $CURRENT_PIC_DATA['pic_raw_ip'] . ') / ';
        }
    } else {
        if ($owner_link) {
            $ipinfo = '/ ';
        } else {
            $ipinfo = '';
        }
    }
    if ($CONFIG['picinfo_display_filename']) {
        $info[$lang_picinfo['Filename']] = htmlspecialchars($CURRENT_PIC_DATA['filename']);
    }
    // -----------------------------------------------------------------
    // Added by Vitor Freitas on 2003-09-01.
    // Hack version: 1.1
    // Display the name of the user that upload the image whit the image information.
    // Modified by DJ Maze for CPG 1.2 RC4
    global $db, $field_user_name, $field_user_id;

    $vf_sql = "SELECT $field_user_name FROM " . $CONFIG['TABLE_USERS'] . " WHERE $field_user_id='" . $CURRENT_PIC_DATA['owner_id'] . "'";
    $vf_result = $db->sql_query($vf_sql);
    $vf_row = $db->sql_fetchrow($vf_result);
    // if statement added by gtroll
    // only display if there is a value
    if ($vf_row != '') {
        $info['Upload by'] = '<a href="modules.php?name=Forums&file=profile&mode=viewprofile&u=' . $CURRENT_PIC_DATA['owner_id'] . '" target="_blank">' . $vf_row[$field_user_name] . '</a>';
    }
    // End -- Vitor Freitas on 2003-08-29.
    // -----------------------------------------------------------------
    if ($CONFIG['picinfo_display_album_name']) {
        $info[$lang_picinfo['Album name']] = '<span class="alblink"><a href="' . $CPG_URL . '&file=thumbnails&album=' . $CURRENT_PIC_DATA['aid'] . '">' . $CURRENT_ALBUM_DATA['title'] . '</a></span>';
    }
    if ($CURRENT_PIC_DATA['votes'] > 0) {
        $info[sprintf($lang_picinfo['Rating'], $CURRENT_PIC_DATA['votes'])] = '<img src="' . $CPG_M_DIR . '/images/rating' . round($CURRENT_PIC_DATA['pic_rating'] / 2000) . '.gif" align="absmiddle"/>';
    }
    if ($CURRENT_PIC_DATA['keywords'] != "") {
        $info[$lang_picinfo['Keywords']] = '<span class="alblink">' . preg_replace("/(\S+)/", "<a href=\"$CPG_URL&file=thumbnails&album=search&search=\\1\">\\1</a>" , $CURRENT_PIC_DATA['keywords']) . '</span>';
    }
    //$info[test] = "SELECT pid FROM {$CONFIG['TABLE_PICTURES']} AS p INNER JOIN {$CONFIG['TABLE_ALBUMS']} ON visibility IN (".USER_IN_GROUPS.") WHERE p.pid='".$CURRENT_PIC_DATA['pid']."' GROUP BY pid LIMIT 1";
    for ($i = 1; $i <= 4; $i++) {
        if ($CONFIG['user_field' . $i . '_name']) {
            if ($CURRENT_PIC_DATA['user' . $i] != "") {
                $info[$CONFIG['user_field' . $i . '_name']] = cpg_make_clickable($CURRENT_PIC_DATA['user' . $i]);
            }
        }
    }
    $info[$lang_picinfo['File Size']] = ($CURRENT_PIC_DATA['filesize'] > 10240 ? ($CURRENT_PIC_DATA['filesize'] >> 10) . ' ' . $lang_byte_units[1] : $CURRENT_PIC_DATA['filesize'] . ' ' . $lang_byte_units[0]);
    if ($CONFIG['picinfo_display_file_size']) {
        $info[$lang_picinfo['File Size']] = '<span dir="LTR">' . $info[$lang_picinfo['File Size']] . '</span>';
    }
    if ($CONFIG['picinfo_display_dimensions']) {
        $info[$lang_picinfo['Dimensions']] = sprintf($lang_display_image_php['size'], $CURRENT_PIC_DATA['pwidth'], $CURRENT_PIC_DATA['pheight']);
    }
    if ($CONFIG['picinfo_display_dimensions']) {
        $info[$lang_picinfo['Displayed']] = sprintf($lang_display_image_php['views'], $CURRENT_PIC_DATA['hits']);
    }
    $path_to_pic = $CURRENT_PIC_DATA['filepath'] . $CURRENT_PIC_DATA['filename'];
    if ($CONFIG['read_exif_data']) $exif = exif_parse_file($path_to_pic);
    if (isset($exif) && is_array($exif)) {
        if (isset($exif['Camera'])) $info[$lang_picinfo['Camera']] = $exif['Camera'];
        if (isset($exif['DateTaken'])) $info[$lang_picinfo['Date taken']] = $exif['DateTaken'];
        if (isset($exif['Aperture'])) $info[$lang_picinfo['Aperture']] = $exif['Aperture'];
        if (isset($exif['ExposureTime'])) $info[$lang_picinfo['Exposure time']] = $exif['ExposureTime'];
        if (isset($exif['FocalLength'])) $info[$lang_picinfo['Focal length']] = $exif['FocalLength'];
        if (isset($exif['Comment'])) $info[$lang_picinfo['Comment']] = $exif['Comment'];

    }
    // Create the absolute URL for display in info
    if (($CONFIG['picinfo_display_URL']) || ($CONFIG['picinfo_display_URL_bookmark'])) {
        if ($CONFIG['picinfo_display_URL_bookmark']) {
            $info["URL"] = <<<JSCT
<a href="{$CONFIG["ecards_more_pic_target"]}$CPG_URL&file=displayimage&pos=-{$CURRENT_PIC_DATA["pid"]}" onClick="addBookmark('{$CURRENT_PIC_DATA["filename"]}','{$CONFIG["ecards_more_pic_target"]}$CPG_URL&file=displayimage&pos=-{$CURRENT_PIC_DATA["pid"]}');return false">{$lang_picinfo["bookmark_page"]}</a>
JSCT;
        } else {
            $info['URL'] = '<a href=' . $CONFIG["ecards_more_pic_target"] . $CPG_URL . "&file=displayimage&pos=-$CURRENT_PIC_DATA[pid]" . ' >' . $CONFIG["ecards_more_pic_target"] . $CPG_URL . "&file=displayimage&pos=-$CURRENT_PIC_DATA[pid]" . '</a>';
        }
    }

    if ($CONFIG['read_iptc_data']) $iptc = get_IPTC($path_to_pic);

    if (isset($iptc) && is_array($iptc)) {
        if (isset($iptc['Title'])) $info[$lang_picinfo['iptcTitle']] = trim($iptc['Title']);
        if (isset($iptc['Copyright'])) $info[$lang_picinfo['iptcCopyright']] = trim($iptc['Copyright']);
        if (isset($iptc['Keywords'])) $info[$lang_picinfo['iptcKeywords']] = trim(implode(" ",$iptc['Keywords']));
        if (isset($iptc['Category'])) $info[$lang_picinfo['iptcCategory']] = trim($iptc['Category']);
        if (isset($iptc['SubCategories'])) $info[$lang_picinfo['iptcSubCategories']] = trim(implode(" ",$iptc['SubCategories']));
    }
    // with subdomains the variable is $_SERVER["SERVER_NAME"] does not return the right value instead of using a new config variable I reused $CONFIG["ecards_more_pic_target"] with trailing slash in the configure
    // Create the add to fav link
    if ($CONFIG['picinfo_display_favorites']) {
        if (!in_array($CURRENT_PIC_DATA['pid'], $FAVPICS)) {
            $info[$lang_picinfo['addFavPhrase']] = '<a href="' . $CPG_URL . '&file=addfav&pid=' . $CURRENT_PIC_DATA['pid'] . '" >' . $lang_picinfo['addFav'] . '</a>';
        } else {
            $info[$lang_picinfo['addFavPhrase']] = '<a href="' . $CPG_URL . '&file=addfav&pid=' . $CURRENT_PIC_DATA['pid'] . '" >' . $lang_picinfo['remFav'] . '</a>';
        }
    }
    if (USER_ID or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN) {
        return theme_html_picinfo($info);
    }
}
// Displays comments for a specific picture
function html_comments($pid)
{
    global $CONFIG, $USER, $CURRENT_ALBUM_DATA, $comment_date_fmt, $HTML_SUBST, $username;
    global $template_image_comments, $template_add_your_comment, $lang_display_comments;
    $html = '';
    if (!$CONFIG['enable_smilies']) {
        $tmpl_comment_edit_box = template_extract_block($template_image_comments, 'edit_box_no_smilies', '{EDIT}');
        template_extract_block($template_image_comments, 'edit_box_smilies');
        template_extract_block($template_add_your_comment, 'input_box_smilies');
    } else {
        $tmpl_comment_edit_box = template_extract_block($template_image_comments, 'edit_box_smilies', '{EDIT}');
        template_extract_block($template_image_comments, 'edit_box_no_smilies');
        template_extract_block($template_add_your_comment, 'input_box_no_smilies');
    }
    $tmpl_comments_buttons = template_extract_block($template_image_comments, 'buttons', '{BUTTONS}');
    $tmpl_comments_ipinfo = template_extract_block($template_image_comments, 'ipinfo', '{IPINFO}');
    $result = db_query("SELECT msg_id, msg_author, msg_body, UNIX_TIMESTAMP(msg_date) AS msg_date, author_id, author_md5_id, msg_raw_ip, msg_hdr_ip FROM {$CONFIG['TABLE_COMMENTS']} WHERE pid='$pid' ORDER BY msg_id ASC");
    while ($row = mysql_fetch_array($result)) {
        $user_can_edit = (GALLERY_ADMIN_MODE) || (USER_ID && USER_ID == $row['author_id'] && USER_CAN_POST_COMMENTS) || (!USER_ID && USER_CAN_POST_COMMENTS && ($USER['ID'] == $row['author_md5_id']));
        $comment_buttons = $user_can_edit ? $tmpl_comments_buttons : '';
        $comment_edit_box = $user_can_edit ? $tmpl_comment_edit_box : '';
        $comment_ipinfo = ($row['msg_raw_ip'] && GALLERY_ADMIN_MODE)?$tmpl_comments_ipinfo : '';
        if ($CONFIG['enable_smilies']) {
            $comment_body = process_smilies(cpg_make_clickable($row['msg_body']));
            $smilies = generate_smilies("f{$row['msg_id']}", 'msg_body');
        } else {
            $comment_body = cpg_make_clickable($row['msg_body']);
            $smilies = '';
        }
        $params = array('{EDIT}' => &$comment_edit_box,
            '{BUTTONS}' => &$comment_buttons,
            '{IPINFO}' => &$comment_ipinfo
        );
        $template = template_eval($template_image_comments, $params);
        $params = array('{MSG_AUTHOR}' => $row['msg_author'],
            '{MSG_ID}' => $row['msg_id'],
            '{EDIT_TITLE}' => &$lang_display_comments['edit_title'],
            '{CONFIRM_DELETE}' => &$lang_display_comments['confirm_delete'],
            '{MSG_DATE}' => localised_date($row['msg_date'], $comment_date_fmt),
            '{MSG_BODY}' => &$comment_body,
            '{MSG_BODY_RAW}' => $row['msg_body'],
            '{OK}' => &$lang_display_comments['OK'],
            '{SMILIES}' => $smilies,
            '{HDR_IP}' => $row['msg_hdr_ip'],
            '{RAW_IP}' => $row['msg_raw_ip'],
        );
        $html .= template_eval($template, $params);
    }
    if (USER_CAN_POST_COMMENTS && $CURRENT_ALBUM_DATA['comments'] == 'YES') {
        if (USER_ID) {
            $username_input = '<input type="hidden" name="msg_author" value="' . username . '">';
            template_extract_block($template_add_your_comment, 'username_input', $username_input);
            // $username = '';
        } else {
            $username = isset($USER['name']) ? '"' . strtr($USER['name'], $HTML_SUBST) . '"' : '"' . $lang_display_comments['your_name'] . '" onClick="javascript:this.value=\'\';"';
        }

        $params = array('{ADD_YOUR_COMMENT}' => $lang_display_comments['add_your_comment'],
            // Modified Name and comment field
            '{NAME}' => $lang_display_comments['name'],
            '{COMMENT}' => $lang_display_comments['comment'],
            '{PIC_ID}' => $pid,
            '{username}' => $username,
            '{MAX_COM_LENGTH}' => $CONFIG['max_com_size'],
            '{OK}' => $lang_display_comments['OK'],
            '{SMILIES}' => '',
        );
        if ($CONFIG['enable_smilies']) $params['{SMILIES}'] = generate_smilies();
        $html .= template_eval($template_add_your_comment, $params);
    }
    if (USER_ID or $CONFIG['allow_anon_fullsize'] or USER_IS_ADMIN) {
        return $html;
    }
}

function slideshow()
{
    global $CONFIG, $HTTP_GET_VARS, $lang_display_image_php, $template_display_picture, $CPG_M_DIR, $CPG_URL;
    if (function_exists('theme_slideshow')) {
        theme_slideshow();
        return;
    }
    pageheader($lang_display_image_php['slideshow']);
    include $CPG_M_DIR . "/include/slideshow.inc.php";
    $start_slideshow = '<script language="JavaScript" type="text/JavaScript">runSlideShow()</script>';
    template_extract_block($template_display_picture, 'img_desc', $start_slideshow);
    if ($CONFIG['thumb_method']=='none'){
	    $params = array('{CELL_HEIGHT}' => $CONFIG['picture_width'] + 100,
                    '{IMAGE}' => '<img src="' . $start_img . '" width="' . $CONFIG['picture_width'] . '" name="SlideShow" class="image" /><br />',
        '{ADMIN_MENU}' => '',);
    }else{
	    $params = array('{CELL_HEIGHT}' => $CONFIG['picture_width'] + 100,
                    '{IMAGE}' => '<img src="' . $start_img . '" name="SlideShow" class="image" /><br />',
        '{ADMIN_MENU}' => '',);
	}
    starttable();
    echo template_eval($template_display_picture, $params);
    endtable();
    starttable();
    echo <<<EOT
        <tr>
        <td align="center" class="navmenu" style="white-space: nowrap;">
        <a href="javascript:endSlideShow()" class="navmenu">{$lang_display_image_php['stop_slideshow']}</a>
        </td>
        </tr>
EOT;
    endtable();
    pagefooter();
}

/**
 * Main code
 */
global $lang_list_categories;
$pos = isset($HTTP_GET_VARS['pos']) ? $HTTP_GET_VARS['pos'] : 0;
$album = isset($HTTP_GET_VARS['album']) ? $HTTP_GET_VARS['album'] : '';

// START NEW
$cat = isset($HTTP_GET_VARS['cat']) ? (int)$HTTP_GET_VARS['cat'] : '';
// $thisalbum is passed to get_pic_data as a varible used in queries 
// to limit meta queries to the current album or category
// $meta_link is passed to theme.php to be included in the link in main_menu.inc.php
$meta_link = '&cat=0';
$thisalbum = "category >= '0'";//just something that is true
if ($cat<0) { //  && $cat<0 Meta albums, we need to restrict the albums to the current category
    $actual_album = -$cat;
    $meta_link = 'cat='.$actual_album;
    $thisalbum = 'a.aid = '.$actual_album;
}
else if ($cat){
    if ($cat == USER_GAL_CAT) {
        $meta_link = '&cat='. $cat;
        $thisalbum = 'category > ' . FIRST_USER_CAT;
    } elseif ((!is_numeric($album))&&(is_numeric($cat))) {
        $meta_link = '&cat='. $cat;
        if ($cat > 0) $thisalbum = "category = '$cat'";
    } else if (is_numeric($album)) {
        $meta_link = "&album=". $album;
        $thisalbum= "a.aid = $album";
    }
} else if (is_numeric($album)) {
        $meta_link = "&album=". $album;
        $thisalbum= "a.aid = $album";
}
define('META_LNK',$meta_link);
// END NEW

// Retrieve data for the current picture
if ($pos < 0) {
    $pid = - $pos;

    // modified by DJMaze
    $result = db_query("SELECT p.aid FROM {$CONFIG['TABLE_PICTURES']} AS p INNER JOIN {$CONFIG['TABLE_ALBUMS']} ON (".VIS_GROUPS.") WHERE approved = 'YES' AND p.pid=".$pid." GROUP BY p.pid LIMIT 1");

    //this doesn't work
    if (mysql_num_rows($result) == 0) {
        cpg_die(ERROR, $lang_errors['non_exist_ap'], __FILE__, __LINE__);
    }
    $row = mysql_fetch_array($result);

    // this doesn't work either
    if ($row[0] == ''){
          cpg_die(ERROR, $lang_errors['members_only']);
    }
    $album = $row['aid'];
    mysql_free_result($result); //added by gtroll
    $pic_data = get_pic_data($album, $pic_count, $album_name, -1, -1, false);
    for($pos = 0; $pic_data[$pos]['pid'] != $pid && $pos < $pic_count; $pos++);
    $pic_data = get_pic_data($album, $pic_count, $album_name, $pos, 1, false);
    $CURRENT_PIC_DATA = $pic_data[0];
} else if (isset($HTTP_GET_VARS['pos'])){
    $pic_data = get_pic_data($album, $pic_count, $album_name, $pos, 1, false);

    if ($pic_count == 0) {
        cpg_die(INFORMATION, $lang_errors['members_only'], __FILE__, __LINE__);
    }

    elseif (count($pic_data) == 0 && $pos >= $pic_count) {
        $pos = $pic_count - 1;
        $human_pos = $pos + 1;
        $pic_data = get_pic_data($album, $pic_count, $album_name, $pos, 1, false);
    }

    $CURRENT_PIC_DATA = $pic_data[0];
    if ($pic_count == 0) {
        cpg_die(INFORMATION, $lang_errors['members_only'], __FILE__, __LINE__);
    }
}
// Retrieve data for the current album
if (isset($CURRENT_PIC_DATA)) {
    $result = db_query("SELECT title, comments, votes, category FROM {$CONFIG['TABLE_ALBUMS']} WHERE aid='{$CURRENT_PIC_DATA['aid']}' LIMIT 1");
    if (!mysql_num_rows($result)) cpg_die(CRITICAL_ERROR, sprintf($lang_errors['pic_in_invalid_album'], $CURRENT_PIC_DATA['aid']), __FILE__, __LINE__);
    $CURRENT_ALBUM_DATA = mysql_fetch_array($result);
}
// slideshow control
if (isset($HTTP_GET_VARS['slideshow'])) {
    slideshow();
} else {
    if (!isset($HTTP_GET_VARS['pos'])) cpg_die(ERROR, $lang_errors['non_exist_ap'], __FILE__, __LINE__);
    $picture_title = $CURRENT_PIC_DATA['title'] ? $CURRENT_PIC_DATA['title'] : strtr(preg_replace("/(.+)\..*?\Z/", "\\1", htmlspecialchars($CURRENT_PIC_DATA['filename'])), "_", " ");
    $nav_menu = html_img_nav_menu();
    $picture = html_picture();
    $votes = html_rating_box();
    $pic_info = html_picinfo();
    $comments = html_comments($CURRENT_PIC_DATA['pid']);
    pageheader($album_name . '/' . $picture_title, '', false);
    // Display Breadcrumbs
    set_breadcrumb(0);
    // Display Filmstrip if the album is not search
    if ($album != 'search') {
        $film_strip = display_film_strip($album, (isset($cat) ? $cat : 0), $pos, true);
    }
    theme_display_image($nav_menu, $picture, $votes, $pic_info, $comments, $film_strip); //,
    pagefooter();
}
include("footer.php");
?>