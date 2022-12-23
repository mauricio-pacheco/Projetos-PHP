<?php include ("cabecalho.php"); ?>
<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>
<br /><br /><p align="center"><img src="contribuinte.jpg" width="400" height="30" /></p>
<?
include "conectar.php";

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$dependente = $_POST["dependente"];
$aliquota = $_POST["aliquota"];


$sql = "INSERT INTO cadastro (nome, cpf, dependente, aliquota) VALUES ('$nome', '$cpf', '$dependente', '$aliquota')";
if(mysql_query($sql)) {
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu cadastro foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o seu cadastro!</font></div>";
}
 
?><br /><br />
<table width="400" border="0" align="center">
  <tr> 
    <td><div align="center"><a href="index.php"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CADASTRAR MAIS UM CONTRIBUINTE</font></a></div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
