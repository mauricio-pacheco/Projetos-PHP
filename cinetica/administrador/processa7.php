<? 
include "conexao.php";

$codigo = $_GET["codigo"];


$audio7 = isset($_FILES['audio7']) ? $_FILES['audio7'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio7["name"]); 
$nome = 'audio7.mp3'; 
$nome = $diretorio . $nome; 
$audio7_nome = 'audio7.mp3';
if(eregi(".exe$", $_FILES["audio7"]["name"]) or eregi(".com$", $_FILES["audio7"]["name"]) or eregi(".bat$", $_FILES["audio7"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio7['tmp_name'], $nome);
	echo ""; 
	
} 



$sql = "UPDATE musical SET audio7='$audio7_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>