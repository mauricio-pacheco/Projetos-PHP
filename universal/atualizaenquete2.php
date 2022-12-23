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
        <?php

include "administrador/conexao.php";

$id = $_GET['idenquete'];




/*$sql3 = mysql_query("SELECT * FROM cw_votos WHERE idenquete='$idnovato'");
while($z = mysql_fetch_array($sql3))
  {
	$ipnovo = $z["ip"];
	$datanova = $z["data"];
	if  ( $ip == $ipnovo ) { 
	echo "<div align=left class=fontetabela><br>&nbsp;&nbsp;VOCÊ JÁ VOTOU HOJE!!!</div>";
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
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><?php echo $y["pergunta"]; ?></b></font></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" class="manchete_textocasa">
          <tr></tr>
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="37%" class="fontetabela"><table width="100%" border="0">
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
                      <td class="fontetabela"><?php if ( $y["op1"] == '' ) { } else { ?>
                        <?php if ($y["foto1"] == '') { } else { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop1; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op1"]; ?> --
                              <?php $vop1 = $totalop1 * 100/$totalgeral; echo intval($vop1); ?>
                              % dos votos
                              <table width="<?php echo intval($vop1); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop2; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op2"]; ?> --
                              <?php $vop2 = $totalop2 * 100/$totalgeral; echo intval($vop2); ?>
                              % dos votos
                              <table width="<?php echo intval($vop2); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop3; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op3"]; ?> --
                              <?php $vop3 = $totalop3 * 100/$totalgeral; echo intval($vop3); ?>
                              % dos votos
                              <table width="<?php echo intval($vop3); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop4; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op4"]; ?> --
                              <?php $vop4 = $totalop4 * 100/$totalgeral; echo intval($vop4); ?>
                              % dos votos
                              <table width="<?php echo intval($vop4); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop5; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op5"]; ?> --
                              <?php $vop5 = $totalop5 * 100/$totalgeral; echo intval($vop5); ?>
                              % dos votos
                              <table width="<?php echo intval($vop5); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop6; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op6"]; ?> --
                              <?php $vop6 = $totalop6 * 100/$totalgeral; echo intval($vop6); ?>
                              % dos votos
                              <table width="<?php echo intval($vop6); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop7; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op7"]; ?> --
                              <?php $vop7 = $totalop7 * 100/$totalgeral; echo intval($vop7); ?>
                              % dos votos
                              <table width="<?php echo intval($vop7); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop8; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op8"]; ?> --
                              <?php $vop8 = $totalop8 * 100/$totalgeral; echo intval($vop8); ?>
                              % dos votos
                              <table width="<?php echo intval($vop8); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop9; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op9"]; ?> --
                              <?php $vop9 = $totalop9 * 100/$totalgeral; echo intval($vop9); ?>
                              % dos votos
                              <table width="<?php echo intval($vop9); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
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
                            <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="74" height="54" /></td>
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
                              <b><i><?php echo $totalop10; ?> votos</i></b></td>
                            <td width="91%">&nbsp;<?php echo $y["op10"]; ?> --
                              <?php $vop10 = $totalop10 * 100/$totalgeral; echo intval($vop10); ?>
                              % dos votos
                              <table width="<?php echo intval($vop10); ?>%" border="0" height="2">
                                <tr>
                                  <td width="89%" bgcolor="#076CA0" align="right"><img src="administrador/imagens/branco.gif" width="2" height="16" /></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <?php } ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
              <span class="fontetabela" style="Z-INDEX: 666">
              <?php
  
  }}
 ?>
              </span></td>
          </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
          </table>
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
