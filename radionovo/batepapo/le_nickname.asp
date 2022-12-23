<%
Response.Buffer = True
strCor = Request.Form("optCor")
strApelido = Request.Form("apelido")
strSalvar = Request.Form("salvar")
strCareta = Request.Form("careta")

If strApelido = "" Then
	Response.Redirect "index.asp?acao=semnick"
elseif len(strApelido) < 3 or  len(strApelido) > 21 then
	Response.Redirect "index.asp?acao=tamanhoerrado"
else

If strCareta = "69" then
	strCareta = "nao"
end if

If strSalvar = "sim" then
	Response.Cookies("sc")("nome") = strApelido
	Response.Cookies("sc")("salvar") = "sim"
else
	Response.Cookies("sc")("nome") = ""
	Response.Cookies("sc")("salvar") = "nao"
end if

%>
<HTML>
<HEAD>
<TITLE>Bate Papo Rádio Luz e Alegria</TITLE>
<meta HTTP-EQUIV="refresh" CONTENT="1;URL=entrar.asp?optCor=<%=strCor%>&apelido=<%=strApelido%>&careta=<%=strCareta%>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
<BODY BGCOLOR="#EFEFF7">
</BODY>
</HTML>
<% end if %>