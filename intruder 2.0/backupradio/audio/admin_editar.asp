<!--#include file="travar.asp" -->
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<%
erro = Request.QueryString("erro")
if erro = "yes" then
%>
<script language="JavaScript">
alert("Voc? s? pode alterar seus Dados!")
</script>
<%
ElseIf erro = "no" Then 
%>
<script language="JavaScript">
alert("Dados alterados com sucesso!")
</script>
<%
else
end if
%>

<%
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
%>
<Script Language="JavaScript">
<!--
<% 
SQL = "SELECT * FROM usuarios ORDER BY ID ASC"
set RS = conn.execute(SQL)
if rs.eof then  
else
%>
function Dados(){
var Dados;
Dados = document.form1.admin.value;
switch (Dados){
<%
do while not rs.eof
%>
case "<%=Rs("ID")%>":
document.form1.nome.value = "<%=Rs("Nome")%>";
document.form1.usuario.value = "<%=Rs("Usuario")%>";
document.form1.senha.value = "<%=Rs("Senha")%>";
document.form1.senha2.value = "<%=Rs("Senha")%>";
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
SQL = "SELECT * FROM usuarios ORDER BY ID ASC"
set RS = conn.execute(SQL)
if rs.eof then  
%>
alert("Nenhum Audio Cadastrado!");
return false;
<%
else
%>
{
if (document.form1.admin.value < 1) {
alert("Informe o nome do Usu?rio!");
document.form1.admin.focus();
return false;
}
}
{
if (document.form1.nome.value < 1) {
alert("Informe o Nome!");
document.form1.nome.focus();
return false;
}
}
{
if (document.form1.usuario.value < 1) {
alert("Informe o Usu?rio!");
document.form1.usuario.focus();
return false;
}
}
{
if (document.form1.senha.value < 1) {
alert("Informe a Senha!");
document.form1.senha.focus();
return false;
}
}
{
if (document.form1.senha2.value < 1) {
alert("Confirme a Senha!");
document.form1.senha2.focus();
return false;
}
}
{
if (document.form1.senha.value != document.form1.senha2.value) {
alert("Senha n?o confere com Confirma??o de Senha!");
document.form1.senha.focus();
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
                      <p class="Texto"><strong>R?dio Luz e Alegria AM/FM - Administra??o dos ?udios no site</strong></p>
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
                                      Administrador </strong></span></div></td>
                                </tr>
                                <tr> 
                                  <td height="7"></td>
                                </tr>
                                <tr> 
                                  <td><div align="center"> 
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <form name="form1" method="post" action="admin_editarSQL.asp" onsubmit="return verificar();">
                                          <tr class="Texto"> 
                                            <td width="18%" height="18"><div align="right">Usu&aacute;rios:</div></td>
                                            <td width="82%" height="18"> <select name="admin" class="Formulario" id="admin" onChange="return Dados();">
                                                <% 
SQL = "SELECT * FROM usuarios ORDER BY nome ASC"
set RS = conn.execute(SQL)
IF rs.eof THEN
%>
                                                <option>Nenhum Usu?rio Cadastrado</option>
                                                <%
ELSE
%>                                                <option>Escolha algum Administrador:</option>
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
                                              </select> </td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td width="18%" height="18"><div align="right">Nome:</div></td>
                                            <td width="82%" height="18"><input name="nome" type="text" class="Formulario" id="nome"> 
                                            </td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18"><div align="right">Usu&aacute;rio:</div></td>
                                            <td height="18"><input name="usuario" type="text" class="Formulario" id="usuario" readonly="true"></td>
                                          </tr>
                                          <tr class="Texto"> 
                                            <td height="18"><div align="right">Senha:</div></td>
                                            <td height="18"><input name="senha" type="password" class="Formulario" id="senha"></td>
                                          </tr>
										  <tr class="Texto"> 
                                            <td height="18"><div align="right">Confirma:</div></td>
                                            <td height="18"><input name="senha2" type="password" class="Formulario" id="senha2"></td>
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
