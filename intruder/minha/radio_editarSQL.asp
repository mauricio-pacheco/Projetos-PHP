<%
Response.expires = 0
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

ID = Request.QueryString("ID")
nome = Request("nome")
comentario = Request("coment")


SQL = "UPDATE radio SET nome='"&nome&"', texto='"&comentario&"' WHERE ID ="&ID&""
Set Rs = Conn.Execute(SQL)

Response.Redirect("radio_editar.asp?erro=no")
%>