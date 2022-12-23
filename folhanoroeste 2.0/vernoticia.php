<?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql2 = mysql_query("UPDATE cw_noticias set contador=contador + 1 where id='$id'");

echo "<script>location.href='vernot.php?id=$id'</script>";


   ?>