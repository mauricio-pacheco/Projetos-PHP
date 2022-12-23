<?php 
// Envia E-mail
$recipient = "daluzimoveisfw@gmail.com ";

$subject = utf8_decode("Contato do Site - Da Luz Imóveis");

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto =  "<font face=verdana size=2 color=#C60000><b>CONTATO DO DA LUZ IMÓVEIS:</b></font>\n\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2><b>$nome</b>, acabou de enviar uma mensagem via Formul&aacute;rio do site Da Luz Imóveis:</font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Cidade:</b> $cidade</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Telefone:</b> $telefone</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>E-mail:</b> $email2</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Mensagem:</b><br> $mensagem2</font>\n\n<br>"; 
$texto = utf8_decode($texto);
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: daluzimoveisfw@gmail.com ";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>";
?>