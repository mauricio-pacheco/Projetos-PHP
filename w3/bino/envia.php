<?php
$recipient = "binoarte@terra.com.br";

$subject = "Formulário Site Binoarte";

$nome1 = $nome;
$email1 = $email;
$telefone1 = $telefone;
$cidade1 = $cidade;
$estado1 = $estado;
$assunto1 = $assunto;
$mensagem1 = $mensagem;

$msg = "Nome: $nome1\n\nE-mail: $email1\n\nTelefone: $telefone1\n\nCidade: $cidade1\n\nEstado: $estado1\n\nAssunto: $assunto1\n\nMensagem: $mensagem1";

$mailheaders = "From: binoarte@terra.com.br";

mail("$recipient", "$subject", "$msg", "$mailheaders");
?>