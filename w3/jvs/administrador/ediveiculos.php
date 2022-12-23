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
$tipo = $_GET['tipo'];
$sql = mysql_query("SELECT * FROM cadastro WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe veículos cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  </p>
  <p>&nbsp;</p>
<p>
<FORM action="updateveiculo.php" method=post enctype="multipart/form-data" name=cadastro>
  <p class="spip" align="justify">TIPO DO VE&Iacute;CULO:
    <select class=texto name="tipo">
  
      <option value="<?php echo $tipo; ?>" selected><?php echo $tipo; ?></option>
      <option value="Ve&iacute;culos Venda">Ve&iacute;culos Venda</option>
      <option value="Ve&iacute;culos Viagens">Ve&iacute;culos Viagens</option>
          </select>
  </p>
  <p class="spip" align="justify">&nbsp;</p>
  <p class="spip" align="justify">Nome do Ve&iacute;culo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
    <input class="texto2" size="60" name="nome" value="<?php echo $n["nome"]; ?>" />
    </font><span class="rodape">
      <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
      </span><br />
    Pre&ccedil;o R$: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="preco" value="<?php echo $n["preco"]; ?>" />
      </font><br />
    Lugares: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="lugares" value="<?php echo $n["lugares"]; ?>" />
      </font><br />
      Categoria: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="categoria" value="<?php echo $n["categoria"]; ?>" />
      </font><br />
    Bancada: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="bancada" value="<?php echo $n["bancada"]; ?>" />
      </font><br />
      Ar Condicionado:<strong>
      <select 
                              class="texto2"   name="condicionado">
        <option 
                              value="<?php echo $n["condicionado"]; ?>"><?php echo $n["condicionado"]; ?></option>                       
        <option 
                              value="Sim">Sim</option>
        <option 
                              value="N&atilde;o">N&atilde;o</option>
      </select>
      </strong><br />
    Modelo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="modelo" value="<?php echo $n["modelo"]; ?>" />
      </font><br />
    <br />
    <span class="rodape"><img src="veiculointro/<?php echo $n["foto"]; ?>" /></span></p>
  <p class="spip" align="justify">Foto Menor Abertura:
  <input type="file" name="foto" class="texto2" />
    <br />
    <br />
    Descri&ccedil;&atilde;o:<br />
    
    <textarea class="login" name="descricao" rows="12" cols="60"><?php echo $n["descricao"]; ?></textarea>
    <br />
    <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input type="submit" value="EDITAR VEÍCULO" name="submit" class="texto2" />
      </font><br />
  </p>
</form><?php
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