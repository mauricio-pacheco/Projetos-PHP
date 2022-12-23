<?
require ("$path_local");
$conecta = mysql_connect("$dados[host]","$dados[usuario]","$dados[senha]");
mysql_select_db("$dados[banco]");
?>