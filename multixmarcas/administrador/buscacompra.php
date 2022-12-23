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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR COMPRAS</b></font></td>
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
            <td>
            <form name="formbusca" method="post" action="buscacompra.php">
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="fonteadm"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25%">&nbsp;SELECIONE A DATA DAS COMPRAS:</td>
                    <td width="4%"><strong>DIA:</strong></td>
                    <td width="7%"><select name="dia" class="fontetabela" >
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select></td>
                    <td width="4%"><strong>MÊS:</strong></td>
                    <td width="7%"><select name="mes" class="fontetabela" >
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select></td>
                    <td width="4%"><strong>ANO:</strong></td>
                    <td width="8%"><select name="ano" class="fontetabela">
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                    </select></td>
                    <td width="10%"><input name="button" type="submit" class="fontetabela"  value="PESQUISAR" /></td>
                    <td width="31%" align="right" class="fontetabela">Compras do Dia: <b><?php 
					$dia = $_POST["dia"];
					$mes = $_POST["mes"];
					$ano = $_POST["ano"];
					
					$data = "$dia/$mes/$ano"; echo $data; ?></b>&nbsp;</td>
                  </tr>
                </table>                  </td>
              </tr>
            </table></form></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table>
          <?php
include "conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 16;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_compras WHERE data LIKE '%".$data."%' ORDER BY id DESC LIMIT $inicio, $qnt";

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
$idcliente = $array["idcliente"];
$status = $array["status"];
$carrinho = $array["carrinho"];
$data = $array["data"];
$hora = $array["hora"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="8" /></td>
            </tr>
          </table>
          
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="5%"><img src="imagens/cesta.png" width="33" height="32" /></td>
              <td width="52%" class="fontemenu2"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;Compra Efetuada por <b>
                    <?php
			  $sql = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' LIMIT 1");
 while($y = mysql_fetch_array($sql))
{
	echo $y["cliente"];
}
			  ?>
                  </b></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
                <tr>
                  <td>&nbsp;Status da Compra: <b><font color="#006699"><?php echo $status; ?></font></b></td>
                </tr>
              </table></td>
              <td width="24%" class="fontemenu2"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="14%"><a href="detalhecompra.php?id=<?php echo $id.""; ?>&amp;idcliente=<?php echo $idcliente.""; ?>&amp;data=<?php echo $data.""; ?>&amp;hora=<?php echo $hora.""; ?>" class="manchete_texto9"><img src="imagens/detalhes.png" border="0" /></a></td>
                  <td width="86%" class="manchete_texto4"><strong>&nbsp;<a href="detalhecompra.php?id=<?php echo $id.""; ?>&amp;idcliente=<?php echo $idcliente.""; ?>&amp;data=<?php echo $data.""; ?>&amp;hora=<?php echo $hora.""; ?>&amp;carrinho=<?php echo $carrinho.""; ?>" class="manchete_texto4"><b>DETALHES DA COMPRA</b></a></strong></td>
                </tr>
              </table></td>
              <td width="19%" class="fontemenu2"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="14%"><a href="deletacompra.php?id=<?php echo $id.""; ?>&amp;carrinho=<?php echo $carrinho.""; ?>" onclick="return confirm('Tem certeza que deseja apagar a compra ?')" class="manchete_texto9"><img src="imagens/xis.png" border="0" /></a></td>
                  <td width="86%" class="manchete_texto4"><strong>&nbsp;<a href="deletacompra.php?id=<?php echo $id.""; ?>&amp;carrinho=<?php echo $carrinho.""; ?>" onclick="return confirm('Tem certeza que deseja apagar a compra ?')" class="manchete_texto4"><b>APAGAR COMPRA</b></a></strong></td>
                </tr>
              </table></td>
            </tr>
        </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="8" /></td>
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
$sql_select_all = "SELECT * FROM cw_compras WHERE data LIKE '%".$data."%' ORDER BY id DESC";
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
echo "<a href='compras.php?p=1' target='_self' class=manchete_texto><b>PRIMEIRA P&Aacute;GINA</b></a>&nbsp;&nbsp; ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='compras.php?p=".$i."' target='_self' class=manchete_texto>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "| <span class=manchete_texto><b>";
echo $p." ";
echo "</b></span> |";

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
echo " <a href='compras.php?p=".$i."' target='_self' class=manchete_texto>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='compras.php?p=".$pags."' target='_self' class=manchete_texto><b>&Uacute;LTIMA P&Aacute;GINA</b></a> ";


?>
            </div>
          
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