<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Administra&ccedil;&atilde;o dos pedidos de m&uacute;sicas R&aacute;dio Luz e Alegria</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<LINK href="Radio95.9FM_arquivos/default.css" type=text/css rel=STYLESHEET>
<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<BODY bgColor=#EAEDF4 text="#000000" link="#000000" vlink="#000000" alink="#000000" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font> 
<div align="center"> 
  <p>&nbsp;</p>
  <p><font color="#000000" size="3" face="Verdana, Arial, Helvetica, sans-serif">Administra&ccedil;&atilde;o 
    dos Pedidos</font></p>
  <p><font color="#000000" size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
    <a href="admin.asp">CLIQUE AQUI PARA ATUALIZAR!</a></font></p>
  <p>&nbsp;</p>
  <p><img src="fundofm.jpg" width="84" height="61"></p>
  <form method="POST" action="admin.asp?flag=1">
    <p><font color="#000000"> 
      <%
flag = request.querystring("flag")

if flag = 1 then

If IsEmpty(request.form("ID")) then 

			response.write "<br><br><br><br><br><br><p align=center>"
			response.write "<table border=1 cellpadding=3 cellspacing=0 width=423 bordercolor=#000000><tr><td width=415> <p align=center><font face=Verdana size=2>Erro na exclusão</font></p></td></tr>"
			response.write "<tr><td width=415 bgcolor=#C0C0C0><p align=center><font face=Verdana size=2>Para você deletar"
			response.write " selecione uma caixa<br>e clique no botão para excluir o item novamente.</font></p></td></tr></table>"
			response.end
		
End If
		
set rs = nothing
ID = request.form("ID")
		set conn = server.createobject("adodb.connection")
		DSNtemp="DRIVER={Microsoft Access Driver (*.mdb)}; "
    	DSNtemp=dsntemp & "DBQ=" & server.mappath("journal.mdb")
    	conn.Open DSNtemp
		For each record in request("ID")
    		sqlstmt = "DELETE * from journal WHERE ID=" & record
			Set RS = conn.execute(sqlstmt)
		Next

end if
%>
      </font></p>
    <p><font color="#000000">
      <input type="submit" value="Apagar Selecionadas" name="B1">
      <br>
      </font> </p>
    <div align="center"> 
      <center>
        <table width="786" border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#469148">
          <tr> 
            <td width="780"><div align="center">
                <p><font color="#000000" size="1" face="Verdana">Administra&ccedil;&atilde;o 
                  dos pedidos de m&uacute;sicas da R&aacute;dio Luz e Alegria 
                  FM 95.9... </font></p>
                <p>&nbsp;</p>
              </div></td>
          </tr>
          <%
set rs = nothing
DSNtemp="DRIVER={Microsoft Access Driver (*.mdb)}; "
          DSNtemp=dsntemp & "DBQ=" & server.mappath("journal.mdb")
          sqlstmt = "SELECT * FROM journal ORDER BY id DESC"
          Set rs = Server.CreateObject("ADODB.Recordset")
          rs.Open sqlstmt, DSNtemp, 3, 3
TotalRecs = rs.recordcount
x = 0
For x = 1 to 9999
	If rs.eof then
		Exit For
	Else
        data = rs("data")
        hora = rs("hora")
		date1 = rs("pdate")
		id = rs("ID")
		name = rs("pname")
	  	link = "<a href='view.asp?id=" & id & "'>" & date1 & "</a>"
		description = name
   %>
          <tr> 
            <td width="780" bgcolor="#EAEDF4"><p><font color="#000000" size="1"> 
                <input type="checkbox" name="ID" value="<% =id %>">
                <font face="Verdana, Arial, Helvetica, sans-serif">Nome:</font> 
                <strong><font face="Verdana"> 
                <% =link%>
                </font></strong><font face="Verdana"> &nbsp; -- M&uacute;sica: 
                <% =description%>
                -<font face="Verdana, Arial, Helvetica, sans-serif"> Data: 
                <% =data%>
                </font></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                / Hora: 
                <% =hora%>
                </font><font face="Verdana"> </font></font></p>
              </td>
          </tr>
          <%
rs.MoveNext
End If
Next%>
        </table>
      </center>
    </div>
    <p align="center">&nbsp;</p>
    <p align="center"><font color="#000000"> </font><font color="#000000"> </font></p>
    </form>
  <p>&nbsp; </p>
</div>
</BODY></HTML>
