<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="65" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="61" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("menu.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Formas de Pagamento</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9"><strong>COMPRA CONFIRMADA!</strong>
                  <?php 
$idcliente = $_POST['idcliente'];
$valorfrete = $_POST['valorfrete'];
$valorcompra = $_POST['valorcompra'];
$formaenvio = $_POST['formaenvio'];
$prazoentrega = $_POST['prazoentrega'];
$pesoprodutos = $_POST['pesoprodutos'];
$valortotal = $_POST['valortotal'];
$carrinho = $_POST['carrinho'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$data = date ("j/m/Y");
$hora = date ("H:i:s");



$sql34 = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente'");
while($y = mysql_fetch_array($sql34))
{

$nomecliente = $y["cliente"];
				   
}




$headers = "Content-type: text/html; charset=UTF-8/n";
$msg = utf8_decode("<font face=verdana size=2>Compra Efetuada com Sucesso pelo Viveiro Damo.<br>Data do Cadastro: $data | ( $hora ) -- Email enviado em ".date("d/m/Y")."<br><br> <b><font color='#096394'>Dados da Compra:</font></b><br>

<br><b><font color='#333333'>Nome do Cliente:</font></b> $nomecliente<br>
<br><b><font color='#333333'>Data da Compra:</font></b> $data - $hora<br>
<br><b><font color='#333333'>Valor da Compra:</font></b> R$ $valorcompra<br>


<br><br><b><i>VIVEIRO DAMO</b></i><br><a href=http://www.viveirodamo.com.br>www.viveirodamo.com.br</a><br>Frederico Westphalen/RS<br>+55 (55) 9965-3530 / 8427-0207<br>");



//fazer e-mail compra aqui
$assunto = "COMPRA EFETUADA NO SITE VIVEIRO DAMO";
$remetente = "$nome<$email2>";
$destinatario = "vendas@viveirodamo.com.br";
//contato@universalfm.com.br

$mailheaders = "From: $nome<$e_mail> \n"; 
$mailheaders .= "Reply-To: $e_mail\n\n"; 


require ("phpmailer/class.phpmailer.php"); // LOCAL ONDE EST&Aacute; LOCALIZADO A CLASSE.PHPMAILER
$mail = new PHPmailer();
$mail -> SetLanguage('br','phpmailer/language');
$mail -> IsSMTP(); // SEND VIA SMTP
$mail -> Host = "mail.viveirodamo.com.br"; //SERVIDOR SMTP
$mail -> Port = "25";
$mail -> SMTPAuth = true; // 'true' Para Autentica&ccedil;&atilde;o SMTP
$mail -> Username - "vendas@viveirodamo.com.br"; // Usu&aacute;rio para autenticar
$mail -> Password = "vi2012"; // Senha usada 
$mail -> From = "vendas@viveirodamo.com.br"; // Colocar Email para que a aut. n&atilde;o barre o a mensagem
$mail -> Fromname = "From: $nome<$e_mail> \n";
$mail -> AddAddress("vendas@viveirodamo.com.br");
// $mail -> AddAddress("contatouniversalfm@universalfm.com.br");
// $mail - >AddReplyTo("endereco@destinatario.com","Nome do Destinat&aacute;rio"); // caso enviar c&oacute;pia para algm ende.
$mail->AddAttachment($arquivo["arquivo"],$arquivo["name"], $encoding, $arquivo["type"]); // Anexo 
$mail -> IsHTML(true); // ENVIO DE HTML se 'true'
$mail -> Subject = "$assunto"; // ASSUNTO
// CORPO DE E-MAIL
$mail -> Body = ("$msg");
$mail -> Send();
if(!$mail -> Send()) {
echo "<b>Ocorreu um erro. <br>";
echo "Mailer Error: " . $mail->ErrorInfo;
} else {


	}



$sql = "INSERT INTO cw_compras (idcliente, valorfrete, valorcompra, formaenvio, prazoentrega, pesoprodutos, cep, endereco, numero, bairro, complemento, cidade, estado, data, hora, valortotal, carrinho, status) VALUES ('$idcliente', '$valorfrete', '$valorcompra', '$formaenvio', '$prazoentrega', '$pesoprodutos', '$cep', '$endereco', '$numero', '$bairro', '$complemento', '$cidade', '$estado', '$data', '$hora', '$valortotal', '$carrinho', 'COMPRA CONFIRMADA')";
mysql_query($sql);
			       
$sql3 = mysql_query("SELECT * FROM cw_carrinho WHERE sessao='$carrinho'");
 while($y = mysql_fetch_array($sql3))
{

$carrinhoc = $y["sessao"];
$produtoc = $y["nome"];
$pesoc = $y["peso"];
$codc = $y["cod"];
$precoc = $y["preco"];
$qtdc = $y["qtd"];
   
	   
$sql2 = "INSERT INTO cw_produtoscomprados (carrinho, produto, preco, qtd, idcliente, peso, cod) VALUES ('$carrinhoc', '$produtoc', '$precoc', '$qtdc', '$idcliente', '$pesoc', '$codc')";
mysql_query($sql2);

				   
}
				   

				   
				   		  
$sql4 = "DELETE FROM cw_carrinho WHERE sessao='$carrinho'";
mysql_query($sql4); 
 
				  
				  
				  ?>
                  
                  </td>
                </tr>
                <tr>
                  <td class="manchete_texto9"><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
                <tr>
                  <td class="manchete_texto9"><strong>SELECIONE SUA FORMA DE PAGAMENTO:</strong></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td align="center">
                  
                  <table width="86%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40%">
                      <form target="pagseguro" method="post"
action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
  <input type="hidden" name="email_cobranca"
  value="comercial@casadaweb.net" />
  <input type="hidden" name="tipo" value="CBR" />
  <input type="hidden" name="moeda" value="BRL" />
  <input type="hidden" name="item_id" value="1" />
   <?php $sql8 = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' LIMIT 1");
 while($y = mysql_fetch_array($sql8))
{ ?>
  
  <input type="hidden" name="item_descr"
  value="Carrinho Compras Multix Efetuada em <?php echo $data; ?> - <?php echo $hora; ?> por <?php echo utf8_decode($y["cliente"]); ?>" />
  
  <?php } ?>   
  <input type="hidden" name="item_quant" value="1" />
  <input type="hidden" name="item_valor" value="<?php echo number_format($valortotal,2,",","."); ?>" />
  <input type="hidden" name="frete" value="0" />
  <input type="hidden" name="peso" value="0" />
  <input type="image" name="submit" 
  src="imagens/pagseguro.jpg"
  alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
                  
</td>
                     
                     
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
  </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>