<%
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")


'Exclui a Rádio
SQL = "DELETE * FROM radio WHERE id = "&Request.QueryString("id")&""
set RS = conn.execute(SQL)
'Exclui possiveis músicas da Rádio Excluida
SQL = "DELETE * FROM radio_music WHERE idRadio = "&Request.QueryString("id")&""
set RS = conn.execute(SQL)
'Redireciona
Response.Redirect("radio_excluir.asp?erro=no")

rs.close
set rs = nothing
conn.close
set conn=nothing
%>