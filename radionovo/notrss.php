<LINK REL="StyleSheet" HREF="themes/Helius/style/style2.css" TYPE="text/css">
<MARQUEE behavior="scroll" align="center" direction="up" height="300" scrollamount="1" scrolldelay="10" onmouseover='this.stop()' onmouseout='this.start()'>
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

$html = '<p>'; 
foreach ($items as $item) { 
    $title = untag($item, 'title'); 
    $link = untag($item, 'link'); 
	$link = str_replace("<![CDATA[", " ", $link);
    $link = str_replace("]]>", " ", $link);
$html .= '<font face="Verdana" size="1"><img src="bala.gif">&nbsp;<a href="' . $link[0] . '" target="_blank">' . $title[0] . ".</a></font><br><br />\n"; 
} 
$html .= '</p>'; 

echo $html; 
?>
</marquee>