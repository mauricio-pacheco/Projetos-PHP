<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" bgcolor="#F8FBF6"><div align="justify">
      <table width="94%" border="0" align="center">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table class="style27" width="100%" border="0">
            <tr>
              <td width="2%"><img src="rua.gif" width="27" height="24" /></td>
              <td width="98%"><span class="style13"><font color="#494949">Frederico Westphalen/RS - Estrada BR 386, s/n - Km 35 - Fone: (0xx55) 3744.4747 / 3744.3301</font></span></td>
            </tr>
            <tr>
              <td><img src="rua.gif" width="27" height="24" /></td>
              <td><span class="style13"><font color="#494949">Porto Alegre/RS - Rua &Acirc;ngelo Dourado, 514 - Bairro Anchieta - Fone: (0xx51) 3371.2246 / 3371.1974</font></span></td>
            </tr>
            <tr>
              <td><img src="rua.gif" width="27" height="24" /></td>
              <td><span class="style13"><font color="#494949">Foz do Igua&ccedil;&uacute;/PR - Av. M&aacute;rio Filho N&ordm; 3218 - Bairro Jardim Liberdade - Fone: (0xx45) 3525 / 0325</font></span></td>
            </tr>
            <tr>
              <td><img src="rua.gif" width="27" height="24" /></td>
              <td><span class="style13"><font color="#494949">Caibi/SC - Rua sete de setembro,827 - Bairro Centro - Fone: (0xx49) 3648-0255</font></span></td>
            </tr>
            <tr>
              <td><img src="rua.gif" width="27" height="24" /></td>
              <td><span class="style13"><font color="#494949">Prudentópolis/PR - Rodovia 373 Km 265,5 Bairro Vila Magdalena Fone (0xx42) 3446-1740</font></span></td>
            </tr>
          </table>
            <table width="100%" border="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="5%"><img src="copy.gif" width="30" height="27" /></td>
                <td width="95%"><span class="style27">Copyright &copy;
                    <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
&nbsp;Arbaza Alimentos - <span class="style10">N&ordm; de Visitantes:
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
    var $userdb = "arbazacombr";
    var $passdb = "arbazafw2008";
    var $namedb = "arbazacombr";

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
        print("<font color='#008000'>".$total);
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
- </span><span class="style10">Desenvolvido por:</span> <a href="http://www.w3propaganda.com" target="_blank" class="style27"><font color="#333333">W3 Propaganda</font></a></span></td>
              </tr>
            </table>
            </td>
        </tr>
      </table>
      <ADDRESS>
      </ADDRESS>
    </div></td>
  </tr>
</table>
</body>
</html>
