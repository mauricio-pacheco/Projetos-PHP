
<?
$path_local = "libs/padrao.php";
include "libs/db.php";
// uso pedido.php?id=80 onde id é o numero do pedido.
$sql = mysql_query("SELECT * FROM pedidos WHERE id = '$id'");
while($resp = mysql_fetch_array($sql)){
$nome_cliente_entrega = $resp[2];
$endereco_entrega = $resp[3];
$cidade_entrega = $resp[4];
$estado_entrega = $resp[5];
$cep_entrega = $resp[6];
$produtos = $resp[7];
$quantidades = $resp[8];
$frete = $resp[11];
$pagamento = $resp[12];
$valores = $resp[9];
$mensagem = $resp[13];
}

?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"> 
            Visualize e imprima os dados de seu pedido.</font></b></font></td>
          <td width="16%"> 
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>"> 
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td> 
<font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><?

//implementando seguranca para soh o dono ver o pedido:

if ($nome_usuario == $nome_cliente_entrega){
print "<b>Em caso de reclama&ccedil;&otilde;es ou consultas, informe o n&uacute;mero de pedido escrito abaixo em vermelho.<br>";
print "<br><b>No.do pedido.:</b> <font color=red>$id</font><br>";
print "<b>Nome do dest.:</b> $nome_cliente_entrega.<br>";
print "<b>Endereço ent.:</b> $endereco_entrega.<br>";
print "<b>Cidade  ent.:</b> $cidade_entrega.<br>";
print "<b>Estado ent.:</b> $estado_entrega.<br>";
print "<b>CEP ent.:</b> $cep_entrega.<br>";
$arraypr = explode("|",$produtos);
$arraypq = explode("|",$quantidades);
$arraypv = explode("|",$valores);
$cp = count($arraypr);
print "<br><b>:: Produtos :: </b><br><br>";
print "<table>";
print "<tr><td><font size=1><b>Produto</b></font></td><td><font size=1><b>Quant</b></font></td><td><font size=1><b>V. Unitário</b></td></font><td><font size=1><b>Sub - Total</b></font></td></tr>\n";
include("formata_valor.php");
for($x=0;$x<$cp;$x++){
$sqlp = mysql_query("SELECT nome_produto FROM produto WHERE id = '$arraypr[$x]'");
	while($rsqlp = mysql_fetch_array($sqlp)){
formata_valor("$arraypv[$x]");
	print "<tr><td><font size=1>$arraypr[$x] - $rsqlp[0]</font></td><td align=center><font size=1>$arraypq[$x]</font></td><td><font size=1>$valor</font></td>";
$valortotal = $arraypq[$x] * $arraypv[$x];
formata_valor("$valortotal");
	print "<td><font size=1>$valor</font></td></tr>";
$valormaster = $valortotal + $valormaster;
	}
}
formata_valor("$valormaster");
	print "<tr><td></font></td></td><td></td><td><font size=1><b>Total:</b></font></td><td><font size=1>$valor</font></td></tr>";
formata_valor("$frete");
	print "<tr><td></font></td></td><td></td><td><font size=1><b>Valor do  Frete:</b></font></td><td><font size=1>$valor</font></td></tr>";
	print "<tr><td></font></td></td><td></td><td><font size=1><b>Pagamento:</b></font></td><td><font size=1>$pagamento</font></td></tr>";
$valorfinal = $valormaster + $frete;
formata_valor("$valorfinal");
	print "<tr><td></font></td></td><td></td><td bgcolor=$sub_barra><font size=1><b>Valor Cobrança:</b></font></td><td bgcolor=$sub_barra><font size=1>$valor</font></td></tr>";
print "</table>";
if ($mensagem){
print "<br><b><font face=verdana size=1><b>Mensagem de envio.:</b></b><br>$mensagem<br></font><br>";
}
print "<b><br>Estaremos entrando em contato para confirma&ccedil;&atilde;o dos dados de entrega e melhor forma de pagamento.<br>";
print "Agradecemos a prefer&ecirc;ncia. Volte Sempre!<b><br>"; 
}
else {
print "<br><br><b>Aten&ccedil;&atilde;o !!!</b><br><br>O pedido.: <font color=red>$id</font> n&atilde;o pertence ao usu&aacute;rio logado no momento!<br><br>Clique no bot&atilde;o \"Login\" para entrar com o Usu&aacute;rio e senha corretos, ou <a href=\"?cat_pai=1&amp;pagina=login\">clique Aqui.</a>  ";
}
?> </font></font></td>
          </tr>
        </table>
        <br>
        <p>&nbsp;</p>
      </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>"> 
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
