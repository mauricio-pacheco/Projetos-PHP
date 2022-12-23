<?
include 'checar_sessao.php';
include 'funcoes.php';
include 'conecta.php';
include 'funcoespedido.php';

//Altera a data do pedido
$DATA= date("Y/m/d");
$dt= date("d/m/Y");
$sql_pedido= "UPDATE PEDIDO SET DATA_PED= '$DATA' WHERE COD_PED=$cod_ped;";
$rs_pedido= $conn->Execute($sql_pedido);

//Busca o valor mínimo em que o frete é cobrado
$sql_frete= "SELECT NINFRETE_EMP FROM EMPRESA WHERE COD_EMP= 1";
$rs_frete= $conn->Execute($sql_frete);
$MinFrete= $rs_frete->fields[0];

//Calcula o total do pedido
$sql_total = "SELECT DPEDIDO.COD_PED, 
	   TIPOPRO.DESC_TCP, 
	   DPEDIDO.QTD_DPE, 
	   PRODUTO.NOME_PRO, 
	   PRODUTO.VALORATA_PRO, 
	   PRODUTO.VALORPROATAC_PRO,
	   PRODUTO.PROMOCAO_PRO,
	   PRODUTO.COD_PRO
		FROM PRODUTO,TIPOPRO,PEDIDO,DPEDIDO
		WHERE PRODUTO.COD_TCP = TIPOPRO.COD_TCP  
		AND PEDIDO.COD_PED = DPEDIDO.COD_PED
		AND PRODUTO.COD_PRO = DPEDIDO.COD_PRO
		AND DPEDIDO.COD_PED = $cod_ped ";
$rs_total= $conn->Execute($sql_total);
if ($rs_total->RecordCount()>0)
	{
	$TotalPed= 0;
	$subtotal= 0;
	while(!$rs_total->EOF)
		{
		if ($rs_total->fields[6] != 0) $valorunit= $rs_total->fields[5];
		else $valorunit= $rs_total->fields[4];
		$subtotal= $valorunit * $rs_total->fields[2];
		$TotalPed= $TotalPed + $subtotal;
		$rs_total->MoveNext();
		}
	}


//Função para mandar e-mail
$sql= "SELECT PEDIDO.COD_PED, 
		CLIENTE.NOME_CLI, 
		CLIENTE.EMAIL_CLI, 
		PEDIDO.DATA_PED, 
		PEDIDO.HORA_PED, 
		DPEDIDO.COD_PRO, 
		PRODUTO.NOME_PRO, 
		DPEDIDO.QTD_DPE,
		CLIENTE.DESCONTO_CLI,
		PRODUTO.ARTISTA_PRO,
		TIPOPRO.DESC_TCP,
		PEDIDO.OBS_PED,
		CLIENTE.FRETE_CLI
	FROM CLIENTE, DPEDIDO, PEDIDO, PRODUTO, TIPOPRO
	WHERE DPEDIDO.COD_PED = PEDIDO.COD_PED
		and DPEDIDO.COD_PRO = PRODUTO.COD_PRO
		and CLIENTE.COD_CLI = PEDIDO.COD_CLI
		and TIPOPRO.COD_TCP = PRODUTO.COD_TCP 
		and PEDIDO.COD_PED= $cod_ped;";
//$conn->debug=true;
$rs= $conn->Execute($sql);
if ($rs->RecordCount()>0)
	{
	$DESCONTO_CLI= $rs->fields[8];
	$OBS_PED= $rs->fields[11];
	$FRETE_CLI= $rs->fields[12];
	$TabPedido='';
	while (!$rs->EOF)
		{
		$COD_PED= $rs->fields[0];
		$NOME_CLI= $rs->fields[1];
		$EMAIL_CLI= $rs->fields[2];
		$COD_PRO= $rs->fields[5];
		$NOME_PRO= $rs->fields[6];
		$ARTISTA_PRO= $rs->fields[9];
		$QTD_DPE= $rs->fields[7];
		$DESC_TCP= $rs->fields[10];
		$TabPedido= $TabPedido.'<tr>
			<td align=center width=10%>'.$COD_PRO.'</td>
			<td align=center width=10%>'.$DESC_TCP.'</td>
			<td>'.$ARTISTA_PRO.' - '.$NOME_PRO.'</td>
			<td align=center width=10%>'.$QTD_DPE.'</td>
		</tr>';
		$rs->MoveNext();
		}

$TotalPed= number_format($TotalPed, 2, '.', '');
$TotalPedDesc= number_format(($TotalPed * $DESCONTO_CLI)/100, 2, '.', '');
$TotalGeral= number_format($TotalPed - $TotalPedDesc, 2, '.', '');

if ($MinFrete > $TotalGeral) 
	{
	$TotalGeral = number_format($TotalGeral + $FRETE_CLI, 2,'.', '');
	}
else
	{
	$FRETE_CLI = number_format(0, 2,'.', '');
	}

	$subject = "Pedido Vitrola";
	$html = "
	<html>
		<title>Vitrola</title>
		<link href=../estilo.css rel=stylesheet type=text/css>
	<body>
	<table align=center width=600 border=0 style=border-color: black; border-style: solid; border-width:1; font-family: verdana; font-size:9;>
		<tr>
			<td align=center bgcolor=#FF0000>
			<font color=#FFFFFF face=verdana size=2>
			<b>Vitrola Comercial Fonografica LTDA</b><br>
			</font>
			</td>
		</tr>
	</table>
	<table align=center width=600 border=1 bordercolor=#000000 cellspacing=0>
		<tr>
			<td colspan=4 align=center bgcolor=#dadada>
			<font face=verdana size=2>
			Detalhes do Pedido
			</font>
			</td>
		</tr>
		<tr>
			<td colspan=4><font face=verdana size=1>Cliente</font><br>
			<strong><font face=verdana size=2>".$NOME_CLI."</font></strong></td>
		</tr>
		<tr>
			<td colspan=4><font face=verdana size=1>Data do pedido</font><br>
			<font face=verdana size=2>".$dt."</font></td>			
		</tr>
		<tr bgcolor=#dadada>
			<td><font face=verdana size=1>Código</font></td>
			<td><font face=verdana size=1>Tipo</font></td>
			<td><font face=verdana size=1>Produto</font></td>
			<td><font face=verdana size=1>Quantidade</font></td>
		</tr>		
		".$TabPedido."
		<tr>
			<td colspan=4 align=right><strong>Total R$ ".$TotalPed."</strong></td>
		</tr>			
		<tr>
			<td colspan=4 align=right><strong>Desconto R$ ".$TotalPedDesc."</strong></td>
		</tr>	
		<tr>
			<td colspan=4 align=right><strong>Frete R$ ".$FRETE_CLI."</strong></td>
		</tr>	
		<tr>
			<td colspan=4 align=right><strong>Total à pagar R$ ".$TotalGeral."</strong></td>
		</tr>
		<tr>
			<td colspan=4><font face=verdana size=1>Observações:<br>
			".$OBS_PED."
			</font></td>
		</tr>
	</table>
	</html>";

$sql = "select EMAIL_EMP from EMPRESA where COD_EMP = 1";
$res = $conn->Execute($sql);

$to = $res->fields[0];

$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.= "From: Vitrola<".$res->fields[0].">\r\n";
$headers.= "Cc: ".$EMAIL_CLI."\r\n";

if (mail($to, $subject, $html, $headers)) 
	{
	//print 'Email enviado com sucesso !';
	} 
else
	{
	//print 'Ocorreu um erro durante o envio do email.';
	}
}


Inicio();
?>
<table align="center" width="760" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td align="center"><? Logo();?></td>
	</tr>
	<tr>
		<td width="100%" align="center" height="150">
		<font size="+2"><strong>Pedido Finalizado</strong></font>
		<p>&nbsp;</p>
		</td>
	</tr>
	<tr>
		<td align="center">
		<input type="button" name="acao" value="Voltar" class="tabela" onclick="location.href='principal.php';">
		<p>&nbsp;</p>
		</td>
	</tr>
</table>
<?
Fim();
?>
