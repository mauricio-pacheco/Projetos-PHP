<?
$msg .= "Cliente:\t$cliente\n";
$msg .= "Opção:\t$duvida\n";
$msg .= "Nome completo:\t$hospede\n";
$msg .= "Cidade:\t$cidade\n";
$msg .= "Telefone:\t$telefone\n";
$msg .= "Empresa:\t$endereco\n";
$msg .= "E-mail:\t$email\n";
$msg .= "Mensagem:\t$mensagem\n";

$cabecalho = "Para: SuperLig";

mail("suporte@superlig.com.br", "Formulário de Dúvidas da SuperLig", $msg, $cabecalho);
?>
<html>
<head>
<title>Superlig - Clientes</title>
<LINK href="default2.css" type=text/css rel=STYLESHEET>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#24211D" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center"><br><img src="marron.jpg" width="400" height="84"> <font color="#FFFFFF"> 
  </font></p>
<p align="center">&nbsp;</p>
<p align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formul&aacute;rio 
  enviado com sucesso!!!</strong></font></p>
<p align="center"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Agradecemos 
  pelo seu interesse.</font></strong></p>
<p align="center"><a
href="javascript:window.close()"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fechar 
  esta janela!</strong></font></a></p>
<p>&nbsp; 
</body>
</html>
