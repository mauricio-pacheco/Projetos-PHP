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
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Cadastro Clientes</b></td>
              </tr>
            </table>
            
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

// telefone 1
if (formato=='numero1'){
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

// telefone 2
if (formato=='numero2'){
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



// celular 1
if (formato=='celular1'){
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

// celular 2
if (formato=='celular2'){
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
                    

<script language=javascript>

function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}


if (document.cadastro.cnpj.value=="") {
alert("O Campo CNPJ ou CPF não está preenchido!")
cadastro.cnpj.focus();
return false
}


if (document.cadastro.ie.value=="") {
alert("O Campo Inscrição Estadual não está preenchido!")
cadastro.ie.focus();
return false
}

if (document.cadastro.email3.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email3.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP não está preenchido!")
cadastro.cep.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Municipio não está preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Logradouro não está preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.numero.value=="") {
alert("O Campo Número não está preenchido!")
cadastro.numero.focus();
return false
}

if (document.cadastro.bairro.value=="") {
alert("O Campo Bairro não está preenchido!")
cadastro.bairro.focus();
return false
}

if (document.cadastro.caixa.value=="") {
alert("O Campo Caixa Postal não está preenchido!")
cadastro.caixa.focus();
return false
}


if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.telefone.focus();
return false
}


}

</SCRIPT> 
<form name="cadastro" action="cadcliente.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770"><table width="98%" border="0" align="center">
                        <tr>
                          <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left"><p><b>Preencha o formul&aacute;rio abaixo para o cadastro do cliente:</b></p>
                            <p><font color="#FF0000">AGUARDE CONFIRMAÇÃO DO CADASTRO POR E-MAIL</font></p></td>
                        </tr>
                        <tr>
                          <td align="left"><div align="left"></div></td>
                        </tr>
                      </table>
                        <table width="98%" border="0" align="center">
                        <tr>
                          <td><div align="left"></div></td>
                          <td align="right"><div align="right">* Campos Obrigatórios</div></td>
                        </tr>
                        <tr>
                          <td><div align="left"><b>IDENTIFICAÇÃO:</b></div></td>
                          <td><div align="left"></div></td>
                        </tr>
                        <tr>
                          <td width="16%"><div align="left">Nome:</div></td>
                          <td width="84%"><div align="left">
                            <input size="80" name="nome" />
                            *</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Identificação:</div></td>
                          <td><div align="left">
                            <input size="80" id="email" name="id" />
                          </div></td>
                        </tr>
                        <tr>
                          <td align="left">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left"><b>DADOS PRINCIPAIS:</b></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">Tipo Pessoa:</div></td>
                          <td><div align="left">
                            <input type="checkbox" name="tipo" value="Fisica" id="checkbox">
                          Fisica 
                          <input type="checkbox" name="tipo2" value="Jurídica" id="checkbox2">
Jurídica 
<input type="checkbox" name="tipo3" value="Outros" id="checkbox3"> 
Outros
</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">CNPJ ou CPF:</div></td>
                          <td><div align="left">
                            <input size="40" name="cnpj" />
                            *</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Data Fundação:</div></td>
                          <td><div align="left">
                            <input name="datafund" id="nascimento" onKeyPress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="12" maxlength="10" />
                          </div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Insc. Estadual:</div></td>
                          <td align="left"><input size="32" name="ie" />
                            *</td>
                        </tr>
                        <tr>
                          <td><div align="left">E-mail:</div></td>
                          <td align="left"><input size="32" name="email3" />
                            *</td>
                        </tr>
                        <tr>
                          <td><div align="left">RG:</div></td>
                          <td align="left"><input size="32" name="rg" />
                             ( Somente Pessoa Fisica )</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left"><b>ENDEREÇO:</b></div></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">CEP:</div></td>
                          <td align="left"><input name="cep" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9"/>
*</td>
                        </tr>
                        <tr>
                          <td><div align="left">Municipio:</div></td>
                          <td align="left"><input size="40" name="cidade" />
*</td>
                        </tr>
                        <tr>
                          <td><div align="left">Estado:</div></td>
                          <td align="left"><select class="texto" 
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
                          </select></td>
                        </tr>
                        <tr>
                          <td><div align="left">Logradouro:</div></td>
                          <td><div align="left">
                            <input size="50" name="endereco" />
                            * N&uacute;mero:
                            <input size="8" name="numero" />
                            *</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Complemento:</div></td>
                          <td><div align="left">
                            <input size="40" name="complemento" />
                          </div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Bairro:</div></td>
                          <td><div align="left">
                            <input size="26" name="bairro" />
                            *</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Caixa Postal:</div></td>
                          <td><div align="left">
                            <input size="26" name="caixa" />
*</div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><div align="left"><b>TELEFONE:</b></div></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="left">Telefone:</div></td>
                          <td><div align="left">
                            <input name="telefone" id="numero1" onKeyPress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="15" maxlength="14" />
                            *</div></td>
                        </tr>
                        <tr>
                          <td><div align="left">FAX:</div></td>
                          <td><div align="left">
                            <input name="fax" id="numero2" onKeyPress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="15" maxlength="14" />
                          </div></td>
                        </tr>
                        <tr>
                          <td><div align="left">Celular:</div></td>
                          <td><div align="left">
                            <input name="celular" id="celular1" onKeyPress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="15" maxlength="14" />
                          </div></td>
                        </tr>
                      </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left"><div align="left"><b>OBSERVAÇÕES:</b></div></td>
                          </tr>
                        </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="left"><textarea name="observacao" rows="14" cols="106"></textarea></td>
                          </tr>
                          <tr>
                            <td align="left"><input type="submit" value="Cadastrar Cliente" name="submit2"/></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>                   </td>
                  </tr>
              </table></form></td>
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
