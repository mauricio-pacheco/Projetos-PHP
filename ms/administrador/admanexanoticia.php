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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR IMAGENS DOS SLIDES</b></font></td>
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
            <td><table width="98%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0" align="center">
                  <tr>
                    <td class="manchete_texto" align="left"><span class="rodape">
                      <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe noticias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                      </span>
                      <table width="100%" border="0">
                        <tr>
                          <td width="96%" class="manchete_texto5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><font color="#000000"><b><?php echo $n["titulo"]; ?></b></font></td>
                              </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto" align="left"><?php

$sql = mysql_query("SELECT * FROM cw_anexosnot WHERE idnot='$id' ORDER BY id");
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
                          <td width="6%"><img src="ups/fotosnot/p/<?php echo $y["fotomenor"]; ?>" /></td>
                          <td width="94%">
                            <table width="100%" border="0">
                              <tr>
                                <td><a href="delimagemnot.php?id=<?php echo $n["id"]; ?>&amp;idanexo=<?php echo $y["id"]; ?>&amp;fotomenor=<?php echo $y["fotomenor"]; ?>&amp;fotomaior=<?php echo $y["fotomaior"]; ?>" class="manchete_texto6" onclick="return confirm('Tem certeza que deseja apagar a Imagem ?')"><b>APAGAR IMAGEM</b></a></td>
                              </tr>
                              </table>
                            </td>
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
                </table>
                  <span style="MARGIN: 0px"> </span></td>
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