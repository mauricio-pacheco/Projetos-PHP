<?php
ob_start();

$login = caicara; //armazena o usuário dentro da variável $login
$senha = ca2013; //armazena a senha dentro da variável $senha

//se o usuário digitado for igual ao que esta ali em cima, e a senha também
if ($login == $_POST['usuario'] && $senha == $_POST['password'])
//entao execute isto
{
//aqui vai entrar a novidade, antes de redirecionarmos
//vamos salvar algumas informações para utilizar depois

//primeiro eu dou o valor 1 para a variável $validacao
$validacao = "1"; //usaremos essa variável para verificar se ele está logado, se o usuário não tiver o valor 1 nessa variável ele não está logado!
$usuario = $_POST['usuario']; // puxa o nome do usuário digitado no formulario do index.html
//inicio uma Sessao (session e similar a uma gaveta movel)

session_start();
//gravo as informações das variáveis dentro das sessões
$_SESSION[usuario] = $usuario;
$_SESSION[validacao] = $validacao;

//Pronto agora redirecione o usuário para a página secreta

//abre a página secretaaaa
header ("Location: notdep.php");
}
//senao
else
{
//exiba um alerta dizendo que a senha esta errada
?>

<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?php
echo "<script>location.href='index.php'</script>";
}
?>