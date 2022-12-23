 
<form action="{S_GROUPCP_ACTION}" method="post">

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="left" class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{L_GROUP_INFORMATION}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table class="forumline" width="100%" cellspacing="1" cellpadding="4" border="0">
<tr> 
	<td class="row1" width="20%"><span class="gen">{L_GROUP_NAME}:</span></td>
	<td class="row2"><span class="gen"><b>{GROUP_NAME}</b></span></td>
</tr>
<tr> 
	<td class="row1" width="20%"><span class="gen">{L_GROUP_DESC}:</span></td>
	<td class="row2"><span class="gen">{GROUP_DESC}</span></td>
</tr>
<tr> 
	<td class="row1" width="20%"><span class="gen">{L_GROUP_MEMBERSHIP}:</span></td>
	<td class="row2"><span class="gen">{GROUP_DETAILS} &nbsp;&nbsp;
	<!-- BEGIN switch_subscribe_group_input -->
	<input class="mainoption" type="submit" name="joingroup" value="{L_JOIN_GROUP}" />
	<!-- END switch_subscribe_group_input -->
	<!-- BEGIN switch_unsubscribe_group_input -->
	<input class="mainoption" type="submit" name="unsub" value="{L_UNSUBSCRIBE_GROUP}" />
	<!-- END switch_unsubscribe_group_input -->
	</span></td>
</tr>
<!-- BEGIN switch_mod_option -->
<tr> 
	<td class="row1" width="20%"><span class="gen">{L_GROUP_TYPE}:</span></td>
	<td class="row2"><span class="gen"><span class="gen"><input type="radio" name="group_type" value="{S_GROUP_OPEN_TYPE}" {S_GROUP_OPEN_CHECKED} /> {L_GROUP_OPEN} &nbsp;&nbsp;<input type="radio" name="group_type" value="{S_GROUP_CLOSED_TYPE}" {S_GROUP_CLOSED_CHECKED} />	{L_GROUP_CLOSED} &nbsp;&nbsp;<input type="radio" name="group_type" value="{S_GROUP_HIDDEN_TYPE}" {S_GROUP_HIDDEN_CHECKED} />	{L_GROUP_HIDDEN} &nbsp;&nbsp; <input class="mainoption" type="submit" name="groupstatus" value="{L_UPDATE}" /></span></td>
</tr>
<!-- END switch_mod_option -->
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
{S_HIDDEN_FIELDS}
</form>


<form action="{S_GROUPCP_ACTION}" method="post" name="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{L_GROUP_MODERATOR}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
<tr> 
	<th class="thCornerL" height="25">{L_PM}</th>
	<th class="thTop">{L_USERNAME}</th>
	<th class="thTop">{L_POSTS}</th>
	<th class="thTop">{L_FROM}</th>
	<th class="thTop">{L_EMAIL}</th>
	<th class="thTop">{L_WEBSITE}</th>
	<th class="thCornerR">{L_SELECT}</th>
</tr>
<tr> 
	<td class="row4" align="center"> {MOD_PM_IMG} </td>
	<td class="row1" align="center" onmouseover="this.style.backgroundColor='#F8F9FA';" onmouseout="this.style.backgroundColor='#EDEFF2';" onclick="window.location.href='{U_MOD_VIEWPROFILE}'"><span class="gen"><a href="{U_MOD_VIEWPROFILE}" class="gen">{MOD_USERNAME}</a></span></td>
	<td class="row2" align="center" valign="middle"><span class="gen">{MOD_POSTS}</span></td>
	<td class="row1" align="center" valign="middle"><span class="gen">{MOD_FROM}</span></td>
	<td class="row2" align="center" valign="middle"><span class="gen">{MOD_EMAIL_IMG}</span></td>
	<td class="row3" align="center">{MOD_WWW_IMG}</td>
	<td class="row4" align="center"> &nbsp; </td>
</tr>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{L_GROUP_MEMBERS}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
<tr> 
	<th class="thCornerL" height="25">{L_PM}</th>
	<th class="thTop">{L_USERNAME}</th>
	<th class="thTop">{L_POSTS}</th>
	<th class="thTop">{L_FROM}</th>
	<th class="thTop">{L_EMAIL}</th>
	<th class="thTop">{L_WEBSITE}</th>
	<th class="thCornerR">{L_SELECT}</th>
</tr>
<!-- BEGIN member_row -->
<tr> 
	<td class="row4" align="center"> {member_row.PM_IMG} </td>
	<td class="row1" align="center" onmouseover="this.style.backgroundColor='#F8F9FA';" onmouseout="this.style.backgroundColor='#EDEFF2';" onclick="window.location.href='{member_row.U_VIEWPROFILE}'"><span class="gen"><a href="{member_row.U_VIEWPROFILE}" class="gen">{member_row.USERNAME}</a></span></td>
	<td class="row2" align="center"><span class="gen">{member_row.POSTS}</span></td>
	<td class="row1" align="center"><span class="gen"> {member_row.FROM}</span></td>
	<td class="row2" align="center" valign="middle"><span class="gen">{member_row.EMAIL_IMG}</span></td>
	<td class="row3" align="center"> {member_row.WWW_IMG}</td>
	<td class="row4" align="center"> 
	<!-- BEGIN switch_mod_option -->
	<input type="checkbox" name="members[]" value="{member_row.USER_ID}" /> 
	<!-- END switch_mod_option -->
	</td>
</tr>
<!-- END member_row -->
<!-- BEGIN switch_no_members -->
<tr> 
	<td class="row1" colspan="7" align="center"><span class="gen">{L_NO_MEMBERS}</span></td>
</tr>
<!-- END switch_no_members -->
<!-- BEGIN switch_hidden_group -->
<tr> 
	<td class="row1" colspan="7" align="center"><span class="gen">{L_HIDDEN_MEMBERS}</span></td>
</tr>
<!-- END switch_hidden_group -->
<!-- BEGIN switch_mod_option -->
<tr>
	<td class="row4" colspan="8" align="right"><span class="gen">
		<input type="submit" name="remove" value="{L_REMOVE_SELECTED}" class="mainoption" />
	</td>
</tr>
<!-- END switch_mod_option -->
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->

<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
		<td align="left" valign="top">
		<!-- BEGIN switch_mod_option -->
		<span class="genmed"><input type="text"  class="post" name="username" maxlength="50" size="20" /> <input type="submit" name="add" value="{L_ADD_MEMBER}" class="mainoption" /> <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></span><br /><br />
		<!-- END switch_mod_option -->
		<span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right" valign="top"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>

{PENDING_USER_BOX}

{S_HIDDEN_FIELDS}</form>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td valign="top" align="right">{JUMPBOX}</td>
  </tr>
</table>
