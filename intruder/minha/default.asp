<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<%
erro = Request.QueryString("erro")
if erro = "yes" then
%>
<script language="JavaScript">
alert("Usuário ou Senha inválida! Tente Novamente!")
</script>
<%
ElseIf erro = "restrito" Then 
%>
<script language="JavaScript">
alert("Área Restrita! Identifique-se")
</script>
<%
else
end if
%>
<script language="JavaScript">

function verificar(){
{
if (document.form1.usuario.value < 1) {
alert("Informe seu Usuário!");
document.form1.usuario.focus();
return false;
}
}
{
if (document.form1.senha.value < 1) {
alert("Informe sua Senha!");
document.form1.senha.focus();
return false;
}
}
}
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><div align="center"> 
                <table width="90%" height="18" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td height="20" bgcolor="#F5F5F5"> <div align="center"><span class="Texto">R&aacute;dio 
                        Luz e Alegria AM/FM<strong> - Administra&ccedil;&atilde;o 
                        dos &aacute;udios no site</strong></span></div></td>
                  </tr>
                  <tr> 
                    <td height="7"></td>
                  </tr>
                  <tr> 
                    <td height="100"> 
                      <div align="center"> 
                        <table width="300" border="0" cellspacing="0" cellpadding="0">
                          <form name="form1" method="post" action="valida.asp" onsubmit="return verificar();">
                            <tr class="Texto"> 
                              <td width="18%" height="18"><div align="right">Usu&aacute;rio:</div></td>
                              <td width="82%" height="18"><input name="usuario" type="text" class="Formulario" id="usuario"> 
                              </td>
                            </tr>
                            <tr class="Texto"> 
                              <td height="18"><div align="right">Senha:</div></td>
                              <td height="18"><input name="senha" type="password" class="Formulario" id="senha"></td>
                            </tr>
                            
                            <tr class="Texto"> 
                              <td height="18">&nbsp;</td>
                              <td height="18"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr> 
                                    <td width="81%"> <div align="center"> 
                                        <input name="Submit" type="submit" class="FormularioBot&atilde;o" value=" Entrar">
                                        <input name="Submit2" type="reset" class="FormularioBot&atilde;o" value=" Limpar">
                                      </div></td>
                                    <td width="19%">&nbsp;</td>
                                  </tr>
                                </table></td>
                            </tr>
                          </form>
                        </table>
                      </div></td>
                  </tr>
				   <tr> 
                    <td height="7"></td>
                  </tr>
				                    <tr> 
                    <td height="20" bgcolor="#F5F5F5"> <div align="center"><span class="Texto">Desenvolvido 
                        por <a href="http://www.casadaweb.net" target=_blank>Casa 
                        da Web</a></span></div></td>
                  </tr>
                </table>
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
