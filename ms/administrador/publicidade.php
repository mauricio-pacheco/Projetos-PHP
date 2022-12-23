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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR PUBLICIDADE</b></font></td>
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
                  <form action="cadpublicidade.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                    <table width="99%" border="0" align="center">
                      <tr>
                        <td class="manchete_texto" align="left">Empresa: <span class="style15">
                        <input name="titulo" type="text" class="fontetabela" size="60" />
                        *</span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Local do Banner: <input name="local" type="radio" value="cabecalho" checked="checked" />
                          Rodapé ( <em>978 px de largura</em> X 250px de altura )                        </td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Tipo: 
                          <input name="tipo" type="radio" value="imagem" checked="checked" />
Imagem ( .gif, .jpg e .png )
<input type="radio" name="tipo" value="flash" />
Flash ( .swf ) - Tamanho Flash -&gt; Largura:<span class="style15">
<input name="f1" type="text" class="fontetabela" size="6" /> 
px
X Altura: 
<input name="f2" type="text" class="fontetabela" size="6" /> 
px
</span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Link da Publicidade: <span class="style15">
                        <input name="link" type="text" class="fontetabela" value="http://" size="60" />
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Arquivo da Publicidade:
                          <input type="file" name="arquivo" class="fontetabela" /></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Data de Expiração: 
                        <input name="dataexpira" class="fontetabela" id="nascimento" onkeypress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="10" maxlength="10" />
                        *</td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Descri&ccedil;&atilde;o da Publicidade:</td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><label class="fontebaixo2">
                          <textarea name="descricao" cols="60" rows="10" class="fontetabela"></textarea>
                          (opcional)</label></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                          <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR PUBLICIDADE" />
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