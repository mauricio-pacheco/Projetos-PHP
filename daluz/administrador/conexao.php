<?php
$host = "localhost";
$user = "daluzimoveisfw";
$senha = "7284159E";
$dbname = "daluzimoveisfw";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
