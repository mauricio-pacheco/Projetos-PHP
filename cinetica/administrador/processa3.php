<? 
include "conexao.php";

$codigo = $_GET["codigo"];

$audio3 = isset($_FILES['audio3']) ? $_FILES['audio3'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio3["name"]); 
$nome = 'audio3.mp3'; 
$nome = $diretorio . $nome; 
$audio3_nome = 'audio3.mp3';
if(eregi(".exe$", $_FILES["audio3"]["name"]) or eregi(".com$", $_FILES["audio3"]["name"]) or eregi(".bat$", $_FILES["audio3"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio3['tmp_name'], $nome);
	echo ""; 
	
} 


$sql = "UPDATE musical SET audio3='$audio3_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>