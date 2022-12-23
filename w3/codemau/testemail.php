<?php

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: WebMaster <remente@email.com.br>\n";
$headers .= "Return-Path: <rementente@email.com.br>\n";
mail("mandrymaster@bol.com.br", "Assunto de teste", "Mensagem de teste", $headers) OR DIE ("Mensagem não enviada");
echo "Mensagem enviada com sucesso";

?>
