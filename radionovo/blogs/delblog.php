<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Blogs Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<p align="center"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
<div align="center">
  <p class="style1">BLOGS LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="index.php">ENVIAR BLOG</a> ------ <a href="deletarblogs.php">APAGAR BLOG</a></span></p>
</div>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
include "conexao.php";

$id = $_GET['id'];
$foto = $_GET['foto'];

$sql = "DELETE FROM cw_blogs WHERE id='$id'";
unlink("imagensblog/$foto");;

if(mysql_query($sql)) {
echo "<div align=center class=fontetabela><br>O BLOG FOI APAGADO COM SUCESSO!!</div>";
echo "<script>alert('BLOG APAGADO COM SUCESSO!')</script>";
echo "<script>location.href='deletarblogs.php'</script>";
}else{
echo "<div align=center><br><font color='#000000' >NÃO FOI POSSÍVEL APAGAR!</font></div>";
}


?></td>
  </tr>
</table>
</body>
</html>
