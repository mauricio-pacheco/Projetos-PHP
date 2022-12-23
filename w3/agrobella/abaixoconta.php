<TABLE height=60 cellSpacing=0 cellPadding=0 width="100%" border=0>
<style type="text/css">
<!--
<!--
.style1 {color: #808080}
-->
.style2 {
	font-size: 12px;
	color: #005492;
}
-->
</style>
        <TBODY>
        <TR>
          <TD class=bgRodapeEsq>&nbsp;</TD>
          <TD width=770>
            <TABLE height=60 cellSpacing=0 cellPadding=0 width="100%" 
              border=0><TBODY>
              <TR>
                <TD class=bgRodapeEsq vAlign=bottom width=155><TABLE height=26 cellSpacing=0 cellPadding=0 width="118%" 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=center>
                        <DIV align=center><SPAN 
                        class=tahoma10preto>Desenvolvimento: </SPAN><A 
                        class=tahoma10preto href="http://www.w3propaganda.com/" 
                        target=_blank><STRONG>W3</STRONG></A> 
                    </DIV></TD></TR></TBODY></TABLE></TD>
                <TD class=bgRodapeDobra>&nbsp;</TD>
                <TD class=bgRodapeDir>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD class=tahoma10branco>
                        <DIV align=right>© Copyright 2007 - Agrobella Alimentos - Linha 21 de Abril, S/N<BR>
                        Frederico Westphalen 
                        - RS - Brasil - CEP 98400-000 - Fone + 55 
                        3744-6565
                          <?php
/*
 *    contador de visitas
 *    @Date:    17-07-07
 *    @Filename:    contador.class.php
 **/
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
    var $userdb = "root";
    var $passdb = "";
    var $namedb = "agrobella";

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
        print(" - Nº de Visitas: <font color='#FCDB00'>".$total);
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
                        </DIV></TD></TR>
                    <TR>
                      <TD vAlign=bottom height=25>
                        <DIV class=tahoma10branco align=right><A 
                        class=tahoma10preto 
                        href="index.php">Home</A> 
                          <span class="style1">|</span> <A class=tahoma10preto 
                        href="quem.php">Empresa</A> <span class="style1">|</span> <A class=tahoma10preto
                        href="pet2.php">Linha Pet</A> 
                        <span class="style1">|</span> <A class=tahoma10preto 
                        href="pet.php">Linha Comercial</A> 
                      <span class="style1">|</span> <A class=tahoma10preto
                        href="pet3.php">Área Agrícola</A> <span class="style1">|</span> <A class=tahoma10preto 
                        href="localizacao.php">Localização</A> <span class="style1">|</span> <A class=tahoma10preto 
                        href="album.php">Fotos</A> <span class="style1">|</span> <A class=tahoma10preto 
                        href="faleconosco.php">Contatos</A></DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD class=bgRodapeDir>&nbsp;</TD></TR></TBODY></TABLE>