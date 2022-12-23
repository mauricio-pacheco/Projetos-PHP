<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Luz e Alegria - Publicidades</title>
<style type="text/css">
<!--
.manchete_texto {
	font-family: Verdana, Geneva, sans-serif; font-size:10px
}

-->
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td align="center"><p><img src="complexo.jpg" width="560" height="88" /></p>
    <p><a href="principal.php"><font color="#000000">CADASTRAR BANNER</font></a> ---- <a href="admbanners.php"><font color="#000000">APAGAR BANNERS</font></a></p><br /></td>
  </tr>
</table>
<table width="700" border="0" align="center">
  <tr>
    <td><table width="100%" border="0" align="center">
      <tr>
        <td>
          <?php
include "conexao.php";

$id = $_GET['id'];
$foto = $_GET['foto'];

$sql = "DELETE FROM publicidades WHERE id='$id'";
unlink("pub/$foto");
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#000000' >O BANNER FOI APAGADO COM SUCESSO!!</font></div>";
echo "<script>alert('BANNER APAGADO COM SUCESSO!')</script>";
echo "<script>location.href='admbanners.php'</script>";
}else{
echo "<div align=center><br><font color='#000000' >NÃO FOI POSSÍVEL APAGAR!</font></div>";
}

 
?>
       </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>