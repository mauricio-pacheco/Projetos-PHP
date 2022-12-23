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
      <table width="70%" border="0" align="center">
        <tr>
          <td><div align="center">
            <?
include "conexao.php";

$id = $_GET['id'];
$link = $_GET['link'];
$foto = $_GET['foto'];


$query = mysql_query("DELETE FROM patrocinio WHERE id='$id'");
unlink("logos/$foto");
if ($query)  
{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Patrocinador deletado com sucesso!</font></div>";
}else{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o foi poss&iacute;vel deletar o patrocinador.</font></div>";
}
?>
          </div></td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>