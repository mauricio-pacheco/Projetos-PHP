<?
include 'checar_sessao.php';
include 'funcoes.php';

Inicio();
?>
<table align="center" width="750" border="0" class="tabela" bgcolor="#ffffff">
	<tr bgcolor="#ededed">
		<td align="center" colspan="2"><? LogoComSom();?></td>
	</tr>
	<tr>
		<td width="15%" valign="top">
		<? Menu($codigo); ?>
		</td>
		
		<td valign="top" width="85%"><? Corpo();?></td>
	</tr>
	<tr>
		<td colspan="2" align="left">
		<?
		$file = fopen ("acessos.txt" , "r+" ); 
		$contador = fread($file, filesize("acessos.txt")); 
		fclose($file); 
		$contador +=1; 
		print'<strong><font face="Verdana" size="1">Acessos:&nbsp;&nbsp;';
		$file = fopen("acessos.txt","w+"); 
		fputs($file, $contador); 
		print $contador;
		print'<font></strong>';
		fclose($file); 
		?>		
		</td>
	</tr>
</table>

<?
Fim();
?>
