<?php include("cima.php"); ?>
<?php require_once "cuteeditor/cuteeditor_files/include_CuteEditor.php" ?> 
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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR GALERIA</b></font></td>
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
				<script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.nomegaleria.value=="") {
alert("O Campo Título da Galeria não está preenchido!")
form1.nomegaleria.focus();
return false
}

}

                        </script>
                  <form action="updategaleria.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
                    <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&Atilde;O EXISTE GALERIA CADASTRADA!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td class="manchete_texto" align="left">Local da Galeria:
                          <input name="local" type="radio" value="fotos" <?php if ($n["local"]=='fotos') { echo 'checked=checked'; } else { }?> />
Fotos
<input type="radio" name="local" value="empresa" <?php if ($n["local"]=='empresa') { echo 'checked=checked'; } else { }?> />
Empresa
<input type="radio" name="local" value="produtos" <?php if ($n["local"]=='produtos') { echo 'checked=checked'; } else { }?> />
Produtos
<input type="radio" name="local" value="qualidade" <?php if ($n["local"]=='qualidade') { echo 'checked=checked'; } else { }?> />
Qualidade </td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">T&iacute;tulo da Galeria: <span class="style15">
                          <input name="nomegaleria" type="text" value="<?php echo $n["nomegaleria"]; ?>" class="fontetabela" size="60" />
                        </span> *<span class="rodape">
                        <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Data da Galeria:
                          <input name="dataevento" value="<?php echo $n["dataevento"]; ?>"  class="fontetabela" id="nascimento" onkeypress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="10" maxlength="10" />
                          </td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="rodape"><img src="ups/galerias/<?php echo $n["foto"]; ?>" /></span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Capa da Galeria:
                          <input type="file" name="foto" class="fontetabela" />
                          (caso n&atilde;o deseje editar a foto deixe   em branco)
                          <input type="hidden" name="foto" value="<?php echo $n["foto"]; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Descri&ccedil;&atilde;o da Galeria:</td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="fontetabela">
                          <?php    
                //Step 2: Create Editor object.    
                $editor=new CuteEditor("comentario");
				$editor->Text="$n[comentario]";
               $editor->Height="900";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="comentario";     
                //Step 4: Render Editor    
                $editor->Draw();    
            ?>
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                          <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="EDITAR GALERIA" />
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