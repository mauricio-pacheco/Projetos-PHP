
<form method="post" action="{S_MODCP_ACTION}">
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{L_MOD_CP}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
<tr> 
	<td class="th2" colspan="5" align="center"><span class="gensmall2">{L_MOD_CP_EXPLAIN}</span></td>
</tr>
	<tr> 
	  <th width="4%" class="thLeft" nowrap="nowrap">&nbsp;</th>
	  <th nowrap="nowrap">&nbsp;{L_TOPICS}&nbsp;</th>
	  <th width="8%" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</th>
	  <th width="17%" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
	  <th width="5%" class="thRight" nowrap="nowrap">&nbsp;{L_SELECT}&nbsp;</th>
	</tr>
	<!-- BEGIN topicrow -->
	<tr> 
	  <td class="row4" align="center" valign="middle"><img src="{topicrow.TOPIC_FOLDER_IMG}" width="19" height="18" alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" /></td>
	  <td class="row1" onmouseover="this.style.backgroundColor='#F8F9FA';" onmouseout="this.style.backgroundColor='#EDEFF2';" onclick="window.location.href='{topicrow.U_VIEW_TOPIC}'">&nbsp;<span class="topictitle">{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="topictitle">{topicrow.TOPIC_TITLE}</a></span></td>
	  <td class="row2" align="center" valign="middle"><span class="postdetails">{topicrow.REPLIES}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="postdetails">{topicrow.LAST_POST_TIME}</span></td>
	  <td class="row2" align="center" valign="middle"> 
		<input type="checkbox" name="topic_id_list[]" value="{topicrow.TOPIC_ID}" />
	  </td>
	</tr>
	<!-- END topicrow -->
	<tr align="right"> 
	  <td class="row4" colspan="5" height="29"> {S_HIDDEN_FIELDS} 
		<input type="submit" name="delete" class="liteoption" value="{L_DELETE}" />
		&nbsp; 
		<input type="submit" name="move" class="liteoption" value="{L_MOVE}" />
		&nbsp; 
		<input type="submit" name="lock" class="liteoption" value="{L_LOCK}" />
		&nbsp; 
		<input type="submit" name="unlock" class="liteoption" value="{L_UNLOCK}" />
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
<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
  <tr> 
	<td align="left" valign="middle"><span class="nav">{PAGE_NUMBER}</b></span></td>
	<td align="right" valign="top" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
  </tr>
</table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td align="right">{JUMPBOX}</td>
  </tr>
</table>
