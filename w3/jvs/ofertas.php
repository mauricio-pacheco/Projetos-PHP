<?php include("meta.php"); ?>
<style type="text/css">
@import url("dn.css");
</style>
<link rel="stylesheet" href="dns.css" type="text/css" media="print" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #333333}
-->
</style>
</head>
<body>
<div id="conteudo">
<div id="ultratopo"></div>
<div id="topo">
<div id="topo_direita"><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('flash/acima8.swf','764','180'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div></div>	
<div id="menu_horiz">
  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','764','height','38','src','flash/botoes','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/botoes' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="764" height="38">
    <param name="movie" value="flash/botoes.swf">
    <param name="quality" value="high">
    <embed src="flash/botoes.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="764" height="38"></embed>
  </object>
</noscript></div>

<fieldset id="pagina">
<div id="esquerda"></div>
<?php include("centro2.php"); ?>
<style type="text/css">
<!--
.style4 {color: #006600}
.style6 {font-size: 12px}
.style7 {color: #666666}
.style8 {color: #FF0000}
-->
</style>
<div id="centro">
<div class="centro_venda">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
      </div>
</div>
<table width="96%" border="0" align="center">
  <tr>
    <td><table width="98%" border="0" align="center">
              <tr>
                <td width="50%" align="center"><?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 10;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cadastro WHERE tipo = 'Veículos Venda' ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=678>";

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nome = $array["nome"];
$preco = $array["preco"];
$lugares = $array["lugares"];
$categoria = $array["categoria"];
$bancada = $array["bancada"];
$condicionado = $array["condicionado"];
$modelo = $array["modelo"];
$descricao = $array["descricao"];
$foto = $array["foto"];
$tipo = $array["tipo"];
// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                  <table width="100%" border="0" align="center">
                    <tr>
                      <td width="7%" valign="top" align="center"><table width="100%" border="0">
                        <tr>
                          <td width="1%"><a href="verveiculo.php?id=<?php echo $id.""; ?>"><img src="administrador/veiculointro/<?php echo $foto.""; ?>" border="1" alt="VISUALIZAR VEÍCULO"></a></td>
                          <td width="99%" align="left" valign="top"><b><?php echo $nome.""; ?></b><br>
                            Ano Fabricação:&nbsp;<font color="#005CA2"><?php echo $anofab.""; ?></font><br><a href="verveiculov.php?id=<?php echo $id.""; ?>"><img src="detalhe.jpg" border="0"></a>
                            <table width="100%" border="0">
                              <tr>
                                <td width="5%"><img src="ncamera.jpg"></td>
                                <td width="95%"><font size="2">
                                  <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM fotosveiculos WHERE idveiculo='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                  &nbsp;<?php
  echo ''. $total;
 ?>
                                  Fotos</font></td>
                                </tr>
                            </table></td>
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
?></td>
              </tr>
            </table>
              <div align="center">
                <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cadastro WHERE tipo = 'Veículos Viagens'";
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
echo "<a href='home.php?p=1' target='_self'><font size='2' face=Tahoma>PRIMEIRA PÁGINA</font></a> <font size='2' face=Tahoma>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='home.php?p=".$i."' target='_self'><font size='2' face=Tahoma>".$i."</font></a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo $p." ";

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
echo "<a href='home.php?p=".$i."' target='_self'><font size='2' face=Tahoma>".$i."</font></a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font size='2' face=Tahoma>-</font> <a href='home.php?p=".$pags."' target='_self'><font size='2' face=Tahoma>ÚLTIMA PÁGINA</font></a> ";


?></div></td>
          </tr>
        </table></td>
  </tr>
</table>
</div>

<div class="centro_rodape"></div>
</div>
</fieldset>

<div id="rodape">
<div id="coor">
  <?php include("baixo.php"); ?> 
</div>
</div></div>
</body>
</html>