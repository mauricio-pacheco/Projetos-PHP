<?php include("meta.php"); ?>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
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
     carregaFlash('flash/acima8.swf','764','180'); // Depois s? descrever o caminho, largura, altura do SWF.
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
.style3 {font-size: 11px; }
.style4 {color: #006699}
-->
</style>
<div id="centro">
<div class="centro_titulomarca">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
<br />
</div>
</div>
<table width="96%" border="0" align="center">
  <tr>
    <td align="center">
	<?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe notic&iacute;as cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
      <?php } else { ?>
      <img src="administrador/galerias/<?php echo $y["foto"]; ?>" />
      <?php } ?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $y["nomegaleria"]; ?> <br> Data de Plublica&ccedil;&atilde;o: <?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $y["comentario"]; ?></td>
  </tr>
 <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" width="14%"><div align="center">
      <?php }  ?>
      <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM fotos WHERE idgaleria='$id' AND foto <> '1'"; 
$resultado=mysql_query($sql);
$linha=mysql_fetch_array($resultado);

$k=1;
while($linha= mysql_fetch_array($resultado))
{
echo 
"<a href='administrador/fotos/".$linha['foto']."' rel='lightbox[roadtrip]' title='".$linha["comentario"]."'><img border='0' src='administrador/fotosmenor/".$linha['fotomenor']."'></a>&nbsp;&nbsp;&nbsp;
";

if ($k == 5)
{
echo "<br><br>";
$k=0;
}
$k++;
} }
  
   ?>
      <br>
      <div align="center"><a href="javascript:history.back(1)"><img src="volta.jpg" border="0" /></a></div></td>
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