<? 
// Envia E-mail

$assunto = utf8_decode($_POST['assunto']);
$quem = utf8_decode($_POST['quem']);
$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto = "<font face=verdana size=2>";
$texto .=  "$nome, acabou de participar da programação pelo site Universal FM:\n\n\n<br><br>"; 
$texto .= "Assunto: $assunto\n\n<br><br>"; 
$texto .= "Destinado a Quem: $quem\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 
$texto .= "</font>"; 


	
$mensagem = $texto;
$assunto = "CONTATO DO SITE UNIVERSAL FM";
	
$assunto = "CONTATO DO SITE UNIVERSAL FM";
$remetente = "$nome<$email2>";
$destinatario = "contatouniversalfm@universalfm.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.universalfm.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "webmaster@universalfm.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "univer2012"; // Senha usada 
$mail -> From = "webmaster@universalfm.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("contatouniversalfm@universalfm.com.br");
// $mail -> AddAddress("contatouniversalfm@universalfm.com.br");
// $mail - >AddReplyTo("endereco@destinatario.com","Nome do Destinat&aacute;rio"); // caso enviar c&oacute;pia para algm ende.
$mail->AddAttachment($arquivo["arquivo"],$arquivo["name"], $encoding, $arquivo["type"]); // Anexo 
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
echo "<meta http-equiv='refresh' content='0;URL=index.php'>";

	} ?>