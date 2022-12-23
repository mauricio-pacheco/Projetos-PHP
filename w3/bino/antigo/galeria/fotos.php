<html>
<head>
<title>Visualisa Fotos</title>
<link href="estilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<script language="JavaScript" type="text/JavaScript">
function MM_openBrWindow(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
  }
  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}
</script>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td valign="top"><?

$nomepasta = arqs . "/"; 

$pasta = opendir($nomepasta);

$arquivos = array();

$i = 0;

echo"<table width=100% border=0 cellspacing=10 cellpadding=0>";

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
$img = $imagem;
$imagem_size = getimagesize($imagem);
if($imagem_size[0] > "640") {
	$img_w = "480";
	$img_h = "480";
	$larg = "640";
	}
else {
$img_w = $imagem_size[0];
$img_h = $imagem_size[1] + 30;
$larg = $imagem_size[0] + 30;
}
$java = "javascript:MM_openBrWindow('ver.php?teste=" . $img . "&width=" .$img_w. "','','scrollbars=no','". $larg ."','" . $img_h ."','true')";
	echo "<tr align=center valign=bottom>
<a href=" . $java . "><img src=$imagem width=100 border=0></a>"; 

	$i = $i + 1;

	if ($i == "4") 
	{ $i = 0; echo"</tr><tr>"; }
}
echo"</tr></table>";
?></td>
  </tr>
</table>
</body>
</html>
