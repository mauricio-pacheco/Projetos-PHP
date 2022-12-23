<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>Painel de Controle - Principal</title>
</head>
<body bgcolor='#FFFFFF' topmargin='0' leftmargin='0'>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
$filename = '../instalar.php';

if (file_exists($filename)) {
print "<br>";
print "";
} else {
include "..config.php";
    $nome = mysql_query("SELECT * FROM `$tabela2`");
    while($campo = mysql_fetch_array($nome)) {
  ?>
<p><font face='Verdana' size='2'>Olá <? echo $campo[1]; ?>, seja bem vindo ao Painel de
Controle.</font></p>
<p><font face='Verdana' size='1'>No painel de controle você Adiciona, Edita, Remove as suas imagens com muita facilidade e rapidez.</font></p>
<?
}
if  (strpos($HTTP_USER_AGENT,"MSIE") != 0) {
echo "<font face='verdana' size='1'>Navegador sendo usado: Internet Explorer(Recomendado)</font><br>";
} else {
echo "<font face='verdana' size='1'>Navegador anônimo. Não recomendado. (Internet Explorer é o recomendado)</font><br>";
}

    $s3 = mysql_query("SELECT * FROM `$tabela3`");
    $n3 = mysql_num_rows($s3);
    if($n3 == "0"){ echo '<font face="verdana" size="2"><b>Nenhuma foto no Banco de Dados</b><br>';
} elseif($n3 == "1") {
echo "<b><font face='verdana' size='2'>Você tem $n3 foto no Banco de Dados</font></b><Br>";
} else {
echo "<b><font face='verdana' size='2'>Você tem $n3 fotos no Banco de Dados</font></b><Br>";
}
?>
<br><br><center>
  <Br>
  <p>
    <iframe name="newsscript" src="http://www.brunoalencar.com/xalbum/index.php?acao=noticias" width="100%" height="150" borderframe="0" frameborder="0"></iframe>
  </p>
  <p>
    <iframe name="newsscript" src="http://www.brunoalencar.com/xalbum/index.php?acao=noticias" width="100%" height="150" borderframe="0" frameborder="0"></iframe>
  </p>
</center>

<B> <Br>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">
  <?
}
  } else {
echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php target=_parent>Logar</a></font>";
include "button.php";
}

// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>
</p>
</b>
</body>
