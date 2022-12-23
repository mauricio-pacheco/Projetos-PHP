<?/*
************************************************************************
    PHPLojaFacil 0.1.5 - Comércio Eletrônico em PHP
    Copyright (C) 2003  João Lyma e Paulo Magrini

    Este programa é software livre; você pode redistribuí-lo e/ou
    modificá-lo sob os termos da Licença Pública Geral GNU, conforme
    publicada pela Free Software Foundation; tanto a versão 2 da
    Licença como (a seu critério) qualquer versão mais nova.

    Este programa é distribuído na expectativa de ser útil, mas SEM
    QUALQUER GARANTIA; sem mesmo a garantia implícita de
    COMERCIALIZAÇÃO ou de ADEQUAÇÃO A QUALQUER PROPÓSITO EM
    PARTICULAR. Consulte a Licença Pública Geral GNU para obter mais
    detalhes.

    Você deve ter recebido uma cópia da Licença Pública Geral GNU
    junto com este programa; se não, escreva para a Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
    02111-1307, USA.
************************************************************************
*/
?>
<?
include("index.lib.php");
?>
<html>
<head>
<title> <? echo $base['nome']; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<Script LANGUAGE=JavaScript>
function abrejanela(link){
window.open(link,'Janela', 'top=0,left=0,toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=450, height=230')
}
function voucomprar(link){
window.open('comprar.php?tipo_frete=' + link.form.elements['tipo_frete'].value ,'Janela', 'top=0,left=0, resizable=yes, toolbar=no, location=no, status=no, scrollbars=yes, width=550, height=550')
}
function alteraproduto(link){
window.open(link,'Janela', 'top=0,left=0,scrollbars=yes,resizable=yes,width=450,height=400')
}
function recarregacarrinho(link){
var sele = link.form.elements['tipo_frete'].value;
if (sele == "motoboy")
window.location.href = "?tipo_frete=motoboy&cat_pai=1&pagina=carrinho&atualizar=sim";
if (sele == "convencional")
window.location.href = "?tipo_frete=convencional&cat_pai=1&pagina=carrinho&atualizar=sim";
else if (sele == "cobrar")
window.location.href = "?tipo_frete=cobrar&cat_pai=1&pagina=carrinho&atualizar=sim";
}
</Script>
<link rel="stylesheet" href="libs/admin/estilo.css">
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/logo.gif" width="700" height="65" usemap="#Map" border="0"><map name="Map"><area shape="rect" coords="228,5,295,18" href="./"><area shape="rect" coords="303,5,371,18" href="?cat_pai=1&amp;pagina=downloads"><area shape="rect" coords="377,5,446,17" href="?cat_pai=1"><area shape="rect" coords="454,6,522,19" href="?cat_pai=1&amp;pagina=login"><area shape="rect" coords="528,6,594,19" href="?cat_pai=1&amp;pagina=carrinho"></map></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="450">
  <tr>
    <td width="1%" background="imagens/b_e.gif">&nbsp;</td>
    <td width="99%" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#000000">
          <td><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">::
            <? echo $base['nome']; ?> ::</font></td>
          <td>
            <div align="right"><font color="#FF6633" size="1" face="Verdana, Arial, Helvetica, sans-serif">::
<?
if(!$nome_usuario){
print "Seja bem vindo VISITANTE - <a class=branco href=\"?cadastro=sim\">Faça aqui seu CADASTRO!!!</a>";
} else {
print "<a href=\"?cat_pai=1&pagina=logout\">";
print "$nome_usuario</a> &nbsp;";
}
?>

</font></div>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="450">
        <tr>
          <td width="16%" valign="top" bgcolor="#006699">

			<?
			//Classe que monta o menu.
			 $categ = new categorias;
			 $categ->menucategorias(0);
			?>

			<br>
            <table width="98%" border="0" cellspacing="1" cellpadding="0" bgcolor="<? print "$borda"; ?>" align="center">
              <tr bgcolor="<? print "$sub_barra";?>">
                <td>
                  <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#000000">::ENQUETE::</font></b></font></div>
                </td>
              </tr>
              <tr bgcolor="<? print "$sub_corpo";?>">
                <td><?
// Sem o $id_enquete o sistema pega a última enquete cadastrada e exibe. ;)
//$id_enquete = "1";
//
include "enquete.php";
print " <font face=verdana size=1 color=black><b>$descricao_enq</b></font>";
print $corpo_enquete;
?>
                  <div align="center"></div>
                </td>
              </tr>
            </table>
            <form method="post" action="index.php?setor=boletim" name="form2">
              <table width="98%" border="0" cellspacing="0" cellpadding="0" bgcolor="<? print "$borda"; ?>" align="center">
                <tr>
                  <td>
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                      <tr bgcolor="<? print "$sub_barra";?>">
                        <td>
                          <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#000000">::NOVIDADES::</font></b></font></div>
                        </td>
                      </tr>
                      <tr bgcolor="<? print "$sub_corpo";?>">
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">Receba nosso boletim com as novidade sobre nossos produtos e serviços.<br>
							<input type="text" name="nome" value="Seu nome" size="10">
							<input type="text" name="email" value="Seu e-mail" size="10">
							<input type="submit" name="Submit" value="OK" class="fundo_azul_caixa">
                          </font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </form>
            <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
            </font></td>
          <td width="84%" valign="top">
            <div align="center">
              <p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?
if ($pagina){
    if ($pagina == "logout"){
   			print "<Script LANGUAGE=JavaScript>";
			print "window.open('logout.php','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=10, height=10')";
			print "</Script>";
    }
include "$pagina.php";
exit;
}
?> </font></p>
              <table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
$path_local = "libs/padrao.php";
include "libs/db.php";
if (!$cat_pai2){
$cat_pai2 = "0";
}
$seleciona_categorias2 = mysql_query("SELECT * FROM categorias WHERE pertence_categoria = $cat_pai2 ORDER BY descri_categoria;");
$conta_cat = 0;
while ($res_sc2 = mysql_fetch_array($seleciona_categorias2)){
$conta_cat = $conta_cat + 1;
if ($conta_cat == "5"){
$conta_cat = 1;
$abre = "<tr><td align=\"center\">";
$fecha = "</tr></td>";
}
else {
$abre = "<td align=\"center\">";
$fecha = "</td>";
}
$eusou1 = urlencode("$res_sc2[1]");
$categorias_corpo2 .= "$abre<a class=link_verde href=index.php?cat_pai=$res_sc2[0]&eu_sou=$eusou1><img src=\"icones/$res_sc2[3]\" border=\"0\" width=\"50\" height=\"50\"><br>$res_sc2[1]</a>$fecha";
}
$categorias_corpo2 .= "</font>";
print "<font face=verdana size=1 color=white><p align=\"center\"><center>$categorias_corpo2</center></p>";
?></font></div>
                </tr>
              </table>
              <div align="left">
                <p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
if (!$conta_cat){
print "<a class=link_verde href=\"index.php?cat_pai=1\"><img src=\"imagens/continua_comp.gif\" border=0><br>CONTINUAR COMPRANDO</a>";
}
?></font></p>
                <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?
/// Se a categoria for maior de 0 tenta paginar Produtos
if ($cat_pai > "0" AND $pagina == ""){
$seleciona_produtos = mysql_query("SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai2 AND p.id = pc.cod_produto ORDER BY nome_produto ASC LIMIT $inicio,$max");
$eu_sou2 = urlencode("$eu_sou");
$contador_res_sp = "0";
while ($res_sp = mysql_fetch_array($seleciona_produtos)){
if ($res_sp AND $contador_res_sp == "0"){
$contador_res_sp = "1";
print "<blockquote><hr noshade><br><font color=#FF0000 size=2><b>$eu_sou:</b><br><br></font>";
}
$contem_img = explode(".",$res_sp[5]);
        if($contem_img[1] == "jpg"){
         print "<a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp[0]');><br><img src=\"$base[url]/icones/$res_sp[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"> :: $res_sp[2]<br> <img src=\"imagens/comprar.jpg\" border=0></a><br>";
        } else {
         print "<a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"> :: $res_sp[2]<br><img src=\"imagens/comprar.jpg\" border=0></a><br>";
        }


 }
print "<hr noshade></blockquote>";
}
?></font><br>
                </p>
              </div>
              <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                </font></div>
            </div>
            <blockquote><?
if ($corpo){
print "$corpo";
}
?></blockquote>

          </td>
        </tr>
      </table>

    </td>
  </tr>
</table>
<br>
</body>
</html>
