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

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 160;
$max_image_y = 120;
$diretorio = 'veiculointro/';
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
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome &uacute;nico para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}

$tipo = $_POST["tipo"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$lugares = $_POST["lugares"];
$categoria = $_POST["categoria"];
$bancada = $_POST["bancada"];
$condicionado = $_POST["condicionado"];
$bancada = $_POST["bancada"];
$modelo = $_POST["modelo"];
$descricao = $_POST["descricao"];


$sql = "INSERT INTO cadastro (tipo, nome, preco, lugares, categoria, bancada, condicionado, modelo, descricao, foto) VALUES ('$tipo', '$nome', '$preco', '$lugares', '$categoria', '$bancada', '$condicionado', '$modelo', '$descricao', '$nome_foto')";


if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO COM SUCESSO!')</script>";
echo "<script>location.href='admveiculos.php'</script>";
}else{
echo "N&atilde;o foi possivel efetuar o cadastro!";
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