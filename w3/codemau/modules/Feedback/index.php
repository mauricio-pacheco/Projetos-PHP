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

$form_block = "<center><br><font class=\"content\">"._FEEDBACKNOTE."</font><br><br><font class=\"content\">* Campos Obrigatórios</font><br><br>

<iframe marginwidth='0' marginheight='0' src='http://www.casadaweb.net/codemau/envio/enviando.php' frameborder='0' width='560' scrolling='no' height='510'></iframe>";
	










OpenTable();
    echo "<center><img src='tfale.jpg'></center>\n";
	CloseTable();
OpenTable();
if ($opi != "ds") {
    echo "$form_block";
} elseif ($opi == "ds") {
    if ($send != "no") {
	# Aqui vai o cosmos
	
	
$sender_name = utf8_decode($_POST['sender_name']);
$sender_email = utf8_decode($_POST['sender_email']);
$sender_cidade = utf8_decode($_POST['sender_cidade']);
$message = utf8_decode($_POST['message']);

$mensagem .= "<b>DADOS DO CONTATO:</b><br><br>";
$mensagem .= "<b>Nome:</b> \t$sender_name<BR>";
$mensagem .= "<b>E-mail:</b> \t$sender_email<BR>";
$mensagem .= "<b>Telefone:</b> \t$sender_cidade<BR>";
$mensagem .= "<b>Mensagem:</b> \t$message<BR>";
 
//$mensagem = "$msg";
$remetente = "$sender_email";
$destinatario = "mandrymaster@bol.com.br";
$assunto = utf8_decode("FORMULÁRIO DE CONTATO CODEMAU");
$headers = "From: ".$remetente."\nContent-type: text/html"; # o &lsquo;text/html&rsquo; &eacute; o tipo mime da mensagem
 
if(!mail($destinatario,$assunto,$mensagem,$headers)){
 

 
}
	
	
	
	
	
	
	
	
	
	
	
	
	
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