<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
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
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong><?php echo $y["pergunta"]; ?></strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
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
      </table></td>
                  </tr>
                </table><?php
  
  }}
 ?></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>