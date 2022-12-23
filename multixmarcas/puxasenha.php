<?php
include "administrador/conexao.php";
$emailnovo = $_POST["emailnovo"];
$sConso = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz'; 
$sVogal = 'aeiou';
$sNum = '123456789'; 
$passwd = ''; 

$y = strlen($sConso)-1; //conta o nº de caracteres da variável $sConso
$z = strlen($sVogal)-1; //conta o nº de caracteres da variável $sVogal
$r = strlen($sNum)-1; //conta o nº de caracteres da variável $sNum

for($x=0;$x<=1;$x++)
{
$rand = rand(0,$y); //Funçao rand() - gera um valor randômico
$rand1 = rand(0,$z); 
$rand2 = rand(0,$r); 
$str = substr($sConso,$rand,1); // substr() - retorna parte de uma string
$str1 = substr($sVogal,$rand1,1); 
$str2 = substr($sNum,$rand2,1);

$passwd .= $str.$str1.$str2; 
} 


   


// Coloque a mensagem que irá ser enviada para seu e-mail abaixo:
$msg = utf8_decode("<font face=verdana size=2>Recuperação de Senha Efetuado com Sucesso pela Loja Multix Shop.<br><b><font color='#333333'>Nova Senha:</font></b> <font color=#FF0000>$passwd</font><br><br>Sempre que precisar, entre em contato conosco, estaremos ao seu dispor.<br><a href=mailto:atendimento@multixshop.com.br>atendimento@multixshop.com.br</a><br><br><b><i>Atenciosamente</b></i><br><b><i>Serviço de Atendimento ao Cliente</b></i><br><b><i>Multix Shop</b></i><br><br>");

$recipient = "$emailnovo";
$recipient2 = "atendimento@multixshop.com.br";

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: $emailnovo";
$headers .= "Bcc: atendimento@multixshop.com.br";
$subject = utf8_decode("Recuperação de Senha - Multix Shop");
mail("$recipient", "$subject", "$msg", "$headers");
mail("$recipient2", "$subject", "$msg", "$headers");


$passwd = hash('sha512', $passwd);
// Fim Enviar E-mail


$sql = "UPDATE cw_clientes SET senha = '$passwd' WHERE email='$emailnovo'";
if(mysql_query($sql)) {
echo "<script>alert('A NOVA SENHA FOI ENCAMINHADA PARA O SEU E-MAIL!')</script>";
 echo "<script>location.href='principal.php'</script>";
} else {
echo "<script>alert('E-MAIL INEXISTENTE! NÃO FOI POSSÍVEL RECUPERAR A SENHA!')</script>";
echo "<script>location.href='principal.php'</script>";

}
 

 
?>