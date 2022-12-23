<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2004 by NukeScripts Network         */
/********************************************************/

$pagetitle = _CATEGORIESADMIN;
include ("header.php");
title(_CATEGORIESADMIN);
dladminmain();
echo "<br>\n";
OpenTable();
$cidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_nsngd_categories WHERE cid='$cid'"));
$cidinfo['cdescription'] = stripslashes($cidinfo['cdescription']);
echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form action='admin.php' method='post'>\n";
echo "<tr><td align='center' colspan='2'><b>"._MODCATEGORY."</b></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._NAME.":</td><td><input type='text' name='title' value='".$cidinfo['title']."' size='50' maxlength='50'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='cdescription' cols='50' rows='10'>".$cidinfo['cdescription']."</textarea></td></t>\n";
$sel0 = $sel1 = $sel2 = $sel3 = "";
if ($cidinfo['whoadd'] == -1) { $sel0 = " selected"; } elseif ($cidinfo['whoadd'] == 0) { $sel1 = " selected"; } elseif ($cidinfo['whoadd'] == 1) { $sel2 = " selected"; } elseif ($cidinfo['whoadd'] == 2) { $sel3 = " selected"; }
echo "<input type='hidden' name='cid' value='$cid'>\n";
echo "<input type='hidden' name='op' value='CategoryModifySave'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._SAVECHANGES."'></td></tr></form>\n";
echo "<form action='admin.php' method='post'>\n";
echo "<input type='hidden' name='cid' value='$cid'>\n";
echo "<input type='hidden' name='op' value='CategoryDelete'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._DL_DELETE."'></td></tr></form>\n";
echo "</table>\n";
CloseTable();
include("footer.php");

?>