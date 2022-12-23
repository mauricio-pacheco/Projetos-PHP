<!--#include file="travar.asp" -->
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&aacute;dio Luz e Alegria AM/FM</title>

<script language="JavaScript">

function verificar(){
{
if (document.form1.nome.value < 1) {
alert("Informe algum nome para a Noticia!");
document.form1.nome.focus();
return false;
}
}
{
if (document.form1.coment.value < 1) {
alert("Informe algum comentário para a Notícia!");
document.form1.coment.focus();
return false;
}
}
}
</script>

<!-- InstanceEndEditable --> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">
        <table width="700" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#F5F5F5">
<table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td><div align="center"> 
                      <p class="Texto"><strong>Rádio Luz e Alegria AM/FM - Administração dos áudios no site</strong></p>
                    </div></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td><table width="100%" height="201" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="28%" height="201"><div align="center"> 
                      <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Texto"> 
                                  <div align="center">
                                    <p class="Texto">:: Gerenciar Audios 
                                      :: </p>
                                  </div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Texto" > 
                                  <div align="center" class="Menu"><a href="musica_nova.asp" class="Menu">Novo 
                                    Audio</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu" > 
                                  <div align="center"><a href="musica_editar.asp" class="Menu">Editar 
                                    Audio</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu" > 
                                  <div align="center"><a href="musica_excluir.asp" class="Menu">Excluir 
                                    Audio</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Texto"> 
                                  <div align="center">:: Gerenciar Notícias 
                                    :: </div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu"> 
                                  <div align="center"><a href="radio_nova.asp" class="Menu">Nova 
                                    Notícia</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu"> 
                                  <div align="center"><a href="radio_editar.asp" class="Menu">Editar 
                                    Notícia</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu"> 
                                  <div align="center"><a href="radio_excluir.asp" class="Menu">Excluir 
                                    Notícia</a></div></td>
                              </tr>
                              <tr> 
                                <td height="18" bgcolor="#FFFFFF" class="Menu"> 
                                  <div align="center" class="Texto"><a href="radio_ouvir.asp" class="Texto">:: 
                                    Ouvir Notícias ::</a></div></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                    </div></td>
                  <td width="72%"><div align="center"><!-- InstanceBeginEditable name="x" -->
                      <table width="90%" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td><div align="center"> 
                              <table width="90%" height="18" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td height="20" bgcolor="#F5F5F5"> <div align="center"><span class="Texto"><strong>Editar 
                                      Not&iacute;cias</strong></span></div></td>
                                </tr>
                                <tr> 
                                  <td height="7"></td>
                                </tr>
                                <tr> 
                                  <td><div align="center"> 
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <form name="form1" method="post" action="radio_editarSQL.asp?ID=<%=Request.QueryString("ID")%>" onsubmit="return verificar();">
<%
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
SQL = "SELECT * FROM radio WHERE id ="&Request.QueryString("ID")&""
set RS = conn.execute(SQL)
%>

										  <tr class="Texto"> 
                                            <td width="18%" height="18"><div align="right">Nome:</div></td>
                                            <td width="82%" height="18"><input name="nome" type="text" class="Formulario" id="nome" value="<%=Rs("Nome")%>"> 
                                            </td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18"><div align="right">Coment&aacute;rio:</div></td>
                                            <td height="18"><textarea name="coment" rows="20" class="Formulario" id="coment"><%=Rs("Texto")%>
</textarea></td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18">&nbsp;</td>
                                            <td height="18"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr> 
                                                  <td width="83%"> <div align="center"> 
                                                      <input name="Submit" type="submit" class="FormularioBot&atilde;o" value=" Atualizar">
                                                      <input name="Submit2" type="reset" class="FormularioBot&atilde;o" value=" Limpar">
                                                    </div></td>
                                                  <td width="17%">&nbsp;</td>
                                                </tr>
                                              </table></td>
                                          </tr>
<%
rs.close
set rs = nothing
conn.close
set conn=nothing
%>
                                        </form>
                                      </table>
                                    </div></td>
                                </tr>
                              </table>
                            </div></td>
                        </tr>
                      </table>
                      <!-- InstanceEndEditable --> 
                    </div></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5"> 
              <table width="100%" border="0" cellspacing="0" cellpadding="6">
                <tr> 
                  <td><div align="center"> 
                      <p align="right" class="Texto"><a href="central.asp" class="Texto">Capa</a> 
                        - <a href="admin.asp" class="Texto">Administra&ccedil;&atilde;o</a> 
                        <a href="sair.asp" class="Texto"><strong>| Sair</strong></a></p>
                    </div></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <p class="Menu">&nbsp;</p>
      </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
