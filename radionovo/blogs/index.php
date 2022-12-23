<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Blogs Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<p align="center"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
<div align="center">
  <p class="style1">BLOGS LUZ E ALEGRIA</p>
</div>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
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
            <p align="center">&Aacute;REA RESTRITA</p>
<p align="center" class="fontetabela">Digite o Usu&aacute;rio e a Senha para acessar o M&oacute;dulo Administrativo</p>
            <p align="center" class="fontetabela">* Campos Obrigat&oacute;rios</p>
            <div align="center">
              <table width="22%" border="0">
                <tr>
                  <td width="47" class="fontetabela">Usu&aacute;rio: </td>
                  <td width="243"><span class="fontetabela">
                    <input name="usuario" type="text" class="texto" size="16" />
                    *</span></td>
                </tr>
                <tr>
                  <td class="fontetabela">Senha:</td>
                  <td><span class="fontetabela">
                    <input name="password" type="password" class="texto" size="16" />
                    *</span></td>
                </tr>
              </table>
            </div>
            <p align="center" class="manchete_texto"> <span class="fontetabela">
              <input type="submit" class="texto" value="Entrar" />
              &nbsp;&nbsp;
              <input class="texto" type="reset" value="Limpar" />
            </span></p>
          </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
