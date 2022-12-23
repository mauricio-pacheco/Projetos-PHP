<%
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")


'Excluimos a Música...
SQL = "DELETE * FROM radio_music WHERE id = "&Request.QueryString("id")&""
set RS = conn.execute(SQL)

'Redirecionamos...
Response.Redirect ("musica_excluir2.asp?erro=no&ID_Radio=" & Request.QueryString("ID_Radio"))

rs.close
set rs = nothing
conn.close
set conn=nothing
%>