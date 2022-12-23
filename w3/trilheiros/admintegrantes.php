<?php require("verifica.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br">
<head>
<title>Associa&ccedil;&atilde;o Moto Clube Trilheiros do Barril</title>
<meta name="description" content="Descrição">
<meta name="keywords" content="palavras chave">
<meta name="classification" content="Internet" />
<meta name="language" content="br" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="7 Dias" />
<meta name="robots" content="index, follow" />
<meta name="author" content="dnimports.com.br">
<meta name="robots" content="index, follow, all" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="e.ico" type="image/x-icon" />
<link rel="shortcut icon" href="e.ico" type="image/x-icon" />
<style type="text/css">
@import url("home_arquivos/barroide.css");
</style>
<STYLE type=text/css>
.style5 {
	font-size: 9px
}
.style7 {
	font-size: 14px;
	font-family: Verdana;
	color: #ffffff;
}
.style8 {font-size: 14}
.style9 {color: #FFFFFF}
.style15 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style17 {color: #FFFFFF; font-size: 10px; }
.style19 {color: #FFFFFF; font-size: 14px; }
</STYLE>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<SCRIPT src="home_arquivos/AC_RunActiveContent.js" 
type=text/javascript></SCRIPT>
</HEAD>
<BODY>
<table width="778" height="32" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828" >
  <tbody>
    <tr>
      <td width="756" height="32" background="home_arquivos/trilhabaixo.jpg" bgcolor="#000000" class="style8"><div align="center" class="style7">Setor Administrativo do Site</div></td>
    </tr>
  </tbody>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>


<TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><div align="center">
                       <style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<?php include("menuadm.php"); ?>
                        <table width="98%" border="0">
                          <tr>
                            <td><div align="center">
                              <hr>
                              <p>
                                <?php include("menuadmintegrantes.php"); ?>
                              </p>
                              <p><span class="style19">Cadastrar Integrantes</span></p>
                              <p><span class="style17">* Campos Obrigat&oacute;rios</span></p>
                              <table width="98%" border="0">
                                <tr>
                                  <td>          <script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.nascimento.value=="") {
alert("O Campo Data de Nascimento não está¡ preenchido!")
cadastro.nascimento.focus();
return false
}

if (document.cadastro.email.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email.focus();
return false
}

if (document.cadastro.senha.value=="") {
alert("O Campo Senha não está preenchido!")
cadastro.senha.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Endereçoo não está preenchido!")
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
// fim validaÃ§Ã£o CPF


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
  campo.value = campo.value;
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

</SCRIPT><FORM name=cadastro action="cadintegrantes.php" enctype="multipart/form-data" method=post onSubmit="return validar(this)">
  <table cellspacing="1" cellpadding="3" width="96%" 
                        align="center" border="0">
    <tbody>
    </tbody>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="27%"><div align="right" class="style9"><span class="tahoma10preto">Nome 
        Completo: </span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="73%"><span class="tahoma10preto style9"><strong>
        <input class="caixacontato" size="56" 
                              name="nome" />
        *</strong></span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Foto do Integrante: </span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><input class="caixacontato" type="file" name="foto" id="foto"></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">M&ecirc;s de Nascimento: </span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong><span class="tahoma10preto style9">
        <input name="nascimento" onKeyPress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');"
                              class="caixacontato"  size="16" maxlength="5" />
</span></strong><span class="style9 tahoma10preto"><em>Ex: 25/05</em></span><strong><span class="tahoma10preto style9"> *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">E-mail:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato"  size="30" name="email" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Senha:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong><span class="tahoma10preto style9">
        <input type="password"
                              class="caixacontato"  size="14" name="senha" />
*</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Telefone 
        Res.:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="tahoma10preto style9">
        <input name="telefone" class="caixacontato" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');"  maxlength="14" />
        Ex: (99)9999-9999</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Telefone 
        Celular:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="tahoma10preto style9">
        <input name="fax" class="caixacontato" onKeyPress="Mascara('fax', window.event.keyCode, 'document.cadastro.fax');" maxlength="14" />
        Ex: (99)9999-9999</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Endere&ccedil;o:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato"  size="56" name="endereco" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Complemento:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="style9"><strong>
        <input 
                              class="caixacontato"  size="18" name="complemento" />
      </strong></span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Bairro:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato"  size="20" name="bairro" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Cidade:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato"  size="40" name="cidade" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Cep:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input name="cep" class="caixacontato" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" maxlength="9"/>
        *</span></strong></td>
    </tr>

    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Estado:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><select class="caixacontato"
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
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Observa&ccedil;&otilde;es:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="style9"><strong>
        <textarea class="caixacadastroarea"  name="msg" rows="7" wrap="virtual" cols="100"></textarea>
        <br />
        </strong>Se necess&aacute;rio, 
          coloque suas d&uacute;vidas e observa&ccedil;&otilde;es.</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><script> 

var checkobj 
function agreesubmit(el){ 
checkobj=el 
if (document.all||document.getElementById){ 
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button 
var tempobj=checkobj.form.elements[i] 
if(tempobj.type.toLowerCase()=="submit") 
tempobj.disabled=!checkobj.checked 
} 
} 
} 

function defaultagree(el){ 
if (!document.all&&!document.getElementById){ 
if (window.checkobj&&checkobj.checked) 
return true 
else{ 
alert("Please read/accept terms to submit form") 
return false 
} 
} 
} 

                                    </script>      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </table>
  <p align="center" class="style15">
  <input type="submit" class="texto" value="Cadastrar" />
  &nbsp;&nbsp;
                                        <input class="texto" type="reset" value="Limpar" />
                                                  </p>
                                  </form></td>
                                </tr>
                              </table>
                              </div></td>
                          </tr>
                        </table>
                        </div></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<TABLE width=778 height="32" border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828" ><TBODY>
  <TR>
    <TD width=756 height="32" background="home_arquivos/trilhabaixo.jpg" bgColor=#000000><div align="center" class="texto_html style5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; 
      <?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma sa&iacute;da esperada &eacute;: ter&ccedil;a-feira 29 de janeiro de 2008   
?>
    Moto Clube Trilheiros do Barril - Desenv.: <a href="http://www.w3propaganda.com" target="_blank"><font color=#FCDB00>W3</font></a></div></TD>
</TR></TBODY></TABLE>
</BODY>
</HTML>
