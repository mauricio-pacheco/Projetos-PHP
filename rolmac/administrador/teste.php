<?php
  $headers = "Content-type: text/html; charset=UTF-8/n";
$msg = "ahamamamamma";


// Agora iremos fazer com que o PHP envie os dados do Formulário para seu e-mail: 
$mensagem = $msg;
$assunto = "PETIÇÃO DE CLIENTE CASTELLUCCI LIMA";
$remetente = "Castellucci Lima";

$mailheaders = "From: Castellucci Lima \n"; 
$mailheaders .= "Reply-To: $destinatario\n\n"; 

require ("phpmailerv21/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailerv21/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "smtp.folhadonoroeste.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = false; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "email@folhadonoroeste.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "noroeste2011"; // Senha usada 
$mail -> From = "email@folhadonoroeste.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: Castellucci Lima \n";
$mail -> AddAddress("comercial@casadaweb.net");
// $mail -> AddAddress("contatouniversalfm@universalfm.com.br");
// $mail - >AddReplyTo("endereco@destinatario.com","Nome do Destinat&aacute;rio"); // caso enviar c&oacute;pia para algm ende.
//$mail->AddAttachment($arquivo["arquivo"],$arquivo["name"], $encoding, $arquivo["type"]); // Anexo 
$mail -> IsHTML(true); // ENVIO DE HTML se 'true'
$mail -> Subject = "$assunto"; // ASSUNTO
// CORPO DE E-MAIL
$mail -> Body = ("$mensagem");
$mail -> Send();
if(!$mail -> Send()) {
echo "<b>Ocorreu um erro. <br>";
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "";


	}
    ?>