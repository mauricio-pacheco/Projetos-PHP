<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<?php
$recipient = "facco@verticalturismo.com.br, atendimento@verticalturismo.com.br";

$subject = utf8_decode("Formulário de Passagens Aéreas Vertical Turismo");

$partindo = utf8_decode($_POST['partindo']);
$para = utf8_decode($_POST['para']);
$dataviajem = utf8_decode($_POST['dataviajem']);
$passageiros = utf8_decode($_POST['passageiros']);
$nome = utf8_decode($_POST['nome']);
$nome = utf8_decode($_POST['nome']);
$pais = utf8_decode($_POST['pais']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$msg =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Formul&aacute;rio de Passagens A&eacute;reas do site da Vertical Turismo:\n\n\n<br><br>"; 
$msg .= "<b>Partindo de:</b> $partindo\n\n<br><br>"; 
$msg .= "<b>Para:</b> $para\n\n<br><br>";
$msg .= "<b>Data de Viajem:</b> $dataviajem\n\n<br><br>";
$msg .= "<b>N&ordm; de Passageiros:</b> $passageiros\n\n<br><br>"; 
$msg .= "<b>Nome:</b> $nome\n\n<br><br>"; 
$msg .= "<b>Cidade:</b> $cidade\n\n<br><br>";  
$msg .= "<b>Estado:</b> $estado\n\n<br><br>";  
$msg .= "<b>Telefone:</b> $telefone\n\n<br><br>";  
$msg .= "<b>E-mail:</b> $email2\n\n<br><br>";  
$msg .= "<b>Observa&ccedil;&otilde;es:</b> $mensagem2\n\n<br></font>"; 
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

mail("$recipient", "$subject", "$msg", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";
?>