<?php include("meta.php"); ?>
<script language="javascript">
function toggle(obj) {
var el = document.getElementById(obj);
if ( el.style.display != 'none' ) {
el.style.display = 'none';
}
else {
el.style.display = '';
}
}
 </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><SCRIPT src="classes/carrega2.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/menu.swf','980','40'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="235" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="494" valign="top" bgcolor="#FFFFFF">
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>CONTATOS</b></font></td>
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
                            <td><p><strong>Endereço da Rádio</strong></p>
                              <p>Rádio Universal – 102.9 FM<br />
                                Av. do Comércio, 841 – Sala 02<br />
                                Bairro Centro – CEP: 98.360-000<br />
                                Rodeio Bonito/RS</p></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                          </tr>
                        </table>
                          <table width="100%" border="0">
                          <tr>
                            <td width="6%"><img src="imagens/fone.png" /></td>
                            <td width="94%" class="fontebaixo2">Telefone: 55 3798 1535 </td>
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
                              <td><input name="telefone" class="texto" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
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
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
          </table>
          </td>
        <td width="235" valign="top"><?php include("direito.php"); ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" background="imagens/baixo.png" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="imagens/branco.gif" width="2" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
