<?php require("verifica.php"); ?>
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
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
.style16 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 12px;
}
.style3 {color: #000000}
.style17 {color: #FFFFFF}
.style18 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; }
.style20 {color: #FFFFFF; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
-->
</style></head>

<body>
<div align="center">
  <p><a href="admnews.php">ADMINISTRAÇÃO NEWSLETTER</a></p>
  <p><img src="logol.jpg" width="154" height="160" /></p>
  <p class="style1">Administração Galeria de Fotos</p>
  <p class="style1"><a href="fotos.php">INSERIR GALERIA</a> ------- <a href="editargaleria.php">EDITAR GALERIA</a> -------<a href="apagargalerias.php">APAGAR GALERIA</a></p>
  <p class="style1"><a href="enviarfotos.php">INSERIR FOTOS</a> ------- <a href="apagarfotos.php">APAGAR FOTOS</a></p>
  <p class="style1">Administração Notícias</p>
  <p class="style1"><a href="index.php">INSERIR NOTÍCIA</a> ------- <a href="editar.php">EDITAR NOTÍCIAS</a> ------- <a href="deletar.php">DELETAR NOTÍCIAS</a></p>
  <form name="form1" action="cadgaleria.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)"><table width="700" border="0">
    <tr>
      <td><p align="center" class="style3"><span class="style19">Cadastrar Galeria</span><br />
      </p>
        <p align="left"><br />
            <span class="style19"><span class="style19">T&iacute;tulo da Galeria: </span>
            <input name="titulo" type="text" class="caixacontato" size="60" />
            <span class="style19">*</span></span></p>
        <p align="left"><span class="style19"><span class="style19">Enviar imagem de capa da galeria: </span></span>
            <input type="file" name="foto" id="foto" class="caixacontato"/>
        </p>
        <p align="left"><span class="style19">Descrição da Galeria:</span></p>
        <div align="left">
          <?php
									$editor = new FCKeditor("texto");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "700";
									$editor->Height = "360";
									$editor->Create();
									?>
        </div>
        <p align="center" class="style18">
          <input type="submit" class="caixacontato" value="Cadastrar Galeria" />
  &nbsp;&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
  </table></form>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
