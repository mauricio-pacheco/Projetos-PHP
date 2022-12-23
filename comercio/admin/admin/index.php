<?
include ("../padrao.php");
$path_local = "../padrao.php";
$nome = $site['admin'];
$senha = $site['senha'];
//verifica autenticação
//alterado para utilizar $_SERVER (superglobal)
if ($_SERVER['PHP_AUTH_USER'] !=$nome || $_SERVER['PHP_AUTH_PW']!=$senha) {
    header("WWW-Authenticate: Basic realm='Sistema de Autentificação PHPLojaFacil'");
    header("HTTP/1.0 401 Unauthorized");
    echo '<html>
    <head>
    <title>Acesso negado...</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="estilo.css">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <br><br> <a href="http://www.lymas.com.br"> Lymas.com.br </a><br><p> P&aacute;gina Protegida.<br><br>Clique no bot&atilde;o "Voltar" do seu navegador...</p></body>
    </html>';
    exit;
}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<html>
<head>
<title>Adminstra&ccedil;&atilde;o de Com&eacute;rcio Eletr&ocirc;nico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="estilo.css">
</head>
<Script LANGUAGE=JavaScript>
function abrejanela(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=450, height=230')
}
function alteraproduto(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no, location=no, status=no,scrollbars=yes, resizable=yes,width=500, height=550')
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
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"><?echo $nome?></font></b></font></div>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr bgcolor="#CCCCCC">

          <td width="50%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&Uacute;ltimos
            clientes que efetuaram cadastro</font></td>

          <td bgcolor="#666666" width="50%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF">&Uacute;ltimos
            produtos cadastrados</font></td>
          </tr>
          <tr bgcolor="#666666">
            <td valign="top" height="2">
              <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%">
                <tr bgcolor="#FFFFFF" valign="top">
                  <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
/// Se a categoria for maior de 0 tenta paginar Produtos
if ($cat_pai == "0"){
 $seleciona_produtos = mysql_query("SELECT * FROM clientes ORDER BY id DESC LIMIT 0,5");
$eu_sou = urlencode("$eu_sou");
 while ($res_sp = mysql_fetch_array($seleciona_produtos)){
$contem_img = explode(".",$res_sp[5]);
 print "<a class=link_verde href=javascript:alteraproduto('al_cliente_form.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br> :: $res_sp[2] ::</a><br>";
 }
}
?></font></td>
                </tr>
              </table>
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font></td>
            <td valign="top" height="2" bgcolor="#666666">
              <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%">
                <tr bgcolor="#FFFFFF" valign="top">
                  <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
/// Se a categoria for maior de 0 tenta paginar Produtos
if ($cat_pai == "0"){
 $seleciona_produtos = mysql_query("SELECT * FROM produto ORDER BY id DESC LIMIT 0,3");
$eu_sou = urlencode("$eu_sou");
 while ($res_sp = mysql_fetch_array($seleciona_produtos)){
$contem_img = explode(".",$res_sp[5]);
        if($contem_img[1] == "jpg"){
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?catpai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/icones/$res_sp[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"> :: $res_sp[2] ::</a><br>";
        } else {
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/imagens/semfoto.jpg\" border=\"0\" align=\"middle\"> :: $res_sp[2] ::</a><br>";
        }



 }
}
?></font></td>
                </tr>
              </table>

            </td>
          </tr>
        </table>

        <div align="left">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#CCCCCC">
              <td width="50%" bgcolor="#666666"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF">Destaques
                da p&aacute;gina principal</font></td>
              <td bgcolor="#CCCCCC" width="50%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Produtos
                com destaque</font></td>
            </tr>
            <tr bgcolor="#999999">
              <td valign="top" height="25" width="50%">
                <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%">
                  <tr bgcolor="#FFFFFF" valign="top">

                  <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
 $seleciona_destaques = mysql_query("SELECT * FROM destaques ORDER BY id DESC LIMIT 0,5");
$eu_sou = urlencode("$eu_sou");
 while ($res_sp = mysql_fetch_array($seleciona_destaques)){
 print "<a class=link_verde href=javascript:alteraproduto('al_destaque_form.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br> :: $res_sp[1] ::</a><br>";
}
?><br>
                    <br>
                    <a class=link_verde href="javascript:alteraproduto('ad_destaque_form.php?cat_pai=$cat_pai');">
                    <b>Crie um novo destaque</b></a></font></td>
                  </tr>
                </table>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font></td>
              <td valign="top" height="25" bgcolor="#666666" width="50%">
                <table width="100%" border="0" cellspacing="1" cellpadding="1" height="100%">
                  <tr bgcolor="#FFFFFF" valign="top">
                    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
/// Se a categoria for maior de 0 tenta paginar Produtos
if ($cat_pai == "0"){
 $seleciona_produtos = mysql_query("SELECT * FROM produto WHERE promo > 0 ORDER BY id DESC");
$eu_sou = urlencode("$eu_sou");
 while ($res_sp = mysql_fetch_array($seleciona_produtos)){
$contem_img = explode(".",$res_sp[5]);
        if($contem_img[1] == "jpg"){
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/icones/$res_sp[5]\" border=\"0\" align=\"middle\"  width=\"50\" height=\"50\"> :: $res_sp[2] ::</a><br>";
        } else {
 print "<a class=link_verde href=javascript:alteraproduto('al_produtos.php?cat_pai=$cat_pai&categoria_pai=$eu_sou&id=$res_sp[0]');><br><img src=\"$base[url]/imagens/semfoto.jpg\" border=\"0\" align=\"middle\"> :: $res_sp[2] ::</a><br>";
        }



 }
}
?></font></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      <div align="center">
        <p align="left">&nbsp;</p>
      </div>
    </td>
  </tr>
</table>
</body>
</html>
