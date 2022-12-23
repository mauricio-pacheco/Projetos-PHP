{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>

<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->

<a name="top"></a>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
  <td align="center" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td height="40" align="center" class="topnav2">&nbsp;<a href="{U_FAQ}"><img src="themes/PH2RED/forums/images/icon_mini_faq.gif" alt="Forum FAQ"></a>&nbsp;<a href="{U_FAQ}">{L_FAQ}</a>&nbsp;&nbsp;<a href="{U_SEARCH}"><img src="themes/PH2RED/forums/images/icon_mini_search.gif" alt="Search Forums"></a>&nbsp;<a href="{U_SEARCH}">{L_SEARCH}</a><a href="{U_RANKS}">{L_RANKS}</a>
&nbsp;<a href="{U_MEMBERLIST}"><img src="themes/PH2RED/forums/images/icon_mini_members.gif" alt="Members List"></a>&nbsp;<a href="{U_MEMBERLIST}">{L_MEMBERLIST}</a>&nbsp;&nbsp;<a href="{U_GROUP_CP}"><img src="themes/PH2RED/forums/images/icon_mini_groups.gif" alt="Usergroups"></a>&nbsp;<a href="{U_GROUP_CP}">{L_USERGROUPS}</a>
{PROFILE_VIEW}
&nbsp;<a href="{U_PROFILE}"><img src="themes/PH2RED/forums/images/icon_mini_profile.gif" alt="Profile"></a>&nbsp;<a href="{U_PROFILE}">{L_PROFILE}</a>&nbsp;&nbsp;<a href="{U_PRIVATEMSGS}"><img src="themes/PH2RED/forums/images/icon_mini_message.gif" alt="{PRIVATE_MESSAGE_INFO}"></a>&nbsp;<a href="{U_PRIVATEMSGS}">{PRIVATE_MESSAGE_INFO}</a>&nbsp;
<a href="{U_LOGIN_LOGOUT}"><img src="themes/PH2RED/forums/images/icon_mini_login.gif" alt="{L_LOGIN_LOGOUT}"></a>&nbsp;<a href="{U_LOGIN_LOGOUT}">{L_LOGIN_LOGOUT}</a></td>
</tr>
</table></td>
			</tr>
		</table>
<!-- BEGIN switch_board_msg -->
		<br />
<center>
<table border="0" width={BM_WIDTH} class="forumline">
  <tr>
	<th colspan="3" class="thCornerL" height="25" nowrap="nowrap">&nbsp;{BM_TITLE}&nbsp;</th>
  </tr>
  <tr>
	<td width="10%" align="center" class="row1">{BM_IMAGES}</td>
	<td class="row1"><span class="gen">{BM_MSG}</a></span></td>
	<td width="10%" align="center" class="row1">{BM_IMAGES}</td>
  </tr>

</table>
<table border="0" width={BM_WIDTH}>
  <tr>
	<td align="left" valign="top"><span class="gensmall"><a href={U_BM_PRV} title="{BM_PRV_TITLE}" class="nav">{L_BM_PRV}</a></span></td>
	<td align="right" valign="top"><span class="gensmall"><a href={U_BM_NXT} title="{BM_NXT_TITLE}" class="nav">{L_BM_NXT}</a></span></td>
  </tr>

</table>
</center>

<!-- END switch_board_msg -->
		<br />

<!-- $Log: overall_header.tpl,v $
<!-- Revision 1.2  2003/07/18 15:11:03  zx
<!-- Removed additional HTML, HEAD, and BODY tag sections
<!-- -->






<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td colspan="2" class="maintitle">{L_INDEX}</td>
	</tr>
<tr>
<td valign="bottom" class="gensmall">
<!-- BEGIN switch_user_logged_in -->
{LAST_VISIT_DATE}<br />
<!-- END switch_user_logged_in -->
{CURRENT_TIME}<br />
<a href="{U_INDEX}" class="nav">{L_INDEX}</a></td>
<td align="right" valign="bottom" class="gensmall">
<a href="{U_SEARCH_UNANSWERED}">{L_SEARCH_UNANSWERED}</a><br />
<!-- BEGIN switch_user_logged_in -->
<a href="{U_SEARCH_NEW}">{L_SEARCH_NEW}</a><br />
<a href="{U_TOPICS_STARTED}">{L_TOPICS_STARTED}</a><br />
<a href="{U_MARK_READ}"><strong>{L_MARK_FORUMS_READ}</strong></a>
<!-- END switch_user_logged_in -->
</td>
</tr>
</table>
{GLANCE_OUTPUT}
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
<tr>
<th colspan="2">{L_FORUM}</th>
<th>{L_TOPICS}</th>
<th>{L_POSTS}</th>
<th>{L_LASTPOST}</th>
</tr>
<!-- BEGIN catrow -->
<tr>
<td class="cat" colspan="2"><a href="{catrow.U_VIEWCAT}">{catrow.CAT_DESC}</a></td>
<td class="rowpic" colspan="3"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="280" height="12" /></td>
</tr>
<!-- BEGIN forumrow -->
<tr>
<td class="row1" height="45"><img src="{catrow.forumrow.FORUM_FOLDER_IMG}" alt="{catrow.forumrow.L_FORUM_FOLDER_ALT}" title="{catrow.forumrow.L_FORUM_FOLDER_ALT}" /></td>
<td class="row1" width="100%"><a href="{catrow.forumrow.U_VIEWFORUM}" class="nav">{catrow.forumrow.FORUM_NAME}</a><br />
<span class="genmed">{catrow.forumrow.FORUM_DESC}<br />
</span><span class="gensmall">{catrow.forumrow.L_MODERATOR} {catrow.forumrow.MODERATORS}</span></td>
<td class="row2" align="center"><span class="gensmall">{catrow.forumrow.TOPICS}</span></td>
<td class="row2" align="center"><span class="gensmall">{catrow.forumrow.POSTS}</span></td>
<td class="row2" align="center" nowrap="nowrap"><span class="gensmall">{catrow.forumrow.LAST_POST}</span></td>
</tr>
<!-- END forumrow -->
<!-- END catrow -->
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<br />
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
<tr>
<td class="cat" colspan="2"><a href="{U_VIEWONLINE}">{L_WHO_IS_ONLINE}</a></td>
</tr>
<tr>
<td class="row1" rowspan="3"><span class="mainmenu">{L_NAME_WELCOME}</span><BR /><span class="mainmenu">{U_NAME_LINK}</span><BR /><BR />{AVATAR_IMG}
</td>
<td class="row1" width="100%"><span class="gensmall">{TOTAL_POSTS}<br />
{TOTAL_USERS}<br />
{NEWEST_USER}</span></td>
</tr>
<tr>
<td class="row1"><span class="gensmall">{TOTAL_USERS_ONLINE} &nbsp; [ <strong>{L_WHOSONLINE_ADMIN}</strong>
] &nbsp; [ <strong>{L_WHOSONLINE_MOD}</strong> ]<br />
{RECORD_USERS}<br />
{LOGGED_IN_USER_LIST}</span></td>
</tr>
<tr>
<td height="20" class="row1"><span class="gensmall">{L_ONLINE_EXPLAIN}</span></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2RED/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
<!-- BEGIN switch_user_logged_out -->

<!-- END switch_user_logged_out -->
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a></td>
</tr>
</table>
<br />
<table align="center" cellspacing="3" border="0" cellpadding="0">
<tr>
<td><img src="{FORUM_NEW_IMG}" alt="{L_NEW_POSTS}" title="{L_NEW_POSTS}" /></td>
<td class="gensmall">{L_NEW_POSTS}</td>
<td>&nbsp;</td>
<td><img src="{FORUM_IMG}" alt="{L_NO_NEW_POSTS}" title="{L_NO_NEW_POSTS}" /></td>
<td class="gensmall">{L_NO_NEW_POSTS}</td>
<td>&nbsp;</td>
<td><img src="{FORUM_LOCKED_IMG}" alt="{L_FORUM_LOCKED}" title="{L_FORUM_LOCKED}" /></td>
<td class="gensmall">{L_FORUM_LOCKED}</td>
</tr>
</table>

