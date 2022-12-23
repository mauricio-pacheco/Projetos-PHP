
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td><table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='principal.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333"><b><b>PÁGINA PRINCIPAL</b></font></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/antena.png" /></td>
                        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>RÁDIO CULTURA</b></font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='noticias.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333">Notícias</font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='galerias.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333">Eventos</font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='videos.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333">Videos</font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='top10.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333">Top 10 Musical</font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='contatos.php';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333">Contatos</font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_menus ORDER BY departamento ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%"><img src="imagens/antena.png" /></td>
                      <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b><?php echo strtoupper($y["departamento"]); ?></b></font></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <?php

$sql2 = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='$idnovo'");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
              </td>
            </tr>
          </table>
          
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td><table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='conteudo.php?id=<?php echo $m["id"]; ?>';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100%" background="imagens/alto.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333"><?php echo $m["titulo"]; ?></font></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <?php } } } } ?>
              </td>
            </tr>
          </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/antena.png" /></td>
                        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>LINKS</b></font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_links ORDER BY titulo ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {

	
?>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E8E8E8" onclick="window.location='<?php echo $y["link"]; ?>';" onmouseover="this.style.backgroundColor='#F2F2F2'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#E8E8E8'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100%" background="imagens/link.png" height="24" class="manchete_texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#333333"><?php echo $y["titulo"]; ?></font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <?php } } ?><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
            <tr>
              <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%"><img src="imagens/antena.png" /></td>
                  <td width="98%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>ENQUETE</b></font></td>
                  <td width="1%"><img src="imagens/antena.png" /></td>
                </tr>
              </table></td>
            </tr>
</table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td> <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?> <FORM style="DISPLAY: inline" name="enquete" action="atualizaenquete.php" method="post">
 <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_textocasa">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><STRONG><?php echo $y["pergunta"]; ?></STRONG></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
              </tr>
          </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php if ( $y["op1"] == '' ) { } else { ?>
              <?php if ($y["foto1"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op1"]; ?>" checked="checked" /></td>
                  <td width="91%" align="left"><?php echo $y["op1"]; ?></td>
                </tr>
              </table>
              <?php } ?>
               <?php if ( $y["op2"] == '' ) { } else { ?>
              <?php if ($y["foto2"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op2"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op2"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op3"] == '' ) { } else { ?>
              <?php if ($y["foto3"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op3"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op3"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op4"] == '' ) { } else { ?>
              <?php if ($y["foto4"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op4"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op4"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op5"] == '' ) { } else { ?>
              <?php if ($y["foto5"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op5"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op5"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op6"] == '' ) { } else { ?>
              <?php if ($y["foto6"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op6"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op6"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op7"] == '' ) { } else { ?>
              <?php if ($y["foto7"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op7"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op7"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op8"] == '' ) { } else { ?>
              <?php if ($y["foto8"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op8"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op8"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op9"] == '' ) { } else { ?>
              <?php if ($y["foto9"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op9"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op9"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op10"] == '' ) { } else { ?>
              <?php if ($y["foto10"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op10"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op10"]; ?></td>
                </tr>
              </table><?php } ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><INPUT class="texto" type="submit" value="votar" name="votar"></td>
                </tr>
              </table></td>
              </tr>
          </table>
          </td>
        </tr>
      </table></FORM>
      <table width="100%" border="0">
              <tr>
                <td width="96%" class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>                  &nbsp;<a class="manchete_texto9" 
                        href="atualizaenquete2.php?idenquete=<?php echo $y["id"]; ?>"><b>Resultados da Enquete</b></a></td>
              </tr>
              <tr>
                <td class="manchete_texto9">&nbsp;<a class="manchete_texto9"
                        href="enquetes.php"><b>Visualizar todas as enquetes...</b></a></td>
              </tr>
      </table><br /><?php } ?></td>
            </tr>
          </table>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/antena.png" /></td>
                        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>EVENTOS</b></font></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                 <MARQUEE behavior="scroll" align="center" direction="up" height="200" scrollamount="1" scrolldelay="16" onmouseover='this.stop()' onmouseout='this.start()'>
				<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_eventosp ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
$dataexpira = $y["dataevento"];
$dataatual = date ("j/m/Y");
$data_a = explode('/', $dataatual); 
$data_f = explode('/', $dataexpira); 	

?>

<?php 
				if ($data_a < $data_f) { 
							 ?>
                <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="24"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="5%"><a class="manchete_texto9" href="verevento.php?id=<?php echo $y["id"]; ?>"><img src="imagens/caendario.png" width="24" height="20" border="0" /></a></td>
                            <td width="95%" class="manchete_texto9">&nbsp;<a class="manchete_texto9" href="verevento.php?id=<?php echo $y["id"]; ?>"><font color="#004080"><?php echo $y["dataevento"]; ?></font></a>
                            
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td width="100%" height="24"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="5%"><a class="manchete_texto9" href="verevento.php?id=<?php echo $y["id"]; ?>"><img src="imagens/starnova.png" width="22" height="22" border="0" /></a></td>
                            <td width="95%" class="manchete_texto9">&nbsp;<font color="#004080"><a class="manchete_texto9" href="verevento.php?id=<?php echo $y["id"]; ?>"><?php echo $y["nomegaleria"]; ?></a>
                             
                            
                            </font></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table><?php 
				}else { 
				}
							 ?>
               
				
				<?php } }  ?></MARQUEE>

          
          <table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
            <tr>
              <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%"><img src="imagens/antena.png" /></td>
                  <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>METEOROLOGIA</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
<table width="208" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><iframe src="http://www.tempoagora.com.br/selos_iframe/sky_Palmitinho-RS.html" height="260px" width="180px" frameborder="0" allowtransparency="yes" scrolling="No"></iframe></td>
            </tr>
          </table>
<table width="208" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          </table>
<table width="208" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
  <tr>
    <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%"><img src="imagens/antena.png" /></td>
        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>PUBLICIDADE</b></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='laterale' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
  
   ?>
   
      <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="208" /></a>
    <?php 
				
							 ?>
<?php  } ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="2" /></td>
  </tr>
</table>

