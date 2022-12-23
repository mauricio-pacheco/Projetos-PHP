<?php include ("cabecalho.php"); ?>
<?php include ("creditos.php"); ?>
<meta HTTP-EQUIV="refresh" CONTENT="1;URL=listao.php">
<?php include ("menu.php"); ?>
<style type="text/css">
<!--
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style>

<br /><br /><p align="center"><img src="editar.jpg" width="400" height="30" /></p>
<span class="style19">
<?
include "conectar.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$produto = $_POST["produto"];


$sql = "UPDATE fornecedores SET nome = '$nome', email = '$email', telefone = '$telefone', produto = '$produto' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O fornecedor foi editado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel editar o fornecedor!</font></div>";
}
 
?>
</span><br />
<br />
<table width="400" border="0" align="center">
  <tr> 
    <td>&nbsp;</td>
  </tr>
</table>
<p align="center">&nbsp;</p>
