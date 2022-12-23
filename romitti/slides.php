<link rel="stylesheet" href="banneranimado/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/style.css" type="text/css" media="screen" />
    
    
    <div id="wrapper">
      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
      <?php
						  if ($tipo=='imagem') {
						  						  ?>
      <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="900" height="500" /></a>
      <?php
          } 
						  ?>
      <?php }  ?></div>
        </div>

    </div>
<script type="text/javascript" src="banneranimado/scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="banneranimado/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>