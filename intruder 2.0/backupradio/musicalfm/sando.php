<? 
include "conecta.php";

$musica1 = $_POST["musica1"];
$musica2 = $_POST["musica2"];
$musica3 = $_POST["musica3"];
$musica4= $_POST["musica4"];
$musica5 = $_POST["musica5"];
$musica6 = $_POST["musica6"];
$musica7 = $_POST["musica7"];
$musica8 = $_POST["musica8"];
$musica9 = $_POST["musica9"];
$musica10 = $_POST["musica10"];

$sql = "INSERT INTO musicalfm (musica1, musica2, musica3, musica4, musica5, musica6, musica7, musica8, musica9, musica10) VALUES ('$musica1', '$musica2', '$musica3', '$musica4', '$musica5', '$musica6', '$musica7', '$musica8', '$musica9', '$musica10')";

if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu cadastro foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o seu cadastro!</font></div>";
}


?>