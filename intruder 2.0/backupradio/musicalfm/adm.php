<?php

include "conecta.php";

$sql = mysql_query("SELECT * FROM musicalfm ORDER BY codigo");
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
<body bgcolor="#E7F8F1" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<div align="center"><img src="fundofm.gif" width="230" height="130"></div>
<p>1&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica1"]; ?></font><br>
  <br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica2"]; ?></font><br>
  <br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">3&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica3"]; ?></font><br>
  <br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">4&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica4"]; ?></font><br>
  <br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">5&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica5"]; ?></font><br>
  <br>
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">6&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica6"]; ?></font><br>
    <br>
    7&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica7"]; ?></font><br>
    <br>
    8&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica8"]; ?></font><br>
    <br>
    9&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica9"]; ?></font><br>
    <br>
    10&ordm; Lugar    : <font color="#0080FF"><?php echo $n["musica10"]; ?></font><br>
        
    <?
  }
  }
 ?>
  </font>
</p>
<p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <? $sql = mysql_query("Select * from musicalfm");
$sql = mysql_num_rows($sql); ?>
  <? if ($sql > 0) {?><? if ($sql < 2) echo ""; else echo ""; ?>
  <? if ($sql < 2) echo ""; else echo ""; ?>
  
  <? } ?>
  </font></p>
