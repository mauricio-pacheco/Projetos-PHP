<?
		session_start();
		setcookie("cookie_comercio[id]", $id_usuario,time()+1296000);  
		setcookie("cookie_comercio[nome]", $nome_usuario,time()+1296000);
		setcookie("cookie_comercio[uf]", $estado_usuario,time()+1296000);
include "index.php";
?>