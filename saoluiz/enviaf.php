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

$cabecalho = "Para: Hotel São Luiz";

mail("saoluizhotel@saoluizhotel.com.br", "Formulário de Reservas do site Hotel São Luiz", $msg, $cabecalho);
?>
<html>
<head>
<title>Hotel S&atilde;o Luiz</title>
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#9A7143" background="wood.jpg" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p>&nbsp;</p>
<table width="96%" border="0" align="center" bgcolor="#996633">
  <tr>
    <td bgcolor="#9A7143"><br>
<p align="center"><img src="ho.gif" width="272" height="160"></p>
      <p align="center"> <font color="#FFFFFF"> </font></p>
      <p align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formul&aacute;rio 
        enviado com sucesso!!!</strong></font></p>
      <p align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Agradecemos 
        pelo seu interesse em se hospedar no Hotel S&atilde;o Luiz!</strong></font></p>
      <p align="center"><a
href="javascript:window.close()"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fechar 
        esta janela!</strong></font></a></p><br>
</td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p>&nbsp; 
</body>
</html>
