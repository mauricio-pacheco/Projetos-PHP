<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #065A7E;
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table class="bodyline" background="b1.gif" width="974" align="center" cellspacing="0" cellpadding="0" border="0"> 
	<tr> 
		<td align="center" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td width="60%" height="110" align="center" background="b7.gif"> 
          <div align="center"><SCRIPT src="http://www.fredericowestphalen.rs.gov.br/fw/carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("http://www.fredericowestphalen.rs.gov.br/fw/cima.swf","974","186"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div></td>
      </tr>
    </table>
   <table width="100%" border="0" align="center" background="fundado2.jpg" height="40">
  <tr>
    <td width="3%"><img src="calenda.gif" /></td>
    <td width="68%"><font color="#252525">
      <script language="JavaScript" type="text/javascript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia,"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde,"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite,"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda Feira";
diasemana[2] = "Terça Feira";
diasemana[3] = "Quarta Feira";
diasemana[4] = "Quinta Feira";
diasemana[5] = "Sexta Feira";
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
document.write(txtsaudacao + " Frederico Westphalen/RS, hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script>
      </font>
        <script language="JavaScript" type="text/javascript">
function horas(){
	var now = new Date();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds()
	if (hours <=9)
hours="0"+hours;
	if (minutes<=9)
minutes="0"+minutes;
	if (seconds<=9)
seconds="0"+seconds;
	var cdate="<font color=#252525 size=1 face=verdana>Hora Certa: "+hours+":"+minutes+":"+seconds+" "+"</font>" 
	clock.innerHTML= cdate;
setTimeout("horas()",1000);
}
  </script></td>
    <td width="3%"><div align="center"><img src="lupaco.gif" /></div></td>
    <form action="modules.php?op=modload&amp;name=Recherches&amp;file=index" method="post">
      <td width="26%">
        <div align="left">
          <input type="text" size="38" class="texto" name="query" />
          <input type="submit" class="texto" value="Pesquisar" />
          </div></td>
    </form>
    </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr valign="top"> 
      <td valign="top" width="1" background="themes/Helius/images/7px.gif">