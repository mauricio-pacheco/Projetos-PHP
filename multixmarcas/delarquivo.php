<?php
include "administrador/conexao.php";

$id = $_GET['id'];
$idcliente = $_GET['idcliente'];
$cliente = $_GET['cliente'];
$usuario = $_GET['usuario'];
$arquivo = $_GET['arquivo'];

$sql = "DELETE FROM cw_anexosarquivos WHERE id='$id'";
if(mysql_query($sql)) {
unlink("administrador/ups/arquivos/$arquivo");
echo "<script>alert('ARQUIVO APAGADO COM SUCESSO!')</script>";
echo "<script>location.href='arquivos.php?idcliente=$idcliente&usuario=$usuario&cliente=$cliente'</script>";
}else{
echo "<div align=center><br><font color='#000000' >NÃO FOI POSSÍVEL APAGAR!</font></div>";
}
 
?>