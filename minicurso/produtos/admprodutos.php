<HTML>
<HEAD>
 <TITLE>Administrar Produtos</TITLE>
</HEAD>
<BODY>
<?php
include("conexao.php");
?>

<h1>Lista de Produtos</h1>

<?php

$sql = "SELECT id, nome, quantidade, marca, peso FROM produtos";
$sql = mysql_query($sql);
$total_de_produtos = mysql_num_rows($sql);
echo "Total de produtos cadastrados no sistema: $total_de_produtos <BR><BR>";

// WHILE enquanto o comando for verdadeiro, ou seja, enquanto existir registros a serem exibidos.

while ($linha = mysql_fetch_array($sql)) {

$id  = $linha["id"];
$nome  = $linha["nome"];
$quantidade  = $linha["quantidade"];
$marca  = $linha["marca"];
$peso  = $linha["peso"];

?>
Nome do Produto: <?php echo "$nome"; ?><br>
Quantidade: <?php echo "$quantidade"; ?><br>
Marca: <?php echo "$marca"; ?><br>
Peso: <?php echo "$peso"; ?><br>
<a href="ediproduto.php?id=<?php echo "$id"; ?>">EDITAR</a> --- <a href="delproduto.php?id=<?php echo "$id"; ?>">APAGAR</a><br>
<br>


<?php
}
?>
</BODY>
</HTML>
