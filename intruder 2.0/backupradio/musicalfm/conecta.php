<?

$host = 'localhost';
$banco = 'radioluz';
$usuario1 = 'Luzealegria';
$senha = '850225';

$conexao = mysql_connect($host,$usuario1,$senha)or die('N�o foi possivel efetuar a conex�o');
mysql_select_db($banco);

?>
