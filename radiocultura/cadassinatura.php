<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><b><font color="#FFFFFF"><em>EFETUAR CADASTRO DE OUVINTE</em></font></b></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0">
          <tr></tr>
          <tr>
            <td><span class="content">
              <?php
include "administrador/conexao.php";

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
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


// Coloque a mensagem que ir?? ser enviada para seu e-mail abaixo:
$headers = "Content-type: text/html; charset=UTF-8/n";
$msg = utf8_decode("<font face=verdana size=2>Cadastro de Cliente Efetuado com Sucesso pelo Site da R??dio Universal FM.<br>Data do Cadastro: $data | ( $hora ) -- Email enviado em ".date("d/m/Y")."<br><br>Efetue o LOGIN na P??gina da R??dio Universal FM ( <a href=http://www.universalfm.com.br>www.universalfm.com.br</a> ).<br><br> <b><font color='#096394'>Dados de Acesso:</font></b><br><br><b><font color='#333333'>Usu??rio:</font></b> <font color='#096394'>$usuario</font><br><b><font color='#333333'>Senha:</font></b> <font color=#FF0000>$senha</font><br><br><b><font color=#096394>Dados Pessoais:</font></b><br><br><b><font color='#333333'>Nome:</font></b> $cliente<br><b><font color='#333333'>E-mail:</font></b> <a href=mailto:$email>$email</a><br><b><font color='#333333'>Raz??o Social:</font></b> $razaosocial<br><b><font color='#333333'>Nome de Fantasia:</font></b> $nomefantasia<br><b><font color='#333333'>Endere??o:</font></b> $endereco<br><b><font color='#333333'>N??mero:</font></b> $numero<br><b><font color='#333333'>Complemento:</font></b> $complemento<br><b><font color='#333333'>Bairro:</font></b> $bairro<br><b><font color='#333333'>Cidade:</font></b> $cidade - <b><font color='#333333'>Estado:</font></b> $uf<br><b><font color='#333333'>CEP:</font></b> $cep<br><b><font color='#333333'>CNPJ / CPF:</font></b> $cnpjcpf<br><b><font color='#333333'>Insc. Estadual:</font></b> $ie<br><b><font color='#333333'>RG:</font></b> $rg<br><b><font color='#333333'>Data Nascimento:</font></b> $datanasc<br><b><font color='#333333'>Telefone:</font></b> $telefone<br><b><font color='#333333'>FAX:</font></b> $fax<br><b><font color='#333333'>Celular:</font></b> $celular<br><b><font color='#333333'>Home Page:</font></b> <a href=$homepage target=_blank>$homepage</a><br><br><b><font color='#333333'>Observa????o:</font></b><br>$observacao<br><br><b><i>R??DIO UNIVERSAL FM</b></i><br><a href=http://www.universalfm.com.br>www.universalfm.com.br</a><br>Av. do Com??rcio, 841 sala 02 em Rodeio Bonito - RS<br>+55 (55) 3798-1535<br>");


require("administrador/phpmailerv21/class.phpmailer.php");

$mail = new PHPMailer();
$mail->SetLanguage("br", "phpmailerv21/"); // ajusto a lingua a ser utilizadda
$mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
$mail->SMTPSecure = "tls"; // ajusto o tipo de comunica????o a ser utilizada, no caso, a TLS do GMail

$mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP
$mail->Host = "mail.universalfm.com.br";  // especifico o endere??o do servidor smtp do GMail
$mail->SMTPAuth = true;	 // ativo a autentica????o SMTP, no caso do GMail, ?? necess??rio
$mail->Username = "webmaster@universalfm.com.br";  // Usu??rio SMTP do GMail
$mail->Password = "univer2012"; // Senha do usu??rio SMTP do GMail

// Aqui algumas informa????es que ser??o enviadas no cabe??alho do email
$mail->From = "webmaster@universalfm.com.br"; // Email de quem envia o email
$mail->FromName = "OUVINTE RADIO UNIVERSAL FM"; // Nome de quem envia o email
$mail->AddAddress("$email", "$nome"); // Endere??o e nome de quem vai receber o email, o nome ?? opcional
//Equilvalente a voc?? usar a [v??rgula] nos webmail e clientes de email
$mail->AddReplyTo("webmaster@universalfm.com.br", "UNIVERSAL FM"); // Email e nome que ser?? utilizado quando a pessoa responder este email

$mail->WordWrap = 50;								 // quebra linha sempre que uma linha atingir 50 caracteres
# $mail->AddAttachment("/var/tmp/file.tar.gz");		 // adc arquivo anexo. *opcional*
# $mail->AddAttachment("/tmp/image.jpg", "new.jpg");	// adc outro arquivo anexo com nome (opcional). *opcional*
$mail->IsHTML(true);								  // ajusto envio do email no formato HTML

$mail->Subject = "OUVINTE RADIO UNIVERSAL FM"; // Aqui colocar o assunto do email
$mail->Body	= "$msg"; // aqui o corpo do email para usuarios que tem a op????o text/html do seu webmail ou cliente de email ativada


if(!$mail->Send())
{
  echo "Erro: " . $mail->ErrorInfo;
   exit;
}



// Fim Enviar E-mail


$sql = "INSERT INTO cw_clientes (usuario, senha, cliente, email, razaosocial, nomefantasia, endereco, numero, complemento, bairro, uf, cidade, cep, cnpjcpf, ie, rg, datanasc, telefone, fax, celular, homepage, observacao, data, hora, foto) VALUES ('$usuario', '$senha', '$cliente', '$email', '$razaosocial', '$nomefantasia', '$endereco', '$numero', '$complemento', '$bairro', '$uf', '$cidade', '$cep', '$cnpjcpf', '$ie', '$rg', '$datanasc', '$telefone', '$fax', '$celular', '$homepage', '$observacao', '$data', '$hora', '$nome_foto0')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/logomenor.png></div><div align=center class=manchete_textocasa><br>O CADASTRO DO CLIENTE FOI EFETUADO COM SUCESSO!!</div><br><br>";
}else{
echo "<div align=center><br>N??O FOI POSS??VEL EFETUAR O CADASTRO!</div>";
}
 
   }
else 
   {
   echo "<script>alert('USU??RIO J?? CADASTRADO!')</script>";
   echo "<script>location.href='javascript:history.go(-1)'</script>";
   
   } 
 
?>
            </span></td>
          </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
