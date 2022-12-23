<script language="javascript" type="text/javascript">
<!--
// bbCode control by
// subBlue design
// www.subBlue.com

// Startup variables
var imageTag = false;
var theSelection = false;

// Check for Browser & Platform for PC & IE specific bits
// More details from: http://www.mozilla.org/docs/web-developer/sniffer/browser_type.html
var clientPC = navigator.userAgent.toLowerCase(); // Get client info
var clientVer = parseInt(navigator.appVersion); // Get browser version

var is_ie = ((clientPC.indexOf("msie") != -1) && (clientPC.indexOf("opera") == -1));
var is_nav = ((clientPC.indexOf('mozilla')!=-1) && (clientPC.indexOf('spoofer')==-1)
                && (clientPC.indexOf('compatible') == -1) && (clientPC.indexOf('opera')==-1)
                && (clientPC.indexOf('webtv')==-1) && (clientPC.indexOf('hotjava')==-1));
var is_moz = 0;

var is_win = ((clientPC.indexOf("win")!=-1) || (clientPC.indexOf("16bit") != -1));
var is_mac = (clientPC.indexOf("mac")!=-1);

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
	var txtarea = document.post.message;
	text = ' ' + text + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		txtarea.focus();
	} else {
		txtarea.value  += text;
		txtarea.focus();
	}
}

function bbfontstyle(bbopen, bbclose) {
	var txtarea = document.post.message;

	if ((clientVer >= 4) && is_ie && is_win) {
		theSelection = document.selection.createRange().text;
		if (!theSelection) {
			txtarea.value += bbopen + bbclose;
			txtarea.focus();
			return;
		}
		document.selection.createRange().text = bbopen + theSelection + bbclose;
		txtarea.focus();
		return;
	}
	else if (txtarea.selectionEnd && (txtarea.selectionEnd - txtarea.selectionStart > 0))
	{
		mozWrap(txtarea, bbopen, bbclose);
		return;
	}
	else
	{
		txtarea.value += bbopen + bbclose;
		txtarea.focus();
	}
	storeCaret(txtarea);
}


function bbstyle(bbnumber) {
	var txtarea = document.post.message;

	donotinsert = false;
	theSelection = false;
	bblast = 0;

	if (bbnumber == -1) { // Close all open tags & default button names
		while (bbcode[0]) {
			butnumber = arraypop(bbcode) - 1;
			txtarea.value += bbtags[butnumber + 1];
			buttext = eval('document.post.addbbcode' + butnumber + '.value');
			eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
		}
		imageTag = false; // All tags are closed including image tags :D
		txtarea.focus();
		return;
	}

	if ((clientVer >= 4) && is_ie && is_win)
	{
		theSelection = document.selection.createRange().text; // Get text selection
		if (theSelection) {
			// Add tags around selection
			document.selection.createRange().text = bbtags[bbnumber] + theSelection + bbtags[bbnumber+1];
			txtarea.focus();
			theSelection = '';
			return;
		}
	}
	else if (txtarea.selectionEnd && (txtarea.selectionEnd - txtarea.selectionStart > 0))
	{
		mozWrap(txtarea, bbtags[bbnumber], bbtags[bbnumber+1]);
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
				txtarea.value += bbtags[butnumber + 1];
				buttext = eval('document.post.addbbcode' + butnumber + '.value');
				eval('document.post.addbbcode' + butnumber + '.value ="' + buttext.substr(0,(buttext.length - 1)) + '"');
				imageTag = false;
			}
			txtarea.focus();
			return;
	} else { // Open tags
	
		if (imageTag && (bbnumber != 14)) {		// Close image tag before adding another
			txtarea.value += bbtags[15];
			lastValue = arraypop(bbcode) - 1;	// Remove the close image tag from the list
			document.post.addbbcode14.value = "Img";	// Return button back to normal state
			imageTag = false;
		}
		
		// Open tag
		txtarea.value += bbtags[bbnumber];
		if ((bbnumber == 14) && (imageTag == false)) imageTag = 1; // Check to stop additional tags after an unclosed image tag
		arraypush(bbcode,bbnumber+1);
		eval('document.post.addbbcode'+bbnumber+'.value += "*"');
		txtarea.focus();
		return;
	}
	storeCaret(txtarea);
}

// From http://www.massless.org/mozedit/
function mozWrap(txtarea, open, close)
{
	var selLength = txtarea.textLength;
	var selStart = txtarea.selectionStart;
	var selEnd = txtarea.selectionEnd;
	if (selEnd == 1 || selEnd == 2) 
		selEnd = selLength;

	var s1 = (txtarea.value).substring(0,selStart);
	var s2 = (txtarea.value).substring(selStart, selEnd)
	var s3 = (txtarea.value).substring(selEnd, selLength);
	txtarea.value = s1 + open + s2 + close + s3;
	return;
}

// Insert at Claret position. Code from
// http://www.faqts.com/knowledge_base/view.phtml/aid/1052/fid/130
function storeCaret(textEl) {
	if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
}

//-->
</script>
<form action="{S_POST_ACTION}" method="post" name="post" onsubmit="return checkForm(this)" {S_FORM_ENCTYPE}>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td class="maintitle">{L_POST_A}</td>
</tr>
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> 
<!-- BEGIN switch_not_privmsg -->
&raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a>
<!-- END switch_not_privmsg -->
&raquo; {L_POST_A}</td>
</tr>
</table>
{POST_PREVIEW_BOX}
{ERROR_BOX}
<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
<tr>
<th colspan="2">{L_POST_A}</th>
</tr>
<!-- BEGIN switch_username_select -->
<tr>
<td align="right" class="row1"><span class="explaintitle">{L_USERNAME}:</span></td>
<td class="row2"><input type="text" class="post" tabindex="1" name="username" size="25" maxlength="25" value="{USERNAME}" /> 
</td>
</tr>
<!-- END switch_username_select -->
<!-- BEGIN switch_privmsg -->
<tr> 
<td align="right" class="row1"><span class="explaintitle">{L_USERNAME}:</span></td>
<td class="row2"> <input type="text"  class="post" name="username" maxlength="25" size="25" tabindex="1" value="{USERNAME}" /> 
&nbsp; <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="button" onclick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /> 
</td>
</tr>
<!-- END switch_privmsg -->
<tr>
<td width="22%" align="right" class="row1"><span class="explaintitle">{L_SUBJECT}:</span></td>
<td class="row2" width="78%"><input type="text" name="subject" size="45" maxlength="60" style="width:450px" tabindex="2" class="post" value="{SUBJECT}" /> 
</td>
</tr>
<tr>
<td class="row1" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td align="right"><span class="explaintitle">{L_MESSAGE_BODY}:</span></td>
</tr>
<tr>
<td align="center"><br />
<table width="100" border="0" cellspacing="0" cellpadding="5">
<tr align="center">
<td colspan="{S_SMILIES_COLSPAN}" class="gensmall"><span class="explaintitle">{L_EMOTICONS}</span></td>
</tr>
<!-- BEGIN smilies_row -->
<tr align="center">
<!-- BEGIN smilies_col -->
<td><a href="javascript:emoticon('{smilies_row.smilies_col.SMILEY_CODE}')"><img src="{smilies_row.smilies_col.SMILEY_IMG}" border="0" alt="{smilies_row.smilies_col.SMILEY_DESC}" title="{smilies_row.smilies_col.SMILEY_DESC}" width="15" height="15" /></a></td>
<!-- END smilies_col -->
</tr>
<!-- END smilies_row -->
<!-- BEGIN switch_smilies_extra -->
<tr align="center">
<td colspan="{S_SMILIES_COLSPAN}" class="nav"><a href="{U_MORE_SMILIES}" onclick="window.open('{U_MORE_SMILIES}', '_phpbbsmilies', 'HEIGHT=250,resizable=yes,scrollbars=yes,WIDTH=300');return false;" target="_phpbbsmilies">{L_MORE_SMILIES}</a></td>
</tr>
<!-- END switch_smilies_extra -->
</table>
</td>
</tr>
</table>
</td>
<td class="row2" valign="top">
<table width="450" border="0" cellspacing="0" cellpadding="2">
<tr align="center">
<td>
<input type="button" class="button" accesskey="b" name="addbbcode0" value=" B " style="font-weight:bold; width: 30px" onclick="bbstyle(0)" onmouseover="helpline('b')" />
</td>
<td>
<input type="button" class="button" accesskey="i" name="addbbcode2" value=" i " style="font-style:italic; width: 30px" onclick="bbstyle(2)" onmouseover="helpline('i')" />
</td>
<td>
<input type="button" class="button" accesskey="u" name="addbbcode4" value=" u " style="text-decoration: underline; width: 30px" onclick="bbstyle(4)" onmouseover="helpline('u')" />
</td>
<td>
<input type="button" class="button" accesskey="q" name="addbbcode6" value="Quote" style="width: 50px" onclick="bbstyle(6)" onmouseover="helpline('q')" />
</td>
<td>
<input type="button" class="button" accesskey="c" name="addbbcode8" value="Code" style="width: 40px" onclick="bbstyle(8)" onmouseover="helpline('c')" />
</td>
<td>
<input type="button" class="button" accesskey="l" name="addbbcode10" value="List" style="width: 40px" onclick="bbstyle(10)" onmouseover="helpline('l')" />
</td>
<td>
<input type="button" class="button" accesskey="o" name="addbbcode12" value="List=" style="width: 40px" onclick="bbstyle(12)" onmouseover="helpline('o')" />
</td>
<td>
<input type="button" class="button" accesskey="p" name="addbbcode14" value="Img" style="width: 40px"  onclick="bbstyle(14)" onmouseover="helpline('p')" />
</td>
<td>
<input type="button" class="button" accesskey="w" name="addbbcode16" value="URL" style="width: 40px" onclick="bbstyle(16)" onmouseover="helpline('w')" />
</td>
</tr>
<tr>
<td colspan="9">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td nowrap="nowrap" class="genmed"> &nbsp;{L_FONT_COLOR}: 
<select name="addbbcode18" onchange="bbfontstyle('[color=' + this.form.addbbcode18.options[this.form.addbbcode18.selectedIndex].value + ']', '[/color]');this.selectedIndex=0;" onmouseover="helpline('s')">
<option value="{T_BODY_TEXT}">{L_COLOR_DEFAULT}</option>
<option style="color:darkred; background-color:transparent" value="darkred">{L_COLOR_DARK_RED}</option>
<option style="color:red; background-color:transparent" value="red">{L_COLOR_RED}</option>
<option style="color:orange; background-color:transparent" value="orange">{L_COLOR_ORANGE}</option>
<option style="color:brown; background-color:transparent" value="brown">{L_COLOR_BROWN}</option>
<option style="color:yellow; background-color:transparent" value="yellow">{L_COLOR_YELLOW}</option>
<option style="color:green; background-color:transparent" value="green">{L_COLOR_GREEN}</option>
<option style="color:olive; background-color:transparent" value="olive">{L_COLOR_OLIVE}</option>
<option style="color:cyan; background-color:transparent" value="cyan">{L_COLOR_CYAN}</option>
<option style="color:blue; background-color:transparent" value="blue">{L_COLOR_BLUE}</option>
<option style="color:darkblue; background-color:transparent" value="darkblue">{L_COLOR_DARK_BLUE}</option>
<option style="color:indigo; background-color:transparent" value="indigo">{L_COLOR_INDIGO}</option>
<option style="color:violet; background-color:transparent" value="violet">{L_COLOR_VIOLET}</option>
<option style="color:white; background-color:transparent" value="white">{L_COLOR_WHITE}</option>
<option style="color:black; background-color:transparent" value="black">{L_COLOR_BLACK}</option>
</select>
&nbsp;{L_FONT_SIZE}: 
<select name="addbbcode20" onchange="bbfontstyle('[size=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/size]')" onmouseover="helpline('f')">
<option value="7">{L_FONT_TINY}</option>
<option value="9">{L_FONT_SMALL}</option>
<option value="12" selected="selected">{L_FONT_NORMAL}</option>
<option value="18">{L_FONT_LARGE}</option>
<option  value="24">{L_FONT_HUGE}</option>
</select>
</td>
<td nowrap="nowrap" align="right" class="genmed"><a href="javascript:bbstyle(-1)" onmouseover="helpline('a')">{L_BBCODE_CLOSE_TAGS}</a>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="9">
<input type="text" name="helpbox" size="45" maxlength="100" style="width:450px; font-size:10px" class="helpline" value="{L_STYLES_TIP}" />
</td>
</tr>
<tr>
<td colspan="9">
<textarea name="message" rows="15" cols="35" style="width:450px" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);">{MESSAGE}</textarea>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="row1" valign="top"><span class="explaintitle">{L_OPTIONS}:</span><br />
<span class="gensmall">{HTML_STATUS}<br />
{BBCODE_STATUS}<br />
{SMILIES_STATUS}</span></td>
<td class="row2"> 
<table cellspacing="0" cellpadding="1" border="0">
<!-- BEGIN switch_html_checkbox -->
<tr>
<td>
<input type="checkbox" name="disable_html" {S_HTML_CHECKED} />
</td>
<td class="gensmall">{L_DISABLE_HTML}</td>
</tr>
<!-- END switch_html_checkbox -->
<!-- BEGIN switch_bbcode_checkbox -->
<tr>
<td>
<input type="checkbox" name="disable_bbcode" {S_BBCODE_CHECKED} />
</td>
<td class="gensmall">{L_DISABLE_BBCODE}</td>
</tr>
<!-- END switch_bbcode_checkbox -->
<!-- BEGIN switch_smilies_checkbox -->
<tr>
<td>
<input type="checkbox" name="disable_smilies" {S_SMILIES_CHECKED} />
</td>
<td class="gensmall">{L_DISABLE_SMILIES}</td>
</tr>
<!-- END switch_smilies_checkbox -->
<!-- BEGIN switch_signature_checkbox -->
<tr>
<td>
<input type="checkbox" name="attach_sig" {S_SIGNATURE_CHECKED} />
</td>
<td class="gensmall">{L_ATTACH_SIGNATURE}</td>
</tr>
<!-- END switch_signature_checkbox -->
<!-- BEGIN switch_notify_checkbox -->
<tr>
<td>
<input type="checkbox" name="notify" {S_NOTIFY_CHECKED} />
</td>
<td class="gensmall">{L_NOTIFY_ON_REPLY}</td>
</tr>
<!-- END switch_notify_checkbox -->
<!-- BEGIN switch_delete_checkbox -->
<tr>
<td>
<input type="checkbox" name="delete" />
</td>
<td class="gensmall">{L_DELETE_POST}</td>
</tr>
<!-- END switch_delete_checkbox -->
<!-- BEGIN switch_type_toggle -->
<tr>
<td></td>
<td><strong>{S_TYPE_TOGGLE}</strong></td>
</tr>
<!-- END switch_type_toggle -->
</table>
</td>
</tr>
{ATTACHBOX}
{POLLBOX} 
<tr>
<td class="cat" colspan="2" align="center" height="28">{S_HIDDEN_FORM_FIELDS}
<input type="submit" tabindex="5" name="preview" class="mainoption" value="{L_PREVIEW}" />
&nbsp;&nbsp;<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" />
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="tbl"><tr><td class="tbll"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblbot"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td><td class="tblr"><img src="themes/PH2BLUE/forums/images/spacer.gif" alt="" width="8" height="4" /></td></tr></table>
</form>
{TOPIC_REVIEW_BOX} 
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tr>
<td class="nav"><a href="{U_INDEX}">{L_INDEX}</a> 
<!-- BEGIN switch_not_privmsg -->
&raquo; <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a>
<!-- END switch_not_privmsg -->
&raquo; {L_POST_A}</td>
</tr>
<tr>
	<td><br />{JUMPBOX}</td>
</tr>
</table>
