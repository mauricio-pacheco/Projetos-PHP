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
 <table background="imagens/fundotabela.png" height="30" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="11%" align="center"><img src="imagens/bolota.png" /></td>
        <td width="89%" class="fonteadm"><strong><?php echo $y["departamento"]; ?></strong></td>
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
    
    <table width="230" cellpadding=0 cellspacing=0 >
                <tr>
        <td height=30 bgcolor="#FCFCFC" onClick="window.location='conteudo.php?id=<?php echo $m["id"]; ?>';" onMouseOver="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FCFCFC'; this.style.color='#252525';">&nbsp;<span class="manchete_texto9"> &bull; &nbsp;<?php echo $m["titulo"]; ?></span></td>
    </tr></table>
     <?php } } } } ?>
     
 
 <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depprod ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?>         <table background="imagens/fundotabela.png" height="30" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11%" align="center"><img src="imagens/bolota.png" /></td>
                <td width="89%" class="fonteadm"><a href="sessoes.php?iddep=<?php echo $y["id"]; ?>" class="fonteadm"><strong><font color="#FFFFFF"><?php echo $y["nome"]; ?></font></strong></a></td>
              </tr>
            </table>
             <?php

$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$idnovo'");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
              <table width="230" cellpadding=0 cellspacing=0 >
                <tr>
        <td height=30 bgcolor="#FCFCFC" onClick="window.location='produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>';" onMouseOver="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FCFCFC'; this.style.color='#252525';">&nbsp;<span class="manchete_texto9"> &bull; &nbsp;<?php echo $m["nomesub"]; ?></span></td>
    </tr></table> <?php } } } } ?>
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
<table height="30" background="imagens/fundotabela.png" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="11%" align="center"><img src="imagens/bolota.png" /></td>
        <td width="89%" class="fonteadm"><strong>Enquete</strong></td>
      </tr>
    </table>
<table width="100%" border="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="3" /></td>
  </tr>
</table>
    <table width="98%" align="center" class="manchete_texto96" border="0">
      <tr>
        <td>
          <form action="atualizaenquete.php" method="post" name="enquete" id="enquete" style="DISPLAY: inline">
            <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><strong><?php echo $y["pergunta"]; ?></strong></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="75" height="100" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="75" height="100" /></td>
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
                            </table>                              <input class="manchete_texto96" type="submit" value="VOTAR" name="votar" /></td>
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
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="4%"><a class="manchete_texto96" 
                        href="verenquete.php?idnquete=<?php echo $y["id"]; ?>"><img src="imagens/resultado.png" border="0" alt="RESULTADOS DA ENQUETE" title="RESULTADOS DA ENQUETE" /></a></td>
              <td width="96%">&nbsp;<a class="manchete_texto96" 
                        href="verenquete.php?idenquete=<?php echo $y["id"]; ?>"><b>RESULTADOS DA ENQUETE</b></a></td>
            </tr>
            <tr>
              <td><a href="reenquete.php" class="manchete_texto96"><img src="imagens/exclama.png" border="0" alt="VISUALIZAR TODAS AS ENQUETES" title="VISUALIZAR TODAS AS ENQUETES" /></a></td>
              <td>&nbsp;<a href="reenquete.php" class="manchete_texto96"><b>TODAS AS ENQUETES</b></a></td>
            </tr>
          </table>
          <br />
        </td>
      </tr>
    </table><?php } ?>
