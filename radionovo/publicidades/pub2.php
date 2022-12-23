<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
<style type="text/css">
.slideshow { height: 250px; width: 172px; margin: auto }
.slideshow img { padding: 0px; border: 1px solid #ccc; background-color: #0C2A4C; }
</style>
<script type="text/javascript" src="classes/jquery.min.js"></script>
<script type="text/javascript" src="classes/jquery.cycle.all.2.74.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' 
	});
});
</script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="10%" align="left" border="0">
  <tr>
    <td>
<div class="slideshow" align="left">
                 <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM publicidades WHERE banner='baixo' ORDER BY rand()");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                 <a href="pubcont.php?id=<?php echo $y["id"]; ?>" target="mainFrame"><img src="administrador/pub/<?php echo $y["foto"]; ?>" title="<?php echo $y["titulo"]; ?>" alt="<?php echo $y["titulo"]; ?>" width="172" height="250" border="0" /></a>
                 <?php
  }
  }
 ?>
                 </div>
                 </td>
  </tr>
</table>
</body>
</html>