<?php

// Peso total do pacote em Quilos, caso seja menos de 1Kg, ex.: 300g, coloque 0.300
define('PESO',2.00);
define('EMBALAGEM',0.00);

// Valor adicional no envio como custo de embalagem.
define('COMPRIMENTO',20);
define('ALTURA',15);
define('LARGURA',20);

if($_POST) {
// Código do Serviço que deseja calcular, veja tabela acima:
if ($_POST['servico']) {
$cod_servico = $_POST['servico'];
}
// CEP de Origem, em geral o CEP da Loja
$cep_origem = '13060-854';

// CEP de Destino, você pode passar esse CEP por GET ou POST vindo de um formulário
$cep_destino = $_POST['cep-destino'];
$cep_destino = eregi_replace("([^0-9])","",$cep_destino);

// URL de Consulta dos Correios
$correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?StrRetorno=xml&nCdServico={$cod_servico}&nVlPeso=" . PESO . "&sCepOrigem={$cep_origem}&sCepDestino={$cep_destino}&nCdFormato=1&nVlComprimento=" . COMPRIMENTO . "&nVlAltura=" . ALTURA . "&nVlLargura=" . LARGURA;

// Capta as informações da página dos Correios
$correios_info = file($correios);

// Processa as informações vindas do site dos correios em um Array
foreach($correios_info as $info) {

// Busca a informação do Preço da Postagem
if(preg_match("/\<Valor>(.*)\<\/Valor>/",$info,$tarifa)) {

$total = $tarifa[1] + EMBALAGEM;
}
if(preg_match("/\<PrazoEntrega>(.*)\<\/PrazoEntrega>/",$info,$PrazoEntrega)) {
$PrazoEntrega = $PrazoEntrega[1];
}
}

// Neste exemplo estamos usando apenas PAC e SEDEX. Caso seja necessário, utilize outras opções.
switch ($cod_servico) {
case 41106:
$nome_servico = " PAC ";
break;
case 40010:
$nome_servico = " SEDEX ";
break;
}

// Caso venha valor de resposta é numerio e maior que o custo da embalagem senão ocorreu algum erro na solicitação.
if(is_numeric($total) and ($total > $embalagem)) {

// Quando encontra o valor da postagem, exibe na página formatando em padrão de moeda 10,89
// Caso você não queira formatar basta comentar a linha abaixo que será exibido assim 10.89 e basta executar o comando abaixo
$total = number_format($total,2,',','.');

echo $nome_servico . $total . ' prazo entrega de ' . $PrazoEntrega . ' dia(s) ';
} else {
echo 'Erro ao consultar verifique se CEP esta correto';
}
}
?>
