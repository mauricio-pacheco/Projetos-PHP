<?php
$host = "localhost";
$user = "multixsh_gaz";
$senha = "gaz201";
$dbname = "multixsh_gazola";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
