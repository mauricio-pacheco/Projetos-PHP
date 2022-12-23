<HTML>
<HEAD>
 <TITLE>Cadastro do Mini Curso</TITLE>
</HEAD>
<BODY>
<?php include("menu.php"); ?>
<?php
echo "Preencha o Formulário abaixo para cadastrar o produto:";
?>
<form method="POST" name="cadastro" action="cadastrar.php">
Nome do Produto: <input type="text" size="20" name="nome"><br>
Quantidade: <input type="text" size="20" name="quantidade"><br>
Marca: <input type="text" size="20" name="marca"><br>
Peso: <select size="1" name="peso">
   <option value="10 g">10 g</option>
   <option value="100 g">100 g</option>
   <option value="500 g">500 g</option>
   <option value="1 Kg">1 Kg</option>
   <option value="5 Kg">5 Kg</option>
</select><br><br>
<input type="submit" value="Cadastrar">
</form>
</BODY>
</HTML>
