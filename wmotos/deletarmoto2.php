<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Westphalen Motos - Concessionária Honda</TITLE><LINK href="home_arquivos/asw.css" 
type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<META content="MSHTML 6.00.6000.16386" name=GENERATOR>
<style type="text/css">
<!--
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
.style24 {color: #FEDC01}
.style16 {color: #333333}
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style>
</HEAD>
<BODY>
<DIV id=asw>
<DIV id=pagina>
<DIV id=topo>
<H1 id=logo>Westphalen Motos</H1>
<UL>
  <LI></LI>
  <LI></LI>
</UL>
</DIV>
<DIV id=menu>
<?php include("menuadm.php"); ?></DIV>
<P align="center" class=destaque>Setor Administrativo Westphalen Motos</P>
<P align="center" class=destaque>&nbsp;</P>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">DELETAR MOTO</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><span class="style19">
      <?
include "conexao.php";

$Id = $_GET['Id'];
$fotomenor = $_GET['fotomenor'];
$foto1 = $_GET['foto1'];
$foto2 = $_GET['foto2'];
$foto3 = $_GET['foto3'];
$foto4 = $_GET['foto4'];
$foto5 = $_GET['foto5'];
$foto6 = $_GET['foto6'];


$query = mysql_query("DELETE FROM produtos WHERE Id='$Id'");
unlink("fotosmenorpm/$fotomenor");
unlink("fotospm/$foto1");
unlink("fotospm/$foto2");
unlink("fotospm/$foto3");
unlink("fotospm/$foto4");
unlink("fotospm/$foto5");
unlink("fotospm/$foto6");

if ($query)  
{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Moto deletada com sucesso!</font></div>";
}else{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possível deletar a moto.</font></div>";
}
?>
    </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:history.go(-1)"><img src="voltar.jpg" border="0"></a></div></td>
  </tr>
</table>
<P align="center" class=destaque>&nbsp;</P>
</DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
