<% 
Response.expires = 0
Response.Buffer=True

Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

usuario = Replace(Request.Form("usuario"),chr(39),"''")
senha = Replace(Request.Form("senha"),chr(39),"''")

Set Rs = Server.CreateObject("ADODB.RecordSet")
SQL = "SELECT * FROM usuarios WHERE  usuario='"&usuario&"' AND senha='"&senha&"'"
Set Rs = conn.execute(SQL)

If Not Rs.EOF then

Session("id") = Rs("id")
Session("senha") = Rs("senha")
Session("usuario") = Rs("usuario")
Session("nome") = Rs("nome")

Response.Redirect ("central.asp")
else
Response.Redirect ("default.asp?erro=yes")
end if

rs.close
set rs = nothing
conn.close
set conn=nothing

%>