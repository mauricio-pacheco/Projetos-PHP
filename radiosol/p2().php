<meta http-equiv="refresh" content="20;URL='p1.php'">
<embed src="http://96.9.138.101/player-aacplus.swf" width="428" height="250" allowscriptaccess="always" allowfullscreen="true" flashvars="file=
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local = 'b6' ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>&autostart=true
<?php } ?>
" type="application/x-shockwave-flash" /></embed>