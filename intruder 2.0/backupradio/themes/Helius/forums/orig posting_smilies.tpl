
<script language="javascript" type="text/javascript">
<!--
function emoticon(text) {
	text = ' ' + text + ' ';
	if (opener.document.forms['post'].message.createTextRange && opener.document.forms['post'].message.caretPos) {
		var caretPos = opener.document.forms['post'].message.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		opener.document.forms['post'].message.focus();
	} else {
	opener.document.forms['post'].message.value  += text;
	opener.document.forms['post'].message.focus();
	}
}
//-->
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="10">
	<tr>
		<td>

	<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif"><div align="center"><span class="cattitle">{L_EMOTICONS}</span></div></td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table>			<table width="100%" border="0" cellspacing="1" cellpadding="4" class="forumline">
			<tr>
				<td class="row1"><table width="100" border="0" cellspacing="0" cellpadding="5">
					<!-- BEGIN smilies_row -->
					<tr align="center" valign="middle"> 
						<!-- BEGIN smilies_col -->
						<td><a href="javascript:emoticon('{smilies_row.smilies_col.SMILEY_CODE}')"><img src="{smilies_row.smilies_col.SMILEY_IMG}" border="0" alt="{smilies_row.smilies_col.SMILEY_DESC}" title="{smilies_row.smilies_col.SMILEY_DESC}" /></a></td>
						<!-- END smilies_col -->
					</tr>
					<!-- END smilies_row -->
					<!-- BEGIN switch_smilies_extra -->
					<tr align="center"> 
						<td colspan="{S_SMILIES_COLSPAN}"><span  class="nav"><a href="{U_MORE_SMILIES}" onclick="open_window('{U_MORE_SMILIES}', 250, 300);return false" target="_smilies" class="nav">{L_MORE_SMILIES}</a></td>
					</tr>
					<!-- END switch_smilies_extra -->
				</table></td>
			</tr>
			<tr>
				<td class="row4" align="center" valign="middle"><span class="genmed"><a href="javascript:window.close();" class="genmed">{L_CLOSE_WINDOW}</a></span></td>
			</tr>
		</table>
	<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif">&nbsp;</td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table>		</td>
	</tr>
</table>
