<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>PREFEITURA MUNICIPAL DE PALMITINHO</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="Lima" name=description>
<META content="palavras, chave" name=keywords>
<META content=General name=rating>
<META content=index,follow name=robots>
<LINK href="home_arquivos/site.css" type=text/css rel=stylesheet>
<LINK href="favicon.ico" type=image/x-icon rel="shortcut icon">
<META content="MSHTML 6.00.2900.3243" name=GENERATOR>
<style type="text/css">
<!--
body {
	background-image: url(home_arquivos/bg.jpg);
}
.style1 {color: #FFFFFF}
.style11 {font-size: 10px}
.style13 {	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0E5186;
}
-->
</style>
</HEAD>
<BODY topmargin="0" leftmargin="0"><div align="center"><SCRIPT src="carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("cima.swf","980","151"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div>
<?php include("linkscima.php"); ?>
<table width="980" border="0" align="center">
  <tr>
    <td width="154" bgcolor="#FFFFFF" valign="top"><?php include("direito.php"); ?></td>
    <td width="574" bgcolor="#FFFFFF" valign="top"><table width="98%" border="0" align="center">
      <tr>
        <td align="center"><BR><b><script language="JavaScript" type="text/javascript">
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
mesdoano[0] = "01";
mesdoano[1] = "02";
mesdoano[2] = "03";
mesdoano[3] = "04";
mesdoano[4] = "05";
mesdoano[5] = "06";
mesdoano[6] = "07";
mesdoano[7] = "08";
mesdoano[8] = "09";
mesdoano[9] = "10";
mesdoano[10] = "11";
mesdoano[11] = "12";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Palmitinho/RS, " + diasemana[xdia] + ", " + dia + "/" + mesdoano[mes] + "/" + ano);
</script></b></td>
      </tr>
    </table>
      <table width="96%" border="0" align="center">
        <tr>
          <td><table width="97%" border="0" align="center">
            <tr>
              <td bgcolor="#0066FF"><img src="blank.gif" width="1" height="4"></td>
            </tr>
          </table>
            <span class="link3">
            <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe not&iacute;cias cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
            </span>
            <table width="96%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="2%"><img src="news.gif" width="17" height="16"></td>
                    <td width="98%"><?php echo $n["titulo"]; ?><!--/TITULO--></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><font color="#0166FF">&nbsp;&nbsp;Publicada Terça-feira, <?php echo $n["data"]; ?> (<?php echo $n["hora"]; ?>)</font></td>
              </tr>
              <tr>
                <td><?php echo $n["legenda"]; ?></td>
              </tr>
              <tr>
                <td><?php echo $n["texto"]; ?></td>
              </tr>
          </table>
            <?php
  }
  }
 ?></td>
        </tr>
    </table>
      <table width="98%" border="0" align="center">
        <tr>
          <td><div align="center"><a href="javascript:window.history.go(-1)"><img src="vltar.jpg" width="100" height="26" border="0"></a></div></td>
        </tr>
    </table></td>
    <td width="238" bgcolor="#FFFFFF" valign="top"><?php include("esquerdo.php"); ?></td>
  </tr>
</table>
<?php include("baixo.php"); ?></BODY></HTML>
