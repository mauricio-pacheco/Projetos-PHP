<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="65" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="61" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("menu.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right">
                 <?php

include "administrador/conexao.php";

$id = $_GET['idenquete'];




/*$sql3 = mysql_query("SELECT * FROM cw_votos WHERE idenquete='$idnovato'");
while($z = mysql_fetch_array($sql3))
  {
	$ipnovo = $z["ip"];
	$datanova = $z["data"];
	if  ( $ip == $ipnovo ) { 
	echo "<div align=left class=manchete_texto96><br>&nbsp;&nbsp;VOCÊ JÁ VOTOU HOJE!!!</div>";
  }
  
  else {
 */     


//}}


$sql = mysql_query("SELECT * FROM cw_enquetes WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                <strong><?php echo $y["pergunta"]; ?></strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0">
                    <tr>
                      <td width="37%" class="manchete_texto96"><table width="100%" border="0">
                        <tr>
                          <td><?php
					
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalgeral = mysql_result($sql, 0, 'Total');

if ($totalgeral == 0) {
	
	$totalgeral = '1';
	$totalgeralp = '0';
	
}
		else {
			
			$totalgeralp = $totalgeral;
			
			}
					
					?>
                            <b><i>Total de votos: </i></b><span class="fontenotgeral"><b><i><?php echo $totalgeralp; ?></i></b></span></td>
                        </tr>
                        <tr>
                          <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                        </tr>
                      </table>
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td class="manchete_texto96"><?php if ( $y["op1"] == '' ) { } else { ?>
                              <?php if ($y["foto1"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op1 = $y["op1"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op1' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop1 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop1; ?> votos</font></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op1"]; ?> --
                                    <?php $vop1 = $totalop1 * 100/$totalgeral; echo intval($vop1); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop1); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op2"] == '' ) { } else { ?>
                              <?php if ($y["foto2"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op2 = $y["op2"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op2' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop2 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop2; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op2"]; ?> --
                                    <?php $vop2 = $totalop2 * 100/$totalgeral; echo intval($vop2); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop2); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op3"] == '' ) { } else { ?>
                              <?php if ($y["foto3"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op3 = $y["op3"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op3' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop3 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop3; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op3"]; ?> --
                                    <?php $vop3 = $totalop3 * 100/$totalgeral; echo intval($vop3); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop3); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op4"] == '' ) { } else { ?>
                              <?php if ($y["foto4"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op4 = $y["op4"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op4' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop4 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop4; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op4"]; ?> --
                                    <?php $vop4 = $totalop4 * 100/$totalgeral; echo intval($vop4); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop4); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op5"] == '' ) { } else { ?>
                              <?php if ($y["foto5"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op5 = $y["op5"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op5' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop5 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop5; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op5"]; ?> --
                                    <?php $vop5 = $totalop5 * 100/$totalgeral; echo intval($vop5); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop5); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op6"] == '' ) { } else { ?>
                              <?php if ($y["foto6"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op6 = $y["op6"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op6' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop6 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop6; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op6"]; ?> --
                                    <?php $vop6 = $totalop6 * 100/$totalgeral; echo intval($vop6); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop6); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op7"] == '' ) { } else { ?>
                              <?php if ($y["foto7"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op7 = $y["op7"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op7' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop7 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop7; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op7"]; ?> --
                                    <?php $vop7 = $totalop7 * 100/$totalgeral; echo intval($vop7); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop7); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op8"] == '' ) { } else { ?>
                              <?php if ($y["foto8"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op8 = $y["op8"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op8' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop8 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop8; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op8"]; ?> --
                                    <?php $vop8 = $totalop8 * 100/$totalgeral; echo intval($vop8); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop8); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op9"] == '' ) { } else { ?>
                              <?php if ($y["foto9"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op9 = $y["op9"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op9' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop9 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop9; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op9"]; ?> --
                                    <?php $vop9 = $totalop9 * 100/$totalgeral; echo intval($vop9); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop9); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <?php if ( $y["op10"] == '' ) { } else { ?>
                              <?php if ($y["foto10"] == '') { } else { ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="160" height="120" /></td>
                                </tr>
                              </table>
                              <?php } ?>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="9%"><?php
					
$op10 = $y["op10"];
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_votos WHERE voto='$op10' and idenquete='$id'");
$contar = mysql_num_rows($sql); 
$totalop10 = mysql_result($sql, 0, 'Total');
					
					?>
                                    <b><i><font color="#C60000"><?php echo $totalop10; ?> votos</font></i></b></td>
                                  <td width="91%">&nbsp;<?php echo $y["op10"]; ?> --
                                    <?php $vop10 = $totalop10 * 100/$totalgeral; echo intval($vop10); ?>
                                    % dos votos
                                    <table width="<?php echo intval($vop10); ?>%" border="0" height="2">
                                      <tr>
                                        <td width="89%" bgcolor="#535353" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <?php } ?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table><?php
  
  }}
 ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
      </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>