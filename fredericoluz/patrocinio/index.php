<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="../style.css" type=text/css rel=stylesheet>
<title>Patrocinios</title>
<style type="text/css">
<!--
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; }
.style25 {color: #000000}
.style27 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="540" height="220" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" class="letreiro2"><div align="center"><a href="index.php">ENVIAR PATROCINADOR</a> <span class="style25">------</span> <a href="deletar.php">DELETAR PATROCINADOR</a></div></td>
  </tr>
  <tr>
    <td width="67%" valign="top" class="letreiro2"><form action="cadpatrocinio.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
      <table width="70%" border="0" align="center">
        <tr>
          <td>
            <br />
            <br />
            <p align="left" class="style16 style25">CADASTRAR PATROCINADOR</p>
            <p align="left" class="style25"> <br />
              <span class="style15">Link  do Patrocinador:
                <input name="link" type="text" class="texto" size="60" value="http://"/>
              </span></p>
            <p align="left" class="style25"><span class="style27">Enviar imagem do patroc&iacute;nio: </span>
              <input type="file" name="foto" id="foto" class="texto"/>
            </p>
            <p class="style16 style25">Descri&ccedil;&atilde;o:</p>
            <div align="left" class="style25">
              <textarea class="texto" name="descricao" id="descricao" cols="45" rows="5"></textarea>
            </div>
            <p align="center" class="style15 style25">
              <input type="submit" class="texto" value="Cadastrar Patrocinador" />
              &nbsp;</p></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>