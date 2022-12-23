<?php include("meta.php"); ?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><em>PARTICIPE DA PROGRAMAÇÃO</em></b></font></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" class="manchete_textocasa">
          <tr></tr>
          <tr>
            <td><table width="100%" border="0" align="center">
              <tr>
                <td border="0"><script language="JavaScript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.assunto.value=="") {
alert("O Campo Assunto não está preenchido!")
cadastro.assunto.focus();
return false
}

if (document.cadastro.quem.value=="") {
alert("O Campo Destinado a Quem não está preenchido!")
cadastro.quem.focus();
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
                  <form action="enviaparticipe.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td width="50%"><table width="100%" border="0">
                          <tr>
                            <td class="fontebaixo2">Preencha o formul&aacute;rio abaixo paraparticipar da programação:</td>
                            <td class="fontebaixo2"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" align="left" border="0">
                          <tbody>
                            <tr>
                              <td class="fontebaixo2">Assunto:</td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2"><input class="texto" size="60" name="assunto" />
* </td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Destinado para quem:</td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2"><input class="texto" size="60" name="quem" />
* </td>
                            </tr>
                            <tr>
                              <td width="68%" class="fontebaixo2">Nome Completo:</td>
                            </tr>
                            <tr>
                              <td><input class="texto" size="60" name="nome" />
                                * </td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Cidade:</td>
                            </tr>
                            <tr>
                              <td><input class="texto" size="36" name="cidade" />
                                <select class="texto" 
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
                              <td class="fontebaixo2">E-mail:</td>
                            </tr>
                            <tr>
                              <td><input class="texto" size="40" name="email2" /></td>
                            </tr>
                            <tr>
                              <td class="fontebaixo2">Mensagem / Sugest&otilde;es</td>
                            </tr>
                            <tr>
                              <td><textarea class="texto" name="mensagem" rows="12" cols="80"></textarea></td>
                            </tr>
                            <tr>
                              <td><input class="texto" type="submit" value="ENVIAR DADOS" name="submit" /></td>
                            </tr>
                          </tbody>
                        </table></td>
                      </tr>
                    </table>
                  </form></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
