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
.style24 {color: #FEDC01}
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
  <form name="form1" action="cadfotos.php" method="post" enctype="multipart/form-data"><table width="700" border="0">
    <tr>
      <td><p align="center" class="style3"><span class="style19">Cadastrar Fotos</span><br />
      </p>
        <p align="left"><br />
          <span class="style19"><span class="style19">Selecione a Galeria: </span><span class="style24">
          <select class="caixacontato" 
                              name="galeria">
            <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM galerias ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe galerias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
            <option 
                              value="<?php echo $n["id"]; ?>"><?php echo $n["titulo"]; ?></option>
            <?
  }
  }
 ?>
          </select>
          </span></span></p>
        <p align="left"><span class="style19"><span class="style19">Enviar foto: </span></span>
            <input type="file" name="foto" class="caixacontato" id="foto" />
        </p>
        <p align="left"><span class="style1 style15">Descrição:</span></p>
        <p align="left">
          <textarea class="caixacontato" name="descricao" id="descricao" cols="45" rows="5"></textarea>
        </p>
        <p align="left"> <span class="style18">
          <input type="submit" class="caixacontato" value="Cadastrar Foto" />
        </span></p>
        <p>&nbsp;</p></td>
    </tr>
  </table></form>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
