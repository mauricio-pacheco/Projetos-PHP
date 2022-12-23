<?
include ("../padrao.php");
$path_local = "../padrao.php";
//verifica autenticação
if (!$PHP_AUTH_USER && !$PHP_AUTH_PW) {
header("Location: index.php");
exit;
}
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
function abrejanela(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=450, height=230')
}
function alteraproduto(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbars=yes, resizable=yes,width=450, height=500')
}
</Script>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            <? print "$base[nome]"; ?></font></b></font></td>
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
    <td bgcolor="<? print "$sub_barra";?>" width="20%" height="20%" valign="top">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
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
    <td width="80%" height="80%" valign="top" align="center">
      <div align="center">
        <p align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
          <?
if ($imagem_cat){
print "<img src=\"$base[url]/icones/$imagem_cat\">";
}
?> </font></p>
        <p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">[<a href="javascript:abrejanela('ad_sub_categoria.php?cat_pai=0&amp;categoria_pai=<? print $eu_sou?>');">Adicionar
          Categoria MASTER</a>]<br>
          [<a href="javascript:abrejanela('ad_sub_categoria.php?cat_pai=<? print $cat_pai;?>&amp;categoria_pai=<? print $eu_sou?>');">Adicionar
          Sub-Categoria</a>]<br>
          [<a href="javascript:alteraproduto('ad_produtos.php?cat_pai=<? print $cat_pai;?>&amp;categoria_pai=<? print $eu_sou?>');">Adicionar
          um produto a esta Categoria</a>]<br>
          [<a href="javascript:abrejanela('rm_sub_categoria.php?cat_pai=<? print $cat_pai;?>&amp;categoria_pai=<? print $eu_sou?>');">Remover
          Esta Categoria</a>]</font></p>
        <p align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          Altera&ccedil;&otilde;es da Categoria <? print "<a href=\"javascript:abrejanela('al_sub_categoria.php?cat_pai=$cat_pai&categoria_pai=$eu_sou');\">$eu_sou</a>"; ?>:</font><br>
        </p>
      </div>
      <blockquote>
        <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<?
/// Se a categoria for maior de 0 tenta paginar Produtos
if ($cat_pai > "0"){
 $seleciona_produtos = mysql_query("SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai AND p.id = pc.cod_produto ORDER BY nome_produto ASC LIMIT $inicio,$max");
$eu_sou = urlencode("$eu_sou");
 while ($res_sp = mysql_fetch_array($seleciona_produtos)){
$contem_img = explode(".",$res_sp[5]);
        if($contem_img[1] == "jpg"){
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/icones/$res_sp[5]\" border=\"0\" align=\"middle\" width=50 height=50> :: $res_sp[2] ::</a> <a class=\"link_verde\" href=\"javascript:alteraproduto('rm_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');\">Remover Produto ::></a><br>";
        } else {
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/imagens/semfoto.jpg\" border=\"0\" align=\"middle\"> :: $res_sp[2] ::</a> <a class=\"link_verde\" href=\"javascript:alteraproduto('rm_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');\">Remover Produto ::></a><br>";
        }
 }
}
?></font></div>
      </blockquote>
      <div align="center">
        <p><?print $corpo; ?></p>
      <p><br><br><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CopyLeft GNU: 2002<br>
        Magrini & Lyma.</font></div></p>
          </div>
    </td>
  </tr>
</table>


</body>
</html>
