
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="principal.php"><img src="imagens/b1.png" width="235" height="30" border="0" /></a></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="5" /></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><a href="http://www.universalfm.com.br/rb/chat/index.php"><img src="imagens/b2.png" width="235" height="30" border="0" /></a></td>
                  </tr>
                </table>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="5" /></td>
                  </tr>
                </table></td>
            </tr>
          </table>
        
          <table width="235" height="30" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
            <tr>
              <td height="24" background="imagens/b3.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%"><img src="imagens/branco.gif" width="20" height="2" /></td>
                  <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>ENQUETE</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td> <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?> <FORM style="DISPLAY: inline" name="enquete" action="atualizaenquete.php" method="post">
 <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto989">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><STRONG><?php echo $y["pergunta"]; ?></STRONG></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
              </tr>
          </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php if ( $y["op1"] == '' ) { } else { ?>
              <?php if ($y["foto1"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="74" height="54" /></td>
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
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op10"]; ?>" /></td>
                  <td width="91%"><?php echo $y["op10"]; ?></td>
                </tr>
              </table><?php } ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><INPUT class="texto" type="submit" value="votar" name="votar"></td>
                </tr>
              </table></td>
              </tr>
          </table>
          </td>
        </tr>
      </table></FORM>
      <table width="100%" border="0">
              <tr>
                <td width="96%" class="manchete_texto989"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>                  &nbsp;<a class="manchete_texto989" 
                        href="atualizaenquete2.php?idenquete=<?php echo $y["id"]; ?>"><b>Resultados da Enquete</b></a></td>
              </tr>
              <tr>
                <td class="manchete_texto989">&nbsp;<a class="manchete_texto989"
                        href="enquetes.php"><b>Visualizar todas as enquetes...</b></a></td>
              </tr>
      </table><br /><?php } ?></td>
            </tr>
          </table>
          <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='lateral' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
          <?php
						  if ($tipo=='imagem') {
						  						  ?>
          <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="235" /></a>
          <?php
						  } else {
						  ?>
          <script src="administrador/scripts/swfobject_modified.js" type="text/javascript"></script>
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
            <param name="movie" value="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&rsquo;t want users to see the prompt. -->
            <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
          <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
          </script>
          <?php } } ?>
