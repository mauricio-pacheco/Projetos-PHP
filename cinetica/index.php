<?php include("meta.php"); ?>
<table width="970" bgcolor="#FFFFFF" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php include("cima.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
  </tr>
</table>
<table width="960" border="0" height="45" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#EE5F00"><?php include("menucima.php"); ?></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("bannermeio.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="330"><img src="imagens/noticias.png" /></td>
    <td width="10">&nbsp;</td>
    <td width="280"><img src="imagens/videos.png" width="280" height="30" /></td>
    <td width="10">&nbsp;</td>
    <td width="336"><img src="imagens/top10.png" width="335" height="30" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="966" height="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="330" valign="top" class="fonte"><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=330>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=50%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$iddep = $array["iddep"];
$departamento = $array["departamento"];
$foto = $array["foto"];
$contador = $array["contador"];
$legenda = $array["legenda"];



?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
        <tr>
          <td width="77%" valign="top"><table width="100%" border="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
                <tr>
                  <td width="8%" class="pontilhada2" valign="top"><?php if ($foto == '') { } else { ?>
                    <a href="vernoticia.php?id=<?php echo $id.""; ?>"><img title="<?php echo $titulo.""; ?>" alt="<?php echo $titulo.""; ?>" src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" border="0" width="100" height="78" /></a>
                    <?php } ?></td>
                  <td width="92%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td class="fonte"><?php echo $data.""; ?> - <a href="vernoticia.php?id=<?php echo $id.""; ?>"  class="fonte"><b><?php echo $titulo.""; ?></b></a></td>
                    </tr>
                    <tr>
                      <td class="fontebaixo2">( <?php echo $contador.""; ?> Visualiza&ccedil;&otilde;es ) Sess&atilde;o: <b>
                        <?php 
	$sql2 = mysql_query("SELECT * FROM cw_depnot WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];  }
	
	?>
                      </b></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0">
                        <tr>
                          <td width="3%"><a href="vernoticia.php?id=<?php echo $id.""; ?>" class="fonte"><img border="0" src="imagens/mais.png" /></a></td>
                          <td width="97%" class="fonte">&nbsp;<a href="vernoticia.php?id=<?php echo $id.""; ?>" class="fonte">Leia mais...</a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
      <?php


$sql_select_all = "SELECT * FROM cw_noticias ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)



?></td>
    <td width="10">&nbsp;</td>
    <td width="280" valign="top"><table width="100%" border="0" class="fonte">
      <tr>
        <td><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_videos ORDER BY id DESC LIMIT 4");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe notícias cadastrados!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
          <table width="100%" border="0" class="fonte">
            <tr>
              <td width="5%" class="fonte"><a href="vervideo.php?id=<?php echo $y["id"]; ?>"><img src="imagens/video.png" border="0" /></a></td>
              <td width="95%" class="fonte"><a href="vervideo.php?id=<?php echo $y["id"]; ?>" class="fonte"><?php echo $y["titulo"]; ?></a><br />
                <font color="#005DA2"><?php echo $y["data"]; ?></font> - <font color="#008000">( <?php echo $y["contador"]; ?> Visualiza&ccedil;&otilde;es )</font></td>
            </tr>
          </table>
          <?php
  }
  }
 ?></td>
      </tr>
    </table></td>
    <td width="10">&nbsp;</td>
    <td class="fonte"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_top10 WHERE id = '1' ORDER BY id DESC");

while($y = mysql_fetch_array($sql))
   {
   ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table background="imagens/m1.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                    <param name="bgcolor" value="#ffffff" />
                    <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio1.mp3&amp;autoplay=0" />
                    </object></td>
                  </tr>
                </table>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                    </tr>
                  </table>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                  <tr>
                    <td><strong>Artista:</strong> <?php echo $y["artista1"]; ?></td>
                    </tr>
                  </table>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                    </tr>
                  </table>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                  <tr>
                    <td><strong>M&uacute;sica:</strong> <?php echo $y["musica1"]; ?></td>
                    </tr>
                </table></td>
            </tr>
          </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m2.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio2.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista2"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica2"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m3.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio3.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista3"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica3"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m4.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio4.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista4"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica4"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m5.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio5.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista5"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica5"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m6.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio6.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista6"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica6"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m7.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio7.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista7"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica7"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m8.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio8.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista8"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica8"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m9.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio9.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista9"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica9"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table>
            <table background="imagens/m10.png" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="72%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
                      <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3.swf" />
                      <param name="bgcolor" value="#ffffff" />
                      <param name="FlashVars" value="mp3=http://www.comunitariapalmitinho.com.br/administrador/ups/audioenv/audio10.mp3&amp;autoplay=0" />
                      </object></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>Artista:</strong> <?php echo $y["artista10"]; ?></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
                    </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><strong>M&uacute;sica:</strong> <?php echo $y["musica10"]; ?></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="6" /></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <?php }  ?></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="330"><img src="imagens/mensagens.png" /></td>
    <td width="10">&nbsp;</td>
    <td width="280"><img src="imagens/concursos.png" width="280" height="30" /></td>
    <td width="10">&nbsp;</td>
    <td width="336"><img src="imagens/encuesta.png"  /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" height="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="330" valign="top">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="280" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="fonte">
      <tr>
        <td><span class="fontetabela2">
          <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=280>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$data = $array["data"];
$hora = $array["hora"];
$nomegaleria = $array["nomegaleria"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];
$contador = $array["contador"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
          </span>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="36%"><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>"><img src="administrador/ups/galerias/<?php echo $foto.""; ?>" width="100" height="75" title="<?php echo $nomegaleria.""; ?>" alt="<?php echo $nomegaleria.""; ?>" border="0" /></a></td>
              <td width="64%" valign="top"><table width="98%" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
                <tr>
                  <td class="fonteadm"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><a href="vergaleria.php?id=<?php echo $id.""; ?>&amp;galeria=<?php echo $nomegaleria.""; ?>" class="fonte"><em><b><?php echo $nomegaleria.""; ?></b></em></a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
                <tr>
                  <td><em><span class="fonte">Publica&ccedil;&atilde;o: <?php echo $data.""; ?><br />
                  </span></em></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
                <tr>
                  <td><em class="fonte">( <?php echo $contador.""; ?> Visualiza&ccedil;&otilde;es )</em></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <span class="fonteadm">
            <?php
print"</td>";

//se o cont for igual o número de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechará a tabela
if(!$cont==$colunas){
print"</tr></table>";
} else {
print"</table>";
}
?>
          </span></td>
      </tr>
    </table></td>
    <td width="10">&nbsp;</td>
    <td width="336" valign="top" class="fonte"><table width="100%" align="center" class="fonte" border="0">
      <tr>
        <td>
        <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
        <form action="atualizaenquete.php" method="post" name="enquete" id="enquete" style="DISPLAY: inline">
          <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><strong><?php echo $y["pergunta"]; ?></strong></td>
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
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op1"]; ?>" checked="checked" /></td>
                          <td width="91%"><?php echo $y["op1"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op2"] == '' ) { } else { ?>
                      <?php if ($y["foto2"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op2"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op2"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op3"] == '' ) { } else { ?>
                      <?php if ($y["foto3"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op3"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op3"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op4"] == '' ) { } else { ?>
                      <?php if ($y["foto4"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op4"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op4"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op5"] == '' ) { } else { ?>
                      <?php if ($y["foto5"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op5"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op5"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op6"] == '' ) { } else { ?>
                      <?php if ($y["foto6"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op6"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op6"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op7"] == '' ) { } else { ?>
                      <?php if ($y["foto7"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op7"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op7"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op8"] == '' ) { } else { ?>
                      <?php if ($y["foto8"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op8"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op8"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op9"] == '' ) { } else { ?>
                      <?php if ($y["foto9"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op9"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op9"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <?php if ( $y["op10"] == '' ) { } else { ?>
                      <?php if ($y["foto10"] == '') { } else { ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="75" height="100" /></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0">
                        <tr>
                          <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op10"]; ?>" /></td>
                          <td width="91%"><?php echo $y["op10"]; ?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                            </tr>
                          </table>
                            <input class="fonte" type="submit" value="VOTAR" name="votar" /></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
        </form>
          <table width="100%" border="0">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="4%"><a class="fonte" 
                        href="verenquete.php?idnquete=<?php echo $y["id"]; ?>"><img src="imagens/resultado.png" border="0" alt="RESULTADOS DA ENQUETE" title="RESULTADOS DA ENQUETE" /></a></td>
              <td width="96%">&nbsp;<a class="fonte" 
                        href="verenquete.php?idenquete=<?php echo $y["id"]; ?>"><b>RESULTADOS DA ENQUETE</b></a></td>
            </tr>
            <tr>
              <td><a href="reenquete.php" class="fonte"><img src="imagens/exclama.png" border="0" alt="VISUALIZAR TODAS AS ENQUETES" title="VISUALIZAR TODAS AS ENQUETES" /></a></td>
              <td>&nbsp;<a href="reenquete.php" class="fonte"><b>TODAS AS ENQUETES</b></a></td>
            </tr>
          </table>
          <br /><?php } ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("ft.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("pubbaixo.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>