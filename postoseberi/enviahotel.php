<?php 
// Envia E-mail
$recipient = "auxfinanceiro@postoseberi.com.br";

$subject = "RESERVA NO HOTEL - Contato do Site - Posto Seberi";

$tipo = utf8_decode($_POST['tipo']);
$nome = utf8_decode($_POST['nome']);
$cnpj = utf8_decode($_POST['cnpj']);
$email = utf8_decode($_POST['email']);
$endereco = utf8_decode($_POST['endereco']);
$bairro = utf8_decode($_POST['bairro']);
$complemento = utf8_decode($_POST['complemento']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$cep = utf8_decode($_POST['cep']);
$telefone = utf8_decode($_POST['telefone']);
$fax = utf8_decode($_POST['fax']);
$apartamento = utf8_decode($_POST['apartamento']);
$dataentrada = utf8_decode($_POST['dataentrada']);
$datasaida = utf8_decode($_POST['datasaida']);
$msg = utf8_decode($_POST['msg']);

$texto =  "<font face=verdana size=2 color=#009136><b>RESERVAS NO HOTEL DO SITE POSTO SEBERI:</b></font>\n\n\n<br><br>"; 
$texto .= "<font face=verdana size=2><b>DADOS DA RESERVA:</b></font><br><br>";
$texto .= "<font face=verdana size=2><b>Tipo de Hospede:</b> \t$tipo</font><BR><BR>";
$texto .= "<font face=verdana size=2><b>Nome:</b> \t$nome</font><BR>";
$texto .= "<font face=verdana size=2><b>CNPJ ou CPF:</b> \t$cnpj</font><BR>";
$texto .= "<font face=verdana size=2><b>E-mail:</b> \t$email</font><BR>";
$texto .= "<font face=verdana size=2><b>Endere&ccedil;o:</b> \t$endereco</font><BR>";
$texto .= "<font face=verdana size=2><b>Bairro:</b> \t$bairro</font><BR>";
$texto .= "<font face=verdana size=2><b>Complemento:</b> \t$complemento</font><BR>";
$texto .= "<font face=verdana size=2><b>Cidade:</b> \t$cidade</font><BR>";
$texto .= "<font face=verdana size=2><b>Estado:</b> \t$estado</font><BR>";
$texto .= "<font face=verdana size=2><b>Cep:</b> \t$cep</font><BR>";
$texto .= "<font face=verdana size=2><b>Telefone:</b> \t$telefone</font><BR>";
$texto .= "<font face=verdana size=2><b>Celular:</b> \t$fax</font><BR><BR>";
$texto .= "<font face=verdana size=2><b>Tipo de Apartamento:</b> \t$apartamento</font><BR>";
$texto .= "<font face=verdana size=2><b>Data Entrada:</b> \t$dataentrada</font><BR>";
$texto .= "<font face=verdana size=2><b>Data Sa&iacute;da:</b> \t$datasaida</font><BR>";
$texto .= "<font face=verdana size=2><b>Mensagem:</b> \t$msg</font><BR><BR>";
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers = "From: auxfinanceiro@postoseberi.com.br";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";
?>