<?
ob_start();
if (!isset($_COOKIE["email"]) && !isset($_COOKIE["senha"]) && !isset($_COOKIE["idrecebedor"]) ) {
header("Location: loginmsg.php");
}
?>
