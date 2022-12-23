<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {font-size: 12px}
.style4 {color: #006600}
-->
</style>
</head>

<body>
<table cellspacing="10" cellpadding="0" width="100%" 
                        border="0"><tbody><tr>
  <td class="tahoma10cinza666666"><p class="spip" align="center"><br />
  </p>
    <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM galeria");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
    <br />
    <a href="perfil.php?id=<?php echo $n["id"]; ?>"><img src="arquivos/<?php echo $n["foto1"]; ?>" alt="<?php echo $n["foto1"]; ?>" width="67" height="50" border="1" /></a> &nbsp;<a href="perfil.php?id=<?php echo $n["id"]; ?>"><span class="style3"><?php echo $n["nome"]; ?></span></a><?
									 if ($contar < 1)  //Mostra se h&aacute; algum registro na tabela, caso n&atilde;o houver, ele mostrar&aacute; a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&aacute; os registros. OBS: Voc&ecirc; pode mudar o modo de exibir os registros
     //mais n&atilde;o mude nenhuma vari&aacute;vel, a n&atilde;o ser que mude o script todo.
   { }}?></td>
</tr>
</tbody>
</table>
</body>
</html>
