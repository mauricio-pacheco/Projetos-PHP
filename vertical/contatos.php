<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
<?php include("banner.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26%" valign="top"><?php include("menu.php"); ?></td>
        <td width="74%" valign="top">
               <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><img src="imagens/barra5.jpg" /></td>
          </tr></table>
           <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table>
          <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><table width="100%" border="0">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td align="left" class="fontetabela"><table width="100%" border="0" align="center">
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
                          <form action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
                            <table width="100%" border="0" align="center">
                              <tr>
                                <td><table width="100%" border="0">
                                  <tr>
                                    <td width="6%" align="left"><img src="imagens/phone.png" /></td>
                                    <td width="94%" class="manchete_texto" align="left">Telefone: (0xx55) 3744 - 6073</td>
                                    </tr>
                                  <tr>
                                    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                    </tr>
                                  </table>
                                  <table width="100%" border="0">
                                    <tr>
                                      <td width="6%" align="left"><img src="imagens/email.png" /></td>
                                      <td width="94%" class="fonteadm" align="left"><a href="mailto:atendimento@verticalturismo.com.br" class="fonteadm">atendimento@verticalturismo.com.br</a></td>
                                      </tr>
                                    <tr>
                                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              <tr>
                                <td width="50%"><table width="100%" border="0">
                                  <tr>
                                    <td class="fontetabela" align="left">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                                    <td class="manchete_texto"><div align="right" class="fontetabela">* Campos Obrigat&oacute;rios</div></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              <tr>
                                <td><table width="100%" align="left" border="0">
                                  <tbody>
                                    <tr>
                                      <td width="68%" class="fontetabela" align="left"><span class="fontetabela">Nome Completo:</span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <input class="fontetabela" size="60" name="nome" />
                                        * </span></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Cidade:</span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <input class="fontetabela" size="36" name="cidade" />
                                        <select class="fontetabela" 
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
                                        </span></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Telefone:</span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <input name="telefone" class="fontetabela" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                        * </span></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">E-mail:</span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <input class="fontetabela" size="40" name="email2" />
                                        * </span></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Mensagem / Sugest&otilde;es</span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <textarea class="fontetabela" name="mensagem" rows="12" cols="80"></textarea>
                                        </span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><span class="fontetabela">
                                        <input class="fontetabela" type="submit" value="ENVIAR DADOS" name="submit" />
                                        </span></td>
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
          <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
</table><br />
<?php include("baixo.php"); ?>
</body>
</html>