<?php include("meta.php"); ?>
<script language="javascript">
function toggle(obj) {
var el = document.getElementById(obj);
if ( el.style.display != 'none' ) {
el.style.display = 'none';
}
else {
el.style.display = '';
}
}
 </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><SCRIPT src="classes/carrega2.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/menu.swf','980','40'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="235" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="494" valign="top" bgcolor="#FFFFFF">
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>TOP 10</b></font></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
        <?php

include "../administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_top10 WHERE id = '1' ORDER BY id DESC");

while($y = mysql_fetch_array($sql))
   {
   ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table background="imagens/n1.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="42%" valign="top"><img alt="<?php echo $y["artista1"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto1"]; ?>" width="207" height="125" /></td>
                <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n2.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista2"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto2"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n3.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista3"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto3"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n4.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista4"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto4"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n5.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista5"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto5"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n6.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista6"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto6"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n7.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista7"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto7"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n8.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista8"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto8"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n9.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista9"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto9"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
              <table background="imagens/n10.jpg" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="42%" valign="top"><img alt="<?php echo $y["artista10"]; ?>" src="administrador/ups/fotosmusicas/<?php echo $y["foto10"]; ?>" width="207" height="125" /></td>
                  <td width="58%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
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
        <?php } ?>
        </td>
        <td width="235" valign="top"><?php include("direito.php"); ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" background="imagens/baixo.png" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="imagens/branco.gif" width="2" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
