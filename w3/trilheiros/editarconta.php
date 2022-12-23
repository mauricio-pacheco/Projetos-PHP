<?php require("verificacao.php"); ?>
<?php include("cabecalho.php"); ?>
<STYLE type=text/css>
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
<?php include("aniversario.php"); ?>
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
                        <table width="98%" border="0">
                          <tr>
                            <td><div align="center">
                              <p><span class="style19">Editar Conta</span></p>
                              <p><span class="style17"><font color="#ffffff">* Campos Obrigat&oacute;rios</font></span></p>
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

</SCRIPT><?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM integrantes WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe dados cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?><FORM name=cadastro action="editaconta2.php" enctype="multipart/form-data" method=post onSubmit="return validar(this)">
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
                              name="nome" value="<?php echo $n["nome"]; ?>" />
        *</strong></span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif">&nbsp;</td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><img src="spaco.gif" width="2"/><img src="integrantes/<?php echo $n["foto"]; ?>" border="1"/></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Foto do Integrante: </span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><input class="caixacontato" type="file" name="foto" id="foto2" onload="Inibe()"> 
        <span class="style9">Selecione uma foto sua para a exibi&ccedil;&atilde;o.</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">M&ecirc;s de Nascimento: </span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong><span class="tahoma10preto style9">
        <input name="nascimento" onKeyPress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');"
                              class="caixacontato" value="<?php echo $n["nascimento"]; ?>"  size="16" maxlength="5" />
</span></strong><span class="style9 tahoma10preto"><em>Ex: 25/05</em></span><strong><span class="tahoma10preto style9"> *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">E-mail:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato" value="<?php echo $n["email"]; ?>" size="30" name="email" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Senha:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong><span class="tahoma10preto style9">
        <input type="password"
                              class="caixacontato" value="<?php echo $n["senha"]; ?>"  size="14" name="senha" />
*</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Telefone 
        Res.:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="tahoma10preto style9">
        <input name="telefone" class="caixacontato" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" value="<?php echo $n["telefone"]; ?>"  maxlength="14" />
        Ex: (99)9999-9999</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Telefone 
        Celular:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="tahoma10preto style9">
        <input name="fax" class="caixacontato" value="<?php echo $n["fax"]; ?>" onKeyPress="Mascara('fax', window.event.keyCode, 'document.cadastro.fax');" maxlength="14" />
        Ex: (99)9999-9999</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Endere&ccedil;o:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato" value="<?php echo $n["endereco"]; ?>"  size="56" name="endereco" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Complemento:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="style9"><strong>
        <input 
                              class="caixacontato" value="<?php echo $n["complemento"]; ?>"  size="18" name="complemento" />
      </strong></span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Bairro:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato" value="<?php echo $n["bairro"]; ?>"  size="20" name="bairro" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Cidade:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input 
                              class="caixacontato" value="<?php echo $n["cidade"]; ?>"  size="40" name="cidade" />
        *</span></strong></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right" class="style9"><span class="tahoma10preto">Cep:</span></div></td>
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong> <span class="tahoma10preto style9">
        <input name="cep" class="caixacontato" value="<?php echo $n["cep"]; ?>" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" maxlength="9"/>
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
        <textarea class="caixacadastroarea" name="msg" rows="7" wrap="virtual" cols="100"><?php echo $n["msg"]; ?></textarea>
        <br />
        </strong>Se necess&aacute;rio, 
          coloque suas d&uacute;vidas e observa&ccedil;&otilde;es.</span></td>
    </tr>
    <tr class="back">
      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif">      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </table>
  <p align="center" class="style15">
    <input name="id" type="hidden" value="<?php echo $n["id"]; ?>">
  <input type="submit" class="texto" value="Atualizar Dados" />
  &nbsp;&nbsp;
                                        <input class="texto" type="reset" value="Limpar" />
                                        <?
  }
  }
 ?>
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
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?></BODY>
</HTML>
