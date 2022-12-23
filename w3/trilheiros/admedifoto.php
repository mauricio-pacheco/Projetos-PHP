<?php require("verifica.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br">
<head>
<title>Associa&ccedil;&atilde;o Moto Clube Trilheiros do Barril</title>
<meta name="description" content="Descrição">
<meta name="keywords" content="palavras chave">
<meta name="classification" content="Internet" />
<meta name="language" content="br" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="7 Dias" />
<meta name="robots" content="index, follow" />
<meta name="author" content="dnimports.com.br">
<meta name="robots" content="index, follow, all" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="e.ico" type="image/x-icon" />
<link rel="shortcut icon" href="e.ico" type="image/x-icon" />
<style type="text/css">
@import url("home_arquivos/barroide.css");
</style>
<STYLE type=text/css>
.style5 {
	font-size: 9px
}
.style7 {
	font-size: 14px;
	font-family: Verdana;
	color: #ffffff;
}
.style8 {font-size: 14}
.style9 {color: #FFFFFF}
.style15 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style17 {color: #FFFFFF; font-size: 10px; }
.style19 {color: #FFFFFF; font-size: 14px; }
</STYLE>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<SCRIPT src="home_arquivos/AC_RunActiveContent.js" 
type=text/javascript></SCRIPT>
</HEAD>
<BODY>
<table width="778" height="32" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828" >
  <tbody>
    <tr>
      <td width="756" height="32" background="home_arquivos/trilhabaixo.jpg" bgcolor="#000000" class="style8"><div align="center" class="style7">Setor Administrativo do Site</div></td>
    </tr>
  </tbody>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>


<TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><div align="center">
                       <style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<?php include("menuadm.php"); ?>
                        <table width="98%" border="0">
                          <tr>
                            <td><div align="center">
                              <hr>
                              <p>
                                <?php include("menuadmfotos.php"); ?>
                              </p>
                              <p><span class="style19">Editar Fotos da Galeria <?php 
							  include "conexao.php";
							  $id = $_GET['id'];
							  $nomegaleria = $_GET['nomegaleria'];
							  echo "$nomegaleria";
							  ?>
							  </span></p>
                              <p><span class="style17">* Campos Obrigatórios</span></p>
                              <table width="98%" border="0">
                                <tr>
                                  <td>
  <table width="100%" border="0">
    <tr>
      <td align="center"><table width="100%" border="0" align="center">
        <tr>
          <td class="manchete_texto" align="left"></td>
        </tr>
        <tr>
          <td class="style19" align="left"><?php

$sql = mysql_query("SELECT * FROM fotos WHERE galeria='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe imagens anexadas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
            <table width="100%" border="0">
              <tr>
                <td width="6%"><img src="fotosnot/p/<?php echo $y["fotomenor"]; ?>" /></td>
                <td width="94%"><form action="cadcomenfotos.php" method="post" name="form1" id="form1" onSubmit="return validar(this)">
                  <table width="100%" border="0">
                    <tr>
                      <td><span class="style19">Legenda:</span> <span class="style15">
                        <input name="comentario" type="text" class="texto" size="74" value="<?php echo $y["comentario"]; ?>" />
                        <span style="MARGIN: 0px">
                          <input name="submit" class="texto" type="submit" style="FONT-SIZE: 10px" value="POSTAR LEGENDA" />
                          <input type="hidden" name="idanexo" value="<?php echo $y["id"]; ?>" />
                          <input type="hidden" name="id" value="<?php echo $id; ?>" />
                          <input type="hidden" name="nomegaleria" value="<?php echo $nomegaleria; ?>" />
                        </span></span></td>
                    </tr>
                    <tr>
                      <td><a href="delimagemfotos.php?id=<?php echo $id; ?>&amp;nomegaleria=<?php echo $nomegaleria; ?>&amp;idanexo=<?php echo $y["id"]; ?>&amp;fotomenor=<?php echo $y["fotomenor"]; ?>&amp;foto=<?php echo $y["foto"]; ?>" class="manchete_texto6" onClick="return confirm('Tem certeza que deseja apagar a Imagem ?')"><font color="#FFFF00"><b>APAGAR IMAGEM</b></font></a></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </table>
            <?php
  }
  }
 ?></td>
        </tr>
        <tr>
          <td class="manchete_texto" align="left"></td>
        </tr>
        <tr>
          <td class="rodape" align="left"><span style="MARGIN: 0px">

          </span></td>
        </tr>
      </table></td>
    </tr>
    <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    
                                     
                                  </td>
                                </tr>
                              </table>
                              </div></td>
                          </tr>
                        </table>
                        </div></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<TABLE width=778 height="32" border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828" ><TBODY>
  <TR>
    <TD width=756 height="32" background="home_arquivos/trilhabaixo.jpg" bgColor=#000000><div align="center" class="texto_html style5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; 
      <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
    Moto Clube Trilheiros do Barril - Desenv.: <a href="http://www.w3propaganda.com" target="_blank"><font color=#FCDB00>W3</font></a></div></TD>
</TR></TBODY></TABLE>
</BODY>
</HTML>
