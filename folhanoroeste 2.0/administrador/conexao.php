<?php
$host = "bambini468.com.br";
$user = "bambini468";
$senha = "9BAGE2F7";
$dbname = "bambini468";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
