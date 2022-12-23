<?php 
// Envia E-mail

$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];
$email2 = $_POST['email2'];
$mensagem2 = $_POST['mensagem'];

$texto =  "$nome, acabou de enviar uma mensagem via Formul&aacute;rio do site da Prefeitura de Caiçara:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 


	
$mensagem = $texto;
$assunto = utf8_encode("CONTATO SITE PREFEITURA CAIÇARA");
	
$assunto = utf8_encode("CONTATO SITE PREFEITURA CAIÇARA");
$remetente = "$nome<$email2>";
$destinatario = "contatos@caicara.rs.gov.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.construtoramilani.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "contatos@caicara.rs.gov.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "ca2013"; // Senha usada 
$mail -> From = "contatos@caicara.rs.gov.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("contatos@caicara.rs.gov.br");
$mail -> AddAddress("pmcaicara@gmail.com");
$mail -> AddAddress("arianefacco@gmail.com");
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