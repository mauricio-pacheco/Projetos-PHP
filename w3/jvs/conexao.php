<?php
$host = "localhost";
$user = "jvscasa";
$senha = "jvs2010";
$dbname = "jvstur";
//conecta ao banco de dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");
//seleciona o banco de dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
?>
