<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Vitrola</title>
<link href="estilo.css" rel="stylesheet" type="text/css">	
<script language="javascript">
function SemAspa(input)
	{
	if ((event.keyCode==34)||(event.keyCode==39))
		event.returnValue = false;
	}	
</script>
</head>
<body>
<?
include 'checar_sessao.php';
include 'funcoes.php';
include 'funcoespedido.php';
?>

<table align="center" width="98%" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td align="center" colspan="2"><strong><font size="2">Pedido Vitrola</font></strong></td>
	</tr>
	<?
	include 'conecta.php';
	$sql_busca= "SELECT OBS_PED FROM PEDIDO WHERE COD_PED=$cod_ped";
	$rs_busca= $conn->Execute($sql_busca);
	if ($rs_busca->RecordCount()>0) $obs_ped= $rs_busca->fields[0];
	?>
	<form name="form1" method="post">
	<tr>
		<td valign="top" align="right">Observações:</td>
		<td><textarea cols="60" rows="5" name="obs" class="tabela" onkeypress="SemAspa(this)"><? print $obs_ped;?></textarea><td>
	</tr>
	<tr>
		<td align="center" colspan="2">
		<input type="submit" name="cad_obs" value="Salvar" class="tabela">&nbsp;
		<input type="button" name="fechar" value="Fechar" class="tabela" onclick="window.close();">
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	</form>
	<?
	if ($cad_obs=='Salvar')
		{
		$sql= "UPDATE PEDIDO SET OBS_PED= '$obs' WHERE COD_PED=$cod_ped";
		//$conn->debug= true;
		$rs= $conn->Execute($sql);
		?>
		<script>
		alert("Observações salvas com sucesso!");
		location.href="obs_ped.php?cod_ped=<? print $cod_ped;?>";
		</script>
		<?
		}
	?>	
</table>
<?
Fim();
?>

