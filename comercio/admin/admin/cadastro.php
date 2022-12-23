<?php include ('auth.php') ?>
<html>
<head>
<title>Altera&ccedil;&atilde;o de produto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
<?
$path_local = "libs/padrao.php";
include "libs/db.php";
if($acao == "cadastrar"){
mysql_query("INSERT INTO clientes (nome_cliente,email_cliente,senha_cliente,cidade_cliente,endereco_cliente,cep_cliente,cpf_cliente,rg_cliente,fone_cliente,estado_cliente) VALUES ('$nome_cliente','$email_cliente',password('$senha_cliente'),'$cidade_cliente','$endereco_cliente','$cep_cliente','$cpf_cliente','$rg_cliente','$fone_cliente','$estado_cliente')");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php?cat_pai=0&pagina=login\";";
print "window.close();";
print "</script>";
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Fa&ccedil;a seu cadastro em nosso site e boas compras.</font></b></font></td>
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
      <form enctype="multipart/form-data" method="post" action="index.php?cat_pai=0&pagina=cadastro&acao=cadastrar">
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Se
          voc&ecirc; j&aacute; &eacute; cadastrado e recebeu este aviso por favor
          <a href="index.php?cat_pai=0&amp;pagina=login" class="link_verde">clique
          aqui</a>.</b><br>
          <br>
          Os itens com o <font color="#FF0000">*</font> vermelho s&atilde;o necess&aacute;rios.</font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="nome_cliente">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail
              : </font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="email_cliente">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="password" name="senha_cliente">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cidade_cliente" size="30">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="endereco_cliente" size="50">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefone:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="fone_cliente">
              </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP:</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cep_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="estado_cliente">
              </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">CPF/CGC</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="cpf_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">RG/I.E</font></b></td>
            <td width="87%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="rg_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"></font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"></font></b></font></td>
          </tr>
        </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Fa&ccedil;a meu cadastro">
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