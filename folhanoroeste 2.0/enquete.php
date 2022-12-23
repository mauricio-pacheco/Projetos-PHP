<DIV class="parent chrome23 single1 customcontainer blue">
  <DIV class="heading alignright" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Classificados</SPAN></DIV>
<DIV class=content>
  <div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="classificados.php"><img border="0" src="imagens/class1.jpg" width="260" height="60" /></a></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="class.php"><img border="0" src="imagens/class2.jpg"  /></a></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depclass");

while($y = mysql_fetch_array($sql))
   { ?>
   <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1%" align="center"><img src="imagens/dot.png" width="10" height="10" /></td>
    <td width="99%" align="left">&nbsp;<a class=link_galeria_todas 
                        href="verclass.php?id=<?php echo $y["id"]; ?>"><b><?php echo $y["departamento"]; ?></b></a> ( <?php

$id2 = $y["id"];

$sql2 = mysql_query("SELECT COUNT(*) AS Total FROM cw_class WHERE iddep='$id2'");
$contar = mysql_num_rows($sql2); 
$total = mysql_result($sql2, 0, 'Total');

?><?php
  echo ''. $total;
 ?> )</td>
  </tr>
</table>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td><img src="imagens/branco.gif" width="2" height="3" /></td>
     </tr>
   </table>

   
   <?php  } ?>
    
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="8" /></td>
  </tr>
</table>
</div>
</DIV>
  </DIV>
<DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading alignright" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Enquete</SPAN></DIV>
    <DIV class=content>
      <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?> <FORM style="DISPLAY: inline" name="enquete" action="atualizaenquete.php" method="post">
 <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                  <td><INPUT class="texto" type="submit" value="VOTAR" name="votar"></td>
                </tr>
              </table></td>
              </tr>
          </table>
          </td>
        </tr>
      </table></FORM>
      <table width="100%" border="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
        </tr>
              <tr>
                <td width="4%"><A class=mais_enquetes 
                        href="verenquete.php?idnquete=<?php echo $y["id"]; ?>"><img src="imagens/enquete.png" border="0" alt="RESULTADOS DA ENQUETE" title="RESULTADOS DA ENQUETE"></A></td>
                <td width="96%">&nbsp;<A class=mais_enquetes 
                        href="verenquete.php?idenquete=<?php echo $y["id"]; ?>"><font color="#333333"><b>RESULTADOS DA ENQUETE</b></font></A></td>
              </tr>
              <tr>
                <td><A class=mais_enquetes 
                        href="reenquete.php"><img src="imagens/interoga.png" border="0" alt="VISUALIZAR TODAS AS ENQUETES" title="VISUALIZAR TODAS AS ENQUETES"></A></td>
                <td>&nbsp;<A class=mais_enquetes 
                        href="reenquete.php"><b>VISUALIZAR TODAS AS ENQUETES</b></A></td>
              </tr>
      </table><br /><?php } ?>
    </DIV>
  </DIV>