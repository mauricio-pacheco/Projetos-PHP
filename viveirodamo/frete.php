<?php

require_once('RsCorreios.php');

// Instancia a classe
$frete = new RsCorreios();

// Percorre todos as variáveis $_POST para setar os atributos necessários
// Se você achar melhor pode fazer 1 a 1.
// Ex.: $frete->setValue('sCepOrigem', $_POST['sCepOrigem']);
// Aqui estou usando um foreach para economizar código
foreach ($_POST as $key => $value) {
    $frete->setValue($key, $value);
}

// Diâmetro
$frete->getDiametro();

// Chamado ao método getFrete, que irá se comunicar com os correios
// e nos trazer o resultado
$result = $frete->getFrete();


// Retornamos a mensagem de erro caso haja alguma falha
if ($result['erro'] != 0) {
    $resultadoFrete = $result['msg_erro'];
}
// Caso não haja erros mostramos o resultado de cada variável retornada pelos correios.
// Use apenas as que forem de seu interesse
else {
	
	$resultadoFrete = "Código do Serviço: " . $result['servico_codigo'] . "<br />";
	$resultadoFrete .= "Valor do Frete: R$ " . $result['valor'] . "<br />";
	$resultadoFrete .= "Prazo de Entrega: " . $result['prazo_entrega'] . " dias <br />";
	$resultadoFrete .= "Valor p/ Mão Própria: R$ " . $result['mao_propria'] . "<br />";
	$resultadoFrete .= "Valor Aviso de Recebimento: R$ " . $result['aviso_recebimento'] . "<br />";
	$resultadoFrete .= "Valor Declarado: R$ " . $result['valor_declarado'] . "<br />";
	$resultadoFrete .= "Entrega Domiciliar: " . $result['en_domiciliar'] . "<br />";
	$resultadoFrete .= "Entrega Sábado: " . $result['en_sabado'] . "<br />";
}

echo $resultadoFrete;
?>