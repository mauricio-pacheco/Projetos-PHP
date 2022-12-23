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
    <td><div align="center">EDITAR MOTO</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM produtos WHERE cidade='frederico' ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe motos cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%"><img border="0" src="fotosmenorpm/<?php echo $n["fotomenor"]; ?>"></td>
        <td width="61%">&nbsp;<?php echo $n["modelo"]; ?></td>
        <td width="34%"><div align="right"><a href="editarmoto2.php?Id=<?php echo $n["Id"]; ?>">EDITAR</a>&nbsp&nbsp</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?
  }
  }
 ?></td>
  </tr>
</table>
<P align="center" class=destaque>&nbsp;</P>
</DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
