<%
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")


'Exclui a Rádio
SQL = "DELETE * FROM usuarios WHERE id = "&Request.QueryString("id")&""
set RS = conn.execute(SQL)
'Redireciona
Response.Redirect("admin_excluir.asp?erro=no")

rs.close
set rs = nothing
conn.close
set conn=nothing
%>