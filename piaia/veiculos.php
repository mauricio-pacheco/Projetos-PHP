<?php include("meta.php"); ?>

<body topmargin="0" leftmargin="0">
<table width="980" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','160'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("busca.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 24;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_veiculos ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="6"; //quantidade de colunas
$cont="1"; //contador

print"<table width=938  align=center>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$veiculo = $array["veiculo"];
$valorvista = $array["valorvista"];
$valorprazo = $array["valorprazo"];
$descricao = $array["descricao"];
$foto = $array["foto"];
$data = $array["data"];
$hora = $array["hora"];
$prazo = $array["prazo"];

?>
                <table width="100%" border="0">
                  <tr>
                    <td class="pontilhada" align="center"><a href="veiculo.php?id=<?php echo $id.""; ?>"><img src="administrador/veiculos/<?php echo $foto.""; ?>" width="145" height="109" title="<?php echo $veiculo.""; ?>" alt="<?php echo $veiculo.""; ?>" border="0" /></a></td>
                  </tr>
                  <tr>
                    <td class="fontetabela"><b><?php echo $veiculo.""; ?></b></td>
                  </tr>
                  <tr>
                    <td><?php if ($valorvista == 'R$ ' and $valorprazo == 'R$ ') { } else {  ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="2%"><img src="imagens/money.png" /></td>
                          <td width="98%" class="fontegrana"><table width="99%" border="0">
                            <tr>
                              <td class="fontetabela"><b><?php echo $valorvista.""; ?></b> ou em <b><?php echo $prazo.""; ?></b> X de <b><?php echo $valorprazo.""; ?></b></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><a href="veiculo.php?id=<?php echo $id.""; ?>"><img src="administrador/imagens/detalhes.png" border="0" title="Mais Detalhes..." alt="Mais Detalhes..." /></a></td>
                        </tr>
                      </table></td>
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
?>
                <div align="center" class="fonteadm">
                  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_veiculos";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 12;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='veiculos.php?p=1' target='_self' class=fonteadm>PRIMEIRA PÁGINA</a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='veiculos.php?p=".$i."' target='_self' class=fonteadm>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<b>";
echo $p." ";
echo "</b>";


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
echo "<a href='veiculos.php?p=".$i."' target='_self' class=fonteadm>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='veiculos.php?p=".$pags."' target='_self' class=fonteadm>ÚLTIMA PÁGINA</a> ";


?>
                </div></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>