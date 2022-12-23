<?php 
// Envia E-mail
$recipient = "gerencia@soldamerica.com.br";

$subject = utf8_decode("Contato do Site - Sol da América");
$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$tipo = utf8_decode($_POST['tipo']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto =  utf8_decode("<font face=verdana size=2 color=#C60000><b>CONTATO DO SITE SOL DA AMÉRICA:</b></font>\n\n\n<br><br>"); 
$texto .=  utf8_decode("<font face=verdana size=2><b>$nome</b>, acabou de enviar uma mensagem via Formul&aacute;rio do site Rádio Sol da América:</font>\n\n\n<br><br>"); 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Cidade:</b> $cidade</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Tipo de Mensagem:</b> $tipo</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Mensagem:</b><br> $mensagem2</font>\n\n<br>"; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: gerencia@soldamerica.com.br";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='nova.php'</script>";
?>