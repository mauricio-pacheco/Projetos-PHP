<?php 
// Envia E-mail

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto = "<font face=verdana size=2>";
$texto .=  "$nome, acabou de enviar uma mensagem pelo site Jornal Folha do Noroeste:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 
$texto .= "</font>"; 


	
$mensagem = utf8_encode($texto);
$recipient = "comercial@folhadonoroeste.com.br";
$recipient2 = "adelardefreitas@hotmail.com";
$mailheaders = "Content-type: text/html; charset=UTF-8";
$assunto = "FORMULÁRIO DE CONTATO JORNAL FOLHA DO NOROESTE";


mail("$recipient", "$assunto", "$mensagem", "$mailheaders");
mail("$recipient2", "$assunto", "$mensagem", "$mailheaders");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='index.php'</script>";

	 ?>