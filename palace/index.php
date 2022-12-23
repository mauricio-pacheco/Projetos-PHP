<?php 
$fp = fopen("counterlog.txt", "r"); 

$count = fread($fp, 1024); 

fclose($fp); 

$count = $count + 1; 

$fp = fopen("counterlog.txt", "w"); 
fwrite($fp, $count); 

fclose($fp); 

?> 
<HTML><HEAD>
<TITLE>Hotel Palace - Frederico Westphalen/RS</TITLE>
<LINK 
href="index_arquivos/padrao2.css" type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">

<script language="JavaScript">
<!-- hide on

function popup(popupfile,winheight,winwidth,scrolls)
{
open(popupfile,"PopupWindow","resizable=no,height=" + winheight + ",width=" + winwidth + ",scrollbars=no" + scrolls);
}

// hide off -->
</script>

<STYLE type=text/css>
.link-des {
	FONT-WEIGHT: normal; FONT-SIZE: 11px; COLOR: #aaaaaa; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
</STYLE>

<SCRIPT>  
<!--        
		  
function valida(oForm){
if(oForm.elements["buscaclic"].value==""){
alert("Preencha o campo");
return false;
}
}
//-->		  
</SCRIPT>

<STYLE type=text/css>
.guiabox2 {
	BORDER-RIGHT: #e4e4e4 1px; BORDER-TOP: #e4e4e4 1px; FONT-WEIGHT: normal; FONT-SIZE: 10px; BORDER-LEFT: #e4e4e4 1px; COLOR: #7d4b00; BORDER-BOTTOM: #e4e4e4 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
</STYLE>
<STYLE type=text/css>
.enquetebox {
	BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid
}
.style1 {color: #999999}
</STYLE>

<SCRIPT language="JavaScript1.2"> 
var URLSite = window.location.href; 
var TituloSite = document.title; 
function addfav(){ 
if (document.all) window.external.AddFavorite(URLSite,TituloSite); 
} 
</SCRIPT> 
<SCRIPT LANGUAGE="JavaScript">
var dayarray=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
var montharray=new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")
function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
{
hours=hours
}
{
 d = new Date();
 Time24H = new Date();
 Time24H.setTime(d.getTime() + (d.getTimezoneOffset()*60000) + 3600000);
 InternetTime = Math.round((Time24H.getHours()*60+Time24H.getMinutes()) / 1.44);
 if (InternetTime < 10) InternetTime = '00'+InternetTime;
 else if (InternetTime < 100) InternetTime = '0'+InternetTime;
}
if (hours==0)
hours=24
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
//altere a fonte aqui
var cdate=""+hours+":"+minutes+":"+seconds+""
if (document.all)
document.all.clock.innerHTML=cdate
else if (document.getElementById)
document.getElementById("clock").innerHTML=cdate
else
document.write(cdate)
}
if (!document.all&&!document.getElementById)
getthedate()
function goforit(){
if (document.all||document.getElementById)
setInterval("getthedate()",1000)
}
window.onload=goforit
</script>
</HEAD>
<BODY bgColor=#ffffff background="bg.gif" link="#006600" leftMargin=2 topMargin=0 marginwidth="0" marginheight="0">
<table width="784" border="1" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr> 
    <td align="center" bordercolor="#CCCCCC"><SCRIPT src="for.js"></SCRIPT> <SCRIPT language=javascript>
     carregaFlash('encima.swf','772','160'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT> </td>
  </tr>
</table>
<table width="0" align="center" bgcolor="#FFFFFF">
  <TBODY><TR>
      <TD width="778" bordercolor="#000000">
<TABLE cellSpacing=0 cellPadding=0 width=776 border=0>
  <TBODY>
  <TR>
              <TD vAlign=top width=135 background=index_arquivos/menurodape.gif 
    bgColor=#fbfbfb> 
                <TABLE cellSpacing=0 cellPadding=0 width=135 border=0>
                  <TBODY>
                    <TR> 
                      <TD height="22" background="index_arquivos/reg.gif"><div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>menu</strong></font></div></TD>
                    </TR>
                    <TR> 
                      <TD align=middle> <TABLE class=menu-esq-tbl cellSpacing=0 cellPadding=0 width=132 
            bgColor=#fbfbfb border=0>
                          <TBODY>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD width=17> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD width=120 height=15><A class=font-menu-esqu 
                  href="home.php" target=centro><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Home</strong></font></A></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="http://www.guiamais.com.br/ruas/?localeUfId=RS&localeCityId=Frederico%20Westphalen" target=centro><font size="2"><strong>Localização</strong></font></A></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="apartamentos.php" target=centro><font size="2"><strong>Apartamentos</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="cafe.php" target=centro><font size="2"><strong>Café</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="saladeestar.php" target=centro><font size="2"><strong>Sala de Estar</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="hotel.php" target=centro><font size="2"><strong>Escritório</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="est.php" target=centro><font size="2"><strong>Estacionamento</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="servicos.php" target=centro><font size="2"><strong>Servi&ccedil;os</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="estrutura.php" target=centro><font color="#FF0000" size="2"><strong>Pontos Turismo</strong></font></A></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="cidade.php" target=centro><font size="2"><strong>Cidade</strong></font></A></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="fred.php" target=centro><font size="2"><strong>F. Westphalen</strong></font></A></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#EEC6C4';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD> <DIV align=center><img src="bala.gif" width="7" height="5"></DIV></TD>
                              <TD height=15><A class=font-menu-esqu 
                  href="links.php" target=centro><font size="2"><strong>Links</strong></font></A></TD>
                            </TR>
                            <TR onMouseOver="this.style.background='#e5e5e5';" 
              onmouseout="this.style.background='#FBFBFB';"> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/tracomenu.gif" 
                  width=132></TD>
                            </TR>
                          </TBODY>
                        </TABLE></TD>
                    </TR>
                    <TR> 
                      <TD align=middle> <TABLE class=menu-esq-tbl cellSpacing=0 cellPadding=0 width=132 
            bgColor=#fbfbfb border=0>
                          <TBODY>
                            <TR> 
                              <TD colSpan=2><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><em><br>
                                  N&uacute;mero de Visitas</em></font><br>
                                  <?php 
$fp = fopen("counterlog.txt", "r"); 

$count = fread($fp, 1024); 

fclose($fp); 

$count = $count + 0; 

echo "" . $count . ""; 

$fp = fopen("counterlog.txt", "w"); 

fwrite($fp, $count); 

fclose($fp); 

?>
                                  <br>
                                 
                                </div></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><div align="center"><img src="pal.gif" width="128" height="90"> 
                                </div>
                                <div align="center"></div></TD>
                            </TR>
                            <TR> 
                              <TD colSpan=2><IMG height=1 src="index_arquivos/traco2.gif" 
                  width=132></TD>
                            </TR>
                          </TBODY>
                        </TABLE></TD>
                    </TR>
                  <FORM name="buscar" action="busca.asp" method="post">
                  </form>
                </TABLE>
      
    <TD vAlign=top width=512>

      <TABLE cellSpacing=0 cellPadding=0 width=512 border=0>
        <TBODY>
        <TR>
          <TD width="100%" height="22" background="index_arquivos\guia(1).gif"><div align="center"><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#FFFFFF 
      size=1> 
                          <script language="JavaScript" type="text/JavaScript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia!"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde!"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite!"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda";
diasemana[2] = "Terça";
diasemana[3] = "Quarta";
diasemana[4] = "Quinta";
diasemana[5] = "Sexta";
diasemana[6] = "Sábado";
dia = datahora.getDate();
mes = datahora.getMonth();
mesdoano = new Array(12);
mesdoano[0] = "janeiro";
mesdoano[1] = "fevereiro";
mesdoano[2] = "março";
mesdoano[3] = "abril";
mesdoano[4] = "maio";
mesdoano[5] = "junho";
mesdoano[6] = "julho";
mesdoano[7] = "agosto";
mesdoano[8] = "setembro";
mesdoano[9] = "outubro";
mesdoano[10] = "novembro";
mesdoano[11] = "dezembro";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script>
                          - Hora certa: <span id="clock"></font></div></TD>
        </TR></TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width=512 border=0>
        <TBODY>
        <TR>
          <TD height=8><table width="100%" border="1" bordercolor="#FFFFFF">
                          <tr>
                            <td bordercolor="#D8D8D8"> <iframe align="left" name="centro" src="home.php" width="502" height="350" frameborder="0" scrolling="no"> 
                                </iframe></td>
                          </tr>
                        </table>
                        
                      </TD>
        </TR></TBODY></TABLE>
              </TD>
              <TD class=menu-dire-tbl align="center">
<hr>
                <SCRIPT src="for2.js"></SCRIPT> <SCRIPT language=javascript>
     carregaFlash('lado.swf','125','342'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT> 
                <hr> </TD>
  </TR>
    </TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=778 border=0>
  <TBODY>
  <TR>
              <TD height="38" background="index_arquivos/rodape.gif"><div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Rua 
                  do Com&eacute;rcio, 789, Centro. Fone/Fax (55) 3744 4333 - Web 
                  Design:<a href="http://www.casadaweb.net" target=blank><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                  Casa da Web</font></a> - Design Gr&aacute;fico: Supra Design</font> 
                </div></TD>
            </TR></TBODY></TABLE>
</table>
</BODY>