
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
        
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="forumline2">
 
<tr> 
<td  class="row2" height="34" valign="top" class="nav"><div align="center"><a href="{U_VIEW_TOPIC}" class="maintitle">{TOPIC_TITLE}</a> 
      <br /> 
  {PAGINATION}</div></td> 
</tr> 
</table> 
<table width="100%" cellspacing="2" cellpadding="2" border="0" class="row2"> 
<tr> 
<td  class="row2"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" title="{L_POST_NEW_TOPIC}" /></a><a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" alt="{L_POST_REPLY_TOPIC}" hspace="8" border="0" title="{L_POST_REPLY_TOPIC}" /></a></td> 
<td width="100%" class="nav"><a href="{U_INDEX}">{L_INDEX}</a> &raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a></td> 
</tr> 
</table> 
<table class="row2" width="100%" cellspacing="1" cellpadding="3" border="0">
	<tr align="right">
		<td height="28"><span class="nav"><a href="{U_VIEW_OLDER_TOPIC}" class="row2">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a> &nbsp;</span></td>
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

<table  width="100%" cellspacing="0" cellpadding="0" border=0>
	
	{POLL_DISPLAY} 
	
</table>
	
	<!-- BEGIN postrow -->
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#999999">
	   <table border=0 cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td  class="row2" width="20%" height="25"><div align="center">{L_AUTHOR}</div></td>
		<td   class="row33" width="80%"><div align="center">{L_MESSAGE}</div></td>
	</tr>
	<tr> 
		<td width="20%" align="left" valign="top" class="row2"><div align="center"><span ><a name="{postrow.U_POST_ID}"></a><b>&nbsp;{postrow.POSTER_NAME}</b></span><br />
            <span >&nbsp;Rank: <span >{postrow.POSTER_RANK}<br>
            </span></span><span >{postrow.RANK_IMAGE}</span><br>
            <br>		  
              <span >{postrow.POSTER_AVATAR}<br>
              </span></div>
		  <div align="center"><span >{postrow.EDIT_IMG} {postrow.DELETE_IMG} <br />
&nbsp;{postrow.POSTER_JOINED}<br />
&nbsp;{postrow.POSTER_POSTS}<br />
&nbsp;{postrow.POSTER_FROM}</span><br />
	      </div></td>
		<td width="80%" valign="top" class="row2"><table width="100%" border=0 cellspacing="3" cellpadding="0">
          <tr>
            <td  width="100%" ><a href="{postrow.U_MINI_POST}"><img src="{postrow.MINI_POST_IMG}" width="12" height="9" alt="{postrow.L_MINI_POST_ALT}" title="{postrow.L_MINI_POST_ALT}" border="0" /></a><span class="postdetails">{L_POSTED}: {postrow.POST_DATE}<span class="gen">&nbsp;</span>&nbsp; &nbsp;{L_POST_SUBJECT}: {postrow.POST_SUBJECT}<br>
              </span></td>
            <td valign="bottom" align="right" nowrap="nowrap">{postrow.QUOTE_IMG} {postrow.EDIT_IMG} {postrow.DELETE_IMG} {postrow.IP_IMG}</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><span class="row11">{postrow.MESSAGE}</span><span class="postbody">{postrow.SIGNATURE}</span><span class="gensmall">{postrow.EDITED_MESSAGE}</span></td>
          </tr>
        </table>
		  <hr width="95%">
		  <div align="center"><span class="postdetails"></span></div></td>
	</tr>
	<tr> 
		<td class="row3" width="150" align="left" valign="middle"><span class="nav"><a href="#top" class="nav">&nbsp;{L_BACK_TO_TOP}</a></span></td>
		<td " width="100%" height="28" valign="middle" nowrap="nowrap" class="row3"><table  width="18" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr> 
				<td valign="top" nowrap="nowrap"><br>{postrow.PROFILE_IMG} {postrow.PM_IMG} {postrow.EMAIL_IMG} {postrow.WWW_IMG} {postrow.AIM_IMG} {postrow.YIM_IMG} {postrow.MSN_IMG}<script language="JavaScript" type="text/javascript"><!-- 

	if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 )
		document.write(' {postrow.ICQ_IMG}');
	else
		document.write('</td><td>&nbsp;</td><td valign="top" nowrap="nowrap"><br><div style="position:relative"><div style="position:absolute">{postrow.ICQ_IMG}</div><div style="position:absolute;left:3px;top:-1px">{postrow.ICQ_STATUS_IMG}</div></div>');
				
				//--></script><noscript>{postrow.ICQ_IMG}</noscript></td>
			</tr>
        </table></td>
	</tr>
	<tr> 
		<td class="pic" colspan="2" height="25"><img src="themes/MStudioV2/forums/images/spacer.gif" alt="" width="1" height="1" /></td>
	</tr></table>	</td>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_09.gif"><img name="rt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
  </tr>
  <tr>
   <td><img name="btoz" src="themes/XD-Obstuse/forums/images/table/xtratv5_12.gif" border="0" alt=""></td>
   
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_13.gif"><img name="btm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="btmr" src="themes/XD-Obstuse/forums/images/table/xtratv5_15.gif" border="0" alt=""></td>
  </tr></table>  
	<!-- END postrow -->
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
  <table border="0" cellpadding="4" cellspacing="0" width="100%" class="row2">
	<tr align="right"> 
		<td class="row2" height="28"><table cellspacing="0" cellpadding="0" border="0">
			<tr><form method="post" action="{S_POST_DAYS_ACTION}">
				<td align="right"><span class="gensmall">{L_DISPLAY_POSTS}: {S_SELECT_POST_DAYS}&nbsp;{S_SELECT_POST_ORDER}&nbsp;<input type="submit" value="{L_GO}" class="liteoption" name="submit" /></span></td>
			</form></tr>
		</table></td>
	</tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0" class="row2" > 
<tr> 
<td class="row2" ><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" title="{L_POST_NEW_TOPIC}" /></a><a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" alt="{L_POST_REPLY_TOPIC}" hspace="8" border="0" title="{L_POST_REPLY_TOPIC}" /></a></td> 
<td width="100%" class="row2" ><a href="{U_INDEX}">{L_INDEX}</a> &raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a></td> 
</tr> 
</table> 
<table  width="100%" cellspacing="1" cellpadding="3" border="0">
	<tr align="right">
		<td height="28"><span class="nav"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a> &nbsp;</span></td>
	</tr>
</table> 

<table width="100%" border="0" cellspacing="0" cellpadding="4" > 
<tr> 
<td  valign="top">{PAGINATION}</td>
  </tr>
  <tr>
	<td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
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
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
        


<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td width="40%" valign="top" nowrap="nowrap" align="left"><span class="gensmall">
	  {S_TOPIC_ADMIN}{QUICK_REPLY_FORM}</td>
	<td align="right" valign="top" nowrap="nowrap">{JUMPBOX}<span class="gensmall">{S_AUTH_LIST}</span></td>
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
