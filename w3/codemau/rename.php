<?php

require_once("config.php");

function main() {
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<LINK REL="StyleSheet" HREF="http://phpnuke.org.br/themes/fisubice/style/style.css" TYPE="text/css">
<title>CNB - Script para alterar o prefixo das tabelas do Banco de DadosChange prefrix</title>
</head>
<body topmargin="0" leftmargin="0">
<center>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td align="center" background="http://phpnuke.org.br/themes/fisubice/images/cellpic_bkg.jpg" height="101" valign="top">
<img src="http://phpnuke.org.br/images/altera_prefixo.jpg" border="0">
</td></tr>
<tr>
<td background="http://phpnuke.org.br/themes/fisubice/images/bar.jpg" height="8" nowrap colspan="3"></td>
</tr>
<tr><td><h3 align="center"><br>Este script foi escrito para alterar o<br>prefixo das tabelas em
<br>
Bancos de Dados PHP-Nuke, versões 6.x-7.x</h3></td>
<tr>
<td background="http://phpnuke.org.br/themes/fisubice/images/bar.jpg" height="8" nowrap colspan="3">
</td>
</tr>
<tr>
<td align="center">Ele o ajudará a alterar o prefixo das tabelas de seu Banco de Dados, fornecendo uma maior 
proteção contra ataques de Injeção SQL e SL Flood.</td></tr>
<tr><td align="center"><br>Este script irá alterar <b>TODOS</b> os prefixos no Banco de Dados.<br><br>Há 
alguns raros Módulos que exigem que o prefixo seja <b>nuke</b>.<br><br>Ele irá reconhecê-lo e deixará os 
prefixos do jeito que ele deve ser. (Isso significa que o script faz as alterações apenas onde deverá fazer - 
O prefix´é escrito no arquivo config.php).</td></tr>
<tr><td align="center"><br><br><font color=red><b><b><u><big>ATENÇÃO:</u></big> FAÇA UM BACKUP DE SEU BANCO DE 
DADOS ANTES DE RODAR ESTE SCRIPT!</b></font><br><br><br></td></tr>
<center>
<form action="rename.php?go=reprefix" method="post">
      <table border="0" cellpadding="2" cellspacing="0" width="100%">
        <tr>
          <td align=right width="50%"><b>Por favor, digite o novo prefixo para as tabelas ($prefix):</b></td>
          <td width="45%"><input type="text" name="newprefix" size="30"></td>
          <td width="5%">&nbsp;</td>
        </tr>
        <tr>
          <td align=right width="50%"><b>Por favor, digite o novo prefixo para a tabelas dos usuários (
$user_prefix):</b></td>
          <td width="45%"><input type="text" name="newuserprefix" size="30"></td>
          <td width="5%">&nbsp;</td>
        </tr>
      </table><br>
<center><input type="submit" value="Alterar os prefixos!"></center>
</form>
</center>
</td>
  </tr>
</table><br>
<b>Traduzido por:</b> <a href="http://phpnuke.org.br/modules.php?name=Forums&file=profile&mode=viewprofile&u=
34" target="blank">aleagi</a>.<br>
<b>Implementações por:</b> <a href="http://phpnuke.org.br/modules.php?name=Forums&file=profile&mode=
viewprofile&u=2583" target="blank">XPK_FENIX</a>.
<br><br>
<a href="http://phpnuke.org.br" target="blank"><img src="http://phpnuke.org.br/images/minibanner.gif" border
="0" alt="Comunidade PHP-Nuke Brasil - CNB"></a><br><a href="http://phpnuke.org.br" target="blank">Comunidade 
PHP-Nuke Brasil - CNB</a>
<br><b>Desenvolvido por:</b> <a href="http://rus-phpnuke.com>Rus-PHP-Nuke" target="blank"</a></center>

<?
}


function reprefix() {
   
   	$newprefix = $_POST['newprefix'];
	$newuserprefix = $_POST['newuserprefix'];
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $user_prefix;
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<LINK REL="StyleSheet" HREF="http://phpnuke.org.br/themes/fisubice/style/style.css" TYPE="text/css">
<title>CNB - Alteração de prefixo das tabelas do PHP-Nuke</title>
</head>

<body topmargin="0" leftmargin="0">
<center>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="center" background="http://phpnuke.org.br/themes/fisubice/images/cellpic_bkg.jpg" height="101" 
valign="top"><img src="http://phpnuke.org.br/images/altera_prefixo.jpg" border="0"></td></tr>
<tr>
<td background="http://phpnuke.org.br/themes/fisubice/images/bar.jpg" height="8" nowrap colspan="3"></td>
</tr>
</table>
<center><h3>A alteração dos prefixos das tabelas do Banco de Dados ocorreu com <b>SUCESSO!</b></h3>
</center><br><br><br>
<b>Suas tabelas agora mudaram para:</b><br><br>
    
<?

    require_once("config.php");
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $user_prefix;

    $cpr = strlen($prefix);
    $uscpr = strlen($user_prefix);
   
    if (!mysql_connect($dbhost, $dbuname, $dbpass)) {
        print 'Could not connect to mysql';
        exit;
    }

    $result = mysql_list_tables($dbname);
    
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
    
    while ($row = mysql_fetch_row($result)) {
        $tabname = $row[0];

        $prlong = substr($tabname, 0, $cpr);
        $pruslong = substr($tabname, 0, $uscpr);

        if (($prefix == "$prlong") OR ($user_prefix == "$pruslong")) {
        
        if (($tabname == "".$user_prefix."_users") OR ($tabname == "".$user_prefix."_users_temp")) {
        $newtabname = substr($tabname, $uscpr);
        mysql_query("ALTER TABLE $tabname RENAME $newuserprefix$newtabname");
        echo "$newuserprefix$newtabname<br>";
        
        }
        else {
        $newtabname = substr($tabname, $cpr);
        mysql_query("ALTER TABLE $tabname RENAME $newprefix$newtabname");
        echo "$newprefix$newtabname<br>";
        
        }
        }
    }

    mysql_free_result($result);
?>
<br><font color=red><b><u><b>Nota!</b></u></font></b><br>Por favor, não se esqueça de atualizar o seu arquivo 
<b>config.php</b> com os novos valores:<br><b>
<br><br>$prefix = <? echo"$newprefix"; ?>;<br>
$user_prefix = <? echo"$newuserprefix"; ?>;<br></b><br>
E NÃO SE ESQUEÇA DE APAGAR ESTE ARQUIVO DE SEU SERVIDOR!!!
</p><br><br><br>
<center>
<b>Traduzido por:</b> <a href="http://phpnuke.org.br/modules.php?name=Forums&file=profile&mode=viewprofile&u=
34" target="blank">aleagi</a>.<br>
<b>Implementações por:</b> <a href="http://phpnuke.org.br/modules.php?name=Forums&file=profile&mode=
viewprofile&u=2583" target="blank">XPK_FENIX</a>.
<br><br>
<a href="http://phpnuke.org.br" target="blank"><img src="http://phpnuke.org.br/images/minibanner.gif" border
="0" alt="Comunidade PHP-Nuke Brasil - CNB"></a><br><a href="http://phpnuke.org.br" target="blank">Comunidade 
PHP-Nuke Brasil - CNB</a>
<br><b>Desenvolvido por:</b> <a href="http://rus-phpnuke.com" target="blank">Rus-PHP-Nuke</a></center>


</td>
  </tr>
</table>
</center>
<?
}

$go = $_GET['go'];

switch($go) {

    case "reprefix":
    reprefix();
    break;

    
    default:
    main();
    break;
}

?>