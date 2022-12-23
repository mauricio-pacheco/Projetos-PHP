<%
Response.expires = 0
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
'Fazemos Requests dos Campos...
radio = Request("radio")
autor = Request("autor")
titulo = Request("titulo")
arquivo = Request("arquivo")
'Atualizamos os dados...
SQL = "UPDATE radio_music SET autor='"&autor&"', titulo='"&titulo&"', arquivo='"&arquivo&"' WHERE ID ="&radio&""
Set Rs = Conn.Execute(SQL)
'Redirecionamos...
Response.Redirect("musica_editar.asp?erro=no")

rs.close
set rs = nothing
conn.close
set conn=nothing
%>