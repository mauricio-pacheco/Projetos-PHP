<? 
include "administrador/conexao.php";


$email = $_POST["email"];
$email = strip_tags($email);
$email = mysql_escape_string($email);

$sql = "DELETE  FROM cw_registros WHERE email='$email'";

if(mysql_query($sql)) {
echo "";
}else{
echo "";
}


?>