<?
include 'checar_sessao.php';
include 'funcoes.php';
include 'conecta.php';
include 'funcoespedido.php';

Inicio();
?>

<script LANGUAGE = "JavaScript">
	<!--
	function nova(url,janela,larg,alt,pos1,pos2){
	window.open(url,janela,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,top="+pos1+",left="+pos2+",screenY="+pos1+",screenX="+pos2+",width="+larg+",height="+alt);
	}
	// -->
</script>

<script LANGUAGE = "JavaScript">
	function VerificaEstoque(nome, valor, cod_pro, estoque)
		{
		if (valor > estoque)
			{
			alert("A quantidade informada é maior que a quantidade em estoque. \nEm estoque "+estoque+" unidades do produto.");
			return false;
			}
		return true;
		}
</script>


<form name="form1" action="pedido.php" class="fundo2" method="post" onClick="highlight(event)" onKeyUp="highlight(event)" onSubmit="return ValidaCampos(this)">
<table align="center" width="760" border="0" class="tabela" bgcolor="#ffffff">
	<tr
		<td align="center"><? Logo();?></td>
	</tr>
	<tr>
		<td width="100%">
		<!-- Inicio -->
		<br>
		<?
		print '<font size="2"><strong>'.$nome.'<br><br></strong></font>';
		//primeiro verificamos se possui algum PEDIDO aberto...
		include 'conecta.php';
		
		//$conn->debug= true;
		
		if ($acao=='mostra')
		{
		$sql = "select COD_PED from PEDIDO where COD_CLI = $codigo and COD_SPE = 'M' ";
		$rs = $conn->Execute($sql);
		if ($rs->RecordCount()>0)
			{
			$COD_PED= $rs->fields[0];
			if ($codpro != 'X') //se vier algum codigo novo, insere o PRODUTO
				{
				$valor = ValorPRODUTO($codpro);
				InsereItens($COD_PED,$codpro,$valor);
				}
			ListaItens($COD_PED, $codigo, $acao,0);
			}// fim do sql do PEDIDO em branco...
		else 
			{
			$data = date("Y/m/d");
			$hora = date("H:i:s");
			$sql = "insert into PEDIDO values (0,$codigo,'M','$data','$hora', '', 0, 0)"; //insere o PEDIDO
			$exe = $conn->Execute($sql);
			$sql = "select COD_PED from PEDIDO where COD_CLI = $codigo and COD_SPE = 'M' "; //seleciona o codigo do PEDIDO
			$rs1 = $conn->Execute($sql);
			$COD_PED = $rs1->fields[0];
			if ($codpro != 'X') //se vier algum codigo novo, insere o PRODUTO
				{
				$valor = ValorPRODUTO($codpro);
				InsereItens($COD_PED,$codpro,$valor);
				}
			ListaItens($COD_PED, $codigo, $acao,0);
			}
		}

		if ($acao=='excluir')
			{
			ExcluirItemPEDIDO($COD_PED, $COD_PRO);
			ListaItens($COD_PED, $codigo, $acao,0);
			}

		if ($acao=='Finaliza Pedido')
			{
			//TESTAR SE TEM OS PRODUTOS EM ESTOQUE
			//if ($rs_rec->RecordCount()>0)
				//{
				$sql_fin = "select COD_PED from PEDIDO where COD_CLI = $codigo and COD_SPE = 'M' ";
				$rs_fin = $conn->Execute($sql_fin);
				$COD_PED= $rs_fin->fields[0];
				
				//VERIFICAR SE TEM ALGUM ITEM COM O PEDIDO MAIOR Q O ESTOQUE
				$sql = "SELECT DPEDIDO.COD_PED, 
						   TIPOPRO.DESC_TCP, 
						   DPEDIDO.QTD_DPE, 
						   PRODUTO.NOME_PRO,
						   PRODUTO.VALORATA_PRO, 
						   PRODUTO.VALORPROATAC_PRO,
						   PRODUTO.PROMOCAO_PRO,
						   PRODUTO.COD_PRO,
						   PRODUTO.ESTOQUE_PRO,
						   PRODUTO.ARTISTA_PRO
					FROM PRODUTO,TIPOPRO,PEDIDO,DPEDIDO
					WHERE PRODUTO.COD_TCP = TIPOPRO.COD_TCP  
					AND PEDIDO.COD_PED = DPEDIDO.COD_PED
					AND PRODUTO.COD_PRO = DPEDIDO.COD_PRO
					AND DPEDIDO.COD_PED = $COD_PED
					AND PRODUTO.COD_PRO = DPEDIDO.COD_PRO
					AND PRODUTO.ESTOQUE_PRO < DPEDIDO.QTD_DPE
					order by  DPEDIDO.ORDEM_DPE desc";
				$rs11 = $conn->Execute($sql);
				
				$continuar = true;
				while (!$rs11->EOF)
					{
					$continuar = false;
					if ($rs11->fields[8]==0)
						{
						print "<script>alert('O produto ".TiraAspas($rs11->fields[9]).' - '.TiraAspas($rs11->fields[3])." não esta mais disponível em estoque.')</script>";
						}
					else if ($rs11->fields[8]==1)
						{
						print "<script>alert('O produto \"".TiraAspas($rs11->fields[9]).' - '.TiraAspas($rs11->fields[3])."\" possui apenas \"".$rs11->fields[8]."\" unidade disponível no estoque.')</script>";
						}
					else
						{
						print "<script>alert('O produto \"".TiraAspas($rs11->fields[9]).' - '.TiraAspas($rs11->fields[3])."\" possui apenas \"".$rs11->fields[8]."\" unidades disponíveis no estoque.')</script>";
						}
					$rs11->MoveNext();
					}
					
				
				if ($continuar == true)
					{
					//AQUI FINALIZA O PEDIDO.
					if ($rs_fin->RecordCount()>0) MudaStatusPEDIDO($COD_PED, $obs);
					}
				else
					{
					?>
					<script>
					location.href="pedido.php?acao=Carrinho&cod_ped=<? print $cod_ped;?>&aux=1";
					</script>
					<?
					}
				//}
			}
			
		if ($acao=='Recalcular')
			{
			$sql_rec = "select COD_PED from PEDIDO where COD_CLI = $codigo and COD_SPE = 'M' ";
			$rs_rec = $conn->Execute($sql_rec);
			if ($rs_rec->RecordCount()>0)
				{
				$COD_PED= $rs_rec->fields[0];
				$sql_busca = "SELECT DPEDIDO.COD_PED, 
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
					AND DPEDIDO.COD_PED = $COD_PED
					order by  DPEDIDO.ORDEM_DPE desc";
				$rs_busca= $conn->Execute($sql_busca);
				if ($rs_busca->RecordCount()>0)
					{
					while (!$rs_busca->EOF)
						{
						$cod_pro= $rs_busca->fields[7];
						$quant_pro= $HTTP_POST_VARS["quant_".$cod_pro];
						
						if ($rs_busca->fields[6]!= 0) $valorunit= $rs_busca->fields[4];
						else $valorunit= $rs_busca->fields[4];

						$subtotal= $quant_pro * $valorunit;

						RecalcularPEDIDO($COD_PED, $cod_pro, $quant_pro, $subtotal);

						$rs_busca->MoveNext();
						}
					ListaItens($COD_PED, $codigo, $acao,0);
					}
				}
			}

		if ($acao=='Carrinho')
			{
			$sql_rec = "select COD_PED from PEDIDO where COD_CLI = $codigo and COD_SPE = 'M' ";
			$rs_rec = $conn->Execute($sql_rec);
			if ($rs_rec->RecordCount()>0)
				{
				$COD_PED= $rs_rec->fields[0];
				ListaItens($COD_PED, $codigo, $acao,$aux);
				}
			}
		?>	
		<!-- Final -->
		</td>
	</tr>
</table>
</form>
<?
Fim();
?>