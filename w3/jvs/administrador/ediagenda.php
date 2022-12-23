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
$sql = mysql_query("SELECT * FROM agenda WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe agendas cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  </p>
<p>
<FORM action="editaragenda.php" method=post enctype="multipart/form-data" name=cadastro>
  <p class="spip" align="justify">&nbsp;</p>
  <p class="spip" align="justify">Data de Sa&iacute;da: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
    <input class="texto2" size="20" name="data" value="<?php echo $n["data"]; ?>" />
    </font>Data de Retorno<font color="#006600">:</font> <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="dataretorno" value="<?php echo $n["dataretorno"]; ?>"   />
      </font><span class="rodape">
        <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
        </span><br />
    <br />
    Roteiro: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="80" name="roteiro" value="<?php echo $n["roteiro"]; ?>"  />
      </font><br />
    <br />
    <span class="rodape"><img src="agenda/<?php echo $n["foto"]; ?>" /></span></p>
  <p class="spip" align="justify">Foto do Roteiro:
  <input type="file" name="foto" class="texto2" />
    <span class="rodape">(caso n&atilde;o deseje editar a foto deixe   em branco)
      <input type="hidden" name="foto2" id="foto2" value="<?php echo $n["foto"]; ?>" />
      </span><br />
    <br />
    Descri&ccedil;&atilde;o:<br />
    
    <textarea class="login" name="descricao" rows="30" cols="80"><?php echo $n["descricao"]; ?></textarea>
    <br />
    <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input type="submit" value="EDITAR AGENDA" name="submit" class="texto2" />
      </font><br />
  </p>
</form>
  <?php
  }
  }
 ?>
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