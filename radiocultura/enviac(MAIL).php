<? 
// Envia E-mail

$recipient = "cultura87.9fm@hotmail.com";

$subject = "FORMULARIO DE CONTATO CULTURA 87.9 FM";

$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$telefone = utf8_decode($_POST['telefone']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto = "<font face=verdana size=2>";
$texto .=  "$nome, acabou de enviar uma mensagem pelo site Cultura 87.9 FM:\n\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "Telefone: $telefone\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 
$texto .= "</font>"; 

$mailheaders = "MIME-Version: 1.0\n"; 
$mailheaders .= "Content-type: text/html; charset=iso-8859-1\n"; 
$mailheaders .= "From: cultura87.9fm@hotmail.com";

mail("$recipient", "$subject", "$texto", "$mailheaders");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>";

 ?>