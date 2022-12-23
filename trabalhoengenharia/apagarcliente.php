<?php include ("cabecalho.php"); ?>
<meta HTTP-EQUIV="refresh" CONTENT="1;URL=listao.php">
<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>
<br /><br /> <div align="center"><?
include "conectar.php";

$id = $_GET['id'];


$query = mysql_query("DELETE FROM fornecedores WHERE id='$id'");
if ($query)  
{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Fornecedor deletado com sucesso!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possível deletar o fornecedor.</font></div>";
}
?></div>



</body>
</html>