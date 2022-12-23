<? 
// Envia E-mail

$recipient = "cultura87.9fm@hotmail.com";

$subject = utf8_decode("PEDIDO DE MÚSICA 87.9 FM");

$artista = utf8_decode($_POST['artista']);
$quem = utf8_decode($_POST['quem']);
$nome = utf8_decode($_POST['nome']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$email2 = utf8_decode($_POST['email2']);
$mensagem2 = utf8_decode($_POST['mensagem']);

$texto = "<font face=verdana size=2>";
$texto .=  "$nome, acabou de pedir uma música pelo site Cultura 87.9 FM:\n\n\n<br><br>"; 
$texto .= utf8_decode("Artista / Música:");  
$texto .= "$artista\n\n<br><br>";
$texto .= "Para Quem: $quem\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>"; 
$texto .= "Cidade: $cidade\n\n<br><br>";  
$texto .= "Estado: $estado\n\n<br><br>";  
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Mensagem: $mensagem2\n\n<br>"; 
$texto .= "</font>"; 


	
$mailheaders = "MIME-Version: 1.0\n"; 
$mailheaders .= "Content-type: text/html; charset=iso-8859-1\n"; 
$mailheaders .= "From: cultura87.9fm@hotmail.com";

mail("$recipient", "$subject", "$texto", "$mailheaders");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>"; ?>