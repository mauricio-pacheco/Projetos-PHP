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

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='servicos'");
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
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="6" /></td>
          </tr>
        </table>
<table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
            <td width="49%"><img src="imagens/tservicos2.png" /></td>
            <td width="2%">&nbsp;</td>
            <td width="49%">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
          <tr>
            <td valign="top" class="fonte" width="400"><div align="justify">
              <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='67'");

while($y = mysql_fetch_array($sql))
   {
   ?><?php echo $y["comentario"]; ?><?php
  
  }
 ?></div></td>
            <td>&nbsp;</td>
            <td class="fonte" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                          <script type="text/javascript" src="js/prototype.js"></script>
                          <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                          <script type="text/javascript" src="js/lightbox.js"></script>
                          <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 8888;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_fotos WHERE idgaleria='67' LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=100%>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$foto = $array["foto"];
$fotomenor = $array["fotomenor"];
$idgaleria = $array["idgaleria"];
$comentario = $array["comentario"];



?>
                          <table width="140" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><table border="0" background="imagens/fundogal.png" width="127" height="74" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><img src="imagens/branco.gif" height="1" /></td>
                                    </tr>
                                  </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="imagens/branco.gif" width="3" /></td>
                                        <td> <a href='administrador/ups/fotosgaleria/g/<?php echo $foto.""; ?>' rel='lightbox['roadtrip="roadtrip"']' title='<?php echo $comentario.""; ?>'><img src="administrador/ups/fotosgaleria/p/<?php echo $fotomenor.""; ?>" width="120" height="69" border="0" /></a></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="3" /></td>
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
?></td>
                      </tr>
                    </table>
                      <br />
                      <div align="center"><span class="fonteadm">
                        <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_fotos ORDER BY id DESC";
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



?>
                      </span></div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
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