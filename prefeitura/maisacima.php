<HTML><HEAD><TITLE>...::: Prefeitura Munic&iacute;pal de Ira&iacute; :::...</TITLE>
<STYLE>A.sb:link {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sb:active {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sb:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sb:visited {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #2f2f2f; TEXT-DECORATION: none
}
.sb {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #2f2f2f; TEXT-DECORATION: none
}
.sbred {
	FONT-WEIGHT: normal; FONT-SIZE: 9px; COLOR: #cc0000
}
.row1 {
	PADDING-RIGHT: 2px; PADDING-LEFT: 2px; FONT-SIZE: 11px; PADDING-BOTTOM: 4px; WIDTH: 185px; PADDING-TOP: 4px
}
.row2 {
	PADDING-RIGHT: 2px; BORDER-TOP: #444444 1px solid; PADDING-LEFT: 2px; FONT-SIZE: 11px; PADDING-BOTTOM: 4px; WIDTH: 185px; PADDING-TOP: 4px
}
.row3 {
	FONT-SIZE: 1px; WIDTH: 185px; LINE-HEIGHT: 1px; BORDER-BOTTOM: #444444 1px solid
}
.sub_inner {
	PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; PADDING-TOP: 2px
}
.sub {
	BORDER-TOP: #444444 1px solid; FONT-SIZE: 11px; WIDTH: 185px; COLOR: #2f2f2f; BACKGROUND-COLOR: #F8F8F3
}
.sblist {
	PADDING-RIGHT: 0px; LIST-STYLE: square url(https://imagesak.godaddy.com/aaa/common/1/bul_li_sized.gif) outside; MARGIN-TOP: 0px; PADDING-LEFT: 23px; MARGIN-BOTTOM: 0px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 0px; PADDING-TOP: 0px
}
.sblist2 {
	PADDING-RIGHT: 0px; MARGIN-TOP: 0px; PADDING-LEFT: 23px; LIST-STYLE-POSITION: outside; MARGIN-BOTTOM: 0px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 0px; PADDING-TOP: 4px
}
.sbli {
	PADDING-RIGHT: 0px; MARGIN-TOP: 0px; PADDING-LEFT: 0px; MARGIN-BOTTOM: 0px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 0px; TEXT-INDENT: 0px; PADDING-TOP: 2px
}
A.sblink:link {
	COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sblink:active {
	COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sblink:hover {
	COLOR: #2f2f2f; TEXT-DECORATION: none
}
A.sblink:visited {
	COLOR: #2f2f2f; TEXT-DECORATION: none
}
.sblink {
	COLOR: #2f2f2f; TEXT-DECORATION: none
}
</STYLE>
<META 
content="Iraí, Prefeitura, Municipal, Prefeito" 
name=description>
<META 
content="iraí, prefeitura, municipal, mineral, prefeito" name=keywords>
<META 
content="Prefeitura Municipal de Iraí" 
name=classification>
<META content=ALL name=robots>
<META content=ALL name=GOOGLEBOT>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="Prefeitura Municipal de Iraí" name=author>
<META content="Copyright SpeedRS" name=copyright>
<META content=English name=language>
<META content="3 dias" name=revisit-after>
<META content=general name=rating>
<META content=global name=distribution><LINK href="estilo.css" 
type=text/css rel=stylesheet>
<SCRIPT src="js.js"></SCRIPT>
<SCRIPT language=javascript>
if (document.images){
	status_open = new Image();status_close = new Image();
	status_open.src = "";status_close.src = "";}
	
function gosb(url,t){
	if(t == "")t="_self";window.open(url,t);}

function sbStatus(){
	var dpClosed = false;
	var item = new Array("qs","mc","ma","s","e","rp","b","cr"); //sidebar open/close
	for(x=0;x<item.length;x++){
		if(getCookie('sidebar_' + item[x]) == "1"){
			if(document.images [item[x]+"_img"]) document.images [item[x]+"_img"].src = status_close.src;
			if(document.getElementById(item[x]+'_div')) document.getElementById(item[x]+'_div').style.display = "";
			if((item[x]=="rp")||(item[x]=="s")) dpClosed = true;}
	}
			
			if(document.getElementById('dp_divA')) document.getElementById('dp_divA').style.display = "";

	var item = new Array("customize","test");//landing page open/close
	for(x=0;x<item.length;x++){
		if(getCookie('sidebar_' + item[x]) == "1"){
			if (document.images [item[x]+"_img"]){
				document.images [item[x]+"_img"].src = status_open.src;document.getElementById(item[x]+'_div').style.display = "none";}
}}}

function checkHome(item)
{
	//homepage sidebar hasn't been activated yet, reload	
	var url = "";
	url = url.replace('sbitem', item);window.open(url,'_self');}

function togSB(item){
	if(document.images [item+"_img"])	document.images [item+"_img"].src = (document.images [item+"_img"].src == status_open.src) ? status_close.src:status_open.src;
	document.getElementById(item+'_div').style.display = (document.getElementById(item+'_div').style.display=="none") ? "":"none";
	if(getCookie('sidebar_' + item) == "1"){
		eraseCookie('sidebar_' + item);
		if((document.getElementById('dp_divB'))&&(getCookie('sidebar_rp') != "1")&&(getCookie('sidebar_s') != "1")) document.getElementById('dp_divB').style.display = "";		
	}
	else{
		createCookie('sidebar_' + item,1,'');
		if((document.getElementById('dp_divB'))&&((getCookie('sidebar_rp') == "1")||(getCookie('sidebar_s') == "1"))) document.getElementById('dp_divB').style.display = "none";		
}}

function linkSB(url){
	location.href = url;}

function createCookie(name,value,days){
	if (days){
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name){
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++){
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);}
	return null;
}

function eraseCookie(name){
	createCookie(name,"",-1);}

function editSBselected(theForm, theVal, theDomain){
	if (theVal){
		theForm.searchSBselected.value = theForm.searchSBselected.value + '|' + theDomain + '|'}
	else{
		var theStr = theForm.searchSBselected.value;theStr = theStr.replace('|' + theDomain + '|', '');theForm.searchSBselected.value = theStr
}}

function checkSBDomain(searchForm){
	var canSubmit = false;
	var searchValue;
	if ('' == '' && searchForm.domainToCheck){
		searchValue = searchForm.domainToCheck.value;
		if (searchValue != ''){
			var regExInvalidChars = /[^a-zA-Z0-9-\s.]+/;
			if (regExInvalidChars.test(searchValue)){
				alert('Invalid character in domain.\n\nOnly letters, numbers or hyphens are allowed.')}
			else{
			canSubmit = true;}
		}
	}
	if (canSubmit){
		return true;
	}
	else{
		return false;}
}
</SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META http-equiv=Pragma content=no-cache>
<SCRIPT language=javascript>
<!--
function enterkey(frm,e)
{
	var keycode;
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	if (keycode == 13) frm.submit();
}

function popPage(pagename, cici, progid, apphdr)
{
	var pgurl = 'se=%2B&app%5Fhdr=0&ci=cici';
	pgurl = pgurl.replace('cici', cici);
	if (progid != '')
	{
		pgurl = pgurl.replace('GoDaddy', progid);
	}
	if (apphdr != '')
	{
		pgurl = pgurl.replace('hdr=0', 'hdr=' + apphdr);
	}
	if (pagename.indexOf('?') <= 0)
	{
		pgurl = '?' + pgurl
	}
	else
	{
		pgurl = '&' + pgurl
	}
	if ((pagename.indexOf('http://') < 0)&&(pagename.indexOf('https://') < 0))
	{
		pgurl = ('' + pagename + pgurl);
	}
	else
	{
		pgurl = (pagename + pgurl);	
	}
	var win=window.open(pgurl, 'spop', 'left=20,top=20,resizable=yes,scrollbars=yes,width=610,height=620');
}
function popAnchor(pagename, cici, anchor)
{
	var pgurl = 'se=%2B&app%5Fhdr=0&ci=cici';
	pgurl = pgurl.replace('cici', cici);
	if (pagename.indexOf('?') <= 0)
	{
		pgurl = '?' + pgurl
	}
	else
	{
		pgurl = '&' + pgurl
	}
	if ((pagename.indexOf('http://') < 0)&&(pagename.indexOf('https://') < 0))
	{
		pgurl = ('' + pagename + pgurl);
	}
	else
	{
		pgurl = (pagename + pgurl);	
	}
	if (anchor != '')
	{
		pgurl = pgurl + '#' + anchor
	}
	var win=window.open(pgurl, 'spop', 'left=20,top=20,resizable=yes,scrollbars=yes,width=610,height=620');
}
function popFaq(article_id)
{
	var faqurl = '';
	faqurl = faqurl.replace('fff', article_id);
	var win=window.open(faqurl, 'spop', 'left=20,top=20,resizable=yes,scrollbars=yes,width=610,height=620');
}
function popFaqTopic(topic_id)
{
	var faqurl = '';
	faqurl = faqurl.replace('fff', topic_id);
	var win=window.open(faqurl, 'spop');
}

//for abandon popup
var internal_clicked = false;	
function processLinks()
{
  //set internal_clicked on all links
  var links = document.getElementsByTagName("A");
  for (var i=0; i < links.length; i++)
  {
		if(!links[i].onclick) links[i].onclick = function(){internal_clicked = true;}
  }
  //set internal_clicked on all form submits
  var forms = document.getElementsByTagName("FORM");
  for (var i=0; i < forms.length; i++)
  {
    if(!forms[i].onsubmit) forms[i].onsubmit = function(){internal_clicked = true;}
  }
}

function abandonWin()
{
	if (!internal_clicked) //show abandon popup
	{
		var target = "_abandon";		
		var url = "";
		var loc = document.location.href;
		loc += (loc.indexOf('?') > 0) ? "&":"?";
		if (loc.indexOf('domainToCheck') < 1) loc += "domainToCheck=&tld=&checkAvail=&currStep="
		loc = passedURLEncode(loc);
		url = url.replace('locationurl', loc);		
		var winWidth = 420;
		var winHeight = 370;
		var options = "resizable=0,scrollbars=0,status=0,location=0,menubar=0,toolbar=0,";
		options += "width=" + winWidth + ",";
		options += "height=" + winHeight + ",";
		options += "screenY=" + ((screen.availHeight - winHeight) /2) + ",";
		options += "top=" + ((screen.availHeight - winHeight) /2) + ",";
		options += "screenX=" + ((screen.availWidth - winWidth) /2) + ",";
		options += "left=" + ((screen.availWidth - winWidth) /2) + ",";
		var win = window.open(url,target,options); win.focus();
	}
}
function passedURLEncode(str)
{
	str = str.replace(/\?/g,"!");
	str = str.replace(/=/g,"^");
	str = str.replace(/&/g,"$");
	return str;
}
//-->
</SCRIPT>
<META content="MSHTML 6.00.2900.2912" name=GENERATOR></HEAD>
<BODY bgColor=#E7E4D3 leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<CENTER>
<DIV align=center><FONT style="FONT-SIZE: 11px" face=arial,helvetica size=1>
<CENTER>
<DIV align=center><SPAN style="FONT-SIZE: 1px">