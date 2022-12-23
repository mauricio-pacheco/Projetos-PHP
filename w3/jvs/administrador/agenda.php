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
<FORM action="cadagenda.php" method=post enctype="multipart/form-data" name=cadastro>
  <p class="spip" align="justify">Data de Sa&iacute;da: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
    <input class="texto2" size="20" name="data" />
    </font>Data de Retorno<font color="#006600">:</font> <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
    <input class="texto2" size="20" name="dataretorno" />
    </font><br />
    <br />
    Roteiro: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="80" name="roteiro" />
      </font><br />
      <br />
    Foto do Roteiro:
    <input type="file" name="foto" class="texto2" />
    <br />
    <br />
    Descri&ccedil;&atilde;o:<br />
    
    <textarea class="login" name="descricao" rows="30" cols="80"></textarea>
    <br />
    <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input type="submit" value="CADASTRAR AGENDA" name="submit" class="texto2" />
      </font><br />
  </p>
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