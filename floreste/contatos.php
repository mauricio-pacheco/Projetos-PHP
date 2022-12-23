<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Floreste - Mudas de Acacia mangium e Mogno africano</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css"></head>

<body topmargin="10" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td ><table width="960" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td width="47"><img src="imagens/logo2.png" /></td>
        <td width="903"><?php include("menu.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" height="240" border="0" align="center">
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="27%"><span class="fontegeral"><strong>Floreste Suprimento Florestal</strong></span></td>
        <td width="73%"><strong class="fontegeral">Preencha o formulário abaixo para entrar em contato conosco:</strong></td>
        </tr>
      <tr>
        <td valign="top"><br />
          <p class="fontegeral">Campo Grande - MS <br />
            Rua Brilhante, 2001<br />
            Vila Bandeirante<br />
            CEP: 79006-560</p>
          <p class="fontegeral">Fone: (67) 3331-1371 <br />
            (67) 9231-1187</p>
          <p class="fontegeral">e-mail: <a href="mailto:atendimento@floreste.com" class="fontegeral">atendimento@floreste.com</a></p></td>
        <td valign="top">
              <script language=javascript>
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


                        </SCRIPT>
                              <script language=javascript>
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
                          </SCRIPT>
                              <FORM action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)">
          <br /><table width="100%" align="left" border="0">
            <tbody>
              <tr>
                <td width="68%" class="fontegeral" align="left">Nome Completo:</td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <input class="fontetabela" size="60" name="nome" />
                  * </span></td>
              </tr>
              <tr>
                <td class="manchete_texto" align="left"><span class="fontegeral">Cidade:</span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <input class="fontetabela" size="36" name="cidade" />
                  <select class="fontetabela" 
                              name="estado">
                               <option value='MS - Mato Grosso do Sul' selected="selected">MS - Mato Grosso do Sul</option>
                   
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
                     <option value='RS - Rio Grande do Sul' >RS - Rio Grande do Sul</option>
                 
                    <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                    <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                    <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
                    <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                  </select>
                </span></td>
              </tr>
              <tr>
                <td class="manchete_texto" align="left"><span class="fontegeral">Telefone:</span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <input name="telefone" class="fontetabela" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                  * </span></td>
              </tr>
              <tr>
                <td class="manchete_texto" align="left"><span class="fontegeral">E-mail:</span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <input class="fontetabela" size="40" name="email2" />
                  * </span></td>
              </tr>
              <tr>
                <td class="manchete_texto" align="left"><span class="fontegeral">Mensagem:</span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <textarea class="fontetabela" name="mensagem" rows="6" cols="60"></textarea>
                </span></td>
              </tr>
              <tr>
                <td align="left"><span class="fontegeral">
                  <input class="fontetabela" type="submit" value="ENVIAR DADOS" name="submit" />
                </span></td>
              </tr>
            </tbody>
          </table></form>
         </td>
        </tr>
      <tr>
        <td class="fontegeral"></td>
        <td class="fontegeral">&nbsp;</td>
        </tr>
      <tr>
        <td class="fontegeral" valign="top">&nbsp;</td>
        <td class="fontegeral"  valign="top">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table><br /><br />
</body>
</html>