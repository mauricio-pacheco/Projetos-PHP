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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR VIDEO</b></font></td>
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
            <td><?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_videos WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&Atilde;O EXISTE VIDEO CADASTRADO!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
              <table width="100%" border="0" align="center">
                <tr>
                  <td><script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.titulo.value=="") {
alert("O Campo Título do Video não está preenchido!")
form1.titulo.focus();
return false
}

if (document.form1.video.value=="") {
alert("O Campo Anexo do Video não está preenchido!")
form1.video.focus();
return false
}

}

                        </script>
                    <form action="updatevideo.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
                      <table width="100%" border="0" align="center">
                        <tr>
                          <td class="manchete_texto" align="left">T&iacute;tulo do Video: <span class="style15">
                            <input name="titulo" type="text" class="fontetabela" size="60" value="<?php echo $n["titulo"]; ?>" />
                            </span> *<span class="rodape">
                              <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                            </span></td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left"><?php echo $n["video"]; ?></td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left">Anexar Video ( YouTube ): <span class="style15">
                            <input name="video" type="text"  size="110" class="fontetabela" value='<?php echo $n["video"]; ?>' />
                          </span> *<br />
                          300 px de Largura X 233 px de Altura</td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left"><span class="rodape"><img src="ups/galeriavideo/<?php echo $n["foto"]; ?>" /></span></td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left">Imagem do Video:
                            <input type="file" name="foto" class="fontetabela" />
                            &nbsp;(caso n&atilde;o deseje editar a foto deixe   em branco)
                            <input type="hidden" name="foto" value="<?php echo $n["foto"]; ?>" /></td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left">Descri&ccedil;&atilde;o do Video:</td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left"><label class="fontebaixo2">
                            <textarea name="comentario" id="comentario" cols="60" rows="10" class="fontetabela"><?php echo $n["comentario"]; ?></textarea>
                            (opcional)</label></td>
                        </tr>
                        <tr>
                          <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                            <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="EDITAR VIDEO" />
                            <?php
  }
  }
 ?>
                          </span></td>
                        </tr>
                      </table>
                    </form></td>
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