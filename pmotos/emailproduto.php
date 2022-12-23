<?php 
// Envia E-mail

$id = utf8_decode($_POST['id']);
$produto = utf8_decode($_POST['produto']);
$nome = utf8_decode($_POST['nome']);
$fone = utf8_decode($_POST['fone']);
$email2 = utf8_decode($_POST['email2']);
$descricao = utf8_decode($_POST['descricao']);
$texto =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Informa&ccedil;&otilde;es do Produto do site Polaco Motos:\n\n\n<br><br>"; 
$texto .= "Produto Escolhido: <b>$produto</b>\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>";  
$texto .= "Fone: $fone\n\n<br><br>"; 
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Informa&ccedil;&atilde;o: $descricao\n\n<br><br>"; 
$texto .= "Link do Produto no Site:\n\n<br>"; 
$texto .= "<a href=http://www.polacomotostp.com.br/verproduto.php?id=$id>http://www.polacomotostp.com.br/verproduto.php?id=$id</a>\n\n<br></font>";


$mensagem = $texto;
$assunto = "INFORMAÇÕES DE PRODUTO DO SITE POLACO MOTOS";
	
$assunto = "INFORMAÇÕES DE PRODUTO DO SITE POLACO MOTOS";
$remetente = "$nome<$email2>";
$destinatario = "contato@polacomotostp.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.polacomotostp.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "webmaster@polacomotostp.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "pl2012"; // Senha usada 
$mail -> From = "webmaster@polacomotostp.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("contato@polacomotostp.com.br");
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