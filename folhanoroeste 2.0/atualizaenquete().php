<?php include("meta.php"); ?>
<BODY class=wide bgcolor="#3C7FAF">
<DIV id=reporting><IMG id=ctag height=1 alt="" src="home_arquivos/c.gif" 
width=1>
<DIV id=omni>
<NOSCRIPT>
<DIV><IMG height=1 alt="" src="home_arquivos/r.gif" 
width=1></DIV></NOSCRIPT></DIV></DIV>
<DIV class="page6 region9" id=wrapper>
<DIV id=page>
<?php include("cabecalho.php"); ?>
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <?php include("busca.php"); ?>
  </DIV>
<DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
<?php include("login.php"); ?>
</DIV>
<DIV id=nav>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
<DIV class="nav3 cf">
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <DIV align=center>
      <?php include("menu.php"); ?>
    </DIV>
  </DIV>
</DIV></DIV></DIV></DIV>
<DIV id=content>
<DIV class=ca id=subhead></DIV>
<DIV id=mediapage2>
<DIV id=infopanerow>
<DIV class="ca mpreg5" id=infotop>
<?php include("notgeral.php"); ?></DIV>
<DIV class="ca mpreg4" id=mainadtop><!---->
<DIV class="parent chrome29  advertisement customcontainer blue">
<DIV class="heading alignright"><!----></DIV>
<DIV class=content>
<DIV class=adcenter>
  <DIV class=advertisement>
  <?php include("edicoes.php"); ?>
    
</DIV></DIV></DIV></DIV></DIV></DIV>
<DIV class=ca id=subfoot><?php include("fotos.php"); ?></DIV>
<DIV id=mediapage2column1and2>
<DIV class="ca mpreg3" id=area4></DIV>
<DIV class="ca mpreg1 largetitle blackheading" id=area1>
  <span class="fontetabela">
  <?php

include "administrador/conexao.php";

$id = $_POST['idenquete'];
$voto = $_POST['voto'];
$ip = $_SERVER['REMOTE_ADDR'];
$data = date ("j/m/Y");



$sql3 = mysql_query("SELECT * FROM cw_votos WHERE idenquete='$id'");
while($z = mysql_fetch_array($sql3))
  {
	$ipnovo = $z["ip"];
	$datanova = $z["data"]; }
	
	
	if  ( $ip == "$ipnovo" and $datanova == "$data" ) { 
	echo "<script>alert('VOCÊ JÁ VOTOU HOJE!')</script>";
	 
  }
  
  else {


$sql2 = "INSERT INTO cw_votos (voto, ip, idenquete, data) VALUES ('$voto', '$ip', '$id', '$data')";
if(mysql_query($sql2)) {
echo "<script>alert('O VOTO FOI CADASTRADO COM SUCESSO!')</script>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}

}   


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
  </span>
  <DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff"><?php echo $y["pergunta"]; ?></SPAN></span></DIV>
    <DIV class=content>
      <table width="100%" border="0">
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
    </DIV>
  </DIV>
  <span class="fontetabela" style="Z-INDEX: 666">
  <?php
  
  }}
 ?>
  </span> </DIV>
 
 
 
<DIV class="ca mpreg4" id=area2><!---->
<?php include("enquete.php"); ?>
<?php include("tempo.php"); ?>
<?php include("lateral.php"); ?>
  
  </DIV>
<DIV class="ca mpreg3" id=area5><!----></DIV></DIV></DIV>
<DIV class=ca id=subfoot>
<?php include("videos.php"); ?>
<?php include("baixo.php"); ?>
<?php include("rodape.php"); ?>
</DIV></DIV></DIV>
<DIV id=foot>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
</DIV></DIV></DIV></DIV>
</BODY></HTML>
