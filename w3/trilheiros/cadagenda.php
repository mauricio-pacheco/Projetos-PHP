<?php require("verifica.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br">
<head>
<title>Associa&ccedil;&atilde;o Moto Clube Trilheiros do Barril</title>
<meta name="description" content="Descrição">
<meta name="keywords" content="palavras chave">
<meta name="classification" content="Internet" />
<meta name="language" content="br" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="7 Dias" />
<meta name="robots" content="index, follow" />
<meta name="author" content="dnimports.com.br">
<meta name="robots" content="index, follow, all" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="e.ico" type="image/x-icon" />
<link rel="shortcut icon" href="e.ico" type="image/x-icon" />
<style type="text/css">
@import url("home_arquivos/barroide.css");
</style>
<STYLE type=text/css>
.style5 {
	font-size: 9px
}
.style7 {
	font-size: 14px;
	font-family: Verdana;
	color: #ffffff;
}
.style8 {font-size: 14}
.style9 {color: #FFFFFF}
.style15 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style17 {color: #FFFFFF; font-size: 10px; }
.style19 {color: #FFFFFF; font-size: 14px; }
</STYLE>
</HEAD>
<BODY>
<table width="778" height="32" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828" >
  <tbody>
    <tr>
      <td width="756" height="32" background="home_arquivos/trilhabaixo.jpg" bgcolor="#000000" class="style8"><div align="center" class="style7">Setor Administrativo do Site</div></td>
    </tr>
  </tbody>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
                  <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>


<TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><div align="center">
                       <style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<?php include("menuadm.php"); ?>
                        <table width="98%" border="0">
                          <tr>
                            <td><div align="center">
                              <hr>
                              <p>
                                <?php include("menuadmagenda.php"); ?>
                              </p>
                              <p><span class="style19">Cadastrar Evento</span></p>
                              <p><span class="style17">* Campos Obrigat&oacute;rios</span></p>
                              <table width="98%" border="0">
                                <tr>
                                  <td><p align="center" class="style19"><img src="home_arquivos/logotrilha.jpg" width="121" height="120"></p>
                                    <p align="center" class="style19"><?
include "conexao.php";


if (empty( $_FILES["foto"]["name"] ) ) {
$nome_foto = '';	
}

else

{

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 160;
$max_image_y = 120;
$diretorio = 'fotosagenda/';
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
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome único para foto
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

if (empty( $_FILES["fotogrande"]["name"] ) ) {
$nome_fotomenor1 = '';	
}

else

{
	
$arquivomenor1 = isset($_FILES["fotogrande"]) ? $_FILES["fotogrande"] : FALSE;
$max_image_xmenor1 = 720;
$max_image_ymenor1 = 540;
$diretoriomenor1 = 'fotosagendamaior/';
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
            
            $nome_fotomenor1  =  ('imagemmenor_menor1' . time() . '.' . verifica_extensao_imagemenor1($arquivomenor1));// nome Ãºnico para foto
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

$assunto = $_POST["assunto"];
$local = $_POST["local"];
$dataevento = $_POST["dataevento"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$sql = "INSERT INTO agenda (assunto, local, dataevento, texto, data, hora, foto, fotomaior) VALUES ('$assunto', '$local', '$dataevento', '$texto', '$data', '$hora', '$nome_foto', '$nome_fotomenor1')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu Evento foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">No foi possivel efetuar o seu cadastro!</font></div>";
}
 
?></p>
                                    </td>
                                </tr>
                              </table>
                              </div></td>
                          </tr>
                        </table>
                        </div></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<TABLE width=778 height="32" border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828" ><TBODY>
  <TR>
    <TD width=756 height="32" background="home_arquivos/trilhabaixo.jpg" bgColor=#000000><div align="center" class="texto_html style5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; 
      <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
    Moto Clube Trilheiros do Barril - Desenv.: <a href="http://www.w3propaganda.com" target="_blank"><font color=#FCDB00>W3</font></a></div></TD>
</TR></TBODY></TABLE>
</BODY>
</HTML>
