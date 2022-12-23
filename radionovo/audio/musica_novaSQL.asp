<% 
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
'Fazemos Requests dos Campos...
IDRadio = Request("radio")
autor = Request("autor")
titulo = Request("titulo")
arquivo = Request("arquivo")
'Cadastramos a nova música
sql = "INSERT INTO radio_music (IDRadio, autor, titulo, arquivo) VALUES ("& IDRadio &", '"& autor &"', '"& titulo &"', '"& arquivo &"') " 
Set Rs = Conn.Execute(SQL)
'Redirecionamos..
Response.Redirect("musica_nova.asp?erro=no")


rs.close
set rs = nothing
conn.close
set conn=nothing
%>