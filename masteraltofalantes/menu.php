<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depprod ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?> 
<table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#B30000" class="fontemenu">&nbsp;<?php echo $y["nome"]; ?></td>
                </tr>
              </table>
              <?php

$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$idnovo'");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
                <table width="100%" height="28" background="imagens/menubg.png" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="fontelink">&nbsp;&nbsp;<a href="produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>" class="fontelink"><?php echo $m["nomesub"]; ?></a></td>
                  </tr>
                </table>
                <?php } } } } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                  </tr>
                </table>