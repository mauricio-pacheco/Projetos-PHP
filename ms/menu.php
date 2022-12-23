<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depprod ORDER BY nome ASC");
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
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="8%" align="center"><a class="manchete_textomenu2" href="sessao.php?iddep=<?php echo $y["id"]; ?>"><img src="imagens/casa.png" border="0" /></a></td>
                      <td width="92%" class="manchete_textomenu2">&nbsp;<a class="manchete_textomenu2" href="sessao.php?iddep=<?php echo $y["id"]; ?>"><b><?php echo strtoupper($y["nome"]); ?></b></a></td>
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
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                    <tr>
                      <td height="24" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="100%" class="manchete_textomenu2"><a class="manchete_textomenu2" href="produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $m["nomesub"]; ?></a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <?php } } } } ?>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>