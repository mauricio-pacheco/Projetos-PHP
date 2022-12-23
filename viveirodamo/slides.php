<table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#EBEBEB"><table align="center" width="996" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="container">
<div id="content">
<div id="slider">
<ul>                
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<li><a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></a></li>
                
                <?php }  ?>
</ul>
</div></td>
  </tr>
</table>
</td>
      </tr>
    </table>