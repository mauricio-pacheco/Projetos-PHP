<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br">
<head>
<title>Associa&ccedil;&atilde;o Moto Clube Trilheiros do Barril</title>
<meta name="description" content="Descrição">
<meta name="keywords" content="palavras chave">
<meta name="classification" content="Internet" />
<meta name="language" content="br" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="7 Dias" />
<meta name="robots" content="index, follow" />
<meta name="author" content="dnimports.com.br">
<meta name="robots" content="index, follow, all" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="e.ico" type="image/x-icon" />
<link rel="shortcut icon" href="e.ico" type="image/x-icon" />
<style type="text/css">
@import url("home_arquivos/barroide.css");
</style>
<STYLE type=text/css>
.style5 {
	font-size: 9px
}
.style7 {
	font-size: 14px;
	font-family: Verdana;
	color: #ffffff;
}
.style8 {font-size: 14}
.style9 {color: #FFFFFF}
.style15 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style17 {color: #FFFFFF; font-size: 10px; }
.style19 {color: #FFFFFF; font-size: 14px; }
</STYLE>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<SCRIPT src="home_arquivos/AC_RunActiveContent.js" 
type=text/javascript></SCRIPT>
</HEAD>
<BODY>
<table width="778" height="32" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828" >
  <tbody>
    <tr>
      <td width="756" height="32" background="home_arquivos/trilhabaixo.jpg" bgcolor="#000000" class="style8"><div align="center" class="style7">Setor Administrativo do Site</div></td>
    </tr>
  </tbody>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>


<TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><div align="center">
                       <style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<?php include("menuadm.php"); ?>
                        <table width="98%" border="0">
                          <tr>
                            <td><div align="center">
                              <hr>
                              <p>
                                <?php include("menuadmfotos.php"); ?>
                              </p>
                              <p><span class="style19">Administrar Fotos nas Galerias Fotos</span></p>
                              <p><span class="style19">Selecione a Galeria para a administrar as Fotos</span></p>
                              <table width="98%" border="0">
                                <tr>
                                  <td><p align="left" class="style19">
                                    <?php
include "conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 10;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM galeria ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$dataevento = $array["dataevento"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                                    <font color="#FFFF00"><img src="capas/<?php echo $foto.""; ?>" border="0" width="100" height="75"></font> &nbsp;                                         <font color="#FFFF00"><?php echo $nomegaleria.""; ?></font> - <a href="admedifoto.php?id=<?php echo $id.""; ?>&amp;nomegaleria=<?php echo $nomegaleria.""; ?>"><font color="#FFFFFF">ADMINISTRAR FOTOS DA GALERIA</font> <img src="home_arquivos/editar.gif" border="0"></a><br />
                                          <br />
                                          <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br /><br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM galeria";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='admfotosenviar.php?p=1' target='_self' class=manchete_texto4>PRIMEIRA P&Aacute;GINA</a> <font color='#ffffff' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='admfotosenviar.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<font color=#FFFF00 size=1>";
echo $p." ";
echo "</font>";

// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo "<a href='admfotosenviar.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#ffffff' size='1'>-</font> <a href='admfotosenviar.php?p=".$pags."' target='_self'>&Uacute;LTIMA P&Aacute;GINA</a> ";
?>
                                  </p>
                                    <p align="center" class="style19">&nbsp;</p></td>
                                </tr>
                              </table>
                              </div></td>
                          </tr>
                        </table>
                        </div></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<TABLE width=778 height="32" border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828" ><TBODY>
  <TR>
    <TD width=756 height="32" background="home_arquivos/trilhabaixo.jpg" bgColor=#000000><div align="center" class="texto_html style5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; 
      <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
    Moto Clube Trilheiros do Barril - Desenv.: <a href="http://www.w3propaganda.com" target="_blank"><font color=#FCDB00>W3</font></a></div></TD>
</TR></TBODY></TABLE>
</BODY>
</HTML>
