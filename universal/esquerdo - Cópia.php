
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
                </table>
                <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_menus ORDER BY departamento ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?>
                <table width="235" height="30" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b3.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%"><img src="imagens/branco.gif" width="20" height="2" /></td>
                      <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b><?php echo strtoupper($y["departamento"]); ?></b></font></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <?php

$sql2 = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='$idnovo'");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                <tr>
                  <td height="24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" class="manchete_texto989">&nbsp;&bull;&nbsp;&nbsp;<a class="manchete_texto989" href="conteudo.php?id=<?php echo $m["id"]; ?>"><?php echo $m["titulo"]; ?></a></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <?php } } } } ?>
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
