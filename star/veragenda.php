<?php include("meta.php"); ?>
<body>
<br /><table width="980" class="boxSombra" bgcolor="#000000" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" height="150" border="0" align="center" cellpadding="0" cellspacing="0" background="imagens/cima.png">
      <tr>
        <td valign="top"><?php include("cima.php"); ?></td>
      </tr>
    </table>
      <table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="10" /></td>
            </tr>
          </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/tagenda.png" width="400" height="40" /></td>
            </tr>
          </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
          </table>
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="manchete_texto">
                          <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_agenda WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe eventos cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                          </span>
                          <table width="100%" border="0">
                            <tr>
                              <td valign="top" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="77%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center"><img src="administrador/ups/agendas/<?php echo $y["foto"]; ?>" border="0" /></td>
                                    </tr>
                                  </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td><span class="manchete_texto"><img src="../imagens/branco.gif" width="2" height="4" /></span></td>
                                      </tr>
                                      <tr>
                                        <td align="left"><span class="fonteadm"><?php echo $y["nomegaleria"]; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td><span class="fonteadm"><img src="../imagens/branco.gif" width="2" height="4" /></span></td>
                                      </tr>
                                      <tr>
                                        <td align="left"><span class="fonteadm"><b>Data do Evento:</b> <?php echo $y["dataevento"]; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td><span class="fonteadm"><img src="../imagens/branco.gif" width="2" height="4" /></span></td>
                                      </tr>
                                      <tr>
                                        <td align="left"><span class="fonteadm"><?php echo $y["comentario"]; ?></span></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          <span class="manchete_texto"> </span><span style="Z-INDEX: 666">
                            <?php
  
  }}
 ?>
                          </span></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
    </table>
<?php include("baixo.php"); ?>
</body>
</html>