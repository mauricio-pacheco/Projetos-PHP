<?php include("verifica.php"); ?>
<?php include("meta.php"); ?>
<style type="text/css">
@import url("dn.css");
</style>
<link rel="stylesheet" href="dns.css" type="text/css" media="print" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #333333}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>
<body>
<div id="conteudo">
<div id="ultratopo"></div>
<fieldset id="pagina">
  <div id="esquerda"></div>
<?php include("centro2.php"); ?>
<style type="text/css">
<!--
.style4 {color: #006600}
.style6 {font-size: 12px}
.style7 {color: #666666}
.style8 {color: #FF0000}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
 <?php include("menu.php"); ?>
<p>&nbsp;</p>
<p>
  <?php
include "conexao.php";

$campos = 21;

for($i=0;$i<$campos;$i++){

if (empty( $_FILES["foto". $i]["name"] ) ) {
$nome_foto = '1';	
}

else

{

$arquivo = isset($_FILES["foto" . $i]) ? $_FILES["foto" . $i] : FALSE;
$max_image_x = 640;
$max_image_y = 480;
$diretorio = 'veiculos/';
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
            
            $nome_foto  = ($i . 'imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome &uacute;nico para foto
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
$diretoriomenor1 = 'veiculosmenor/';
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
            
            $nome_fotomenor1  =  ($i . 'imagemmenor_menor1' . time() . '.' . verifica_extensao_imagemenor1($arquivomenor1));// nome &Atilde;&ordm;nico para foto
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





$idveiculo = $_POST["idveiculo"];


$sql = "INSERT INTO fotosveiculos (idveiculo, foto, fotomenor) VALUES ('$idveiculo', '$nome_foto', '$nome_fotomenor1')";


if(mysql_query($sql)) {
echo "<script>alert('SUAS FOTOS FORAM ENVIADAS COM SUCESSO!')</script>";
echo "<script>location.href='imagemveiculo.php?id=$idveiculo'</script>";
}else{
echo "N&atilde;o foi possivel efetuar o cadastro!";
}
}

 
?>
<p>&nbsp;</p>
<p></p>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>
</fieldset>

<div id="rodape">
<div id="coor">
 <?php include("baixo.php"); ?> 
</div>
</div></div>
</body>
</html>