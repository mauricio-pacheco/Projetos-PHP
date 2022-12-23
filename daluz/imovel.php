<?php include("meta.php"); ?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="10" /></td>  
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table bgcolor="#C8CACC" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table bgcolor="#FFFFFF" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" valign="top" background="imagens/tabela.png"><table class="manchete_texto9" width="208" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            <td><?php include("esquerdo.php"); ?></td>
          </tr>
        </table></td>
        <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
        </table>
          <table height="28" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="3%" class="manchete_texto9m"><img src="imagens/casa.png" /></td>
            <td width="97%" class="manchete_texto9m">&nbsp;<strong><em><strong><em><span class="manchete_textoalto"><i><strong>
              <?php
						$idsub = $_GET["idsub"];
$iddep = $_GET["iddep"];
						
						 	$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];  }
	
	?>
-
<?php 	$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$idsub'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];  }
	
	?>
            </strong></i></span></em></strong></em></strong></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
          </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                    </tr>
                  </table>
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

$sql_select = "SELECT * FROM cw_produtos WHERE departamento='$iddep' AND subdep='$idsub' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=740 align=center>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top align=center>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nome = $array["nome"];
$valor = $array["valor"];
$valorpx = $array["valorpx"];
$valorp = $array["valorp"];
$valortratar = $array["valortratar"];
$tipo = $array["tipo"];
$departamento = $array["departamento"];
$subdep = $array["subdep"];
$foto = $array["foto"];



?>
                    <table border="0" class="boxSombra">
                      <tr>
                        <td align="center"><a 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nome.""; ?>" title="<?php echo $nome.""; ?>" 
                        src="administrador/ups/produtos/<?php echo $foto.""; ?>" 
                        border="0" /></a></td>
                      </tr>
                      <tr>
                        <td align="center" class="manchete_texto9"><a class="manchete_texto9" 
                        href="verimovel.php?id=<?php echo $id.""; ?>"><b><?php echo $nome.""; ?></b></a></td>
                      </tr>
                      <tr>
                        <td><table width="70%" border="0" align="center">
                          <tr>
                            <td align="center"><i>
                              <?php 	$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$departamento'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];  }
	
	?>
                              <br />
                              <?php 	$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$subdep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];  }
	
	?>
                            </i></td>
                          </tr>
                        </table>
                          <table width="70%" border="0" align="center">
                            <tr>
                              <td align="center"><?php if ($valor=='') { } else { ?>
                                Valor: <font color="#006600">R$</font> <?php echo $valor.""; ?>
                                <?php } ?></td>
                            </tr>
                            <tr>
                              <td align="center"><?php if ($valorpx=='' and $valorp=='') { } else { ?>
                                ou em <?php echo $valorpx.""; ?> X de <font color="#006600">R$</font> <?php echo $valorp.""; ?>
                                <?php } ?></td>
                            </tr>
                            <tr>
                              <td align="center"><?php if ($valorpx!='' and $valorp!='' and $valor!='') { } else { ?>
                                <?php echo $valortratar.""; ?>
                                <?php } ?></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <?php if ($tipo=='Venda') { ?>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#293F3E"><img src="imagens/venda.png" width="120" height="30" /></td>
                            </tr>
                          </table>
                          <?php  } else { ?>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#293F3E"><img src="imagens/local.png" width="120" height="30" /></td>
                            </tr>
                          </table>
                          <?php } ?>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#EAEAEA"><a href="verimovel.php?id=<?php echo $id.""; ?>"><img src="imagens/det.png" width="120" height="30" border="0" alt="VER DETALHES DO IMÓVEL" title="VER DETALHES DO IMÓVEL" /></a></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table><br /><br />
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
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
        </table>
         <br />
                    <div align="center">
                      <?php


$sql_select_all = "SELECT * FROM cw_produtos WHERE departamento='$iddep' AND subdep='$idsub'";
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
echo "<a href='imovel.php?p=1&amp;idsub=$idsub&iddep=$iddep' target='_self' class=manchete_texto9><b>PRIMEIRA PÁGINA</b></a>&nbsp;&nbsp; ";

for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='imovel.php?p=".$i."&amp;idsub=$idsub&iddep=$iddep' target='_self' class=manchete_texto9>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "| <span class=manchete_texto9><b>";
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
echo " <a href='imovel.php?p=".$i."&amp;idsub=$idsub&iddep=$iddep' target='_self' class=manchete_texto9>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='imovel.php?p=".$pags."&amp;idsub=$idsub&iddep=$iddep' target='_self' class=manchete_texto9><b>ÚLTIMA PÁGINA</b></a> ";


?>
                    </div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table bgcolor="#C8CACC" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>