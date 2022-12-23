<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style22 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style20 {	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style23 {color: #FFFFFF}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="98%" border="0" align="center">
                     
                    <tr>
                      <td><div align="center"><img src="home_arquivos/fale.jpg" width="200" height="30" /></div></td>
                    </tr>
                    <tr>
                          <td><table width="100%" border="0">
                            <tr>
                              <td>&nbsp;</td>
                              </tr>
                            <tr>
                              <td width="50%"><div align="center">
                                <p><img src="home_arquivos/logotrilha.jpg" width="121" height="120" /></p>
                                <p><?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
//só para teste mas auterem essa parte para pegar os dados via post $_POST
$email     = "ftopetao@brturbo.com.br";
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
$mens .= "..:: FORMULÁRIO DE CONTATO DO SITE TRILHEIROS DO BARRIL ::..";
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
$headers .= "From: \"Formulario de Contato do Site Trilheiros do Barril\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?><?
									  
									  if(mail($email, $nome, $mens, $headers)){
    echo "<p align='center'>O formulário foi enviado com sucesso, $anexos anexos </p>";
} else {
    echo "<p align='center'>Não foi possivel enviar o formulário</p>";
}    
} ?></p>
                                <p>&nbsp;</p>
                              </div></td>
                              </tr>

                          </table></td>
                        </tr>
                       
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
