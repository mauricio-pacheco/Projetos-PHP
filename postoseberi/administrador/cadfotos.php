<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-BR xml:lang="pt-BR" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Posto Seberi</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=pt-BR http-equiv=Content-language>
<META name=description 
content="Descrição">
<META name=keywords 
content="palavras, chave"><LINK rel="Shortcut icon" type=image/x-icon 
href="home_arquivos/favicon.ico">

<STYLE type=text/css>@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.18702"></HEAD>
<BODY>
<DIV id=layout>
<DIV id=topo>
<DIV id=topo-mg>
  <table width="100%" border="0">
    <tr>
      <td width="41%" valign="top"><img src="home_arquivos/logotipo.png"></td>
      <td width="23%">&nbsp;</td>
      <td width="36%"><img src="adm.png" width="300" height="80"></td>
    </tr>
  </table>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</DIV></DIV>
</DIV>
</DIV>
<DIV id=rodape>

<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top">
        <?php include("menu.php"); ?>
       </td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Enviar Fotos</b></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770">
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td align="left">&nbsp;<?php
include "conexao.php";

$campos = 21;

for($i=0;$i<$campos;$i++){
	
$comentario = $_POST["comentario".$i];	

if (empty( $_FILES["foto". $i]["name"] ) ) {
$nome_foto = '1';	
}

else

{

$arquivo = isset($_FILES["foto" . $i]) ? $_FILES["foto" . $i] : FALSE;
$max_image_x = 640;
$max_image_y = 480;
$diretorio = 'fotos/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos.php";
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
            
            $nome_foto  = ($i . 'imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome único para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}
}

// Fim Foto 1

if (empty( $_FILES["foto". $i]["name"] ) ) {
$nome_fotomenor1 = '1';	
}

else

{
	
$arquivomenor1 = isset($_FILES["foto" . $i]) ? $_FILES["foto" . $i] : FALSE;
$max_image_xmenor1 = 100;
$max_image_ymenor1 = 75;
$diretoriomenor1 = 'fotosmenor/';
if($arquivomenor1)
{
    $tamanhomenor1 = getimagesize($arquivomenor1["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfmenor.php";
    $errmenor1 = FALSE;
    if(is_uploaded_file($arquivomenor1['tmp_name']))
    {
        if(verifica_imagemenor1($arquivomenor1))
        {
            $tamanhomenor1 = getimagesize($arquivomenor1["tmp_name"]);
            $dimensionamenor1 = verifica_dimensao_imagemenor1($arquivomenor1, $max_image_xmenor1, $max_image_ymenor1);
            if($dimensionamenor1 != '')
            {
                if($dimensionamenor1 == 'altura')
                {
                        $auxImagemenor1 = $max_image_xmenor1;
                        $max_image_xmenor1 = $max_image_ymenor1;
                        $max_image_ymenor1 = $auxImagemenor1;
                }
            }
            else
            {
                $max_image_xmenor1 = $tamanhomenor1[0];
                $max_image_ymenor1 = $tamanhomenor1[1];
            }
            
            $nome_fotomenor1  =  ($i . 'imagemmenor_menor1' . time() . '.' . verifica_extensao_imagemenor1($arquivomenor1));// nome Ãºnico para foto
            $endFotomenor1 = $diretoriomenor1 . $nome_fotomenor1;
            if(reduz_imagemmenor1($arquivomenor1['tmp_name'], $max_image_xmenor1, $max_image_ymenor1, $endFotomenor1))
            {
                $errmenor1 = TRUE;
            }  
        }
    }
}
}
// Fim Foto 1 Menor


$idgaleria = $_POST["idgaleria"];


$sql = "INSERT INTO gestao_fotos (idgaleria, foto, fotomenor, comentario) VALUES ('$idgaleria', '$nome_foto', '$nome_fotomenor1' , '$comentario')";


if(mysql_query($sql)) {
echo "<script>alert('SUAS FOTOS FORAM ENVIADAS COM SUCESSO!')</script>";
echo "<script>location.href='fotos.php'</script>";
}else{
echo "NÃO FOI POSSÍVEL EFETUAR O CADASTRO!";
}
}

 
?>
                                                              </td>
                          </tr>
                        </table>
                       </td>
                      </tr>
                    </table>                   </td>
                  </tr>
                </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<DIV id=rodape-baixo>
  <DIV class=conteudo>
  <DIV id=direitos>
 <?php include("baixo.php"); ?><BR class=clr></DIV></DIV></DIV></DIV></BODY></HTML>
