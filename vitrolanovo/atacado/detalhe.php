<?
include 'checar_sessao.php';
include 'conecta.php';
include 'funcoes.php';
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

	<html>
	<head>
		<title>Vitrola</title>
	<link href="estilo.css" rel="stylesheet" type="text/css">	
	<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script language="JavaScript" TYPE="text/javascript" src="overlib_mini.js"></script> 

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body>
<table width="100%" border="0" bgcolor="#ffffff">
	<tr><td height="330" valign="top">
<?
$sql = " SELECT PRODUTO.COD_TCP, 
			    TIPOPRO.DESC_TCP, 
				GENERO.DESC_GEN, 
				CATEGORIA.DESC_CAT, 
				PRODUTO.COD_PRO, 
				PRODUTO.NOME_PRO, 
				PRODUTO.ARTISTA_PRO, 
				PRODUTO.VALORATA_PRO, 
				PRODUTO.VALORPROATAC_PRO, 
				PRODUTO.PROMOCAO_PRO 
				FROM GRAVADORA, GENERO, TIPOPRO, PRODUTO, CATEGORIA
				WHERE TIPOPRO.COD_TCP = PRODUTO.COD_TCP
				AND GRAVADORA.COD_GRA = PRODUTO.COD_GRA
				AND PRODUTO.listar_pro <> '0'
				AND CATEGORIA.COD_CAT = PRODUTO.COD_CAT
				AND GENERO.COD_GEN = PRODUTO.COD_GEN 
				AND PRODUTO.COD_PRO = $cod ;";
//	$conn->debug=true;
	$rs=$conn->Execute($sql);
	if ($rs->RecordCount()>0)
		{
		?>
		<table width="100%" align="center" cellpadding="2" cellspacing="7" border="0" bgcolor="#ffffff" >
			<tr>
				<td valign="top" width="15%" align="center">
				<?
				$aux = Imagem($rs->fields[4]);
				if ($aux == 'imagens/indisp.jpg')
					{
					?>
					<img src="<?print $aux;?>" alt="" border="0" width="82" height="100">
					<?
					}
				else
					{
					?>
					<img src="<?print $aux;?>" alt="" width="100" height="100" border="0">
					<?
					}
				?>
				</td>
				<td valign="top" align="left">
							<strong><font size="+1"><?print $rs->fields[5];?></font></strong><br>
							<?print $rs->fields[6];?><br>
							<?print $rs->fields[1].' - '.$rs->fields[2];?><br>
							<?if ($rs->fields[9] != '0')	
								{
								?>
								<font color="#009966"><font size="-2"><strong>de R$ <?print $rs->fields[8];?></strong></font></font><br>
								<font color="#FF0000"><strong>por R$ <?print $rs->fields[7];?></strong></font>
								<?
								}
							  else 	
							  	{
								?>
								<font color="#ff0000"><strong>R$ <?print $rs->fields[7];?></strong></font>
								<?
								}
							?>
					</td>							
			</tr>
		</table>
		<?
	$sql = "select COD_PRO, INDICE_FAX, TITULO_FAX, ARTISTA_FAX, NRO_FAX, NOME_FAX, ARQUIVO_FAX from FAIXA where COD_PRO = $cod order by NRO_FAX, INDICE_FAX";
	$rs3 = $conn->Execute($sql);
	if ($rs3->RecordCount()>0)
		{
		$aux=1;
		?>
		<table width="70%" align="center">
			<tr>
				<td class="subtit_tabela">Faixas</td>
			</tr>	
			<?
			$qtd =  0;
			$ant =  0;
			while (!$rs3->EOF)
			  {
			  if ($rs3->fields[4] > 1) $qtd = $rs3->fields[4];
			  $rs3->MoveNext();
			  }
		  
			$rs3->MoveFirst(); 
		
			while (!$rs3->EOF)
				{
				if ($qtd > 1 )
				  {
				  if ($ant <> ($rs3->fields[4]))
				    {
					?>
					<tr>
						<td>
						<?
							if ($rs3->fields[5]<>'')
	  						  print '<strong>'.$rs->fields[1].' '.($rs3->fields[4]).' - '.($rs3->fields[5]).'</strong>';
							else 
							  print '<strong>'.$rs->fields[1].' '.($rs3->fields[4]).'</strong>';
						?>
						</td>
					</tr>
					<?
					$ant = $rs3->fields[4];
					} 
				  }
				?>
				<tr>
					<td>
					<?
					if (strlen($rs3->fields[1])==1) $rs3->fields[1]= '0'.$rs3->fields[1];
					$aux = $rs3->fields[6];
					
					if (strlen($aux) > 0 )
						{
						if (strpos($aux,"://"))
							{
							print '<a href=player.php?ArquivoMusica='.$aux.' target=nova><img src=play.gif  width=11 height=11 border=0></a>&nbsp;&nbsp;'.$rs3->fields[1].' -&nbsp;'. $rs3->fields[2];
							}
						else
					 		{
							?>
							<a href="../atacado/musicas/<? print $aux;?>"><img src=play.gif  width=11 height=11 border=0></a><? print '&nbsp;'.$rs3->fields[1].' -&nbsp;'. $rs3->fields[2];?>
							<?
							}
						}
					else print '&nbsp;&nbsp;&nbsp;&nbsp;'.$rs3->fields[1].' -&nbsp;'. $rs3->fields[2];
					if ($rs3->fields[3]!='')
						{
						print '  -  '.$rs3->fields[3];
						}
					?>
					</td>
				</tr>
				<?
			$rs3->MoveNext();
			}
			?>
		</table>
		<?
		}
	
		
	$sql = "select * from SINOPSE where COD_PRO = $cod";
	$rs2 = $conn->Execute($sql);
	if ($rs2->RecordCount()>0)
		{
		if ($aux==1) print '<br><Br>';
		?>
		<table width="70%" align="center">
			<tr>
				<td class="subtit_tabela">Sinopse</td>
			</tr>	
			<tr>
				<td><?print $rs2->fields[1];?></td>
			</tr>
		</table>
		<?
		}
	}	
	?>
	</td>
</tr>
<tr>
	<td align="center">
	<p>&nbsp;</p>
	<input type="button" name="Fechar" value="Fechar" class="tabela" onclick="window.close();">
	<p>&nbsp;</p>
	</td>
</tr>
</table>
