﻿<?php include("meta.php"); ?>
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
<DIV class="ca mpreg3" id=area4><!----></DIV>
<DIV class="ca mpreg1 largetitle blackheading" id=area1><!---->
<DIV class="parent chrome26 single0 customcontainer blue">
<DIV class="heading alignright"><!----></DIV>
<DIV class=content>
<DIV class=tabbedcontent>
<DIV class=mycontent>
 
 
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depnot ORDER BY rand()");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {
	   
	   
   ?>
  <DIV class="child c1 first editorschoice lngroup">
    
    <H3><?php echo $y["departamento"]; ?></H3>
    
    <?php  
$sessado = "$y[id]";
$sql2 = mysql_query("SELECT * FROM cw_noticias WHERE iddep='$sessado' ORDER BY id DESC LIMIT 15");
$contar2 = mysql_num_rows($sql2); 
 while($x = mysql_fetch_array($sql2))
   { 
  ?>
    <UL class="imglinkabslist1 cf">
      <LI class=first>
  <?php if ($x["foto"]=='') { } else { ?>    
      <A 
  title="<?php echo $x["titulo"]; ?>" 
  href="vernoticia.php?id=<?php echo $x["id"]; ?>"><IMG 
  height=75 alt="<?php echo $x["titulo"]; ?>" 
  src="administrador/ups/capasnoticia/<?php echo $x["foto"]; ?>" width="100"></IMG></A>
  <?php } ?>
  <A 
  title="<?php echo $x["titulo"]; ?>" 
  href="vernoticia.php?id=<?php echo $x["id"]; ?>"><b><?php echo $x["titulo"]; ?></b></A>
        <DIV class=timestamp><?php echo $x["data"]; ?> - <?php echo $x["hora"]; ?>  <i>( <?php echo $x["contador"]; ?> Visualizações )</i></DIV>
        <DIV class=richtext align="justify">
          <P align="justify"><A 
  title="<?php echo $x["titulo"]; ?>" 
  href="vernoticia.php?id=<?php echo $x["id"]; ?>"><font color="#333333"><?php echo $x["legenda"]; ?></font></A></P>
        </DIV>
      </LI>
    </UL>
    <?php 
  }
 ?>  
    
  </DIV>
 <?php 
  }
 ?>  
 
</DIV></DIV></DIV></DIV>
</DIV>
 
 
 
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