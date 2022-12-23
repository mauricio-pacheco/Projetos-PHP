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
<script language=javascript>
function validar(form1) { 

if (document.form1.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
form1.usuario.focus();
return false
}

if (document.form1.password.value=="") {
alert("O Campo Senha não está preenchido!")
form1.password.focus();
return false
}

}

</SCRIPT>
<p><form action="auth.php" name="form1" method="post"  onSubmit="return validar(this)">
  <p align="center">&nbsp;</p>
  <p align="center">M&Oacute;DULO ADMINISTRATIVO</p>
  <p align="center">&nbsp;</p>
  <p align="center">Digite o usu&aacute;rio e a senha para acessar o setor de administra&ccedil;&atilde;o.</p>
  <p align="center">&nbsp;</p>
  <p align="center">Campos Obrigat&oacute;rios *</p>
  <p align="center">Usu&aacute;rio:
    <input name="usuario" type="text" class="style6" size="20" maxlength="20" />
  *</p>
  <p align="center">Senha: 
      <input name="password" type="password" class="style6" size="20" maxlength="8" />
    *</p>
    <p align="center">  
      <input type="submit" class="style6" value="Acessar" />
      <span class="style15">
      <input class="style6" type="reset" value="Limpar" />
      </span></p>
    <p align="center">&nbsp;</p>
    
</form></p>
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