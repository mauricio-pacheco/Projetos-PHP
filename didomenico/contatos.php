<?php include("meta.php"); ?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="309"><img src="imagens/branco.gif" width="2" height="4" /></td>
    <td width="663" bgcolor="#EC1D25"><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table bgcolor="#FFFFFF" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" valign="top" background="imagens/tabela.png"><table class="manchete_texto9" width="208" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            <td><?php include("esquerdo.php"); ?></td>
          </tr>
        </table></td>
        <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
        </table>
          <table height="28" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="3%" class="manchete_texto9m"><img src="imagens/casa.png" /></td>
            <td width="97%" class="manchete_texto9m">&nbsp;<strong><em>Fale Conosco</em></strong></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
          </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="100%" border="0" align="center" class="manchete_texto9">
                    <tr>
                      <td border="0"><script language="JavaScript" type="text/javascript">
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
                                  <td width="4%"><img src="imagens/telephone.png" /></td>
                                  <td width="96%" class="fontebaixo2">Telefone: 55 3795 1204 </td>
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
                                      </select></td>
                                  </tr>
                                  <tr>
                                    <td class="fontebaixo2">Telefone:</td>
                                  </tr>
                                  <tr>
                                    <td><input name="telefone" class="texto" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                      * </td>
                                  </tr>
                                  <tr>
                                    <td class="fontebaixo2">E-mail:</td>
                                  </tr>
                                  <tr>
                                    <td><input class="texto" size="40" name="email2" />
                                      * </td>
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
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>