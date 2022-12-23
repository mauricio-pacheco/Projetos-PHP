<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Arbaza</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/j.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/scripts.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/estilo.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/menu.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/estilo_int.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
.style3 {font-family: Tahoma, Arial}
.style5 {
	font-family: Tahoma, Arial;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-family: Tahoma, Arial; font-size: 11px; color: #333333; }
.style10 {color: #333333}
#apDiv1 {
	position:absolute;
	width:146px;
	height:56px;
	z-index:3;
	left: 114px;
	top: 816px;
}
.style13 {font-size: 11px; font-family: Tahoma; }
.style15 {font-size: 12px}
.style19 {font-size: 12px; font-family: Tahoma, Arial;}
.style20 {font-family: Tahoma, Arial; font-size: 12px; color: #333333; }
.style21 {font-family: Tahoma; color: #333333; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style23 {
	color: #333333;
	font-size: 11px;
	font-family: Tahoma;
}
.style27 {font-family: Tahoma; color: #D81E05; font-size: 11px; }
.style24 {color: #FEDC01}
.style35 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.style28 {	font-size: 10px;
	color: #FFFFFF;
}
.style29 {font-size: 10px}
.style30 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style31 {color: #FFCC33}
.style33 {color: #0099FF}
.style36 {	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
</HEAD>
<BODY>
<?php include("cima.php"); ?>
<TABLE id=conteudo cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD id=col_esquerda>
      <?php include("menu.php"); ?></TD>
    <TD id=meio><table width="100%" border="0" align="center">
      <tr>
        <td><img src="blank.gif" width="1" height="4"></td>
      </tr>
      <tr>
        <td><table width="98%" border="0" align="center">
          <tr>
            <td width="2%"><img src="share.gif" width="16" height="16"></td>
            <td width="98%"><font size="3">Fale Conosco</font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center">
          <tr>
            <td><p align="center">
              <br><?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
//s&oacute; para teste mas auterem essa parte para pegar os dados via post $_POST
$email     = "vendas@arbaza.com.br";
$nome      = $_POST["nome"];  
$cidade    = $_POST["cidade"]; 
$estado    = $_POST["estado"]; 
$telefone = $_POST["telefone"]; 
$email2     = $_POST["email2"]; 
$destinatario  = $_POST["destinatario"]; 
$assunto  = $_POST["assunto"]; 
$mensagem  = $_POST["mensagem"]; 

$anexos    = 0;
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens  = "--$boundary\n";    
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; 

$mens .= "<font face='verdana'>";
$mens .= "..:: FORMUL&Aacute;RIO DE CONTATO DO SITE ARBAZA ::..";
$mens .= "<BR><BR>";
$mens .= "Nome: ";
$mens .= "$nome";
$mens .= "<br><br>";
$mens .= "Cidade: ";
$mens .= "$cidade";
$mens .= " - ";
$mens .= "$estado";
$mens .= "<br><br>";
$mens .= "Telefone: ";
$mens .= "$telefone";
$mens .= "<br><br>";
$mens .= "E-mail: ";
$mens .= "$email2";
$mens .= "<br>";
$mens .= "<br>";
$mens .= "Assunto: ";
$mens .= "$assunto";
$mens .= "<br>";
$mens .= "<br>";
$mens .= "Mensagem: ";
$mens .= "<br><br>";
$mens .= "$mensagem\n";
$mens .= "--$boundary\n";

for($i = 0; $i < count($_FILES["file"]["name"]); $i++)
{
    if(is_uploaded_file($_FILES["file"]["tmp_name"][$i])){
        $fp = fopen($_FILES["file"]["tmp_name"][$i], "rb");
        $anexo = chunk_split(base64_encode(fread($fp, $_FILES["file"]["size"][$i])));         
        fclose($fp);

        $mens .= "Content-Type: ".$_FILES["file"]["type"][$i]."\n name=\"".$_FILES["file"]["name"][$i]."\"\n";
        $mens .= "Content-Disposition: attachment; filename=\"".$_FILES["file"]["name"][$i]."\"\n";        
        $mens .= "Content-transfer-encoding:base64\n\n"; 
        $mens .= $anexo."\n";
        
        if($i + 1 == count($_FILES["file"]["name"])) 
            $mens.= "--$boundary--"; 
        else 
            $mens.= "--$boundary\n"; 
        
        if($_FILES["file"]['error'][$i] == 0) {
            $anexos++;
        }        
    }    
}

$headers  = "MIME-Version: 1.0\n";
$headers .= "Date: ".date("D, d M Y H:i:s O")."\n";
$headers .= "From: \"Formulario de Contato do Site Arbaza\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?>
              <?
									  
									  if(mail($email, $nome, $mens, $headers)){
     echo "<br><p align='center'><img src='cartiado.gif'></p>";
	echo "<p align='center'>O formul&aacute;rio foi enviado com sucesso, $anexos anexos </p>";
} else {
    echo "<p align='center'>N&atilde;o foi possivel enviar o formul&aacute;rio</p>";
}    
} ?>
            </p>
              <p align="center" class="style36">Agradecemos pela visita.</p>
              <p align="center" class="style36">Em breve entraremos em contato...</p><br></td>
          </tr>
        </table></td>
      </tr>
    </table></TD>
  </TR></TBODY></TABLE>
<?php include("baixo.php"); ?>
</BODY></HTML>
