<?
 $con = mysql_connect("localhost", "root", "");
 mysql_select_db("minicurso");
 if($con){
 echo "";
 } else {
 echo "Erro ao conectar ao banco de dados!";
 }
 ?>
