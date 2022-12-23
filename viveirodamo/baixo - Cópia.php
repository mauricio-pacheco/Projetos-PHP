<table width="1000" border="0" align="center" height="200" cellpadding="0" cellspacing="0">
      <tr>
        <td width="500" class="fonteadm" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="fonterodape"><strong>&copy; Multix Shop
                  <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
            </strong></span></td>
          </tr>
        </table>          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
        </table>        <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="fonterodape">Rua do Comércio, 468 - Fone: 55 3744 **** - Frederico Westphalen/RS</span></td>
          </tr>
        </table>        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
        </table>            <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="fonterodape">Todos os direitos 
      reservados -
                <?php

class visita
{
    /*
     * variaveis
     **/
     
    //Dados necessarios para verificacao  de visitantes
    var $ip; //armazena o ip do usuario
    var $data; //armazena a data atual

    //Dados necessarios para conexao com db    
    var $hostdb = "localhost";
    var $userdb = "multixsh_gaz";
    var $passdb = "gaz201";
    var $namedb = "multixsh_gazola";

    //Nome da tabela
    var $tabVisitas = "cw_visitas";
    
    /*
     * construtor
     **/
    function visita($ip)
    {
        //armazena na variavel 'ip' o ip do visitante atual
        $this->ip=$ip;
        //Pega a data atual
        $this->data=date("d/m/Y");
    }
        
    /*
     * conexao com banco
     **/
    function conectar()
    {
        $link= mysql_connect($this->hostdb,$this->userdb,$this->passdb)or die(mysql_error());
        mysql_select_db($this->namedb,$link)or die(mysql_error());
    }    

    
    /*
     * verifica se o usuario ja visitou
     **/

    /*
     * imprime numero de visitas
     **/
    function imprime()
    {
        //Chama conexao;
        $this->conectar();
        //Seleciona todos
        $sql = mysql_query("SELECT * FROM ".$this->tabVisitas);
        //Conta quantos foram selecionados
        $total= mysql_num_rows($sql);
        //Imprime numero de visitas (registros na tabela)
        print("Você é nosso visitante Nº: <font color='#FDF700'>".$total);
		echo ("</font>");
    }
}
//'Chama' a classe visita e ja pega o ip do visitante
$visita = new visita($_SERVER['REMOTE_ADDR']);
//Chama a funcao verificaVisitante(); 
//Ela verifica se por ip e data se o usuario ja visitou
//Imprime o total de visitas (total de registros na tabela)
$visita->imprime();
?>
            </span></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
          </tr>
        </table>
        <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>Desenvolvimento: <a href="http://www.casadaweb.net" class="fonterodape" target="_blank"><font color="#FFFFFF">Casa da Web</font></a></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="500" valign=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><span class="fonterodape"><strong>Formas de Pagamento
              
            </strong></span></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="right"><!-- INICIO CODIGO PAGSEGURO -->
<center>
<a href='https://pagseguro.uol.com.br' target='_blank'><img alt='Logotipos de meios de pagamento do PagSeguro' src='https://p.simg.uol.com.br/out/pagseguro/i/banners/pagamento/todos_estatico_550_100.gif' title='Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Elo, PLENOCard, PersonalCard, BrasilCard, FORTBRASIL, Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, Oi Paggo, saldo em conta PagSeguro, boleto e PinCode PagSeguro.' border='0'></a>
</center>
<!-- FINAL CODIGO PAGSEGURO --></td>
            </tr>
          </table></td>
      </tr>
    </table>
