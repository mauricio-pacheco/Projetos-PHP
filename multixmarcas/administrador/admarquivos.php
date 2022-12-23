<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR ARQUIVOS ANEXADOS POR <?php 
				  $idcliente = $_GET["idcliente"];
				  $cliente = $_GET["cliente"];
				  echo $cliente; ?></b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><span class="fontetabela2">
              <?php
include "conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC LIMIT $inicio, $qnt";

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
$arquivo = $array["arquivo"];
$legenda = $array["legenda"];
$idcliente = $array["idcliente"];
$data = $array["data"];
$hora = $array["hora"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
              </span>
              <table width="99%" border="0" align="center">
                <tr>
                  <td width="5%" class="fontetabela"><img src="../imagens/arquivo.png" width="33" height="32" /></td>
                  <td width="49%" class="fontetabela"><strong><?php echo $arquivo.""; ?></strong><br /><em>ARQUIVO CADASTRADO EM <?php echo $data.""; ?> - <?php echo $hora.""; ?></em></td>
                                    <td width="5%" class="manchete_texto9"><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="manchete_texto9"><img src="../imagens/down.png" border="0" /></a></td>
                  <td width="16%" class="manchete_texto9"><strong><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="manchete_texto4"><b>BAIXAR ARQUIVO</b></a></strong></td>
                  <td width="3%" class="manchete_texto9">&nbsp;</td>
                  <td width="5%" class="manchete_texto9"><a href="delarquivo.php?idcliente=<?php echo $idcliente.""; ?>&amp;id=<?php echo $id.""; ?>&amp;arquivo=<?php echo $arquivo.""; ?>&amp;usuario=<?php echo $usuario.""; ?>&amp;cliente=<?php echo $cliente.""; ?>" onclick="return confirm('Tem certeza que deseja apagar o arquivo ?')" class="manchete_texto9"><img src="../imagens/deletar.png" border="0" /></a></td>
                  <td width="17%" class="manchete_texto9"><strong><a href="delarquivo.php?idcliente=<?php echo $idcliente.""; ?>&amp;id=<?php echo $id.""; ?>&amp;arquivo=<?php echo $arquivo.""; ?>&amp;usuario=<?php echo $usuario.""; ?>&amp;cliente=<?php echo $cliente.""; ?>" onclick="return confirm('Tem certeza que deseja apagar o arquivo ?')" class="manchete_texto6">APAGAR ARQUIVO</a></strong></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="6" /></td>
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
              </span>
              <div align="center">
                <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 20;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='admarquivos.php?p=1&amp;idcliente=$idcliente&cliente=$cliente' target='_self' class=manchete_texto>PRIMEIRA PÁGINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='admarquivos.php?p=".$i."&amp;idcliente=$idcliente&cliente=$cliente' target='_self' class=manchete_texto>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<span class=manchete_texto96>|</span> <span class=manchete_texto><b>";
echo $p." ";
echo "</b></span> <span class=manchete_texto>|</span>";

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
echo " <a href='admarquivos.php?p=".$i."&amp;idcliente=$idcliente&cliente=$cliente' target='_self' class=manchete_texto>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='admarquivos.php?p=".$pags."&amp;idcliente=$idcliente&cliente=$cliente' target='_self' class=manchete_texto>ÚLTIMA PÁGINA</a> ";


?>
              </div></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>