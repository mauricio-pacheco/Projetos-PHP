<?php 
// Envia E-mail

$recipient = "comercial@casadaweb.net";

$subject = "CADASTRO CONSIGNADO - BV FINANCEIRA";

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$rg = $_POST['rg'];
$dataemissao = $_POST['dataemissao'];
$oexpedidor = $_POST['oexpedidor'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$nacionalidade = $_POST['nacionalidade'];
$natural = $_POST['natural'];
$estado = $_POST['estado'];
$beneficio = $_POST['beneficio'];
$ecivil = $_POST['ecivil'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado2 = $_POST['estado2'];
$cep = $_POST['cep'];
$tresidencia = $_POST['tresidencia'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$filiacao = $_POST['filiacao'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$ccorrente = $_POST['ccorrente'];
$tconta = $_POST['tconta'];

$msg = utf8_decode("<font face=tahoma size=3>CADASTRO CONSIGNADO - BV FINANCEIRA:</font><br><br>
<font face=tahoma size=2>
<b>Nome:</b> $nome<br><br>
<b>Sexo:</b> $sexo<br><br>
<b>RG:</b> $rg<br><br>
<b>Data da Emissão:</b> $dataemissao<br><br>
<b>Órgão Expedidor:</b> $oexpedidor<br><br>
<b>CPF:</b> $cpf<br><br>
<b>Data de Nascimento:</b> $nascimento<br><br>
<b>Nacionalidade:</b> $nacionalidade<br><br>
<b>Natural:</b> $natural<br><br>
<b>UF:</b> $estado<br><br>
<b>N° do Beneficio:</b> $beneficio<br><br>
<b>Estado Civil:</b> $ecivil<br><br>
<b>Endereço:</b> $endereco<br><br>
<b>N°:</b> $numero<br><br>
<b>Complemento:</b> $complemento<br><br>
<b>Bairro:</b> $bairro<br><br>
<b>Cidade:</b> $cidade<br><br>
<b>UF:</b> $estado2<br><br>
<b>CEP:</b> $cep<br><br>
<b>Tempo de Residência (Anos):</b> $tresidencia<br><br>
<b>Telefone:</b> $telefone<br><br>
<b>Celular:</b> $celular<br><br>
<b>E-mail:</b> $email<br><br>
<b>Filiação:</b> $filiacao<br><br>
<b>Pai:</b> $pai<br><br>
<b>Mãe:</b> $mae<br><br>
<b>Banco:</b> $banco<br><br>
<b>Agência:</b> $agencia<br><br>
<b>Conta Corrente:</b> $ccorrente<br><br>
<b>Tempo de Conta (Anos):</b> $tconta<br><br>
</font>


");

$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

mail("$recipient", "$subject", "$msg", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='c1.php'</script>";
?>