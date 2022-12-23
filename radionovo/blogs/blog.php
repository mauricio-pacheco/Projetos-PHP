<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Blogs Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<p align="center"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
<div align="center">
  <p class="style1">BLOGS LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="blog.php">ENVIAR BLOG</a> ------ <a href="deletarblogs.php">APAGAR BLOG</a></span></p>
</div>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><script language=javascript>
function validar(form1) { 

if (document.form1.titulo.value=="") {
alert("O Campo Titulo do Blog não está preenchido!")
form1.titulo.focus();
return false
}

}

                        </SCRIPT>
              <form name="form1" action="cadblog.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Nome do Blog: 
                      <input name="titulo" type="text" class="fontetabela" id="titulo" size="80" />
                      *</td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Link do Blog:
                      <input name="link" type="text" class="fontetabela" id="link" value="http://" size="40" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Imagem do Blog: 
                      <input name="foto" type="file" class="fontetabela" id="foto" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Descrição do Blog:</td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td><textarea name="descricao" cols="45" rows="5" class="fontetabela" id="descricao"></textarea></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                  <td class="fontetabela" align="left"><input name="button" type="submit" class="fontetabela" id="button" value="Cadastrar Blog" /></td>
                </tr>
              </table>
                <table width="100%" border="0">
                  <tr>
                  <td>   </td>
                </tr>
              </table></form></td>
  </tr>
</table>
</body>
</html>
