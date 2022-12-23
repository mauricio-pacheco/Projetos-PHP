<?php 
// Envia E-mail

$recipient = "comercial@casadaweb.net";

$subject = utf8_decode("CADASTRO PESSOA FISÍCA - BV FINANCEIRA");


// Formulario 1

$a1nome = $_POST['1nome'];
$a1sexo = $_POST['1sexo'];
$a1rg = $_POST['1rg'];
$a1dataemissao = $_POST['1dataemissao'];
$a1oexpedidor = $_POST['1oexpedidor'];
$a1cpf = $_POST['1cpf'];
$a1nascimento = $_POST['1nascimento'];
$a1nacionalidade = $_POST['1nacionalidade'];
$a1natural = $_POST['1natural'];
$a1estado = $_POST['1estado'];
$a1dependentes = $_POST['1dependentes'];
$a1ecivil = $_POST['1ecivil'];
$a1correspondencia = $_POST['1correspondencia'];
$a1endereco = $_POST['1endereco'];
$a1numero = $_POST['1numero'];
$a1complemento = $_POST['1complemento'];
$a1bairro = $_POST['1bairro'];
$a1cidade = $_POST['1cidade'];
$a1estado2 = $_POST['1estado2'];
$a1cep = $_POST['1cep'];
$a1tresidencia = $_POST['1tresidencia'];
$a1telefone = $_POST['1telefone'];
$a1celular = $_POST['1celular'];
$a1email = $_POST['1email'];
$a1filiacao = $_POST['1filiacao'];
$a1categoria = $_POST['1categoria'];
$a1tipo = $_POST['1tipo'];
$a1tmoradia = $_POST['1tmoradia'];
$a1valormoradia = $_POST['1valormoradia'];
$a1valoraluguel = $_POST['1valoraluguel'];
$a1valorprestacao = $_POST['1valorprestacao'];
$a1pai = $_POST['1pai'];
$a1mae = $_POST['1mae'];


// Formulario 2

$a2cprofissional = $_POST['2cprofissional'];
$a2empresa = $_POST['2empresa'];
$a2cnpj = $_POST['2cnpj'];
$a2instrucao = $_POST['2instrucao'];
$a2cargo = $_POST['2cargo'];
$a2salario = $_POST['2salario'];
$a2tempo = $_POST['2tempo'];
$a2grau2 = $_POST['2grau2'];
$a2empregados = $_POST['2empregados'];
$a2endereco = $_POST['2endereco'];
$a2numero = $_POST['2numero'];
$a2telefone = $_POST['2telefone'];
$a2bairro = $_POST['2bairro'];
$a2cidade = $_POST['2cidade'];
$a2estado = $_POST['2estado'];
$a2cep = $_POST['2cep'];
$a2telefone2 = $_POST['2telefone2'];
$a2contador = $_POST['2contador'];

// Formulario 3

$a3endereco = $_POST['3endereco'];
$a3bairro = $_POST['3bairro'];
$a3cidade = $_POST['3cidade'];
$a3estado = $_POST['3estado'];
$a3cep = $_POST['3cep'];
$a3residencia = $_POST['3residencia'];


// Formulario 4

$a4nome = $_POST['4nome'];
$a4rg = $_POST['4rg'];
$a4dataemissao = $_POST['4dataemissao'];
$a4oexpedidor = $_POST['4oexpedidor'];
$a4cep = $_POST['4cep'];
$a4nacionalidade = $_POST['4nacionalidade'];
$a4empresa = $_POST['4empresa'];
$a4telefonec = $_POST['4telefonec'];
$a4admissao = $_POST['4admissao'];
$a4salario = $_POST['4salario'];


// Formulario 5

$a5banco = $_POST['5banco'];
$a5agencia = $_POST['5agencia'];
$a5ccorrente = $_POST['5ccorrente'];
$a5tempoconta = $_POST['5tempoconta'];
$a5telefone = $_POST['5telefone'];
$a5cheque = $_POST['5cheque'];
$a5cartao = $_POST['5cartao'];

// Formulario 5 Financeira(credito)

$f5nome = $_POST['f5nome'];
$f5prestacao = $_POST['f5prestacao'];
$f5prestpagas = $_POST['f5prestpagas'];
$f5prestdevidas = $_POST['f5prestdevidas'];
$f5telefone = $_POST['f5telefone'];


// Formulario 5 Comercial

$c5nome = $_POST['c5nome'];
$c5prestacao = $_POST['c5prestacao'];
$c5prestpagas = $_POST['c5prestpagas'];
$c5prestdevidas = $_POST['c5prestdevidas'];
$c5telefone = $_POST['c5telefone'];


// Formulario 5 Familiar

$fm5nome = $_POST['fm5nome'];
$fm5endereco = $_POST['fm5endereco'];
$fm5bairro = $_POST['fm5bairro'];
$fm5cidade = $_POST['fm5cidade'];
$fm5estado = $_POST['fm5estado'];
$fm5cep = $_POST['fm5cep'];
$fm5telefone = $_POST['fm5telefone'];

// Formulario 6

$a6esp1 = $_POST['6esp1'];
$a6valor1 = $_POST['6valor1'];
$a6esp2 = $_POST['6esp2'];
$a6valor2 = $_POST['6valor2'];

// Formulario 7

$a7marca1 = $_POST['7marca1'];
$a7modelo1 = $_POST['7modelo1'];
$a7ano1 = $_POST['7ano1'];
$a7placa1 = $_POST['7placa1'];
$a7valor1 = $_POST['7valor1'];
$a7quitado1 = $_POST['7quitado1'];
$a7credor1 = $_POST['7credor1'];

$a7marca2 = $_POST['7marca2'];
$a7modelo2 = $_POST['7modelo2'];
$a7ano2 = $_POST['7ano2'];
$a7placa2 = $_POST['7placa2'];
$a7valor2 = $_POST['7valor2'];
$a7quitado2 = $_POST['7quitado2'];
$a7credor2 = $_POST['7credor2'];


// Formulario 8

$a8financiamento = $_POST['8financiamento'];
$a8produto = $_POST['8produto'];
$a8marca = $_POST['8marca'];
$a8modelo = $_POST['8modelo'];
$a8anomod = $_POST['8anomod'];
$a8anofab = $_POST['8anofab'];
$a8combustivel = $_POST['8combustivel'];
$a8renavam = $_POST['8renavam'];
$a8placa = $_POST['8placa'];
$a8compra = $_POST['8compra'];
$a8entrada = $_POST['8entrada'];
$a8porentrada = $_POST['8porentrada'];
$a8taxa = $_POST['8taxa'];
$a8liberado = $_POST['8liberado'];
$a8tac = $_POST['8tac'];
$a8retorno = $_POST['8retorno'];
$a8financiar = $_POST['8financiar'];
$a8fator = $_POST['8fator'];
$a8carencia = $_POST['8carencia'];
$a8prestacoes = $_POST['8prestacoes'];
$a8vprestacao = $_POST['8vprestacao'];
$a8vencimento = $_POST['8vencimento'];
$a8pagamento = $_POST['8pagamento'];



$msg = utf8_decode("<font face=tahoma size=3>CADASTRO PESSOA FISÍCA - BV FINANCEIRA:</font><br><br>
<font face=tahoma size=2>

<b>1 - Dados Pessoais</b><br><br>

<b>Nome:</b> $a1nome<br><br>
<b>Sexo:</b> $a1sexo<br><br>
<b>RG:</b> $a1rg<br><br>
<b>Data de Emissão:</b> $a1dataemissao<br><br>
<b>Órgão Expedidor:</b> $a1oexpedidor<br><br>
<b>CPF:</b> $a1cpf<br><br>
<b>Data de Nascimento:</b> $a1nascimento<br><br>
<b>Nacionalidade:</b> $a1nacionalidade<br><br>
<b>Natural:</b> $a1natural<br><br>
<b>UF:</b> $a1estado<br><br>
<b>N° de Dependentes:</b> $a1dependentes<br><br>
<b>Estado Civil:</b> $a1ecivil<br><br>
<b>Correnpondência:</b> $a1correspondencia<br><br>
<b>Endereço:</b> $a1endereco<br><br>
<b>N°:</b> $a1numero<br><br>
<b>Complemento:</b> $a1complemento<br><br>
<b>Bairro:</b> $a1bairro<br><br>
<b>Cidade:</b> $a1cidade<br><br>
<b>UF:</b> $a1estado2<br><br>
<b>CEP:</b> $a1cep<br><br>
<b>Tempo de Residência (Anos):</b> $a1tresidencia<br><br>
<b>Telefone:</b> $a1telefone<br><br>
<b>Celular:</b> $a1celular<br><br>
<b>E-mail:</b> $a1email<br><br>
<b>Filiação:</b> $a1filiacao<br><br>
<b>Categoria:</b> $a1categoria<br><br>
<b>Tipo:</b> $a1tipo<br><br>
<b>Tipo de Moradia:</b> $a1tmoradia<br><br>
<b>Valor da Moradia:</b> $a1valormoradia<br><br>
<b>Valor do Aluguel:</b> $a1valoraluguel<br><br>
<b>Valor da Prestação:</b> $a1valorprestacao<br><br>
<b>Pai:</b> $a1pai<br><br>
<b>Mãe:</b> $a1mae<br><br>

<b>2 - Dados Pessoais</b><br><br>

<b>Classe Profissional:</b> $a2cprofissional<br><br>
<b>Empresa:</b> $a2empresa<br><br>
<b>N° do CNPJ:</b> $a2cnpj<br><br>
<b>Grau de Instrução:</b> $a2instrucao<br><br>
<b>Cargo:</b> $a2cargo<br><br>
<b>Salário:</b> $a2salario<br><br>
<b>Tempo de Serviço (anos):</b> $a2tempo<br><br>
<b>Grau de Instrução:</b> $a2grau2<br><br>
<b>Nº de Empregados:</b> $a2empregados<br><br>
<b>Endereço:</b> $a2endereco<br><br>
<b>N°:</b> $a2numero<br><br>
<b>Telefone:</b> $a2telefone<br><br>
<b>Bairro:</b> $a2bairro</
<b>Telefone:</b> $a2telefone2<br><br>
<b>Contador:</b> $a2contador<br><br>

<b>3 - Endereço alternativo de correspondência (No caso do Financiado desejar receber a correspondência em um endereço diferente do LR e do LT)</b><br><br>

<b>Endereço:</b> $a3endereco<br><br>
<b>Bairro:</b> $a3bairro<br><br>
<b>Cidade:</b> $a3cidade<br><br>
<b>UF:</b> $a3estado<br><br>
<b>CEP:</b> $a3cep<br><br>
<b>Tempo de Residência (Mês / Ano):</b> $a3residencia<br><br>

<b>4 - Dados do Cônjuge</b><br><br>

<b>Nome:</b> $a4nome<br><br>
<b>RG:</b> $a4rg<br><br>
<b>Data de Emissão:</b> $a4dataemissao<br><br>
<b>Órgão Expedidor:</b> $a4oexpedidor<br><br>
<b>CEP:</b> $a4cep<br><br>
<b>Nacionalidade:</b> $a4nacionalidade<br><br>
<b>Empresa aonde Trabalha:</b> $a4empresa<br><br>
<b>Telefone Comercial:</b> $a4telefonec<br><br>
<b>Admissão (Mês / Ano):</b> $a4admissao<br><br>
<b>Salário:</b> $a4salario<br><br>

<b>5 - Referências</b><br><br>

<b>Banco:</b> $a5banco<br><br>
<b>Agência:</b> $a5agencia<br><br>
<b>Conta Corrente:</b> $a5ccorrente<br><br>
<b>Tempo de Conta (Anos):</b> $a5tempoconta<br><br>
<b>Telefone:</b> $a5telefone<br><br>
<b>Cheque Especial:</b> $a5cheque<br><br>
<b>Cartão de Crédito:</b> $a5cartao<br><br>

<b><i>Formulario 5 Financeira(credito)</i></b><br><br>

<b>Nome:</b> $f5nome<br><br>
<b>Valor da Prestação:</b> $f5prestacao<br><br>
<b>N.º de Prest. Pagas:</b> $f5prestpagas<br><br>
<b>N.º de Prest. Devidas:</b> $f5prestdevidas<br><br>
<b>Telefone:</b> $f5telefone<br><br>

<b><i>Formulario 5 Comercial</i></b><br><br>

<b>Nome:</b> $c5nome<br><br>
<b>Valor da Prestação:</b> $c5prestacao<br><br>
<b>N.º de Prest. Pagas:</b> $c5prestpagas<br><br>
<b>N.º de Prest. Devidas:</b> $c5prestdevidas<br><br>
<b>Telefone:</b> $c5telefone<br><br>

<b><i>Formulario 5 Familiar</b></i><br><br>

<b>Nome:</b> $fm5nome<br><br>
<b>Endereço:</b> $fm5endereco<br><br>
<b>Bairro:</b> $fm5bairro<br><br>
<b>Cidade:</b> $fm5cidade<br><br>
<b>UF:</b> $fm5estado<br><br>
<b>CEP:</b> $fm5cep<br><br>
<b>Telefone:</b> $fm5telefone<br><br>

<b>6 - Outras Rendas</b><br><br>

<b>Especificar:</b> $a6esp1<br><br>
<b>Valor:</b> $a6valor1<br><br>
<b>Especificar:</b> $a6esp2<br><br>
<b>Valor:</b> $a6valor2<br><br>

<b>7 - Veículos</b><br><br>

<b>Marca:</b> $a7marca1<br><br>
<b>Modelo:</b> $a7modelo1<br><br>
<b>Ano:</b> $a7ano1<br><br>
<b>Placa:</b> $a7placa1<br><br>
<b>Valor:</b> $a7valor1<br><br>
<b>Quitado:</b> $a7quitado1<br><br>
<b>Nome do Credor:</b> $a7credor1<br><br><br>

<b>Marca:</b> $a7marca2<br><br>
<b>Modelo:</b> $a7modelo2<br><br>
<b>Ano:</b> $a7ano2<br><br>
<b>Placa:</b> $a7placa2<br><br>
<b>Valor:</b> $a7valor2<br><br>
<b>Quitado:</b> $a7quitado2<br><br>
<b>Nome do Credor:</b> $a7credor2<br><br>

<b>8 - Proposta de Negócio</b><br><br>

<b>Tipo de Financiamento:</b> $a8financiamento<br><br>
<b>Produto:</b> $a8produto<br><br>
<b>Marca:</b> $a8marca<br><br>
<b>Modelo:</b> $a8modelo<br><br>
<b>Ano (Mod.):</b> $a8anomod<br><br>
<b>Ano (Fabr.):</b> $a8anofab<br><br>
<b>Combustível:</b> $a8combustivel<br><br>
<b>Renavam:</b> $a8renavam<br><br>
<b>Placa:</b> $a8placa<br><br>
<b>Valor da Compra:</b> $a8compra<br><br>
<b>Valor da Entrada:</b> $a8entrada<br><br>
<b>% Entrada:</b> $a8porentrada<br><br>
<b>Taxa:</b> $a8taxa<br><br>
<b>Valor Liberado:</b> $a8liberado<br><br>
<b>Valor da TAC:</b> $a8tac<br><br>
<b>Retorno:</b> $a8retorno<br><br>
<b>Valor a Financiar:</b> $a8financiar<br><br>
<b>Fator:</b> $a8fator<br><br>
<b>Carência / Dias:</b> $a8carencia<br><br>
<b>Nº Prestações:</b> $a8prestacoes<br><br>
<b>Valor da Prestação:</b> $a8vprestacao<br><br>
<b>1º Vencimento:</b> $a8vencimento<br><br>
<b>Forma de Pagamento:</b> $a8pagamento<br><br>

</font>


");

$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

mail("$recipient", "$subject", "$msg", "$headers");

echo "<script>alert('Mensagem Enviada com Sucesso!')</script>";
echo "<script>location.href='c2.php'</script>";
?>