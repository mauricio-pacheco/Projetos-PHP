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
.style19 {color: #FFFFFF; font-size: 14px; }
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
 <table width="700" border="0">
    <tr>
      <td><p align="center"><span class="style19">
        <?
include "conexao.php";

$id = $_GET['id'];
$titulo = $_GET['titulo'];
$foto = $_GET['foto'];
$fotomenor = $_GET['fotomenor'];
$recua = $_GET['recua'];


$query = mysql_query("DELETE FROM fotos WHERE id='$id'");
unlink("fotospm/$foto");
unlink("fotosmenorpm/$fotomenor");
if ($query)  
{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Foto deletada com sucesso!</font></div>";
}else{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possível deletar a foto.</font></div>";
}
?>
      </span></p>
        <p align="center"><a href="admapagafoto.php?id=<?php echo $recua; ?>">VOLTAR</a></p>        <p align="center" class="style3">
      </p>
      </td>
    </tr>
  </table>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
