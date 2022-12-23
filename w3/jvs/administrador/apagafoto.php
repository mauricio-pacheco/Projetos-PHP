<?php include("verifica.php"); ?>
<?php include("meta.php"); ?>
<style type="text/css">
@import url("dn.css");
</style>
<link rel="stylesheet" href="dns.css" type="text/css" media="print" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #333333}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>
<body>
<div id="conteudo">
<div id="ultratopo"></div>
<fieldset id="pagina">
  <div id="esquerda"></div>
<?php include("centro2.php"); ?>
<style type="text/css">
<!--
.style4 {color: #006600}
.style6 {font-size: 12px}
.style7 {color: #666666}
.style8 {color: #FF0000}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
 <?php include("menu.php"); ?>
<p>&nbsp;</p>
<p>
<p></p>
</div>

</div>
<table width="674" border="0" align="center">
  <tr>
    <td class="rodape"><?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&fnof;&Acirc;&iexcl; algum registro na tabela, caso n&Atilde;&fnof;&Acirc;&pound;o houver, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe fotos cadastradas na galeria!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; os registros. OBS: Voc&Atilde;&fnof;&Acirc;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&fnof;&Acirc;&pound;o mude nenhuma vari&Atilde;&fnof;&Acirc;&iexcl;vel, a n&Atilde;&fnof;&Acirc;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
      <table width="100%" border="0" align="center">
        <tr>
          <td align="center"><img src="galerias/<?php echo $n["foto"]; ?>" /></td>
        </tr>
        <tr>
          <td align="center" width="98%"><font color="#000000"><?php echo $n["nomegaleria"]; ?> -- <?php echo $n["data"]; ?> <?php echo $n["hora"]; ?></td>
        </tr>
      </table>
      <br />
      <?php
  }
  }
 ?></td>
  </tr>
  <tr>
    <td class="rodape"><?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM fotos WHERE idgaleria='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe fotos cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
      <?php
									
								$causa = $n["fotomenor"];
									$teste = '1';
									
									if ($causa == $teste) {
										
										   }
									else {
									?>
      <table width="100%" border="0" align="center">
        <tr>
          <td width="2%"><img src="fotosmenor/<?php echo $n["fotomenor"]; ?>" /></td>
          <td align="left" width="98%"><a href="delfoto.php?id=<?php echo $n["id"]; ?>&amp;idgaleria=<?php echo $n["idgaleria"]; ?>&amp;fotomenor=<?php echo $n["fotomenor"]; ?>&amp;foto=<?php echo $n["foto"]; ?>" class="linkmenu" onClick="return confirm('Tem certeza que deseja apagar a foto ?')"><font color="#0000ff">APAGARFOTO</font></a></td>
        </tr>
      </table>
      <?php } ?>
      <?php
  }
  }
 ?></td>
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