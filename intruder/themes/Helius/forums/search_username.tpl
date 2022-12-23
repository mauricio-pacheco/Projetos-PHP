
<script language="javascript" type="text/javascript">
<!--
function refresh_username(selected_username)
{
	opener.document.forms['post'].username.value = selected_username;
	opener.focus();
	window.close();
}
//-->
</script>

<form method="post" name="search" action="{S_SEARCH_ACTION}">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
	<tr>
		<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="50" align="right" valign="bottom"><img src="themes/Helius/forums/images/top_left.gif" width="50" height="28" border="0" alt="" /></td>
	<td width="100%" align="center" valign="middle" background="themes/Helius/forums/images/top_center.gif"><span class="cattitle">{L_SEARCH_USERNAME}</span></td>
	<td width="50" align="left" valign="bottom"><img src="themes/Helius/forums/images/top_right.gif" width="50" height="28" border="0" alt="" /></td>
</tr>
</table>
			<table width="100%" class="forumline" cellpadding="4" cellspacing="1" border="0">
			<tr> 
				<td align="center" valign="top" class="row1"><span class="genmed"><br /><input type="text" name="search_username" value="{USERNAME}" class="post" />&nbsp; <input type="submit" name="search" value="{L_SEARCH}" class="liteoption" /></span><br /><span class="gensmall">{L_SEARCH_EXPLAIN}</span><br />
				<!-- BEGIN switch_select_name -->
				<span class="genmed">{L_UPDATE_USERNAME}<br /><select name="username_list">{S_USERNAME_OPTIONS}</select>&nbsp; <input type="submit" class="liteoption" onClick="refresh_username(this.form.username_list.options[this.form.username_list.selectedIndex].value);return false;" name="use" value="{L_SELECT}" /></span><br />
				<!-- END switch_select_name -->
				<br /><span class="genmed"><a href="javascript:window.close();" class="genmed">{L_CLOSE_WINDOW}</a></span></td>
			</tr>
		</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="40" align="right" valign="top"><img src="themes/Helius/forums/images/bottom_left.gif" width="40" height="9" border="0" alt="" /></td>
	<td width="100%" background="themes/Helius/forums/images/bottom_center.gif"><img src="themes/Helius/forums/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
	<td width="40" align="left" valign="top"><img src="themes/Helius/forums/images/bottom_right.gif" width="40" height="9" border="0" alt="" /></td>
</tr>
</table>
	</td>
	</tr>
</table>
</form>
