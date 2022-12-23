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
.style2 {	color: #FFFFFF;
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
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
      <td><table width="70%" border="0" align="center">
        <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM galerias ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe galerias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
        <tr>
          <td width="9%"><font color="#FFFF00"><img src="capaspm/<?php echo $n["foto"]; ?>" /></font></td>
          <td width="73%"><span class="style2"><font color="#000000"><?php echo $n["titulo"]; ?></font></span></td>
          <td width="14%"><span class="style2"><a href="admeditargaleria.php?id=<?php echo $n["id"]; ?>"><font color="#000000">EDITAR</font></a></span></td>
          <td width="4%"><a href="admexcluirgaleria.php?id=<?php echo $n["id"]; ?>&amp;foto=<?php echo $n["foto"]; ?>" onclick="return confirm('Tem certeza que deseja apagar a galeria <?php echo $n["titulo"]; ?> ?')"><img src="apagar.gif" border="0" /></a></td>
        </tr>
        <?
  }
  }
 ?>
      </table>
      </td>
    </tr>
  </table>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
