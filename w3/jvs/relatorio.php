<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatório</title>
<style type="text/css">
<!--
.style9 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>


<table width="80%" border="0">
  <tr>
    <td width="28%"><span class="style9">Nome do Veículo</span></td>
    <td width="28%"><span class="style9">Preço</span></td>
    <td width="22%"><span class="style9">Ano</span></td>
  </tr>
</table>
<?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM cadastro");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?><table width="80%" border="0">
  <tr>
    <td width="33%"><div align="justify"><span class="style9"><?php echo $n["nome"]; ?></span></div></td>
    <td width="35%"><div align="left"><span class="style9">R$ <?php echo $n["preco"]; ?></span></div></td>
    <td width="32%"><div align="left"><span class="style9"><?php echo $n["anofab"]; ?></span></div></td>
  </tr>
</table>
   
     <?
									 if ($contar < 1)  //Mostra se h&aacute; algum registro na tabela, caso n&atilde;o houver, ele mostrar&aacute; a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&aacute; os registros. OBS: Voc&ecirc; pode mudar o modo de exibir os registros
     //mais n&atilde;o mude nenhuma vari&aacute;vel, a n&atilde;o ser que mude o script todo.
   { }}?>

   <form id="form1" name="form1" method="post" action="javaScript:window.print()">
     <label>
     <div align="left">
       <input type="submit" name="Submit" value="IMPRIMIR" />
     </div>
     </label>
   </form>
   <p>&nbsp;   </p>
</body>
</html>
