<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="9" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
  </tr>
</table>
<table bgcolor="#f5f5f5" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
  </tr>
</table>
<table width="980" height="360" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" valign="top"><SCRIPT src="classes/carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("flash/index.swf","240","360"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></td>
        <td width="78%" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" align="center" class="fonteadm">
              <tr>
                <td border="0"><script language="JavaScript" type="text/javascript">
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
                  <script language="JavaScript" type="text/javascript">
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
                  <form action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4%"><img src="imagens/telefone.png" width="33" height="32" /></td>
                            <td width="39%"><span class="fontebaixo2">&nbsp;&nbsp;Telefone: 55 3738-1212</span> - <span class="fontebaixo2">Celular: 55 3738-1212</span></td>
                            <td width="5%"><img src="imagens/carta.png" /></td>
                            <td width="52%">&nbsp;&nbsp;<span class="fontebaixo2"> <a href="msnim:add?contact=rodolfoperon@hotmail.com" class="fonteadm">rodolfoperon@hotmail.com</a></span></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td width="50%"><table width="100%" border="0">
                          <tr>
                            <td class="fontebaixo2">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                            <td class="fontebaixo2"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" align="left" border="0">
                          <tbody>
                            <tr>
                              <td width="68%" class="fontebaixo2">Nome Completo:</td>
                            </tr>
                            <tr>
                              <td><input class="fonteadm" size="60" name="nome" />
                                * </td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Cidade:</td>
                            </tr>
                            <tr>
                              <td><input class="fonteadm" size="36" name="cidade" />
                                <select class="fonteadm" 
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
                                </select></td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Telefone:</td>
                            </tr>
                            <tr>
                              <td><input name="telefone" class="fonteadm" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                * </td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">E-mail:</td>
                            </tr>
                            <tr>
                              <td><input class="fonteadm" size="40" name="email2" />
                                * </td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Mensagem / Sugest&otilde;es</td>
                            </tr>
                            <tr>
                              <td><textarea class="fonteadm" name="mensagem" rows="12" cols="80"></textarea></td>
                            </tr>
                            <tr>
                              <td><input class="fonteadm" type="submit" value="ENVIAR DADOS" name="submit" /></td>
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
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="6" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>