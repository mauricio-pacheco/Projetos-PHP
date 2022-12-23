<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Westphalen Motos - Concessionária Honda</TITLE><LINK href="home_arquivos/asw.css" 
type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<META content="MSHTML 6.00.6000.16386" name=GENERATOR>
<style type="text/css">
<!--
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
.style24 {color: #FEDC01}
.style16 {color: #333333}
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</HEAD>
<BODY>
<DIV id=asw>
<DIV id=pagina>
<DIV id=topo>
<H1 id=logo>Westphalen Motos</H1>
<UL>
  <LI></LI>
  <LI></LI>
</UL>
</DIV>
<DIV id=menu>
<?php include("menuadm.php"); ?></DIV>
<P align="center" class=destaque>Setor Administrativo Westphalen Motos</P>
<P align="center" class=destaque>&nbsp;</P>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">CADASTRAR MOTO</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?
include "conexao.php";


$arquivo0 = isset($_FILES["fotomenor"]) ? $_FILES["fotomenor"] : FALSE;
$max_image_x0 = 120;
$max_image_y0 = 90;
$diretorio0 = 'fotosmenorpm/';
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
            
            $nome_foto0  = ('imagemmenor0_' . time() . '.' . verifica_extensao_image0($arquivo0));// nome Ãºnico para foto
            $endFoto0 = $diretorio0 . $nome_foto0;
            if(reduz_imagem0($arquivo0['tmp_name'], $max_image_x0, $max_image_y0, $endFoto0))
            {
                $err0 = TRUE;
            }  
        }
    }
}


$arquivo1 = isset($_FILES["foto1"]) ? $_FILES["foto1"] : FALSE;
$max_image_x1 = 640;
$max_image_y1 = 480;
$diretorio1 = 'fotospm/';
if($arquivo1)
{
    $tamanho1 = getimagesize($arquivo1["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes1.php";
    $err = FALSE;
    if(is_uploaded_file($arquivo1['tmp_name']))
    {
        if(verifica_image1($arquivo1))
        {
            $tamanho1 = getimagesize($arquivo1["tmp_name"]);
            $dimensiona1 = verifica_dimensao_image1($arquivo1, $max_image_x1, $max_image_y1);
            if($dimensiona1 != '')
            {
                if($dimensiona1 == 'altura')
                {
                        $auxImage1 = $max_image_x1;
                        $max_image_x1 = $max_image_y1;
                        $max_image_y1 = $auxImage1;
                }
            }
            else
            {
                $max_image_x1 = $tamanho1[0];
                $max_image_y1 = $tamanho1[1];
            }
            
            $nome_foto1  = ('imagem1_' . time() . '.' . verifica_extensao_image1($arquivo1));// nome único para foto
            $endFoto1 = $diretorio1 . $nome_foto1;
            if(reduz_imagem1($arquivo1['tmp_name'], $max_image_x1, $max_image_y1, $endFoto1))
            {
                $err1 = TRUE;
            }  
        }
    }
}


$arquivo2 = isset($_FILES["foto2"]) ? $_FILES["foto2"] : FALSE;
$max_image_x2 = 640;
$max_image_y2 = 480;
$diretorio2 = 'fotospm/';
if($arquivo2)
{
    $tamanho2 = getimagesize($arquivo2["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes2.php";
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
            
            $nome_foto2  = ('imagem2_' . time() . '.' . verifica_extensao_image2($arquivo2));// nome único para foto
            $endFoto2 = $diretorio2 . $nome_foto2;
            if(reduz_imagem2($arquivo2['tmp_name'], $max_image_x2, $max_image_y2, $endFoto2))
            {
                $err2 = TRUE;
            }  
        }
    }
}


$arquivo3 = isset($_FILES["foto3"]) ? $_FILES["foto3"] : FALSE;
$max_image_x3 = 640;
$max_image_y3 = 480;
$diretorio3 = 'fotospm/';
if($arquivo3)
{
    $tamanho3 = getimagesize($arquivo3["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes3.php";
    $err3 = FALSE;
    if(is_uploaded_file($arquivo3['tmp_name']))
    {
        if(verifica_image3($arquivo3))
        {
            $tamanho3 = getimagesize($arquivo3["tmp_name"]);
            $dimensiona3 = verifica_dimensao_image3($arquivo3, $max_image_x3, $max_image_y3);
            if($dimensiona3 != '')
            {
                if($dimensiona3 == 'altura')
                {
                        $auxImage3 = $max_image_x3;
                        $max_image_x3 = $max_image_y3;
                        $max_image_y3 = $auxImage3;
                }
            }
            else
            {
                $max_image_x3 = $tamanho3[0];
                $max_image_y3 = $tamanho3[1];
            }
            
            $nome_foto3  = ('imagem3_' . time() . '.' . verifica_extensao_image3($arquivo3));// nome único para foto
            $endFoto3 = $diretorio3 . $nome_foto3;
            if(reduz_imagem3($arquivo3['tmp_name'], $max_image_x3, $max_image_y3, $endFoto3))
            {
                $err3 = TRUE;
            }  
        }
    }
}


$arquivo4 = isset($_FILES["foto4"]) ? $_FILES["foto4"] : FALSE;
$max_image_x4 = 640;
$max_image_y4 = 480;
$diretorio4 = 'fotospm/';
if($arquivo4)
{
    $tamanho4 = getimagesize($arquivo4["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes4.php";
    $err4 = FALSE;
    if(is_uploaded_file($arquivo4['tmp_name']))
    {
        if(verifica_image4($arquivo4))
        {
            $tamanho4 = getimagesize($arquivo4["tmp_name"]);
            $dimensiona4 = verifica_dimensao_image4($arquivo4, $max_image_x4, $max_image_y4);
            if($dimensiona4 != '')
            {
                if($dimensiona4 == 'altura')
                {
                        $auxImage4 = $max_image_x4;
                        $max_image_x4 = $max_image_y4;
                        $max_image_y4 = $auxImage4;
                }
            }
            else
            {
                $max_image_x4 = $tamanho4[0];
                $max_image_y4 = $tamanho4[1];
            }
            
            $nome_foto4  = ('imagem4_' . time() . '.' . verifica_extensao_image4($arquivo4));// nome único para foto
            $endFoto4 = $diretorio4 . $nome_foto4;
            if(reduz_imagem4($arquivo4['tmp_name'], $max_image_x4, $max_image_y4, $endFoto4))
            {
                $err4 = TRUE;
            }  
        }
    }
}

$arquivo5 = isset($_FILES["foto5"]) ? $_FILES["foto5"] : FALSE;
$max_image_x5 = 640;
$max_image_y5 = 480;
$diretorio5 = 'fotospm/';
if($arquivo5)
{
    $tamanho5 = getimagesize($arquivo5["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes5.php";
    $err5 = FALSE;
    if(is_uploaded_file($arquivo5['tmp_name']))
    {
        if(verifica_image5($arquivo5))
        {
            $tamanho5 = getimagesize($arquivo5["tmp_name"]);
            $dimensiona5 = verifica_dimensao_image5($arquivo5, $max_image_x5, $max_image_y5);
            if($dimensiona5 != '')
            {
                if($dimensiona5 == 'altura')
                {
                        $auxImage5 = $max_image_x5;
                        $max_image_x5 = $max_image_y5;
                        $max_image_y5 = $auxImage5;
                }
            }
            else
            {
                $max_image_x5 = $tamanho5[0];
                $max_image_y5 = $tamanho5[1];
            }
            
            $nome_foto5  = ('imagem5_' . time() . '.' . verifica_extensao_image5($arquivo5));// nome único para foto
            $endFoto5 = $diretorio5 . $nome_foto5;
            if(reduz_imagem5($arquivo5['tmp_name'], $max_image_x5, $max_image_y5, $endFoto5))
            {
                $err5 = TRUE;
            }  
        }
    }
}


$arquivo6 = isset($_FILES["foto6"]) ? $_FILES["foto6"] : FALSE;
$max_image_x6 = 640;
$max_image_y6 = 480;
$diretorio6 = 'fotospm/';
if($arquivo6)
{
    $tamanho6 = getimagesize($arquivo6["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes6.php";
    $err6 = FALSE;
    if(is_uploaded_file($arquivo6['tmp_name']))
    {
        if(verifica_image6($arquivo6))
        {
            $tamanho6 = getimagesize($arquivo6["tmp_name"]);
            $dimensiona6 = verifica_dimensao_image6($arquivo6, $max_image_x6, $max_image_y6);
            if($dimensiona6 != '')
            {
                if($dimensiona6 == 'altura')
                {
                        $auxImage6 = $max_image_x6;
                        $max_image_x6 = $max_image_y6;
                        $max_image_y6 = $auxImage6;
                }
            }
            else
            {
                $max_image_x6 = $tamanho6[0];
                $max_image_y6 = $tamanho6[1];
            }
            
            $nome_foto6  = ('imagem6_' . time() . '.' . verifica_extensao_image6($arquivo6));// nome único para foto
            $endFoto6 = $diretorio6 . $nome_foto6;
            if(reduz_imagem6($arquivo6['tmp_name'], $max_image_x6, $max_image_y6, $endFoto6))
            {
                $err6 = TRUE;
            }  
        }
    }
}

$cidade = $_POST["cidade"];
$modelo = $_POST["modelo"];
$estado = $_POST["estado"];
$ano = $_POST["ano"];
$cor = $_POST["cor"];
$descricao = $_POST["descricao"];



$sql = "INSERT INTO produtos (cidade, modelo, estado, ano, cor, descricao, fotomenor, foto1, foto2, foto3, foto4, foto5, foto6) VALUES ('$cidade', '$modelo', '$estado', '$ano', '$cor', '$descricao', '$nome_foto0', '$nome_foto1', '$nome_foto2', '$nome_foto3', '$nome_foto4', '$nome_foto5', '$nome_foto6')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O produto foi cadastrado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o cadastro!</font></div>";
}

?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<P align="center" class=destaque>&nbsp;</P>
</DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
