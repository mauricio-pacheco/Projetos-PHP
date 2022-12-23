<table width="980" bgcolor="#333333" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table width="980" bgcolor="#333333" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="966" bgcolor="#333333" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="364" class="manchete_textocasab">Av. São Paulo , 1037<br />
          Frederico Westphalen– RS<br />
          CEP: 98400-000</td>
        <td width="400"><p class="manchete_textocasab">Horário de Funcionamento:<br />
          2ª à 6ª das 15:00 hs às 1:00 hs <br />
          Sábado das 10:00 hs às 20:00 hs <br />
        </p></td>
        <td width="202"><span class="manchete_textocasab">&copy; Tapetão. Todos os direitos reservados.<br />
          Desenvolvimento: <a href="http://www.casadaweb.net" target="_blank" class="manchete_textocasab">Casa da Web<span class="manchete_texto989"> <br />
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
    var $userdb = "tapetao7_casa";
    var $passdb = "tapete2012";
    var $namedb = "tapetao7_tapete";

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
          </span></a></span></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" bgcolor="#333333" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/barrad.png" /></td>
  </tr>
</table>
