<LINK 
href="style.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
body,td,th {
	color: #E7F8F1;
}
.style1 {font-family: Verdana}
-->
</style>
<?php

include "conecta.php";

$sql = mysql_query("SELECT * FROM upload ORDER BY codigo DESC");
$contar = mysql_num_rows($sql); 
if ($contar < 1)  //Mostra se h� algum registro na tabela, caso n�o houver, ele mostrar� a mensagem abaixo
   {echo "<div bgcolor=' #E7F8F1' align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N�o existe downloads cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar� os registros. OBS: Voc� pode mudar o modo de exibir os registros
     //mais n�o mude nenhuma vari�vel, a n�o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
   <title></title>
<body bgcolor="#E7F8F1">
  <div align="left"><font size="1"><font color="#0000FF"><img src="dodia.gif" border="0">&nbsp;&nbsp;<a href="arquivos/<?php echo $n["arquivo"]; ?>" target=_blank><span class="style1"><?php echo $n["titulo"]; ?></span><span class="style1"> - </span><span class="style1"><font color="#0075EA">Data do Envio: <?php echo $n["data"]; ?></font></span><font color="#0075EA"></font><font color="#0075EA"></a><br>
    </font><br>
    <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
    <?
  }
  }
 ?>
    </font>
    </p>
  </div>
  <p> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
  
 </font><? $sql = mysql_query("Select * from upload");
$sql = mysql_num_rows($sql); ?>
  <? if ($sql > 0) {?><? if ($sql < 2) echo ""; else echo ""; ?>
  <? if ($sql < 2) echo ""; else echo ""; ?>
  <? } ?>
