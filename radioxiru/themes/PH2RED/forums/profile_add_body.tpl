<form action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post">
<table width="100%" cellspacing="2" cellpadding="3" border="0">
<tr>
	<td class="maintitle">{L_PROFILE_INFO}</td>
</tr>
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> &raquo; {L_PROFILE_INFO}</td>
</tr>
</table>
{ERROR_BOX}
<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
<tr>
<th colspan="2">{L_REGISTRATION_INFO}</th>
</tr>
<tr>
<td height="22" colspan="2" class="row2"><span class="gensmall">{L_ITEMS_REQUIRED}</span></td>
</tr>
<tr>
<td class="row1" width="38%"><span class="explaintitle">{L_USERNAME}:</span> *</td>
<td class="row2" width="62%">
<input type="text" class="post" style="width:200px" name="username" size="25" maxlength="25" value="{USERNAME}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_EMAIL_ADDRESS}:</span> *</td>
<td class="row2">
<input type="text" class="post" style="width:200px" name="email" size="25" maxlength="255" value="{EMAIL}" />
</td>
</tr>
<!-- BEGIN switch_edit_profile -->
<tr>
<td class="row1"><span class="explaintitle">{L_CURRENT_PASSWORD}:</span> *<br />
<span class="gensmall">{L_CONFIRM_PASSWORD_EXPLAIN}</span></td>
<td class="row2">
<input type="password" class="post" style="width: 200px" name="cur_password" size="25" maxlength="100" value="{CUR_PASSWORD}" />
</td>
</tr>
<!-- END switch_edit_profile -->
<tr>
<td class="row1"><span class="explaintitle">{L_NEW_PASSWORD}:</span> *<br />
<span class="gensmall">{L_PASSWORD_IF_CHANGED}</span></td>
<td class="row2">
<input type="password" class="post" style="width: 200px" name="new_password" size="25" maxlength="100" value="{NEW_PASSWORD}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_CONFIRM_PASSWORD}:</span> * <br />
<span class="gensmall">{L_PASSWORD_CONFIRM_IF_CHANGED}</span></td>
<td class="row2">
<input type="password" class="post" style="width: 200px" name="password_confirm" size="25" maxlength="100" value="{PASSWORD_CONFIRM}" />
</td>
</tr>
<tr>
<td class="cat" colspan="2">&nbsp;</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="forumline">
<tr>
<th colspan="2">{L_PROFILE_INFO}</th>
</tr>
<tr>
<td height="22" colspan="2" class="row2"><span class="gensmall">{L_PROFILE_INFO_NOTICE}</span></td>
</tr>
<tr>
<td class="row1" width="38%"><span class="explaintitle">{L_ICQ_NUMBER}:</span></td>
<td class="row2" width="62%">
<input type="text" name="icq" class="post"style="width: 100px"  size="10" maxlength="15" value="{ICQ}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_AIM}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 150px"  name="aim" size="20" maxlength="255" value="{AIM}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_MESSENGER}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 150px"  name="msn" size="20" maxlength="255" value="{MSN}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_YAHOO}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 150px"  name="yim" size="20" maxlength="255" value="{YIM}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_WEBSITE}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 200px"  name="website" size="25" maxlength="255" value="{WEBSITE}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_LOCATION}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 200px"  name="location" size="25" maxlength="100" value="{LOCATION}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_OCCUPATION}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 200px"  name="occupation" size="25" maxlength="100" value="{OCCUPATION}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_INTERESTS}:</span></td>
<td class="row2">
<input type="text" class="post"style="width: 200px"  name="interests" size="35" maxlength="150" value="{INTERESTS}" />
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_SIGNATURE}:</span><br />
<span class="gensmall">{L_SIGNATURE_EXPLAIN}<br />
<br />
{HTML_STATUS}<br />
{BBCODE_STATUS}<br />
{SMILIES_STATUS}</span></td>
<td class="row2">
<textarea name="signature" style="width: 300px" rows="6" cols="30" class="post">{SIGNATURE}</textarea>
</td>
</tr>
<tr>
<td class="cat" colspan="2">&nbsp;</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="forumline">
<tr>
<th colspan="2">{L_PREFERENCES}</th>
</tr>
<tr>
<td class="row1" width="38%"><span class="explaintitle">{L_PUBLIC_VIEW_EMAIL}:</span></td>
<td class="row2" width="62%">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_HIDE_USER}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_NOTIFY_ON_REPLY}:</span><br />
<span class="gensmall">{L_NOTIFY_ON_REPLY_EXPLAIN}</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_NOTIFY_ON_PRIVMSG}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_POPUP_ON_PRIVMSG}:</span><br />
<span class="gensmall">{L_POPUP_ON_PRIVMSG_EXPLAIN}</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_ALWAYS_ADD_SIGNATURE}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_ALWAYS_ALLOW_BBCODE}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_ALWAYS_ALLOW_HTML}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_ALWAYS_ALLOW_SMILIES}:</span></td>
<td class="row2">
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} />&nbsp;</td>
<td>{L_YES}&nbsp;&nbsp;</td>
<td><input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} />&nbsp;</td>
<td>{L_NO}</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_BOARD_LANGUAGE}:</span></td>
<td class="row2">{LANGUAGE_SELECT}</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_BOARD_STYLE}:</span></td>
<td class="row2">{STYLE_SELECT}</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_TIMEZONE}:</span></td>
<td class="row2">{TIMEZONE_SELECT}</td>
</tr>
<tr>
<td class="row1"><span class="explaintitle">{L_DATE_FORMAT}:</span><br />
<span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
<td class="row2">
<input type="text" name="dateformat" value="{DATE_FORMAT}" maxlength="14" class="post" />
</td>
</tr>
<!-- BEGIN switch_avatar_block -->
<tr>
<td class="cat" colspan="2">&nbsp;</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="forumline">
<tr>
<th colspan="2">{L_AVATAR_PANEL}</th>
</tr>
<tr>
<td class="row1" colspan="2">
<table width="70%" cellspacing="2" cellpadding="0" border="0" align="center">
<tr>
<td width="65%" class="gensmall">{L_AVATAR_EXPLAIN}</td>
<td align="center" class="gensmall">{L_CURRENT_IMAGE}<br />
{AVATAR}<br />
<input type="checkbox" name="avatardel" />
&nbsp;{L_DELETE_AVATAR}</td>
</tr>
</table>
</td>
</tr>
<!-- BEGIN switch_avatar_local_upload -->
<tr>
<td class="row1"><span class="explaintitle">{L_UPLOAD_AVATAR_FILE}:</span></td>
<td class="row2">
<input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />
<input type="file" name="avatar" class="post" style="width:200px" />
</td>
</tr>
<!-- END switch_avatar_local_upload -->
<!-- BEGIN switch_avatar_remote_upload -->
<tr>
<td class="row1"><span class="explaintitle">{L_UPLOAD_AVATAR_URL}</span>:<br />
<span class="gensmall">{L_UPLOAD_AVATAR_URL_EXPLAIN}</span></td>
<td class="row2">
<input type="text" name="avatarurl" size="40" class="post" style="width:200px" />
</td>
</tr>
<!-- END switch_avatar_remote_upload -->
<!-- BEGIN switch_avatar_remote_link -->
<tr>
<td class="row1"><span class="explaintitle">{L_LINK_REMOTE_AVATAR}:</span><br />
<span class="gensmall">{L_LINK_REMOTE_AVATAR_EXPLAIN}</span></td>
<td class="row2">
<input type="text" name="avatarremoteurl" size="40" class="post" style="width:200px" />
</td>
</tr>
<!-- END switch_avatar_remote_link -->
<!-- BEGIN switch_avatar_local_gallery -->
<tr>
<td class="row1"><span class="explaintitle">{L_AVATAR_GALLERY}:</span></td>
<td class="row2">
<input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="button" />
</td>
</tr>
<!-- END switch_avatar_local_gallery -->
<!-- END switch_avatar_block -->
<tr>
<td class="cat" colspan="2" align="center">{S_HIDDEN_FIELDS} 
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
&nbsp;&nbsp; 
<input type="reset" value="{L_RESET}" name="reset" class="button" />
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<table width="100%" cellspacing="2" cellpadding="3" border="0">
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> &raquo; {L_PROFILE_INFO}</td>
</tr>
</table>
</form>
