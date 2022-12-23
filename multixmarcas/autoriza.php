<?php
include 'administrador/conexao.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhanova = hash('sha512', $senha);

$autentica= mysql_query("SELECT * FROM cw_clientes WHERE email = '$email' AND senha= '$senhanova'");
$verifica= mysql_num_rows($autentica);
if ($verifica == 1) {
setcookie ("email", "$email", time()+3600*24*30);
setcookie ("senha", "$senha", time()+3600*24*30); 


echo "<script>location.href='index.php'</script>";
}else{

?>
<script type="text/javascript">
alert("USUÁRIO OU SENHA INCORRETA")
</script>

<?php
echo "<script>location.href='index.php'</script>";
}
?>