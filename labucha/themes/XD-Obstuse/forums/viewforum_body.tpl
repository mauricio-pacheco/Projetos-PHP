
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
        
<form method="post" action="{S_POST_DAYS_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" align="center" class="row2" >
	<tr> 
	  <td align="left" class="row33" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_FORUM}">{FORUM_NAME}</a><br /><span class="gensmall"><b>{L_MODERATOR}: {MODERATORS}<br /><br />{LOGGED_IN_USER_LIST}</b></span></td>
	  <td align="right" class="row33" valign="bottom" nowrap="nowrap"><span ><b>{PAGINATION}</b></span></td>
	</tr>
	<tr> 
	   <td align="left" valign="middle" class="row33" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" class="row33" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="bottom" class="row33" nowrap="nowrap"><span class="gensmall"><a href="{U_MARK_READ}">{L_MARK_TOPICS_READ}</a></span></td>
	</tr>
  </table>

  <table cellpadding="4" cellspacing="1" width="100%" border=0>
    <tr>
      <td height="25"colspan="2" align="center" background="themes/XD-Obstuse/images/row33.gif" class="row22">{L_TOPICS}</td>
      <td width="50" align="center" background="themes/XD-Obstuse/images/row33.gif"class="row22">&nbsp;{L_REPLIES}&nbsp;</td>
      <td width="100" align="center" background="themes/XD-Obstuse/images/row33.gif" class="row22">&nbsp;{L_AUTHOR}&nbsp;</td>
      <td width="50" align="center" background="themes/XD-Obstuse/images/row33.gif" class="row22">&nbsp;{L_VIEWS}&nbsp;</td>
      <td align="center" background="themes/XD-Obstuse/images/row33.gif" class="row22">&nbsp;{L_LASTPOST}&nbsp;</td>
    </tr>
    <!-- BEGIN topicrow -->
    <tr>
      <td class="row33" align="center" valign="middle" width="20"><img src="{topicrow.TOPIC_FOLDER_IMG}" alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" /></td>
      <td class="row11" width="100%"  onclick="window.location.href='{topicrow.U_VIEW_TOPIC}'"><span class="topictitle">{topicrow.NEWEST_POST_IMG}{topicrow.TOPIC_ATTACHMENT_IMG}{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="topictitle">{topicrow.TOPIC_TITLE}</a></span><span class="gensmall"><br />
      {topicrow.GOTO_PAGE}</span></td>
      <td class="row11" align="center" valign="middle"><span class="postdetails">{topicrow.REPLIES}</span></td>
      <td class="row11" align="center" valign="middle"><span class="name">{topicrow.TOPIC_AUTHOR}</span></td>
      <td class="row11" align="center" valign="middle"><span class="postdetails">{topicrow.VIEWS}</span></td>
      <td class="row11" align="center" valign="middle" nowrap="nowrap"><span class="postdetails">{topicrow.LAST_POST_TIME}<br />
        {topicrow.LAST_POST_AUTHOR} {topicrow.LAST_POST_IMG}</span></td>
    </tr>
    <!-- END topicrow -->
    <!-- BEGIN switch_no_topics -->
    <tr>
      <td class="row2" colspan="6" height="30" align="center" valign="middle"><span class="gen">{L_NO_TOPICS}</span></td>
    </tr>
    <!-- END switch_no_topics -->
    <tr>
      <td  class="row22" align="center" valign="middle" colspan="6" height="28"><span class="genmed">{L_DISPLAY_TOPICS}:&nbsp;{S_SELECT_TOPIC_DAYS}&nbsp;
            <input type="submit" class="liteoption" value="{L_GO}" name="submit" />
      </span></td>
    </tr>
  </table>
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="middle" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
		</td>
	</tr>
	<tr>
	  <td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
	</tr>
  </table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td align="center" height="50" valign="middle">{JUMPBOX}</td>
  </tr>
</table>

<table width="100%" cellspacing="0" border="0" align="center" cellpadding="3" class="tablein">
	<tr>
		<td class="row22" align="left" valign="top"><table cellspacing="3" cellpadding="0" border="0">
			<tr>
				<td width="20" align="left"><img src="{FOLDER_NEW_IMG}" alt="{L_NEW_POSTS}" /></td>
				<td class="gensmall">{L_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_IMG}" alt="{L_NO_NEW_POSTS}" /></td>
				<td class="gensmall">{L_NO_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_ANNOUNCE_IMG}" alt="{L_ANNOUNCEMENT}"  /></td>
				<td class="gensmall">{L_ANNOUNCEMENT}</td>
			</tr>
			<tr> 
				<td width="20" align="center"><img src="{FOLDER_HOT_NEW_IMG}" alt="{L_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_HOT_IMG}" alt="{L_NO_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_STICKY_IMG}" alt="{L_STICKY}"  /></td>
				<td class="gensmall">{L_STICKY}</td>
			</tr>
			<tr>
				<td class="gensmall"><img src="{FOLDER_LOCKED_NEW_IMG}" alt="{L_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_LOCKED}</td>
				<td>&nbsp;&nbsp;</td>
				<td class="gensmall"><img src="{FOLDER_LOCKED_IMG}" alt="{L_NO_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_LOCKED}</td>
			</tr>
		</table></td>
		<td  class="row22" align="right"><span class="gensmall">{S_AUTH_LIST}</span></td>
	</tr>
</table></td>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_09.gif"><img name="rt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
  </tr>
  <tr>
   <td><img name="btoz" src="themes/XD-Obstuse/forums/images/table/xtratv5_12.gif" border="0" alt=""></td>
   
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_13.gif"><img name="btm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="btmr" src="themes/XD-Obstuse/forums/images/table/xtratv5_15.gif" border="0" alt=""></td>
  </tr></table>  
