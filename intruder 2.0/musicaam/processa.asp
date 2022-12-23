<%
Dim pname, pdate, pentry, data, hora, g, h

g = date

h = time

pname = request.form("pname")

pdate = request.form("pdate")

pentry = request.form("pentry")

data = request.form("data")

hora = request.form("hora")

'Conexão com o Banco de Dados
Set wm = Server.CreateObject("ADODB.Connection")

'abre o banco de dados 

wm.Open "DRIVER={Microsoft Access Driver (*.mdb)};DBQ=" & Server.MapPath("journal.mdb")
Set rs = Server.CreateObject("ADODB.Recordset")

'Insere o novo usuário na tabela usuarios

Comando = "INSERT INTO journal (pname, pdate, pentry, data, hora)" & "VALUES('" & pname & "','" &pdate & "','" & pentry& "','" & g& "','" & h& "')"
wm.Execute(Comando)


%>