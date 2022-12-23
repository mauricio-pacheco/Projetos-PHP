<META http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
include "administrador/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");
$idnoticia = $_POST["idnoticia"];
$status = '1';
$ip = $_SERVER["REMOTE_ADDR"];


$sql = "INSERT INTO cw_comentarios (nome, email, texto, idnoticia, status, data, hora, ip) VALUES ('$nome', '$email', '$texto', '$idnoticia', '$status', '$data', '$hora', '$ip')";
if(mysql_query($sql)) {
echo "<script>alert('COMENTÁRIO POSTADO COM SUCESSO! - AGUARDE A APROVAÇÃO DO ADMINISTRADOR PARA SEU COMENTÁRIO SER PUBLICADO')</script>";
echo "<script>location.href='vernot.php?id=$idnoticia'</script>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}
 
?>