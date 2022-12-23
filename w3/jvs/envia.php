<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
<p class="spip" align="center"><br /><?
//Inicia a sessão
session_start();
//agora verifico se ele possui permissão para acessar a página
if ($validacao == "1")
{
?>
<?
}
else
{
//exiba um alerta dizendo que a senha esta errada
?>

<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?
echo "<script>location.href='login.php'</script>";
}
?>
  <a href="clientes.php">Cadastrar Cliente</a> ----------- <a href="apagarcliente.php">Apagar Clientes</a> ----------- <a href="visualizarcliente.php">Visualizar Clientes</a> ----------- <a href="cadastrar.php">Cadastrar Ve&iacute;culo</a> ----------- <a href="apagar.php">Apagar Ve&iacute;culo</a></p>
<p class="spip" align="center">
  <?
include "conexao.php";


// foto a

$fotoa = isset($_FILES['fotoa']) ? $_FILES['fotoa'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto = str_replace(" ", "_", $fotoa["name"]); 

// Todas as letras em minúsculo 
$nomefoto = strtolower($nomefoto); 

// Caminho completo do arquivo 
$nomefoto = $diretorio . $nomefoto; 

$fotoanome = $fotoa["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($fotoa['tmp_name'], $nomefoto)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto a


// foto 1

$foto1 = isset($_FILES['foto1']) ? $_FILES['foto1'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

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


// foto 2

$foto2 = isset($_FILES['foto2']) ? $_FILES['foto2'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto2 = str_replace(" ", "_", $foto2["name"]); 

// Todas as letras em minúsculo 
$nomefoto2 = strtolower($nomefoto2); 

// Caminho completo do arquivo 
$nomefoto2 = $diretorio . $nomefoto2; 

$foto2nome = $foto2["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto2['tmp_name'], $nomefoto2)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 2


// foto 3

$foto3 = isset($_FILES['foto3']) ? $_FILES['foto3'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto3 = str_replace(" ", "_", $foto3["name"]); 

// Todas as letras em minúsculo 
$nomefoto3 = strtolower($nomefoto3); 

// Caminho completo do arquivo 
$nomefoto3 = $diretorio . $nomefoto3; 

$foto3nome = $foto3["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto3['tmp_name'], $nomefoto3)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 3



// foto 4

$foto4 = isset($_FILES['foto4']) ? $_FILES['foto4'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto4 = str_replace(" ", "_", $foto4["name"]); 

// Todas as letras em minúsculo 
$nomefoto4 = strtolower($nomefoto4); 

// Caminho completo do arquivo 
$nomefoto4 = $diretorio . $nomefoto4; 

$foto4nome = $foto4["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto4['tmp_name'], $nomefoto4)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 4


// foto 5

$foto5 = isset($_FILES['foto5']) ? $_FILES['foto5'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto5 = str_replace(" ", "_", $foto5["name"]); 

// Todas as letras em minúsculo 
$nomefoto5 = strtolower($nomefoto5); 

// Caminho completo do arquivo 
$nomefoto5 = $diretorio . $nomefoto5; 

$foto5nome = $foto5["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto5['tmp_name'], $nomefoto5)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 5


// foto 6

$foto6 = isset($_FILES['foto6']) ? $_FILES['foto6'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./arquivos/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto6 = str_replace(" ", "_", $foto6["name"]); 

// Todas as letras em minúsculo 
$nomefoto6 = strtolower($nomefoto6); 

// Caminho completo do arquivo 
$nomefoto6 = $diretorio . $nomefoto6; 

$foto6nome = $foto6["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto6['tmp_name'], $nomefoto6)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 6


$marca = $_POST["marca"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$anofab = $_POST["anofab"];
$motor = $_POST["motor"];
$comb = $_POST["comb"];
$direcao = $_POST["direcao"];
$cor = $_POST["cor"];
$fornecedor = $_POST["fornecedor"];
$descricao = $_POST["descricao"];



$sql = "INSERT INTO cadastro (marca, nome, preco, anofab, motor, comb, direcao, cor, fornecedor, descricao, fotoa, foto1, foto2, foto3, foto4, foto5, foto6) VALUES ('$marca', '$nome', '$preco', '$anofab', '$motor', '$comb', '$direcao', '$cor', '$fornecedor', '$descricao', '$fotoanome', '$foto1nome', '$foto2nome', '$foto3nome', '$foto4nome', '$foto5nome', '$foto6nome')";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu cadastro foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel efetuar o seu cadastro!</font></div>";
}
 
?>
</p>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>