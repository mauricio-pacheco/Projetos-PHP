<?php include ('auth.php') ?>
<html>
<head>
<title>Cadastro de Imagem</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<form enctype="multipart/form-data" method="post" action="libs/ftp.php?upload=tumbnail" name="envia">
  <input type="file" name="arquivo_form" enctype="multipart/form-data">
  <br>
  <input type="submit" name="Submit" value="Enviar">
</form>
</body>
</html>