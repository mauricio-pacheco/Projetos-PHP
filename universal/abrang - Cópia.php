<?php include("meta.php"); ?>
<script language="javascript">
function toggle(obj) {
var el = document.getElementById(obj);
if ( el.style.display != 'none' ) {
el.style.display = 'none';
}
else {
el.style.display = '';
}
}
 </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><SCRIPT src="classes/carrega2.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/menu.swf','980','40'); 
    </SCRIPT></td>
  </tr>
</table>
<script>
  function camada( s2 ) {
  var sDiv = document.getElementById( s2 );
  if( sDiv.style.visibility == "hidden" ) {
  sDiv.style.visibility = "visible";
  } else {
  sDiv.style.visibility = "hidden";
  }
  }
</script>
<div id="menu" style="position:absolute; z-index:9; VISIBILITY: s2; top: 118px; left: 274px;"><a href="#" onClick="camada('menu');"> <img src="imagens/fechar.jpg" border="0" /></a><br />
  <SCRIPT src="classes/banner.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/mapa2.swf','734','550'); 
    </SCRIPT></div>
<table width="980" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="235" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="494" valign="top" bgcolor="#FFFFFF">
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>ABRANG??NCIA</b></font></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="manchete_texto9"><p><strong>Endere??o da R??dio</strong></p>
              <p>R??dio Universal ??? 102.9 FM<br />
                Av. do Com??rcio, 841 ??? Sala 02<br />
                Bairro Centro ??? CEP: 98.360-000<br />
                Rodeio Bonito/RS<br />
                Fone: 55 3798 1535<br />
              </p>
              <p><strong>Abrang??ncia</strong></p>
              <p><em><strong>Rio Grande do Sul</strong></em></p>
              <p>Ametista do Sul, Alpestre, Almirante Tamandar?? do Sul, Barra funda, Boa Vista das Miss??es, Cai??ara, Carazinho, Cerro Grande, Chapada, Condor, Constantina, Cristal do Sul, Dois irm??os das Miss??es, Engenho Velho, Entre Rios do Sul, Erval Seco, Frederico Westphalen, Gramado dos Loureiros, Irai, Jaboticaba, Lajeado do Bugre, Liberato Salzano, Miragua??, Nonoai, Nova Boa Vista, Novo Barreiro, Novo Tiradentes, Novo Xingu, Palmeira das Miss??es, Palmitinho, Panambi, Pinhal, Pinheirinho do Vale, Planalto, Pont??o, Redentora, Rio dos ??ndios, Rodeio Bonito, Ronda Alta, Rondinha, Sagrada Fam??lia, Santo Augusto, S??o Jos?? das Miss??es, S??o Pedro das Miss??es, S??o Valentin, Sarandi, Seberi, Taquaru???? do Sul, Tenente Portela, Tr??s Palmeiras, Trindade do Sul, Vicente Dutra, Vista Alegre, Vista Ga??cha.<br />
              </p>
              <p><strong><em>Santa Catarina</em></strong></p>
              <p>??guas de Chapec??, ??guas Frias, Caib??, Chapec??, Cunha Por??, Descanso, Guaraciaba, Ilha Redonda, Ipor?? do Oeste, Iraceminha, Itapiranga, Maravilha, Mondai, Palmitos, Pinhalzinho, S??o Carlos, S??o Miguel do Oeste, Saudades.<br />
              </p></td>
          </tr>
        </table></td>
        <td width="235" valign="top"><?php include("direito.php"); ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" background="imagens/baixo.png" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="imagens/branco.gif" width="2" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
