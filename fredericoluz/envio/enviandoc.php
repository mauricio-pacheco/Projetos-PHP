<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style.css" TYPE="text/css">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {color: #666666}
-->
</style>
</head>

<body>
<p align="center"><img src="emluz.jpg"  /></p>
<span class="style3">
<? 
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

$texto =  "$nome, acabou de enviar uma mensagem via Formul&aacute;rio do site Frederico em Luz:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "CEP: $cep\n\n<br><br>";  
$texto .= "$outropais --- Pa&iacute;s: $pais \n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 


	
$mensagem = $texto;
$assunto = "CONTATO WEBSITE FREDERICO EM LUZ";
	
$assunto = "CONTATO WEBSITE FREDERICO EM LUZ";
$remetente = "$nome<$email2>";
$destinatario = "alanmalonso@hotmail.com";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.fredericoemluz.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "site@fredericoemluz.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "123456"; // Senha usada 
$mail -> From = "site@fredericoemluz.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("alanmalonso@hotmail.com");
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
echo "<meta http-equiv='refresh' content='0;URL=enviando.php'>";

	}
}?>
</span>
</body>
</html>
