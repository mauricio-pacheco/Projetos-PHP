<?
//Código para Matar Sessão...
session_start("usuario");
if (session_is_registered("usuario"))
   {
   session_unset();
   session_destroy();
   }   
   
if ((IsSet($usuario)) and (IsSet($pass)))
    {
	include "conecta.php";
	$sql = "SELECT COD_CLI, 
				   NOME_CLI, 
				   EMAIL_CLI 
		 	FROM CLIENTE 
			WHERE EMAIL_CLI = '$usuario' 
			AND SENHA_CLI = '$pass';";
	//$rs = $conn->debug=true;
	$rs = $conn->Execute($sql);

	If ($rs->RecordCount()>0) 
			{
			$nome=$rs->fields[1];
			$usuario=$rs->fields[2];
			$codigo = $rs->fields[0];

			session_start("usuario");
			if (session_is_registered("usuario"))
					{
					session_unset();
					session_destroy();
					}
				session_register("usuario","nome", "codigo");
				if (!headers_sent()) 
					{
					header("Location: principal.php");
					exit;
					}
			Else
					{
					header("Location:index.php?erro=1");
					Exit;
					}
			}
	else //se o usuario vier em branco....
		{
		header("location: index.php?erro=1");
		}
	}
?>
