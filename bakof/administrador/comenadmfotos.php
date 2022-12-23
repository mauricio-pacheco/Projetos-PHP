<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINSITRAR IMAGENS DO EVENTO</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td>
             <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>Não existe galerias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
            <table width="100%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0" align="center">
                  <tr>
                    <td class="manchete_texto" align="left"><table width="100%" border="0" align="center">
                      <tr>
                        <td width="2%"><img src="ups/galerias/<?php echo $n["foto"]; ?>" /></td>
                        <td align="left" width="98%" valign="top" class="manchete_texto3"><table width="100%" border="0">
                          <tr>
                            <td class="manchete_texto"><?php echo $n["nomegaleria"]; ?></td>
                          </tr>
                        </table>
                          <table width="100%" border="0">
                            <tr>
                              <td class="manchete_texto"><b>Data da Galeria:</b> <?php echo $n["dataevento"]; ?><br /><b>Data da Postagem:</b> <?php echo $n["data"]; ?> / <?php echo $n["hora"]; ?><br /><?php echo $n["comentario"]; ?></td>
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
                  <tr>
                    <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto" align="left"><?php

$sql = mysql_query("SELECT * FROM cw_fotos WHERE idgaleria='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>Não existe imagens anexadas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="6%"><img src="ups/fotosgaleria/p/<?php echo $y["fotomenor"]; ?>" /></td>
                          <td width="94%"><form action="cadcomenfotos.php" method="post" name="form1" id="form1" onsubmit="return validar(this)">
                            <table width="100%" border="0">
                              <tr>
                                <td>&nbsp;</td>
                                <td>Legenda: <span class="style15">
                                  <input name="comentario" type="text" class="texto" size="74" value="<?php echo $y["comentario"]; ?>" />
                                  <span style="MARGIN: 0px">
                                    <input name="submit" class="texto" type="submit" style="FONT-SIZE: 10px" value="POSTAR LEGENDA" />
                                    <input type="hidden" name="idanexo" value="<?php echo $y["id"]; ?>" />
                                    <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                                  </span></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><a href="delimagemfotos.php?id=<?php echo $n["id"]; ?>&amp;idanexo=<?php echo $y["id"]; ?>&amp;fotomenor=<?php echo $y["fotomenor"]; ?>&amp;foto=<?php echo $y["foto"]; ?>" class="manchete_texto6" onclick="return confirm('Tem certeza que deseja apagar a Imagem ?')"><b>APAGAR IMAGEM</b></a></td>
                              </tr>
                            </table>
                          </form></td>
                        </tr>
                      </table>
                      <?php
  }
  }
 ?></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                  <tr>
                    <td class="rodape" align="left"><span style="MARGIN: 0px">
                      <?php
  }
  }
 ?>
                    </span></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>