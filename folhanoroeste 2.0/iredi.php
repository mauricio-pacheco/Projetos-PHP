<?php
include 'administrador/conexao.php';
$pasta = $_POST['pasta'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senhanova = hash('sha512', $senha);

$autentica= mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$usuario' AND senha= '$senhanova' AND assinatura = '1'");
$verifica= mysql_num_rows($autentica);

if ($verifica == 1) {
setcookie ("usuario", "$usuario", time()+3600*24*30);
setcookie ("senha", "$senha", time()+3600*24*30); 


echo "<script>location.href='administrador/ups/edicoes/$pasta'</script>";
}else{

?>
<script type="text/javascript">
alert("VOCÊ PRECISA SER ASSINANTE PARA VISUALIZAR A ÚLTIMA EDIÇÃO!")
</script>

<?php
echo "<script>location.href='index.php'</script>";
}
?>