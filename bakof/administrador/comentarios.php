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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR COMENTÁRIOS DA NOTÍCIA</b></font></td>
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
            <td><table width="100%" border="0" align="center">
              <tr>
                <td><span class="rodape">
                  <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=manchete_texto><b>N&atilde;o existe notícias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                  <span class="manchete_texto">
                    <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                    </span></span>
                  <table width="100%" border="0" align="center">
                    <tr>
                      <td align="left" width="98%"><table width="100%" border="0">
                        <tr>
                          <td height="74"><table width="100%" border="0">
                            <tr>
                              <td width="4%"><img src="ups/capasnoticia/<?php echo $n["foto"]; ?>" width="150" height="112" /></td>
                              <td width="96%" class="manchete_texto5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><font color="#000000"><b><?php echo $n["titulo"]; ?></b></font></td>
                                </tr>
                                <tr>
                                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                </tr>
                                <tr>
                                  <td><div align="justify"><font color="#000000"><?php echo $n["legenda"]; ?></font></div></td>
                                </tr>
                                <tr>
                                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                                </tr>
                                <tr>
                                  <td><font color="#000000"><em>Data de Publicação: <?php echo $n["data"]; ?> <?php echo $n["hora"]; ?></em></font></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                            <span class="rodape">
                              <?php

$sql = mysql_query("SELECT * FROM cw_comentarios WHERE idnoticia='$id' ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=fontetabela><b>N&atilde;o existe comentários cadastrados!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                              </span>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="3%"><img src="imagens/comentarios.png" width="24" height="24" /></td>
                                <td width="61%">&nbsp;<span class="manchete_texto"><b><?php echo $y["nome"]; ?></b> - E-mail: <a href="mailto:<?php echo $y["email"]; ?>" class="fontebaixo2"><?php echo $y["email"]; ?></a> - IP: <?php echo $y["ip"]; ?></span></td>
                                <td width="36%" align="right"><span class="manchete_texto"><em>Data da Postagem: <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?></em></span>&nbsp;</td>
                              </tr>
                            </table>
                            <table width="100%" border="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="1" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="manchete_texto"><div align="justify"><?php echo $y["texto"]; ?></div></td>
                              </tr>
                            </table>
                            <table width="100%" border="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="1" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="76%"><a href="liberac.php?id=<?php echo $y["id"]; ?>&amp;idnoticia=<?php echo $n["id"]; ?>" class="manchete_texto4"><strong>LIBERAR COMENTÁRIO</strong></a> - <a href="excluec.php?id=<?php echo $y["id"]; ?>&amp;idnoticia=<?php echo $n["id"]; ?>" class="manchete_texto6"><strong>APAGAR COMENTÁRIO</strong></a></td>
                                <td width="24%" align="right" class="fontetabela"><em>
                                  <?php if ( $y["status"] == '1' ) { ?>
                                  <font color="#FF0000"><b>AGUARDANDO LIBERAÇÃO</b>
                                    <?php } else { ?>
                                    </font><font color="#006600"><b>LIBERADO</b></font>
                                  <?php } ?>
                                </em></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td><span style="MARGIN: 0px">
                            <?php
  }
  }
 ?>
                          </span></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <span style="MARGIN: 0px">
                    <?php
  }
  }
 ?>
                  </span></td>
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