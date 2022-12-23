<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
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
            <td width="761" valign="top">
           <?php  
		   include "administrador/conexao.php";
		   $id = $_GET['id'];
		   $idcliente = $_GET['idcliente'];
		   $data = $_GET['data'];
		   $hora = $_GET['hora'];
		   
		    ?>
           
            <table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>
                <?php $sql2 = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' ORDER BY id LIMIT 1");

              while($x = mysql_fetch_array($sql2))
   { ?>
                Compra Efetuada por <?php echo $x["cliente"]; ?><?php } ?> em <?php echo $data; ?> - <?php echo $hora; ?></strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
             
              
              <?php 
			  
			  $sql = mysql_query("SELECT * FROM cw_compras WHERE id='$id' ORDER BY id LIMIT 1");

              while($y = mysql_fetch_array($sql))
   {
			  
			   ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
            </table>
              
              <table width="99%" border="0" align="center">
                <tr>
                  <td width="51%" class="manchete_texto9"><strong>ENDEREÇO DE ENTREGA</strong></td>
                  <td width="49%" class="manchete_texto9"><strong>STATUS DA COMPRA: <font color="#006699"><?php echo $y["status"]; ?></font></strong></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9"><strong>Logradouro:</strong> <?php echo $y["endereco"]; ?>
                     <strong>Número:</strong> <?php echo $y["numero"]; ?></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9"><strong>Bairro:</strong> <?php echo $y["bairro"]; ?>
                    
                    <strong>Complemento:</strong> <?php echo $y["complemento"]; ?></td>
                </tr>
            </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td class="manchete_texto9"><strong>Cidade:</strong> <?php echo $y["cidade"]; ?>
                    <strong>Estado:</strong> <?php echo $y["estado"]; ?>
                    <strong>CEP:</strong> <?php echo $y["cep"]; ?></td>
                </tr>
          </table>
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
                      <th width="13%" class="manchete_texto9" scope="col">SUB-TOTAL</th>
                      </tr>
                    <?php 
			  $carrinho = $y["carrinho"];
			  $sql6 = mysql_query("SELECT * FROM cw_produtoscomprados WHERE carrinho='$carrinho' AND data='$data' AND hora='$hora' ORDER BY id");

              while($z = mysql_fetch_array($sql6))
   {
			$subtotalc =  $z["qtd"] * $z["preco"];
			   ?>
                    <tr>
                      <td class="manchete_texto9"><?php echo $z["produto"]; ?></td>
                      <td><div align="center" class="manchete_texto9">R$
                        
                      <?php echo $z["preco"]; ?></div></td>
                      <td align="center"><span class="manchete_texto9"><?php echo $z["qtd"]; ?></span></td>
                      <td><div align="center" class="manchete_texto9">R$ <?php echo $subtotalc; ?></div></td>
                      </tr>
                   <?php } ?>
                  </table> </td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td width="71%"><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DOS PRODUTOS:</strong>&nbsp; </div>
                    <div align="right"></div>
                    <div align="right"></div></td>
                  <td width="14%"><div align="center" class="manchete_texto9"> R$
                    <?php echo $y["valorcompra"]; ?>
                  </div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>VALOR DO  FRETE:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"> R$ <?php echo $y["valorfrete"]; ?></div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>FORMA DE ENVIO:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"><?php echo $y["formaenvio"]; ?><span class="style3"> </span></div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>PRAZO DE ENTREGA:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"> <?php echo $y["prazoentrega"]; ?> dia(s) Úteis</div></td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>PESO TOTAL DOS PRODUTOS:</strong>&nbsp; </div></td>
                  <td align="center" class="manchete_texto9"><?php echo $y["pesoprodutos"]; ?>
                    &nbsp;Kg</td>
                  </tr>
                <tr>
                  <td><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DA COMPRA:</strong>&nbsp; </div>
                    <div align="right"></div>
                    <div align="right"></div></td>
                  <td><div align="center" class="manchete_texto9"> <b>R$</b> <b>
                    <?php echo $y["valortotal"]; ?>
                  </b></div></td>
                  </tr>
               
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="33%" height="60" scope="col">&nbsp;</th>
                      <th width="33%" scope="col"><a href="javascript:window.print();"><img src="imagens/impressora.png" border="0" /></a></th>
                      <th width="34%" scope="col">&nbsp;</th>
                    </tr>
                  </table>
                    <?php } ?></td>
                </tr>
      </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
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