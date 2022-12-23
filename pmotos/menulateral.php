<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>


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

<table width="210" border="1" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td><table bgcolor="#333333" background="imagens/ftabela.png" height="38" width="210" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11%" align="center"><img src="imagens/moto.png" /></td>
                <td width="89%" class="fonteadm"><a href="sessoes.php?iddep=<?php echo $y["id"]; ?>" class="fonteadm"><strong><font color="#FFFFFF">&nbsp;<i><?php echo $y["nome"]; ?></i></font></strong></a></td>
              </tr>
            </table></td>
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
?>

   <table width="210" border="1" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
   

<table width="210" cellpadding=0 cellspacing=0 >
                <tr>
        <td height=30 bgcolor="#FCFCFC" onClick="window.location='produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>';" onMouseOver="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FCFCFC'; this.style.color='#252525';">&nbsp;<span class="manchete_texto9"> - &nbsp;<?php echo $m["nomesub"]; ?></span></td>
    </tr></table>
 <?php }   ?>
 </td>
  </tr>
</table>
  <?php }   ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="18" /></td>
  </tr>
</table>

<?php } }  ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="28" /></td>
  </tr>
</table>


         
            
            