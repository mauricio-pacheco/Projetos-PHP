<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2004 by NukeScripts Network         */
/********************************************************/

$pagetitle = _DOWNLOADSADMIN.": "._ADDDOWNLOAD;
include("header.php");
title($pagetitle);
dladminmain();
echo "<br>\n";
OpenTable();
echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form action='admin.php' enctype='multipart/form-data' method='post'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._TITLE.":</td><td><input type='text' name='title' size='50' maxlength='100'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>Selecione o arquivo:</td><td><input type='file' name='url' size='50'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._CATEGORY.":</td><td><select name='cat'>";
$result2 = $db->sql_query("SELECT * FROM ".$prefix."_nsngd_categories ORDER BY parentid,title");
while($cidinfo = $db->sql_fetchrow($result2)) {
  if ($cidinfo['parentid'] != 0) $cidinfo['title'] = getparent($cidinfo['parentid'],$cidinfo['title']);
  echo "<option value='".$cidinfo['cid']."'>".$cidinfo['title']."</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION."</td><td><textarea name='description' cols='50' rows='5'></textarea></td></tr>\n";
echo "<input type='hidden' name='op' value='DownloadAddSave'>\n";
echo "<input type='hidden' name='new' value='0'>\n";
echo "<input type='hidden' name='lid' value='0'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._ADDDOWNLOAD."'></td></tr>\n";
echo "</form>\n</table>\n";
CloseTable();
include("footer.php");

?>