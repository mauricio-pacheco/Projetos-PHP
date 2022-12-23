<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" align="center">
            <script language="JavaScript">
function abrir(URL) {

  var width = 655;
  var height = 238;

  var left = 0;
  var top = 0;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
</script>
            
            <a href="javascript:abrir('playervivo.php');"><img src="imagens/b1.png" border="0" /></a></td>
            <td width="13%" align="center"><div class="menu" align="center"><li><a href="#"><img src="imagens/b2.png" border="0"/></a><ul>
           <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='10' ORDER BY titulo ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
           
           <li><a href="verconteudo.php?id=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $y["titulo"]; ?></a></li>  
       <?php } ?>
          </ul>
        </li></div></td>
            <td width="12%" align="center"><div class="menu" align="center"><li><a href="#"><img src="imagens/b3.png" border="0"/></a><ul>
           <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='NOTÍCIAS' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
           
           <li><a href="vernots.php?iddep=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $y["departamento"]; ?></a></li>  
       <?php } ?>
          </ul>
        </li></div></td>
            <td width="13%" align="center"><div class="menu" align="center"><li><a href="#"><img src="imagens/b4.png" border="0"/></a><ul>
           <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='VARIEDADES' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
           
           <li><a href="vernots.php?iddep=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $y["departamento"]; ?></a></li>  
       <?php } ?>
          </ul>
        </li></div></td>
            <td width="12%" align="center"><div class="menu" align="center"><li><a href="#"><img src="imagens/b5.png" border="0"/></a><ul>
           <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot WHERE sessao='ESPORTES' ORDER BY departamento ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
           
           <li><a href="vernots.php?iddep=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $y["departamento"]; ?></a></li>  
       <?php } ?>
          </ul>
        </li></div></td>
            <td width="8%" align="center"><a href="top9.php"><img src="imagens/b6.png" border="0" /></a></td>
            <td width="17%" align="center"><div class="menu" align="center"><li><a href="#"><img src="imagens/b7.png" border="0"/></a><ul>
           <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='9' ORDER BY titulo ASC");

while($y = mysql_fetch_array($sql))
   {
	
	
?>
           
           <li><a href="verconteudo.php?id=<?php echo $y["id"]; ?>">&nbsp; &bull; &nbsp;<?php echo $y["titulo"]; ?></a></li>  
       <?php } ?>
          </ul>
        </li></div></td>
          </tr>
        </table>