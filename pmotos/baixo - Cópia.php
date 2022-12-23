<table width="100%"  background="imagens/tabelabaixa.png" height="120" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="996" height="120" background="imagens/rodape.png" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="996" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="10" /></td>
          </tr>
        </table>
          <table width="996" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td class="fonterodape" align="left"><strong>&copy; Polaco Motos
                <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
                </strong> - Todos os direitos 
                reservados<br />
                Rua Tupinambás, 63 (saída para Ijuí) - Fone: 55 3551 1359 - Tenente Portela/RS<br />
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
    var $userdb = "tpmotos";
    var $passdb = "tpm2011";
    var $namedb = "pmotostp";

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
        print("Você é nosso visitante Nº: <font color='#F6900E'>".$total);
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
                <br />
                Desenvolvimento: <a href="http://www.casadaweb.net" class="fonterodape" target="_blank"><font color="#FFFFFF">Casa da Web</font></a></td>
            </tr>
          </table>
          <table width="996" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>