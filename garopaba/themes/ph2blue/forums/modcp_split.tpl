<form method="post" action="{S_SPLIT_ACTION}">
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td class="maintitle">{L_SPLIT_TOPIC}</td>
</tr>
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> &raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a> &raquo; {L_SPLIT_TOPIC}</td>
</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
<tr>
<th colspan="3">{L_SPLIT_TOPIC}</th>
</tr>
<tr>
<td height="28" colspan="3" align="center" class="row1"><span class="genmed">{L_SPLIT_TOPIC_EXPLAIN}</span></td>
</tr>
<tr>
<td align="right" nowrap="nowrap" class="row1"><span class="explaintitle">{L_SPLIT_SUBJECT}:</span></td>
<td class="row2" colspan="2"><input type="text" size="35" style="width: 350px" maxlength="100" name="subject" class="post" />
</td>
</tr>
<tr>
<td align="right" nowrap="nowrap" class="row1"><span class="explaintitle">{L_SPLIT_FORUM}:</span></td>
<td class="row2" colspan="2">{S_FORUM_SELECT}</td>
</tr>
<tr align="center">
<td class="cat" colspan="3">
<input class="catbutton" type="submit" name="split_type_all" value="{L_SPLIT_POSTS}" />
&nbsp;&nbsp;<input class="catbutton" type="submit" name="split_type_beyond" value="{L_SPLIT_AFTER}" />
</td>
</tr>
<tr>
<th>{L_AUTHOR}</th>
<th>{L_MESSAGE}</th>
<th>&nbsp;{L_SELECT}&nbsp;</th>
</tr>
<!-- BEGIN postrow -->
<tr>
<td valign="top" class="{postrow.ROW_CLASS}"><span class="name">{postrow.POSTER_NAME}</span>
<img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="150" height="1" /></td>
<td width="100%" valign="top" class="{postrow.ROW_CLASS}">
<table width="100%" cellspacing="0" cellpadding="3" border="0">
<tr>
<td class="postdetails"><img src="themes/PH2BLUE/forums/images/icon_minipost.gif" alt="{L_POST}" title="{L_POST}" width="12" height="9" />{L_POSTED}: 
{postrow.POST_DATE}&nbsp;&nbsp;&nbsp;&nbsp;{L_POST_SUBJECT}: {postrow.POST_SUBJECT}</td>
</tr>
<tr>
<td valign="top" class="postbody">
<hr />
{postrow.MESSAGE}</td>
</tr>
</table>
</td>
<td align="center" class="{postrow.ROW_CLASS}">{postrow.S_SPLIT_CHECKBOX}</td>
</tr>
<tr>
<td colspan="3" height="1" class="spacerow"><img src="themes/PH2BLUE/forums/images/spacer.gif" width="1" height="1" alt="" /></td>
</tr>
<!-- END postrow -->
<tr>
<td class="cat" colspan="3" align="center">
<input class="catbutton" type="submit" name="split_type_all" value="{L_SPLIT_POSTS}" />
&nbsp;&nbsp;<input class="catbutton" type="submit" name="split_type_beyond" value="{L_SPLIT_AFTER}" />
{S_HIDDEN_FIELDS}</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> &raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a> &raquo; {L_SPLIT_TOPIC}</td>
</tr>
</table>
</form>
