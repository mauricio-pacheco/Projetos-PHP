<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa		      		  |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenv Boleto SICREDI: Rafael Azenha Aquini <rafael@tchesoft.com>    |
// |                        Marco Antonio Righi <marcorighi@tchesoft.com> |
// | Homologa��o e ajuste de algumas rotinas.				               			  |
// |                        Marcelo Belinato  <mbelinato@gmail.com> 		  |
// +----------------------------------------------------------------------+


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE

include "../administrador/conexao.php";

$idcliente = $_POST["idcliente"];
$cliente = utf8_decode($_POST["cliente"]);
$endereco = utf8_decode($_POST["endereco"]);
$cidade = utf8_decode($_POST["cidade"]);
$estado = utf8_decode($_POST["estado"]);
$cep = $_POST["cep"];
$valor = $_POST["valor"];
$datacad = date ("j/m/Y");

function som_data($data, $dias)
{
		$data_e = explode("/",$data);
		$data2 = date("m/d/Y", mktime(0,0,0,$data_e[1],$data_e[0] + $dias,$data_e[2]));
		$data2_e = explode("/",$data2);
		$data_final = $data2_e[1] . "/". $data2_e[0] . "/" . $data2_e[2];
		return $data_final;
}

if ($valor=='50,00') {
$data_final = som_data("$datacad", 180);
} else if ($valor=='90,00') {
$data_final = som_data("$datacad", 365);
}

$sql = "INSERT INTO cw_assinaturas (idcliente, valor, datacad, status, dataexpira) VALUES ('$idcliente', '$valor', '$datacad', '0', '$data_final')";
if(mysql_query($sql)) {
echo "";
}else{
echo "";
}


$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = "$valor"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = date("y");	// Ano da gera��o do t�tulo ex: 07 para 2007 
$dadosboleto["nosso_numero"] = "13871";  			// Nosso numero (m�x. 5 digitos) - Numero sequencial de controle.
$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "$cliente";
$dadosboleto["endereco1"] = "$endereco";
$dadosboleto["endereco2"] = "$cidade - $uf - $cep";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Assinatura do Jornal Folha do Noroeste";
$dadosboleto["demonstrativo2"] = "Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Jornal Folha do Noroeste - http://www.folhadonoroeste.com.br";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = "- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: contabilidade@folhadonoroeste.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo site do Jornal Folha do NOroeste - www.folhadonoroeste.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";	    // N - remeter cobran�a sem aceite do sacado  (cobran�as n�o-registradas)
                                  // S - remeter cobran�a apos aceite do sacado (cobran�as registradas)
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "A"; // OS - Outros segundo manual para cedentes de cobran�a SICREDI


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - SICREDI
$dadosboleto["agencia"] = "0230"; 	// Num da agencia (4 digitos), sem Digito Verificador
$dadosboleto["conta"] = "40503"; 	// Num da conta (5 digitos), sem Digito Verificador
$dadosboleto["conta_dv"] = "5"; 	// Digito Verificador do Num da conta

// DADOS PERSONALIZADOS - SICREDI
$dadosboleto["posto"]= "10";      // C�digo do posto da cooperativa de cr�dito
$dadosboleto["byte_idt"]= "2";	  // Byte de identifica��o do cedente do bloqueto utilizado para compor o nosso n�mero.
                                  // 1 - Idtf emitente: Cooperativa | 2 a 9 - Idtf emitente: Cedente
$dadosboleto["carteira"] = "A";   // C�digo da Carteira: A (Simples) 

// SEUS DADOS
$dadosboleto["identificacao"] = "Jornal Folha do Noroeste";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Rua do Com�rcio 333, Sala 3/4";
$dadosboleto["cidade_uf"] = "Frederico Westphalen / RS";
$dadosboleto["cedente"] = "Jornal Folha do Noroeste";

// N�O ALTERAR!
include("include/funcoes_sicredi.php"); 
include("include/layout_sicredi.php");
?>
