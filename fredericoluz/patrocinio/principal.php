<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
      <?php
include "conexao.php";

$s = mysql_query("SELECT * FROM patrocinio ORDER BY RAND() LIMIT 5");

while($x=mysql_fetch_array($s)){
?>
<a href="<?php echo $x["link"]; ?>" target="_blank"><img src="logos/<?php echo $x["foto"]; ?>" border="0" alt="<?php echo $x["descricao"]; ?>" /></a><br />
      
	  <?

}
echo "<meta http-equiv=refresh content=\"12;URL=principal.php\">";

?>

</body>
</html>