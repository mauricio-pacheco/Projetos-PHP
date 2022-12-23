<html>
<head>
<title>Fotos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body class="TextoPreto">
 <?
$teste = $_GET['teste'];
$width = $_GET['width'];
$coment = $_GET['coment']; 


echo"<table width=100% height=100% border=0 cellspacing=0 cellpadding=0>";

echo "<tr><td align=center valign=center><img src=$teste width=$width border=0></td></tr>"; 
?>

</body>
</html>
