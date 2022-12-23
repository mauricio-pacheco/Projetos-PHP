<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="582" class="manchete_textocasab">&copy; Da Luz Imóveis - Corretor de Im&oacute;veis. Fone: (55) 3744.2231 e (55) 9996.8643<br>Rua: Santo Cerutti, nº 567, Bairro Barril - Frederico Westphalen.<br />Consulte outras opções de imóveis na imobiliária.<br /><br />
</td>
    <td width="235" align="center"><span class="manchete_textocasab"><span class="manchete_texto989">
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
    var $userdb = "daluzimoveisfw";
    var $passdb = "7284159E";
    var $namedb = "daluzimoveisfw";

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
    </span></span></td>
    <td width="163" align="right"><span class="manchete_textocasab"> Desenvolvimento: <a href="http://www.casadaweb.net" target="_blank" class="manchete_textocasab">Casa da Web</a>.</span></td>
  </tr>
</table>