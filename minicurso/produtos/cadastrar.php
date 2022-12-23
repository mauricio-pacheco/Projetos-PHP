<HTML>
<HEAD>
 <TITLE>Cadastrar Produto</TITLE>
</HEAD>
<BODY>
<?php include("menu.php"); ?>
<?php
$nome = $_POST["nome"];
$quantidade = $_POST["quantidade"];
$marca = $_POST["marca"];
$peso = $_POST["peso"];
echo "O produto cadastrado é:<br><b>Nome do Produto:</b> $nome <br><b>Quantidade:</b> $quantidade <br><b>Marca:</b> $marca <br> <b>Peso:</b> $peso";

//Comandos de inserção no banco de dados
echo "<br><br>";
include("conexao.php");
$sql = "INSERT INTO produtos (nome, quantidade, marca, peso) VALUES ('$nome', '$quantidade', '$marca', '$peso')";
$sql = mysql_query($sql);
if($sql){
echo "<br>Cadastro efetuado no Banco de Dados";
} else {
echo "Ops.. ocorreu algum erro:";
}

?>
</BODY>
</HTML>
