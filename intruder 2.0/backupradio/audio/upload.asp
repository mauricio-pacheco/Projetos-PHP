<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>R&aacute;dio Luz e Alegria Am / FM</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<LINK href="default2.css" type=text/css rel=STYLESHEET>
<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<BODY bgColor=#FFFFFF text="#000000" link="#000000" vlink="#000000" alink="#000000" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<div align="center">
<p>&nbsp;</p>
</div>
<form method=post ENCTYPE="multipart/form-data">
  <div align="center">
    <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Seja bem vindo 
      a administra&ccedil;&atilde;o dos audios.</font></p>
    <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Selecione o 
      arquivo .mp3 e envie!</font></p>
    <p> 
      <input type="file" name="File1" value="">
    </p>
    <p> 
      <input type="submit" name="Action" value="ENVIAR">
      <br>
    </p>
    </div>
</form>
</BODY></HTML>
<!---#INCLUDE FILE="upload.inc" --->

<%

'Sauvegarde le fichier 'File1' sur le serveur dans le même répertoire que ce script
'Modifier le FilePath pour le claquer ailleurs
If Request.ServerVariables("REQUEST_METHOD") = "POST" Then 'Request method must be "POST" For get the fields
  Set Fields = GetUpload()
  FilePath = Server.MapPath(".") & "\" & Fields("File1").FileName
  Fields("File1").Value.SaveAs FilePath
End If

%>