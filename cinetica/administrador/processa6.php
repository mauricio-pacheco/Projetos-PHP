<? 
include "conexao.php";

$codigo = $_GET["codigo"];



$audio6 = isset($_FILES['audio6']) ? $_FILES['audio6'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio6["name"]); 
$nome = 'audio6.mp3'; 
$nome = $diretorio . $nome; 
$audio6_nome = 'audio6.mp3';
if(eregi(".exe$", $_FILES["audio6"]["name"]) or eregi(".com$", $_FILES["audio6"]["name"]) or eregi(".bat$", $_FILES["audio6"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio6['tmp_name'], $nome);
	echo ""; 
	
} 



$sql = "UPDATE musical SET audio6='$audio6_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>