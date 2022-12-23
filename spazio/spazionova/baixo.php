<META http-equiv=Content-Type content="text/html; charset=utf-8">
<DIV id=globalfooter>
<DIV id=globalfooter-content>
<DIV id=copy>
  <table width="94%" border="0" align="center" height="30">
    <tr>
      <td width="17%"><div align="center"><span class="style1">Visitante N&ordm;:<br />
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
    var $userdb = "spazma";
    var $passdb = "sclubfw";
    var $namedb = "spaziofw";

    //Nome da tabela
    var $tabVisitas = "visitas";
    
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
    function verificaVisitante()
    {    
        //Chama a funcao de conexao com db
        $this->conectar();
        /* Seleciona por ip e data  */
        $sql = mysql_query("SELECT ip,data
                            FROM ".$this->tabVisitas." 
                            WHERE ip='".$this->ip."' AND data='".$this->data."'")or die(mysql_error());
        /* Verifica se a selecao feita existe, caso nao exista insere novo */
        
        //else print("Ja visitou");
    }
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
        print("<font color='#158A15' face='Courier New' size='3'>".$total);
		echo ("</font>");
    }
}
//'Chama' a classe visita e ja pega o ip do visitante
$visita = new visita($_SERVER['REMOTE_ADDR']);
//Chama a funcao verificaVisitante(); 
//Ela verifica se por ip e data se o usuario ja visitou
$visita->verificaVisitante();
//Imprime o total de visitas (total de registros na tabela)
$visita->imprime();
?>
      </span></div></td>
      <td width="61%">&nbsp;&nbsp;<span class="style1">&copy;
          <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma saída esperada é: terça-feira 29 de janeiro de 2008   
?>
Spazio Club - Frederico Westphalen/RS <br />
&nbsp; Desenvolvimento: <a href="http://www.casadaweb.net" class="spazio" target=_blank>Casa da Web</a> - Todos os direitos reservados.</span></td>
      <td width="22%">&nbsp;</td>
    </tr>
  </table>
</DIV>
<DIV id=links></DIV>
</DIV></DIV>