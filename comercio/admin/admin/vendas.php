<?php include ('auth.php') ?>
<?
include ("../padrao.php");
$path_local = "../padrao.php";
?>
<html>
<head>
<title>Adminstra&ccedil;&atilde;o de Com&eacute;rcio Eletr&ocirc;nico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
-->
</style>
<link rel="stylesheet" href="estilo.css">
</head>
<Script LANGUAGE=JavaScript>
function alterapedido(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=750, height=700')
}
</Script>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
           <? print $base[nome]; ?></font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">Administrador</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>">
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><font size="1" color="#FF6600">|
      <a href="categorias.php?cat_pai=0" class="link_azul">CATEGORIAS</a> | <a href="vendas.php" class="link_azul">VENDAS</a>
      | <a href="clientes.php" class="link_azul">CLIENTES</a></font><font size="1" color="#FF9933">
      <font color="#FF6600">| <a href="./" class="link_azul">P&Aacute;GINA
      PRINCIPAL</a> | <a href="boletim.php" class="link_azul">BOLETIM</a> | <a href="enquete.php" class="link_azul">ENQUETE</a> </font></font></b></font> </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="400">
  <tr>
    <td bgcolor="<? print "$barra";?>" width="20%" height="20%" valign="top">
      <table width="100%" border="0" cellspacing="2" cellpadding="2" height="100%">
        <tr bgcolor="<?print $sub_barra;?>" valign="top">
          <td><?
include "../db.php";
/// Se a categoria for maior que a principal tenta paginar Produtos.
if ($cat_pai > "0"){
/// Incia paginação
$sql_paginacao = "SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai AND p.id = pc.cod_produto ORDER BY nome_produto ASC LIMIT $inicio,$max";
$sql_paginacao_1 = "SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai AND p.id = pc.cod_produto ORDER BY nome_produto ASC";
$max = $qtde_p_p_p;
include ("paginacao.php");
/// Termina paginação
}
if (!$cat_pai){
$cat_pai = "0";
}
$select_gif = mysql_query("SELECT gif FROM categorias WHERE cod_categoria = '$cat_pai'");
while($res = mysql_fetch_array($select_gif)){
$imagem_cat = $res[0];
}
$seleciona_categorias = mysql_query("SELECT * FROM categorias WHERE pertence_categoria = $cat_pai ORDER BY descri_categoria;");
while ($res_sc = mysql_fetch_array($seleciona_categorias)){
$eusou1 = urlencode("$res_sc[1]");
$categorias_corpo .= "<a class=link_branco href=categorias.php?cat_pai=$res_sc[0]&eu_sou=$eusou1>$res_sc[1]</a><br>";
}
$categorias_corpo .= "</font>";
$categorias_corpo_um .= "<font face=verdana size=1 color=white><a class=link_branco href=javascript:history.back(1)>$eu_sou</a><br><br>";
print "$categorias_corpo_um$categorias_corpo";
?></td>
        </tr>
      </table>
      <br>
      &nbsp;</td>
    <td width="80%" height="80%" valign="top">
      <blockquote>
        <p>&nbsp;</p>
        <blockquote>
          <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Manuten&ccedil;&atilde;o
            geral dos pedidos efetuados.</b></font></p>
          <p><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
$path_local = "../padrao.php";
include "../db.php";
/// Se a categoria for maior que a principal tenta paginar Produtos.
/// Incia paginação
$sql_paginacao = "SELECT * FROM pedidos ORDER BY id ASC LIMIT $inicio,$max";
$sql_paginacao_1 = "SELECT * FROM pedidos ORDER BY id ASC";
$max = $qtde_p_p_p;
include ("paginacao.php");
/// Termina paginação
$sql = mysql_query("SELECT * FROM pedidos ORDER BY id ASC LIMIT $inicio,$max");
while($ressql = mysql_fetch_array($sql)){
print "<a class=link_verde href=\"javascript:alterapedido('al_pedido_form.php?id=$ressql[0]&id_u=$ressql[1]');\">$ressql[0] - $ressql[2]</a><br>";
}
?></font></p>
          <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?print $corpo; ?></font></div>
        </blockquote>
        <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CopyLeft GNU: 2002<br>
        Magrini & Lyma.</font></div>
        <p>&nbsp;</p>
        </blockquote>
      </td>
  </tr>
</table>
</body>
</html>