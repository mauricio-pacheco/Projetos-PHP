<?php include("meta.php"); ?>
<?php include("head.php"); ?>
<style type="text/css">
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA_gBBHzzjFj50hx6J2Nno-hSubjlxlBqM96KYSZuyEYQwKggjwxTgaPZb7zVlwjKPNSgFX8SNxWY3FQ
" 
      type="text/javascript"></script>
    <script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script>
    <script src="classes/gmlocalsearch.js" type="text/javascript"></script>    
    <script type="text/javascript">
 
      function initialize() {
        if (GBrowserIsCompatible()) {
        
          // Create and Center a Map
          var map = new GMap2(document.getElementById("map_canvas"));
          map.setCenter(new GLatLng(-27.346764, -53.393555), 12);
          map.addControl(new GLargeMapControl());
          map.addControl(new GMapTypeControl());
 
          // bind a search control to the map, suppress result list
          map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
        }
      }
      GSearch.setOnLoadCallback(initialize);
    </script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<BODY class="auto fs3" id=bd onLoad="initialize()" onUnload="GUnload()">
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
    <TR>
      <TD>
     <?php include("cabecalho.php"); ?>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center>
        <TBODY>
          <TR>
            <TD bgColor=#ffffff align=middle>
             <?php include("cima.php"); ?></TD>
          </TR>
        </TBODY>
      </TABLE>
      <?php include("menu.php"); ?>
        <TABLE id=tabela border=0 cellSpacing=0 cellPadding=0 width=760 
      align=center>
          <TBODY>
            <TR>
              <TD id=header_td bgColor=#ffffff colSpan=2><?php include("banner.php"); ?></TD>
            </TR>
            <TR>
              <TD bgColor=#ffffff height=8 colSpan=2></TD>
            </TR>
            <TR>
              <TD background="imagens/fundotabela.jpg" vAlign=top width=200><?php include("esquerdo.php"); ?> <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" id=main_td 
          bgColor=#ffffff vAlign=top width=544><DIV id=div-main>
                <CENTER>
                  <DIV style="Z-INDEX: 666" id=flash1>
                    <table background="imagens/barra1.jpg" height="40" width="100%" border="0">
                      <tr>
                        <td class="manchete_texto"><b>
                          <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_obras WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>N&atilde;o existe notic&iacute;as cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                          P&aacute;gina Principal</b></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table height="100" bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td width="2%"><img src="administrador/galeriadeobras/<?php echo $y["foto"]; ?>" /></td>
                            <td align="left" width="98%" valign="top" class="manchete_texto3"><table width="100%" border="0">
                              <tr>
                                <td class="manchete_texto3"><b><?php echo $y["nome"]; ?></b></td>
                              </tr>
                            </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td class="manchete_texto"><b>Tipo:</b> <?php echo $y["tipo"]; ?><?php if 
									  ($y["valor"] == "") { echo ""; } else { ?> -- <b>Valor:</b> <?php echo $y["valor"]; ?> <?php }  ?> <br> <b>Cidade:</b> <?php echo $y["cidade"]; ?> / <?php echo $y["uf"]; ?><br>
                                    <b>Endere&ccedil;o:</b> <?php echo $y["endereco"]; ?> - <b>N&uacute;mero:</b> <?php echo $y["numero"]; ?> <br><b>Bairro:</b> <?php echo $y["bairro"]; ?> - <b>Complemento:</b> <?php echo $y["complemento"]; ?></td>
                                </tr>
                              </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                   <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="administrador/imagens/detalheobra.png"></td>
                      </tr>
                    </table>
                    <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top"><table width="100%" border="0">
                              <tr>
                                  <td class="pontilhada2" align="left">
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><span class="manchete_texto"><?php echo $y["descricao"]; ?></span></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td>                          <img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <?php
					
					if ( $y["sessao"] == 'Lançamentos' or $y["sessao"] == 'Obras Realizadas' ) {
						
					}
					
					else {
					?>
                     <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="administrador/imagens/andaobra.png"></td>
                      </tr>
                    </table>
                    <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top">
                        <?php

include "administrador/conexao.php";

$id2 = $y["id"];

$sql3 = mysql_query("SELECT * FROM gestao_trabalho WHERE idobra='$id2' ORDER BY id");
$contar3 = mysql_num_rows($sql3); 

if ($contar3 < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe trabalho cadastrado!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($z = mysql_fetch_array($sql3))
   {
   ?>
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top">
                            <table width="100%" border="0">
                              <tr>
                                  <td class="pontilhada2" align="left"><table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Funda&ccedil;&atilde;o:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["fundacao"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["fundacao"] == '100') { echo "<b>" . $z["fundacao"] . " %</b>"; } else if ($z["fundacao"] == '0') { echo "<b>" . $z["fundacao"] . "</b> %"; }else { echo $z["fundacao"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Estrutura:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["estrutura"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["estrutura"] == '100') { echo "<b>" . $z["estrutura"] . " %</b>"; } else if ($z["estrutura"] == '0') { echo "<b>" . $z["estrutura"] . "</b> %"; }else { echo $z["estrutura"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                   
                                   
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Alvenaria:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["alvenaria"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["alvenaria"] == '100') { echo "<b>" . $z["alvenaria"] . " %</b>"; } else if ($z["alvenaria"] == '0') { echo "<b>" . $z["alvenaria"] . "</b> %"; }else { echo $z["alvenaria"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                   
                                   
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Instalações Hidro-sanitárias:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["instalacao"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["instalacao"] == '100') { echo "<b>" . $z["instalacao"] . " %</b>"; } else if ($z["instalacao"] == '0') { echo "<b>" . $z["instalacao"] . "</b> %"; }else { echo $z["instalacao"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                   
                                   
                                   
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Instalações Elétricas:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["instalacao2"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["instalacao2"] == '100') { echo "<b>" . $z["instalacao2"] . " %</b>"; } else if ($z["instalacao2"] == '0') { echo "<b>" . $z["instalacao2"] . "</b> %"; }else { echo $z["instalacao2"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    
                                      <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Contrapiso / Reboco Interno:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["piso"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["piso"] == '100') { echo "<b>" . $z["piso"] . " %</b>"; } else if ($z["piso"] == '0') { echo "<b>" . $z["piso"] . "</b> %"; }else { echo $z["piso"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Reboco externo:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["reboco"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["reboco"] == '100') { echo "<b>" . $z["reboco"] . " %</b>"; } else if ($z["reboco"] == '0') { echo "<b>" . $z["reboco"] . "</b> %"; }else { echo $z["reboco"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                     <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Revestimento externo - Pastilhas:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["revestimento"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["revestimento"] == '100') { echo "<b>" . $z["revestimento"] . " %</b>"; } else if ($z["revestimento"] == '0') { echo "<b>" . $z["revestimento"] . "</b> %"; }else { echo $z["revestimento"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                     <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Esquadrias Metálicas / Vidros:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["esquadrias"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["esquadrias"] == '100') { echo "<b>" . $z["esquadrias"] . " %</b>"; } else if ($z["esquadrias"] == '0') { echo "<b>" . $z["esquadrias"] . "</b> %"; }else { echo $z["esquadrias"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Revestimento cerâmico / Pisos laminados / Pedras:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["ceramico"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["ceramico"] == '100') { echo "<b>" . $z["ceramico"] . " %</b>"; } else if ($z["ceramico"] == '0') { echo "<b>" . $z["ceramico"] . "</b> %"; }else { echo $z["ceramico"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Portas de madeira:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["portas"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["portas"] == '100') { echo "<b>" . $z["portas"] . " %</b>"; } else if ($z["portas"] == '0') { echo "<b>" . $z["portas"] . "</b> %"; }else { echo $z["portas"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Gesso / Massa corrida:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["gesso"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["gesso"] == '100') { echo "<b>" . $z["gesso"] . " %</b>"; } else if ($z["gesso"] == '0') { echo "<b>" . $z["gesso"] . "</b> %"; }else { echo $z["gesso"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    
                                    <table width="99%" border="0" align="center">
                                    <tr>
                                      <td class="manchete_texto">Pintura:</td>
                                    </tr>
                                  </table>
                                    <table width="99%" border="0" align="center">
                                      <tr>
                                        <td><table width="100%" border="0">
                                          <tr>
                                            <td width="8%"><img src="administrador/imagens/cancha.gif" width="36" height="30"></td>
                                            <td width="80%" align="left"><table width="<?php echo $z["pintura"]; ?>%" border="0" align="left">
                                              <tr>
                                                <td bgcolor="#2866B4"><img src="administrador/imagens/branco.gif" width="2" height="6"></td>
                                              </tr>
                                            </table></td>
                                            <td width="8%" class="manchete_texto"><?php if ($z["pintura"] == '100') { echo "<b>" . $z["pintura"] . " %</b>"; } else if ($z["pintura"] == '0') { echo "<b>" . $z["pintura"] . "</b> %"; }else { echo $z["pintura"] . "%"; } ?></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                    
                                    </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <?php }} ?>
                        </td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                     <?php } ?>
                                       
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="administrador/imagens/imagensanex.png"></td>
                      </tr>
                    </table>
                    
                    <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top">


  
   <table width="100%" border="0">
                              <tr>
                                  <td class="pontilhada" align="center"> 
								  <script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
								  <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM gestao_anexos WHERE idobra='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/fotos/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/fotos/p/".$linha2['fotomenor']."'></a>
";

}}
  
   ?></td>
                                </tr>
                              </table><?php }  ?></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    
                                  <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    
                    
                     <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barralocal.png"></td>
                      </tr>
                    </table>
                    
                    
                    
                   <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top">


  
   <table width="100%" border="0">
                              <tr>
                                  <td class="pontilhada" align="center"> 
								 <div id="map_canvas" style="width: 500px; height: 300px"></div></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0"><tr>
                                      <td align="left" width="14%"><br><a href="javascript:history.go(-1)"><img src="imagens/voltar.jpg" border="0"></a><br /></td>
                                    </tr>
                                  </table> 
                    
                    
                 <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>   
                    
                    
                    
                  </DIV>
                </CENTER>
              </DIV></TD>
            </TR>
        </TABLE></TD>
      <TD width=1>&nbsp;</TD>
      <TD vAlign=top></TD>
    </TR>
  </TBODY>
</TABLE>
<DIV id=barra_login>
<DIV style="BACKGROUND-COLOR: #FF7800" id=cabecalho2>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=740 align=center>
  <TBODY>
  <TR>
    
    <TD vAlign=center width=408 align=left>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=467>
        <TBODY>
        <TR>
          <TD vAlign=center width=202 align=left>&nbsp;</TD>
          <TD vAlign=center width=180 align=left>&nbsp;</TD>
          <TD vAlign=center width=85 align=left>&nbsp;</TD></TR></TBODY></TABLE></TD>
<TD vAlign=center width=332 align=right>&nbsp;</TD></TR></TBODY></TABLE></DIV></DIV>
<DIV id=bottom>
  <table width="100%" height="120" border="0" align="center" background="imagens/baixo.gif">
    <tr>
      <td valign="top"><?php include("rodape.php"); ?></td>
    </tr>
  </table>
<DIV style="BACKGROUND-COLOR: #FF7800"></DIV></DIV>
<SCRIPT type=text/javascript>
    <!--
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    -->	
    </SCRIPT>

<SCRIPT type=text/javascript>
    <!--
        try {
            var pageTracker = _gat._getTracker("UA-5629445-1");
            pageTracker._trackPageview();
        } catch(err) {}
    -->
    </SCRIPT>
</BODY></HTML>
