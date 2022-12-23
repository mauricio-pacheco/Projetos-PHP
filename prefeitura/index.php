<HTML><HEAD><TITLE>...::: Prefeitura Municipal de Ira&iacute; :::...</TITLE>
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
<?php include("menu.php"); ?>
      <TABLE width=780 border=0 cellPadding=0 cellSpacing=0 bordercolor="#FFFFFF" bgcolor="#FFFFFF" qaid="1">
        <TBODY>
  <TR>
            <TD vAlign=top colSpan=2 height="100%">&nbsp;<script language="JavaScript">

mdata      = new Date()
mhora      = mdata.getHours()
mdia       = mdata.getDate()
mdiasemana = mdata.getDay()
mmes       = mdata.getMonth()
mano       = mdata.getYear()

if (mhora < 12)
    document.write('Bom dia, seja bem vindo a prefeitura municipal de Iraí/RS. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hoje: ');
else if(mhora >=12 && mhora < 18)
    document.write('Boa Tarde, seja bem vindo a prefeitura municipal de Iraí/RS. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hoje: ');
else if(mhora >= 18 && mhora < 24)
    document.write('Boa Noite, seja bem vindo a prefeitura municipal de Iraí/RS. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hoje: ');
//document.write('');

if(mdiasemana == 0)
   document.write('Domingo, ');
else if(mdiasemana == 1)
   document.write('Segunda Feira, ');
else if(mdiasemana == 2)
   document.write('Terça Feira, ');
else if(mdiasemana == 3)
   document.write('Quarta Feira, ');
else if(mdiasemana == 4)
   document.write('Quinta Feira, ');
else if(mdiasemana == 5)
   document.write('Sexta Feira, ');
else if(mdiasemana == 6)
   document.write('Sábado, ');

document.write(mdia+' de ');
if(mmes == 0)
   document.write('Janeiro de ');
else if(mmes == 1)
   document.write('Fevereiro de ');
else if(mmes == 2)
   document.write('Março de ');
else if(mmes == 3)
   document.write('Abril de ');
else if(mmes == 4)
   document.write('Maio de ');
else if(mmes == 5)
   document.write('Junho de ');
else if(mmes == 6)
   document.write('Julho de ');
else if(mmes == 7)
   document.write('Agosto de ');
else if(mmes == 8)
   document.write('Setembro de ');
else if(mmes == 9)
   document.write('Outubro de ');
else if(mmes == 10)
   document.write('Novembro de ');
else if(mmes == 11)
   document.write('Dezembro de ');

document.write(mano+'');
document.write('');
</script>
	  <DIV 
      style="BACKGROUND-IMAGE: url(2dots.gif); LINE-HEIGHT: 1px; BACKGROUND-REPEAT: repeat"><IMG 
      height=1 src="menu_arquivos/spc_trans.gif" width=1 border=0></DIV>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
                      <TD><div align="center">
                          <SCRIPT language=javascript>
     carregaFlash('meio.swf','592','184'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>
                        </div></TD>
                    </TR></TBODY></TABLE>
				<br><DIV 
      style="BACKGROUND-IMAGE: url(2dots.gif); LINE-HEIGHT: 1px; BACKGROUND-REPEAT: repeat"><IMG 
      height=1 src="menu_arquivos/spc_trans.gif" width=1 border=0></DIV>
              <br><DIV 
      style="BACKGROUND-IMAGE: url(2dots.gif); LINE-HEIGHT: 1px; BACKGROUND-REPEAT: repeat"><IMG 
      height=1 src="menu_arquivos/spc_trans.gif" width=1 border=0></DIV>
              <table width="96%" border="0" align="center">
                <tr> 
                  <td width="50%"><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle><strong>&nbsp;</strong>SA&Uacute;DE</TD>
                        </TR>
                    </TABLE></td>
                  <td width="50%"><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle><strong>&nbsp;</strong>EDUCA&Ccedil;&Atilde;O</TD>
                        </TR>
                    </TABLE></td>
                </tr>
                <tr> 
                  <td><table width="100%" border="0" align="center">
                      <tr> 
                        <td width="24%"><img src="saude.jpg" width="70" height="85" border="1"></td>
                        <td width="76%"><div align="justify"><font size="1">Hoje 
                            Ira&iacute; conta com 6 Centros de Sa&uacute;de na 
                            zona urbana, possui 4 Cl&iacute;nicas Odontol&oacute;gicas, 
                            uma Maternidade e mais um Pronto Atendimento Infantil, 
                            estes administrados pelo Munic&iacute;pio.</font><br>
                            <font class=txtboldgreynovonot><a href="index.php">Saiba 
                            mais...</a></font></div></td>
                      </tr>
                    </table></td>
                  <td><table width="100%" border="0">
                      <tr> 
                        <td width="19%"><img src="educacao.jpg" width="70" height="85" border="1"></td>
                        <td width="81%"><div align="justify"><font size="1">A 
                            Secretaria Municipal de Educa&ccedil;&atilde;o tem 
                            por finalidade coordenar a Pol&iacute;tica Municipal 
                            de Educa&ccedil;&atilde;o, de acordo com as diretrizes 
                            estabelecidas nas legisla&ccedil;&otilde;es municipal, 
                            estadual e federal.</font><br>
                            <font class=txtboldgreynovonot><a href="index.php">Saiba mais...</a></font></div></td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle>&nbsp;MEIO AMBIENTE</TD>
                        </TR>
                    </TABLE></td>
                  <td><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle><strong>&nbsp;</strong>TURISMO</TD>
                        </TR>
                    </TABLE></td>
                </tr>
                <tr> 
                  <td><table width="100%" border="0">
                      <tr> 
                        <td width="39%"><img src="meio.jpg" width="105" height="70" border="1"></td>
                        <td width="61%"><div align="justify"><font size="1">Ira&iacute; 
                            tem a atribui&ccedil;&atilde;o de formular e executar 
                            a pol&iacute;tica municipal de desenvolvimento do 
                            meio ambiente estabelecidas pela pol&iacute;tica nacional. 
                            </font><br>
                            <font class=txtboldgreynovonot><a href="index.php">Saiba 
                            mais...</a></font></div></td>
                      </tr>
                    </table></td>
                  <td><table width="100%" border="0">
                      <tr> 
                        <td width="38%"><img src="tour.jpg" width="105" height="70" border="1"></td>
                        <td width="62%"><font size="1">Irai possu&iacute; a melhor 
                          &aacute;gua mineral do Brasil e a segunda melhor do 
                          planeta.</font><br> <font class=txtboldgreynovonot><a href="index.php">Saiba 
                          mais...</a></font></td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle><strong>&nbsp;</strong>CULTURA</TD>
                        </TR>
                    </TABLE></td>
                  <td><TABLE width=100% border=0 align="center" cellPadding=0 cellSpacing=0 qaid="1">
                      <TBODY>
                        <TR> 
                          <TD width="100%" height=23 bgcolor="#F8F8F3">&nbsp;&nbsp;<IMG height=8 
            src="menu_arquivos/HP_arrow.gif" width=7 
            align=absMiddle>&nbsp;PLANEJAMENTO</TD>
                        </TR>
                    </TABLE></td>
                </tr>
                <tr> 
                  <td><table width="100%" border="0">
                      <tr>
                        <td width="40%"><img src="cultura.jpg" width="105" height="70" border="1"></td>
                        <td width="60%"><div align="justify"><font size="1">A 
                            secretaria tem por objetivo estimular e promover o 
                            desenvolvimento art&iacute;stico-cultural em Ira&iacute;.</font><br>
                            <font class=txtboldgreynovonot><a href="index.php">Saiba 
                            mais...</a></font></div></td>
                      </tr>
                    </table></td>
                  <td><table width="100%" border="0">
                      <tr> 
                        <td width="39%"><img src="vaga.jpg" width="105" height="70" border="1"></td>
                        <td width="61%"><div align="justify"><font size="1">C</font><font size="1">abe 
                            a atribui&ccedil;&atilde;o de avaliar e aprovar os 
                            projetos de obras particulares, juntamente com a promo&ccedil;&atilde;o 
                            e execu&ccedil;&atilde;o das atividades de urbaniza&ccedil;&atilde;o 
                            .</font><br>
                            <font class=txtboldgreynovonot><a href="index.php">Saiba 
                            mais...</a></font></div></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <TABLE class=text10px cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD>
                    </TD>
                  </TR></TBODY></TABLE>
       	  <DIV 
      style="BACKGROUND-IMAGE: url(2dots.gif); LINE-HEIGHT: 1px; BACKGROUND-REPEAT: repeat"><IMG 
      height=1 src="menu_arquivos/spc_trans.gif" width=1 border=0></DIV>
              <br><DIV 
      style="BACKGROUND-IMAGE: url(2dots.gif); LINE-HEIGHT: 1px; BACKGROUND-REPEAT: repeat"><IMG 
      height=1 src="menu_arquivos/spc_trans.gif" width=1 border=0></DIV><br>
              </TD>
    <TD class=s4 width=10>&nbsp;</TD>
            <TD width=187 vAlign=top bgcolor="#E7E4D3"> 
              <DIV 
      style="BORDER-RIGHT: #444444 1px solid; BORDER-LEFT: #444444 1px solid; BORDER-BOTTOM: #444444 1px solid; BACKGROUND-COLOR: #e1e1e1">
      <TABLE class=row1 cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
                        
                      <TD width=13 bgcolor="#E7E4D3">&nbsp;</TD>
                      <TD bgcolor="#E7E4D3" class=sb><A class=sblink 
            onmouseover="window.status='Suporte Online';" 
            style="COLOR: #cc0000" 
            href="index.php">Suporte Online</A></TD>
                      <TD width=20 align=middle bgcolor="#E7E4D3"><img src="menu_arquivos/ambu.gif" width="15" height="13"></TD>
                    </TR></TBODY></TABLE>
      <DIV class=sub id=s_div style="DISPLAY: none">
      <DIV class=sub_inner></DIV></DIV>
      <DIV id=qs_div style="DISPLAY: none" name="qs_div"></DIV>
      <TABLE class=row2 cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
                      <TD width=13 bgcolor="#E7E4D3">&nbsp;</TD>
                      <TD bgcolor="#E7E4D3" class=sb><A class=sblink 
            onmouseover="window.status='Área Restrita';" 
            href="index.php">Área Restrita</A></TD>
                      <TD bgcolor="#E7E4D3"><font class=desenvolvimento>&nbsp;</font></TD>
                      <TD width=20 align=middle bgcolor="#E7E4D3"><img src="menu_arquivos/cara.gif" width="10" height="18"></TD>
                    </TR></TBODY></TABLE>
      <DIV class=sub>
      <DIV class=sub_inner>
      <DIV class=subText 
      style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 2px">
      <?php include("login.php"); ?></DIV></DIV></DIV>
                <DIV class=sub id=mc_div style="DISPLAY: none">
      <DIV class=sub_inner></DIV></DIV>
      <TABLE class=row2 cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
                      <TD width=13 bgcolor="#E7E4D3">&nbsp;</TD>
                      <TD bgcolor="#E7E4D3" class=sb><A class=sblink 
            onmouseover="window.status='Leis e Normas';" 
            href="index.php">Links</A></TD>
                        
                      <TD width=20 align=middle bgcolor="#E7E4D3"><IMG height=14 src="menu_arquivos/icn_reviews.png" width=18 
            border=0></TD>
                      </TR></TBODY></TABLE>
      <DIV class=sub>
                   <form>
                      
                  <table width="94%" border="0" align="center">
                    <tr>
                      <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                        <FONT class=content><FONT class=content><B><FONT 
            face="Geneva, Arial, Helvetica, san-serif" color=#ffffff 
            size=2> 
                        <SELECT class=combo 
            style="FONT-SIZE: 10px; WIDTH: 130px; FONT-FAMILY: verdana; HEIGHT: 23px" 
            onchange="if(options[selectedIndex].value) window.open(options[selectedIndex].value,'janela')" 
            name=select6 target="_blank">
                          <OPTION selected>Geral</OPTION>
                          <OPTION value=http://www.defesacivil.rs.gov.br>Defesa Civil do RS</OPTION>
                          <OPTION 
              value=http://www.detran.rs.gov.br>Detran RS</OPTION>
                          <OPTION 
              value=http://www.rs.gov.br>Estado do RS</OPTION>
                          <OPTION 
              value=http://www.famurs.com.br>Famurs</OPTION>
                          <OPTION 
              value=http://www.brasil.gov.br>Governo Federal</OPTION>
                          <OPTION 
              value=http://www.ibge.com.br>IBGE</OPTION>
                          <OPTION 
              value=http://www.receita.fazenda.gov.br>Receita Federal</OPTION>
                          <OPTION 
              value=http://www.senado.gov.br>Senado Federal</OPTION>
                        </SELECT>
                        </FONT></B></FONT></FONT></td>
                    </tr>
                    <tr> 
                      <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                        <FONT class=content><FONT class=content><B><FONT 
            face="Geneva, Arial, Helvetica, san-serif" color=#ffffff 
            size=2> 
                        <SELECT class=combo 
            style="FONT-SIZE: 10px; WIDTH: 130px; FONT-FAMILY: verdana; HEIGHT: 23px" 
            onchange="if(options[selectedIndex].value) window.open(options[selectedIndex].value,'janela')" 
            name=select7 target="_blank">
                          <OPTION selected>Partidos Políticos</OPTION>
                          <OPTION value=http://www.pcdob.org.br>PC do B</OPTION>
                          <OPTION 
              value=http://www.pcb.org.br>PCB</OPTION>
                          <OPTION 
              value=http://www.pdt.org.br>PDT</OPTION>
                          <OPTION 
              value=http://www.pfl.org.br>PFL</OPTION>
                          <OPTION 
              value=http://www.pl.org.br>PL</OPTION>
                          <OPTION 
              value=http://www.partidoprogressista.org.br>PP</OPTION>
                          <OPTION 
              value=http://www.psbrs.org.br>PSB</OPTION>
                          <OPTION 
              value=http://www.psdb.org.br>PSDB</OPTION>
                        <OPTION 
              value=http://www.pt-rs.org.br>PT</OPTION>
                        <OPTION 
              value=http://www.ptb.org.br>PTB</OPTION>
                        <OPTION 
              value=http://www.pv.org.br>PV</OPTION>
                        </SELECT>
                        </FONT></B></FONT></FONT></td>
                    </tr>
                    <tr> 
                      <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                        <FONT class=content><FONT class=content><B><FONT 
            face="Geneva, Arial, Helvetica, san-serif" color=#ffffff 
            size=2> 
                        <SELECT class=combo 
            style="FONT-SIZE: 10px; WIDTH: 130px; FONT-FAMILY: verdana; HEIGHT: 23px" 
            onchange="if(options[selectedIndex].value) window.open(options[selectedIndex].value,'janela')" 
            name=select8 target="_blank">
                          <OPTION selected>Buscadores</OPTION>
                          <OPTION value=http://www.google.com.br>Google</OPTION>
                          <OPTION 
              value=http://www.yahoo.com.br>Yahoo</OPTION>
                          <OPTION 
              value=http://www.altavista.com.br>Altavista</OPTION>
                          <OPTION 
              value=http://search.msn.com.br/>Msn Busca 
                                            
                          <OPTION 
              value=http://www.cade.com.br>Cadê</OPTION>
                          <OPTION 
              value=http://www.zoom.com.br>Zoom</OPTION>
                          <OPTION 
              value=http://www.radaruol.com.br>Radar Uol</OPTION>
                          <OPTION 
              value=http://www.sapo.pt>Buscador Sapo</OPTION>
                          <OPTION 
              value=http://www.achei.com.br>Achei</OPTION>
                          <OPTION 
              value=http://www.Terra.com.br>Terra Busca</OPTION>
                          <OPTION 
              value=http://www.radix.com>Radix</OPTION>
                          <OPTION 
              value=http://www.aonde.com>Aonde</OPTION>
                        </SELECT>
                        </FONT></B></FONT></FONT></td>
                    </tr>
                    <tr> 
                      <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                        <FONT class=content><FONT class=content><B><FONT 
            face="Geneva, Arial, Helvetica, san-serif" color=#ffffff 
            size=2> 
                        <SELECT class=combo 
            style="FONT-SIZE: 10px; WIDTH: 130px; FONT-FAMILY: verdana; HEIGHT: 23px" 
            onchange="if(options[selectedIndex].value) window.open(options[selectedIndex].value,'janela')" 
            name=select9 target="_blank">
                          <OPTION selected>Principais Bancos</OPTION>
                          <OPTION 
              value=http://www.bradesco.com.br>Bradesco</OPTION>
                          <OPTION 
              value=http://www.bancodobrasil.com.br>Banco do Brasil</OPTION>
                          <OPTION value=http://www.itau.com.br>Itaú</OPTION>
                          <OPTION 
              value=http://www.bancoreal.com.br>Banco Real</OPTION>
                          <OPTION 
              value=http://www.hsbc.com.br>HSBC</OPTION>
                          <OPTION 
              value=http://www.unibanco.com.br>Unibanco</OPTION>
                          <OPTION 
              value=http://www.bankboston.com.br>Bank Boston</OPTION>
                          <OPTION 
              value=http://www.caixa.com.br>Caixa Economica</OPTION>
                          <OPTION 
              value=http://www.nossacaixa.com.br>Nossa Caixa</OPTION>
                          <OPTION 
              value=http://www.santander.com.br>Santander</OPTION>
                          <OPTION 
              value=http://www.finasa.com.br>Finasa</OPTION>
                          <OPTION 
              value=http://www.sudameris.com.br>Sudameris</OPTION>
                          <OPTION 
              value=http://www.citibank.com.br>Citibank</OPTION>
                          <OPTION 
              value=http://www.panamericano.com.br>Panamericano</OPTION>
                          <OPTION 
              value=http://www.banespa.com.br>Banespa</OPTION>
                          <OPTION 
              value=http://www.sicredi.com.br>Sicredi</OPTION>
                        </SELECT>
                        </FONT></B></FONT></FONT></td>
                    </tr>
                    <tr> 
                      <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                        <FONT class=content><FONT class=content><B><FONT 
            face="Geneva, Arial, Helvetica, san-serif" color=#ffffff 
            size=2> 
                        <SELECT class=combo 
            style="FONT-SIZE: 10px; WIDTH: 130px; FONT-FAMILY: verdana; HEIGHT: 23px" 
            onchange="if(options[selectedIndex].value) window.open(options[selectedIndex].value,'janela')" 
            name=select10 target="_blank">
                          <OPTION 
              selected>Utilitários</OPTION>
                          <OPTION 
              value=http://www.correios.com.br/servicos/cep>Consúlta CEP</OPTION>
                          <OPTION 
              value=http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/CPF/ConsultaPublica.asp>Consúlta 
                          CPF</OPTION>
                          <OPTION 
              value=http://www.correios.com.br>Correios</OPTION>
                          <OPTION 
              value=http://www.receita.fazenda.gov.br/>Receita Federal 
                                            
                          <OPTION 
              value=http://www.receita.fazenda.gov.br/Grupo2/Declaracoes.asp>Imposto 
                          de Renda</OPTION>
                          <OPTION 
              value=http://www.telemar.com.br/lista/index.asp>Telemar</OPTION>
                          <OPTION 
              value=http://guia.telefonica.net.br/loja/informacoes/guia_assinantes/i_guia_con.asp>Telefônica</OPTION>
                          <OPTION 
              value=http://www.brasiltelecom.com.br/home/framefixo.jsp>Brasil 
                          Telecom</OPTION>
                        </SELECT>
                        </FONT></B></FONT></FONT></td>
                    </tr>
                  </table>
                    <TABLE class=row2 cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
                      <TD width=13 bgcolor="#E7E4D3">&nbsp;</TD>
                      <TD bgcolor="#E7E4D3" class=sb><A class=sblink 
            onmouseover="window.status='Leis e Normas';" 
            href="index.php">Busca</A></TD>
                        
                      <TD width=20 align=middle bgcolor="#E7E4D3"><IMG height=14 src="menu_arquivos/icn_reviews.png" width=18 
            border=0></TD>
                      </TR></TBODY></TABLE>
      <DIV class=sub>
              <br>&nbsp;&nbsp;&nbsp;Escolha sua opção de busca:<br>
                   <form>
                      <table width="94%" border="0" align="center">
                        <tr> 
                          <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                            <INPUT class=subText
                        id=pesquisa2 onclick="this.value=''"  
                        size=20 value="Busca do site" name=pesquisa> <INPUT class=botaoindex type=submit value=OK name=Submit> 
                            <INPUT type=hidden value=pesquisa_nome 
                    name=link></td>
                        </tr>
                        <tr> 
                          <td><img src="seta444.gif" width="16" height="7">&nbsp; 
                            <INPUT class=subText 
                        id=pesquisa onclick="this.value=''" 
                        size=20 value="Leis Municipais" name=pesquisa2> <INPUT class=botaoindex type=submit value=OK name=Submit2> 
                            <INPUT id=link type=hidden value=pesquisa_rua 
                      name=link2></td>
                        </tr>
                      </table></form>
      			<table class=row2 cellspacing=0 cellpadding=0 border=0>
                      <tbody>
                        <tr> 
                          <td width=13 height="14" bgcolor="#E7E4D3">&nbsp;</td>
                          <td bgcolor="#E7E4D3" class=sb onMouseOver="window.status='Notícias Online';" 
          ><span 
            class=sb>Notícias Online</span></td>
                          <td width=20 bgcolor="#E7E4D3"><img height=14 src="menu_arquivos/icn_reviews.png" width=18 
            border=0></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class=bodyText style="BORDER-TOP: #000000 1px solid" cellspacing=0 
      cellpadding=0 width=185 bgcolor=#F8F8F3 border=0>
                      <tbody>
                        <tr> 
                          
                    <td height="18"> &nbsp; 
                      <marquee behavior="scroll" align="left" direction="up" height="172" width="176" scrollamount="1" scrolldelay="10" onMouseOver='this.stop()' onMouseOut='this.start()'>
                            <?php 
$feed = 'http://feeds.folha.uol.com.br/folha/emcimadahora/rss091.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="caxa.gif">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
                            </marquee></td>
                        </tr>
                      </tbody>
                    </table>
                 </TD></TR></TBODY></TABLE>
      <?php include("baixo.php"); ?>
    </DIV>
  </DIV>
</CENTER>
</BODY></HTML>
