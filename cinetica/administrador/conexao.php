<?php
$host = "localhost";
$user = "cinetica_radio";
$senha = "radio2012";
$dbname = "cinetica_radio";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
