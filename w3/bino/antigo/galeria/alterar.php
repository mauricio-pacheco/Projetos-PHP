<? include "protege.php"; ?>

<?php
echo "<link href=estilo.css rel=stylesheet type=text/css>";
	include("arqs/$arquivo");
	$img = $imagem ;
?>

<?
if($acao == "alterar")

   {

		$fotos= "<?php\n";
		$fotos.="\$coment ='$coment_a';\n";
		$fotos.="\$imagem ='$img';\n";			
		$fotos.="?>";


		$fp=fopen("arqs/$arquivo", "w");

		fputs($fp, $fotos);

		fclose($fp);

        die("<p align=center>Alteração Efetuada com Sucesso !!!<br> 
		 	 <a href=cad.php>Voltar</a></p>");


    }


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Tauras</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="estilo.css" rel="stylesheet" type="text/css"></head>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
 
<div align="center">
  <table width="779" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td height="40" align="center" valign="middle"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Altera&ccedil;&atilde;o</font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Descri&ccedil;&atilde;o</font></strong></td>
              <td width="90%"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                <input name="coment_a" type="text" id="coment_a" value="<?echo $coment?>" size="50">
              </font></strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
                <input type="hidden" name="acao" value="alterar">
                <input type="submit" name="Submit" value="Enviar">
              </td>
            </tr>
          </table>
      </form></td>
    </tr>
  </table>
</div>
<p align="center"><strong></strong></p>
<p align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo "<img src=$imagem width=150> <br><br>"; ?>  </font></strong></p>
</body>
</html>
