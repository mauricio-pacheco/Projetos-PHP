<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Blogs Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<p align="center"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
<div align="center">
  <p class="style1">BLOGS LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="blog.php">ENVIAR BLOG</a> ------ <a href="deletarblogs.php">APAGAR BLOG</a></span></p>
</div>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
include "conexao.php";


$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 172;
$max_image_y = 191;
$diretorio = 'imagensblog/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesnoticias.php";
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


$titulo = $_POST["titulo"];
$link = $_POST["link"];
$descricao = $_POST["descricao"];



$sql = "INSERT INTO cw_blogs (titulo, link, descricao, foto) VALUES ('$titulo', '$link', '$descricao', '$nome_foto')";
if(mysql_query($sql)) {
echo "<div align=center class=fontetabela><br>O BLOG FOI CADASTRADO COM SUCESSO!!</div>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}
 
?></td>
  </tr>
</table>
</body>
</html>
