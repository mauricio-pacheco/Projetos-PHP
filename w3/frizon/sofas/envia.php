<?php
$recipient = "mandrymaster@gmail.com";

$subject = "Formulário Site Estofados Frizon";

$nome1 = utf8_decode($nome);
$telefone1 = utf8_decode($telefone);
$cidade1 = utf8_decode($cidade);
$estado1 = utf8_decode($estado);
$assunto1 = utf8_decode($assunto);
$email1 = utf8_decode($email);
$mensagem1 = utf8_decode($mensagem);

$msg = "Nome: $nome1\n\nTelefone: $telefone1\n\nCidade: $cidade1\n\nEstado: $estado1\n\nAssunto: $assunto1\n\nE-mail: $email1\n\nMensagem: $mensagem1";

$mailheaders = "From: mandrymaster@gmail.com";

mail("$recipient", "$subject", "$msg", "$mailheaders");
?>