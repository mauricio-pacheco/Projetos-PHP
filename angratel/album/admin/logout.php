<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
setcookie("loginxalbum","",time()-3600);
setcookie("senhaxalbum","",time()-3600);
$ip = $_SERVER["REMOTE_ADDR"];
echo "<font face='Verdana' size='1'>Logout efetuado com sucesso!<Br></font>";
echo "<font face='Verdana' size='1'>Origem do Ultimo Login: ".$ip."</font><br>";
echo "<font face='Verdana' size='1'>Fazer <a href=index.php>login</a> novamente</font>";
include "button.php";
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

?>
