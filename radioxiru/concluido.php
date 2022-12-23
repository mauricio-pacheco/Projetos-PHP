<?
$msg .= "Nome do usuario:\t$nome\n";
$msg .= "Sobrenome:\t$sobrenome\n";
$msg .= "Data Nascimento:\t$datanascimento\n";
$msg .= "Sexo:\t$sex\n";
$msg .= "Endereço:\t$endereco\n";
$msg .= "Número:\t$numero\n";
$msg .= "Complemento:\t$complemento\n";
$msg .= "Cidade:\t$cidade\n";
$msg .= "Estado:\t$estado\n";
$msg .= "E-mail:\t$email\n";
$msg .= "País:\t$telefone\n";
$msg .= "Mensagem:\t$mensagem\n";

$cabecalho = "Para: Arinos FM";

mail("elisanepiacentini@hotmail.com", "Formulário do site da Arinos FM", $msg, $cabecalho);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<LINK href="style.css" type=text/css rel=STYLESHEET>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p align="center">&nbsp;</p>
<p align="center"><img src="arinosfmm.gif" width="185" height="181"></p>
<p align="center">&nbsp;</p>
<p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>FORMUL&Aacute;RIO 
  ENVIADO COM SUCESSO!</em></strong></font></p>
<p align="center"><em><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">OBRIGADO 
  POR ESTAR SINTONIZADO CONOSCO!</font></strong></em></p>
<p align="center">&nbsp;</p>
    </body>
</html>
