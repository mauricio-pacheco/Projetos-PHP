<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
</HTML>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <DIV id=Layer1 style="Z-INDEX: 1; WIDTH: 100%; POSITION: absolute">
      <TABLE height=284 cellSpacing=0 cellPadding=0 width=770 align=center 
      border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('menu.swf','770','68'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>            </TD></TR></TBODY></TABLE></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecEsq>&nbsp;</TD></TR>
              <TR>
                <TD class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD class=bgCabecDir vAlign=top width=770 bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width=770 border=0>
              <TBODY>
              <TR>
                <TD background=home_arquivos/bg_cabec_esq.jpg>
                  <SCRIPT src="carrega2.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('cabec.swf','770','225'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>                </TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecDir>&nbsp;</TD></TR>
              <TR>
                <TD 
      class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <?php include ("menu.php"); ?>
                <TD vAlign=top width=80% bgColor=#ffffff>
                  <DIV align=center><BR>
                  </DIV>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=27 background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><img src="comprado.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <FORM name=cadastro action=comprado3.php enctype="multipart/form-data" method=post onSubmit="return validar(this)"><TABLE cellSpacing=10 cellPadding=0 width="100%" 
                        border=0>
                          <TBODY>
                          <TR>
                            <TD class=tahoma10cinza666666><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                              <tbody>
                                <tr>
                                  <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"><div class="back" align="center"> <span class="tahoma10preto">
                                      <script language="JavaScript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.quantidade.value=="") {
alert("O Campo Quantidade não está preenchido!")
cadastro.quantidade.focus();
return false
}

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.email.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Endereço não está preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.bairro.value=="") {
alert("O Campo Bairro não está preenchido!")
cadastro.bairro.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Cidade não está preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP não está preenchido!")
cadastro.cep.focus();
return false
}


		return true;

}
 
function Mascara (formato, keypress, objeto){
campo = eval (objeto);

// cep
if (formato=='cep'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

// cep cobranca
if (formato=='cepcobranca'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

// Validar CPF
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
// fim validação CPF


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


// data nascimento
if (formato=='datanasc'){
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



// data cadastro
if (formato=='datacadastro'){
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

// fax
if (formato=='fax'){
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

// celular
if (formato=='celular'){
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
                                      </span>
                                           <div align="center"><img src="out14.jpg"><br><br></div>
                                          <div align="center"><span class="tahoma10preto"><font color="#000000">Preencha o formulário abaixo para efetuar a compra do produto:</font></span></div>
                                  </div></td>
                                </tr>
                              </tbody>
                              <tr>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"></td>
                              </tr>
                              <tr>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"><span class="style3">Dados do Produto:
                                      <script>

function checkText(e, text){
    try{var element = e.target          }catch(er){};
    try{var element = event.srcElement  }catch(er){};
    
    document.getElementById(text).disabled = !element.checked;
}

                                </script>
                                </span></td>
                              </tr>
                              <tr>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2">
							 <br /><script>

function checkText(e, text){
    try{var element = e.target          }catch(er){};
    try{var element = event.srcElement  }catch(er){};
    
    document.getElementById(text).disabled = !element.checked;
}

                                </script>
                                
                                
                                <img src=caixote.gif>&nbsp;
<span class="tahoma10preto"><strong>Podos</strong></span>
<table width="100%" border="0"><tr>
<td width="9%"><input type="checkbox" name="racao" value="Podos ( 1 Lt )" id="check2" onClick="checkText(event, 'campo')" />
<span class="tahoma10preto">1 Lt</span></td>
<td width="60%"><span class="tahoma10preto">Quantidade:</span><strong><span class="tahoma10preto">
<input class="formularioDir"  size="6" name="quantidade" value="1" id="campo" disabled/></span></strong></td></tr>
</table><br />


</td>
                              </tr>
                              <tr>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"><span class="style3">Dados do Cliente:</span></td>
                              </tr>
                              <tr>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"><div class="back" align="center">
                                    <div align="center"><span class="tahoma10preto"><font color="#000000">* Campos Obrigatórios</font></span></div>
                                </div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="16%"><div align="left"><span class="tahoma10preto"><font color="#000000">Nome 
                                  Completo: </font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="84%"><div align="left"><span class="tahoma10preto"><strong>
                                  <input class="formularioDir" size="56" 
                              name="nome" />
                                  *</strong></span></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">E-mail</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong> <span class="tahoma10preto">
                                  <input 
                              class="formularioDir"  size="40" name="email" />
                                  *</span></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font color="#000000">Telefone 
                                  Res.:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto">
                                  <input name="telefone" class="formulariodir" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');"  maxlength="14" />
                                  Ex: (99)9999-9999</span></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font color="#000000">Telefone 
                                  Celular:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto">
                                  <input name="fax" class="formulariodir" onKeyPress="Mascara('fax', window.event.keyCode, 'document.cadastro.fax');" maxlength="14" />
                                  Ex: (99)9999-9999</span></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Endereço:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong> <span class="tahoma10preto">
                                  <input 
                              class="formularioDir"  size="56" name="endereco" />
                                  *</span></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Complemento:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong>
                                  <input 
                              class="formularioDir"  size="50" name="complemento" />
                                </strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Bairro:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong> <span class="tahoma10preto">
                                  <input 
                              class="formularioDir"  size="50" name="bairro" />
                                  *</span></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Cidade:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong> <span class="tahoma10preto">
                                  <input 
                              class="formularioDir"  size="50" name="cidade" />
                                  *</span></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Cep:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong> <span class="tahoma10preto">
                                  <input name="cep" class="formulariodir" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" maxlength="9"/>
                                  *</span></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong><a 
                              href="http://www.correios.com.br/servicos/cep/default.cfm" 
                              target="_blank"><img 
                              src="busca_cep.gif" 
                              border="0" /></a></strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Estado:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong>
                                  <select 
                              class="formularioDir"  name="estado">
                                    <option value="UF" 
                                selected="selected">UF</option>
                                    <option 
                                value="AC">AC</option>
                                    <option 
                                value="AL">AL</option>
                                    <option 
                                value="AP">AP</option>
                                    <option 
                                value="AM">AM</option>
                                    <option 
                                value="BA">BA</option>
                                    <option 
                                value="CE">CE</option>
                                    <option 
                                value="DF">DF</option>
                                    <option 
                                value="ES">ES</option>
                                    <option 
                                value="GO">GO</option>
                                    <option 
                                value="MA">MA</option>
                                    <option 
                                value="MT">MT</option>
                                    <option 
                                value="MS">MS</option>
                                    <option 
                                value="MG">MG</option>
                                    <option 
                                value="PA">PA</option>
                                    <option 
                                value="PB">PB</option>
                                    <option 
                                value="PR">PR</option>
                                    <option 
                                value="PE">PE</option>
                                    <option 
                                value="PI">PI</option>
                                    <option 
                                value="RJ">RJ</option>
                                    <option 
                                value="RN">RN</option>
                                    <option 
                                value="RS">RS</option>
                                    <option 
                                value="RO">RO</option>
                                    <option 
                                value="RR">RR</option>
                                    <option 
                                value="SC">SC</option>
                                    <option 
                                value="SP">SP</option>
                                    <option 
                                value="SE">SE</option>
                                    <option 
                              value="TO">TO</option>
                                  </select>
                                </strong></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><span class="tahoma10preto"><font 
                              color="#000000">Observações:</font></span></div></td>
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="left"><strong>
                                  <textarea class="formularioDir"  name="msg" rows="7" wrap="virtual" cols="70"></textarea>
                                  <br />
                                  </strong><span class="tahoma10preto">Se necessário, 
                                    coloque suas dúvidas e observações.</span></div></td>
                              </tr>
                              <tr class="back">
                                <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"></td>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                            </table>
                            <p align="center"><span style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif">
                                <input class="texto"  type="submit" value="Enviar Formulário" name="submit" />
                              </span></p>                              </TD>
                          </TR></TBODY></TABLE></FORM></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
     <TD>&nbsp;</TD></TR></TBODY></TABLE>     </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY>
</HTML>
