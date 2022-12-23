<?php include ('auth.php') ?>
<html>
<head>
<title>Alterando Sub-Categoria</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if ($alterar == "sim"){
$select_gif = mysql_query("SELECT gif, pertence_categoria FROM categorias WHERE cod_categoria = '$pertence_categoria'");
while($res = mysql_fetch_array($select_gif)){
$gif = $res[0];
$pertence_c_m = $res[1];
}


                $descri_categoria1 = urlencode("$descri_categoria");
                $descri_categoria1 = explode("+",$descri_categoria1);
                $descri_categoria1 = implode("%20",$descri_categoria1);
                $sql = ("UPDATE categorias SET descri_categoria='$descri_categoria', gif='$pertence_c_m$descri_categoria1.jpg' WHERE cod_categoria = '$pertence_categoria'");
                $n_arquivo = "$pertence_c_m$descri_categoria.jpg";
                $upload = "icone";
                $remove_ftp = "icones/$gif";
                include ("../ftp.php");
                $executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
                exit;
        }
        mysql_close($conecta);
        $setor = 1;
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"javascript:history.back(1)\";";
print "window.close();";
print "</script>";
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"><? print $base[nome]; ?></font></b></font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">Administrador</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>">
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>
      <p><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000" size="1">Altera
        a sub-categoria <? print $categoria; ?></font></font> </p>
      <form enctype="multipart/form-data" method="post" action="al_sub_categoria.php?alterar=sim">
        <font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
        <input type="hidden" name="pertence_categoria" value="<? print $cat_pai; ?>">
        <input type="hidden" name="eu_sou" value="<? print $categoria_pai; ?>">
        Nome da Categoria:<br>
        <input type="text" name="descri_categoria" value="<? print $categoria_pai; ?>">
        <br>
        Imagem da Categoria:<br>
        <input type="file" name="icone_form" enctype="multipart/form-data">
        <br>
        <br>
        <input type="submit" name="Submit" value="Alterar Sub-Categoria">
        </font> </font>
      </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="#0066CC">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="400">
  <tr>
    <td width="80%" height="80%" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>