<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2004 by NukeScripts Network         */
/********************************************************/

$pagetitle = _DOWNLOADSADMIN;
include("header.php");
$numrows = $db->sql_numrows($db->sql_query("SELECT url FROM ".$prefix."_nsngd_downloads WHERE url='$url'"));
title($pagetitle);
dladminmain();
echo "<br>\n";
OpenTable();
if ($numrows>0) {
  echo "<center><font class='content'><b>"._ERRORURLEXIST."</b></center><br>";
  echo "<center>"._GOBACK."</center>";
} else {
  /* Check if Title exist */
  if ($title=="") {
    echo "<center><font class='content'><b>"._ERRORNOTITLE."</b></center><br>";
    echo "<center>"._GOBACK."</center>";
  }
  /* Check if URL exist */
  if ($url=="") {
    echo "<center><font class='content'><b>"._ERRORNOURL."</b></center><br>";
    echo "<center>"._GOBACK."</center>";
  }
  // Check if Description exist
  if ($description=="") {
    echo "<center><font class='content'><b>"._ERRORNODESCRIPTION."</b></center><br>";
    echo "<center>"._GOBACK."</center>";
  }
  $title = stripslashes(FixQuotes($title));
  
 $servidor = "www.fredericowestphalen.rs.gov.br";
$usuario = "ct00052235-001";
$senha = "javatuny";

$con = ftp_connect($servidor) or die("Erro ao conectar");
$log = ftp_login($con, $usuario, $senha) or die("Erro ao conectar com usu�rio e senha");
 
 
$nome_f = $_FILES['url']['name'];
$nome_t = $_FILES['url']['tmp_name'];
$size_f = $_FILES['url']['size'];
$size_p = 40240000; //10 MB
$info_f = pathinfo($nome_f);
$exte_f = $info_f['extension'];

//Extens�es permitidas
$exte_p = array("jpg", "jpeg", "pdf", "doc", "docx", "xls", "zip", "rar", "txt", "php", "ppt"); 
$dir = "/htdocs/fw/loads/";

$tamanho = isset($_FILES['url']['size']) ? $_FILES['url']['size'] : FALSE; 
if($size_f <= $size_p) {
if(in_array($exte_f, $exte_p)) {
if(ftp_put($con, $dir . $nome_f, $nome_t, FTP_BINARY)) {

echo "<br><center>Arquivo <b>" . $nome_f . "</b> enviado com sucesso!</center><br>";
}else{
echo "<br><center>Erro ao enviar o arquivo " . $nome_f . "!</center><br>";
}
}else{
echo "<br><center>Extens�o inv�lida!</center><br>";
}
}else{
echo "<br><center>Tamanho excedido!<br>Tamanho permitido: <b>" . ceil($size_p / 1024 / 1024) . "MB</b></center><br>";
} 
  
 

ftp_close($con);


  $description = stripslashes(FixQuotes($description));
  $sname = stripslashes(FixQuotes($sname));
  $email = stripslashes(FixQuotes($email));
  $sub_ip = $_SERVER['REMOTE_ADDR'];
  if ($submitter == "") { $submitter = $aname; }
  $db->sql_query("INSERT INTO ".$prefix."_nsngd_downloads VALUES (NULL, '$cat', '$perm', '$title', '$nome_f', '$description', now(), '$sname', '$email', '$hits', '$submitter', '$sub_ip', '$tamanho', '$version', '$homepage', '1')");
  echo "<br><center><font class='option'>"._NEWDOWNLOADADDED."<br><br>";
  echo "[ <a href='admin.php?op=Downloads'>"._DOWNLOADSADMIN."</a> ]</center><br><br>";
  if ($new==1) {
    $result = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_nsngd_accesses WHERE username='$sname'"));
    if ($result < 1) {
      $db->sql_query("INSERT INTO ".$prefix."_nsngd_accesses VALUES ('$sname', 0, 1)");
    } else {
      $db->sql_query("UPDATE ".$prefix."_nsngd_accesses SET uploads=uploads+1 WHERE username='$submitter'");
    }
    $db->sql_query("DELETE FROM ".$prefix."_nsngd_new WHERE lid='$lid'");
    if ($email!="") {
      $subject = ""._YOURDOWNLOADAT." $sitename";
      $message = ""._HELLO." $sname:\n\n"._DL_APPROVEDMSG."\n\n"._TITLE.": $title\n"._URL.": $url\n"._DESCRIPTION.": $description\n\n\n"._YOUCANBROWSEUS." $nukeurl/modules.php?name=$module_name\n\n"._THANKS4YOURSUBMISSION."\n\n$sitename "._TEAM."";
      $from = "$sitename";
      @mail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
    }
  }
  }
CloseTable();
include("footer.php");

?>