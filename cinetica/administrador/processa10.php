<? 
include "conexao.php";

$codigo = $_GET["codigo"];



$audio10 = isset($_FILES['audio10']) ? $_FILES['audio10'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio10["name"]); 
$nome = 'audio10.mp3'; 
$nome = $diretorio . $nome; 
$audio10_nome = 'audio10.mp3';
if(eregi(".exe$", $_FILES["audio10"]["name"]) or eregi(".com$", $_FILES["audio10"]["name"]) or eregi(".bat$", $_FILES["audio10"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio10['tmp_name'], $nome);
	echo ""; 
	
} 



$sql = "UPDATE musical SET audio10='$audio10_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>