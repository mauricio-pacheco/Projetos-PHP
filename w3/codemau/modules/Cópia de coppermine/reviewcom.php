<?
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
define('REVIEWCOM_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (!GALLERY_ADMIN_MODE) cpg_die(ERROR, $lang_errors['access_denied'], __FILE__, __LINE__);

// Delete comments if form is posted
$nb_com_del = 0;
if (isset($HTTP_POST_VARS['cid_array'])){
                 $cid_array = $HTTP_POST_VARS['cid_array'];
                 $cid_set = '';
                 foreach ($cid_array as $cid)
                 $cid_set .= ($cid_set == '') ? '(' . $cid : ', ' . $cid;
                 $cid_set .= ')';
                
                 db_query("DELETE FROM {$CONFIG['TABLE_COMMENTS']} WHERE msg_id IN $cid_set");
                 $nb_com_del = mysql_affected_rows();
                }

$result = db_query("SELECT count(*) FROM {$CONFIG['TABLE_COMMENTS']} WHERE 1");
$nbEnr = mysql_fetch_array($result);
$comment_count = $nbEnr[0];

if (!$comment_count) cpg_die(INFORMATION , $lang_reviewcom_php['no_comment'], __FILE__, __LINE__);

$start = isset($HTTP_GET_VARS['start']) ? (int)$HTTP_GET_VARS['start'] : 0;
$count = isset($HTTP_GET_VARS['count']) ? $HTTP_GET_VARS['count'] : 25;
$next_target = $CPG_URL . '&file=reviewcom&start=' . ($start + $count) . '&count=' . $count;
$prev_target = $CPG_URL . '&file=reviewcom&start=' . max(0, $start - $count) . '&count=' . $count;
$s50 = $count == 50 ? 'selected' : '';
$s75 = $count == 75 ? 'selected' : '';
$s100 = $count == 100 ? 'selected' : '';

if ($start + $count < $comment_count){
                 $next_link = "<a href=\"$next_target\"><b>{$lang_reviewcom_php['see_next']}</b></a>&nbsp;&nbsp;-&nbsp;&nbsp;";
                }else{
                 $next_link = '';
                }

if ($start > 0){
                 $prev_link = "<a href=\"$prev_target\"><b>{$lang_reviewcom_php['see_prev']}</b></a>&nbsp;&nbsp;-&nbsp;&nbsp;";
                }else{
                 $prev_link = '';
                }

pageheader($lang_reviewcom_php['title']);

starttable();
echo <<<EOT
        <tr>
            <form action="$CPG_URL&file=reviewcom&start=$start&count=$count" method="post">
                <td class="tableh1" colspan="3"><h2>{$lang_reviewcom_php['title']}</h2></td>
        </tr>

EOT;

if ($nb_com_del > 0){
                 $msg_txt = sprintf($lang_reviewcom_php['n_comm_del'], $nb_com_del);
                 echo <<<EOT
        <tr>
                <td class="tableh2" colspan="3" align="center">
                        <br /><b>$msg_txt</b><br /><br />
                </td>
        </tr>

EOT;
                }

echo <<<EOT
        <tr>
                <td class="tableb" colspan="3">
                        $prev_link
                        $next_link
                        <b>{$lang_reviewcom_php['n_comm_disp']}</b>
                        <select onChange="if(this.options[this.selectedIndex].value) window.location.href='$CPG_URL&file=reviewcom&start=$start&count='+this.options[this.selectedIndex].value;"  name="count" class="listbox">
                                <option value="25">25</option>
                                <option value="50" $s50>50</option>
                                <option value="75" $s75>75</option>
                                <option value="100" $s100>100</option>
                        </select>
                </td>
        </tr>

EOT;

$result = db_query("SELECT msg_id, msg_author, msg_body, UNIX_TIMESTAMP(msg_date) AS msg_date, author_id, {$CONFIG['TABLE_COMMENTS']}.pid as pid, aid, filepath, filename, url_prefix, pwidth, pheight FROM {$CONFIG['TABLE_COMMENTS']}, {$CONFIG['TABLE_PICTURES']} WHERE {$CONFIG['TABLE_COMMENTS']}.pid = {$CONFIG['TABLE_PICTURES']}.pid ORDER BY msg_id DESC LIMIT $start, $count");

while ($row = mysql_fetch_array($result)){
				 //alterado por malves1982
				 if ($CONFIG['thumb_method']=='none'){
					 $thumb_url = get_pic_url($row, 'fullsize');
				 }else{
					 $thumb_url = get_pic_url($row, 'thumb');
				 }
                 $image_size = compute_img_size($row['pwidth'], $row['pheight'], $CONFIG['alb_list_thumb_size']);
                 $thumb_link = $CPG_URL . '&file=displayimage&pos=' . - $row['pid'];
                 $msg_date = localised_date($row['msg_date'], $comment_date_fmt);
                 echo <<<EOT
        <tr>
        <td colspan="2" class="tableh2" valign="top">
                <table cellpadding="0" cellspacing="0" border ="0">
                        <tr>
                        <td><input name="cid_array[]" type="checkbox" value="{$row['msg_id']}">
                        <td><img src="$CPG_URL/images/spacer.gif" width="5" height="1" /><br/></td>
                        <td><b>{$row['msg_author']}</b> - {$msg_date}</td>
                        </tr>
                </table>
                </td>
        </tr>
        <tr>
        <td class="tableb" valign="top" width="100%">
                        {$row['msg_body']}
                </td>
            <td class="tableb" align="center">
                        <a href="$thumb_link" target="_blank"><img src="$thumb_url" {$image_size['geom']} class="image" border="0"><br /></a>
        </td>
        </tr>

EOT;
                }

mysql_free_result($result);

echo <<<EOT
        <tr>
            <td colspan="3" align="center" class="tablef">
                        <input type="submit" value="{$lang_reviewcom_php['del_comm']}" class="button">
                </td>
        </form>
        </tr>

EOT;
endtable();
pagefooter();
include("footer.php");
?>
