<? 
include "conecta.php";


$data = date ("j/m/Y");
$hora = date ("H:i:s");



$nome = $_POST["nome"];
$musica = $_POST["musica"];
$mensagem = $_POST["mensagem"];

$sql = "INSERT INTO musicaam (nome, musica, mensagem, data, hora) VALUES ('$nome', '$musica', '$mensagem', '$data', '$hora')";

if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu cadastro foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o seu cadastro!</font></div>";
}


?>