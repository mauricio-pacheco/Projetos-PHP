<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/> 
<title>:::... 102.9 FM ...:::</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
</head>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="top10.js"></script>
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<div class="fotos-wrap">
<div class="column">
<div style="height: 556px;" class="box box-preta">
<div class="corner corner-tl">
<div class="corner corner-tr">
<div class="item-top">

<?php

include "../administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_top10 WHERE id = '1' ORDER BY id DESC");

while($y = mysql_fetch_array($sql))
   {
   ?>
<div id="top-1" class="top-item top-hidden"> <div class="caption"> <div class="artista"><?php echo $y["artista1"]; ?></div> <div class="musica"><?php echo $y["musica1"]; ?></div> </div> </div> <div id="top-1-over" class="box-image-container top-over top-over-showing"> <img alt="<?php echo $y["artista1"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto1"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista1"]; ?></div> <div class="musica"><?php echo $y["musica1"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-2" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista2"]; ?></div> <div class="musica"><?php echo $y["musica2"]; ?></div> </div> </div> <div id="top-2-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista2"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto2"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista2"]; ?></div> <div class="musica"><?php echo $y["musica2"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-3" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista3"]; ?></div> <div class="musica"><?php echo $y["musica3"]; ?></div> </div> </div> <div id="top-3-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista3"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto3"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista3"]; ?></div> <div class="musica"><?php echo $y["musica3"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-4" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista4"]; ?></div> <div class="musica"><?php echo $y["musica4"]; ?></div> </div> </div> <div id="top-4-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista4"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto4"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista4"]; ?></div> <div class="musica"><?php echo $y["musica4"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-5" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista5"]; ?></div> <div class="musica"><?php echo $y["musica5"]; ?></div> </div> </div> <div id="top-5-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista5"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto5"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista5"]; ?></div> <div class="musica"><?php echo $y["musica5"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-6" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista6"]; ?></div> <div class="musica"><?php echo $y["musica6"]; ?></div> </div> </div> <div id="top-6-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista6"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto6"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista6"]; ?></div> <div class="musica"><?php echo $y["musica6"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-7" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista7"]; ?></div> <div class="musica"><?php echo $y["musica7"]; ?></div> </div> </div> <div id="top-7-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista7"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto7"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista7"]; ?></div> <div class="musica"><?php echo $y["musica7"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-8" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista8"]; ?></div> <div class="musica"><?php echo $y["musica8"]; ?></div> </div> </div> <div id="top-8-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista8"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto8"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista8"]; ?></div> <div class="musica"><?php echo $y["musica8"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-9" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista9"]; ?></div> <div class="musica"><?php echo $y["musica9"]; ?></div> </div> </div> <div id="top-9-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista9"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto9"]; ?>" width="207" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista9"]; ?></div> <div class="musica"><?php echo $y["musica9"]; ?></div> </div> </div> </div> <div class="item-top">

<div id="top-10" class="top-item "> <div class="caption"> <div class="artista"><?php echo $y["artista10"]; ?></div> <div class="musica"><?php echo $y["musica10"]; ?></div> </div> </div> <div id="top-10-over" class="box-image-container top-over "> <img alt="<?php echo $y["artista10"]; ?>" src="../administrador/ups/fotosmusicas/<?php echo $y["foto10"]; ?>" width="207" height="125" height="125" /> <div class="caption"> <div class="artista"><?php echo $y["artista10"]; ?></div> <div class="musica"><?php echo $y["musica10"]; ?></div> </div> <?php } ?>

</html>