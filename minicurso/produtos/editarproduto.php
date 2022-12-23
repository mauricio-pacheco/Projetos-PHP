<HTML>
<HEAD>
 <TITLE>Editar Produto</TITLE>
</HEAD>
<BODY>
<?php include("menu.php"); ?>
<?php
include("conexao.php");
?>
<?php

$id = $_POST["id"];
$nome = $_POST["nome"];
$quantidade = $_POST["quantidade"];
$marca = $_POST["marca"];
$peso = $_POST["peso"];

$sql = "UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', marca = '$marca', peso = '$peso' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "O PRODUTO FOI EDITADO COM SUCESSO!!";
}else{
echo "NÃO FOI POSSÍVEL EDITAR O PRODUTO";
}

?>
</BODY>
</HTML>
