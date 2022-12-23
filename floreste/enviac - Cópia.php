<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Floreste</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="classes/menu_style.css" type="text/css" />

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php 
// Envia E-mail

$nome = utf8_encode($_POST['nome']);
$cidade = utf8_encode($_POST['cidade']);
$estado = utf8_encode($_POST['estado']);
$telefone = utf8_encode($_POST['telefone']);
$email2 = utf8_encode($_POST['email2']);
$mensagem2 = utf8_encode($_POST['mensagem']);

$texto =  "$nome, acabou de enviar uma mensagem via Formul&aacute;rio do site Floreste:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 


	
$mensagem = $texto;
$assunto = utf8_encode("CONTATO SITE FLORESTE");
	
$assunto = utf8_encode("CONTATO SITE FLORESTE");
$remetente = "$nome<$email2>";
$destinatario = "floreste@floreste.com";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "floreste.com"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "site@floreste.com"; // Usu&aacute;rio para autenticar
$mail -> Password = "123456"; // Senha usada 
$mail -> From = "floreste@floreste.com"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("floreste@floreste.com");
// $mail -> AddAddress("contatouniversalfm@universalfm.com.br");
$mail -> AddReplyTo("comercial@casadaweb.net","Mandry"); // caso enviar c&oacute;pia para algm ende.
$mail-> AddAttachment($arquivo["arquivo"],$arquivo["name"], $encoding, $arquivo["type"]); // Anexo 
$mail -> IsHTML(true); // ENVIO DE HTML se 'true'
$mail -> Subject = "$assunto"; // ASSUNTO
// CORPO DE E-MAIL
$mail -> Body = ("$mensagem");
$mail -> Send();
if(!$mail -> Send()) {
echo "<b>Ocorreu um erro. <br>";
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";

	} ?></body>
</html>