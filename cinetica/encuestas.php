﻿<?php include("meta.php"); ?>
<table width="970" bgcolor="#FFFFFF" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php include("cima.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
  </tr>
</table>
<table width="960" border="0" height="45" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#EE5F00"><?php include("menucima.php"); ?></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("bannermeio.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" bgcolor="#000000" border="0" height="30" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="fontetitulo">&nbsp;&nbsp;<strong>ENCUESTAS</strong></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" class="fonte">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td class="fonte"><?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 20;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$pergunta = $array["pergunta"];
$data = $array["data"];
$hora = $array["hora"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                </tr>
              </table>
              <table width="100%" border="0" align="center">
                <tr>
                  <td width="4%"><a href="verenquete.php?idenquete=<?php echo $id.""; ?>" class="fonte"><img src="imagens/exclama.png" border="0" /></a></td>
                  <td width="96%" align="left" class="fonte"><table width="100%" border="0">
                    <tr>
                      <td>&nbsp;<a href="verenquete.php?idenquete=<?php echo $id.""; ?>" class="fonte"><?php echo $pergunta.""; ?><b><span class="rodape"> </span></b></a></td>
                    </tr>
                    <tr>
                      <td>&nbsp;<b><?php echo $data.""; ?></b> - <b><?php echo $hora.""; ?></b></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <div align="center">
                <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br /><br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_enquetes";
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
echo "<a href='reenquete.php?p=1' target='_self' class=fonte>PRIMEIRA P&Aacute;GINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='reenquete.php?p=".$i."' target='_self' class=fonte>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "| <span class=fonte><b>";
echo $p." ";
echo "</b></span> |";

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
echo " <a href='reenquete.php?p=".$i."' target='_self' class=fonte>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='reenquete.php?p=".$pags."' target='_self' class=fonte>&Uacute;LTIMA P&Aacute;GINA</a> ";
?>
              </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("ft.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("pubbaixo.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>