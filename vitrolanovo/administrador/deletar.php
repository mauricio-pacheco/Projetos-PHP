<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<title>Administra&ccedil;&atilde;o Vitrola</title>
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
.style19 {color: #000000; font-size: 14px; }
.style20 {	color: #000000;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style></head>

<body>
<div align="center">
  <p><a href="admnews.php">ADMINISTRA&Ccedil;&Atilde;O NEWSLETTER</a></p>
  <p><img src="logol.jpg" width="154" height="160" /></p>
  <p class="style1">Administra&ccedil;&atilde;o Galeria de Fotos</p>
  <p class="style1"><a href="fotos.php">INSERIR GALERIA</a> ------- <a href="editargaleria.php">EDITAR GALERIA</a> -------<a href="apagargalerias.php">APAGAR GALERIA</a></p>
  <p class="style1"><a href="enviarfotos.php">INSERIR FOTOS</a> ------- <a href="apagarfotos.php">APAGAR FOTOS</a></p>
  <p class="style1">Administra&ccedil;&atilde;o Not&iacute;cias</p>
  <p class="style1"><a href="index.php">INSERIR NOT&Iacute;CIA</a> ------- <a href="editar.php">EDITAR NOT&Iacute;CIAS</a> ------- <a href="deletar.php">DELETAR NOT&Iacute;CIAS</a></p>
 <table width="700" border="0">
    <tr>
      <td><p align="center" class="style20 style3">SELECIONE A NOT&Iacute;CIA PARA EDITAR<span class="style3"><br />
        </span>
        </p>
        <table width="100%" border="0" align="center">
          <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM noticias ORDER BY Id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃ¡ algum registro na tabela, caso nÃ£o houver, ele mostrarÃ¡ a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N�o existe not�cias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃ¡ os registros. OBS: VocÃª pode mudar o modo de exibir os registros
     //mais nÃ£o mude nenhuma variÃ¡vel, a nÃ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
          <tr>
            <td width="85%" class="style3"><div align="left"><span class="style19"><?php echo $n["Id"]; ?> - <?php echo $n["titulo"]; ?></span></div></td>
            <td width="10%" class="style3"><div align="left"><span class="style19"><a href="apagarnoticia.php?Id=<?php echo $n["Id"]; ?>" onClick="return confirm('Tem certeza que deseja apagar a not�cia <?php echo $n["titulo"]; ?> ?')">DELETAR</a></span></div></td>
            <td width="5%" class="style3"><div align="left"><a href="apagarnoticia.php?Id=<?php echo $n["Id"]; ?>" onClick="return confirm('Tem certeza que deseja apagar a not�cia <?php echo $n["titulo"]; ?> ?')"><img src="apagar.gif" border="0" /></a></div></td>
          </tr>
          <?
  }
  }
 ?>
        </table>        <p align="center" class="style3"><span class="style3"><br />
        </span>      </p>      </td>
    </tr>
  </table>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
