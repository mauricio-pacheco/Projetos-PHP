<? 
include "conexao.php";

$codigo = $_GET["codigo"];



$audio9 = isset($_FILES['audio9']) ? $_FILES['audio9'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio9["name"]); 
$nome = 'audio9.mp3'; 
$nome = $diretorio . $nome; 
$audio9_nome = 'audio9.mp3';
if(eregi(".exe$", $_FILES["audio9"]["name"]) or eregi(".com$", $_FILES["audio9"]["name"]) or eregi(".bat$", $_FILES["audio9"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio9['tmp_name'], $nome);
	echo ""; 
	
} 



$sql = "UPDATE musical SET audio9='$audio9_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>