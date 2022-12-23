<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="12%"><SCRIPT type="text/javascript" src="classes/jquery.js"></SCRIPT>
<LINK rel="stylesheet" type="text/css" href="classes/style.css">
<SCRIPT type="text/javascript" src="classes/s3Slider.js"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function(){
	$("#banner").s3Slider({
		timeOut: 4000 // Tempo de transição de cada banner. 
	});
});
</SCRIPT>
<table width="100%" border="0" height="240" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#FFFFFF"><DIV id="container">
<DIV id="banner">
<UL id="bannerContent">
  <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias WHERE iddep='0' ORDER BY rand()");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   { ?>
  <LI class="bannerImage"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>"><IMG 
  src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" border="0"></a><SPAN 
  class="left"><STRONG><?php echo $y["titulo"]; ?></STRONG><BR><?php echo $y["legenda"]; ?><br /><?php echo $y["data"]; ?> <?php echo $y["hora"]; ?></SPAN></LI>
  <?php } } ?>
 </UL></DIV></DIV>
</td>
  </tr>
</table></td>
    <td width="88%" valign="top"><table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" bgcolor="#E71E26" align="center"><strong><em><font color="#FFFFFF">&Uacute;LTIMAS NOT&Iacute;CIAS</font></em></strong></td>
      </tr>
    </table><table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="32" /></td>
  </tr>
</table>
    
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias ORDER BY id DESC LIMIT 7");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
   <table width="99%" border="0">
  <tr>
   <td><span class="fontebaixo3"><?php echo $y["data"]; ?></span> <a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="fontebaixo"><b><font color="#333333"><?php echo $y["titulo"]; ?></font></b></a></td>
  </tr>
</table>   
    <?php
  }
  }
 ?>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>
