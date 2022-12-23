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
<p>
  <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe galerias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
</p>
<p>&nbsp;</p>
<p>T&iacute;tulo da Galeria: 
<script language=javascript>
function validar(form1) { 

if (document.form1.nomegaleria.value=="") {
alert("O Campo Título da Galeria não está preenchido!")
form1.nomegaleria.focus();
return false
}


}

</SCRIPT><form name="form1" action="editargaleria.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
<p>
  <input name="nomegaleria" type="text" value="<?php echo $n["nomegaleria"]; ?>"  size="60" class="style6" />
  *</p>
  <span class="rodape">
    <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
    </span></p>
<p><span class="rodape"><img src="galerias/<?php echo $n["foto"]; ?>" /></span> </p>
<p>Capa da Galeria: 
  <input type="file" name="foto" id="foto" class="style6" />
  <span class="rodape">(caso n&atilde;o deseje editar a foto deixe   em branco)
  <input type="hidden" name="foto2" id="foto2" value="<?php echo $n["foto"]; ?>" />
  </span></p>
<p>Descri&ccedil;&atilde;o da Galeria:</p>
<p>
  <textarea name="comentario" id="comentario" cols="45" class="style6" rows="5"><?php echo $n["comentario"]; ?></textarea>
(opcional)</p>
<p>
  <input name="submit" type="submit" style="FONT-SIZE: 10px" value="EDITAR GALERIA" class="style6" />
</p>
<p>
  <?php
  }
  }
 ?>
</p>
<p>&nbsp;</p>
</form>
<p></p>
</div>
</div></div>

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