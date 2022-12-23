<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR ENQUETE</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><?php
include "conexao.php";

echo "<font color=#ffffff>";

$arquivo1 = isset($_FILES["foto1"]) ? $_FILES["foto1"] : FALSE;
$max_image_x1 = 320;
$max_image_y1 = 240;
$diretorio1 = 'ups/fotosenquetes/';
if($arquivo1)
{
    $tamanho1 = getimagesize($arquivo1["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes1.php";
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
            
            $nome_foto1  = ('imagem1_' . time() . '.jpg' . verifica_extensao_image1($arquivo1));// nome único para foto
            $endFoto1 = $diretorio1 . $nome_foto1;
            if(reduz_imagem1($arquivo1['tmp_name'], $max_image_x1, $max_image_y1, $endFoto1))
            {
                $err1 = TRUE;
            }  
        }
    }
}


$arquivo2 = isset($_FILES["foto2"]) ? $_FILES["foto2"] : FALSE;
$max_image_x2 = 320;
$max_image_y2 = 240;
$diretorio2 = 'ups/fotosenquetes/';
if($arquivo2)
{
    $tamanho2 = getimagesize($arquivo2["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes2.php";
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
            
            $nome_foto2  = ('imagem2_' . time() . '.jpg' . verifica_extensao_image2($arquivo2));// nome único para foto
            $endFoto2 = $diretorio2 . $nome_foto2;
            if(reduz_imagem2($arquivo2['tmp_name'], $max_image_x2, $max_image_y2, $endFoto2))
            {
                $err2 = TRUE;
            }  
        }
    }
}


$arquivo3 = isset($_FILES["foto3"]) ? $_FILES["foto3"] : FALSE;
$max_image_x3 = 320;
$max_image_y3 = 240;
$diretorio3 = 'ups/fotosenquetes/';
if($arquivo3)
{
    $tamanho3 = getimagesize($arquivo3["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes3.php";
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
$max_image_x4 = 320;
$max_image_y4 = 240;
$diretorio4 = 'ups/fotosenquetes/';
if($arquivo4)
{
    $tamanho4 = getimagesize($arquivo4["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes4.php";
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
$max_image_x5 = 320;
$max_image_y5 = 240;
$diretorio5 = 'ups/fotosenquetes/';
if($arquivo5)
{
    $tamanho5 = getimagesize($arquivo5["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes5.php";
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
$max_image_x6 = 320;
$max_image_y6 = 240;
$diretorio6 = 'ups/fotosenquetes/';
if($arquivo6)
{
    $tamanho6 = getimagesize($arquivo6["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes6.php";
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

	
	
	
	
	
$arquivo7 = isset($_FILES["foto7"]) ? $_FILES["foto7"] : FALSE;
$max_image_x7 = 320;
$max_image_y7 = 240;
$diretorio7 = 'ups/fotosenquetes/';
if($arquivo7)
{
    $tamanho7 = getimagesize($arquivo7["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes7.php";
    $err7 = FALSE;
    if(is_uploaded_file($arquivo7['tmp_name']))
    {
        if(verifica_image7($arquivo7))
        {
            $tamanho7 = getimagesize($arquivo7["tmp_name"]);
            $dimensiona7 = verifica_dimensao_image7($arquivo7, $max_image_x7, $max_image_y7);
            if($dimensiona7 != '')
            {
                if($dimensiona7 == 'altura')
                {
                        $auxImage7 = $max_image_x7;
                        $max_image_x7 = $max_image_y7;
                        $max_image_y7 = $auxImage7;
                }
            }
            else
            {
                $max_image_x7 = $tamanho7[0];
                $max_image_y7 = $tamanho7[1];
            }
            
            $nome_foto7  = ('imagem7_' . time() . '.' . verifica_extensao_image7($arquivo7));// nome único para foto
            $endFoto7 = $diretorio7 . $nome_foto7;
            if(reduz_imagem7($arquivo7['tmp_name'], $max_image_x7, $max_image_y7, $endFoto7))
            {
                $err7 = TRUE;
            }  
        }
    }
}	
	
	
	
	
	
$arquivo8 = isset($_FILES["foto8"]) ? $_FILES["foto8"] : FALSE;
$max_image_x8 = 320;
$max_image_y8 = 240;
$diretorio8 = 'ups/fotosenquetes/';
if($arquivo8)
{
    $tamanho8 = getimagesize($arquivo8["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes8.php";
    $err8 = FALSE;
    if(is_uploaded_file($arquivo8['tmp_name']))
    {
        if(verifica_image8($arquivo8))
        {
            $tamanho8 = getimagesize($arquivo8["tmp_name"]);
            $dimensiona8 = verifica_dimensao_image8($arquivo8, $max_image_x8, $max_image_y8);
            if($dimensiona8 != '')
            {
                if($dimensiona8 == 'altura')
                {
                        $auxImage8 = $max_image_x8;
                        $max_image_x8 = $max_image_y8;
                        $max_image_y8 = $auxImage8;
                }
            }
            else
            {
                $max_image_x8 = $tamanho8[0];
                $max_image_y8 = $tamanho8[1];
            }
            
            $nome_foto8  = ('imagem8_' . time() . '.' . verifica_extensao_image8($arquivo8));// nome único para foto
            $endFoto8 = $diretorio8 . $nome_foto8;
            if(reduz_imagem8($arquivo8['tmp_name'], $max_image_x8, $max_image_y8, $endFoto8))
            {
                $err8 = TRUE;
            }  
        }
    }
}		
	
	
	
	
$arquivo9 = isset($_FILES["foto9"]) ? $_FILES["foto9"] : FALSE;
$max_image_x9 = 320;
$max_image_y9 = 240;
$diretorio9 = 'ups/fotosenquetes/';
if($arquivo9)
{
    $tamanho9 = getimagesize($arquivo9["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes9.php";
    $err9 = FALSE;
    if(is_uploaded_file($arquivo9['tmp_name']))
    {
        if(verifica_image9($arquivo9))
        {
            $tamanho9 = getimagesize($arquivo9["tmp_name"]);
            $dimensiona9 = verifica_dimensao_image9($arquivo9, $max_image_x9, $max_image_y9);
            if($dimensiona9 != '')
            {
                if($dimensiona9 == 'altura')
                {
                        $auxImage9 = $max_image_x9;
                        $max_image_x9 = $max_image_y9;
                        $max_image_y9 = $auxImage9;
                }
            }
            else
            {
                $max_image_x9 = $tamanho9[0];
                $max_image_y9 = $tamanho9[1];
            }
            
            $nome_foto9  = ('imagem9_' . time() . '.' . verifica_extensao_image9($arquivo9));// nome único para foto
            $endFoto9 = $diretorio9 . $nome_foto9;
            if(reduz_imagem9($arquivo9['tmp_name'], $max_image_x9, $max_image_y9, $endFoto9))
            {
                $err9 = TRUE;
            }  
        }
    }
}		
	
	
	
	
	
	
$arquivo10 = isset($_FILES["foto10"]) ? $_FILES["foto10"] : FALSE;
$max_image_x10 = 320;
$max_image_y10 = 240;
$diretorio10 = 'ups/fotosenquetes/';
if($arquivo10)
{
    $tamanho10 = getimagesize($arquivo10["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoesfotos/funcoes10.php";
    $err10 = FALSE;
    if(is_uploaded_file($arquivo10['tmp_name']))
    {
        if(verifica_image10($arquivo10))
        {
            $tamanho10 = getimagesize($arquivo10["tmp_name"]);
            $dimensiona10 = verifica_dimensao_image10($arquivo10, $max_image_x10, $max_image_y10);
            if($dimensiona10 != '')
            {
                if($dimensiona10 == 'altura')
                {
                        $auxImage10 = $max_image_x10;
                        $max_image_x10 = $max_image_y10;
                        $max_image_y10 = $auxImage10;
                }
            }
            else
            {
                $max_image_x10 = $tamanho10[0];
                $max_image_y10 = $tamanho10[1];
            }
            
            $nome_foto10  = ('imagem10_' . time() . '.' . verifica_extensao_image10($arquivo10));// nome único para foto
            $endFoto10 = $diretorio10 . $nome_foto10;
            if(reduz_imagem10($arquivo10['tmp_name'], $max_image_x10, $max_image_y10, $endFoto10))
            {
                $err10 = TRUE;
            }  
        }
    }
}		
	
echo "</font>";


$pergunta = $_POST["pergunta"];
$op1 = $_POST["op1"];
$op2 = $_POST["op2"];
$op3 = $_POST["op3"];
$op4 = $_POST["op4"];
$op5 = $_POST["op5"];
$op6 = $_POST["op6"];
$op7 = $_POST["op7"];
$op8 = $_POST["op8"];
$op9 = $_POST["op9"];
$op10 = $_POST["op10"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

$sql = "INSERT INTO cw_enquetes (pergunta, op1, op2, op3, op4, op5, op6, op7, op8, op9, op10, foto1, foto2, foto3, foto4, foto5, foto6, foto7, foto8, foto9, foto10, data, hora) VALUES ('$pergunta', '$op1', '$op2', '$op3', '$op4', '$op5', '$op6', '$op7', '$op8', '$op9', '$op10', '$nome_foto1', '$nome_foto2', '$nome_foto3', '$nome_foto4', '$nome_foto5', '$nome_foto6', '$nome_foto7', '$nome_foto8', '$nome_foto9', '$nome_foto10', '$data', '$hora')";
if(mysql_query($sql)) {
echo "<script>location.href='encerraenquete.php'</script>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}
 
?></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>