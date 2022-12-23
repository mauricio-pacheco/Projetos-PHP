<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
define('DISPLAYIMAGE_PHP', true);
define('NO_HEADER', true);
require("modules/" . $name . "/include/load.inc.php");

if (phpversion() <= '4.0.6') {
    $_GET = ($HTTP_GET_VARS);
} 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $lang_fullsize_popup["click_to_close"] ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="<? echo $CPG_M_DIR;?>/themes/default/style.css" />
<meta http-equiv="imagetoolbar" content="no">
<script type="text/javascript" src="<? echo $CPG_M_DIR;?>/scripts.js"></script>
<style type="text/css">
<!--
.imgtbl {  position: absolute; left: 0px; top: 0px; overflow: scroll; }
-->
</style>


</head>
<!-- <body>
<a href="javascript:self.close();" title="<? echo $lang_fullsize_popup["click_to_close"];?>"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="2" class="imgtbl">
-->
<body onClick="self.close()">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="2" class="imgtbl" title="<?= $lang_fullsize_popup["click_to_close"];?>">
     <td align="center" valign="middle"> 
          <table cellspacing="2" cellpadding="0" style="border: 1px solid #000000; background-color: #FFFFFF;">
               <td> 
<?php 
if (isset($picfile)) {
    $picname = $CONFIG['fullpath'] . $picfile;
    $imagesize = @getimagesize($picname);
    echo "<img src=\"" . path2url($picname) . "\" $imagesize[3] class=\"image\" border=\"0\" alt=\"$picfile\"/><br />\n"; 
} elseif (isset($pid)) {
    $result = db_query("SELECT * from {$CONFIG['TABLE_PICTURES']} where pid='$pid'");
    $row = mysql_fetch_array($result);
    $pic_url = get_pic_url($row, 'fullsize');
    $geom = 'width="' . $row['pwidth'] . '" height="' . $row['pheight'] . '"'; 
    print '<img src="' . $pic_url . '" ' . $geom . ' class="image" border="0" alt="' . $lang_fullsize_popup["click_to_close"] . '">';
} 

?>
               </td>
          </table>
     </td>
</table><!-- </a> -->
<script language="JavaScript" type="text/javascript">
</script>
</body>
</html>
