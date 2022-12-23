<LINK REL="StyleSheet" HREF="themes/Helius/style/style.css" TYPE="text/css">
<MARQUEE behavior="scroll" align="center" direction="up" height="180" scrollamount="1" scrolldelay="10" onmouseover='this.stop()' onmouseout='this.start()'>
<div align="center"><img src="relacoes.gif" /></div>
<?php 
$feed = 'http://www.estado.rs.gov.br/rss/rss.php?id_canal=127
'; 

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

$html = '<p>'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
	$link = str_replace("<![CDATA[", " ", $link);
    $link = str_replace("]]>", " ", $link);
$html .= '&nbsp;<font face="Verdana" size="1"><img src="bala.gif" width="9" height="9">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
<div align="center"><img src="ultimas.gif" /></div>
<?php 
$feed = 'http://www.estado.rs.gov.br/rss/rss.php?id_canal=130'; 

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

$html = '<p>'; 
foreach ($items as $item) { 
    $title = untag2($item, 'title'); 
    $link = untag2($item, 'link'); 
	$link = str_replace("<![CDATA[", " ", $link);
    $link = str_replace("]]>", " ", $link);
    $html .= '&nbsp;<font face="Verdana" size="1"><img src="bala.gif" width="9" height="9">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . "</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
</marquee>