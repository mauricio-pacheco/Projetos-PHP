<%
Response.expires = 0
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

admin = Cint(Request("admin"))
nome = Request("nome")
usuario = Replace(Request.Form("usuario"),chr(39),"''")
senha = Replace(Request.Form("senha"),chr(39),"''")


SQL = "UPDATE usuarios SET senha='"&novasenha&"', usuario='"&usuario&"', nome='"&nome&"' WHERE id ="&admin&""
Set Rs = Conn.Execute(SQL)

SQL = "SELECT * FROM usuarios WHERE ID = "&Session("ID")&""
Set Rs = Conn.Execute(SQL)

Session("id") = Rs("id")
Session("senha") = Rs("senha")
Session("usuario") = Rs("usuario")
Session("nome") = Rs("nome")

Response.Redirect("admin_editar.asp?erro=no")


rs.close
set rs = nothing
conn.close
set conn=nothing
%>