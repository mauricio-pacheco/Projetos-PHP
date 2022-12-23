<? 
include "conexao.php";

$codigo = $_GET["codigo"];

$audio2 = isset($_FILES['audio2']) ? $_FILES['audio2'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio2["name"]); 
$nome = 'audio2.mp3'; 
$nome = $diretorio . $nome; 
$audio2_nome = 'audio2.mp3';
if(eregi(".exe$", $_FILES["audio2"]["name"]) or eregi(".com$", $_FILES["audio2"]["name"]) or eregi(".bat$", $_FILES["audio2"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio2['tmp_name'], $nome);
	echo ""; 
	
} 



$sql = "UPDATE musical SET audio2='$audio2_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>