<?php include ('auth.php') ?>
<html>
<head>
<title>Exibindo Enquete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">

</head>
<?
$path_local = "../padrao.php";
include "../db.php";
$sql = mysql_query("SELECT * FROM enquete WHERE id = $id");
//while($ressql = mysql_fetch_array($sql)){
//print "$ressql[0] - $ressql[1]<br>$ressql[2]<br>$ressql[3]<br>$ressql[4]";
//}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Exibindo enquete.</font></b></font></td>
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
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <? while($ressql = mysql_fetch_array($sql)){
      $campos = explode("|", $ressql[3]);
      $valores = explode("|", $ressql[4]);
      print "<tr><td width=\"98%\" ><br>Listando enquete $ressql[0]:<b> \"$ressql[1]\"<br><br></b></td><td></td></tr>";
      print "<tr><td width=\"98%\">Respostas:<br></td></tr>";
      print '<table width="100%" border="1" cellspacing="0" cellpadding="0">';
      //calcula porcentagem
      for ($i = 0 ; $i<count($valores);$i++){
      $totalvotos += $valores[$i];
      }
      for ($i = 0 ; $i<count($valores);$i++){
      $porcento[$i] = ($valores[$i]/$totalvotos)*100;
      $porcento[$i] = number_format($porcento[$i], 2, '.', '');
      }

      for ($i = 0 ; $i<$ressql[2];$i++){
          print "<tr><td width=\"40%\"><strong>$campos[$i]</strong></td><td> $valores[$i] votos &nbsp;&nbsp;($porcento[$i]%)</td><td></td></tr>";
          }
      }
      print '</table>';
   ?>
<div align="center">
   <br><br>
   <a href="javascript:void(null);" onClick="javascript:window.close();">Fechar Janela</a>
</div>
</table>
</body>
</html>