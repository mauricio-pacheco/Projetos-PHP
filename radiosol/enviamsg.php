<?php 
// Envia E-mail
include "administrador/conexao.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

$sql = "INSERT INTO cw_mural (nome, email, comentario, data, hora, status) VALUES ('$nome', '$email', '$comentario', '$data', '$hora', '0')";
if(mysql_query($sql)) {
echo "<script>alert('A FAMÍLIA SOL DA AMÉRICA AGRADECE SUA PARTICIPAÇÃO!')</script>";
echo "<script>location.href='index.php'</script>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}

 ?>