<?php include("meta.php"); ?>
<table width="100%" height="158" background="imagens/cabecalho.png" border="0" cellspacing="0" cellpadding="0">
<tr></tr>
<tr>
  <td valign="top"><table width="100%" background="imagens/fundotabela.jpg" height="120" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top"><?php include("cima.php"); ?></td>
    </tr>
  </table>
    <?php include("menu.php"); ?></td>
</tr>
</table>
<table width="1000" align="center" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="1000" border="0" background="imagens/fundogeral2.png" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="996" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%" valign="top"><table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="fontetitulon">Resultados da Busca</td>
          </tr>
        </table>
        <table width="98%" bgcolor="#000000" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="6" /></td>
          </tr>
        </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td> <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];
$palavra = $_POST["palavra"];
$iddep = $_POST["iddep"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 1243432;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_produtos WHERE nome LIKE '%".$palavra."%' AND departamento='$iddep' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="5"; //quantidade de colunas
$cont="1"; //contador

print"<table width=980>";


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
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left"><a 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nome.""; ?>" 
                        src="administrador/ups/produtos/<?php echo $foto.""; ?>" 
                        border="0" width="180" height="135" /></a></td>
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
                          -
                          <?php 	$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$subdep'");
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
                        href="verproduto.php?id=<?php echo $id.""; ?>"><img alt="Mais detalhes de <?php echo $nome.""; ?>" title="Mais detalhes de <?php echo $nome.""; ?>" src="imagens/detalhe.png" border="0" /></a></td>
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
                   </td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>