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
		
		$total_reg = "20"; // número de registros por página

		if (!$pagina) 
			{
	    	$pc = "1";
			} 
		else 
			{
	    	$pc = $pagina;
			}
	
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;

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
				AND CATEGORIA.COD_CAT = PRODUTO.COD_CAT
				AND GENERO.COD_GEN = PRODUTO.COD_GEN
				AND PRODUTO.LISTAR_PRO <> '0'
 				AND TIPOPRO.COD_TCP = $tipo ";
	if ($plancamento != 'X') $sql.="AND PRODUTO.LANCAMENTO_PRO <> '0'  ";
	if ($preposicao != 'X') $sql.="AND PRODUTO.REPOSICAO_PRO <> '0' ";
	if ($prpromocao != 'X')
		{
		$sql.="AND PRODUTO.PROMOCAO_PRO <> '0' AND PRODUTO.ESTOQUE_PRO > 0 ";
		}
	if ($prrecomendado != 'X') $sql.="AND PRODUTO.RECOMENDADO_PRO <> '0' ";
	if ($prcategoria != 'X') $sql.="AND PRODUTO.COD_CAT = $prcategoria ";
	if ($prrotatividade != 'X')
		{
		$sql.=" AND PRODUTO.MAISVENDIDO_PRO <> 0";
		}

	if ($prpromocao != 'X')
		{
		$sql.=" order by PRODUTO.DT_ALT_PROMO_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}

	else if ($preposicao != 'X')
		{
		$sql.=" order by PRODUTO.DT_ALT_REP_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}

	else if ($plancamento != 'X')
		{
		$sql.=" order by PRODUTO.DTCADASTRO_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}
	else if ($prrotatividade != 'X')
		{
		$sql.=" order by ROTATIVIDADE_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}
	else
		{
		$sql.=" order by PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}

	$rs2=$conn->Execute($sql);

	$sql_todos = " SELECT PRODUTO.COD_TCP,
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
				AND CATEGORIA.COD_CAT = PRODUTO.COD_CAT
				AND GENERO.COD_GEN = PRODUTO.COD_GEN
				AND PRODUTO.LISTAR_PRO <> '0'
 				AND TIPOPRO.COD_TCP = $tipo ";
	if ($plancamento != 'X') $sql_todos.="AND PRODUTO.LANCAMENTO_PRO <> '0'  ";
	if ($preposicao != 'X') $sql_todos.="AND PRODUTO.REPOSICAO_PRO <> '0' ";
	if ($prpromocao != 'X') $sql_todos.="AND PRODUTO.PROMOCAO_PRO <> '0' ";
	if ($prrecomendado != 'X') $sql_todos.="AND PRODUTO.RECOMENDADO_PRO <> '0' ";
	if ($prcategoria != 'X') $sql_todos.="AND PRODUTO.COD_CAT = $prcategoria ";
	if ($prrotatividade != 'X')
		{
		$sql_todos.=" AND PRODUTO.MAISVENDIDO_PRO <> 0";
		}

	if ($prpromocao != 'X')
		{
		$sql_todos.=" order by PRODUTO.DT_ALT_PROMO_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO";
		}
	else if ($preposicao != 'X')
		{
		$sql.=" order by PRODUTO.DT_ALT_REP_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO limit $inicio,$total_reg";
		}

	else if ($plancamento != 'X')
		{
		$sql_todos.=" order by PRODUTO.DTCADASTRO_PRO DESC, PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO";
		}
	else
		{
		$sql_todos.=" order by PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO";
		}


    $rs_todos = $conn->Execute($sql_todos);

	$tr= $rs_todos->RecordCount();

	$tp = $tr / $total_reg;
	//Pega o valor inteiro do total de paginas
	$tp= explode(".", $tp);
	$tp= $tp[0];

	if ($rs2->RecordCount()>0)
			{
			$i=0;
			?>
			<table width="90%" align="center">
				<tr>
					<td colspan="3" align="right"><? Busca();?></td>
				</tr>
				<tr bgcolor="#c6c6c6">
					<td colspan="3" align="center"><strong><?print $rs2->fields[1].' - '.$prtitulo;?></strong></td>
				</tr>
			<?
			while (!$rs2->EOF)
				{
				$i++;
				if ($i%2==0) $cor="#eeeeee";
				else $cor="#ffffff";
				?>
				<tr bgcolor="<?print $cor;?>">
					<td align="left" width="75%"><a href="javascript:nova('detalhe.php?cod=<?print $rs2->fields[4];?>','','500','370','10','10')"><?print $rs2->fields[6].' - '.$rs2->fields[5];?></a></td>
					<td align="right" width="20%">
					<?
					if ($rs2->fields[9] != '0')
						{
						?>
						<font color="#FF0000">R$ <?print $rs2->fields[7];?></font>
						<?
						}
					else print 'R$ '.$rs2->fields[7];

					?>
					</td>
					<td width="5%" align="right"><a href="pedido.php?codpro=<?print $rs2->fields[4];?>&acao=mostra"><img src="Imagens_Menu/carrinho.gif" alt="" width="20" height="20" border="0"></a></td>
				</tr>
				<?
				$rs2->MoveNext();
				}
				?>
				</table>
				<br><br>
				<?
			//Botões "Anterior e próximo"
			$anterior = $pc -1;
			$proximo = $pc +1;

			print'<table align="center" border="0" width="90%">';
				print'<tr>';
				print'<td align="right">';
				print'<font face="Verdana, Arial, Helvetica, sans-serif" size="1">';
				
			if ($tr>20)
				{
				if($tp>20)
					{
					for ($i=$pagina-10; $i<$pagina; $i++)
						{
						if ($i>0)
							{
							print '&nbsp;';
							echo "<a href='?pagina=$i&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'>$i</a>";
							}
						}
					for ($i=$pagina; $i<=$pagina+10; $i++)
						{
						if ($i<=$tp)
							{
							print '&nbsp;';
							if ($i == $pagina) echo "<a href='?pagina=$i&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'><strong>$i</strong></a>";
							else echo "<a href='?pagina=$i&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'>$i</a>";
							}
						}
					}//fim do $tp>20
				else
					{
					for ($i=1; $i<=$tp; $i++)
						{
						print '&nbsp;';
						echo "<a href='?pagina=$i&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'>$i</a>";
						}
					}
				}
				
				$PodeIr=False;
				if (($tp-$i)==1) 
					{
					echo "<a href='?pagina=$tp&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'>$tp</a>";
					}
				else if (($tp-$i)>1) 
					{
					echo " ... <a href='?pagina=$tp&tipo=$tipo&plancamento=$plancamento&preposicao=$preposicao&prpromocao=$prpromocao&prrecomendado=$prrecomendado&prcategoria=$prcategoria&prrotatividade=$prrotatividade&prtitulo=$prtitulo' class='texto'>$tp</a>";
					$PodeIr= True;
					}
				?>
				</td>
			</tr>
			<?
			if ($PodeIr)
				{
				?>
				<tr>
					<td align="right">
					<form name="form1" method="post" onsubmit="return ValidaCampos(this)">
					<input type="hidden" name="totalpag" value="<? print $tp;?>">
					Ir para a página: <input type="text" name="nropag" size="3" maxlength="3" class="tabela" onkeypress="SoNumeros(this)">&nbsp;
					<input type="submit" name="IrPag" value="Ir" class="tabela">
					</form>
					<?
					if ($IrPag=='Ir')
						{
						?>
						<script>
						location.href= 'listas.php?pagina=<? print $nropag;?>&tipo=<? print $tipo;?>&plancamento=<? print $plancamento;?>&preposicao=<? print $preposicao;?>&prpromocao=<? print $prpromocao;?>&prrecomendado=<? print $prrecomendado;?>&prcategoria=<? print $prcategoria;?>&prrotatividade=<? print $prrotatividade;?>&prtitulo=<? print $prtitulo;?>';
						</script>
						<?
						}
					?>
					</td>
				</tr>
				<?
				}
				?>
		</table>
		<?
		}
		?>		
		<!-- FIM -->		
		</td>
	</tr>
</table>
<?
Fim();
?>