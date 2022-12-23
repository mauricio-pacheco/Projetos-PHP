<?php include("meta.php"); ?>

<body>
<?php include("cima.php"); ?>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>  <link rel="stylesheet" href="banneranimado/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/style.css" type="text/css" media="screen" />
    
    
    <div id="wrapper">
      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">

 <?php

include "administrador/conexao.php";

$sql2="SELECT * FROM cw_publicidades WHERE local='principal'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{
	?>
         <img src="administrador/ups/publicidades/<?php echo $linha2['arquivo']; ?>" alt="<?php echo $linha2['descricao']; ?>" title="<?php echo $linha2['descricao']; ?>" width="600" height="450" border="0" />
 <?php } ?> 
        </div>
        </div>

    </div>
<script type="text/javascript" src="banneranimado/scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="banneranimado/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script></td>
      </tr>
</table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td><img src="imagens/branco.gif" width="1" height="6" /></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="20" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>