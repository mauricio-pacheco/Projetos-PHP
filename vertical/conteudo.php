<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
<?php include("banner.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26%" valign="top"><?php include("menu.php"); ?></td>
        <td width="74%" valign="top">
               <table width="636" height="30" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><table width="99%" border="0" align="center">
              <tr>
                <td width="73%"><span class="fontetabela"><span class="manchete_texto">
                  <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe p&aacute;gina cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                </span><b><?php echo $y["titulo"]; ?></b></span></td>
                <td width="27%" align="right"><span class="fontetabela"> <?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</span></td>
              </tr>
            </table></td>
          </tr></table>
            <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table>
          <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr>
              <td bgcolor="#f9f9f9"><table width="100%" border="0" align="center">
                <tr>
                    <td align="center">
                      <span class="fontetabela">
                     <img src="imagens/branco.gif" width="2" height="4" /></span></td>
                  </tr>
                </table>
                <table width="99%" border="0" align="center">
                  <tr>
                    <td><span class="fontetabela"><?php echo $y["legenda"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                  <tr>
                    <td><span class="fontetabela"><?php echo $y["texto"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                  <tr>
                    <td><span class="fontetabela"><?php echo $y["rodape"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                              <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">&nbsp;&nbsp;<a href="javascript:history.go(-1)"><img src="imagens/voltar.png" border="0" /></a></td>
                  </tr>
                </table>
                <span class="fontetabela" style="Z-INDEX: 666">
                <?php
  
  }}
 ?>
                </span></td>
            </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
</table><br />
<?php include("baixo.php"); ?>
</body>
</html>