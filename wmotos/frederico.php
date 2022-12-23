<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Westphalen Motos - Concessionária Honda</TITLE><LINK href="home_arquivos/asw.css" 
type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.6000.16386" name=GENERATOR>
<style type="text/css">
<!--
.style11 {font-size: 10px}
-->
</style>
</HEAD>
</HTML>
<HTML>
<HEAD>
</HEAD>
<BODY>
<DIV id=asw>
<DIV id=pagina>
<DIV id=topo>
<H1 id=logo>Westphalen Motos</H1>
<UL>
  <LI></LI>
  <LI></LI>
</UL>
</DIV>
<DIV id=menu>
<?php include("menu.php"); ?></DIV>
<P class=destaque><SCRIPT src="carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("cima.swf","740","420"); 
    </SCRIPT></P>
<table width="100%" border="0" bgcolor="#000000">
   <tr>
     <td><?php include("busca.php"); ?></td>
   </tr>
</table><img src="barra.jpg">
<table width="99%" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td width="17%"><div align="left"></div></td>
    <td width="18%">&nbsp;MODELO</td>
    <td width="18%">&nbsp;ESTADO</td>
    <td width="14%">&nbsp;ANO</td>
    <td width="17%">&nbsp;COR</td>
    <td width="5%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
  </tr>
</table>
<span class="link3">
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
$sql_select = "SELECT * FROM produtos WHERE cidade='frederico' ORDER BY Id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$Id = $array["Id"];
$modelo = $array["modelo"];
$estado = $array["estado"];
$ano = $array["ano"];
$cor = $array["cor"];
$fotomenor = $array["fotomenor"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
</span>
<table width="99%" border="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="17%"><div align="left"><img src="fotosmenorpm/<?php echo $fotomenor.""; ?>"></div></td>
      <td width="18%">&nbsp;<?php echo $modelo.""; ?></td>
      <td width="18%">&nbsp;<?php echo $estado.""; ?></td>
      <td width="14%">&nbsp;<?php echo $ano.""; ?></td>
      <td width="17%">&nbsp;<?php echo $cor.""; ?></td>
      <td width="5%"><a href="verfotos.php?Id=<?php echo $Id.""; ?>"><img src="camera.gif" border="0"></a></td>
      <td width="11%">&nbsp;<a href="verfotos.php?Id=<?php echo $Id.""; ?>">Mais fotos...</a></td>
    </tr>
  </table>
  <div align="center">
    <?




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM produtos WHERE cidade='frederico'";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 3;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='frederico.php?p=1' target='_self'><font size='1'>Primeira p&aacute;gina</font></a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='frederico.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<font color='#000000' size='1'>";
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
echo "<a href='frederico.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='frederico.php?p=".$pags."' target='_self'><font size='1'>&Uacute;ltima p&aacute;gina</font></a> ";
?></div>
  <table width="99%" border="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="34%"><img src="blank.gif" width="1" height="1"></td>
      </tr>
  </table>
  <img src="barra.jpg"></DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV>
</BODY>
</HTML>

