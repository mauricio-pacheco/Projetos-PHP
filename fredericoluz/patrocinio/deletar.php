<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../style.css" type=text/css rel=stylesheet>
<title>Patrocinios</title>
<style type="text/css">
<!--
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; }
.style25 {color: #000000}
.style27 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style>
</head>

<body>
<table width="540" height="220" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="letreiro2"><div align="center"><a href="index.php">ENVIAR PATROCINADOR</a> <span class="style25">------</span> <a href="deletar.php">DELETAR PATROCINADOR</a></div></td>
  </tr>
  <tr>
    <td width="67%" valign="top" class="letreiro2">
      <br /><br /><table width="100%" border="0" align="center">
        <tr>
          <td><div align="center">
            <table width="90%" border="0" align="center" class-="class-""letreiro2">
              <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM patrocinio ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&fnof;&Acirc;&iexcl; algum registro na tabela, caso n&Atilde;&fnof;&Acirc;&pound;o houver, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe patrocinadores cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; os registros. OBS: Voc&Atilde;&fnof;&Acirc;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&fnof;&Acirc;&pound;o mude nenhuma vari&Atilde;&fnof;&Acirc;&iexcl;vel, a n&Atilde;&fnof;&Acirc;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
              <tr>
                <td width="3%"><a href="excluirpatro.php?id=<?php echo $n["id"]; ?>&amp;foto=<?php echo $n["foto"]; ?>" onclick="return confirm('Tem certeza que deseja apagar o patrocinador <?php echo $n["link"]; ?> ?')"><img src="apagar.gif" border="0" /></a></td>
                <td width="9%"><a href="excluirpatro.php?id=<?php echo $n["id"]; ?>&amp;foto=<?php echo $n["foto"]; ?>" onclick="return confirm('Tem certeza que deseja apagar o patrocinador <?php echo $n["link"]; ?> ?')">APAGAR</a></td>
                <td width="7%"><img src="logos/<?php echo $n["foto"]; ?>" /></td>
                <td width="81%"><span><?php echo $n["link"]; ?></span></td>
              </tr>
              <?
  }
  }
 ?>
            </table>
          </div></td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>