<?php include("meta.php"); ?>
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
    <td class="fontetitulo">&nbsp;&nbsp;<strong>NOT&Iacute;CIAS - SELECIONE O DEPARTAMENTO</strong></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 378979;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_depnot ORDER BY departamento ASC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="5"; //quantidade de colunas
$cont="1"; //contador

print"<table width=960>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$departamento = $array["departamento"];


?>
      <table width="100%" border="0">
        <tr>
          <td width="25%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><a href="nots.php?iddep=<?php echo $id.""; ?>"><img alt="<?php echo $departamento.""; ?>" title="<?php echo $departamento.""; ?>" src="imagens/audio.png" border="0" /></a></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" class="fonte"><a class="fonte" href="nots.php?iddep=<?php echo $id.""; ?>"><b><?php echo $departamento.""; ?></b></a></td>
              </tr>
            </table>
            <br /></td>
        </tr>
      </table>
      <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
      <?php


$sql_select_all = "SELECT * FROM cw_depnot ORDER BY departamento ASC";
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



?></td>
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