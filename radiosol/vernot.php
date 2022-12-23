<?php include("meta.php"); ?>
<?php include("cima.php"); ?>
<?php 
function parseUtf8ToIso88591(&$string){
     if(!is_null($string)){
            $iso88591_1 = utf8_decode($string);
            $iso88591_2 = iconv('UTF-8', 'ISO-8859-1', $string);
            $string = mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8');       
     }
}
 ?>
<table width="100%" border="0" height="80" style="background-image:url(imagens/fundomeiocapa.png); background-repeat:repeat-x;" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="939" height="80" style="background-repeat:repeat-x; background-image:url(imagens/fundomeio.png)" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><?php include("menu.php"); ?>
        <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
              <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_noticias set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" class="fontemaior"><strong><?php echo $y["titulo"]; ?></strong></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                  </tr>
                </table></td>
            </tr>
          </table>
            <SCRIPT language="JavaScript">
function abrir(URL) {

  var width = 640;

  var height = 320;

  var left = 0;

  var top = 0;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}

</SCRIPT>
            <?php



$titleface = $y["titulo"];
		$titlefacen = str_replace(" ","+",$titleface);
        
		
		
?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="fonte"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0">
                          <tr>
                            <td width="54%"><i>Notícia postada em <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?> ( <?php echo $y["contador"]; ?> Visualizações )</i></td>
                            <td width="36%">COMPARTILHE A NOTÍCIA NAS REDES SOCIAIS</td>
                            <td width="10%"><table width="99%" border="0">
                              <tr>
                                <td width="24%"><A href="javascript:abrir('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $titlefacen; ?>&p[url]=http://www.soldamerica.com.br/vernoticia.php?id=<?php echo $y["id"]; ?>&p[images][0]=http://www.soldamerica.com.br/administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>');"><img src="imagens/faceb.png" border="0" /></A></td>
                                <td width="2%">&nbsp;</td>
                                <td width="69%"><A href="http://www.twitter.com/share?url=http://www.soldamerica.com.br/vernot.php?id=<?php echo $y["id"]; ?>" target="_blank"><img src="imagens/twt.png" border="0" /></A></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td align="left"><b>Imagens Anexadas a Notícia</b></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td align="left"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                                <script type="text/javascript" src="js/prototype.js"></script>
                                <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                                <script type="text/javascript" src="js/lightbox.js"></script>
                                <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM cw_anexosnot WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/ups/fotosnot/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosnot/p/".$linha2['fotomenor']."'></a><img src=imagens/branco.gif width=5 height=2>
";

}
  
   ?></td>
                            </tr>
                          </table>
                          <table width="100%" height="2" border="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                            </tr>
                          </table>
                          <table width="98%" border="0">
                            <tr>
                              <td align="left"><p align="justify"><?php echo $y["legenda"]; ?></p></td>
                            </tr>
                          </table>
                          <table width="98%" border="0">
                            <tr>
                              <td><p align="justify"><?php echo $y["texto"]; ?></p></td>
                            </tr>
                          </table>
                          <table width="100%" height="2" border="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="8" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><strong>Adicionar Comentário:</strong></td>
                            </tr>
                          </table>
                          <script language="javascript" type="text/javascript">
function validar(form1) { 

if (document.form1.nome.value=="") {
alert("O Campo Nome não está preenchido!")
form1.nome.focus();
return false
}

var filtro_mail = /^.+@.+\..{2,3}$/
if (!filtro_mail.test(form1.email.value) || form1.email.value=="") {
alert("Preencha o e-mail corretamente.");
form1.email.focus();
return false
}

}

                        </script>
                          <form action="cadcomentario.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onsubmit="return validar(this)">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>Nome:
                                  <input name="nome" type="text" class="fontebaixo2" size="60" />
                                  *
                                  <input type="hidden" name="idnoticia" value="<?php echo $y["id"]; ?>" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>E-mail:
                                  <input name="email" type="text" class="fontebaixo2" size="60" />
                                  *</td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>Comentário: <i>( Limite de 255 caracteres )</i></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><script language="javascript" type="text/javascript">
<!-- 
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
// -->
              </script>
                                  <textarea  wrap="physical" onkeydown="textCounter(this.form.texto,this.form.remLen,255);" onkeyup="textCounter(this.form.texto,this.form.remLen,255);" name="texto" cols="60" rows="8" class="fontebaixo2"></textarea></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>Faltam
                                  <input name="remLen" type="text" class="manchete_texto" value="255" size="3" maxlength="3" readonly />
                                  caracteres.</td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><input name="button3" type="submit" class="fontebaixo2" id="button3" value="Postar Comentário" /></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                            </table>
                          </form>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><strong>Comentários Postados:</strong></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><span class="rodape">
                                <?php
				   
				   include "administrador/conexao.php";

$sql5 = mysql_query("SELECT * FROM cw_comentarios WHERE idnoticia='$id' AND status='0' ORDER BY id DESC");
$contar5 = mysql_num_rows($sql5); 
if ($contar5 < 1)  
   {echo "<div align=center><br><b>N&atilde;o existe comentários cadastrados!</b><br></div>"; 
   }
else 
   {
while($x = mysql_fetch_array($sql5))
   {
   ?>
                                </span>
                                <table width="99%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="3%"><img src="administrador/imagens/comentarios.png" width="24" height="24" /></td>
                                    <td width="61%">&nbsp;<b><?php echo $x["nome"]; ?></b> - <a href="mailto:<?php echo $x["email"]; ?>" class="fontebaixo2"><?php echo $x["email"]; ?></a></td>
                                    <td width="36%" align="right"><i><?php echo $x["data"]; ?> - <?php echo $x["hora"]; ?></i>&nbsp;</td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><?php echo $x["texto"]; ?></td>
                                  </tr>
                                </table>
                                <span style="MARGIN: 0px">
                                  <?php
  }
  }
 ?>
                                </span></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0">
                            <tr>
                              <td><a href="javascript:history.go(-2)"><img src="imagens/volta.png" border="0" /></a></td>
                            </tr>
                          </table>
                          <table width="100%" height="2" border="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                      <?php
  
  }}
 ?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
      </table>
<?php include("logoabaixo.php"); ?>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="239" background="imagens/fundoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"> <?php include("abaixo.php"); ?></td>
  </tr>
</table>
</body>
</html>