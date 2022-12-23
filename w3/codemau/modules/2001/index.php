<?php

# $Author: chatserv $
# $Date: 2004/12/08 00:10:31 $
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Based on php Addon Feedback 1.0                                      */
/* Copyright (c) 2001 by Jack Kozbial                                   */
/* http://www.InternetIntl.com                                          */
/* jack@internetintl.com                                                */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if (!stristr($_SERVER['SCRIPT_NAME'], "modules.php")) {
    die ("You can't access this file directly...");
}

require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

/**********************************/
/* Configuration                  */
/*                                */
/* You can change this:           */
/* $index = 0; (right side off)   */
/**********************************/
$index = 1;
$subject = "$sitename "._FEEDBACK."";
/**********************************/

include("header.php");
$cookie[0] = intval($cookie[0]);
if ($cookie[1] != "") {
    $row = $db->sql_fetchrow($db->sql_query("SELECT name, username, user_email FROM ".$user_prefix."_users WHERE user_id='$cookie[0]'"));
    if ($row['name'] != "") {
	$sender_name = $row['name'];
    } else {
	$sender_name = $row['username'];
    }
    $sender_email = $row['user_email'];
}

$form_block = "<center>Segue abaixo o Relatório de Atividades - Gestão 2001/2003.</center><br><table width=100% border=0>
  <tr>
    <td><div align=center><img src=capa2001.jpg border=1 /></div></td>
    <td><div align=center><img src=capa22001.jpg border=1 /></div></td>
  </tr>
</table>
<form id=form1 name=form1 method=get action='2001-2003.pdf' target=_blank>
  <label>
  <div align=center>
    <input type=submit name=Submit value='Fazer Download do Relatório' />
  </div>
  </label>
</form>";



  # <FORM METHOD=\"post\" ACTION=\"modules.php?name=$module_name\">
  #  <P>
  #  Seu nome completo: <INPUT type=\"text\" NAME=\"sender_name\" VALUE=\"$sender_name\" SIZE=50></p>
  #  Cidade: <INPUT type=\"text\" NAME=\"sender_name\" VALUE=\"$sender_name\" SIZE=50></p>
  #  <P>Seu E-mail: 
  #  <INPUT type=\"text\" NAME=\"sender_email\" VALUE=\"$sender_email\" SIZE=40></p>
  #  <P>Deixa abaixo sua mensagem: <br>
  #  <TEXTAREA NAME=\"message\" COLS=80 ROWS=14 WRAP=virtual>$message</TEXTAREA></p>
  #  <INPUT type=\"hidden\" name=\"opi\" value=\"ds\">
  #  <P><INPUT TYPE=\"submit\" NAME=\"submit\" VALUE=\"ENVIAR FORMULÁRIO\"></p>
  #  </FORM></center>
	










OpenTable();
    echo "<center><img src='2001.jpg'></center>\n";
	CloseTable();
OpenTable();
if ($opi != "ds") {
    echo "$form_block";
} elseif ($opi == "ds") {
    if ($sender_name == "") {
	$name_err = "<center><font class=\"option\"><b><i>"._FBENTERNAME."</i></b></font></center><br>";
	$send = "no";
    } 
    if ($sender_email == "") {
	$email_err = "<center><font class=\"option\"><b><i>"._FBENTEREMAIL."</i></b></font></center><br>";
	$send = "no";
    } 
    if ($message == "") {
    	$message_err = "<center><font class=\"option\"><b><i>"._FBENTERMESSAGE."</i></b></font></center><br>";
	$send = "no";
    } 
    if ($send != "no") {
	$sender_name = removecrlf($sender_name);
	$sender_email = removecrlf($sender_email);
	$msg = "$sitename\n\n";
	$msg .= ""._SENDERNAME.": $sender_name\n";
	$msg .= ""._SENDEREMAIL.": $sender_email\n";
	$msg .= ""._MESSAGE.": $message\n\n";
	$to = $adminmail;
	$mailheaders = "From: $sender_name <$sender_email>\n";
	$mailheaders .= "Reply-To: $sender_email\n\n";
	mail($to, $subject, $msg, $mailheaders);
	echo "<P><center>"._FBMAILSENT."</center></p>";
	echo "<P><center>"._FBTHANKSFORCONTACT."</center></p>";
    } elseif ($send == "no") {
	OpenTable2();
	echo "$name_err";
	echo "$email_err";
	echo "$message_err";
	CloseTable2();
	echo "<br><br>";
	echo "$form_block";  
    } 
}

CloseTable();   
include("footer.php");
# $Log: index.php,v $
# Revision 1.2  2004/12/08 00:10:31  chatserv
# http://www.nukefixes.com/ftopicp-3479.html#3479
#
# Revision 1.1  2004/10/05 18:04:51  chatserv
# Initial CVS Addition
#

?>