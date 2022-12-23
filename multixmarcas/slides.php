<table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#EBEBEB"><table align="center" width="996" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><link rel="stylesheet" href="banneranimado/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/style.css" type="text/css" media="screen" />
    
    
    <div id="wrapper">
      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">                
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
                
                <?php }  ?>
 </div>
        </div>

    </div>
<script type="text/javascript" src="banneranimado/scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="banneranimado/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> </td>
  </tr>
</table>
</td>
      </tr>
    </table>