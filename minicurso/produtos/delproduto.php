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

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id='$id'";
if(mysql_query($sql)) {
echo "O PRODUTO FOI APAGADO COM SUCESSO!!";
}else{
echo "NÃO FOI POSSÍVEL APAGAR O PRODUTO";
}

?>
</BODY>
</HTML>
