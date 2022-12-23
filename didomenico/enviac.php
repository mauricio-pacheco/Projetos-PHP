<?php
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto = "<font face=verdana size=2>";
$texto .=  "$nome, acabou de enviar uma mensagem pelo site Di Domenico Im&oacute;veis:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 
$texto .= "</font>"; 


	
$mensagem = $texto;
$assunto = "CONTATO DO SITE DI DOMENICO IM&Oacute;VEIS";
	
$assunto = "CONTATO DO SITE DI DOMENICO IM&Oacute;VEIS";
$remetente = "$nome<$email2>";
$destinatario = "mandry@casadaweb.net";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.casadaweb.net"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "mandry@casadaweb.net"; // Usu&aacute;rio para autenticar
$mail -> Password = "m85022525"; // Senha usada 
$mail -> From = "mandry@casadaweb.net"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("mandry@casadaweb.net");
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
echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";

	} ?>