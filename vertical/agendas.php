<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
<?php include("banner.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26%" valign="top"><?php include("menu.php"); ?></td>
        <td width="74%" valign="top">
               <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><img src="imagens/barra3.jpg" /></td>
          </tr></table>
           <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table>
          <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><table width="100%" border="0">
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

$sql_select = "SELECT * FROM cw_viajens WHERE sessao='Agenda de Viajens' ORDER BY id ASC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=534>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$local = $array["local"];
$sessao = $array["sessao"];
$valorvista = $array["valorvista"];
$valorprazo = $array["valorprazo"];
$descricao = $array["descricao"];
$foto = $array["foto"];
$data = $array["data"];
$hora = $array["hora"];
$prazo = $array["prazo"];

?>
                  <table width="100%" border="0">
                  <tr>
                    <td class="pontilhada" align="center"><a href="viajem.php?id=<?php echo $id.""; ?>"><img src="administrador/imgviajens/<?php echo $foto.""; ?>" width="145" height="109" title="<?php echo $local.""; ?>" alt="<?php echo $local.""; ?>" border="0" /></a></td>
                    </tr>
                  <tr>
                    <td class="fontetabela"><b><?php echo $local.""; ?></b></td>
                    </tr>
                  <tr>
                    <td>
                    <?php if ($valorvista == 'R$ ' and $valorprazo == 'R$ ') { } else {  ?>
                    <table width="100%" border="0">
                      <tr>
                        <td width="2%"><img src="imagens/money.png" /></td>
                        <td width="98%" class="fontegrana"><table width="99%" border="0">
                         <tr>
                            <td class="fontetabela">A partir de <b><?php echo $valorvista.""; ?></b>
                             <?php if ($prazo == '' and $valorprazo == 'R$ ') { } else {  ?>
                             ou em <b><?php echo $prazo.""; ?></b> X de <b><?php echo $valorprazo.""; ?></b>
                             <?php } ?>
                             </td>
                          </tr>
                        </table></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><a href="viajem.php?id=<?php echo $id.""; ?>"><img src="imagens/detalhes.png" width="100" height="20" border="0" title="Mais Detalhes..." alt="Mais Detalhes..." /></a></td>
                        </tr>
                      </table></td>
                    </tr>
                </table>
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
                   <div align="center" class="fonteadm">  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_viajens WHERE sessao='Agenda de Viajens'";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 12;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='pacotes.php?p=1&id=$id' target='_self' class=fonteadm>PRIMEIRA PÁGINA</a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='pacotes.php?p=".$i."&id=$id' target='_self' class=fonteadm>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<b>";
echo $p." ";
echo "</b>";


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
echo "<a href='pacotes.php?p=".$i."&id=$id' target='_self' class=fonteadm>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='pacotes.php?p=".$pags."&id=$id' target='_self' class=fonteadm>ÚLTIMA PÁGINA</a> ";


?></div></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
</table><br />
<?php include("baixo.php"); ?>
</body>
</html>