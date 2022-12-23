<?
include 'checar_sessao.php';
include 'funcoes.php';

Inicio();
?>
<form name="form1" action="busca.php" class="fundo2" method="get" onClick="highlight(event)" onKeyUp="highlight(event)" onSubmit="return ValidaCampos(this)">
<input type="hidden" name="tipo" value="<?print $tipo;?>">
<table align="center" width="760" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td align="center" colspan="3"><? Logo();?></td>
	</tr>
	<tr>
		<td width="15%" valign="top"><? Menu($codigo);?></td>
		<td valign="top" width="85%" align="center">
		<? 
		Busca();
		?>
		<p>&nbsp;</p>
		<?
		if ($valor != '')
			{
			ListarBusca($tipo,$valor,$tipopesq);
			}
		?>		
		</td>
	</tr>
</table>
</form>
<?
Fim();
?>
