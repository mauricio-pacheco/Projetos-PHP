<table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="20" /></td>
      </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            <td width="20%"><img src="imagens/baixo1.png" /></td>
            <td width="20%"><img src="imagens/baixo2.png" /></td>
            <td width="20%"><img src="imagens/baixo3.png" /></td>
            <td width="20%"><img src="imagens/baixo4.png" /></td>
            <td width="20%"><img src="imagens/baixo5.png" /></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
          <tr>
            <td valign="top">
            <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='10' ORDER BY titulo ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fonte"><a href="verconteudo.php?id=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["titulo"]; ?></a></td>
              </tr>
            </table>
           
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <?php } ?>
            </td>
            <td valign="top"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='NOTÍCIAS' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fonte"><a href="vernots.php?iddep=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["departamento"]; ?></a></td>
              </tr>
            </table>
           
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <?php } ?></td>
            <td valign="top"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='VARIEDADES' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fonte"><a href="vernots.php?iddep=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["departamento"]; ?></a></td>
              </tr>
            </table>
           
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <?php } ?></td>
            <td valign="top"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='ESPORTES' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fonte"><a href="vernots.php?iddep=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["departamento"]; ?></a></td>
              </tr>
            </table>
           
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <?php } ?></td>
            <td valign="top"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='9' ORDER BY titulo ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fonte"><a href="verconteudo.php?id=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["titulo"]; ?></a></td>
              </tr>
            </table>
           
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <?php } ?></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
        </table></td>
      </tr>
    </table>