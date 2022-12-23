<%

'por: Mauricio Pacheco
Dim Assunto, Hospede, Cidade, Estado, Cep, Pais, Telefone, Endereco, Email, Outropais, Apartamentos, Adultos, Criancas, Dia, Mes, Ano, Dia2, Mes2, Ano2, Mensagem

Assunto = Request.form("hospede") 
Hospede = Request.form("hospede") 
Cidade = Request.form("cidade") 
Estado = Request.form("estado") 
Cep = Request.form("cep") 
Pais = Request.form("pais") 
Telefone = Request.form("telefone") 
Endereco = Request.form("endereco") 
Email = Request.form("email") 
Outropais = Request.form("outropais") 
Apartamentos = Request.form("apartamentos") 
Adultos = Request.form("adultos") 
Criancas = Request.form("criancas") 
Dia = Request.form("dia") 
Mes = Request.form("mes") 
Ano = Request.form("ano") 
Dia2 = Request.form("dia2") 
Mes2 = Request.form("mes2") 
Ano2 = Request.form("ano2")
Mensagem = Request.form("mensagem") 
meu_email = "mandry@casadaweb.net"
corpo = "Nome:" & Hospede & """<BR>"
corpo = corpo & "Cidade:" & Cidade & "<BR>"
corpo = corpo & "Estado:" & Estado & "<BR>"
corpo = corpo & "" & Outropais & "<BR>"
corpo = corpo & "CEP:" & Cep & "<BR>"
corpo = corpo & "Telefone:" & Telefone & "<BR>"
corpo = corpo & "Endereco:" & Endereco & "<BR>"
corpo = corpo & "E-mail:" & Email & "<BR>"
corpo = corpo & "Telefone:" & Telefone & "<BR>"
corpo = corpo & "E-mail:" & Email & "<BR>"
corpo = corpo & "E-mail:" & Email & "<BR>"
corpo = corpo & "Mensagem:" & Mensagem & "<BR>"


Set iMail = CreateObject("CDONTS.NewMail")
iMail.From = email
iMail.To = meu_email
iMail.Subject = Assunto
iMail.MailFormat = 0
iMail.BodyFormat = 0
iMail.Body = corpo
iMail.Send


Set objMail = nothing
%> 
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<html>
<head>
<title>Contatos</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center">&nbsp;</p>
<p align="center"><img src="logomenor.jpg" width="120" height="136"> </p>
<p align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formul&aacute;rio 
  enviado com sucesso!!!</strong></font></p>
<p align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Agradecemos 
  pela sua opni&atilde;o!</strong></font></p>
<p align="center">&nbsp;</p>
<p>&nbsp; 
</body>
</html>
