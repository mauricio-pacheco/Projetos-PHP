<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
<form action="{S_GROUPCP_ACTION}" method="post">

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="left" class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></td>
	</tr>
</table>

<table class="forumline" width="100%" cellspacing="1" cellpadding="4" border="0">
	<tr> 
		<th class="thHead" colspan="7" height="25"><span class="tableTitle">{L_GROUP_INFORMATION}</span></th>
	</tr>
	<tr> 
		<td class="row2" width="20%"><span class="gen">{L_GROUP_NAME}:</span></td>
		<td class="row2"><span class="gen"><b>{GROUP_NAME}</b></span></td>
	</tr>
	<tr> 
		<td class="row2" width="20%"><span class="gen">{L_GROUP_DESC}:</span></td>
		<td class="row2"><span class="gen">{GROUP_DESC}</span></td>
	</tr>
	<tr> 
		<td class="row2" width="20%"><span class="gen">{L_GROUP_MEMBERSHIP}:</span></td>
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
		<td class="row2" width="20%"><span class="gen">{L_GROUP_TYPE}:</span></td>
		<td class="row2"><span class="gen"><span class="gen"><input type="radio" name="group_type" value="{S_GROUP_OPEN_TYPE}" {S_GROUP_OPEN_CHECKED} /> {L_GROUP_OPEN} &nbsp;&nbsp;<input type="radio" name="group_type" value="{S_GROUP_CLOSED_TYPE}" {S_GROUP_CLOSED_CHECKED} />	{L_GROUP_CLOSED} &nbsp;&nbsp;<input type="radio" name="group_type" value="{S_GROUP_HIDDEN_TYPE}" {S_GROUP_HIDDEN_CHECKED} />	{L_GROUP_HIDDEN} &nbsp;&nbsp; <input class="mainoption" type="submit" name="groupstatus" value="{L_UPDATE}" /></span></td>
	</tr>
	<!-- END switch_mod_option -->
</table>

{S_HIDDEN_FIELDS}

</form>

<form action="{S_GROUPCP_ACTION}" method="post" name="post">
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
	  <td class="catSides" colspan="8" height="28"><span class="cattitle">{L_GROUP_MODERATOR}</span></td>
	</tr>
	<tr> 
	  <td class="row2" align="center"> {MOD_PM_IMG} </td>
	  <td class="row2" align="center"><span class="gen"><a href="{U_MOD_VIEWPROFILE}" class="gen">{MOD_USERNAME}</a></span></td>
	  <td class="row2" align="center" valign="middle"><span class="gen">{MOD_POSTS}</span></td>
	  <td class="row2" align="center" valign="middle"><span class="gen">{MOD_FROM}</span></td>
	  <td class="row2" align="center" valign="middle"><span class="gen">{MOD_EMAIL_IMG}</span></td>
	  <td class="row2" align="center">{MOD_WWW_IMG}</td>
	  <td class="row2" align="center">&nbsp;  </td>
	</tr>
	<tr> 
	  <td class="catSides" colspan="8" height="28"><span class="cattitle">{L_GROUP_MEMBERS}</span></td>
	</tr>
	<!-- BEGIN member_row -->
	<tr> 
	  <td class="{member_row.ROW_CLASS}" align="center"> {member_row.PM_IMG} </td>
	  <td class="{member_row.ROW_CLASS}" align="center"><span class="gen"><a href="{member_row.U_VIEWPROFILE}" class="gen">{member_row.USERNAME}</a></span></td>
	  <td class="{member_row.ROW_CLASS}" align="center"><span class="gen">{member_row.POSTS}</span></td>
	  <td class="{member_row.ROW_CLASS}" align="center"><span class="gen"> {member_row.FROM} 
		</span></td>
	  <td class="{member_row.ROW_CLASS}" align="center" valign="middle"><span class="gen">{member_row.EMAIL_IMG}</span></td>
	  <td class="{member_row.ROW_CLASS}" align="center"> {member_row.WWW_IMG}</td>
	  <td class="{member_row.ROW_CLASS}" align="center"> 
	  <!-- BEGIN switch_mod_option -->
	  <input type="checkbox" name="members[]" value="{member_row.USER_ID}" /> 
	  <!-- END switch_mod_option -->
	  </td>
	</tr>
	<!-- END member_row -->

	<!-- BEGIN switch_no_members -->
	<tr> 
	  <td class="row2" colspan="7" align="center"><span class="gen">{L_NO_MEMBERS}</span></td>
	</tr>
	<!-- END switch_no_members -->

	<!-- BEGIN switch_hidden_group -->
	<tr> 
	  <td class="row2" colspan="7" align="center"><span class="gen">{L_HIDDEN_MEMBERS}</span></td>
	</tr>
	<!-- END switch_hidden_group -->

	<!-- BEGIN switch_mod_option -->
	<tr>
		<td class="catBottom" colspan="8" align="right"><span class="cattitle">
			<input type="submit" name="remove" value="{L_REMOVE_SELECTED}" class="mainoption" />
		</td>
	</tr>
	<!-- END switch_mod_option -->
</table>

<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
		<td align="left" valign="top">
		<!-- BEGIN switch_mod_option -->
		<span class="genmed"><input type="text"  class="post" name="username" maxlength="50" size="20" /> <input type="submit" name="add" value="{L_ADD_MEMBER}" class="mainoption" /></span><br /><br />
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
</td>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_09.gif"><img name="rt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
  </tr>
  <tr>
   <td><img name="btoz" src="themes/XD-Obstuse/forums/images/table/xtratv5_12.gif" border="0" alt=""></td>
   
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_13.gif"><img name="btm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="btmr" src="themes/XD-Obstuse/forums/images/table/xtratv5_15.gif" border="0" alt=""></td>
  </tr></table>  