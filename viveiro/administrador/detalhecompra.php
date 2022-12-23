<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <?php  
		   include "conexao.php";
		   $id = $_GET['id'];
		   $idcliente = $_GET['idcliente'];
		   $data = $_GET['data'];
		   $hora = $_GET['hora'];
		   
		    ?>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b><?php $sql2 = mysql_query("SELECT * FROM cw_clientes WHERE id='$idcliente' ORDER BY id LIMIT 1");

              while($x = mysql_fetch_array($sql2))
   { ?>
                Compra Efetuada por <?php echo $x["cliente"]; ?><?php } ?> em <?php echo $data; ?> - <?php echo $hora; ?></b></font></td>
                </tr>
              </table></td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="fontemenu2">
              <tr>
                <td><?php 
			  
			  $sql = mysql_query("SELECT * FROM cw_compras WHERE id='$id' ORDER BY id LIMIT 1");

              while($y = mysql_fetch_array($sql))
   {
			  
			   ?>
              
              
              <table width="99%" border="0" align="center">
                <tr>
                  <td width="46%" class="manchete_texto9"><strong>ENDEREÇO DE ENTREGA</strong></td>
                  <td width="54%" class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>STATUS DA COMPRA:
                       
                      </strong></td>
                      <td><form name="formbusca" method="post" action="atualizacompra.php">
                      <input type="hidden" value="<?php echo $y["id"]; ?>" name="idcompra" />
            <input type="hidden" value="<?php echo $y["idcliente"]; ?>" name="idcliente" />
            <input type="hidden" value="<?php echo $y["data"]; ?>" name="data" />
            <input type="hidden" value="<?php echo $y["hora"]; ?>" name="hora" />
                      <select name="status" class="fontetabela" > 
           <option value="COMPRA EFETUADA" <?php  if($y["status"]=='COMPRA EFETUADA') { echo 'selected'; } else { } ?>>COMPRA EFETUADA</option>
                      <option value="AGUARDANDO PAGAMENTO" <?php  if($y["status"]=='AGUARDANDO PAGAMENTO') { echo 'selected'; } else { } ?>>AGUARDANDO PAGAMENTO</option>
                      <option value="PAGAMENTO CONFIRMADO" <?php  if($y["status"]=='PAGAMENTO CONFIRMADO') { echo 'selected'; } else { } ?>>PAGAMENTO CONFIRMADO</option>
                      <option value="ENVIANDO PRODUTO" <?php  if($y["status"]=='ENVIANDO PRODUTO') { echo 'selected'; } else { } ?>>ENVIANDO PRODUTO</option>
                      <option value="COMPRA JÁ ENTREGUE" <?php  if($y["status"]=='COMPRA JÁ ENTREGUE') { echo 'selected'; } else { } ?>>COMPRA JÁ ENTREGUE</option>
                      <option value="COMPRA CANCELADA" <?php  if($y["status"]=='COMPRA CANCELADA') { echo 'selected'; } else { } ?>>COMPRA CANCELADA</option>
                    </select>
                      <input name="button" type="submit" class="fontetabela" value="ATUALIZAR" />
                    </form></td>
                    </tr>
                  </table></td>
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
			  $sql6 = mysql_query("SELECT * FROM cw_produtoscomprados WHERE carrinho='$carrinho' ORDER BY id");

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
                  <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"> <?php echo $y["prazoentrega"]; ?> dia(s)</div></td>
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
                      <th scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <th scope="col" align="left"><img src="imagens/impressora.png" width="160" height="50" /></th>
                    </tr>
                    <tr>
                      <th scope="col" align="left" class="manchete_texto">&nbsp;</th>
                    </tr>
                    <tr>
                      <th width="43%" scope="col" align="left" class="manchete_texto">&nbsp;<a href="compras.php" class="manchete_texto"><b>RETORNAR AO ADMINISTRADOR DE COMPRAS</b></a></th>
                      
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
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>