



<?
include "conecta.php";

$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; 

// C�digo acima... com as demais verifica�oes... 

// Diret�rio para onde o arquivo ser� movido 
$diretorio = "./arquivos/"; 

// Substitui espa�os por underscores no nome do arquivo 
$nome = str_replace(" ", "_", $arquivo["name"]); 

// Todas as letras em min�sculo 
$nome = strtolower($nome); 

// Caminho completo do arquivo 
$nome = $diretorio . $nome; 

$arquivo_nome = $arquivo["name"];

// Verifica se o mime-type do arquivo � de imagem


// Tudo ok! Ent�o, move o arquivo 

if(eregi(".exe$", $_FILES["arquivo"]["name"]) or eregi(".com$", $_FILES["arquivo"]["name"]) or eregi(".bat$", $_FILES["arquivo"]["name"])) {
 
    echo "<div align=center>EXTENS�O N�O PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($arquivo['tmp_name'], $nome);
	echo "<div align=center>ARQUIVO ENVIADO!</div><BR>"; 
	echo "<div align=center><a href=index.php>ENVIAR OUTRA MENSAGEM!</a></div>"; 
} 



$data = date ("j/m/Y");
$hora = date ("H:i:s");
$titulo = $_POST["titulo"];


$sql = "INSERT INTO upload (titulo, arquivo, data, hora) VALUES ('$titulo', '$arquivo_nome', '$data', '$hora')";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O seu cadastro foi efetuado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">N�o foi possivel efetuar o seu cadastro!</font></div>";
}
 
?>
<title>ahiuahiu</title>
<LINK href="style.css" type=text/css rel=stylesheet>

<body bgcolor="#f5f5f5" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
