<?
// desloga o usuário limpa session e cookies.
session_unset();
		setcookie ("cookie_comercio[1]", "Visitante",time()+360000);  
		setcookie ("cookie_comercio[2]", "Visitante",time()+360000);
		setcookie ("cookie_comercio[3]", 0,time()+360000);
print "Você saiu do sistema com sucesso...<br>Aguarde seu redirecionamento...";	
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php\";";
//print "window.location.href = \"index.php\";";
print "window.close();";
print "</script>";
exit;



?>
