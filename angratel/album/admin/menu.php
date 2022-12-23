<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Menu</title>
<base target="principal">
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
$data = date("d/m/Y");
$ip = $_SERVER["REMOTE_ADDR"];
$hora = date("H:i:s ");
  ?>
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" link="#669900" vlink="#669900" alink="#669900">
<br>
<Br>
<table border="2" cellpadding="0" width="100%" height="77" bordercolor="#FFFFFF">
  <tr>
    <td width="100%" height="1" align="center">
      <p align="center"><font face="Verdana" size="1"><a href="adicionarfoto.php">&#9643; Enviar Fotos</font></p></a>
    </td>
  </tr>
  <tr>
    <td width="100%" height="7" align="center"><font face="Verdana" size="1"><a href="apagarfoto.php">&#9643;
      Apagar Fotos</a></font></td>
  </tr>
  <tr>
    <td width="100%" height="19" align="center"><font face="Verdana" size="1"><a href="editarfoto.php">&#9643;
      Editar Fotos</font></td></a>
  </tr>
   
</table>

<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p>
<?
  } else {
echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php target=_parent>Logar</a></font>"; //aqui que terminamos o IF que iniciamos na página
include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>

</body>

</html>

