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
    <td align="center"><img src="complexo.jpg" width="560" height="88" /><p><a href="principal.php"><font color="#000000">CADASTRAR BANNER</font></a> ---- <a href="admbanners.php"><font color="#000000">ADMINISTRAR BANNERS</font></a></p><br /></td>
  </tr>
</table>
<table width="700" border="0" align="center">
  <tr>
    <td><table width="100%" border="0" align="center">
      <tr>
        <td><?php
include "conexao.php";

$id = $_POST["id"];


$foto = $_POST["foto"];

// Validar Campo File Imagem Maior
if (empty( $_FILES['foto']['name'] ) ) {

$sql = mysql_query("SELECT * FROM publicidades WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto0 = "$t[foto]";
}

}
else
{

$arquivo0 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x0 = 310;
$max_image_y0 = 450;
$diretorio0 = 'pub/';
if($arquivo0)
{
    $tamanho0 = getimagesize($arquivo0["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes0.php";
    $err0 = FALSE;
    if(is_uploaded_file($arquivo0['tmp_name']))
    {
        if(verifica_image0($arquivo0))
        {
            $tamanho0 = getimagesize($arquivo0["tmp_name"]);
            $dimensiona0 = verifica_dimensao_image0($arquivo0, $max_image_x0, $max_image_y0);
            if($dimensiona0 != '')
            {
                if($dimensiona0 == 'altura')
                {
                        $auxImage0 = $max_image_x0;
                        $max_image_x0 = $max_image_y0;
                        $max_image_y0 = $auxImage0;
                }
            }
            else
            {
                $max_image_x0 = $tamanho0[0];
                $max_image_y0 = $tamanho0[1];
            }
            
            $nome_foto0  = ('imagemmenor0_' . time() . '.' . verifica_extensao_image0($arquivo0));// nome &Atilde;&ordm;nico para foto
            $endFoto0 = $diretorio0 . $nome_foto0;
            if(reduz_imagem0($arquivo0['tmp_name'], $max_image_x0, $max_image_y0, $endFoto0))
            {
                $err0 = TRUE;
            }  
        }
    }
}
}
// fim


$titulo = $_POST["titulo"];
$link = $_POST["link"];
$texto = $_POST["texto"];
$banner = $_POST["banner"];


$texto = str_replace("'","",$texto);
 
$sql = "UPDATE publicidades SET titulo = '$titulo', link = '$link', banner = '$banner', texto = '$texto', foto = '$nome_foto0' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "<div align=center><br><div align=center>O BANNER FOI EDITADO COM SUCESSO!!</div>";
}else{
$erro = mysql_error();
    echo "Ocorreu o seguinte erro: ", '"', $erro, '"';

}
 
?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>