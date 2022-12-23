<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Vitrola</title>
<link href="estilo.css" rel="stylesheet" type="text/css">	
</head>
<body>
<?
include 'checar_sessao.php';
include 'funcoes.php';
include 'funcoespedido.php';
?>

<table align="center" width="98%" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td align="center"><strong><font size="2">Pedido Vitrola</font></strong></td>
	</tr>
	<tr>
		<td width="100%">
		<font size="1"><strong>Cliente: <? print $nome;?></strong><br><br></font>
		<?
		include 'conecta.php';
		$sql = "SELECT DPEDIDO.COD_PED, 
						   TIPOPRO.DESC_TCP, 
						   DPEDIDO.QTD_DPE, 
						   PRODUTO.NOME_PRO, 
						   PRODUTO.VALORATA_PRO, 
						   PRODUTO.VALORPROATAC_PRO,
						   PRODUTO.PROMOCAO_PRO,
						   PRODUTO.COD_PRO,
						   PRODUTO.ARTISTA_PRO
					FROM PRODUTO,TIPOPRO,PEDIDO,DPEDIDO
					WHERE PRODUTO.COD_TCP = TIPOPRO.COD_TCP  
					AND PEDIDO.COD_PED = DPEDIDO.COD_PED
					AND PRODUTO.COD_PRO = DPEDIDO.COD_PRO
					AND DPEDIDO.COD_PED = $codped ";
	//$conn->debug=true;
	$rs2=$conn->Execute($sql);
	if ($rs2->RecordCount()>0)
		{
		?>
		<table width="95%" align="center" class="tabela">
			<tr bgcolor="#b4b4b4">
				<td width="10%"><strong>Tipo</strong></td>
				<td width="50%" align="center"><strong>Descrição</strong></td>
				<td width="10%"><strong>Quant.</strong></td>
				<td width="15%" align="center"><strong>Preço Unit.</strong></td>
				<td width="15%" align="center"><strong>SubTotal</strong></td>
			</tr>
		<?
		$i=0;
		$total=0;
		while (!$rs2->EOF)
			{
			if (($i % 2)==0) $cor="#eeeeee";
			else $cor= '#FFFFFF';
			?>
			<tr>
				<td bgcolor="<? print $cor;?>"><?print $rs2->fields[1];?></td>
				<td bgcolor="<? print $cor;?>"><?print $rs2->fields[8].' - '.$rs2->fields[3];?></td>
				<td bgcolor="<? print $cor;?>"><?print $rs2->fields[2];?></td>
				<td align="right" bgcolor="<? print $cor;?>">
				<?
				if ($rs2->fields[6] != 0) $valorunit= $rs2->fields[4];
				else $valorunit= $rs2->fields[4];
				print $valorunit;
				?>
				</td>
				<td align="right"bgcolor="<? print $cor;?>">
				<?
				$subtotal= $valorunit * $rs2->fields[2];
				print number_format($subtotal, 2, '.', '');
				?>
				</td>
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
			$sql_desconto= "SELECT DESCONTO_CLI, FRETE_CLI FROM CLIENTE WHERE COD_CLI= $codigo";
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
			</tr>	
			<tr bgcolor="#b4b4b4">
				<td colspan="4" align="right"><strong>Desconto R$ </strong></td>
				<td align="right"><strong><? print number_format($TotalDesc, 2, '.', '');?></strong></td>
			</tr>	
			<?
			if ($MinFrete > $TotalPedido)
				{
				?>	
				<tr bgcolor="#b4b4b4">
					<td colspan="4" align="right"><strong>Frete R$ </strong></td>
					<td align="right"><strong><? print number_format($Frete, 2, '.', '');?></strong></td>
				</tr>			
				<?
				}
				?>			
			<tr bgcolor="#b4b4b4">
				<td colspan="4" align="right"><strong>Total à pagar R$ </strong></td>
				<td align="right"><strong><? print number_format($TotalPedido, 2, '.', '');?></strong></td>
			</tr>
		</table>
		<?
		}
		?>
		</td>
	</tr>
</table>
<?
Fim();
?>
<center>
<a href="#" onClick="print();"><img src="imprimir.gif" alt="Imprimir" width="16" height="18" border="0"></a>
</center>


