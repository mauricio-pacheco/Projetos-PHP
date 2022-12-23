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
<DIV id=mediapage2>
<DIV class=ca id=subfoot><?php include("fotos.php"); ?></DIV>
<DIV id=mediapage2column1and2>
<DIV class="ca mpreg1 largetitle blackheading" id=area1>
  <DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">
      <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id' ORDER BY id");

while($y = mysql_fetch_array($sql))
   {
   ?>
      <?php echo $y["titulo"]; ?></SPAN></span></DIV>
    <DIV class=content>
      <table width="100%" border="0" align="center">
        <tr>
          <td border="0"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
            <script type="text/javascript" src="js/prototype.js"></script>
            <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
            <script type="text/javascript" src="js/lightbox.js"></script>
            <table width="100%" border="0" align="center">
              <tr>
                <td align="center" class="manchete_texto"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                  <?php } else { ?>
                  <?php if ($y["foto"]=='') { ?><?php } else { ?>
                  <img src="administrador/ups/capasclass/<?php echo $y["foto"]; ?>" width="600" height="450" />
                  <?php } ?>
                  <?php } ?></td>
                </tr>
              <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
            <script type="text/javascript" src="js/prototype.js"></script>
            <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
            <script type="text/javascript" src="js/lightbox.js"></script>
              <tr>
                <td align="center" class="manchete_texto">
                
                <?php if ($y["foto"]=='') { ?><?php } else { ?>
                <a href='administrador/ups/capasclass/<?php echo $y["foto"]; ?>' rel='lightbox['roadtrip']' title='<?php echo $y["titulo"]; ?>'><img border="0" src="administrador/ups/capasclass/<?php echo $y["foto"]; ?>" width="140" height="105" /></a>
                <?php } ?>
                 <?php if ($y["foto2"]=='') { ?><?php } else { ?>
                &nbsp;&nbsp;&nbsp;<a href='administrador/ups/capasclass/<?php echo $y["foto2"]; ?>' rel='lightbox['roadtrip']' title='<?php echo $y["titulo"]; ?>'><img border="0" src="administrador/ups/capasclass/<?php echo $y["foto2"]; ?>" width="140" height="105" /></a><?php } ?>
                
                
               <?php if ($y["foto3"]=='') { ?><?php } else { ?> &nbsp;&nbsp;&nbsp;<a href='administrador/ups/capasclass/<?php echo $y["foto3"]; ?>' rel='lightbox['roadtrip']' title='<?php echo $y["titulo"]; ?>'><img border="0" src="administrador/ups/capasclass/<?php echo $y["foto3"]; ?>" width="140" height="105" /></a>
               <?php } ?>
               </td>
              </tr>
              <tr>
                <td align="center" class="manchete_texto"><b><?php echo $y["titulo"]; ?></b></td>
                </tr>
              <tr>
                <td align="center" class="manchete_texto">Data de Publica&ccedil;&atilde;o: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )</td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left"><div align="left" class="manchete_texto"><?php echo $y["texto"]; ?></div></td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <script language=javascript>
function validar2(form2) { 


if (document.form2.email.value=="") {
alert("O Campo E-mail do Classificado não está preenchido!")
form2.email.focus();
return false
}

if (document.form2.codigo.value=="") {
alert("O Campo Código de Segurança do Classificado não está preenchido!")
form2.codigo.focus();
return false
}

}

                        </SCRIPT>
                                <form action="exclueclass.php" method="post" name="form2" enctype="multipart/form-data" id="form2" onSubmit="return validar2(this)"><tr>
                <td align="left"><strong>PARA EXCLUIR ESTE CLASSIFICADO INSIRA OS DADOS ABAIXO PARA A CONFIRMAÇÃO:</strong></td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;E-mail: <span class="fontetabela">
                 <input class="fontetabela" style="WIDTH: 200px" 
                  name="email" />
               *
               <input type="hidden" name="id" value="<?php echo $y["id"]; ?>">
               <input type="hidden" name="foto" value="<?php echo $y["foto"]; ?>">
               <input type="hidden" name="foto2" value="<?php echo $y["foto2"]; ?>">
               <input type="hidden" name="foto3" value="<?php echo $y["foto3"]; ?>">
                </span></td>
                </tr>
                 <tr>
                <td align="left"><span class="manchete_texto">&nbsp;Código de Segurança: <span class="fontetabela">
                <input class="fontetabela" style="WIDTH: 140px" 
                  name="codigo" />
*</span></span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontetabela">
                  <input name="submit" type="submit" style="FONT-SIZE: 10px" value="EXCLUIR CLASSIFICADO" />
                </span></td>
              </tr></form>
              <tr>
                <td align="left" width="14%"><br />
                  <a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a><br /></td>
                </tr>
            </table></td>
        </tr>
      </table><?php } ?>
    </DIV>
  </DIV>
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
