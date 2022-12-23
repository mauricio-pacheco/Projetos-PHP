<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="65" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="61" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("menu.php"); ?></td>
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
                <td class="fontetabela5" align="right"><strong>Página Principal</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="140" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_produtos ORDER BY rand() LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="5"; //quantidade de colunas
$cont="1"; //contador

print"<table width=754 align=center>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nome = $array["nome"];
$valor = $array["valor"];
$valorp = $array["valorp"];
$valorpx = $array["valorpx"];
$valortratar = $array["valortratar"];
$departamento = $array["departamento"];
$subdep = $array["subdep"];
$foto = $array["foto"];



?>
                    <table width="140" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left"><a 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nome.""; ?>" 
                        src="administrador/ups/produtos/<?php echo $foto.""; ?>" 
                        border="0" width="140" height="105" /></a></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto96"><img src="imagens/branco.gif" width="1" height="2" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto96"><a class="manchete_texto96" 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><b><?php echo $nome.""; ?></b></a></td>
                      </tr>
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto96"><i>
                          <?php 	$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$departamento'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];  }
	
	?>
                        </i></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto96"><i><?php 	$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$subdep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];  }
	
	?>
                        </i></td>
                      </tr>
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto96"><?php if ($valor=='') { } else { ?>
                          <strong class="manchete_texto96preco">R$ <?php echo $valor.""; ?></strong> à vista <br />
                          <?php } ?>
                          <?php if ($valorpx=='' and $valorp=='') { } else { ?>
                          ou <strong><?php echo $valorpx.""; ?> x</strong> de <strong class="manchete_texto96preco">R$ <?php echo $valorp.""; ?></strong>
                          <?php } ?>
                          <br />
                          <?php if ($valorpx!='' and $valorp!='' and $valor!='') { } else { ?>
                          <b><?php echo $valortratar.""; ?></b>
                          <?php } ?></td>
                      </tr>
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                      </tr>
                    <tr>
                        <td><a 
                        href="carrinho.php?cod=<?php echo $id.""; ?>&amp;acao=incluir"><img alt="Adicionar <?php echo $nome.""; ?> ao carrinho de compras" title="Adicionar <?php echo $nome.""; ?> ao carrinho de compras" src="imagens/carrote.jpg" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                      </tr>
                      
                                           <tr>
                        <td><a 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><img alt="Mais detalhes de <?php echo $nome.""; ?>" title="Mais detalhes de <?php echo $nome.""; ?>" src="imagens/detalhes.jpg" width="121" height="28" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
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
print"</table>";
} else {
print"</table>";
}
?>
                    <?php


$sql_select_all = "SELECT * FROM cw_produtos ORDER BY id DESC";
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



?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
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