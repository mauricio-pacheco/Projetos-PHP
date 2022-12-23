<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2004 by NukeScripts Network         */
/********************************************************/

if (!isset($min)) { $min = 0; }
$pagetitle = _DOWNLOADSADMIN." - "._MODDOWNLOAD;
include ("header.php");
title($pagetitle);
dladminmain();
echo "<br>\n";
OpenTable();
$lidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_nsngd_downloads WHERE lid='$lid'"));
if ($lidinfo['submitter'] == "") { $lidinfo['submitter'] = $anonymous; }
$lidinfo['homepage'] = ereg_replace("http://","",$lidinfo['homepage']);
if ($lidinfo['homepage'] != "") { $lidinfo['homepage'] = "http://".$lidinfo['homepage']; }
$lidinfo['title'] = stripslashes($lidinfo['title']);
$lidinfo['description'] = stripslashes($lidinfo['description']);
echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form action='admin.php' enctype='multipart/form-data' method='post'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._DOWNLOADID.":</td><td><b>$lid</b></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._TITLE.":</td><td><input type='text' name='title' value='".$lidinfo['title']."' size='50' maxlength='100'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._URL.":</td><td><input type='file' name='url' size='50' >&nbsp;</td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._CATEGORY.":</td><td><select name='cat'><option value='0'";
if ($lidinfo['cid'] == 0) { echo " selected"; }
echo ">"._DL_NONE."</option>\n";
$result2 = $db->sql_query("SELECT * FROM ".$prefix."_nsngd_categories ORDER BY parentid,title");
while($cidinfo = $db->sql_fetchrow($result2)) {
  if ($cidinfo['cid']==$lidinfo['cid']) { $sel = " selected"; } else { $sel = ""; }
  if ($cidinfo['parentid'] != 0) $cidinfo['title'] = getparent($cidinfo['parentid'],$cidinfo['title']);
  echo "<option value='".$cidinfo['cid']."'$sel>".$cidinfo['title']."</option>\n";
}
echo "</select></td></tr>\n";
$sel1 = $sel2 = $sel3 = "";
if ($lidinfo['sid'] == 0) { $sel1 = " selected"; } elseif ($lidinfo['sid'] == 1) { $sel2 = " selected"; } elseif ($lidinfo['sid'] == 2) { $sel3 = " selected"; }
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='description' cols='60' rows='10'>".$lidinfo['description']."</textarea></td></tr>\n";
echo "<input type='hidden' name='op' value='DownloadModifySave'>\n";
echo "<input type='hidden' name='lid' value='$lid'>\n";
echo "<input type='hidden' name='min' value='$min'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._MODIFY."'></td></tr>\n";
echo "</form>\n<form action='admin.php' method='post'>\n";
echo "<input type='hidden' name='op' value='DownloadDelete'>\n";
echo "<input type='hidden' name='lid' value='$lid'>\n";
echo "<input type='hidden' name='min' value='$min'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._DL_DELETE."'></td></tr>\n";
echo "</form>\n</table>\n";
CloseTable();
include ("footer.php");

?>