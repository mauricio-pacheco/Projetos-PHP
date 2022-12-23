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
mysql_query("DELETE FROM clientes WHERE id = '$excluir'");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"clientes.php\";";
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
$sql = mysql_query("SELECT * FROM clientes WHERE id = '$id'");
while($res = mysql_fetch_array($sql)){
$nome_cliente = $res[1];
$email_cliente = $res[2];
$fone_cliente = $res[4];
$endereco_cliente = $res[5];
$cidade_cliente = $res[6];
$estado_cliente = $res[7];
$cep_cliente = $res[8];
$cpf_cliente = $res[9];
$rg_cliente = $res[10];
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Altere o cadastro do cliente <? print $nome; ?>.</font></b></font></td>
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
      <form enctype="multipart/form-data" method="post" action="al_cliente_form.php?acao=cadastrar">
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Se
          voc&ecirc; deseja excluir este cliente por favor <a href="al_cliente_form.php?excluir=<? print $id; ?>" class="link_verde">clique
          aqui</a>.</b><br>
          </font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                        <input type="hidden" name="id" value="<?print $id;?>">
              <input type="text" name="nome_cliente" value="<? print $nome_cliente; ?>">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail
              : </font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="email_cliente" value="<? print $email_cliente; ?>">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="password" name="senha_cliente">
              </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cidade_cliente" size="30" value="<? print $cidade_cliente;?>">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="endereco_cliente" size="50" value="<? print $endereco_cliente; ?>">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefone:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="fone_cliente" value="<? print $fone_cliente; ?>">
              </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">*
              </font></b></font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cep_cliente" value="<? print $cep_cliente; ?>">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="estado_cliente" value="<? print $estado_cliente; ?>">
              </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">*
              </font></b></font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">CPF/CGC</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="cpf_cliente" value="<? print $cpf_cliente;?>">
              <font color="#FF0000">* </font></font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">RG/I.E</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="rg_cliente" value="<? print $rg_cliente; ?>">
              <font color="#FF0000">* </font></font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"></font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"></font></b></font></td>
          </tr>
        </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Altere o cadastro">
          </font> </font> </p>
        </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
</body>
</html>