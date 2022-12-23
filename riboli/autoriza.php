<?php
include 'administrador/conexao.php';
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senhanova = hash('sha512', $senha);

$autentica= mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$usuario' AND senha= '$senhanova'");
$verifica= mysql_num_rows($autentica);
if ($verifica == 1) {
setcookie ("usuario", "$usuario", time()+3600*24*30);
setcookie ("senha", "$senha", time()+3600*24*30); 


echo "<script>location.href='clientes.php'</script>";
}else{

?>
<script type="text/javascript">
alert("USUÁRIO OU SENHA INCORRETA")
</script>

<?php
echo "<script>location.href='clientes.php'</script>";
}
?>