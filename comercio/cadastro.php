<?
/// REDIRECIONAMENTO PARA PÁGINA DE LOGIN
if($ir_para_login){
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php?cat_pai=1&pagina=login\";";
print "window.close();";
print "</script>";
exit;
}
include "./libs/padrao.php";
?>
<html>
<head>
<title>Novo usu&aacute;rio</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
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
      <form method="post" action="validacad.php" name="novo_usuario">
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><b><br>Se
          voc&ecirc; j&aacute; &eacute; cadastrado e recebeu este aviso por favor
          <a href="cadastro.php?ir_para_login=sim" class="link_verde"><u>clique
          aqui</u></a>.</b><br>
          <br>
          Os itens com o <font color="#FF0000">*</font> vermelho s&atilde;o necess&aacute;rios.</font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></b></td>
            <td width="78%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="nome_cliente">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail
              : </font></b></td>
            <td width="78%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="email_cliente">
              *</font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></b></td>
            <td width="78%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="password" name="senha_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Confirma Senha:</font></b></td>
            <td width="78%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="password" name="senha_confirma">
              * </font></b></font></td>
          </tr>

          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cidade_cliente" size="30">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="endereco_cliente" size="40">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefone:</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="fone_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP:</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="text" name="cep_cliente">
              * </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <select name="estado_cliente" style="HEIGHT: 22px; WIDTH: 51px" size="1">
                <option selected value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="RS">RS</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>
                <option value="TO">TO</option>
              </select><font color="#FF0000"> * </font>
              </font></b></font></td>
          </tr>
          <tr>
            <td width="22%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">CPF/CGC</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            <input type=radio name="chkCPF" value="off">
                        CNPJ (pessoa jurídica) ou <br>
                        <input type=radio name="chkCPF" value="on" checked>
                        CPF (pessoa física)
                        N&uacute;mero: <input type="text" name="cpf_cliente" size="14" maxlength="14"><font color="#FF0000"> * </font>
                        </td>
          </tr>
          <tr>
            <td width="22%"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">RG/I.E</font></b></td>
            <td width="78%"> <font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
              <input type="text" name="rg_cliente">
              <font color="#FF0000">* </font></font></b></font></td>
          </tr>
          <tr>
            <td width="22%">
              <div align="right"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <input type="checkbox" name="cookieativo" value="SIM">
                </font></b></div>
            </td>
            <td width="78%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">Ative
              esta caixa se voc&ecirc; deseja que o sistema lembre da sua conta
              neste computador</font></b></font></td>
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