<?php
$host = "postoseberi.com.br";
$user = "postoseberi";
$senha = "Po375Seb2";
$dbname = "postoseberi";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
