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


$sql = "INSERT INTO cw_compras (idcliente, valorfrete, valorcompra, formaenvio, prazoentrega, pesoprodutos, cep, endereco, numero, bairro, complemento, cidade, estado, data, hora, valortotal, carrinho) VALUES ('$idcliente', '$valorfrete', '$valorcompra', '$formaenvio', '$prazoentrega', '$pesoprodutos', '$cep', '$endereco', '$numero', '$bairro', '$complemento', '$cidade', '$estado', '$data', '$hora', '$valortotal', '$carrinho')";
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
                      <td width="40%"><form target="_blank"  method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
      
   <!-- Campos obrigatórios -->  
    <input type="hidden" name="receiverEmail" value="comercial@casadaweb.net">  
    <input type="hidden" name="currency" value="BRL">  
      
   
    <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
   <?php
				  $sql7 = mysql_query("SELECT * FROM cw_produtoscomprados WHERE carrinho='$carrinho'");
 $cont = 0;
 while($y = mysql_fetch_array($sql7))
{
	$cont = $cont + 1;
	
				   ?>
    <input type="hidden" name="itemId<?php echo $cont; ?>" value="<?php echo $y["cod"]; ?>">  
    <input type="hidden" name="itemDescription<?php echo $cont; ?>" value="<?php echo $y["produto"]; ?>">  
    <input type="hidden" name="itemAmount<?php echo $cont; ?>" value="<?php echo $y["preco"]; ?>">  
    <input type="hidden" name="itemQuantity<?php echo $cont; ?>" value="<?php echo $y["qtd"]; ?>">  
    <input type="hidden" name="itemWeight<?php echo $cont; ?>" value="30000">  
     <?php
	 
	  } ?> 
    
      
    <!-- Código de referência do pagamento no seu sistema (opcional) -->  
    <input type="hidden" name="reference" value="REF1234">  
      
    <!-- Informações de frete (opcionais) -->  
    <input type="hidden" name="shippingType" value="2">  
    <input type="hidden" name="shippingAddressPostalCode" value="<?php echo $cep; ?>">  
    <input type="hidden" name="shippingAddressStreet" value="<?php echo utf8_decode($endereco); ?>">  
    <input type="hidden" name="shippingAddressNumber" value="<?php echo $numero; ?>">  
    <input type="hidden" name="shippingAddressComplement" value="<?php echo utf8_decode($complemento); ?>">  
    <input type="hidden" name="shippingAddressDistrict" value="<?php echo utf8_decode($bairro); ?>">  
    <input type="hidden" name="shippingAddressCity" value="<?php echo utf8_decode($cidade); ?>">  
    <input type="hidden" name="shippingAddressState" value="<?php echo $estado; ?>">  
    <input type="hidden" name="shippingAddressCountry" value="BRA">  
      
    <!-- Dados do comprador (opcionais) -->  
   <?php $sql8 = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' LIMIT 1");
 while($y = mysql_fetch_array($sql8))
{ ?>
    <input type="hidden" name="senderName" value="<?php echo $y["nome"]; ?>">  
    <input type="hidden" name="senderAreaCode" value="<?php echo $y["telefone"]; ?>">  
    <input type="hidden" name="senderPhone" value="<?php echo $y["telefone"]; ?>">  
    <input type="hidden" name="senderEmail" value="<?php echo $y["email"]; ?>">  
  <?php } ?>   
    <!-- submit do form (obrigatório) -->  
    <input type="image" name="submit"   
    src="imagens/pagseguro.jpg"   
    alt="Pague com PagSeguro">  
      
</form>  
</td>
                      <td width="57%">&nbsp;</td>
                      <td width="3%"><img src="imagens/merpago.jpg" width="320" height="119" /></td>
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