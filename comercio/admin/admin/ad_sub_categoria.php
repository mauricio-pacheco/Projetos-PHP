<?php include ('auth.php') ?>
<html>
<head>
<title>Adicionar Sub-Categoria</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if ($inserir == "sim"){
                $descri_categoria1 = urlencode("$descri_categoria");
                $descri_categoria1 = explode("+",$descri_categoria1);
                $descri_categoria1 = implode("%20",$descri_categoria1);
        $sql = "INSERT INTO categorias (descri_categoria,pertence_categoria,gif) values ('$descri_categoria','$pertence_categoria','$pertence_categoria$descri_categoria1.jpg');";
                $n_arquivo = "$pertence_categoria$descri_categoria1.jpg";
                $upload = "icone";
                include ("../ftp.php");
        $executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
        }
        mysql_close($conecta);
        $setor = 1;
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"categorias.php?cat_pai=$pertence_categoria&eu_sou=$eu_sou\";";
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
      <p><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000" size="1">Adicionar
        uma sub-categoria abaixo de <? print $categoria_pai; ?></font></font>
      </p>
      <form enctype="multipart/form-data" method="post" action="ad_sub_categoria.php?inserir=sim">
        <font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
        <input type="hidden" name="pertence_categoria" value="<? print $cat_pai; ?>">
        <input type="hidden" name="eu_sou" value="<? print $categoria_pai; ?>">
        Nome da Categoria:<br>
        <input type="text" name="descri_categoria">
        <br>
        Imagem da Categoria:<br>
        <input type="file" name="icone_form" enctype="multipart/form-data">
        <br>
        <br>
        <input type="submit" name="Submit" value="Criar Sub-Categoria">
        </font> </font>
      </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
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