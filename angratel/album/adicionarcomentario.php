<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Adicionar Comentario</title>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]
include "config.php";
$sql3 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo3 = mysql_fetch_array($sql3)) {
?>
<body bgcolor="#<? echo $campo3[7]; ?>" topmargin="0" leftmargin="0" link="#000000" vlink="#000000" alink="#000000">

<?
$id = $_GET["id"];
$nome = $_POST["camponome"];
$email = $_POST["campoemail"];
$site = $_POST["camposite"];
$comentario = $_POST["campocomentario"];
$data = date("d/m/Y");

if($nome == '') {
echo '<script>alert("ATEN��O\n______________________________\nO campo Nome est� em branco. Favor checar.")</script>';
exit;
} else {
if($comentario == '') {
echo '<script>alert("ATEN��O\n______________________________\nOcampo de comentario est� em branco. Favor checar.")</script>';
exit;
} else {
if($campo3[12] == 'Ativo') {
include "controlepalavrao.php";
$comentario = controlepalavrao("$comentario");
}

$sql = mysql_query("INSERT INTO `$tabelacoments` (`idcoments`, `data`, `nome`, `email`, `site`, `comentario`) VALUES  ('$id', '$data', '$nome', '$email', '$site', '$comentario')", $db3);
if(!$sql) {
print "N�o foi possivel adicionar o coment�rio.";
} else {
print "Succeso. Coment�rio Adicionado. Pois o campo est�: $campo3[12]";
}
}
}
}
include "admin/button.php";
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]
?>
</body>

</html>

