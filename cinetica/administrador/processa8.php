<? 
include "conexao.php";

$codigo = $_GET["codigo"];



$audio8 = isset($_FILES['audio8']) ? $_FILES['audio8'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio8["name"]); 
$nome = 'audio8.mp3'; 
$nome = $diretorio . $nome; 
$audio8_nome = 'audio8.mp3';
if(eregi(".exe$", $_FILES["audio8"]["name"]) or eregi(".com$", $_FILES["audio8"]["name"]) or eregi(".bat$", $_FILES["audio8"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio8['tmp_name'], $nome);
	echo ""; 
	
} 


$sql = "UPDATE musical SET audio8='$audio8_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>