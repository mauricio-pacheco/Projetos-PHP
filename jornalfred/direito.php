<img src="imagens/botao3.png" width="200" height="30" /><br />
        
        <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM gestao_bannersl ORDER BY RAND() LIMIT 10");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
        <a href="<?php echo $y["link"]; ?>" target=_blank><img src="administrador/bannersl/<?php echo $y["foto"]; ?>" width="200" height="160" title="<?php echo $y["legenda"]; ?>" alt="<?php echo $y["legenda"]; ?>" border="0"  /></a>
        <table width="100%" border="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
          </tr>
        </table>
<?php
  }
  }
 ?>
        <br />