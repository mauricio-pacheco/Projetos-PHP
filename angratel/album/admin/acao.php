<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Ações da Foto</title>
</head>
<body bgcolor='#ffffff' topmargin='0' leftmargin='0' link="#000000" vlink="#000000" alink="#000000">
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
$acao = $_GET["acao"];
if($acao == 'apagar') {
$id = $_GET["id"];
include "../config.php";
if(!mysql_query("DELETE FROM `$tabela3` WHERE id = '$id'", $db3)) {
echo "<font face='Verdana' size='1'>Não foi possivel apagar a foto.</font>";
} else {
echo "<font face='Verdana' size='1'>Foto apagada do Banco de Dados</font>";
}









} elseif($acao == 'editar') {
$id = $_GET["id"];
echo "<br><p align='center'><font face='Verdana' size='3'><b>Editando foto ID $id</b></font></p><br><Br>";
include "../config.php";
$sql3 = mysql_query("SELECT * FROM `$tabela3` WHERE id = '$id'", $db3);
while($campo3 = mysql_fetch_array($sql3)) {
echo "<center><img src='../fotos/$campo3[3]' style='border: 1 solid #000000'><br><br></center>";
echo "<center><form method='POST' action='acao.php?acao=editarpronto&id=$id'>  <p><font face='Verdana' size='2'>Título:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </font><input type='text' name='campotitulo' size='20' value='$campo3[1]'></p>  <p><font face='Verdana' size='2'>Comentário:</font> <textarea rows='4' name='campocoments' cols='20'>$campo3[4]</textarea></p>  <p><input type='submit' value='Vai!' name='B1'></p></form></center>";
}

















} elseif($acao == 'editarpronto') {
$id = $_GET["id"];
$campotitulo = $_POST["campotitulo"];
$comentario = $_POST["campocoments"];
include "../config.php";
$sql5 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo6 = mysql_fetch_array($sql5)) {
if($campo6[11] == 'Ativo') {
include "smilie.php";
}
}
if(mysql_query("UPDATE `$tabela3` SET `fototitulo` = '$campotitulo',`comentario` = '$comentario' WHERE `id` = '$id' LIMIT 1", $db3)) {
echo "<font face='Verdana' size='2'>Atualizado com Sucesso!</font>";
} else {
echo "<font face='Verdana' size='2'>Não foi possível atualizar a fotografia</font>";
}












} elseif($acao == 'configurar') {
include "../config.php";
$camponome = $_POST["camponome"];
$campolargura = $_POST["campolargura"];
$campoaltura = $_POST["campoaltura"];
$kb = $HTTP_POST_VARS["campokb"];
$campokb = $kb * 1024;
$campoemotion1 = $_POST["campoemotion"];
$campoampliar1 = $_POST["campoampliar"];
$campopalavrao1 = $_POST["campopalavrao"];
$campocomentariopub1 = $_POST["campocomentariopub"];
if($campoemotion1 == 'Sim') {
$campoemotion = 'Ativo';
} else {
$campoemotion = 'Desativado';
}
if($campopalavrao1 == 'Sim') {
$campopalavrao = 'Ativo';
} else {
$campopalavrao = 'Desativado';
}
if($campocomentariopub1 == 'Sim') {
$campocomentariopub = 'Ativo';
} else {
$campocomentariopub = 'Desativado';
}
if($campoampliar1 == 'Sim') {
$campoampliar = 'Ativo';
} else {
$campoampliar = 'Desativo';
}
$campocorfundo = $_POST["campocorfundo"];
$campocortitulo = $_POST["campocortitulo"];
$campocordata = $_POST["campocordata"];
$campocorcomentario = $_POST["campocorcoments"];
$campocorcomentariopub = $_POST["campocorcomentspub"];
if(mysql_query("UPDATE `$tabela2` SET `nome` = '$camponome',`larguraimg` = '$campolargura',`alturaimg` = '$campoaltura',`tamanhoimg` = '$campokb',`corfundo` = '$campocorfundo',`cortitulofotos` = '$campocortitulo',`cordata` = '$campocordata',`corcomentario` = '$campocorcomentario',`emotion` = '$campoemotion',`controlepalavrao` = '$campopalavrao',`corcomentariopub` = '$campocorcomentariopub',`comentario` = '$campocomentariopub',`ampliar` = '$campoampliar'", $db3)) {
echo "<font face='Verdana' size='2'>Atualizado com Sucesso!</font>";
} else {
echo "<font face='Verdana' size='2'>Não foi possível atualizar a fotografia</font>";
}













} elseif($acao == 'upload') {
$titulo = $_POST["campotitulo"];
$comentario = $_POST["campocomentario"];
$data = date("d/m/Y");
$imgtemppc = $_FILES["campofoto"]["tmp_name"];
$imgurlnome = $_FILES["campofoto"]["name"];
$imgtype = $_FILES["campofoto"]["type"];
$imgsize = $_FILES["campofoto"]["size"];
$destino = "../fotos";
$destinototal = "$destino/$imgurlnome";
$link = "fotos/$imgurlnome";
include "../config.php";
$sql4 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo5 = mysql_fetch_array($sql4)) {
$tamanhoimgkb = "$campo5[6]";
$calcu = $tamanhoimgkb / 1024;
if($titulo == '') {
echo '<script>alert("ATENÇÃO\n______________________________\nO campo de Título está vazio. Favor colocar algum título.")</script>';
exit;
} else {
if($imgtemppc == '') {
echo '<script>alert("ATENÇÃO\n______________________________\nO campo da Foto está vazio. Favor colocar alguma foto.")</script>';
exit;
} else {
if($comentario == '') {
echo '<script>alert("ATENÇÃO\n______________________________\nO campo de Comentario está vazio. Favor colocar algum comentario.")</script>';
exit;
} else {
if (!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imgtype)) {
print ("<font face='Verdana' size='1'>Arquivo em formato inválido! A imagem deve ser jpg, jpeg, bmp, gif ou png. <a href=javascript:history.go(-1)>Envie outro arquivo.</a></font>");
} else {
if ($imgsize > $tamanhoimgkb) {
print ("<font face='Verdana' size='1' color='black'>Imagem muito grande. A imagem deverá ter no máximo: $calcu KB! <a href=javascript:history.go(-1)>Envie outro arquivo.</a></font>");
} else {
if(move_uploaded_file($imgtemppc, $destinototal)) {
echo "<font face='Verdana' size='1'>Sucesso. A foto <b>$imgurlnome</b> foi enviado com sucesso<BR></font>";
} else {
echo "<font face='Verdana' size='1'>Não foi possivel enviar a foto <b>$imgurlnome</b>.<br></font>";
exit;
}
if($campo5[11] == 'Ativo') {
include "smilie.php";
}
$sql2 = "INSERT INTO ".$tabela3." (fototitulo,data,fotolink,comentario) VALUES('$titulo','$data','$imgurlnome','$comentario')";
mysql_query($sql2,$db3) or die ('Não conectou ao Banco de Dados por causa: ' . mysql_error());
}
}
}
}
}
}
}

if($acao == 'adicionarpalavrao') {
$palavrao1 = $_POST["campopalavrao"];
$palavrao = "\n$palavrao1";
if (!$handle = fopen("../palavrao.txt", 'a')) {
         print "<font face='Verdana' size='2'>Erro abrindo arquivo de palavrões.Pode ter acontecido o erro por conta do Chmod. Favor checar.</font>";
         exit;
   } else {
      if (!fwrite($handle, $palavrao)) {
       print "<font face='Verdana' size='2'>Erro escrevendo no arquivo de palavrões.Pode ter acontecido o erro por conta do Chmod. Favor checar.</font>";
       exit;
   } else {
   print "<font face='Verdana' size='2'>Succeso. Adicionado Com sucesso o palavrao $palavrao1<Br></font>";
   print "<font face='Verdana' size='2'>Voltando..</font> <META HTTP-EQUIV=\"Refresh\" content=\"2;URL=palavrao.php\">";
   }
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

