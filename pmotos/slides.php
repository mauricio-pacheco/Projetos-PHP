<table width="996" bgcolor="#000000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#000000"><table align="center" width="996" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="container">
<div id="content">
<div id="slider">
<ul>                
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' ORDER BY rand()");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<li><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></li>
                
                <?php }  ?>
</ul>
</div></td>
  </tr>
</table>
</td>
      </tr>
    </table>