<?
include ("../padrao.php");
$path_local = "../padrao.php";
if (!$_SERVER['PHP_AUTH_USER'] && !$_SERVER['PHP_AUTH_PW']) {
header("Location: index.php");
exit;
}
$nome = $site['admin'];
$senha = $site['senha'];
if ($_SERVER['PHP_AUTH_USER'] !=$nome || $_SERVER['PHP_AUTH_PW'] !=$senha) {
header("Location: index.php");
exit;
}
?>
