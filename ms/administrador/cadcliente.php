<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR CLIENTE</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><span class="rodape">
                  <?php
include "conexao.php";

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



$usuario = $_POST["usuario"];
$cliente = $_POST["cliente"];
$email = $_POST["email"];
$razaosocial = $_POST["razaosocial"];
$nomefantasia = $_POST["nomefantasia"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$uf = $_POST["uf"];
$cidade = $_POST["cidade"];
$cep = $_POST["cep"];
$cnpjcpf = $_POST["cnpjcpf"];
$ie = $_POST["ie"];
$rg = $_POST["rg"];
$datanasc = $_POST["datanasc"];
$telefone = $_POST["telefone"];
$fax = $_POST["fax"];
$celular = $_POST["celular"];
$homepage = $_POST["homepage"];
$observacao = $_POST["observacao"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

// Validar Campo File Imagem Maior
if (empty( $_FILES['foto']['name'] ) ) {


$nome_foto0 = "semfoto.jpg";

}
else
{

$arquivo0 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x0 = 140;
$max_image_y0 = 105;
$diretorio0 = 'ups/clientes/';
if($arquivo0)
{
    $tamanho0 = getimagesize($arquivo0["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoes0.php";
    $err0 = FALSE;
    if(is_uploaded_file($arquivo0['tmp_name']))
    {
        if(verifica_image0($arquivo0))
        {
            $tamanho0 = getimagesize($arquivo0["tmp_name"]);
            $dimensiona0 = verifica_dimensao_image0($arquivo0, $max_image_x0, $max_image_y0);
            if($dimensiona0 != '')
            {
                if($dimensiona0 == 'altura')
                {
                        $auxImage0 = $max_image_x0;
                        $max_image_x0 = $max_image_y0;
                        $max_image_y0 = $auxImage0;
                }
            }
            else
            {
                $max_image_x0 = $tamanho0[0];
                $max_image_y0 = $tamanho0[1];
            }
            
            $nome_foto0  = ('imagemmenor0_' . time() . '.' . verifica_extensao_image0($arquivo0));// nome &Atilde;&ordm;nico para foto
            $endFoto0 = $diretorio0 . $nome_foto0;
            if(reduz_imagem0($arquivo0['tmp_name'], $max_image_x0, $max_image_y0, $endFoto0))
            {
                $err0 = TRUE;
            }  
        }
    }
}
}
// fim




// verifica

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario='$usuario'");
$contar = mysql_num_rows($sql); 
if ($contar < 1)  
   {
	   


//fim verifica





// Enviar E-mail


// Coloque a mensagem que irá ser enviada para seu e-mail abaixo:
$headers = "Content-type: text/html; charset=UTF-8/n";
$msg = utf8_decode("<font face=verdana size=2>Cadastro de Cliente Efetuado com Sucesso pelo Jornal Folha do Noroeste.<br>Data do Cadastro: $data | ( $hora ) -- Email enviado em ".date("d/m/Y")."<br><br>Efetue o LOGIN na Página do Jornal Folha do Noroeste ( <a href=http://www.folhadonoroeste.com.br>www.folhadonoroeste.com.br</a> ) para poder acompanhar sua assinatura.<br><br> <b><font color='#096394'>Dados de Acesso:</font></b><br><br><b><font color='#333333'>Usuário:</font></b> <font color='#096394'>$usuario</font><br><b><font color='#333333'>Senha:</font></b> <font color=#FF0000>$passwd</font><br><br><b><font color=#096394>Dados Pessoais:</font></b><br><br><b><font color='#333333'>Nome:</font></b> $cliente<br><b><font color='#333333'>E-mail:</font></b> <a href=mailto:$email>$email</a><br><b><font color='#333333'>Razão Social:</font></b> $razaosocial<br><b><font color='#333333'>Nome de Fantasia:</font></b> $nomefantasia<br><b><font color='#333333'>Endereço:</font></b> $endereco<br><b><font color='#333333'>Número:</font></b> $numero<br><b><font color='#333333'>Complemento:</font></b> $complemento<br><b><font color='#333333'>Bairro:</font></b> $bairro<br><b><font color='#333333'>Cidade:</font></b> $cidade - <b><font color='#333333'>Estado:</font></b> $uf<br><b><font color='#333333'>CEP:</font></b> $cep<br><b><font color='#333333'>CNPJ / CPF:</font></b> $cnpjcpf<br><b><font color='#333333'>Insc. Estadual:</font></b> $ie<br><b><font color='#333333'>RG:</font></b> $rg<br><b><font color='#333333'>Data Nascimento:</font></b> $datanasc<br><b><font color='#333333'>Telefone:</font></b> $telefone<br><b><font color='#333333'>FAX:</font></b> $fax<br><b><font color='#333333'>Celular:</font></b> $celular<br><b><font color='#333333'>Home Page:</font></b> <a href=$homepage target=_blank>$homepage</a><br><br><b><font color='#333333'>Observação:</font></b><br>$observacao<br><br><b><i>JORNAL FOLHA DO NOROESTE</b></i><br><a href=http://www.folhadonoroeste.com.br>www.folhadonoroeste.com.br</a><br>Rua do Comércio, 333, Sala 3/4 - Centro, Frederico Westphalen/RS<br>+55 (55) 3744-7080 / 3744-1830<br>");


require("phpmailerv21/class.phpmailer.php");

$mail = new PHPMailer();
$mail->SetLanguage("br", "phpmailerv21/"); // ajusto a lingua a ser utilizadda
$mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
$mail->SMTPSecure = "tls"; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail

$mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP
$mail->Host = "smtp.gmail.com";  // especifico o endereço do servidor smtp do GMail
$mail->SMTPAuth = true;	 // ativo a autenticação SMTP, no caso do GMail, é necessário
$mail->Username = "ccllima23";  // Usuário SMTP do GMail
$mail->Password = "cesar2011"; // Senha do usuário SMTP do GMail

// Aqui algumas informações que serão enviadas no cabeçalho do email
$mail->From = "email@folhadonoroeste.com.br"; // Email de quem envia o email
$mail->FromName = "ASSINATURA JORNAL FOLHA DO NOROESTE"; // Nome de quem envia o email
$mail->AddAddress("$email", "$nome"); // Endereço e nome de quem vai receber o email, o nome é opcional
//Equilvalente a você usar a [vírgula] nos webmail e clientes de email
$mail->AddReplyTo("email@folhadonoroeste.com.br", "Jornal Folha do Noroeste"); // Email e nome que será utilizado quando a pessoa responder este email

$mail->WordWrap = 50;								 // quebra linha sempre que uma linha atingir 50 caracteres
# $mail->AddAttachment("/var/tmp/file.tar.gz");		 // adc arquivo anexo. *opcional*
# $mail->AddAttachment("/tmp/image.jpg", "new.jpg");	// adc outro arquivo anexo com nome (opcional). *opcional*
$mail->IsHTML(true);								  // ajusto envio do email no formato HTML

$mail->Subject = "ASSINATURA JORNAL FOLHA DO NOROESTE"; // Aqui colocar o assunto do email
$mail->Body	= "$msg"; // aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email ativada


if(!$mail->Send())
{
  echo "Erro: " . $mail->ErrorInfo;
   exit;
}



// Fim Enviar E-mail


$sql = "INSERT INTO cw_clientes (usuario, senha, cliente, email, razaosocial, nomefantasia, endereco, numero, complemento, bairro, uf, cidade, cep, cnpjcpf, ie, rg, datanasc, telefone, fax, celular, homepage, observacao, data, hora, foto) VALUES ('$usuario', '$passwd', '$cliente', '$email', '$razaosocial', '$nomefantasia', '$endereco', '$numero', '$complemento', '$bairro', '$uf', '$cidade', '$cep', '$cnpjcpf', '$ie', '$rg', '$datanasc', '$telefone', '$fax', '$celular', '$homepage', '$observacao', '$data', '$hora', '$nome_foto0')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=fontetabela><br>O CADASTRO DO CLIENTE FOI EFETUADO COM SUCESSO!!</div>";
}else{
echo "<div align=center><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
}
 
   }
else 
   {
   echo "<script>alert('USUÁRIO JÁ CADASTRADO!')</script>";
   echo "<script>location.href='javascript:history.go(-1)'</script>";
   
   } 
 
?>
                </span></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>