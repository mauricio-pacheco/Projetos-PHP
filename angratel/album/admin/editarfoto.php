<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Editando imagem</title>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
//aqui deixe aberto, pois iremos fechar somente no final da página
?>
<body bgcolor='#FFFFFF' topmargin='0' leftmargin='0'>
<p align="center">&nbsp;</p>
<p align="center"><font face="Verdana" size="3"><b>Editar Fotografias</b></font></p>
<center><font face="verdana" size="2"> Clique na imagem para editar</font><bR><br>
<?
include "../config.php";
$sql2 = mysql_query("SELECT * FROM `$tabela3` ORDER BY ID DESC", $db3);
while($campo2 = mysql_fetch_array($sql2)) {
echo "<a href='acao.php?acao=editar&id=$campo2[0]'><IMG BORDER='0' SRC='../fotos/$campo2[3]' alt='ID: $campo2[0]' style='border: 1 solid #000000' WIDTH=100 HEIGHT=75></a>&nbsp;&nbsp;";
}
include "button.php";
  } else {
echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php>Logar</a></font>";
  include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>
</body>

</html>
