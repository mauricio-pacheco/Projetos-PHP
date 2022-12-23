<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Audios Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<div align="center">
  <p class="style1"><a href="../admin.php" target=_top><img src=administrador.jpg border=0 /></a><br /><a href="../admin.php" target="_top">VOLTAR A ADMINISTRAÇÃO</a></p>
  <p class="style1">JORNAL LUZ E ALEGRIA</p>
  <p class="style1"><span class="style2"><a href="index.php">ENVIAR PDF</a> ------ <a href="deletaraudios.php">APAGAR PDF</a></span></p>
</div>
<tr>
    <td><p align="left">

      </p> 
      <div align="center">
        <?
include "conexao.php";

$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "../jornalenv/"; 

// Substitui espaços por underscores no nome do arquivo 
$nome = str_replace(" ", "_", $arquivo["name"]); 

// Todas as letras em minúsculo 
$nome = strtolower($nome); 

// Caminho completo do arquivo 
$nome = $diretorio . $nome; 

$arquivo_nome = $arquivo["name"];

// Verifica se o mime-type do arquivo é de imagem


// Tudo ok! Então, move o arquivo 

if(eregi(".exe$", $_FILES["arquivo"]["name"]) or eregi(".com$", $_FILES["arquivo"]["name"]) or eregi(".bat$", $_FILES["arquivo"]["name"])) {
 
    echo "<div align=center>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($arquivo['tmp_name'], $nome);
	echo "<div align=center>ARQUIVO ENVIADO!</div><BR>"; 
	
} 

$titulo = $_POST["titulo"];
$fonte = $_POST["fonte"];
$tamanho = $_POST["tamanho"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$sql = "INSERT INTO jornal (titulo, fonte, tamanho, arquivo, data, hora) VALUES ('$titulo', '$fonte', '$tamanho', '$arquivo_nome', '$data', '$hora')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">O SEU PDF FOI CADASTRADO COM SUCESSO!!</font></div>";
}else{
echo "<div align=center><br><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</font></div>";
}
 
?></div>
      <p align="center">&nbsp;</p>
    </td>
  </tr>
</table>
</body>
</html>
