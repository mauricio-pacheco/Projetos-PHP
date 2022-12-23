<?php include("meta.php"); ?>
<table width="100%" height="121" background="imagens/fundocima.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="947" border="0" height="121" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" align="center"><img src="imagens/titulo.png" width="940" height="106" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="947" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" valign="top">
       <?php include("menu.php"); ?>
        </td>
        <td width="77%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" height="42" background="imagens/barramenu.png" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetitulo">&nbsp;&nbsp;<font color="#FFFFFF">Fotos</font></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" bgcolor="#FFFFFF" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" align="center" class="fonte">
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

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=696>";


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
                                    <td class="fonte"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>" class="fonte"><em><b><?php echo $nomegaleria.""; ?></b></em></a></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                  </tr>
                                  <tr>
                                    <td><em>Publica&ccedil;&atilde;o: <?php echo $data.""; ?><br />
                                    </em></td>
                                  </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                  </tr>
                                  <tr>
                                    <td><em class="fonte">( <?php echo $contador.""; ?> Visualiza&ccedil;&otilde;es )</em></td>
                                  </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                  </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                  </tr>
                                </table>
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
?></td>
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
echo "<a href='fotos.php?p=1' target='_self' class=fonte>PRIMEIRA P&Aacute;GINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='fotos.php?p=".$i."' target='_self' class=fonte>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<span class=fonte>|</span> <span class=fonte><b>";
echo $p." ";
echo "</b></span> <span class=fonte>|</span>";

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
echo " <a href='fotos.php?p=".$i."&id=$id' target='_self' class=fonte>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='fotos.php?p=".$pags."&id=$id' target='_self' class=fonte>&Uacute;LTIMA P&Aacute;GINA</a> ";


?>
                            </div></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/barrabaixo.png" width="702" height="5" /></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="16" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>