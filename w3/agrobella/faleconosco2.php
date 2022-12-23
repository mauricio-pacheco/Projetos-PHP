<?php include ("meta.php"); ?>
<? 
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);
$telefone = utf8_decode($_POST['telefone']);
$fax = utf8_decode($_POST['fax']);
$endereco = utf8_decode($_POST['endereco']);
$complemento = utf8_decode($_POST['complemento']);
$bairro = utf8_decode($_POST['bairro']);
$cidade = utf8_decode($_POST['cidade']);
$cep = utf8_decode($_POST['cep']);
$estado = utf8_decode($_POST['estado']);
$msg = utf8_decode($_POST['msg']);

$texto =  "$nome, acabou de enviar uma mensagem via Formul&aacute;rio do site Agrobella Alimentos:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "E-mail: $email\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "FAX: $fax\n\n<br><br>";  
$texto .= "Endereço: $endereco\n\n<br><br>";  
$texto .= "Complemento: $complemento\n\n<br><br>";  
$texto .= "Bairro: $bairro\n\n<br><br>";  
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "CEP: $cep\n\n<br><br>";  
$texto .= "Mensagem: $msg\n\n<br>"; 


	
$mensagem = $texto;
$assunto = "CONTATO WEBSITE AGROBELLA ALIMENTOS";
	
$assunto = "CONTATO WEBSITE AGROBELLA ALIMENTOS";
$remetente = "$nome<$email2>";
$destinatario = "contabilidade@agrobellaalimentos.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.agrobellaalimentos.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "contabilidade@agrobellaalimentos.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "bella"; // Senha usada 
$mail -> From = "contabilidade@agrobellaalimentos.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("contabilidade@agrobellaalimentos.com.br");
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
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
</HTML>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <DIV id=Layer1 style="Z-INDEX: 1; WIDTH: 100%; POSITION: absolute">
      <TABLE height=284 cellSpacing=0 cellPadding=0 width=770 align=center 
      border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('menu.swf','770','68'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>            </TD></TR></TBODY></TABLE></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecEsq>&nbsp;</TD></TR>
              <TR>
                <TD class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD class=bgCabecDir vAlign=top width=770 bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width=770 border=0>
              <TBODY>
              <TR>
                <TD background=home_arquivos/bg_cabec_esq.jpg>
                  <SCRIPT src="carrega2.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('cabec.swf','770','225'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>                </TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecDir>&nbsp;</TD></TR>
              <TR>
                <TD 
      class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <?php include ("menu.php"); ?>
                <TD vAlign=top width=80% bgColor=#ffffff>
                  <DIV align=center><BR>
                  </DIV>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=27 background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><img src="faleconosco.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <FORM name=cadastro action=comprado.php enctype="multipart/form-data" method=post onSubmit="return validar(this)">
                          <table cellspacing="10" cellpadding="0" width="100%" 
                        border="0">
                            <tbody>
                              <tr>
                                <td class="tahoma10cinza666666"><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                                    <tbody>
                                      <tr>
                                        <td width="72%" colspan="2" 
                            bgcolor="#ffffff" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div class="back" align="center"> <span class="tahoma10preto"></span>
                                                <div align="center"><img src="logocolorido.jpg" /></div><br><br>
                                                <div align="center"><img src="foi.gif" /></div>
                                        </div></td>
                                      </tr>
                                    </tbody>
                                    <tr>
                                      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2">
                                          <br><p align="center" class="style3">Formul&aacute;rio enviado com Sucesso! </p>
                                        <p align="center" class="style3">Em Breve estaremos entrando em contato.</p></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </tbody>
                          </table>
                        </FORM></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
     <TD>&nbsp;</TD></TR></TBODY></TABLE>     </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY>
</HTML>
