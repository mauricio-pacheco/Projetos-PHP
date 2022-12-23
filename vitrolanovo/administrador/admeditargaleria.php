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
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
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
  <form action="updategaleria.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
    <table width="700" border="0">
      <tr>
        <td><p align="center" class="style3"><span class="style16">
          <?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM galerias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&fnof;&Acirc;&iexcl; algum registro na tabela, caso n&Atilde;&fnof;&Acirc;&pound;o houver, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe galerias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; os registros. OBS: Voc&Atilde;&fnof;&Acirc;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&fnof;&Acirc;&pound;o mude nenhuma vari&Atilde;&fnof;&Acirc;&iexcl;vel, a n&Atilde;&fnof;&Acirc;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
          <input name="id" type="hidden" value="<?php echo $n["id"]; ?>" />
Cadastrar Galeria</span><br />
          </p>
            <p align="left"><br />
                <span class="style16">T&iacute;tulo da Galeria:
                <input name="titulo" type="text" value="<?php echo $n["titulo"]; ?>" class="caixacontato" size="60" />
                  *</span></p>
          <p align="left"><span class="style16">Enviar imagem de capa da galeria: </span>
                <input type="file" name="foto" id="foto" class="caixacontato"/>
            </p>
          <p align="left"><span class="style16">Descri&ccedil;&atilde;o da Galeria:</span></p>
          <div align="left">
            <?php
									$editor = new FCKeditor("texto");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "700";
									$editor->Height = "360";
									$editor->Value = "$n[texto]";
									$editor->Create();
									?>
          </div>
          <p align="center" class="style17">
            <?
  }
  }
 ?>
              <input type="submit" class="caixacontato" value="Editar Galeria" />
            &nbsp;&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
