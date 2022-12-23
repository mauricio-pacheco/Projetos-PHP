<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<title>Administração Vitrola</title>
<style type="text/css">
<!--
body {
	background-color: #EFEFEF;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {color: #000000}
.style20 {	color: #000000;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
.style17 {
	color: #000000;
	font-size: 12px;
}
.style21 {font-size: 12px}
-->
</style></head>

<body>
<div align="center">
  <p><a href="admnews.php">ADMINISTRAÇÃO NEWSLETTER</a></p>
  <p><img src="logol.jpg" width="154" height="160" /></p>
  <p class="style1">Administração Notícias</p>
  <form action="auth.php" method="post" name="form1" id="form1" onsubmit="return validar(this)">
    <p align="center"><span class="style17">* Campos Obrigat&oacute;rios</span></p>
    <div align="center" class="style3">
      <table width="18%" border="0">
        <tr>
          <td width="47"><span class="style15"><span class="style21">Usuário: </span></span></td>
          <td width="243"><span class="style15">
            <input name="usuario" type="text" class="caixacontato" size="16" />
           *</span></td>
        </tr>
        <tr>
          <td><span class="style15"><span class="style21">Senha:</span></span></td>
          <td><span class="style15">
            <input name="password" type="password" class="caixacontato" size="16" />
          </span> <span class="style15">  *</span></td>
        </tr>
      </table>
    </div>
    <p align="center" class="style15">
      <input type="submit" class="texto" value="Entrar" />
      &nbsp;&nbsp;
      <input class="texto" type="reset" value="Limpar" />
    </p>
  </form>
  <p class="style20">&nbsp;</p>
 <p class="style20">&nbsp;</p>
</div>
</body>
</html>
