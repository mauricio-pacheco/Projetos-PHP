<? 
ob_start();
//INICIALIZA A SESSÃO 
session_start(); 

//DESTRÓI AS SESSOES
unset($_SESSION[usuario]); 
unset($_SESSION[validacao]);
session_destroy(); 

//REDIRECIONA PARA A TELA DE LOGIN 
Header("Location: administrador.php"); 
?>