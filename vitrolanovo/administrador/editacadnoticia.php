<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style></head>

<body>
<div align="center">
  <p><a href="admnews.php">ADMINISTRA&Ccedil;&Atilde;O NEWSLETTER</a></p>
  <p><img src="logol.jpg" width="154" height="160" /></p>
  <p class="style1">Administração Galeria de Fotos</p>
  <p class="style1"><a href="fotos.php">INSERIR GALERIA</a> ------- <a href="editargaleria.php">EDITAR GALERIA</a> -------<a href="apagargalerias.php">APAGAR GALERIA</a></p>
  <p class="style1"><a href="enviarfotos.php">INSERIR FOTOS</a> ------- <a href="apagarfotos.php">APAGAR FOTOS</a></p>
  <p class="style1">Administração Notícias</p>
  <p class="style1"><a href="index.php">INSERIR NOTÍCIA</a> ------- <a href="editar.php">EDITAR NOTÍCIAS</a> ------- <a href="deletar.php">DELETAR NOTÍCIAS</a></p>
 <table width="700" border="0">
    <tr>
      <td><p align="center" class="style3"><span class="style19">
        <?
include "conexao.php";

$Id = $_POST["Id"];
$titulo = $_POST["titulo"];
$topico = $_POST["topico"];
$legenda = $_POST["legenda"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$sql = "UPDATE noticias SET titulo = '$titulo', topico = '$topico', legenda = '$legenda', texto = '$texto', data = '$data', hora = '$hora' WHERE Id = '$Id'";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">A sua notícia foi editada com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o cadastro da notícia!</font></div>";
}
 
?>
      </span><br />
      </p>
      </td>
    </tr>
  </table>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
