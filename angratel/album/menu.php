<html>

<head>
<LINK href="../angratel_arquivos/style.css" type=text/css rel=StyleSheet>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Menu Fotos</title>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "config.php";
$sql2 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo2 = mysql_fetch_array($sql2)) {
?>
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0">
<br>
<?
$sql = mysql_query("SELECT * FROM `$tabela3` ORDER BY ID DESC", $db3);
$n3 = mysql_num_rows($sql);
if($n3 == '0') {
echo "<center><font face=verdana size=1><br><br><b> Sem nenhuma Foto</b></font></center><br><BR>";
} else {
while($campo = mysql_fetch_array($sql)) {
echo "<center><a href='foto.php?foto=$campo[0]' target='principal'><img src='fotos/$campo[3]' width='50' height='70' border='0' ></a><br><br></center>";
}
}
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?><center>
</body>

</html>
