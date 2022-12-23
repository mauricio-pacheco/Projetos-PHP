<% 
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

nome = Request("nome")
comentario = Request("coment")

sql = "INSERT INTO radio (nome, texto) VALUES ('"& nome &"', '"& comentario &"') " 
Set Rs = Conn.Execute(SQL)

Response.Redirect("radio_nova.asp?erro=no")


rs.close
set rs = nothing
conn.close
set conn=nothing
%>