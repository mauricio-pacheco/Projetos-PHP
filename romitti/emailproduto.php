<?php 
// Envia E-mail
$recipient = "cassianoromitti@hotmail.com";

$subject = utf8_decode("Informações de Produto - Romitti Divisórias");

$id = utf8_decode($_POST['id']);
$produto = utf8_decode($_POST['produto']);
$nome = utf8_decode($_POST['nome']);
$fone = utf8_decode($_POST['fone']);
$email2 = utf8_decode($_POST['email2']);
$descricao = utf8_decode($_POST['descricao']);
$texto =  "<font face=tahoma size=2>$nome, acabou de enviar uma mensagem via Informa&ccedil;&otilde;es do Produto do site Romitti Divis&oacute;rias:\n\n\n<br><br>"; 
$texto .= "Produto Escolhido: <b>$produto</b>\n\n<br><br>"; 
$texto .= "Nome: $nome\n\n<br><br>";  
$texto .= "Fone: $fone\n\n<br><br>"; 
$texto .= "E-mail: $email2\n\n<br><br>";  
$texto .= "Informa&ccedil;&atilde;o: $descricao\n\n<br><br>"; 
$texto .= "Link do Produto no Site:\n\n<br>"; 
$texto .= "<a href=http://www.romittidivisorias.com.br/verproduto.php?id=$id>http://www.romittidivisorias.com.br/verproduto.php?id=$id</a>\n\n<br></font>";
$headers = "MIME-Version: 1.0\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: site@romittidivisorias.com.br";

mail("$recipient", "$subject", "$texto", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>";
?>