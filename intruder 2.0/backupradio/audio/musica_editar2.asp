<!--#include file="travar.asp" -->
<html><!-- InstanceBegin template="Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<%
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
%>
<Script Language="JavaScript">
<!--
<% 
SQL = "SELECT * FROM radio_music WHERE IDRadio = "&Request.QueryString("ID_Radio")&" ORDER BY ID ASC"
set RS = conn.execute(SQL)
if rs.eof then  
else
%>
function Dados(){
var Dados;
Dados = document.form1.radio.value;
switch (Dados){
<%
do while not rs.eof
%>
case "<%=Rs("ID")%>":
document.form1.autor.value = "<%=Rs("autor")%>";
document.form1.titulo.value = "<%=Rs("titulo")%>";
document.form1.arquivo.value = "<%=Rs("arquivo")%>";
break;
<%
rs.movenext
loop
%>
}
}
<%
end if
%>
//-->
</Script>





<script language="JavaScript">

function verificar(){
<%
SQL = "SELECT * FROM radio_music WHERE IDRadio = "&Request.QueryString("ID_Radio")&" ORDER BY ID ASC"
set RS = conn.execute(SQL)
if rs.eof then  
%>
alert("Nenhum Audio Cadastrado!");
return false;
<%
else
%>
{
if (document.form1.radio.value < 1) {
alert("Informe o nome do Audio!");
document.form1.radio.focus();
return false;
}
}
{
if (document.form1.autor.value < 1) {
alert("Informe o Autor!");
document.form1.autor.focus();
return false;
}
}
{
if (document.form1.titulo.value < 1) {
alert("Informe o Título do Audio!");
document.form1.titulo.focus();
return false;
}
}
{
if (document.form1.arquivo.value < 1) {
alert("Informe o caminho do Arquivo!");
document.form1.arquivo.focus();
return false;
}
}

<% end if%>
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
                                      Audio </strong></span></div></td>
                                </tr>
                                <tr> 
                                  <td height="7"></td>
                                </tr>
                                <tr> 
                                  <td><div align="center"> 
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <form name="form1" method="post" action="musica_editarSQL.asp" onsubmit="return verificar();">
                                          <tr class="Texto"> 
                                            <td width="18%" height="18"><div align="right">Noticias:</div></td>
                                            <td width="82%" height="18"> <select name="radio" class="Formulario" id="radio" onChange="return Dados();">
                                                <% 
SQL = "SELECT * FROM radio_music ORDER BY IDRadio = "&Request.QueryString("ID_Radio")&" ASC"
set RS = conn.execute(SQL)
IF rs.eof THEN
%>
                                                <option>Nenhum Audio Cadastrado</option>
                                                <%
ELSE
%>
                                                <option>Escolha algum Audio:</option>

<%
do while not rs.eof
%>
                                                <option value="<%=RS("ID")%>"><%=RS("Autor")%> - <%=RS("Titulo")%></option>
                                                <%
rs.movenext
loop
END IF
%>
                                              </select> </td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td width="18%" height="18"><div align="right">Fonte:</div></td>
                                            <td width="82%" height="18"><input name="autor" value="Luz e Alegria" type="text" class="Formulario" id="autor"> 
                                            </td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18"><div align="right">T&iacute;tulo:</div></td>
                                            <td height="18"><input name="titulo" type="text" class="Formulario" id="titulo"></td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18"><div align="right">Arquivo:</div></td>
                                            <td height="18"><input name="arquivo" type="text" class="Formulario" id="arquivo"></td>
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
