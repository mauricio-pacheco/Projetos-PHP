<?
$msg .= "Nome:\t$nome2\n";
$msg .= "E-mail:\t$email2\n";
$msg .= "Mensagem:\t$mensagem2\n";

$cabecalho = "Para: Hotel S�o Luiz";

mail("saoluizhotel@saoluizhotel.com.br", "Formul�rio de Contato do site Hotel S�o Luiz", $msg, $cabecalho);
?>