<?php include("meta.php"); ?>
<?php include("head.php"); ?>
<BODY class="auto fs3" id=bd>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
    <TR>
      <TD>
     <?php include("cabecalho.php"); ?>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center>
        <TBODY>
          <TR>
            <TD bgColor=#ffffff align=middle>
             <?php include("cima.php"); ?></TD>
          </TR>
        </TBODY>
      </TABLE>
      <?php include("menu.php"); ?>
        <TABLE id=tabela border=0 cellSpacing=0 cellPadding=0 width=760 
      align=center>
          <TBODY>
            <TR>
              <TD id=header_td bgColor=#ffffff colSpan=2><?php include("banner.php"); ?></TD>
            </TR>
            <TR>
              <TD bgColor=#ffffff height=8 colSpan=2></TD>
            </TR>
            <TR>
              <TD background="imagens/fundotabela.jpg" vAlign=top width=200><?php include("esquerdo.php"); ?> <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" id=main_td 
          bgColor=#ffffff vAlign=top width=544><DIV id=div-main>
                <CENTER>
                  <DIV style="Z-INDEX: 666" id=flash1>
                    <table background="imagens/barra1.jpg" height="40" width="100%" border="0">
                      <tr>
                        <td class="manchete_texto"><b>Galeria de Fotos</b></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0">
                              <tr>
                                <td width="50%"><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 10;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM gestao_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=520>";

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];
$data = $array["data"];
$hora = $array["hora"];
// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                                  <table width="100%" border="0">
                                    <tr>
                                      <td width="7%" valign="top" align="center"><table width="100%" border="0">
                                        <tr>
                                          <td align="left" valign="top"><div align="center"><a href="vergaleria.php?id=<?php echo $id.""; ?>"><img src="administrador/galerias/<?php echo $foto.""; ?>" border="1" alt="VISUALIZAR GALERIA" title="VISUALIZAR GALERIA"></a></div></td>
                                        </tr>
                                        <tr>
                                          <td width="99%" align="left" valign="top"><div align="center"><a href="vergaleria.php?id=<?php echo $id.""; ?>" class="manchete_texto5"><b><?php echo $nomegaleria.""; ?></b></a><br><span class="manchete_texto">
                                            Data de Publica&ccedil;&atilde;o:<br>
                                            <font color="#005CA2"><?php echo $data.""; ?> - ( <?php echo $hora.""; ?> Hs )</font></span>
                                            <table width="90" border="0">
                                              <tr>
                                                <td width="5%"><img src="imagens/cam.gif"></td>
                                                <td width="95%"><font size="1" class="manchete_texto">
                                                  <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM gestao_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                                  
                                                  <?php
  echo ''. $total;
 ?>
                                                  Fotos</font></td>
                                                </tr>
                                            </table>
                                          </div></td>
                                        </tr>
                                      </table></td>
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
print"</tr></table>";
} else {
print"</table>";
}
?></td>
                              </tr>
                            </table>
                              <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM gestao_galeria";
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
echo "<a href='galeria.php?p=1' target='_self' class=manchete_texto4>PRIMEIRA P&Aacute;GINA</a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='galeria.php?p=".$i."' target='_self' class=manchete_texto4>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo $p." ";

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
echo "<a href='galeria.php?p=".$i."' target='_self' class=manchete_texto4>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='galeria.php?p=".$pags."' target='_self' class=manchete_texto4>&Uacute;LTIMA P&Aacute;GINA</a> ";


?></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    
                    
                    
                  </DIV>
                </CENTER>
              </DIV></TD>
            </TR>
        </TABLE></TD>
      <TD width=1>&nbsp;</TD>
      <TD vAlign=top></TD>
    </TR>
  </TBODY>
</TABLE>
<DIV id=barra_login>
<DIV style="BACKGROUND-COLOR: #FF7800" id=cabecalho2>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=740 align=center>
  <TBODY>
  <TR>
    
    <TD vAlign=center width=408 align=left>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=467>
        <TBODY>
        <TR>
          <TD vAlign=center width=202 align=left>&nbsp;</TD>
          <TD vAlign=center width=180 align=left>&nbsp;</TD>
          <TD vAlign=center width=85 align=left>&nbsp;</TD></TR></TBODY></TABLE></TD>
<TD vAlign=center width=332 align=right>&nbsp;</TD></TR></TBODY></TABLE></DIV></DIV>
<DIV id=bottom>
  <table width="100%" height="120" border="0" align="center" background="imagens/baixo.gif">
    <tr>
      <td valign="top"><?php include("rodape.php"); ?></td>
    </tr>
  </table>
<DIV style="BACKGROUND-COLOR: #FF7800"></DIV></DIV>
<SCRIPT type=text/javascript>
    <!--
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    -->	
    </SCRIPT>

<SCRIPT type=text/javascript>
    <!--
        try {
            var pageTracker = _gat._getTracker("UA-5629445-1");
            pageTracker._trackPageview();
        } catch(err) {}
    -->
    </SCRIPT>
</BODY></HTML>