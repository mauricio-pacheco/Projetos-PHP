<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-BR xml:lang="pt-BR" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Posto Seberi</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=pt-BR http-equiv=Content-language>
<META name=description 
content="Descrição">
<META name=keywords 
content="palavras, chave"><LINK rel="Shortcut icon" type=image/x-icon 
href="home_arquivos/favicon.ico">

<STYLE type=text/css>@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.18702"></HEAD>
<BODY>
<DIV id=layout>
<DIV id=topo>
<DIV id=topo-mg>
  <?php include("cabecalho.php"); ?>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("menucima.php"); ?></td>
  </tr>
</table>
</DIV></DIV>
<DIV id=conceitual-home>
<SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('index.swf','972','329'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT><br>
</DIV>

</DIV></DIV>
<DIV id=rodape>
<DIV id=rodape-topo>
</DIV>
<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top"><?php include("menu.php"); ?></td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><img src="home_arquivos/bb.gif" width="20" height="250"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Fale Conosco</b></td>
              </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770"><table width="100%" border="0" align="left">
                        <tr>
                          <td border="0"><script language=javascript>
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

// cep
if (formato=='cep'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

// cpf
if (formato=='cpf'){
separador1 = '.'; 
separador2 = '-'; 
conjunto1 = 3;
conjunto2 = 7;
conjunto3 = 11;
if (campo.value.length == conjunto1)
  {
  campo.value = campo.value + separador1;
  }
if (campo.value.length == conjunto2)
  {
  campo.value = campo.value + separador1;
  }
if (campo.value.length == conjunto3)
  {
  campo.value = campo.value + separador2;
  }
}

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
                              <table width="100%" border="0" align="left">
                                <tr>
                                  <td><table width="100%" border="0">
                                    <tr>
                                      <td width="6%"><img src="phone.png"></td>
                                      <td width="94%" align="left">Telefone 1: (0xx55) 3746 - 1083<br>
                                      Telefone 2: (0xx55) 3746 - 1388<br>
                                      FAX: (0xx55) 3746 - 1083</td>
                                    </tr>
                                    <tr>
                                      <td width="6%" align="center"><img src="restaurantes_icone.jpg"></td>
                                      <td width="94%" align="left">Restaurante: (0xx55) 3746 - 1560</td>
                                    </tr>
                                    <tr>
                                      <td width="6%" align="center"><img src="pneu.jpg"></td>
                                      <td width="94%" align="left">Borracharia e Auto Elétrica: (0xx55) 3746 - 1083</td>
                                    </tr>
                                    <tr>
                                      <td width="6%" align="center"><img src="grana.gif"></td>
                                      <td width="94%" align="left">Compra e Venda Direta: (0xx55) 9957 - 9935</td>
                                    </tr>
                                    <tr>
                                      <td><img src="blank.gif" width="1" height="4"></td>
                                      <td><img src="blank.gif" width="1" height="4"></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td width="50%"><table width="100%" border="0">
                                    <tr>
                                      <td align="left"><b>Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</b></td>
                                      <td><div align="right">* Campos Obrigat&oacute;rios</div></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" align="left" border="0">
                                    <tbody>
                                      <tr>
                                        <td width="68%"><div align="left">Nome Completo:</div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <input class=texto size="60" name="nome" />
                                          * </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">Cidade:</div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <input class=texto size="36" name="cidade" />
                                          <select class="texto" 
                              name=estado>
                                            <option value='RS - Rio Grande do Sul' selected=selected>RS - Rio Grande do Sul</option>
                                            <option 
                                value='AC - Acre'>AC - Acre</option>
                                            <option value='AL - Alagoas'>AL - Alagoas</option>
                                            <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
                                            <option value='AP - Amap&aacute;'>AP - Amap&aacute;</option>
                                            <option 
                                value='BA - Bahia'>BA - Bahia</option>
                                            <option value='CE - Cear&aacute;'>CE - Cear&aacute;</option>
                                            <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
                                            <option value='ES - Esp&iacute;rito Santo'>ES - Esp&iacute;rito Santo</option>
                                            <option 
                                value='GO - Goi&aacute;s'>GO - Goi&aacute;s</option>
                                            <option value='MA - Maranh&atilde;o'>MA - Maranh&atilde;o</option>
                                            <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
                                            <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
                                            <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
                                            <option value='PA - Par&aacute;'>PA - Par&aacute;</option>
                                            <option 
                                value='PB - Para&iacute;ba'>PB - Para&iacute;ba</option>
                                            <option value='PE - Pernambuco'>PE - Pernambuco</option>
                                            <option 
                                value='PI - Piau&iacute;'>PI - Piau&iacute;</option>
                                            <option value='PR - Paran&aacute;'>PR - Paran&aacute;</option>
                                            <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
                                            <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
                                            <option 
                                value='RO - Roraima'>RO - Roraima</option>
                                            <option value='RR - Roraima'>RR - Roraima</option>
                                            <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                                            <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                                            <option value='SP - S&atilde;o Paulo'>SP - S&atilde;o Paulo</option>
                                            <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                                          </select>
                                          CEP:
                                          <input name="cep" class=texto onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9"/>
                                        </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">Telefone:</div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <input name="telefone" class=texto onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                          * </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">E-mail:</div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <input class=texto size="40" name="email2" />
                                          * </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">Mensagem / Sugest&otilde;es / Reclamações</div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <textarea class=texto name="mensagem" rows="12" cols="80"></textarea>
                                        </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="left">
                                          <input class=texto type="submit" value="ENVIAR DADOS" name="submit" />
                                        </div></td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                                </tr>
                              </table>
                            </form></td>
                        </tr>
                      </table>
                        </td>
                    </tr>
                  </table>                   </td>
                  </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<DIV id=rodape-baixo>
  <DIV class=conteudo>
  <DIV id=direitos>
  <?php include("baixo.php"); ?><BR class=clr></DIV></DIV></DIV></DIV></BODY></HTML>
