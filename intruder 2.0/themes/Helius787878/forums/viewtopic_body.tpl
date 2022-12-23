<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="middle"><span class="nav">
	  <a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	  -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a>
	  -> <a class="nav" href="{U_VIEW_TOPIC}">{TOPIC_TITLE}</a></span></td>
	 <td align="right" valign="middle"><span class="nav"><b>{PAGINATION}</b></span></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a></td>
	<td align="right" valign="middle"><span class="nav">
	<a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a>&nbsp;
	</span></td>
  </tr>
</table>

{POLL_DISPLAY} 

<!-- BEGIN postrow -->
<a name="{postrow.U_POST_ID}"></a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{postrow.POST_SUBJECT}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="1" width="100%" class="forumline">
<tr>
	<td class="th" align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="2" width="100%">
	<tr height="26">
		<td align="left" valign="middle" nowrap="nowrap"><a href="{postrow.U_MINI_POST}"><img src="{postrow.MINI_POST_IMG}" width="12" height="9" alt="{postrow.L_MINI_POST_ALT}" title="{postrow.L_MINI_POST_ALT}" border="0" /></a><span class="genmed">{L_POSTED}: {postrow.POST_DATE}</span></td>
		<td align="right" valign="bottom" nowrap="nowrap">{postrow.QUOTE_IMG} {postrow.EDIT_IMG} {postrow.DELETE_IMG} {postrow.IP_IMG} </td>
	</tr></table></td>
</tr>
<tr>
	<td class="row1" align="left" valign="top" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%"><!-- main table start -->
	<tr>
		<td width="150" align="left" valign="top" rowspan="2"><table border="0" cellspacing="0" cellpadding="0" width="100%"><!-- left row table start -->
		<tr>
			<td width="100%" align="left" valign="top" background="themes/Helius/forums/images/post_bg.gif"><table border="0" cellspacing="0" cellpadding="4">
			<tr>
				<td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0">
				<tr><td nowrap="nowrap"><span class="name"><b>{postrow.POSTER_NAME}</b></span></td></tr>
				<tr><td nowrap="nowrap"><span class="postdetails">{postrow.POSTER_RANK}</span></td></tr>
				<tr><td nowrap="nowrap"><span class="postdetails">{postrow.RANK_IMAGE}{postrow.POSTER_AVATAR}</span></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td nowrap="nowrap"><span class="postdetails">{postrow.POSTER_JOINED}</span></td></tr>
				<tr><td nowrap="nowrap"><span class="postdetails">{postrow.POSTER_POSTS}</span></td></tr>
				<tr><td><span class="postdetails">{postrow.POSTER_FROM}</span></td></tr>
				</table></td>
			</tr>
			</table><br /><br /></td>
			<td width="10" background="themes/Helius/forums/images/post_right.gif"><img src="themes/Helius/forums/images/spacer.gif" width="10" height="1" border="0" /></td>
		</tr>
		<tr>
			<td height="10" background="themes/Helius/forums/images/post_bottom.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td>
			<td width="10" height="10"><img src="themes/Helius/forums/images/post_corner.gif" width="10" height="10" border="0" /></td>
		</tr>
		<!-- left row table end --></table><br /><br /></td>
		<td class="row1" align="left" valign="top" width="100%"><table border="0" cellspacing="0" cellpadding="5" width="100%"><!-- right top row table start -->
		<tr>
			<td width="100%"><span class="postbody">{postrow.MESSAGE}</span></td>
		</tr>
		<!-- right top row table end --></table></td>
	</tr>
	<tr>
		<td class="row1" align="left" valign="bottom" nowrap="nowrap"><table border="0" cellspacing="0" cellpadding="5" width="100%"><!-- right bottom row start -->
		<tr>
			<td width="100%"><span class="postbody"><span class="gensmall">{postrow.EDITED_MESSAGE}</span>{postrow.SIGNATURE}</span></td>
		</tr>
		<!-- right bottom row end --></table></td>
	</tr>
	</table></td>
</tr>
<tr>
	<td height="28" valign="bottom" class="row4"><table border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td width="120"><img src="themes/Helius/forums/images/spacer.gif" width="120" height="1" border="0" /></td>
		<td width="100%" align="left" valign="middle" nowrap="nowrap">{postrow.PROFILE_IMG} {postrow.PM_IMG} {postrow.EMAIL_IMG} {postrow.WWW_IMG} {postrow.AIM_IMG} {postrow.YIM_IMG} {postrow.MSN_IMG} {postrow.ICQ_IMG}</td>
	</tr></table></td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
<!-- END postrow -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><a class="cattitle" href="{U_VIEW_TOPIC}">{TOPIC_TITLE}</a></span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="" border="0">
<tr>
	<td class="row1" align="left" valign="top">
	<span class="nav">&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span><br />
	<table border="0" cellspacing="0" cellpadding="5" width="100%">
	<tr>
		<td align="left" valign="top">
			<span class="gensmall">{S_AUTH_LIST}</span>
		</td>
		<td align="right" valign="top">
			<span class="gensmall">{S_TIMEZONE}&nbsp;&nbsp;<br />
			{PAGE_NUMBER}&nbsp;&nbsp;</span>
			<span class="nav"><b>{PAGINATION}</b></span><br />
			<span class="gensmall">{S_WATCH_TOPIC}</span>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td class="row4" align="center" valign="middle" nowrap="nowrap"><table border="0" cellspacing="0" cellpadding="2" width="100%">
	<tr>
		<form method="post" action="{S_POST_DAYS_ACTION}"><td align="left" valign="middle" nowrap="nowrap">{S_SELECT_POST_DAYS}&nbsp;{S_SELECT_POST_ORDER}&nbsp;<input type="submit" value="{L_GO}" class="liteoption" name="submit" /></td></form>
		<td align="right" valign="middle" nowrap="nowrap">{JUMPBOX}</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="5" width="100%">
<tr>
	<td align="left" valign="top">&nbsp;<a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a></td>
	<td align="right" valign="top">{S_TOPIC_ADMIN}&nbsp;</td>
</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
