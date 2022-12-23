<?php include("meta.php"); ?>
<?php include("cima.php"); ?>
<table width="874" height="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#121315" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="2" /></td>
      </tr>
    </table>
      <table width="870" height="398" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#36393F" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
        </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="1%"><img src="imagens/c1.png" width="11" height="26" /></td>
              <td width="98%" bgcolor="#111113" align="center"><img src="imagens/videos.png" /></td>
              <td width="1%"><img src="imagens/c2.png" width="11" height="26" /></td>
            </tr>
          </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                 <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 15;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria WHERE local='fotos' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="5"; //quantidade de colunas
$cont="1"; //contador

print"<table width=850>";


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
$dataevento = $array["dataevento"];
$comentario = $array["comentario"];
$foto = $array["foto"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                    <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" height="122" width="160" bgcolor="#F9C401"><span class="fonterodape"><a href="vergaleria.php?id=<?php echo $id.""; ?>"><img title="<?php echo $nomegaleria.""; ?>" width="150" height="112" alt="<?php echo $nomegaleria.""; ?>" src="administrador/ups/galerias/<?php echo $foto.""; ?>" border="0" /></a></span></td>
                      </tr>
                      <tr>
                        <td class="fonteadm" align="center"><table width="100%" border="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                        </table>                          <span class="fonterodape"><strong><a href="vergaleria.php?id=<?php echo $id.""; ?>" class="fonterodape"><?php echo $nomegaleria.""; ?></a></strong></span></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                          </tr>
                        </table>
                          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="6%"><span class="fonterodape"><img src="imagens/camera.png" /></span></td>
                            <td width="94%" class="fonteadm" align="left"> <span class="fonterodape"><em>&nbsp;
                              <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                              <?php
  echo ''. $total;
 ?>
                              &nbsp;Fotos na Galeria</em></span></td>
                          </tr>
                          <tr>
                            <td><span class="fonterodape"><img src="imagens/branco.gif" width="1" height="8" /></span></td>
                            <td class="fonteadm" align="left"><span class="fonterodape"><img src="imagens/branco.gif" width="1" height="8" /></span></td>
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
print"</tr></table>";
} else {
print"</table>";
}
?>
                    <div align="center">  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_galeria WHERE local='fotos'";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 15;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='fotos.php?p=1' target='_self' class=fonterodape><b>PRIMEIRA PÁGINA</b></a>&nbsp;&nbsp; ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='fotos.php?p=".$i."' target='_self' class=fonterodape>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<span class=fonterodape>|</span> <span class=fonterodape><b>";
echo $p." ";
echo "</b></span> <span class=fonterodape>|</span>";

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
echo " <a href='fotos.php?p=".$i."' target='_self' class=fonterodape>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='fotos.php?p=".$pags."' target='_self' class=fonterodape><b>ÚLTIMA PÁGINA</b></a> ";


?></div></td>
                </tr>
              </table></td>
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
</table>
<?php include("baixo.php"); ?>
</body>
</html>