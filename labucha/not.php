<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="form.css" type=text/css rel=stylesheet>
</head>
<body bgcolor="#151515">
<p><font color="#000000"><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">NOT&Iacute;CIAS 
  GERAIS</font></strong></font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://feeds.folha.uol.com.br/folha/brasil/rss091.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://oglobo.globo.com/rss/plantaopais.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag2($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag2($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font></p>
<p><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOT&Iacute;CIAS 
  DINHEIRO</strong></font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://feeds.folha.uol.com.br/folha/dinheiro/rss091.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag3($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag3($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font></p>
<p><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOT&Iacute;CIAS 
  EDUCA&Ccedil;&Atilde;O</strong></font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://feeds.folha.uol.com.br/folha/educacao/rss091.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag4($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag4($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font></p>
<p><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOT&Iacute;CIAS 
  ESPORTES</strong></font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://feeds.folha.uol.com.br/folha/esporte/rss091.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag18($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag18($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font></p>
<p><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOT&Iacute;CIAS 
  INFORM&Aacute;TICA</strong></font></p>
<p> <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php 
$feed = 'http://info.abril.com.br/aberto/infonews/rssnews.xml'; 

ini_set('allow_url_fopen', true); 
$fp = fopen($feed, 'r'); 
$xml = ''; 
while (!feof($fp)) { 
    $xml .= fread($fp, 128); 
} 
fclose($fp); 

function untag22($string, $tag) 
{ 
    $tmpval = array(); 
    $preg = "|<$tag>(.*?)</$tag>|s"; 
    preg_match_all($preg, $string, $tags); 
    foreach ($tags[1] as $tmpcont){ 
        $tmpval[] = $tmpcont; 
    } 
    return $tmpval; 
} 

$items = untag22($xml, 'item'); 

$html = '<p align="left">'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
    $html .= '<font face="Verdana" size="1" class=txtboldgreynovonot><img src="setup.gif" width="10" height="13">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
  </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font></p>
</body>
</html>
