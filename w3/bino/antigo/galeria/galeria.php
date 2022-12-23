<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/modelo.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Binoarte Luminisos</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style10 {
	font-family: verdana;
	font-size: 10px;
	color: #666666;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="776" height="380">
                <param name="movie" value="../galeria.swf" />
                <param name="quality" value="high" />
                <embed src="../galeria.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="776" height="380"></embed>
              </object></td>
            </tr>
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="160" valign="top" bgcolor="#F3F1E2" scope="col">&nbsp;</td>
                  <td width="3" valign="top" background="ponto.gif" bgcolor="#F3F1E2" scope="col">&nbsp;</td>
                  <td width="614" valign="top" bgcolor="#F3F1E2" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <script language="JavaScript" type="text/javascript">
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

$i = 0;

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

    echo "<td>
		  <td width=100 ><a href=" . $java . "><img src=$imagem width=100 border=0></a></td>
		  <td valign=top>$coment </td>";
		  
		  $i = $i + 1;

	if ($i == "2") 
	{ $i = 0; echo"</tr><tr>"; }
	
echo "</td>";
} 

?>
                      </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td valign="top"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="776" height="45">
                <param name="movie" value="../rodape.swf" />
                <param name="quality" value="high" />
                <embed src="../rodape.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="776" height="45"></embed>
              </object></td>
            </tr>
          </table></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="20" valign="top" background="../rodape.jpg"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td scope="col"><span class="style10">
          <?php //include("../index.php"); //?>
          visitantes desde abril de 2007.</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
