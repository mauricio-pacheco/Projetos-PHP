<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="classes/estilos.css">
<title>BV Financeira</title>
</head>

<body leftmargin="0" rightmargin="0" topmargin="0">
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><table width="96%" border="0" align="center">
      <tr>
        <td><script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
form1.usuario.focus();
return false
}

if (document.form1.password.value=="") {
alert("O Campo Senha não está preenchido!")
form1.password.focus();
return false
}

}

                        </script>
          <form action="auth.php" method="post" name="form1" id="form2" onsubmit="return validar(this)">
            <p align="center" class="fontetabela"><img src="login.jpg" /></p>
            <p align="center" class="fontetabela">&Aacute;REA RESTRITA</p>
            <p align="center" class="fontetabela">Digite o Usu&aacute;rio e a Senha para acessar o M&oacute;dulo Administrativo</p>
            <p align="center" class="fontetabela">* Campos Obrigat&oacute;rios</p>
            <div align="center">
              <table width="18%" border="0">
                <tr>
                  <td width="47" class="fontetabela">Usu&aacute;rio: </td>
                  <td width="243">
                    <span class="fontetabela">
                    <input name="usuario" type="text" class="fontetabela" size="16" />
                    *</span></td>
                </tr>
                <tr>
                  <td class="fontetabela">Senha:</td>
                  <td>
                    <span class="fontetabela">
                    <input name="password" type="password" class="fontetabela" size="16" />
                    *</span></td>
                </tr>
              </table>
            </div>
            <p align="center" class="manchete_texto"> 
              <span class="fontetabela">
              <input type="submit" class="fontetabela" value="Entrar" />
              &nbsp;&nbsp;
              <input class="fontetabela" type="reset" value="Limpar" />
              </span></p>
          </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>