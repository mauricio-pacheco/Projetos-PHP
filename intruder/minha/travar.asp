<%
Session.TimeOut = 20
If Session("ID") = "" Then
Response.Redirect ("default.asp?erro=restrito")
End If
%>