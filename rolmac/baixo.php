<table width="80" height="66" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#121315"><table width="874" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="fonterodape" align="center"><strong>&copy; Rolmac
              <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
               - </strong>Av. S&atilde;o Paulo, 647 - Fone: 55 3744-7088 - Celular: 55 9633-6271 - Frederico Westphalen/RS<br />
Todos os direitos 
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
    var $userdb = "rolmacte_casa";
    var $passdb = "casarolmac";
    var $namedb = "rolmacte_rol";

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
      </span> - Desenvolvimento: <a href="http://www.casadaweb.net" class="fonterodape" target="_blank">Casa da Web</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="874" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="874" height="16" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="30" /></td>
  </tr>
</table>