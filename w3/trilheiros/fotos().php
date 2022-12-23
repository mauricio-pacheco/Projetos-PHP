<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style22 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="98%" border="0" align="center">
                     
                    <tr>
                      <td><div align="center"><img src="home_arquivos/fotos.jpg" width="200" height="30" /></div></td>
                    </tr>
                    <tr>
                          <td>
						  						  
						  <?php
include "conexao.php";
// Pegar a página atual por GET
$p = $_GET["p"];
// Verifica se a variável tá declarada, senão deixa na primeira página como padrão
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade máxima de registros por página.
$qnt = 10;
// O sistema calcula o início da seleção calculando: 
// (página atual * quantidade por página) - quantidade por página
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos números acima
$sql_select = "SELECT * FROM galeria LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informações do BD
while($array = mysql_fetch_array($sql_query)) {
// Variável para capturar o campo 'nome' no banco de dados
$nome = $array["nomegaleria"];
$id = $array["id"];
$data = $array["data"];
$hora = $array["hora"];
$comentario = $array["comentario"];
$foto = $array["foto"];


// Exibe o nome que está no BD e pula uma linha


?>


<table width="100%" border="0" align="center">
          
                            <tr onmouseover="this.style.backgroundColor='#000000'; this.style.color='#252525'; this.style.cursor='pointer'" onclick="window.location='vergalerias.php?id=<?php echo $id.""; ?>';" onmouseout="this.style.backgroundColor='#282828'; this.style.color='#252525';">
                              <td width="10%" align="center"><img src="capas/<?php echo $foto.""; ?>" width="100" height="75" border="1"/></td>
                              <td width="26%"><table width="100%" border="0">
                                <tr>
                                  <td><span class="style22"><?php echo $nome." <br /> "; ?></span></td>
                                </tr>
                                <tr>
                                  <td><span class="style22"><font color="#FEDC00">Data: </font><?php echo $data.""; ?> - <?php echo $hora.""; ?></span></td>
                                </tr>
                              </table></td>
                              <td width="64%"><div align="left"><span class="style22"><?php echo $comentario.""; ?></span></div></td>
                            </tr>
                                           </table>


<span class="style22">
<?




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(próxima, última...)
echo "<br />";

// Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
// para pegarmos o número total de registros
$sql_select_all = "SELECT * FROM galeria";
// Executa o query da seleção acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma variável com o número total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra variável, desta vez com o número de páginas que será precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// Número máximos de botões de paginação
$max_links = 3;
// Exibe o primeiro link 'primeira página', que não entra na contagem acima(3)
echo "<a href='fotos.php?p=1' target='_self'>Primeira página</a> <font color='#ffffff' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da página atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o número da página for menor ou igual a zero, não faz nada
// (afinal, não existe página 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra página
} else {
echo "<a href='fotos.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a página atual, sem link, apenas o número
echo "<font color='#ffffff' size='1'>";
echo $p." ";
echo "</font>";

// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo "<a href='fotos.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "última página"
echo " <font color='#ffffff' size='1'>-</font> <a href='fotos.php?p=".$pags."' target='_self'>Última página</a> ";
?></span></td>
                        </tr>
                       
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
