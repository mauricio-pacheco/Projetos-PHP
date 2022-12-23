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
            <td bgcolor="#f9f9f9"><img src="imagens/barra6.jpg" /></td>
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

if (document.cadastro.partindo.value=="") {
alert("O Campo Partindo de não está preenchido!")
cadastro.partindo.focus();
return false
}

if (document.cadastro.para.value=="") {
alert("O Campo Para não está preenchido!")
cadastro.para.focus();
return false
}

if (document.cadastro.dataviajem.value=="") {
alert("O Campo Data de Viajem não está preenchido!")
cadastro.dataviajem.focus();
return false
}

if (document.cadastro.passageiros.value=="") {
alert("O Campo Passageiros não está preenchido!")
cadastro.passageiros.focus();
return false
}




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
                          <form action="enviaaerea.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
                            <table width="100%" border="0" align="center">
                              <tr>
                                <td width="50%"><table width="100%" border="0">
                                  <tr>
                                    <td><strong>Tarifas Aéreas - Solicitação de Reserva</strong></td>
                                  </tr>
                                </table>
                                  <table width="100%" border="0">
                                  <tr>
                                    <td class="fontetabela" align="left">Para que possamos oferecer um serviço personalizado e de maior qualidade, por favor, preencha corretamente os campos obrigatórios abaixo:<br /></td>
                                    <td class="manchete_texto"><div align="right" class="fontetabela">* Campos Obrigat&oacute;rios</div></td>
                                    </tr>
                                  </table></td>
                              </tr>
                              <tr>
                                <td><table width="100%" align="left" border="0">
                                  <tbody>
                                    <tr>
                                      <td width="68%" class="fontetabela" align="left"><span class="fontetabela">Partindo de:
                                        <input name="partindo" class="fontetabela" id="partindo" size="60" />
* </span></td>
                                      </tr>
                                                                     <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                         <tr>
                                      <td align="left">Para:
                                        <input name="para" class="fontetabela" id="para" size="60" />
* </td>
                                    </tr>
                                          <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                       <tr>
                                      <td align="left">Data de Viajem:
                                        <input name="dataviajem" class="fontetabela" id="dataviajem" size="20" />
* </td>
                                    </tr>
                                     <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                       <tr>
                                      <td align="left">Nº de Passageiros:
                                        <input name="passageiros" class="fontetabela" id="passageiros" size="20" />
* </td>
                                    </tr>
                                    <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td width="68%" class="fontetabela" align="left"><span class="fontetabela">Nome Completo:
                                        <input class="fontetabela" size="60" name="nome" />
* </span></td>
                                      </tr>
                                <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left">País:
                                        <select class="fontetabela" name="pais">
                                          <option 
              value="África do Sul">África do Sul</option>
                                          <option value="Alemanha">Alemanha</option>
                                          <option 
              value="Antilhas Holandesas">Antilhas Holandesas</option>
                                          <option 
              value="Arabia Saudita">Arabia Saudita</option>
                                          <option value="Argentina">Argentina</option>
                                          <option 
              value="Armênia">Armênia</option>
                                          <option 
              value="Aruba">Aruba</option>
                                          <option 
              value="Austrália">Austrália</option>
                                          <option 
              value="Áustria">Áustria</option>
                                          <option 
              value="Azerbaijão">Azerbaijão</option>
                                          <option 
              value="Bahamas">Bahamas</option>
                                          <option 
              value="Bélgica">Bélgica</option>
                                          <option 
              value="Bermuda">Bermuda</option>
                                          <option 
              value="Bielorrússia">Bielorrússia</option>
                                          <option 
              value="Bolivia">Bolivia</option>
                                          <option 
              value="Bósnia-Herzegovina">Bósnia-Herzegovina</option>
                                          <option 
              value="Botswana">Botswana</option>
                                          <option 
              value="Brasil">Brasil</option>
                                          <option 
              value="Bulgária">Bulgária</option>
                                          <option 
              value="Camboja">Camboja</option>
                                          <option 
              value="Canadá">Canadá</option>
                                          <option 
              value="Caribe">Caribe</option>
                                          <option 
              value="Chile">Chile</option>
                                          <option 
              value="China">China</option>
                                          <option 
              value="Colômbia">Colômbia</option>
                                          <option 
              value="Coreia do Norte">Coreia do Norte</option>
                                          <option value="Coreia do Sul">Coreia 
                                            do Sul</option>
                                          <option value="Costa Rica">Costa 
                                            Rica</option>
                                          <option value="Croácia">Croácia</option>
                                          <option 
              value="Cuba">Cuba</option>
                                          <option 
              value="Curaçao">Curaçao</option>
                                          <option 
              value="Dinamarca">Dinamarca</option>
                                          <option 
              value="Egito">Egito</option>
                                          <option 
              value="Emirados Árabes Unidos">Emirados Árabes 
                                            Unidos</option>
                                          <option value="Equador">Equador</option>
                                          <option 
              value="Escócia">Escócia</option>
                                          <option 
              value="Espanha">Espanha</option>
                                          <option 
              value="Estados Unidos">Estados Unidos</option>
                                          <option value="Estônia">Estônia</option>
                                          <option 
              value="Filipinas">Filipinas</option>
                                          <option 
              value="Finlândia">Finlândia</option>
                                          <option 
              value="França">França</option>
                                          <option 
              value="Geórgia">Geórgia</option>
                                          <option 
              value="Gibraltar">Gibraltar</option>
                                          <option 
              value="Grécia">Grécia</option>
                                          <option 
              value="Guadeloupe">Guadeloupe</option>
                                          <option 
              value="Holanda">Holanda</option>
                                          <option 
              value="Honduras">Honduras</option>
                                          <option value="Hong Kong">Hong 
                                            Kong</option>
                                          <option value="Hungria">Hungria</option>
                                          <option 
              value="Ilhas Mauricios">Ilhas Mauricios</option>
                                          <option value="Ilhas VIrgens Americanas">Ilhas 
                                            VIrgens Americanas</option>
                                          <option value="Ilhas Virgens Britranicas">Ilhas 
                                            Virgens Britranicas</option>
                                          <option 
              value="India">India</option>
                                          <option 
              value="Indonésia">Indonésia</option>
                                          <option 
              value="Inglaterra">Inglaterra</option>
                                          <option 
              value="Irlanda">Irlanda</option>
                                          <option 
              value="Islas Maldivas">Islas Maldivas</option>
                                          <option value="Islas Seychelles">Islas 
                                            Seychelles</option>
                                          <option value="Israel">Israel</option>
                                          <option 
              value="Itália">Itália</option>
                                          <option 
              value="Jamaica">Jamaica</option>
                                          <option 
              value="Japão">Japão</option>
                                          <option 
              value="Jordânia">Jordânia</option>
                                          <option 
              value="Kenya">Kenya</option>
                                          <option 
              value="Laos">Laos</option>
                                          <option 
              value="Letônia">Letônia</option>
                                          <option 
              value="Líbano">Líbano</option>
                                          <option 
              value="Líbia">Líbia</option>
                                          <option 
              value="Lituânia">Lituânia</option>
                                          <option 
              value="Luxemburgo">Luxemburgo</option>
                                          <option 
              value="Malásia">Malásia</option>
                                          <option 
              value="Malta">Malta</option>
                                          <option 
              value="Marrocos">Marrocos</option>
                                          <option 
              value="Martinique">Martinique</option>
                                          <option 
              value="Mauricius">Mauricius</option>
                                          <option 
              value="México">México</option>
                                          <option 
              value="Mônaco">Mônaco</option>
                                          <option 
              value="Monçambique">Monçambique</option>
                                          <option 
              value="Mongólia">Mongólia</option>
                                          <option 
              value="Namíbia">Namíbia</option>
                                          <option 
              value="Nepal">Nepal</option>
                                          <option 
              value="Noruega">Noruega</option>
                                          <option value="Nova Zelândia">Nova 
                                            Zelândia</option>
                                          <option value="Novo País">Novo 
                                            País</option>
                                          <option value="Oman">Oman</option>
                                          <option value="Palestina">Palestina</option>
                                          <option 
              value="Panama">Panama</option>
                                          <option 
              value="Paraguai">Paraguai</option>
                                          <option 
              value="Peru">Peru</option>
                                          <option 
              value="Polinésia Francesa">Polinésia Francesa</option>
                                          <option 
              value="Polônia">Polônia</option>
                                          <option value="Porto Rico">Porto 
                                            Rico</option>
                                          <option value="Portugal">Portugal</option>
                                          <option 
              value="Reino Unido">Reino Unido</option>
                                          <option value="República Dominicana">República 
                                            Dominicana</option>
                                          <option value="República Tcheca">República 
                                            Tcheca</option>
                                          <option value="Romênia">Romênia</option>
                                          <option 
              value="Rússia">Rússia</option>
                                          <option 
              value="Servia e Montenegro">Servia e Montenegro</option>
                                          <option 
              value="Síria">Síria</option>
                                          <option 
              value="Suécia">Suécia</option>
                                          <option 
              value="Suíça">Suíça</option>
                                          <option 
              value="Tailândia">Tailândia</option>
                                          <option 
              value="Tibete">Tibete</option>
                                          <option 
              value="Tunísia">Tunísia</option>
                                          <option 
              value="Turquia">Turquia</option>
                                          <option 
              value="Ucrânia">Ucrânia</option>
                                          <option 
              value="Uruguai">Uruguai</option>
                                          <option 
              value="Venezuela">Venezuela</option>
                                          <option 
              value="Vietnã">Vietnã</option>
                                          <option 
              value="Zâmbia">Zâmbia</option>
                                        </select></td>
                                    </tr>
                                     <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Cidade:
                                        <input name="cidade" class="fontetabela" id="cidade" size="36" />
                                        Estado:
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
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Telefone:
                                        <input name="telefone" class="fontetabela" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
* </span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">E-mail:
                                        <input class="fontetabela" size="40" name="email2" />
* </span></td>
                                      </tr>
                                    <tr>
                                      <td align="left"><img src="imagens/branco.gif" width="2" height="1" /></td>
                                      </tr>
                                    <tr>
                                      <td class="manchete_texto" align="left"><span class="fontetabela">Observações:</span></td>
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