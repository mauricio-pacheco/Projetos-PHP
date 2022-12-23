<?php

/**
 * Classe RSCorreios
 * 
 * Classe criada por Rodrigo dos Santos para realizar o cálculo de frete dos
 * correios em suas aplicações de ecommerce.
 * 
 * PHP Version 5
 * 
 * @category RsCorreios
 * @package  RsCorreios
 * @author   Rodrigo dos Santos <falecom@rodrigodossantos.ws>
 * @license  GNU GENERAL PUBLIC LICENSE
 * @link     http://rodrigodossantos.ws
 * 
 */

/**
 * Esta classe faz a comunicação com o webservice dos correios
 * para cálculo de frete por SEDEX e PAC, etc.
 * Baseado no manual disponibilizado pelos Correios
 * 
 * @category RsCorreios
 * @package  RsCorreios
 * @author   Rodrigo dos Santos <falecom@rodrigodossantos.ws>
 * @license  GNU GENERAL PUBLIC LICENSE
 * @version  Release: 1.1
 * @link     http://rodrigodossantos.ws
 */
class RsCorreios
{

    /**
     * endereço do webservice dos correios
     */
    private $_ect = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx";

    /**
     * Seu código administrativo junto à ECT.
     * O código está disponível no corpo do contrato firmado com os Correios.
     */
    protected $nCdEmpresa;

    /**
     * Senha para acesso ao serviço, associada ao seu c�digo administrativo.
     */
    protected $sDsSenha;

    /**
     * Código do serviço
     * 41106 PAC sem contrato
     * 40010 SEDEX sem contrato
     * 40045 SEDEX a Cobrar, sem contrato
     * 40215 SEDEX 10, sem contrato
     * 40290 SEDEX Hoje, sem contrato
     * 40096 SEDEX com contrato
     * 40436 SEDEX com contrato
     * 40444 SEDEX com contrato
     * 81019 e-SEDEX, com contrato
     * 41068 PAC com contrato
     */
    protected $nCdServico;

    /**
     * Cep de origem sem o dígito
     * @example 05311900
     */
    protected $sCepOrigem;

    /**
     *  CEP de Destino Sem hífem
     * @example 05311900
     */
    protected $sCepDestino;

    /**
     * Peso da encomenda, incluindo sua embalagem. 
     * O peso deve ser informado em quilogramas.
     */
    protected $nVlPeso;

    /**
     * Formato da encomenda (incluindo embalagem).
     * Valores possíveis: 1 ou 2
     * 1 ? Formato caixa/pacote
     * 2 ? Formato rolo/prisma
     */
    protected $nCdFormato = "1";

    /**
     * Comprimento da encomenda (incluindo embalagem), em centímetros.
     * É obrigatório somente para PAC
     */
    protected $nVlComprimento;

    /**
     * Altura da encomenda (incluindo embalagem), em centímetros.
     * É obrigatório somente para PAC
     */
    protected $nVlAltura;

    /**
     * Largura da encomenda (incluindo embalagem), em centímetros.
     * É obrigatório somente para PAC
     */
    protected $nVlLargura;

    /**
     * Diâmetro da encomenda (incluindo embalagem), em centímetros.
     * É obrigatório somente para PAC
     */
    protected $nVlDiametro = "";

    /**
     * Indica se a encomenda será entregue com o serviço adicional mão própria.
     * Valores possíveis: S ou N (S = Sim, N = Não)
     */
    protected $sCdMaoPropria = "N";

    /**
     * Indica se a encomenda será entregue com o serviço 
     * adicional valor declarado.
     * Neste campo deve ser apresentado o valor declarado desejado, em Reais.
     * Se não optar pelo serviço informar zero.
     */
    protected $nVlValorDeclarado = "0";

    /**
     * Indica se a encomenda será entregue com o serviço 
     * adicional aviso de recebimento.
     * Valores possíveis: S ou N (S = Sim, N = Não)
     */
    protected $sCdAvisoRecebimento = "N";

    /**
     * Indica a forma de retorno da consulta.
     * XML: Resultado em XML
     * Popup:  Resultado em uma janela popup
     * <URL>: Resultado via post em uma página do requisitante
     */
    protected $StrRetorno = "xml";

    /**
     * SETTER único para todos os atributos da classe
     * 
     * @param string $name  Nome do atributo
     * @param string $value Valor do atributo
     * 
     * @return void
     */
    public function setValue($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * GETTER único para todos os atributos da class
     * 
     * @param string $name Nome do atributo
     * 
     * @return void
     */
    public function getValue($name)
    {
        return $this->$name;
    }

    /**
     * Calcula o diâmetro da encomenda em cm
     * 
     * @return void
     */
    public function getDiametro()
    {
        $this->nVlDiametro = $this->nVlAltura + $this->nVlLargura;
    }

    /**
     * Monta a URL de Consulta para enviar ao webservice dos correios
     * 
     * @return string
     */
    private function _getURL()
    {

        $url = $this->_ect . '?';
        foreach ($this as $name => $var) {
            if ($name == 'ect') {
                continue;
            }
            $url .= "$name=$var&";
        }

        $this->url = $url;

        return $this->url;
    }

    /**
     * Obtém dados de uma url via curl
     * 
     * @param string $url URL do site que se deseja obter os dados
     * 
     * @return mixed Dados retornados pela URL
     */
    private function _getSite($url)
    {
        $curl_init = curl_init();
        curl_setopt($curl_init, CURLOPT_URL, $url);
        curl_setopt($curl_init, CURLOPT_SSL_VERIFYPEER, 0);
        ob_start();
        curl_exec($curl_init);
        $response = ob_get_contents();
        ob_end_clean();
        return $response;
    }

    /**
     * Comunica-se com os correios para obter os valores do frete
     * 
     * @return array
     */
    public function getFrete()
    {

        $response = $this->_getSite(self::_getURL());

        $xml = simplexml_load_string($response);

        $frete = array("servico_codigo" => $xml->cServico->Codigo,
            "valor" => $xml->cServico->Valor,
            "prazo_entrega" => $xml->cServico->PrazoEntrega,
            "mao_propria" => $xml->cServico->ValorMaoPropria,
            "aviso_recebimento" => $xml->cServico->ValorAvisoRecebimento,
            "valor_declarado" => $xml->cServico->ValorValorDeclarado,
            "en_domiciliar" => $xml->cServico->EntregaDomiciliar,
            "en_sabado" => $xml->cServico->EntregaSabado,
            "erro" => $xml->cServico->Erro,
            "msg_erro" => $xml->cServico->MsgErro);

        return $frete;
    }

}

?>