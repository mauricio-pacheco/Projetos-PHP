<table height="30" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><span class="manchete_texto99">Fotos meramente ilustrativas, o Centro de eventos Seberi reserva-se ao direito de alterar, 
          sem prévia comunicação, as características físicas, 
    cores e disposição dos salões e móveis que o guarnecem.</span></td>
  </tr>
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" />
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="fontetabela" align="center"><strong>&copy; Copyright
              <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>&nbsp;
- Posto Seberi - Fone: (55) 3746 1083 - BR 386 - Km 51 - Seberi   / RS CEP: 98380-000 -
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
    var $hostdb = "postoseberi.com.br";
    var $userdb = "postoseberi";
    var $passdb = "Po375Seb2";
    var $namedb = "postoseberi";

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
        print("Você é nosso visitante Nº: <font color='#008D35'>".$total);
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
 - Desenvolvimento: <a href="http://www.casadaweb.net" target="_blank" class="fontetabela">Casa da Web</a></strong></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>