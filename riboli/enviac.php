<?php 
// Envia E-mail
$recipient = "mandry@casadaweb.net";

$subject = utf8_decode("Contato do Site - Riboli Advogados");

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$tipo = utf8_decode($_POST['tipo']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto =  utf8_decode("<font face=verdana size=2 color=#C60000><b>CONTATO DO RIBOLI ADVOGADOS:</b></font>\n\n\n<br><br>"); 
$texto .=  utf8_decode("<font face=verdana size=2><b>$nome</b>, acabou de enviar uma mensagem via Formul&aacute;rio do site Riboli Advogados:</font>\n\n\n<br><br>"); 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Cidade:</b> $cidade</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Telefone:</b> $telefone</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>E-mail:</b> $email2</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Tipo de Mensagem:</b> $tipo</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Mensagem:</b><br> $mensagem2</font>\n\n<br>"; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: mandry@casadaweb.net";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";
?>