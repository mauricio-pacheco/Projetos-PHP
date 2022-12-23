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
  <form name="form1" action="editacadnoticia.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)"><table width="700" border="0">
    <tr>
      <td><p align="left" class="style3">
        <?php

include "conexao.php";

$Id = $_GET['Id'];

$sql = mysql_query("SELECT * FROM noticias WHERE Id='$Id' ORDER BY Id");
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
        <input name="Id" type="hidden" value="<?php echo $n["Id"]; ?>" />
<br />
          <span class="style15">T&iacute;tulo da Not&iacute;cia:
          <input name="titulo" type="text" class="caixacontato" value="<?php echo $n["titulo"]; ?>" size="60" />
        *</span></p>
        <p align="left" class="style3"><span class="style15">Selecione o T&oacute;pico:
            <select name="topico" id="topico">
              <option value="M&uacute;sica">M&uacute;sica</option>
              <option value="Filmes">Filmes</option>
              <option value="Livros">Livros</option>
              <option value="Geral">Geral</option>
            </select>
        </span></p>
        <p align="left" class="style3"><span class="style15">Enviar imagens GRANDES para o servidor: </span> </p>
        <p align="left" class="style3">
          <iframe marginwidth="0" marginheight="0" src="enviafoto.php" frameborder="0" width="520" scrolling="No" height="30"></iframe>
      </p>        
        <p align="left" class="style3"><span class="style1">Texto Curto ( LEGENDA):</span> OBS: Modelo legenda para colocar c&oacute;digo fonte do EDITOR</p>
        <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
          <tr>
            <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&lt;p class=&quot;MsoNormal&quot; style=&quot;margin: 0cm 0cm 0pt&quot;&gt;&lt;img height=&quot;235&quot;   alt=&quot;&quot; width=&quot;160&quot; align=&quot;left&quot; border=&quot;1&quot;   src=&quot;/varias/image/ultima-parada-174-1.jpg&quot; /&gt;&lt;/p&gt;<br />
                    &lt;p   class=&quot;MsoNormal&quot; style=&quot;margin: 0cm 0cm 0pt 240px; text-align:   justify&quot;&gt;&lt;em&gt;&lt;span style=&quot;font-family: Verdana&quot;&gt;&lt;span   style=&quot;font-size: 8pt&quot;&gt;Baseado na hist&amp;oacute;ria real de um sobrevivente   de uma chacina no Rio de Janeiro.Fala sobre a vida de um ex menor de rua,   assaltante e que cometeu o seq&amp;uuml;estro do &amp;ocirc;nibus da linha 174,   em junho de 2000, no Rio de Janeiro. O ponto central do filme n&amp;atilde;o   &amp;eacute; a trag&amp;eacute;dia, mas o desfecho da vida de pessoas que se   cruzam em um ambiente marcado pela viol&amp;ecirc;ncia, pobreza e falta de   perspectivas.&lt;/span&gt;&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;</td>
                </tr>
            </table></td>
          </tr>
        </table>
        <p align="left" class="style3">&nbsp;</p>
        <div align="left" class="style3">
          <?php
									$editor = new FCKeditor("legenda");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "700";
									$editor->Height = "360";
									$editor->Value = "$n[legenda]";
									$editor->Create();
									?>
        </div>
        <p class="style16">Texto Extendido:</p>
        <div align="left" class="style3">
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
        <p align="center" class="style15"><span class="style17">
          <?
  }
  }
 ?>
        </span>
          <input type="submit" class="caixacontato" value="Editar Not�cia" />
  &nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
  </table></form>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
