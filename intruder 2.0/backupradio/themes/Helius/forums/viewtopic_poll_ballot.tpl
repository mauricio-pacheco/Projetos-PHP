<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif"><div align="center"><span class="cattitle">{MESSAGE_TITLE}</span></div></td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table><table class="forumline" width="100%" cellspacing="1" cellpadding="3" border="0">
			<tr>
				<td class="row2" colspan="2"><br clear="all" /><form method="POST" action="{S_POLL_ACTION}"><table cellspacing="0" cellpadding="4" border="0" align="center">
					<tr>
						<td align="center"><span class="gen"><b>{POLL_QUESTION}</b></span></td>
					</tr>
					<tr>
						<td align="center"><table cellspacing="0" cellpadding="2" border="0">
							<!-- BEGIN poll_option -->
							<tr>
								<td><input type="radio" name="vote_id" value="{poll_option.POLL_OPTION_ID}" />&nbsp;</td>
								<td><span class="gen">{poll_option.POLL_OPTION_CAPTION}</span></td>
							</tr>
							<!-- END poll_option -->
						</table></td>
					</tr>
					<tr>
						<td align="center">
			<input type="submit" name="submit" value="{L_SUBMIT_VOTE}" class="liteoption" />
		  </td>
					</tr>
					<tr>
						
		  <td align="center"><span class="gensmall"><b><a href="{U_VIEW_RESULTS}" class="gensmall">{L_VIEW_RESULTS}</a></b></span></td>
					</tr>
				</table>{S_HIDDEN_FIELDS}</form></td>
			</tr>
</table>
	<table border="0" height="10" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="right">&nbsp;</td>
	<td width="500" background="themes/Helius/forums/images/bg2.gif">&nbsp;</td>
	<td width="6" background="themes/Helius/forums/images/cubo.gif" align="left">&nbsp;</td>
</tr>
</table><table width="100%"><tr><td><img src="themes/Helius/forums/images/spacer.gif" width="1" height="10" border="0" /></td></tr></table><!-- replacement of <br clear="all" /> because of Opera 7 bug. -->
