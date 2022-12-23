<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Audios Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<p align="center"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><BR /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
<div align="center">
  <p class="style1">JORNAL LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="index.php">ENVIAR PDF</a> ------ <a href="deletaraudios.php">APAGAR PDF</a></span></p>
</div>
<form action="cadaudio.php" method="post" enctype="multipart/form-data" name="form1" class="style3"><table width="98%" border="0" align="center">
  <tr>
    <td><p align="left">

      </p><br />
      <p align="center">CADASTRAR PDF</p>
      <p align="left">
          <br />
        <span class="style15"><span class="style1">Edição do Jornal: </span>
          <input name="titulo" type="text" class="caixacontato" size="60" />
        </span></p>
      <p align="left"><span class="style15"><span class="style1">Fonte do Jornal: </span>
          <input name="fonte" type="text" class="caixacontato" size="60" />
      </span></p>
      <p align="left"><span class="style15"><span class="style1">Data do Jornal: </span>
          <input name="tamanho" type="text" class="caixacontato" size="20" />
      </span></p>
      <p align="left"><span class="style15"><span class="style1">Arquivo PDF: </span>
          <input type="file" name="arquivo" id="arquivo" class="caixacontato" />
      </span></p>
      <p align="left" class="style15">
          <input type="submit" class="caixacontato" value="CADASTRAR JORNAL" />
        &nbsp;</p></td>
  </tr>
</table>
</form>
</body>
</html>
