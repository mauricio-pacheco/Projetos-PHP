<?
function ListaItens($codped, $codcli, $acao, $aux)
	{
	include 'conecta.php';

	if ($acao == 'Recalcular') $bt_voltar= 'history.go(-2);';
	else if ($aux==1)
		{
		 $bt_voltar= 'history.go(-3);';
		}
	else $bt_voltar= 'history.go(-1);';

	$sql = "SELECT DPEDIDO.COD_PED, 
						   TIPOPRO.DESC_TCP, 
						   DPEDIDO.QTD_DPE, 
						   PRODUTO.NOME_PRO, 
						   PRODUTO.VALORATA_PRO, 
						   PRODUTO.VALORPROATAC_PRO,
						   PRODUTO.PROMOCAO_PRO,
						   PRODUTO.COD_PRO,
						   PRODUTO.ARTISTA_PRO,
						   PRODUTO.ESTOQUE_PRO
					FROM PRODUTO,TIPOPRO,PEDIDO,DPEDIDO
					WHERE PRODUTO.COD_TCP = TIPOPRO.COD_TCP  
					AND PEDIDO.COD_PED = DPEDIDO.COD_PED
					AND PRODUTO.COD_PRO = DPEDIDO.COD_PRO
					AND DPEDIDO.COD_PED = $codped 
					order by  DPEDIDO.ORDEM_DPE desc";
	//$conn->debug=true;
	$rs2=$conn->Execute($sql);
	if ($rs2->RecordCount()>0)
		{
		?>
		<table width="100%" align="center" class="tabela">
			<tr>
				<td class="tit_tabela" width="10%">Tipo</td>
				<td class="tit_tabela" width="10%">Quant.</td>
				<td class="tit_tabela" width="40%" align="center">Descrição</td>
				<td class="tit_tabela" width="15%" align="center">Preço Unitário</td>
				<td class="tit_tabela" width="15%" align="center">SubTotal</td>
				<td class="tit_tabela" width="10%" align="center">Excluir</td>																				
			</tr>
		<?
		$i=0;
		$total=0;
		while (!$rs2->EOF)
			{
			if (($i % 2)==0) $cor="#eeeeee";
			else $cor= '#FFFFFF';
			$desc_produto= $rs2->fields[8].' - '.$rs2->fields[3];
			?>
			<tr>
				<td  width="10%" bgcolor="<? print $cor;?>"><?print $rs2->fields[1];?></td>
				<td  width="10%" bgcolor="<? print $cor;?>"><input type="text" name="quant_<?print $rs2->fields[7];?>" size="5" maxlength="5" class="tabela" value="<?print $rs2->fields[2];?>" onchange="return VerificaEstoque(name, value, <?print $rs2->fields[7];?>, <? print $rs2->fields[9];?>)"></td>
				<td  width="40%" bgcolor="<? print $cor;?>"><?print $rs2->fields[8].' - '.$rs2->fields[3];?></td>
				<td  width="15%" align="right" bgcolor="<? print $cor;?>">
				<?
				if ($rs2->fields[6] != 0) $valorunit= $rs2->fields[4];
				else $valorunit= $rs2->fields[4];
				print $valorunit;
				?>
				</td>
				<td  width="15%" align="right"bgcolor="<? print $cor;?>">
				<?
				$subtotal= $valorunit * $rs2->fields[2];
				print number_format($subtotal, 2, '.', '');
				?>
				</td>
				<td align="center" width="10%" bgcolor="<? print $cor;?>"><a href="pedido.php?acao=excluir&COD_PED=<? print $codped;?>&COD_PRO=<?print $rs2->fields[7];?>"><img src="excluir.jpg" alt="" width="16" height="16" border="0"></a></td>																				
			</tr>
			<?
			$i++;
			$total= $total + $subtotal;
			$rs2->MoveNext();
			}
			
			//Busca o valor mínimo em que o frete é cobrado
			$sql_frete= "SELECT NINFRETE_EMP FROM EMPRESA WHERE COD_EMP= 1";
			$rs_frete= $conn->Execute($sql_frete);
			$MinFrete= $rs_frete->fields[0];
			
			//Busca o desconto e o valor do frete e calcula o total do pedido
			$sql_desconto= "SELECT DESCONTO_CLI, FRETE_CLI FROM CLIENTE WHERE COD_CLI= $codcli";
			$rs_desconto= $conn->Execute($sql_desconto);
			$Desconto= $rs_desconto->fields[0];
			$Frete= $rs_desconto->fields[1];
			$TotalDesc= ($total * $Desconto)/100;
			
			$SubTotalPedido= $total - $TotalDesc;
			
			if ($MinFrete > $SubTotalPedido)
				{
				$TotalPedido= ($total - $TotalDesc) + $Frete;
				}
			else
				{
				$TotalPedido= ($total - $TotalDesc);
				}
			?>		
			<tr bgcolor="#b4b4b4">
				<td colspan="4" align="right"><strong>Total R$ </strong></td>
				<td align="right"><strong><? print number_format($total, 2, '.', '');?></strong></td>
				<td>&nbsp;</td>
			</tr>	
			<tr bgcolor="#b4b4b4">
				<td colspan="4" align="right"><strong>Desconto R$ </strong></td>
				<td align="right"><strong><? print number_format($TotalDesc, 2, '.', '');?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<?
			if ($MinFrete > $TotalPedido)
				{
				?>	
				<tr bgcolor="#b4b4b4">
					<td colspan="4" align="right"><strong>Frete R$ </strong></td>
					<td align="right"><strong><? print number_format($Frete, 2, '.', '');?></strong></td>
					<td>&nbsp;</td>
				</tr>			
				<?
				}
				?>
			<tr bgcolor="#b4b4b4">
				<td colspan="4" align="right"><strong>Total à pagar R$ </strong></td>
				<td align="right"><strong><? print number_format($TotalPedido, 2, '.', '');?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="6"><a href="javascript:nova('obs_ped.php?cod_ped=<? print $codped;?>','','550','250','10','10')">Clique aqui para incluir observações no seu pedido</a></td>
			</tr>
			<tr>
				<td colspan="6" align="center">
				<p>&nbsp;</p>
				<input type="submit" name="acao" value="Recalcular" class="tabela">&nbsp;
				<input type="button" name="acao" value="Continuar Pedido" class="tabela" onclick="<? print $bt_voltar;?>">&nbsp;
				<input type="button" name="acao" value="Finalizar" class="tabela" onClick="if (confirm('Deseja finalizar o pedido?')) location.href='pedido.php?acao=Finaliza Pedido&cod_ped=<? print $codped;?>';">				
				</td>
			</tr>											
			<tr>
				<td colspan="6" align="right">
				Versão para impressão <a href="javascript:nova('verpedido.php?codped=<? print $codped;?>','','700','400','10','10')"><img src="imprimir.gif" alt="Imprimir Pedido" width="16" height="18" border="0"></a>
				</td>
			</tr>											
		</table>
		<?
		}
	else
		{
		?>
		<p>&nbsp;</p>
		<center><strong>Seu carrinho está vazio.</strong></center>
		<p>&nbsp;</p>
		<center><input type="button" name="acao" value="Voltar" class="tabela" onclick="location.href='principal.php';"></center>
		<p>&nbsp;</p>
		<?
		}
	}
	
Function ValorPRODUTO($codpro)
	{
	include 'conecta.php';
	$sql = "select VALORATA_PRO, VALORPROATAC_PRO, PROMOCAO_PRO from PRODUTO where COD_PRO = $codpro ";
	$rs = $conn->Execute($sql);
	if ($rs->fields[2]!='0') return $rs->fields[0];
	else return $rs->fields[0];
	}
	
Function InsereItens($codped,$codpro,$valor)
	{
	include 'conecta.php';	
	$sql_busca= "select ESTOQUE_PRO from PRODUTO where COD_PRO= $codpro";
	$rs_busca= $conn->Execute($sql_busca);

	if ($rs_busca->fields[0]==0)
		{
		?>
		<script>
		alert("Produto não disponível");
		history.go(-1);
		//location.href='principal.php';
		</script>
		<?
		}
	else
		{
		$sql = "select MAX(ORDEM_DPE) as m from DPEDIDO where COD_PED = $codped";
		$max = $conn->Execute($sql);
		$aux = $max->fields[0];
		if ($aux > 0) $aux = $aux + 1;
		else $aux = 1;
		
		$sql = "insert into DPEDIDO values ($codped,$codpro,1,'$valor',0,$aux)";
		$exe = $conn->Execute($sql);
		}
	}
	
Function ExcluirItemPEDIDO($cod_ped, $COD_PRO)
	{
	include 'conecta.php';	
	$sql = "delete from DPEDIDO where cod_ped= $cod_ped and COD_PRO= $COD_PRO;";
	$exe = $conn->Execute($sql);
	}
	
Function RecalcularPEDIDO($cod_ped, $COD_PRO, $quant_pro, $subtotal)
	{
	include 'conecta.php';
	if ($quant_pro > 0)
		{
		$sql_update= "UPDATE DPEDIDO SET SUBTOTAL_DPE= $subtotal, QTD_DPE= $quant_pro WHERE COD_PED=$cod_ped AND COD_PRO=$COD_PRO;";
		}
	else
		{
		$sql_update= "DELETE FROM DPEDIDO WHERE COD_PED=$cod_ped AND COD_PRO=$COD_PRO;";
		}
	$rs_update= $conn->Execute($sql_update);
	}
	
Function MudaStatusPEDIDO($cod_ped, $obs)
	{
	$agora = date("Y-m-d");
	$hora = date("H:i:s");
	include 'conecta.php';
	$sql= "UPDATE PEDIDO SET COD_SPE= 'F', DATA_PED = '$agora', HORA_PED = '$hora'   WHERE COD_PED=$cod_ped";
	//$conn->debug= true;
	$rs= $conn->Execute($sql);
	?>
	<script>
	location.href="pedidofinalizado.php?cod_ped=<? print $cod_ped;?>";
	</script>
	<?
	}
	
Function BuscaQuantProdutoEstoque($cod_pro, $quant_pro)
	{
	$retorno = True;
	include 'conecta.php';
	$sql_busca= "select ESTOQUE_PRO from PRODUTO where COD_PRO= $cod_pro";
	$conn->debug = true;
	$rs_busca= $conn->Execute($sql_busca);

	if ($quant_pro >  $rs_busca->fields[0])
		{
		$retorno = False;
		}

	return $retorno;
	}

?>