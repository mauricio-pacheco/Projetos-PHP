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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ATUALIZAR TOP 10 MUSICAL</b></font></td>
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
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="fontetabela"><strong>AUDIOS</strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><span class="fontetabela">Arquivo MP3 Musica 1: </span>
<form action="processa1.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio1" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit1" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 2: </span>
<form action="processa2.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio2" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit2" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 3: </span>
<form action="processa3.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio3" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit3" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 4: </span>
<form action="processa4.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio4" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit4" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 5: </span>
<form action="processa5.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio5" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit5" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 6: </span>
<form action="processa6.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio6" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit6" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 7: </span>
<form action="processa7.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio7" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit7" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 8: </span>
<form action="processa8.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio8" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit8" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 9: </span>
<form action="processa9.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio9" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit9" /></form><br />
                      
                      <span class="fontetabela">Arquivo MP3 Musica 10: </span>
<form action="processa10.php" method="post" enctype="multipart/form-data" name="cadastro"><input name="audio10" type="file" class="fonteadm" />
                      <input class="manchete_texto" type="submit" value="ENVIAR" name="Submit10" /></form><br />
                      
                      </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
              <p>
                <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_top10 WHERE id='1' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe enquetes cadastradas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   { ?>
              </p>
              <p class="fontetabela"><strong>OBS: Tamanho das imagens: 187 px de Largura X 125 px de Altura</strong></p>
              <form name="form1" action="cadtop10.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
              </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 1:
                          <input name="artista1" type="text" class="fontetabela" value="<?php echo $y["artista1"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 1:
                          <input name="musica1" type="text" class="fontetabela" value="<?php echo $y["musica1"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto1"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 1:
                          <input name="foto1" type="file" class="fontetabela" /></td>
                      </tr>
                    </table>
                      </td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 2:
                          <input name="artista2" type="text" class="fontetabela" value="<?php echo $y["artista2"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 2:
                          <input name="musica2" type="text" class="fontetabela" value="<?php echo $y["musica2"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto2"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 2:
                          <input name="foto2" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 3:
                          <input name="artista3" type="text" class="fontetabela" value="<?php echo $y["artista3"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 3:
                          <input name="musica3" type="text" class="fontetabela" value="<?php echo $y["musica3"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto3"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 3:
                          <input name="foto3" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 4:
                          <input name="artista4" type="text" class="fontetabela" value="<?php echo $y["artista4"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 4:
                          <input name="musica4" type="text" class="fontetabela" value="<?php echo $y["musica4"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto4"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 4:
                          <input name="foto4" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 5:
                          <input name="artista5" type="text" class="fontetabela" value="<?php echo $y["artista5"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 5:
                          <input name="musica5" type="text" class="fontetabela" value="<?php echo $y["musica5"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto5"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 5:
                          <input name="foto5" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 6:
                          <input name="artista6" type="text" class="fontetabela" value="<?php echo $y["artista6"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 6:
                          <input name="musica6" type="text" class="fontetabela" value="<?php echo $y["musica6"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto6"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 6:
                          <input name="foto6" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 7:
                          <input name="artista7" type="text" class="fontetabela" value="<?php echo $y["artista7"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 7:
                          <input name="musica7" type="text" class="fontetabela" value="<?php echo $y["musica7"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto7"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 7:
                          <input name="foto7" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 8:
                          <input name="artista8" type="text" class="fontetabela" value="<?php echo $y["artista8"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 8:
                          <input name="musica8" type="text" class="fontetabela" value="<?php echo $y["musica8"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto8"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 8:
                          <input name="foto8" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 9:
                          <input name="artista9" type="text" class="fontetabela" value="<?php echo $y["artista9"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 9:
                          <input name="musica9" type="text" class="fontetabela" value="<?php echo $y["musica9"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto9"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 9:
                          <input name="foto9" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Artista 10:
                          <input name="artista10" type="text" class="fontetabela" value="<?php echo $y["artista10"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td>Música 10:
                          <input name="musica10" type="text" class="fontetabela" value="<?php echo $y["musica10"]; ?>" size="70" /></td>
                      </tr>
                      <tr>
                        <td><img src="ups/fotosmusicas/<?php echo $y["foto10"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td>Foto Artista 10:
                          <input name="foto10" type="file" class="fontetabela" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                <table width="100%" border="0">
                  <tr>
                  <td class="fontetabela" align="left"><input name="button" type="submit" class="fontetabela" value="Cadastrar Top 10 Musical" /></td>
                </tr>
              </table> <?php
  }
  }
 ?>
                <table width="100%" border="0">
                  <tr>
                  <td>   </td>
                </tr>
            </table></form></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="2" /></td>
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