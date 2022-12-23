<meta http-equiv="refresh" content="20;URL='p1.php'">
<style>
BODY
{
margin:0;
}
</style>

<img src="imagens/logoplay.jpg" width="358" height="222"  alt=""/><br>
<embed src="http://70.36.96.19/player-aacplus.swf" width="358" height="20" allowscriptaccess="always" allowfullscreen="true" flashvars="<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local = 'b6' ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>&autostart=true
<?php } ?>" type="application/x-shockwave-flash" /></embed>