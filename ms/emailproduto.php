<?php include("meta.php"); ?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="309"><img src="imagens/branco.gif" width="2" height="4" /></td>
    <td width="663" bgcolor="#EC1D25"><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table bgcolor="#FFFFFF" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" valign="top" background="imagens/tabela.png"><table class="manchete_texto9" width="208" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            <td><?php include("esquerdo.php"); ?></td>
          </tr>
        </table></td>
        <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
        </table>
          <table height="28" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="3%" class="manchete_texto9m"><img src="imagens/casa.png" /></td>
            <td width="97%" class="manchete_texto9m">&nbsp;<strong><em>Enviar Produto</em></strong></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><span class="style3">
                <? 
// Envia E-mail

$id = utf8_decode($_POST['id']);
$produto = utf8_decode($_POST['produto']);
$nome = utf8_decode($_POST['nome']);
$fone = utf8_decode($_POST['fone']);
$email2 = utf8_decode($_POST['email2']);
$descricao = utf8_decode($_POST['descricao']);


$texto =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Informa&ccedil;&otilde;es do Produto do site MS Inform&aacute;tica:\n\n\n<br><br>"; 
$texto .= "Produto Escolhido: <b>$produto</b>\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>";  
$texto .= "Fone: $fone\n\n<br><br>"; 
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Informa&ccedil;&atilde;o: $descricao\n\n<br><br>"; 
$texto .= "Link do Produto no Site:\n\n<br>"; 
$texto .= "<a href=http://www.msinformaticafw.com.br/verproduto.php?id=$id>http://www.casadaweb.net/ms/verproduto.php?id=$id</a>\n\n<br></font>"; 


	
$mensagem = $texto;
$assunto = utf8_decode("INFORMAÇÃO DO PRODUTO DO SITE DI MS INFORM&Aacute;TICA");
$remetente = "$nome<$email2>";
$destinatario = "marcelo.g@hotmail.com";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.msinformaticafw.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "webmaster@msinformaticafw.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "ms2012"; // Senha usada 
$mail -> From = "webmaster@msinformaticafw.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("marcelo.g@hotmail.com");
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
echo "<script>alert('Dados Enviados com Sucesso!')</script>";
echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";

	} ?>
              </span></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>