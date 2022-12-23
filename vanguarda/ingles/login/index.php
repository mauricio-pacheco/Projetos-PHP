<%
Option Explicit
Dim sql,username,rsUser,rsMessages,newcount

username = Request.Cookies("username")

'If the username cookie is set, they must have logged in, so get their details from the database
if username <> "" then
%>
<!--#include file="conn.asp"-->
<%
  
  sql = "SELECT icon FROM Users WHERE username = '" & username & "'"
  Set rsUser = Server.CreateObject("ADODB.Recordset")
  rsUser.Open sql, conn, 3, 3
  
  sql = "SELECT messageread FROM messages WHERE sendto = '" & username & "'"
  Set rsMessages = Server.CreateObject("ADODB.Recordset")
  rsMessages.Open sql, conn, 3, 3
  
  newcount = 0
  if not rsMessages.EOF then
	rsMessages.Movefirst
	do until rsMessages.EOF
		if rsMessages("messageread") = False then
			newcount = newcount + 1
		end if
		rsMessages.Movenext
	loop
	rsMessages.Movefirst
  end if
end if
%>

<html>
<head>

<script language="JavaScript">
<!-- hide on

function popup(popupfile,winheight,winwidth)
{
open(popupfile,"PopupWindow","resizable=no,height=" + winheight + ",width=" + winwidth + ",scrollbars=yes");
}

// hide off -->
</script>
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<title>Grupo Vanguarda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p>&nbsp;</p>
<p align="center"><font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>GRUPO</strong></font> 
  <strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif">VANGUARDA</font></strong></p>
<p align="center"><img src="../logo.JPG" width="102" height="114"></p>
<p align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">It 
  comes to be part of the family Vanguard. Its resume will be received and evaluated 
  by our team from human resources.<br>
To bring up to date its resume it uses the Login below. </font><font face="arial,helvetica" size=2>
</font></p>
<font face="arial,helvetica" size=2><table width="144" cellpadding=3 cellspacing=0 border=0 bordercolor="#000000" align="center">
  <%'If they're not logged in, then display a login box
if username = "" then%>
  <tr> 
    <th width="138" bgcolor="#FFFFFF"> <div align="center"><font color="#000000" size="2" face="arial,helvetica">Curriculum</font></div></th>
  </tr>
  <tr> 
    <form name="login" action="signin.asp" method="post">
      <input type="hidden" name="page" value="index.asp">
      <td align="center" bgcolor="#FFFFFF"> <div align="left"> 
          <p align="center">&nbsp;</p>
          <p align="center"><font color="#000000" size=1 face="arial,helvetica"><b>User 
            : 
            <input type="text" name="username" size="16" style="font-size: 8pt; font-family: Tahoma, Verdana Arial, Helvetica, sans-serif;">
            <br>
            Password : 
            <input type="password" name="password" size="16" style="font-size: 8pt; font-family: Arial, Helvetica, sans-serif;">
            </b></font></p>
          <p align="center"><font color="#000000" size=1 face="arial,helvetica"><b> 
            <input name="submit" type="submit" style="font-size: 8pt; font-family: Arial, Helvetica, sans-serif;" value="Login">
            </b></font></p>
        </div></td>
    </form>
  </tr>
  <%'If they are, show a mini profile box plus a sign out link
else%>
  <tr> 
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <%
rsUser.close
set rsUser = nothing
rsMessages.close
set rsMessages = nothing
conn.close
set conn = nothing
end if
%>
</table>
</font>
</body>
</html>
