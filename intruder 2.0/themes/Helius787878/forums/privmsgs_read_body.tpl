
<table cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td valign="middle">{INBOX_IMG}</td>
	<td valign="middle"><span class="cattitle">{INBOX} &nbsp;</span></td>
	<td valign="middle">{SENTBOX_IMG}</td>
	<td valign="middle"><span class="cattitle">{SENTBOX} &nbsp;</span></td>
	<td valign="middle">{OUTBOX_IMG}</td>
	<td valign="middle"><span class="cattitle">{OUTBOX} &nbsp;</span></td>
	<td valign="middle">{SAVEBOX_IMG}</td>
	<td valign="middle"><span class="cattitle">{SAVEBOX}</span></td>
  </tr>
</table>

<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->

<form method="post" action="{S_PRIVMSGS_ACTION}">
{S_HIDDEN_FIELDS}
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr>
	  <td valign="middle">{REPLY_PM_IMG}</td>
	  <td width="100%"><span class="nav">&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{POST_SUBJECT}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="1" width="100%" class="forumline">
<tr>
	<td class="th" align="right" valign="middle"><table border="0" cellspacing="0" cellpadding="2">
	<tr height="26">
		<td align="right" valign="bottom" nowrap="nowrap" height="26">{QUOTE_PM_IMG} {EDIT_PM_IMG}</td>
	</tr>
	</table></td>
</tr>
<tr>
	<td class="row1" align="left" valign="top" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%"><!-- main table start -->
	<tr>
		<td width="150" align="left" valign="top" rowspan="2"><table border="0" cellspacing="0" cellpadding="0" width="100%"><!-- left row table start -->
		<tr>
			<td width="100%" align="left" valign="top" background="themes/Helius/forums/images/post_bg.gif"><table border="0" cellspacing="0" cellpadding="4">
			<tr>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{L_FROM}:</span></td>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{MESSAGE_FROM}</span></td>
			</tr>
			<tr>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{L_TO}:</span></td>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{MESSAGE_TO}</span></td>
			</tr>
			<tr>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{L_POSTED}:</span></td>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{POST_DATE}</span></td>
			</tr>
			<tr>
				<td align="left" valign="top" nowrap="nowrap"><span class="genmed">{L_SUBJECT}:</span></td>
				<td align="left" valign="top"><span class="genmed">{POST_SUBJECT}</span></td>
			</tr>
			</table><br /><br /></td>
			<td width="10" background="themes/Helius/forums/images/post_right.gif"><img src="themes/Helius/forums/images/spacer.gif" width="10" height="1" border="0" /></td>
		</tr>
		<tr>
			<td height="10" background="themes/Helius/forums/images/post_bottom.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td>
			<td width="10" height="10"><img src="themes/Helius/forums/images/post_corner.gif" width="10" height="10" border="0" /></td>
		</tr>
		<!-- left row table end --></table><br /><br /></td>
		<td class="row1" align="left" valign="top" width="100%"><table border="0" cellspacing="0" cellpadding="5" width="100%"><!-- right row table start -->
		<tr>
			<td width="100%"><span class="postbody">{MESSAGE}</span></td>
		</tr>
		<!-- right row table end --></table></td>
	</tr>
	<tr>
		<td class="row1" align="right" valign="bottom" nowrap="nowrap">
			<input type="submit" name="save" value="{L_SAVE_MSG}" class="liteoption" /><input type="submit" name="delete" value="{L_DELETE_MSG}" class="liteoption" />
		</td>
	</tr>
	</table></td>
</tr>
<tr>
	<td height="28" align="center" valign="bottom" class="row4"><table border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td width="170"><img src="themes/Helius/forums/images/spacer.gif" width="170" height="1" border="0" /></td>
		<td width="100%" align="left" valign="middle" nowrap="nowrap">{PROFILE_IMG} {PM_IMG} {EMAIL_IMG} {WWW_IMG} {AIM_IMG} {YIM_IMG} {MSN_IMG} {ICQ_IMG}</td>
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
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td>{REPLY_PM_IMG}</td>
	  <td align="right" valign="top" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span></td>
	</tr>
</table>
</form>



<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
  <tr> 
	<td valign="top" align="right"><span class="gensmall">{JUMPBOX}</span></td>
  </tr>
</table>
