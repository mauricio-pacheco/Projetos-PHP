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
                <td class="fontetabela5" align="right"><strong>Finalizar Compra</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              
              <script language="javascript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.endereco.value=="") {
alert("O Campo Logradouro não está preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.numero.value=="") {
alert("O Campo Número não está preenchido!")
cadastro.numero.focus();
return false
}

if (document.cadastro.bairro.value=="") {
alert("O Campo Bairro não está preenchido!")
cadastro.bairro.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Cidade não está preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.estado.value=="") {
alert("O Campo Estado não está preenchido!")
cadastro.estado.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP não está preenchido!")
cadastro.cep.focus();
return false
}


		return true;

}


                          </script>
              
              
              <form action="formapagamento.php" name="cadastro" method="post" onsubmit="return validar(this)"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <?php 
			  include "administrador/conexao.php";
			  $idcliente = $_GET['idcliente'];
			  $valorfrete = $_GET['valorfrete'];
			  $carrinho = $_GET['carrinho'];
			  $prazoentrega = $_GET['prazoentrega'];
			  $formaenvio = $_GET['formaenvio'];
			  $pesoprodutos = $_GET['pesoprodutos'];
			  $cepentrega = $_GET['cepentrega'];
			  $valorcompra = $_GET['valorcompra'];
			  $valortotalc = $valorfrete + $valorcompra;
			 
			  
			  $sql = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' ORDER BY id LIMIT 1");

              while($y = mysql_fetch_array($sql))
   {
			  
			   ?>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9">Compra Efetuada por  <b><?php echo $y["cliente"]; ?>
                    <input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>" />
                    <input type="hidden" name="valorfrete" value="<?php echo $valorfrete; ?>" />
                     <input type="hidden" name="valorcompra" value="<?php echo $valorcompra; ?>" />
                      <input type="hidden" name="formaenvio" value="<?php echo $formaenvio; ?>" />
                       <input type="hidden" name="prazoentrega" value="<?php echo $prazoentrega; ?>" />
                        <input type="hidden" name="pesoprodutos" value="<?php echo $pesoprodutos; ?>" />
                         <input type="hidden" name="valortotal" value="<?php echo $valortotalc; ?>" />
                         <input type="hidden" name="carrinho" value="<?php echo $carrinho; ?>" />
                         
                  </b></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9"><strong>ENDEREÇO DE ENTREGA</strong></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9">Logradouro: 
                    <input name="endereco" type="text" class="manchete_texto9" value="<?php echo $y["endereco"]; ?>" size="80" /> 
                    * Número: 
                    <input name="numero" type="text" class="manchete_texto9" value="<?php echo $y["numero"]; ?>" size="10" /> 
                    *</td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9">Bairro: 
                    <input name="bairro" value="<?php echo $y["bairro"]; ?>" type="text" class="manchete_texto9" size="16" /> 
                    *
                    Complemento: 
                    <input name="complemento" type="text" class="manchete_texto9" value="<?php echo $y["complemento"]; ?>" size="12" /></td>
                </tr>
            </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9">Cidade:
                    <input name="cidade" type="text" class="manchete_texto9" value="<?php echo $y["cidade"]; ?>" size="54" /> 
                    *
                    Estado: 
                    <input name="estado" type="text" class="manchete_texto9" value="<?php echo $y["uf"]; ?>" size="20" /> 
                    *
                    CEP: 
                    <input name="cep" type="text" class="manchete_texto9" value="<?php echo $y["cep"]; ?>" size="16" /> 
                    *</td>
                </tr>
          </table>
              <?php } ?>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="36%" scope="col"><div align="left" class="manchete_texto9">PRODUTO</div></th>
                      <th width="22%" class="manchete_texto9" scope="col">PRE&Ccedil;O</th>
                      <th width="13%" class="manchete_texto9" scope="col">QUANTIDADE</th>
                      </tr>
                    <?php  $sql = mysql_query("SELECT * FROM cw_carrinho WHERE sessao='$carrinho' ORDER BY id");

              while($y = mysql_fetch_array($sql))
   { ?>
                    <tr>
                      <td class="manchete_texto9"><?php echo $y["nome"]; ?></td>
                      <td><div align="center" class="manchete_texto9">R$
                        
                      <?php echo $y["preco"]; ?></div></td>
                      <td><div align="center" class="manchete_texto9"><?php echo $y["qtd"]; ?></div></td>
                      </tr>
                    <?php } ?>
                  </table></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?
  $sql_meu_carrinho = "SELECT * FROM cw_carrinho WHERE  sessao = '".session_id()."' ORDER BY nome ASC";
  $exec_meu_carrinho =  mysql_query($sql_meu_carrinho);
  $qtd_meu_carrinho = mysql_num_rows($exec_meu_carrinho);
  
  if ($qtd_meu_carrinho > 0)
  {
  	$soma_carrinho = 0;
  	while ($row_rs_produto_carrinho = mysql_fetch_assoc($exec_meu_carrinho))
	{
		$soma_carrinho += ($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd']);
  ?>
                <?
  }
}
 
  ?>
                <tr>
                  <td width="71%"><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DOS PRODUTOS:</strong>&nbsp; </div>
                    <div align="right"></div>
                    <div align="right"></div></td>
                  <td width="14%"><div align="center" class="manchete_texto9"> R$
                    <?php echo $valorcompra; ?>
                  </div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>VALOR DO  FRETE:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"> R$ <?php echo $valorfrete; ?></div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>FORMA DE ENVIO:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"><?php echo $formaenvio; ?><span class="style3"> </span></div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>PRAZO DE ENTREGA:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"> <?php echo $prazoentrega; ?> dia(s)</div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>PESO TOTAL DOS PRODUTOS:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><?php echo $pesoprodutos; ?>
                    &nbsp;Kg</td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DA COMPRA:</strong>&nbsp; </div>
                    <div align="right"></div>
                    <div align="right"></div></td>
                  <td><div align="center" class="manchete_texto9"> <b>R$</b> <b>
                    <?php echo $valortotalc; ?>
                  </b></div></td>
                  </tr>
               
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="10" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="33%" height="60" scope="col"><span class="style3"><a href="principal.php"><img src="imagens/continuar.jpg"  border="0" /></a></span></th>
                      <th width="33%" scope="col">&nbsp;</th>
                      <th width="34%" scope="col"><label>
                        <input type="image" name="imageField" src="imagens/finaliza.png" />
                      </label>
                      </th>
                    </tr>
                  </table></td>
                </tr>
        </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
      </table></form></td>
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