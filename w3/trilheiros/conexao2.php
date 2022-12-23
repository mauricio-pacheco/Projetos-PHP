<?
$host = "localhost";
$user = "trilheiros";
$senhabd = "tlbarril";
$dbname = "trilheiros";
//conecta ao banco de dados
mysql_connect($host, $user, $senhabd) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
