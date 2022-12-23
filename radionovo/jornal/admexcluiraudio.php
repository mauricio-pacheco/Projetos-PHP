<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=deletaraudios.php"> 
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Audios Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<div align="center">
  <p class="style1"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target=_top>VOLTAR A ADMINISTRAÇÃO</a></p>
  <p class="style1">JORNAL LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="index.php">ENVIAR PDF</a> ------ <a href="deletaraudios.php">APAGAR PDF</a></span></p>
</div>
  <tr>
    <td><p align="left">

      </p> 
      <div align="center"><tr><td width="5%">&nbsp;</td>
        </tr>
          
      </div>
    </td>
  </tr>
</table>
<?
include "conexao.php";

$id = $_GET['id'];
$arquivo = $_GET['recua'];


unlink("../jornalenv/".$arquivo);
$query = mysql_query("DELETE FROM jornal WHERE id='$id'");
if ($query)  
{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">PDF APAGADO COM SUCESSO!</font></div>";
}else{
echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">NÃO FOI POSSÍVEL APAGAR O PDF.</font></div>";
}
?><div align="center">
  <p>&nbsp;</p>
</div>
</body>
</html>
