<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../style.css" type=text/css rel=stylesheet>
<title>Patrocinios</title>
<style type="text/css">
<!--
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; }
.style25 {color: #000000}
.style27 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style>
</head>

<body>
<table width="540" height="220" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="letreiro2"><div align="center"><a href="index.php">ENVIAR PATROCINADOR</a> <span class="style25">------</span> <a href="deletar.php">DELETAR PATROCINADOR</a></div></td>
  </tr>
  <tr>
    <td width="67%" valign="top" class="letreiro2">
      <table width="70%" border="0" align="center">
        <tr>
          <td><div align="center"><span class="style19">
            <?
include "conexao.php";


$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 170;
$max_image_y = 120;
$diretorio = 'logos/';
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
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome &uacute;nico para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}


$link = $_POST["link"];
$descricao = $_POST["descricao"];


$sql = "INSERT INTO patrocinio (link, descricao, foto) VALUES ('$link', '$descricao', '$nome_foto')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu patrocinador foi cadastrado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o foi possivel efetuar o cadastro do patrocinador!</font></div>";
}
 
?>
          </span></div></td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>