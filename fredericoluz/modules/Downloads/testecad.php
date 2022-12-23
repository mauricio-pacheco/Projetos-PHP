><?
include "conexao.php";

$foto1 = isset($_FILES['foto1']) ? $_FILES['foto1'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./galerias/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto1 = str_replace(" ", "_", $foto1["name"]); 

// Todas as letras em minúsculo 
$nomefoto1 = strtolower($nomefoto1); 

// Caminho completo do arquivo 
$nomefoto1 = $diretorio . $nomefoto1; 

$foto1nome = $foto1["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto1['tmp_name'], $nomefoto1)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 1



$sql = "INSERT INTO galerias (foto1) VALUES ('$foto1nome')";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Galeria cadastrada com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel cadastrar a galeria!</font></div>";
}
 
?>
