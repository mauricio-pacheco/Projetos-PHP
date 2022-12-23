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
                              <p><span class="style19">Cadastrar Fotos na Galeria <?php 
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
      <td align="center"> <?php
include "conexao.php";

$idanexo = $_GET["idanexo"];
$id = $_GET['id'];
$fotomenor = $_GET['fotomenor'];
$foto = $_GET['foto'];

$sql = "DELETE FROM fotos WHERE id='$idanexo'";
unlink("fotosnot/p/$fotomenor");
unlink("fotosnot/g/$foto");
if(mysql_query($sql)) {
echo "<div align=center class=manchete_texto><br>A IMAGEM FOI APAGADA COM SUCESSO!</div>";
echo "<script>alert('A IMAGEM FOI APAGADA COM SUCESSO!')</script>";
echo "<script>location.href='admedifoto.php?id=$id&amp;nomegaleria=$nomegaleria'</script>";
}else{
echo "<div align=center><br>NÃO FOI POSSÍVEL APAGAR A IMAGEM!</div>";
}
 
?></td>
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
