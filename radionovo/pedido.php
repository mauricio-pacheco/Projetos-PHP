<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<LINK REL="StyleSheet" HREF="themes/Helius/style/style2.css" TYPE="text/css">
<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>Preencha o campo abaixo para realizar seu Pedido:</p>
<form id="form1" name="form1" method="post" action="enviac2.php">
  <label>  
  <span class="style1">Seu nome:</span>
  <input type="text" name="nome" id="nome" size="70" />
  <br />
  <br />
  <span class="style1">Nome da Música:</span>
  <input type="text" name="musica" id="musica" size="70" />
   <br />
  <br />
  <span class="style1">Descrição:</span><br />
  <textarea name="denuncia" id="denuncia" cols="130" rows="30"></textarea>
  </label>
  <p>
    <label>
    <input type="submit" name="button" id="button" value="Enviar Pedido" />
    </label>
  </p>
</form>
</body>
</html>
