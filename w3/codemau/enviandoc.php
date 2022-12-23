<?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
//s√≥ para teste mas auterem essa parte para pegar os dados via post $_POST
$email     = "codemau@codemau.org.br";
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
$mens .= "..:: FORMUL¡RIO DE CONTATO DO SITE DA CODEMAU ::..";
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
$headers .= "From: \"Formul·rio de Contato do Site da Codemau\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK REL="StyleSheet" HREF="themes/Helius/style/style.css" TYPE="text/css">
<title>Untitled Document</title>
</head>

<body>
<p align="center"><img src="codem.jpg" width="160" height="155" /></p>


<?
									  
									  if(mail($email, $nome, $mens, $headers)){
    echo "<p align='center'>O formul·rio foi enviado com sucesso, $anexos anexos </p>";
} else {
    echo "<p align='center'>N„o foi possivel enviar o formul√°rio</p>";
}    
} ?>
</body>
</html>
