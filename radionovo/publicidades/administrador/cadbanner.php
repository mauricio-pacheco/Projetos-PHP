<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Luz e Alegria - Publicidades</title>
<style type="text/css">
<!--
.manchete_texto {
	font-family: Verdana, Geneva, sans-serif; font-size:10px
}

-->
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td align="center"><img src="complexo.jpg" width="560" height="88" /><p><a href="principal.php"><font color="#000000">CADASTRAR BANNER</font></a> ---- <a href="admbanners.php"><font color="#000000">APAGAR BANNERS</font></a></p><br /></td>
  </tr>
</table>
<table width="700" border="0" align="center">
  <tr>
    <td><table width="100%" border="0" align="center">
      <tr>
        <td><?php
include "conexao.php";

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 310;
$max_image_y = 450;
$diretorio = 'pub/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesgalerias.php";
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



$link = $_POST["link"];
$titulo = $_POST["titulo"];
$banner = $_POST["banner"];
$texto = $_POST["texto"];



$sql = "INSERT INTO publicidades (link, foto, titulo, banner, texto) VALUES ('$link', '$nome_foto', '$titulo', '$banner', '$texto')";
if(mysql_query($sql)) {
echo "<div align=center class=manchete_texto><br>O BANNER FOI CADASTRADO COM SUCESSO!!</div>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}
 
?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>