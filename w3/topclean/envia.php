<?php
$recipient = "mandrymaster@gmail.com";

$subject = "Formulário Site Agrobio";

$nome1 = utf8_decode($nome);
$email1 = utf8_decode($email);
$mensagem1 = utf8_decode($mensagem);

$msg = "Nome: $nome1\n\nE-mail: $email1\n\nMensagem: $mensagem1";

$mailheaders = "From: mandrymaster@gmail.com";

mail("$recipient", "$subject", "$msg", "$mailheaders");
?>