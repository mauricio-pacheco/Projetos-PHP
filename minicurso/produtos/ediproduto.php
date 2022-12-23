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
echo "Editar Produto:";
?>
<?php

$id = $_GET['id'];

$sql = "SELECT id, nome, quantidade, marca, peso FROM produtos WHERE id='$id'";
$sql = mysql_query($sql);

while ($linha = mysql_fetch_array($sql)) {

$id  = $linha["id"];
$nome  = $linha["nome"];
$quantidade  = $linha["quantidade"];
$marca  = $linha["marca"];
$peso  = $linha["peso"];

?>
<form method="POST" name="cadastro" action="editarproduto.php">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Nome do Produto: <input type="text" size="20" name="nome" value="<?php echo "$nome"; ?>"><br>
Quantidade: <input type="text" size="20" name="quantidade" value="<?php echo "$quantidade"; ?>"><br>
Marca: <input type="text" size="20" name="marca" value="<?php echo "$marca"; ?>"><br>
Peso: <select size="1" name="peso">
   <option value="<?php echo "$peso"; ?>"><?php echo "$peso"; ?></option>
   <option value="10 g">10 g</option>
   <option value="100 g">100 g</option>
   <option value="500 g">500 g</option>
   <option value="1 Kg">1 Kg</option>
   <option value="5 Kg">5 Kg</option>
</select><br><br>
<input type="submit" value="Atualizar Produto">
</form>
<?php
}
?>
</BODY>
</HTML>
