<!--#include file="travar.asp" -->
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<SCRIPT language=JavaScript> 
        function reloadIFrame() { 
        var ID = form1.radio.value; 
		window.open("musica_excluir2.asp?ID_Radio=" + ID,"_top"); 
      } 
</SCRIPT>
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
                      <p class="Texto"><strong>R�dio Luz e Alegria AM/FM - Administra��o dos �udios no site</strong></p>
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
                                      Audio </strong></span></div></td>
                                </tr>
                                <tr> 
                                  <td height="7"></td>
                                </tr>
                                <form name="form1" method="post" action="">
                                  <tr> 
                                    <td><div align="center"><br>
                                        <select name="radio" class="Formulario" id="radio" onchange=reloadIFrame();>
                                          <% 
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
SQL = "SELECT * FROM radio ORDER BY nome ASC"
set RS = conn.execute(SQL)
IF rs.eof THEN
%>
                                          <option>Nenhuma Not�cia Cadastrada</option>
                                          <%
ELSE
%>
                                          <option>Escolha alguma Not�cia:</option>

<%
do while not rs.eof
%>
                                          <option value="<%=RS("ID")%>"><%=RS("Nome")%></option>
                                          <%
rs.movenext
loop
END IF
rs.close
set rs = nothing
conn.close
set conn=nothing
%>
                                        </select>
                                      </div></td>
                                  </tr>
                                </form>
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
