﻿<?php include("meta.php"); ?>
<BODY class=wide bgcolor="#3C7FAF">
<DIV id=reporting><IMG id=ctag height=1 alt="" src="home_arquivos/c.gif" 
width=1>
<DIV id=omni>
<NOSCRIPT>
<DIV><IMG height=1 alt="" src="home_arquivos/r.gif" 
width=1></DIV></NOSCRIPT></DIV></DIV>
<DIV class="page6 region9" id=wrapper>
<DIV id=page>
<?php include("cabecalho.php"); ?>
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <?php include("busca.php"); ?>
  </DIV>
<DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
<?php include("login.php"); ?>
</DIV>
<DIV id=nav>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
<DIV class="nav3 cf">
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <DIV align=center>
      <?php include("menu.php"); ?>
    </DIV>
  </DIV>
</DIV></DIV></DIV></DIV>
<DIV id=content>
<DIV class=ca id=subhead></DIV>
<DIV id=mediapage2>
<DIV id=infopanerow>
<DIV class="ca mpreg5" id=infotop>
<?php include("notgeral.php"); ?></DIV>
<DIV class="ca mpreg4" id=mainadtop><!---->
<DIV class="parent chrome29  advertisement customcontainer blue">
<DIV class="heading alignright"><!----></DIV>
<DIV class=content>
<DIV class=adcenter>
  <DIV class=advertisement>
  <?php include("edicoes.php"); ?>
    
</DIV></DIV></DIV></DIV></DIV></DIV>
<DIV class=ca id=subfoot><?php include("fotos.php"); ?></DIV>
<DIV id=mediapage2column1and2>
<DIV class="ca mpreg3" id=area4></DIV>
<DIV class="ca mpreg1 largetitle blackheading" id=area1>
  <DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Classificados</SPAN></span></DIV>
    <DIV class=content><?php
include "administrador/conexao.php";

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
echo "<font color=#ffffff>";
$arquivo14 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x14 = 800;
$max_image_y14 = 600;
$diretorio14 = 'administrador/ups/capasclass/';
if($arquivo14)
{
    $tamanho14 = getimagesize($arquivo14["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoes/funcoesclass1.php";
    $err14 = FALSE;
    if(is_uploaded_file($arquivo14['tmp_name']))
    {
        if(verifica_image14($arquivo14))
        {
            $tamanho14 = getimagesize($arquivo14["tmp_name"]);
            $dimensiona14 = verifica_dimensao_image14($arquivo14, $max_image_x14, $max_image_y14);
            if($dimensiona14 != '')
            {
                if($dimensiona14 == 'altura')
                {
                        $auxImage14 = $max_image_x14;
                        $max_image_x14 = $max_image_y14;
                        $max_image_y14 = $auxImage14;
                }
            }
            else
            {
                $max_image_x14 = $tamanho14[0];
                $max_image_y14 = $tamanho14[1];
            }
            
            $nome_foto14  = ('imagemmenor14_' . time() . '.' . verifica_extensao_image14($arquivo14));// nome &Atilde;&ordm;nico para foto
            $endFoto14 = $diretorio14 . $nome_foto14;
            if(reduz_imagem14($arquivo14['tmp_name'], $max_image_x14, $max_image_y14, $endFoto14))
            {
                $err14 = TRUE;
            }  
        }
    }
}



$arquivo15 = isset($_FILES["foto2"]) ? $_FILES["foto2"] : FALSE;
$max_image_x15 = 800;
$max_image_y15 = 600;
$diretorio15 = 'administrador/ups/capasclass/';
if($arquivo15)
{
    $tamanho15 = getimagesize($arquivo15["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoes/funcoesclass2.php";
    $err15 = FALSE;
    if(is_uploaded_file($arquivo15['tmp_name']))
    {
        if(verifica_image15($arquivo15))
        {
            $tamanho15 = getimagesize($arquivo15["tmp_name"]);
            $dimensiona15 = verifica_dimensao_image15($arquivo15, $max_image_x15, $max_image_y15);
            if($dimensiona15 != '')
            {
                if($dimensiona15 == 'altura')
                {
                        $auxImage15 = $max_image_x15;
                        $max_image_x15 = $max_image_y15;
                        $max_image_y15 = $auxImage15;
                }
            }
            else
            {
                $max_image_x15 = $tamanho15[0];
                $max_image_y15 = $tamanho15[1];
            }
            
            $nome_foto15  = ('imagemmenor15_' . time() . '.' . verifica_extensao_image15($arquivo15));// nome &Atilde;&ordm;nico para foto
            $endFoto15 = $diretorio15 . $nome_foto15;
            if(reduz_imagem15($arquivo15['tmp_name'], $max_image_x15, $max_image_y15, $endFoto15))
            {
                $err15 = TRUE;
            }  
        }
    }
}



$arquivo16 = isset($_FILES["foto3"]) ? $_FILES["foto3"] : FALSE;
$max_image_x16 = 800;
$max_image_y16 = 600;
$diretorio16 = 'administrador/ups/capasclass/';
if($arquivo16)
{
    $tamanho16 = getimagesize($arquivo16["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoes/funcoesclass3.php";
    $err16 = FALSE;
    if(is_uploaded_file($arquivo16['tmp_name']))
    {
        if(verifica_image16($arquivo16))
        {
            $tamanho16 = getimagesize($arquivo16["tmp_name"]);
            $dimensiona16 = verifica_dimensao_image16($arquivo16, $max_image_x16, $max_image_y16);
            if($dimensiona16 != '')
            {
                if($dimensiona16 == 'altura')
                {
                        $auxImage16 = $max_image_x16;
                        $max_image_x16 = $max_image_y16;
                        $max_image_y16 = $auxImage16;
                }
            }
            else
            {
                $max_image_x16 = $tamanho16[0];
                $max_image_y16 = $tamanho16[1];
            }
            
            $nome_foto16  = ('imagemmenor16_' . time() . '.' . verifica_extensao_image16($arquivo16));// nome &Atilde;&ordm;nico para foto
            $endFoto16 = $diretorio16 . $nome_foto16;
            if(reduz_imagem16($arquivo16['tmp_name'], $max_image_x16, $max_image_y16, $endFoto16))
            {
                $err16 = TRUE;
            }  
        }
    }
}
echo "</font>";


$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$titulo = $_POST["titulo"];
$iddep = $_POST["iddep"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

$texto = str_replace("'","",$texto);


// Coloque a mensagem que irá ser enviada para seu e-mail abaixo:
$headers = "Content-type: text/html; charset=UTF-8/n";
$msg = utf8_decode("<font face=verdana size=2>Cadastro de Classificado Efetuado com Sucesso pelo Jornal Folha do Noroeste.<br>Data do Cadastro: $data | ( $hora ) -- Email enviado em ".date("d/m/Y")."<br><br>

<b><font color=#096394>Dados do Cadastro:</font></b><br><br><b><font color='#333333'>Nome:</font></b> $nome<br><b><font color='#333333'>E-mail:</font></b> <a href=mailto:$email>$email</a><br><b><font color='#333333'>Telefone:</font></b> $telefone<br><b><font color='#333333'>CÓDIGO DE SEGURANÇA:</font></b> $passwd<br><br>AGUARDE SEU CLASSIFICADO SER APROVADO PELO ADMINISTRADOR<BR>PARA A EXCLUSÃO DO MESMO UTILIZE SEU E-MAIL E CÓDIGO DE SEGURANÇA NA PÁGINA DE SEU CLASSIFICADO NO SITE DO JORNAL FOLHA DO NOROESTE<br><br><b><i>JORNAL FOLHA DO NOROESTE</b></i><br><a href=http://www.folhadonoroeste.com.br>www.folhadonoroeste.com.br</a><br>Rua do Comércio, 333, Sala 3/4 - Centro, Frederico Westphalen/RS<br>+55 (55) 3744-7080 / 3744-1830<br>");


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
$mail->FromName = "CLASSIFICADO JORNAL FOLHA DO NOROESTE"; // Nome de quem envia o email
$mail->AddAddress("$email", "$nome"); // Endereço e nome de quem vai receber o email, o nome é opcional
$mail -> AddAddress("contabilidade@folhadonoroeste.com.br");
$mail -> AddAddress("direcao@folhadonoroeste.com.br");
//Equilvalente a você usar a [vírgula] nos webmail e clientes de email
$mail->AddReplyTo("email@folhadonoroeste.com.br", "Jornal Folha do Noroeste"); // Email e nome que será utilizado quando a pessoa responder este email

$mail->WordWrap = 50;								 // quebra linha sempre que uma linha atingir 50 caracteres
# $mail->AddAttachment("/var/tmp/file.tar.gz");		 // adc arquivo anexo. *opcional*
# $mail->AddAttachment("/tmp/image.jpg", "new.jpg");	// adc outro arquivo anexo com nome (opcional). *opcional*
$mail->IsHTML(true);								  // ajusto envio do email no formato HTML

$mail->Subject = "CLASSIFICADO JORNAL FOLHA DO NOROESTE"; // Aqui colocar o assunto do email
$mail->Body	= "$msg"; // aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email ativada


if(!$mail->Send())
{
  echo "Erro: " . $mail->ErrorInfo;
   exit;
}


$sql = "INSERT INTO cw_class (nome, email, telefone, titulo, iddep, foto, foto2, foto3, texto, data, hora, status, codigo) VALUES ('$nome', '$email', '$telefone', '$titulo', '$iddep', '$nome_foto14', '$nome_foto15', '$nome_foto16', '$texto', '$data', '$hora', '0', '$passwd')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=administrador/imagens/ok.png></div><div align=center class=manchete_texto><br><br>O CADASTRO DO CLASSIFICADO FOI EFETUADO COM SUCESSO!!<br><br>AGUARDE A APROVAÇÃO DO ADMINISTRADOR PARA A PUBLICAÇÃO<br>SEU CÓDIGO DE SEGURANÇA É <b>$passwd</b>, COM ELE VOCÊ PODERÁ EXCLUIR O CLASSIFICADO QUANDO QUISER.</div><br>";
}else{
echo "<div align=center class=manchete_texto><br>N&Atilde;O FOI POSS&Iacute;VEL EFETUAR O CADASTRO!</div><br>";
}
 
?></DIV>
  </DIV>
</DIV>
 
 
 
<DIV class="ca mpreg4" id=area2><!---->
<?php include("enquete.php"); ?>
<?php include("tempo.php"); ?>
<?php include("lateral.php"); ?>
  
  </DIV>
<DIV class="ca mpreg3" id=area5><!----></DIV></DIV></DIV>
<DIV class=ca id=subfoot>
<?php include("videos.php"); ?>
<?php include("baixo.php"); ?>
<?php include("rodape.php"); ?>
</DIV></DIV></DIV>
<DIV id=foot>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
</DIV></DIV></DIV></DIV>
</BODY></HTML>
