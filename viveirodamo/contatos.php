<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="65" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="61" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("menu.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Atendimento</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9">
                    <tr>
                      <td><table width="100%" class="manchete_textocasa" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="100%" border="0" align="center" class="fonteadm">
                            <tr>
                              <td border="0"><script language="javascript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome n??o est?? preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone n??o est?? preenchido!")
cadastro.telefone.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail n??o est?? preenchido!")
cadastro.email2.focus();
return false
}


		return true;

}


                          </script>
                                <script language="javascript" type="text/javascript">
function Mascara (formato, keypress, objeto){
campo = eval (objeto);


// telefone
if (formato=='telefone'){
separador1 = '(';
separador2 = ') ';
separador3 = '-';
conjunto1 = 0;
conjunto2 = 3;
conjunto3 = 9;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador1;
}
if (campo.value.length == conjunto2){
campo.value = campo.value + separador2;
}
if (campo.value.length == conjunto3){
campo.value = campo.value + separador3;
}
}


}
                            </script>
                                <form action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
                                  <table width="100%" border="0" align="center">
                                    <tr>
                                      <td width="50%"><table width="100%" border="0">
                                        <tr>
                                          <td class="manchete_texto9" align="left">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                                          <td class="manchete_texto9"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><table class="manchete_texto9" width="100%" align="left" border="0">
                                        <tbody>
                                          <tr>
                                            <td width="68%" class="fontebaixo2"><div align="left">Nome Completo:</div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <input class="manchete_texto96" size="60" name="nome" />
                                              * </div></td>
                                          </tr>
                                          <tr>
                                            <td class="fontebaixo2"><div align="left">Cidade:</div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <input class="manchete_texto96" size="36" name="cidade" />
                                              <select class="manchete_texto96" 
                              name="estado">
                                                <option value='RS - Rio Grande do Sul' selected="selected">RS - Rio Grande do Sul</option>
                                                <option 
                                value='AC - Acre'>AC - Acre</option>
                                                <option value='AL - Alagoas'>AL - Alagoas</option>
                                                <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
                                                <option value='AP - Amap??'>AP - Amap&aacute;</option>
                                                <option 
                                value='BA - Bahia'>BA - Bahia</option>
                                                <option value='CE - Cear??'>CE - Cear&aacute;</option>
                                                <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
                                                <option value='ES - Esp??rito Santo'>ES - Esp&iacute;rito Santo</option>
                                                <option 
                                value='GO - Goi??s'>GO - Goi&aacute;s</option>
                                                <option value='MA - Maranh??o'>MA - Maranh&atilde;o</option>
                                                <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
                                                <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
                                                <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
                                                <option value='PA - Par??'>PA - Par&aacute;</option>
                                                <option 
                                value='PB - Para??ba'>PB - Para&iacute;ba</option>
                                                <option value='PE - Pernambuco'>PE - Pernambuco</option>
                                                <option 
                                value='PI - Piau??'>PI - Piau&iacute;</option>
                                                <option value='PR - Paran??'>PR - Paran&aacute;</option>
                                                <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
                                                <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
                                                <option 
                                value='RO - Roraima'>RO - Roraima</option>
                                                <option value='RR - Roraima'>RR - Roraima</option>
                                                <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                                                <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                                                <option value='SP - S??o Paulo'>SP - S&atilde;o Paulo</option>
                                                <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                                              </select>
                                            </div></td>
                                          </tr>
                                          <tr>
                                            <td class="fontebaixo2"><div align="left">Telefone:</div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <input name="telefone" class="manchete_texto96" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                              * </div></td>
                                          </tr>
                                          <tr>
                                            <td class="fontebaixo2"><div align="left">E-mail:</div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <input class="manchete_texto96" size="40" name="email2" />
                                              * </div></td>
                                          </tr>
                                          <tr>
                                            <td class="fontebaixo2"><div align="left">Mensagem / Sugest&otilde;es</div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <textarea class="manchete_texto96" name="mensagem" rows="12" cols="80"></textarea>
                                            </div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="left">
                                              <input class="manchete_texto96" type="submit" value="ENVIAR DADOS" name="submit" />
                                            </div></td>
                                          </tr>
                                        </tbody>
                                      </table></td>
                                    </tr>
                                  </table>
                                </form></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
      </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>