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
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">&nbsp;</td>
              <td valign="top"><table width="702" height="42" background="imagens/barramenu.png" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetitulo">&nbsp;&nbsp;<font color="#FFFFFF">Contato</font></td>
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
                      <td><table width="100%" border="0" align="center" class="fonte">
                        <tr>
                          <td border="0"><script language="javascript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.telefone.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail não está preenchido!")
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
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="4%"><img src="imagens/telefone.png" /></td>
                                      <td width="39%" align="left" class="manchete_texto9">&nbsp;&nbsp;Telefone: 55 3738-1212</td>
                                      <td width="4%"><img src="imagens/email.png" /></td>
                                      <td width="53%" align="left">&nbsp;&nbsp; <a href="mailto:contatos@caicara.rs.gov.br" class="fonte">contatos@caicara.rs.gov.br</a></td>
                                    </tr>
                                  </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
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
                                            <option value='AP - Amapá'>AP - Amap&aacute;</option>
                                            <option 
                                value='BA - Bahia'>BA - Bahia</option>
                                            <option value='CE - Ceará'>CE - Cear&aacute;</option>
                                            <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
                                            <option value='ES - Espírito Santo'>ES - Esp&iacute;rito Santo</option>
                                            <option 
                                value='GO - Goiás'>GO - Goi&aacute;s</option>
                                            <option value='MA - Maranhão'>MA - Maranh&atilde;o</option>
                                            <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
                                            <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
                                            <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
                                            <option value='PA - Pará'>PA - Par&aacute;</option>
                                            <option 
                                value='PB - Paraíba'>PB - Para&iacute;ba</option>
                                            <option value='PE - Pernambuco'>PE - Pernambuco</option>
                                            <option 
                                value='PI - Piauí'>PI - Piau&iacute;</option>
                                            <option value='PR - Paraná'>PR - Paran&aacute;</option>
                                            <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
                                            <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
                                            <option 
                                value='RO - Roraima'>RO - Roraima</option>
                                            <option value='RR - Roraima'>RR - Roraima</option>
                                            <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                                            <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                                            <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
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