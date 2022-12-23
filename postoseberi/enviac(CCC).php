<?php 
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$cep = utf8_decode($_POST['cep']);
$outropais = utf8_decode($_POST['outropais']);
$pais = utf8_decode($_POST['pais']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto =  "<font face=verdana size=2 color=#009136><b>FORMUL&Aacute;RIO DE CONTATO DO SITE POSTO SEBERI:</b></font>\n\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2><b>$nome</b>, acabou de enviar uma mensagem via Formul&aacute;rio do site Posto Seberi:</font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Cidade:</b> $cidade</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>CEP:</b> $cep</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>Pa&iacute;s:</b> $pais -- <b>Outro Pa&iacute;s:</b> $outropais</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>Telefone:</b> $telefone</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>E-mail:</b> $email2</font>\n\n<br><br>";  
$texto .= "<font face=verdana size=2><b>Mensagem:</b><br> $mensagem2</font>\n\n<br>"; 


	
$mensagem = $texto;
$assunto = utf8_decode("CONTATO POSTO SEBERI");
	
$assunto = utf8_decode("CONTATO POSTO SEBERI");
$remetente = "$nome<$email2>";
$destinatario = "comercial@casadaweb.net";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.postoseberi.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "site@postoseberi.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "seberi7008"; // Senha usada 
$mail -> From = "site@postoseberi.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("comercial@casadaweb.net");
// $mail -> AddAddress("contatouniversalfm@universalfm.com.br");
//$mail - >AddReplyTo("liberalesso@tcheturbo.com.br","Eliseu"); // caso enviar c&oacute;pia para algm ende.
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
echo "<script>location.href='index.php'</script>";

	} ?>