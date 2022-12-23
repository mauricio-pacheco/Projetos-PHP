<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD><TITLE>Arbaza</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/j.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/scripts.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/estilo.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/menu.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/estilo_int.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
.style3 {font-family: Tahoma, Arial}
.style5 {
	font-family: Tahoma, Arial;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-family: Tahoma, Arial; font-size: 11px; color: #333333; }
.style10 {color: #333333}
#apDiv1 {
	position:absolute;
	width:146px;
	height:56px;
	z-index:3;
	left: 114px;
	top: 816px;
}
.style13 {font-size: 11px; font-family: Tahoma; }
.style15 {font-size: 12px}
.style19 {font-size: 12px; font-family: Tahoma, Arial;}
.style20 {font-family: Tahoma, Arial; font-size: 12px; color: #333333; }
.style21 {font-family: Tahoma; color: #333333; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style23 {
	color: #333333;
	font-size: 11px;
	font-family: Tahoma;
}
.style27 {font-family: Tahoma; color: #D81E05; font-size: 11px; }
.style24 {color: #FEDC01}
.style35 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.style28 {	font-size: 10px;
	color: #FFFFFF;
}
.style29 {font-size: 10px}
.style30 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style31 {color: #FFCC33}
.style33 {color: #0099FF}
</style>
</HEAD>
<BODY>
<?php include("cima.php"); ?>
<script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email2.focus();
return false
}

if (document.cadastro.assunto.value=="") {
alert("O Campo Assunto não está preenchido!")
cadastro.assunto.focus();
return false
}

		return true;

}


</SCRIPT>
<TABLE id=conteudo cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD id=col_esquerda>
      <?php include("menu.php"); ?></TD>
    <TD id=meio><table width="99%" border="0" align="center">
      <tr>
        <td><img src="blank.gif" width="1" height="2"></td>
        <td><img src="blank.gif" width="1" height="2"></td>
        <td><img src="blank.gif" width="1" height="2"></td>
           <td><img src="blank.gif" width="1" height="2"></td>
      </tr>
      <tr>
        <td width="2%"><img src="mundo.jpg" width="20" height="20"></td>
        <td width="65%"><script language="Javascript1.2">
<!--

if(navigator.appName == "Netscape") {
document.write('<layer id="clock"></layer><br>');
}

if (navigator.appVersion.indexOf("MSIE") != -1){
document.write('<span id="clock"></span><br>');
}

function upclock(){
var hoje   = new Date();
var hrs = hoje.getHours();
var min = hoje.getMinutes();
var sec = hoje.getSeconds();
var col = ":";
var spc = " ";
var barra = "/";
var tco = "-";
var meses  = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
var diadasemana = new Array("Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado");
var mes    = meses[hoje.getMonth()];
var ano    = (hoje.getYear() + 0);
var semana = diadasemana[hoje.getDay()];
var dia    = hoje.getDate();
if (hrs  <= "23") var daytime = "Boa noite";
if (hrs  <= "18") var daytime = "Boa tarde";
if (hrs  <= "12") var daytime = "Bom dia";
if (hrs  <= "6") var daytime = "";
if (min   <= "9")  min = "0"+min;
if (dia   <= "9")  dia = "0"+dia;
if (sec   <= "9")  sec = "0"+sec;
hoje = ", hoje ";
dize = " ";
deste = " de ";
rel = " ( ";
rel2 = " Hs ) ";
traco = "-";

if(navigator.appName == "Netscape") {
document.clock.document.write(daytime+hoje+semana+dize+dia+deste+mes+deste+ano+spc+traco+rel+hrs+col+min+col+sec+rel2);
document.clock.document.close();
}

if (navigator.appVersion.indexOf("MSIE") != -1){
clock.innerHTML = daytime+hoje+semana+dize+dia+deste+mes+deste+ano+spc+traco+rel+hrs+col+min+col+sec+rel2;
}
}

setInterval("upclock()",1000);
//-->
                          </script></td>
                          <td width="5%"></td>
        <td width="28%"></td>
        </tr>
    </table>
      <table width="100%" border="0" align="center">
        <tr>
          <td><img src="titulo4.jpg" width="160" height="24" /></td>
        </tr>
        <tr>
          <td>&nbsp;Fundada em Frederico Westphalen/RS, a ARBAZA est&aacute; voltada para a produ&ccedil;&atilde;o e comercializa&ccedil;&atilde;o de feij&atilde;o e cereais &nbsp;em geral. <a href="mercados.php" class="receitas">Saiba Mais...</a></td>
        </tr>
        <tr>
          <td><img src="titulo3.jpg" width="160" height="24" /></td>
        </tr>
        <tr>
          <td>&nbsp;Confira nossa linha de produtos no menu do site.</td>
        </tr>
        <tr>
          <td align="center"><img src="montagem_conjunto_geral01.jpg"/></td>
        </tr>
        <tr>
          <td align="center"><img src="cracknempensar.jpg"/></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center">
      <tr>
        <td><img src="blank.gif" width="1" height="1"></td>
      </tr>
    </table></TD>
  </TR></TBODY></TABLE>
<?php include("baixo.php"); ?>
</BODY></HTML>
