<?php
$nick = isset($_POST['nick']) ? $_POST['nick'] : '';
?>
<html>
<head>
<title>IrcFest Bate Papo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#000000" text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<div align="center">
  <applet code=IRCApplet.class archive="irc.jar,pixx.jar" width=100% height=100%>
    <param name="CABINETS" value="irc.cab,securedirc.cab,pixx.cab">
    <?php
echo "<param name=\"nick\" value=\"".$nick."\">\n";
?> 
	<param name="pixx:helppage" value="http://www.luzealegria.com.br">
	<param name="command1" value="/j #am1160">
	<param name="alternatenick" value="Visitante">
    <param name="name" value="Usuário">
    <param name="host" value="201.15.150.178">
    <param name="gui" value="pixx">
    <param name="quitmessage" value="Obrigado até mais!">
    <param name="asl" value="true">
    <param name="useinfo" value="true">
    <param name="style:bitmapsmileys" value="true">
    <param name="style:smiley1" value=":) img/sourire.gif">
    <param name="style:smiley2" value=":-) img/sourire.gif">
    <param name="style:smiley3" value=":-D img/content.gif">
    <param name="style:smiley4" value=":d img/content.gif">
    <param name="style:smiley5" value=":-O img/OH-2.gif">
    <param name="style:smiley6" value=":o img/OH-1.gif">
    <param name="style:smiley7" value=":-P img/langue.gif">
    <param name="style:smiley8" value=":p img/langue.gif">
    <param name="style:smiley9" value=";-) img/clin-oeuil.gif">
    <param name="style:smiley10" value=";) img/clin-oeuil.gif">
    <param name="style:smiley11" value=":-( img/triste.gif">
    <param name="style:smiley12" value=":( img/triste.gif">
    <param name="style:smiley13" value=":-| img/OH-3.gif">
    <param name="style:smiley14" value=":| img/OH-3.gif">
    <param name="style:smiley15" value=":'( img/pleure.gif">
    <param name="style:smiley16" value=":$ img/rouge.gif">
    <param name="style:smiley17" value=":-$ img/rouge.gif">
    <param name="style:smiley18" value="(H) img/cool.gif">
    <param name="style:smiley19" value="(h) img/cool.gif">
    <param name="style:smiley20" value=":-@ img/enerve1.gif">
    <param name="style:smiley21" value=":@ img/enerve2.gif">
    <param name="style:smiley22" value=":-S img/roll-eyes.gif">
    <param name="style:smiley23" value=":s img/roll-eyes.gif">
    <param name="style:backgroundimage" value="true">
    <param name="style:backgroundimage1" value="all all 0 img/background.gif">
    <param name="style:sourcefontrule1" value="all all Serif 12">
    <param name="style:floatingasl" value="true">
    <param name="pixx:timestamp" value="true">
    <param name="pixx:highlight" value="true">
    <param name="pixx:highlightnick" value="true">
    <param name="pixx:nickfield" value="true">
    <param name="pixx:styleselector" value="true">
    <param name="pixx:setfontonstyle" value="true">
  </applet>
  <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">ATEN&Ccedil;&Atilde;O: 
  Para abrir o nosso chat &eacute; necess&aacute;rio ter o aplicativo JAVA MACHINE 
  em seu computador. Caso n&atilde;o tenha <a href="http://www.java.com/pt_BR/download/ie_auto.jsp" target=_blank class=txtboldgrey>CLIQUE 
  AQUI</a>.</font></div>
</body>
</html>

