<? 
// Envia E-mail

$nome1 = utf8_decode($_POST['nome']);
$assunto1 = utf8_decode($_POST['assunto']);
$email1 = utf8_decode($_POST['email']);
$mensagem1 = utf8_decode($_POST['mensagem']);


$texto =  "$nome1, acabou de enviar uma mensagem via Formul&aacute;rio do site SS COLOR:\n\n\n<br><br>"; 
$texto .= "Nome: $nome1\n\n<br><br>"; 
$texto .= "Assunto: $assunto1\n\n<br><br>"; 
$texto .= "E-mail: $email1\n\n<br><br>"; 
$texto .= "Mensagem: $mensagem1\n\n<br><br>"; 




	
$mensagem = $texto;
$assunto = "CONTATO WEBSITE SS COLOR";
	
$assunto = "CONTATO WEBSITE SS COLOR";
$remetente = "$nome1<$email2>";
$destinatario = "edersilvafw@hotmail.com";
//contato@universalfm.com.br

$mailheaders = "From: $nome1<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.sscolor.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "site@sscolor.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "edersilva"; // Senha usada 
$mail -> From = "site@sscolor.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome1<$e_mail> \n";
$mail -> AddAddress("edersilvafw@hotmail.com");
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
echo "<meta http-equiv='refresh' content='0;URL=home.php'>";

	} ?>