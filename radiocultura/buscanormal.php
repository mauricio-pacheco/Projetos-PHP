<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><b><font color="#FFFFFF"><em>RESULTADOS DA BUSCA</em></font></b></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
         <?php

include "administrador/conexao.php";
$palavra = $_POST["palavra"];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE titulo LIKE '%".$palavra."%' ORDER BY id DESC LIMIT 6");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
              <tr>
                <td width="23%" class="pontilhada2"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>"><img title="<?php echo $y["titulo"]; ?>" alt="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" border="0" /></a></td>
                <td width="77%" valign="top"><table width="100%" border="0">
                  <tr>
                    <td class="manchete_texto9"><?php echo $y["data"]; ?>  - <a href="vernoticia.php?id=<?php echo $y["id"]; ?>"  class="manchete_texto9"><b><?php echo $y["titulo"]; ?></b></a></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto9"><div align="justify"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>"  class="manchete_texto9"><?php echo $y["legenda"]; ?></a></div></td>
                  </tr>
                  <tr>
                    <td class="fontebaixo2">( <?php echo $y["contador"]; ?> Visualizações ) Sessão: <b>
                      <?php $iddep = $y["iddep"];
	$sql2 = mysql_query("SELECT * FROM cw_depnot WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];  }
	
	?>
                    </b></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="3%"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="fontebaixo2"><img border="0" src="imagens/mais.png" /></a></td>
                        <td width="97%" class="manchete_texto9">&nbsp;<a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="manchete_texto9">Leia mais...</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
              <?php
  }
  }
 ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="10" /></td>
                </tr>
              </table>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
              <tr>
              <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="5%"><img src="imagens/antena.png" /></td>
                  <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><em>GALERIA DE FOTOS</em></b></font></td>
                  <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                </tr>
              </table></td>
            </tr>
      </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" align="center" 
                    border="0" class="manchete_textocasa">
                <tbody>
                  <tr>
                    <td width="100%"><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 35443534;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria WHERE nomegaleria LIKE '%".$palavra."%' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=560>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$data = $array["data"];
$hora = $array["hora"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];



?>
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><a 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nomegaleria.""; ?>" 
                        src="administrador/ups/galerias/<?php echo $foto.""; ?>" 
                        border="0" width="150" height="100" /></a></td>
                        </tr>
                        <tr>
                          <td align="center" class="manchete_texto9"><a class="manchete_texto9" 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><b><?php echo $nomegaleria.""; ?></b></a></td>
                        </tr>
                        <tr>
                          <td><table width="70%" border="0" align="center">
                            <tr>
                              <td align="center">Data: <?php echo $dataevento.""; ?></td>
                            </tr>
                          </table>
                            <table width="60%" border="0" align="center">
                              <tr>
                                <td width="7%"><img src="imagens/cameraicone.png" /></td>
                                <td width="93%">Fotos:
                                  <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                  <?php
  echo ''. $total;
 ?></td>
                              </tr>
                            </table></td>
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


$sql_select_all = "SELECT * FROM cw_galeria ORDER BY id DESC";
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
                </tbody>
              </table></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
