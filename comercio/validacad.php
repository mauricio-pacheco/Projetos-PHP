<?
$mensagem_erro="<h3>Os seguintes erros foram encontrados:</h3><br><br>";
$erro = 0;

if (${"chkCPF"}=="on")
{
CalculaCPF($cpf_cliente);
}
else
{
CalculaCNPJ($cpf_cliente);
}
  if ($nome_cliente == "" || strlen($nome_cliente) < 6) {
    $mensagem_erro .= "<font color=\"#FF0000\">* Digite seu nome completo.<br>";
    $erro = 1;
  }
  if (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email_cliente)) {
    $email="válido";
  }else{
    $mensagem_erro .= "<font color=\"#FF0000\">* O E-mail digitado cont&eacute;m caracteres inv&aacute;lidos.<br>";
    $erro = 1;
  }
  if ($cep_cliente == "" || strlen($cep_cliente)<8) {
    $mensagem_erro .= "<font color=\"#FF0000\">* O CEP deve ter pelo menos 8 d&iacute;gitos. Ex.:45708000<br>";
    $erro = 1;
  }
  if ($cidade_cliente == "" || strlen($cidade_cliente) < 4) {
    $mensagem_erro .= "<font color=\"#FF0000\">* A cidade deve ter pelo menos 4 caracteres.<br>";
    $erro = 1;
  }
  if ($endereco_cliente == "" || strlen($endereco_cliente) < 5) {
    $mensagem_erro .= "<font color=\"#FF0000\">* O endere&ccedil;o deve ser completo.<br>";
    $erro = 1;
  }
  if ($fone_cliente == "" || strlen($fone_cliente) < 7) {
    $mensagem_erro .= "<font color=\"#FF0000\">* O Numero de telefone deve ser completo (com DDD).<br>";
    $erro = 1;
  }
  if (($senha_cliente != $senha_confirma) || ($senha_cliente == "" || strlen($senha_cliente) < 5)) {
    $mensagem_erro .= "<font color=\"#FF0000\">* A senha não é a mesma nos dois campos ou é menor que 5 caracteres.<br>";
    $erro = 1;
  }

// verifica se o email ja estah cadastrado...
$path_local = "libs/padrao.php";
include "libs/db.php";
if($erro == 0){
    $sql = mysql_query("SELECT * FROM clientes WHERE email_cliente = '$email_cliente'");
    while($res = mysql_fetch_array($sql)){
           $existe = $res[0];
    }
    if($existe){
        $mensagem_erro .= '<font color="#FF0000">* Este e-mail já está cadastrado em nossos sistemas.<br><br>Utilize outro e-mail, ou verifique com o adminstrador do sistema se você já está cadastrado.<br><br>Obrigado!<br>';
        $erro = 1;
    }

    mysql_query("INSERT INTO clientes (nome_cliente,email_cliente,senha_cliente,cidade_cliente,endereco_cliente,cep_cliente,cpf_cliente,rg_cliente,fone_cliente,estado_cliente) VALUES ('$nome_cliente','$email_cliente',password('$senha_cliente'),'$cidade_cliente','$endereco_cliente','$cep_cliente','$cpf_cliente','$rg_cliente','$fone_cliente','$estado_cliente')");
    print "<b>$nome_cliente, seu cadastro foi efetivado com sucesso!<br><br>A página principal será recarregada com seu usuário já logado.<br>Boas Compras!</b>";
    print "<script Language=\"JavaScript\">";
    if($cookieativo){
            print "window.opener.location.href = \"index.php?cat_pai=1&pagina=login&email_form=$email_cliente&senha_form=$senha_cliente&cookieativo=sim\";";
    } else {
            print "window.opener.location.href = \"index.php?cat_pai=1&pagina=login&email_form=$email_cliente&senha_form=$senha_cliente\";";
    }
    // para fechar a Janela Automaticamente em 4 segundos...
    print 'function closeWindow(){';
    print '  window.close();}';
    print '  setTimeout("closeWindow()", 4000);';
    print "</script>";
}


if ($erro == 1){
        print $mensagem_erro;
        print "<font color=\"#000000\"><br>Clique em <a href=\"javascript:history.back(-1);\">Voltar</a> para corrigir.";
        exit;
}

//Calcula CPF

function CalculaCPF($cpf_cliente)
{
global $mensagem_erro, $erro;
$RecebeCPF=$cpf_cliente;
//Retirar todos os caracteres que nao sejam 0-9
$s="";
for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1)
{
 $ch=substr($RecebeCPF,$x-1,1);
 if (ord($ch)>=48 && ord($ch)<=57)
     {
     $s=$s.$ch;
 }
}

$RecebeCPF=$s;
if ($RecebeCPF=="11111111111")
{
 $then;
 $mensagem_erro .= "<font color=\"#FF0000\">* CPF inv&aacute;lido.<br>";
 $erro=1;
}
if (strlen($RecebeCPF)!=11)
{
 $mensagem_erro .= "<font color=\"#FF0000\">* &Eacute; obrigat&oacute;rio o CPF com 11 d&iacute;gitos.<br>";
 $erro=1;
}
else
if ($RecebeCPF=="00000000000")
{
 $then;
 $mensagem_erro .= "<font color=\"#FF0000\">* CPF inv&aacute;lido.<br>";
 $erro=1;
}
else
{
 $Numero[1]=intval(substr($RecebeCPF,1-1,1));
 $Numero[2]=intval(substr($RecebeCPF,2-1,1));
 $Numero[3]=intval(substr($RecebeCPF,3-1,1));
 $Numero[4]=intval(substr($RecebeCPF,4-1,1));
 $Numero[5]=intval(substr($RecebeCPF,5-1,1));
 $Numero[6]=intval(substr($RecebeCPF,6-1,1));
 $Numero[7]=intval(substr($RecebeCPF,7-1,1));
 $Numero[8]=intval(substr($RecebeCPF,8-1,1));
 $Numero[9]=intval(substr($RecebeCPF,9-1,1));
 $Numero[10]=intval(substr($RecebeCPF,10-1,1));
 $Numero[11]=intval(substr($RecebeCPF,11-1,1));

 $soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*
 $Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];
 $soma=$soma-(11*(intval($soma/11)));

 if ($soma==0 || $soma==1)
  {
   $resultado1=0;
  }
 else
 {
  $resultado1=11-$soma;
 }

if ($resultado1==$Numero[10])
{
$soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+
$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;
$soma=$soma-(11*(intval($soma/11)));

if ($soma==0 || $soma==1)
{
$resultado2=0;
}
else
{
$resultado2=11-$soma;
}
if ($resultado2==$Numero[11])
{
$cpf="Válido";
}
else
{
$mensagem_erro .= "<font color=\"#FF0000\">* CPF inv&aacute;lido.<br>";
$erro=1;
}
}
else
{
$mensagem_erro .= "<font color=\"#FF0000\">* CPF inv&aacute;lido.<br>";
$erro=1;
}
}
}
// Fim do Calcula CPF


//Função que calcula CNPJ

function CalculaCNPJ($cpf_cliente)
{
global $mensagem_erro, $erro;
$RecebeCNPJ=${"cpf_cliente"};

$s="";
for ($x=1; $x<=strlen($RecebeCNPJ); $x=$x+1)
{
$ch=substr($RecebeCNPJ,$x-1,1);
if (ord($ch)>=48 && ord($ch)<=57)
{
$s=$s.$ch;
}
}

$RecebeCNPJ=$s;
if (strlen($RecebeCNPJ)!=14)
{
$mensagem_erro .= "<font color=\"#FF0000\">* &Eacute; obrigat&oacute;rio o CNPJ com 14 d&iacute;gitos.<br>";
$erro=1;
}
else
if ($RecebeCNPJ=="00000000000000")
{
$then;
$mensagem_erro .= "<font color=\"#FF0000\">* CNPJ inv&aacute;lido.<br>";
$erro=1;
}
else
{
$Numero[1]=intval(substr($RecebeCNPJ,1-1,1));
$Numero[2]=intval(substr($RecebeCNPJ,2-1,1));
$Numero[3]=intval(substr($RecebeCNPJ,3-1,1));
$Numero[4]=intval(substr($RecebeCNPJ,4-1,1));
$Numero[5]=intval(substr($RecebeCNPJ,5-1,1));
$Numero[6]=intval(substr($RecebeCNPJ,6-1,1));
$Numero[7]=intval(substr($RecebeCNPJ,7-1,1));
$Numero[8]=intval(substr($RecebeCNPJ,8-1,1));
$Numero[9]=intval(substr($RecebeCNPJ,9-1,1));
$Numero[10]=intval(substr($RecebeCNPJ,10-1,1));
$Numero[11]=intval(substr($RecebeCNPJ,11-1,1));
$Numero[12]=intval(substr($RecebeCNPJ,12-1,1));
$Numero[13]=intval(substr($RecebeCNPJ,13-1,1));
$Numero[14]=intval(substr($RecebeCNPJ,14-1,1));

$soma=$Numero[1]*5+$Numero[2]*4+$Numero[3]*3+$Numero[4]*2+$Numero[5]*9+$Numero[6]*8+$Numero[7]*7+
$Numero[8]*6+$Numero[9]*5+$Numero[10]*4+$Numero[11]*3+$Numero[12]*2;

$soma=$soma-(11*(intval($soma/11)));

if ($soma==0 || $soma==1)
{
$resultado1=0;
}
else
{
$resultado1=11-$soma;
}
if ($resultado1==$Numero[13])
{
$soma=$Numero[1]*6+$Numero[2]*5+$Numero[3]*4+$Numero[4]*3+$Numero[5]*2+$Numero[6]*9+
$Numero[7]*8+$Numero[8]*7+$Numero[9]*6+$Numero[10]*5+$Numero[11]*4+$Numero[12]*3+$Numero[13]*2;
$soma=$soma-(11*(intval($soma/11)));
if ($soma==0 || $soma==1)
{
$resultado2=0;
}
else
{
$resultado2=11-$soma;
}
if ($resultado2==$Numero[14])
{
$cnpj="válido";
}
else
{
$mensagem_erro .= "<font color=\"#FF0000\">* CNPJ inv&aacute;lido.<br>";
$erro=1;
}
}
else
{
$mensagem_erro .= "<font color=\"#FF0000\">* CNPJ inv&aacute;lido.<br>";
$erro=1;
}
}
}
//Fim do Calcula CNPJ

?>