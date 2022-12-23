<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta name="CreatedBy" content="Vjacheslav Trushkin - http://www.trushkin.net/">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" href="themes/Helius/forums/forums.css" type="text/css">
<style type="text/css">
<!--
th, td.th, td.spacerow	{ background-image: url(themes/Helius/forums/images/bg_cat.gif); }
td.th2	{ background-image: url(themes/Helius/forums/images/bg_cat2.gif); }
td.cat,td.catHead,td.catSides,td.catLeft,td.catRight,td.catBottom, td.row4	{ background-image: url(themes/Helius/forums/images/bg_cat4.gif); }

/* Import the fancy styles for IE only (NS4.x doesn't use the @import function) */
@import url("themes/Helius/forums/formIE.css"); 
-->
</style>
<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
<script language="javascript" type="text/javascript">
<!--

 function changeImages()
 {
  if (document.images)
  {
   for (var i=0; i<changeImages.arguments.length; i+=2)
   {
    document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
   }
  }
 }

 var PreloadFlag = false;

 function newImage(arg)
 {
  if (document.images)
  {
   rslt = new Image();
   rslt.src = arg;
   return rslt;
  }
 }

 function PreloadImages()
 {
  if (document.images)
  {
	// preload all rollover images
	<!-- BEGIN switch_user_logged_out -->
	img0 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_login_on.gif');
	img1 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_register_on.gif');
	<!-- END switch_user_logged_out -->
	<!-- BEGIN switch_user_logged_in -->
	img2 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_pm_on.gif');
	img3 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_profile_on.gif');
	img4 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_groups_on.gif');
	img5 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_logout_on.gif');
	<!-- END switch_user_logged_in -->
	img6 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_faq_on.gif');
	img7 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_search_on.gif');
	img8 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_users_on.gif');
	img9 = newImage('themes/Helius/forums/images/lang_{LANG}/btn_index_on.gif');
	PreloadFlag = true;
  }
  return true;
 }

//-->
</script>
</head>
<body bgcolor="#E5E8EE" text="#000000" link="#364D67" vlink="#2C3E52" marginwidth="10" marginheight="10" leftmargin="10" topmargin="10" background="themes/Helius/forums/images/bg_main.gif" onload="PreloadImages();" />

<a name="top"></a>


<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#525E6E">
<tr>
	<td width="100%" background="themes/Helius/forums/images/logo_bg.gif" align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr height="23">
		<td width="130">&nbsp;</td>
		<td width="100%" nowrap="nowrap" align="right" valign="top"><table border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<!-- BEGIN switch_user_logged_out -->
			<td align="center" valign="middle"><a title="{L_LOGIN_LOGOUT}" href="{U_LOGIN_LOGOUT}" class="mainmenu" onMouseOver="changeImages('btn_top_login', 'themes/Helius/forums/images/lang_{LANG}/btn_login_on.gif'); return true;" onMouseOut="changeImages('btn_top_login', 'themes/Helius/forums/images/lang_{LANG}/btn_login.gif'); return true;"><img name="btn_top_login" src="themes/Helius/forums/images/lang_{LANG}/btn_login.gif" height="23" border="0" alt="{L_LOGIN_LOGOUT}" /></a></td>
			<td align="center" valign="middle"><a title="{L_REGISTER}" href="{U_REGISTER}" class="mainmenu" onMouseOver="changeImages('btn_top_register', 'themes/Helius/forums/images/lang_{LANG}/btn_register_on.gif'); return true;" onMouseOut="changeImages('btn_top_register', 'themes/Helius/forums/images/lang_{LANG}/btn_register.gif'); return true;"><img name="btn_top_register" src="themes/Helius/forums/images/lang_{LANG}/btn_register.gif" height="23" border="0" alt="{L_REGISTER}" /></a></td>
			<!-- END switch_user_logged_out -->
			<!-- BEGIN switch_user_logged_in -->
			<td align="center" valign="middle"><a title="{L_PROFILE}" href="{U_PROFILE}" class="mainmenu" onMouseOver="changeImages('btn_top_profile', 'themes/Helius/forums/images/lang_{LANG}/btn_profile_on.gif'); return true;" onMouseOut="changeImages('btn_top_profile', 'themes/Helius/forums/images/lang_{LANG}/btn_profile.gif'); return true;"><img name="btn_top_profile" src="themes/Helius/forums/images/lang_{LANG}/btn_profile.gif" border="0" alt="{L_PROFILE}" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center" valign="middle"><a title="{PRIVATE_MESSAGE_INFO}" href="{U_PRIVATEMSGS}" class="mainmenu" onMouseOver="changeImages('btn_top_pm', 'themes/Helius/forums/images/lang_{LANG}/btn_pm_on.gif'); return true;" onMouseOut="changeImages('btn_top_pm', 'themes/Helius/forums/images/lang_{LANG}/btn_pm.gif'); return true;"><img name="btn_top_pm" src="themes/Helius/forums/images/lang_{LANG}/btn_pm.gif" border="0" alt="{PRIVATE_MESSAGE_INFO}" /></a></td>
			<!-- END switch_user_logged_in -->
			<!-- BEGIN switch_user_logged_in -->
			<!-- END switch_user_logged_in -->
		</tr>
		</table></td>
	</tr>
	</table>
	</td>
</tr>
</table>

<br />

<table border="0" cellspacing="0" cellpadding="10" width="100%">
<tr>
	<td align="center" valign="top">
