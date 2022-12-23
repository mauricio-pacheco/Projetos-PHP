<? 
include "conexao.php";


$audio1 = isset($_FILES['audio1']) ? $_FILES['audio1'] : FALSE; 
$diretorio = "ups/audioenv/"; 
$nome = str_replace(" ", "_", $audio1["name"]); 
$nome = 'audio1.mp3'; 
$nome = $diretorio . $nome; 
$audio1_nome = 'audio1.mp3';
if(eregi(".exe$", $_FILES["audio1"]["name"]) or eregi(".com$", $_FILES["audio1"]["name"]) or eregi(".bat$", $_FILES["audio1"]["name"])) {
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($audio1['tmp_name'], $nome);
	echo ""; 
	
} 


$sql = "UPDATE musical SET audio1='$audio1_nome' WHERE codigo='1' ";

if(mysql_query($sql)) {
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}else{
echo "<script>alert('O CADASTRO FOI EFETUADO COM SUCESSO!')</script>";
echo "<script>location.href='top10.php'</script>";
}


?>