<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<table width="980" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" background="imagens/bggeral.png"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="73%" align="left"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' AND status='0' ORDER BY rand() LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
          <?php
						  if ($tipo=='imagem') {
						  						  ?>
          <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></a>
          <?php
						  } else {
						  ?>
          <script src="administrador/scripts/swfobject_modified.js" type="text/javascript"></script>
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
            <param name="movie" value="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&rsquo;t want users to see the prompt. -->
            <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                </div>
              <!--[if !IE]>-->
              </object>
            <!--<![endif]-->
            </object>
          <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
              </script>
          <?php } } ?></td>
        <td width="27%" valign="top" align="left"><SCRIPT src="classes/speed.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('imagens/speed.swf','266','148'); 
    </SCRIPT></td>
      </tr>
    </table></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<table width="980" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" background="imagens/bggeral.png"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> </tr>
    </table></td>
  </tr>
</table>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" class="manchete_textocasa"><img src="imagens/branco.gif" width="2" height="12" /></td>
  </tr>
  <tr>
    <td background="imagens/bggeral.png" class="manchete_texto989" align="center">© Rádio Universal FM

      - Rodeio Bonito/RS - Todos os Direitos Reservados. Fone: 55 3798 1535 - E-mail: <a class="manchete_texto989" href="mailto:radio@universalfm.com.br">radio@universalfm.com.br</a> - 
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
    var $userdb = "universalfm";
    var $passdb = "ufm1002007";
    var $namedb = "universal";

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
       - <a class="manchete_texto989" href="http://www.casadaweb.net"><font class="fontebaixo2">Casa da Web</font></a> - <a class="manchete_texto989" href="http://www.speedrs.com.br"><font class="fontebaixo2">SpeedRS</font></a></td>
  </tr>
</table>