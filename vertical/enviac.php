<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<?php
$recipient = "facco@verticalturismo.com.br, atendimento@verticalturismo.com.br";

$subject = utf8_decode("Formulário Site Vertical Turismo");

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$msg =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Formul&aacute;rio do site da Vertical Turismo:\n\n\n<br><br>"; 
$msg .= "<b>Nome:</b> $nome\n\n<br><br>"; 
$msg .= "<b>Cidade:</b> $cidade\n\n<br><br>";  
$msg .= "<b>Estado:</b> $estado\n\n<br><br>";  
$msg .= "<b>Telefone:</b> $telefone\n\n<br><br>";  
$msg .= "<b>E-mail:</b> $email2\n\n<br><br>";  
$msg .= "<b>Mensagem:</b> $mensagem2\n\n<br></font>"; 
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

mail("$recipient", "$subject", "$msg", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";
?>