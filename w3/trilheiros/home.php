<?php include("cabecalho.php"); ?>
<script>
  function camada( s2 ) {
  var sDiv = document.getElementById( s2 );
  if( sDiv.style.visibility == "hidden" ) {
  sDiv.style.visibility = "visible";
  } else {
  sDiv.style.visibility = "hidden";
  }
  }
</script>
<style type="text/css">
<!--
.style19 {color: #FFFFFF; font-size: 14px; }
.style20 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style22 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style23 {color: #FFFFFF}
-->
</style>
<?php include("aniversario.php"); ?>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
                  <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="96%" border="0" align="center">
                        <tr>
                          <td align="left"><?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM agenda WHERE id = '60'  ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                            <table width="100%" border="0">
                              <tr>
                                <td width="6%"><a href="verevento.php?id=<?php echo $n["id"]; ?>"><img border="0" src="fotosagenda/<?php echo $n["foto"]; ?>" /></a></td>
                                <td width="94%" align="left"><span class="style19"><a href="verevento.php?id=<?php echo $n["id"]; ?>">&nbsp;<?php echo $n["assunto"]; ?>&nbsp;-&nbsp;<span class="style22">Data do Evento: <?php echo $n["dataevento"]; ?>&nbsp;-&nbsp;<span class="style20"><font color='#D29B36' arial,="Arial," helvetica,="Helvetica," sans-serif\="sans-serif\""><b>Local:</b></font>&nbsp;-&nbsp;<font color='#CDCDCD' arial,="Arial," helvetica,="Helvetica," sans-serif\="sans-serif\""><?php echo $n["local"]; ?></font></span></span></a></span></td>
                              </tr>
                            </table>
                            <?
  }
  }
 ?></td>
                        </tr>
                      </table>
                        <table width="96%" border="0" align="center">
                          <tr>
                            <td align="left"><table width="100%" border="0" align="center">
                                                   <tr>
                                <td>
                                         <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM agenda ORDER BY id DESC LIMIT 3");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                  <table width="100%" border="0">
                                    <tr>
                                      <td width="6%"><a href="verevento.php?id=<?php echo $n["id"]; ?>"><img border="0" src="fotosagenda/<?php echo $n["foto"]; ?>" /></a></td>
                                      <td width="94%" align="left"><span class="style19"><a href="verevento.php?id=<?php echo $n["id"]; ?>">&nbsp;<?php echo $n["assunto"]; ?>&nbsp;-&nbsp;<span class="style22">Data do Evento: <?php echo $n["dataevento"]; ?>&nbsp;-&nbsp;<span class="style20"><font color='#D29B36' arial,="Arial," helvetica,="Helvetica," sans-serif\="sans-serif\""><b>Local:</b></font>&nbsp;-&nbsp;<font color='#CDCDCD' arial,="Arial," helvetica,="Helvetica," sans-serif\="sans-serif\""><?php echo $n["local"]; ?></font></span></span></a></span></td>
                                    </tr>
                                  </table>
                                  <?
  }
  }
 ?>
                                  </td>
                              </tr>
                              
                            </table></td>
                          </tr>
                        </table>
                        <table width="96%" border="0" align="center">
                          <tr>
                          <td align="left"><img src="imagens/galeriafotos.jpg" width="280" height="30" /></td>
                          <td align="right"><a href="fotos.php"><img src="imagens/todasgalerias.jpg" width="280" height="30" border="0" /></a></td>
                        </tr>
                      </table>
                        <table width="96%" border="0" align="center">
                          <tr>
                            <td><table width="100%" border="0">
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

$sql_select = "SELECT * FROM galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=600>";


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

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                                  <table width="100%" border="0">
                                  <tr>
                                    <td><table class="pontilhada" width="100%" border="0">
                                      <tr>
                                        <td align="center"><a href="vergalerias.php?id=<?php echo $id.""; ?>"><img src="capas/<?php echo $foto.""; ?>" width="160" height="120" border="0" title="<?php echo $nomegaleria.""; ?>" alt="<?php echo $nomegaleria.""; ?>" /></a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  <tr>
                                    <td align="center"><font class="style4" size="2"><?php echo $nomegaleria.""; ?></font></td>
                                    </tr>
                                  <tr>
                                    <td align="center"><font class="texto_html" size="1">Data de Publica&ccedil;&atilde;o:<br />
                                        <?php echo $data.""; ?> | ( <?php echo $hora.""; ?> )</font></td>
                                    </tr>
                                  <tr>
                                    <td><table width="100%" border="0" align="center">
                                      <tr>
                                        <td width="5%"><img src="imagens/camera.png" /></td>
                                        <td width="95%" class="manchete_textocasa2"><font class="style2" size="1">
                                          <b><?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM fotos WHERE galeria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                          <?php
  echo ''. $total;
 ?>
&nbsp;Fotos</b></font></td>
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
                                  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM galeria ORDER BY id DESC";
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

// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {

}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero



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

}
}
// Exibe o link "&uacute;ltima p&aacute;gina"



?></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
