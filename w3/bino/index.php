<?php
$arquivo = "contador.txt";  

if(file_exists($arquivo))
{
   
   $ponteiro = fopen ($arquivo , "r+" );
  
   $contador = fread($ponteiro, filesize($arquivo));
  
   fclose($ponteiro); 
     
   $ponteiro = fopen($arquivo,"w+"); 
   
   $mais = 'teste=';
   
   
   $contador +=1;
   
   $finalera = $contador;
   
   fwrite($ponteiro, $finalera); 
     
   fclose($ponteiro);
   
   
   
}


else{
  
    $ponteiro = fopen ($arquivo, "w");
  
    fwrite($ponteiro, 0);
  
    fclose ($ponteiro);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Binoarte Luminosos</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/AC_RunActiveContent.js" 
type=text/javascript></SCRIPT>
<LINK 
media=screen href="home_arquivos/lytebox.css" type=text/css rel=stylesheet>
<SCRIPT src="home_arquivos/lytebox.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/prototype.lite.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/moo.fx.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/moo.fx.pack.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/style.css" type=text/css rel=stylesheet>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript>
</SCRIPT>
<META content="MSHTML 6.00.5730.13" name=GENERATOR><style type="text/css">
<!--
body {
	background-color: #212121;
}
.style1 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a {
	font-size: 10px;
}
a:hover {
	font-size: 10px;
}
-->
</style></HEAD>
<BODY>
<SCRIPT type=text/javascript>
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','height','600','width','100%','src','capa','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','capa' ); 
</SCRIPT>
<NOSCRIPT>
<OBJECT 
codeBase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0 
height=600 width="100%" classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000><PARAM NAME="movie" VALUE="capa.swf"><PARAM NAME="quality" VALUE="high">
      <embed src="capa.swf" quality="high" 
pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" 
type="application/x-shockwave-flash" width="100%" height="600"></embed>
</OBJECT></NOSCRIPT>
</BODY>
</HTML>