<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2004 by NukeScripts Network         */
/********************************************************/

if (!isset($min)) { $min = 0; }
$title = stripslashes(FixQuotes($title));


$url = isset($_FILES['url']) ? $_FILES['url'] : FALSE; 
  $tamanho = isset($_FILES['url']['size']) ? $_FILES['url']['size'] : FALSE; 
  $diretorio = "./loads/";
  $arquivo = str_replace(" ", "_", $url["name"]); 
  $arquivo = strtolower($arquivo); 
  $arquivo = $diretorio . $arquivo;
  $arquivo = $diretorio . $url["name"]; 
  $retarda = $url["name"]; 
  if (move_uploaded_file($url['tmp_name'], $arquivo)) { 
    echo ""; 
} 
else { 
    echo ""; 
}



$description = stripslashes(FixQuotes($description));
$name = stripslashes(FixQuotes($name));
$email = stripslashes(FixQuotes($email));
$db->sql_query("UPDATE ".$prefix."_nsngd_downloads SET cid='$cat', sid='$perm', title='$title', url='$retarda', description='$description', name='$rname', email='$email', hits='$hits', filesize='$tamanho', version='$version', homepage='$homepage' WHERE lid='$lid'");
Header("Location: admin.php?op=Downloads&min=$min");

?>