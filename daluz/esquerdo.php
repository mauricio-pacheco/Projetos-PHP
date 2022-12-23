<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="8%" align="center"><a class="manchete_texto9" href="sessao.php?iddep=<?php echo $y["id"]; ?>"><img src="imagens/casa.png" border="0" /></a></td>
                      <td width="92%" class="manchete_texto9">&nbsp;&nbsp;<a target="_blank" class="manchete_texto9" href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso"><b>Faça sua Simulação</b></a></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><a target="_blank" class="manchete_texto9" href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso"><img src="imagens/logocaixa.png"  border="0" /></a></td>
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
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#F9F9F9">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="8%" align="center"><a class="manchete_texto9" href="sessao.php?iddep=<?php echo $y["id"]; ?>"><img src="imagens/casa.png" border="0" /></a></td>
                      <td width="92%" class="manchete_texto9">&nbsp;&nbsp;<a class="manchete_texto9" href="sessao.php?iddep=<?php echo $y["id"]; ?>"><b><?php echo $y["nome"]; ?></b></a></td>
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
                      <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='imovel.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>';" onmouseover="this.style.backgroundColor='#E9E9E9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="100%" class="fontetabela">&nbsp;-&nbsp;<?php echo $m["nomesub"]; ?></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <?php } } } } ?>