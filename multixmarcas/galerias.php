<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Galeria de Fotos</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><span class="fontetabela2">
                        <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=730>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$data = $array["data"];
$hora = $array["hora"];
$nomegaleria = $array["nomegaleria"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];
$contador = $array["contador"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                        </span>
                        <table width="156" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table border="1" bordercolor="#FFFFFF" width="170" height="130" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center" bordercolor="#EEEEEE" background="imagens/ddd.png"><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>"><img src="administrador/ups/galerias/<?php echo $foto.""; ?>" width="160" height="120" title="<?php echo $nomegaleria.""; ?>" alt="<?php echo $nomegaleria.""; ?>" border="0" /></a></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                          <tr>
                            <td class="manchete_texto96"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>" class="manchete_texto96"><em><b><?php echo $nomegaleria.""; ?></b></em></a></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                          <tr>
                            <td><em><span class="manchete_texto96">Publicação: <?php echo $data.""; ?><br />
                            </span></em></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                          <tr>
                            <td><em class="manchete_texto96">( <?php echo $contador.""; ?> Visualizações )</em></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                          <tr>
                            <td><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>" class="manchete_texto96"><img src="imagens/capacete.png" border="0" /></a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                        </table>
                        <span class="manchete_texto96">
                          <?php
print"</td>";

//se o cont for igual o número de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechará a tabela
if(!$cont==$colunas){
print"</tr></table>";
} else {
print"</table>";
}
?>
                        </span></td>
                    </tr>
                  </table>
                    <div align="center">
                      <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_galeria ORDER BY id DESC";
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
echo "<a href='galerias.php?p=1' target='_self' class=manchete_texto96>PRIMEIRA PÁGINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='galerias.php?p=".$i."' target='_self' class=manchete_texto96>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<span class=manchete_texto96>|</span> <span class=manchete_texto96><b>";
echo $p." ";
echo "</b></span> <span class=manchete_texto96>|</span>";

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
echo " <a href='galerias.php?p=".$i."&id=$id' target='_self' class=manchete_texto96>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='galerias.php?p=".$pags."&id=$id' target='_self' class=manchete_texto96>ÚLTIMA PÁGINA</a> ";


?>
                    </div></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
      </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>