<style>
body {
	background-color: transparent;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<body>
<?
$nomepasta = arqs . "/"; 

$pasta = opendir($nomepasta);

$arquivos = array();

$i = "0";

while ($arquivo = readdir($pasta)) {

    $caminho = $nomepasta.$arquivo; 

    if (is_file($caminho)) {

        $data_modificacao = filemtime($caminho).md5($arquivo); 

        $arquivos[$data_modificacao] = $arquivo; 

    }



}

ksort($arquivos); 

foreach ($arquivos as $arquivo) {

	include("arqs/$arquivo");

    echo "<img src=$imagem border=0>";

	$i = $i + 1;

	if ($i == "1") 

	{ break; }

}

?>
