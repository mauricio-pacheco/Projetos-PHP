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
              <td><img src="imagens/branco.gif" width="1" height="10" /></td>
            </tr>
          </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><?php include("slides.php"); ?></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="22" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><img src="imagens/tagenda.png" width="400" height="40" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
              <td><img src="imagens/branco.gif" width="1" height="10" /></td>
            </tr>
        </table>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
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

$qnt = 8;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_agenda ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=980>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$dataevento = $array["dataevento"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$data = $array["data"];
$hora = $array["hora"];



?>
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td width="2%"><img src="administrador/ups/agendas/<?php echo $foto.""; ?>" width="200" height="150" /></td>
                        <td align="left" width="98%" class="manchete_texto5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><span class="fonteadm"><b><?php echo $nomegaleria.""; ?></b></span></td>
                          </tr>
                          <tr>
                            <td><span class="fonteadm"><img src="imagens/branco.gif" width="1" height="3" /></span></td>
                          </tr>
                          <tr>
                            <td><div align="justify"><span class="fonteadm"><?php echo $comentario.""; ?></span></div></td>
                          </tr>
                          <tr>
                            <td><span class="fonteadm"><img src="imagens/branco.gif" width="1" height="3" /></span></td>
                          </tr>
                          <tr>
                            <td><span class="fonteadm"><em class="fonteadm">Data do Evento: <?php echo $dataevento.""; ?></em></span></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="99%" class="fonteadm"><a href="veragenda.php?id=<?php echo $id.""; ?>" class="fonteadm"><b>MAIS DETALHES...</b></a></td>
                            </tr>
                          </table>
                          <br />
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
                    <div align="center"><span class="fonteadm">
                      <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_agenda ORDER BY id DESC";
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
echo "&nbsp;&nbsp;<font class=fonteadm><a href='principal.php?p=1' target='_self' class=fonteadm><b>PRIMEIRA PÁGINA</b></a></font> <font color='#FFFFFF' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='principal.php?p=".$i."' target='_self' class=fonteadm>".$i."</a> ";
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
echo "<font class=fonteadm><a href='principal.php?p=".$i."' target='_self' class=fonteadm>".$i."</a></font> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#FFFFFF' size='1'>-</font> <font class=fonteadm><a href='principal.php?p=".$pags."' target='_self' class=fonteadm><b>ÚLTIMA PÁGINA</b></a></font>&nbsp;&nbsp;";


?>
                    </span></div></td>
                </tr>
              </table><br /></td>
            </tr>
          </table>
          
          </td>
        </tr>
    </table>
<?php include("baixo.php"); ?>
</body>
</html>