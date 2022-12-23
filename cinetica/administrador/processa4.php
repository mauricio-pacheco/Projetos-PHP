<? 
include "conexao.php";

$codigo = $_GET["codigo"];


$audio4 = isset($_FILES['audio4']) ? $_FILES['audio4'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio4["name"]); 
$nome = 'audio4.mp3'; 
$nome = $diretorio . $nome; 
$audio4_nome = 'audio4.mp3';
if(eregi(".exe$", $_FILES["audio4"]["name"]) or eregi(".com$", $_FILES["audio4"]["name"]) or eregi(".bat$", $_FILES["audio4"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio4['tmp_name'], $nome);
	echo ""; 
	
} 


$sql = "UPDATE musical SET audio4='$audio4_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>