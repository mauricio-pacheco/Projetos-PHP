<?
unset($existe);
if ($email_form){
$path_local = "libs/padrao.php";
include "libs/db.php";
//validacao do e-mail (rotina de segurança)
if (($email_form) && (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email_form)) ){
	$sql = mysql_query("SELECT id FROM clientes WHERE email_cliente = '$email_form' AND senha_cliente = password('$senha_form')");
	while($res = mysql_fetch_array($sql)){
		$existe = $res[0];
	}
}
if($existe){
	session_start();
	session_register("id_usuario","nome_usuario","email_usuario","senha_usuario","fone_usuario","endereco_usuario","cidade_usuario","estado_usuario","cep_usuario","cgc_usuario","rg_usuario");
	$rs = mysql_query("select * from clientes WHERE email_cliente = '$email_form' AND senha_cliente = password('$senha_form')");
	while($ressql = mysql_fetch_array($rs)){
			$id_usuario = $ressql[0];
			$nome_usuario = $ressql[1];
			$email_usuario = $ressql[2];
			$senha_usuario = $ressql[3];
			$fone_usuario = $ressql[4];
			$endereco_usuario = $ressql[5];
			$cidade_usuario = $ressql[6];
			$estado_usuario = $ressql[7];
			$cep_usuario = $ressql[8];
			$cgc_usuario = $ressql[9];
			$rg_usuario = $ressql[10];
		}
// Continua a compra do vivente se a senha conferir
print "<script Language=\"JavaScript\">";
print "window.location.href = \"comprar.php?tipo_frete=$tipo_frete\";";
print "</script>";
	} 
	else {
		$erro = "Email não válido ou a senha não confere...";	
	}

}
?> <br>
<? print $erro; ?>
<form name="form1" method="post" action="verifica_senha.php" >
  <p><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Seu e-mail:<br>
	<input type="hidden" name="tipo_frete" value="<? print $tipo_frete;?>">
    <input type="text" name="email_form">
    <br>
    Senha:<br>
    <input type="password" name="senha_form">
    <br>
 <br>
    <input type="submit" name="Submit" value="Entrar">
    </font></b></p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
</form>
