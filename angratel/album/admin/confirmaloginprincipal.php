<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

$login = $_POST["campologin"];
$senha = $_POST["camposenha"];
$ip = $_SERVER["REMOTE_ADDR"];
include "../config.php";

$confirmacao = mysql_query("SELECT * FROM `$tabela2` WHERE login = '$login' AND senha = '$senha'", $db3); //verifica se o login e a senha conferem
$contagem = mysql_num_rows($confirmacao);

if ( $contagem == 1 ) {
setcookie ("loginxalbum", $login, time() + 3600,"/");
setcookie ("senhaxalbum", $senha, time() + 3600,"/");
  echo "<font face='Verdana' size='1'><center>Usuário logado. <Br>Seu ip ".$ip.".Transferindo para o Painel de Controle.. Aguarde. <META HTTP-EQUIV=\"Refresh\" content=\"2;URL=xalbumcontrol.php\"></center></font>";
  } else {
  echo "<font face='Verdana' size='1'><center>Login ou senha inválidos. <a href=javascript:history.go(-1)>Clique aqui para voltar.</a>";
  }
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>
