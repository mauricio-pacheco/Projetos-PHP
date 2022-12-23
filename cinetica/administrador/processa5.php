<? 
include "conexao.php";

$codigo = $_GET["codigo"];


$audio5 = isset($_FILES['audio5']) ? $_FILES['audio5'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio5["name"]); 
$nome = 'audio5.mp3'; 
$nome = $diretorio . $nome; 
$audio5_nome = 'audio5.mp3';
if(eregi(".exe$", $_FILES["audio5"]["name"]) or eregi(".com$", $_FILES["audio5"]["name"]) or eregi(".bat$", $_FILES["audio5"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio5['tmp_name'], $nome);
	echo ""; 
	
} 


$sql = "UPDATE musical SET audio5='$audio5_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>