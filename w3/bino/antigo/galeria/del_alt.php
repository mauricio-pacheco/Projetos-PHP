<?

echo '<link href="estilo.css" rel="stylesheet" type="text/css">';

$nomepasta = arqs . "/";

$pasta = opendir($nomepasta);

$arquivos = array();
echo "<p align=left><font size=2><b> Administração </font></b></p>";

echo "<table border=1 width=100%>";
while ($arquivo = readdir($pasta)) {

    $caminho = $nomepasta.$arquivo;
	
    if (is_file($caminho)) {
		
		
        $data_modificacao = $arquivo; 

        $arquivos[$data_modificacao] = $arquivo; 

    }

}

krsort($arquivos);

foreach ($arquivos as $arquivo) {

	include("arqs/$arquivo");

    echo "<tr>
		  <td width=25% align=center><img src=$imagem width=100>
		  <td width=25%>$coment </td>
		  <td width=25% align=center><a href=alterar.php?arquivo=$arquivo>Alterar</a></td>
		  <td width=25% align=center><a href=deletar.php?arquivo=$arquivo>Deletar</a></td>";
echo "</tr>";
} 

?>