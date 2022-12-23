<?php include("meta.php"); ?>
<body>
<br /><table width="980" class="boxSombra" bgcolor="#000000" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" height="150" border="0" align="center" cellpadding="0" cellspacing="0" background="imagens/cima.png">
      <tr>
        <td valign="top"><?php include("cima.php"); ?></td>
      </tr>
    </table>
      <table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><img src="imagens/ultimoseventos.png" width="300" height="40" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
              <td><span class="fontetabela2">
                <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 9;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=980>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$data = $array["data"];
$hora = $array["hora"];
$nomegaleria = $array["nomegaleria"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];
$contador = $array["contador"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
              </span>
                <table width="20%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table border="1" bordercolor="#009036" width="250" height="130" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" bordercolor="#0066FF" bgcolor="#FFFFFF"><a href="vergaleria.php?id=<?php echo $id.""; ?>"><img title="<?php echo $nomegaleria.""; ?>" alt="<?php echo $nomegaleria.""; ?>" src="administrador/ups/galerias/<?php echo $foto.""; ?>" border="0" width="240" height="120"  /></a></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                  </tr>
                  <tr>
                    <td class="fontetitulo4"><em><a href="vergaleria.php?id=<?php echo $id.""; ?>" class="fontetitulo4"><?php echo $nomegaleria.""; ?></a></em></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                  </tr>
                  <tr>
                    <td class="fontetitulo4"><span class="fontetitulo"><em>Data de Publicação: <?php echo $data.""; ?> | ( <?php echo $hora.""; ?> )</em></span><em><a href="principal.php" class="fontetitulo4"><span class="fontetabela"><br />
                    </span></a></em></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="40%"><em class="fontetitulo">( <?php echo $contador.""; ?> Visualizações )</em></td>
                        <td width="60%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="9%"><img src="imagens/estrela.png" width="16" height="16" /></td>
                            <td width="91%">&nbsp;<em class="fonterodape">
                              <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                              <?php
  echo ''. $total;
 ?>
                              &nbsp;Fotos na Galeria</em></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <span class="fonteadm">
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
                <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
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
echo "&nbsp;&nbsp;<font class=fonteadm><a href='galerias.php?p=1&id=$id' target='_self' class=fonteadm><b>PRIMEIRA PÁGINA</b></a></font> <font color='#FFFFFF' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='galerias.php?p=".$i."&id=$id' target='_self' class=fonteadm>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<font class=fonteadm><b>";
echo $p." ";
echo "</b></font>";

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
echo "<font class=fonteadm><a href='galerias.php?p=".$i."&id=$id' target='_self' class=fonteadm>".$i."</a></font> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#FFFFFF' size='1'>-</font> <font class=fonteadm><a href='galerias.php?p=".$pags."&id=$id' target='_self' class=fonteadm><b>ÚLTIMA PÁGINA</b></a></font>&nbsp;&nbsp;";


?>
                </span></td>
            </tr>
        </table></td>
        </tr>
    </table>
<?php include("baixo.php"); ?>
</body>
</html>