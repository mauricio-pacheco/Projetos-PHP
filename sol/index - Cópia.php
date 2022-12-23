<?php include("meta.php"); ?>
<?php include("cima.php"); ?>
<table width="100%" border="0" height="621" style="background-image:url(imagens/fundomeiocapa.png); background-repeat:repeat-x;" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="939" height="621" style="background-repeat:repeat-x; background-image:url(imagens/fundomeio.png)" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><?php include("menu2.php"); ?>
          <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="63%" valign="top">
              <table width="100%" border="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="25" /></td>
  </tr>
</table>
              <table height="341" width="541" background="imagens/fundonot.png" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="8"><img src="imagens/branco.gif" width="8" height="1" /></td>
                        <td width="531"><link rel="stylesheet" href="banneranimado/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="banneranimado/style.css" type="text/css" media="screen" />
    
    
    <div id="wrapper">
      <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">                

<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias WHERE sessao='NOTÍCIAS' ORDER BY id DESC LIMIT 2");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<a href="vernot.php?id=<?php echo $y["id"]; ?>" class="fonte"><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" width="524" height="326" border="0" /></a>
                
                <?php }  ?>


<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias WHERE sessao='ESPORTES' ORDER BY id DESC LIMIT 2");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<a href="vernot.php?id=<?php echo $y["id"]; ?>" class="fonte"><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" width="524" height="326" border="0" /></a>
                
                <?php }  ?>

<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias WHERE sessao='VARIEDADES' ORDER BY id DESC LIMIT 2");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<a href="vernot.php?id=<?php echo $y["id"]; ?>" class="fonte"><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" width="524" height="326" border="0" /></a>
                
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
    </script></td>
                         <td width="8"><img src="imagens/branco.gif" width="8" height="1" /></td>
                       
                      </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                  </tr>
                </table></td>
              <td width="6%" valign="top">&nbsp;</td>
              <td width="31%" valign="top"><table width="100%" border="0" height="28" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <FORM style="MARGIN: 0px" name="form_busca" action="buscanormal.php" 
                  method=post> <tr>
                      <td><input name="textfield" type="text" id="textfield" size="30" /></td>
                      <td><input type="image" src="imagens/buscar.png" name="button" id="button" value="BUSCAR" /></td>
                    </tr></FORM>
                  </table></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/intera.jpg" /></td>
                  </tr>
                </table>
                <table width="271" border="0" height="286" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#CCCCCC" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="fonte"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
                          <table width="98%" align="center" class="fonte" border="0">
                            <tr>
        <td>
          <form action="atualizaenquete.php" method="post" name="enquete" id="enquete" style="DISPLAY: inline">
            <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="fontetitulo"><strong><?php echo $y["pergunta"]; ?></strong></td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="8" /></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><?php if ( $y["op1"] == '' ) { } else { ?>
                        <?php if ($y["foto1"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op1"]; ?>" checked="checked" /></td>
                            <td width="91%"><?php echo $y["op1"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op2"] == '' ) { } else { ?>
                        <?php if ($y["foto2"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op2"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op2"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op3"] == '' ) { } else { ?>
                        <?php if ($y["foto3"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op3"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op3"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op4"] == '' ) { } else { ?>
                        <?php if ($y["foto4"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op4"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op4"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op5"] == '' ) { } else { ?>
                        <?php if ($y["foto5"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op5"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op5"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op6"] == '' ) { } else { ?>
                        <?php if ($y["foto6"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op6"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op6"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op7"] == '' ) { } else { ?>
                        <?php if ($y["foto7"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op7"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op7"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op8"] == '' ) { } else { ?>
                        <?php if ($y["foto8"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op8"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op8"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op9"] == '' ) { } else { ?>
                        <?php if ($y["foto9"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op9"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op9"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <?php if ( $y["op10"] == '' ) { } else { ?>
                        <?php if ($y["foto10"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="100" height="75" /></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op10"]; ?>" /></td>
                            <td width="91%"><?php echo $y["op10"]; ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                              </tr>
                            </table>                              <input class="manchete_texto96" type="image" src="imagens/votar.png" value="VOTAR" name="votar" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </form>
          <table width="100%" border="0">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="96%" class="fonte"><a class="fonte" 
                        href="verenquete.php?idenquete=<?php echo $y["id"]; ?>"><b>RESULTADOS DA ENQUETE</b></a></td>
            </tr>
            <tr>
              <td class="fonte"><img src="imagens/branco.gif" width="1" height="2" /></td>
            </tr>
          </table>
          
        </td>
      </tr>
  </table><?php } ?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="856" height="204" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias ORDER BY id DESC LIMIT 4 OFFSET 3";

$sql_query = mysql_query($sql_select);

$colunas="4"; //quantidade de colunas
$cont="1"; //contador

print"<table width=856>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=50%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$iddep = $array["iddep"];
$departamento = $array["departamento"];
$foto = $array["foto"];
$contador = $array["contador"];
$legenda = $array["legenda"];



?>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
                      <tr>
                        <td width="77%" valign="top"><table width="100%" border="0">
                          <tr>
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
                              
                              <tr>
                                <td width="8%" class="pontilhada2" valign="top"><?php if ($foto == '') { } else { ?>
                                  <img title="<?php echo $titulo.""; ?>" alt="<?php echo $titulo.""; ?>" src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" border="2" style="border-color:#333" width="200" height="120"  />
                                  <?php } ?></td>
                                </tr>
                                <tr>
                                  <td class="pontilhada2" valign="top"><img src="imagens/branco.gif" width="1" height="3" /></td>
                                </tr>
                                <tr>
                                  <td class="fonte" valign="top"><div align="justify"><a href="vernot.php?id=<?php echo $id; ?>" class="fonte"><?php 
								  
								  echo $legenda.""; ?></a></div></td>
                                </tr>
                                <tr>
                                <td class="pontilhada2" valign="top"><img src="imagens/branco.gif" width="1" height="3" /></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
                    <?php


$sql_select_all = "SELECT * FROM cw_noticias ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)



?></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="10" /></td>
      </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="411" valign="top"><iframe marginwidth="0" marginheight="0" src="banner1.php" frameborder="0" width="411" scrolling="no" height="132"></iframe></td>
        <td>&nbsp;</td>
        <td width="411" valign="top"><iframe marginwidth="0" marginheight="0" src="banner2.php" frameborder="0" width="411" scrolling="no" height="132"></iframe></td>
      </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="29"><img src="imagens/canalouvinte.jpg" /></td>
          <td width="21">&nbsp;</td>
          <td><img src="imagens/top91.jpg" /></td>
          <td width="21">&nbsp;</td>
          <td><img src="imagens/climatempo.jpg" /></td>
        </tr>
        <tr>
          <td height="274" valign="top"><table width="100%" height="280" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" bgcolor="#E4E4E4"><div id="nomeDivBlog">
              <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_mural WHERE status='1' ORDER BY id DESC LIMIT 9");

while($y = mysql_fetch_array($sql))
   {
   ?>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="19%"><img src="imagens/mensagem.png" width="52" height="60" /></td>
                  <td width="81%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>&nbsp;<span class="fonte"><strong><?php echo $y["nome"]; ?></strong></span></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
                    </table>
                    
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="fontemenor">&nbsp;<span class="fontemenor"><?php echo $y["data"]; ?> ( <?php echo $y["hora"]; ?> )</span></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
                    </table>
                    <table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="fontemenor"><?php echo $y["comentario"]; ?></td>
                      </tr>
                    </table>
                    
                    
                    
                    </td>
                </tr>
              </table>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
                </table>
                <?php } ?></div>
                </td>
            </tr>
          </table></td>
          <td valign="top">&nbsp;</td>
          <td valign="top" bgcolor="#E4E4E4">
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><div id="nomeDivTop">
                <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_top10 WHERE id = '1' ORDER BY id DESC");

while($y = mysql_fetch_array($sql))
   {
   ?>
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">1</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista1"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica1"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio1.mp3&amp;autoplay=0" />
</object>
                    </td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">2</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista2"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica2"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio2.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">3</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista3"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica3"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio3.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">4</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista4"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica4"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio4.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">5</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista5"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica5"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio5.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">6</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista6"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica6"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio6.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">7</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista7"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica7"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio7.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">8</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista8"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica8"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio8.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
                <table width="99%" border="0" align="center" height="40">
                  <tr>
                    <td width="8%" class="fontemaior">9</td>
                    <td width="96%"><span class="fonte"><b><?php echo $y["artista9"]; ?></b></span>
                    <br /><span class="fonte"><?php echo $y["musica9"]; ?></span><br /><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio9.mp3&amp;autoplay=0" />
</object></td>
                  </tr>
                </table>
                
               
           
                <?php } ?></div></td>
              </tr>
          </table>
           </td>
          <td valign="top">&nbsp;</td>
          <td valign="top" bgcolor="#E4E4E4" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="11" /></td>
            </tr>
          </table>            <iframe src="http://www.tempoagora.com.br/selos_iframe/sky_VistaAlegre-RS.html" height="259" width="150" frameborder="0" allowtransparency="yes" scrolling="no"></iframe></td>
        </tr>
        <tr>
          <td width="271" bgcolor="#656066"><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td width="23"><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td width="271" bgcolor="#656066"><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td width="19"><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td width="272" bgcolor="#656066"><img src="imagens/branco.gif" width="1" height="3" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="411" valign="top"><iframe marginwidth="0" marginheight="0" src="banner3.php" frameborder="0" width="411" scrolling="no" height="132"></iframe></td>
          <td>&nbsp;</td>
          <td width="411" valign="top"><iframe marginwidth="0" marginheight="0" src="banner4.php" frameborder="0" width="411" scrolling="no" height="132"></iframe></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="411"><img src="imagens/participe.jpg" /></td>
          <td width="424">&nbsp;</td>
          <td width="21"><img src="imagens/arquivosaudio.jpg" /></td>
        </tr>
        <tr>
          <td>
          <table width="100%" height="280" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" bgcolor="#E4E4E4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                </tr>
              </table>
                <script language="javascript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}


		return true;

}


                          </script>
                                 <form action="enviamsg.php" method="post" name="cadastro" onsubmit="return validar(this)">
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10%" class="fonte">Nome:</td>
                    <td width="90%"><input name="nome" type="text" size="52" />
                      <span class="fonte">*</span></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10%" class="fonte">E-mail:</td>
                    <td width="90%"><input name="email" type="text" size="54" /></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fonte">Mensagem:</td>
                  </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table>
                
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fonte">
                     <SCRIPT LANGUAGE="JavaScript">
<!-- 
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
// -->
                                   </script>
                       <span class="field"><textarea name="comentario" onclick="this.value=''"  onkeydown="textCounter(this.form.comentario,this.form.remLen,500);" onkeyup="textCounter(this.form.comentario,this.form.remLen,500);"  cols="46" rows="6" tabindex="4"></textarea></span>
                   </td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fonte">Faltam
                      <input name="remLen" type="text" class="manchete_texto" value="500" size="3" maxlength="3" readonly />
caracteres.</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fonte">* O seu depoimento será analizado pelo administrador para depois ser publicado no site.</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><input name="button" type="submit" class="fonte" value="ENVIAR MENSAGEM" /></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
                  </tr>
              </table></form></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
          <td bgcolor="#E4E4E4" valign="top" class="fonte"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td> <MARQUEE behavior="scroll" align="center" direction="up" height="290" scrollamount="1" scrolldelay="10" onmouseover='this.stop()' onmouseout='this.start()'>

		  <?php 
$feed = 'http://g1.globo.com/dynamo/rss2.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag($xml, 'item'); 

$html = '<p>'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '&nbsp;-&nbsp;<a href="' . $link[0] . '" target="_blank" class=fonte>' . $title[0] . "</a><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?> </MARQUEE></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#656066"><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td><img src="imagens/branco.gif" width="1" height="3" /></td>
          <td bgcolor="#656066"><img src="imagens/branco.gif" width="1" height="3" /></td>
        </tr>
      </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="60" /></td>
        </tr>
    </table>
      <?php include("logoabaixo.php"); ?>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="239" background="imagens/fundoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"> <?php include("abaixo.php"); ?></td>
  </tr>
</table>
</body>
</html>