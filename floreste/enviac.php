<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Floreste - Mudas de Acacia mangium e Mogno africano</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="classes/menu_style.css" type="text/css" />

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php 
// Envia E-mail

$recipient = "floreste@floreste.com";

$subject = "FORMULARIO DE CONTATO SITE FLORESTE";

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$msg = "DADOS DO CONTATO:\n\nNome: $nome\n\nCidade: $cidade\n\nEstado: $estado\n\nTelefone: $telefone\n\nE-mail: $email2\n\nMensagem: $mensagem2";

$mailheaders = "From: floreste@floreste.com";

mail("$recipient", "$subject", "$msg", "$mailheaders");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";
?></body>
</html>