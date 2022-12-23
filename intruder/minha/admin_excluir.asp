<!--#include file="travar.asp" -->
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Rádio Luz e Alegria AM/FM - Administração dos áudios no site</title>
<%
erro = Request.QueryString("erro")
if erro = "yes" then
ElseIf erro = "no" Then 
%>
<script language="JavaScript">
alert("Administrador Excluido com Sucesso!")
</script>
<%
else
end if
%>
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
                                  <td height="20" bgcolor="#F5F5F5"> <div align="center"><span class="Texto"><strong>Excluir 
                                      Administrador </strong></span></div></td>
                                </tr>
                                <tr> 
                                  <td height="7"></td>
                                </tr>
                                <tr> 
                                  <td><div align="center"> 
                                      <%
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

regs = 6 'Aqui setamos quantos registros serão listados por página
pag = request.querystring("pagina")

if pag = "" Then
   pag = 1
end if

set rs = createobject("adodb.recordset")

set rs.activeconnection = conn

rs.cursortype = 3 'Definimos o cursor a ser utilizado
rs.pagesize = regs

sql = "SELECT * FROM usuarios ORDER BY NOME ASC"
rs.open sql

if rs.eof or rs.bof then
   response.write "<font class='Menu'>Não há Usuários Cadastrados!</font>"
else
   rs.absolutepage = pag
   contador = 0
                        
   %>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <%
   do while not rs.eof and contador < rs.pagesize
				  %>
                                        <tr class="Texto"> 
                                          <td width="93%" height="18"><div align="left"><%=Rs("Nome")%><em> (<%=Rs("usuario")%>)</em></div></td>
                                          <td width="7%" height="18"> <div align="right"><a href="admin_excluirSQL.asp?ID=<%=Rs("ID")%>" onClick="return confirm('Você deseja excluir este Administrador?')"><img src="Imagens/excluir.gif" width="16" height="16" border="0"></a></div></td>
                                        </tr>
                                        <%
					contador = contador +1
   rs.movenext
   loop
%>
                                      </table>
                                      <%

if pag - 1 < 1 then
else
response.write "<a href='radio_excluir.asp?pagina=1'><img src=""imagens/ico_i.gif""  border=""0""></a> "
response.write "<a href='radio_excluir.asp?pagina="&pag - 1&"'><img src=""imagens/ico_menos.gif""  border=""0""></a> "
end if

if pag + 1 > rs.pagecount then
else
response.write "<a href='radio_excluir.asp?pagina="&pag + 1&"'><img src=""imagens/ico_mais2.gif""  border=""0""></a> "
response.write "<a href='radio_excluir.asp?pagina="&rs.pagecount&"'><img src=""imagens/ico_f.gif""  border=""0""></a> "
end if
%>
                                      <%
				end if
				  rs.close
				  set rs = nothing
				  conn.close
				  set conn=nothing
				  %>
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
