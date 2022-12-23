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
<FORM action="cadveiculo.php" method=post enctype="multipart/form-data" name=cadastro>
  <p class="spip" align="justify">TIPO DO VE&Iacute;CULO:     <strong>
    <select 
                              class="texto2"   name="tipo">
      <option value="Ve&iacute;culos Venda">Ve&iacute;culos Venda</option>
      <option value="Ve&iacute;culos Viagens">Ve&iacute;culos Viagens</option>
    </select>
  </strong></p>
  <p class="spip" align="justify">&nbsp;</p>
  <p class="spip" align="justify">Nome do Ve&iacute;culo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
    <input class="texto2" size="60" name="nome" />
    </font><br />
    Pre&ccedil;o <font color="#006600">R$:</font> <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="preco" />
      </font><br />
    Lugares: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="lugares" />
      </font><br />
    Categoria: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="categoria" />
      </font><br />
    Bancada: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="bancada" />
      </font><br />
    Ar Condicionado:<strong>
    <select 
                              class="texto2"   name="condicionado">
      
      <option 
                              value="Sim">Sim</option>
                              <option 
                              value="Não">Não</option>
      
    </select>
    </strong><br />
    Modelo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="modelo" />
      </font><br />
    <br />
    Foto Menor Abertura:
    <input type="file" name="foto" class="texto2" />
    <br />
    <br />
    Descri&ccedil;&atilde;o:<br />
    
    <textarea class="login" name="descricao" rows="12" cols="60"></textarea>
    <br />
    <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input type="submit" value="CADASTRAR VEÍCULO" name="submit" class="texto2" />
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