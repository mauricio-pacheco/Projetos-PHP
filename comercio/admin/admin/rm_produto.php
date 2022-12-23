<?php include ('auth.php') ?>
<html>
<head>
<title>Removendo Produto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if ($alterar == "sim"){

                mysql_query("DELETE FROM produto WHERE id = '$id'");
                mysql_query("DELETE FROM produto_categoria WHERE cod_produto = '$id'");
                $upload = "deletar";
                $remove_ftp = $ftp['imagens'].'/'.$id.'.jpg';
                include ("../ftp.php");
                $remove_ftp = $ftp['icones'].'/'.$id.'.jpg';
                include ("../ftp.php");
                $executa_sql = @mysql_query($sql);
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
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"> <? print $nome_padrao; ?>
            </font></b></font></td>
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
        Esta a&ccedil;&atilde;o remover&aacute; o produto sem possibilidade de
        recupera&ccedil;&atilde;o.</font></b></p>
      <p><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">DESEJA
        CONTINUAR ?</font></b> </p>
      <form enctype="multipart/form-data" method="post" action="rm_produto.php?alterar=sim">
        <input type="hidden" name="id" value="<? print $id; ?>">
        <font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
        <input type="hidden" name="cat_pai" value="<?print $cat_pai; ?>">
        <input type="hidden" name="eu_sou" value="<? print $eu_sou; ?>">
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
