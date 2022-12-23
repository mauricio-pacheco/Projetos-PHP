<?php include("meta.php"); ?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="309"><img src="imagens/branco.gif" width="2" height="4" /></td>
    <td width="663" bgcolor="#EC1D25"><img src="imagens/branco.gif" width="2" height="4" /></td>
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
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
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
            <td width="3%" class="manchete_texto9m"><img src="imagens/chavev.png" /></td>
            <td width="97%" class="manchete_texto9m">&nbsp;<strong><em>Imóveis para Venda</em></strong></td>
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
                      <td><img src="imagens/branco.gif" width="2" height="8" /></td>
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

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_produtos WHERE tipo='Venda' ORDER BY rand() LIMIT $inicio, $qnt";

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
$tipo = $array["tipo"];
$valorpx = $array["valorpx"];
$valorp = $array["valorp"];
$valortratar = $array["valortratar"];
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
                              <td align="center" bgcolor="#EC1D25"><img src="imagens/venda.png" width="120" height="30" /></td>
                            </tr>
                          </table>
                      <?php  } else { ?>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#0364FF"><img src="imagens/local.png" width="120" height="30" /></td>
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
              </table></td>
            </tr>
          </table>
                    <table height="28" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="3%" class="manchete_texto9m"><img src="imagens/chave.png" /></td>
              <td width="97%" class="manchete_texto9m">&nbsp;<strong><em>Imóveis para Locação</em></strong></td>
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
                      <td><img src="imagens/branco.gif" width="2" height="8" /></td>
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

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_produtos WHERE tipo='Locação' ORDER BY rand() LIMIT $inicio, $qnt";

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
$tipo = $array["tipo"];
$valorpx = $array["valorpx"];
$valorp = $array["valorp"];
$valortratar = $array["valortratar"];
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
                        href="verproduto.php?id=<?php echo $id.""; ?>"><b><?php echo $nome.""; ?></b></a></td>
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
                              <td align="center" bgcolor="#EC1D25"><img src="imagens/venda.png" width="120" height="30" /></td>
                            </tr>
                          </table>
                          <?php  } else { ?>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#0364FF"><img src="imagens/local.png" width="120" height="30" /></td>
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
                    </table>
                    <br />
                    <br />
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
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
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