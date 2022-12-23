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
      <td><p align="center" class="style3"><span class="style19">
        <?
include "conexao.php";


$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 640;
$max_image_y = 480;
$diretorio = 'fotospm/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes.php";
    $err = FALSE;
    if(is_uploaded_file($arquivo['tmp_name']))
    {
        if(verifica_image($arquivo))
        {
            $tamanho = getimagesize($arquivo["tmp_name"]);
            $dimensiona = verifica_dimensao_image($arquivo, $max_image_x, $max_image_y);
            if($dimensiona != '')
            {
                if($dimensiona == 'altura')
                {
                        $auxImage = $max_image_x;
                        $max_image_x = $max_image_y;
                        $max_image_y = $auxImage;
                }
            }
            else
            {
                $max_image_x = $tamanho[0];
                $max_image_y = $tamanho[1];
            }
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome único para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}


$arquivo2 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x2 = 100;
$max_image_y2 = 75;
$diretorio2 = 'fotosmenorpm/';
if($arquivo2)
{
    $tamanho2 = getimagesize($arquivo2["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes3.php";
    $err2 = FALSE;
    if(is_uploaded_file($arquivo2['tmp_name']))
    {
        if(verifica_image2($arquivo2))
        {
            $tamanho2 = getimagesize($arquivo2["tmp_name"]);
            $dimensiona2 = verifica_dimensao_image2($arquivo2, $max_image_x2, $max_image_y2);
            if($dimensiona2 != '')
            {
                if($dimensiona2 == 'altura')
                {
                        $auxImage2 = $max_image_x2;
                        $max_image_x2 = $max_image_y2;
                        $max_image_y2 = $auxImage2;
                }
            }
            else
            {
                $max_image_x2 = $tamanho2[0];
                $max_image_y2 = $tamanho2[1];
            }
            
            $nome_foto2  = ('imagemmenor_' . time() . '.' . verifica_extensao_image2($arquivo2));// nome Ãºnico para foto
            $endFoto2 = $diretorio2 . $nome_foto2;
            if(reduz_imagem2($arquivo2['tmp_name'], $max_image_x2, $max_image_y2, $endFoto2))
            {
                $err2 = TRUE;
            }  
        }
    }
}


$galeria = $_POST["galeria"];
$descricao = $_POST["descricao"];



$sql = "INSERT INTO fotos (galeria, descricao, foto, fotomenor) VALUES ('$galeria', '$descricao', '$nome_foto', '$nome_foto2')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">A sua Foto foi cadastrada com sucesso!!</font></div>";
}else{
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o cadastro da Foto!</font></div>";
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
