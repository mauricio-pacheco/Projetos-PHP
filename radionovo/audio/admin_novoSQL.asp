<% 
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

nome = Request("nome")
usuario = Replace(Request.Form("usuario"),chr(39),"''")
senha = Replace(Request.Form("senha"),chr(39),"''")

SQL = "SELECT * FROM usuarios WHERE usuario = '"& usuario &"'"
set RS = conn.execute(SQL)

if rs.eof then 

SQL = "INSERT INTO usuarios (nome, senha, usuario) values ('" & nome & "', '" & senha & "', '" & usuario & "')"
Set Rs = Conn.Execute(SQL)

Response.Redirect("admin_novo.asp?erro=no")

else

Response.Redirect("admin_novo.asp?erro=yes")

end if

rs.close
set rs = nothing
conn.close
set conn=nothing
%>