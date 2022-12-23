<?php include("meta.php"); ?>
<?php include("estilos.php"); ?>


<table width="934" height="352" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <div id="geral" align="center">
<SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('index.swf','934','352'); 
    </SCRIPT></div>
    <div id="alternativo" class="slideshowb1">
	<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='artigos'");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>

<img src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>"  />

<?php } ?>
</div></td>
  </tr>
</table>
<table width="934" height="427" style="background-image:url(imagens/outronovo.png); background-repeat:repeat-x" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table height="360" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
            <td width="49%"><img src="imagens/tartigos2.png" /></td>
            </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          <tr>
            <td valign="top" class="fonte"><div align="justify">
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top">
					  <?php 
						include "administrador/conexao.php";
						
						$iddep = $_GET["iddep"];
	$sql2 = mysql_query("SELECT * FROM cw_sessoes WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   {   }
	
	?>  <?php 
						include "administrador/conexao.php";
						
						$idpublic = $_GET["idpublic"];
	$sql2 = mysql_query("SELECT * FROM cw_subsessoes WHERE id = '$idpublic'");
									while($z = mysql_fetch_array($sql2))
   {   }
	
	?>
					  <?php
include "administrador/conexao.php";


$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 378979;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_pub WHERE idsessao='$iddep' AND idsubsessao='$idpublic' ORDER BY id ASC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="6"; //quantidade de colunas
$cont="1"; //contador

print"<table width=100%>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$arquivo = $array["arquivo"];


?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="25%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center"><a href="administrador/ups/publicacoes/<?php echo $arquivo.""; ?>" target="_blank"><img alt="<?php echo $titulo.""; ?>" title="<?php echo $titulo.""; ?>" src="imagens/ddd.png" border="0" /></a></td>
                              </tr>
                            </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" class="fonte"><a class="fonte" href="administrador/ups/publicacoes/<?php echo $arquivo.""; ?>" target="_blank"><b><?php echo $titulo.""; ?></b></a></td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="6" /></td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" class="fonte"><i>Publicado em <?php echo $data.""; ?> ( <?php echo $hora.""; ?> )</i></td>
                                </tr>
                              </table>
                              <br /></td>
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


$sql_select_all = "SELECT * FROM cw_subsessoes WHERE idsessao='$iddep' ORDER BY id ASC";
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
            </div></td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
     <?php include("baixo.php"); ?>