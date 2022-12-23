<script language="JavaScript" src="modules/Forums/bbcode_box/add_bbcode.js" type="text/javascript"></script>
<!--
// Startup variables
var imageTag = false;
var theSelection = false;

// Check for Browser & Platform for PC & IE specific bits
// More details from: http://www.mozilla.org/docs/web-developer/sniffer/browser_type.html
var clientPC = navigator.userAgent.toLowerCase(); // Get client info
var clientVer = parseInt(navigator.appVersion); // Get browser version

var is_ie = ((clientPC.indexOf("msie") != -1) && (clientPC.indexOf("opera") == -1));
var is_nav  = ((clientPC.indexOf('mozilla')!=-1) && (clientPC.indexOf('spoofer')==-1)
                && (clientPC.indexOf('compatible') == -1) && (clientPC.indexOf('opera')==-1)
                && (clientPC.indexOf('webtv')==-1) && (clientPC.indexOf('hotjava')==-1));

var is_win   = ((clientPC.indexOf("win")!=-1) || (clientPC.indexOf("16bit") != -1));
var is_mac    = (clientPC.indexOf("mac")!=-1);


// Helpline messages
b_help = "{L_BBCODE_B_HELP}";
i_help = "{L_BBCODE_I_HELP}";
u_help = "{L_BBCODE_U_HELP}";
q_help = "{L_BBCODE_Q_HELP}";
c_help = "{L_BBCODE_C_HELP}";
l_help = "{L_BBCODE_L_HELP}";
o_help = "{L_BBCODE_O_HELP}";
p_help = "{L_BBCODE_P_HELP}";
w_help = "{L_BBCODE_W_HELP}";
a_help = "{L_BBCODE_A_HELP}";
s_help = "{L_BBCODE_S_HELP}";
f_help = "{L_BBCODE_F_HELP}";

// Define the bbCode tags
bbcode = new Array();
bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]','[quote]','[/quote]','[code]','[/code]','[list]','[/list]','[list=]','[/list]','[img]','[/img]','[url]','[/url]');
imageTag = false;

// Shows the help messages in the helpline window
function helpline(help) {
	document.post.helpbox.value = eval(help + "_help");
}


// Replacement for arrayname.length property
function getarraysize(thearray) {
	for (i = 0; i < thearray.length; i++) {
		if ((thearray[i] == "undefined") || (thearray[i] == "") || (thearray[i] == null))
			return i;
		}
	return thearray.length;
}

// Replacement for arrayname.push(value) not implemented in IE until version 5.5
// Appends element to the array
function arraypush(thearray,value) {
	thearray[ getarraysize(thearray) ] = value;
}

// Replacement for arrayname.pop() not implemented in IE until version 5.5
// Removes and returns the last element of an array
function arraypop(thearray) {
	thearraysize = getarraysize(thearray);
	retval = thearray[thearraysize - 1];
	delete thearray[thearraysize - 1];
	return retval;
}


function checkForm() {

	formErrors = false;    

	if (document.post.message.value.length < 2) {
		formErrors = "{L_EMPTY_MESSAGE}";
	}

	if (formErrors) {
		alert(formErrors);
		return false;
	} else {
		bbstyle(-1);
		//formObj.preview.disabled = true;
		//formObj.submit.disabled = true;
		return true;
	}
}

function emoticon(text) {
	text = ' ' + text + ' ';
	if (document.post.message.createTextRange && document.post.message.caretPos) {
		var caretPos = document.post.message.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		document.post.message.focus();
	} else {
	document.post.message.value  += text;
	document.post.message.focus();
	}
}

function bbfontstyle(bbopen, bbclose) {
	if ((clientVer >= 4) && is_ie && is_win) {
		theSelection = document.selection.createRange().text;
		if (!theSelection) {
			document.post.message.value += bbopen + bbclose;
			document.post.message.focus();
			return;
		}
		document.selection.createRange().text = bbopen + theSelection + bbclose;
		document.post.message.focus();
		return;
	} else {
		document.post.message.value += bbopen + bbclose;
		document.post.message.focus();
		return;
	}
	storeCaret(document.post.message);
}


function bbstyle(bbnumber) {

	donotinsert = false;
	theSelection = false;
	bblast = 0;

	if (bbnumber == -1) { // Close all open tags & default button names
		while (bbcode[0]) {
			butnumber = arraypop(bbcode) - 1;
			document.post.message.value += bbtags[butnumber + 1];
			buttext = eval('document.post.addbbcode' + butnumber + '.value');
			eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
		}
		imageTag = false; // All tags are closed including image tags :D
		document.post.message.focus();
		return;
	}

	if ((clientVer >= 4) && is_ie && is_win)
		theSelection = document.selection.createRange().text; // Get text selection
		
	if (theSelection) {
		// Add tags around selection
		document.selection.createRange().text = bbtags[bbnumber] + theSelection + bbtags[bbnumber+1];
		document.post.message.focus();
		theSelection = '';
		return;
	}
	
	// Find last occurance of an open tag the same as the one just clicked
	for (i = 0; i < bbcode.length; i++) {
		if (bbcode[i] == bbnumber+1) {
			bblast = i;
			donotinsert = true;
		}
	}

	if (donotinsert) {		// Close all open tags up to the one just clicked & default button names
		while (bbcode[bblast]) {
				butnumber = arraypop(bbcode) - 1;
				document.post.message.value += bbtags[butnumber + 1];
				buttext = eval('document.post.addbbcode' + butnumber + '.value');
				eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
				imageTag = false;
			}
			document.post.message.focus();
			return;
	} else { // Open tags
	
		if (imageTag && (bbnumber != 14)) {		// Close image tag before adding another
			document.post.message.value += bbtags[15];
			lastValue = arraypop(bbcode) - 1;	// Remove the close image tag from the list
			document.post.addbbcode14.value = "Img";	// Return button back to normal state
			imageTag = false;
		}
		
		// Open tag
		document.post.message.value += bbtags[bbnumber];
		if ((bbnumber == 14) && (imageTag == false)) imageTag = 1; // Check to stop additional tags after an unclosed image tag
		arraypush(bbcode,bbnumber+1);
		eval('document.post.addbbcode'+bbnumber+'.value += "*"');
		document.post.message.focus();
		return;
	}
	storeCaret(document.post.message);
}

// Insert at Claret position. Code from
// http://www.faqts.com/knowledge_base/view.phtml/aid/1052/fid/130
function storeCaret(textEl) {
	if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
}

//-->
</script>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="stratoV5_TBLS_01" src="themes/XD-Obstuse/forums/images/table/xtratv5_01.gif" border="0" alt=""></td> 
   <td width="100%" background="themes/XD-Obstuse/forums/images/table/xtratv5_02.gif"><img name="tm" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
   <td><img name="trc" src="themes/XD-Obstuse/forums/images/table/xtratv5_04.gif" border="0" alt=""></td>
  </tr>
  <tr>
    <td background="themes/XD-Obstuse/forums/images/table/xtratv5_08.gif"><img name="lt" src="themes/XD-Obstuse/forums/images/spacer.gif" width="1" height="1" border="0" alt=""></td>
     <td valign="top" bgcolor="#151515">
<!-- BEGIN privmsg_extensions -->
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <tr> 
	<td valign="top" align="center" width="100%"> 
	  <table height="40" cellspacing="2" cellpadding="2" border="0">
		<tr valign="middle"> 
		  <td>{INBOX_IMG}</td>
		  <td><span class="cattitle">{INBOX_LINK}  </span></td>
		  <td>{SENTBOX_IMG}</td>
		  <td><span class="cattitle">{SENTBOX_LINK}  </span></td>
		  <td>{OUTBOX_IMG}</td>
		  <td><span class="cattitle">{OUTBOX_LINK}  </span></td>
		  <td>{SAVEBOX_IMG}</td>
		  <td><span class="cattitle">{SAVEBOX_LINK}  </span></td>
		</tr>
	  </table>
	</td>
  </tr>
</table>

<br clear="all" />
<!-- END privmsg_extensions -->

<form action="{S_POST_ACTION}" method="post" name="post" onsubmit="return checkForm(this)">

{POST_PREVIEW_BOX}
{ERROR_BOX}

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
		<td align="left"><span  class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a>
		<!-- BEGIN switch_not_privmsg --> 
		-> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
		<!-- END switch_not_privmsg -->
	</tr>
</table>

<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
	<tr> 
		<th class="thHead" colspan="2" height="25"><b>{L_POST_A}</b></th>
	</tr>
	<!-- BEGIN switch_username_select -->
	<tr> 
		<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>
		<td class="row2"><span class="genmed"><input type="text" class="post" tabindex="1" name="username" size="25" maxlength="25" value="{USERNAME}" /></span></td>
	</tr>
	<!-- END switch_username_select -->
	<!-- BEGIN switch_privmsg -->
	<tr> 
		<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>
		<td class="row2"><span class="genmed"><input type="text"  class="post" name="username" maxlength="25" size="25" tabindex="1" value="{USERNAME}" /> <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onclick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></span></td>
	</tr>
	<!-- END switch_privmsg -->
	<tr> 
	  <td class="row1" width="22%"><span class="gen"><b>{L_SUBJECT}</b></span></td>
	  <td class="row2" width="78%"> <span class="gen"> 
		<input type="text" name="subject" size="45" maxlength="60" style="width:450px" tabindex="2" class="post" value="{SUBJECT}" />
		</span> </td>
	</tr>
	<tr> 
	  <td class="row1" valign="top"> 
		<table width="100%" border="0" cellspacing="0" cellpadding="1">
		  <tr> 
			<td><span class="gen"><b>{L_MESSAGE_BODY}</b></span> </td>
		  </tr>
		  <tr> 
			<td valign="middle" align="center"> <br />
			  <table width="100" border="0" cellspacing="0" cellpadding="5">
				<tr align="center"> 
				  <td colspan="{S_SMILIES_COLSPAN}" class="gensmall"><b>{L_EMOTICONS}</b></td>
				</tr>
				<!-- BEGIN smilies_row -->
				<tr align="center" valign="middle"> 
				  <!-- BEGIN smilies_col -->
				  <td><a href="javascript:emoticon('{smilies_row.smilies_col.SMILEY_CODE}')"><img src="{smilies_row.smilies_col.SMILEY_IMG}" border="0" alt="{smilies_row.smilies_col.SMILEY_DESC}" title="{smilies_row.smilies_col.SMILEY_DESC}" /></a></td>
				  <!-- END smilies_col -->
				</tr>
				<!-- END smilies_row -->
				<!-- BEGIN switch_smilies_extra -->
				<tr align="center"> 
				  <td colspan="{S_SMILIES_COLSPAN}"><span  class="nav"><a href="{U_MORE_SMILIES}" onclick="window.open('{U_MORE_SMILIES}', '_phpbbsmilies', 'HEIGHT=300,resizable=yes,scrollbars=yes,WIDTH=250');return false;" target="_phpbbsmilies" class="nav">{L_MORE_SMILIES}</a></span></td>
				</tr>
				<!-- END switch_smilies_extra -->
			  </table>
			</td>
		  </tr>
		</table>
	  </td>
	  <td class="row2" valign="top"><span class="gen"> <span class="genmed"> </span> 
		<table width="450" border="0" cellspacing="0" cellpadding="2">
		  <tr align="right" valign="middle"> 
			<td>
			  <p dir="rtl" style="margin-top: 0; margin-bottom: 0" align="left"><span class="gen"> 
			  <span class="genmed"> 
			   <select name="fc" onChange="BBCfc()" onMouseOver="helpline('fc')" 	
					  <option style="color:darkred; background-color: {T_TD_COLOR1}" value="darkred" class="genmed" dir="ltr">
              <option selected>Font Color</option>
              <option style="color:black; value="{T_FONTCOLOR1}" value="{T_FONTCOLOR1}">{L_COLOR_DEFAULT}</option>
              <option value="darkred">{L_COLOR_DARK_RED}</option>
					  <option style="color:red; background-color: {T_TD_COLOR1}" value="red" class="genmed">{L_COLOR_RED}</option>
					  <option style="color:orange; background-color: {T_TD_COLOR1}" value="orange" class="genmed">{L_COLOR_ORANGE}</option>
					  <option style="color:brown; background-color: {T_TD_COLOR1}" value="brown" class="genmed">{L_COLOR_BROWN}</option>
					  <option style="color:yellow; background-color: {T_TD_COLOR1}" value="yellow" class="genmed">{L_COLOR_YELLOW}</option>
					  <option style="color:green; background-color: {T_TD_COLOR1}" value="green" class="genmed">{L_COLOR_GREEN}</option>
					  <option style="color:olive; background-color: {T_TD_COLOR1}" value="olive" class="genmed">{L_COLOR_OLIVE}</option>
					  <option style="color:cyan; background-color: {T_TD_COLOR1}" value="cyan" class="genmed">{L_COLOR_CYAN}</option>
					  <option style="color:blue; background-color: {T_TD_COLOR1}" value="blue" class="genmed">{L_COLOR_BLUE}</option>
					  <option style="color:darkblue; background-color: {T_TD_COLOR1}" value="darkblue" class="genmed">{L_COLOR_DARK_BLUE}</option>
					  <option style="color:indigo; background-color: {T_TD_COLOR1}" value="indigo" class="genmed">{L_COLOR_INDIGO}</option>
					  <option style="color:violet; background-color: {T_TD_COLOR1}" value="violet" class="genmed">{L_COLOR_VIOLET}</option>
					  <option style="color:white; background-color: {T_TD_COLOR1}" value="white" class="genmed">{L_COLOR_WHITE}</option>
					  <option style="color:black; background-color: {T_TD_COLOR1}" value="black" class="genmed">{L_COLOR_BLACK}</option>
			  </select>   <select name="fs" onChange="BBCfs()" onMouseOver="helpline('fs')" 
			  		  <option value="7" class="genmed" dir="ltr">
              <option selected>Font Size</option>
              {L_FONT_TINY}</option>
					  <option value="9" class="genmed">{L_FONT_SMALL}</option>
					  <option value="12" class="genmed">{L_FONT_NORMAL}</option>
					  <option value="18" class="genmed">{L_FONT_LARGE}</option>
					  <option  value="24" class="genmed">{L_FONT_HUGE}</option>
					</select> <span lang="ar-sy"> </span><select name="ft" onChange="BBCft()" onMouseOver="helpline('ft')" 
        <option style="color:black; background-color: #FFFFFF " value="{L_ARIAL}" class="genmed" dir="ltr">
                                          <option selected>Font type</option>
                                          <option value="Arial">Default font
                                          </option>
<option style="color:black; background-color: #FFFFFF " value="Andalus" class="genmed">
Andalus</option> 
<option style="color:black; background-color: #FFFFFF " value="Arial" class="genmed">
Arial</option> 
<option style="color:black; background-color: #FFFFFF " value="Comic Sans MS" class="genmed">
Comic Sans MS</option> 
<option style="color:black; background-color: #FFFFFF " value="Courier New" class="genmed">
Courier New</option> 
                                          <option value="Lucida Console">Lucida Console
                                          </option>
<option style="color:black; background-color: #FFFFFF " value="Microsoft Sans Serif" class="genmed">
Microsoft Sans Serif</option> 
<option style="color:black; background-color: #FFFFFF " value="Symbol" class="genmed">
Symbol</option> 
<option style="color:black; background-color: #FFFFFF " value="Tahoma" class="genmed">
Tahoma</option> 
<option style="color:black; background-color: #FFFFFF " value="Times New Roman" class="genmed">
Times New Roman</option> 
<option style="color:black; background-color: #FFFFFF " value="Traditional Arabic" class="genmed">
Traditional Arabic</option> 
<option style="color:black; background-color: #FFFFFF " value="Verdana" class="genmed">
Verdana</option> 
<option style="color:black; background-color: #FFFFFF " value="Webdings" class="genmed">
Webdings</option> 
<option style="color:black; background-color: #FFFFFF " value="Wingdings" class="genmed">
Wingdings</option> 
                                  </select></span></span></span><p dir="rtl" style="margin-top: 0; margin-bottom: 0">
              <span class="genmed"><span style="font-size: 5pt"> </span></span></td>
		  </tr>
		  <span class="gen"> 
		  <tr> 
			<td width="450"> 
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr> 
                        <td> 
                          <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
                                <tr> 
                                  <td>
                                  <p dir="ltr" align="left"><span class="gen">  
			  <span class="genmed"> 
			                      <span lang="ar-sy"> </span><img border="0" src="modules/Forums/bbcode_box/images/justify.gif" name="justify" type="image" onclick="BBCjustify()" onmouseover="helpline('justify')" style="border-style: outset; border-width: 1" alt="justify"><img border="0" src="modules/Forums/bbcode_box/images/right.gif" name="right" type="image" onclick="BBCright()" onmouseover="helpline('right')" style="border-style: outset; border-width: 1" alt="right"><img border="0" src="modules/Forums/bbcode_box/images/center.gif" name="center" type="image" onclick="BBCcenter()" onmouseover="helpline('center')" style="border-style: outset; border-width: 1" alt="center"><img border="0" src="modules/Forums/bbcode_box/images/left.gif" name="left" type="image" onclick="BBCleft()" onmouseover="helpline('left')" style="border-style: outset; border-width: 1" alt="left">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/bold.gif" name="bold" type="image" onclick="BBCbold()" onmouseover="helpline('b')" style="border-style: outset; border-width: 1" alt="bold"><img border="0" src="modules/Forums/bbcode_box/images/italic.gif" name="italic" type="image" onclick="BBCitalic()" onmouseover="helpline('i')" style="border-style: outset; border-width: 1" alt="italic"><img border="0" src="modules/Forums/bbcode_box/images/under.gif" name="under" type="image" onclick="BBCunder()" onmouseover="helpline('u')" style="border-style: outset; border-width: 1" alt="under line">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/fade.gif" name="fade" type="image" onclick="BBCfade()" onmouseover="helpline('fade')" style="border-style: outset; border-width: 1" alt="fade"><img border="0" src="modules/Forums/bbcode_box/images/grad.gif" name="grad" type="image" onclick="BBCgrad()" onmouseover="helpline('grad')" style="border-style: outset; border-width: 1" alt="gradient">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/rtl.gif" name="dirrtl" type="image" onclick="BBCdir('rtl')" onmouseover="helpline('rtl')" style="border-style: outset; border-width: 1" alt="Right to Left"><img border="0" src="modules/Forums/bbcode_box/images/ltr.gif" name="dirltr" type="image" onclick="BBCdir('ltr')" onmouseover="helpline('ltr')" style="border-style: outset; border-width: 1" alt="Left to Right">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/marqd.gif" name="marqd" type="image" onclick="BBCmarqd()" onmouseover="helpline('marqd')" style="border-style: outset; border-width: 1" alt="Marque to down"><img border="0" src="modules/Forums/bbcode_box/images/marqu.gif" name="marqu" type="image" onclick="BBCmarqu()" onmouseover="helpline('marqu')" style="border-style: outset; border-width: 1" alt="Marque to up"><img border="0" src="modules/Forums/bbcode_box/images/marql.gif" name="marql" type="image" onclick="BBCmarql()" onmouseover="helpline('marql')" style="border-style: outset; border-width: 1" alt="Marque to left"><img border="0" src="modules/Forums/bbcode_box/images/marqr.gif" name="marqr" type="image" onclick="BBCmarqr()" onmouseover="helpline('marqr')" style="border-style: outset; border-width: 1" alt="Marque to right"></span></span></td> 
                                </tr> 
                                <tr> 
                                  <td dir="rtl">
                                  <p align="right" dir="rtl" style="margin-top: 0; margin-bottom: 0">
                                  <span style="font-size: 5pt"> </span><p align="left" dir="ltr" style="margin-top: 0; margin-bottom: 0"><span class="gen"> 
			  <span class="genmed"> 
			                       <img border="0" src="modules/Forums/bbcode_box/images/code.gif" name="code" type="image" onclick="BBCcode()" onmouseover="helpline('code')" style="border-style: outset; border-width: 1" alt="Code"><img border="0" src="modules/Forums/bbcode_box/images/quote.gif" name="quote" type="image" onclick="BBCquote()" onmouseover="helpline('quote')" style="border-style: outset; border-width: 1" alt="Quote">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/url.gif" name="url" type="image" onclick="BBCurl()" onmouseover="helpline('url')" style="border-style: outset; border-width: 1" alt="URL"><img border="0" src="modules/Forums/bbcode_box/images/email.gif" name="email" type="image" onclick="BBCmail()" onmouseover="helpline('mail')" style="border-style: outset; border-width: 1" alt="Email"><img border="0" src="modules/Forums/bbcode_box/images/web.gif" name="web" type="image" onclick="BBCweb()" onmouseover="helpline('web')" style="border-style: outset; border-width: 1" alt="Wep Page">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/img.gif" name="img" type="image" onclick="BBCimg()" onmouseover="helpline('img')" style="border-style: outset; border-width: 1" alt="Image"><img border="0" src="modules/Forums/bbcode_box/images/flash.gif" name="flash" type="image" onclick="BBCflash()" onmouseover="helpline('flash')" style="border-style: outset; border-width: 1" alt="Flash"><img border="0" src="modules/Forums/bbcode_box/images/video.gif" name="video" type="image" onclick="BBCvideo()" onmouseover="helpline('video')" style="border-style: outset; border-width: 1" alt="Video"><img border="0" src="modules/Forums/bbcode_box/images/sound.gif" name="stream" type="image" onclick="BBCstream()" onmouseover="helpline('stream')" style="border-style: outset; border-width: 1" alt="Stream"><img border="0" src="modules/Forums/bbcode_box/images/ram.gif" name="ram" type="image" onclick="BBCram()" onmouseover="helpline('ram')" style="border-style: outset; border-width: 1" alt="Real Media">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/hr.gif" name="hr" type="image" onclick="BBChr()" onmouseover="helpline('hr')" style="border-style: outset; border-width: 1" alt="H-Line">   
                                  <img border="0" src="modules/Forums/bbcode_box/images/plain.gif" name="plain" type="image" onclick="BBCplain()" onmouseover="helpline('plain')" style="border-style: outset; border-width: 1" alt="Remove BBcode"></span></td> 
                                </tr> 
                          </table> 
                        </td> 
                  </tr> 

			  </table>
			</td>
		  </tr>
		  
		  <tr> 
			<td colspan="9"> <span class="gensmall"> 
			  <input type="text" name="helpbox" size="45" maxlength="100" style="width:450px; font-size:10px" class="helpline" value="{L_STYLES_TIP}" />
			  </span></td>
		  </tr>
		  <tr> 
			<td colspan="9"><span class="gen"> 
			  <textarea name="message" rows="15" cols="35" wrap="virtual" style="width:450px" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{MESSAGE}</textarea>
			  </span></td>
		  </tr>
		</table>
		</span></td>
	</tr>
	<tr> 
	  <td class="row1" valign="top"><span class="gen"><b>{L_OPTIONS}</b></span><br /><span class="gensmall">{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
	  <td class="row2"><span class="gen"> </span> 
		<table cellspacing="0" cellpadding="1" border="0">
		  <!-- BEGIN switch_html_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="disable_html" {S_HTML_CHECKED} />
			</td>
			<td><span class="gen">{L_DISABLE_HTML}</span></td>
		  </tr>
		  <!-- END switch_html_checkbox -->
		  <!-- BEGIN switch_bbcode_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="disable_bbcode" {S_BBCODE_CHECKED} />
			</td>
			<td><span class="gen">{L_DISABLE_BBCODE}</span></td>
		  </tr>
		  <!-- END switch_bbcode_checkbox -->
		  <!-- BEGIN switch_smilies_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="disable_smilies" {S_SMILIES_CHECKED} />
			</td>
			<td><span class="gen">{L_DISABLE_SMILIES}</span></td>
		  </tr>
		  <!-- END switch_smilies_checkbox -->
		  <!-- BEGIN switch_signature_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="attach_sig" {S_SIGNATURE_CHECKED} />
			</td>
			<td><span class="gen">{L_ATTACH_SIGNATURE}</span></td>
		  </tr>
		  <!-- END switch_signature_checkbox -->
		  <!-- BEGIN switch_notify_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="notify" {S_NOTIFY_CHECKED} />
			</td>
			<td><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>
		  </tr>
		  <!-- END switch_notify_checkbox -->
		  <!-- BEGIN switch_delete_checkbox -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="delete" />
			</td>
			<td><span class="gen">{L_DELETE_POST}</span></td>
		  </tr>
		  <!-- END switch_delete_checkbox -->
		  <!-- BEGIN switch_type_toggle -->
		  <tr> 
			<td></td>
			<td><span class="gen">{S_TYPE_TOGGLE}</span></td>
		  </tr>
		  <!-- END switch_type_toggle -->
		</table>
	  </td>
	</tr>
	{POLLBOX} 
	<tr> 
	  <td class="catBottom" colspan="2" align="center" height="28"> {S_HIDDEN_FORM_FIELDS}<input type="submit" tabindex="5" name="preview" class="mainoption" value="{L_PREVIEW}" /> <input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" /></td>
	</tr>
  </table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top"><span class="gensmall">{S_TIMEZONE}</span></td>
	</tr>
  </table>
</form>

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
{TOPIC_REVIEW_BOX}
