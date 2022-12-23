<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Spazio Club</TITLE>
<META content="Palavras, Chave" 
name=title>
<META content="Fotos, Shows, Festas, Raves e Baladas." name=subject>
<META content=general name=rating>
<META content="5 days" name=revisit-after>
<META content=pt-br name=language>
<META content="index, follow" name=robots>
<META content="index, follow" name=googlebot>
<META content=all name=audience>
<META content=magee name=DC.title>
<META content=Completed name=doc-class>
<META content="Mandry" name=author>
<META http-equiv=Pragma content=no-cache>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
rev=stylesheet media=screen href="index_arquivos/screen.css" type=text/css 
charset=utf-8 rel=stylesheet><LINK rev=stylesheet media=screen 
href="index_arquivos/home.css" type=text/css charset=utf-8 rel=stylesheet>
<SCRIPT src="index_arquivos/flash.js" type=text/javascript 
charset=utf-8></SCRIPT>
<META content="MSHTML 6.00.6000.16705" name=GENERATOR>
<style type="text/css">
<!--
.style1 {font-size: 11px}
.style22 {color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style19 {color: #FFFFFF; font-size: 14px; }
.style24 {color: #FEDC01}
.style25 {color: #FFFFFF}
.style26 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style28 {	font-size: 10px;
	color: #FFFFFF;
}
.style29 {font-size: 10px}
.style30 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style31 {color: #FFCC33}
.style33 {color: #0099FF}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY><div align="center">
<DIV id=wrapper>
<DIV id=globalnav>
<DIV id=globalnav-content>
<DIV id=logo style="MARGIN: -7px 0px 0px 15px"><?php include("imagem.php"); ?></DIV>
<DIV id=dynamic-title>
<H1 align="center"><img src="logospazio.png"></H1>
</DIV>
<DIV id=options>
<?php include("menu1.php"); ?></DIV></DIV></DIV>
<DIV id=menu align="center">
<?php include("menu2.php"); ?></DIV>
<DIV id=content>
  <table width="743" border="0" align="center">
    <tr>
      <td bgcolor="#272523"><table width="723" border="0" align="center">
          <tr>
            <td bgcolor="#000000"><table width="100%" border="0" align="center">
              <tr>
                <td><div align="center"><img src="nottitulo.jpg" width="440" height="46"></div></td>
              </tr>
              <tr>
                <td><table width="99%" border="0" align="center" bgcolor="#000000">
                  <tr>
                    <td background="imagens/fundo.jpg">
                      <table width="100%" border="0" align="center">
                        <tr>
                          <td><?php
include "../conexao.php";
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
$sql_select = "SELECT * FROM noticias ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$assunto = $array["assunto"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                              <table width="100%" border="0" align="center">
                                <tr >
                                  <td width="26%"><table width="100%" border="0">
                                      <tr>
                                        <td><span class="style22"><a href="vernoticia.php?id=<?php echo $id.""; ?>"><img src="../imagens/new.png" border="0"/>&nbsp;<?php echo $assunto.""; ?></a></span></td>
                                      </tr>
                                      <tr>
                                        <td class="style22"><a href="vernoticia.php?id=<?php echo $id.""; ?>"><img src="../imagens/lendario.png" border="0"/></a>&nbsp;Data da Postagem: &nbsp;<a href="vernoticia.php?id=<?php echo $id.""; ?>" class="style25"><?php echo $data.""; ?> - <?php echo $hora.""; ?> </a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                              </table>                            </td>
                        </tr>
                      </table>
                      <p align="center"><span class="style22">
                        <?




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM noticias ORDER BY id DESC";
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
echo "<a href='noticias.php?p=1' target='_self'><font size='1'>Primeira p&aacute;gina</font></a> <font color='#ffffff' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='noticias.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<font color='#ffffff' size='1'>";
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
echo "<a href='noticias.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#ffffff' size='1'>-</font> <a href='noticias.php?p=".$pags."' target='_self'><font size='1'>&Uacute;ltima p&aacute;gina</font></a> ";
?>
                      </span><br><br></p></td>
                  </tr>
                </table> 
                  </td>
              </tr>
              <tr>
                <td><div align="center"><img src="blank.gif" width="1" height="8"></div></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
</DIV>
<SCRIPT src="index_arquivos/0300.js" type=text/javascript> </SCRIPT>
<!-- globalfooter --><BR class=clear-both>
<?php include("patrocinadores.php"); ?>
<?php include("baixo.php"); ?></DIV>
</div></BODY></HTML>
