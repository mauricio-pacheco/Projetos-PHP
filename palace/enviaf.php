<?
$msg .= "Hospede:\t$hospede\n";
$msg .= "Cidade:\t$cidade\n";
$msg .= "Estado:\t$estado\n";
$msg .= "Outro País:\t$outropais\n";
$msg .= "CEP:\t$cep\n";
$msg .= "Telefone:\t$telefone\n";
$msg .= "Endereço:\t$endereco\n";
$msg .= "E-mail:\t$email\n";
$msg .= "Número de Apartamentos:\t$apartamentos\n";
$msg .= "Adultos:\t$adultos\n";
$msg .= "Crianças:\t$criancas\n";
$msg .= "Data Entrada:\n";
$msg .= "Dia:\t$dia\n";
$msg .= "Mês:\t$mes\n";
$msg .= "Ano:\t$ano\n";
$msg .= "Data Saída:\n";
$msg .= "Dia:\t$dia2\n";
$msg .= "Mês:\t$mes2\n";
$msg .= "Ano:\t$ano2\n";
$msg .= "Mensagem:\t$mensagem\n";

$cabecalho = "Para: Hotel Palace";

mail("mandry@casadaweb.net", "Formulário de Reservas do site Hotel Palace", $msg, $cabecalho);
?>
<html>
<head>
<title>Hotal Palace - Frederico Westphalen/RS</title>
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
</head>
<body bgcolor="#757271" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center"><img src="logaco.jpg" width="360" height="160"></p>
<p align="center"> <font color="#FFFFFF"> </font></p>
<p align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formul&aacute;rio 
  enviado com sucesso!!!</strong></font></p>
<p align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Agradecemos 
  pelo seu interesse em se hospedar no Hotel Palace!</strong></font></p>
<p align="center"><a
href="javascript:window.close()"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fechar 
  esta janela!</strong></font></a></p>
<p>&nbsp; 
</body>
</html>
