<? 
// Envia E-mail

$tipo = utf8_decode($_POST['tipo']);
$nome = utf8_decode($_POST['nome']);
$cnpj = utf8_decode($_POST['cnpj']);
$email = utf8_decode($_POST['email']);
$endereco = utf8_decode($_POST['endereco']);
$bairro = utf8_decode($_POST['bairro']);
$complemento = utf8_decode($_POST['complemento']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$cep = utf8_decode($_POST['cep']);
$telefone = utf8_decode($_POST['telefone']);
$fax = utf8_decode($_POST['fax']);
$apartamento = utf8_decode($_POST['apartamento']);
$dataentrada = utf8_decode($_POST['dataentrada']);
$datasaida = utf8_decode($_POST['datasaida']);
$msg = utf8_decode($_POST['msg']);

$texto =  "<font face=verdana size=2 color=#009136><b>FORMUL&Aacute;RIO DE RSERVAS NO HOTEL DO SITE POSTO SEBERI:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>DADOS DA RESERVA:</b></font><br><br>";
$texto .= "<font face=verdana size=2><b>Tipo de Hospede:</b> \t$tipo</font><BR><BR>";
$texto .= "<font face=verdana size=2><b>Nome:</b> \t$nome</font><BR>";
$texto .= "<font face=verdana size=2><b>CNPJ ou CPF:</b> \t$cnpj</font><BR>";
$texto .= "<font face=verdana size=2><b>E-mail:</b> \t$email</font><BR>";
$texto .= "<font face=verdana size=2><b>Endere&ccedil;o:</b> \t$endereco</font><BR>";
$texto .= "<font face=verdana size=2><b>Bairro:</b> \t$bairro</font><BR>";
$texto .= "<font face=verdana size=2><b>Complemento:</b> \t$complemento</font><BR>";
$texto .= "<font face=verdana size=2><b>Cidade:</b> \t$cidade</font><BR>";
$texto .= "<font face=verdana size=2><b>Estado:</b> \t$estado</font><BR>";
$texto .= "<font face=verdana size=2><b>Cep:</b> \t$cep</font><BR>";
$texto .= "<font face=verdana size=2><b>Telefone:</b> \t$telefone</font><BR>";
$texto .= "<font face=verdana size=2><b>Celular:</b> \t$fax</font><BR><BR>";
$texto .= "<font face=verdana size=2><b>Tipo de Apartamento:</b> \t$apartamento</font><BR>";
$texto .= "<font face=verdana size=2><b>Data Entrada:</b> \t$dataentrada</font><BR>";
$texto .= "<font face=verdana size=2><b>Data Sa&iacute;da:</b> \t$datasaida</font><BR>";
$texto .= "<font face=verdana size=2><b>Mensagem:</b> \t$msg</font><BR><BR>";


	
$mensagem = $texto;
$assunto = "RESERVAS HOTEL POSTO SEBERI";
	
$assunto = "RESERVAS HOTEL POSTO SEBERI";
$remetente = "$nome<$email2>";
$destinatario = "auxfinanceiro@postoseberi.com.br";
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
$mail -> AddAddress("auxfinanceiro@postoseberi.com.br");
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