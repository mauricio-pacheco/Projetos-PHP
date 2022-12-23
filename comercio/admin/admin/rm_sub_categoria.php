<?php include ('auth.php') ?>
<html>
<head>
<title>Removendo Sub-Categoria</title>
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
                $sql = ("DELETE FROM categorias WHERE cod_categoria = '$pertence_categoria'");
                $n_arquivo = "$pertence_c_m$descri_categoria.jpg";
                $upload = "deletar";
                $gif = urldecode("$gif");
                $remove_ftp = "icones/$gif";
                include ("../ftp.php");
                $executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
                exit;
        }
        mysql_close($conecta);
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
            <? print $base[nome]; ?></font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">Administrador</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print $barra;?>">
    <td><font size="1" color="<? print $barra;?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>
      <p><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aten&ccedil;&atilde;o:<br>
        Esta a&ccedil;&atilde;o remover&aacute; todos os produtos abaixo desta
        categoria.<br>
        Se existir uma sub-categoria n&atilde;o ser&aacute; poss&iacute;vel remover
        os produtos da mesma ap&oacute;s a remo&ccedil;&atilde;o desta.<br>
        A forma correta de manuten&ccedil;&atilde;o &eacute; remover todas as
        subcategorias e seus produtos antes de remover uma categoria superior.</font></b></p>
      <p><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000" size="1">Voc&ecirc;
        t&ecirc;m certeza que deseja remover a subcategoria<font color="#FF3333"><b>
        <? print $categoria_pai; ?></b></font> e todos os seus sub-itens/produtos
        ?</font></font> </p>
      <br>
      <form enctype="multipart/form-data" method="post" action="rm_sub_categoria.php?alterar=sim">
        <input type="hidden" name="pertence_categoria" value="<? print $cat_pai; ?>">
        <font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
        <input type="submit" name="Submit" value="Sim, remover">
        <input type="button" name="Submit2" value="Cancelar" OnClick="javascript:window.close();">
        </font> </font>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print $barra;?>">
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