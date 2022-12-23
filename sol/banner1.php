<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body style="margin:0; margin-left:0">
<style type="text/css">
.slideshow { height: 132px; width: 411px; margin: 0 }
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
<div class="slideshow" align="left">
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local = 'b1' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
   ?><a href="<?php echo $y["link"]; ?>" target=_blank><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></a><?php } ?></div>
</body>
</html>