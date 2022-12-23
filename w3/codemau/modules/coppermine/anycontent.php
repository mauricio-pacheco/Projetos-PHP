<?php
// ------------------------------------------------------------------------- //
//  Coppermine Photo Gallery   1.2.0 -nuke                                   //// ------------------------------------------------------------------------- //
//  Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
//  http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
//  New Port by GoldenTroll                                                  //
//  http://coppermine.findhere.org/                                          //
//  Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //                                                                                   
// ------------------------------------------------------------------------- //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
$title = _SELECTLANGUAGE;
starttable('100%', 'Any Content~~ Customized:  '.$title);
?>
<tr><td>
  <table class="tableb" width="100%">
    <tr>
                    <td align="center" valign="top"> 
                         
                    <? 
    global $currentlang;
    $content = "<font class=\"content\">"._SELECTGUILANG."<br>";
    $langdir = dir("language");
    while($func=$langdir->read()) {
        if(substr($func, 0, 5) == "lang-") {
                $menulist .= "$func ";
        }
    }
    closedir($langdir->handle);
    $menulist = explode(" ", $menulist);
    sort($menulist);
    for ($i=0; $i < sizeof($menulist); $i++) {
        if($menulist[$i]!="") {
            $tl = ereg_replace("lang-","",$menulist[$i]);
            $tl = ereg_replace(".php","",$tl);
            $altlang = ucfirst($tl);
            $content .= "<a href=\"{$_SERVER[PHP_SELF]}?{$_SERVER[QUERY_STRING]}&newlang=$tl\">";
            $imge = "images/language/flag-$tl.png";
            if (file_exists($imge)){
            $content .= "<img src=\"$imge\" align=\"middle\" border=\"0\" alt=\"$altlang\" title=\"$altlang\" hspace=\"3\" vspace=\"3\">";
            } else {
            $content .= "$altlang";
            }
            $content .= "</a> ";
        }
    }
    OpenTable();
    echo "<p align=\"center\">$content</p>";
    CloseTable();
    ?>
                    </td></tr>
  </table>
</tr></td>
<?php
endtable();
?>
<!-- début WEBRING : PHPMyRing
<table width="150" border="1" align="center">
  <tr>
    <td align="center" valign="middle" bgcolor="#FF6633">
        Coppermine Galleries WebRing</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
      <script type="text/javascript" src="http://coppermine.findhere.org/webring/lien.php?de=1"></script>
      <a href="http://coppermine.findhere.org/webring/hasard.php" target="_blank">Random Site</a><br>
      <a href="http://coppermine.findhere.org/webring/" target="_blank">List of all sites</a></font>
    </td>
  </tr>
</table> --> 
<!-- fin WEBRING : PHPMyRing -->
