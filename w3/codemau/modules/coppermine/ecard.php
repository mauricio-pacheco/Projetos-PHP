<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
define('ECARDS_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (!USER_CAN_SEND_ECARDS) cpg_die(ERROR, $lang_errors['access_denied'], __FILE__, __LINE__);
// ecard security fix
// $max_anon_ecards = (!isset($_COOKIE['ecard'])?1:($_COOKIE['ecard']);
$max_anon_ecards = 1;
// if (!isset($_COOKIE['ecard'])){
if (($_COOKIE['ecard'] != 0) && (USER_ID != 1)) {
    setcookie('ecard', $max_anon_ecards); //,time()+60*60*24,'/'
} 
// }
require($CPG_M_DIR . "/include/smilies.inc.php");
require($CPG_M_DIR . "/include/mailer.inc.php");

function get_post_var($name, $default = '')
{
    global $HTTP_POST_VARS;
    return isset($HTTP_POST_VARS[$name]) ? $HTTP_POST_VARS[$name] : $default;
} 

$pid = (int)$HTTP_GET_VARS['pid'];
$album = $HTTP_GET_VARS['album'];
$pos = (int)$HTTP_GET_VARS['pos'];
$meta_link = "&album=". $album;
$thisalbum= "a.aid = $album";
define('META_LNK',$meta_link);
$sender_name = get_post_var('sender_name', USER_ID ? username : (isset($USER['name']) ? $USER['name'] : ''));
$sender_email = get_post_var('sender_email', USER_ID ? $USER_DATA[$field_user_email] : (isset($USER['email']) ? $USER['email'] : ''));
$recipient_name = get_post_var('recipient_name');
$recipient_email = get_post_var('recipient_email');
$greetings = get_post_var('greetings');
$message = get_post_var('message');
$sender_email_warning = '';
$recipient_email_warning = '';

$result = mysql_query("SELECT * FROM {$CONFIG['TABLE_PICTURES']} AS p INNER JOIN {$CONFIG['TABLE_ALBUMS']} ON visibility IN (0,".USER_IN_GROUPS.") WHERE pid='$pid' GROUP BY pid");
if (!mysql_num_rows($result)) cpg_die(ERROR, $lang_errors['non_exist_ap']);
$row = mysql_fetch_array($result);
if ($CONFIG['thumb_method']=='none'){
	$thumb_pic_url = get_pic_url($row, 'fullsize') . '" width="'.$CONFIG['thumb_width'];
}else{
	$thumb_pic_url = get_pic_url($row, 'thumb');
}
// Check supplied email address
$valid_email_pattern = "^[_\.0-9a-z\-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$";
$valid_sender_email = eregi($valid_email_pattern, $sender_email);
$valid_recipient_email = eregi($valid_email_pattern, $recipient_email);
$invalid_email = '<font size="1">' . $lang_ecard_php['invalid_email'] . '</font>';
if (!$valid_sender_email && count($HTTP_POST_VARS) > 0) $sender_email_warning = $invalid_email;
if (!$valid_recipient_email && count($HTTP_POST_VARS) > 0) $recipient_email_warning = $invalid_email;
// Create and send the e-card
if (count($HTTP_POST_VARS) > 0 && $valid_sender_email && $valid_recipient_email) {
    $gallery_dir = strtr(dirname($PHP_SELF), '\\', '/');
    $gallery_url_prefix = $CONFIG['ecards_more_pic_target'];

    if ($CONFIG['make_intermediate'] && max($row['pwidth'], $row['pheight']) > $CONFIG['picture_width']) {
        $n_picname = get_pic_url($row, 'normal');
    } else {
        $n_picname = get_pic_url($row, 'fullsize');
    } 
    //alterado por malves1982
    if ($CONFIG['thumb_method']=='none'){
	    $n_picname = get_pic_url($row, 'fullsize');
    }

    if (!stristr($n_picname, 'http:')) $n_picname = $CONFIG['ecards_more_pic_target'] . "$n_picname";

    $msg_content = nl2br(process_smilies($message, $gallery_url_prefix));

    $data = array('rn' => $HTTP_POST_VARS['recipient_name'],
        'sn' => $HTTP_POST_VARS['sender_name'],
        'se' => $HTTP_POST_VARS['sender_email'],
        'p' => $n_picname,
        'g' => $greetings,
        'm' => $message,
        );

    $encoded_data = urlencode(base64_encode(serialize($data)));

    $params = array('{LANG_DIR}' => CPG_TEXT_DIR,
        '{TITLE}' => sprintf($lang_ecard_php['ecard_title'], $sender_name),
        '{CHARSET}' => $CONFIG['charset'] == 'language file' ? _CHARSET : $CONFIG['charset'],
        '{VIEW_ECARD_TGT}' => $CONFIG['ecards_more_pic_target'] . $CPG_URL . "&file=displayecard&data=$encoded_data",
        '{VIEW_ECARD_LNK}' => $lang_ecard_php['view_ecard'],
        '{PIC_URL}' => $n_picname,
        '{URL_PREFIX}' => $gallery_url_prefix,
        '{GREETINGS}' => $greetings,
        '{MESSAGE}' => $msg_content,
        '{SENDER_EMAIL}' => $sender_email,
        '{SENDER_NAME}' => $sender_name,
        '{VIEW_MORE_TGT}' => $CONFIG['ecards_more_pic_target'] . $CPG_URL,
        '{VIEW_MORE_LNK}' => $lang_ecard_php['view_more_pics'],
        '{PIC_WIDTH}' => $CONFIG['picture_width'],
        );

    $message = template_eval($template_ecard, $params);

    $subject = sprintf($lang_ecard_php['ecard_title'], $sender_name);
    $result = cpg_mail($recipient_email, $subject, $message, 'text/html', $sender_name, $sender_email);

    if (!USER_ID) {
        $USER['name'] = $sender_name;
        $USER['email'] = $sender_email;
    } 

    if ($result) {
        pageheader($lang_ecard_php['title'], "<META http-equiv=\"refresh\" content=\"3;url=" . $CPG_URL . "&file=displayimage&album=$album&pos=$pos\">");
        msg_box($lang_cpg_die[INFORMATION], $lang_ecard_php['send_success'], $lang_continue, $CPG_URL . "&file=displayimage&album=$album&pos=$pos");
        pagefooter();
        exit;
    } else {
        cpg_die(ERROR, $lang_ecard_php['send_failed'], __FILE__, __LINE__);
    } 
} 
pageheader($lang_ecard_php['title']);
starttable("100%");

echo <<<EOT
        <tr>
                <td colspan="3" class="tableh1"><h2>{$lang_ecard_php['title']}</h2></td>
        </tr>
        <tr>
                <td class="tableh2" colspan="2"><b>{$lang_ecard_php['from']}</b></td>
                <td rowspan="6" align="center" valign="top" class="tableb">
			<img src="$thumb_pic_url" alt="" vspace="8" border="0" class="image"><br />
               </td>
        </tr>
        <tr>
                <td class="tableb" valign="top" width="40%">
                        <form method="post" name="post" action="$CPG_URL&file=ecard&album=$album&pid=$pid&pos=$pos">
                        {$lang_ecard_php['your_name']}<br />
                </td>
                <td valign="top" class="tableb" width="60%">
                        <input type="text" class="textinput" name="sender_name"  value="$sender_name" style="WIDTH: 100%;"><br />
                </td>
        </tr>
        <tr>
                <td class="tableb" valign="top" width="40%">
                        {$lang_ecard_php['your_email']}<br />
                </td>
                <td valign="top" class="tableb" width="60%">
                        <input type="text" class="textinput" name="sender_email"  value="$sender_email" style="WIDTH: 100%;"><br />
                        $sender_email_warning
                </td>
        </tr>
        <tr>
                <td class="tableh2" colspan="2"><b>{$lang_ecard_php['to']}</b></td>
        </tr>
        <tr>
                <td class="tableb" valign="top" width="40%">
                        {$lang_ecard_php['rcpt_name']}<br />
                </td>
                <td valign="top" class="tableb" width="60%">
                        <input type="text" class="textinput" name="recipient_name"  value="$recipient_name" style="WIDTH: 100%;"><br />
                </td>
        </tr>
        <tr>
                <td class="tableb" valign="top" width="40%">
                        {$lang_ecard_php['rcpt_email']}<br />
                </td>
                <td valign="top" class="tableb" width="60%">
                        <input type="text" class="textinput" name="recipient_email"  value="$recipient_email" style="WIDTH: 100%;"><br />
                        $recipient_email_warning
                </td>
        </tr>
        <tr>
                <td class="tableh2" colspan="3"><b>{$lang_ecard_php['greetings']}</b></td>
        </tr>
        <tr>
                <td class="tableb" colspan="3">
                        <input type="text" class="textinput" name="greetings"  value="$greetings" style="WIDTH: 100%;"><br />
                </td>
        </tr>
        <tr>
                <td class="tableh2" colspan="3"><b>{$lang_ecard_php['message']}</b></td>
        </tr>
        <tr>
                <td class="tableb" colspan="3" valign="top"><br />
                        <textarea name="message" class="textinput" ROWS="8" COLS="40" WRAP="virtual" onselect="storeCaret_post(this);" onclick="storeCaret_post(this);" onkeyup="storeCaret_post(this);" STYLE="WIDTH: 100%;">$message</textarea><br /><br />
                </td>
        </tr>
        <tr>
                <td class="tableb" colspan="3" valign="top">

EOT;
echo generate_smilies();
echo <<<EOT
                </td>
        </tr>
        <tr>
                <td colspan="3" align="center" class="tablef">
                        <input type="submit" class="button" value="{$lang_ecard_php['title']}">
                        </form>
                </td>
        </tr>
EOT;

endtable();
pagefooter();
include("footer.php");
?>