<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Efetuar Cadastro de Assinante</strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><span class="content">
                      <?php
include "administrador/conexao.php";

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$impresso = $_POST["impresso"];
$online = $_POST["online"];
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
$diretorio0 = 'administrador/ups/clientes/';
if($arquivo0)
{
    $tamanho0 = getimagesize($arquivo0["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoes/funcoes0.php";
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
$msg = utf8_decode("<font face=verdana size=2>Cadastro de Cliente Efetuado com Sucesso pelo Jornal Folha do Noroeste.<br>Data do Cadastro: $data | ( $hora ) -- Email enviado em ".date("d/m/Y")."<br><br>Efetue o LOGIN na Página do Jornal Folha do Noroeste ( <a href=http://www.folhadonoroeste.com.br/assinatura.php>www.folhadonoroeste.com.br/assinatura.php</a> ) para poder acompanhar sua assinatura.<br><br> <b><font color='#096394'>Dados de Acesso:</font></b><br><br><b><font color='#333333'>Usuário:</font></b> <font color='#096394'>$usuario</font><br><b><font color='#333333'>Senha:</font></b> <font color=#FF0000>$senha</font><br><br><b><font color=#096394>Dados Pessoais:</font></b><br><br><b><font color='#333333'>Tipo de Assinatura:</font></b> $impresso  $online<br><br><b><font color='#333333'>Nome:</font></b> $cliente<br><b><font color='#333333'>E-mail:</font></b> <a href=mailto:$email>$email</a><br><b><font color='#333333'>Razão Social:</font></b> $razaosocial<br><b><font color='#333333'>Nome de Fantasia:</font></b> $nomefantasia<br><b><font color='#333333'>Endereço:</font></b> $endereco<br><b><font color='#333333'>Número:</font></b> $numero<br><b><font color='#333333'>Complemento:</font></b> $complemento<br><b><font color='#333333'>Bairro:</font></b> $bairro<br><b><font color='#333333'>Cidade:</font></b> $cidade - <b><font color='#333333'>Estado:</font></b> $uf<br><b><font color='#333333'>CEP:</font></b> $cep<br><b><font color='#333333'>CNPJ / CPF:</font></b> $cnpjcpf<br><b><font color='#333333'>Insc. Estadual:</font></b> $ie<br><b><font color='#333333'>RG:</font></b> $rg<br><b><font color='#333333'>Data Nascimento:</font></b> $datanasc<br><b><font color='#333333'>Telefone:</font></b> $telefone<br><b><font color='#333333'>FAX:</font></b> $fax<br><b><font color='#333333'>Celular:</font></b> $celular<br><b><font color='#333333'>Home Page:</font></b> <a href=$homepage target=_blank>$homepage</a><br><br><b><font color='#333333'>Observação:</font></b><br>$observacao<br><br><b><i>JORNAL FOLHA DO NOROESTE</b></i><br><a href=http://www.folhadonoroeste.com.br>www.folhadonoroeste.com.br</a><br>Rua do Comércio, 333, Sala 3/4 - Centro, Frederico Westphalen/RS<br>+55 (55) 3744-7080 / 3744-1830<br>");


require("administrador/phpmailerv21/class.phpmailer.php");

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
$mail -> AddAddress("contabilidade@folhadonoroeste.com.br");
$mail -> AddAddress("direcao@folhadonoroeste.com.br");
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

$senha = hash('sha512', $senha);
$sql = "INSERT INTO cw_clientes (online, impresso, usuario, senha, cliente, email, razaosocial, nomefantasia, endereco, numero, complemento, bairro, uf, cidade, cep, cnpjcpf, ie, rg, datanasc, telefone, fax, celular, homepage, observacao, data, hora, foto) VALUES ('$online', '$impresso', '$usuario', '$senha', '$cliente', '$email', '$razaosocial', '$nomefantasia', '$endereco', '$numero', '$complemento', '$bairro', '$uf', '$cidade', '$cep', '$cnpjcpf', '$ie', '$rg', '$datanasc', '$telefone', '$fax', '$celular', '$homepage', '$observacao', '$data', '$hora', '$nome_foto0')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/logomenor.png></div><div align=center class=fontetabela><br>O CADASTRO DO CLIENTE FOI EFETUADO COM SUCESSO!!</div><br><br>";
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
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>