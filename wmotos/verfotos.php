<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Westphalen Motos - Concessionária Honda</TITLE><LINK href="home_arquivos/asw.css" 
type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.6000.16386" name=GENERATOR>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {
	font-size: 18px
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
<?php include("menu.php"); ?></DIV>
<P class=destaque><SCRIPT src="carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("cima.swf","740","420"); 
    </SCRIPT></P>
<table width="100%" border="0" bgcolor="#000000">
   <tr>
     <td><?php include("busca.php"); ?></td>
   </tr>
</table><img src="barra.jpg">
<table width="100%" border="0" bgcolor="#FFFFFF">
    <tr>
      <td><?php

include "conexao.php";

$Id = $_GET['Id'];

$sql = mysql_query("SELECT * FROM produtos WHERE Id='$Id' ORDER BY Id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe fotos cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?></td>
    </tr>
    <tr>
      <td><div align="center" class="style1"><?php echo $n["modelo"]; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="98%" border="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto1"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto1"]; ?>"></a></div></td>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto2"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto2"]; ?>"></a></div></td>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto3"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto3"]; ?>"></a></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto4"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto4"]; ?>"></a></div></td>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto5"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto5"]; ?>"></a></div></td>
                <td><div align="center"><a href="fotospm/<?php echo $n["foto6"]; ?>"  rel='lightbox[roadtrip]'><img width="120" height="90" border="0" src="fotospm/<?php echo $n["foto6"]; ?>"></a></div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <?
  }
  }
 ?>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"><a href="javascript:history.go(-1)"><img src="voltar.jpg" border="0"></a></div></td>
    </tr>
    <tr>
      <td width="25%"><div align="left"></div></td>
      </tr>
  </table>
  <img src="barra.jpg"></DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
