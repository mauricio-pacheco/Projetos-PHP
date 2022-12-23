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

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id' ORDER BY id");

while($y = mysql_fetch_array($sql))
   {
   ?>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong><?php echo $y["titulo"]; ?></strong></td>
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
                    <td><table width="100%" border="0" align="center">
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
      </table><?php } ?></td>
                  </tr>
                </table></td>
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