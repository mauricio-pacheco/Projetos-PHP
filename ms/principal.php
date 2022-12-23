<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" height="154" background="imagens/fundot.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?>
      <?php include("menucima.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250" valign="top" background="imagens/ftabela.png"><table width="250" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="2%"><img src="imagens/branco.gif" width="10" height="2" /></td>
    <td width="98%"><?php include("menu.php"); ?></td>
  </tr>
</table>
</td>
        <td width="700" valign="top" bgcolor="#FFFFFF"><table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
        </table>
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="manchete_texto">Página Inicial</td>
          </tr>
        </table>
        <table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>

          <table bgcolor="#DFDFDF" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
          </table>
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
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

$qnt = 16;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_produtos ORDER BY rand() LIMIT $inicio, $qnt";

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
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" bgcolor="#2F2F2F"><a href="verproduto.php?id=<?php echo $id.""; ?>"><img src="imagens/detalhe.png" border="0" /></a></td>
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
          <table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          </table></td>
          <td width="1" bgcolor="#F0F0F0"><img src="imagens/branco.gif" width="6" height="1" /></td>
          
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="294" background="imagens/fundob.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cbaixo.php"); ?></td>
  </tr>
</table>
<table background="imagens/fundot.png" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>