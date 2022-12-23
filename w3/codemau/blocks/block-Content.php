<SCRIPT language=JavaScript>
var MS=navigator.appVersion.indexOf("MSIE")
window.isIE4 =(MS>0) && ((parseInt(navigator.appVersion.substring(MS+5,MS+6)) >= 4) && (navigator.appVersion.indexOf("MSIE"))>0)
function checkExpand() {
    if (""!=event.srcElement.id) {
      var ch = event.srcElement.id + "Child"
      var el = document.all[ch] 
      if (null!=el) el.style.display = "none" == el.style.display ? "" : "none"
      event.returnValue=false
    }
  }
</SCRIPT>
<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if (stristr($_SERVER['SCRIPT_NAME'], "block-Content.php")) { 
    Header("Location: ../index.php");
    die();
}

global $prefix, $db, $db2;







$content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='index.php';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> PÁGINA PRINCIPAL</td>
      </tr></table>";
	  
	  $content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Stories_Archive';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Arquivo de Notícias</td>
      </tr></table>";
	  
	  $result3 = $db->sql_query("SELECT * FROM " . $prefix . "_pages WHERE active='1' AND cid='0' ORDER BY title asc");
while ($row3 = $db->sql_fetchrow($result3)) {

$pid3 = intval($row3['pid']);
$numero2 = intval($row3['cid']);
$titulo2 = stripslashes($row3['title']);



$content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Content&amp;pa=showpage&amp;pid=$pid3';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> $titulo2</td>
      </tr></table>";
 }
	  
	  
	  

$result2 = $db->sql_query("SELECT * FROM " . $prefix . "_pages_categories ORDER BY title asc");
while ($row2 = $db->sql_fetchrow($result2)) {
$categoria = stripslashes($row2['title']);
$cidnum = intval($row2['cid']);




$content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td id=HG$cidnum  height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> $categoria</td>
      </tr></table>";
	  
	  
	  $result = $db->sql_query("SELECT * FROM " . $prefix . "_pages WHERE active='1' AND cid='$cidnum' ORDER BY title asc");

$content .= "<DIV id=HG";
	
	$content .= "$cidnum";
	
	$content .= "Child style=\"DISPLAY: none\">";

while ($row = $db->sql_fetchrow($result)) {


$pid = intval($row['pid']);
$numero = intval($row['cid']);
$titulo = stripslashes($row['title']);
    

	$content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td id=HG$cid height=24 bordercolor=#A7D2EF bgcolor=#9BD7FF onClick=\"window.location='modules.php?name=Content&amp;pa=showpage&amp;pid=$pid';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#9BD7FF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> $titulo</td>
      </tr></table>";
	  
	  
	  }
	  $content .= "</div>";
	}
	
	
	
	
	$content .= "<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Downloads';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Publicações</td>
      </tr></table>
	
	
	<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Potenciais';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Potenciais Turísticos</td>
      </tr></table>
	
	
	<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Calendar';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Eventos Regionais</td>
      </tr></table>
	
	
	<table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=coppermine';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Galeria de Fotos</td>
      </tr></table>
	  
	  
	  <table width=175 border=0 cellpadding=3 cellspacing=1 bordercolor=#FFFFFF class=cinza_esc11 style=margin-bottom:4px>
      <tr>
        <td height=24 bordercolor=#A7D2EF bgcolor=#D5EEFF onClick=\"window.location='modules.php?name=Feedback';\" onMouseOver=\"this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'\" onMouseOut=\"this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';\"> <STRONG><img src=caxeta.gif /></STRONG> Fale Conosco</td>
      </tr></table>";

?>