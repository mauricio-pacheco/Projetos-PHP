<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><em>TOP 10 MUSICAL</em></b></font></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0">
          <tr></tr>
          <tr>
            <td>
						
			<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_top10 WHERE id = '1' ORDER BY id DESC");

while($y = mysql_fetch_array($sql))
   {
   ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table background="imagens/m1.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="28%" valign="top"><img alt="<?php echo $y["artista1"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto1"]; ?>" width="207" height="125" /></td>
                      <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
                          <object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio1.mp3&amp;autoplay=0" />
</object>
                        </td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                        <tr>
                          <td><strong>Artista:</strong> <?php echo $y["artista1"]; ?></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                          </tr>
                        </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Música:</strong> <?php echo $y["musica1"]; ?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m2.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista2"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto2"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio2.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista2"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica2"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m3.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista3"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto3"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio3.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista3"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica3"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m4.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista4"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto4"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio4.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista4"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica4"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m5.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista5"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto5"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio5.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista5"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica5"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m6.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista6"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto6"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio6.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista6"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica6"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m7.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista7"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto7"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio7.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista7"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica7"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m8.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista8"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto8"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio8.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista8"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica8"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m9.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista9"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto9"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio9.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista9"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica9"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table>
                    <table background="imagens/m10.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="28%" valign="top"><img alt="<?php echo $y["artista10"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto10"]; ?>" width="207" height="125" /></td>
                        <td width="72%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                            <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                            <param name="bgcolor" value="#ffffff" />
                            <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio10.mp3&amp;autoplay=0" />
                          </object></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                          <tr>
                            <td><strong>Artista:</strong> <?php echo $y["artista10"]; ?></td>
                          </tr>
                        </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                            <tr>
                              <td><strong>Música:</strong> <?php echo $y["musica10"]; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <?php }  ?></td>
          </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
