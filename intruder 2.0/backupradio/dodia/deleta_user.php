<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a href="adm.php"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">VOLTAR 
    PARA A ADMINISTRA&Ccedil;&Atilde;O</font></a></p>
</div>
<?php
//Dud's Cadastro 1.0
//Criado por _Dudu_1533
//ecosta19@yahoo.com.br
//n�o tire os cr�ditos, pois eles nem ir�o aparecer em sua p�gina.
//Obrigado.
?>
<?
include "conecta.php";

$id = $_GET['codigo'];
$titulo = $_GET['titulo'];


$query = mysql_query("DELETE FROM upload WHERE codigo='$id'");
if ($query)  
{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Download <strong>$titulo</strong> deletado com sucesso!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">N�o foi poss�vel deletar o download.</font></div>";
}
?>