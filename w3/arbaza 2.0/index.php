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
        if(!mysql_num_rows($sql)>0)
            $insereVisita = mysql_query("INSERT INTO ".$this->tabVisitas."
                                        (id,ip,data)
                                        VALUES 
                                        ('','".$this->ip."','".$this->data."')");
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
        print("<font color='#FFFFFF'>".$total);
		echo ("</font>");
    }
}
//'Chama' a classe visita e ja pega o ip do visitante
$visita = new visita($_SERVER['REMOTE_ADDR']);
//Chama a funcao verificaVisitante(); 
//Ela verifica se por ip e data se o usuario ja visitou
$visita->verificaVisitante();
//Imprime o total de visitas (total de registros na tabela)


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="refresh" CONTENT="0;URL=principal.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arbaza</title>
<style type="text/css">
<!--
body {
	background-color: #E3E1D0;
}
-->
</style></head>

<body>
</body>
</html>
