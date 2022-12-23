<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table bgcolor="#FBFBFB" width="600" border="0" align="center">
  <tr>
    <td bgcolor="#FBFBFB" width="48%" valign="top"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" bgcolor="#FBFBFB" class="fontetitulo5">Já sou cliente!</td>
      </tr>
    </table>
      <table width="100%" height="20" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="manchete_texto9m" align="center">Para pessoas já cadastradas no site.</td>
        </tr>
      </table>
      <script language="javascript" type="text/javascript">
function validarlogin2(formlogin2) { 

if (document.formlogin2.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
formlogin2.usuario.focus();
return false
}

if (document.formlogin2.senha.value=="") {
alert("O Campo Senha não está preenchido!")
formlogin.senha2.focus();
return false
}

}

                        </script>
      <form action="autoriza.php" method="post" name="formlogin2" id="formlogin2" onsubmit="return validarlogin2(this)">
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="manchete_texto9">Usuário:
              <input type="text" name="usuario2" />
              *</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
          <tr>
            <td class="manchete_texto9">Esqueci meu e-mail</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
          <tr>
            <td class="manchete_texto9">Senha:
              <input type="text" name="senha2" />
              *</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
          <tr>
            <td class="manchete_texto9">Esqueci minha senha</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
          <tr>
            <td class="manchete_texto9"><input type="submit" name="button" value="Continuar" /></td>
          </tr>
        </table>
      </form></td>
    <td width="4%">&nbsp;</td>
    <td bgcolor="#FBFBFB" width="48%" valign="top"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="fontetitulo5" bgcolor="#FBFBFB" align="center">Primeira Compra?</td>
      </tr>
    </table>
      <table width="100%" height="20" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="manchete_texto9m" align="center">Para pessoas não cadastradas.</td>
        </tr>
      </table>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="manchete_texto9">CEP:</td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
        <tr>
          <td class="manchete_texto9"><input name="senha2" type="text" size="10" />
            -
            <input name="senha3" type="text" size="6" /></td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
        <tr>
          <td class="manchete_texto9">Não sei meu CEP</td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
        <tr>
          <td class="manchete_texto9">Pessoa:</td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
        <tr>
          <td class="manchete_texto9"><input name="pessoa" type="radio" id="radio" value="Física" checked="checked" />
            Física
            <input type="radio" name="pessoa" id="radio" value="Jurídica" />
            Jurídica </td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
        <tr>
          <td class="manchete_texto9"><input type="submit" name="button2" value="Continuar" /></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>