<?php include("meta.php"); ?>
<body>
<br /><table width="980" class="boxSombra" bgcolor="#000000" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" height="150" border="0" align="center" cellpadding="0" cellspacing="0" background="imagens/cima.png">
      <tr>
        <td valign="top"><?php include("cima.php"); ?></td>
      </tr>
    </table>
      <table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="10" /></td>
            </tr>
          </table>
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="100%" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="fontetabela2" align="left"><font 
                                class="content">
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><link rel="stylesheet" href="classesfotos/css/lightbox.css" type="text/css" media="screen" />
                              <script type="text/javascript" src="classesfotos/js/prototype.js"></script>
                              <script type="text/javascript" src="classesfotos/js/scriptaculous.js?load=effects"></script>
                              <script type="text/javascript" src="classesfotos/js/lightbox.js"></script>
                              <table width="100%" border="0" align="center">
                                <tr>
                                  <td align="center" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="left"><?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_galeria set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>N&atilde;o existe galerias cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                                        &nbsp;<span class="fontetitulo4"><i><?php echo $y["nomegaleria"]; ?></i></span></td>
                                    </tr>
                                    <tr>
                                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                    </tr>
                                  </table>
                                    <table width="957" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="25%" valign="top"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                                          <?php } else { ?>
                                          <img src="administrador/ups/galerias/<?php echo $y["foto"]; ?>" width="240" height="120" />
                                          <?php } ?></td>
                                        <td width="37%" valign="top" align="left"><table width="98%" border="0" align="right" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td><span class="fontetitulo">Data do Evento: <?php echo $y["dataevento"]; ?><br />
Data de Publica&ccedil;&atilde;o: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )<br />
<?php echo $y["comentario"]; ?></span></td>
                                          </tr>
                                        </table></td>
                                        <td width="38%" valign="top" align="left"><OBJECT style="width: 450px; height: 253px;" codeBase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="450" height="253">
<PARAM name="wmode" value="transparent"><PARAM name="src" value="<?php echo $y["video"]; ?>"><EMBED 
height="253" type="application/x-shockwave-flash" width="450" src="<?php echo $y["video"]; ?>" 
wmode="transparent"></OBJECT></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr> </tr>
                              </table></td>
                          </tr>
                        </table>
                        </font> <font 
                                class="content">
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td border="0"><table width="100%" border="0" align="center">
                                <tr>
                                  <td align="left"><div align="center">
                                    <?php }  ?>
                                    <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM cw_fotos WHERE idgaleria='$id'"; 
$resultado=mysql_query($sql);

while($linha= mysql_fetch_array($resultado))
{

echo 
"<a href='administrador/ups/fotosgaleria/g/".$linha['foto']."' rel='lightbox['roadtrip']' title='".$linha["comentario"]."'><img  width=156 height=117 alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosgaleria/p/".$linha['fotomenor']."'></a>
";

}}
  
   ?>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left">  <script language=javascript>
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

                        </SCRIPT>
             <form action="cadcomentario.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td><img src="imagens/branco.gif" width="2" height="4" /></td>
               </tr>
             </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td class="fonteadm">Faça seu comentário sobre o evento:</td>
               </tr>
               <tr>
                 <td class="fonteadm"><img src="imagens/branco.gif" width="1" height="4" /></td>
               </tr>
               <tr>
                 <td class="fonteadm">Nome: 
                   <input name="nome" type="text" class="fontetabela" size="60"> 
                   *
                   <input type="hidden" name="idsessao" value="<?php echo $id; ?>" /></td>
               </tr>
             </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td><img src="imagens/branco.gif" width="2" height="4"></td>
                 </tr>
             </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td class="fonteadm">E-mail:
                   <input name="email" type="text" class="fontetabela" size="60"> 
                   *</td>
               </tr>
             </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td><img src="imagens/branco.gif" width="2" height="4"></td>
               </tr>
             </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 </tr>
             </table>
             </td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                        </font>
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0" align="center">
                              <tr>
                                <td align="left">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="fonteadm">Comentário: <i>( Limite de 255 caracteres )</i></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <font 
                                class="content">
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0" align="center">
                              <tr>
                                <td align="left">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr> </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>
                                        <SCRIPT LANGUAGE="JavaScript">
<!-- 
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
// -->
</script>
                                        <textarea  wrap="physical" onKeyDown="textCounter(this.form.texto,this.form.remLen,255);" onKeyUp="textCounter(this.form.texto,this.form.remLen,255);" name="texto" cols="90" rows="8" class="fontetabela"></textarea> </td>
                                      </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><img src="imagens/branco.gif" width="2" height="2"></td>
                                      </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="fonteadm">Faltam
                                        <input name=remLen type=text class="fontetabela" value="255" size=3 maxlength=3 readonly /> caracteres.
                                        <input name="button2" type="submit" class="fontetabela" id="button2" value="Postar Comentário" /></td>
                                      </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><img src="imagens/branco.gif" width="2" height="2"></td>
                                      </tr>
                                  </table>
                                 
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><img src="imagens/branco.gif" width="2" height="2"></td>
                                      </tr>
                                  </table>
                                </form></td>
                              </tr>
                              <tr>
                                <td align="center">&nbsp;</td>
                              </tr>
                              <tr>                                </tr>
                            </table></td>
                          </tr>
                        </table>
                        </font>
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0" align="center">
                              <tr>
                                <td align="left"><span class="fonteadm">
                                  <?php
				   
				   include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_comentarios WHERE idnoticia='$id' AND status='0' ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><br><b>N&atilde;o existe comentários cadastrados!</b><br></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                                  </span>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="3%" class="fonteadm"><img src="administrador/imagens/comentarios.png" width="24" height="24" /></td>
                                      <td width="61%" class="fonteadm">&nbsp;<b><?php echo $y["nome"]; ?></b> - <a href="mailto:<?php echo $y["email"]; ?>" class="fontebaixo2"><?php echo $y["email"]; ?></a></td>
                                      <td width="36%" align="right" class="fonteadm"><?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?>&nbsp;</td>
                                      </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="fonteadm"><img src="imagens/branco.gif" width="2" height="4" /></td>
                                    </tr>
                                  </table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="fonteadm"><?php echo $y["texto"]; ?></td>
                                    </tr>
                                  </table>
                                  <span class="fonteadm" style="MARGIN: 0px">
                                    <?php
  }
  }
 ?>
                                  </span></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <font 
                                class="content">
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0" align="center">
                              <tr>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" width="14%"><br />
                                  <a href="javascript:history.go(-1)"><img src="imagens/voltar.png" border="0" /></a><br /></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        </font></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
    </table>
<?php include("baixo.php"); ?>
</body>
</html>