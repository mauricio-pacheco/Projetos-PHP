<?php 
// Envia E-mail
$recipient = "cassianoromitti@hotmail.com";

$subject = utf8_decode("Contato do Site - Romitti Divisórias");

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto =  "<font face=verdana size=2 color=#009136><b>CONTATO DO SITE ROMITTI DIVIS&Oacute;RIAS:</b></font>\n\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2><b>$nome</b>, acabou de enviar uma mensagem via Formul&aacute;rio do site Romitti Divis&oacute;rias:</font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Cidade:</b> $cidade</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Telefone:</b> $telefone</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>E-mail:</b> $email2</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Mensagem:</b><br> $mensagem2</font>\n\n<br>"; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: cassianoromitti@hotmail.com";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>";
?>