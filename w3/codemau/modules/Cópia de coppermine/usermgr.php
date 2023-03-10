<?php
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Gr?gory DEMAR <gdemar@wanadoo.fr>           //
// http://www.chezgreg.net/coppermine/                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team            //
// (http://coppermine.sf.net/team/)              //
// see /docs/credits.html for details            //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll              //
// http://coppermine.findhere.org/              //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/       //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or    //
// (at your option) any later version.              //
// ------------------------------------------------------------------------- //
define('USERMGR_PHP', true);
define('PROFILE_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (!GALLERY_ADMIN_MODE) cpg_die(ERROR, $lang_errors['access_denied'], __FILE__, __LINE__);

function list_users()
{
    global $CONFIG, $PHP_SELF, $HTTP_GET_VARS, $CPG_URL, $CPG_M_DIR;
    global $lang_usermgr_php, $lang_byte_units, $register_date_fmt;
    global $field_user_id, $field_user_name, $field_user_email, $field_user_regdate, $module_name;

    $sort_codes = array(
        'name_a' => $field_user_name . ' ASC',
        'name_d' => $field_user_name . ' DESC',
        'group_a' => 'group_name ASC',
        'group_d' => 'group_name DESC',
        'reg_a' => $field_user_id.' ASC',
        'reg_d' => $field_user_id.' DESC',
        'pic_a' => 'pic_count ASC',
        'pic_d' => 'pic_count DESC',
        'disku_a' => 'disk_usage ASC',
        'disku_d' => 'disk_usage DESC',
    );

    $sort = (!isset($HTTP_GET_VARS['sort']) || !isset($sort_codes[$HTTP_GET_VARS['sort']])) ? 'reg_d' : $HTTP_GET_VARS['sort'];

    $tab_tmpl = array(
        'left_text' => '<td width="100%%" align="left" valign="middle" class="tableh1_compact" style="white-space: nowrap"><b>' . $lang_usermgr_php['u_user_on_p_pages'] . '</b></td>' . "\n",
        'tab_header' => '',
        'tab_trailer' => '',
        'active_tab' => '<td><img src="' . $CPG_M_DIR . '/images/spacer.gif" width="1" height="1"></td>' . "\n" . '<td align="center" valign="middle" class="tableb_compact"><b>%d</b></td>',
        'inactive_tab' => '<td><img src="' . $CPG_M_DIR . '/images/spacer.gif" width="1" height="1"></td>' . "\n" . '<td align="center" valign="middle" class="navmenu"><a href="' . $CPG_URL . '&file=usermgr&page=%d&sort=' . $sort . '"<b>%d</b></a></td>' . "\n"
    );

    $result = db_query("SELECT count(*) FROM {$CONFIG['TABLE_USERS']} WHERE 1");
    $nbEnr = mysql_fetch_array($result);
    $user_count = $nbEnr[0];
    mysql_free_result($result);

    if (!$user_count) cpg_die(CRITICAL_ERROR, $lang_usermgr_php['err_no_users'], __FILE__, __LINE__);

    $user_per_page = 25;
    $page = isset($HTTP_GET_VARS['page']) ? (int)$HTTP_GET_VARS['page'] : 1;
    $lower_limit = ($page-1) * $user_per_page;
    $total_pages = ceil($user_count / $user_per_page);

    $sql = "SELECT $field_user_id, $field_user_name, $field_user_email, UNIX_TIMESTAMP($field_user_regdate) as user_regdate_cp, group_name, user_active_cp, " .
     "COUNT(pid) as pic_count, ROUND(SUM(total_filesize)/1024) as disk_usage, group_quota " .
     "FROM {$CONFIG['TABLE_USERS']} AS u " .
     "INNER JOIN {$CONFIG['TABLE_USERGROUPS']} AS g ON user_group_cp = group_id " .
     "LEFT JOIN {$CONFIG['TABLE_ALBUMS']} AS a ON category = " . FIRST_USER_CAT . " + $field_user_id " .
     "LEFT JOIN {$CONFIG['TABLE_PICTURES']} AS p ON p.aid = a.aid " .
     "GROUP BY $field_user_id " .
     "ORDER BY " . $sort_codes[$sort] . " " .
     "LIMIT $lower_limit, $user_per_page";

    $result = db_query($sql);

    $tabs = create_tabs($user_count, $page, $total_pages, $tab_tmpl);

    starttable('100%');

    echo '<tr>
    <td class="tableh1" colspan="7"><form method="GET" action="modules.php">
        <input type="hidden" name="name" value="'.$module_name.'">
        <input type="hidden" name="file" value="usermgr">
        <input type="hidden" name="opp" value="edit">
        <b><span class="statlink">'.SEARCH_LNK.' '.$lang_usermgr_php['name'].': </span></b><input type="text" name="user_name" maxlength="25"></form></td>
    </tr>';
    echo <<< EOT
    <tr>
    <td class="tableh1"><b><span class="statlink">{$lang_usermgr_php['name']}</span></b></td>
    <td class="tableh1"><b><span class="statlink">{$lang_usermgr_php['group']}</span></b></td>

    <td class="tableh1" colspan="2" align="center"><b><span class="statlink">{$lang_usermgr_php['operations']}</span></b></td>
    <td class="tableh1" align="center"><b><span class="statlink">{$lang_usermgr_php['pictures']}</span></b></td>
    <td class="tableh1" colspan="2" align="center"><b><span class="statlink">{$lang_usermgr_php['disk_space']}</span></b></td>
    </tr>
EOT;

    while ($user = mysql_fetch_array($result)){
        if ($user['user_active_cp'] == 'NO') $user['group_name'] = '<i>' . $lang_usermgr_php['inactive'] . '</i>';
        $user['user_regdate_cp'] = localised_date($user['user_regdate_cp'], $register_date_fmt);
        if ($user['pic_count']){
            $usr_link_start = '<a href="' . $CPG_URL . '&cat=' . ($user[$field_user_id] + FIRST_USER_CAT) . '" target="_blank">';
            $usr_link_end = '</a>';
        }else{
            $usr_link_start = '';
            $usr_link_end = '';
        }

        echo <<< EOT
    <tr>
    <td class="tableb">$usr_link_start{$user[$field_user_name]}$usr_link_end</td>
    <td class="tableb">{$user['group_name']}</td>

    <td class="tableb" align="center"><div class="admin_menu"><a href="$CPG_URL&file=usermgr&opp=edit&user_id={$user[$field_user_id]}">{$lang_usermgr_php['edit']}</a></div></td>
    <td class="tableb"  align="center"><div class="admin_menu"><a href="$CPG_URL&file=delete&id={$user[$field_user_id]}&what=user"  onclick="return confirm('{$lang_usermgr_php['confirm_del']}');">{$lang_usermgr_php['delete']}</a></div></td>
    <td class="tableb" align="center">{$user['pic_count']}</td>
    <td class="tableb" align="right">{$user['disk_usage']} {$lang_byte_units[1]}</td>
    <td class="tableb" align="right">{$user['group_quota']} {$lang_byte_units[1]}</td>
    </tr>

EOT;
    } // while
    mysql_free_result($result);

    $lb = "<select name=\"album_listbox\" class=\"listbox\" onChange=\"if(this.options[this.selectedIndex].value) window.location.href='" . $CPG_URL . "&file=usermgr&page=$page&sort='+this.options[this.selectedIndex].value;\">\n";
    foreach($sort_codes as $key => $value){
        $selected = ($key == $sort) ? "SELECTED" : "";
        $lb .= "    <option value=\"" . $key . "\" $selected>" . $lang_usermgr_php[$key] . "</option>\n";
    }
    $lb .= "</select>\n";

    echo '<tr><form method="post" action="'.ADDUSER_URL.'">';
    echo <<<EOT
    <td colspan="8" align="center" class="tablef">
    <table cellpadding="0" cellspacing="0">
    <tr>
    <td><input type="submit" value="{$lang_usermgr_php['create_new_user']}" class="button"></td>
    <td><img src="$CPG_M_DIR/images/spacer.gif" width="50" height="1" alt="" /></td>
    <td><b>{$lang_usermgr_php['sort_by']}</b></td>
    <td><img src="$CPG_M_DIR/images/spacer.gif" width="10" height="1" alt="" /></td>
    <td>$lb</td>
    </tr>
    </table>
    </td>
    </form>
    </tr>
    <tr>
    <td colspan="8" style="padding: 0px;">
    <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        $tabs
    </tr>
    </table>
    </td>
    </tr>

EOT;

    endtable();
}

function edit_user($user_id)
{
    global $CONFIG, $PHP_SELF, $CPG_URL;
    global $lang_usermgr_php, $lang_yes, $lang_no;
    global $field_user_id, $field_user_name, $field_user_email;

    $sql = "SELECT $field_user_name, user_active_cp, user_group_cp, user_group_list_cp FROM {$CONFIG['TABLE_USERS']} WHERE $field_user_id = '$user_id'";
    $result = db_query($sql);
    if (!mysql_num_rows($result)) cpg_die(CRITICAL_ERROR, $lang_usermgr_php['err_unknown_user'], __FILE__, __LINE__);
    $user_data = mysql_fetch_array($result);
    mysql_free_result($result);

    starttable(500, $lang_usermgr_php['modify_user'], 2);
    echo "<form method=\"post\" action=\"$CPG_URL&file=usermgr&opp=update&user_id=$user_id\">";

    echo '
    <tr>
        <td width="40%" class="tableb">'.$lang_usermgr_php['name'].'</td>
        <td width="60%" class="tableb">'.$user_data[$field_user_name].'</td>
    </tr>';

    $value = $user_data['user_active_cp'];
    $yes_selected = ($value == 'YES') ? 'selected' : '';
    $no_selected = ($value == 'NO') ? 'selected' : '';
    echo '
    <tr>
        <td class="tableb">'.$lang_usermgr_php['user_active_cp'].'</td>
        <td class="tableb">
            <select name="user_active_cp" class="listbox">
                <option value="YES" '.$yes_selected.'>'.$lang_yes.'</option>
                <option value="NO" '.$no_selected.'>'.$lang_no.'</option>
            </select>
        </td>
    </tr>';

    $sql = "SELECT group_id, group_name FROM {$CONFIG['TABLE_USERGROUPS']} ORDER BY group_name";
    $result = db_query($sql);
    $group_list = db_fetch_rowset($result);
    mysql_free_result($result);

    $sel_group = $user_data['user_group_cp'];
    $user_group_list = split(',', $user_data['user_group_list_cp']);

    echo '
    <tr>
        <td class="tableb">'.$lang_usermgr_php['user_group_cp'].'</td>
        <td class="tableb" valign="top">
            <select name="user_group_cp" class="listbox">';

    $group_cb = '';
    foreach($group_list as $group) {
        echo '                <option value="' . $group['group_id'] . '"' . ($group['group_id'] == $sel_group ? ' selected' : '') . '>' . $group['group_name'] . "</option>\n";
        $checked = (user_ingroup($group['group_id'], $user_group_list)) ? 'checked' : '';
        $group_cb .= '<input name="group_list[]" type="checkbox" value="' . $group['group_id'] . '" ' . $checked . '>' . $group['group_name'] . "<br />\n";
    }

    echo '
            </select><br>
            '.$group_cb.'
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" class="tablef"><input type="submit" value="'.$lang_usermgr_php['modify_user'].'" class="button"></td>
    </form>
    </tr>';

    endtable();
}

function update_user($user_id)
{
    global $CONFIG, $PHP_SELF, $HTTP_POST_VARS;
    global $lang_usermgr_php, $lang_register_php;
    global $field_user_id, $field_user_name, $field_user_email, $field_user_pass;

    $user_active_cp = $HTTP_POST_VARS['user_active_cp'];
    $user_group_cp = $HTTP_POST_VARS['user_group_cp'];
    $group_list = isset($HTTP_POST_VARS['group_list']) ? $HTTP_POST_VARS['group_list'] : '';

    $sql = "SELECT $field_user_id " .
     "FROM {$CONFIG['TABLE_USERS']} " .
     "WHERE $field_user_name = '" . addslashes($username) . "' AND $field_user_id != $user_id";
    $result = db_query($sql);

    if (mysql_num_rows($result)){
        cpg_die(ERROR, $lang_register_php['err_user_exists'], __FILE__, __LINE__);
        return false;
    }
    mysql_free_result($result);
    
    $user_group_list = '';
    if (is_array($group_list)) {
        foreach($group_list as $group) $user_group_list .= ($group != $user_group) ? $group . ',' : '';
        $user_group_list = substr($user_group_list, 0, -1);
    }

    $sql_update = "UPDATE {$CONFIG['TABLE_USERS']} " .
     "SET " .
     "user_active_cp    = '$user_active_cp', " .
     "user_group_cp     = '$user_group_cp', " .
     "user_group_list_cp     = '$user_group_list' " .
     "WHERE $field_user_id = '$user_id'";
    db_query($sql_update);
}

$opp = isset($HTTP_GET_VARS['opp']) ? $HTTP_GET_VARS['opp'] : '';

switch ($opp){
    case 'edit' :
        if (isset($HTTP_GET_VARS['user_name'])) {
            $user_name = substr($HTTP_GET_VARS['user_name'], 0, 25);
            $sql = "SELECT $field_user_id FROM {$CONFIG['TABLE_USERS']} WHERE $field_user_name = '" . $user_name . "'";
            $result = db_query($sql);
            if (mysql_num_rows($result)){
                $user_data = mysql_fetch_array($result);
                $user_id = $user_data[0];
            }
            mysql_free_result($result);
        }
        else $user_id = isset($HTTP_GET_VARS['user_id']) ? (int)$HTTP_GET_VARS['user_id'] : -1;
        if (USER_ID == $user_id && !is_admin($admin)) cpg_die(ERROR, $lang_usermgr_php['err_edit_self'], __FILE__, __LINE__);
        pageheader($lang_usermgr_php['title']);
        edit_user($user_id);
        pagefooter();
        break;

    case 'update' :
        $user_id = isset($HTTP_GET_VARS['user_id']) ? (int)$HTTP_GET_VARS['user_id'] : -1;

        update_user($user_id);

        pageheader($lang_usermgr_php['title']);
        list_users();
        pagefooter();
        break;

    case 'new_user' :
        db_query("INSERT INTO {$CONFIG['TABLE_USERS']}(user_regdate_cp, user_active_cp) VALUES (NOW(), 'YES')");

        $user_id = mysql_insert_id();

        pageheader($lang_usermgr_php['title']);
        edit_user($user_id);
        pagefooter();
        break;

    default :
        pageheader($lang_usermgr_php['title']);
        list_users();
        pagefooter();
        break;
}
include("footer.php");
?>
