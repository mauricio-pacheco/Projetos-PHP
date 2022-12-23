<?
include 'checar_sessao.php';
include 'funcoes.php';

Inicio();
?>
<SCRIPT LANGUAGE="JavaScript">
function SoNumeros(input)
	{
	if ((event.keyCode<46)||(event.keyCode>57) || (event.keyCode==47))
		event.returnValue = false;
	}

</script>

<SCRIPT LANGUAGE="JavaScript">
function ValidaCampos(theForm)
	{
	MinhaString=theForm.nropag.value;
    if (MinhaString.length < 1)
   		{
    	theForm.nropag.focus();
    	alert("Informe o número da página que você deseja visualizar!");
    	return(false);
   		}


	totalpag= eval(theForm.totalpag.value);
	nropag= eval(theForm.nropag.value);
	if (nropag > totalpag)
   		{
    	theForm.nropag.focus();
		alert("Utilize um número menor ou igual ao total de páginas!");
    	return(false);
   		}
	}

</script>
<table align="center" width="760" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td colspan="2"><? LogoComSom();?></td>
	</tr>
	<tr>
		<td width="15%" valign="top"><? Menu($codigo);?></td>
		<td valign="top" width="85%">
		<!-- INICIO -->

		<?

		include 'conecta.php';


		$sql = " SELECT GENERO.DESC_GEN,
                TIPOPRO.DESC_TCP
				FROM GENERO, PRODUTO, TIPOPRO
				WHERE GENERO.COD_GEN = PRODUTO.COD_GEN
                AND TIPOPRO.COD_TCP = PRODUTO.COD_TCP
				AND PRODUTO.LISTAR_PRO <> '0'
 				AND TIPOPRO.COD_TCP = $tipo
                group by GENERO.DESC_GEN, TIPOPRO.DESC_TCP
		        order by GENERO.DESC_GEN";

    $rs2 = $conn->Execute($sql);

	if ($rs2->RecordCount()>0)
			{
			$i=0;
            $desctipo = $rs2->fields[1];
			?>
			<table width="70%" align="center">
				<tr>
					<td  align="right"><? Busca();?></td>
				</tr>
				<tr bgcolor="#c6c6c6">
					<td  align="center"><strong><? print $desctipo.' por Gêneros';?></strong></td>
				</tr>
			<?
			while (!$rs2->EOF)
				{
                $descgenero = $rs2->fields[0];
				$i++;
				if ($i%2==0) $cor="#eeeeee";
				else $cor="#ffffff";
				?>
				<tr bgcolor="<?print $cor;?>">
					<td align="left" width="75%">
                    <a href="busca.php?tipo=1&valor=<? print $descgenero;?>&tipopesq=3&tipo=<? print $tipo;?>&Buscar=Buscar"> <? print $descgenero; ?></a></td>
				</tr>
				<?
				$rs2->MoveNext();
				}
       		?>
    		</table>
	    	<br><br>
            <?
            }
    else
        {
    	?>
    	<strong><font size="+1">Não localizou Generos.</font></strong>
		<?
        }
		?>
		</table>
		<br><br>

  	<!-- FIM -->
		</td>
	</tr>
</table>
<?
Fim();
?>