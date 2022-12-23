<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Upload de foto</title>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
//aqui deixe aberto, pois iremos fechar somente no final da página
include "../config.php";
$sqladiciona = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campoad = mysql_fetch_array($sqladiciona)) {
$calc = $campoad[6] / 1024;
?>
<body bgcolor='#FFFFFF' topmargin='0' leftmargin='0'>
<p align="center">&nbsp;</p>
<p align="center"><font face="Verdana" size="3"><b>Adicionar Fotografias</b></font></p>
<form method="POST" action="acao.php?acao=upload" enctype="multipart/form-data">
<p align="center"><font face="Verdana" size="2">Titulo: </font><input type="text" name="campotitulo" size="20"></p>
  <p align="center"><font face="Verdana" size="2">Selecione a foto:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font><input type="file" name="campofoto" size="20"></p>
  <p align="center"><font face="Verdana" size="2">Comentário: </font><textarea rows="5" name="campocomentario" cols="20"></textarea></p>
<font face="Verdana" size="1"><p align="center">Emotions Estão: <? if($campoad[11] == 'Ativo') { echo "<b>Ativado. Para ve-los <a href=\"#\" onClick=\"window.open('../img/smilies.php','Smiles','width=535,height=150')\"><font face=verdana size=1 color=#669900>clique aqui.</font></a></b>"; } else { echo "<B>Desativado</b>"; } ?>. </font></p>
  <p align="center"><input type="submit" value="Mandar!" name="butao" style="background-color: #F5F5F5; border: 1 solid #A6E900"></p>
</form>
<font face="Verdana" size="1">
<p align="center">Atençao. O sistema suporta o envio dos formatos de imagens <br>
  mais populares: JPG, GIF, PNG e BMP. Elas devem ter no máximo <? echo $calc; ?>kb.</p></font>
<?

include "button.php";
}
  } else {
echo "Você não está logado.<a href=index.php>Logar</a>";
include "button.php";
}
?>
</body>

</html>
