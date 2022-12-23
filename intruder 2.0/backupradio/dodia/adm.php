<?php

include "conecta.php";

echo "<body bgcolor='#E7F8F1'><div align=center><img src='amfundo.gif' border='0'></div><br>"; 


$sql = mysql_query("SELECT * FROM upload ORDER BY codigo DESC");
$contar = mysql_num_rows($sql); 
if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href='index.php'><b>POSTAR NOVA MENSAGEM</b></a></font><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe mensagens cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
   <title></title>
<body bgcolor="#E7F8F1" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href='index.php'><b>POSTAR NOVA MENSAGEM</b></a></font><br></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
<font size="1">T&iacute;tulo: <font color="#0000FF"><?php echo $n["titulo"]; ?></font></font></font></p>
<p><font size="1"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
    <a href="deleta_user.php?codigo=<?php echo $n["codigo"];?>&nome=<?php echo $n["titulo"]; ?>" onClick="return confirm('Deseja deletar mesmo a mensagem <?php echo $n["razao"]; ?>?');"><font face="Verdana, Arial, Helvetica, sans-serif">Deletar 
Mensagem</font></a></font></p>
<hr>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?
  }
  }
 ?>
</font>
<p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <? $sql = mysql_query("Select * from upload");
$sql = mysql_num_rows($sql); ?>
  <? if ($sql > 0) {?>
  
  <? if ($sql < 2) echo ""; else echo ""; ?>
  <? if ($sql < 2) echo ""; else echo ""; ?>
  
  <? } ?>
  </font></p>
