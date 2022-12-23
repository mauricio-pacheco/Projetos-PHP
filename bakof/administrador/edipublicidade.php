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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR PUBLICIDADE</b></font></td>
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
               <script language=javascript>
function Mascara (formato, keypress, objeto){
campo = eval (objeto);

// nascimento
if (formato=='nascimento'){
separador = '/'; 
conjunto1 = 2;
conjunto2 = 5;
if (campo.value.length == conjunto1)
  {
  campo.value = campo.value + separador;
  }
if (campo.value.length == conjunto2)
  {
  campo.value = campo.value + separador;
  }
}




}
                    </SCRIPT>
                  
                    <script language=javascript>
function validar(cadastro) { 

if (document.cadastro.titulo.value=="") {
alert("O Campo Titulo da Publicidade não está preenchido!")
cadastro.titulo.focus();
return false
}

if (document.cadastro.dataexpira.value=="") {
alert("O Campo Data de Expiração não está preenchido!")
cadastro.dataexpira.focus();
return false
}

}

                        </SCRIPT>
                  <form action="updatepublicidade.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                    <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_publicidades WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&Atilde;O EXISTE PUBLICIDADE CADASTRADA!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                    <table width="99%" border="0" align="center">
                      <tr>
                        <td class="manchete_texto" align="left">Empresa: <span class="style15">
                        <input name="titulo" type="text" class="fontetabela" value="<?php echo $n["titulo"]; ?>" size="60" />
                        <span class="rodape">
                        <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                        </span></span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Local do Banner: <input name="local" type="radio" value="cabecalho"
                        <?php if ($n["local"]=='cabecalho') { echo 'checked=checked'; } else { }?> />
                          Cabeçalho ( <em>968 px de largura</em> )
<input type="radio" name="local" value="lateral" <?php if ($n["local"]=='lateral') { echo 'checked=checked'; } else { }?> />
Lateral (<em> 280 px de largura</em> )
<input type="radio" name="local" value="rodape" <?php if ($n["local"]=='rodape') { echo 'checked=checked'; } else { }?> /> 
Rodapé ( <em>120 px de largura X 90 px de altura</em> ) </td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Tipo: 
                          <input name="tipo" type="radio" value="imagem" <?php if ($n["tipo"]=='imagem') { echo 'checked=checked'; } else { }?> />
Imagem ( .gif, .jpg e .png )
<input type="radio" name="tipo" value="flash" <?php if ($n["tipo"]=='flash') { echo 'checked=checked'; } else { }?> />
Flash ( .swf ) - Tamanho Flash -&gt; Largura:<span class="style15">
<input name="f1" type="text" class="fontetabela" value="<?php echo $n["f1"]; ?>" size="6" />
px X Altura:
<input name="f2" type="text" value="<?php echo $n["f2"]; ?>" class="fontetabela" size="6" /> 
px
</span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Link da Publicidade: <span class="style15">
                        <input name="link" type="text" value="<?php echo $n["link"]; ?>" class="fontetabela" size="60" />
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><?php
						  if ($n["tipo"]=='imagem') {
						  						  ?>
                          <img src="ups/publicidades/<?php echo $n["arquivo"]; ?>" width="200" height="150" />
                          <?php
						  } else {
						  ?>
                          <script src="scripts/swfobject_modified.js" type="text/javascript"></script>
                          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="150">
                            <param name="movie" value="ups/publicidades/<?php echo $n["arquivo"]; ?>" />
                            <param name="quality" value="high" />
                            <param name="wmode" value="opaque" />
                            <param name="swfversion" value="6.0.65.0" />
                            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                            <param name="expressinstall" value="scripts/expressInstall.swf" />
                            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                            <!--[if !IE]>-->
                            <object type="application/x-shockwave-flash" data="ups/publicidades/<?php echo $n["arquivo"]; ?>" width="200" height="150">
                              <!--<![endif]-->
                              <param name="quality" value="high" />
                              <param name="wmode" value="opaque" />
                              <param name="swfversion" value="6.0.65.0" />
                              <param name="expressinstall" value="scripts/expressInstall.swf" />
                              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                              <div>
                                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                              </div>
                              <!--[if !IE]>-->
                            </object>
                            <!--<![endif]-->
                          </object>
                          <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
                          </script>
                        <?php } ?></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Arquivo da Publicidade:
                          <input type="file" name="arquivo" class="fontetabela" />
(caso n&atilde;o deseje editar a foto deixe   em branco)
<input type="hidden" name="arquivo" value="<?php echo $n["arquivo"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Data de Expiração: 
                        <input name="dataexpira" class="fontetabela" id="nascimento" value="<?php echo $n["dataexpira"]; ?>" onkeypress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="10" maxlength="10" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Descri&ccedil;&atilde;o da Publicidade:</td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><label class="fontebaixo2">
                          <textarea name="descricao" cols="60" rows="10" class="fontetabela"><?php echo $n["descricao"]; ?></textarea>
                          (opcional)</label></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                          <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="EDITAR PUBLICIDADE" />
                          <?php
  }
  }
 ?>
                        </span></td>
                      </tr>
                    </table>
                </form></td>
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