<?php include("meta.php"); ?>
<table width="968" class="boxSombra" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><?php include("cima.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#B30000"><img src="imagens/branco.gif" width="1" height="3" /></td>
        </tr>
      </table>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><?php include("slides.php"); ?></td>
        </tr>
    </table>
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
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="220" valign="top"><?php include("menu.php"); ?></td>
              <td width="748" valign="top"><table width="99%" height="28" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetitulo" align="right">Master Alto Falantes&nbsp;</td>
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
              <table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="fonte">
                <tr>
                  <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
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

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=720 align=center>";


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
                        border="0" width="160" height="120" /></a></td>
                          </tr>
                          <tr>
                            <td class="manchete_texto96"><img src="imagens/branco.gif" width="1" height="2" /></td>
                          </tr>
                          <tr>
                            <td class="manchete_texto96"><a class="fonte" 
                        href="verproduto.php?id=<?php echo $id.""; ?>"><b><?php echo $nome.""; ?></b></a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                          </tr>
                          <tr>
                            <td class="fontesub"><i>
                              <?php 	$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$departamento'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];  }
	
	?>
                            </i></td>
                          </tr>
                          <tr>
                            <td class="fontesub"><i><?php 	$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$subdep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];  }
	
	?>
                            </i></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                          </tr>
                          <tr>
                            <td class="fontesub"><?php if ($valor=='') { } else { ?>
                              <strong class="fontesub">R$ <?php echo $valor.""; ?></strong> à vista <br />
                              <?php } ?>
                              <?php if ($valorpx=='' and $valorp=='') { } else { ?>
                              ou <strong><?php echo $valorpx.""; ?> x</strong> de <strong class="fontesub">R$ <?php echo $valorp.""; ?></strong>
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
                            <td><img src="imagens/branco.gif" width="1" height="12" /></td>
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