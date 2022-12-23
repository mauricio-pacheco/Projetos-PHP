<?php include("meta.php"); ?>
<table width="968" height="700" class="boxSombra" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><?php include("cima.php"); ?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" bgcolor="#B30000"><SCRIPT src="classes/carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("flash/menu.swf","968","60"); 
    </SCRIPT></td>
        </tr>
      </table>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="5" /></td>
        </tr>
    </table>
      <table width="99%" height="600" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="220" valign="top"><?php include("menu.php"); ?></td>
              <td width="748" valign="top"><table width="99%" height="28" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetitulo" align="right">Lojas Região Nordeste</td>
                </tr>
              </table>
                
              <table width="99%" border="0" bgcolor="#E9E9E9" align="center" cellpadding="0" cellspacing="0">
                <tr>
          <td><img src="imagens/branco.gif" width="1" height="1" /></td>
        </tr>
    </table>
    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
                </table>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="98%" border="0" align="right">
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

$qnt = 340;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_reps WHERE estado='MA - Maranhão' OR estado='PI - Piauí' OR estado='BA - Bahia' OR estado='SE - Sergipe' OR estado='AL - Alagoas' OR estado='PE - Pernambuco' OR estado='PB - Paraíba' OR estado='RN - Rio Grande do Norte' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=730>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nome = $array["nome"];
$descricao = $array["descricao"];
$estado = $array["estado"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                            </span>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="16%"><a href="<?php echo $link.""; ?>" target="_blank"><img src="administrador/imagens/altof.png" title="<?php echo $nome.""; ?>" alt="<?php echo $nome.""; ?>" border="0" /></a></td>
                                <td width="84%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                  </tr>
                                  <tr>
                                    <td class="fonte"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td><a href="<?php echo $link.""; ?>" class="fonte" target="_blank"><b><?php echo $nome.""; ?></b></a></td>
                                      </tr>
                                      <tr>
                                        <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                      </tr>
                                      <tr>
                                        <td><?php echo $estado.""; ?></td>
                                      </tr>
                                      <tr>
                                        <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                      </tr>
                                      <tr>
                                        <td><?php echo $descricao.""; ?></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="10" /></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            <span class="fontesub">
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
                        <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_lojas ORDER BY id DESC";
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
//echo "<a href='sul.php?p=1' target='_self' class=fontesub>PRIMEIRA PÁGINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
//echo "| <a href='sul.php?p=".$i."' target='_self' class=fontesub>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

//echo "<span class=fontesub>|</span> <span class=fontesub><b>";
//echo $p." ";
//echo "</b></span> <span class=fontesub>|</span>";

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
//echo " <a href='sul.php?p=".$i."&id=$id' target='_self' class=fontesub>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
//echo "&nbsp;&nbsp;<a href='sul.php?p=".$pags."&id=$id' target='_self' class=fontesub>ÚLTIMA PÁGINA</a> ";


?></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="10" /></td>
                </tr>
              </table>
              </td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
    </table>
      <table width="90%" border="0" bgcolor="#E9E9E9" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="1" /></td>
        </tr>
      </table>
     <?php include("rodape.php"); ?></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>