<? 
include "administrador/conexao.php";


$email = $_POST["email"];


$sql = "INSERT INTO cw_registros (email) VALUES ('$email')";

if(mysql_query($sql)) {
echo "";
}else{
echo "";
}


echo "<script>alert('E-mail Cadastrado com Sucesso!')</script>";
echo "<meta http-equiv='refresh' content='0;URL=principal.php'>";

?>