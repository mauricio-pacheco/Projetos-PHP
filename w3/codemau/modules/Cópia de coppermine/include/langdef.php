<?
global $lang_charset, $lang_text_dir;
define("_CHARSET", $lang_charset);
define("CPG_TEXT_DIR", $lang_text_dir);

global $lang_gallery_admin_menu;
define('UPL_APP_LNK', $lang_gallery_admin_menu['upl_app_lnk']);
define('CONFIG_LNK', $lang_gallery_admin_menu['config_lnk']);
define('ALBUMS_LNK', $lang_gallery_admin_menu['albums_lnk']);
define('CATEGORIES_LNK', $lang_gallery_admin_menu['categories_lnk']);
define('USERS_LNK', $lang_gallery_admin_menu['users_lnk']);
define('GROUPS_LNK', $lang_gallery_admin_menu['groups_lnk']);
define('COMMENTS_LNK', $lang_gallery_admin_menu['comments_lnk']);
define('SEARCHNEW_LNK', $lang_gallery_admin_menu['searchnew_lnk']);
define('UTIL_LNK', $lang_gallery_admin_menu['util_lnk']);
define('BAN_LNK', $lang_gallery_admin_menu['ban_lnk']);

global $lang_user_admin_menu;
define('ALBMGR_LNK', $lang_user_admin_menu['albmgr_lnk']);
define('MODIFYALB_LNK', $lang_user_admin_menu['modifyalb_lnk']);
define('MY_PROF_LNK', $lang_user_admin_menu['my_prof_lnk']);

global $lang_main_menu,$lang_search_php,$lang_meta_album_names;
define('ALB_LIST_LNK', $lang_main_menu['alb_list_lnk']);
define('ALB_LIST_TITLE', $lang_main_menu['alb_list_title']);
define('MY_GAL_TITLE', $lang_main_menu['my_gal_title']);
define('MY_GAL_LNK', $lang_main_menu['my_gal_lnk']);
define('MY_PROF_LNK', $lang_main_menu['my_prof_lnk']);
define('ADM_MODE_TITLE', $lang_main_menu['adm_mode_title']);
define('ADM_MODE_LNK', $lang_main_menu['adm_mode_lnk']);
define('USR_MODE_TITLE', $lang_main_menu['usr_mode_title']);
define('USR_MODE_LNK', $lang_main_menu['usr_mode_lnk']);
define('UPL_PIC_TITLE', $lang_main_menu['upload_pic_title']);
define('UPL_PIC_LNK', $lang_main_menu['upload_pic_lnk']);
define('REGISTER_TITLE', $lang_main_menu['register_title']);
define('REGISTER_LNK', _BREG);
define('LOGIN_LNK', _LOGIN);
define('LOGOUT_LNK', _LOGOUT." [".username."]");
define('LASTUP_LNK', $lang_main_menu['lastup_lnk']);
define('LASTUP_TITLE', $lang_meta_album_names['lastup']);
define('LASTCOM_LNK', $lang_main_menu['lastcom_lnk']);
define('LASTCOM_TITLE', $lang_meta_album_names['lastcom']);
define('TOPN_LNK', $lang_main_menu['topn_lnk']);
define('TOPN_TITLE', $lang_meta_album_names['topn']);
define('TOPRATED_LNK', $lang_main_menu['toprated_lnk']);
define('TOPRATED_TITLE', $lang_meta_album_names['toprated']);
define('SEARCH_LNK', _SEARCH);
//if(!defined(SEARCH_PHP))define('SEARCH_PHP', true);
define('SEARCH_TITLE', $lang_search_php[0]);
define('FAV_LNK', $lang_main_menu['fav_lnk']);
define('FAV_TITLE', $lang_meta_album_names['favpics']);
define('HELP_LNK', "<img src=\"$CPG_M_DIR/images/help.gif\"  vspace=\"2\" height=\"20\" width=\"20\" align=\"middle\" alt=\"HELP\"  border=\"0\" />");

global $lang_errors;
/*
$lang_errors = array('access_denied' => 'You don\'t have permission to access this page.',
    'perm_denied' => 'You don\'t have permission to perform this operation.',
    'param_missing' => 'Script called without the required parameter(s).',
    'non_exist_ap' => 'The selected album/picture does not exist !',
    'quota_exceeded' => 'Disk quota exceeded<br /><br />You have a space quota of [quota]K, your pictures currently use [space]K, adding this picture would make you exceed your quota.',
    'gd_file_type_err' => 'When using the GD image library allowed image types are only JPEG and PNG.',
    'invalid_image' => 'The image you have uploaded is corrupted or can\'t be handled by the GD library',
    'resize_failed' => 'Unable to create thumbnail or reduced size image.',
*/
define('NO_IMG_TO_DISPLAY', $lang_errors['no_img_to_display']);
/*
    'non_exist_cat' => 'The selected category does not exist',
    'orphan_cat' => 'A category has a non-existing parent, runs the category manager to correct the problem.',
    'directory_ro' => 'Directory \'%s\' is not writable, pictures can\'t be deleted',
    'non_exist_comment' => 'The selected comment does not exist.',
    'pic_in_invalid_album' => 'Picture is in a non existant album (%s)!?',
    'banned' => 'You are currently banned from using this site.',
    'not_with_udb' => 'This function is disabled in Coppermine because it is integrated with forum software. Either what you are trying to do is not supported in this configuration, or the function should be handled by the forum software.',
    'members_only' => 'This function is for members only, please join.', // changed in cpg1.2.0nuke
    'mustbe_god' => 'This function is only for the site admin. You must be logged in as superadmin, god account to access this function'
    );
*/
global $lang_cat_list;
define('CATEGORY', $lang_cat_list['category']);
define('ALBUMS', $lang_cat_list['albums']);
define('PICTURES', $lang_cat_list['pictures']);

global $lang_album_list;
define('ALBUM_ON_PAGE', $lang_album_list['album_on_page']);

global $lang_thumb_view;
define('SORT_TITLE', $lang_thumb_view['sort_title']); // new in cpg1.2.0nuke
define('SORT_DATE', $lang_thumb_view['date']);
define('SORT_DA', $lang_thumb_view['sort_da']);
define('SORT_DD', $lang_thumb_view['sort_dd']);
define('NAME', $lang_thumb_view['name']);       // new in cpg1.2.0
define('SORT_NA', $lang_thumb_view['sort_na']);
define('SORT_ND', $lang_thumb_view['sort_nd']);
define('TITLE', $lang_thumb_view['title']);     // new in cpg1.2.0
define('SORT_TA', $lang_thumb_view['sort_ta']); // new in cpg1.2.0
define('SORT_TD', $lang_thumb_view['sort_td']); // new in cpg1.2.0
define('RATING', $lang_thumb_view['rating']);    // new in cpg1.2.0nuke
define('SORT_RA', $lang_thumb_view['sort_ra']);  // new in cpg1.2.0nuke
define('SORT_RD', $lang_thumb_view['sort_rd']);  // new in cpg1.2.0nuke
define('PIC_ON_PAGE', $lang_thumb_view['pic_on_page']);
define('USER_ON_PAGE', $lang_thumb_view['user_on_page']);

global $lang_img_nav_bar;
define('THUMB_TITLE', $lang_img_nav_bar['thumb_title']);
define('PIC_INFO_TITLE', $lang_img_nav_bar['pic_info_title']);
define('SLIDESHOW_TITLE', $lang_img_nav_bar['slideshow_title']);
define('SLIDESHOW_DISABLED', $lang_img_nav_bar['slideshow_disabled']); // new in cpg1.2.0nuke
define('SLIDESHOW_DISABLED_MSG', $lang_errors['members_only']);          // new in cpg1.2.0nuke
define('ECARD_TITLE', $lang_img_nav_bar['ecard_title']);
define('ECARD_DISABLED', $lang_img_nav_bar['ecard_disabled']);
define('ECARD_DISABLED_MSG', $lang_img_nav_bar['ecard_disabled_msg']);
define('PREV_TITLE', $lang_img_nav_bar['prev_title']);
define('NEXT_TITLE', $lang_img_nav_bar['next_title']);
define('PIC_POS', $lang_img_nav_bar['pic_pos']);
define('NO_MORE_IMAGES', $lang_img_nav_bar['no_more_images']); // new in cpg1.2.0nuke
define('NO_LESS_IMAGES', $lang_img_nav_bar['no_less_images']);  // new in cpg1.2.0nuke

global $lang_rate_pic;
define('RATE_THIS_PIC', $lang_rate_pic['rate_this_pic']);
define('NO_VOTES', $lang_rate_pic['no_votes']);
define('PIC_RATING', $lang_rate_pic['rating']);
define('RUBBISH', $lang_rate_pic['rubbish']);
define('POOR', $lang_rate_pic['poor']);
define('FAIR', $lang_rate_pic['fair']);
define('GOOD', $lang_rate_pic['good']);
define('EXCELLENT', $lang_rate_pic['excellent']);
define('GREAT', $lang_rate_pic['great']);

global $lang_get_pic_data;
define('N_COMMENTS', $lang_get_pic_data['n_comments']);
define('N_VIEWS', $lang_get_pic_data['n_views']);
define('N_VOTES', $lang_get_pic_data['n_votes']);

if (defined('INDEX_PHP')) {
    global $lang_album_admin_menu;
    define('CONFIRM_DELETE', $lang_album_admin_menu['confirm_delete']);
    define('DELETE', $lang_album_admin_menu['delete']);
    define('MODIFY', $lang_album_admin_menu['modify']);
    define('EDIT_PICS', $lang_album_admin_menu['edit_pics']);
}

if (defined('SEARCHNEW_PHP')) {
    global $lang_search_new_php;
    define('PAGE_TITLE', $lang_search_new_php['page_title']);
    define('SELECT_DIR', $lang_search_new_php['select_dir']);
    define('SELECT_DIR_MSG', $lang_search_new_php['select_dir_msg']);
    define('NO_PIC_TO_ADD', $lang_search_new_php['no_pic_to_add']);
    define('NEED_ONE_ALBUM', $lang_search_new_php['need_one_album']);
    define('WARNING', $lang_search_new_php['warning']);
    define('CHANGE_PERM', $lang_search_new_php['change_perm']);
    define('TARGET_ALBUM', $lang_search_new_php['target_album']);
    define('FOLDER', $lang_search_new_php['folder']);
    define('IMAGE', $lang_search_new_php['image']);
    define('ALBUM', $lang_search_new_php['album']);
    define('RESULT', $lang_search_new_php['result']);
    define('DIR_RO', $lang_search_new_php['dir_ro']);
    define('DIR_CANT_READ', $lang_search_new_php['dir_cant_read']);
    define('INSERT', $lang_search_new_php['insert']);
    define('LIST_NEW_PIC', $lang_search_new_php['list_new_pic']);
    define('INSERT_SELECTED', $lang_search_new_php['insert_selected']);
    define('NO_PIC_FOUND', $lang_search_new_php['no_pic_found']);
    define('BE_PATIENT', $lang_search_new_php['be_patient']);
    define('NOTES', $lang_search_new_php['notes']);
    define('SELECT_ALBUM', $lang_search_new_php['select_album']);
    define('NO_ALBUM', $lang_search_new_php['no_album']);
}

if (defined('DISPLAYIMAGE_PHP')) {
    global $lang_picinfo;
    define('PIC_INFO', $lang_picinfo['title']); // Picture information
/*
    = array(
        'Filename' => 'Filename',
        'Album name' => 'Album name',
        'Rating' => 'Rating (%s votes)',
        'Keywords' => 'Keywords',
        'File Size' => 'File Size',
        'Dimensions' => 'Dimensions',
        'Displayed' => 'Displayed',
        'Camera' => 'Camera',
        'Date taken' => 'Date taken',
        'Aperture' => 'Aperture',
        'Exposure time' => 'Exposure time',
        'Focal length' => 'Focal length',
        'Comment' => 'Comment',
        'addFav' => 'Add to Favorites Album',//different in 1.2.0nuke
        'addFavPhrase' => 'Favorites', // new in cpg1.2.0different in 1.2.0nuke
        'remFav' => 'Remove from Favorites Album',
        'iptcTitle' => 'IPTC Title', // new in cpg1.2.0nuke
        'iptcCopyright' => 'IPTC Copyright', // new in cpg1.2.0nuke
        'iptcKeywords' => 'IPTC Keywords', // new in cpg1.2.0nuke
        'iptcCategory' => 'IPTC Category', // new in cpg1.2.0nuke
        'iptcSubCategories' => 'IPTC Sub Categories', // new in cpg1.2.0nuke
        'bookmark_page' => 'Bookmark Image', // new in cpg1.2.0nuke
        );
*/
}

if (defined('EDITPICS_PHP')) {
    global $lang_editpics_php;
    define('PIC_INFO', $lang_editpics_php['pic_info']);                  // Picture&nbsp;info
    define('ALBUM', $lang_editpics_php['album']);                        // Album
// $lang_thumb_view
//    define('TITLE', $lang_editpics_php['title']);                        // Title
    define('DESCRIPTION', $lang_editpics_php['desc']);                   // Description
    define('KEYWORDS', $lang_editpics_php['keywords']);                  // Keywords
    define('PIC_INFO_STR', $lang_editpics_php['pic_info_str']);          // %sx%s - %sKB - %s views - %s votes
    define('APPROVE', $lang_editpics_php['approve']);                    // Approve picture
    define('POSTPONE_APP', $lang_editpics_php['postpone_app']);          // Postpone approval
    define('DEL_PIC', $lang_editpics_php['del_pic']);                    // Delete picture
    define('READ_EXIF', $lang_editpics_php['read_exif']);                // Read EXIF info again
    define('RESET_VIEW_COUNT', $lang_editpics_php['reset_view_count']);  // Reset view counter
    define('RESET_VOTES', $lang_editpics_php['reset_votes']);            // Reset votes
    define('DEL_COMM', $lang_editpics_php['del_comm']);                  // Delete comments
    define('UPL_APPROVAL', $lang_editpics_php['upl_approval']);          // Upload approval
// $lang_album_admin_menu
    define('EDIT_PICS', $lang_editpics_php['edit_pics']);                // Edit pictures
    define('SEE_NEXT', $lang_editpics_php['see_next']);                  // See next pictures
    define('SEE_PREV', $lang_editpics_php['see_prev']);                  // See previous pictures
    define('N_PIC', $lang_editpics_php['n_pic']);                        // %s pictures
    define('N_OF_PIC_TO_DISP', $lang_editpics_php['n_of_pic_to_disp']);  // Number of picture to display
    define('APPLY', $lang_editpics_php['apply']);                        // Apply modifications
}
?>
