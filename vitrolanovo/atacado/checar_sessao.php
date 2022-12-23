<?
session_start("usuario");
if(!(session_is_registered("usuario"))) { 
	header("Location:index.php");
	exit;
	}
Else
	{
	$usuario    = $HTTP_SESSION_VARS["usuario"];
	$nome  = $HTTP_SESSION_VARS["nome"];
	$codigo  = $HTTP_SESSION_VARS["codigo"];
	}

?>
