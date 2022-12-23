<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "../config.php";
error_reporting(false);
$login = $_COOKIE["loginxalbum"];
$senha = $_COOKIE["senhaxalbum"];
error_reporting(true);

$confirmacao = mysql_query("SELECT * FROM `$tabela2` WHERE login = '$login' AND senha = '$senha'", $db3); //verificamos se o conteudo dos cookies esta correto
$contagem = mysql_num_rows($confirmacao);
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>
