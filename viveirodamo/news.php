<? 
include "administrador/conexao.php";


$email = $_POST["email"];
$email = strip_tags($email);
$email = mysql_escape_string($email);

$sql = "INSERT INTO cw_registros (email) VALUES ('$email')";

if(mysql_query($sql)) {
echo "";
}else{
echo "";
}


?>