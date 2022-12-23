<? 
include "administrador/conexao.php";


$email = $_POST["email"];
$nome = $_POST["nome"];
$email = strip_tags($email);
$email = mysql_escape_string($email);

$sql = "INSERT INTO cw_registros (email, nome) VALUES ('$email', '$nome')";

if(mysql_query($sql)) {
echo "<script>alert('CADASTRO EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='principal.php'</script>";
}else{
echo "<script>alert('NÃO FOI POSSÍVEL EFETUAR O CADASTRO!')</script>";
echo "<script>location.href='principal.php'</script>";
}


?>