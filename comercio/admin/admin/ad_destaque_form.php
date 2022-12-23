<?php include ('auth.php') ?>
<html>
<head>
<title>Cadastro de Destaque</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if($acao == "inserir"){
                if(!(mysql_query("INSERT INTO destaques (nome_setor,id_destaque,descricao,texto) VALUES ('$nome_setor','$id_destaque','$descricao','$texto')") or die("Erro em sql"))){
                        print "Erro ao tentar criar novo destaque..";
                }
        print "<script Language=\"JavaScript\">";
        print "window.opener.location.href = \"./\";";
        print "window.close();";
        print "</script>";
        exit;
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Criando novo destaque.</font></b></font></td>
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
      <form enctype="multipart/form-data" method="post" action="ad_destaque_form.php?acao=inserir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nome:</b></font></td>
            <td width="87%"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
              <input type="text" name="nome_setor">
              </b></font></td>
          </tr>
          <tr>
            <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>ID:</b></font></td>
            <td width="87%"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
              <input type="text" name="id_destaque">
              </b></font></td>
          </tr>
          <tr>
            <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Destaque:</b></font></td>
            <td width="87%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FF0000">
              <input type="text" name="descricao" size="45">
              </font></b></font></td>
          </tr>
          <tr>
            <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Conte&uacute;do:</b></font></td>
            <td width="87%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FF0000">
              <textarea name="texto" cols="40" rows="7"></textarea>
              </font></b></font></td>
          </tr>
        </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Criar o destaque">
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