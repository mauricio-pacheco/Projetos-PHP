<table width="938" height="381" background="imagens/fcima.jpg" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><table height="105" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="31%"><a href="index.php"><img src="imagens/logo.jpg" border="0" /></a></td>
            <td width="38%" valign="top">&nbsp;</td>
            <td width="31%" valign="top"><table width="100%" border="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="8" /></td>
              </tr>
              <tr>
                <td><span class="menu">Pesquisar Documentos:</span></td>
              </tr>
            </table>
                          <table width="100%" border="0">
                  <form name="formbusca" method="post" action="buscadoc.php"><tr>
                  <td width="45%"><input name="palavra" type="text" class="manchete_texto" id="palavra" size="32" /></td>
                  <td width="55%"><input name="button" type="submit" class="fonte" value="PESQUISAR" /></td>
                </tr></form>
            </table>
                          <table width="100%" border="0">
                            <tr>
                              <td width="10%"><a class="menu" href="http://www.riboli.adv.br/webmail" target="_blank"><img src="imagens/carta.png" border="0" /></a></td>
                              <td width="90%" class="fonte"><a class="fonte" href="http://www.riboli.adv.br/webmail" target="_blank">ACESSAR WEBMAIL</a></td>
                            </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" height="26" background="imagens/barramenu.jpg" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="index.php"><img src="imagens/b1.png" border="0" /></a></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><a href="profissionais.php"><img src="imagens/b2.png" border="0" /></a></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><a href="atuacao.php"><img src="imagens/b3.png" border="0" /></a></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><div class="menu" align="center"><li><a href="documentos.php"><img src="imagens/b4.png" border="0" /></a><ul><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo ORDER BY titulo ASC");

while($y = mysql_fetch_array($sql))
   {
   ?>
            <li><a href="verpagina.php?id=<?php echo $y["id"]; ?>"> - <?php echo $y["titulo"]; ?></a></li>
          <?php } ?> 
           <li><a href="publicacoes.php"> - Publicações</a></li>
          </ul>
        </li></div></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><a href="clientes.php"><img src="imagens/b5.png" border="0" /></a></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><iframe marginwidth="0" marginheight="0" src="http://www.riboli.adv.br/suporte/client2.php" frameborder="0" width="110" scrolling="no" height="26"></iframe></td>
                  <td><img src="imagens/espaco.png" border="0" /></td>
                  <td><a href="contato.php"><img src="imagens/b7.png" border="0" /></a></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="912" height="247" background="imagens/quadro.png" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="6" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="6" /></td>
                    <td><link rel="stylesheet" href="banneranimado/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/style.css" type="text/css" media="screen" />
	 <div id="wrapper">
      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
     <img src='administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>' width="894" height="229" />    <?php }  ?>	</div>
        </div>
 </div>
<script type="text/javascript" src="banneranimado/scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="banneranimado/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>  </td>
                    <td><img src="imagens/branco.gif" width="12" /></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table>