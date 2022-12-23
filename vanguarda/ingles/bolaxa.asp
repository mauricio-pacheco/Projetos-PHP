<%

'por: Mauricio Pacheco
Dim iMail, Nome, Email, Assunto, Mensagem, Tel

Nome = Request.form("nome") 
Email = Request.form("email")
Cidade = Request.form("cidade")
Estado = Request.form("estado")
Pais = Request.form("pais")
Tel = Request.form("tel")
Mensagem = Request.form("mensagem") 
meu_email = "mandry@brturbo.com"
Assunto = Request.form("assunto")

corpo = "Nome:" & Nome & "<BR>"
corpo = corpo & "E-mail:" & Email & "<BR>"
corpo = corpo & "Telefone:" & Tel & "<BR>"
corpo = corpo & "Cidade:" & Cidade & "<BR>"
corpo = corpo & "Estado:" & Estado & "<BR>"
corpo = corpo & "País:" & Pais & "<BR>"
corpo = corpo & "Assunto:" & Assunto & "<BR>"
corpo = corpo & "Mensagem:" & Mensagem & "<BR>"



Set iMail = CreateObject("CDONTS.NewMail")
iMail.From = email
iMail.To = meu_email
iMail.Subject = Assunto
iMail.MailFormat = 0
iMail.BodyFormat = 0
iMail.Body = corpo
iMail.Send

Response.write("Alerta="+Server.URLEncode("Enviado com sucesso!"))

Set objMail = nothing
%> 

