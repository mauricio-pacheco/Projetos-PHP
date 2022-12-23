<?
include 'conexao2.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$idrecebedor = $_POST['idrecebedor'];

$autentica= mysql_query("SELECT * FROM integrantes WHERE email = '$email' AND senha= '$senha'");
$verifica= mysql_num_rows($autentica);
if ($verifica == 1) {
setcookie ("email", "$email", time()+3600*24*30);
setcookie ("senha", "$senha", time()+3600*24*30); 
setcookie ("idrecebedor", "$idrecebedor", time()+3600*24*30); 
header ("Location: mensagens.php");
}else{

?>
<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?
echo "<script>location.href='loginmsg.php'</script>";
}
?>
