<?
Function Inicio()
	{
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

	<html>
	<head>
		<title>Vitrola</title>
	<link href="estilo.css" rel="stylesheet" type="text/css">	
	<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script language="JavaScript" TYPE="text/javascript" src="overlib_mini.js"></script> 
	<script LANGUAGE = "JavaScript">
	   <!--
	   function nova(url,janela,larg,alt,pos1,pos2)
	     {
        window.open(url,janela,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,top="+pos1+",left="+pos2+",screenY="+pos1+",screenX="+pos2+",width="+larg+",height="+alt);
	     }
	   // -->
	  </script>   
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

<script>
var checkobj

function agreesubmit(el)
{
checkobj=el
if (document.all||document.getElementById)
	{
	for (i=0;i<checkobj.form.length;i++)
		{  //hunt down submit button
	var tempobj=checkobj.form.elements[i]
	if(tempobj.type.toLowerCase()=="submit")
	tempobj.disabled=!checkobj.checked
		}
	}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}
</script>

<script language="JavaScript1.2">
// Marca com uma cor o campo que está sendo preenchido
var highlightcolor="#f0fff0"
var ns6=document.getElementById&&!document.all
var previous=''
var eventobj

//Regular expression to highlight only form elements
var intended=/INPUT|TEXTAREA|SELECT|OPTION/

//Function to check whether element clicked is form element
function checkel(which){
if (which.style&&intended.test(which.tagName)){
if (ns6&&eventobj.nodeType==3)
eventobj=eventobj.parentNode.parentNode
return true
}
else
return false
}

//Function to highlight form element
function highlight(e){
eventobj=ns6? e.target : event.srcElement
if (previous!=''){
if (checkel(previous))
previous.style.backgroundColor=''
previous=eventobj
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
}
else{
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
previous=eventobj
}
}

function SoNumeros(input)
	{
	if ((event.keyCode<46)||(event.keyCode>57) || (event.keyCode==47))
		event.returnValue = false;
	}
function SemAspa(input)
	{
	if ((event.keyCode==34)||(event.keyCode==39))
		event.returnValue = false;
	}
	
</script>

</head>

<body bgcolor="#dcdcdc">
<?
	}

Function Fim()
	{
	?>
	<center><font color="#000000" size="1" face="Verdana">Vitrola Comercial Fonografica LTDA<br>
	Fone: (55) 3744-6878
	Rua Monsenhor Vitor Batistela,  686<br>
	98400-000   Frederico Westphalen/RS</font></center>
	</html>
	<?
	}

Function LogoComSom_old()
	{
	?>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="760" height="150" id="vitrola" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="distribuidora.swf" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ededed" />
	<embed src="distribuidora.swf" quality="high" bgcolor="#ffffff" width="760" height="150" name="vitrola" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>	
	<?
	}
	
Function LogoComSom()
	{
	$file = fopen ('rdn.txt' , 'r' ); 
	$max = fread($file, filesize('rdn.txt')); 
	fclose($file); 
	$aux = $max+1-1;
	$aux2 = rand(1,$aux);
	$aux2 = $aux2.'.swf';
	?>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="760" height="150" id="vitrola" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="logos/<?print $aux2;?>" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ededed" />
	<embed src="logos/<?print $aux2;?>" quality="high" 
		bgcolor="#ffffff" width="760"
		height="150" name="vitrola" 
		align="middle" allowScriptAccess="sameDomain" 
		type="application/x-shockwave-flash" 
		pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>	
	<?
	}
	
Function Imagem($codigoproduto)
	{
	$filenamegif = 'imagens/'.$codigoproduto.'.gif';
	$filenamejpg = 'imagens/'.$codigoproduto.'.jpg';
	if (file_exists($filenamegif))
		{
		return $filenamegif;
		}
	else if (file_exists($filenamejpg))
		{
		return $filenamejpg;
		}
	else return 'imagens/indisp.jpg';
	}

Function Logo_old()
	{
	?>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="760" height="150" id="vitrola" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="distribuidora.swf" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ededed" />
	<embed src="distribuidora.swf" quality="high" bgcolor="#ffffff" width="760" height="150" name="vitrola" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
	<?
	}

Function Logo()
	{
	$file = fopen ('rdn.txt' , 'r' ); 
	$max = fread($file, filesize('rdn.txt')); 
	fclose($file); 
	$aux = $max+1-1;
	$aux2 = rand(1,$aux);
	$aux2 = $aux2.'.swf';
	?>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="760" height="150" id="vitrola" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="logos/<?print $aux2;?>" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ededed" />
	<embed src="logos/<?print $aux2;?>" quality="high" 
		bgcolor="#ffffff" width="760"
		height="150" name="vitrola" 
		align="middle" allowScriptAccess="sameDomain" 
		type="application/x-shockwave-flash" 
		pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>	
	<?
	}


Function Menu($cod)
	{
	?>
	<table align="center" width="95%"  bgcolor="#ededed" cellspacing="0">
		<tr>
			<td align="left"><img src="Imagens_Menu/cds.gif" alt="" width="126" height="19" border="0"></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=1&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Lançamentos">Lançamentos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=1&prtitulo=Mais Vendidos">Mais Vendidos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=1&prcategoria=X&prrotatividade=X&prtitulo=Recomendados">Recomendados</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=1&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Promoções">Promoções</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=2&prrotatividade=X&prtitulo=Séries">Séries</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=3&prrotatividade=X&prtitulo=Trilhas">Trilhas</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=1&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Reposições">Reposições</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=1&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Listar Todos">Listar Todos</a></td>
		</tr>
    		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listagenero.php?tipo=1">Listar Gêneros</a></td>
		</tr>

		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="left"><img src="Imagens_Menu/dvds.gif" alt="" width="126" height="19" border="0"></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=1&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Lançamentos">Lançamentos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=1&prtitulo=Mais Vendidos">Mais Vendidos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>

		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=1&prcategoria=X&prrotatividade=X&prtitulo=Recomendados">Recomendados</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>

		<tr bgcolor="#dcdcdc">
            <td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=1&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Reposições">Reposições</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>

		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=1&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Promoções">Promoções</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=4&prrotatividade=X&prtitulo=Multiokê">Multiokê</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=6&prrotatividade=X&prtitulo=Filmes">Filmes</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=5&prrotatividade=X&prtitulo=Multiokê">Infantis</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=2&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Listar Todos">Listar Todos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listagenero.php?tipo=2">Listar Gêneros</a></td>
		</tr>

		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="left"><img src="Imagens_Menu/livros.gif" alt="" width="126" height="19" border="0"></td>
		</tr>

		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=6&plancamento=1&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Lançamentos">Lançamentos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=6&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=1&prtitulo=Mais Vendidos">Mais Vendidos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=6&plancamento=X&preposicao=X&prpromocao=1&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Promoções">Promoções</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=6&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Listar Todos">Listar Todos</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listagenero.php?tipo=6">Listar Gêneros</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
		</tr>



		<tr>
			<td align="left"><img src="Imagens_Menu/vhs.gif" alt="" width="126" height="19" border="0"></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listas.php?tipo=3&plancamento=X&preposicao=X&prpromocao=X&prrecomendado=X&prcategoria=X&prrotatividade=X&prtitulo=Listar Todos">Listar Todos</a></td>
		</tr>
     		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="listagenero.php?tipo=3">Listar Gêneros</a></td>
		</tr>

		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
		</tr>
<!--
Busca Antiga
		<tr>
			<td align="left"><img src="Imagens_Menu/busca.gif" alt="" width="126" height="19" border="0"></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="busca.php?tipo=1">CD'S</a></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="busca.php?tipo=2">DVD'S</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td></td>
		</tr>					
		<tr bgcolor="#dcdcdc">
			<td>&nbsp;&nbsp;&nbsp;- <a href="busca.php?tipo=3">VHS</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>&nbsp;</td>
		</tr>-->
		<tr bgcolor="#dcdcdc">
			<td align="center"><a href="pedido.php?codigo=<? print $cod;?>&acao=Carrinho"><font color="#000000"><strong>Meu Carrinho</strong></font></a></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff"></td>
		</tr>
		<tr bgcolor="#dcdcdc">
			<td align="center"><a href="principal.php"><font color="#000000"><strong>Home</strong></font></a></td>
		</tr>	
		<tr bgcolor="#FFFFFF">
			<td align="center" valign="middle">
			
		<a href="http://sip.brphonia.com.br/programas/webcallback/wcbnosite.php?web_origem=vitrola2" target=_blank><img
			src="ligacaovoip.gif" margin="7" align="left" border="0" height="38" width="196"></a>			
			
			<!--  <a href="http://ep.estara.com/UI/gui.php?accountid=200106283515&template=77475&authorizeurl=http%3A%2F%2Fwww.guiamais.com.br%2FauthorizeTPI.do%3FaddressId%3D706435379&var1=Vitrola&var2=706435379&var3=RS&var4=73&var5=&var6=1&calltype=webvoicepop&linkfile=%2FOneCC%2F200106283515%2F77475.js&referrer=Email&donotcache=1372664530&guiid=43834a54eac25&timestamp=1162582396" target="_blank">
			<img src="ligacao.gif" border="0" />
			</a> -->
			</td>
		</tr>
	</table>
	<?
	}

Function Busca()
	{
	?>
	<form action="busca.php" method="get">
	<table width="50%" align="right" border="0">
		<tr>
			<td><strong>Busca</strong></td>
			<td><input type="text" name="valor" size="10" class="tabela"></td>
			<td><select name="tipopesq" class="tabela">
				<option value="1" SELECTED>Artista/Autor</option>
				<option value="2">Título</option>
				<option value="3">Gênero</option>
				<option value="5">Música</option>
				<option value="4">Todos</option>
				</select>
			</td>
			<td><select name="tipo" class="tabela">
				<option value="1" SELECTED>CD</option>
				<option value="2">DVD</option>
                <option value="6">LIVRO</option>
				<option value="3">VHS</option>
				<option value="4">Todos</option>
				</select>
			</td>
			<td><input type="submit" name="Buscar" value="Buscar" class="tabela"></td>
		</tr>
	</table>
	</form>
	<?
	}

Function Corpo()
	{
	include 'conecta.php';
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
				AND PRODUTO.MOSTRAIMG_PRO <> '0'
				ORDER BY PRODUTO.DTCADASTRO_PRO DESC;";

	$rs=$conn->Execute($sql);
	if ($rs->RecordCount()>0)
		{
		?>
		<table width="90%" align="center" cellpadding="2" cellspacing="7" border="0">
			<tr>
				<td colspan="2">&nbsp;</td>
				<td colspan="2" align="right" bgcolor="#eeeeee" valign="top">
				<?
				Busca();
				?>
				</td>
			</tr>
		<?
		while (!$rs->EOF)
			{
			?>
			<tr>
				<?for ($i=1; $i<=2; $i++)
					{
					if (!$rs->EOF)
						{
					?>
						<td valign="top" align="right"><a href="javascript:nova('detalhe.php?cod=<?print $rs->fields[4];?>','','500','370','10','10')"><img src="<?print Imagem($rs->fields[4]);?>" alt="" width="64" height="64" border="0"></a></td>
						<td valign="top" width="35%">
							<strong><a href="javascript:nova('detalhe.php?cod=<?print $rs->fields[4];?>','','500','370','10','10')"><?print $rs->fields[5];?></a></strong><br>
							<?print $rs->fields[6];?><br>
							<?print $rs->fields[1].' - '.$rs->fields[2];?><br>
							<?if ($rs->fields[9] != '0')
								{
								?>
								<font color="#FF0000"><font size="-2"><strong>de R$ <?print $rs->fields[8];?></strong></font></font><br>
								<font color="#FF0000"><strong>por R$ <?print $rs->fields[7];?></strong></font>
								<?
								}
							  else
							  	{
								?>
								<font color="#FF0000"><strong>R$ <?print $rs->fields[7];?></strong></font>
								<?
								}
							?>
							<br><a href="pedido.php?codpro=<?print $rs->fields[4];?>&acao=mostra"><img src="Imagens_Menu/btcomprar3verm1.gif" alt="" width="65" height="17" border="0"></a>
							<?
							if (!$rs->EOF) $rs->MoveNext();
							?>
						</td>
						<?
						}
					}
					?>
			</tr>
			<?
//			$rs->MoveNext();
			}
		?>
		</table>
		<?
		} //fim do recordcount
$r=$rs->RecordCount();
if ($r==0) $listar_ate=20;
else if (($r==1)or ($r==2)) $listar_ate=16;
else if (($r==3)or ($r==4)) $listar_ate=12;
else if (($r==5)or ($r==6)) $listar_ate=8;
else if (($r==7)or ($r==8)) $listar_ate=4;
else if (($r==9)or ($r==10)) $listar_ate=0;
else $listar_ate=0;

if ($listar_ate>0)
	{
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
				AND PRODUTO.MOSTRAIMG_PRO = '0'
				ORDER BY PRODUTO.DTCADASTRO_PRO desc limit 0, $listar_ate;";
	$rs2=$conn->Execute($sql);
	if ($rs2->RecordCount()>0)
			{
			$i=0;
			?>
			<table width="90%" align="center">
				<tr bgcolor="c6c6c6">
					<td colspan="4" align="center"><strong>Novidades</strong></td>
				</tr>
			<?
			while (!$rs2->EOF)
				{
				$i++;
				if ($i%2==0) $cor="#eeeeee";
				else $cor="#ffffff";
				?>
				<tr bgcolor="<?print $cor;?>">
					<td align="left" width="7%"><?print $rs2->fields[1];?></td>
					<td align="left" width="50%"><a href="javascript:nova('detalhe.php?cod=<?print $rs2->fields[4];?>','','500','370','10','10')"><?print $rs2->fields[6].' - '.$rs2->fields[5];?></a></td>
					<td align="right" width="15%">R$ <?print $rs2->fields[7];?></td>
					<td width="7%" align="right"><a href="pedido.php?codpro=<?print $rs2->fields[4];?>&acao=mostra"><img src="Imagens_Menu/btcarrinho4.jpg" alt="" width="22" height="18" border="0"></a></td>
				</tr>
				<?
				$rs2->MoveNext();
				}
				?>
				</table>
				<?
			}
		}
	}


Function ListarBusca($tipo,$valor,$tipopesq)
	{
	include 'conecta.php';
	if ($tipopesq == 5)
		{
				$sql = " SELECT DISTINCT PRODUTO.COD_TCP,
			    TIPOPRO.DESC_TCP,
				GENERO.DESC_GEN,
				CATEGORIA.DESC_CAT,
				PRODUTO.COD_PRO,
				PRODUTO.NOME_PRO,
				PRODUTO.ARTISTA_PRO,
				PRODUTO.VALORATA_PRO,
				PRODUTO.VALORPROATAC_PRO,
				PRODUTO.PROMOCAO_PRO,
                PRODUTO.ESTOQUE_PRO
				FROM GRAVADORA, GENERO, TIPOPRO, PRODUTO, CATEGORIA, FAIXA
				WHERE TIPOPRO.COD_TCP = PRODUTO.COD_TCP
				AND GRAVADORA.COD_GRA = PRODUTO.COD_GRA
				AND CATEGORIA.COD_CAT = PRODUTO.COD_CAT
				AND GENERO.COD_GEN = PRODUTO.COD_GEN
				AND FAIXA.COD_PRO = PRODUTO.COD_PRO
				AND FAIXA.TITULO_FAX like '%$valor%'
				AND PRODUTO.LISTAR_PRO <> '0' order by PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO";
		}
	else
		{
		$sql = " SELECT PRODUTO.COD_TCP,
			    TIPOPRO.DESC_TCP,
				GENERO.DESC_GEN,
				CATEGORIA.DESC_CAT,
				PRODUTO.COD_PRO,
				PRODUTO.NOME_PRO,
				PRODUTO.ARTISTA_PRO,
				PRODUTO.VALORATA_PRO,
				PRODUTO.VALORPROATAC_PRO,
				PRODUTO.PROMOCAO_PRO,
                PRODUTO.ESTOQUE_PRO
				FROM GRAVADORA, GENERO, TIPOPRO, PRODUTO, CATEGORIA
				WHERE TIPOPRO.COD_TCP = PRODUTO.COD_TCP
				AND GRAVADORA.COD_GRA = PRODUTO.COD_GRA
				AND CATEGORIA.COD_CAT = PRODUTO.COD_CAT
				AND GENERO.COD_GEN = PRODUTO.COD_GEN
				AND PRODUTO.LISTAR_PRO <> '0'";
		  if ($tipo != 4)
 				$sql.=	"AND TIPOPRO.COD_TCP = $tipo ";
		  if ($tipopesq== 2) $sql.=	"AND PRODUTO.NOME_PRO like '%$valor%'order by PRODUTO.NOME_PRO";
		  else if ($tipopesq== 1) $sql.= "AND PRODUTO.ARTISTA_PRO like '%$valor%'order by PRODUTO.ARTISTA_PRO";
		  else if ($tipopesq== 3) $sql.= "AND DESC_GEN like '%$valor%'order by PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO ";
		  else $sql.= " order by PRODUTO.ARTISTA_PRO, PRODUTO.NOME_PRO ";
		}
	$rs2=$conn->Execute($sql);
	if ($rs2->RecordCount()>0)
			{
			$i=0;

            $descpesquisa = '';
            if ($tipopesq == 1 ) $descpesquisa = ' por Artista/Autor';
            if ($tipopesq == 2 ) $descpesquisa = ' por Título';
            if ($tipopesq == 3 ) $descpesquisa = ' por Gênero';
            if ($tipopesq == 4 ) $descpesquisa = ''; // todos
            if ($tipopesq == 5 ) $descpesquisa = 'por Música';

            //if ($descpesquisa == '') $descpesquisa = ' ('.$valor.')'
            $descpesquisa = $descpesquisa.' ('.$valor.')';

			?>
			<table width="90%" align="center">
				<tr bgcolor="c6c6c6">
					<td colspan="3" align="center"><strong><?print $rs2->fields[1].' - Busca'.$descpesquisa;?></strong></td>
				</tr>
			<?
			while (!$rs2->EOF)
				{
				$i++;
				if ($i%2==0) $cor="#eeeeee";
				else $cor="#ffffff";
                		$estoque = $rs2->fields[10];
				?>
				<tr bgcolor="<?print $cor;?>">
					<td align="left" width="50%"><a href="javascript:nova('detalhe.php?cod=<?print $rs2->fields[4];?>','','500','370','10','10')"><?print $rs2->fields[6].' - '.$rs2->fields[5];?></a></td>
					<td align="right" width="25%">
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
                    <?
                    if ($estoque > 0)
                     {
                    ?>
													
			<td width="7%" align="right"><a href="pedido.php?codpro=<?print $rs2->fields[4];?>&acao=mostra"><img src="Imagens_Menu/btcarrinho4.jpg" alt="" width="22" height="18" border="0"></a></td>
                    <?
                      }
                    else
                       {
                    ?>
                       <td>&nbsp;</td>
                    <?
                      }
                    ?>

				</tr>
				<?
				$rs2->MoveNext();
				}
				?>
				</table>
				<?
			}	
		else
			{
			?>
			<strong><font size="+1">Produto não localizado.</font></strong>
			<?
			}
	}
	
Function TiraAspas($var)
	{
	$var = str_replace("\\","",$var);
	$var = str_replace("'","",$var);
	$var = str_replace('"',"",$var);
	return $var;
	}
?>


