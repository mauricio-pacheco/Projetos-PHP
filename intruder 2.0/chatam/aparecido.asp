<% Option Explicit %>
<% Response.Buffer = True %>
<% Response.Expires = -1 %>
<% Response.CacheControl = "Public" %>
<!--#include file="functions/functions_chat.asp"-->
<!--#include file="functions/functions_users.asp"-->
<%
If Request.Querystring("Reset") = "True" Then

	Call Reset()

End If
%>
<html>
<head>
<title>Chat R&aacute;dio Luz e Alegria AM / FM</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><noscript><meta HTTP-EQUIV="refresh" CONTENT="0; url=noenter.htm"></noscript>
<LINK href="default.css" type=text/css rel=STYLESHEET>
<link rel="stylesheet" href="includes/style.css">

<script>
<!-- Hide from older browsers...

function PopUpWindow(w,h) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;

	window.open('', 'ChatWindow2', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=700,height=460,top='+wint+',left='+winl)
}
// -->
</script>

</head>

<body bgcolor="#EAEDF4" text="#000000">
<table width="100%" height="10%" align="left">
  <tr>
    <td height="100%" align="center"> <p align="left"><b>Usu&aacute;rios no momento...</b> 
      </p>
      <p align="left"> 
        <%
'Get the array
If IsArray(Application(ApplicationUsers)) Then
	saryActiveUsers = Application(ApplicationUsers)
Else
	ReDim saryActiveUsers(6, 0)
End If

Call RemoveUnActive()

If UBound(saryActiveUsers, 2) = 0 Then
	Call Reset()

	Response.Write(vbCrLf & "Não há nenhum usuário online")
Else
	Dim intArrayPass

	For intArrayPass = 1 To UBound(saryActiveUsers, 2)
		Response.Write(vbCrLf & saryActiveUsers(1, intArrayPass) & "<br>")
	Next
End If
%>
      </p>
      </td>
 </tr>
</table>

<p>&nbsp;</p>
</body>
</html>