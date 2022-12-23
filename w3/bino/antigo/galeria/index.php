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
<?
echo '<link href="estilo.css" rel="stylesheet" type="text/css">';

$nomepasta = arqs . "/";

$pasta = opendir($nomepasta);

$arquivos = array();

echo "<table border=0 width=100% cellspacing=10>";
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

    echo "<tr>
		  <td width=10%><a href=" . $java . "><img src=$imagem width=100 border=0></a></td>
		  <td width=90%>$coment </td>";
echo "</tr>";
} 

?>