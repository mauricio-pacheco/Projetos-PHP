<?php include ('auth.php') ?>
<html>
<head>
<title>Altera&ccedil;&atilde;o de Destaque</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
/// Exclui Cliente
if($excluir){
mysql_query("DELETE FROM destaques WHERE id = '$excluir'");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"./\";";
print "window.close();";
print "</script>";
exit;
}
/// Altera destaque
if($acao == "alterar"){
mysql_query("UPDATE destaques SET descricao = '$destaque', texto = '$descricao' WHERE id = '$id'");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"./\";";
print "window.close();";
print "</script>";
exit;
}
$sql = mysql_query("SELECT descricao,texto FROM destaques WHERE id = '$id'");
while($res = mysql_fetch_array($sql)){
$destaque = $res[0];
$descricao = $res[1];
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Altere o destaque <? print $destaque; ?>.</font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
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
      <form enctype="multipart/form-data" method="post" action="al_destaque_form.php?acao=alterar">
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Se
          voc&ecirc; deseja excluir este destaque por favor <a href="al_destaque_form.php?excluir=<? print $id; ?>" class="link_verde">clique
          aqui</a>.</b><br>
          </font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Destaque:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <input type="hidden" name="id" value="<?print $id;?>">
              <input type="text" name="destaque" value="<? print $destaque; ?>" size="45">
              </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Conte&uacute;do:</font></b></td>
            <td width="87%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <textarea name="descricao" cols="40" rows="7"><? print $descricao; ?></textarea>
              </font></b></font></td>
          </tr>
        </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Altere o destaque">
          </font> </font> </p>
        </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
</body>
</html>