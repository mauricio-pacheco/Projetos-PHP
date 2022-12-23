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
	
?>         <table bgcolor="#333333" background="imagens/ftabela.png" height="38" width="225" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11%" align="center"><img src="imagens/moto.png" /></td>
                <td width="89%" class="fonteadm"><a href="sessoes.php?iddep=<?php echo $y["id"]; ?>" class="fonteadm"><strong><font color="#FFFFFF">&nbsp;<i><?php echo $y["nome"]; ?></i></font></strong></a></td>
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
            <table width="225" cellpadding=0 cellspacing=0 >
                <tr>
        <td height=30 bgcolor="#FCFCFC" onClick="window.location='produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>';" onMouseOver="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FCFCFC'; this.style.color='#252525';">&nbsp;<span class="manchete_texto9"> - &nbsp;<?php echo $m["nomesub"]; ?></span></td>
    </tr></table> <?php } } } } ?>