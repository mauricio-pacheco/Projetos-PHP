<?php include ('auth.php') ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<?
$dados        = file("../../cepcusto.dat");
$dadosc        = count($dados);
print        "<font face=\"verdana\" size=1>";
        for($x=1;$x<$dadosc;$x++){
                $campos = explode(" ",$dados[$x]);
                print "UF$campos[0] - Valor".str_replace("#","",$campos[1])."\n<br>";
        }
print        "</font>";
?>
</body>
</html>