<?php 
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$id = utf8_decode($_POST['id']);
$tipo = utf8_decode($_POST['tipo']);
$tipo2 = utf8_decode($_POST['tipo2']);
$tipo3 = utf8_decode($_POST['tipo3']);
$cnpj = utf8_decode($_POST['cnpj']);
$datafund = utf8_decode($_POST['datafund']);
$ie = utf8_decode($_POST['ie']);
$email3 = utf8_decode($_POST['email3']);
$rg = utf8_decode($_POST['rg']);
$cep = utf8_decode($_POST['cep']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$endereco = utf8_decode($_POST['endereco']);
$numero = utf8_decode($_POST['numero']);
$complemento = utf8_decode($_POST['complemento']);
$bairro = utf8_decode($_POST['bairro']);
$caixa = utf8_decode($_POST['caixa']);
$telefone = utf8_decode($_POST['telefone']);
$fax = utf8_decode($_POST['fax']);
$celular = utf8_decode($_POST['celular']);
$observacao = utf8_decode($_POST['observacao']);

$texto =  "<font face=verdana size=2 color=#0066CC><b>FORMUL&Aacute;RIO DE CADASTRO DE CLIENTE DO SITE POSTO SEBERI:</b></font>\n\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2 color=#009136><b>IDENTIFICA&Ccedil;&Atilde;O:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Nome:</b> $nome</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Identifica&ccedil;&atilde;o:</b> $id</font>\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2 color=#009136><b>DADOS PRINCIPAIS:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Tipo Pessoa:</b> $tipo $tipo2 $tipo3</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>CNPJ:</b> $cnpj</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Data Funda&ccedil;&atilde;o:</b> $datafund</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Insc. Estadual:</b> $ie</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>E-mail:</b> $email3</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>RG:</b> $rg</font>\n\n<br><br>"; 
$texto .=  "<font face=verdana size=2 color=#009136><b>ENDERE&Ccedil;O:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>CEP:</b> $cep</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Municipio:</b> $cidade</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Estado:</b> $estado</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Logradouro:</b> $endereco</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>N&uacute;mero:</b> $numero</font>\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Complemento:</b> $complemento</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>Bairro:</b> $bairro</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>Caixa Postal:</b> $caixa</font>\n\n<br><br>";
$texto .=  "<font face=verdana size=2 color=#009136><b>TELEFONE:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>Telefone:</b> $telefone</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>FAX:</b> $fax</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2><b>Celular:</b> $celular</font>\n\n<br><br>";
$texto .= "<font face=verdana size=2 color=#009136><b>OBSERVA&Ccedil;&Otilde;ES:</b></font><font face=verdana size=2><br> $observacao</font>\n\n<br><br>";


	
$mensagem = $texto;
$assunto = utf8_decode("CLIENTE POSTO SEBERI");
	
$assunto = utf8_decode("CLIENTE POSTO SEBERI");
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