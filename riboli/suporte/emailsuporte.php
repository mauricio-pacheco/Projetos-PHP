<?php 
// Envia E-mail

$departamento = utf8_decode($_POST['departamento']);
$recipient = "$departamento";

$subject = utf8_decode("ATENDIMENTO AO CLIENTE - RIBOLI ADVOGADOS");

$nome = utf8_decode($_POST['nome']);
$fone = utf8_decode($_POST['fone']);
$email2 = utf8_decode($_POST['email']);
$descricao = utf8_decode($_POST['descricao']);
$texto =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Atendimento Online da Riboli Advogados:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>";  
$texto .= "Fone: $fone\n\n<br><br>"; 
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Informa&ccedil;&atilde;o: $descricao\n\n<br><br>"; 
$texto .= "\n\n<br></font>";
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: $departamento";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='client.php'</script>";
?>