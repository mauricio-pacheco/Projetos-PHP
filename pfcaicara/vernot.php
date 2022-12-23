<?php include("meta.php"); ?>
<table width="100%" height="121" background="imagens/fundocima.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="947" border="0" height="121" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" align="center"><img src="imagens/titulo.png" width="940" height="106" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="947" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" valign="top">
       <?php include("menu.php"); ?>
        </td>
        <td width="77%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
        </table>
          <?php

include "administrador/conexao.php";

$id = $_GET['id'];

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
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" height="42" background="imagens/barramenu.png" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetitulo">&nbsp;&nbsp;<font color="#FFFFFF"><?php echo $y["titulo"]; ?></font></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" bgcolor="#FFFFFF" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="956%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td valign="top" class="fonte"><table width="100%" border="0">
                            <tr>
                              <td width="100%"><i>Not&iacute;cia postada em <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?> ( <?php echo $y["contador"]; ?> Visualiza&ccedil;&otilde;es )</i></td>
                            </tr>
                          </table>
                            <table width="100%" border="0" align="center">
                              <tr>
                                <td align="left"><b>Imagens Anexadas a Not&iacute;cia</b></td>
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
                            <table width="700" border="0">
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
                                <td><strong>Adicionar Coment&aacute;rio:</strong></td>
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
                                    <input name="nome" type="text" class="fonte" size="60" />
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
                                    <input name="email" type="text" class="fonte" size="60" />
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
                                  <td>Coment&aacute;rio: <i>( Limite de 255 caracteres )</i></td>
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
                                    <textarea  wrap="physical" onkeydown="textCounter(this.form.texto,this.form.remLen,255);" onkeyup="textCounter(this.form.texto,this.form.remLen,255);" name="texto" cols="70" rows="8" class="fonte"></textarea></td>
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
                                    <input name="remLen" type="text" class="fonte" value="255" size="3" maxlength="3" readonly="readonly" />
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
                                  <td><input name="button3" type="submit" class="fonte" id="button3" value="Postar Comentário" /></td>
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
                                <td><strong>Coment&aacute;rios Postados:</strong></td>
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
   {echo "<div align=center><br><b>N&atilde;o existe coment&aacute;rios cadastrados!</b><br></div>"; 
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
                            </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                        </tr>
                        <tr>
                          <td><a href="javascript:history.go(-2)" class="fonte"><strong>VOLTAR</strong></a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/barrabaixo.png" width="702" height="5" /></td>
                </tr>
              </table></td>
              <td valign="top">&nbsp;</td>
            </tr>
          </table>
          <?php
  
  }}
 ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="16" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>