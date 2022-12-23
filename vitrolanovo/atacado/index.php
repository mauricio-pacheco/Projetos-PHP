<?
include 'funcoes.php';

Inicio();
?>
<table align="center" width="760" border="0" class="tabela" bgcolor="#ffffff">
	<tr>
		<td align="center" colspan="2"><? Logo();?></td>
	</tr>
	<tr>
		<td valign="middle" width="85%" align="center">
		<!-- INICIO -->
			<table width="98%" border="0" cellspacing="0" cellpadding="0">
		<tr> 
			<td>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td align="left"><img src="Imagens_Menu/central.gif" width="430" height="45"></td>
						<td align="right">
						<a href="http://sip.brphonia.com.br/programas/webcallback/wcbnosite.php?web_origem=vitrola2" target=_blank><img
src="ligacaovoip.gif" margin="7" align="left" border="0" height="38" width="196"></a>
					<!-- 	<a href="http://ep.estara.com/UI/gui.php?accountid=200106283515&template=77475&authorizeurl=http%3A%2F%2Fwww.guiamais.com.br%2FauthorizeTPI.do%3FaddressId%3D706435379&var1=Vitrola&var2=706435379&var3=RS&var4=73&var5=&var6=1&calltype=webvoicepop&linkfile=%2FOneCC%2F200106283515%2F77475.js&referrer=Email&donotcache=1372664530&guiid=43834a54eac25&timestamp=1162582396" target="_blank">
						<img src="ligacao.gif" border="0" />
						</a>  -->
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="txtcomumpreto">&nbsp;</td>
		</tr>
		<tr> 
			<td align="center" valign="top" class="txtcomumpreto">
			<table width="97%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" class="txtcomumpreto">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr> 
							<td align="center" valign="top">
							<table width="100%" border="0" cellspacing="2" cellpadding="2">
								<?
								if ($erro==1)
									{
									?>
									<tr>
											<td bgcolor="#ff0000" width="70%" align="center" ><font color="#FFFFFF"><strong>Erro Validando Usuário</strong></font></td>
									</tr>				
									<?
									}
								?>
							</table>
							</td>
						</tr>
						<tr> 
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr class="tdcolor1"> 
							<td height="20" align="left" valign="middle" bgcolor="#FF0000"><strong><font color="#FFFFFF">&nbsp;Identifique-se 
							para acessar a Central do Cliente</font></strong></td>
						</tr>
						<tr> 
							<td align="center" valign="top">&nbsp; </td>
						</tr>
						<tr> 
							<td align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
						</tr>	
						<tr> 
							<td> <form name="Logar" method="post" action="validausuario.php">
							<table width="100%" border="0" cellspacing="2" cellpadding="0">
								<tr> 
									<td width="17%" align="left" valign="middle" class="txtboldpreto">E-mail</td>
									<td colspan="2" align="left" valign="middle"> <input name="usuario" type="text" class="tabela" size="50"> 
								</td>
								</tr>
								<tr> 
									<td class="txtboldpreto">Senha</td>
									<td colspan="2" align="left" valign="middle" class="txtcomumpreto"> <input name="pass" type="password"   class="tabela" size="12"></td>
								</tr>
								<tr> 
									<td class="txt-bold-color1">&nbsp;</td>
									<td width="6%" height="30" align="left" valign="middle" class="txtcomumpreto"><input name="Submit" type="image"  src="Imagens_Menu/bt_ok.gif"></td>
									<td width="77%" align="left" valign="middle" class="txtcomumpreto">&nbsp;</td>
								</tr>
							</table>
						</form>
						</td>
					</tr>
					</table>
				</td>
			</tr>
				<tr class="tdcolor2"> 
				<td height="20" align="left" valign="middle" bgcolor="#FF0000"><font color="#FFFFFF"><strong>&nbsp;Esqueceu 
				a senha ?</strong></font></td>
			</tr>
			<tr> 
				<td align="center" valign="top"> <table width="100%" border="0" cellspacing="2" cellpadding="2">
			<tr> 
				<td class="txtcomumpreto">Se voc&ecirc; j&aacute; &eacute; cliente de nossa loja 
				mas esqueceu sua senha, utilize esta &aacute;rea. Em alguns segundos, a senha 	
				ser&aacute; enviada para seu e-mail (fornecido em seu primeiro cadastro) e voc&ecirc; 
				poder&aacute; acessar novamente a <span class="txtboldcolor">Central do Cliente</span>.<br> 
				<br>
				Se o e-mail que voc&ecirc; informar n&atilde;o for o mesmo do seu cadastro, voc&ecirc; 
				n&atilde;o receber&aacute; a senha e n&atilde;o poder&aacute; acessar a <span class="txtboldcolor">Central</span>. 
				Se isso acontecer, entre em contato com nossa <span class="txtboldcolor1">Central 
				de Atendimento ao Cliente</span> pelo fone <span class="txtboldpreto">55 3744 6878</span>.
				<br><br>
				Se você deseja ser cliente Vitrola, ligue para a Central de Atendimento ao Cliente, pelo fone 55 3744 6878.
				</td>
			</tr>
			<tr> 
				<td> <form name="EnviaSenha" method="post" action="enviasenha.php">
				<table width="100%" border="0" cellspacing="2" cellpadding="0">
					<tr> 
						<td width="17%" align="left" valign="middle" class="txtboldpreto">E-mail</td>
						<td colspan="2" align="left" valign="middle"> <input  name="emailsenha" type="text" class="tabela" size="35"> 
						</td>
					</tr>
				<tr> 
					<td class="txtboldcolor">&nbsp;</td>
					<td width="9%" height="30" align="left" valign="middle" class="txtcomumpreto"><input name="Submit" type="image" src="Imagens_Menu/bt_ok.gif"></td>
					<td width="72%" align="left" valign="middle" class="txtcomumpreto">&nbsp;</td>
				</tr>	
			</table>
			</form>
			</td>
		</tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</td>
</tr>
</table>		

		<!-- FINAL!!! -->
		
		</td>
	</tr>
</table>
<?
Fim();
?>
