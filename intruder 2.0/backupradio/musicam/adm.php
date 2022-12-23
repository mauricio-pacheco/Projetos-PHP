<?php

include "conecta.php";

$sql = mysql_query("SELECT * FROM musicaam ORDER BY codigo");
$contar = mysql_num_rows($sql); 
if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>NÃO EXISTE NENHUM PEDIDO CADASTRADO!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
   <title></title>
<body bgcolor="#D2FFD2" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<div align="center"><a href="adm.php"><font face="Verdana, Arial, Helvetica, sans-serif">ATUALIZAR PEDIDOS </font></a><br>
</div>
<br><HR>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">Hor&aacute;rio do Pedido:</font> 
  <font color="#FF0000"><?php echo $n["data"]; ?></font> - <font color="#FF0000"><?php echo $n["hora"]; ?></font><br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome: 
    <font color="#FF0000"><?php echo $n["nome"]; ?></font><br>
  M&uacute;sica    : <font color="#FF0000"><?php echo $n["musica"]; ?></font><br>
Mensagem    :<br>
<br> 
<font color="#FF0000"><?php echo $n["mensagem"]; ?></font></font><br>
<a href="deleta_user.php?codigo=<?php echo $n["codigo"];?>&nome=<?php echo $n["razao"]; ?>" onClick="return confirm('Deseja deletar mesmo o pedido <?php echo $n["nome"]; ?>?');"><br><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="deletar.jpg" width="32" height="32" border="0">APAGAR PEDIDO</font></a> 
<hr>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?
  }
  }
 ?>
</font>
<p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <? $sql = mysql_query("Select * from musicaam");
$sql = mysql_num_rows($sql); ?>
  <? if ($sql > 0) {?><? if ($sql < 2) echo ""; else echo ""; ?>
  <? if ($sql < 2) echo ""; else echo ""; ?>
  
  <? } ?>
  </font></p>
