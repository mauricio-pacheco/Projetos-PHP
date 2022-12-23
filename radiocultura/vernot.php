<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><span class="heading" style="BACKGROUND: #E71C24"><span class="text" style="COLOR: #ffffff">
          <?php

include "administrador/conexao.php";

$id = $_GET['id'];
$sql2 = mysql_query("UPDATE cw_noticias set contador=contador + 1 where id='$id'");
$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
        </span></span>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><em><?php echo $y["titulo"]; ?></em></b></font></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" class="manchete_textocasa">
          <tr></tr>
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="100%"><i>Notícia postada em <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?> ( <?php echo $y["contador"]; ?> Visualizações )</i></td>
              </tr>
            </table>
              <table width="100%" border="0" align="center">
                <tr>
                  <td align="left"><table width="100%" border="0">
                    <tr>
                      <td><?php if ( $y["integra"] == '' ) { } else {?>
                        <table width="100%" border="0">
                          <tr>
                            <td width="5%"><img src="imagens/audionovo.png"/></td>
                            <td width="95%" class="fontetabela">&nbsp;<strong>Audio na Integra</strong></td>
                            </tr>
                          </table>
                        <table width="30%" border="0">
                          <tr>
                            <td><script language="JavaScript" type="text/javascript">
<!--
   function PlayClick ()
    {
        document.WMPlay.Play();
    }
	
    function StopClick ()
    {
        numero=1;
        document.WMPlay.Stop();
	if (navigator.appName.indexOf('Netscape') != -1)
            document.WMPlay.SetCurrentPosition(0);
        else
            document.WMPlay.CurrentPosition = 0;
    }

    function UpVolumeClick()
    {
	if (document.WMPlay.Volume <= -300) 
        	document.WMPlay.Volume = document.WMPlay.Volume + 300;
    }

    function DownVolumeClick()
    {
	if ( document.WMPlay.Volume >= -8000) 
        	document.WMPlay.Volume = document.WMPlay.Volume - 300;
    }
	-->
                    </script>
                              <font 
                                class="fontetabela">
                                <object id="WMPlay" height="24" width="250" border="0"
            classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95">
                                  <param name="AutoStart" value="False" />
                                  <param name="FileName" value="administrador/ups/integra/<?php echo $y["integra"]; ?>" />
                                  <param name="TransparentAtStart" value="True" />
                                  <param name="ShowControls" value="0" />
                                  <param name="ShowDisplay" value="0" />
                                  <param name="ShowStatusBar" value="1" />
                                  <param name="AutoSize" value="0" />
                                  <embed type="application/x-mplayer2" 
            pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
            		src="administrador/integra/<?php echo $y["integra"]; ?>" 		autostart="1" 
            		width="160" height="140"> </embed>
                                  </object>
                                </font></td>
                            </tr>
                          </table>
                        <table width="30%" border="0">
                          <tr>
                            <td width="5%"><a onClick="PlayClick();" 
            ><img src="imagens/play.jpg" alt="PLAY" title="PLAY"  /></a></td>
                            <td width="6%"><a onClick="StopClick();" 
            ><img src="imagens/stop.jpg" alt="STOP" title="STOP" /></a></td>
                            <td width="5%"><a onClick="DownVolumeClick();" 
            ><img src="imagens/menos.jpg" alt="Volume Menos" title="Volume Menos" /></a></td>
                            <td width="12%"><img src="imagens/volume.jpg" /></td>
                            <td width="5%"><a onClick="UpVolumeClick();" 
            ><img src="imagens/mais.jpg" alt="Volume Mais" title="Volume Mais" /></a></td>
                            </tr>
                          </table>
                        <?php } ?></td>
                    </tr>
                  </table></td>
                </tr>
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
              <script language="JavaScript" type="text/javascript">
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
              <form action="cadcomentario.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>Nome:
                      <input name="nome" type="text" class="texto" size="60" />
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
                      <input name="email" type="text" class="texto" size="60" />
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
                    <td><script language="JavaScript" type="text/javascript">
<!-- 
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
// -->
              </script>
                      <textarea  wrap="physical" onKeyDown="textCounter(this.form.texto,this.form.remLen,255);" onKeyUp="textCounter(this.form.texto,this.form.remLen,255);" name="texto" cols="70" rows="8" class="texto"></textarea></td>
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
                      <input name="remLen" type="text" class="texto" value="255" size="3" maxlength="3" readonly />
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
                    <td><input name="button3" type="submit" class="texto" id="button3" value="Postar Comentário" /></td>
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
              <table width="100%" height="2" border="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                </tr>
            </table>
              <span style="Z-INDEX: 666">
              <?php
  
  }}
 ?>
              </span></td>
          </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-2)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
