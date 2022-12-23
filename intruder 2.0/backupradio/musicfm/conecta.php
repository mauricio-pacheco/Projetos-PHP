<?

$host = 'localhost';
$banco = 'radioluz';
$usuario1 = 'Luzealegria';
$senha = '850225';

$conexao = mysql_connect($host,$usuario1,$senha)or die('Não foi possivel efetuar a conexão');
mysql_select_db($banco);

?>
