<?php include("meta.php"); ?>

<body topmargin="0" leftmargin="0">
<table width="980" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','160'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("busca.php"); ?></td>
  </tr>
</table>
<table width="980" height="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><span class="style3">
            <? 
// Envia E-mail

$id = utf8_decode($_POST['id']);
$veiculo = utf8_decode($_POST['veiculo']);
$nome = utf8_decode($_POST['nome']);
$email2 = utf8_decode($_POST['email2']);
$descricao = utf8_decode($_POST['descricao']);


$texto =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Informa&ccedil;&otilde;es do Ve&iacute;culo do site Piaia Ve&iacute;culos:\n\n\n<br><br>"; 
$texto .= "Ve&iacute;culo Escolhido: <b>$veiculo</b>\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Informa&ccedil;&atilde;o: $descricao\n\n<br><br>"; 
$texto .= "Link do Ve&iacute;culo no Site:\n\n<br>"; 
$texto .= "<a href=http://www.piaiaveiculos.com.br/veiculo.php?id=$id>http://www.piaiaveiculos.com.br/veiculo.php?id=$id</a>\n\n<br></font>"; 


	
$mensagem = $texto;
$assunto = utf8_decode("INFORMAÇÃO DE VEÍCULO DO SITE PIAIA VEÍCULOS");
$remetente = "$nome<$email2>";
$destinatario = "site@piaiaveiculos.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.piaiaveiculos.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "site@piaiaveiculos.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "123vei"; // Senha usada 
$mail -> From = "site@piaiaveiculos.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("piaiaveiculos@yahoo.com.br");
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
          </span></td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>