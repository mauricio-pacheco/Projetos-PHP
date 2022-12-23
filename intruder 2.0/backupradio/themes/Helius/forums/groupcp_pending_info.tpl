
<table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->

	<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif"><div align="center"><span class="cattitle">{L_PENDING_MEMBERS}</span></div></td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table><table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
<tr> 
	<th class="thCornerL" height="25">{L_PM}</th>
	<th class="thTop">{L_USERNAME}</th>
	<th class="thTop">{L_POSTS}</th>
	<th class="thTop">{L_FROM}</th>
	<th class="thTop">{L_EMAIL}</th>
	<th class="thTop">{L_WEBSITE}</th>
	<th class="thCornerR">{L_SELECT}</th>
</tr>
<!-- BEGIN pending_members_row -->
<tr> 
	<td class="row4" align="center"> {pending_members_row.PM_IMG} </td>
	<td class="row1" align="center" onmouseover="this.style.backgroundColor='#F8F9FA';" onmouseout="this.style.backgroundColor='#EDEFF2';" onclick="window.location.href='{pending_members_row.U_VIEWPROFILE}'"><span class="gen"><a href="{pending_members_row.U_VIEWPROFILE}" class="gen">{pending_members_row.USERNAME}</a></span></td>
	<td class="row2" align="center"><span class="gen">{pending_members_row.POSTS}</span></td>
	<td class="row1" align="center"><span class="gen">{pending_members_row.FROM}</span></td>
	<td class="row2" align="center"><span class="gen">{pending_members_row.EMAIL_IMG}</span></td>
	<td class="row3" align="center"><span class="gen">{pending_members_row.WWW_IMG}</span></td>
	<td class="row4" align="center"><span class="gensmall"> <input type="checkbox" name="pending_members[]" value="{pending_members_row.USER_ID}" checked="checked" /></span></td>
</tr>
<!-- END pending_members_row -->
<tr> 
	<td class="row4" colspan="8" align="right"><span class="gen"> 
		<input type="submit" name="approve" value="{L_APPROVE_SELECTED}" class="mainoption" />
		&nbsp; 
		<input type="submit" name="deny" value="{L_DENY_SELECTED}" class="liteoption" />
	</span></td>
</tr>
</table>
	<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif">&nbsp;</td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table><table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
