<% Response.buffer = true %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#EAEDF4" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<div align="center">
<p>
    <script language="JavaScript">
function popup(url,n,t)
{
 window.open(url,n,t);
 }
</script>
  </p>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><div align="center"> 
        <table width="90%" height="18" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            
          </tr>
          
          <tr> 
            <td><div align="center"> 
                <%
Response.expires = 0
Response.Buffer=True
Set conn = Server.CreateObject("ADODB.Connection")
conn.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")

regs = 15 'Aqui setamos quantos registros serão listados por página
pag = request.querystring("pagina")

if pag = "" Then
   pag = 1
end if

set rs = createobject("adodb.recordset")

set rs.activeconnection = conn

rs.cursortype = 3 'Definimos o cursor a ser utilizado
rs.pagesize = regs

sql = "SELECT * FROM radio ORDER BY Nome ASC"
rs.open sql

if rs.eof or rs.bof then
   response.write "<font class='Menu'>Não há Notícias Cadastradas!</font>"
else
   rs.absolutepage = pag
   contador = 0
                        
   %>
                <table width="90%" border="0" cellpadding="0" cellspacing="0" class="Dizer">
                  <%
   do while not rs.eof and contador < rs.pagesize
				  %>
                  <tr> 
                    <td align="center" width="7%"> <table width="50%" border="0">
                        <tr> 
                          <td width="73%"><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="#">
                              <%
Conta = "SELECT COUNT(id) AS total FROM radio_music WHERE IDRadio ="&Rs("ID")&""
Set Ls = Conn.Execute(Conta)
total = Ls("total")
IF total = 0 THEN
Response.write "<img src=""fone.gif"" width=""89"" height=""100"" border=""0"" onClick=""alert('Rádio Sem Músicas')"">"
ELSE
Response.write "<img src=""fone.gif"" width=""89"" height=""100"" border=""0"" onClick=""popup('sis_radio.asp?ID_Radio="&Rs("ID")&"','player','width=392,height=380')"">"
END IF
%>
                              </a></font></div></td>
                        </tr>
                      </table>
                      
                    </td>
                  </tr>
                  <%
					contador = contador +1
   rs.movenext
   loop
%>
                </table>
                <%

if pag - 1 < 1 then
else
response.write "<a href='sis_radio_ouvir.asp?pagina=1'><img src=""imagens/ico_i.gif""  border=""0""></a> "
response.write "<a href='sis_radio_ouvir.asp?pagina="&pag - 1&"'><img src=""imagens/ico_menos.gif""  border=""0""></a> "
end if

if pag + 1 > rs.pagecount then
else
response.write "<a href='sis_radio_ouvir.asp?pagina="&pag + 1&"'><img src=""imagens/ico_mais2.gif""  border=""0""></a> "
response.write "<a href='sis_radio_ouvir.asp?pagina="&rs.pagecount&"'><img src=""imagens/ico_f.gif""  border=""0""></a> "
end if
%>
                <%
				end if
				  rs.close
				  set rs = nothing
				  conn.close
				  set conn=nothing
				  %>
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
</body>
</html>
