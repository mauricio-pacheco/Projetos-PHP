<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Ações da Foto</title>
</head>
<body bgcolor='#f5f5f5' topmargin='0' leftmargin='0' link="#000000" vlink="#000000" alink="#000000">
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
include "config.php";
if ( $contagem == 1 ) {
$acao = $_GET["acao"];
$id = $_GET["id"];

if($acao == 'apagar') {
if(!mysql_query("DELETE FROM `$tabelacoments` WHERE id = '$id'", $db3)) {
echo "<font face='Verdana' size='1'>Não foi possivel apagar o comentario</font>";
} else {
echo "<font face='Verdana' size='1'>Sucesso! Comentario apagado do Banco de Dados!</font><br>";
   print "<font face='Verdana' size='2'>Voltando a principal<META HTTP-EQUIV=\"Refresh\" content=\"1;URL=../principal.php\">";
}
}

if($acao == 'editar') {
echo "<p align='center'><font face='Verdana' size='3'><b>Editando comentario ID $id</b></font></p><br><Br>";
$sql = mysql_query("SELECT * FROM `$tabelacoments` WHERE id = '$id'", $db3);
while($campo = mysql_fetch_array($sql)) {
$idfoto = $campo[1];
$data = $campo[2];
$nome = $campo[3];
$email = $campo[4];
$site = $campo[5];
$comentario = $campo[6];
?>
<form method="POST" action="comentarios.php?acao=editarpronto&id=<? echo $id; ?>">
  <font face="Verdana" size="2">Nome:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="camponome" value="<? echo $nome; ?>" size="20"></font><Br>
  <font face="Verdana" size="2">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="campoemail" value="<? echo $email; ?>" size="20"></font><Br>
  <font face="Verdana" size="2">Site:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="camposite" value="<? echo $site; ?>" size="20"></font><Br>
  <font face="Verdana" size="2">Comentario: <textarea rows="3" name="campocomentario" cols="20"><? echo $comentario; ?></textarea></font><Br>
  <font face="Verdana" size="2">Data:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="campodata" value="<? echo $data; ?>"size="20"></font>
  <p><Br>
  <input type="submit" value="Atualizar!" name="botao">
  </p>
</form>
<?
}
} elseif($acao == 'editarpronto') {
$id = $_GET["id"];
$nome = $_POST["camponome"];
$email = $_POST["campoemail"];
$site = $_POST["camposite"];
$comentario = $_POST["campocomentario"];
$data = $_POST["campodata"];
if(mysql_query("UPDATE `$tabelacoments` SET `data` = '$data',`nome` = '$nome',`email` = '$email',`site` = '$site',`comentario` = '$comentario' WHERE `id` = '$id'", $db3)) {
echo "<font face='Verdana' size='2'>Sucesso! Comentario atualizado com Sucesso!</font><br>";
   print "<font face='Verdana' size='2'>Voltando a principal<META HTTP-EQUIV=\"Refresh\" content=\"1;URL=../principal.php\">";
} else {
echo "<font face='Verdana' size='2'>Não foi possível atualizar o comentario!</font>";
}
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

