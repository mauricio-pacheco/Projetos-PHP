<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2004 by NukeScripts Network         */
/********************************************************/

$pagetitle = _CATEGORIESADMIN.": "._ADDCATEGORY;
include("header.php");
title($pagetitle);
dladminmain();
echo "<br>\n";
OpenTable();
echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form method='post' action='admin.php'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._NAME.":</td><td><input type='text' name='title' size='50' maxlength='50'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PARENT."</td><td><select name='cid'><option value='0' selected>"._DL_NONE."</option>\n";
$result = $db->sql_query("SELECT cid, title, parentid FROM ".$prefix."_nsngd_categories WHERE parentid='0' ORDER BY title");
while($cidinfo = $db->sql_fetchrow($result)) {
  $crawled = array($cidinfo['cid']);
  CrawlLevel($cidinfo['cid']);
  $x=0;
  while ($x <= (sizeof($crawled)-1)) {
    list($title,$parentid) = $db->sql_fetchrow($db->sql_query("SELECT title, parentid FROM ".$prefix."_nsngd_categories WHERE cid='$crawled[$x]'"));
    if ($x > 0) { $title = getparent($parentid,$title); }
    echo "<option value='$crawled[$x]'>$title</option>\n";
    $x++;
  }
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='cdescription' cols='50' rows='5'></textarea></td></tr>\n";
echo "<input type='hidden' name='op' value='CategoryAddSave'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._ADDCATEGORY."'></td></tr>\n";
echo "</form>\n</table>\n";
CloseTable();
include("footer.php");

?>