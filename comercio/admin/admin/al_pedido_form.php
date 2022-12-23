<?php include ('auth.php') ?>
<html>
<head>
<title>Altera&ccedil;&atilde;o de cadastrro de um cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>

<?
$path_local = "../padrao.php";
include "../db.php";
/// Exclui Cliente
if($excluir){
mysql_query("DELETE FROM pedidos WHERE id = '$excluir'");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"vendas.php\";";
print "window.close();";
print "</script>";
exit;
}
/// Altera cliente
if($acao == "cadastrar"){
if($senha_cliente){
mysql_query("UPDATE clientes SET nome_cliente = '$nome_cliente',email_cliente = '$email_cliente',senha_cliente = password('$senha_cliente'),cidade_cliente = '$cidade_cliente',endereco_cliente = '$endereco_cliente',cep_cliente = '$cep_cliente', cpf_cliente = '$cpf_cliente',rg_cliente = '$rg_cliente',fone_cliente = '$fone_cliente',estado_cliente='$estado_cliente' WHERE id = '$id'");
} else {
mysql_query("UPDATE clientes SET nome_cliente = '$nome_cliente',email_cliente = '$email_cliente',cidade_cliente = '$cidade_cliente',endereco_cliente = '$endereco_cliente',cep_cliente = '$cep_cliente', cpf_cliente = '$cpf_cliente',rg_cliente = '$rg_cliente',fone_cliente = '$fone_cliente',estado_cliente='$estado_cliente' WHERE id = '$id'");
}
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"clientes.php\";";
print "window.close();";
print "</script>";
}
$sql = mysql_query("SELECT * FROM clientes WHERE id = '$id_u'");
while($res = mysql_fetch_array($sql)){
$nome_cliente = $res[1];
$email_cliente = $res[2];
$cidade_cliente = $res[3];
$fone_cliente = $res[4];
$endereco_cliente = $res[5];
$estado_cliente = $res[7];
$cpf_cliente = $res[9];
$rg_cliente = $res[10];
}
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
            Visualize os dados de um pedido.</font></b></font></td>
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
      <form enctype="multipart/form-data" method="post" action="al_pedido_form.php?acao=cadastrar">
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Se
          voc&ecirc; deseja excluir este pedido por favor <a href="al_pedido_form.php?excluir=<? print $id; ?>" class="link_verde">clique
          aqui</a>.</b><br>
          </font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="36%" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="30%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome
                    do cliente:</font></b></td>
                  <td width="70%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                    <input type="hidden" name="id" value="<?print $id;?>">
                    <input type="text" name="nome_cliente" value="<? print $nome_cliente; ?>">
                    </font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail
                    : </font></b></td>
                  <td width="70%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                    <input type="text" name="email_cliente" value="<? print $email_cliente; ?>">
                    </font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefone:</font></b></td>
                  <td width="70%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
                    <input type="text" name="fone_cliente" value="<? print $fone_cliente; ?>">
                    </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                    </font></b></font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></b></td>
                  <td width="70%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
                    <input type="text" name="estado_cliente" value="<? print $estado_cliente; ?>">
                    </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                    </font></b></font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">CPF/CGC</font></b></td>
                  <td width="70%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
                    <input type="text" name="cpf_cliente" value="<? print $cpf_cliente;?>">
                    </font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">RG/I.E</font></b></td>
                  <td width="70%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
                    <input type="text" name="rg_cliente" value="<? print $rg_cliente; ?>">
                    </font></b></font></td>
                </tr>
                <tr>
                  <td width="30%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"></font></b></td>
                  <td width="70%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"></font></b></font></td>
                </tr>
              </table>
            </td>
            <td width="64%" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>DADOS
              DO PEDIDO: <br>
              </b> </font><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><?
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
print "<br><b><font face=verdana size=1><b>Mensagem de envio.:</b></b><br>$mensagem<br></font><br>";
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
<input type="submit" name="Submit" value="Fechar esta janela" onclick="javascript:window.close();">
</body>
</html>