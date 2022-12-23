<? 
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$cep = utf8_decode($_POST['cep']);
$outropais = utf8_decode($_POST['outropais']);
$pais = utf8_decode($_POST['pais']);
$musica = utf8_decode($_POST['musica']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);
$denuncia = utf8_decode($_POST['denuncia']);


$texto =  "FORMULARIO PEDIDO DE MÚSICA DO SITE LUZ E ALEGRIA\n\n\n<br><br>"; 
$texto .= "Nome do Ouvinte: $nome\n\n<br><br>"; 
$texto .= "Nome da Música: $musica\n\n<br><br>"; 
$texto .= "Descrição:\n\n$denuncia\n\n<br><br>"; 


	
$mensagem = $texto;
$assunto = "FORMULARIO PEDIDO DE MÚSICA DO SITE LUZ E ALEGRIA";
	
$assunto = "FORMULARIO PEDIDO DE MÚSICA DO SITE LUZ E ALEGRIA";
$remetente = "$nome<$email2>";
$destinatario = "radio95.9@luzealegria.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.luzealegria.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "mandry@luzealegria.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "123456"; // Senha usada 
$mail -> From = "mandry@luzealegria.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("radio95.9@luzealegria.com.br");
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
echo "<script>alert('Pedido Enviado com Sucesso!')</script>";
echo "<meta http-equiv='refresh' content='0;URL=pedido.php'>";

	} ?>
	<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=javascript:window.open('index.php','_top');">