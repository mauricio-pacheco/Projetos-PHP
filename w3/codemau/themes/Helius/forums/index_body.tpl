<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="bottom"><span class="gensmall">
	<!-- BEGIN switch_user_logged_in -->
	{LAST_VISIT_DATE}<br />
	<!-- END switch_user_logged_in -->
	{CURRENT_TIME}<br />
	{S_TIMEZONE}<br />
	</span><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
	<td align="right" valign="bottom" class="gensmall">
		<!-- BEGIN switch_user_logged_in -->
		<a href="{U_SEARCH_NEW}" class="gensmall">{L_SEARCH_NEW}</a><br /><a href="{U_SEARCH_SELF}" class="gensmall">{L_SEARCH_SELF}</a><br />
		<!-- END switch_user_logged_in -->
		<a href="{U_SEARCH_UNANSWERED}" class="gensmall">{L_SEARCH_UNANSWERED}</a><br />
		<a href="{U_MARK_READ}" class="gensmall">{L_MARK_FORUMS_READ}</a></td>
  </tr>
</table>
	{GLANCE_OUTPUT}
<!-- BEGIN catrow -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/direito.gif"/></td>
	<td width="100%" height="24" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">&nbsp;<a href="{catrow.U_VIEWCAT}" class="cattitle">{catrow.CAT_DESC}</a>&nbsp;</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/esquerdo.gif"/></td>
</tr>
</table>
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
<tr> 
	<th colspan="2" class="thCornerL" height="26" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</th>
	<th width="50" class="thTop" nowrap="nowrap">&nbsp;{L_TOPICS}&nbsp;</th>
	<th width="50" class="thTop" nowrap="nowrap">&nbsp;{L_POSTS}&nbsp;</th>
	<th class="thCornerR" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
</tr>
<!-- BEGIN forumrow -->
<tr> 
	<td class="row4" align="center" valign="middle" width="30" height="30"><img src="{catrow.forumrow.FORUM_FOLDER_IMG}" width="20" height="18" alt="{catrow.forumrow.L_FORUM_FOLDER_ALT}" title="{catrow.forumrow.L_FORUM_FOLDER_ALT}" /></td>
	<td class="row1" width="100%" onmouseover="this.style.backgroundColor='#F8F9FA';" onmouseout="this.style.backgroundColor='#EDEFF2';" onclick="window.location.href='{catrow.forumrow.U_VIEWFORUM}'"><span class="forumlink"> <a href="{catrow.forumrow.U_VIEWFORUM}" class="forumlink">{catrow.forumrow.FORUM_NAME}</a><br />
	  </span> <span class="genmed">{catrow.forumrow.FORUM_DESC}<br />
	  </span><span class="gensmall">{catrow.forumrow.L_MODERATOR} {catrow.forumrow.MODERATORS}</span></td>
	<td class="row2" align="center" valign="middle"><span class="gensmall">{catrow.forumrow.TOPICS}</span></td>
	<td class="row2" align="center" valign="middle"><span class="gensmall">{catrow.forumrow.POSTS}</span></td>
	<td class="row3" align="center" valign="middle" nowrap="nowrap"> <span class="gensmall">{catrow.forumrow.LAST_POST}</span></td>
</tr>
<!-- END forumrow -->
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="100%" height="5" background="themes/Helius/forums/images/centro.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
<!-- END catrow -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/direito.gif"/></td>
	<td width="100%" height="24" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">&nbsp;<a href="{U_VIEWONLINE}" class="cattitle">{L_WHO_IS_ONLINE}</a>&nbsp;</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/esquerdo.gif"/></td>
</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
<tr> 
	<td class="row4" align="center" valign="middle" rowspan="2"><img src="themes/Helius/forums/images/whosonline.gif" alt="{L_WHO_IS_ONLINE}" /></td>
	<td class="row1" align="left" width="100%"><span class="gensmall">{TOTAL_POSTS}<br />{TOTAL_USERS}<br />{NEWEST_USER}</span>
	</td>
</tr>
<tr> 
	<td class="row1" align="left"><span class="gensmall">{TOTAL_USERS_ONLINE} &nbsp; [ {L_WHOSONLINE_ADMIN} ] &nbsp; [ {L_WHOSONLINE_MOD} ]<br />{RECORD_USERS}<br />{LOGGED_IN_USER_LIST}<br />{L_ONLINE_EXPLAIN}</span></td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="100%" height="5" background="themes/Helius/forums/images/centro.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->

<!-- BEGIN switch_user_logged_out -->
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
<!-- END switch_user_logged_out -->

<table cellspacing="3" border="0" align="center" cellpadding="0">
  <tr> 
	<td width="20" align="center"><img src="themes/Helius/forums/images/folder_new_big.gif" alt="{L_NEW_POSTS}"/></td>
	<td><span class="gensmall">{L_NEW_POSTS}</span></td>
	<td>&nbsp;&nbsp;</td>
	<td width="20" align="center"><img src="themes/Helius/forums/images/folder_big.gif" alt="{L_NO_NEW_POSTS}" /></td>
	<td><span class="gensmall">{L_NO_NEW_POSTS}</span></td>
	<td>&nbsp;&nbsp;</td>
	<td width="20" align="center"><img src="themes/Helius/forums/images/folder_locked_big.gif" alt="{L_FORUM_LOCKED}" /></td>
	<td><span class="gensmall">{L_FORUM_LOCKED}</span></td>
  </tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
